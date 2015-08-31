<?php 
/**
 * 帖子操作控制器
 */
namespace Home\Controller;
use Think\Controller;
class TopicController extends Controller {
	/**
	 * [t 帖子显示]
	 * @param  [int] $id [帖子ID]
	 * @return [type]     [无]
	 */
	public function t($id) {
		$p = A('Public');
		$common = $p->common();
		$id = I('get.id');

		$d_t = D('Topic');
		$topic = $d_t ->getTopicById($id);
		if ( empty($id) || empty($topic) ) $this -> error("帖子不存在！");
		if ( $d_t ->setViewAdd($id) == 0 ) $this->error("写入点击量失败！");
		$sideNewTopic = $this ->regroup($d_t ->getSideNewTopic(10),2);//重组数组
		$topicArr = $this ->regroup($topic,1);  //重组数组

		/* = = = = = 评论列表开始= = = = = = */
		$d_c = D('Comment');
		$num = 5; //每页显示几条
		$page_count = ceil($d_c->getNumComment($id)/$num); //总页数
		$page_now = empty(I('get.page'))?1:I('get.page'); //当前页
		$action='Topic/'.$id.'/page';
		$page=$p->pageShow($page_count,$page_now,$action);
    	$arr = $d_c-> getComment($id,($page_now-1)*$num,$num);
    	$comment=array();
    	$i = 0 + ($page_now - 1) * $num;
    	//评论数据重载
    	foreach ($arr as $key => $value) {
    		foreach ($value as $_key => $_value) {
    			switch ($_key) {
					case 'id' :  
						$comment[$key]['user_url'] = U('Member/'.$_value.''); 
						$comment[$key]['sort'] = ++$i;
						//楼层=》沙发，椅子，凳子
						switch ($comment[$key]['sort']) {
							case '1':
								$comment[$key]['sort'] = '【沙发】';
								break;
							case '2':
								$comment[$key]['sort'] = '【椅子】';
								break;
							case '3':
								$comment[$key]['sort'] = '【凳子】';
								break;
							default: $comment[$key]['sort'] = '【'.$comment[$key]['sort'].'楼】';
						}
						break;
					case 'cid':  $comment[$key]['id']      =$_value; break;
					case 'time': $comment[$key]['time']    =date_rewrite(strtotime($_value)); break;
    				case 'avatar':
    					if ($_value==0) $comment[$key]['avatar_url']="http://".SLBBS_ROOT."/Public/icon/avatar/default.png";
    					else $comment[$key]['avatar_url']="http://".SLBBS_ROOT."/Public/icon/avatar/".$_value."";
						break;
    				default: $comment[$key][$_key]=$_value; break;
    			}
    		}
    	}
    	//var_dump($topicArr);
        //var_dump($comment);
    	$t = empty($_GET['page'])?'':" - 评论列表 - 第 ".$page_now." 页";
    	/* = = = = = 评论列表结束= = = = = = */

    	// 验证权限，输出帖子权限管理按钮
    	if (!empty(session('user_id'))) { //普通用户显示按钮
    		if (session('user_id') == $topicArr['user_id']) {
    			$power_nav = "<a href='".U('Edit/'.$topicArr['id'].'')."'>编辑</a>";
    		}
    		if (!empty(session('admin'))) { //管理员显示按钮
    			$power_nav =  "<a href='".U('Edit/'.$topicArr['id'].'')."'>编辑</a> | ";
    			if ($topicArr['hide'] == 0) $power_nav .= "<a href=\"".U('Slbbsadmin/Topic/audit/id/'.$topicArr['id'].'/value/1')."\">审核帖子</a> | ";
    			else $power_nav .= "<a href=\"".U('Slbbsadmin/Topic/audit/id/'.$topicArr['id'].'/value/0')."\">取消审核</a> | ";
    			if ($topicArr['top'] == 0) $power_nav .= "<a href=\"".U('Slbbsadmin/Topic/top/id/'.$topicArr['id'].'/value/1')."\">置顶</a> | ";
    			else $power_nav .= "<a href=\"".U('Slbbsadmin/Topic/top/id/'.$topicArr['id'].'/value/0')."\">取消置顶</a> | ";
    			if ($topicArr['best'] == 0) $power_nav .= "<a href=\"".U('Slbbsadmin/Topic/best/id/'.$topicArr['id'].'/value/1')."\">加精</a> | ";
    			else $power_nav .= "<a href=\"".U('Slbbsadmin/Topic/best/id/'.$topicArr['id'].'/value/0')."\">取消精华</a> | ";
    			$power_nav .= "<a onclick=\"return confirm('您确定要删除吗？')\" href=\"".U('Public/del/id/'.$topicArr['id'].'/forum/'.$topicArr['forum_id'].'')."\">删除</a>";
    		}
    	}else{
    		$power_nav = '';
    	}

		$title=$topicArr['topic_title'].$t." - ".$common['website']['site_title'];

		$this ->assign('topic',$topicArr);
		$this ->assign('common',$common);
		$this ->assign('title',$title);
		$this ->assign('sideNewTopic',$sideNewTopic);
		$this ->assign('page',$page);
		$this ->assign('comment',$comment);
		$this ->assign('power_nav',$power_nav);

		$this->display();
	}
	/**
	 * [comment 发表评论验证]
	 * @return [type] [无]
	 */
	public function comment(){
		is_login();
		if (IS_POST) {
			$d_c=D('Comment');
			$comment_content  = A('Public') ->aite(I('post.content'));
			$data['content']  = $comment_content['content'];
			$data['__hash__'] = I('post.__hash__');
			if (!$d_c->create($data,'add')) {
				$this->error($d_c->getError());
			}else{
				$data['uid']  = session('user_id');
				$data['tid']  = I('post.tid');
				$data['fid']  = I('post.fid');
				$data['bid']  = empty(I('post.bid'))?0:I('post.bid');
				$data['time'] = date("Y-m-d H:i:s",time());

				$c_comment	= A('Comment');
				if ($c_comment ->checkComment($data['tid'],$data['uid'],$data['content'])) {
					$this ->error("已存在该条回复！");
				}
				$r = $d_c ->add($data);
				if ($r > 0) {
					if ($comment_content['i'] == 1) { //如含有@，则发内信通知被@者
						$_msg = "亲爱的".$comment_content['username']."！似乎有人在评论里@了你，<a href='".U('Topic/'.$data['tid'].'')."#common-".$r."'>查看详情</a>";
						D('Message') ->setMessage($comment_content['uid'], 1, $_msg);
						D('User')->upUnReadMsg($comment_content['uid']); //更新接受者未读私信条数
					}
					$d_user		= 	D('User');
					$d_user     ->	setMoneyAdd(session('user_id'),5); //增加金钱
					$d_topic	= 	D('Topic');
					$title 		= 	$d_topic->where("id=%d",$data['tid'])->getField('title');
					$d_member 	=	D('MemberNews');
					$news_data	=	"在：<a href='".U('Topic/'.$data['tid'].'#comment-'.$r.'')."'>".$title."</a> 发表了评论！";
					$d_member	->	setNews($news_data,session('user_id')); //写入动态
					
					
					$d_topic	->	setReplyAdd($data['tid']);//统计帖子回复量
					$d_user	    ->	setReplyCount($data['uid']);//统计用户回帖量
					D('Forum')  ->	setCommentCount($data['fid']);//统计版块回帖量
					$d_topic    ->  setCommentDate($data['tid']);//更新最后回复时间
					$this	    ->	redirect('Topic/'.I('post.tid').'#comment-'.$r.'');//自动跳转到帖子楼层
					//var_dump($data);
				}else{
					$this->error("发表评论失败！");
					//var_dump($data);
				}
			}
		}else{
			$this->error("页面错误！");
		}
	}
	/**
	 * [post 发表帖子]
	 * @return [type] [无]
	 */
	public function post(){
		$p 			= A('Public');
		$common 	= $p ->common();
		is_login(); //判断是否登陆
		$d_forum 	= D('Forum');
		if (IS_POST){
			$_where['id'] = I('post.forum');
			$_forum	= $d_forum -> where($_where) ->find();
			//var_dump($_forum);
			//var_dump($_where);
			if ($_forum['allow'] == 0) {
				if (!session('admin')) {
					$this ->error('很抱歉！此版块已禁止发帖！');
				}
			}
			$_str = $p ->aite(I('post.content')); 
			$data = array(
				'verify'	=>	I('post.verify'),
				'title' 	=> 	I('post.title'),
				'forum_id' 	=> 	I('post.forum'),
				'content'	=>	$_str['content'],
				'date'		=>	date("Y-m-d H:i:s",time()),
				'last_date'	=>	date("Y:m:d H:i:s",time()),
				'user_id'	=>	session("user_id"),
				'__hash__'	=>	I('post.__hash__'),
				);
			$d_t=D('Topic');
			if ($d_t->create($data,'add')) { //自动验证
				$r=$d_t->add($data);
				if ($r>0) {
					if ($_str['i'] == 1) { //如含有@，则发内信通知被@者
						$_msg = "亲爱的".$_str['username']."！似乎有人在主题里@了你，<a href='".U('Topic/'.$r.'')."'>查看详情</a>";
						D('Message') ->setMessage($_str['uid'], 1, $_msg);
						D('User')->upUnReadMsg($_str['uid']); //更新接受者未读私信条数
					}
					//增加金钱
					$d_u=D('User');
					$d_u->setMoneyAdd(session('user_id'),10);
					//写入动态
					$d_m=D('MemberNews');
					$news_data="发表帖子：<a href='".U('Topic/'.$r.'')."'>".I('post.title')."</a>";
					$d_m->setNews($news_data,session('user_id'));
					//写入用户帖子统计
					$d_u->setTopicCount(session('user_id')); 
					//统计版块回帖量
					$d_forum->setTopicCount($data['forum_id']);
					$this->success("发布帖子成功！",U('Topic/'.$r));
					exit();
				}
				else $errmsg="帖子发布失败！";
			} 
			else  $errmsg=$d_t->getError(); 
		}
		$forum_list	=	$d_forum ->getForumList();
		//$c_f=A('File');
		//$file=$d_f->showFileList('topic',28);

		$title ="发布帖子 - ".$common['website']['site_title'];
		$this ->assign('title',$title);
		$this ->assign('common',$common);
		$this ->assign('forum_list',$forum_list);
		//$this->assign('file',$file);
		$this ->assign('errmsg',$errmsg);
		$this ->display();
	}
	/**
	 * 帖子编辑
	 * @param  int $id 传入帖子ID
	 */
	public function edit() {
		$p 			= A('Public');
		$common 	= $p ->common();
		is_login(); //判断是否登陆
		$id 		= I('get.id');
		$_topic 	= D('Topic') ->edit($id);
		if ($_topic['user_id'] != session('user_id')) {
			$this ->error('此帖子你不能操作！');
			exit();
		}
		if (IS_POST){
			$data = array(
				'verify'	=>	I('post.verify'),
				'title' 	=> 	I('post.title'),
				'forum_id' 	=> 	I('post.forum'),
				'content'	=>	I('post.content'),
				'__hash__'	=>	I('post.__hash__'),
				);
			$d_topic = D('Topic');
			if ($d_topic ->create($data)) {
				$n = $d_topic ->where("id = %d", I('get.id')) ->save($data);
				if ($n >0 ) {
					$this->success("修改帖子成功！",U('Topic/'.$id.''));
					exit();
				}else $errmsg="修改帖子失败！";
			}else{
				$errmsg = $d_topic ->getError();
			}
		}
		$d_forum 	= 	D('Forum');
		$forum_list	=	$d_forum ->getForumList();
		//var_dump($forum_list);
		//var_dump($_topic);

		$title ="修改帖子 - ".$common['website']['site_title'];
		$this ->assign('title',$title);
		$this ->assign('common',$common);
		$this ->assign('forum_list',$forum_list);
		$this ->assign('topic',$_topic);
		$this ->assign('errmsg',$errmsg);
		$this ->display();
	}

