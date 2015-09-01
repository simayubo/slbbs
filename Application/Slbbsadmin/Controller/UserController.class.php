<?php
/**
 * 用户控制类
 */
namespace Slbbsadmin\Controller;
use Think\Controller;

class UserController extends Controller
{
	/**
	 * 用户管理列表
	 */
	public function index($search = ''){
		$p = A('Public');
		$common = $p ->common();
		$__MENU__ = $p ->base();
		$__MENU__['main'][2]['class'] = 'current';
		$__MENU__['child']  = array(
			'用户管理' => array(
				0 => array(
              		'title' =>  '用户列表' ,
              		'url' 	=>  'User/index' ,
					),
				1 => array(
              		'title' =>  '权限管理' ,
              		'url' 	=> 'User/auth' ,
					),
				),
			'行为管理' => array(
				0 => array(
              		'title' =>  '用户行为' ,
              		'url' 	=>  'User/action' ,
					),
				),
			);
		// ==== 分页 ==== //
		$num = 15; //每页显示几条
    	$page_count=ceil((M('User')->count('id'))/$num); //总页数
    	$page_now = empty(I('get.page'))?1:I('get.page'); //当前页
    	$action = 'Slbbsadmin/User/index/page';
    	$page = $p ->pageShow($page_count, $page_now, $action);

		$user = auth_string(D('User') ->getUserList(($page_now-1)*$num,$num));
		if ($page_now == 1) {
			unset($user[0]); //去除系统用户
		}

		$title = '用户管理 - Slbbs后台管理平台';
		
		$this -> assign('title', $title);
		$this -> assign('common', $common);
		$this -> assign('__MENU__', $__MENU__);
		$this -> assign('user', $user);
		$this -> assign('page', $page);
		$this -> display();
	}
	/**
	 * [login 后台登陆]
	 */
	public function login(){
		empty( session('admin') ) ?'': $this->redirect('Index/index');
		if (IS_POST) {
			if (empty($_POST['verify']) || empty($_POST['username']) || empty($_POST['password'])) {
				$msg='请完整填写表单！';
			}else{
				$verify = new \Think\Verify();
 				if ($verify -> check(I('post.verify'), 1)) {
 					$d_user = M('User');
 					$where['username'] = I('post.username');
 					$where['power'] = 99;
 					$verify_password = $d_user ->where($where) ->getField('password');
 					if (!$verify_password) {
 						$msg='管理员账号或密码错误！';
 					}else{
 						$verify_password=authcode($verify_password,'DECODE');
 						if (I('post.password') == $verify_password) {
 							$uid=$d_user->where($where)->getField('id');
 							session('admin',$uid); //写入session
 							if (empty(session('admin'))) {
 								$msg='登录失败！请联系管理员！';
 							}else {
 								if (empty(session('user_id'))) {
 									session('user_id',$uid); //自动登录前台
 								}
								$data_time['last_login_time']=date('Y-m-d H:i:s',time());
								if (!$d_user->where('id='.session('user_id'))->save($data_time)) {
									$this->error("写入最后登录时间失败！",'/');
								}
 								$this->success('登陆成功！正在跳转。。。',U('Index/index'));
 								exit();
 							}
 						}else{
 							$msg='管理员账号或密码错误！';
 						}
 					}
 				}else{
 					$msg='验证码错误！';
 				}
			}
		}

		$title='后台登陆';

		$this->assign('title',$title);
		$this->assign('common',$common);
		$this->assign('msg',$msg);
		$this->display();
	}
	/**
	 * 修改用户权限
	 * @param  [type] $id    用户id
	 * @param  [type] $value 权限标识
	 */
	public function authManager($id, $value){
		is_login();
		if (IS_GET) {
			$data = array(
			'id' 	=> 	addslashes($id),
			'power' =>	htmlspecialchars($value),
			);
			$r = M('User') ->save($data);
			if ($r >0) {
				$this ->redirect('Slbbsadmin/User/index');
				//echo "<script>alert('修改权限成功！')</script>";
			}else {
				$this ->error('修改失败！');
			}
		}else{
			$this ->error('页面错误··');
		}
		
	}
	public function delUser($id){

	}
	/**
	 * 退出后台登陆
	 */
	public function outLogin() {
		if (empty(session('admin'))) {
			$this ->error('你已经退出过了，无需重复退出！');
		}else{
			session('admin',null);
			if (empty(session('admin'))) {
				$this ->success('后台退出登录成功，正在跳转首页。。','/');
			}else{
				$this ->error('后台退出登录失败！');
			}
		}
	}
}
?>