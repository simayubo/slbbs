<?php
/**
* UserController.class.php 文件
* ==============================================
* 版权所有 2015-2020 http://www.slbbs.com
* ----------------------------------------------
* 这不是一个自由软件，未经授权不许任何使用和传播。
* ==============================================
* @date: 2015-6-1 下午5:08:25
* @author: BO
* @version: 1.0
*/
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller{
	/*
	 * 个人中心
	 */
	public function index (){
		$p      = A('Public');
		$common = $p->common();
		is_login(); //判断是否登陆
		$id     = empty(I('get.id'))?$common['user']['id']:I('get.id');
		if ($id == 1) { //系统用户禁止访问
			$this ->error('查无此用户！');
			exit();
		}
		$d_user=D('User');
		$c_user=A('User'); 
		$user=$d_user->getUserById($id);
		$user=$c_user->regroup($user,1); //重组数组
		$d_member=D('MemberNews');
		$member_news=$d_member->getNews(15,$id); //获取会员动态
		$d_user->setViewAdd($id);
		if (!$d_user) $this->error("点击量写入失败！");

		$title=$common['user']['username']." - ".$common['website']['site_title'];

		$this->assign('title',$title);
		$this->assign('user',$user); 
		$this->assign('common',$common);
		$this->assign('member_news',$member_news);
		C('TOKEN_ON',false);
		$this->display();
	}
	/*
	 * 用户登录
	 */
	public function login()
	{
		$p=A('Public');	
		$common=$p->common();
		if (!empty(session('user_id'))) $this -> redirect('index');    
		$title='用户登陆 - '.$common['website']['site_title'];
		if (IS_POST) 
		{
			$username=I('post.username');	
			$password=I('post.password');
			$d_user=D('User');
			$verify_data=array(	
				'verify'	=>	I('post.verify'),
				'username'	=>	$username,
				'password'	=>	$password,
				'__hash__'	=>  I('post.__hash__'),
			);
			if (!$d_user->create($verify_data)) { //自动验证
				$errmsg=$d_user->getError();
			}else {
				$u=M('User');
				$where['username']=$username;
				$verify_msg=$u->where($where)->getField('password');
				if ($verify_msg) {
					if ($password==authcode($verify_msg,'DECODE')) {
						$user_id=$u->where($where)->getField('id');
						session('user_id',$user_id);  //将用户id写入session,记录登录状态
						if (empty(session('user_id'))) {
							$errmsg="登录失败！";
						}else{
							$data_time['last_login_time']=date('Y-m-d H:i:s',time());
							if (!$u->where('id='.session('user_id'))->save($data_time)) {
								$this->error("写入最后登录时间失败！",'/');
							}
							$this->success("登陆成功！",U('Member/'.session('user_id')));
							exit;
							}
					}else{
						$errmsg="用户名或密码不正确！";
					}
				}else{
					$errmsg="用户名不存在！";
				}
			}
		}
		$this->assign('common',$common);
		$this->assign('title',$title);
		$this->assign('errmsg',$errmsg);
		$this -> display();
	}
	/*
	 * 用户注册
	 */
	public function register(){
		$p=A('Public');
		$common=$p->common();
		if (!empty(session('user_id'))) $this -> redirect('index'); 
		if ($common['website']['site_register']==0) $this -> error("注册功能已关闭！");
		$title='用户注册 - '.$common['website']['site_title'];
		if (IS_POST) {
			$d_user=D('User');
			$verify_data=array(
				'verify'	=>	I('post.verify'),
				'username'	=>	I('post.username'),
				'email'		=>	I('post.email'),
				'password'	=>	I('post.password'),
				'repassword'=>	I('post.repassword'),
				'__hash__'	=>  I('post.__hash__'),
			);
			if (!$d_user->create($verify_data,'add')) { //自动验证
				$errmsg=$d_user->getError();
			}else {
				//用户信息写入数据库
				$data=array(
					'username'	=>	I('post.username'),
					'email'		=>	I('post.email'),
					'password'	=>	authcode(I('post.password')),
					'register_time'	=>	date('Y-m-d H:i:s',time()),
					
				);
				$u=M('User');
				$r=$u->add($data);
				if ($r>0) {
					session('user_id',$r);
					/* 发送欢迎消息 */
					D('Message')->setMessage($r, 1, "欢迎注册SLBBS，请遵守论坛秩序！谢谢合作！此消息为系统自动发送，请勿回复！");
					D('User')->upUnReadMsg($r); //更新未读私信
					$this->success("注册成功，自动登录中。。。",'/');
					exit();
				}else{
					$errmsg="注册失败！";
				}
			}
		}
		$this->assign('common',$common);
		$this->assign('title',$title);
		$this->assign('errmsg',$errmsg);
		if (!empty(session('user_id'))) $this -> redirect('index'); 
		else $this -> display();
	}
	/**
	 * 编辑用户
	 */
	public function edit(){
		$p=A('Public');
		$common=$p->common();
		is_login(); //判断是否登陆
		$id=session('user_id'); //用户id号
		$d_u=D('User');
		$user=$d_u->getUserById($id);
		if (!$user) $this->error("查无此用户！");
		/* 数组重组 */
		$user_arr=array();
		foreach ($user as $key => $value) {
			switch ($key){
				case "avatar":
					if ($value==0) {
						$user_arr['avatar_url']="http://".SLBBS_ROOT."/Public/icon/avatar/default.png";
					}else {
						$user_arr['avatar_url']="http://".SLBBS_ROOT."/Public/icon/avatar/".$value."";
					}
					break;
				default:
					$user_arr[$key]=$value;
			}
		}
		if (IS_POST) {
			$verify_data=array(
				'email'	=>	I('post.email'),
			);
			if (!empty(I('post.password'))) {
				$verify_data=array(
					'password'		=>	I('post.password'),
					'repassword'	=>	I('post.repassword'),
				);
			}
			$verify_data['__hash__'] = I('post.__hash__');
			if (!$d_u->create($verify_data)) {
				$msg=$d_u->getError();
			}else{
				if (!empty(I('post.password'))) $verify_data['password']=authcode($verify_data['password']); 
				$verify_data['sex']=I('post.sex');
				if (!empty(I('post.phone'))) $verify_data['phone']=I('post.phone');
				if (!empty(I('post.qq'))) $verify_data['qq']=I('post.qq');
				if (!empty(I('post.sign'))) $verify_data['sign']=I('post.sign');
				//var_dump($verify_data);
				$r=$d_u->where('id=%d',$id)->save($verify_data);
				if ($r>0) {
					$msg="更新成功!";
				}else{
					$msg="更新失败！(可能原因:个人资料没有的发生改变)";
				}	
			}
		}
		if (!empty(I('get.msg'))) $msg=I('get.msg');
		$title="编辑资料 - ".$user['username']." - ".$common['website']['site_title']."";

		$this->assign('title',$title);
		$this->assign('common',$common);
		$this->assign('user',$user_arr);
		$this->assign('msg',$msg);
		$this->display();
	}
	/**
	 * 上传图像
	 */
	public function upavatar(){
		if (!IS_POST) {
			$this->error("页面错误！");
		}
		$id=session('user_id');
		$config = array(
    		'maxSize'    =>    102400,
    		'rootPath'   =>    './Public/icon/avatar/',
    		'savePath'   =>    '',
    		'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
		);
 		$upload = new \Think\Upload($config);// 实例化上传类
    	// 上传文件 
    	$info = $upload->upload();
    	if(!$info) {
    		$this->redirect('User/edit?msg='.$upload->getError().'');
    	}else{
    		$u=M('User');
    		//如果已存在图像，则删除之前图像
    		$r=$u->where('id=%d',$id)->getField('avatar');
			if ($r) {
				$path="./Public/icon/avatar/".$r;
				unlink($path); //删除文件
				if (file_exists($path) == true) {
					$this->redirect('User/edit?msg=历史图像删除失败！');
				}
			}
    		//路径写入数据库
    		$data=array();
    		foreach($info as $file){
    			$data['avatar']=$file['savepath'].$file['savename'];
   			}
   			if (!$u->where('id=%d',$id)->save($data)) $this->redirect('User/edit?msg=写入路径失败！');
   			else $this->redirect('User/edit?msg=上传成功！');
    	}
	}
	/*
	 * 用户退出
	 */
	public function unlogin(){
		if(!session('?user_id')){
			$this->error("你已经退出登陆了、无需重复退出！",'/');
		}
		session(null);
		if(session('?user_id')){
			$this->error("退出登录失败！");
		}else{
			$this->success("退出成功，正在转向首页。。",'/');
		}
	}
	
	/**
	 * [regroup 用户数组重组]
	 * @param  [type] $arr  [传入数组]
	 * @param  [type] $type [一维或二维数组]
	 * @return [type]       [数组]
	 */
	public function regroup($arr,$type){
		$user_arr=array();
		if ($type==1) {
			foreach ($arr as $key => $value){
				switch ($key){
					case 'sex':
						if ($value==0) $user_arr['sex']='女';
						else $user_arr['sex']='男';
						break;
					case 'power':
						if ($value==99) {
							$user_arr['power']='<font color="red">超级管理员</font>';
							$user_arr['admin'] = 1;
						}elseif ($value==3) $user_arr['power']='<font color="orange">版主</font>';
						elseif ($value==2) $user_arr['power']='<font color="green">总版主</font>';
						elseif ($value==1) $user_arr['power']='普通会员';
						break;
					case "avatar":
						if ($value==0) {
							$user_arr['avatar_url']="http://".SLBBS_ROOT."/Public/icon/avatar/default.png";
						}else {
							$user_arr['avatar_url']="http://".SLBBS_ROOT."/Public/icon/avatar/".$value."";
						}	
						break;
					case 'last_login_time': $user_arr['last_login_time']=date("Y-m-d",strtotime($value));
						break;
					case 'register_time': $user_arr['register_time']=date("Y-m-d",strtotime($value));
						break;
					default:
					$user_arr[$key]=$value;
				}
			}
		}else if ($type==2) {
			foreach ($arr as $key => $value){
				foreach ($value as $_key => $_value) {
					switch ($_key){
						case 'id':
							$user_arr[$key]['url']=U('Member/'.$_value.'');
							break;
						case 'sex':
							if ($_value==0) $user_arr[$key]['sex']='女';
							else $user_arr[$key]['sex']='男';
							break;
						case 'power':
							if ($_value==99) $user_arr[$key]['power']='<font color="red">超级管理员</font>';
							elseif ($_value==3) $user_arr[$key]['power']='<font color="orange">版主</font>';
							elseif ($_value==2) $user_arr[$key]['power']='<font color="green">总版主</font>';
							elseif ($_value==1) $user_arr[$key]['power']='普通会员';
							break;
						case "avatar":
							if ($_value==0) {
								$user_arr[$key]['avatar_url']="http://".SLBBS_ROOT."/Public/icon/avatar/default.png";
							}else {
								$user_arr[$key]['avatar_url']="http://".SLBBS_ROOT."/Public/icon/avatar/".$_value."";
							}	
							break;
						case 'last_login_time': $user_arr[$key]['last_login_time']=date("Y-m-d",strtotime($_value));
							break;
						case 'register_time': $user_arr[$key]['register_time']=date("Y-m-d",strtotime($_value));
							break;
						default:
						$user_arr[$key][$_key]=$_value;
					}
				}
			}
		}
		
		return $user_arr;
	}
}

?>