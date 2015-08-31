<include file="Public:header"/>
<div class="sl-container-wrap">
	<div class="container">
		<div class="row">
			<div class="sl-content-wrap clearfix">
				<div class="nav-title"><a href="/">首页</a>》<a href="{:U('User/index')}">资料</a>》修改资料</div>
<div class="tab-content clearfix">
<!-- 基本信息 -->
<?php if(!empty($msg)){ ?>
	<li class="alert alert-danger error_message">
		<i class="icon icon-delete"></i> <em>{$msg}</em>
	</li>
<?php } ?>
	<div class="sl-mod">
		<div class="mod-body">
			<div class="sl-mod mod-base">
				<div id="setting_form">
				<!-- 上传头像 -->
				<form method='post' action="{:U('User/upavatar')}" enctype="multipart/form-data" name="uplode">
				<div class="side-bar">
					<dl>
						<dt class="pull-left"><img class="sl-border-radius-5" src="{$user.avatar_url}" alt="{$user.username}" style="width: 71px;height:71px;border-radius: 50%;" /></dt>
						<dd class="pull-left" style="margin-left: 10px;">
							<h5>更换头像</h5>
							<p style="color: #777; font-size: 0.9em;">支持 jpg、gif、png 等格式且小于100K的图片</p>
							<input type="file" name="avatar">
							<input type="submit" value="上传" class="btn btn-warning btn-sm"/>
						</dd>
					</dl>
				</div>
				<div class="clean"></div>
				</form>
				<!-- end 上传头像 -->
				<form method="post" action="{:U('User/edit')}" name="edit">
				<div class="mod-body" style="margin-top: 10px; padding: 10px 10px;">
					<dl>
						<dt>账号:{$user.username} 【ID: {$user.id}】</dt>
					</dl>
					<dl>
						<dt>绑定邮箱:</dt>
						<dd>{$user.email}</dd>
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
							<textarea col='3' name='sign' class="form-control"  placeholder="100字以内" >{$user.sign}</textarea>
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
							<input class="form-control" type="text" id="input-common-email" name="email" value="{$user.email}" placeholder="必填"  />
						</dd>
					</dl>
					<dl>
						<dt>手机:</dt>
						<dd>
							<input class="form-control" type="text" id="input-mobile" name="mobile" value="{$user.phone}"  placeholder="可选"  />
						</dd>
					</dl>
					<dl>
						<dt>qq:</dt>
						<dd>
							<input class="form-control" type="text" id="input-qq" name="qq" value="{$user.qq}"  placeholder="可选" />
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

<include file="Public:footer"/>