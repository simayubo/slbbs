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
                    <ul class="nav nav-tabs sl-nav-tabs active hidden-xs">
                        <li class="active"><a href="http://wenda.wecenter.com/topic/">全部</a></li>
                        <h2 class="hidden-xs"><i class="icon icon-topic"></i> 论坛版块</h2>
                    </ul>
                    <div class="sl-mod sl-topic-list">
                    <?php if(is_array($forum)): $i = 0; $__LIST__ = $forum;if( count($__LIST__)==0 ) : echo "暂无数据" ;else: foreach($__LIST__ as $key=>$sort): $mod = ($i % 2 );++$i;?><div class="sl-mod sl-topic-category" style="margin-left: 0;padding-left: 0;">
                            <div class="mod-body clearfix">
                                <ul>
                                    <li><span class="glyphicon glyphicon-circle-arrow-right"></span> <?php echo ($sort["sort_name"]); ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="mod-body clearfix">
                            <?php if(is_array($sort["forum"])): $i = 0; $__LIST__ = $sort["forum"];if( count($__LIST__)==0 ) : echo "此分类下暂无版块" ;else: foreach($__LIST__ as $key=>$forum): $mod = ($i % 2 );++$i;?><div class="sl-item">
                                <a class="img sl-border-radius-5" href="<?php echo ($forum["forum_url"]); ?>">
                                    <img src="<?php echo ($forum["icon_url"]); ?>" alt="" />
                                </a>
                                <p class="clearfix">
                                    <span class="topic-tag">
                                        <a class="text" href="<?php echo ($forum["forum_url"]); ?>" data-id="5"><?php echo ($forum["name"]); ?></a>
                                    </span>
                                </p>
                                <p class="text-color-999">
                                    <span>帖子：<?php echo ($forum["topic_count"]); ?></span>
                                    <span>回复：<?php echo ($forum["comment_count"]); ?></span>
                                </p>
                                <p class="text-color-999">
                                    <?php echo ($forum["intor"]); ?>
                                </p>
                            </div><?php endforeach; endif; else: echo "暂无数据" ;endif; ?>                  
                        </div><?php endforeach; endif; else: echo "此分类下暂无版块" ;endif; ?>
                    </div>
                </div>

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