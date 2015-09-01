<?php
/**
 * 
 * 系统配置逻辑类
 * @author BO
 *
 */
namespace Slbbsadmin\Controller;
use Think\Controller;
class SystemController extends Controller {
	
	/**
	 * 侧边栏
	 * @param  [type] $type  大分类
	 * @param  [type] $value 小分类
	 * @return [type]        导航
	 */
	private function sidebar($type, $value){
		
		$__MENU__ = A('Public') ->base();
		$__MENU__['main'][4]['class'] = 'current';
		$__MENU__['child']  = array(
			'系统配置' => array(
				0 => array(
              		'title' =>  '基本配置' ,
              		'url' 	=>  'System/index' ,
					),
				1 => array(
              		'title' =>  '高级配置' ,
              		'url' 	=> 'System/higher' ,
					),
				2 => array(
              		'title' =>  '应用中心' ,
              		'url' 	=> 'System/app' ,
					),
					
				),
			'插件相关' => array(
				0 => array(
              		'title' =>  '安装插件' ,
              		'url' 	=>  'System/plugin_install' ,
					),
				1 => array(
              		'title' =>  '插件列表' ,
              		'url' 	=> 'System/plugins' ,
					),
				),
			'模板相关' => array(
				0 => array(
              		'title' =>  '安装模板' ,
              		'url' 	=>  'System/template_install' ,
					),
				1 => array(
              		'title' =>  '模板列表' ,
              		'url' 	=> 'System/templates' ,
					),
				),
			);
		$__MENU__['child'][$type][$value]['class'] = 'current';
		return $__MENU__;
	}
	public function index() {
		
		$p = A('Public');
		$common = $p ->common();
		$__MENU__ = $this ->sidebar('系统配置', 0);
		
		$website = M('Website') ->where("type = 'website'") ->find();
		
		$title = "基本配置";
		$this -> assign('common', $common);
		$this -> assign('website', $website);
		$this -> assign('title',$title);
		$this -> assign('__MENU__', $__MENU__);
		$this -> display();
	}
}