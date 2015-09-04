<?php

//判断登录状态
function is_login(){
	if (!session('?admin')) {
		header("Location: ".U('User/login')."");
		exit();
	}
}
/**
 * 动态扩展左侧菜单,base.html里用到
 */
function extra_menu($extra_menu,&$base_menu){
    foreach ($extra_menu as $key=>$group){
        if( isset($base_menu['child'][$key]) ){
            $base_menu['child'][$key] = array_merge( $base_menu['child'][$key], $group);
        }else{
            $base_menu['child'][$key] = $group;
        }
    }
}
//弹窗输出
function a_r($str){
	header("content-type:text/html;charset=utf-8");
	echo "<script>alert('".$str."');javascript:history.go(-1);</script>";
	exit();
}

?>