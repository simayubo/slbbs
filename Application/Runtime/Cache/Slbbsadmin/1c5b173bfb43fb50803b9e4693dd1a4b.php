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
    
    <style>
        body{padding:50px 0 0 0;}
    </style>

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
            

            
    <!-- 主体 -->
    <div id="indexMain" class="index-main">
       <!-- 插件块 -->
       	<div class="container-span"> 
       		<div class="container-span top-columns cf">
				<dl class="show-num-mod">
					<dt><i class="count-icon user-count-icon"></i></dt>
					<dd>
						<strong><?php echo ($count["user"]); ?></strong>
						<span>用户数</span>
					</dd>
				</dl>
				<dl class="show-num-mod">
					<dt><i class="count-icon user-action-icon"></i></dt>
					<dd>
						<strong><?php echo ($count["topic"]); ?></strong>
						<span>主题统计</span>
					</dd>
				</dl>
				<dl class="show-num-mod">
					<dt><i class="count-icon doc-count-icon"></i></dt>
					<dd>
						<strong><?php echo ($count["comment"]); ?></strong>
						<span>回贴统计</span>
					</dd>
				</dl>
	<dl class="show-num-mod">
		<dt><i class="count-icon doc-modal-icon"></i></dt>
		<dd>
			<strong><?php echo ($count["forum"]); ?></strong>
			<span>板块统计</span>
		</dd>
	</dl>
	<dl class="show-num-mod">
		<dt><i class="count-icon category-count-icon"></i></dt>
		<dd>
			<strong><?php echo ($count["file"]); ?></strong>
			<span>附件统计</span>
		</dd>
	</dl>
</div>
<div class="span2">
	<div class="columns-mod">
		<div class="hd cf">
			<h5>系统信息</h5>
			<div class="title-opt">
			</div>
		</div>
		<div class="bd">
			<div class="sys-info">
				<table>
					<tr>
						<th>Slbbs版本</th>
						<td>1.0.0 beta&nbsp;&nbsp;&nbsp;
													</td>
					</tr>
					<tr>
						<th>运行环境</th>
						<td><?php echo ($common["site"]["os"]); ?></td>
					</tr>
					<tr>
						<th>ThinkPHP版本</th>
						<td><?php echo (THINK_VERSION); ?></td>
					</tr>
					<tr>
						<th>脚本执行最大时间</th>
						<td><?php echo ($common["site"]["max_ex_time"]); ?></td>
					</tr>
					<tr>
						<th>MYSQL版本</th>
						<td><?php echo ($common["site"]["mysql"]); ?></td>
					</tr>
					<tr>
						<th>上传限制</th>
						<td><?php echo ($common["site"]["max_upload"]); ?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
<div class="span2">
	<div class="columns-mod">
		<div class="hd cf">
			<h5>产品信息</h5>
			<div class="title-opt">
			</div>
		</div>
		<div class="bd">
			<div class="sys-info">
				<table>
					<tr>
						<th>产品设计</th>
						<td>流年、太疯癫</td>
					</tr>
					<tr>
						<th>后台开发</th>
						<td>流年、太疯癫</td>
					</tr>
					<tr>
						<th>界面设计</th>
						<td>流年、太疯癫</td>
					</tr>
					<tr>
						<th>官方博客</th>
						<td><a href="http://www.sima5.cn" target="_blank">www.sima5.cn</a></td>
					</tr>
					<tr>
						<th>官方QQ群</th>
						<td><a target="_blank" href="http://shang.qq.com/wpa/qunwpa?idkey=cbd7087deb9149e8716bd7e5ccb6d4b0057c6f17a3b9504c73a308313cd793f9"><img border="0" src="http://pub.idqqimg.com/wpa/images/group.png" alt="PHP开发群" title="PHP开发群"></a></td>
					</tr>
					<tr>
						<th>BUG反馈</th>
						<td>请到博客或者QQ群反馈BUG</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
   </div>
  </div>
 </div>

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
    
<script type="text/javascript">
    /* 插件块关闭操作 */
    $(".title-opt .wm-slide").each(function(){
        $(this).click(function(){
            $(this).closest(".columns-mod").find(".bd").toggle();
            $(this).find("i").toggleClass("mod-up");
        });
    })
    $(function(){
        // $('#main').attr({'id': 'indexMain','class': 'index-main'});
        $('.copyright').html('<div class="copyright"> ©2015-2020 SLBBS版权所有</div>');
        $('.sidebar').remove();
    })
</script>

</body>
</html>