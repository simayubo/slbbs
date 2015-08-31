<?php
/**
 * 用户表数据操作
 */
namespace Slbbsadmin\Model;
use Think\Model;

class UserModel extends Model
{
	/**
	 * [getUserCon 获取单个用户信息]
	 * @param  string $id 用户id
	 * @return [type]     [description]
	 */
	public function getUserCon ($id = ''){
		$sql = "SELECT id,username,power FROM sl_user WHERE id=%d";
		$res = $this ->query($sql, $id);
		$arr = array();
		foreach ($res as $key => $value) {
			foreach ($value as $_key => $_value) {
				$arr[$_key] = $_value;
			}
		}
		return $arr;
	}
	/**
	 * 获取用户列表
	 * @param  integer $sta 从哪开始
	 * @param  integer $num 取条数
	 * @return [type]       数组
	 */
	public function getUserList($sta = 0, $num = 15) {
		$sql = "SELECT id,username,money,register_time,last_login_time,power,topic_count,reply_count FROM sl_user ORDER BY id LIMIT %d,%d";
		$arr = $this ->query($sql, $sta, $num);
		return $arr;
	}
}

?>