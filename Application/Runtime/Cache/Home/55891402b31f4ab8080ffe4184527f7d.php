<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<head>
	<meta http-equiv="content" content="text/html;charset=utf-8" />
	<meta content="text/html;charset=utf-8" http-equiv="Content-Type" />
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1" />
	<meta name="renderer" content="webkit" />
	<meta name="keywords" content="<?php echo ($common["website"]["site_keywords"]); ?>" />
	<meta name="description" content="<?php echo ($common["website"]["site_description"]); ?>"  />
	<link href="/Public/css/default/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
	<link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link href="/Public/css/common.css" rel="stylesheet" type="text/css" />
	<link href="/Public/css/link.css" rel="stylesheet" type="text/css" />
	<link href="/Public/css/style.css" rel="stylesheet" type="text/css" />

	<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
	<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/Public/js/compatibility.js"></script>
	<!--[if lte IE 8]>
      	<script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      	<script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
		<script type="text/javascript" src="/Public/js/respond.js"></script>
	<![endif]-->
	<title><?php echo ($title); ?></title>
	<noscript unselectable="on" id="noscript">
    <div class="sl-404 sl-404-wrap container">
        <img src="/Public/images/no-js.jpg">
        <p>你的浏览器禁用了JavaScript, 请开启后刷新浏览器获得更好的体验!</p>
    </div>
</noscript>
</head>
<body>
	<div class="sl-top-menu-wrap">
		<div class="container">
			<!-- logo -->
			<div class="sl-logo hidden-xs">
				<a href="<?php echo ($common["website"]["site_url"]); ?>"><?php echo ($common["website"]["site_title"]); ?></a>
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
						<li><a href="<?php echo U('Forum/index');?>" ><span class="glyphicon glyphicon-th-large"> </span> 版块列表</a></li>
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
				<a class="login btn btn-normal btn-primary" href="<?php echo U('User/login');?>">登录</a>
				<a class="register btn btn-normal btn-success" href="<?php echo U('User/register');?>">注册</a>
				<?php }else{ ?>
				<a href="<?php echo U("Member/".$common['user']['id']."");?>" class="sl-user-nav-dropdown">
					<img alt="<?php echo ($common["user"]["username"]); ?>" src="<?php echo ($common["user"]["avatar_url"]); ?>" />
				</a>
				<div class="sl-dropdown dropdown-list pull-right">
					<ul class="sl-dropdown-list">
						<li><a href="<?php echo U('Message/inbox');?>"><span class="glyphicon glyphicon-envelope"></span> 私信<span class="badge"><?php echo ($common["user"]["unmessage"]); ?></span></a></li>
						<li class="hidden-xs"><a href='<?php echo U("Member/".$common['user']['id']."");?>'><span class="glyphicon glyphicon-user"></span> 个人中心</a></li>
						<li><a href="<?php echo U('User/unlogin');?>"><span class="glyphicon glyphicon-off"></span> 退出登录</a></li>
					</ul>	
				</div>
			</div>
			<!-- 发起 -->
			<div class="sl-publish-btn">
				<a id="header_publish"href="<?php echo U('Topic/post');?>" class="btn-primary"><span class="glyphicon glyphicon-edit"></i> 发表</a>
				<div class="dropdown-list pull-right">
					<ul>
						<li><a href="<?php echo U('Topic/post');?>">帖子</a></li>
						<li><a href="#">文章</a></li>
					</ul>
				</div>
			</div>
			<!-- end 发起 -->
			<?php } ?>
		</div>
	</div>
</div>
<div class="sl-container-wrap">
	<div class="container">
		<div class="row">
			<div class="sl-content-wrap clearfix">
				<div class="col-sm-12 col-md-9 sl-main-content">
					<!-- tab切换 -->
					<ul class="nav nav-tabs sl-nav-tabs active hidden-xs">
						<li class="active"><a href="/">最新</a></li>
						<h2 class="hidden-xs"><i class="icon icon-list"></i> 帖子动态</h2>
					</ul>
					<!-- end tab切换 -->
					<div class="sl-mod sl-explore-list">
						<div class="mod-body">
							<div class="sl-common-list">
								<?php if(is_array($topic)): $i = 0; $__LIST__ = $topic;if( count($__LIST__)==0 ) : echo "暂无数据" ;else: foreach($__LIST__ as $key=>$topic): $mod = ($i % 2 );++$i;?><div class="sl-item active">
										<a class="sl-user-name hidden-xs" data-id="16803" href="<?php echo ($topic["user_url"]); ?>" rel="nofollow">
										<img src="<?php echo ($topic["avatar_url"]); ?>" alt="" /></a>	
										<div class="sl-question-content">
											<h4><a href="<?php echo ($topic["topic_url"]); ?>" title="<?php echo ($topic["topic_title"]); ?>"><?php echo ($topic["topic_title"]); ?></a></h4>
											<a href="<?php echo ($topic["topic_url"]); ?>#topic_form" class="pull-right text-color-999" title="查看所有评论"><?php echo ($topic["reply"]); ?></a>
											<span class="text-color-999"><a href="<?php echo ($topic["forum_url"]); ?>"  class="sl-user-name"> <?php echo ($topic["forum_name"]); ?></a> • <a href="<?php echo ($topic["user_url"]); ?>" class="sl-user-name" rel="nofollow"><?php echo ($topic["username"]); ?></a> • <?php echo ($topic["views"]); ?> 次浏览 • <?php echo ($topic["date"]); ?></span>
										</div>
									</div><?php endforeach; endif; else: echo "暂无数据" ;endif; ?>
							</div>
						</div>
						<div class="mod-footer">
							<div class="page-control"><ul class="pagination"><?php echo ($page); ?></ul>
						</div>				
					</div>
				</div>
			</div>
			<!-- 侧边栏 -->
