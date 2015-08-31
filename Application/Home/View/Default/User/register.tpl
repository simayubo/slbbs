<include file="Public:header"/>
<div class="sl-container-wrap" style="margin-top:40px;">
	<div class="sl-login-box">
		<div class="mod-body clearfix">
			<div class="content pull-left">
				<h1 class="logo"><span class="glyphicon glyphicon-user"></span></h1>
				<h2>{$common.website.site_title}论坛注册系统</h2>
				<form id="login_form" method="post" action="{:U('User/register')}">
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
							<input type="email" id="sl-login-user-email" class="form-control" placeholder="邮箱地址" name="email" />
						</li>
						<li>
							<input type="password" id="sl-login-user-password" class="form-control" placeholder="密码" name="password" />
						</li>
						<li>
							<input type="password" id="sl-login-user-password" class="form-control" placeholder="再次输入密码" name="repassword" />
						</li>
						<li>
							<img src="{:U('Public/verify')}" onclick="this.src=this.src+'?'+Math.random" style="float:left;"/>
							<input type="text" id="sl-login-user-verify" class="form-control" placeholder="验证码" name="verify" style="max-width:150px;float:right;"/>
						</li>
						<div style="clear:both"></div>
						<li class="last">
							<input type="submit" id="login_submit" class="pull-right btn btn-large btn-primary" value="注册" />
						</li>
					</ul>
				</form>
			</div>
		</div>
		<div class="mod-footer">
			<span>已有账号?</span>&nbsp;&nbsp;
			<a href="{:U('User/login')}">立即登陆</a>  &nbsp;&nbsp; 
		</div>
	</div>
	<include file="Public:footer"/>