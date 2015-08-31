<include file="Public:header"/>
<div class="sl-container-wrap">
	<div class="container">
		<div class="row">
			<div class="sl-content-wrap clearfix">
				<div class="col-sm-12 col-md-9 sl-main-content">
					<ul class="nav nav-tabs sl-nav-tabs active hidden-xs">
                        <li class="active"><a href="#">全部</a></li>
                        <h2 class="hidden-xs"><span class="glyphicon glyphicon-th-list"></span> {$forum.name}</h2>
                    </ul>
					<div class="sl-mod sl-topic-category">
                        <div class="mod-body clearfix">
                            <ul>
                                <li><a class="active" href="#">全部标签</a></li>
                                <li><a href="#">开发</a></li>
                                <li><a href="#">微信</a></li>
                            </ul>
                        </div>
                    </div>
					<div class="sl-mod sl-explore-list">
						<div class="mod-body">
							<div class="sl-common-list">
								<volist name="topic" id='topic' empty="还没有帖子哦！">
									<div class="sl-item active">
										<a class="sl-user-name hidden-xs" data-id="16803" href="{$topic.user_url}" rel="nofollow">
										<img src="{$topic.avatar_url}" alt="" /></a>	
										<div class="sl-question-content">
											<h4><a href="{$topic.topic_url}" title="{$topic.topic_title}">{$topic.topic_title}</a></h4>
											<a href="{$topic.topic_url}#topic_form" class="pull-right text-color-999" title="查看所有评论">{$topic.reply}</a>
											<span class="text-color-999"><a href="{$topic.forum_url}"  class="sl-user-name"> {$topic.forum_name}</a> • <a href="{$topic.user_url}" class="sl-user-name" rel="nofollow">{$topic.username}</a> • {$topic.views} 次浏览 • {$topic.date} • 最后动态：{$topic.last_date}</span>
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
			<div class="col-sm-12 col-md-3 sl-side-bar hidden-xs">
			<div class="sl-mod">
					<div class="mod-head">
						<h3>版主</h3>
					</div>
					<div class="mod-body">
						<dl>
							<dt class="pull-left sl-border-radius-5">
								<a href="#"><img src="http://wenda.wecenter.com/uploads/avatar/000/00/00/02_avatar_mid.jpg" alt="" /></a>
							</dt>
							<dd class="pull-left">
								<a class="sl-user-name" href="#">zhengqiang	</a>
								<p>共 <b>62</b> 主题, <b>64</b> 次回复</p>
							</dd>
						</dl>
					</div>
				</div>
				<div class="sl-mod sl-text-align-justify">
					<div class="mod-head">
						<h3>版块介绍</h3>
					</div>
					<div class="mod-body">
						<p>{$forum.intor}</p>
					</div>
				</div>
				<div class="sl-mod sl-text-align-justify">
					<div class="mod-head">
						<h3>版块信息</h3>
					</div>
					<div class="mod-body">
						<p>帖子总量：{$forum.topic_count}</p>
						<p>回帖总量：{$forum.comment_count}</p>
						<p>开版时间：{$forum.time}</p>
					</div>
				</div>
				<div class="sl-mod topic-about">
					<div class="mod-head">
						<h3>相关标签</h3>
					</div>
					<div class="mod-body" data-type="topic">
						<div class="sl-topic-bar" data-type="topic" data-id="11">
							<div class="tag-bar clearfix">
								<span class="topic-tag" data-id="5">
									<a class="text" href="#">bug</a>
								</span>	
								<span class="topic-tag" data-id="9">
									<a class="text" href="#">功能</a>
								</span>	
								<span class="topic-tag" data-id="84">
									<a class="text" href="#">用户体验</a>
								</span>	
							</div>
						</div>
					</div>
				</div>
			</div>
			
<include file="Public:footer"/>