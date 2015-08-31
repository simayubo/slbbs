<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<head>
	<meta http-equiv="content" content="text/html;charset=utf-8" />
	<meta content="text/html;charset=utf-8" http-equiv="Content-Type" />
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1" />
	<meta name="renderer" content="webkit" />
	<meta name="keywords" content="<?php echo ($common["website"]["site_keywords"]); ?>" />
	<meta name="description" content="<?php echo ($common["website"]["site_description"]); ?>"  />
	<link href="/Public/css/default/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
	<link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link href="/Public/css/mobile.css" rel="stylesheet" type="text/css" />
	<title><?php echo ($title); ?></title>
</head>
<body>
<header id="header">
	<div class="logo"><a href="<?php echo ($common["website"]["site_url"]); ?>"><?php echo ($common["website"]["site_title"]); ?></a></div>
	<div class="login-nav"><a href="<?php echo U('User/index');?>"><span class="glyphicon glyphicon-user"></span></a></div>
</header>
<?php if($common['user']['unmessage'] != 0 ): ?><div class="message">
		<a href="<?php echo U('Message/inbox');?>"><span class="glyphicon glyphicon-envelope"></span></a>
	</div><?php endif; ?>
<div id="main">
	<div class="nav-title"><a href="/">首页</a>》<a href="<?php echo ($topic["forum_url"]); ?>" class="text"><?php echo ($topic["forum_name"]); ?></a>》帖子列表</div>
	<div class="topic-header">
		<h1><?php echo ($topic["topic_title"]); ?></h1>
		<span><a href="<?php echo ($topic["user_url"]); ?>" rel="nofollow"><?php echo ($topic["username"]); ?></a> / <?php echo ($topic["date"]); ?> / <?php echo ($topic["views"]); ?> 次浏览</span>
	</div>
	<div class="topic-body">
		<?php echo ($topic["content"]); ?>
		<?php if(!empty($topic["sign"])): ?><span style="display:block; margin-top: 20px; color:#666;font-size: 0.9em;">签名：<?php echo ($topic["sign"]); ?></span><?php endif; ?>
		<?php if(!empty($power_nav)): ?><span style="display:block; margin-top: 5px;border-top: 1px solid #EAEAEA;padding-top: 10px;">
				帖子操作：<?php echo ($power_nav); ?>
			</span><?php endif; ?>
	</div>
	<div class="nav-title">帖子回复(<?php echo ($topic["reply"]); ?>)</div>
	<div class="comment">
		<ul>
			<?php if(is_array($comment)): $i = 0; $__LIST__ = $comment;if( count($__LIST__)==0 ) : echo "暂无回复" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><?php echo ($vo["sort"]); ?><a href="<?php echo ($vo["user_url"]); ?>" name="common-<?php echo ($vo["id"]); ?>"><?php echo ($vo["username"]); ?></a>：
				<?php if($vo["hide"] == 0): ?><span style='font-size:0.9em;color:#777;'>此评论信息已被屏蔽</span>
				<?php else: echo ($vo["content"]); ?> <font color='#777' size="0.9em">---<?php echo ($vo["time"]); ?></font> <a onclick="aite('<?php echo ($vo["username"]); ?>');return false" href="#">回复</a><?php endif; ?> </li><?php endforeach; endif; else: echo "暂无回复" ;endif; ?>
		</ul>
	</div>
	<?php if(!empty($page)): ?><div class="page"><ul class="pagination"><?php echo ($page); ?></ul></div><?php endif; ?>
	<div class="nav-title">快速回复</div>
	<div class="reply">
		<div class="mod-head">
			<form method='post' action='<?php echo U("Topic/comment");?>'>
			<label><?php echo session('?user_id')?$common['user']['username']:'游客'; ?></label>
		</div>
		<div class="mod-body">
			<div class="sl-mod sl-editor-box">
				<div class="mod-head">
					<div class="form-group">
						<textarea class="form-control" id="content" rows="5" name="content" style="border: 1px solid #CCC;" placeholder="评论内容为3-1000个字符"></textarea>
					</div>
				</div>
				<input type="hidden" name='tid' value='<?php echo ($topic["id"]); ?>'/>
				<input type="hidden" name='fid' value='<?php echo ($topic["forum_id"]); ?>'/>
				<div class="mod-body clearfix">
					<input type="submit" class="btn btn-normal btn-success pull-right btn-reply" value="回复" />
				</div>
			</div>
		</div>
		</form>
	</div>
</div>
<div class="nav-title"><a href="/" class="btn btn-xs btn-primary">首页</a> <a href="<?php echo U('Forum/index');?>" class="btn btn-xs btn-success">论坛</a> <a href="<?php echo U('Message/inbox');?>" class="btn btn-xs btn-info">信箱</a> 
<?php if(empty(session('user_id'))){ ?>
<a href="<?php echo U('User/login');?>" class="btn btn-xs btn-danger">登录</a>
<?php }else{ ?>
<a href="<?php echo U('User/unlogin');?>" class="btn btn-xs btn-danger">退出登录</a>
<?php } ?>
 &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo U('Topic/post');?>" class="btn btn-xs btn-warning">发帖</a></div>
<div id="footer">
	Powered By <a href="/" target="blank">SLBBS 1.0</a> <br/><?php G('end'); echo "页面执行:".G('begin','end').'s'; if($common['user']['admin'] == 1): ?><a href="<?php echo U('Slbbsadmin/Index/index');?>">后台管理</a><?php endif; ?>
</div>
</body>
</html>

<script type="text/javascript">
	function aite(str) {
  		var txt = document.getElementsByName("content")[0];
		txt.value += "@"+str+", ";
	}
</script>