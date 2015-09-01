<?php 
/**
* 后台内容控制类
*/
namespace Slbbsadmin\Controller;
use Think\Controller;
class ContentController extends Controller{
	
	/**
	 * 侧边栏
	 * @param  [type] $type  大分类
	 * @param  [type] $value 小分类
	 * @return [type]        导航
	 */
	private function sidebar($type, $value){
		$__MENU__ = A('Public') ->base();
		$__MENU__['main'][3]['class'] = 'current';
		$__MENU__['child']  = array(
			'内容管理' => array(
				0 => array(
              		'title' =>  '帖子列表' ,
              		'url' 	=>  'Content/index' ,
					),
				1 => array(
              		'title' =>  '评论列表' ,
              		'url' 	=> 'Content/comment' ,
					),
				2 => array(
              		'title' =>  '分类信息' ,
              		'url' 	=> 'Content/sort' ,
					),
				3 => array(
              		'title' =>  '版块管理' ,
              		'url' 	=> 'Content/forum' ,
					),
				),
			);
		$__MENU__['child'][$type][$value]['class'] = 'current';
		return $__MENU__;
	}
	/**
	 * 首页
	 * @return [type] [description]
	 */
	public function index(){

		$p = A('Public');
		$common = $p ->common();

		$__MENU__ = $this ->sidebar('内容管理', 0);

		// ==== 分页 ==== //
		$num = 15; //每页显示几条
    	$page_count = ceil((M('Topic') ->count('id'))/$num); //总页数
    	$page_now = empty(I('get.page'))?1:I('get.page'); //当前页
    	//查询条件
    	if (!empty(I('get.user'))) {

    		$action = 'Slbbsadmin/Content/index/user/'.I('get.user').'/page';
    		$topic_list = D('Topic') ->getTopicList(($page_now-1)*$num, $num, 'sl_topic.user_id', I('get.user'));
    	}elseif(!empty(I('get.forum'))){

    		$action = 'Slbbsadmin/Content/index/forum/'.I('get.forum').'/page';
    		$topic_list = D('Topic') ->getTopicList(($page_now-1)*$num, $num, 'sl_topic.forum_id', I('get.forum'));
    	}else{

    		$action = 'Slbbsadmin/Content/index/page';
    		$topic_list = D('Topic') ->getTopicList(($page_now-1)*$num, $num);
    	}
    	$page = $p ->pageShow($page_count, $page_now, $action);
    	// ==== end 分页 ==== //
    	//var_dump($__GET);

		$title = '帖子列表 - Slbbs后台管理平台';
		
		$this -> assign('title', $title);
		$this -> assign('common', $common);
		$this -> assign('__MENU__', $__MENU__);
		$this -> assign('topic_list', $topic_list);
		$this -> assign('page', $page);
		$this -> display();
	}
	/**
	 * 评论列表管理
	 * @return [type] [description]
	 */
	public function comment(){

		$p = A('Public');
		$common = $p ->common();
		$__MENU__ = $this ->sidebar('内容管理', 1);

		// ==== 分页 ==== //
		$num = 15; //每页显示几条
    	$page_count = ceil((M('Comment') ->count('cid'))/$num); //总页数
    	$page_now = empty(I('get.page'))?1:I('get.page'); //当前页
    	$comment_list = array();
    	if (!empty(I('get.user'))) {

    		$action = 'Slbbsadmin/Content/comment/user/'.I('get.user').'/page';
    		$comment_list = D('Comment') ->getCommentList(($page_now-1)*$num, $num, 'sl_comment.uid', I('get.user'));
    	}elseif(!empty(I('get.tid'))){

    		$action = 'Slbbsadmin/Content/comment/tid/'.I('get.tid').'/page';
    		$comment_list = D('Comment') ->getCommentList(($page_now-1)*$num, $num, 'sl_comment.tid', I('get.tid'));
    	}else{

    		$action = 'Slbbsadmin/Content/comment/page';
    		$comment_list = D('Comment') ->getCommentList(($page_now-1)*$num, $num);
    	}
    	$page = $p ->pageShow($page_count, $page_now, $action);
    	//var_dump($comment_list);

		$title = '评论管理 - Slbbs后台管理平台';
		
		$this -> assign('title', $title);
		$this -> assign('common', $common);
		$this -> assign('__MENU__', $__MENU__);
		$this -> assign('comment_list', $comment_list);
		$this -> assign('page', $page);
		$this -> display('comment-list');
	}
	//分类管理
	public function sort(){

		$p 			= A('Public');
		$common 	= $p ->common();
		$__MENU__ 	= $this ->sidebar('内容管理', 2);

		if (!empty( I('get.type') )) {
			
			if (empty(I('post.sort_order')) || empty(I('post.sort_name')) || empty(I('post.sort_intor'))) {
				
				echo "<script>alert('请完整填写表单！')</script>";
			}else{

				if (I('get.type') == 'edit') {

					$_data = array(
						'id'			=> I('post.id'),
						'sort_name' 	=> I('post.sort_name'),
						'sort_intor' 	=> I('post.sort_intor'),
						'sort_order' 	=> I('post.sort_order'), 
					);
					$_r = M('Sort') ->save($_data); //编辑分类

				}else if (I('get.type') == 'add') {

					$_data = array(
					'sort_name' 	=> I('post.sort_name'),
					'sort_intor' 	=> I('post.sort_intor'),
					'sort_order' 	=> I('post.sort_order'), 
					);
					$_r = M('Sort') ->add($_data); //添加分类
				}
				if ($_r > 0) echo "<script>alert('操作成功！')</script>";
				else echo "<script>alert('操作失败！')</script>";
			}
		}
		
		if (!empty( I( 'get.edit_id' ) )) {
			
			//获取分类详细信息
			$id   = I( 'get.edit_id' );
			$sort = M('Sort') ->where("id = %d", $id) ->find();
			$this ->assign('sort', $sort);
		}

		$sort_list 	= D('Sort') ->getSortList();
		$title 		= '分类管理';

		$this -> assign('sort_list', $sort_list);
		$this -> assign('common', $common);
		$this -> assign('__MENU__', $__MENU__);
		$this -> display();
	}
	//板块管理
	public function forum() {

		$p 			= A('Public');
		$common 	= $p ->common();
		$__MENU__ 	= $this ->sidebar('内容管理', 3);

		if (!empty( I('get.type') )) {
			
			if (empty(I('post.order')) || empty(I('post.name')) || empty(I('post.intor'))) {
				
				echo "<script>alert('请完整填写表单！')</script>";
			}else{

				if (I('get.type') == 'edit') {

					$_data = array(
						'id'		=> I('post.id'),
						'name' 		=> I('post.name'),
						'intor' 	=> I('post.intor'),
						'order' 	=> I('post.order'),
						'sort_id'	=> I('post.sort_id'),
						'hot'		=> I('post.hot'),
						'allow'		=> I('post.allow'),
					);
					$_r = M('Forum') ->save($_data); //编辑分类

				}else if (I('get.type') == 'add') {

					$_data = array(
					'name' 		=> I('post.name'),
					'intor' 	=> I('post.intor'),
					'order' 	=> I('post.order'), 
					'sort_id'	=> I('post.sort_id'),
					'hot'		=> I('post.hot'),
					'allow'		=> I('post.allow'),
					);
					$_r = M('Forum') ->add($_data); //添加分类
				}
				if ($_r > 0) echo "<script>alert('操作成功！')</script>";
				else echo "<script>alert('操作失败！')</script>";
			}
		}
		
		if (!empty( I( 'get.edit_id' ) )) {
			
			//获取板块详细信息
			$id   	= I( 'get.edit_id' );
			$forum 	= M('Forum')->where("id = %d", $id) ->find();
			$this ->assign('forum', $forum);
		}
		
		$sort 	= D('Sort') ->getSortList();
		$Forum_list = D('Forum') ->getForumList();

		$title = '板块管理';

		$this ->assign('title', $title);
		$this ->assign('forum_list', $Forum_list);
		$this ->assign('sort', $sort);
		$this ->assign('common', $common);
		$this ->assign('__MENU__', $__MENU__);
		$this ->display();
	}

