<?php
    if(C('LAYOUT_ON')) {
        echo '{__NOLAYOUT__}';
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1" />
<style type="text/css">
*{ padding: 0; margin: 0; }
html{ overflow-y: scroll; }
body{ background: #fff; font-family: '微软雅黑'; color: #333; font-size: 16px; }
img{ border: 0; }
.error{ padding: 24px 48px; }
.face{ font-size: 100px; font-weight: normal; line-height: 120px; margin-bottom: 12px; }
h1{ font-size: 32px; line-height: 48px; }
.error .content{ padding-top: 10px}
.error .info{ margin-bottom: 12px; }
.error .info .title{ margin-bottom: 3px; }
.error .info .title h3{ color: #000; font-weight: 700; font-size: 16px; }
.error .info .text{ line-height: 24px; }
.copyright{ padding: 12px 48px; color: #999; }
.copyright a{ color: #000; text-decoration: none; }
</style>
<title>404 - 对不起，您查找的页面不存在!</title>
<?php if(!isset($e['file'])) {?>
<link rel="stylesheet" type="text/css" href="/Public/css/404.css">
<?php } ?>
</head>
<body>
<?php if(isset($e['file'])) {?>
	<div class="error">
		<p class="face">:(</p>
			<h1><?php echo strip_tags($e['message']);?></h1>
			<div class="info">
				<div class="title">
					<h3>错误位置</h3>
				</div>
				<div class="text">
					<p>FILE: <?php echo $e['file'] ;?> &#12288;LINE: <?php echo $e['line'];?></p>
				</div>
			</div>
			<div class="content">
				<?php }else{ ?>
				<div id="wrapper"><a class="logo" href="/"></a>
  				<div id="main">
    				<header id="header">
    					<h1><span class="icon">!</span>404<span class="sub">page not found</span></h1>
    				</header>
    				<div id="content">
      					<h2>您打开的这个的页面不存在！</h2>
     					<p>当您看到这个页面,表示您的访问出错,这个错误是您打开的页面不存在,请确认您输入的地址是正确的,如果是在本站点击后出现这个页面,请联系站长进行处理,或者请通过下边的搜索重新查找资源,感谢您的支持!</p>
      					<div class="utilities">
        					<form  name="formsearch" action="" id="formkeyword">
         						<div class="input-container">
            						<input type="text" class="left" name="q" size="24"  value="在这里搜索..." onfocus="if(this.value=='在这里搜索...'){this.value='';}"  onblur="if(this.value==''){this.value='在这里搜索...';}" id="inputString" onkeyup="lookup(this.value);" onblur="fill();" placeholder="搜索..." />
            						<button id="search"></button>
          						</div>
        					</form>
        					<a class="button right" href="#" onClick="history.go(-1);return true;">返回...</a><a class="button right" href="http://wpa.qq.com/msgrd?v=3&uin=643636318&site=qq&menu=yes">联系站长</a>
        					<div class="clear"></div>
      					</div>
    				</div>
    				<div id="footer">
      					<ul>
        					<li><a href="/">网站首页</a></li>
      						<!--<li><a href="{:U('Forum/index')}" title='论坛版块'>论坛版块</a></li>
      						<li><a href="{:U('User/index')}" title='个人中心'>个人中心</a></li>-->
      					</ul>
    				</div>
  				</div>
			</div>
		<?php } ?>
		<?php if(isset($e['trace'])) {?>
		</p>
		<div class="info">
			<div class="title">
				<h3>TRACE</h3>
			</div>
			<div class="text">
				<p><?php echo nl2br($e['trace']);?></p>
			</div>
		</div>
		<?php }?>




</div>
</div>
</body>
</html>
