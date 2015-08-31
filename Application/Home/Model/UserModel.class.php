<?php
namespace Home\Model;
use Think\Model;


class UserModel extends Model{
	/*
	 * 自动验证
	 */
	protected $_validate = array(
		array('verify','require','验证码不能为空！'),
		array('verify','checkVerify','验证码错误',0,'callback'),
		array('username','require','用户名不能为空!'),
		array('username','/^[a-zA-Z0-9_]{2,10}$/','用户名只允许英文字母、数字和下划线2-10个字符！'),
		array('email','require','邮箱不能为空!'),
		array('email','email','邮箱格式不正确!'),
		array('email','','邮箱已存在',0,'unique','add'),
		array('password','require','密码不能为空！'),
		array('password','/^[a-zA-Z0-9_]{5,20}$/','密码只允许英文字母、数字和下划线5-20个字符！'),
		array('repassword','require','验证密码不能为空！'), 
		array('repassword','password','两次密码不一致！',0,'confirm'), 
		array('username','','此用户名已经存在',0,'unique','add'),
	); 
	/**
	 * 验证码，用于自动验证
	 */
	public function checkVerify() {
 		$verify = new \Think\Verify();
 		if ($verify->check(I('post.verify'), 1)) return true;
 		else return false;
 	}
	/*
	 * 公共函数读取用户信息
	 */
	function getCommonUser($id){
		$id=addslashes($id);
		$sql="SELECT id,username,avatar,power,unmessage FROM sl_user WHERE id=%d";
		$arr=$this->query($sql,$id);
		$user_arr=array();
		foreach ($arr as $key => $value) {
			foreach ($value as $_key => $_value) {
				$user_arr[$_key]=$_value;
			}
		}
		return $user_arr;
	}
	/*
	 * 获取对应用户ID信息
	 */
	function getUserById($id){
		$id=addslashes($id);
		$sql="SELECT id,username,age,sex,phone,email,sign,avatar,power,qq,topic_count,reply_count,money,message,unmessage,last_login_time,register_time,views FROM sl_user WHERE id=%d";
		$arr=$this->query($sql,$id);
		if (!$arr) {
			return false;
			exit();
		}
		$user_arr=array();
		foreach ($arr as $key => $value) {
			foreach ($value as $_key => $_value) {
				$user_arr[$_key]=$_value;
			}
		}
		return $user_arr;
	}
	/*
	 * 取用户列表
	 * $num : 数量
	 */
	function getUserList($num){
		$num=addslashes($num);
		$sql="SELECT id,username,avatar,topic_count,reply_count FROM sl_user ORDER BY reply_count+topic_count DESC LIMIT %d";
		$res=$this->query($sql,$num);
		return $res;
	}
	/*
	 * 用户主页访问+1
	 */
	function setViewAdd($id){
		$id=addslashes($id);
		$sql="UPDATE sl_user SET views=views+1 WHERE id=%d";
		$r=$this->execute($sql,$id);
		return $r;
	}
	/*
	 * 为用户增加金钱数量 $num: 数量 $id: 用户ID
	 */
	function setMoneyAdd($id,$num){
		$num=addslashes($num);
		$id=addslashes($id);
		$sql="UPDATE sl_user SET money=money+%d WHERE id=%d";
		$r=$this->execute($sql,$num,$id);
		return $r;
	}
	/*
	 * 计算帖子数量且写入 $id:用户ID
	 */
	function setTopicCount($id)
	{
		$id=addslashes($id);
		$t=M('Topic');
		$num=$t->where("user_id=%d",$id)->count('id');
		$sql="UPDATE sl_user SET topic_count=%d WHERE id=%d";
		$r=$this->execute($sql,$num,$id);
		return $r;
	}
	/*
	 * 计算回复数量且写入 $id:用户ID
	 */
	public function setReplyCount($id)
	{
		$id=addslashes($id);
		$c=M('Comment');
		$num=$c->where("uid=%d",$id)->count('cid');
		$sql="UPDATE sl_user SET reply_count=%d WHERE id=%d";
		$r=$this->execute($sql,$num,$id);
		return $r;
	}
	/**
	 * [unReadMsg 更新未读私信]
	 * @param  [int] $uid  [接受私信用户ID]
	 * @return bool       [返回布尔值]
	 */
	public function upUnReadMsg($uid){
		$uid=addslashes($uid);
		$n=D('Message')->getUnReadMessage($uid);
		$sql="UPDATE sl_user SET unmessage=%d WHERE id=%d";
		$r=$this->execute($sql, $n, $uid);
		if ($r>0) return true;
		else return false;
	}


}

?>