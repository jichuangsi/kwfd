SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
 
--
-- 添加后台顶部菜单
--
INSERT INTO `onethink_menu` (`title`, `pid`, `sort`, `url`, `hide`, `tip`, `group`, `is_dev`) VALUES
( '在线考试', 0, 22, 'Examination/recordList', 0, '', '', 0);

set @tmp_id=0;
select @tmp_id:= id from `onethink_menu` where title = '在线考试';

INSERT INTO `onethink_menu` ( `title`, `pid`, `sort`, `url`, `hide`, `tip`, `group`, `is_dev`) VALUES
( '考试记录', @tmp_id, 1, 'Examination/recordList', 0, '', '在线考试', 0),
( '题库管理', @tmp_id, 2, 'Examination/topicsList', 0, '', '在线考试', 0),
( '试卷管理', @tmp_id, 3, 'Examination/questionpapersList', 0, '', '在线考试', 0);

set @tmp_id=0;
select @tmp_id:= id from `onethink_menu` where title = '题库管理';
INSERT INTO `onethink_menu` ( `title`, `pid`, `sort`, `url`, `hide`, `tip`, `group`, `is_dev`) VALUES
( '编辑题目', @tmp_id, 1, 'Examination/editTopic', 0, '', '', 0),
( '新增题目', @tmp_id, 2, 'Examination/addtopic', 0, '', '', 0);

set @tmp_id=0;
select @tmp_id:= id from `onethink_menu` where title = '试卷管理';
INSERT INTO `onethink_menu` ( `title`, `pid`, `sort`, `url`, `hide`, `tip`, `group`, `is_dev`) VALUES
( '试卷编辑', @tmp_id, 0, 'Examination/edittestpaper', 0, '', '', 0),
( '试卷题目管理', @tmp_id, 0, 'Examination/topicManage', 0, '', '', 0);
 
INSERT INTO `onethink_menu` ( `title`, `pid`, `sort`, `url`, `hide`, `tip`, `group`, `is_dev`) VALUES
( '分类', @tmp_id, 1, 'Examination/Category', 0, '', '配置', 0),
( '添加、编辑分类', @tmp_id, 2, 'Examination/addCategory', 1, '', '配置', 0),
( '分类操作', @tmp_id, 3, 'Examination/operateCategory', 1, '', '配置', 0),
( '分类回收站', @tmp_id, 4, 'Examination/categoryTrash', 0, '', '配置', 0); 
--
-- 添加前台顶部菜单
--
INSERT INTO `onethink_channel` (`pid`, `title`, `url`, `sort`, `create_time`, `update_time`, `status`, `target`) VALUES
(0,'在线考试', 'Examination/Index/index',5,1420421553,1420421553,1,0);
 
-- ----------------------------
-- Table structure for `ox_topics`
-- ----------------------------
DROP TABLE IF EXISTS `onethink_topics`;
CREATE TABLE `onethink_topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL COMMENT '题目名称',
  `content` varchar(255) NOT NULL COMMENT '内容',
  `ao` varchar(255) NOT NULL COMMENT '选项答案',
  `bo` varchar(255) NOT NULL COMMENT '选项答案',
  `co` varchar(255) NOT NULL COMMENT '选项答案',
  `do` varchar(255) NOT NULL COMMENT '选项答案',
  `answer` char(2) NOT NULL COMMENT '正确答案',
  `grade` tinyint(4) NOT NULL COMMENT '本题分数',
  `update_time` int(11) NOT NULL COMMENT '出题时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='题库表';

-- ----------------------------
-- Records of ox_topics
-- ----------------------------
INSERT INTO `onethink_topics` VALUES ('1', 'php', 'php中，不等运算符是?', '≠\r\n\r\n≠', '!==', '<>', '><', 'c', '25', '15454545');
INSERT INTO `onethink_topics` VALUES ('2', 'html', '标记符title是放在标记符什么之间的?', 'html与html', 'head与head', 'body与body', 'head与body', 'b', '25', '51454455');
INSERT INTO `onethink_topics` VALUES ('3', 'css', '级联样式表文件的扩展名是?', 'html', 'css', 'xml', 'dib', 'b', '25', '4545111');
INSERT INTO `onethink_topics` VALUES ('4', 'html', 'HTML语言中的转行标记是?', 'html', 'br', 'title', 'p', 'b', '25', '5454541');


 


-- ----------------------------
-- Table structure for `ox_testpaper`
-- ----------------------------
DROP TABLE IF EXISTS `onethink_testpaper`;
CREATE TABLE `onethink_testpaper` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '试卷名称',
  `score` int(11) NOT NULL COMMENT '总分',
  `add_time` int(11) NOT NULL COMMENT '添加时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0:禁用  1:启用',
  `view` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '浏览量',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='试卷表';

-- ----------------------------
-- Records of ox_testpaper
-- ----------------------------
INSERT INTO `onethink_testpaper` VALUES ('1', '试卷一号', '100', '1420367889', '1');
INSERT INTO `onethink_testpaper` VALUES ('2', '试卷二号', '75', '1420367908', '1');



-- ----------------------------
-- Table structure for `ox_testpaper_relevance`
-- ----------------------------
DROP TABLE IF EXISTS `onethink_testpaper_relevance`;
CREATE TABLE `onethink_testpaper_relevance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `testpaper_id` int(11) NOT NULL COMMENT '试卷id',
  `topic_id` int(11) NOT NULL COMMENT '题目id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='试卷题目关联表';

