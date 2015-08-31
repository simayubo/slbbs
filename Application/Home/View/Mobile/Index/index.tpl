<include file="Public:header"/>
<div id="main">
	<div class="nav-title">最新帖子</div>
	<ul class="topic-list">
		<volist name="topic" id="vo" empty="还没有帖子">
			<li>
				<!--<a href="{$vo.user_url}"><img src="{$vo.avatar_url}" class="avatar" /></a>-->
				<h1 class="title"><a href="{$vo.topic_url}">{$vo.topic_title}</a></h1>
				<span>
					<a href="{$vo.forum_url}">{$vo.forum_name}</a> | <a href="{$vo.user_url}">{$vo.username}</a> | 阅: {$vo.views} | 评: {$vo.reply} | 时间：{$vo.date}
				</span>
			</li>
		</volist>
	</ul>
	<div class="nav-title">论坛版块</div>
	<volist name="forum" id="vo" empty="暂无数据">
		<ul style="list-style: none;">
			<li class="nav-title">{$vo.sort_name}</li>
			<ul>
				<volist name="vo.forum" id="vi" empty="分类下暂无版块">
					<div class="forum-block">
                        <a href="{$vi.forum_url}"><img src="{$vi.icon_url}" /></a>
                        <span>
                        	<p class="title"><a href="{$vi.forum_url}">{$vi.name}</a></p>
                        	<p style="color:#777;">帖: {$vi.topic_count} | 回: {$vi.comment_count}</p>
                        </span>
                    </div>
				</volist>
				<div class="clean"></div>
			<ul>
		</ul>
	</volist>
</div>
<!-- end 侧边栏 -->
<include file="Public:footer"/>