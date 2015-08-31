<include file="Public:header"/>
<div class="sl-container-wrap">
	<div class="container">
		<div class="row">
			<div class="sl-content-wrap clearfix">
				<div class="col-sm-12 col-md-9 sl-main-content">
					<div class="sl-mod sl-inbox-read">
						<div class="mod-head common-head">
							<h2>
								<a href="{:U('Message/inbox')}" class="pull-right">返回私信列表 »</a>
								私信对话：{$message.username}
							</h2>
						</div>
						<div class="mod-body">
							<!-- 私信内容输入框　-->
							<form action="{:U('Message/sendMessage/type/m')}" method="post">
								<a href="{:U("Member/".$common['user']['id']."")}" title="个人中心" class="sl-user-img sl-border-radius-5">
									<img alt="{$common.user.username}" src="{$common.user.avatar_url}" style="width:32px;height: 32px;" />
								</a>
								<textarea rows="3" class="form-control" placeholder="想要对ta说点什么?" type="text" name="content" /></textarea>

								<input type="hidden" name="send_id" value='<if condition="$message.send_id neq session('user_id')">{$message.send_id}<else />{$message.uid}</if>' />

								<input type="hidden" name="message_id" value="{$message.id}" />
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
							<volist name="message_list" id="vo" empty="">
								<li class='<if condition="$vo.uid neq $common['user']['id']">active</if>'>
									<a href="{:U("Member/".$vo['uid'])}" title="{$vo.username}" class="sl-user-img sl-border-radius-5"><img src="{$vo.avatar}" alt="" /></a>
									<div class="sl-item">
										<p>{$vo.content}</p>
										<p class="text-color-999">{$vo.time} 
											<if condition="$vo.uid eq $common['user']['id']">
												{$vo.read_on}
											</if>
										</p>
										<i class="i-private-replay-triangle"></i>
									</div>
								</li>
							</volist>
							<li class='<if condition="$message.uid neq $common['user']['id']">active</if>'>
								<a href="{:U("Member/".$message['uid'])}" title="{$message.username}" class="sl-user-img sl-border-radius-5"><img src="{$message.avatar}" alt="" /></a>
								<div class="sl-item">
									<p>{$message.content}</p>
									<p class="text-color-999">{$message.time} 
										<if condition="$message.uid eq $common['user']['id']">
											{$message.read_on}
										</if>
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
			<li><a href='{:U("Member/".$common['user']['id']."")}' rel="all"><i class="icon icon-home"></i>个人中心</a></li>
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
<include file="Public:footer"/>