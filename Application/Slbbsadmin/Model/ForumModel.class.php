<?php 

namespace Slbbsadmin\Model;
use Think\Model;

class ForumModel extends Model{
	
	/**
	 * 获取分类详细列表
	 * @param $sta 从第几条取
	 * @param $num 取几条
	 */
	public function getForumList($sta = 0, $num = 100) {
		
		$sql = "SELECT sl_forum.id, 
					sl_forum.sort_id, 
					sl_forum.name, 
					sl_forum.intor, 
					sl_forum.icon, 
					sl_forum.hot,
					sl_forum.time,
					sl_forum.allow,
					sl_forum.order,
					sl_forum.topic_count,
					sl_forum.comment_count,
					sl_sort.sort_name
				FROM sl_forum 
				LEFT JOIN sl_sort ON sl_forum.sort_id = sl_sort.id 
				ORDER BY sl_forum.sort_id,sl_forum.order
				LIMIT %d,%d";
		$res = $this ->query($sql, $sta, $num);
		return $res;
		
	}
}

?>