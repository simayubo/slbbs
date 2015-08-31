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
	<link href="/Public/css/mobile.css" rel="stylesheet" type="text/css" />
	<title><?php echo ($title); ?></title>
</head>
<body>
<header id="header">
	<div class="logo"><a href="<?php echo ($common["website"]["site_url"]); ?>"><?php echo ($common["website"]["site_title"]); ?></a></div>
	<div class="login-nav"><a href="<?php echo U('User/index');?>"><span class="glyphicon glyphicon-user"></span></a></div>
</header>
<?php if($common['user']['unmessage'] != 0 ): ?><div class="message">
		<a href="<?php echo U('Message/inbox');?>"><span class="glyphicon glyphicon-envelope"></span></a>
	</div><?php endif; ?>
<div id="main">
	<div class="nav-title">最新帖子</div>
	<ul class="topic-list">
		<?php if(is_array($topic)): $i = 0; $__LIST__ = $topic;if( count($__LIST__)==0 ) : echo "还没有帖子" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
				<!--<a href="<?php echo ($vo["user_url"]); ?>"><img src="<?php echo ($vo["avatar_url"]); ?>" class="avatar" /></a>-->
				<h1 class="title"><a href="<?php echo ($vo["topic_url"]); ?>"><?php echo ($vo["topic_title"]); ?></a></h1>
				<span>
					<a href="<?php echo ($vo["forum_url"]); ?>"><?php echo ($vo["forum_name"]); ?></a> | <a href="<?php echo ($vo["user_url"]); ?>"><?php echo ($vo["username"]); ?></a> | 阅: <?php echo ($vo["views"]); ?> | 评: <?php echo ($vo["reply"]); ?> | 时间：<?php echo ($vo["date"]); ?>
				</span>
			</li><?php endforeach; endif; else: echo "还没有帖子" ;endif; ?>
	</ul>
	<div class="nav-title">论坛版块</div>
	<?php if(is_array($forum)): $i = 0; $__LIST__ = $forum;if( count($__LIST__)==0 ) : echo "暂无数据" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><ul style="list-style: none;">
			<li class="nav-title"><?php echo ($vo["sort_name"]); ?></li>
			<ul>
				<?php if(is_array($vo["forum"])): $i = 0; $__LIST__ = $vo["forum"];if( count($__LIST__)==0 ) : echo "分类下暂无版块" ;else: foreach($__LIST__ as $key=>$vi): $mod = ($i % 2 );++$i;?><div class="forum-block">
                        <a href="<?php echo ($vi["forum_url"]); ?>"><img src="<?php echo ($vi["icon_url"]); ?>" /></a>
                        <span>
                        	<p class="title"><a href="<?php echo ($vi["forum_url"]); ?>"><?php echo ($vi["name"]); ?></a></p>
                        	<p style="color:#777;">帖: <?php echo ($vi["topic_count"]); ?> | 回: <?php echo ($vi["comment_count"]); ?></p>
                        </span>
                    </div><?php endforeach; endif; else: echo "暂无数据" ;endif; ?>
				<div class="clean"></div>
			<ul>
		</ul><?php endforeach; endif; else: echo "分类下暂无版块" ;endif; ?>
</div>
<!-- end 侧边栏 -->
<div class="nav-title"><a href="/" class="btn btn-xs btn-primary">首页</a> <a href="<?php echo U('Forum/index');?>" class="btn btn-xs btn-success">论坛</a> <a href="<?php echo U('Message/inbox');?>" class="btn btn-xs btn-info">信箱</a> 
<?php if(empty(session('user_id'))){ ?>
<a href="<?php echo U('User/login');?>" class="btn btn-xs btn-danger">登录</a>
<?php }else{ ?>
<a href="<?php echo U('User/unlogin');?>" class="btn btn-xs btn-danger">退出登录</a>
<?php } ?>
 &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo U('Topic/post');?>" class="btn btn-xs btn-warning">发帖</a></div>
<div id="footer">
	Powered By <a href="/" target="blank">SLBBS 1.0</a> <br/><?php G('end'); echo "页面执行:".G('begin','end').'s'; if($common['user']['admin'] == 1): ?><a href="<?php echo U('Slbbsadmin/Index/index');?>">后台管理</a><?php endif; ?>
</div>
</body>
</html>