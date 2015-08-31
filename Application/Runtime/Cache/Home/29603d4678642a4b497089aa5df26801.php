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
    <div class="container">
        <div class="row">
            <div class="sl-content-wrap clearfix">
                <div class="col-sm-12 col-md-9 sl-main-content">
                    <!-- 用户数据内容 -->
                    <div class="sl-mod sl-user-detail-box">
                        <div class="mod-head">
                            <img src="<?php echo ($user["avatar_url"]); ?>" alt="<?php echo ($user["username"]); ?>" style="width:41px;height: 41px;float: left;" />
                            <h1 style="font-size: 1.0em; padding-left: 50px;"><?php echo ($user["username"]); ?>  &nbsp;&nbsp;(<?php echo ($user["power"]); ?>) 
                            <?php if (session('user_id')==$user['id']) { ?>
                                    <a href="<?php echo U('User/edit');?>">编辑</a>
                            <?php } ?>
                            </h1>
                            <p style="font-size: 0.9em;color:#777;padding-left: 50px;"><?php echo ($user["sign"]); ?></p>
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
                        <div class="mod-footer" style="margin-top: 10px;">
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
                                            <?php if(is_array($member_news)): $i = 0; $__LIST__ = $member_news;if( count($__LIST__)==0 ) : echo "暂无动态" ;else: foreach($__LIST__ as $key=>$news): $mod = ($i % 2 );++$i;?><ul style="list-style: none;">
                                                <li style="color:#777;"><?php echo ($news["content"]); ?>  &nbsp;&nbsp;&nbsp;<span>---&nbsp;<i><?php echo ($news["time"]); ?></i></span></li>
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

<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>