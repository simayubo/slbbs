<?php
/**
* IndexController.class.php 文件
* ==============================================
* 版权所有 2015-2020 http://www.slbbs.com
* ----------------------------------------------
* 这不是一个自由软件，未经授权不许任何使用和传播。
* ==============================================
* @date: 2015-6-1
* @author: BO
* @version: 1.0
*/
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	/**
	 * 首页
	 */
    public function index(){
    	$p = A('Public');
    	$common = $p -> common();
    	$d_topic = D('Topic');
    	
    	$num = 10; //每页显示几条
    	$page_count=ceil($d_topic->getTopicNum('new')/$num); //总页数
    	$page_now = empty(I('get.page'))?1:I('get.page'); //当前页

    	$page=$p->pageShow($page_count,$page_now,'Index');
    	$topic = $d_topic-> getIndexNew(($page_now-1)*$num,$num);
        $c_topic=A('Topic');
    	$topic = $c_topic-> regroup($topic,2); //帖子列表数组重组
    	$t = empty($_GET['page'])?'':"最新帖子 - 第 ".$page_now." 页 - ";
        $user_list=A('User')->regroup(D('User')->getUserList(5),2); //侧栏新用户
        $forum_hot=D('Forum')->getForumList('hot'); //侧栏热门版块
        $forum_hot=A('Forum')->regroup($forum_hot); //重组数组
        $count=D('Website')->count(); //侧栏统计

        // =====手机版论坛版块======  //
        $d_forum=D('Forum');
        $sort_arr=$d_forum->getSortList(); //获取分类
        $forum_arr=$d_forum->getForumList('all'); //获取版块
        $forum_arr=A('Forum')->regroup($forum_arr,'forum'); //重组版块数组
        
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
        // end

        $developTime=developTime(); //开发时间计算

    	$title = $t.$common['website']['site_title'];
    	
    	$this -> assign('title',$title);
    	$this -> assign('common',$common);
    	$this -> assign('topic',$topic);
        $this -> assign('user_list',$user_list);
        $this -> assign('forum_hot',$forum_hot);
    	$this -> assign('page',$page);
        $this -> assign('count',$count);
        $this -> assign('developTime',$developTime);
        $this -> assign('forum',$forum);
        C('TOKEN_ON',false); //禁用表单令牌
    	$this -> display();
    }
}

?>