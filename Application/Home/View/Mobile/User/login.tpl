<include file="Public:header"/>
<div id="main">
	<div class="nav-title"><a href="/">首页</a>》登陆</div>
	<div class="login">
		<h1>登陆</h1>
		<form id="login_form" method="post" action="{:U('User/login')}">
		<ul style="list-style: none;">
			<?php if(!empty($errmsg)){ ?>
				<li class="alert alert-danger error_message"><i class="icon icon-delete"></i> <em>{$errmsg}</em></li>
			<?php } ?>
			<li><input type="text" class="form-control" placeholder="用户名" name="username" /></li>
			<li><input type="password" class="form-control" placeholder="密码" name="password" /></li>
			<li><img src="{:U('Public/verify')}" onclick="this.src=this.src+'?'+Math.random" style="float:left;"/><input type="text" class="form-control" placeholder="验证码" name="verify" style="max-width:150px;float:right;"/></li>
			<div class="clean"></div>
			<li class="last"><input type="submit" id="login_submit" class="pull-right btn btn-large btn-primary" value="登陆" /></li><br/><br/>
		</ul>
		</form>
	</div>
	<div class="mod-footer">
		<span>还没有账号?</span>&nbsp;&nbsp;
		<a href="{:U('register')}">立即注册</a>  &nbsp;&nbsp; <a href="{:U('User/findPassword')}">&nbsp;找回密码</a>
	</div>
</div>
<include file="Public:footer"/>