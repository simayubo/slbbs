-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015 �?08 �?31 �?12:22
-- 服务器版本: 5.6.17
-- PHP 版本: 5.5.12

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `slbbs`
--

-- --------------------------------------------------------

--
-- 表的结构 `sl_comment`
--

CREATE TABLE IF NOT EXISTS `sl_comment` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `tid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `fid` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `time` datetime NOT NULL,
  `hide` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cid`),
  KEY `tid` (`tid`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=92 ;

--
-- 转存表中的数据 `sl_comment`
--

INSERT INTO `sl_comment` (`cid`, `tid`, `uid`, `fid`, `bid`, `content`, `time`, `hide`) VALUES
(1, 1, 1, 1, 0, '&lt;img src=&quot;http://thinkphpbbs.com/Public/editor/plugins/emoticons/images/3.gif&quot; border=&quot;0&quot; alt=&quot;&quot; /&gt;', '2015-06-10 09:59:33', 1),
(2, 1, 1, 1, 0, '&lt;img src=&quot;http://thinkphpbbs.com/Public/editor/plugins/emoticons/images/1.gif&quot; border=&quot;0&quot; alt=&quot;&quot; /&gt;', '2015-06-17 12:55:40', 1),
(3, 2, 1, 1, 0, 'sssssssss', '2015-06-19 22:03:08', 1),
(4, 2, 1, 1, 0, '&lt;img src=&quot;http://thinkphpbbs.com/Public/editor/plugins/emoticons/images/19.gif&quot; border=&quot;0&quot; alt=&quot;&quot; /&gt;', '2015-06-22 15:58:24', 1),
(5, 1, 1, 1, 0, '放得开两个点开了房间更凉快地方的看见好看顾客和法国进口红酒可激发更多机会看到', '2015-06-22 18:29:31', 1),
(6, 4, 1, 1, 0, 'dsfksdfjksdjfksKJfksjdkfksjdfksjdkfjksdjkfjsdfjksdjfksjdkjsg', '2015-06-23 22:29:33', 1),
(7, 5, 1, 1, 0, '&lt;img src=&quot;http://thinkphpbbs.com/Public/editor/plugins/emoticons/images/4.gif&quot; border=&quot;0&quot; alt=&quot;&quot; /&gt;', '2015-06-24 10:07:30', 1),
(8, 2, 1, 1, 0, '&lt;img src=&quot;http://thinkphpbbs.com/Public/editor/plugins/emoticons/images/11.gif&quot; border=&quot;0&quot; alt=&quot;&quot; /&gt;&lt;strong&gt;&lt;em&gt;放水电费水电费水电费水电费水电费水电费水电费水电费水电费&lt;/em&gt;&lt;/strong&gt;', '2015-06-24 10:29:51', 1),
(9, 2, 1, 1, 0, '&lt;pre class=&quot;prettyprint lang-js&quot;&gt;fjdksfjksjgkjgjfg&lt;/pre&gt;', '2015-06-24 10:30:05', 1),
(10, 4, 3, 1, 0, '&amp;lt;script type=&quot;text/javascript&quot;&amp;gt;&lt;br /&gt;\r\nsdasdasd&lt;br /&gt;\r\n&amp;lt;/script&amp;gt;&lt;br /&gt;', '2015-06-24 10:41:17', 1),
(11, 4, 3, 1, 0, '&lt;img src=&quot;http://thinkphpbbs.com/Public/editor/plugins/emoticons/images/3.gif&quot; border=&quot;0&quot; alt=&quot;&quot; /&gt;', '2015-06-24 10:41:36', 1),
(12, 4, 3, 1, 0, '&lt;ol&gt;\r\n	&lt;li&gt;\r\n		dsjmfksdkf六点十分宽松的开发历史的开发商凯迪拉克管理的房间给开的房间刚看\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n		上的开发历史可凉快凉快FLKSLKDFLKSDLKFLKSALDKFLKSDKLF\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n		的书法家们开始的减肥开始觉得开房间开始攻击开始发国家开发的国际饭店\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n		上的减肥开始的减肥是扫iorekkldskglklgkfg\r\n	&lt;/li&gt;\r\n&lt;/ol&gt;', '2015-06-24 10:42:23', 1),
(13, 4, 3, 1, 0, '&lt;span style=&quot;color:#666666;font-family:''Helvetica Neue'', STHeiti, 微软雅黑, ''Microsoft YaHei'', Helvetica, Arial, sans-serif;font-size:14px;line-height:22.3999996185303px;background-color:#FFFFFF;&quot;&gt;&amp;lt;script type=&quot;text/javascript&quot;&amp;gt;&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;color:#666666;font-family:''Helvetica Neue'', STHeiti, 微软雅黑, ''Microsoft YaHei'', Helvetica, Arial, sans-serif;font-size:14px;line-height:22.3999996185303px;background-color:#FFFFFF;&quot;&gt;', '2015-06-24 10:43:18', 1),
(14, 4, 3, 1, 0, '&lt;span style=&quot;color:#666666;font-family:''Helvetica Neue'', STHeiti, 微软雅黑, ''Microsoft YaHei'', Helvetica, Arial, sans-serif;font-size:14px;line-height:22.3999996185303px;background-color:#FFFFFF;&quot;&gt;&amp;lt;script type=&quot;text/javascript&quot;&amp;gt;&lt;/span&gt;&lt;br /&gt;\n&lt;span style=&quot;color:#666666;font-family:''Helvetica Neue'', STHeiti, 微软雅黑, ''Microsoft YaHei'', Helvetica, Arial, sans-serif;font-size:14px;line-height:22.3999996185303px;background-color:#FFFFFF;&quot;&gt;', '2015-06-24 10:43:26', 1),
(15, 4, 3, 1, 0, '&lt;span style=&quot;color:#666666;font-family:''Helvetica Neue'', STHeiti, 微软雅黑, ''Microsoft YaHei'', Helvetica, Arial, sans-serif;font-size:14px;line-height:22.3999996185303px;background-color:#FFFFFF;&quot;&gt;&amp;lt;script type=&quot;text/javascript&quot;&amp;gt;&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;color:#666666;font-family:''Helvetica Neue'', STHeiti, 微软雅黑, ''Microsoft YaHei'', Helvetica, Arial, sans-serif;font-size:14px;line-height:22.3999996185303px;background-color:#FFFFFF;&quot;&gt;', '2015-06-24 10:44:53', 1),
(16, 6, 3, 1, 0, '&lt;span style=&quot;color:#666666;font-family:''Helvetica Neue'', STHeiti, 微软雅黑, ''Microsoft YaHei'', Helvetica, Arial, sans-serif;font-size:14px;line-height:22.3999996185303px;background-color:#FFFFFF;&quot;&gt;&amp;lt;script type=&quot;text/javascript&quot;&amp;gt;&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;color:#666666;font-family:''Helvetica Neue'', STHeiti, 微软雅黑, ''Microsoft YaHei'', Helvetica, Arial, sans-serif;font-size:14px;line-height:22.3999996185303px;background-color:#FFFFFF;&quot;&gt;', '2015-06-24 10:45:25', 1),
(17, 6, 3, 1, 0, '&amp;lt;a href=&quot;javascript:;&quot;&amp;gt;&amp;lt;/a&amp;gt;', '2015-06-24 10:46:06', 1),
(18, 6, 3, 1, 0, '&amp;lt;a href=''javascript:;''&amp;gt;是的是的是的&amp;lt;/a&amp;gt;', '2015-06-24 10:47:01', 1),
(19, 6, 3, 1, 0, '&lt;a href=&quot;http://blog.sucai5.cn&quot; target=&quot;_blank&quot;&gt;http://blog.sucai5.cn&lt;/a&gt;', '2015-06-24 10:47:28', 1),
(20, 6, 3, 1, 0, '&lt;img src=&quot;http://thinkphpbbs.com/Public/editor/plugins/emoticons/images/2.gif&quot; border=&quot;0&quot; alt=&quot;&quot; /&gt;&lt;a href=&quot;http://blog.sucai5.cn/?plugin=gbook&quot; target=&quot;_blank&quot;&gt;http://blog.sucai5.cn/?plugin=gbook&lt;/a&gt;sadasdasdasd', '2015-06-24 10:47:47', 1),
(21, 6, 3, 1, 0, '&lt;a href=&quot;javascript:;&quot; target=&quot;_blank&quot;&gt;javascript:;&lt;/a&gt;', '2015-06-24 10:48:25', 1),
(22, 6, 3, 1, 0, '&lt;a href=&quot;javascript:alert(''123'');&quot; target=&quot;_blank&quot;&gt;javascript:alert(''123'');&lt;/a&gt;', '2015-06-24 10:49:11', 1),
(23, 6, 3, 1, 0, '&lt;img src=&quot;http://thinkphpbbs.com/Public/editor/plugins/emoticons/images/2.gif&quot; border=&quot;0&quot; alt=&quot;&quot; /&gt;', '2015-06-24 11:10:29', 1),
(24, 7, 3, 1, 0, '&lt;p&gt;\r\n	sdkask\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	fksdf\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	dfdsf\r\n&lt;/p&gt;', '2015-06-24 11:24:42', 1),
(25, 6, 3, 1, 0, '&lt;a href=&quot;javascript:alert(''123'');..&quot; target=&quot;_blank&quot;&gt;javascript:alert(''123'');..&lt;/a&gt;', '2015-06-24 11:27:45', 1),
(26, 6, 3, 1, 0, '&lt;a href=&quot;javascript:alert(''123'');&quot; target=&quot;_blank&quot;&gt;javascript:alert(''123'');&lt;/a&gt;00', '2015-06-24 11:28:01', 1),
(27, 6, 3, 1, 0, '&lt;a target=&quot;_blank&quot;&gt;Javascript:alert(''123'');&lt;/a&gt;&lt;span style=&quot;color:#666666;font-family:''Helvetica Neue'', STHeiti, 微软雅黑, ''Microsoft YaHei'', Helvetica, Arial, sans-serif;font-size:14px;line-height:22.3999996185303px;background-color:#FFFFFF;&quot;&gt;00&lt;/span&gt;', '2015-06-24 11:28:26', 1),
(28, 8, 1, 1, 0, '&lt;img src=&quot;http://thinkphpbbs.com/Public/editor/plugins/emoticons/images/4.gif&quot; border=&quot;0&quot; alt=&quot;&quot; /&gt;', '2015-06-27 15:58:52', 1),
(29, 6, 1, 1, 0, '&lt;h3 style=&quot;font-family:''Helvetica Neue'', Helvetica, ''Microsoft Yahei'', ''Hiragino Sans GB'', ''WenQuanYi Micro Hei'', sans-serif;font-weight:400;color:#333333;font-size:24px;text-align:center;background-color:#FFFFFF;&quot;&gt;\r\n	预处理脚本\r\n&lt;/h3&gt;\r\n&lt;p style=&quot;color:#555555;font-family:''Helvetica Neue'', Helvetica, ''Microsoft Yahei'', ''Hiragino Sans GB'', ''WenQuanYi Micro Hei'', sans-serif;font-size:16px;text-align:center;background-color:#FFFFFF;&quot;&gt;\r\n	虽然可以直接使用 Bootstrap 提供的 CSS 样式', '2015-06-27 19:54:51', 1),
(30, 3, 2, 1, 0, '1111111', '2015-06-28 22:48:46', 1),
(31, 3, 2, 1, 0, '111111111111111111111', '2015-06-28 22:48:50', 1),
(32, 3, 2, 1, 0, '11111111111111111111111111111111111111', '2015-06-28 22:48:55', 1),
(33, 3, 2, 1, 0, '111111111111111111111111111111111111111111111', '2015-06-28 22:49:00', 1),
(34, 3, 2, 1, 0, '1111111111111111111111111111111111111', '2015-06-28 22:49:11', 1),
(35, 3, 2, 1, 0, '111111111111111111111111111', '2015-06-28 22:49:16', 1),
(36, 3, 2, 1, 0, '111111111111111111111111111111111111', '2015-06-28 22:49:20', 1),
(37, 3, 2, 1, 0, '0000000000000000000000000', '2015-06-28 22:49:28', 1),
(38, 3, 2, 1, 0, '0000000000000000000', '2015-06-28 22:49:32', 1),
(39, 3, 2, 1, 0, '00000000000000', '2015-06-28 22:49:37', 1),
(40, 3, 2, 1, 0, '0000000000000000000000000000000000', '2015-06-28 22:49:42', 1),
(41, 3, 2, 1, 0, '........00000000000000000000000', '2015-06-28 22:49:48', 1),
(42, 3, 2, 1, 0, '4444444444444444444444444444444444', '2015-06-28 22:49:56', 1),
(43, 3, 2, 1, 0, '5555555555555555555555555555555555555', '2015-06-28 22:50:00', 1),
(44, 3, 2, 1, 0, '5555555555555555555555555', '2015-06-28 22:50:13', 1),
(45, 3, 2, 1, 0, '666666666666666666666666666', '2015-06-28 22:50:18', 1),
(48, 9, 2, 1, 0, '&lt;img src=&quot;http://thinkphpbbs.com/Public/editor/plugins/emoticons/images/20.gif&quot; border=&quot;0&quot; alt=&quot;&quot; /&gt;', '2015-07-14 17:32:23', 1),
(49, 9, 2, 1, 0, 'ffffdggggggggggggggggggggggggggggggggggggggggggg', '2015-07-14 17:32:38', 1),
(50, 12, 2, 1, 0, '&lt;img src=&quot;http://thinkphpbbs.com/Public/editor/plugins/emoticons/images/19.gif&quot; border=&quot;0&quot; alt=&quot;&quot; /&gt;', '2015-07-17 17:34:14', 1),
(51, 6, 2, 1, 0, '你是逗比吗？？？？', '2015-07-19 15:36:52', 1),
(52, 14, 2, 3, 0, '大家快来顶贴啊', '2015-07-19 15:38:29', 1),
(53, 15, 2, 3, 0, '中华好当家', '2015-07-19 15:40:39', 1),
(54, 16, 2, 1, 0, '666666666666666666666666666666666', '2015-07-19 15:55:08', 1),
(55, 10, 2, 1, 0, '6666666666666666666666', '2015-07-19 15:57:59', 1),
(60, 10, 2, 1, 0, '777777777777777777777777', '2015-07-19 19:16:39', 1),
(61, 20, 2, 1, 0, '为什么要限制5个字？？', '2015-07-22 13:42:02', 1),
(62, 20, 18, 1, 0, '66666666666666666666', '2015-07-22 15:44:43', 1),
(63, 20, 18, 1, 0, '凳子..我的凳子', '2015-07-22 15:44:55', 1),
(64, 20, 18, 1, 0, '测试楼层功能', '2015-07-22 15:45:18', 1),
(68, 16, 19, 1, 0, '7777777777777', '2015-07-22 16:52:06', 1),
(69, 3, 19, 1, 0, '11111111111', '2015-07-22 16:56:03', 1),
(75, 16, 2, 1, 0, '<a href=''/member/19.html''>@admin999</a>, ', '2015-07-22 21:27:30', 1),
(76, 16, 2, 1, 0, '666666<a href=''/member/2.html''>@admin</a>, ', '2015-07-22 21:27:58', 1),
(79, 20, 2, 1, 0, '<a href=''/member/18.html''>@simayub3o</a>, <a href=''/member/18.html''>@simayub3o</a>, 啦啦啦啦', '2015-07-22 22:12:26', 1),
(80, 20, 2, 1, 0, '<a href=''/member/2.html''>@admin</a>, 拉拉吧', '2015-07-22 22:12:41', 1),
(81, 15, 2, 3, 0, '<a href=''/member/2.html''>@admin</a>, 我来试试', '2015-07-22 22:14:12', 1),
(82, 20, 2, 1, 0, '啦啦啦啦啦<a href=''/member/2.html''>@admin</a>, ', '2015-07-22 22:17:50', 1),
(83, 15, 2, 3, 0, '哎呦！不错嘛！！<a href=''/member/2.html''>@admin</a>, ', '2015-07-22 22:35:10', 1),
(90, 20, 2, 1, 0, '<a href=''/member/2.html''>@admin</a>, <a href=''/member/2.html''>@admin</a>, <a href=''/member/2.html''>@admin</a>, ', '2015-07-23 16:56:57', 1),
(91, 1, 2, 1, 0, '谁水水水水水水水水水水水水水水水水水水水水水水水水水水水水', '2015-07-23 16:57:36', 1);

-- --------------------------------------------------------

--
-- 表的结构 `sl_file`
--

CREATE TABLE IF NOT EXISTS `sl_file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bid` int(11) NOT NULL,
  `file_name` varchar(200) NOT NULL,
  `file_path` varchar(300) NOT NULL,
  `file_size` varchar(10) NOT NULL,
  `file_table` varchar(10) NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `bid` (`bid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `sl_forum`
--

CREATE TABLE IF NOT EXISTS `sl_forum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sort_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `intor` varchar(200) DEFAULT NULL,
  `icon` varchar(200) DEFAULT NULL,
  `hot` tinyint(1) DEFAULT '0',
  `time` datetime NOT NULL,
  `allow` tinyint(2) NOT NULL DEFAULT '1',
  `order` varchar(20) DEFAULT '0',
  `topic_count` varchar(20) DEFAULT '0',
  `comment_count` varchar(20) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `sort_id` (`sort_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `sl_forum`
--

INSERT INTO `sl_forum` (`id`, `sort_id`, `name`, `intor`, `icon`, `hot`, `time`, `allow`, `order`, `topic_count`, `comment_count`) VALUES
(1, 2, '测试版块一', '这是一个测试的分类', NULL, 1, '2015-05-29 04:09:10', 1, '0', '19', '71'),
(2, 4, '测试分类二', '这是一个测试的分类', NULL, 0, '2015-06-27 06:16:15', 1, '0', '12', '5'),
(3, 2, '测试分类三', '这是一个测试的分类', NULL, 1, '2015-06-27 09:24:21', 1, '0', '2', '4'),
(4, 2, '测试分类四', '这是一个测试的分类', NULL, 0, '2015-06-27 11:21:24', 1, '0', '1', '0');

-- --------------------------------------------------------

--
-- 表的结构 `sl_member_news`
--

CREATE TABLE IF NOT EXISTS `sl_member_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `content` varchar(200) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=143 ;

--
-- 转存表中的数据 `sl_member_news`
--

INSERT INTO `sl_member_news` (`id`, `user_id`, `content`, `time`) VALUES
(1, 1, '发表帖子：<a href=''/topic/1.html''>Bootstrap可视化布局系统源码</a>', '2015-06-10 09:59:26'),
(2, 1, '在：<a href=''/topic/1.html#comment-1''>Bootstrap可视化布局系统源码</a> 发表了评论！', '2015-06-10 09:59:33'),
(3, 1, '发表帖子：<a href=''/topic/2.html''>Flyme手机OS初体验，赶脚还不错</a>', '2015-06-17 12:51:33'),
(4, 1, '在：<a href=''/topic/1.html#comment-2''>Bootstrap可视化布局系统源码</a> 发表了评论！', '2015-06-17 12:55:40'),
(5, 1, '发表帖子：<a href=''/topic/3.html''>eMedia媒体范儿1.2模板发布</a>', '2015-06-17 13:26:52'),
(6, 1, '在：<a href=''/topic/2.html#comment-3''>Flyme手机OS初体验，赶脚还不错</a> 发表了评论！', '2015-06-19 22:03:09'),
(7, 1, '在：<a href=''/topic/2.html#comment-4''>Flyme手机OS初体验，赶脚还不错</a> 发表了评论！', '2015-06-22 15:58:25'),
(8, 1, '在：<a href=''/topic/1.html#comment-5''>Bootstrap可视化布局系统源码</a> 发表了评论！', '2015-06-22 18:29:32'),
(9, 1, '发表帖子：<a href=''/topic/4.html''>2015-2-26更新host文件(Google,youtube,twtter可访问)【已失效】</a>', '2015-06-23 19:10:22'),
(10, 1, '在：<a href=''/topic/4.html#comment-6''>2015-2-26更新host文件(Google,youtube,twtter可访问)【已失效】</a> 发表了评论！', '2015-06-23 22:29:33'),
(11, 1, '发表帖子：<a href=''/topic/5.html''>试试哈哈哈大家按时打算年底将阿婶</a>', '2015-06-23 22:32:23'),
(12, 1, '在：<a href=''/topic/5.html#comment-7''>试试哈哈哈大家按时打算年底将阿婶</a> 发表了评论！', '2015-06-24 10:07:31'),
(13, 1, '在：<a href=''/topic/2.html#comment-8''>Flyme手机OS初体验，赶脚还不错</a> 发表了评论！', '2015-06-24 10:29:51'),
(14, 1, '在：<a href=''/topic/2.html#comment-9''>Flyme手机OS初体验，赶脚还不错</a> 发表了评论！', '2015-06-24 10:30:05'),
(15, 3, '发表帖子：<a href=''/topic/6.html''>Bootstrap可视化布局系统源码df</a>', '2015-06-24 10:34:07'),
(16, 3, '在：<a href=''/topic/4.html#comment-10''>2015-2-26更新host文件(Google,youtube,twtter可访问)【已失效】</a> 发表了评论！', '2015-06-24 10:41:17'),
(17, 3, '在：<a href=''/topic/4.html#comment-11''>2015-2-26更新host文件(Google,youtube,twtter可访问)【已失效】</a> 发表了评论！', '2015-06-24 10:41:36'),
(18, 3, '在：<a href=''/topic/4.html#comment-12''>2015-2-26更新host文件(Google,youtube,twtter可访问)【已失效】</a> 发表了评论！', '2015-06-24 10:42:24'),
(19, 3, '在：<a href=''/topic/4.html#comment-13''>2015-2-26更新host文件(Google,youtube,twtter可访问)【已失效】</a> 发表了评论！', '2015-06-24 10:43:18'),
(20, 3, '在：<a href=''/topic/4.html#comment-14''>2015-2-26更新host文件(Google,youtube,twtter可访问)【已失效】</a> 发表了评论！', '2015-06-24 10:43:27'),
(21, 3, '在：<a href=''/topic/4.html#comment-15''>2015-2-26更新host文件(Google,youtube,twtter可访问)【已失效】</a> 发表了评论！', '2015-06-24 10:44:53'),
(22, 3, '在：<a href=''/topic/6.html#comment-16''>Bootstrap可视化布局系统源码df</a> 发表了评论！', '2015-06-24 10:45:26'),
(23, 3, '在：<a href=''/topic/6.html#comment-17''>Bootstrap可视化布局系统源码df</a> 发表了评论！', '2015-06-24 10:46:06'),
(24, 3, '在：<a href=''/topic/6.html#comment-18''>Bootstrap可视化布局系统源码df</a> 发表了评论！', '2015-06-24 10:47:01'),
(25, 3, '在：<a href=''/topic/6.html#comment-19''>Bootstrap可视化布局系统源码df</a> 发表了评论！', '2015-06-24 10:47:28'),
(26, 3, '在：<a href=''/topic/6.html#comment-20''>Bootstrap可视化布局系统源码df</a> 发表了评论！', '2015-06-24 10:47:47'),
(27, 3, '在：<a href=''/topic/6.html#comment-21''>Bootstrap可视化布局系统源码df</a> 发表了评论！', '2015-06-24 10:48:25'),
(28, 3, '在：<a href=''/topic/6.html#comment-22''>Bootstrap可视化布局系统源码df</a> 发表了评论！', '2015-06-24 10:49:11'),
(29, 3, '在：<a href=''/topic/6.html#comment-23''>Bootstrap可视化布局系统源码df</a> 发表了评论！', '2015-06-24 11:10:29'),
(30, 3, '发表帖子：<a href=''/topic/7.html''>试试哈哈哈大家按时打算年底将阿婶的发生过</a>', '2015-06-24 11:24:07'),
(31, 3, '在：<a href=''/topic/7.html#comment-24''>试试哈哈哈大家按时打算年底将阿婶的发生过</a> 发表了评论！', '2015-06-24 11:24:42'),
(32, 3, '在：<a href=''/topic/6.html#comment-25''>Bootstrap可视化布局系统源码df</a> 发表了评论！', '2015-06-24 11:27:45'),
(33, 3, '在：<a href=''/topic/6.html#comment-26''>Bootstrap可视化布局系统源码df</a> 发表了评论！', '2015-06-24 11:28:02'),
(34, 3, '在：<a href=''/topic/6.html#comment-27''>Bootstrap可视化布局系统源码df</a> 发表了评论！', '2015-06-24 11:28:26'),
(35, 1, '发表帖子：<a href=''/topic/8.html''>Bootstrap可视化布局系统源码fdfdf</a>', '2015-06-24 17:57:24'),
(36, 1, '在：<a href=''/topic/8.html#comment-28''>Bootstrap可视化布局系统源码fdfdf</a> 发表了评论！', '2015-06-27 15:58:53'),
(37, 1, '在：<a href=''/topic/6.html#comment-29''>Bootstrap可视化布局系统源码df</a> 发表了评论！', '2015-06-27 19:54:51'),
(38, 1, '发表帖子：<a href=''/topic/9.html''>引用js或css后加?v= 版本号的用法</a>', '2015-06-28 10:05:52'),
(39, 1, '发表帖子：<a href=''/topic/10.html''>长大了，就要学会承担！g</a>', '2015-06-28 10:06:41'),
(40, 1, '发表帖子：<a href=''/topic/11.html''>让网页hight起来代码12</a>', '2015-06-28 10:07:17'),
(41, 2, '在：<a href=''/topic/3.html#comment-30''>eMedia媒体范儿1.2模板发布</a> 发表了评论！', '2015-06-28 22:48:47'),
(42, 2, '在：<a href=''/topic/3.html#comment-31''>eMedia媒体范儿1.2模板发布</a> 发表了评论！', '2015-06-28 22:48:51'),
(43, 2, '在：<a href=''/topic/3.html#comment-32''>eMedia媒体范儿1.2模板发布</a> 发表了评论！', '2015-06-28 22:48:55'),
(44, 2, '在：<a href=''/topic/3.html#comment-33''>eMedia媒体范儿1.2模板发布</a> 发表了评论！', '2015-06-28 22:49:01'),
(45, 2, '在：<a href=''/topic/3.html#comment-34''>eMedia媒体范儿1.2模板发布</a> 发表了评论！', '2015-06-28 22:49:12'),
(46, 2, '在：<a href=''/topic/3.html#comment-35''>eMedia媒体范儿1.2模板发布</a> 发表了评论！', '2015-06-28 22:49:16'),
(47, 2, '在：<a href=''/topic/3.html#comment-36''>eMedia媒体范儿1.2模板发布</a> 发表了评论！', '2015-06-28 22:49:21'),
(48, 2, '在：<a href=''/topic/3.html#comment-37''>eMedia媒体范儿1.2模板发布</a> 发表了评论！', '2015-06-28 22:49:28'),
(49, 2, '在：<a href=''/topic/3.html#comment-38''>eMedia媒体范儿1.2模板发布</a> 发表了评论！', '2015-06-28 22:49:32'),
(50, 2, '在：<a href=''/topic/3.html#comment-39''>eMedia媒体范儿1.2模板发布</a> 发表了评论！', '2015-06-28 22:49:37'),
(51, 2, '在：<a href=''/topic/3.html#comment-40''>eMedia媒体范儿1.2模板发布</a> 发表了评论！', '2015-06-28 22:49:43'),
(52, 2, '在：<a href=''/topic/3.html#comment-41''>eMedia媒体范儿1.2模板发布</a> 发表了评论！', '2015-06-28 22:49:49'),
(53, 2, '在：<a href=''/topic/3.html#comment-42''>eMedia媒体范儿1.2模板发布</a> 发表了评论！', '2015-06-28 22:49:56'),
(54, 2, '在：<a href=''/topic/3.html#comment-43''>eMedia媒体范儿1.2模板发布</a> 发表了评论！', '2015-06-28 22:50:01'),
(55, 2, '在：<a href=''/topic/3.html#comment-44''>eMedia媒体范儿1.2模板发布</a> 发表了评论！', '2015-06-28 22:50:14'),
(56, 2, '在：<a href=''/topic/3.html#comment-45''>eMedia媒体范儿1.2模板发布</a> 发表了评论！', '2015-06-28 22:50:19'),
(57, 2, '在：<a href=''/topic/11.html#comment-46''>让网页hight起来代码12</a> 发表了评论！', '2015-06-28 22:55:59'),
(58, 2, '发表帖子：<a href=''/topic/12.html''>让网页hight起来代码s</a>', '2015-06-30 18:10:51'),
(59, 2, '在：<a href=''/topic/11.html#comment-47''>让网页hight起来代码12</a> 发表了评论！', '2015-07-14 16:14:09'),
(60, 2, '在：<a href=''/topic/9.html#comment-48''>引用js或css后加?v= 版本号的用法</a> 发表了评论！', '2015-07-14 17:32:23'),
(61, 2, '在：<a href=''/topic/9.html#comment-49''>引用js或css后加?v= 版本号的用法</a> 发表了评论！', '2015-07-14 17:32:38'),
(62, 2, '在：<a href=''/topic/12.html#comment-50''>让网页hight起来代码s</a> 发表了评论！', '2015-07-17 17:34:15'),
(63, 2, '发表帖子：<a href=''/topic/13.html''>6666666666666666666666666666666666</a>', '2015-07-18 18:12:12'),
(64, 2, '发表帖子：<a href=''/topic/14.html''>Flyme手机OS初体验，赶脚还不错的苏打水</a>', '2015-07-19 00:20:43'),
(65, 2, '在：<a href=''/topic/6.html#comment-51''>Bootstrap可视化布局系统源码df</a> 发表了评论！', '2015-07-19 15:36:52'),
(66, 2, '在：<a href=''/topic/14.html#comment-52''>Flyme手机OS初体验，赶脚还不错的苏打水</a> 发表了评论！', '2015-07-19 15:38:30'),
(67, 2, '发表帖子：<a href=''/topic/15.html''>Flyme手机OS初体验，赶脚还不错四大四大四大</a>', '2015-07-19 15:39:56'),
(68, 2, '在：<a href=''/topic/15.html#comment-53''>Flyme手机OS初体验，赶脚还不错四大四大四大</a> 发表了评论！', '2015-07-19 15:40:40'),
(69, 2, '发表帖子：<a href=''/topic/16.html''>顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶</a>', '2015-07-19 15:41:14'),
(70, 2, '发表帖子：<a href=''/topic/17.html''>测试板块一</a>', '2015-07-19 15:49:28'),
(71, 2, '在：<a href=''/topic/16.html#comment-54''>顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶</a> 发表了评论！', '2015-07-19 15:55:08'),
(72, 2, '在：<a href=''/topic/10.html#comment-55''>长大了，就要学会承担！g</a> 发表了评论！', '2015-07-19 15:57:59'),
(73, 2, '在：<a href=''/topic/17.html#comment-56''>测试板块一</a> 发表了评论！', '2015-07-19 16:00:40'),
(74, 2, '发表帖子：<a href=''/topic/18.html''>引用js或css后加?v= 版本号的用法....................</a>', '2015-07-19 16:02:44'),
(75, 2, '在：<a href=''/topic/18.html#comment-57''>引用js或css后加?v= 版本号的用法....................</a> 发表了评论！', '2015-07-19 16:03:35'),
(76, 2, '发表帖子：<a href=''/topic/19.html''>Flyme手机OS初体验，赶脚还不错22222222222222</a>', '2015-07-19 16:05:12'),
(77, 2, '发表帖子：<a href=''/topic/20.html''>Flyme手机OS初体验，赶脚还不错jffhjgjfhgjfdg</a>', '2015-07-19 16:16:52'),
(78, 2, '发表帖子：<a href=''/topic/21.html''>dddddddddddddddddddddddddddddddddddd</a>', '2015-07-19 16:18:18'),
(79, 2, '在：<a href=''/topic/19.html#comment-58''>Flyme手机OS初体验，赶脚还不错22222222222222</a> 发表了评论！', '2015-07-19 16:18:36'),
(80, 2, '在：<a href=''/topic/21.html#comment-59''>dddddddddddddddddddddddddddddddddddd</a> 发表了评论！', '2015-07-19 16:19:57'),
(81, 2, '在：<a href=''/topic/10.html#comment-60''>长大了，就要学会承担！g</a> 发表了评论！', '2015-07-19 19:16:39'),
(82, 2, '在：<a href=''/topic/20.html#comment-61''>Flyme手机OS初体验，赶脚还不错jffhjgjfhgjfdg</a> 发表了评论！', '2015-07-22 13:42:03'),
(83, 18, '在：<a href=''/topic/20.html#comment-62''>Flyme手机OS初体验，赶脚还不错jffhjgjfhgjfdg</a> 发表了评论！', '2015-07-22 15:44:44'),
(84, 18, '在：<a href=''/topic/20.html#comment-63''>Flyme手机OS初体验，赶脚还不错jffhjgjfhgjfdg</a> 发表了评论！', '2015-07-22 15:44:55'),
(85, 18, '在：<a href=''/topic/20.html#comment-64''>Flyme手机OS初体验，赶脚还不错jffhjgjfhgjfdg</a> 发表了评论！', '2015-07-22 15:45:18'),
(86, 2, '在：<a href=''/topic/18.html#comment-65''>引用js或css后加?v= 版本号的用法....................</a> 发表了评论！', '2015-07-22 15:47:20'),
(87, 2, '在：<a href=''/topic/18.html#comment-66''>引用js或css后加?v= 版本号的用法....................</a> 发表了评论！', '2015-07-22 15:51:27'),
(88, 2, '发表帖子：<a href=''/topic/21.html''>这是什么程序啊？？？</a>', '2015-07-22 16:40:03'),
(89, 2, '在：<a href=''/topic/21.html#comment-67''>这是什么程序啊？？？</a> 发表了评论！', '2015-07-22 16:40:18'),
(90, 19, '在：<a href=''/topic/16.html#comment-68''>顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶</a> 发表了评论！', '2015-07-22 16:52:06'),
(91, 19, '在：<a href=''/topic/3.html#comment-69''>eMedia媒体范儿1.2模板发布</a> 发表了评论！', '2015-07-22 16:56:03'),
(92, 2, '在：<a href=''/topic/21.html#comment-70''>这是什么程序啊？？？</a> 发表了评论！', '2015-07-22 20:09:39'),
(93, 2, '在：<a href=''/topic/18.html#comment-71''>引用js或css后加?v= 版本号的用法....................</a> 发表了评论！', '2015-07-22 21:22:59'),
(94, 2, '在：<a href=''/topic/18.html#comment-72''>引用js或css后加?v= 版本号的用法....................</a> 发表了评论！', '2015-07-22 21:24:13'),
(95, 2, '在：<a href=''/topic/21.html#comment-73''>这是什么程序啊？？？</a> 发表了评论！', '2015-07-22 21:25:33'),
(96, 2, '在：<a href=''/topic/21.html#comment-74''>这是什么程序啊？？？</a> 发表了评论！', '2015-07-22 21:26:24'),
(97, 2, '在：<a href=''/topic/16.html#comment-75''>顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶</a> 发表了评论！', '2015-07-22 21:27:30'),
(98, 2, '在：<a href=''/topic/16.html#comment-76''>顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶</a> 发表了评论！', '2015-07-22 21:27:58'),
(99, 2, '在：<a href=''/topic/16.html#comment-77''>顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶</a> 发表了评论！', '2015-07-22 21:58:01'),
(100, 2, '在：<a href=''/topic/19.html#comment-78''>Flyme手机OS初体验，赶脚还不错22222222222222</a> 发表了评论！', '2015-07-22 22:00:21'),
(101, 2, '在：<a href=''/topic/20.html#comment-79''>Flyme手机OS初体验，赶脚还不错jffhjgjfhgjfdg</a> 发表了评论！', '2015-07-22 22:12:27'),
(102, 2, '在：<a href=''/topic/20.html#comment-80''>Flyme手机OS初体验，赶脚还不错jffhjgjfhgjfdg</a> 发表了评论！', '2015-07-22 22:12:41'),
(103, 2, '在：<a href=''/topic/15.html#comment-81''>Flyme手机OS初体验，赶脚还不错四大四大四大</a> 发表了评论！', '2015-07-22 22:14:12'),
(104, 2, '在：<a href=''/topic/20.html#comment-82''>Flyme手机OS初体验，赶脚还不错jffhjgjfhgjfdg</a> 发表了评论！', '2015-07-22 22:17:50'),
(105, 2, '在：<a href=''/topic/15.html#comment-83''>Flyme手机OS初体验，赶脚还不错四大四大四大</a> 发表了评论！', '2015-07-22 22:35:10'),
(106, 2, '在：<a href=''/topic/21.html#comment-84''>这是什么程序啊？？？</a> 发表了评论！', '2015-07-23 14:38:21'),
(107, 2, '在：<a href=''/topic/18.html#comment-85''>引用js或css后加?v= 版本号的用法....................</a> 发表了评论！', '2015-07-23 15:34:58'),
(108, 2, '在：<a href=''/topic/18.html#comment-86''>引用js或css后加?v= 版本号的用法....................</a> 发表了评论！', '2015-07-23 15:41:08'),
(109, 2, '在：<a href=''/topic/19.html#comment-87''>Flyme手机OS初体验，赶脚还不错22222222222222</a> 发表了评论！', '2015-07-23 15:46:47'),
(110, 2, '在：<a href=''/topic/19.html#comment-88''>Flyme手机OS初体验，赶脚还不错22222222222222</a> 发表了评论！', '2015-07-23 15:47:20'),
(111, 2, '在：<a href=''/topic/19.html#comment-89''>Flyme手机OS初体验，赶脚还不错22222222222222</a> 发表了评论！', '2015-07-23 15:57:10'),
(112, 2, '发表帖子：<a href=''/topic/22.html''>thinkphp3.2表单令牌的使用方法</a>', '2015-07-23 16:52:02'),
(113, 2, '在：<a href=''/topic/20.html#comment-90''>Flyme手机OS初体验，赶脚还不错jffhjgjfhgjfdg</a> 发表了评论！', '2015-07-23 16:56:58'),
(114, 2, '在：<a href=''/topic/1.html#comment-91''>Bootstrap可视化布局系统源码</a> 发表了评论！', '2015-07-23 16:57:36'),
(115, 2, '发表帖子：<a href=''/topic/23.html''>引用js或css后加?v= 版本号的用法45445</a>', '2015-07-23 17:00:38'),
(116, 2, '在：<a href=''/topic/23.html#comment-92''>引用js或css后加?v= 版本号的用法45445</a> 发表了评论！', '2015-07-23 17:00:45'),
(117, 2, '在：<a href=''/topic/23.html#comment-93''>引用js或css后加?v= 版本号的用法45445</a> 发表了评论！', '2015-07-23 17:00:55'),
(118, 2, '发表帖子：<a href=''/topic/24.html''>Emlog后台模版N+最终版本非官方个电饭锅电饭锅</a>', '2015-07-23 20:45:39'),
(119, 2, '发表帖子：<a href=''/topic/25.html''>Emlog后台模版N+最终版本kjkjjkjkjjk</a>', '2015-07-24 21:12:37'),
(120, 2, '发表帖子：<a href=''/topic/26.html''>Emlog后台模版N+最终版本sfasdfdfds</a>', '2015-07-24 21:29:50'),
(121, 2, '发表帖子：<a href=''/topic/27.html''>解决Gravatar图像被墙显示错误的方法所得税地方的孙菲菲</a>', '2015-07-24 21:57:14'),
(122, 3, '发表帖子：<a href=''/topic/28.html''>Flyme手机OS初体验，赶脚还不错sdfsdfsdfsdf</a>', '2015-07-24 21:58:52'),
(123, 2, '发表帖子：<a href=''/topic/29.html''>Flyme手机OS初体验，赶脚还不错ssssssssssssssssssssssssss</a>', '2015-07-24 22:10:05'),
(124, 2, '在：<a href=''/topic/23.html#comment-94''>引用js或css后加?v= 版本号的用法45445</a> 发表了评论！', '2015-07-24 23:53:15'),
(125, 2, '发表帖子：<a href=''/topic/29.html''>Flyme手机OS初体验，赶脚还不错谁谁谁谁谁谁</a>', '2015-07-25 18:14:43'),
(126, 2, '发表帖子：<a href=''/topic/30.html''>222</a>', '2015-07-25 18:17:48'),
(127, 2, '发表帖子：<a href=''/topic/31.html''>33333333</a>', '2015-07-25 18:19:37'),
(128, 2, '发表帖子：<a href=''/topic/32.html''>引用js或css后加?v= 版本号的用法水水水水是</a>', '2015-07-25 18:25:54'),
(129, 2, '发表帖子：<a href=''/topic/33.html''>sssssssssssssssssssssssssss</a>', '2015-07-25 18:27:17'),
(130, 2, '发表帖子：<a href=''/topic/34.html''>引用js或css后加?v= 版本号的用法666666</a>', '2015-07-25 18:30:47'),
(131, 2, '发表帖子：<a href=''/topic/35.html''>Flyme手机OS初体验，赶脚还不错ssddd</a>', '2015-07-25 18:43:28'),
(132, 2, '发表帖子：<a href=''/topic/36.html''>引用js或css后加?v= 版本号的用法sssssaa</a>', '2015-07-25 18:43:58'),
(133, 2, '发表帖子：<a href=''/topic/37.html''>引用js或css后加?v= 版本号的用法s</a>', '2015-07-25 18:46:38'),
(134, 2, '发表帖子：<a href=''/topic/38.html''>Fly</a>', '2015-07-25 18:47:12'),
(135, 2, '发表帖子：<a href=''/topic/39.html''>ssa</a>', '2015-07-25 18:47:46'),
(136, 2, '发表帖子：<a href=''/topic/40.html''>Flyme手机OS初体验，赶脚还不错ddds</a>', '2015-07-25 18:48:42'),
(137, 2, '发表帖子：<a href=''/topic/41.html''>Fls</a>', '2015-07-25 18:51:38'),
(138, 2, '发表帖子：<a href=''/topic/42.html''>sss</a>', '2015-07-25 18:52:40'),
(139, 2, '发表帖子：<a href=''/topic/43.html''>引用js或css后加?v= 版本号的用法sss</a>', '2015-07-25 18:56:32'),
(140, 2, '发表帖子：<a href=''/topic/44.html''>aaa</a>', '2015-07-25 19:01:21'),
(141, 2, '发表帖子：<a href=''/topic/45.html''>ssdda</a>', '2015-07-25 19:02:29'),
(142, 2, '发表帖子：<a href=''/topic/46.html''>5555553</a>', '2015-07-25 19:12:21');

-- --------------------------------------------------------

--
-- 表的结构 `sl_message`
--

CREATE TABLE IF NOT EXISTS `sl_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `time` datetime NOT NULL,
  `send_id` int(11) NOT NULL,
  `read_on` tinyint(1) NOT NULL DEFAULT '0',
  `read_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `uid` int(11) NOT NULL,
  `message_id` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `send_id` (`send_id`,`uid`),
  KEY `uid` (`uid`),
  KEY `message_id` (`message_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=107 ;

--
-- 转存表中的数据 `sl_message`
--

INSERT INTO `sl_message` (`id`, `content`, `time`, `send_id`, `read_on`, `read_time`, `uid`, `message_id`) VALUES
(19, '和机房建设的缴费时间的建设的快捷方式打开肌肤开始的减肥可见当时', '2015-06-24 08:24:19', 1, 1, '2015-06-24 00:00:00', 2, 0),
(20, '技术面的空间开始的加快建设更快速减肥给客服就赶快点附近工地开放就交给快递费', '2015-06-24 09:22:24', 2, 1, '0000-00-00 00:00:00', 1, 19),
(21, '你们说的可减肥开始的加快建设的控股将开始发国家开发机构空间对方', '2015-06-24 09:23:22', 2, 1, '0000-00-00 00:00:00', 1, 19),
(22, '放得开竣工if机构ID减肥可关键点覅结果ID飞机', '2015-06-24 08:19:18', 1, 1, '2015-06-24 21:57:31', 2, 19),
(23, 'asfasdf哦少法搜附近哦大家佛的时间佛山的扣费口水都快哦', '2015-06-24 09:21:21', 2, 1, '2015-06-28 20:51:03', 1, 0),
(24, '今年的妇科技术的付款时间的副驾驶的开放式的房价开始的', '2015-06-24 13:17:37', 2, 1, '0000-00-00 00:00:00', 1, 23),
(25, '开理发店可怜的收款方开始的法律上的开发了开始了开发商', '2015-06-24 12:00:00', 1, 1, '2015-06-24 21:56:26', 2, 23),
(26, '开始开发开始了对方开始的开发力度上看过了看过的开发管理对方', '2015-06-24 15:32:30', 1, 1, '2015-06-24 21:56:26', 2, 23),
(27, '', '0000-00-00 00:00:00', 1, 1, '2015-06-24 22:44:48', 2, 23),
(28, '和手段啥时间大家开始减肥开始的减肥可点击手机发货的价格', '2015-06-24 22:47:16', 2, 1, '2015-06-24 22:47:26', 2, 23),
(29, '你好啊', '2015-06-24 22:48:37', 2, 1, '2015-06-24 22:50:20', 1, 23),
(30, '啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦', '2015-06-24 22:49:34', 2, 1, '2015-06-24 22:50:20', 1, 23),
(31, '蝴蝶飞飞飞凤飞飞凤飞飞凤飞飞凤飞飞凤飞飞凤飞飞凤飞飞凤飞飞凤飞飞凤飞飞凤飞飞', '2015-06-24 22:49:46', 2, 1, '2015-06-24 22:50:19', 1, 23),
(32, '00000000000000000000000000000000', '2015-06-24 22:50:52', 2, 1, '2015-06-24 22:50:53', 2, 23),
(33, '二人人人人人人人人人人人人人人人人人人人人人人人人人人人', '2015-06-27 15:57:43', 2, 1, '2015-06-27 15:57:45', 2, 23),
(34, '水电费发放的发的发的发的发的发的发的发的发的', '2015-06-27 18:46:12', 1, 1, '2015-06-27 18:46:13', 1, 19),
(35, '11111111111111111111111111111111111111', '2015-06-27 19:48:33', 1, 1, '2015-06-27 19:48:35', 1, 19),
(36, '的时间放空间上的发生的健康凤飞飞凤飞飞凤飞飞凤飞飞凤飞飞凤飞飞凤飞飞凤飞飞凤飞飞凤飞飞', '2015-06-27 19:50:23', 1, 1, '2015-06-27 19:51:46', 2, 19),
(37, '1111111111111111111111111111111111111', '2015-06-28 10:03:23', 1, 1, '2015-06-28 10:04:50', 2, 19),
(38, '444444444444444444444444444', '2015-06-28 10:05:16', 1, 1, '2015-06-28 10:05:17', 1, 19),
(39, '欢迎注册SLBBS，请遵守论坛秩序！谢谢合作！', '2015-06-28 12:48:43', 8, 1, '2015-06-29 11:47:48', 1, 0),
(40, '', '2015-06-28 17:00:51', 8, 1, '2015-06-28 17:00:54', 8, 39),
(41, '1111111111111111111111111111111111111111111111', '2015-06-28 18:19:44', 2, 1, '2015-06-28 18:19:45', 2, 23),
(55, '欢迎注册SLBBS，请遵守论坛秩序！谢谢合作！', '2015-06-28 21:13:27', 9, 1, '2015-06-28 21:13:35', 1, 0),
(56, '欢迎注册SLBBS，请遵守论坛秩序！谢谢合作！此消息为系统自动发送，请勿回复！', '2015-06-28 21:15:31', 10, 1, '2015-06-28 21:15:42', 1, 0),
(57, 'ddddddddd凤飞飞凤飞飞凤飞飞凤飞飞凤飞飞凤飞飞凤飞飞凤飞飞凤飞飞dddddddddddddddddd', '2015-06-28 12:33:25', 10, 0, '2015-06-29 12:45:17', 9, 0),
(58, '8888888888888888888888888888888888888', '2015-06-28 21:16:56', 9, 1, '2015-06-29 12:46:08', 10, 57),
(59, '呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵', '2015-06-28 21:47:47', 9, 1, '2015-06-29 13:18:27', 10, 0),
(60, '22222222222222222222', '2015-06-29 12:34:32', 10, 1, '2015-06-29 12:35:15', 9, 59),
(61, '666666666666666666666', '2015-06-29 12:36:08', 9, 1, '2015-06-29 12:37:00', 10, 59),
(62, '666666666666666666666666666666666666666666666', '2015-06-29 12:37:10', 10, 1, '2015-06-29 12:38:13', 9, 59),
(63, '66666666666666655', '2015-06-29 12:38:28', 9, 1, '2015-06-29 12:45:54', 10, 59),
(64, '666666666666666666666', '2015-06-29 12:45:16', 9, 1, '2015-06-29 12:46:08', 10, 57),
(65, '66666666666666', '2015-06-29 12:46:03', 10, 0, '0000-00-00 00:00:00', 9, 59),
(66, '55555555555555', '2015-06-29 12:46:46', 10, 0, '0000-00-00 00:00:00', 9, 57),
(70, '22222222222222222', '2015-06-29 13:04:46', 8, 0, '0000-00-00 00:00:00', 9, 0),
(71, '2222222222222222', '2015-06-29 13:08:17', 10, 0, '0000-00-00 00:00:00', 9, 0),
(72, '6666666666666666', '2015-06-29 13:16:25', 10, 0, '0000-00-00 00:00:00', 9, 71),
(73, '222', '2015-06-29 13:16:55', 2, 1, '2015-06-30 10:02:16', 9, 0),
(74, '6666', '2015-06-29 13:18:25', 10, 0, '0000-00-00 00:00:00', 9, 59),
(75, '欢迎注册SLBBS，请遵守论坛秩序！谢谢合作！此消息为系统自动发送，请勿回复！', '2015-06-29 13:19:05', 11, 1, '2015-06-29 13:19:19', 1, 0),
(76, '大家好啊', '2015-06-29 13:30:26', 3, 1, '2015-06-29 13:40:03', 11, 0),
(77, '你是谁呀？？', '2015-06-29 13:33:06', 11, 1, '2015-06-29 13:33:33', 3, 76),
(78, '你猜我是谁，哈哈哈哈哈', '2015-06-29 13:38:46', 3, 1, '2015-06-29 13:40:04', 11, 76),
(79, '欢迎注册SLBBS，请遵守论坛秩序！谢谢合作！此消息为系统自动发送，请勿回复！', '2015-06-29 13:41:35', 12, 1, '2015-06-29 13:41:41', 1, 0),
(80, '欢迎注册SLBBS，请遵守论坛秩序！谢谢合作！此消息为系统自动发送，请勿回复！', '2015-06-30 12:46:03', 13, 1, '2015-06-30 12:46:07', 1, 0),
(81, '嘻嘻ixixixiixi111', '2015-06-30 18:12:02', 3, 1, '2015-07-24 21:58:37', 2, 0),
(82, '欢迎注册SLBBS，请遵守论坛秩序！谢谢合作！此消息为系统自动发送，请勿回复！', '2015-07-17 17:36:09', 14, 1, '2015-07-17 17:36:19', 1, 0),
(83, '666666666666666666666666', '2015-07-17 17:39:40', 3, 1, '2015-07-24 21:58:32', 14, 0),
(84, '欢迎注册SLBBS，请遵守论坛秩序！谢谢合作！此消息为系统自动发送，请勿回复！', '2015-07-17 17:41:25', 15, 1, '2015-07-17 17:41:32', 1, 0),
(85, '欢迎注册SLBBS，请遵守论坛秩序！谢谢合作！此消息为系统自动发送，请勿回复！', '2015-07-17 17:43:08', 16, 1, '2015-07-17 17:43:14', 1, 0),
(86, '欢迎注册SLBBS，请遵守论坛秩序！谢谢合作！此消息为系统自动发送，请勿回复！', '2015-07-21 15:43:52', 17, 0, '0000-00-00 00:00:00', 1, 0),
(87, 'mmmmmmm', '2015-07-21 22:52:34', 3, 1, '2015-07-24 21:58:26', 2, 0),
(88, '欢迎注册SLBBS，请遵守论坛秩序！谢谢合作！此消息为系统自动发送，请勿回复！', '2015-07-22 12:34:23', 18, 1, '2015-07-22 12:42:48', 1, 0),
(89, '66666666666666666666666', '2015-07-22 12:43:32', 2, 1, '2015-07-22 12:59:09', 18, 0),
(90, '欢迎注册SLBBS，请遵守论坛秩序！谢谢合作！此消息为系统自动发送，请勿回复！', '2015-07-22 16:46:18', 19, 0, '0000-00-00 00:00:00', 1, 0),
(91, '亲爱的admin！似乎有人@了你，&lt;a href=''/topic/16.html#common-77''&gt;查看详情&lt;/a&gt;', '2015-07-22 21:58:01', 2, 1, '2015-07-22 22:11:55', 1, 0),
(92, '亲爱的admin！似乎有人@了你，&lt;a href=''/topic/19.html#common-78''&gt;查看详情&lt;/a&gt;', '2015-07-22 22:00:21', 2, 1, '2015-07-22 22:00:56', 1, 0),
(93, '亲爱的simayub3o！似乎有人@了你，&lt;a href=''/topic/20.html#common-79''&gt;查看详情&lt;/a&gt;', '2015-07-22 22:12:27', 18, 0, '0000-00-00 00:00:00', 1, 0),
(94, '亲爱的admin！似乎有人@了你，&lt;a href=''/topic/20.html#common-80''&gt;查看详情&lt;/a&gt;', '2015-07-22 22:12:41', 2, 1, '2015-07-22 22:13:20', 1, 0),
(95, '亲爱的admin！似乎有人@了你，&lt;a href=''/topic/15.html#common-81''&gt;查看详情&lt;/a&gt;', '2015-07-22 22:14:12', 2, 1, '2015-07-22 22:39:58', 1, 0),
(96, '亲爱的admin！似乎有人@了你，&lt;a href=''/topic/20.html#common-82''&gt;查看详情&lt;/a&gt;', '2015-07-22 22:17:50', 2, 1, '2015-07-22 23:13:18', 1, 0),
(97, '亲爱的admin！似乎有人@了你，&lt;a href=''/topic/15.html#common-83''&gt;查看详情&lt;/a&gt;', '2015-07-22 22:35:10', 2, 1, '2015-07-22 22:38:59', 1, 0),
(98, '亲爱的admin！似乎有人@了你，&lt;a href=''/topic/18.html#common-85''&gt;查看详情&lt;/a&gt;', '2015-07-23 15:34:58', 2, 1, '2015-07-23 15:40:26', 1, 0),
(99, '亲爱的admin！似乎有人@了你，<a href=''/topic/18.html#common-86''>查看详情</a>', '2015-07-23 15:41:08', 2, 1, '2015-07-23 15:41:20', 1, 0),
(100, '亲爱的admin！似乎有人@了你，<a href=''/topic/19.html#common-87''>查看详情</a>', '2015-07-23 15:46:47', 2, 1, '2015-07-23 15:47:00', 1, 0),
(101, '亲爱的admin！似乎有人@了你，<a href=''/topic/19.html#common-88''>查看详情</a>', '2015-07-23 15:47:20', 2, 1, '2015-07-23 15:47:30', 1, 0),
(102, '亲爱的admin！似乎有人@了你，<a href=''/topic/19.html#common-89''>查看详情</a>', '2015-07-23 15:57:10', 2, 1, '2015-07-23 15:57:15', 1, 0),
(103, '亲爱的admin！似乎有人@了你，<a href=''/topic/20.html#common-90''>查看详情</a>', '2015-07-23 16:56:57', 2, 1, '2015-07-23 17:01:24', 1, 0),
(104, '亲爱的admin！似乎有人@了你，<a href=''/topic/23.html#common-93''>查看详情</a>', '2015-07-23 17:00:54', 2, 1, '2015-07-23 17:01:13', 1, 0),
(105, '欢迎注册SLBBS，请遵守论坛秩序！谢谢合作！此消息为系统自动发送，请勿回复！', '2015-07-23 23:51:52', 20, 1, '2015-07-23 23:52:16', 1, 0),
(106, '亲爱的admin！似乎有人在主题里@了你，<a href=''/topic/26.html''>查看详情</a>', '2015-07-24 21:29:49', 2, 1, '2015-07-24 21:30:05', 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `sl_sort`
--

CREATE TABLE IF NOT EXISTS `sl_sort` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sort_intor` varchar(200) NOT NULL,
  `sort_name` varchar(50) NOT NULL,
  `sort_order` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `sl_sort`
--

INSERT INTO `sl_sort` (`id`, `sort_intor`, `sort_name`, `sort_order`) VALUES
(2, '测试分类一', '分类一', '1'),
(3, '测试分类二', '分二', '2'),
(4, '测试分类三', '分类三', '3'),
(5, '测试分类四', '分类四', '4'),
(6, '测试分类五', '测试分类五', '5');

-- --------------------------------------------------------

--
-- 表的结构 `sl_topic`
--

CREATE TABLE IF NOT EXISTS `sl_topic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `forum_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `date` varchar(50) NOT NULL,
  `best` tinyint(1) DEFAULT '0',
  `home_top` tinyint(1) DEFAULT '0',
  `top` tinyint(1) DEFAULT '0',
  `hide` tinyint(1) DEFAULT '1',
  `last_date` varchar(50) NOT NULL DEFAULT '0',
  `reply` varchar(20) DEFAULT '0',
  `views` varchar(20) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`forum_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- 转存表中的数据 `sl_topic`
--

INSERT INTO `sl_topic` (`id`, `user_id`, `forum_id`, `title`, `content`, `date`, `best`, `home_top`, `top`, `hide`, `last_date`, `reply`, `views`) VALUES
(1, 1, 1, 'Bootstrap可视化布局系统源码', 'sa傻大姐那飞机上的那附近的烦恼事管理法，；；两个地方是的撒范德萨发', '2015-06-10 09:59:26', 1, 0, 0, 1, '2015:07:23 16:57:36', '4', '54'),
(2, 1, 1, 'Flyme手机OS初体验，赶脚还不错', 'sadas谁水水水水是水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水', '2015-06-17 12:51:32', 0, 0, 0, 1, '2015:06:24 10:30:05', '4', '46'),
(3, 1, 1, 'eMedia媒体范儿1.2模板发布', 's谁水水水水谁谁谁谁谁谁水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水', '2015-06-17 13:26:52', 0, 0, 1, 1, '2015:07:22 16:56:03', '17', '200'),
(4, 1, 1, '2015-2-26更新host文件(Google,youtube,twtter可访问)【已失效】', '解放军的妇科健康减肥给快递反馈给你看对方能够的减肥减肥的阿萨德将阿里看世界点卡是可敬的', '2015-06-23 19:10:21', 0, 0, 1, 1, '2015:06:24 10:44:54', '7', '59'),
(5, 1, 1, '试试哈哈哈大家按时打算年底将阿婶', '&lt;h2 id=&quot;require&quot; style=&quot;color:#727E0A;font-family:sans-serif;&quot;&gt;\r\n	Requirements\r\n&lt;/h2&gt;\r\n&lt;ul style=&quot;font-family:sans-serif;font-size:medium;&quot;&gt;\r\n	&lt;li&gt;\r\n		&lt;b&gt;PHP&lt;/b&gt;\r\n		&lt;ul&gt;\r\n			&lt;li&gt;\r\n				You need PHP 5.2.0 or newer, with&amp;nbsp;session&amp;nbsp;support (&lt;a href=&quot;http://phpmyadmin.com/Documentation.html#faq1_31&quot;&gt;see&amp;nbsp;FAQ&amp;nbsp;1.31&lt;/a&gt;) , the Standard PHP Library (SPL) extension and JSON support.\r\n			&lt;/li&gt;\r\n			&lt;li&gt;\r\n				To support uploading of ZIP files, you need the PHP&amp;nbsp;zip&amp;nbsp;extension.\r\n			&lt;/li&gt;\r\n			&lt;li&gt;\r\n				For proper support of multibyte strings (eg. UTF-8, which is currently the default), you should install the mbstring and ctype extensions.\r\n			&lt;/li&gt;\r\n			&lt;li&gt;\r\n				You need GD2 support in PHP to display inline thumbnails of JPEGs (&quot;image/jpeg: inline&quot;) with their original aspect ratio\r\n			&lt;/li&gt;\r\n			&lt;li&gt;\r\n				When using the &quot;cookie&quot;&amp;nbsp;&lt;a href=&quot;http://phpmyadmin.com/Documentation.html#authentication_modes&quot;&gt;authentication method&lt;/a&gt;, the&amp;nbsp;&lt;a href=&quot;http://www.php.net/mcrypt&quot;&gt;mcrypt&lt;/a&gt;&amp;nbsp;extension is strongly suggested for most users and is&amp;nbsp;&lt;b&gt;required&lt;/b&gt;for 64–bit machines. Not using mcrypt will cause phpMyAdmin to load pages significantly slower.\r\n			&lt;/li&gt;\r\n			&lt;li&gt;\r\n				To support upload progress bars, see&amp;nbsp;&lt;a href=&quot;http://phpmyadmin.com/Documentation.html#faq2_9&quot;&gt;FAQ&amp;nbsp;2.9&lt;/a&gt;.\r\n			&lt;/li&gt;\r\n			&lt;li&gt;\r\n				To support BLOB streaming, see PHP and MySQL requirements in&amp;nbsp;&lt;a href=&quot;http://phpmyadmin.com/Documentation.html#faq6_25&quot;&gt;FAQ&amp;nbsp;6.25&lt;/a&gt;.\r\n			&lt;/li&gt;\r\n			&lt;li&gt;\r\n				To support XML and Open Document Spreadsheet importing, you need PHP 5.2.17 or newer and the&amp;nbsp;&lt;a href=&quot;http://www.php.net/libxml&quot;&gt;libxml&lt;/a&gt;&amp;nbsp;extension.\r\n			&lt;/li&gt;\r\n		&lt;/ul&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n		&lt;b&gt;MySQL&lt;/b&gt;&amp;nbsp;5.0 or newer (&lt;a href=&quot;http://phpmyadmin.com/Documentation.html#faq1_17&quot;&gt;details&lt;/a&gt;);\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n		&lt;b&gt;Web browser&lt;/b&gt;&amp;nbsp;with cookies enabled.\r\n	&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;h2 id=&quot;intro&quot; style=&quot;color:#727E0A;font-family:sans-serif;&quot;&gt;\r\n	Introduction\r\n&lt;/h2&gt;\r\n&lt;p style=&quot;font-family:sans-serif;font-size:medium;&quot;&gt;\r\n	phpMyAdmin can manage a whole MySQL server (needs a super-user) as well as a single database. To accomplish the latter you''ll need a properly set up MySQL user who can read/write only the desired database. It''s up to you to look up the appropriate part in the MySQL manual.\r\n&lt;/p&gt;\r\n&lt;h3 style=&quot;color:#727E0A;font-family:sans-serif;&quot;&gt;\r\n	Currently phpMyAdmin can:\r\n&lt;/h3&gt;\r\n&lt;ul style=&quot;font-family:sans-serif;font-size:medium;&quot;&gt;\r\n	&lt;li&gt;\r\n		browse and drop databases, tables, views, columns and indexes\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n		create, copy, drop, rename and alter databases, tables, columns and indexes\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n		maintenance server, databases and tables, with proposals on server configuration\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n		execute, edit and bookmark any&amp;nbsp;SQL-statement, even batch-queries\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n		load text files into tables\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n		create&lt;a href=&quot;http://phpmyadmin.com/Documentation.html#footnote_1&quot;&gt;&lt;sup&gt;1&lt;/sup&gt;&lt;/a&gt;&amp;nbsp;and read dumps of tables\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n		export&lt;a href=&quot;http://phpmyadmin.com/Documentation.html#footnote_1&quot;&gt;&lt;sup&gt;1&lt;/sup&gt;&lt;/a&gt;&amp;nbsp;data to various formats:&amp;nbsp;CSV,&amp;nbsp;XML,&amp;nbsp;PDF,&amp;nbsp;ISO/IEC&amp;nbsp;26300 - OpenDocument Text and Spreadsheet,&amp;nbsp;Word, and L&lt;sup&gt;A&lt;/sup&gt;T&lt;sub&gt;E&lt;/sub&gt;X formats\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n		import data and MySQL structures from OpenDocument spreadsheets, as well as&amp;nbsp;XML,&amp;nbsp;CSV, and&amp;nbsp;SQL&amp;nbsp;files\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n		administer multiple servers\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n		manage MySQL users and privileges\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n		check referential integrity in MyISAM tables\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n		using Query-by-example (QBE), create complex queries automatically connecting required tables\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n		create&amp;nbsp;PDF&amp;nbsp;graphics of your Database layout\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n		search globally in a database or a subset of it\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n		transform stored data into any format using a set of predefined functions, like displaying BLOB-data as image or download-link\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n		track changes on databases, tables and views\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n		support InnoDB tables and foreign keys&amp;nbsp;&lt;a href=&quot;http://phpmyadmin.com/Documentation.html#faq3_6&quot;&gt;(see&amp;nbsp;FAQ&amp;nbsp;3.6)&lt;/a&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n		support mysqli, the improved MySQL extension&amp;nbsp;&lt;a href=&quot;http://phpmyadmin.com/Documentation.html#faq1_17&quot;&gt;(see&amp;nbsp;FAQ&amp;nbsp;1.17)&lt;/a&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n		create, edit, call, export and drop stored procedures and functions\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n		create, edit, export and drop events and triggers\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n		communicate in&amp;nbsp;&lt;a href=&quot;http://www.phpmyadmin.net/home_page/translations.php&quot;&gt;62 different languages&lt;/a&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n		synchronize two databases residing on the same as well as remote servers&amp;nbsp;&lt;a href=&quot;http://phpmyadmin.com/Documentation.html#faq9_1&quot;&gt;(see&amp;nbsp;FAQ&amp;nbsp;9.1)&lt;/a&gt;\r\n	&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;h4 style=&quot;color:#727E0A;font-family:sans-serif;font-size:medium;&quot;&gt;\r\n	A word about users:\r\n&lt;/h4&gt;\r\n&lt;p style=&quot;font-family:sans-serif;font-size:medium;&quot;&gt;\r\n	Many people have difficulty understanding the concept of user management with regards to phpMyAdmin. When a user logs in to phpMyAdmin, that username and password are passed directly to MySQL. phpMyAdmin does no account management on its own (other than allowing one to manipulate the MySQL user account information); all users must be valid MySQL users.\r\n&lt;/p&gt;\r\n&lt;p class=&quot;footnote&quot; id=&quot;footnote_1&quot; style=&quot;font-family:sans-serif;font-size:medium;&quot;&gt;\r\n	&lt;sup&gt;1)&lt;/sup&gt;&amp;nbsp;phpMyAdmin can compress (Zip, GZip -RFC 1952- or Bzip2 formats) dumps and&amp;nbsp;CSV&amp;nbsp;exports if you use PHP with Zlib support (--with-zlib) and/or Bzip2 support (--with-bz2). Proper support may also need changes in&amp;nbsp;php.ini.\r\n&lt;/p&gt;\r\n&lt;h2 id=&quot;setup&quot; style=&quot;color:#727E0A;font-family:sans-serif;&quot;&gt;\r\n	Installation\r\n&lt;/h2&gt;\r\n&lt;ol style=&quot;font-family:sans-serif;font-size:medium;&quot;&gt;\r\n	&lt;li&gt;\r\n		&lt;a href=&quot;http://phpmyadmin.com/Documentation.html#quick_install&quot;&gt;Quick Install&lt;/a&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n		&lt;a href=&quot;http://phpmyadmin.com/Documentation.html#setup_script&quot;&gt;Setup script usage&lt;/a&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n		&lt;a href=&quot;http://phpmyadmin.com/Documentation.html#linked-tables&quot;&gt;phpMyAdmin configuration storage&lt;/a&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n		&lt;a href=&quot;http://phpmyadmin.com/Documentation.html#upgrading&quot;&gt;Upgrading from an older version&lt;/a&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n		&lt;a href=&quot;http://phpmyadmin.com/Documentation.html#authentication_modes&quot;&gt;Using authentication modes&lt;/a&gt;\r\n	&lt;/li&gt;\r\n&lt;/ol&gt;\r\n&lt;p class=&quot;important&quot; style=&quot;color:#BB0000;font-family:sans-serif;font-size:medium;background-color:#FFEEEE;&quot;&gt;\r\n	phpMyAdmin does not apply any special security methods to the MySQL database server. It is still the system administrator''s job to grant permissions on the MySQL databases properly. phpMyAdmin''s &quot;Privileges&quot; page can be used for this.\r\n&lt;/p&gt;\r\n&lt;p class=&quot;important&quot; style=&quot;color:#BB0000;font-family:sans-serif;font-size:medium;background-color:#FFEEEE;&quot;&gt;\r\n	Warning for&amp;nbsp;Mac&amp;nbsp;users:&lt;br /&gt;\r\nif you are on a&amp;nbsp;Mac&amp;nbsp;OS&amp;nbsp;version before&amp;nbsp;OS&amp;nbsp;X, StuffIt unstuffs with&amp;nbsp;Mac&amp;nbsp;formats.&lt;br /&gt;\r\nSo you''ll have to resave as in BBEdit to Unix style ALL phpMyAdmin scripts before uploading them to your server, as PHP seems not to like&amp;nbsp;Mac-style end of lines character (&quot;\\r&quot;).\r\n&lt;/p&gt;\r\n&lt;div&gt;\r\n	&lt;br /&gt;\r\n&lt;/div&gt;', '2015-06-23 22:32:22', 0, 0, 0, 1, '2015:06:24 10:07:31', '1', '43'),
(6, 3, 1, 'Bootstrap可视化布局系统源码df', '&lt;p&gt;\r\n	&lt;strong&gt;&lt;span style=&quot;font-size:14px;&quot;&gt;时间点卡啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊&lt;/span&gt;&lt;/strong&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;ul&gt;\r\n		&lt;li&gt;\r\n			&lt;span style=&quot;font-size:14px;line-height:21px;&quot;&gt;&lt;b&gt;发大家观看的甲方根据地方刚看见对方空间给开的房间给开的房间&lt;/b&gt;&lt;/span&gt;\r\n		&lt;/li&gt;\r\n		&lt;li&gt;\r\n			&lt;span style=&quot;font-size:14px;line-height:21px;&quot;&gt;&lt;b&gt;第三方开始的减肥开始的价格空间风格基金开放给开的房间开关键点开放接口&lt;/b&gt;&lt;/span&gt;\r\n		&lt;/li&gt;\r\n		&lt;li&gt;\r\n			&lt;span style=&quot;font-size:14px;line-height:21px;&quot;&gt;&lt;b&gt;啥的考虑开发拉开对方的收款方老师的上课的法律考试了的开放式的李开复流口水了贷款&lt;/b&gt;&lt;/span&gt;\r\n		&lt;/li&gt;\r\n	&lt;/ul&gt;\r\n&lt;b&gt;&lt;img src=&quot;http://thinkphpbbs.com/Public/editor/plugins/emoticons/images/11.gif&quot; border=&quot;0&quot; alt=&quot;&quot; /&gt;&lt;img src=&quot;http://thinkphpbbs.com/Public/editor/plugins/emoticons/images/11.gif&quot; border=&quot;0&quot; alt=&quot;&quot; /&gt;&lt;img src=&quot;http://thinkphpbbs.com/Public/editor/plugins/emoticons/images/11.gif&quot; border=&quot;0&quot; alt=&quot;&quot; /&gt;&lt;img src=&quot;http://thinkphpbbs.com/Public/editor/plugins/emoticons/images/11.gif&quot; border=&quot;0&quot; alt=&quot;&quot; /&gt;&lt;/b&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;', '2015-06-24 10:34:07', 0, 0, 0, 1, '2015:07:19 15:36:53', '13', '82'),
(7, 3, 1, '试试哈哈哈大家按时打算年底将阿婶的发生过', '萨达是防水的高房价是看过你尽快发那个&lt;a href=''javascript:alert(''123'');''&gt;啦啦啦啦&lt;/a&gt;', '2015-06-24 11:24:06', 0, 0, 0, 1, '2015:06:24 11:24:42', '1', '50'),
(8, 1, 1, 'Bootstrap可视化布局系统源码fdfdf', '&lt;script&gt;alert(''xss'');&lt;/script&gt;', '2015-06-24 17:57:24', 0, 0, 0, 1, '2015:06:27 15:58:53', '1', '42'),
(9, 1, 1, '引用js或css后加?v= 版本号的用法', '就急急急急急急急急急急急急急急急急急急急急急急急急急急急急急急急急急急急急急急急急急急急急急急急急急急急急急急急急急急急急急急急', '2015-06-28 10:05:51', 0, 0, 0, 1, '2015:07:14 17:32:39', '2', '44'),
(10, 1, 1, '长大了，就要学会承担！g', '&lt;span style=&quot;font-size:16px;font-family:''Arial Black'';&quot;&gt;&lt;strong&gt;&lt;em&gt;olkkklllllllllllllllllllllllllllllllllllllllllkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk&lt;/em&gt;&lt;/strong&gt;&lt;/span&gt;', '2015-06-28 10:06:41', 0, 0, 1, 1, '2015:07:19 19:16:39', '2', '60'),
(12, 2, 1, '让网页hight起来代码s', 'sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', '2015-06-30 18:10:51', 0, 0, 1, 1, '2015:07:17 17:34:15', '1', '44'),
(14, 2, 3, 'Flyme手机OS初体验，赶脚还不错的苏打水', '时间几点发的发快快快快快快快快快快快快快快快快快快快快快快快快', '2015-07-19 00:20:42', 0, 0, 1, 1, '2015:07:19 15:38:30', '1', '52'),
(15, 2, 3, 'Flyme手机OS初体验，赶脚还不错四大四大四大', '&lt;p&gt;\r\n	谁谁谁谁谁谁谁水水水水是水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	飞飞飞飞飞飞飞飞凤飞飞凤飞飞凤飞飞凤飞飞凤飞飞凤飞飞凤飞飞凤飞飞凤飞飞凤飞飞凤飞飞凤飞飞凤飞飞凤飞飞凤飞飞凤飞飞凤飞飞凤飞飞\r\n&lt;/p&gt;', '2015-07-19 15:39:56', 0, 0, 1, 1, '2015:07:22 22:35:11', '3', '20'),
(16, 2, 1, '顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶', '&lt;span style=&quot;font-family:''Arial Black'';background-color:#99BB00;&quot;&gt;&lt;strong&gt;啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊&lt;/strong&gt;&lt;/span&gt;', '2015-07-19 15:41:14', 0, 0, 0, 1, '2015:07:22 21:58:02', '5', '42'),
(20, 2, 1, 'Flyme手机OS初体验，赶脚还不错jffhjgjfhgjfdg', '水水水水是水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水水', '2015-07-19 16:16:51', 0, 0, 0, 1, '2015:07:23 16:56:58', '8', '95');

-- --------------------------------------------------------

--
-- 表的结构 `sl_user`
--

CREATE TABLE IF NOT EXISTS `sl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `avatar` varchar(200) DEFAULT '0',
  `age` varchar(5) DEFAULT '18',
  `money` varchar(20) DEFAULT '0',
  `email` varchar(128) NOT NULL,
  `message` int(11) DEFAULT '0',
  `unmessage` int(11) DEFAULT '0',
  `phone` text,
  `power` tinyint(4) DEFAULT '1',
  `qq` varchar(20) DEFAULT NULL,
  `sex` tinyint(2) DEFAULT '0',
  `sign` varchar(200) DEFAULT NULL,
  `register_time` datetime DEFAULT NULL,
  `last_login_time` datetime DEFAULT NULL,
  `topic_count` varchar(20) DEFAULT '0',
  `reply_count` varchar(20) DEFAULT '0',
  `views` varchar(20) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- 转存表中的数据 `sl_user`
--

INSERT INTO `sl_user` (`id`, `username`, `password`, `avatar`, `age`, `money`, `email`, `message`, `unmessage`, `phone`, `power`, `qq`, `sex`, `sign`, `register_time`, `last_login_time`, `topic_count`, `reply_count`, `views`) VALUES
(1, '系统消息', 'db27wzarbELfG4BsEZMY4Au5eKq5i6RpC3J1kkhX+FqglU9QXpgddg', '2015-05-29/55683d252df03.jpg', '18', '165', 'simayubo@gmail.com', 0, 0, NULL, 0, NULL, 0, NULL, NULL, '2015-06-30 12:45:21', '9', '11', '91'),
(2, 'admin', '3c173W+7Nw9gF2uNGVtujOUw2udOJXYIeRJ9j07xUtBAF0gUmKplIA', '2015-06-30/55926b122938a.jpg', '18', '675', 'simayubo@gmail.com', 0, 0, NULL, 99, NULL, 1, '啦啦啦啦啦啦啦啦', '2015-05-29 18:28:02', '2015-08-29 09:40:36', '24', '45', '120'),
(3, 'admin2', '267fMtADIx/1bT03+p8GOVoO85VT77fn58jl1CpkLoW6XMTsy9Y0zQ', '0', '18', '120', '643636318@qq.com', 0, 0, NULL, 1, NULL, 0, '啦啦啦！大家好！', '2015-06-24 10:31:27', '2015-07-24 21:58:15', '3', '18', '12'),
(4, 'admin8', '319eIg6W8Idem9ZF7lkH6nhnn+s6i4R2kcfvB8xOIVizwhqBS/wPTA', '0', '18', '0', '6436363188@qq.com', 0, 0, NULL, 1, NULL, 0, NULL, '2015-06-24 18:47:46', '2015-06-24 18:50:50', '0', '0', '1'),
(5, 'admin9', 'e82dUILk5BXKFpGi00joxjoQm7N7E+WQS56eERcluW/dpkmQGEIlgg', '0', '18', '0', '6436363018@qq.com', 0, 0, NULL, 1, NULL, 0, NULL, '2015-06-24 18:51:10', '2015-06-24 18:52:44', '0', '0', '1'),
(6, 'admin3', 'dd29ObqKhUqEmTPq9tqrGfWWAVlDh8eBGpG/wvh4jEIlhb0FXNQqUA', '0', '18', '0', '6436363318@qq.com', 0, 1, NULL, 1, NULL, 0, NULL, '2015-06-24 18:53:07', '2015-06-24 18:57:12', '0', '0', '0'),
(7, 'admin10', '0da2brv+yBsKyPCQFbNdJl8cibg7/XKgpZhh/epcLDOYs9gbjmdIPA', '0', '18', '0', 'simayubo@gmasil.com', 0, 1, NULL, 0, NULL, 0, NULL, '2015-06-24 18:57:36', '2015-06-24 19:06:52', '0', '0', '0'),
(8, 'admin13', 'cf7acakNP3fnA7ZD86pfWoJOEfBVyiQKYAgvUuwvrsx1lQPABCl5oQ', '0', '18', '0', '64363678318@qq.com', 0, 1, NULL, 0, NULL, 0, NULL, '2015-06-28 12:48:42', '2015-06-29 11:47:54', '0', '0', '1'),
(9, 'admin15', '5198A/S2So/WTsypzkQoAzDNZfDbsrI3Yaxr7KOLzT3F/WIkMRe9qw', '0', '18', '0', '6243636318@qq.com', 0, 0, NULL, 1, NULL, 0, NULL, '2015-06-28 21:13:26', '2015-06-29 13:18:42', '0', '0', '6'),
(10, 'admin16', '4fa1lGqgApqN9H718u8kBJBux0Kfhs3hGiz+zthxbW/D1m0N0V5bjQ', '0', '18', '0', '6436363158@qq.com', 0, 2, NULL, 1, NULL, 0, NULL, '2015-06-28 21:15:30', '2015-06-29 12:45:33', '0', '0', '5'),
(11, 'admin23', '2ebbT92jD3+fSSrcH4idyW+sl4ygxHytfNVxg7qvhsdOirtJHtgBbw', '0', '18', '0', 's2imayubo@gmail.com', 0, 0, NULL, 0, NULL, 0, NULL, '2015-06-29 13:19:05', '2015-06-29 13:41:09', '0', '0', '8'),
(12, 'admin30', '42dcxvpw/kfES+GWzx4FgO2Qr62YfVb9yQkr6wOzWuL40Lnaj3krIA', '0', '18', '0', 's12imayubo@gmail.com', 0, 0, NULL, 1, NULL, 0, NULL, '2015-06-29 13:41:35', '2015-07-17 02:08:09', '0', '0', '0'),
(13, 'admin888', '8a50TD4qxwS8Yfwwumhq/TJTANQgC/6z1vBKrFhn4ikpohJFxILYIA', '0', '18', '0', 'simayubo@gmaisl.com', 0, 0, NULL, 1, NULL, 0, NULL, '2015-06-30 12:46:03', '2015-07-17 03:10:09', '0', '0', '0'),
(14, 'admin777', 'b7b2whGK1n4nwdzz/3TaJokxoD6k6p5J2oTeUinsTfa/Xcrg3MXFZg', '0', '18', '0', '6436436318@qq.com', 0, 0, NULL, 1, NULL, 0, NULL, '2015-07-17 17:36:09', '2015-07-17 17:39:56', '0', '0', '0'),
(15, 'admin648', 'af55uVJ0c4HLFmeUvbfClkpNSqWeZolOT4QHCpowUJrkcIH2pCK7HA', '0', '18', '0', '643634556318@qq.com', 0, 0, NULL, 1, NULL, 0, NULL, '2015-07-17 17:41:25', '2015-07-17 17:42:16', '0', '0', '0'),
(16, 'adm3in', '9a62NtdDahNmue3OZjQxoX9cy80O3WAL5Kg/hAujBnHwrK6TTPyviw', '0', '18', '0', 'simayu45bo@gmail.com', 0, 0, NULL, 1, NULL, 0, NULL, '2015-07-17 17:43:08', '2015-07-17 17:43:28', '0', '0', '0'),
(17, 'admin565', '0951bBc1JWlAyUx0nWQoU4aD9D8NAfxkG82i3UCa4eRmK9dnk9AovA', '0', '18', '0', '643634446318@qq.com', 0, 1, NULL, 1, NULL, 0, NULL, '2015-07-21 15:43:52', NULL, '0', '0', '4'),
(18, 'simayub3o', 'd2e3ZiuSXHPPPniOwWKgF1J5aFdWJGJTD7MincBjdtrK35wZE5I/NQ', '0', '18', '15', '64363ss6318@qq.com', 0, 0, NULL, 1, NULL, 0, NULL, '2015-07-22 12:34:22', NULL, '0', '3', '6'),
(19, 'admin999', 'a5afDsoW/nvoAS4NWIIe3beIiLIIQZdVUtXqWsQqn0J/KoR3qb+VIQ', '0', '18', '10', '643343434@qq.com', 0, 1, NULL, 1, NULL, 0, NULL, '2015-07-22 16:46:17', NULL, '0', '2', '1'),
(20, '64363ss', '0d68A0jNAYsqlnSwPVSYtQT4D/ZN/uiRj61rjeYxMla8lGDH9wXIDw', '0', '18', '0', 'simaydsdubo@sina.com', 0, 0, NULL, 1, NULL, 0, NULL, '2015-07-23 23:51:52', NULL, '0', '0', '0');

-- --------------------------------------------------------

--
-- 表的结构 `sl_website`
--

CREATE TABLE IF NOT EXISTS `sl_website` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  `site_description` varchar(300) NOT NULL,
  `site_icp` varchar(200) NOT NULL,
  `site_keywords` varchar(500) NOT NULL,
  `site_off_reason` text NOT NULL COMMENT '站点关闭公告',
  `site_register` tinyint(2) NOT NULL DEFAULT '1',
  `site_start_time` datetime NOT NULL,
  `site_switch` tinyint(2) NOT NULL DEFAULT '1',
  `site_title` varchar(200) NOT NULL,
  `site_url` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='站点配置' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `sl_website`
--

INSERT INTO `sl_website` (`id`, `type`, `site_description`, `site_icp`, `site_keywords`, `site_off_reason`, `site_register`, `site_start_time`, `site_switch`, `site_title`, `site_url`) VALUES
(1, 'website', '网站seo介绍', 'icp备案号', '网站关键词', '因数据库丢失，网站暂停维护中！！！', 1, '2015-05-22 01:01:01', 1, 'SLBBS', 'http://thinkphpbbs.com');

--
-- 限制导出的表
--

--
-- 限制表 `sl_comment`
--
ALTER TABLE `sl_comment`
  ADD CONSTRAINT `sl_comment_ibfk_1` FOREIGN KEY (`tid`) REFERENCES `sl_topic` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `sl_comment_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `sl_user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- 限制表 `sl_forum`
--
ALTER TABLE `sl_forum`
  ADD CONSTRAINT `sl_forum_ibfk_1` FOREIGN KEY (`sort_id`) REFERENCES `sl_sort` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- 限制表 `sl_member_news`
--
ALTER TABLE `sl_member_news`
  ADD CONSTRAINT `sl_member_news_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `sl_user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- 限制表 `sl_message`
--
ALTER TABLE `sl_message`
  ADD CONSTRAINT `sl_message_ibfk_1` FOREIGN KEY (`send_id`) REFERENCES `sl_user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `sl_message_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `sl_user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- 限制表 `sl_topic`
--
ALTER TABLE `sl_topic`
  ADD CONSTRAINT `sl_topic_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `sl_user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
