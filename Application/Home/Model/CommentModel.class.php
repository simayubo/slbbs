<?php
/**
 * 回复Model类
 */
namespace Home\Model;
use Think\Model;
class CommentModel extends Model{

	protected $_validate = array(
		array('content','require','评论内容不能为空！'),
		array('content','3,1000','内容限定为3-1000个字符！',2,'length'),
	); 
	/**
	 * 获取对应帖子评论总数（分页）
	 */
	function getNumComment($tid){
		$tid=addslashes($tid);
		$r=$this->where('tid=%d',$tid)->count('cid');
		return $r;
	}
	/**
	 * 获取对应帖子数量评论数组
	 */
	function getComment($tid,$sta,$num){
		$tid=addslashes($tid);
		$sta=addslashes($sta); //从哪开始
		$num=addslashes($num); //取几条
		$sql="SELECT sl_comment.cid,sl_comment.bid,sl_comment.hide,sl_comment.time,sl_comment.content,sl_user.id,sl_user.username,sl_user.avatar
				FROM sl_comment
				LEFT JOIN sl_user ON sl_comment.uid=sl_user.id 
				WHERE tid=%d ORDER BY cid LIMIT %d,%d";
		$res=$this->query($sql,$tid,$sta,$num);
		if ($res) return $res;
		else return false;
	}
	
}



?>