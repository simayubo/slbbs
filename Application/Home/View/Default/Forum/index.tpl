<include file="Public:header"/>
<div class="sl-container-wrap">
    <div class="container">
        <div class="row">
            <div class="sl-content-wrap clearfix">
                <div class="col-sm-12 col-md-9 sl-main-content">
                    <ul class="nav nav-tabs sl-nav-tabs active hidden-xs">
                        <li class="active"><a href="http://wenda.wecenter.com/topic/">全部</a></li>
                        <h2 class="hidden-xs"><i class="icon icon-topic"></i> 论坛版块</h2>
                    </ul>
                    <div class="sl-mod sl-topic-list">
                    <volist name="forum" id="sort" empty="暂无数据">
                        <div class="sl-mod sl-topic-category" style="margin-left: 0;padding-left: 0;">
                            <div class="mod-body clearfix">
                                <ul>
                                    <li><span class="glyphicon glyphicon-circle-arrow-right"></span> {$sort.sort_name}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="mod-body clearfix">
                            <volist name="sort.forum" id="forum" empty="此分类下暂无版块">
                            <div class="sl-item">
                                <a class="img sl-border-radius-5" href="{$forum.forum_url}">
                                    <img src="{$forum.icon_url}" alt="" />
                                </a>
                                <p class="clearfix">
                                    <span class="topic-tag">
                                        <a class="text" href="{$forum.forum_url}" data-id="5">{$forum.name}</a>
                                    </span>
                                </p>
                                <p class="text-color-999">
                                    <span>帖子：{$forum.topic_count}</span>
                                    <span>回复：{$forum.comment_count}</span>
                                </p>
                                <p class="text-color-999">
                                    {$forum.intor}
                                </p>
                            </div>
                            </volist>                  
                        </div>
                    </volist>
                    </div>
                </div>
<include file="Public:side"/>
<include file="Public:footer"/>