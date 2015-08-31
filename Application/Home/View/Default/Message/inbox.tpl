<include file="Public:header"/>
<div class="sl-container-wrap">
	<div class="container">
		<div class="row">
			<div class="sl-content-wrap clearfix">
				<div class="col-sm-12 col-md-9 sl-main-content">
					<div class="sl-mod sl-inbox">
						<div class="mod-head common-head">
							<h2>
								<button type="button" class="pull-right btn btn-mini btn-success" data-toggle="modal" data-target="#myModal"> 新私信</button>
								<span class="pull-right sl-setting-inbox hidden-xs"><a class="text-color-999" href="#"><i class="icon icon-setting"></i> 私信设置</a></span>
								私信
							</h2>
							<!-- 写新私信 -->
							<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  								<div class="modal-dialog" role="document">
    								<div class="modal-content">
      									<div class="modal-header">
        									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        									<h4 class="modal-title" id="myModalLabel">发送新私信</h4>
      									</div>
      								<div class="modal-body">
      									<form action="{:U('Message/sendMessage')}" method="post">
      										<input type="text" name="send_id" class="form-control" placeholder="发送给谁？(请填写用户ID)"><br/>
      										<textarea name="content" rows="4" class="form-control" placeholder="私信内容(1-2000字)"></textarea>
      								</div>
      								<div class="modal-footer">
        								<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
       							 		<input type="submit" class="btn btn-primary" value="发送" />
       							 		</form>
      								</div>
    							</div>
  							</div>
						</div>
						</div>
						<div class="mod-body sl-feed-list">
						<volist name="message" id="vo" empty="还没有收信哦！">
							<div class="sl-item">
								<div class="mod-head">
									<a class="sl-user-img sl-border-radius-5 hidden-xs" href="{:U('Member/'.$vo['uid'].'')}"><img src="{$vo.avatar}" alt="" /></a>
									<p>私信对话：<a class="sl-user-name" href="{:U('Member/'.$vo['uid'].'')}">{$vo.username}</a></p>
									<p class="content"><a href="{:U('Message/m/'.$vo['id'].'')}">{$vo.content}</a> {$vo.read_on}</p>
									<p class="text-color-999">
										<span class="pull-right"><a href="" class="text-color-999">删除</a></span>
										<span>{$vo.time}</span>
									</p>
								</div>
							</div>
						</volist>
						</div>
						<div class="mod-footer">
							<div class="page-control"><ul class="pagination">{$page}</ul></div>
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
			
		</ul>
	</div>
</div>		</div>
				<!-- end 侧边栏 -->
<include file="Public:footer"/>