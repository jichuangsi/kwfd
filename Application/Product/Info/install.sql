SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `onethink_Product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(25) NOT NULL COMMENT '标题',
  `image` int(11) NOT NULL COMMENT '图片',
  `categoryid` int(11) NOT NULL COMMENT '分配',
  `content` text COMMENT '内容',
  `companyid` int(11) NOT NULL,
  `changetime` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '状态，-1：删除；0：禁用；1：启用；2：未审核',
  `createtime` int(11) NOT NULL COMMENT '创建时间',
  `category` int(11) NOT NULL COMMENT '分类',
  `view` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '浏览量',
  `price` FLOAT( 10,2 ) NOT NULL DEFAULT  '0.00' COMMENT  '价格',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='产品管理' AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `onethink_product_category` (
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
( '产品管理', 0, 22, 'product/lists', 0, '', '', 0);
--
-- 转存表中的数据 `thinkox_issue_content`
--

set @tmp_id=0;
select @tmp_id:= id from `onethink_menu` where title = '产品管理';


INSERT INTO `onethink_menu` ( `title`, `pid`, `sort`, `url`, `hide`, `tip`, `group`, `is_dev`) VALUES
( '所有内容', @tmp_id, 1, 'product/lists', 0, '', '产品管理', 0),
( '添加、编辑内容', @tmp_id, 2, 'product/edit', 1, '', '产品管理', 0),
( '内容回收站', @tmp_id, 3, 'product/trash', 0, '', '产品管理', 0),
( '内容状态设置', @tmp_id, 4, 'product/setStatus', 1, '', '产品管理', 0),
( '分类管理', @tmp_id, 1, 'product/Category', 0, '', '产品配置', 0),
( '添加、编辑分类', @tmp_id, 2, 'product/addCategory', 1, '', '产品配置', 0),
( '分类操作', @tmp_id, 3, 'product/operateCategory', 1, '', '产品配置', 0),
( '分类回收站', @tmp_id, 4, 'product/categoryTrash', 0, '', '产品配置', 0);
