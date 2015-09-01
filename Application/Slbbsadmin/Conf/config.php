<?php
return array(
	/*
	 * 应用配置
	 */
	'URL_MODEL'             	=>  2,       			// URL访问模式,可选参数0、1、2、3,代表以下四种模式：
														// 0 (普通模式); 1 (PATHINFO 模式); 2 (REWRITE  模式); 3 (兼容模式)  默认为PATHINFO 模式
	'URL_PATHINFO_DEPR'     	=>  '/',    			// PATHINFO模式下，各参数之间的分割符号
	'DATA_CACHE_TIME'       	=>  120,      			// 数据缓存有效期 0表示永久缓存
	'DATA_CACHE_COMPRESS'   	=>  true,   			// 数据缓存是否压缩缓存
	//'DATA_CACHE_CHECK'      	=>  false,   			// 数据缓存是否校验缓存
	'URL_CASE_INSENSITIVE'  	=>  true, 				//不区分大小写
 	'TMPL_CACHE_ON'         	=>  false,        		// 是否开启模板编译缓存,设为false则每次都会重新编译(调试时开启)
 	'MY_CACHE_TIME'				=>	120,				//自定义数据查询缓存时间
	'URL_HTML_SUFFIX'			=>	'',					//强制取消U生成的.html
	
		
);