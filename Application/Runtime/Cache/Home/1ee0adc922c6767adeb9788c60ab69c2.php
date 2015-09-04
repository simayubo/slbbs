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
	<link href="/Public/css/common.css" rel="stylesheet" type="text/css" />
	<link href="/Public/css/link.css" rel="stylesheet" type="text/css" />
	<link href="/Public/css/style.css" rel="stylesheet" type="text/css" />

	<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
	<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/Public/js/compatibility.js"></script>
	<!--[if lte IE 8]>
      	<script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      	<script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
		<script type="text/javascript" src="/Public/js/respond.js"></script>
	<![endif]-->
	<title><?php echo ($title); ?></title>
	<noscript unselectable="on" id="noscript">
    <div class="sl-404 sl-404-wrap container">
        <img src="/Public/images/no-js.jpg">
        <p>你的浏览器禁用了JavaScript, 请开启后刷新浏览器获得更好的体验!</p>
    </div>
</noscript>
</head>
<body>
	<div class="sl-top-menu-wrap">
		<div class="container">
			<!-- logo -->
			<div class="sl-logo hidden-xs">
				<a href="<?php echo ($common["website"]["site_url"]); ?>"><?php echo ($common["website"]["site_title"]); ?></a>
			</div>
			<!-- end logo -->
			
			<!-- 导航 -->
			<div class="sl-top-nav navbar">
				<div class="navbar-header">
				  <button  class="navbar-toggle pull-left">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				</div>
				<nav role="navigation" class="collapse navbar-collapse bs-navbar-collapse">
					<ul class="nav navbar-nav">
						<li><a href="/"><span class="glyphicon glyphicon-list"> </span> 动态</a></li>
						<li><a href="<?php echo U('Forum/index');?>" ><span class="glyphicon glyphicon-th-large"> </span> 版块列表</a></li>
						<li><a href="#"><span class="glyphicon glyphicon-play-circle"> </span>  博客</a></li>			
						<!--<li>
							<a style="font-weight:bold;">· · ·</a>
							<div class="dropdown-list pull-right">
								<ul id="extensions-nav-list">
									<li><a href="http://wenda.wecenter.com/project/"><span class="glyphicon glyphicon-th-large"> </span> 活动</a></li>
								</ul>
							</div>
						</li>-->
				 	</ul>
				</nav>
			</div>
			<div class="sl-user-nav">
				<?php if (empty(session('user_id'))) { ?>
				<a class="login btn btn-normal btn-primary" href="<?php echo U('User/login');?>">登录</a>
				<a class="register btn btn-normal btn-success" href="<?php echo U('User/register');?>">注册</a>
				<?php }else{ ?>
				<a href="<?php echo U("Member/".$common['user']['id']."");?>" class="sl-user-nav-dropdown">
					<img alt="<?php echo ($common["user"]["username"]); ?>" src="<?php echo ($common["user"]["avatar_url"]); ?>" />
				</a>
				<div class="sl-dropdown dropdown-list pull-right">
					<ul class="sl-dropdown-list">
						<li><a href="<?php echo U('Message/inbox');?>"><span class="glyphicon glyphicon-envelope"></span> 私信<span class="badge"><?php echo ($common["user"]["unmessage"]); ?></span></a></li>
						<li class="hidden-xs"><a href='<?php echo U("Member/".$common['user']['id']."");?>'><span class="glyphicon glyphicon-user"></span> 个人中心</a></li>
						<li><a href="<?php echo U('User/unlogin');?>"><span class="glyphicon glyphicon-off"></span> 退出登录</a></li>
					</ul>	
				</div>
			</div>
			<!-- 发起 -->
			<div class="sl-publish-btn">
				<a id="header_publish"href="<?php echo U('Topic/post');?>" class="btn-primary"><span class="glyphicon glyphicon-edit"></i> 发表</a>
				<div class="dropdown-list pull-right">
					<ul>
						<li><a href="<?php echo U('Topic/post');?>">帖子</a></li>
						<li><a href="#">文章</a></li>
					</ul>
				</div>
			</div>
			<!-- end 发起 -->
			<?php } ?>
		</div>
	</div>
