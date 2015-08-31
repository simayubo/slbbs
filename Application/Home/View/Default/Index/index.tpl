<include file="Public:header"/>
<div class="sl-container-wrap">
	<div class="container">
		<div class="row">
			<div class="sl-content-wrap clearfix">
				<div class="col-sm-12 col-md-9 sl-main-content">
					<!-- tab切换 -->
					<ul class="nav nav-tabs sl-nav-tabs active hidden-xs">
						<li class="active"><a href="/">最新</a></li>
						<h2 class="hidden-xs"><i class="icon icon-list"></i> 帖子动态</h2>
					</ul>
					<!-- end tab切换 -->
					<div class="sl-mod sl-explore-list">
						<div class="mod-body">
							<div class="sl-common-list">
								<volist name="topic" id='topic' empty="暂无数据">
									<div class="sl-item active">
										<a class="sl-user-name hidden-xs" data-id="16803" href="{$topic.user_url}" rel="nofollow">
										<img src="{$topic.avatar_url}" alt="" /></a>	
										<div class="sl-question-content">
											<h4><a href="{$topic.topic_url}" title="{$topic.topic_title}">{$topic.topic_title}</a></h4>
											<a href="{$topic.topic_url}#topic_form" class="pull-right text-color-999" title="查看所有评论">{$topic.reply}</a>
											<span class="text-color-999"><a href="{$topic.forum_url}"  class="sl-user-name"> {$topic.forum_name}</a> • <a href="{$topic.user_url}" class="sl-user-name" rel="nofollow">{$topic.username}</a> • {$topic.views} 次浏览 • {$topic.date}</span>
										</div>
									</div>
								</volist>
							</div>
						</div>
						<div class="mod-footer">
							<div class="page-control"><ul class="pagination">{$page}</ul>
						</div>				
					</div>
				</div>
			</div>
			<!-- 侧边栏 -->
<div class="col-sm-12 col-md-3 sl-side-bar hidden-xs hidden-sm">
	<div class="sl-mod">
		<div class="mod-head">
			<h3>公告</h3>
		</div>
		<div class="mod-body">
			<p>
				写个东西玩玩;<br/>
				<!--开发时间：{$developTime.day} 天, 大约 {$developTime.hour} 小时-->
			</p>
		</div>
	</div>
	<div class="sl-mod sl-text-align-justify">
		<div class="mod-head">
			<a href="{:U('Forum/index')}" class="pull-right">更多 &gt;</a>
			<h3>推荐版块</h3>
		</div>
		<div class="mod-body">
			<volist name="forum_hot" id="vo" empty="暂无热门版块">
				<dl>
					<dt class="pull-left sl-border-radius-5">
						<a href="{$vo.forum_url}"><img alt="" src="{$vo.icon_url}" /></a>
					</dt>
					<dd class="pull-left">
						<p class="clearfix">
							<span class="topic-tag">
								<a href="{$vo.forum_url}" class="text" data-id="2078">{$vo.name}</a>
							</span>
						</p>
						<p><b>{$vo.topic_count}</b> 个主题, <b>{$vo.comment_count}</b> 个回复</p>
						
					</dd>
				</dl>
			</volist>
		</div>
	</div>
	<div class="sl-mod sl-text-align-justify">
		<div class="mod-head">
			<a href="{:U('User/list')}" class="pull-right">更多 &gt;</a>
			<h3>热门用户</h3>
		</div>
		<div class="mod-body">
		<volist name="user_list" id="vo" empty="暂无数据">
			<dl>
				<dt class="pull-left sl-border-radius-5">
					<a href="{$vo.url}"><img alt="" src="{$vo.avatar_url}" /></a>
				</dt>
				<dd class="pull-left">
					<a href="{$vo.url}" class="sl-user-name">{$vo.username}</a>
					<p class="signature"></p>
					<p><b>{$vo.topic_count}</b> 个主题, <b>{$vo.reply_count}</b> 次回复</p>
				</dd>
			</dl>
		</volist>
		</div>
	</div>
	<div class="sl-mod">
		<div class="mod-head">
			<h3>论坛统计</h3>
		</div>
		<div class="mod-body">
			<p>总主题：{$count.topic}</p>
			<p>回复量：{$count.comment}</p>
			<p>用户统计：{$count.user}</p>
		</div>
	</div>
</div>
<!-- end 侧边栏 -->
<include file="Public:footer"/>