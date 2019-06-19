SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `onethink_poster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(25) NOT NULL COMMENT '标题',
  `image` int(11) NOT NULL COMMENT '图片',
  `content` varchar(1000) NOT NULL COMMENT '内容',
  `url` varchar(100) NOT NULL COMMENT '链接',  
  `companyid` int(11) NOT NULL,
  `changetime` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '状态，-1：删除；0：禁用；1：启用；2：未审核',
  `createtime` int(11) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='幻灯片' AUTO_INCREMENT=1 ;

INSERT INTO `onethink_menu` (`title`, `pid`, `sort`, `url`, `hide`, `tip`, `group`, `is_dev`) VALUES
( '企业海报', 0, 22, 'poster/lists', 0, '', '', 0);
--
-- 转存表中的数据 `thinkox_issue_content`
--

set @tmp_id=0;
select @tmp_id:= id from `onethink_menu` where title = '幻灯片';


INSERT INTO `onethink_menu` ( `title`, `pid`, `sort`, `url`, `hide`, `tip`, `group`, `is_dev`) VALUES
( '所有幻灯片', @tmp_id, 1, 'poster/lists', 0, '', '幻灯片', 0),
( '添加、编辑幻灯片', @tmp_id, 2, 'poster/edit', 1, '', '幻灯片', 0),
( '回收站', @tmp_id, 3, 'poster/trash', 0, '', '幻灯片', 0);


