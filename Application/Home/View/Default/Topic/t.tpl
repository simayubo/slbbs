<include file="Public:header"/>
<div class="sl-container-wrap">
	<div class="container">
		<div class="row">
			<div class="sl-content-wrap clearfix">
				<div class="col-sm-12 col-md-9 sl-main-content">
					<div class="sl-mod sl-topic-bar" id="question_topic_editor" data-type="question" data-id="23844">
						<div class="tag-bar clearfix">
							<span class="topic-tag" data-id="1783">
								<a href="/" class="text">返回首页</a>
							</span>
							<span class="topic-tag" data-id="371">
								<a href="{$topic.forum_url}" class="text">{$topic.forum_name}</a>
							</span>
						</div>
					</div>
					<div class="sl-mod sl-question-detail sl-item">
						<div class="mod-head">
							<h1>{$topic.topic_title} </h1>
							<p style="color:#777;font-size:0.9em;padding-top:5px;"><a href="{$topic.user_url}" rel="nofollow">{$topic.username}</a> / {$topic.date} / {$topic.views} 次浏览
							</p>
						</div>
						<div class="mod-body">
							<div class="content markitup-box">
								{$topic.content}
								<notempty name="topic.sign">
			<span style="display:block; margin-top: 20px; color:#666;font-size: 0.9em;">签名：{$topic.sign}</span>
		</notempty>
							</div>
						</div>
						<div class="mod-footer">
							<div class="meta">
								<notempty name="power_nav">
			<span style="display:block; margin-top: 5px;border-top: 1px solid #EAEAEA;padding-top: 10px;">
				帖子操作：{$power_nav}
			</span>
		</notempty>
							</div>
						</div>
					</div>
					<!-- comment start -->
					<div class="sl-mod sl-question-comment">
						<div class="mod-head">
							<ul class="nav nav-tabs sl-nav-tabs active">
								<h2 class="hidden-xs">{$topic.reply} 个回复</h2>
							</ul>
						</div>
						<div class="mod-body sl-feed-list">

							<volist name="comment" id='com' empty="暂无回复">
							<div class="sl-item">
								<div class="mod-head">
									<a class="anchor" name="comment-{$com.id}"></a>
									<a class="sl-user-img sl-border-radius-5" href="{$com.user_url}"><img src="{$com.avatar_url}" alt="" /></a>
									<div class="title">
										<p><a class="sl-user-name" href="{$com.user_url}">{$com.username}</a>
										</p>
									</div>
								</div>
								<div class="mod-body clearfix">
									<div class="markitup-box">
										<if condition="$com.hide eq 0"><span style='font-size:0.9em;color:#777;'>此评论信息已被屏蔽</span>
										<else/>
										{$com.content} <a onclick="aite('{$com.username}');return false" href="#re" class="pull-right" style="font-size: 0.9em;">回复</a>
										</if>
									</div>
									<span class="text-color-999">{$com.time}</span>
								</div>		
							</div>
							</volist>
						</div>
					</div>
					<div class="mod-footer">
									<div class="page-control"><ul class="pagination">{$page}</ul> </div>	
								</div>
					<!-- end commont -->
					<div class="sl-mod sl-replay-box question">
						<a name="topic_form"></a>
					<form method='post' action='{:U("Topic/comment")}'>
						<div class="mod-head">
							<a href="{$topic.user_url}" class="sl-user-name"><img src="<?php echo session('?user_id')?$common['user']['avatar_url']:'__PUBLIC__/icon/avatar/default.png'; ?>" /></a>
							<p>
								<label class="pull-right">
									<input type="checkbox" value="1" /> 跟踪主题
								</label>
								<label class="pull-right">
									<a href="#" target="_blank">回帖规则</a>
								</label>
								<label><?php echo session('?user_id')?$common['user']['username']:'游客'; ?></label>
							</p>
						</div>
						
						<div class="mod-body">
							<div class="sl-mod sl-editor-box">
								<div class="mod-head">
									<div class="form-group">
										<a name="re" id="re"></a>
							   			<textarea class="form-control" id="comment-content" rows="8" name="content" style="border: 1px solid #CCC;" placeholder="评论内容为5-1000个字符"></textarea>
									</div>
								</div>
								<input type="hidden" name='tid' value='{$topic.id}'/>
								<input type="hidden" name='fid' value='{$topic.forum_id}'/>
								<div class="mod-body clearfix">
									<input type="submit" class="btn btn-normal btn-success pull-right btn-reply" value="回复" />
								</div>
							</div>
						</div>
					</form>
				</div>
				</div>
				<!-- 侧边栏开始 -->
				<div class="col-md-3 sl-side-bar hidden-xs hidden-sm">
					<div class="sl-mod">
						<div class="mod-head">
							<h3>楼主</h3>
						</div>
						<div class="mod-body">
							<dl>
								<dt class="pull-left sl-border-radius-5">
									<a href="{$topic.user_url}"><img alt="{$topic.username}" src="{$topic.avatar_url}" /></a>
								</dt>
								<dd class="pull-left">
									<a class="sl-user-name" href="{$topic.user_url}" data-id="1288">{$topic.username}</a>
									<p>{$topic.sign}</p>
								</dd>
							</dl>
						</div>
					</div>
					<div class="sl-mod">
						<div class="mod-head">
							<h3>最新帖子</h3>
						</div>
						<div class="mod-body font-size-12">
							<ul>
								<volist name="sideNewTopic" id="vl">
									<li><a href="{$vl.topic_url}">{$vl.topic_title}</a></li>
								</volist>
							</ul>
						</div>
					</div>
					<div class="sl-mod question-status">
						<div class="mod-head">
							<h3>帖子状态</h3>
						</div>
						<div class="mod-body">
							<ul>
								<li>最后回复: <span class="sl-text-color-blue">{$topic.last_date}</span></li>
								<li>浏览: <span class="sl-text-color-blue"></span>{$topic.views}</li>
								<li>回复: <span class="sl-text-color-blue"></span> {$topic.reply}</li>
								<li>状态: <span class="sl-text-color-blue"></span>可以回复</li>

								<li class="sl-border-radius-5" id="focus_users"></li>
							</ul>
						</div>
					</div>
				</div>
				<!-- 侧边栏结束 -->
<include file="Public:footer"/>
<script type="text/javascript">
	function aite(str) {
  		var txt = document.getElementsByName("content")[0];
		txt.value += "@"+str+", ";
	}
</script>