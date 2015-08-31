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
<div class="sl-container-wrap">
 	<div class="nav-title"><a href="/">首页</a>》发表帖子</div>
	<div class="container sl-publish">
		<div class="row">
			<div class="sl-content-wrap clearfix">
				<div class="col-sm-12 col-md-9 sl-main-content">
					<ul class="nav nav-tabs sl-nav-tabs active">
						<h2 class="hidden-xs"><i class="icon icon-ask"></i> 发布帖子</h2>
					</ul>
					<?php if(!empty($errmsg)){ ?>
						<li class="alert alert-danger error_message" style="display:block;margin:10px 20px;text-align:center;">
							<span class="glyphicon glyphicon-remove"></span> <em><?php echo ($errmsg); ?></em>
						</li>
					<?php } ?>
					<form action="<?php echo U('Topic/post');?>" method="post" id="question_form">
						<div class="sl-mod sl-mod-publish">
							<div class="mod-body">
								<h4>标题:</h4>
								<div class="sl-publish-title active">
									<div>
										<input type="text" placeholder="标题为3-50个字符" name="title" id="question_contents" value="" class="form-control" />
									</div>
								</div>
								<h4>帖子内容:</h4>
								<link rel="stylesheet" href="/Public/editor/themes/default/default.css" />
								<script charset="utf-8" src="/Public/editor/kindeditor-min.js"></script>
								<script>
									var editor;
									KindEditor.ready(function(K) {
										editor = K.create('textarea[name="content"]', {
										width : "99%", 
										resizeType : 1,

										themeType : 'simple',
										allowPreviewEmoticons : true,
										allowImageUpload : true,
										readonlyMode : <?php echo empty(session('user_id'))?'true':'false'; ?>,
										items : [
											 'fontname','fontsize','forecolor','bold', 'italic', 'underline','insertorderedlist','code', 'emoticons','|','source','quickformat','fullscreen']
										});
									});
								</script>
								<div class="sl-mod sl-editor-box">
									<div class="mod-head">
										<div class="wmd-panel">
								            <textarea class="wmd-input form-control autosize editor" id="content" rows="8" name="content"  placeholder="内容至少5个字符"></textarea>
								        </div>
									</div>
									<h4>选择版块:</h4>
								<div class="sl-publish-title active">
									<div>
										<select name="forum" class="form-control">
											<?php if(is_array($forum_list)): $i = 0; $__LIST__ = $forum_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$forum): $mod = ($i % 2 );++$i;?><option value="<?php echo ($forum["id"]); ?>"><?php echo ($forum["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
										</select>
									</div>
								</div>
									<div class="mod-body">
										<span class="pull-right text-color-999" id="question_detail_message">&nbsp;</span>
										<div class="sl-upload-box" style="margin-top: 15px;">
											<img src="<?php echo U('Public/verify');?>" onclick="this.src=this.src+'?'+Math.random" style="float:left;"/>
											<input type="text" id="sl-login-user-verify" class="form-control" placeholder="验证码" name="verify" style="max-width:150px;float:right;"/>
										</div>
									</div>
								</div>
								<div class="clean"></div>
								<div style="margin-top:10px;">
									<input type="submit" value="发布帖子" class="btn btn-large btn-success btn-publish-submit pull-right" style="margin-bottom: 10px;" />
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="clean"></div>
			<div style="padding:10px;border-top: 1px solid #EAEAEA;">
				<div class="mod-head">
					<h4>发帖规则</h4>
				</div>
				<div class="mod-body">
					<p><b>• 标题:</b> 请用精简准确的语言描述您发布的主题内容</p>
					<p><b>• 内容:</b> 请勿发布：动民族仇恨、民族歧视，破坏民族团结，或者侵害民族风俗、习惯；破坏国家宗教政策，宣扬邪教、迷信；宣传淫秽、赌博、暴力；侮辱或者诽谤他人，侵害他人合法权益的；含有法律、行政法规禁止的其他内容的内容。
					<p><b>• 金钱规则：</b> 每发布一个主题增加10金钱,附件主题增加20金钱 每多一个回复你将获得 5 个金钱的奖励 。</p>
				</div>
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