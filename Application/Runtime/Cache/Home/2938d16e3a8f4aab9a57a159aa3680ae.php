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
	<div class="nav-title"><a href="/">首页</a>》登陆</div>
	<div class="login">
		<h1>登陆</h1>
		<form id="login_form" method="post" action="<?php echo U('User/login');?>">
		<ul style="list-style: none;">
			<?php if(!empty($errmsg)){ ?>
				<li class="alert alert-danger error_message"><i class="icon icon-delete"></i> <em><?php echo ($errmsg); ?></em></li>
			<?php } ?>
			<li><input type="text" class="form-control" placeholder="用户名" name="username" /></li>
			<li><input type="password" class="form-control" placeholder="密码" name="password" /></li>
			<li><img src="<?php echo U('Public/verify');?>" onclick="this.src=this.src+'?'+Math.random" style="float:left;"/><input type="text" class="form-control" placeholder="验证码" name="verify" style="max-width:150px;float:right;"/></li>
			<div class="clean"></div>
			<li class="last"><input type="submit" id="login_submit" class="pull-right btn btn-large btn-primary" value="登陆" /></li><br/><br/>
		</ul>
		</form>
	</div>
	<div class="mod-footer">
		<span>还没有账号?</span>&nbsp;&nbsp;
		<a href="<?php echo U('register');?>">立即注册</a>  &nbsp;&nbsp; <a href="<?php echo U('User/findPassword');?>">&nbsp;找回密码</a>
	</div>
</div>
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