-- ----------------------------
-- Records of ox_testpaper_relevance
-- ----------------------------
INSERT INTO `onethink_testpaper_relevance` VALUES ('1', '1', '1');
INSERT INTO `onethink_testpaper_relevance` VALUES ('2', '1', '2');
INSERT INTO `onethink_testpaper_relevance` VALUES ('3', '1', '3');
INSERT INTO `onethink_testpaper_relevance` VALUES ('4', '1', '4');
INSERT INTO `onethink_testpaper_relevance` VALUES ('5', '2', '1');
INSERT INTO `onethink_testpaper_relevance` VALUES ('6', '2', '3');
INSERT INTO `onethink_testpaper_relevance` VALUES ('7', '2', '4');




-- ----------------------------
-- Table structure for `ox_test_history`
-- ----------------------------
DROP TABLE IF EXISTS `onethink_test_history`;
CREATE TABLE `onethink_test_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `testpaper_id` int(11) NOT NULL COMMENT '试卷id',
  `member_id` int(11) NOT NULL COMMENT '会员id',
  `grade` int(11) NOT NULL COMMENT '考试分数',
  `add_time` int(11) NOT NULL COMMENT '考试时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='考试记录表';

-- ----------------------------
-- Records of ox_test_history
-- ----------------------------
INSERT INTO `onethink_test_history` VALUES ('1', '1', '1', '100', '12121221');

CREATE TABLE IF NOT EXISTS `onethink_question` (
  `id` int(10) unsigned NOT NULL auto_increment COMMENT '题目ID',
  `type` varchar(64) NOT NULL default '' COMMENT '题目类型',
  `stem` text COMMENT '题干',
  `score` float(10,1) unsigned NOT NULL default '0.0' COMMENT '分数',
  `answer` text COMMENT '参考答案',
  `analysis` text COMMENT '解析',
  `metas` text COMMENT '题目元信息',
  `categoryId` int(10) unsigned NOT NULL default '0' COMMENT '类别',
  `difficulty` varchar(64) NOT NULL default 'normal' COMMENT '难度',
  `target` varchar(255) NOT NULL default '' COMMENT '从属于',
  `parentId` int(10) unsigned default '0' COMMENT '材料父ID',
  `subCount` int(10) unsigned NOT NULL default '0' COMMENT '子题数量',
  `finishedTimes` int(10) unsigned NOT NULL default '0' COMMENT '完成次数',
  `passedTimes` int(10) unsigned NOT NULL default '0' COMMENT '成功次数',
  `userId` int(10) unsigned NOT NULL default '0' COMMENT '用户id',
  `updatedTime` int(10) unsigned NOT NULL default '0' COMMENT '更新时间',
  `createdTime` int(10) unsigned NOT NULL default '0' COMMENT '创建时间',
  `status` tinyint(4) NOT NULL COMMENT '状态，-1：删除；0：禁用；1：启用；2：未审核',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='试题表' AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `onethink_testpaper` (
  `id` int(10) unsigned NOT NULL auto_increment COMMENT '试卷ID',
  `name` varchar(255) NOT NULL default '' COMMENT '试卷名称',
  `image` int(11) COMMENT '图片',
  `description` text COMMENT '试卷说明',
  `limitedTime` int(10) unsigned NOT NULL default '0' COMMENT '限时(单位：秒)',
  `pattern` varchar(255) NOT NULL default '' COMMENT '试卷生成/显示模式',
  `target` varchar(255) NOT NULL default '' COMMENT '试卷所属对象',
  `status` tinyint(4) NOT NULL COMMENT '状态，-1：删除；0：禁用；1：启用；2：未审核',
  `score` float(10,1) unsigned NOT NULL default '0.0' COMMENT '总分',
  `passedScore` float(10,1) unsigned NOT NULL default '0.0' COMMENT '通过考试的分数线',
  `itemCount` int(10) unsigned NOT NULL default '0' COMMENT '题目数量',
  `createdUserId` int(10) unsigned NOT NULL default '0' COMMENT '创建人',
  `createdTime` int(10) unsigned NOT NULL default '0' COMMENT '创建时间',
  `updatedUserId` int(10) unsigned NOT NULL default '0' COMMENT '修改人',
  `updatedTime` int(10) unsigned NOT NULL default '0' COMMENT '修改时间',
  `metas` text COMMENT '题型排序',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `onethink_testpaper_item` (
  `id` int(10) unsigned NOT NULL auto_increment COMMENT '试卷条目ID',
  `testId` int(10) unsigned NOT NULL default '0' COMMENT '所属试卷',
  `seq` int(10) unsigned NOT NULL default '0' COMMENT '题目顺序',
  `questionId` int(10) unsigned NOT NULL default '0' COMMENT '题目ID',
  `questionType` varchar(64) NOT NULL default '' COMMENT '题目类别',
  `parentId` int(10) unsigned NOT NULL default '0' COMMENT '父题ID',
  `score` float(10,1) unsigned NOT NULL default '0.0' COMMENT '分值',
  `missScore` float(10,1) unsigned NOT NULL default '0.0' COMMENT '漏选得分',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `onethink_testpaper_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(25) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `pid` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;