<?php
/*
 * 帖子模块 Model类
 */
namespace Home\Model;
use Think\Model;
class TopicModel extends Model
{
	/**
	 * 自动验证
	 */
	protected $_validate  =  array(
		array('verify','require','验证码不能为空！'),
		array('verify','checkVerify','验证码错误',0,'callback'),
 		array('title','require','标题不能为空！'),
 		array('title','3,50','标题限定为3-50个字符！',1,'length'),
 		array('forum_id','require','分类不能为空！'),
 		array('content','require','内容不能为空！'),
 		array('content','chickCount','内容必须不低于6个字符!!!',0,'callback'),
 		array('title','','标题已经存在',0,'unique','add'),
 	);
 	/**
	 * 验证码，用于自动验证
	 */
	function checkVerify() {
 		$verify = new \Think\Verify();
 		if ($verify->check(I('post.verify'), 1)) return true;
 		else return false;
 	}
 	/**
 	 * 检查内容长度
 	 */
 	function chickCount($a, $b=6) { 
		$countA = strlen(strip_tags($a)); 
		if($countA >= $b) { 
   			return true ; 
		}else { 
   			return false ; 
		} 
	} 
	/*
	 * 获取首页置顶帖子
	 * $num ：取首页置顶帖子数量
	 */
	function getIndexTop($num)
	{
		$num=addslashes($num);
		$sql="SELECT sl_topic.id,sl_topic.title,sl_topic.date,sl_topic.last_date,sl_topic.views,sl_topic.reply,sl_topic.user_id,sl_topic.forum_id,sl_forum.name,sl_user.username,sl_user.avatar
			FROM sl_topic
			LEFT JOIN sl_user ON sl_topic.user_id=sl_user.id
			LEFT JOIN sl_forum ON sl_topic.forum_id=sl_forum.id
			WHERE sl_topic.top=3
			ORDER BY sl_topic.id DESC LIMIT %d";
		$res=$this->query($sql,$num);
		return $res;
	}
	/*
	 * 获取首页最新帖子
	* $num ：取帖子数量
	*/
	function getIndexNew($sta,$sto)
	{
		$num=addslashes($sta);
		$num=addslashes($sto);
		$sql="SELECT sl_topic.id,sl_topic.title,sl_topic.date,sl_topic.views,sl_topic.reply,sl_topic.home_top,sl_topic.best,sl_topic.user_id,sl_topic.forum_id,sl_forum.name,sl_user.username,sl_user.avatar
				FROM sl_topic
				LEFT JOIN sl_user ON sl_topic.user_id=sl_user.id
				LEFT JOIN sl_forum ON sl_topic.forum_id=sl_forum.id 
				ORDER BY sl_topic.home_top DESC,sl_topic.id DESC LIMIT %d,%d;";
		$res=$this->query($sql,$sta,$sto);
		return $res;
	}
	/*
	 * 获取首页热门帖子
	* $num ：取首页置顶帖子数量
	*/
	function getIndexHot($num)
	{
		$num=addslashes($num);
		$sql="SELECT sl_topic.id,sl_topic.title,sl_topic.date,sl_topic.views,sl_topic.reply,sl_topic.user_id,sl_topic.forum_id,sl_forum.name,sl_user.username,sl_user.avatar
				FROM sl_topic
				LEFT JOIN sl_user ON sl_topic.user_id=sl_user.id
				LEFT JOIN sl_forum ON sl_topic.forum_id=sl_forum.id
				ORDER BY sl_topic.reply DESC LIMIT %d;";
		$res=$this->query($sql,$num);
		return $res;
	}
	/*
	 * 获取单篇帖子
	* $id ：帖子ID
	*/
	function getTopicById($id)
	{
		$id=addslashes($id);
		$sql="SELECT sl_topic.id,sl_topic.title,sl_topic.content,sl_topic.top,sl_topic.date,sl_topic.last_date,sl_topic.views,sl_topic.hide,sl_topic.reply,sl_topic.best,sl_topic.user_id,sl_topic.forum_id,sl_forum.name,sl_user.username,sl_user.sign,sl_user.avatar
				FROM sl_topic
				LEFT JOIN sl_user ON sl_topic.user_id=sl_user.id
				LEFT JOIN sl_forum ON sl_topic.forum_id=sl_forum.id
				WHERE sl_topic.id=%d";
		$res=$this->query($sql,$id);
		$arr=array();
		foreach ($res as $key=>$value) {
			foreach ($value as $_key => $_value) {
				$arr[$_key]=$_value;
			}
		}
		return $arr;
	}
	/*
	 * 获取内页侧栏最新帖子列表
	* $num : 取其数量
	*/
	function getSideNewTopic($num)
	{
		$id=addslashes($num);
		$sql="SELECT id,title FROM sl_topic ORDER BY id DESC LIMIT %d";
		$res=$this->query($sql,$num);
		return $res;
	}
	/*
	 * 统计回复数
	 */
	function setReplyAdd($tid)
	{
		$tid=addslashes($tid);
		$t=M('Comment');
		$num=$t->where("tid=%d",$tid)->count('cid');
		$sql="UPDATE sl_topic SET reply=%d WHERE id=%d";
		$r=$this->execute($sql,$num,$tid);
		return $r;
	}
	/*
	 * 取帖子总量(分页)
	 * $type : 帖子属性
	 * $forum: 若查询分类帖子数量，为版块ID
	 */
	function getTopicNum($type,$forumId=0)
	{
		if($type=='new') $num=$this->count('id'); 
		else if ($type=='forum') $num=$this->where('forum_id=%d',$forumId)->count('id');
		return $num;
	}
	/**
	 * [getTopicList 获取版块内帖子列表]
	 * @param  [type] $sta      [起始ID]
	 * @param  [type] $num      [取其数量]
	 * @param  [type] $forum_id [版块ID]
	 * @return [type]           [数组]
	 */
	function getTopicList($sta,$num,$forum_id)
	{
		$sta=addslashes($sta);
		$num=addslashes($num);
		$forum=addslashes($forum_id);
		$sql="SELECT sl_topic.id,sl_topic.title,sl_topic.date,sl_topic.last_date,sl_topic.views,sl_topic.reply,sl_topic.top,sl_topic.best,sl_topic.user_id,sl_topic.forum_id,sl_forum.name,sl_user.username,sl_user.avatar
				FROM sl_topic
				LEFT JOIN sl_user ON sl_topic.user_id=sl_user.id
				LEFT JOIN sl_forum ON sl_topic.forum_id=sl_forum.id
				WHERE sl_topic.forum_id=%d
				ORDER BY sl_topic.top DESC,sl_topic.last_date DESC LIMIT %d,%d";
		$arr=$this->query($sql,$forum_id,$sta,$num);
		return $arr;
	}
	/*
	 * 写入点击数+1
	 */
	public function setViewAdd($id){
		$id=addslashes($id);
		$sql="UPDATE sl_topic SET views=views+1 WHERE id=%d";
		$r=$this->execute($sql,$id);
		return $r;
	}
	/**
	 * [setCommentDate 更新帖子最后回复时间]
	 * @param [int] $id [帖子ID]
	 */
	public function setCommentDate($id){
		$id=addslashes($id);
		$date['last_date']=date('Y:m:d H:i:s',time());
		$r=$this->where("id=%d",$id)->save($date);
		if ($r){
			return true;
		}else{
			return false;
		}

	}
	/**
	 * 修改帖子
	 * @param  [type] $id 传入帖子ID
	 */
	public function edit($id) {
		$id  = addslashes($id);
		$sql = "SELECT sl_topic.id,sl_topic.title,sl_topic.content,sl_topic.user_id,sl_topic.forum_id,sl_forum.name 
				FROM sl_topic
				LEFT JOIN sl_forum ON sl_topic.forum_id=sl_forum.id
				WHERE sl_topic.id=%d";
		$res = $this ->query($sql,$id);
		$arr = array();
		foreach ($res as $key => $value) {
			foreach ($value as $_key => $_value) {
				$arr[$_key]=$_value;
			}
		}
		return $arr;
	}
	


	
	
}

?>