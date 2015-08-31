<include file="Public:header"/>
<div id="main">
	<div class="nav-title"><a href="/">首页</a>》<a href="{$topic.forum_url}" class="text">{$topic.forum_name}</a>》帖子列表</div>
	<div class="topic-header">
		<h1>{$topic.topic_title}</h1>
		<span><a href="{$topic.user_url}" rel="nofollow">{$topic.username}</a> / {$topic.date} / {$topic.views} 次浏览</span>
	</div>
	<div class="topic-body">
		{$topic.content}
		<notempty name="topic.sign">
			<span style="display:block; margin-top: 20px; color:#666;font-size: 0.9em;">签名：{$topic.sign}</span>
		</notempty>
		<notempty name="power_nav">
			<span style="display:block; margin-top: 5px;border-top: 1px solid #EAEAEA;padding-top: 10px;">
				帖子操作：{$power_nav}
			</span>
		</notempty>
	</div>
	<div class="nav-title">帖子回复({$topic.reply})</div>
	<div class="comment">
		<ul>
			<volist name="comment" id='vo' empty="暂无回复">
				<li>{$vo.sort}<a href="{$vo.user_url}" name="common-{$vo.id}">{$vo.username}</a>：
				<if condition="$vo.hide eq 0"><span style='font-size:0.9em;color:#777;'>此评论信息已被屏蔽</span>
				<else/>{$vo.content} <font color='#777' size="0.9em">---{$vo.time}</font> <a onclick="aite('{$vo.username}');return false" href="#">回复</a>
				</if> </li>
			</volist>
		</ul>
	</div>
	<notempty name="page">
		<div class="page"><ul class="pagination">{$page}</ul></div>
	</notempty>
	<div class="nav-title">快速回复</div>
	<div class="reply">
		<div class="mod-head">
			<form method='post' action='{:U("Topic/comment")}'>
			<label><?php echo session('?user_id')?$common['user']['username']:'游客'; ?></label>
		</div>
		<div class="mod-body">
			<div class="sl-mod sl-editor-box">
				<div class="mod-head">
					<div class="form-group">
						<textarea class="form-control" id="content" rows="5" name="content" style="border: 1px solid #CCC;" placeholder="评论内容为3-1000个字符"></textarea>
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
<include file="Public:footer"/>
<script type="text/javascript">
	function aite(str) {
  		var txt = document.getElementsByName("content")[0];
		txt.value += "@"+str+", ";
	}
</script>