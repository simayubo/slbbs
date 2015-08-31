<?php
/**
* 帖子操作模型
*/
namespace Slbbsadmin\Model;
use Think\Model;
class TopicModel extends Model
{
	/**
	 * 获取帖子列表
	 * @param  integer $sta   从哪开始
	 * @param  integer $num   取几条
	 * @param  string  $where 条件
	 * @param  string  $value 条件值
	 * @return [type]         帖子列表二维数组
	 */
	public function getTopicList($sta = 0, $num = 15, $where = '', $value = ''){
		$arr = array();
		if (empty($where)) {
			$sql = "SELECT 
			sl_topic.id,sl_topic.title,sl_topic.top,sl_topic.best,sl_topic.hide,sl_topic.views,sl_topic.reply,sl_topic.user_id,sl_topic.forum_id,sl_user.username,sl_forum.name 
			FROM sl_topic 
			LEFT JOIN sl_user ON sl_topic.user_id=sl_user.id 
			LEFT JOIN sl_forum ON sl_topic.forum_id=sl_forum.id 
			ORDER BY sl_topic.id DESC LIMIT %d,%d ";
			$arr = $this ->query($sql, $sta, $num);
		}else{
			$sql = "SELECT 
			sl_topic.id,sl_topic.title,sl_topic.top,sl_topic.best,sl_topic.hide,sl_topic.views,sl_topic.reply,sl_topic.user_id,sl_topic.forum_id,sl_user.username,sl_forum.name 
			FROM sl_topic 
			LEFT JOIN sl_user ON sl_topic.user_id=sl_user.id 
			LEFT JOIN sl_forum ON sl_topic.forum_id=sl_forum.id 
			WHERE %s=%s 
			ORDER BY sl_topic.id DESC LIMIT %d,%d ";
			//var_dump($sql);
			$arr = $this ->query($sql, $where, $value, $sta, $num);
		}
		return $arr;
	}
	
}


?>