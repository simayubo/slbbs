<include file="Public:header"/>
<div id="main">
    <div class="nav-title"><a href="/">首页</a>》所有版块</div>
    <volist name="forum" id="vo" empty="暂无数据">
        <ul style="list-style: none;">
            <li class="nav-title">{$vo.sort_name}</li>
            <ul>
                <volist name="vo.forum" id="vi" empty="分类下暂无版块">
                    <div class="forum-block">
                        <a href="{$vi.forum_url}"><img src="{$vi.icon_url}" /></a>
                        <span>
                            <p class="title"><a href="{$vi.forum_url}">{$vi.name}</a></p>
                            <p style="color:#777; ">帖: {$vi.topic_count} | 回: {$vi.comment_count}</p>
                            <p style="max-width: 90px;font-size: 0.9em;">{$vi.intor}</p>
                        </span>
                        
                    </div>
                </volist>
                <div class="clean"></div>
            <ul>
        </ul>
    </volist>
    </div>
</div>
<include file="Public:footer"/>