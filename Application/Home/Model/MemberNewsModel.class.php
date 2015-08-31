<?php
/**
* 会员动态表操作
*/
namespace Home\Model;
use Think\Model;
class MemberNewsModel extends Model
{
	/**
	 * $con : 写入的动态内容 $user_id 用户ID
	 */
	function setNews($con,$user_id){
		$data = array(
			'content' 	=> 	$con,
			'time'		=>	date('Y-m-d H:i:s',time()),
			'user_id'	=>	addslashes($user_id), 
		);
		if ($this->add($data)) return true;
		else return false;
	}
	/**
	 * 获取前n条动态 by:user_id
	 */
	function getNews($n,$user_id){
		$r=$this->where("user_id=%d",addslashes($user_id))->order('id desc')->limit(intval($n))->select();
		if ($r) return $r;
		else  return false;
	}
}

?>