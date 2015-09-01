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
            

            
	<!-- 标题 -->
	<div class="main-title">
		<h2>文档列表(统计)</h2>
	</div>

	<!-- 按钮工具栏 -->
	<div class="cf">
		<div class="fl">
			<a class="btn" href="<?php echo U('Slbbsadmin/Content/index');?>">查看全部</a>
            <button class="btn ajax-post" target-form="ids" url="<?php echo U("Article/setStatus",array("status"=>1));?>">显 示</button>
			<button class="btn ajax-post" target-form="ids" url="<?php echo U("Article/setStatus",array("status"=>0));?>">隐 藏</button>
			<button class="btn ajax-post" target-form="ids" url="<?php echo U("Article/move");?>">移 动</button>
			<button class="btn ajax-post confirm" target-form="ids" url="<?php echo U("Article/setStatus",array("status"=>-1));?>">删 除</button>
			<button class="btn list_sort" url="<?php echo U('sort',array('cate_id'=>$cate_id,'pid'=>I('pid',0)),'');?>">排序</button>
		</div>

		<!-- 高级搜索 -->
		<div class="search-form fr cf">
			<div class="sleft">
				<div class="drop-down">
					<ul id="sub-sch-menu" class="nav-list hidden">
						<li><a href="javascript:;" value="">所有</a></li>
						<li><a href="javascript:;" value="1">正常</a></li>
						<li><a href="javascript:;" value="0">禁用</a></li>
						<li><a href="javascript:;" value="2">待审核</a></li>
					</ul>
				</div>
				<input type="text" name="title" class="search-input" value="<?php echo I('title');?>" placeholder="请输入标题文档">
				<a class="sch-btn" href="javascript:;" id="search" url=""><i class="btn-search"></i></a>
			</div>
            <div class="btn-group-click adv-sch-pannel fl">
                <button class="btn">高 级<i class="btn-arrowdown"></i></button>
                <div class="dropdown cf">
                	<div class="row">
                		<label>更新时间：</label>
                		<input type="text" id="time-start" name="time-start" class="text input-2x" value="" placeholder="起始时间" /> -
                		<input type="text" id="time-end" name="time-end" class="text input-2x" value="" placeholder="结束时间" />
                	</div>
                	<div class="row">
                		<label>创建者：</label>
                		<input type="text" name="nickname" class="text input-2x" value="" placeholder="请输入用户名">
                	</div>
                </div>
            </div>
		</div>
	</div>

	<!-- 数据表格 -->
    <div class="data-table">
		<table>
            <!-- 表头 -->
            <thead>
                <tr>
                    <th class="row-selected row-selected">
                        <input class="check-all" type="checkbox">
                    </th>
                    <th>编号</th>
                    <th>标题</th>
                    <th>分类</th>
                    <th>楼主</th>
                    <th>状态</th>
                    <th>浏览</th>
                    <th>评论</th>
                    <th>操作</th>
                </tr>
            </thead>

            <!-- 列表 -->
            <tbody>
                <?php if(is_array($topic_list)): $i = 0; $__LIST__ = $topic_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                        <td><input class="ids" type="checkbox" value="<?php echo ($data['id']); ?>" name="ids[]"></td>
                        <td><?php echo ($vo["id"]); ?></td>
                        <td><a href="<?php echo U('Slbbsadmin/Content/topic_edit/id/'.$vo['id'].'');?>"><?php echo ($vo["title"]); ?>
                        <?php if(($vo["best"]) == "1"): ?><font color='red'>[精华]</font><?php endif; ?>
                        <?php if(($vo["top"]) == "1"): ?><font color='red'>[置顶]</font><?php endif; ?>
                        </a>
                        </td>
                        <td><a href="<?php echo U('Slbbsadmin/Content/index/forum/'.$vo['forum_id'].'');?>"><?php echo ($vo["name"]); ?></a></td>
                        <td><a href="<?php echo U('Slbbsadmin/Content/index/user/'.$vo['user_id'].'');?>"><?php echo ($vo["username"]); ?></a></td>
                        <td>
                        <?php if(($vo["hide"]) == "0"): ?><a href="<?php echo U('Slbbsadmin/Topic/audit/id/'.$vo[id].'/value/1');?>" title="点击审核帖子"><font color='red'>审核</font></a>
                        <?php else: ?>
                        <a href="<?php echo U('Slbbsadmin/Topic/audit/id/'.$vo[id].'/value/0');?>"  title="点击取消审核">正常</a><?php endif; ?>
                        </td>
                        <td><?php echo ($vo["views"]); ?></td>
                        <td><?php echo ($vo["reply"]); ?></td>
                        <td>
                        <?php if(($vo["top"]) == "0"): ?><a href="<?php echo U('Slbbsadmin/Topic/top/id/'.$vo[id].'/value/1');?>" title="点击置顶帖子">置顶</a>
                        <?php else: ?>
                        <a href="<?php echo U('Slbbsadmin/Topic/top/id/'.$vo[id].'/value/0');?>"  title="点击取消置顶">取消</a><?php endif; ?> | 
                        <?php if(($vo["best"]) == "0"): ?><a href="<?php echo U('Slbbsadmin/Topic/best/id/'.$vo[id].'/value/1');?>" title="点击加精帖子">加精</a>
                        <?php else: ?>
                        <a href="<?php echo U('Slbbsadmin/Topic/best/id/'.$vo[id].'/value/0');?>"  title="点击取消精华">取消</a><?php endif; ?> | 
                        <a onclick="return confirm('您确定要删除吗？')" href="<?php echo U('Slbbsadmin/Topic/del/id/'.$vo[id].'');?>">删除</a></td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
	</div>
	<script type='text/javascript'>
		function del(){
			alert('你确定要删除此条帖子？');
		}
	</script>
	<!-- 分页 -->
    <div class="page">
        <ul><?php echo ($page); ?></ul>
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
    
</body>
</html>