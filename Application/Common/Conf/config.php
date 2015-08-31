<?php
return array(
	/*------------------------- 数据库配置 -------------------------------*/
	'DB_TYPE'				=>  'mysql', 				// 数据库类型
	'DB_HOST'               =>  '127.0.0.1', 			// 服务器地址
	'DB_NAME'               =>  'slbbs',    				// 数据库名
	'DB_USER'               =>  'root',     			// 用户名
	'DB_PWD'                =>  '',        				// 密码
	'DB_PORT'               =>  '3306',        			// 端口
	'DB_PREFIX'             =>  'sl_',    				// 数据库表前缀
  //'DB_FIELDTYPE_CHECK'    =>  false,       			// 是否进行字段类型检查
  //'DB_FIELDS_CACHE'       =>  true,       			// 启用字段缓存
	'DB_CHARSET'            =>  'utf8',      			// 数据库编码默认采用utf8
  //'DB_SQL_BUILD_CACHE'    =>  false, 					// 数据库查询的SQL创建缓存
  //'DB_SQL_BUILD_QUEUE'    =>  'file',  				// SQL缓存队列的缓存方式 支持 file xcache和apc
	//'DB_SQL_BUILD_LENGTH'   =>  20, 					// SQL缓存的队列长度
	//'DB_SQL_LOG'            =>  false, 				// SQL执行日志记录
	//'DB_BIND_PARAM'         =>  false, 				// 数据库写入数据自动参数绑定
	/*------------------------- 数据库配置结束 -------------------------------*/
	
	'SESSION_AUTO_START'    =>  true,    				// 是否自动开启Session
	//'URL_CASE_INSENSITIVE'  =>  true,   				// 默认false 表示URL区分大小写 true则表示不区分大小写
  //'URL_PARAMS_BIND'       =>  true, 					// URL变量绑定到Action方法参数
	'DEFAULT_FILTER'        => 'htmlspecialchars', 		// 默认参数过滤方法 用于I函数...
	
	'MODULE_ALLOW_LIST' => array (
		'Home',
		'Slbbsadmin',
	),
	'DEFAULT_MODULE' => 'Home', //默认控制器
	'AU_KEY' => '23547adfas……&*（', //加密秘钥
	
	'SHOW_PAGE_TRACE'       => true,              		//开启调试模式
);