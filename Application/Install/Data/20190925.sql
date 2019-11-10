INSERT INTO `onethink_config` (`name`, `type`, `title`, `group`, `extra`, `remark`, `create_time`, `update_time`, `status`, `value`, `sort`) VALUES ( 'MAJOR_JUHEPAY_QRCODE_URL', 0, '乐享聚合码支付地址', 0, '', '乐享聚合码支付地址', 1378898976, 1532097941, 1, 'http://sample.zaixian.jichuangsi.com/index.php?s=/payoff/juhepay/index/o/__orderid__.html', 0);
INSERT INTO `onethink_config` (`name`, `type`, `title`, `group`, `extra`, `remark`, `create_time`, `update_time`, `status`, `value`, `sort`) VALUES ( 'MAJOR_ORDER_API_URL', 0, '乐享订单中心接口', 0, '', '乐享订单中心接口', 1378898976, 1532097941, 1, 'http://sample.zaixian.jichuangsi.com/index.php/api/order/__ACTION__', 0);
INSERT INTO `onethink_config` (`name`, `type`, `title`, `group`, `extra`, `remark`, `create_time`, `update_time`, `status`, `value`, `sort`) VALUES ( 'MAJOR_COURSE_API_URL', 0, '乐享课程中心接口', 0, '', '乐享课程中心接口', 1378898976, 1532097941, 1, '__HOST__/index.php/api/course/__ACTION__', 0);

alter table onethink_live add `updateFlag` int(11) NOT NULL DEFAULT '0' COMMENT '更新标志';
alter table onethink_live add `images` varchar(256) DEFAULT '' COMMENT '课件';

INSERT INTO `onethink_auth_rule` (`module`, `type`, `name`, `title`, `status`, `condition`) VALUES( 'admin', 1, 'Admin/live/endCourse', '内容状态设置', 1, '');

update `onethink_auth_group` set  `rules` = '1,263,264,274,276,278,279,280,293,294,303,306,308,309,319,325,326,328,329,330,361,365,366,367,368,370,371,372,373,374,375,376,377,379,380,381,382,383,384,385,386,387' where `id` = 5;

CREATE TABLE IF NOT EXISTS `onethink_orderlistdetail` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `MODULE_NAME` varchar(20) NOT NULL COMMENT '产品所属模块',
  `url` varchar(100) NOT NULL COMMENT '产品地址',
  `title` varchar(100) NOT NULL COMMENT '产品名称',
  `goodid` int(10) unsigned NOT NULL DEFAULT '0',  
  `orderlistid` varchar(225) DEFAULT NULL COMMENT '订单列表id',
  `orgId` tinyint(4) DEFAULT '0' COMMENT '平台机构ID',
  `orgName` varchar(100) DEFAULT '' COMMENT '平台机构名称',
  `image` varchar(100) DEFAULT '' COMMENT '平台机构课程图片',
  `view` int(10) DEFAULT '0' COMMENT '平台机构课程点击数',
  `starttime` int(11) unsigned DEFAULT NULL COMMENT '平台机构课程开始时间',
  `endtime` int(11) unsigned DEFAULT NULL COMMENT '平台机构课程结束时间',
  `updateFlag` int(11) NOT NULL DEFAULT '0' COMMENT '平台机构课程更新标志',
  `courseStatus` tinyint(4) NOT NULL COMMENT '状态，-1：删除；0：禁用；1：启用；2：未审核',
  `online` tinyint(4) NOT NULL COMMENT '是否线上，0：否；1：是',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=124 ;
