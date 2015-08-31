<?php
/**
 *  分类管理Model类
 **/

namespace Slbbsadmin\Model;
use Think\Model;

class SortModel extends Model{
	
	public function getSortList($sta = 0 , $num = 25){
		$sql = "SELECT * FROM sl_sort LIMIT %d,%d";
		$res = $this ->query($sql, $sta, $num);
		return $res;
	}
}

?>