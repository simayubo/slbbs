<?php
return array(
	/*
	 * 应用配置
	 */
	'URL_MODEL'             	=>  2,       			// URL访问模式,可选参数0、1、2、3,代表以下四种模式：
														// 0 (普通模式); 1 (PATHINFO 模式); 2 (REWRITE  模式); 3 (兼容模式)  默认为PATHINFO 模式
	'URL_PATHINFO_DEPR'     	=>  '/',    			// PATHINFO模式下，各参数之间的分割符号
	'URL_HTML_SUFFIX'      		=>  'html',  			// URL伪静态后缀设置
	'TMPL_TEMPLATE_SUFFIX'  	=>  '.tpl',    			// 默认模板文件后缀
	'DATA_CACHE_TIME'       	=>  60,      			// 数据缓存有效期 0表示永久缓存
	'DATA_CACHE_COMPRESS'   	=>  true,   			// 数据缓存是否压缩缓存
	//'DATA_CACHE_CHECK'      	=>  false,   			// 数据缓存是否校验缓存
	'TOKEN_ON'					=>	true,  				// 是否开启令牌验证
 	'TOKEN_NAME'				=>	'__hash__',   		// 令牌验证的表单隐藏字段名称
 	'TOKEN_TYPE'				=>	'md5',  			//令牌哈希验证规则 默认为MD5
 	'TOKEN_RESET'				=>	true,  				//令牌验证出错后是否重置令牌 默认为true
 	'URL_CASE_INSENSITIVE'  	=>  true, 				//不区分大小写
 	'TMPL_CACHE_ON'         	=>  false,        		// 是否开启模板编译缓存,设为false则每次都会重新编译(调试时开启)
		
  	'URL_ROUTER_ON'  		   	=> true,  				//开启路由规则
	'URL_ROUTE_RULES'=>array(   
		'topic/:id'				=> 'Topic/t',
		'edit/:id'				=> 'Topic/edit',
		'member/:id'  	 		=> 'User/index',
		'forum/:id' 		 	=> 'Forum/f',
		'index/:page'			=> 'Index/index',
		'message/m/:id'			=> 'Message/m',
		'message/inbox/:page'	=> 'Message/inbox',
	),

	'URL_ROUTER_ON'   => true,							//静态路由
	'URL_MAP_RULES'=>array(
		'topic/post'			=>	'Topic/post',
		'topic/comment'			=>	'Topic/comment',
		'forum/index'			=>	'Forum/index',
		'message/sendmessage'	=>	'Message/sendMessage',
	),
	
	
		
);