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
                    <!-- 用户数据内容 -->
                    <div class="sl-mod sl-user-detail-box">
                        <div class="mod-head">
                            <img src="<?php echo ($user["avatar_url"]); ?>" alt="<?php echo ($user["username"]); ?>" />
                            <?php if (session('user_id')==$user['id']) { ?>
                                <span class="pull-right operate">
                                    <a href="<?php echo U('User/edit');?>" class="btn btn-mini btn-success">编辑</a>
                                </span>
                            <?php } ?>
                            <h1><?php echo ($user["username"]); ?>  &nbsp;&nbsp;(<?php echo ($user["power"]); ?>) </h1>
                            <p class="text-color-999"><?php echo ($user["sign"]); ?></p>
                            <p class="sl-user-flag">
                                <span>
                                    <span class="glyphicon glyphicon-envelope"></span> <?php echo ($user["email"]); ?>
                                </span>&nbsp;&nbsp;
                                <span>
                                    <span class="glyphicon glyphicon-user"></span> <?php echo ($user["sex"]); ?>
                                </span>&nbsp;&nbsp;
                                <span>
                                	<button type="button" class="pull-right btn btn-mini btn-success" data-toggle="modal" data-target="#myModal"> 发消息</button>
                                </span>
                                <!-- 写新私信 -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">发送新私信</h4>
                                        </div>
                                    <div class="modal-body">
                                        <form action="<?php echo U('Message/sendMessage');?>" method="post">
                                            <input type="hidden" name="send_id" value="<?php echo ($user["id"]); ?>">
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
                            </p>
                        </div>
                        <div class="mod-body">
                            <div class="meta">
                                <i><span class="glyphicon glyphicon-heart"></span> 威望 : <em class="sl-text-color-green">0</em></i>
                                <i><span class="glyphicon glyphicon-align-left"></span> 金钱 : <em class="sl-text-color-orange"><?php echo ($user["money"]); ?></em></i>
                                <i><span class="glyphicon glyphicon-thumbs-up"></span> 点赞 : 0  </i>
                            </div>
                            
                        </div>
                        <div class="mod-footer">
                            <ul class="nav nav-tabs sl-nav-tabs">
                            	<li class="active"><a href="#actions" id="page_actions" data-toggle="tab">动态</a></li>
                                <li><a href="#articles" id="page_articles" data-toggle="tab">帖子<span class="badge"><?php echo ($user["topic_count"]); ?></span></a></li>
                                <li><a href="#answers" id="page_answers" data-toggle="tab">回复<span class="badge"><?php echo ($user["reply_count"]); ?></span></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- end 用户数据内容 -->

                    <div class="sl-user-center-tab">
                        <div class="tab-content">
                            <div class="tab-pane" id="answers">
                                <div class="sl-mod">
                                    <div class="mod-head">
                                        <h3>回复</h3>
                                    </div>
                                    <div class="mod-body">
                                        <div class="sl-profile-answer-list" id="contents_user_actions_answers"></div>
                                    </div>
                                    <div class="mod-footer">
                                        <!-- 加载更多内容 -->
                                        <a class="sl-load-more-content" id="bp_user_actions_answers_more">
                                            <span>更多</span>
                                        </a>
                                        <!-- end 加载更多内容 -->
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="articles">
                                <div class="sl-mod">
                                    <div class="mod-head">
                                        <h3>文章</h3>
                                    </div>
                                    <div class="mod-body">
                                        <div class="sl-profile-publish-list" id="contents_user_actions_articles"></div>
                                    </div>
                                    <div class="mod-footer">
                                        <!-- 加载更多内容 -->
                                        <a class="sl-load-more-content" id="bp_user_actions_articles_more">
                                            <span>更多</span>
                                        </a>
                                        <!-- end 加载更多内容 -->
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane active" id="actions">
                                <div class="sl-mod">
                                    <div class="mod-head">
                                        <h3>最新动态</h3>
                                    </div>
                                    <div class="mod-body">
                                        <div id="contents_user_actions">
                                            <?php if(is_array($member_news)): $i = 0; $__LIST__ = $member_news;if( count($__LIST__)==0 ) : echo "暂无动态" ;else: foreach($__LIST__ as $key=>$news): $mod = ($i % 2 );++$i;?><ul>
                                                <li><?php echo ($news["content"]); ?>  &nbsp;&nbsp;&nbsp;<span>---&nbsp;<i><?php echo ($news["time"]); ?></i></span></li>
                                            </ul><?php endforeach; endif; else: echo "暂无动态" ;endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 侧边栏 -->
                <div class="col-sm-12 col-md-3 sl-side-bar">
                    <div class="sl-mod people-following">
                        <div class="mod-body">
                            <span>最近访客</span>
                            <p>
                                <a class="sl-user-name" data-id="2" href="http://wenda.wecenter.com/people/zhengqiang"><img src="http://wenda.wecenter.com/uploads/avatar/000/00/00/02_avatar_mid.jpg" alt="zhengqiang" /></a>
                                <a class="sl-user-name" data-id="10" href="http://wenda.wecenter.com/people/yanc"><img src="http://wenda.wecenter.com/uploads/avatar/000/00/00/10_avatar_mid.jpg" alt="yanc" /></a>
                                <a class="sl-user-name" data-id="49" href="http://wenda.wecenter.com/people/slSupport"><img src="http://wenda.wecenter.com/uploads/avatar/000/00/00/49_avatar_mid.jpg" alt="slSupport" /></a>
                                <a class="sl-user-name" data-id="5167" href="http://wenda.wecenter.com/people/kk"><img src="http://wenda.wecenter.com/uploads/avatar/000/00/51/67_avatar_mid.jpg" alt="kk" /></a>
                                <a class="sl-user-name" data-id="9991" href="http://wenda.wecenter.com/people/jat"><img src="http://wenda.wecenter.com/uploads/avatar/000/00/99/91_avatar_mid.jpg" alt="jat" /></a>
                            </p>
                        </div>
                    </div>
                    <div class="sl-mod people-following">
                        <div class="mod-body">
                            <a href="#" class="pull-right font-size-12">我要留言</a>
                            <span>共 <em class="sl-text-color-blue">0</em> 条留言</span>
                        </div>
                    </div>
                    <div class="sl-mod">
                        <div class="mod-body">
                            <span class="sl-text-color-666">
                                <p>主页访问量 : <?php echo ($user["views"]); ?> 次访问 </p>
                                <p>注册时间 : <?php echo ($user["register_time"]); ?>  </p>
                                <p>最后登录 : <?php echo ($user["last_login_time"]); ?>  </p>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- end 侧边栏 -->
            </div>
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