	/**
	 * [regroup 帖子数组重组]
	 * @param  [array] 	$topicArr 	[传入帖子数组]
	 * @param  [int] 	$type     	[1 =>一维数组 2=>二维数组]
	 * @param  [string]	$page 		[用于判断首页或者论坛页面]
	 * @return [array]           	[数组]
	 */
    public function regroup($topicArr,$type,$page=''){
    	$arr=array();
    	if ($type==1) {
    		foreach ($topicArr as $key=>$value){
				switch ($key){
					case "user_id": $arr['user_url']=U("/Member/".$value.""); 
						$arr['user_id'] = $value;
					break;
					case "date":	$arr['date']=date_rewrite(strtotime($value)); break;
					case "last_date":
						if ($value==0) $arr['last_date']="暂无回复"; 
						else $arr['last_date']=date_rewrite(strtotime($value)); 
						break;
					case "forum_id": $arr['forum_url']=U("/Forum/".$value.""); break;
					case "name": $arr['forum_name']=$value; break;
					case 'views': $arr[$key]=$value+1; break;
					case 'best':
						if ($value==1)  $arr['topic_title']="【精华】".$topicArr['title'].""; 
						$arr['best'] = $value;
						break;
					case "title": $arr['topic_title']=$value; break;
					case "avatar":
						if ($value==0) {
							$arr['avatar_url']="http://".SLBBS_ROOT."/Public/icon/avatar/default.png";
						}else {
							$arr['avatar_url']="http://".SLBBS_ROOT."/Public/icon/avatar/".$value."";
						}
						break;
					case 'content':
						$arr['content']=xss_clean(htmlspecialchars_decode($value));
						break;
					default:
						$arr[$key]=$value;
				}
				$arr['forum_id']=$topicArr['forum_id'];
			}
			if ($arr['hide'] == 0) {
				$arr['content'] = "<font color='red'>【帖子审核中。。。】</font>";
			}
    	}elseif ($type==2) {
    		foreach ($topicArr as $key=>$value){
    			foreach ($value as $_key=>$_value){
    				//数组重新赋值
    				switch ($_key){
    					case "user_id": $arr[$key]['user_url']=U("/Member/".$_value.""); break;
    					case "date":	$arr[$key]['date']=date_rewrite(strtotime($_value)); break;
    					case "last_date":	 $arr[$key]['last_date']=date_rewrite(strtotime($_value)); 
    						break;
    					case "forum_id": $arr[$key]['forum_url']=U("/Forum/".$_value.""); break;
    					case "name": $arr[$key]['forum_name']=$_value; break;
    					case 'best':
							if ($_value==1)  $arr[$key]['topic_title']="<font color='red'>".$topicArr[$key]['title']."</font>"; 
							break;
						case 'top':
							if ($page=='forum') {
								if ($_value==1)  $arr[$key]['topic_title']="<font color='#dd1a00'>".$topicArr[$key]['title']."</font> <img src='http://".SLBBS_ROOT."/Public/images/top.png'>"; 
							}
							break;
						case 'home_top':
								if ($_value==1)  $arr[$key]['topic_title']="<font color='#dd1a00'>【首页置顶】".$topicArr[$key]['title']."</font> <img src='http://".SLBBS_ROOT."/Public/images/top.png'>"; 
							break;
						case "title": $arr[$key]['topic_title']=$_value; break;
    					case "avatar":
    						if ($_value==0) {
    							$arr[$key]['avatar_url']="http://".SLBBS_ROOT."/Public/icon/avatar/default.png";
    						}else {
    							$arr[$key]['avatar_url']="http://".SLBBS_ROOT."/Public/icon/avatar/".$_value."";
    						}
    						break;
    					case "id": $arr[$key]['topic_url']=U("/Topic/".$_value.""); break;
    					default:
    						$arr[$key][$_key]=$_value;
    				}
    			}
    		}
    	}
    return $arr;
    }
}

?>