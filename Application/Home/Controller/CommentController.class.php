<?php
/**
* CommentController.class.php 文件
* ==============================================
* 版权所有 2015-2020 http://www.slbbs.com
* ----------------------------------------------
* 这不是一个自由软件，未经授权不许任何使用和传播。
* ==============================================
* @date: 2015-6-1
* @author: BO
* @version:
*/
namespace Home\Controller;
use Think\Controller;
class CommentController extends Controller{
	
	/**
	 * 
	 * @param int $tid
	 * @param int $uid
	 * @param int $str
	 * @return boolean
	 */
	function checkComment($tid,$uid,$str){
		$c=M('Comment');
		$tid=addslashes($tid);
		$uid=addslashes($uid);
		$where['tid']=$tid;
		$where['uid']=$uid;
		$where['content']=$str;
		$r=$c->where($where)->count('cid');
		if ($r>0) return true;
		else return false;
	}
}


?>