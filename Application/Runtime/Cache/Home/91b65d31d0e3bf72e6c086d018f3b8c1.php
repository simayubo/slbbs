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
								<h3>标题:</h3>
								<div class="sl-publish-title active">
									<div>
										<input type="text" placeholder="标题" name="title" id="question_contents" value="" class="form-control" />
									</div>
								</div>
								<h3>选择版块:</h3>
								<div class="sl-publish-title active">
									<div>
										<select name="forum" class="form-control">
											<?php if(is_array($forum_list)): $i = 0; $__LIST__ = $forum_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$forum): $mod = ($i % 2 );++$i;?><option value="<?php echo ($forum["id"]); ?>"><?php echo ($forum["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
										</select>
									</div>
								</div>
								<h3>帖子内容: &nbsp;<a class="" data-toggle="collapse" href="#filelist" aria-expanded="false" aria-controls="filelist">附件列表</a></h3>
								<!Doctype html>
<head>
<link rel="stylesheet" href="/Public/editor/themes/default/default.css" />
<script charset="utf-8" src="/Public/editor/kindeditor-min.js"></script>
<style type="text/css">
	.btn{position: relative;overflow: hidden;margin-right: 4px;display:inline-block; 
*display:inline;padding:4px 10px 4px;font-size:14px;line-height:18px; 
*line-height:20px;color:#fff; 
text-align:center;vertical-align:middle;cursor:pointer;background:#5bb75b; 
border:1px solid #cccccc;border-color:#e6e6e6 #e6e6e6 #bfbfbf; 
border-bottom-color:#b3b3b3;-webkit-border-radius:4px; 
-moz-border-radius:4px;border-radius:4px;} 
.btn input{position: absolute;top: 0; right: 0;margin: 0;border:solid transparent; 
opacity: 0;filter:alpha(opacity=0); cursor: pointer;} 
.progress{position:relative; margin-left:100px; margin-top:-24px;  
width:200px;padding: 1px; border-radius:3px; display:none} 
.bar {background-color: green; display:block; width:0%; height:20px;  
border-radius:3px; } 
.percent{position:absolute; height:20px; display:inline-block;  
top:3px; left:2%; color:#fff } 
.files{height:22px; line-height:22px; margin:10px 0} 
.delimg{margin-left:20px; color:#090; cursor:pointer} 
</style>
<script src="/Public/js/jquery.2.js" type="text/javascript"></script>
<script>
	KindEditor.ready(function(K) {
		var editor = K.editor({
			allowPreviewEmoticons : false,
			allowImageUpload : false,
		});
		K('#image1').click(function() {
			editor.loadPlugin('image', function() {
				editor.plugin.imageDialog({
					imageUrl : K('#url1').val(),
					clickFn : function(url, title, width, height, border, align) {
						K('#url1').val(url);
						editor.hideDialog();
					}
				});
			});
		});
		K('#J_selectImage').click(function() {
			editor.loadPlugin('multiimage', function() {
				editor.plugin.multiImageDialog({
					clickFn : function(urlList) {
						var div = K('#J_imageView');
						div.html('');
						K.each(urlList, function(i, data) {
							div.append('<img src="' + data.url + '">');
						});
						editor.hideDialog();
					}
				});
			});
		});
	});
</script>
<script>
	$(function () { 
    var bar = $('.bar'); 
    var percent = $('.percent'); 
    var showimg = $('#showimg'); 
    var progress = $(".progress"); 
    var files = $(".files"); 
    var btn = $(".btn span"); 
    $("#fileupload").wrap("<form id='myupload' action='<?php echo U('Public/test');?>'  
    method='post' enctype='multipart/form-data'></form>"); 
    $("#fileupload").change(function(){ //选择文件 
        $("#myupload").ajaxSubmit({ 
            dataType:  'json', //数据格式为json 
            beforeSend: function() { //开始上传 
                showimg.empty(); //清空显示的图片 
                progress.show(); //显示进度条 
                var percentVal = '0%'; //开始进度为0% 
                bar.width(percentVal); //进度条的宽度 
                percent.html(percentVal); //显示进度为0% 
                btn.html("上传中..."); //上传按钮显示上传中 
            }, 
            uploadProgress: function(event, position, total, percentComplete) { 
                var percentVal = percentComplete + '%'; //获得进度 
                bar.width(percentVal); //上传进度条宽度变宽 
                percent.html(percentVal); //显示上传进度百分比 
            }, 
            success: function(data) { //成功 
                //获得后台返回的json数据，显示文件名，大小，以及删除按钮 
                files.html("<b>"+data.name+"("+data.size+"k)</b>  
                <span class='delimg' rel='"+data.pic+"'>删除</span>"); 
                //显示上传后的图片 
                var img = "http://demo.helloweba.com/upload/files/"+data.pic; 
                showimg.html("<img src='"+img+"'>"); 
                btn.html("添加附件"); //上传按钮还原 
            }, 
            error:function(xhr){ //上传失败 
                btn.html("上传失败"); 
                bar.width('0'); 
                files.html(xhr.responseText); //返回失败信息 
            } 
        }); 
    }); 
	$(".delimg").live('click',function(){ 
        var pic = $(this).attr("rel"); 
        $.post("action.php?act=delimg",{imagename:pic},function(msg){ 
            if(msg==1){ 
                files.html("删除成功."); 
                showimg.empty(); //清空图片 
                progress.hide(); //隐藏进度条 
            }else{ 
                alert(msg); 
            } 
        }); 
    }); 
}); 
</script>
</head>
<body>
<div class="collapse" id="filelist">
	<form>
  	<div class="btn"> 
     	<span>添加附件</span> 
     	<input id="fileupload" type="file" name="mypic"> 
	</div> 
	<div class="progress"> 
   	 	<span class="bar"></span><span class="percent">0%</span > 
	</div>
  	<!--<input type="submit" value="上传" class="btn btn-info btn-sm">-->
  	<p class="help-block">  &nbsp;&nbsp;&nbsp;只允许 zip, 7z, rar, png, gif, jpg, bmp 文件类型</p>
  </form>


	<div class='myfile'>
		<div class="files"></div> 
		<div id="showimg"></div>
    <ul>
		<?php if(is_array($file["images"])): $i = 0; $__LIST__ = $file["images"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$img): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($img["file_path"]); ?>" title="<?php echo ($img["file_name"]); ?>"><img src="<?php echo ($img["file_path"]); ?>" alt="<?php echo ($img["file_name"]); ?>"/></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
	</ul>
	</div>
</div>
</body>
</html>
								<link rel="stylesheet" href="/Public/editor/themes/default/default.css" />
								<script charset="utf-8" src="/Public/editor/kindeditor-min.js"></script>
								<script>
									var editor;
									KindEditor.ready(function(K) {
										editor = K.create('textarea[name="content"]', {
										resizeType : 0,
										themeType : 'simple',
										allowPreviewEmoticons : true,
										allowImageUpload : true,
										readonlyMode : <?php echo empty(session('user_id'))?'true':'false'; ?>,
										items : [
											 'fontname','fontsize','forecolor','hilitecolor','bold', 'italic', 'underline','insertorderedlist',
											'insertunorderedlist','justifyleft','justifycenter','justifyright','quickformat','lineheight','hr','|','plainpaste','link','unlink','code', 'emoticons','|','source','fullscreen']
										});
									});
								</script>
								<div class="sl-mod sl-editor-box">
									<div class="mod-head">
										<div class="wmd-panel">
								            <textarea class="wmd-input form-control autosize editor" id="content" rows="15" name="content"></textarea>
								        </div>
									</div>
									<div class="mod-body">
										<span class="pull-right text-color-999" id="question_detail_message">&nbsp;</span>
										<div class="sl-upload-box">
											<img src="<?php echo U('Public/verify');?>" onclick="this.src=this.src+'?'+Math.random" style="float:left;"/>
											<input type="text" id="sl-login-user-verify" class="form-control" placeholder="验证码" name="verify" style="max-width:150px;"/>
										</div>
									</div>
								</div>
								<div style="margin-top:20px;">
									<input type="submit" value="发布帖子" class="btn btn-large btn-success btn-publish-submit pull-right" />
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="col-sm-12 col-md-3 sl-side-bar hidden-xs">
					<div class="sl-mod publish-help">
						<div class="mod-head">
							<h3>发帖注意事项</h3>
						</div>
						<div class="mod-body">
							<p><b>• 标题:</b> 请用精简准确的语言描述您发布的主题内容</p>
							<p><b>• 内容:</b> 请勿发布：煽动民族仇恨、民族歧视，破坏民族团结，或者侵害民族风俗、习惯；破坏国家宗教政策，宣扬邪教、迷信；宣传淫秽、赌博、暴力；侮辱或者诽谤他人，侵害他人合法权益的；含有法律、行政法规禁止的其他内容的内容。
							<p><b>• 金钱规则：</b> 每发布一个主题增加10金钱,附件主题增加20金钱 每多一个回复你将获得 5 个金钱的奖励 。</p>
						</div>
					</div>
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