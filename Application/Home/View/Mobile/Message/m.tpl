<include file="Public:header"/>
<div class="nav-title"><a href="/">首页</a>》<a href="{:U('Message/inbox')}">私信列表</a>》与 {$message.username} 对话</div>
<div id="main" style="margin-top: 15px;padding:0 10px;">
	<!-- 私信内容输入框　-->
	<form action="{:U('Message/sendMessage/type/m')}" method="post">
		<textarea rows="3" class="form-control" placeholder="想要对ta说点什么?" type="text" name="content" /></textarea>
		<input type="hidden" name="send_id" value='<if condition="$message.send_id neq session('user_id')">{$message.send_id}<else />{$message.uid}</if>' />
		<input type="hidden" name="message_id" value="{$message.id}" />
		<p><button type="button" class="btn btn-mini btn-success pull-right" data-toggle="modal" data-target=".bs-example-modal-sm" style="margin-top: 10px;">发送</button>
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
<div class="clean"></div>
<ul style="list-style: none; padding:5px 10px;">
	<volist name="message_list" id="vo" empty="">
		<li style="border-top:1px solid #EAEAEA; padding: 10px 5px;display:block;word-break: break-all;word-wrap: break-word;">
			<p><a href="{:U("Member/".$vo['uid'])}" title="{$vo.username}" class="sl-user-img sl-border-radius-5">【{$vo.username}】</a>：{$vo.content}</p>
			<span style="color:#777; font-size: 0.9em;">时间:{$vo.time}  <if condition="$vo.uid eq $common['user']['id']">{$vo.read_on}</if></span>
		</li>
	</volist>
	<li style="border-top:1px solid #EAEAEA;border-bottom:1px solid #EAEAEA; padding:10px 5px;display:block;word-break: break-all;word-wrap: break-word;">
		<p><a href="{:U("Member/".$message['uid'])}" title="{$message.username}">【{$message.username}】</a>：{$message.content}</p>
		<span style="color:#777; font-size: 0.9em;">时间:{$message.time}  <if condition="$message.uid eq $common['user']['id']">{$message.read_on}</if></span>
	</li>
</ul>
<!-- end 私信内容列表 -->
<include file="Public:footer"/>
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>