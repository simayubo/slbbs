<!Doctype html>
<head>
<link rel="stylesheet" href="__PUBLIC__/editor/themes/default/default.css" />
<script charset="utf-8" src="__PUBLIC__/editor/kindeditor-min.js"></script>
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
<script src="__PUBLIC__/js/jquery.2.js" type="text/javascript"></script>
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
    $("#fileupload").wrap("<form id='myupload' action='{:U('Public/test')}'  
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
		<volist name="file.images" id="img">
			<li><a href="{$img.file_path}" title="{$img.file_name}"><img src="{$img.file_path}" alt="{$img.file_name}"/></a></li>
		</volist>
	</ul>
	</div>
</div>
</body>
</html>