<?php
/**
* MessageModel.class.php 文件
* ==============================================
* 版权所有 2015-2020 http://www.slbbs.com
* ----------------------------------------------
* 这不是一个自由软件，未经授权不许任何使用和传播。
* ==============================================
* @date: 2015-6-1 下午5:14:27
* @author: BO
* @version: 1.0
*/
namespace Home\Model;
use Think\Model;
class MessageModel extends Model{
	/**
	 * 获取信息列表数据
	 * @param 	int 	$uid 	用户id
	 * @param 	int 	$sta	从哪开始
	 * @param 	int 	$num	取几条
	 * @param 	string 	$type	类型 inbox=>收件箱 outbox=>发件箱
	 * @return 	unknown	$res	二维数组
	 */
	public function getMessage( $uid, $sta, $num){
		$uid=addslashes($uid);
		$sta=addslashes($sta);
		$num=addslashes($num);
		$sql="SELECT
			sl_message.id,
			sl_message.content,
			sl_message.time,
			sl_message.uid,
			sl_message.read_on,
			sl_message.read_time,
			sl_user.username,
			sl_user.avatar
		FROM sl_message LEFT JOIN sl_user
			ON sl_message.uid=sl_user.id
		WHERE (sl_message.send_id=%d OR sl_message.uid=%d) AND sl_message.message_id=0
			ORDER BY sl_message.read_on, sl_message.time DESC LIMIT %d,%d";
		$res=$this->query($sql, $uid, $uid, $sta, $num);
		return $res;
		//var_dump($res);
	}
	/**
	 * [getMessageById 获取私信主体部分]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function getMessageById($id ,$type='inbox') {
		$id = addslashes($id);
		$type=addslashes($type);
		if ($type=='inbox') {
			$sql = "SELECT
				sl_message.id,
				sl_message.content,
				sl_message.time,
				sl_message.send_id,
				sl_message.read_on,
				sl_message.read_time,
				sl_message.uid,
				sl_message.message_id,
				sl_user.username,
				sl_user.avatar
			FROM sl_message LEFT JOIN sl_user
				ON sl_message.uid=sl_user.id
			WHERE sl_message.id=%d";
		}else if ($type=='outbox') {
			$sql = "SELECT
				sl_message.id,
				sl_message.content,
				sl_message.time,
				sl_message.send_id,
				sl_message.read_on,
				sl_message.uid,
				sl_message.message_id,
				sl_user.username,
				sl_user.avatar
			FROM sl_message LEFT JOIN sl_user
				ON sl_message.send_id=sl_user.id
			WHERE sl_message.id=%d";
		}
		
		$res = $this ->query($sql,$id);
		$arr=array();
		foreach ($res as $key => $value) {
			foreach ($value as $_key => $_value) {
				$arr[$_key] = $_value;
			}
		}
		return $arr;
	}
	/**
	 * [getConMessage 获取对话页面私信列表]
	 * @param  [int] $id  [对话主ID]
	 * @param  [int] $sta [从哪开始]
	 * @param  [int] $num [取列表数量]
	 * @return [array]    [返回数组]
	 */
	public function getConMessage($id ,$sta ,$num ) {
		$id=addslashes($id);
		$sta=addslashes($sta);
		$num=addslashes($num);
		$sql="SELECT
			sl_message.id,
			sl_message.content,
			sl_message.time,
			sl_message.uid,
			sl_message.read_on,
			sl_message.send_id,
			sl_message.read_time,
			sl_user.username,
			sl_user.avatar
		FROM sl_message LEFT JOIN sl_user
			ON sl_message.uid=sl_user.id
		WHERE sl_message.message_id=%d
			ORDER BY sl_message.time DESC LIMIT %d,%d";
		/* 使用预处理可以有效地防止sql注入 */
		$res=$this->query($sql, $id, $sta, $num);
		return $res;
	}
	/**
	 * [getUnReadMessage 获取用户未读内信]
	 * @param  [int] $uid [接受信息用户ID]
	 * @return [string]   [私信条数]
	 */
	public function getUnReadMessage($uid, $type){
		$uid=addslashes($uid);
		$sql="SELECT COUNT(id) FROM sl_message WHERE send_id=%d AND read_on=0 AND message_id=0";
		$res=$this->query($sql, $uid);
		$n=$res[0]['count(id)'];
		return $n;
	}
	/**
	 * [getMessageNum 获取私信条数，用于分页]
	 * @param  string $type [统计属性：list=>inbox页面私信统计 m=>私信对话统计]
	 * @param  int 	$id  [type属性为m时必选，传入私信对话ID]
	 * @return [type]       [description]
	 */
	public function getMessageNum($type = 'list', $id = 0){
		$r=0;
		$uid = session('user_id');
		if ($type == 'list') {
			$sql = "SELECT count(id) FROM sl_message WHERE message_id=0 AND (send_id=%d OR uid=%d)";
			$res = $this->query($sql, $uid, $uid);
			$r = $res[0]['count(id)'];
		}elseif ($type == 'm') {
			$r = $this->where('message_id = %d', $id)->count('id');
		}
		return $r;
	}
	/**
	 * [upReadMessage 更新私信阅读状态]
	 * @param  [int] $id [私信ID]
	 * @return [bool]     [description]
	 */
	public function upReadMessage($id){
		$id=addslashes($id);
		$data['read_on']=1;
		$data['read_time']=date('Y-m-d H:i:s',time());
		$r=$this->where("id=$id")->save($data); //更新私信对话是否阅读
	}
	/**
	 * [setMessage 发送私信消息]
	 * @param [int] $send_id  [传入接受信息的用户ID]
	 * @param [int]	$uid	[发送者用户ID]
	 * @param [int]	$message_id	[所属消息ID，默认为0]
	 * @param [bool]  [真或假]
	 */
	public function setMessage($send_id, $uid, $str, $message_id=0){
		$send_id=addslashes($send_id);
		$uid=addslashes($uid);
		if ($uid = 1) {
			$content=$str;
		}else{
			$content=htmlspecialchars($str);
		}
		$message_id=addslashes($message_id);
		$time=date("Y-m-d H:i:s",time());
		$sql="INSERT INTO sl_message (content,time,send_id,uid,message_id) values ('%s','%s',%d,%d,%d)";
		$r=$this->execute($sql, $content ,$time ,$send_id ,$uid ,$message_id);
		if ($r>0) return true;
		else return false;
	}
}
?>