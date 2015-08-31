<?php

namespace Slbbsadmin\Controller;
use Think\Controller;
class IndexController extends Controller {
	/**
	 * 首页
	 */
    public function index(){
    	$c_public = A('Public');
    	$common = $c_public ->common();
        $__MENU__ = A('Public') ->base();
        $__MENU__['main'][1]['class'] = 'current';

    	$title = 'Slbbs后台管理平台';
    	$this ->assign('title', $title);
    	$this ->assign('count', $c_public->count());
        $this ->assign('__MENU__',$__MENU__);
    	$this ->assign('common',$common);
    	$this ->display();
    }
}

?>