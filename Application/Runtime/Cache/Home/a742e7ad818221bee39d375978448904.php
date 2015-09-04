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
				<div class="sl-user-setting">
					<div class="tabbable">
						<ul class="nav nav-tabs sl-nav-tabs active">
							<li class="active"><a href="http://wenda.wecenter.com/account/setting/profile/">基本资料</a></li>
							<h2><i class="icon icon-setting"></i> 用户设置</h2>
						</ul>
					</div>
<div class="tab-content clearfix">
<!-- 基本信息 -->
<?php if(!empty($msg)){ ?>
	<li class="alert alert-danger error_message">
		<i class="icon icon-delete"></i> <em><?php echo ($msg); ?></em>
	</li>
<?php } ?>
	<div class="sl-mod">
		<div class="mod-body">
			<div class="sl-mod mod-base">
				<div class="mod-head">
					<h3>基本信息</h3>
				</div>
				<div id="setting_form">
				<!-- 上传头像 -->
				<form method='post' action="<?php echo U('User/upavatar');?>" enctype="multipart/form-data" name="uplode">
				<div class="side-bar">
					<dl>
						<dt class="pull-left"><img class="sl-border-radius-5" src="<?php echo ($user["avatar_url"]); ?>" alt="<?php echo ($user["username"]); ?>" id="avatar_src" width='100' height='100' /></dt>
						<dd class="pull-left">
							<h5>头像设置</h5>
							<p>支持 jpg、gif、png 等格式且小于100K的图片</p>
							<input type="file" name="avatar">
							<input type="submit" value="上传" class="btn btn-warning btn-sm"/>
						</dd>
					</dl>
				</div>
				</form>
				<!-- end 上传头像 -->
				<form method="post" action="<?php echo U('User/edit');?>" name="edit">
				<div class="mod-body">
					<dl>
						<dt>账号:</dt>
						<dd><?php echo ($user["username"]); ?> 【ID: <?php echo ($user["id"]); ?>】</dd>
					</dl>
					<dl>
						<dt>绑定邮箱:</dt>
						<dd><?php echo ($user["email"]); ?></dd>
					</dl>
					<dl>
						<dt>性别:</dt>
						<dd>
							<label><input name="sex" id="sex" value="0" type="radio" <?php echo $user['sex']==0?'checked="checked"':''; ?> /> 女</label>
							<label><input name="sex" id="sex" value="1" type="radio" <?php echo $user['sex']==1?'checked="checked"':''; ?> /> 男	</label>
						</dd>
					</dl>
					<dl>
						<dt>个人签名:</dt>
						<dd>
							<textarea col='3' name='sign' class="form-control"  placeholder="100字以内" ><?php echo ($user["sign"]); ?></textarea>
						</dd>
					</dl>
					<dl>
						<dt>密码:</dt>
						<dd>
							<input type='password' name='password' class='form-control' placeholder="不修改请留空" />
						</dd>
					</dl>
					<dl>
						<dt>重复密码:</dt>
						<dd>
							<input type='password' name='repassword' class='form-control' placeholder="不修改请留空" />
						</dd>
					</dl>
					<dl>
						<dt>邮箱:(*)</dt>
						<dd>
							<input class="form-control" type="text" id="input-common-email" name="email" value="<?php echo ($user["email"]); ?>" placeholder="必填"  />
						</dd>
					</dl>
					<dl>
						<dt>手机:</dt>
						<dd>
							<input class="form-control" type="text" id="input-mobile" name="mobile" value="<?php echo ($user["phone"]); ?>"  placeholder="可选"  />
						</dd>
					</dl>
					<dl>
						<dt>qq:</dt>
						<dd>
							<input class="form-control" type="text" id="input-qq" name="qq" value="<?php echo ($user["qq"]); ?>"  placeholder="可选" />
						</dd>
					</dl>
			</div>
		</div>
		{__TOKEN__}
	<input type="submit" value='保存' class='btn btn-large btn-success pull-right' />
	</form>
</div>
</div>
<div class="mod-footer clearfix">
</div>
</div>
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