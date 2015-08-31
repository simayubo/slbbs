<?php 
/**
* 后台评论操作数据层
*/
namespace Slbbsadmin\Model;
use Think\Model;
class CommentModel extends Model
{
	
	/**
	 * 获取评论列表
	 * @param  integer $sta   从哪开始
	 * @param  integer $num   取几条
	 * @param  string  $where 条件
	 * @param  string  $value 条件值
	 * @return [type]         评论列表二维数组
	 */
	public function getCommentList($sta = 0, $num = 15, $where = '', $value = ''){
		$arr = array();
		if (empty($where)) {
			$sql = "SELECT 
			sl_comment.cid,sl_comment.tid,sl_comment.uid,sl_comment.hide,sl_comment.content,sl_comment.time,sl_user.username 
			FROM sl_comment 
			LEFT JOIN sl_user ON sl_comment.uid=sl_user.id 
			ORDER BY sl_comment.cid DESC LIMIT %d,%d ";
			$arr = $this ->query($sql, $sta, $num);
		}else{
			$sql = "SELECT 
			sl_comment.cid,sl_comment.tid,sl_comment.uid,sl_comment.content,sl_comment.time,sl_user.username 
			FROM sl_comment 
			LEFT JOIN sl_user ON sl_comment.uid=sl_user.id 
			WHERE %s=%s 
			ORDER BY sl_comment.cid DESC LIMIT %d,%d ";
			//var_dump($sql);
			$arr = $this ->query($sql, $where, $value, $sta, $num);
		}
		return $arr;
	}
	
}

?>