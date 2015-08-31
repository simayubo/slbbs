window.onload = function()
{
	if (/MSIE 6/.test(navigator.userAgent) || /MSIE 7/.test(navigator.userAgent))
	{
		var newNode = document.createElement("div");
			newNode.setAttribute('id', 'browser-not-support');
	        newNode.innerHTML = '<img class="pull-left" src="'+ G_STATIC_URL +'/css/default/img/404-logo.png" alt="" />'+
					'<div class="pull-left content">'+
						'<h1>您的浏览器<span>不受支持</span></h1>'+
						'<p>您的浏览器版本非常旧, 存在诸多安全和体验问题! 建议<a href="http://windows.microsoft.com/zh-cn/windows/upgrade-your-browser">更新</a>或者使用其他浏览器来访问, 如果您使用的是搜狗、360、遨游等双核浏览器, 请切换到极速模式以获得更好的体验</p>'+
						'<ul>'+
							'<li><a href="http://www.google.cn/intl/zh-CN/chrome/browser/">￮ Google 浏览器</a></li>'+
							'<li><a href="http://opera.com/">￮ Opera 浏览器</a></li>'+
							'<li><a href="http://www.mozilla.com/firefox/">￮ Firefox 浏览器</a></li>'+
						'</ul>'+
					'</div>';
		document.getElementsByTagName('body')[0].appendChild(newNode);
	}
}
var JPlaceHolder = {
	//检测
	_check : function(){
		return 'placeholder' in document.createElement('input');
	},
	//初始化
	init : function(){
		if(!this._check()){
			this.fix();
		}
	},
	//修复
	fix : function(){
		jQuery(':input[placeholder]').each(function(index, element) {
            var self = $(this), txt = self.attr('placeholder');
			self.wrap($('<div></div>').css({position:'relative', zoom:'1', border:'none', background:'none', padding:'none', margin:'none'}));
			var pos = self.position(), h = self.outerHeight(true), paddingleft = self.css('padding-left');
			var holder = $('<span style="padding-top:5px;"></span>').text(txt).css({position:'absolute', left:pos.left, top:pos.top, height:h, lienHeight:h, paddingLeft:paddingleft, color:'#aaa'}).appendTo(self.parent());
			self.focusin(function(e) {
                holder.hide();
            }).focusout(function(e) {
                if(!self.val()){
					holder.show();
				}
            });
			holder.click(function(e) {
                holder.hide();
				self.focus();
            });
        });
	}
};
//执行
jQuery(function(){
	JPlaceHolder.init();	
});
