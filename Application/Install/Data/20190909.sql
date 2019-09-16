INSERT INTO `onethink_config` (`name`, `type`, `title`, `group`, `extra`, `remark`, `create_time`, `update_time`, `status`, `value`, `sort`) VALUES ( 'MASTER_API_ORG_CATEGORY', 0, '教育中台机构分类接口', 0, '', '教育中台机构分类URL', 1378898976, 1532097941, 1, 'http://www.jichuangsi.com/parentjournalism/gethycategory.php', 0);
INSERT INTO `onethink_config` (`name`, `type`, `title`, `group`, `extra`, `remark`, `create_time`, `update_time`, `status`, `value`, `sort`) VALUES ( 'MASTER_API_ORGANIZATION', 0, '教育中台机构列表接口', 0, '', '教育中台机构列表URL', 1378898976, 1532097941, 1, 'http://www.jichuangsi.com/parentjournalism/gethyinfo.php?pid=', 0);

alter table onethink_live add `orgCatId` tinyint(4) DEFAULT '0' COMMENT '平台机构分类ID';
alter table onethink_live add `orgId` tinyint(4) DEFAULT '0' COMMENT '平台机构ID';
alter table onethink_live add `orgName` varchar(100) DEFAULT '' COMMENT '平台机构名称';