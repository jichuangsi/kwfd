SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `onethink_company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL COMMENT '机构名称',
  `ico` int(11) NOT NULL COMMENT '机构图标',
  `detail` varchar(1000) NOT NULL COMMENT '机构简介',
  `token` varchar(1000) NOT NULL COMMENT '微信令牌',
  `changetime` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '状态，-1：删除；0：禁用；1：启用；2：未审核',
  `createtime` int(11) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='机构信息' AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `onethink_company_usergroup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(25) NOT NULL,
  `createtime` int(11) NOT NULL,
  `updatetime` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `pid` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `onethink_company_administrator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `companyid` int(11)NOT NULL COMMENT '机构ID',
  `uid` int(11)NOT NULL COMMENT '用户ID',
  `name` varchar(25) NOT NULL COMMENT '用户名称',
  `changetime` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '状态，-1：删除；0：禁用；1：启用；2：未审核',
  `createtime` int(11) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='机构管理员信息' AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `thinkox_issue_content`
--

set @tmp_id=0;
select @tmp_id:= id from `onethink_menu` where title = '机构管理';


INSERT INTO `onethink_menu` ( `title`, `pid`, `sort`, `url`, `hide`, `tip`, `group`, `is_dev`) VALUES
( '机构列表', @tmp_id, 8, 'company/companylist', 0, '', '机构管理', 0),
( '添加、编辑机构', @tmp_id, 8, 'company/companyedit', 1, '', '机构管理', 0),
( '机构管理员列表', @tmp_id, 9, 'company/administratorlist', 1, '', '机构管理', 0),
( '添加、编辑机构管理员', @tmp_id, 10, 'company/administratoredit', 1, '', '机构管理', 0),
( '回收站', @tmp_id, 7, 'company/trash', 0, '', '机构管理', 0),
( '用户组管理', @tmp_id, 2, 'company/usergroup', 0, '', '机构配置', 0),
( '用户组回收站', @tmp_id, 3, 'company/usergrouptrash', 0, '', '机构配置', 0),
( '添加、编辑用户组', @tmp_id, 0, 'company/addusergroup', 1, '', '', 0),
( '用户组操作', @tmp_id, 0, 'company/operateusergroup', 1, '', '', 0),
( '用户管理', @tmp_id, 2, 'company/users', 0, '', '机构配置', 0);


