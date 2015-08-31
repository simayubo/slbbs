<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo ($title); ?></title>
    <link href="/Public/favicon.ico" type="image/x-icon" rel="shortcut icon">
    <link rel="stylesheet" type="text/css" href="/Public/admin/css/base.css" media="all">
    <link rel="stylesheet" type="text/css" href="/Public/admin/css/common.css" media="all">
    <link rel="stylesheet" type="text/css" href="/Public/admin/css/module.css">
    <link rel="stylesheet" type="text/css" href="/Public/admin/css/style.css" media="all">
    <link rel="stylesheet" type="text/css" href="/Public/admin/css/default_color.css" media="all">
     <!--[if lt IE 9]>
    <script type="text/javascript" src="/Public/admin/js/jquery-1.10.2.min.js"></script>
    <![endif]--><!--[if gte IE 9]><!-->
    <script type="text/javascript" src="/Public/admin/js/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="/Public/admin/js/jquery.mousewheel.js"></script>
    <!--<![endif]-->
    
</head>
<body>
<div class="header">
    <span class="logo">SLBBS</span>
    <ul class="main-nav">
        <?php if(is_array($__MENU__["main"])): $i = 0; $__LIST__ = $__MENU__["main"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li class="<?php echo ((isset($menu["class"]) && ($menu["class"] !== ""))?($menu["class"]):''); ?>"><a href="<?php echo (U($menu["url"])); ?>"><?php echo ($menu["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
    <div class="user-bar">
        <a href="javascript:;" class="user-entrance"><i class="icon-user"></i></a>
        <ul class="nav-list user-menu hidden">
            <li class="manager">你好，<em title="admin"><?php echo ($common["user"]["username"]); ?></em></li>
            <li><a href="<?php echo U('User/outLogin');?>">退出</a></li>
        </ul>
    </div>
</div>
    <div class="sidebar">
        <!-- 子导航 -->
        
            <div id="subnav" class="subnav">
                <?php if(!empty($_extra_menu)): ?>
                    <?php echo extra_menu($_extra_menu,$__MENU__); endif; ?>
                <?php if(is_array($__MENU__["child"])): $i = 0; $__LIST__ = $__MENU__["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub_menu): $mod = ($i % 2 );++$i;?><!-- 子导航 -->
                    <?php if(!empty($sub_menu)): if(!empty($key)): ?><h3><i class="icon icon-unfold"></i><?php echo ($key); ?></h3><?php endif; ?>
                        <ul class="side-sub-menu">
                            <?php if(is_array($sub_menu)): $i = 0; $__LIST__ = $sub_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li class="<?php echo ((isset($menu["class"]) && ($menu["class"] !== ""))?($menu["class"]):''); ?>">
                                    <a class="item" href="<?php echo (U($menu["url"])); ?>"><?php echo ($menu["title"]); ?></a>
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul><?php endif; ?>
                    <!-- /子导航 --><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        
        <!-- /子导航 -->
    </div>
    <!-- /边栏 -->

    <!-- 内容区 -->
    <div id="main-content">
        <div id="top-alert" class="fixed alert alert-error" style="display: none;">
            <button class="close fixed" style="margin-top: 4px;">&times;</button>
            <div class="alert-content">这是内容</div>
        </div>
        <div id="main" class="main">
            
            <!-- nav -->
            <?php if(!empty($_show_nav)): ?><div class="breadcrumb">
                <span>您的位置:</span>
                <?php $i = '1'; ?>
                <?php if(is_array($_nav)): foreach($_nav as $k=>$v): if($i == count($_nav)): ?><span><?php echo ($v); ?></span>
                    <?php else: ?>
                    <span><a href="<?php echo ($k); ?>"><?php echo ($v); ?></a>&gt;</span><?php endif; ?>
                    <?php $i = $i+1; endforeach; endif; ?>
            </div><?php endif; ?>
            <!-- nav -->
            

            
	<div class="main-title cf">
		<h2>编辑帖子</h2>
	</div>
	<div class="tab-wrap">
		<ul class="tab-nav nav">
			<li class="current"><a href="javascript:void(0);">基础</a></li>	
		</ul>
		<div class="tab-content">
		<!-- 表单 -->
		<form id="form" action="/admin.php?s=/Article/update.html" method="post" class="form-horizontal">
			<!-- 基础文档模型 -->
			<div id="tab1" class="tab-pane in tab1">
            	<div class="form-item cf">
                    <label class="item-label">标题<span class="check-tips">（帖子标题）</span></label>
                    <div class="controls">
                        <input type="text" class="text input-large" name="title" value="<?php echo ($topic_arr["title"]); ?>" />
                    </div>
                </div>
                <div class="form-item cf">
                    <label class="item-label">帖子内容<span class="check-tips"></span></label>
                    <div class="controls">
                        <label class="textarea">
                            <textarea name="content"><?php echo (htmlspecialchars_decode($topic_arr["content"])); ?></textarea>
						</label>
					</div>
                </div>   
            	<div class="form-item cf">
                    <label class="item-label">主题分类<span class="check-tips"></span></label>
                    <div class="controls">
                        <select name="type">
                            <option value="1" >目录</option><option value="2" selected>主题</option><option value="3" >段落</option>
                        </select>
                    </div>
                </div>
                <div class="form-item cf">
                    <label class="item-label">回复可见？<span class="check-tips"></span></label>
                    <div class="controls">
                        <label class="radio"><input type="radio" value="0" name="display" >可见 </label>
                        <label class="radio"><input type="radio" value="1" name="display" checked="checked">回复可见</label>
                    </div>
                </div>
                <div class="form-item cf">
                    <label class="item-label">属性<span class="check-tips"></span></label>
                    <div class="controls">
                        <label class="checkbox"><input type="checkbox" value="1" name="position[]" >首页置顶</label>
                        <label class="checkbox"><input type="checkbox" value="2" name="position[]" >分类置顶</label>
                        <label class="checkbox"><input type="checkbox" value="4" name="position[]" >加为精华 </label>                    
                    </div>
                </div>
                <div class="form-item cf">
                    <label class="item-label">浏览量<span class="check-tips"></span></label>
                    <div class="controls">
                        <input type="text" class="text input-mid" name="view" value="10">
                    </div>
                </div>
                <div class="form-item cf">
                    <label class="item-label">发帖时间<span class="check-tips"></span></label>
                    <div class="controls">
                        <input type="text" name="create_time" class="text time" value="2014-07-22 11:56" placeholder="请选择时间" />                    </div>
                </div>
            </div>
			<div class="form-item cf">
				<button class="btn submit-btn ajax-post hidden" id="submit" type="submit" target-form="form-horizontal">确 定</button>
				<a class="btn btn-return" href="/admin.php?s=/article/mydocument.html">返 回</a>
				<input type="hidden" name="id" value="1"/>
				<input type="hidden" name="pid" value="0"/>
				<input type="hidden" name="model_id" value="2"/>
				<input type="hidden" name="group_id" value="0"/>
				<input type="hidden" name="category_id" value="2">
			</div>
		</form>
	</div>
<link rel="stylesheet" href="/Public/editor/themes/default/default.css" />
<script charset="utf-8" src="/Public/editor/kindeditor-min.js"></script>
<script charset="utf-8" src="/Public/editor/lang/zh_CN.js"></script>
<script type="text/javascript">
	var editor_content;
	KindEditor.ready(function(K) {
	editor_content = K.create('textarea[name="content"]', {
		allowFileManager : false,
		themesPath: K.basePath,
		width: '100%',
		height: '500px',
		resizeType: 1,
		pasteType : 2,
		urlType : 'absolute',
		});
	});
	$(function(){
		//传统表单提交同步
		$('textarea[name="content"]').closest('form').submit(function(){
			editor_content.sync();
		});
		//ajax提交之前同步
		$('button[type="submit"],#submit,.ajax-post,#autoSave').click(function(){
			editor_content.sync();
		});
	})
</script>

        </div>
        <div class="cont-ft">
            <div class="copyright">
                <div class="fl">感谢使用<a href="#" target="_blank">Slbbs</a>管理平台</div>
                <div class="fr">V1.0</div>
            </div>
        </div>
    </div>
    <!-- /内容区 -->
    <script type="text/javascript">
    (function(){
        var ThinkPHP = window.Think = {
            "ROOT"   : "", //当前网站地址
            "APP"    : "", //当前项目地址
            "PUBLIC" : "/Public", //项目公共目录地址
            "DEEP"   : "<?php echo C('URL_PATHINFO_DEPR');?>", //PATHINFO分割符
            "MODEL"  : ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
            "VAR"    : ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"]
        }
    })();
    </script>
    <script type="text/javascript" src="/Public/admin/js/think.js"></script>
    <script type="text/javascript" src="/Public/admin/js/common.js"></script>
    <script type="text/javascript">
        +function(){
            var $window = $(window), $subnav = $("#subnav"), url;
            $window.resize(function(){
                $("#main").css("min-height", $window.height() - 130);
            }).resize();

            /* 左边菜单高亮 */
            url = window.location.pathname + window.location.search;
            url = url.replace(/(\/(p)\/\d+)|(&p=\d+)|(\/(id)\/\d+)|(&id=\d+)|(\/(group)\/\d+)|(&group=\d+)/, "");
            $subnav.find("a[href='" + url + "']").parent().addClass("current");

            /* 左边菜单显示收起 */
            $("#subnav").on("click", "h3", function(){
                var $this = $(this);
                $this.find(".icon").toggleClass("icon-fold");
                $this.next().slideToggle("fast").siblings(".side-sub-menu:visible").
                      prev("h3").find("i").addClass("icon-fold").end().end().hide();
            });

            $("#subnav h3 a").click(function(e){e.stopPropagation()});

            /* 头部管理员菜单 */
            $(".user-bar").mouseenter(function(){
                var userMenu = $(this).children(".user-menu ");
                userMenu.removeClass("hidden");
                clearTimeout(userMenu.data("timeout"));
            }).mouseleave(function(){
                var userMenu = $(this).children(".user-menu");
                userMenu.data("timeout") && clearTimeout(userMenu.data("timeout"));
                userMenu.data("timeout", setTimeout(function(){userMenu.addClass("hidden")}, 100));
            });

            /* 表单获取焦点变色 */
            $("form").on("focus", "input", function(){
                $(this).addClass('focus');
            }).on("blur","input",function(){
                        $(this).removeClass('focus');
                    });
            $("form").on("focus", "textarea", function(){
                $(this).closest('label').addClass('focus');
            }).on("blur","textarea",function(){
                $(this).closest('label').removeClass('focus');
            });

            // 导航栏超出窗口高度后的模拟滚动条
            var sHeight = $(".sidebar").height();
            var subHeight  = $(".subnav").height();
            var diff = subHeight - sHeight; //250
            var sub = $(".subnav");
            if(diff > 0){
                $(window).mousewheel(function(event, delta){
                    if(delta>0){
                        if(parseInt(sub.css('marginTop'))>-10){
                            sub.css('marginTop','0px');
                        }else{
                            sub.css('marginTop','+='+10);
                        }
                    }else{
                        if(parseInt(sub.css('marginTop'))<'-'+(diff-10)){
                            sub.css('marginTop','-'+(diff-10));
                        }else{
                            sub.css('marginTop','-='+10);
                        }
                    }
                });
            }
        }();
    </script>
    
</body>
</html>