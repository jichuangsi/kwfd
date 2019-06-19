SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `onethink_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(25) NOT NULL COMMENT '标题',
  `image` int(11) NOT NULL COMMENT '图片',
  `video` int(11) NOT NULL COMMENT '视频',
  `categoryid` int(11) NOT NULL COMMENT '分类',
  `content` varchar(1000) NOT NULL COMMENT '内容',
  `companyid` int(11) NOT NULL,
  `changetime` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '状态，-1：删除；0：禁用；1：启用；2：未审核',
  `createtime` int(11) NOT NULL COMMENT '创建时间',
  `category` int(11) NOT NULL COMMENT '分类',
  `view` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '浏览量',
  `sort` INT(11) NOT NULL DEFAULT  '0' COMMENT  '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='资讯管理' AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `onethink_news_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(25) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `pid` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


INSERT INTO `onethink_menu` (`title`, `pid`, `sort`, `url`, `hide`, `tip`, `group`, `is_dev`) VALUES
( '资讯管理', 0, 22, 'news/lists', 0, '', '', 0);
--
-- 转存表中的数据 `thinkox_issue_content`
--

set @tmp_id=0;
select @tmp_id:= id from `onethink_menu` where title = '资讯管理';


INSERT INTO `onethink_menu` ( `title`, `pid`, `sort`, `url`, `hide`, `tip`, `group`, `is_dev`) VALUES
( '所有资讯', @tmp_id, 1, 'news/lists', 0, '', '资讯管理', 0),
( '添加、编辑资讯', @tmp_id, 2, 'news/edit', 1, '', '资讯管理', 0),
( '回收站', @tmp_id, 3, 'news/trash', 0, '', '资讯管理', 0),
( '分类', @tmp_id, 1, 'news/Category', 0, '', '资讯配置', 0),
( '添加、编辑资讯', @tmp_id, 2, 'news/addCategory', 1, '', '资讯配置', 0),
( '分类操作', @tmp_id, 3, 'news/operateCategory', 1, '', '资讯配置', 0),
( '分类回收站', @tmp_id, 4, 'news/categoryTrash', 0, '', '资讯配置', 0);
