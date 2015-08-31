<?php
/*
 * 站点配置模块Model类
 */
namespace Home\Model;
use Think\Model;
class WebsiteModel extends Model{
	/**
	 * [getWebsite 获取系统信息]
	 * @return [type] [数组]
	 */
	public function getWebsite(){
		if(S('website')){
			$website=S('website');
		}else{
			$where['type']='website';
			$website=$this->where($where)->find();
			S('website', $website, 300);
		}
		return $website;
	}
	/**
	 * [count 统计]
	 * @return [type] [数组]
	 */
	public function count(){
		if(S('count')){
			$count=S('count');
		}else{
			$count['topic']=M('Topic')->count('id');
			$count['user']=M('User')->count('id');
			$count['comment']=M('Comment')->count('cid');
			S('count',$count);
		}
		return $count;
	}
}

?>