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
	private function sidebar($type, $value) {
		
		$__MENU__ = A ( 'Public' )->base ();
		$__MENU__ ['main'] [4] ['class'] = 'current';
		$__MENU__ ['child'] = array ('系统配置' => array (0 => array ('title' => '基本配置', 'url' => 'System/index' ), 1 => array ('title' => '高级配置', 'url' => 'System/higher' ), 2 => array ('title' => '应用中心', 'url' => 'System/app' ) )

		, '插件相关' => array (0 => array ('title' => '安装插件', 'url' => 'System/plugin_install' ), 1 => array ('title' => '插件列表', 'url' => 'System/plugins' ) ), '模板相关' => array (0 => array ('title' => '安装模板', 'url' => 'System/template_install' ), 1 => array ('title' => '模板列表', 'url' => 'System/templates' ) ) );
		$__MENU__ ['child'] [$type] [$value] ['class'] = 'current';
		return $__MENU__;
	}
	public function index() {
		
		$p = A ( 'Public' );
		$common = $p->common ();
		$__MENU__ = $this->sidebar ( '系统配置', 0 );
		
		//提交验证
		if (IS_POST) {
			if (empty($_POST['site_title'])) a_r('站点名称不能为空！');
			if (empty($_POST['site_subtitle'])) a_r('副标题不能为空！');
			if (empty($_POST['site_url'])) a_r('站点URL不能为空或格式不正确！');
			$_data = array(
				'site_title'	=>	I('post.site_title'),
				'site_subtitle'	=>	I('post.site_subtitle'),
				'site_url'		=>	I('post.site_url'),
				'site_switch'	=>	I('post.site_switch'),
				'site_register'	=>	I('post.site_register'),
			);
			if (!empty($_POST['site_description'])) $_data['site_description'] = I('post.site_description');
			if (!empty($_POST['site_keywords'])) $_data['site_keywords'] = I('post.site_keywords');
			if (!empty($_POST['site_icp'])) $_data['site_icp'] = I('post.site_icp');
			if (!empty($_POST['site_off_reason'])) $_data['site_off_reason'] = I('post.site_off_reason');
			
			$_r = M('Website') ->where("type = 'website'") ->save($_data);
			if ($_r > 0) echo "<script>alert('修改成功！')</script>";
			else a_r('修改失败！可能原因:原配置未发生变化！'); 
		}
		
		$website = M ( 'Website' )->where ( "type = 'website'" ) ->find ();
		
		$title = "基本配置";
		$this->assign ( 'common', $common );
		$this->assign ( 'website', $website );
		$this->assign ( 'title', $title );
		$this->assign ( '__MENU__', $__MENU__ );
		$this -> display();
	}

}