	/**
	 * 评论状态操作 0=》隐藏 1=》正常
	 * @param $id 		帖子ID
	 * @param $value 	值
	 */
	public function comment_hide(){
		is_login();
		$id 	= 	I('get.id');
		$value	=	I('get.value');
		$data['hide'] = $value;
		$r = M('Comment') ->where("cid = %d", $id) ->save($data);
		if ($r > 0) {
			$this ->redirect("Slbbsadmin/Content/comment");
		}else{
			$this ->error('修改失败！');
		}
	}
	/**
	 * 评论删除操作
	 */
	public function comment_del(){
		is_login();
		$id = I('get.id');
		$r = M('Comment') ->where("cid = %d", $id) ->delete();
		if ($r > 0) {
			$this ->redirect("Slbbsadmin/Content/Comment");
		}else{
			$this ->error('删除失败！');
		}
	}
	
	public function topic_edit( $id = '' ){
		$p = A('Public');
		$common = $p ->common();
		$__MENU__ = $this ->sidebar('内容管理', 0);
		$id = addslashes(I('get.id'));
		$topic_arr = M('Topic') ->where("id = $id") ->find();
		//var_dump($topic_arr);
		$this -> assign('__MENU__',$__MENU__);
		$this -> assign('common',$common);
		$this -> assign('topic_arr',$topic_arr);
		$this -> display('topic_edit');
	}

}


?>