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
					<div class="sl-mod sl-inbox-read">
						<div class="mod-head common-head">
							<h2>
								<a href="<?php echo U('Message/inbox');?>" class="pull-right">返回私信列表 »</a>
								私信对话：<?php echo ($message["username"]); ?>
							</h2>
						</div>
						<div class="mod-body">
							<!-- 私信内容输入框　-->
							<form action="<?php echo U('Message/sendMessage/type/m');?>" method="post">
								<a href="<?php echo U("Member/".$common['user']['id']."");?>" title="个人中心" class="sl-user-img sl-border-radius-5">
									<img alt="<?php echo ($common["user"]["username"]); ?>" src="<?php echo ($common["user"]["avatar_url"]); ?>" style="width:32px;height: 32px;" />
								</a>
								<textarea rows="3" class="form-control" placeholder="想要对ta说点什么?" type="text" name="content" /></textarea>

								<input type="hidden" name="send_id" value='<?php if($message["send_id"] != session('user_id')): echo ($message["send_id"]); else: echo ($message["uid"]); endif; ?>' />

								<input type="hidden" name="message_id" value="<?php echo ($message["id"]); ?>" />
								<p>
									<button type="button" class="btn btn-mini btn-success" data-toggle="modal" data-target=".bs-example-modal-sm">发送</button>

									<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  										<div class="modal-dialog modal-sm">
    										<div class="modal-content">
    											<div class="modal-header">
        											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       												<h4 class="modal-title" id="myModalLabel">提示</h4>
      											</div>
      											<div class="modal-body">
  													你确定发送此条私信吗？
      											</div>
    											<div class="modal-footer">
        											<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        											<input type="submit" class="btn btn-primary" value="发送" />
     											</div>
    										</div>
  										</div>
									</div>
								</p>
							</form>
							<!-- end 私信内容输入框 -->
						</div>
						<div class="mod-footer">
							<!-- 私信内容列表 -->
							<a name="contents"></a>
							<ul>
							<?php if(is_array($message_list)): $i = 0; $__LIST__ = $message_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class='<?php if($vo["uid"] != $common['user']['id']): ?>active<?php endif; ?>'>
									<a href="<?php echo U("Member/".$vo['uid']);?>" title="<?php echo ($vo["username"]); ?>" class="sl-user-img sl-border-radius-5"><img src="<?php echo ($vo["avatar"]); ?>" alt="" /></a>
									<div class="sl-item">
										<p><?php echo ($vo["content"]); ?></p>
										<p class="text-color-999"><?php echo ($vo["time"]); ?> 
											<?php if($vo["uid"] == $common['user']['id']): echo ($vo["read_on"]); endif; ?>
										</p>
										<i class="i-private-replay-triangle"></i>
									</div>
								</li><?php endforeach; endif; else: echo "" ;endif; ?>
							<li class='<?php if($message["uid"] != $common['user']['id']): ?>active<?php endif; ?>'>
								<a href="<?php echo U("Member/".$message['uid']);?>" title="<?php echo ($message["username"]); ?>" class="sl-user-img sl-border-radius-5"><img src="<?php echo ($message["avatar"]); ?>" alt="" /></a>
								<div class="sl-item">
									<p><?php echo ($message["content"]); ?></p>
									<p class="text-color-999"><?php echo ($message["time"]); ?> 
										<?php if($message["uid"] == $common['user']['id']): echo ($message["read_on"]); endif; ?>
									</p>
									<i class="i-private-replay-triangle"></i>
								</div>
							</li>
							</volist>
							</ul>
							<!-- end 私信内容列表 -->
						</div>
					</div>
				</div>
				<!-- 侧边栏 -->
				<div class="col-sm-12 col-md-3 sl-side-bar hidden-xs hidden-sm">
					<div class="sl-mod side-nav">
	<div class="mod-body">
		<ul>
			<li><a href='<?php echo U("Member/".$common['user']['id']."");?>' rel="all"><i class="icon icon-home"></i>个人中心</a></li>
			<li><a href="#"><i class="icon icon-favor"></i>好友列表</a></li>
			<li><a href="#"><i class="icon icon-favor"></i>私信管理</a></li>
		</ul>
	</div>
</div>

<div class="sl-mod side-nav">
	<div class="mod-body">
		<ul>
			<li><a href="http://wenda.wecenter.com/topic/"><i class="icon icon-topic"></i>删除私信</a></li>
			<li><a href="http://wenda.wecenter.com/people/"><i class="icon icon-user"></i>标记重要</a></li>
		</ul>
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