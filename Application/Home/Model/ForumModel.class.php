<?php
/*
 * 论坛分类模块Model类
 */
namespace Home\Model;
use Think\Model;
class ForumModel extends Model
{
	/**
	 * [getForumList 获取论坛版块列表]
	 * @param  integer $type [简单或详细信息]
	 * @return [array]        [二维数组]
	 */
	public function getForumList($type='') {
		if ($type=='hot') {
			$sql="SELECT id,icon,name,topic_count,allow,comment_count FROM sl_forum WHERE hot=1 LIMIT 0,6";
		}else if($type='all') {
			$sql="SELECT sl_forum.id,sl_forum.order,sl_forum.name,sl_forum.topic_count,sl_forum.comment_count,sl_forum.sort_id,sl_forum.icon,sl_forum.intor,sl_forum.hot
				FROM sl_forum
				LEFT JOIN sl_sort ON sl_forum.sort_id=sl_sort.id";
		}
		$r=$this->query($sql);
		return $r;
	}
	/**
	 * 获取所有分类
	 */
	public function getSortList(){
		$sql="SELECT * FROM sl_sort ORDER BY sort_order";
		return $this->query($sql);
	}
	/**
	 * [getForumMsg 获取版块详细信息]
	 * @param  [int] $id [版块ID]
	 * @return [array]     [一维数组]
	 */
	public function getForumMsg($id)
	{
		$id=addslashes($id);
		$res=$this->where("id=%d",$id)->select();
		$arr=array();
		foreach ($res as $key => $value) {
			foreach ($value as $_key => $_value) {
				$arr[$_key]=$_value;
			}
		}
		return $arr;
	}

	/**
	 * [setTopicCount 计算帖子数量且写入]
	 * @param [int] $id [版块ID]
	 */
	public function setTopicCount($id)
	{
		$id=addslashes($id);
		$t=M('Topic');
		$num=$t->where("forum_id=%d",$id)->count('id');
		$sql="UPDATE sl_forum SET topic_count=%d WHERE id=%d";
		$r=$this->execute($sql,$num,$id);
		return $r;
	}
	/**
	 * [setReplyCount 计算回复数量且写入]
	 * @param [int] $id [版块ID]
	 */
	public function setCommentCount($id)
	{
		$id=addslashes($id);
		$c=M('Comment');
		$num=$c->where("fid=%d",$id)->count('cid');
		$sql="UPDATE sl_forum SET comment_count=%d WHERE id=%d";
		$r=$this->execute($sql,$num,$id);
		return $r;
	}
	

}
?>