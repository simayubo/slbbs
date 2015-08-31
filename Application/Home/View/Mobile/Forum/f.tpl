<include file="Public:header"/>
<div id="main">
	<div class="nav-title"><a href="/">首页</a>》<a href="{:U('Forum/index')}">所有版块</a>》{$forum.name}</div>
	<ul class="topic-list">
		<volist name="topic" id="vo" empty="还没有帖子">
			<li>
				<!--<a href="{$vo.user_url}"><img src="{$vo.avatar_url}" class="avatar" /></a>-->
				<h1 class="title"><a href="{$vo.topic_url}">{$vo.topic_title}</a></h1>
				<span>
					<a href="{$vo.forum_url}">{$vo.forum_name}</a> | <a href="{$vo.user_url}">{$vo.username}</a> | 阅: {$vo.views} | 评: {$vo.reply} | 最后动态：{$vo.last_date}
				</span>
			</li>
		</volist>
	</ul>
	<div class="page"><ul class="pagination">{$page}</ul></div>
</div>
<!-- end 侧边栏 -->
<include file="Public:footer"/>