</div>
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
								<a href="<?php echo ($topic["forum_url"]); ?>" class="text"><?php echo ($topic["forum_name"]); ?></a>
							</span>
						</div>
					</div>
					<div class="sl-mod sl-question-detail sl-item">
						<div class="mod-head">
							<h1><?php echo ($topic["topic_title"]); ?> </h1>
							<p style="color:#777;font-size:0.9em;padding-top:5px;"><a href="<?php echo ($topic["user_url"]); ?>" rel="nofollow"><?php echo ($topic["username"]); ?></a> / <?php echo ($topic["date"]); ?> / <?php echo ($topic["views"]); ?> 次浏览
							</p>
						</div>
						<div class="mod-body">
							<div class="content markitup-box">
								<?php echo ($topic["content"]); ?>
								<?php if(!empty($topic["sign"])): ?><span style="display:block; margin-top: 20px; color:#666;font-size: 0.9em;">签名：<?php echo ($topic["sign"]); ?></span><?php endif; ?>
							</div>
						</div>
						<div class="mod-footer">
							<div class="meta">
								<?php if(!empty($power_nav)): ?><span style="display:block; margin-top: 5px;border-top: 1px solid #EAEAEA;padding-top: 10px;">
				帖子操作：<?php echo ($power_nav); ?>
			</span><?php endif; ?>
							</div>
						</div>
					</div>
					<!-- comment start -->
					<div class="sl-mod sl-question-comment">
						<div class="mod-head">
							<ul class="nav nav-tabs sl-nav-tabs active">
								<h2 class="hidden-xs"><?php echo ($topic["reply"]); ?> 个回复</h2>
							</ul>
						</div>
						<div class="mod-body sl-feed-list">

							<?php if(is_array($comment)): $i = 0; $__LIST__ = $comment;if( count($__LIST__)==0 ) : echo "暂无回复" ;else: foreach($__LIST__ as $key=>$com): $mod = ($i % 2 );++$i;?><div class="sl-item">
								<div class="mod-head">
									<a class="anchor" name="comment-<?php echo ($com["id"]); ?>"></a>
									<a class="sl-user-img sl-border-radius-5" href="<?php echo ($com["user_url"]); ?>"><img src="<?php echo ($com["avatar_url"]); ?>" alt="" /></a>
									<div class="title">
										<p><a class="sl-user-name" href="<?php echo ($com["user_url"]); ?>"><?php echo ($com["username"]); ?></a>
										</p>
									</div>
								</div>
								<div class="mod-body clearfix">
									<div class="markitup-box">
										<?php if($com["hide"] == 0): ?><span style='font-size:0.9em;color:#777;'>此评论信息已被屏蔽</span>
										<?php else: ?>
										<?php echo ($com["content"]); ?> <a onclick="aite('<?php echo ($com["username"]); ?>');return false" href="#re" class="pull-right" style="font-size: 0.9em;">回复</a><?php endif; ?>
									</div>
									<span class="text-color-999"><?php echo ($com["time"]); ?></span>
								</div>		
							</div><?php endforeach; endif; else: echo "暂无回复" ;endif; ?>
						</div>
					</div>
					<div class="mod-footer">
									<div class="page-control"><ul class="pagination"><?php echo ($page); ?></ul> </div>	
								</div>
					<!-- end commont -->
					<div class="sl-mod sl-replay-box question">
						<a name="topic_form"></a>
					<form method='post' action='<?php echo U("Topic/comment");?>'>
						<div class="mod-head">
							<a href="<?php echo ($topic["user_url"]); ?>" class="sl-user-name"><img src="<?php echo session('?user_id')?$common['user']['avatar_url']:'/Public/icon/avatar/default.png'; ?>" /></a>
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
				<!-- 侧边栏开始 -->
				<div class="col-md-3 sl-side-bar hidden-xs hidden-sm">
					<div class="sl-mod">
						<div class="mod-head">
							<h3>楼主</h3>
						</div>
						<div class="mod-body">
							<dl>
								<dt class="pull-left sl-border-radius-5">
									<a href="<?php echo ($topic["user_url"]); ?>"><img alt="<?php echo ($topic["username"]); ?>" src="<?php echo ($topic["avatar_url"]); ?>" /></a>
								</dt>
								<dd class="pull-left">
									<a class="sl-user-name" href="<?php echo ($topic["user_url"]); ?>" data-id="1288"><?php echo ($topic["username"]); ?></a>
									<p><?php echo ($topic["sign"]); ?></p>
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
								<?php if(is_array($sideNewTopic)): $i = 0; $__LIST__ = $sideNewTopic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vl): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vl["topic_url"]); ?>"><?php echo ($vl["topic_title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
							</ul>
						</div>
					</div>
					<div class="sl-mod question-status">
						<div class="mod-head">
							<h3>帖子状态</h3>
						</div>
						<div class="mod-body">
							<ul>
								<li>最后回复: <span class="sl-text-color-blue"><?php echo ($topic["last_date"]); ?></span></li>
								<li>浏览: <span class="sl-text-color-blue"></span><?php echo ($topic["views"]); ?></li>
								<li>回复: <span class="sl-text-color-blue"></span> <?php echo ($topic["reply"]); ?></li>
								<li>状态: <span class="sl-text-color-blue"></span>可以回复</li>

								<li class="sl-border-radius-5" id="focus_users"></li>
							</ul>
						</div>
					</div>
				</div>
				<!-- 侧边栏结束 -->
			</div>
		</div>
	</div>
</div>
<div class="sl-footer-wrap">
	<div class="sl-footer">
		Copyright © 2015<span class="hidden-xs"> - SLBBS, All Rights Reserved</span>
		<span class="hidden-xs">Powered By <a href="/" target="blank">SLBBS 1.0</a></span>
	</div>
</div>
</body>
</html>

<script type="text/javascript">
	function aite(str) {
  		var txt = document.getElementsByName("content")[0];
		txt.value += "@"+str+", ";
	}
</script>