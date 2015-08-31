<include file="Public:header"/>
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
							<span class="glyphicon glyphicon-remove"></span> <em>{$errmsg}</em>
						</li>
					<?php } ?>
					<form action="{:U('Topic/post')}" method="post" id="question_form">
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
											<volist name="forum_list" id='forum'>
												<option value="{$forum.id}">{$forum.name}</option>
											</volist>
										</select>
									</div>
								</div>
								<h3>帖子内容: &nbsp;<a class="" data-toggle="collapse" href="#filelist" aria-expanded="false" aria-controls="filelist">附件列表</a></h3>
								<include file="Topic/uplode_file"/>
								<link rel="stylesheet" href="__PUBLIC__/editor/themes/default/default.css" />
								<script charset="utf-8" src="__PUBLIC__/editor/kindeditor-min.js"></script>
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
											<img src="{:U('Public/verify')}" onclick="this.src=this.src+'?'+Math.random" style="float:left;"/>
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
<include file="Public:footer"/>