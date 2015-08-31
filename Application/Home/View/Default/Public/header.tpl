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
	<link href="__PUBLIC__/css/common.css" rel="stylesheet" type="text/css" />
	<link href="__PUBLIC__/css/link.css" rel="stylesheet" type="text/css" />
	<link href="__PUBLIC__/css/style.css" rel="stylesheet" type="text/css" />

	<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
	<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="__PUBLIC__/js/compatibility.js"></script>
	<!--[if lte IE 8]>
      	<script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      	<script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
		<script type="text/javascript" src="__PUBLIC__/js/respond.js"></script>
	<![endif]-->
	<title>{$title}</title>
	<noscript unselectable="on" id="noscript">
    <div class="sl-404 sl-404-wrap container">
        <img src="__PUBLIC__/images/no-js.jpg">
        <p>你的浏览器禁用了JavaScript, 请开启后刷新浏览器获得更好的体验!</p>
    </div>
</noscript>
</head>
<body>
	<div class="sl-top-menu-wrap">
		<div class="container">
			<!-- logo -->
			<div class="sl-logo hidden-xs">
				<a href="{$common.website.site_url}">{$common.website.site_title}</a>
			</div>
			<!-- end logo -->
			
			<!-- 导航 -->
			<div class="sl-top-nav navbar">
				<div class="navbar-header">
				  <button  class="navbar-toggle pull-left">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				</div>
				<nav role="navigation" class="collapse navbar-collapse bs-navbar-collapse">
					<ul class="nav navbar-nav">
						<li><a href="/"><span class="glyphicon glyphicon-list"> </span> 动态</a></li>
						<li><a href="{:U('Forum/index')}" ><span class="glyphicon glyphicon-th-large"> </span> 版块列表</a></li>
						<li><a href="#"><span class="glyphicon glyphicon-play-circle"> </span>  博客</a></li>			
						<!--<li>
							<a style="font-weight:bold;">· · ·</a>
							<div class="dropdown-list pull-right">
								<ul id="extensions-nav-list">
									<li><a href="http://wenda.wecenter.com/project/"><span class="glyphicon glyphicon-th-large"> </span> 活动</a></li>
								</ul>
							</div>
						</li>-->
				 	</ul>
				</nav>
			</div>
			<div class="sl-user-nav">
				<?php if (empty(session('user_id'))) { ?>
				<a class="login btn btn-normal btn-primary" href="{:U('User/login')}">登录</a>
				<a class="register btn btn-normal btn-success" href="{:U('User/register')}">注册</a>
				<?php }else{ ?>
				<a href="{:U("Member/".$common['user']['id']."")}" class="sl-user-nav-dropdown">
					<img alt="{$common.user.username}" src="{$common.user.avatar_url}" />
				</a>
				<div class="sl-dropdown dropdown-list pull-right">
					<ul class="sl-dropdown-list">
						<li><a href="{:U('Message/inbox')}"><span class="glyphicon glyphicon-envelope"></span> 私信<span class="badge">{$common.user.unmessage}</span></a></li>
						<li class="hidden-xs"><a href='{:U("Member/".$common['user']['id']."")}'><span class="glyphicon glyphicon-user"></span> 个人中心</a></li>
						<li><a href="{:U('User/unlogin')}"><span class="glyphicon glyphicon-off"></span> 退出登录</a></li>
					</ul>	
				</div>
			</div>
			<!-- 发起 -->
			<div class="sl-publish-btn">
				<a id="header_publish"href="{:U('Topic/post')}" class="btn-primary"><span class="glyphicon glyphicon-edit"></i> 发表</a>
				<div class="dropdown-list pull-right">
					<ul>
						<li><a href="{:U('Topic/post')}">帖子</a></li>
						<li><a href="#">文章</a></li>
					</ul>
				</div>
			</div>
			<!-- end 发起 -->
			<?php } ?>
		</div>
	</div>
</div>