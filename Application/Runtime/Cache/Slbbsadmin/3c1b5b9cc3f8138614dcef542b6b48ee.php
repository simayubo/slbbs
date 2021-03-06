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
		<h2>板块管理</h2>
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
                    <th>所属分类</th>
                    <th>板块ID</th>
                    <th>排列顺序</th>
                    <th>名称</th>
                    <th>介绍</th>
                    <th>标记重要</th>
                    <th>帖子统计</th>
                    <th>回复统计</th>
                    <th>发帖权限</th>
                    <th>操作</th>
                </tr>
            </thead>

            <!-- 列表 -->
            <tbody>
                <?php if(is_array($forum_list)): $i = 0; $__LIST__ = $forum_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                        <td><input class="ids" type="checkbox" value="<?php echo ($data['id']); ?>" name="ids[]"></td>
                        <td><?php echo ($vo["sort_name"]); ?></td>
                        <td><?php echo ($vo["id"]); ?></td>
                        <td><?php echo ($vo["order"]); ?></td>
                        <td><?php echo ($vo["name"]); ?></td>
                        <td><?php echo ($vo["intor"]); ?></td>
                        <td><?php echo ($vo['hot'] == 0? '普通' : '<font color="red">重要</font>'); ?></td>
                        <td><?php echo ($vo["topic_count"]); ?></td>
                        <td><?php echo ($vo["comment_count"]); ?></td>
                        <td><?php echo ($vo['allow'] == 0? '管理员' : '无限制'); ?></td>
                        <td><a href="<?php echo U('Slbbsadmin/Content/forum/edit_id/'.$vo['id'].'');?>">编辑</a> | <a href="#" onclick="return confirm('你的操作会删除此板块下所有帖子！请将帖子转移后再删除！你确定要删除此分类？')">删除</a></td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
	</div>
	<!-- 分页 -->
    <div class="page">
        <ul><?php echo ($page); ?></ul>
    </div>
    <div style="width:300px;float:left;">
        <form action="<?php echo U('Slbbsadmin/Content/forum/type/add');?>" method="post">
            <h3>新增板块</h3>
            排列顺序：<input type="text" name="order" class="text" /> <br/>
            板块名称：<input type="text" name="name"  class="text" /><br/>
            所属分类：<select name="sort_id">
                 <?php if(is_array($sort)): $i = 0; $__LIST__ = $sort;if( count($__LIST__)==0 ) : echo "暂无分类" ;else: foreach($__LIST__ as $key=>$uo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($uo["id"]); ?>"><?php echo ($uo["sort_name"]); ?></option><?php endforeach; endif; else: echo "暂无分类" ;endif; ?>
               </select><br/>
            板块介绍：<textarea name="intor" rows="3" class="text"><?php echo ($intor); ?></textarea><br/>
            发帖权限：<select name="allow">
                        <option value="0">管理员</option>
                        <option value="1">无限制</option>
                      </select><br/>
            标记重要：<select name="hot">
                        <option value='1'>是</option>
                        <option value='0'>否</option>
                      </select><br/>
            <input type="submit" value="新增" class="btn success" />
        </form>
    </div>
    <?php if(!empty($forum)): ?><div style="width:300px;float:left;margin-left:20px;">
        <form action="<?php echo U('Slbbsadmin/Content/forum/type/edit');?>" method="post">
            <h3>编辑板块</h3>
            排列顺序：<input type="text" name="order" value="<?php echo ($forum["order"]); ?>" class="text" /> <br/>
            板块名称：<input type="text" name="name" value="<?php echo ($forum["name"]); ?>"  class="text" /><br/>
            所属分类：<select name="sort_id">
            		<?php if(is_array($sort)): $i = 0; $__LIST__ = $sort;if( count($__LIST__)==0 ) : echo "暂无分类" ;else: foreach($__LIST__ as $key=>$uo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($uo["id"]); ?>" <?php if($uo['id'] == $forum['sort_id']) echo 'selected="selected"'; ?>><?php echo ($uo["sort_name"]); ?></option><?php endforeach; endif; else: echo "暂无分类" ;endif; ?>
               </select><br/>
            板块介绍：<textarea name="intor" rows="3" class="text"><?php echo ($forum["intor"]); ?></textarea><br/>
            发帖权限：<select name="allow">
                        <option value="0" <?php if($forum["allow"] == 0): ?>selected="selected"<?php endif; ?>>管理员</option>
                        <option value="1" <?php if($forum["allow"] == 1): ?>selected="selected"<?php endif; ?>>无限制</option>
                      </select><br/>
            标记重要：<select name="hot">
                        <option value="1" <?php if($forum["hot"] == 1): ?>selected="selected"<?php endif; ?>>是</option>
                        <option value="0" <?php if($forum["hot"] == 0): ?>selected="selected"<?php endif; ?>>否</option>
                      </select><br/>
            <input type="hidden" name="id" value="<?php echo ($forum["id"]); ?>" />
            <input type="submit" value="提交" class="btn success" />
        </form>
        </div><?php endif; ?>
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