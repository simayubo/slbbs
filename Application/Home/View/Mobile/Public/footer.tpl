<div class="nav-title"><a href="/" class="btn btn-xs btn-primary">首页</a> <a href="{:U('Forum/index')}" class="btn btn-xs btn-success">论坛</a> <a href="{:U('Message/inbox')}" class="btn btn-xs btn-info">信箱</a> 
<?php if(empty(session('user_id'))){ ?>
<a href="{:U('User/login')}" class="btn btn-xs btn-danger">登录</a>
<?php }else{ ?>
<a href="{:U('User/unlogin')}" class="btn btn-xs btn-danger">退出登录</a>
<?php } ?>
 &nbsp;&nbsp;&nbsp;&nbsp;<a href="{:U('Topic/post')}" class="btn btn-xs btn-warning">发帖</a></div>
<div id="footer">
	Powered By <a href="/" target="blank">SLBBS 1.0</a> <br/><?php G('end'); echo "页面执行:".G('begin','end').'s'; ?><IF condition="$common['user']['admin'] eq 1"><a href="{:U('Slbbsadmin/Index/index')}">后台管理</a></IF>
</div>
</body>
</html>
