<?php
/**
 * 公共类
 */
namespace Slbbsadmin\controller;
use Think\controller;

class PublicController extends Controller
{
	function __construct(){
		is_login();
	}
	/**
	 * common 后台加载公共类
	 * @return array $common 公共配置返回数组
	 */
	public function common(){
		if (empty(S('common'))) {
			$arr = array(
				'user'	=>	D('User') ->getUserCon(session('admin')),
				'site'	=>	$this->getSystemMsg(),
			);

			S('common', $arr, 60);
		}
		$common = S('common');
		if ($common['user']['power'] != 99) {
			$this ->error('很抱歉，你没有操作权限！');
		}
		return $common;
	}
	/**
	 * 导航
	 */
	public function base(){
		$__MENU__ = array(
			'main'	=> array(
				1 => array(
					'title'	=>	'首页',
					'url'	=>	'Index/index',
					),
				2 => array(
					'title'	=>	'用户',
					'url'	=>	'User/index',		
					),
				3 => array(
					'title'	=>	'内容',
					'url'	=>	'Content/index',		
					),
				4 => array(
					'title'	=>	'系统',
					'url'	=>	'System/index',	
					),
				),
			);
		return $__MENU__;
	}
	/**
	 * [count 详情统计函数]
	 */
	public function count(){
		if (empty(S('count'))) {
			$count = array(
				'user'		=>	M('User') ->count('id'),
				'topic'		=>	M('Topic') ->count('id'),
				'comment'	=>	M('comment') ->count('cid'),
				'forum'		=>	M('forum') ->count('id'),
				'file'		=>	M('file') ->count('id'),
				);
			S('count', $count, 300);
		}
		return S('count');
	}
	/**
	 * [getSystemMsg 获取系统信息]
	 */
	private function getSystemMsg(){
		$msg = array(
				'os'			=>  $_SERVER["SERVER_SOFTWARE"], //系统
				'dom'			=>	$_SERVER["HTTP_HOST"],		//域名
				'mysql'			=>	$this->getMysqlMsg(),		//mysql
				'max_upload' 	=> 	ini_get("file_uploads") ? ini_get("upload_max_filesize") : "Disabled", //最大上传
				'max_ex_time' 	=> 	ini_get("max_execution_time")."秒", //脚本最大执行时间
			);
		//var_dump($msg);
		return $msg;
	}
	/*
	 * 获取mysql版本
	 */
	private function getMysqlMsg(){
		$version = M('User')->query("select version() as ver");
        return $version[0]['ver'];
	}
	/*
	 * 生成分页显示列表
	 * page_count: 页数
	 * page_now:当前页
	 * m : 参数
	 * n : 参数值
	*/
	function pageShow($page_count,$page_now,$m,$n=''){
		$re = '';
		for ($i = $page_now - 3; $i <= $page_now + 3 && $i <= $page_count; $i++) {
			if ($i > 0) {
				if ($i == $page_now) {
					$re .= "<li><a href=\"#\"><b>$i</b></a></li>";
				} 
				elseif ($i == 1) {
					$url=empty($n)?U("$m/$i"):U("$m/$n/$i");
					$re .= "<li><a href=\"$url\">$i</a></li>";
				} else {
					$url=empty($n)?U("$m/$i"):U("$m/$n/$i");
					$re .= "<li><a href=\"$url\">$i</a></li>";
				}
			}
		}
		if ($page_now > 4) {
			$url=empty($n)?U("$m/1"):U("$m/$n/1");
			$re = "<li><a href=\"$url\" title=\"首页\">&laquo;</a></li>$re";
		}
		if ($page_now + 3 < $page_count) {
			$url=empty($n)?U("$m/$page_count"):U("$m/$n/$page_count");
			$re .= "<li><a href=\"$url\" title=\"尾页\">&raquo;</a></li>";
		}
		if ($page_count <= 1)
			$re = '';
		return $re;
	}

	public function test($value='')
	{
		var_dump(D('topic')->getTopicList());
	}

}

?>