<div class="col-sm-12 col-md-3 sl-side-bar hidden-xs hidden-sm">
	<div class="sl-mod">
		<div class="mod-head">
			<h3>公告</h3>
		</div>
		<div class="mod-body">
			<p>
				写个东西玩玩;<br/>
				<!--开发时间：<?php echo ($developTime["day"]); ?> 天, 大约 <?php echo ($developTime["hour"]); ?> 小时-->
			</p>
		</div>
	</div>
	<div class="sl-mod sl-text-align-justify">
		<div class="mod-head">
			<a href="<?php echo U('Forum/index');?>" class="pull-right">更多 &gt;</a>
			<h3>推荐版块</h3>
		</div>
		<div class="mod-body">
			<?php if(is_array($forum_hot)): $i = 0; $__LIST__ = $forum_hot;if( count($__LIST__)==0 ) : echo "暂无热门版块" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dl>
					<dt class="pull-left sl-border-radius-5">
						<a href="<?php echo ($vo["forum_url"]); ?>"><img alt="" src="<?php echo ($vo["icon_url"]); ?>" /></a>
					</dt>
					<dd class="pull-left">
						<p class="clearfix">
							<span class="topic-tag">
								<a href="<?php echo ($vo["forum_url"]); ?>" class="text" data-id="2078"><?php echo ($vo["name"]); ?></a>
							</span>
						</p>
						<p><b><?php echo ($vo["topic_count"]); ?></b> 个主题, <b><?php echo ($vo["comment_count"]); ?></b> 个回复</p>
						
					</dd>
				</dl><?php endforeach; endif; else: echo "暂无热门版块" ;endif; ?>
		</div>
	</div>
	<div class="sl-mod sl-text-align-justify">
		<div class="mod-head">
			<a href="<?php echo U('User/list');?>" class="pull-right">更多 &gt;</a>
			<h3>热门用户</h3>
		</div>
		<div class="mod-body">
		<?php if(is_array($user_list)): $i = 0; $__LIST__ = $user_list;if( count($__LIST__)==0 ) : echo "暂无数据" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dl>
				<dt class="pull-left sl-border-radius-5">
					<a href="<?php echo ($vo["url"]); ?>"><img alt="" src="<?php echo ($vo["avatar_url"]); ?>" /></a>
				</dt>
				<dd class="pull-left">
					<a href="<?php echo ($vo["url"]); ?>" class="sl-user-name"><?php echo ($vo["username"]); ?></a>
					<p class="signature"></p>
					<p><b><?php echo ($vo["topic_count"]); ?></b> 个主题, <b><?php echo ($vo["reply_count"]); ?></b> 次回复</p>
				</dd>
			</dl><?php endforeach; endif; else: echo "暂无数据" ;endif; ?>
		</div>
	</div>
	<div class="sl-mod">
		<div class="mod-head">
			<h3>论坛统计</h3>
		</div>
		<div class="mod-body">
			<p>总主题：<?php echo ($count["topic"]); ?></p>
			<p>回复量：<?php echo ($count["comment"]); ?></p>
			<p>用户统计：<?php echo ($count["user"]); ?></p>
		</div>
	</div>
</div>
<!-- end 侧边栏 -->
			</div>
		</div>
	</div>
</div>
<div class="sl-footer-wrap">
	<div class="sl-footer">
		Copyright © 2015<span class="hidden-xs"> - SLBBS, All Rights Reserved</span>
		<span class="hidden-xs">Powered By <a href="/" target="blank">SLBBS 1.0</a></span>
	</div>
</div>
</body>
</html>