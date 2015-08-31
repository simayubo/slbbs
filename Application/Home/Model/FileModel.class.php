<?php 
/*
 * 附件Model类
 */
namespace Home\Model;
use Think\Model;

class FileModel extends Model
{
	/**
	 * $table: 操作的表; $bid: 要操作的id号
	 */
	function getFileList($table,$bid)
	{
		$table=addslashes($table);
		$bid=addslashes($bid);
		$sql="SELECT id,file_name,file_size,file_path,type FROM sl_file WHERE file_table='%s' AND bid=%d";
		return $this->query($sql,$table,$bid);
	}
}

?>