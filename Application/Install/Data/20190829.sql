INSERT INTO `onethink_config` (`name`, `type`, `title`, `group`, `extra`, `remark`, `create_time`, `update_time`, `status`, `value`, `sort`) VALUES ( 'MASTER_API_ACTIVITY', 0, '教育中台活动接口', 0, '', '教育中台活动URL', 1378898976, 1532097941, 1, 'http://www.jichuangsi.com/parentjournalism/getactivity.php?gid=', 0);
INSERT INTO `onethink_config` (`name`, `type`, `title`, `group`, `extra`, `remark`, `create_time`, `update_time`, `status`, `value`, `sort`) VALUES ( '_CONFIG_LX_QRCODE_URL', 1, '乐享二维码分享地址', 1, '', '乐享二维码分享地址', 1378898976, 1532097941, 1, 'http://www.jichuangsi.com/index.php/cms/content/shareurl/k/__course__/u/__user__/g/__org__', 0);

alter table onethink_live add `activityId` tinyint(4) DEFAULT '0' COMMENT '平台活动，0：没有参加；大于0：有参加';
alter table onethink_live add `activityName` varchar(100) DEFAULT '' COMMENT '平台活动名称';
