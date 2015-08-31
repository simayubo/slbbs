<include file="Public:header"/>
<div class="nav-title"><a href="/">首页</a>》私信</div>
<div id="main" style="padding:0 10px;">
	<h3>私信 <button type="button" class="pull-right btn btn-mini btn-success" data-toggle="modal" data-target="#myModal"> 新私信</button></h3>
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
	<!--end 发送私信-->
	<volist name="message" id="vo" empty="还没有收信哦！">
		<div class="msg-list">
			<ul><li>
				<h5 style="font-size: 1.1em; border-top: 1px solid #EAEAEA;padding-top: 10px;"><a href="{:U('Message/m/'.$vo['id'].'')}">{$vo.content|strip_tags}</a> {$vo.read_on}</h5>
				<p><span class="pull-right"><a href="" class="text-color-999">删除</a></span>
				<span style="font-size: 0.9em;color:#777;">对话：<a href="{:U('Member/'.$vo['uid'].'')}">{$vo.username}</a> | {$vo.time}</span>
			</li></ul>
		</div>
	</volist>
	<div class="page-control"><ul class="pagination">{$page}</ul></div>
	<!--end 列表-->
</div>
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<include file="Public:footer"/>