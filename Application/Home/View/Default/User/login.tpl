<include file="Public:header"/>
<div class="sl-container-wrap" style="margin-top:40px;">
	<div class="sl-login-box">
		<div class="mod-body clearfix">
			<div class="content pull-left">
				<h1 class="logo"><span class="glyphicon glyphicon-user"></span></h1>
				<h2>{$common.website.site_title}论坛登陆系统</h2>
				<form id="login_form" method="post" action="{:U('User/login')}">
					<ul>
						<?php if(!empty($errmsg)){ ?>
							<li class="alert alert-danger error_message">
								<i class="icon icon-delete"></i> <em>{$errmsg}</em>
							</li>
						<?php } ?>
						<li>
							<input type="text" id="sl-login-user-name" class="form-control" placeholder="用户名" name="username" />
						</li>
						<li>
							<input type="password" id="sl-login-user-password" class="form-control" placeholder="密码" name="password" />
						</li>
						<li>
							<img src="{:U('Public/verify')}" onclick="this.src=this.src+'?'+Math.random" style="float:left;"/>
							<input type="text" id="sl-login-user-verify" class="form-control" placeholder="验证码" name="verify" style="max-width:150px;float:right;"/>
						</li>
						<div style="clear:both"></div>
						<li class="last">
							<input type="submit" id="login_submit" class="pull-right btn btn-large btn-primary" value="登陆" />
							<a href="{:U('User/findPassword')}">&nbsp;找回密码</a>
						</li>
					</ul>
				</form>
			</div>
		</div>
		<div class="mod-footer">
			<span>还没有账号?</span>&nbsp;&nbsp;
			<a href="{:U('register')}">立即注册</a>  &nbsp;&nbsp; 
		</div>
	</div>
	<include file="Public:footer"/>