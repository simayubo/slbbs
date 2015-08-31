<?php
/*
 * 论坛板块 模块控制器
 */
namespace Home\Controller;
use Think\Controller;
class ForumController extends Controller{
	
	/**
	 * 版块首页
	 * @return [type] [description]
	 */
	public function index(){
		$p=A('Public');
		$common=$p->common();
		$d_forum=D('Forum');
		$sort_arr=$d_forum->getSortList(); //获取分类
		$forum_arr=$d_forum->getForumList('all'); //获取版块
		$forum_arr=$this->regroup($forum_arr,'forum'); //重组版块数组
		
		//合并数组
		$forum=array();
		foreach ($sort_arr as $key1 => $value1) {
			$arr=array();
			foreach ($forum_arr as $key2 => $value2) {
				if($value1['id']==$value2['sort_id']){
					$arr[]=$value2;
				}
			}
			$forum[]=$value1;
			$forum[$key1]['forum']=$arr;
		}
		//var_dump($forum);

		$title="所有版块 - ".$common['website']['site_title']."";

		$this->assign('title',$title);
		$this->assign('common',$common);
		$this->assign('forum',$forum);
		C('TOKEN_ON',false);
		$this->display();
	}
	/**
	 * [f 论坛版块显示帖子列表]
	 * @param  [type] $id [版块ID]
	 * @return [type]     [无]
	 */
	public function f($id){
		$id = I( 'get.id' );
		$p = A('Public');
		$common = $p -> common();
		$d_topic=D('Topic');

		$num = 10; //每页显示几条
    	$page_count=ceil($d_topic->getTopicNum('forum',$id)/$num); //总页数
    	$page_now = empty(I('get.page'))?1:I('get.page'); //当前页
    	$action='Forum/'.$id.'/page';
    	$page=$p->pageShow($page_count,$page_now,$action); //分页列表变量
    	$arr = $d_topic-> getTopicList(($page_now-1)*$num,$num,$id);

		$c_topic = A('Topic');
		$topic = $c_topic ->regroup($arr,2,'forum'); //数组重组
		$d_forum = D('Forum');
		$forum = $d_forum ->getForumMsg($id); //版块详细信息
		foreach ($forum as $key => $value) {
			switch ($key) {
				case 'time': $forum[$key]=date_rewrite(strtotime($value)); break;
				default: $forum[$key]=$value; break;
			}
		}
		//var_dump($arr);
		//var_dump($forum);
		$t = empty($_GET['page'])?'':"第 ".$page_now." 页 - ";
		$title=$t.$forum['name']." - ".$common['website']['site_title']."";

		$this ->assign('title',$title);
		$this ->assign('common',$common);
		$this ->assign('topic',$topic);
		$this ->assign('forum',$forum);
		$this ->assign('page',$page);
		C('TOKEN_ON',false);
		$this ->display();
	}
	/**
	 * [regroup 重新整理数组]
	 * @param  [array] $data [传入数组]
	 * @param  [string] $page [显示页面]
	 * @return [type]       [array]
	 */
	public function regroup($data,$page=''){
		$arr=array();
		foreach ($data as $key => $value) {
			foreach ($value as $_key => $_value) {
				switch ($_key) {
					case 'id':
						$arr[$key]['forum_url']=U('Forum/'.$_value.'');
						break;
					case 'icon':
						if ($_value==0) $arr[$key]['icon_url']="http://".SLBBS_ROOT."/Public/icon/forum/default.png";
						else $arr[$key]['icon_url']="http://".SLBBS_ROOT."/Public/icon/forum/".$_value."";
						break;
					case 'hot':
						if ($page=='forum') {  //如果是forum页面，则执行
							if ($_value==1) {
								$arr[$key]['name']="<font color='red'>".$value['name']."</font>";
							}
						}
						break;
					default:
							$arr[$key][$_key]=$_value;
						break;
				}
			}
		}
		return $arr;
	}
}