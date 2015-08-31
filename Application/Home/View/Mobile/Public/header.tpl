<!DOCTYPE html>
<head>
	<meta http-equiv="content" content="text/html;charset=utf-8" />
	<meta content="text/html;charset=utf-8" http-equiv="Content-Type" />
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1" />
	<meta name="renderer" content="webkit" />
	<meta name="keywords" content="{$common.website.site_keywords}" />
	<meta name="description" content="{$common.website.site_description}"  />
	<link href="__PUBLIC__/css/default/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
	<link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link href="__PUBLIC__/css/mobile.css" rel="stylesheet" type="text/css" />
	<title>{$title}</title>
</head>
<body>
<header id="header">
	<div class="logo"><a href="{$common.website.site_url}">{$common.website.site_title}</a></div>
	<div class="login-nav"><a href="{:U('User/index')}"><span class="glyphicon glyphicon-user"></span></a></div>
</header>
<IF condition="$common['user']['unmessage'] neq 0 ">
	<div class="message">
		<a href="{:U('Message/inbox')}"><span class="glyphicon glyphicon-envelope"></span></a>
	</div>
</IF>