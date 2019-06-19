﻿# Host: localhost  (Version: 5.5.40)
# Date: 2018-09-20 14:49:00
# Generator: MySQL-Front 5.3  (Build 4.120)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "onethink_aboutus"
#

DROP TABLE IF EXISTS `onethink_aboutus`;
CREATE TABLE `onethink_aboutus` (
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
  `price` float(10,2) NOT NULL DEFAULT '0.00' COMMENT '价格',
  `sort` int(11) DEFAULT NULL COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='关于我们';

#
# Data for table "onethink_aboutus"
#

/*!40000 ALTER TABLE `onethink_aboutus` DISABLE KEYS */;
INSERT INTO `onethink_aboutus` VALUES (1,'公司简介',0,0,'<p class=\"foreword\" style=\"color:#333333;background-color:#FFFFFF;font-size:16px;font-family:PingHei, &quot;vertical-align:baseline;\">\r\n\t集创思在线教学系统是<span style=\"font-family:PingHei, &quot;vertical-align:baseline;color:#333333;font-size:16px;\">深圳</span><span>市</span><span style=\"font-family:PingHei, &quot;vertical-align:baseline;color:#333333;font-size:16px;\">明天见科技有限公司旗下网站（公司官网：http://www.mingtianjian.net）</span>，是一家专注于视频会议、视频教学、远程医疗系统研发的创新科技企业，我们从以往给客户定制开发的在线教学系统中，精选出一些核心功能，就形成了 蒲公英在线教学系统，希望从事在线教育的企业低成本创业、走一些弯路。\r\n</p>\r\n<br />\r\n<p class=\"foreword\" style=\"color:#333333;background-color:#FFFFFF;font-size:16px;font-family:PingHei, &quot;vertical-align:baseline;\">\r\n\t<span style=\"font-family:PingHei, &quot;vertical-align:baseline;color:#333333;font-size:16px;\"><span style=\"font-family:PingHei, &quot;vertical-align:baseline;font-size:16px;background-color:#FFFFFF;\">蒲公英在线教学系统</span></span>致力于打造人人易用的学习服务平台，通过更高效、更智能、更精准地匹配师生资源，为老师及学生提供多种增值服务和学习工具，全力创建一个专业、简单、智能、安全的高品质学习服务的第三方平台，让学习变得更加容易、平等和高效。\r\n</p>\r\n<br />\r\n<p class=\"foreword\" style=\"color:#333333;background-color:#FFFFFF;font-size:16px;font-family:PingHei, &quot;vertical-align:baseline;\">\r\n\t“科技让教育更美好”是<span style=\"font-family:PingHei, &quot;vertical-align:baseline;font-size:16px;background-color:#FFFFFF;\">蒲公英</span><span style=\"font-family:PingHei, &quot;vertical-align:baseline;color:#333333;font-size:16px;\">在线教学系统</span>的使命。我们会秉持“成就客户 诚信 务实 进取 合作”12字核心价值观，与您一起，共同学习，快速成长！\r\n</p>\r\n<p class=\"foreword\" style=\"color:#333333;background-color:#FFFFFF;font-size:16px;font-family:PingHei, &quot;vertical-align:baseline;\">\r\n\t<img src=\"/Uploads/Editor/2018-09-11/5b97e19bba950.jpg\" alt=\"\" /> \r\n</p>\r\n<p class=\"foreword\" style=\"color:#333333;background-color:#FFFFFF;font-size:16px;font-family:PingHei, &quot;vertical-align:baseline;\">\r\n\t<br />\r\n</p>\r\n<p class=\"foreword\" style=\"color:#333333;background-color:#FFFFFF;font-size:16px;font-family:PingHei, &quot;vertical-align:baseline;\">\r\n\t<br />\r\n</p>\r\n<p class=\"foreword\" style=\"color:#333333;background-color:#FFFFFF;font-size:16px;font-family:PingHei, &quot;vertical-align:baseline;\">\r\n\t<br />\r\n</p>',0,1536680716,1,1524128650,0,0,0.00,1),(2,'人才招聘',0,1,'<strong>java高级开发工程师(北京、武汉)</strong><br />\r\n&gt; 工作职责：<br />\r\n<br />\r\n负责公司相关产品基础架构平台设计研发工作<br />\r\n负责服务高可用性、高可扩展性方向的优化调整<br />\r\n&gt; 职位要求：<br />\r\n<br />\r\n计算机或相关专业本科以上学历，3年以上Java语言为主的大中型软件开发经验<br />\r\n数据结构和算法基础扎实，了解常用设计模式，熟悉J2EE相关编程，熟练使用Spring、Mybatis等<br />\r\n熟悉MySQL数据库设计和优化，有NoSQL 数据库使用经验者优先<br />\r\n对OOA\\OOD\\OOP等思想有深入的理解以及很强的应用能力，具有较强的业务需求分析能力<br />\r\n有Linux 环境开发经验者优先<br />\r\n有过大规模互联网系统架构设计经验者优先<br />\r\n熟悉Linux操作系统和Shell脚本编程<br />\r\n良好的沟通能力和团队协作精神，严谨的工作态度与高质量意识，良好的抗压能力<br />\r\n<br />\r\n<strong>Android高级开发工程师(北京、武汉)</strong><br />\r\n&gt; 工作职责：<br />\r\n<br />\r\n负责跟谁学Android端产品研发<br />\r\n负责产品架构的改进及性能优化<br />\r\n负责新技术的学习、研究和应用<br />\r\n参与产品的设计和改进<br />\r\n&gt; 职位要求：<br />\r\n<br />\r\n计算机或相关专业本科以上学历，3年以上Android系统开发经验<br />\r\n有扎实的Java语言基础，Android开发技能<br />\r\n熟悉PHP，JSP等server端开发技术；<br />\r\n精通多线程和网络编程，对高性能程序设计、架构有较多的工程经验<br />\r\n热爱互联网，对移动产品研发有浓厚兴趣<br />\r\n具备强烈的进取心和责任感, 极强的学习能力及良好的团队合作精神<br />\r\n具有较强逻辑思维能力和表达能力<br />\r\n<br />\r\n<strong>Ios高级开发工程师(北京、武汉)</strong><br />\r\n&gt; 工作职责：<br />\r\n<br />\r\n负责跟谁学iOS平台客户端产品的设计和研发<br />\r\n负责iOS平台客户端软件的开发和优化<br />\r\n研究新兴技术，满足产品需求<br />\r\n根据研发过程中的体验对产品提出建议<br />\r\n&gt; 职位要求：<br />\r\n<br />\r\n计算机或相关专业本科以上学历，3年以上iOS平台研发经验<br />\r\n有扎实的Object C/SWIFT语言基础<br />\r\n熟悉iOS开发技术，包括UI、网络、安全等方面<br />\r\n熟悉iOS开发工具和相关开发测试工具的使用<br />\r\n熟悉各个不同版本iOS特点<br />\r\n对移动产品有浓厚兴趣，对移动产品有较好的个人理解有强烈的上进心和求知欲，善于学习新事物，对技术充满激情<br />\r\n具有良好的分析问题和解决问题的能力，勇于面对挑战性问题<br />\r\n学习能力强，有创造性思维能力<br />\r\n善于沟通，具备较强的团队协作意识和能力<br />\r\n<br />\r\n<strong>web前端开发工程师(北京、武汉)</strong><br />\r\n&gt; 工作职责：<br />\r\n<br />\r\n依据产品需求完成Web前端开发和优化，维护等工作<br />\r\n参与前端架构建设，做技术决策；<br />\r\n学习、理解业务，持续优化前端系统的体验、性能<br />\r\n&gt; 职位要求：<br />\r\n<br />\r\n计算机以相关专业本科以上学历，3年以上js开发经验<br />\r\n掌握良好的前端技能，包括XHTML/XML/CSS/JavaScript，熟悉W3C网页标准、了解WEB标准化、性能优化方法，了解可用性、可访问性和安全性。精通 HTML、CSS、JavaScript、Ajax等页面技术<br />\r\n熟悉掌握一种常见JS框架，如Jquery，YUI，ExtJS等，并有一定的前端框架设计能力<br />\r\n有大型门户网站、商城、论坛、社区制作经验<br />\r\n熟悉各种Web客户端，尤其是主流Web浏览器的开发模式和特性<br />\r\n熟练使用html5、css3，熟悉canvas、smarty3<br />\r\n了解前端前沿技术( 如 less、Node.js 等 )，对前端性能优化有一定了解<br />\r\n熟悉手机端HTML5页面开发者优先<br />\r\n有一定架构能力和算法能力,有良好编码规范<br />\r\n良好的学习能力、沟通能力,追求完美,有工作激情,能在较大强度下工作<br />\r\n热爱前端，热爱设计，对新鲜事物充满好奇心，有折腾的想法和精力，喜欢捣鼓各种互联网应用<br />\r\n自我管理能力强良好，崇尚团队合作，快速的学习能力，乐于分享与沟通<br />\r\n<br />\r\n<strong>测试工程师(北京、武汉)</strong><br />\r\n&gt; 工作职责：<br />\r\n<br />\r\n依据需求文档及设计文档，编写测试用例<br />\r\n完成产品的集成测试与系统测试；<br />\r\n依据测试用例执行手工测试，反馈跟踪产品BUG及用例缺陷<br />\r\n测试工具/系统的研究和应用<br />\r\n&gt; 职位要求：<br />\r\n<br />\r\n计算机及相关专业专科以上学历，1年以上测试工作经验<br />\r\n掌握基本的软件测试理论，熟悉软件测试的基本方法、流程和规范<br />\r\n熟练运用各种黑盒测试用例设计方法<br />\r\n熟悉bugzilla等测试管理工具<br />\r\n能够熟练使用loadrunner进行压力测试者优先<br />\r\n具备互联网教育软件测试经验者优先<br />\r\n<br />\r\n运维工程师(北京)<br />\r\n&gt; 工作职责：<br />\r\n<br />\r\n负责集团公司核心平台的业务稳定性，保证服务质量<br />\r\n负责系统监控、上线管理、系统运维、故障处理<br />\r\n运维自动化的实施和改进<br />\r\nPHP、JAVA、C等生产自动环境发布系统的构建与维护<br />\r\n编写系统运维手册、部署文档、性能参数说明、故障报告、操作日志等技术文档<br />\r\n工作认真负责，有团队精神，服务于公司战略目标；<br />\r\n乐于开源软件的学习和研究，乐于分享<br />\r\n&gt; 职位要求：<br />\r\n<br />\r\n3年及以上工作经验，本科及以上学历<br />\r\n三年以上Linux系统运维经验<br />\r\n熟悉LNMP、redis、Lvs、iptables、vpn、nginx、tomcat<br />\r\n熟悉shell、php、python<br />\r\n熟悉监控技术snmp协议，zabbix等监控报警工具<br />\r\n熟悉虚拟化kvm等技术<br />\r\n熟悉saltstack、ansible等自动化部署工作<br />\r\n熟悉阿里云、亚马逊等主流云计算平台的操作与维护<br />\r\n熟悉jenkins、git/svn等代码管理持续集成工具<br />\r\n<br />\r\nIT工程师(北京)<br />\r\n&gt; 工作职责：<br />\r\n<br />\r\n负责处理电脑的日常各种问题，包括硬件故障、软件、电子邮件、网络、和附属设备等，并在需要时可以进行基本的维修<br />\r\n负责计算机软硬件的安装、配置、测试和升级<br />\r\n协助部门内其他同事完成相关工作<br />\r\n&gt; 职位要求：<br />\r\n<br />\r\n本科以上学历，计算机相关专业，1年以上工作经验<br />\r\n熟悉Windows XP, Microsoft Office 等常用软件。具有基本的网络相关知识<br />\r\n安装和配置计算机、显示器、网络设施、和电脑附属硬件等设备的能力<br />\r\n具有良好的计算机系统硬件、软件、电子邮件、网络、和相关设备的问题解决能力<br />\r\n具有良好的服务意识和沟通能力，具有良好的团队合作和人际沟通技巧<br />\r\n<p>\r\n\t具有CCNA、MSCE、MCDST认证者优先考虑\r\n</p>\r\n<p>\r\n\t<br />\r\n</p>\r\n<p>\r\n\t<br />\r\n</p>\r\n<p>\r\n\t<br />\r\n</p>',0,1525682055,1,1524128663,0,0,0.00,3),(4,'联系我们',0,1,'<span style=\"color:#333333;font-family:Arial, 宋体;background-color:#FFFFFF;\">深圳市明天见科技有限公司</span><br />\r\n<span style=\"color:#333333;font-family:Arial, 宋体;background-color:#FFFFFF;\">地址：深圳市 罗湖区 福田区 红荔路 银盛大厦 401室</span><br />\r\n<span style=\"color:#333333;font-family:Arial, 宋体;background-color:#FFFFFF;\">电话：0755-89582163</span><br />\r\n<span style=\"color:#333333;font-family:Arial, 宋体;background-color:#FFFFFF;\">QQ：3065117809</span><br />\r\n<span style=\"color:#333333;font-family:Arial, 宋体;background-color:#FFFFFF;\">E-mail:3065117809@qq.com</span><br />\r\n<p>\r\n\t<span style=\"color:#333333;font-family:Arial, 宋体;background-color:#FFFFFF;\">非工作时间咨询电话：134-1878-0533</span>\r\n</p>\r\n<p>\r\n\t<br />\r\n</p>\r\n<p>\r\n\t<img src=\"/Uploads/Editor/2018-05-12/5af6e71dbc83c.jpg\" alt=\"\" />\r\n</p>',0,1526130482,1,1524131075,0,0,0.00,4),(7,'公司荣誉',0,0,'<img src=\"/Uploads/Editor/2018-08-27/5b83d61e1efd0.jpg\" alt=\"\" />',0,1535366702,1,1532082437,0,0,0.00,2);
/*!40000 ALTER TABLE `onethink_aboutus` ENABLE KEYS */;

#
# Structure for table "onethink_aboutus_category"
#

DROP TABLE IF EXISTS `onethink_aboutus_category`;
CREATE TABLE `onethink_aboutus_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(25) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `pid` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

#
# Data for table "onethink_aboutus_category"
#

/*!40000 ALTER TABLE `onethink_aboutus_category` DISABLE KEYS */;
INSERT INTO `onethink_aboutus_category` VALUES (1,'公司简介',1524130181,1524130162,1,0,0);
/*!40000 ALTER TABLE `onethink_aboutus_category` ENABLE KEYS */;

#
# Structure for table "onethink_action"
#

DROP TABLE IF EXISTS `onethink_action`;
CREATE TABLE `onethink_action` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` char(30) NOT NULL DEFAULT '' COMMENT '行为唯一标识',
  `title` char(80) NOT NULL DEFAULT '' COMMENT '行为说明',
  `remark` char(140) NOT NULL DEFAULT '' COMMENT '行为描述',
  `rule` text NOT NULL COMMENT '行为规则',
  `log` text NOT NULL COMMENT '日志规则',
  `type` tinyint(2) unsigned NOT NULL DEFAULT '1' COMMENT '类型',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='系统行为表';

#
# Data for table "onethink_action"
#

/*!40000 ALTER TABLE `onethink_action` DISABLE KEYS */;
INSERT INTO `onethink_action` VALUES (1,'user_login','用户登录','积分+10，每天一次','table:member|field:score|condition:uid={$self} AND status>-1|rule:score+10|cycle:24|max:1;','[user|get_nickname]在[time|time_format]登录了后台',1,1,1387181220),(2,'add_article','发布文章','积分+5，每天上限5次','table:member|field:score|condition:uid={$self}|rule:score+5|cycle:24|max:5','',2,0,1380173180),(3,'review','评论','评论积分+1，无限制','table:member|field:score|condition:uid={$self}|rule:score+1','',2,1,1383285646),(4,'add_document','发表文档','积分+10，每天上限5次','table:member|field:score|condition:uid={$self}|rule:score+10|cycle:24|max:5','[user|get_nickname]在[time|time_format]发表了一篇文章。\r\n表[model]，记录编号[record]。',2,0,1386139726),(5,'add_document_topic','发表讨论','积分+5，每天上限10次','table:member|field:score|condition:uid={$self}|rule:score+5|cycle:24|max:10','',2,0,1383285551),(6,'update_config','更新配置','新增或修改或删除配置','','',1,1,1383294988),(7,'update_model','更新模型','新增或修改模型','','',1,1,1383295057),(8,'update_attribute','更新属性','新增或更新或删除属性','','',1,1,1383295963),(9,'update_channel','更新导航','新增或修改或删除导航','','',1,1,1383296301),(10,'update_menu','更新菜单','新增或修改或删除菜单','','',1,1,1383296392),(11,'update_category','更新分类','新增或修改或删除分类','','',1,1,1383296765);
/*!40000 ALTER TABLE `onethink_action` ENABLE KEYS */;

#
# Structure for table "onethink_action_log"
#

DROP TABLE IF EXISTS `onethink_action_log`;
CREATE TABLE `onethink_action_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `action_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '行为id',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '执行用户id',
  `action_ip` bigint(20) NOT NULL COMMENT '执行行为者ip',
  `model` varchar(50) NOT NULL DEFAULT '' COMMENT '触发行为的表',
  `record_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '触发行为的数据id',
  `remark` varchar(255) NOT NULL DEFAULT '' COMMENT '日志备注',
  `status` tinyint(2) NOT NULL DEFAULT '1' COMMENT '状态',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '执行行为的时间',
  PRIMARY KEY (`id`),
  KEY `action_ip_ix` (`action_ip`),
  KEY `action_id_ix` (`action_id`),
  KEY `user_id_ix` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=977 DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED COMMENT='行为日志表';

#
# Data for table "onethink_action_log"
#

/*!40000 ALTER TABLE `onethink_action_log` DISABLE KEYS */;
INSERT INTO `onethink_action_log` VALUES (761,10,1,2032684708,'Menu',68,'操作url：/index.php?s=/Admin/Menu/edit.html',1,1535039007),(762,1,2,1032670198,'member',2,'韩老师在2018-08-24 09:15登录了后台',1,1535073359),(763,1,1,2032684708,'member',1,'admin在2018-08-24 09:31登录了后台',1,1535074309),(764,1,1,2032684708,'member',1,'admin在2018-08-24 13:16登录了后台',1,1535087818),(765,1,2,2032684708,'member',2,'韩老师在2018-08-24 13:17登录了后台',1,1535087842),(766,1,1,2032684708,'member',1,'admin在2018-08-24 13:20登录了后台',1,1535088031),(767,1,2,2032684708,'member',2,'韩老师在2018-08-24 13:25登录了后台',1,1535088349),(768,1,2,2032684708,'member',2,'韩老师在2018-08-24 13:35登录了后台',1,1535088911),(769,1,2,1032670198,'member',2,'韩老师在2018-08-24 13:52登录了后台',1,1535089938),(770,1,2,1032670198,'member',2,'韩老师在2018-08-24 15:31登录了后台',1,1535095881),(771,1,2,2032684708,'member',2,'韩老师在2018-08-24 16:08登录了后台',1,1535098093),(772,1,17,2032684708,'member',17,'用户1在2018-08-24 17:24登录了后台',1,1535102692),(773,1,1,1032670198,'member',1,'admin在2018-08-24 17:39登录了后台',1,1535103541),(774,6,1,1032670198,'config',25,'操作url：/index.php?s=/Admin/Config/edit.html',1,1535103758),(775,1,3,1032670198,'member',3,'黄老师在2018-08-24 17:49登录了后台',1,1535104162),(776,1,7,1032670198,'member',7,'戴老师在2018-08-24 17:52登录了后台',1,1535104352),(777,1,2,1032670198,'member',2,'韩老师在2018-08-24 18:53登录了后台',1,1535107989),(778,1,1,1032670198,'member',1,'admin在2018-08-24 18:54登录了后台',1,1535108047),(779,10,1,1032670198,'Menu',187,'操作url：/index.php?s=/Admin/Menu/edit.html',1,1535108220),(780,10,1,1032670198,'Menu',277,'操作url：/index.php?s=/Admin/Menu/add.html',1,1535108345),(781,10,1,1032670198,'Menu',277,'操作url：/index.php?s=/Admin/Menu/edit.html',1,1535108359),(782,10,1,1032670198,'Menu',278,'操作url：/index.php?s=/Admin/Menu/add.html',1,1535108399),(783,1,2,1032670198,'member',2,'韩老师在2018-08-24 19:01登录了后台',1,1535108462),(784,1,2,1032670198,'member',2,'韩老师在2018-08-25 13:09登录了后台',1,1535173786),(785,1,1,1032670198,'member',1,'admin在2018-08-25 13:10登录了后台',1,1535173819),(786,1,1,1032670198,'member',1,'admin在2018-08-25 14:07登录了后台',1,1535177267),(787,10,1,1032670198,'Menu',279,'操作url：/index.php?s=/Admin/Menu/add.html',1,1535177331),(788,1,2,1032670198,'member',2,'韩老师在2018-08-25 14:09登录了后台',1,1535177348),(789,10,1,1032670198,'Menu',279,'操作url：/index.php?s=/Admin/Menu/edit.html',1,1535177428),(790,1,2,1032670198,'member',2,'韩老师在2018-08-25 14:11登录了后台',1,1535177466),(791,10,1,1032670198,'Menu',280,'操作url：/index.php?s=/Admin/Menu/add.html',1,1535177528),(792,10,1,1032670198,'Menu',280,'操作url：/index.php?s=/Admin/Menu/edit.html',1,1535177542),(793,10,1,1032670198,'Menu',281,'操作url：/index.php?s=/Admin/Menu/add.html',1,1535177587),(794,10,1,1032670198,'Menu',282,'操作url：/index.php?s=/Admin/Menu/add.html',1,1535178137),(795,10,1,1032670198,'Menu',283,'操作url：/index.php?s=/Admin/Menu/add.html',1,1535178179),(796,10,1,1032670198,'Menu',284,'操作url：/index.php?s=/Admin/Menu/add.html',1,1535178208),(797,10,1,1032670198,'Menu',285,'操作url：/index.php?s=/Admin/Menu/add.html',1,1535178234),(798,10,1,1032670198,'Menu',286,'操作url：/index.php?s=/Admin/Menu/add.html',1,1535178261),(799,10,1,1032670198,'Menu',287,'操作url：/index.php?s=/Admin/Menu/add.html',1,1535178286),(800,10,1,1032670198,'Menu',288,'操作url：/index.php?s=/Admin/Menu/add.html',1,1535178327),(801,10,1,1032670198,'Menu',289,'操作url：/index.php?s=/Admin/Menu/add.html',1,1535178365),(802,10,1,1032670198,'Menu',290,'操作url：/index.php?s=/Admin/Menu/add.html',1,1535178406),(803,10,1,1032670198,'Menu',291,'操作url：/index.php?s=/Admin/Menu/add.html',1,1535178460),(804,10,1,1032670198,'Menu',282,'操作url：/index.php?s=/Admin/Menu/edit.html',1,1535178544),(805,10,1,1032670198,'Menu',283,'操作url：/index.php?s=/Admin/Menu/edit.html',1,1535178575),(806,10,1,1032670198,'Menu',284,'操作url：/index.php?s=/Admin/Menu/edit.html',1,1535178666),(807,10,1,1032670198,'Menu',285,'操作url：/index.php?s=/Admin/Menu/edit.html',1,1535178702),(808,10,1,1032670198,'Menu',286,'操作url：/index.php?s=/Admin/Menu/edit.html',1,1535178712),(809,10,1,1032670198,'Menu',287,'操作url：/index.php?s=/Admin/Menu/edit.html',1,1535178723),(810,10,1,1032670198,'Menu',288,'操作url：/index.php?s=/Admin/Menu/edit.html',1,1535178735),(811,10,1,1032670198,'Menu',289,'操作url：/index.php?s=/Admin/Menu/edit.html',1,1535178745),(812,10,1,1032670198,'Menu',290,'操作url：/index.php?s=/Admin/Menu/edit.html',1,1535178755),(813,10,1,1032670198,'Menu',291,'操作url：/index.php?s=/Admin/Menu/edit.html',1,1535178767),(814,1,2,1032670198,'member',2,'韩老师在2018-08-25 14:33登录了后台',1,1535178800),(815,10,1,1032670198,'Menu',285,'操作url：/index.php?s=/Admin/Menu/edit.html',1,1535178854),(816,10,1,1032670198,'Menu',218,'操作url：/index.php?s=/Admin/Menu/edit.html',1,1535178870),(817,10,1,1032670198,'Menu',218,'操作url：/index.php?s=/Admin/Menu/edit.html',1,1535178876),(818,10,1,1032670198,'Menu',219,'操作url：/index.php?s=/Admin/Menu/edit.html',1,1535178882),(819,10,1,1032670198,'Menu',219,'操作url：/index.php?s=/Admin/Menu/edit.html',1,1535178890),(820,1,2,1032670198,'member',2,'韩老师在2018-08-25 14:35登录了后台',1,1535178924),(821,1,2,1032670198,'member',2,'韩老师在2018-08-25 16:15登录了后台',1,1535184948),(822,1,1,1032670198,'member',1,'admin在2018-08-25 16:27登录了后台',1,1535185647),(823,10,1,1032670198,'Menu',292,'操作url：/index.php?s=/Admin/Menu/add.html',1,1535185736),(824,1,2,1032670198,'member',2,'韩老师在2018-08-25 16:29登录了后台',1,1535185769),(825,1,1,2032684708,'member',1,'admin在2018-08-25 18:10登录了后台',1,1535191825),(826,1,2,1032670198,'member',2,'韩老师在2018-08-25 19:00登录了后台',1,1535194803),(827,10,1,2032684708,'Menu',214,'操作url：/index.php?s=/Admin/Menu/edit.html',1,1535194891),(828,1,3,1032670198,'member',3,'黄老师在2018-08-25 20:12登录了后台',1,1535199122),(829,1,2,-1223923983,'member',2,'韩老师在2018-08-25 21:31登录了后台',1,1535203874),(830,1,2,-1223923983,'member',2,'韩老师在2018-08-25 21:31登录了后台',1,1535203888),(831,1,1,-1223923983,'member',1,'admin在2018-08-25 21:34登录了后台',1,1535204053),(832,1,2,-1223923983,'member',2,'韩老师在2018-08-25 21:34登录了后台',1,1535204091),(833,1,1,2032684708,'member',1,'admin在2018-08-26 18:18登录了后台',1,1535278716),(834,1,2,2032684708,'member',2,'韩老师在2018-08-26 20:42登录了后台',1,1535287348),(835,1,1,-1223923983,'member',1,'admin在2018-08-27 18:39登录了后台',1,1535366354),(836,1,2,2032684708,'member',2,'韩老师在2018-08-28 13:16登录了后台',1,1535433403),(837,1,2,2032684708,'member',2,'韩老师在2018-08-28 13:17登录了后台',1,1535433421),(838,1,1,1901732278,'member',1,'admin在2018-08-28 13:18登录了后台',1,1535433483),(839,10,1,1901732278,'Menu',293,'操作url：/index.php?s=/Admin/Menu/add.html',1,1535433604),(840,1,2,2032684708,'member',2,'韩老师在2018-08-28 13:21登录了后台',1,1535433682),(841,1,1,1901732278,'member',1,'admin在2018-08-28 18:26登录了后台',1,1535451969),(842,1,2,2032684708,'member',2,'韩老师在2018-08-28 18:46登录了后台',1,1535453186),(843,1,1,1901732278,'member',1,'admin在2018-08-28 21:39登录了后台',1,1535463543),(844,1,17,1901732278,'member',17,'用户1在2018-08-28 22:04登录了后台',1,1535465056),(845,1,1,2032684708,'member',1,'admin在2018-08-28 22:23登录了后台',1,1535466213),(846,1,1,1032669926,'member',1,'admin在2018-08-29 23:02登录了后台',1,1535554943),(847,1,17,1032669926,'member',17,'用户1在2018-08-29 23:03登录了后台',1,1535555010),(848,1,17,1032669926,'member',17,'用户1在2018-08-29 23:03登录了后台',1,1535555035),(849,1,1,1032669926,'member',1,'admin在2018-08-29 23:04登录了后台',1,1535555062),(850,1,17,1032669926,'member',17,'用户1在2018-08-30 14:38登录了后台',1,1535611093),(851,1,1,1032669926,'member',1,'admin在2018-08-30 14:43登录了后台',1,1535611402),(852,1,17,1032669926,'member',17,'用户1在2018-08-30 18:34登录了后台',1,1535625284),(853,1,1,1032669926,'member',1,'admin在2018-08-30 18:37登录了后台',1,1535625443),(854,1,2,1032669926,'member',2,'韩老师在2018-08-30 19:00登录了后台',1,1535626828),(855,1,17,1032669926,'member',17,'用户1在2018-08-30 19:18登录了后台',1,1535627919),(856,1,2,1032669926,'member',2,'韩老师在2018-08-30 19:23登录了后台',1,1535628222),(857,1,1,1032669926,'member',1,'admin在2018-08-30 19:27登录了后台',1,1535628474),(858,1,17,1032669926,'member',17,'用户1在2018-08-30 22:16登录了后台',1,1535638582),(859,1,17,1032669926,'member',17,'用户1在2018-08-30 22:16登录了后台',1,1535638590),(860,1,1,1032669926,'member',1,'admin在2018-08-30 23:49登录了后台',1,1535644199),(861,1,17,1032669926,'member',17,'用户1在2018-08-31 13:42登录了后台',1,1535694169),(862,1,17,1032669926,'member',17,'用户1在2018-08-31 17:58登录了后台',1,1535709521),(863,1,1,1032670192,'member',1,'admin在2018-08-31 22:31登录了后台',1,1535725896),(864,1,17,1032670192,'member',17,'用户1在2018-08-31 23:56登录了后台',1,1535730973),(865,1,1,1032670192,'member',1,'admin在2018-09-01 10:48登录了后台',1,1535770097),(866,1,17,1032670192,'member',17,'用户1在2018-09-01 14:53登录了后台',1,1535784800),(867,1,17,1032670192,'member',17,'用户1在2018-09-01 22:39登录了后台',1,1535812787),(868,1,17,1032670192,'member',17,'用户1在2018-09-01 22:43登录了后台',1,1535813001),(869,1,17,1032670192,'member',17,'用户1在2018-09-01 23:10登录了后台',1,1535814634),(870,1,17,1032670192,'member',17,'用户1在2018-09-01 23:24登录了后台',1,1535815479),(871,1,17,1032670192,'member',17,'用户1在2018-09-01 23:36登录了后台',1,1535816175),(872,1,1,1032670192,'member',1,'admin在2018-09-01 23:37登录了后台',1,1535816262),(873,1,17,1032670192,'member',17,'用户1在2018-09-01 23:38登录了后台',1,1535816318),(874,1,1,2032684708,'member',1,'admin在2018-09-01 23:53登录了后台',1,1535817193),(875,1,17,1032670192,'member',17,'用户1在2018-09-02 00:00登录了后台',1,1535817639),(876,1,17,1032670192,'member',17,'用户1在2018-09-02 00:14登录了后台',1,1535818449),(877,1,17,1032670192,'member',17,'用户1在2018-09-02 00:34登录了后台',1,1535819687),(878,1,17,1032670192,'member',17,'用户1在2018-09-02 00:38登录了后台',1,1535819905),(879,1,17,1032670192,'member',17,'用户1在2018-09-02 00:45登录了后台',1,1535820340),(880,1,1,1032670192,'member',1,'admin在2018-09-02 01:22登录了后台',1,1535822547),(881,1,17,1032670192,'member',17,'用户1在2018-09-02 10:04登录了后台',1,1535853851),(882,1,17,-612000739,'member',17,'用户1在2018-09-02 19:21登录了后台',1,1535887282),(883,1,17,-612000739,'member',17,'用户1在2018-09-02 21:16登录了后台',1,1535894195),(884,1,17,-612000739,'member',17,'用户1在2018-09-02 21:17登录了后台',1,1535894239),(885,1,1,-612000739,'member',1,'admin在2018-09-02 21:20登录了后台',1,1535894403),(886,1,1,2032684708,'member',1,'admin在2018-09-03 10:57登录了后台',1,1535943443),(887,1,17,1032669781,'member',17,'用户1在2018-09-04 23:56登录了后台',1,1536076577),(888,1,17,-1223997094,'member',17,'用户1在2018-09-06 23:20登录了后台',1,1536247202),(889,1,17,-1223997094,'member',17,'用户1在2018-09-06 23:32登录了后台',1,1536247971),(890,1,17,-1223997094,'member',17,'用户1在2018-09-06 23:39登录了后台',1,1536248378),(891,1,17,-1223997094,'member',17,'用户1在2018-09-06 23:58登录了后台',1,1536249503),(892,1,17,-1223997094,'member',17,'用户1在2018-09-07 00:04登录了后台',1,1536249854),(893,1,17,-1223997094,'member',17,'用户1在2018-09-07 11:38登录了后台',1,1536291510),(894,1,17,-1223997094,'member',17,'用户1在2018-09-07 11:43登录了后台',1,1536291782),(895,1,17,-1223997094,'member',17,'用户1在2018-09-07 11:53登录了后台',1,1536292413),(896,1,17,-1223997094,'member',17,'用户1在2018-09-07 12:03登录了后台',1,1536292989),(897,1,1,-1223997094,'member',1,'admin在2018-09-07 14:55登录了后台',1,1536303319),(898,1,17,-1223997094,'member',17,'用户1在2018-09-07 21:35登录了后台',1,1536327335),(899,1,1,-1223997094,'member',1,'admin在2018-09-07 21:40登录了后台',1,1536327630),(900,1,17,-1223997094,'member',17,'用户1在2018-09-07 22:15登录了后台',1,1536329740),(901,1,17,-1223997094,'member',17,'用户1在2018-09-07 22:17登录了后台',1,1536329827),(902,1,17,-1223997094,'member',17,'用户1在2018-09-07 22:18登录了后台',1,1536329931),(903,1,17,-1223997094,'member',17,'用户1在2018-09-07 22:32登录了后台',1,1536330770),(904,1,1,-1223997094,'member',1,'admin在2018-09-08 14:32登录了后台',1,1536388358),(905,1,17,-1223997094,'member',17,'用户1在2018-09-08 14:57登录了后台',1,1536389836),(906,1,1,-1223997094,'member',1,'admin在2018-09-08 18:12登录了后台',1,1536401529),(907,1,17,1032669999,'member',17,'用户1在2018-09-08 19:01登录了后台',1,1536404469),(908,1,17,1032669999,'member',17,'用户1在2018-09-08 19:08登录了后台',1,1536404891),(909,1,17,1032669999,'member',17,'用户1在2018-09-08 20:04登录了后台',1,1536408243),(910,1,1,-1223923792,'member',1,'admin在2018-09-10 10:19登录了后台',1,1536545989),(911,1,17,-1223923792,'member',17,'用户1在2018-09-10 22:05登录了后台',1,1536588352),(912,1,2,-1223923792,'member',2,'韩老师在2018-09-10 23:29登录了后台',1,1536593384),(913,1,17,-1223923792,'member',17,'用户1在2018-09-10 23:44登录了后台',1,1536594261),(914,1,1,-1223923792,'member',1,'admin在2018-09-10 23:45登录了后台',1,1536594335),(915,1,1,-1223923792,'member',1,'admin在2018-09-11 09:26登录了后台',1,1536629211),(916,1,1,-1223923792,'member',1,'admin在2018-09-11 13:53登录了后台',1,1536645197),(917,1,17,-612000571,'member',17,'用户1在2018-09-11 19:17登录了后台',1,1536664635),(918,1,1,-612000571,'member',1,'admin在2018-09-11 23:38登录了后台',1,1536680299),(919,1,17,793459905,'member',17,'用户1在2018-09-13 17:41登录了后台',1,1536831662),(920,1,17,793459905,'member',17,'用户1在2018-09-13 17:42登录了后台',1,1536831745),(921,1,17,793459905,'member',17,'用户1在2018-09-13 17:44登录了后台',1,1536831868),(922,1,17,793459905,'member',17,'用户1在2018-09-13 17:45登录了后台',1,1536831900),(923,1,2,793459905,'member',2,'韩老师在2018-09-13 17:45登录了后台',1,1536831915),(924,1,2,793459905,'member',2,'韩老师在2018-09-13 17:54登录了后台',1,1536832461),(925,1,17,-1223924016,'member',17,'用户1在2018-09-13 18:04登录了后台',1,1536833091),(926,1,17,-1223924016,'member',17,'用户1在2018-09-13 18:05登录了后台',1,1536833101),(927,1,2,-1223924016,'member',2,'韩老师在2018-09-13 18:55登录了后台',1,1536836134),(928,1,2,-1223924016,'member',2,'韩老师在2018-09-13 18:59登录了后台',1,1536836346),(929,1,2,-1223924016,'member',2,'韩老师在2018-09-13 19:08登录了后台',1,1536836882),(930,1,2,-1223924016,'member',2,'韩老师在2018-09-13 21:54登录了后台',1,1536846871),(931,1,2,-1223924016,'member',2,'韩老师在2018-09-13 21:57登录了后台',1,1536847079),(932,1,2,-1223924016,'member',2,'韩老师在2018-09-13 22:02登录了后台',1,1536847344),(933,1,2,-1223924016,'member',2,'韩老师在2018-09-13 22:07登录了后台',1,1536847648),(934,1,2,-1223924016,'member',2,'韩老师在2018-09-13 22:12登录了后台',1,1536847947),(935,1,2,-1223924016,'member',2,'韩老师在2018-09-13 22:23登录了后台',1,1536848633),(936,1,2,-1223924016,'member',2,'韩老师在2018-09-13 22:26登录了后台',1,1536848780),(937,1,2,-1223924016,'member',2,'韩老师在2018-09-13 22:27登录了后台',1,1536848847),(938,1,2,-1223924016,'member',2,'韩老师在2018-09-13 22:29登录了后台',1,1536848976),(939,1,2,-1223924016,'member',2,'韩老师在2018-09-14 10:25登录了后台',1,1536891956),(940,1,2,-1223924016,'member',2,'韩老师在2018-09-14 10:34登录了后台',1,1536892465),(941,1,2,-1223924016,'member',2,'韩老师在2018-09-14 10:36登录了后台',1,1536892566),(942,1,2,-1223924016,'member',2,'韩老师在2018-09-14 10:43登录了后台',1,1536892989),(943,1,2,-1223924016,'member',2,'韩老师在2018-09-14 10:46登录了后台',1,1536893170),(944,1,2,-1223924016,'member',2,'韩老师在2018-09-14 10:48登录了后台',1,1536893325),(945,1,2,-1223924016,'member',2,'韩老师在2018-09-14 10:50登录了后台',1,1536893445),(946,1,1,-1223924016,'member',1,'admin在2018-09-14 10:51登录了后台',1,1536893515),(947,1,2,-1223924016,'member',2,'韩老师在2018-09-14 11:43登录了后台',1,1536896592),(948,1,2,-1223924016,'member',2,'韩老师在2018-09-14 11:51登录了后台',1,1536897090),(949,1,2,-1223924016,'member',2,'韩老师在2018-09-14 13:25登录了后台',1,1536902724),(950,1,2,-1223924016,'member',2,'韩老师在2018-09-14 13:29登录了后台',1,1536902966),(951,1,2,-1223924016,'member',2,'韩老师在2018-09-14 23:44登录了后台',1,1536939852),(952,1,2,-1223924016,'member',2,'韩老师在2018-09-14 23:50登录了后台',1,1536940237),(953,1,2,-1223924016,'member',2,'韩老师在2018-09-14 23:52登录了后台',1,1536940327),(954,1,1,-1223924016,'member',1,'admin在2018-09-15 09:29登录了后台',1,1536974956),(955,1,2,-1223924016,'member',2,'韩老师在2018-09-15 09:29登录了后台',1,1536974999),(956,1,2,-1223924016,'member',2,'韩老师在2018-09-15 10:26登录了后台',1,1536978416),(957,1,1,-1223997382,'member',1,'admin在2018-09-15 21:52登录了后台',1,1537019577),(958,1,2,-1223997382,'member',2,'韩老师在2018-09-15 21:53登录了后台',1,1537019602),(959,1,17,-1223997382,'member',17,'用户1在2018-09-15 23:15登录了后台',1,1537024527),(960,1,1,-1223997382,'member',1,'admin在2018-09-15 23:16登录了后台',1,1537024574),(961,1,2,-1223997382,'member',2,'韩老师在2018-09-16 12:54登录了后台',1,1537073664),(962,1,2,1032669985,'member',2,'韩老师在2018-09-16 18:24登录了后台',1,1537093471),(963,1,2,1032669985,'member',2,'韩老师在2018-09-16 18:28登录了后台',1,1537093726),(964,1,1,1032669985,'member',1,'admin在2018-09-16 18:30登录了后台',1,1537093824),(965,1,2,1032669985,'member',2,'韩老师在2018-09-16 18:41登录了后台',1,1537094493),(966,1,2,1032669985,'member',2,'韩老师在2018-09-16 18:44登录了后台',1,1537094646),(967,1,2,1032669985,'member',2,'韩老师在2018-09-16 18:53登录了后台',1,1537095209),(968,1,2,1032669985,'member',2,'韩老师在2018-09-16 18:54登录了后台',1,1537095290),(969,1,2,1032669985,'member',2,'韩老师在2018-09-16 18:58登录了后台',1,1537095499),(970,1,2,1032669985,'member',2,'韩老师在2018-09-16 19:09登录了后台',1,1537096184),(971,1,2,1032669985,'member',2,'韩老师在2018-09-16 19:22登录了后台',1,1537096972),(972,1,2,1032669985,'member',2,'韩老师在2018-09-16 20:56登录了后台',1,1537102587),(973,1,1,1901732222,'member',1,'admin在2018-09-18 17:54登录了后台',1,1537264448),(974,1,1,-612000336,'member',1,'admin在2018-09-20 14:46登录了后台',1,1537426015),(975,10,1,-612000336,'Menu',294,'操作url：/index.php?s=/Admin/Menu/add.html',1,1537426051),(976,10,1,-612000336,'Menu',295,'操作url：/index.php?s=/Admin/Menu/add.html',1,1537426068);
/*!40000 ALTER TABLE `onethink_action_log` ENABLE KEYS */;

#
# Structure for table "onethink_addons"
#

DROP TABLE IF EXISTS `onethink_addons`;
CREATE TABLE `onethink_addons` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(40) NOT NULL COMMENT '插件名或标识',
  `title` varchar(20) NOT NULL DEFAULT '' COMMENT '中文名',
  `description` text COMMENT '插件描述',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态',
  `config` text COMMENT '配置',
  `author` varchar(40) DEFAULT '' COMMENT '作者',
  `version` varchar(20) DEFAULT '' COMMENT '版本号',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '安装时间',
  `has_adminlist` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否有后台列表',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COMMENT='插件表';

#
# Data for table "onethink_addons"
#

/*!40000 ALTER TABLE `onethink_addons` DISABLE KEYS */;
INSERT INTO `onethink_addons` VALUES (2,'SiteStat','站点统计信息','统计站点的基础信息',1,'{\"title\":\"\\u7cfb\\u7edf\\u4fe1\\u606f\",\"width\":\"1\",\"display\":\"0\"}','thinkphp','0.1',1379512015,0),(3,'DevTeam','开发团队信息','开发团队成员信息',1,'{\"title\":\"OneThink\\u5f00\\u53d1\\u56e2\\u961f\",\"width\":\"2\",\"display\":\"1\"}','thinkphp','0.1',1379512022,0),(4,'SystemInfo','系统环境信息','用于显示一些服务器的信息',1,'{\"title\":\"\\u7cfb\\u7edf\\u4fe1\\u606f\",\"width\":\"2\",\"display\":\"1\"}','thinkphp','0.1',1379512036,0),(5,'Editor','前台编辑器','用于增强整站长文本的输入和显示',1,'{\"editor_type\":\"2\",\"editor_wysiwyg\":\"1\",\"editor_height\":\"300px\",\"editor_resize_type\":\"1\"}','thinkphp','0.1',1379830910,0),(6,'Attachment','附件','用于文档模型上传附件',1,'null','thinkphp','0.1',1379842319,1),(9,'SocialComment','通用社交化评论','集成了各种社交化评论插件，轻松集成到系统中。',1,'{\"comment_type\":\"1\",\"comment_uid_youyan\":\"\",\"comment_short_name_duoshuo\":\"\",\"comment_data_list_duoshuo\":\"\"}','thinkphp','0.1',1380273962,0),(15,'EditorForAdmin','后台编辑器','用于增强整站长文本的输入和显示',1,'{\"editor_type\":\"2\",\"editor_wysiwyg\":\"1\",\"editor_height\":\"350px\",\"editor_resize_type\":\"1\"}','thinkphp','0.1',1383126253,0),(22,'LocalComment','本地评论','本地评论插件，不依赖社会化评论平台',1,'{\"can_guest_comment\":\"1\"}','caipeichao','0.1',1424252460,0),(26,'Avatar','头像插件','用于头像的上传',1,'{\"random\":\"1\"}','caipeichao','0.1',1424295073,1),(27,'ChinaCity','中国省市区三级联动','每个系统都需要的一个中国省市区三级联动插件。想天-駿濤修改，将镇级地区移除',1,'null','i友街','2.0',1429956630,0),(28,'AliPlay','支付宝','支付宝插件,后台配置支持变量。如：价格：$GOODS[\"price\"].但是配置的变量要和数据库商品信息一致。',1,'{\"pay_type\":\"2\",\"codelogin\":\"1\",\"PARTNER\":\"wdwefwe\",\"KEY\":\"wefwefwefwef\",\"SELLER_EMAIL\":\"2014058008@qq.com\",\"NOTIFY_URL\":\"safasdfa\",\"RETURN_URL\":\"asdfsadfsa\",\"out_trade_no\":\"asdfasdf\",\"subject\":\"asdfsadf\",\"price\":\"wefwfwe\",\"logistics_fee\":\"1\",\"logistics_type\":\"EXPRESS\",\"logistics_payment\":\"SELLER_PAY\",\"body\":\"\\u8ba2\\u5355\\u63cf\\u8ff0\",\"show_url\":\"http:\\/\\/www.xxx.com\\/myorder.html\",\"receive_name\":\"\",\"receive_address\":\"XX\\u7701XXX\\u5e02XXX\\u533aXXX\\u8defXXX\\u5c0f\\u533aXXX\\u680bXXX\\u5355\\u5143XXX\\u53f7\",\"receive_zip\":\"123456\",\"receive_mobile\":\"13444444444\",\"receive_phone\":\"134888888888\"}','Marvin(柳英伟)','2.0',1430737781,0),(29,'Mail','邮件订阅','邮件订阅插件',0,'null','xjw129xjt','0.1.1',1431443387,1),(30,'SyncLogin','第三方账号同步登陆','第三方账号同步登陆',1,'{\"type\":null,\"meta\":\"\",\"QqKEY\":\"\",\"QqSecret\":\"\",\"SinaKEY\":\"\",\"SinaSecret\":\"\"}','yidian','0.1',1431444098,0),(31,'ImageSlider','图片轮播','图片轮播，需要先通过 http://www.onethink.cn/topic/2153.html 的方法，让配置支持多图片上传',1,'{\"second\":\"3000\",\"direction\":\"horizontal\",\"imgWidth\":\"350\",\"imgHeight\":\"350\",\"url\":\"\",\"images\":\"\"}','birdy','0.2',1523700628,0);
/*!40000 ALTER TABLE `onethink_addons` ENABLE KEYS */;

#
# Structure for table "onethink_attachment"
#

DROP TABLE IF EXISTS `onethink_attachment`;
CREATE TABLE `onethink_attachment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `title` char(30) NOT NULL DEFAULT '' COMMENT '附件显示名',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '附件类型',
  `source` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '资源ID',
  `record_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '关联记录ID',
  `download` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '下载次数',
  `size` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '附件大小',
  `dir` int(12) unsigned NOT NULL DEFAULT '0' COMMENT '上级目录ID',
  `sort` int(8) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`),
  KEY `idx_record_status` (`record_id`,`status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='附件表';

#
# Data for table "onethink_attachment"
#

/*!40000 ALTER TABLE `onethink_attachment` DISABLE KEYS */;
/*!40000 ALTER TABLE `onethink_attachment` ENABLE KEYS */;

#
# Structure for table "onethink_attribute"
#

DROP TABLE IF EXISTS `onethink_attribute`;
CREATE TABLE `onethink_attribute` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '字段名',
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '字段注释',
  `field` varchar(100) NOT NULL DEFAULT '' COMMENT '字段定义',
  `type` varchar(20) NOT NULL DEFAULT '' COMMENT '数据类型',
  `value` varchar(100) NOT NULL DEFAULT '' COMMENT '字段默认值',
  `remark` varchar(100) NOT NULL DEFAULT '' COMMENT '备注',
  `is_show` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否显示',
  `extra` varchar(255) NOT NULL DEFAULT '' COMMENT '参数',
  `model_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '模型id',
  `is_must` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否必填',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `validate_rule` varchar(255) NOT NULL,
  `validate_time` tinyint(1) unsigned NOT NULL,
  `error_info` varchar(100) NOT NULL,
  `validate_type` varchar(25) NOT NULL,
  `auto_rule` varchar(100) NOT NULL,
  `auto_time` tinyint(1) unsigned NOT NULL,
  `auto_type` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `model_id` (`model_id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8 COMMENT='模型属性表';

#
# Data for table "onethink_attribute"
#

/*!40000 ALTER TABLE `onethink_attribute` DISABLE KEYS */;
INSERT INTO `onethink_attribute` VALUES (1,'uid','用户ID','int(10) unsigned NOT NULL ','num','0','',0,'',1,0,1,1384508362,1383891233,'',0,'','','',0,''),(2,'name','标识','char(40) NOT NULL ','string','','同一根节点下标识不重复',1,'',1,0,1,1383894743,1383891233,'',0,'','','',0,''),(3,'title','标题','char(80) NOT NULL ','string','','文档标题',1,'',1,0,1,1383894778,1383891233,'',0,'','','',0,''),(4,'category_id','所属分类','int(10) unsigned NOT NULL ','string','','',0,'',1,0,1,1384508336,1383891233,'',0,'','','',0,''),(5,'description','描述','char(140) NOT NULL ','textarea','','',1,'',1,0,1,1383894927,1383891233,'',0,'','','',0,''),(6,'root','根节点','int(10) unsigned NOT NULL ','num','0','该文档的顶级文档编号',0,'',1,0,1,1384508323,1383891233,'',0,'','','',0,''),(7,'pid','所属ID','int(10) unsigned NOT NULL ','num','0','父文档编号',0,'',1,0,1,1384508543,1383891233,'',0,'','','',0,''),(8,'model_id','内容模型ID','tinyint(3) unsigned NOT NULL ','num','0','该文档所对应的模型',0,'',1,0,1,1384508350,1383891233,'',0,'','','',0,''),(9,'type','内容类型','tinyint(3) unsigned NOT NULL ','select','2','',1,'1:目录\r\n2:主题\r\n3:段落',1,0,1,1384511157,1383891233,'',0,'','','',0,''),(10,'position','推荐位','smallint(5) unsigned NOT NULL ','checkbox','0','多个推荐则将其推荐值相加',1,'1:列表推荐\r\n2:频道页推荐\r\n4:首页推荐',1,0,1,1383895640,1383891233,'',0,'','','',0,''),(11,'link_id','外链','int(10) unsigned NOT NULL ','num','0','0-非外链，大于0-外链ID,需要函数进行链接与编号的转换',1,'',1,0,1,1383895757,1383891233,'',0,'','','',0,''),(12,'cover_id','封面','int(10) unsigned NOT NULL ','picture','0','0-无封面，大于0-封面图片ID，需要函数处理',1,'',1,0,1,1384147827,1383891233,'',0,'','','',0,''),(13,'display','可见性','tinyint(3) unsigned NOT NULL ','radio','1','',1,'0:不可见\r\n1:所有人可见',1,0,1,1386662271,1383891233,'',0,'','regex','',0,'function'),(14,'deadline','截至时间','int(10) unsigned NOT NULL ','datetime','0','0-永久有效',1,'',1,0,1,1387163248,1383891233,'',0,'','regex','',0,'function'),(15,'attach','附件数量','tinyint(3) unsigned NOT NULL ','num','0','',0,'',1,0,1,1387260355,1383891233,'',0,'','regex','',0,'function'),(16,'view','浏览量','int(10) unsigned NOT NULL ','num','0','',1,'',1,0,1,1383895835,1383891233,'',0,'','','',0,''),(17,'comment','评论数','int(10) unsigned NOT NULL ','num','0','',1,'',1,0,1,1383895846,1383891233,'',0,'','','',0,''),(18,'extend','扩展统计字段','int(10) unsigned NOT NULL ','num','0','根据需求自行使用',0,'',1,0,1,1384508264,1383891233,'',0,'','','',0,''),(19,'level','优先级','int(10) unsigned NOT NULL ','num','0','越高排序越靠前',1,'',1,0,1,1383895894,1383891233,'',0,'','','',0,''),(20,'create_time','创建时间','int(10) unsigned NOT NULL ','datetime','0','',1,'',1,0,1,1383895903,1383891233,'',0,'','','',0,''),(21,'update_time','更新时间','int(10) unsigned NOT NULL ','datetime','0','',0,'',1,0,1,1384508277,1383891233,'',0,'','','',0,''),(22,'status','数据状态','tinyint(4) NOT NULL ','radio','0','',0,'-1:删除\r\n0:禁用\r\n1:正常\r\n2:待审核\r\n3:草稿',1,0,1,1384508496,1383891233,'',0,'','','',0,''),(23,'parse','内容解析类型','tinyint(3) unsigned NOT NULL ','select','0','',0,'0:html\r\n1:ubb\r\n2:markdown',2,0,1,1384511049,1383891243,'',0,'','','',0,''),(24,'content','文章内容','text NOT NULL ','editor','','',1,'',2,0,1,1383896225,1383891243,'',0,'','','',0,''),(25,'template','详情页显示模板','varchar(100) NOT NULL ','string','','参照display方法参数的定义',1,'',2,0,1,1383896190,1383891243,'',0,'','','',0,''),(26,'bookmark','收藏数','int(10) unsigned NOT NULL ','num','0','',1,'',2,0,1,1383896103,1383891243,'',0,'','','',0,''),(27,'parse','内容解析类型','tinyint(3) unsigned NOT NULL ','select','0','',0,'0:html\r\n1:ubb\r\n2:markdown',3,0,1,1387260461,1383891252,'',0,'','regex','',0,'function'),(28,'content','下载详细描述','text NOT NULL ','editor','','',1,'',3,0,1,1383896438,1383891252,'',0,'','','',0,''),(29,'template','详情页显示模板','varchar(100) NOT NULL ','string','','',1,'',3,0,1,1383896429,1383891252,'',0,'','','',0,''),(30,'file_id','文件ID','int(10) unsigned NOT NULL ','file','0','需要函数处理',1,'',3,0,1,1383896415,1383891252,'',0,'','','',0,''),(31,'download','下载次数','int(10) unsigned NOT NULL ','num','0','',1,'',3,0,1,1383896380,1383891252,'',0,'','','',0,''),(32,'size','文件大小','bigint(20) unsigned NOT NULL ','num','0','单位bit',1,'',3,0,1,1383896371,1383891252,'',0,'','','',0,'');
/*!40000 ALTER TABLE `onethink_attribute` ENABLE KEYS */;

#
# Structure for table "onethink_auth_extend"
#

DROP TABLE IF EXISTS `onethink_auth_extend`;
CREATE TABLE `onethink_auth_extend` (
  `group_id` mediumint(10) unsigned NOT NULL COMMENT '用户id',
  `extend_id` mediumint(8) unsigned NOT NULL COMMENT '扩展表中数据的id',
  `type` tinyint(1) unsigned NOT NULL COMMENT '扩展类型标识 1:栏目分类权限;2:模型权限',
  UNIQUE KEY `group_extend_type` (`group_id`,`extend_id`,`type`),
  KEY `uid` (`group_id`),
  KEY `group_id` (`extend_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户组与分类的对应关系表';

#
# Data for table "onethink_auth_extend"
#

/*!40000 ALTER TABLE `onethink_auth_extend` DISABLE KEYS */;
INSERT INTO `onethink_auth_extend` VALUES (1,1,1),(1,1,2),(1,2,1),(1,2,2),(1,3,1),(1,3,2),(1,4,1),(1,37,1);
/*!40000 ALTER TABLE `onethink_auth_extend` ENABLE KEYS */;

#
# Structure for table "onethink_auth_group"
#

DROP TABLE IF EXISTS `onethink_auth_group`;
CREATE TABLE `onethink_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户组id,自增主键',
  `module` varchar(20) NOT NULL COMMENT '用户组所属模块',
  `type` tinyint(4) NOT NULL COMMENT '组类型',
  `title` char(20) NOT NULL DEFAULT '' COMMENT '用户组中文名称',
  `description` varchar(80) NOT NULL DEFAULT '' COMMENT '描述信息',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '用户组状态：为1正常，为0禁用,-1为删除',
  `rules` varchar(500) NOT NULL DEFAULT '' COMMENT '用户组拥有的规则id，多个规则 , 隔开',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

#
# Data for table "onethink_auth_group"
#

/*!40000 ALTER TABLE `onethink_auth_group` DISABLE KEYS */;
INSERT INTO `onethink_auth_group` VALUES (1,'admin',1,'超级管理员','',1,'1,2,3,4,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,79,80,81,82,83,84,86,87,88,89,90,91,92,93,94,95,100,102,103,107,108,109,110,195,209,210,225,233,234,235,237,238,239,240,241,244,245,246,249,250,260,312,321'),(2,'admin',1,'网站维护员','',1,'1,2,3,4,5,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,79,80,81,82,83,84,86,87,88,89,90,91,92,93,94,95,100,102,103,107,108,109,110,195,209,210,225,233,234,235,237,238,239,240,241,242,243,244,245,246,247,248,249,250,251,252,253,254,255,256,257,258,259,260,261,262'),(3,'admin',1,'11','',-1,''),(4,'admin',1,'企业管理员','',1,'1,241,243,246,248,250,252,253,254,255,256,257,258,259,260,262'),(5,'admin',1,'老师身份','',1,'1,263,264,274,276,278,279,280,293,294,303,306,308,309,319,325,326,328,329,330,361,365,366,367,368,370,371,372,373,374,375,376,377,379,380,381,382,383,384,385,386'),(6,'admin',1,'VIP用户','',1,''),(7,'admin',1,'注册用户','',1,''),(8,'admin',1,'游客','',1,'');
/*!40000 ALTER TABLE `onethink_auth_group` ENABLE KEYS */;

#
# Structure for table "onethink_auth_group_access"
#

DROP TABLE IF EXISTS `onethink_auth_group_access`;
CREATE TABLE `onethink_auth_group_access` (
  `uid` int(10) unsigned NOT NULL COMMENT '用户id',
  `group_id` mediumint(8) unsigned NOT NULL COMMENT '用户组id',
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "onethink_auth_group_access"
#

/*!40000 ALTER TABLE `onethink_auth_group_access` DISABLE KEYS */;
INSERT INTO `onethink_auth_group_access` VALUES (2,5),(3,5),(4,5),(6,5),(7,5),(8,5),(9,5),(10,5),(11,5),(16,5);
/*!40000 ALTER TABLE `onethink_auth_group_access` ENABLE KEYS */;

#
# Structure for table "onethink_auth_rule"
#

DROP TABLE IF EXISTS `onethink_auth_rule`;
CREATE TABLE `onethink_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '规则id,自增主键',
  `module` varchar(20) NOT NULL COMMENT '规则所属module',
  `type` tinyint(2) NOT NULL DEFAULT '1' COMMENT '1-url;2-主菜单',
  `name` char(80) NOT NULL DEFAULT '' COMMENT '规则唯一英文标识',
  `title` char(20) NOT NULL DEFAULT '' COMMENT '规则中文描述',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否有效(0:无效,1:有效)',
  `condition` varchar(300) NOT NULL DEFAULT '' COMMENT '规则附加条件',
  PRIMARY KEY (`id`),
  KEY `module` (`module`,`status`,`type`)
) ENGINE=MyISAM AUTO_INCREMENT=387 DEFAULT CHARSET=utf8;

#
# Data for table "onethink_auth_rule"
#

/*!40000 ALTER TABLE `onethink_auth_rule` DISABLE KEYS */;
INSERT INTO `onethink_auth_rule` VALUES (1,'admin',2,'Admin/Index/index','首页',1,''),(2,'admin',2,'Admin/Article/mydocument','内容',1,''),(3,'admin',2,'Admin/User/index','用户',1,''),(4,'admin',2,'Admin/Addons/index','扩展',1,''),(5,'admin',2,'Admin/Config/group','系统',-1,''),(7,'admin',1,'Admin/article/add','新增',1,''),(8,'admin',1,'Admin/article/edit','编辑',1,''),(9,'admin',1,'Admin/article/setStatus','改变状态',1,''),(10,'admin',1,'Admin/article/update','保存',1,''),(11,'admin',1,'Admin/article/autoSave','保存草稿',1,''),(12,'admin',1,'Admin/article/move','移动',1,''),(13,'admin',1,'Admin/article/copy','复制',1,''),(14,'admin',1,'Admin/article/paste','粘贴',1,''),(15,'admin',1,'Admin/article/permit','还原',1,''),(16,'admin',1,'Admin/article/clear','清空',1,''),(17,'admin',1,'Admin/article/index','文档列表',1,''),(18,'admin',1,'Admin/article/recycle','回收站',1,''),(19,'admin',1,'Admin/User/addaction','新增用户行为',1,''),(20,'admin',1,'Admin/User/editaction','编辑用户行为',1,''),(21,'admin',1,'Admin/User/saveAction','保存用户行为',1,''),(22,'admin',1,'Admin/User/setStatus','变更行为状态',1,''),(23,'admin',1,'Admin/User/changeStatus?method=forbidUser','禁用会员',1,''),(24,'admin',1,'Admin/User/changeStatus?method=resumeUser','启用会员',1,''),(25,'admin',1,'Admin/User/changeStatus?method=deleteUser','删除会员',1,''),(26,'admin',1,'Admin/User/index','用户信息',1,''),(27,'admin',1,'Admin/User/action','用户行为',1,''),(28,'admin',1,'Admin/AuthManager/changeStatus?method=deleteGroup','删除',1,''),(29,'admin',1,'Admin/AuthManager/changeStatus?method=forbidGroup','禁用',1,''),(30,'admin',1,'Admin/AuthManager/changeStatus?method=resumeGroup','恢复',1,''),(31,'admin',1,'Admin/AuthManager/createGroup','新增',1,''),(32,'admin',1,'Admin/AuthManager/editGroup','编辑',1,''),(33,'admin',1,'Admin/AuthManager/writeGroup','保存用户组',1,''),(34,'admin',1,'Admin/AuthManager/group','授权',1,''),(35,'admin',1,'Admin/AuthManager/access','访问授权',1,''),(36,'admin',1,'Admin/AuthManager/user','成员授权',1,''),(37,'admin',1,'Admin/AuthManager/removeFromGroup','解除授权',1,''),(38,'admin',1,'Admin/AuthManager/addToGroup','保存成员授权',1,''),(39,'admin',1,'Admin/AuthManager/category','分类授权',1,''),(40,'admin',1,'Admin/AuthManager/addToCategory','保存分类授权',1,''),(41,'admin',1,'Admin/AuthManager/index','权限管理',1,''),(42,'admin',1,'Admin/Addons/create','创建',1,''),(43,'admin',1,'Admin/Addons/checkForm','检测创建',1,''),(44,'admin',1,'Admin/Addons/preview','预览',1,''),(45,'admin',1,'Admin/Addons/build','快速生成插件',1,''),(46,'admin',1,'Admin/Addons/config','设置',1,''),(47,'admin',1,'Admin/Addons/disable','禁用',1,''),(48,'admin',1,'Admin/Addons/enable','启用',1,''),(49,'admin',1,'Admin/Addons/install','安装',1,''),(50,'admin',1,'Admin/Addons/uninstall','卸载',1,''),(51,'admin',1,'Admin/Addons/saveconfig','更新配置',1,''),(52,'admin',1,'Admin/Addons/adminList','插件后台列表',1,''),(53,'admin',1,'Admin/Addons/execute','URL方式访问插件',1,''),(54,'admin',1,'Admin/Addons/index','插件管理',1,''),(55,'admin',1,'Admin/Addons/hooks','钩子管理',1,''),(56,'admin',1,'Admin/model/add','新增',1,''),(57,'admin',1,'Admin/model/edit','编辑',1,''),(58,'admin',1,'Admin/model/setStatus','改变状态',1,''),(59,'admin',1,'Admin/model/update','保存数据',1,''),(60,'admin',1,'Admin/Model/index','模型管理',1,''),(61,'admin',1,'Admin/Config/edit','编辑',1,''),(62,'admin',1,'Admin/Config/del','删除',1,''),(63,'admin',1,'Admin/Config/add','新增',1,''),(64,'admin',1,'Admin/Config/save','保存',1,''),(65,'admin',1,'Admin/Config/group','网站设置',1,''),(66,'admin',1,'Admin/Config/index','配置管理',1,''),(67,'admin',1,'Admin/Channel/add','新增',1,''),(68,'admin',1,'Admin/Channel/edit','编辑',1,''),(69,'admin',1,'Admin/Channel/del','删除',1,''),(70,'admin',1,'Admin/Channel/index','导航管理',1,''),(71,'admin',1,'Admin/Category/edit','编辑',1,''),(72,'admin',1,'Admin/Category/add','新增',1,''),(73,'admin',1,'Admin/Category/remove','删除',1,''),(74,'admin',1,'Admin/Category/index','分类管理',1,''),(75,'admin',1,'Admin/file/upload','上传控件',-1,''),(76,'admin',1,'Admin/file/uploadPicture','上传图片',-1,''),(77,'admin',1,'Admin/file/download','下载',-1,''),(79,'admin',1,'Admin/article/batchOperate','导入',1,''),(80,'admin',1,'Admin/Database/index?type=export','备份数据库',1,''),(81,'admin',1,'Admin/Database/index?type=import','还原数据库',1,''),(82,'admin',1,'Admin/Database/export','备份',1,''),(83,'admin',1,'Admin/Database/optimize','优化表',1,''),(84,'admin',1,'Admin/Database/repair','修复表',1,''),(86,'admin',1,'Admin/Database/import','恢复',1,''),(87,'admin',1,'Admin/Database/del','删除',1,''),(88,'admin',1,'Admin/User/add','新增用户',1,''),(89,'admin',1,'Admin/Attribute/index','属性管理',1,''),(90,'admin',1,'Admin/Attribute/add','新增',1,''),(91,'admin',1,'Admin/Attribute/edit','编辑',1,''),(92,'admin',1,'Admin/Attribute/setStatus','改变状态',1,''),(93,'admin',1,'Admin/Attribute/update','保存数据',1,''),(94,'admin',1,'Admin/AuthManager/modelauth','模型授权',1,''),(95,'admin',1,'Admin/AuthManager/addToModel','保存模型授权',1,''),(96,'admin',1,'Admin/Category/move','移动',-1,''),(97,'admin',1,'Admin/Category/merge','合并',-1,''),(98,'admin',1,'Admin/Config/menu','后台菜单管理',-1,''),(99,'admin',1,'Admin/Article/mydocument','内容',-1,''),(100,'admin',1,'Admin/Menu/index','菜单管理',1,''),(101,'admin',1,'Admin/other','其他',-1,''),(102,'admin',1,'Admin/Menu/add','新增',1,''),(103,'admin',1,'Admin/Menu/edit','编辑',1,''),(104,'admin',1,'Admin/Think/lists?model=article','文章管理',-1,''),(105,'admin',1,'Admin/Think/lists?model=download','下载管理',1,''),(106,'admin',1,'Admin/Think/lists?model=config','配置管理',1,''),(107,'admin',1,'Admin/Action/actionlog','行为日志',1,''),(108,'admin',1,'Admin/User/updatePassword','修改密码',1,''),(109,'admin',1,'Admin/User/updateNickname','修改昵称',1,''),(110,'admin',1,'Admin/action/edit','查看行为日志',1,''),(111,'admin',2,'Admin/article/index','文档列表',-1,''),(112,'admin',2,'Admin/article/add','新增',-1,''),(113,'admin',2,'Admin/article/edit','编辑',-1,''),(114,'admin',2,'Admin/article/setStatus','改变状态',-1,''),(115,'admin',2,'Admin/article/update','保存',-1,''),(116,'admin',2,'Admin/article/autoSave','保存草稿',-1,''),(117,'admin',2,'Admin/article/move','移动',-1,''),(118,'admin',2,'Admin/article/copy','复制',-1,''),(119,'admin',2,'Admin/article/paste','粘贴',-1,''),(120,'admin',2,'Admin/article/batchOperate','导入',-1,''),(121,'admin',2,'Admin/article/recycle','回收站',-1,''),(122,'admin',2,'Admin/article/permit','还原',-1,''),(123,'admin',2,'Admin/article/clear','清空',-1,''),(124,'admin',2,'Admin/User/add','新增用户',-1,''),(125,'admin',2,'Admin/User/action','用户行为',-1,''),(126,'admin',2,'Admin/User/addAction','新增用户行为',-1,''),(127,'admin',2,'Admin/User/editAction','编辑用户行为',-1,''),(128,'admin',2,'Admin/User/saveAction','保存用户行为',-1,''),(129,'admin',2,'Admin/User/setStatus','变更行为状态',-1,''),(130,'admin',2,'Admin/User/changeStatus?method=forbidUser','禁用会员',-1,''),(131,'admin',2,'Admin/User/changeStatus?method=resumeUser','启用会员',-1,''),(132,'admin',2,'Admin/User/changeStatus?method=deleteUser','删除会员',-1,''),(133,'admin',2,'Admin/AuthManager/index','权限管理',-1,''),(134,'admin',2,'Admin/AuthManager/changeStatus?method=deleteGroup','删除',-1,''),(135,'admin',2,'Admin/AuthManager/changeStatus?method=forbidGroup','禁用',-1,''),(136,'admin',2,'Admin/AuthManager/changeStatus?method=resumeGroup','恢复',-1,''),(137,'admin',2,'Admin/AuthManager/createGroup','新增',-1,''),(138,'admin',2,'Admin/AuthManager/editGroup','编辑',-1,''),(139,'admin',2,'Admin/AuthManager/writeGroup','保存用户组',-1,''),(140,'admin',2,'Admin/AuthManager/group','授权',-1,''),(141,'admin',2,'Admin/AuthManager/access','访问授权',-1,''),(142,'admin',2,'Admin/AuthManager/user','成员授权',-1,''),(143,'admin',2,'Admin/AuthManager/removeFromGroup','解除授权',-1,''),(144,'admin',2,'Admin/AuthManager/addToGroup','保存成员授权',-1,''),(145,'admin',2,'Admin/AuthManager/category','分类授权',-1,''),(146,'admin',2,'Admin/AuthManager/addToCategory','保存分类授权',-1,''),(147,'admin',2,'Admin/AuthManager/modelauth','模型授权',-1,''),(148,'admin',2,'Admin/AuthManager/addToModel','保存模型授权',-1,''),(149,'admin',2,'Admin/Addons/create','创建',-1,''),(150,'admin',2,'Admin/Addons/checkForm','检测创建',-1,''),(151,'admin',2,'Admin/Addons/preview','预览',-1,''),(152,'admin',2,'Admin/Addons/build','快速生成插件',-1,''),(153,'admin',2,'Admin/Addons/config','设置',-1,''),(154,'admin',2,'Admin/Addons/disable','禁用',-1,''),(155,'admin',2,'Admin/Addons/enable','启用',-1,''),(156,'admin',2,'Admin/Addons/install','安装',-1,''),(157,'admin',2,'Admin/Addons/uninstall','卸载',-1,''),(158,'admin',2,'Admin/Addons/saveconfig','更新配置',-1,''),(159,'admin',2,'Admin/Addons/adminList','插件后台列表',-1,''),(160,'admin',2,'Admin/Addons/execute','URL方式访问插件',-1,''),(161,'admin',2,'Admin/Addons/hooks','钩子管理',-1,''),(162,'admin',2,'Admin/Model/index','模型管理',-1,''),(163,'admin',2,'Admin/model/add','新增',-1,''),(164,'admin',2,'Admin/model/edit','编辑',-1,''),(165,'admin',2,'Admin/model/setStatus','改变状态',-1,''),(166,'admin',2,'Admin/model/update','保存数据',-1,''),(167,'admin',2,'Admin/Attribute/index','属性管理',-1,''),(168,'admin',2,'Admin/Attribute/add','新增',-1,''),(169,'admin',2,'Admin/Attribute/edit','编辑',-1,''),(170,'admin',2,'Admin/Attribute/setStatus','改变状态',-1,''),(171,'admin',2,'Admin/Attribute/update','保存数据',-1,''),(172,'admin',2,'Admin/Config/index','配置管理',-1,''),(173,'admin',2,'Admin/Config/edit','编辑',-1,''),(174,'admin',2,'Admin/Config/del','删除',-1,''),(175,'admin',2,'Admin/Config/add','新增',-1,''),(176,'admin',2,'Admin/Config/save','保存',-1,''),(177,'admin',2,'Admin/Menu/index','菜单管理',-1,''),(178,'admin',2,'Admin/Channel/index','导航管理',-1,''),(179,'admin',2,'Admin/Channel/add','新增',-1,''),(180,'admin',2,'Admin/Channel/edit','编辑',-1,''),(181,'admin',2,'Admin/Channel/del','删除',-1,''),(182,'admin',2,'Admin/Category/index','分类管理',-1,''),(183,'admin',2,'Admin/Category/edit','编辑',-1,''),(184,'admin',2,'Admin/Category/add','新增',-1,''),(185,'admin',2,'Admin/Category/remove','删除',-1,''),(186,'admin',2,'Admin/Category/move','移动',-1,''),(187,'admin',2,'Admin/Category/merge','合并',-1,''),(188,'admin',2,'Admin/Database/index?type=export','备份数据库',-1,''),(189,'admin',2,'Admin/Database/export','备份',-1,''),(190,'admin',2,'Admin/Database/optimize','优化表',-1,''),(191,'admin',2,'Admin/Database/repair','修复表',-1,''),(192,'admin',2,'Admin/Database/index?type=import','还原数据库',-1,''),(193,'admin',2,'Admin/Database/import','恢复',-1,''),(194,'admin',2,'Admin/Database/del','删除',-1,''),(195,'admin',2,'Admin/other','其他',-1,''),(196,'admin',2,'Admin/Menu/add','新增',-1,''),(197,'admin',2,'Admin/Menu/edit','编辑',-1,''),(198,'admin',2,'Admin/Think/lists?model=article','应用',-1,''),(199,'admin',2,'Admin/Think/lists?model=download','下载管理',-1,''),(200,'admin',2,'Admin/Think/lists?model=config','应用',-1,''),(201,'admin',2,'Admin/Action/actionlog','行为日志',-1,''),(202,'admin',2,'Admin/User/updatePassword','修改密码',-1,''),(203,'admin',2,'Admin/User/updateNickname','修改昵称',-1,''),(204,'admin',2,'Admin/action/edit','查看行为日志',-1,''),(205,'admin',1,'Admin/think/add','新增数据',1,''),(206,'admin',1,'Admin/think/edit','编辑数据',1,''),(207,'admin',1,'Admin/Menu/import','导入',1,''),(208,'admin',1,'Admin/Model/generate','生成',1,''),(209,'admin',1,'Admin/Addons/addHook','新增钩子',1,''),(210,'admin',1,'Admin/Addons/edithook','编辑钩子',1,''),(211,'admin',1,'Admin/Article/sort','文档排序',1,''),(212,'admin',1,'Admin/Config/sort','排序',1,''),(213,'admin',1,'Admin/Menu/sort','排序',1,''),(214,'admin',1,'Admin/Channel/sort','排序',1,''),(215,'admin',1,'Admin/Category/operate/type/move','移动',1,''),(216,'admin',1,'Admin/Category/operate/type/merge','合并',1,''),(217,'admin',1,'Admin/Shop/goodsEdit','添加、编辑商品',-1,''),(218,'admin',1,'Admin/Shop/add','商品分类添加',-1,''),(219,'admin',1,'Admin/Shop/operate','商品分类操作',-1,''),(220,'admin',1,'Admin/Shop/setGoodsStatus','商品状态设置',-1,''),(221,'admin',1,'Admin/Shop/setStatus','商品分类状态设置',-1,''),(222,'admin',1,'Admin/Shop/shopLog','商城信息记录',-1,''),(223,'admin',1,'Admin/Shop/hotSellConfig','热销商品阀值配置',-1,''),(224,'admin',1,'Admin/Shop/setNew','设置新品',-1,''),(225,'admin',2,'Admin/Company/companylist','机构管理',1,''),(226,'admin',1,'Admin/Shop/goodsList','商品列表',-1,''),(227,'admin',1,'Admin/Shop/shopCategory','商品分类配置',-1,''),(228,'admin',1,'Admin/Shop/categoryTrash','商品分类回收站',-1,''),(229,'admin',1,'Admin/Shop/verify','待发货交易',-1,''),(230,'admin',1,'Admin/Shop/goodsBuySuccess','交易成功记录',-1,''),(231,'admin',1,'Admin/Shop/goodsTrash','商品回收站',-1,''),(232,'admin',1,'Admin/Shop/toxMoneyConfig','货币配置',-1,''),(233,'admin',1,'Admin/Company/companylist','机构列表',1,''),(234,'admin',1,'Admin/company/companyedit','添加、编辑机构',1,''),(235,'admin',1,'Admin/company/trash','回收站',1,''),(236,'admin',2,'Admin/Shop/shopCategory','积分商城',-1,''),(237,'admin',1,'Admin/company/administratorlist','机构管理员列表',1,''),(238,'admin',1,'Admin/company/administratoredit','添加、编辑机构管理员',1,''),(239,'admin',1,'Admin/company/addusergroup','添加、编辑用户组',1,''),(240,'admin',1,'Admin/company/operateusergroup','用户组操作',1,''),(241,'admin',1,'Admin/news/lists','所有资讯',1,''),(242,'admin',1,'Admin/message/lists','所有系统消息',-1,''),(243,'admin',1,'Admin/custom/words','行业词汇',-1,''),(244,'admin',1,'Admin/company/usergroup','用户组管理',1,''),(245,'admin',1,'Admin/company/users','用户管理',1,''),(246,'admin',1,'Admin/news/edit','添加、编辑资讯',1,''),(247,'admin',1,'Admin/message/edit','添加、编辑系统消息',-1,''),(248,'admin',1,'Admin/custom/spoken','行业口语',-1,''),(249,'admin',1,'Admin/company/usergrouptrash','用户组回收站',1,''),(250,'admin',1,'Admin/news/trash','回收站',1,''),(251,'admin',1,'Admin/message/trash','回收站',-1,''),(252,'admin',1,'Admin/custom/read','行业阅读',-1,''),(253,'admin',1,'Admin/custom/aq','在线答疑',-1,''),(254,'admin',1,'Admin/custom/trash','回收站',-1,''),(255,'admin',1,'Admin/custom/edit','添加、编辑内容',-1,''),(256,'admin',1,'Admin/notice/lists','所有通知公告',-1,''),(257,'admin',1,'Admin/notice/edit','添加、编辑通知公告',-1,''),(258,'admin',1,'Admin/notice/trash','回收站',-1,''),(259,'admin',2,'Admin/notice/lists','通知公告',-1,''),(260,'admin',2,'Admin/news/lists','资讯管理',1,''),(261,'admin',2,'Admin/message/lists','系统消息',-1,''),(262,'admin',2,'Admin/custom/words','定制服务',-1,''),(263,'admin',1,'Admin/Examination/edittestpaper','试卷编辑',1,''),(264,'admin',1,'Admin/Examination/topicManage','试卷题目管理',1,''),(265,'admin',1,'Admin/module/lists','模块管理',1,''),(266,'admin',1,'Admin/module/uninstall','卸载模块',1,''),(267,'admin',1,'Admin/module/install','模块安装',1,''),(268,'admin',1,'Admin/poster/lists','所有幻灯片',1,''),(269,'admin',1,'Admin/download/Category','资料下载分类',1,''),(270,'admin',1,'Admin/download/lists','所有资料下载',1,''),(271,'admin',1,'Admin/news/Category','分类',1,''),(272,'admin',1,'Admin/room/lists','所有房间',1,''),(273,'admin',1,'Admin/room/Category','房间分类',1,''),(274,'admin',1,'Admin/vod/lists','所有点播',1,''),(275,'admin',1,'Admin/vod/Category','点播分类',1,''),(276,'admin',1,'Admin/wenku/lists','所有文库',1,''),(277,'admin',1,'Admin/wenku/Category','文库分类',1,''),(278,'admin',1,'Admin/Examination/recordList','考试记录',1,''),(279,'admin',1,'Admin/Examination/editTopic','编辑题目',1,''),(280,'admin',1,'Admin/live/lists','所有内容',1,''),(281,'admin',1,'Admin/live/Category','分类管理',1,''),(282,'admin',1,'Admin/Examination/Category','分类',1,''),(283,'admin',1,'Admin/poster/edit','添加、编辑幻灯片',1,''),(284,'admin',1,'Admin/download/addCategory','添加、编辑资料下载',1,''),(285,'admin',1,'Admin/download/edit','添加、编辑资料下载',1,''),(286,'admin',1,'Admin/news/addCategory','添加、编辑资讯',1,''),(287,'admin',1,'Admin/room/edit','添加、编辑房间',1,''),(288,'admin',1,'Admin/room/addCategory','添加、编辑分类',1,''),(289,'admin',1,'Admin/vod/edit','添加、编辑点播',-1,''),(290,'admin',1,'Admin/vod/addCategory','添加、编辑点播分类',1,''),(291,'admin',1,'Admin/wenku/edit','添加、编辑文库',-1,''),(292,'admin',1,'Admin/wenku/addCategory','添加、编辑分类',1,''),(293,'admin',1,'Admin/Examination/topicsList','题库管理',1,''),(294,'admin',1,'Admin/Examination/addtopic','新增题目',1,''),(295,'admin',1,'Admin/live/edit','添加、编辑课程',-1,''),(296,'admin',1,'Admin/live/addCategory','添加、编辑分类',1,''),(297,'admin',1,'Admin/Examination/addCategory','添加、编辑分类',1,''),(298,'admin',1,'Admin/poster/trash','回收站',1,''),(299,'admin',1,'Admin/download/trash','视频回收站',1,''),(300,'admin',1,'Admin/news/operateCategory','分类操作',1,''),(301,'admin',1,'Admin/room/trash','房间回收站',1,''),(302,'admin',1,'Admin/room/operateCategory','分类操作',1,''),(303,'admin',1,'Admin/vod/trash','回收站',1,''),(304,'admin',1,'Admin/vod/operateCategory','分类操作',1,''),(305,'admin',1,'Admin/download/operateCategory','分类操作',1,''),(306,'admin',1,'Admin/wenku/trash','回收站',1,''),(307,'admin',1,'Admin/wenku/operateCategory','分类操作',1,''),(308,'admin',1,'Admin/Examination/questionpapersList','试卷管理',1,''),(309,'admin',1,'Admin/live/trash','回收站',1,''),(310,'admin',1,'Admin/live/operateCategory','分类操作',1,''),(311,'admin',1,'Admin/Examination/operateCategory','分类操作',1,''),(312,'admin',1,'Admin/user/profile','扩展资料',1,''),(313,'admin',1,'Admin/news/categoryTrash','分类回收站',1,''),(314,'admin',1,'Admin/room/categoryTrash','分类回收站',1,''),(315,'admin',1,'Admin/vod/categoryTrash','分类回收站',1,''),(316,'admin',1,'Admin/download/categoryTrash','分类回收站',1,''),(317,'admin',1,'Admin/wenku/categoryTrash','分类回收站',1,''),(318,'admin',1,'Admin/live/categoryTrash','分类回收站',1,''),(319,'admin',1,'Admin/live/setStatus','内容状态设置',1,''),(320,'admin',1,'Admin/Examination/categoryTrash','分类回收站',1,''),(321,'admin',1,'Admin/user/expandinfo_select','用户扩展资料列表',1,''),(322,'admin',2,'Admin/poster/lists','幻灯片',1,''),(323,'admin',2,'Admin/download/lists','资料下载',1,''),(324,'admin',2,'Admin/Room/lists','房间管理',1,''),(325,'admin',2,'Admin/vod/lists','点播管理',1,''),(326,'admin',2,'Admin/wenku/lists','文库管理',1,''),(327,'admin',2,'Admin/Examination/recordList','在线考试',-1,''),(328,'admin',2,'Admin/live/lists','课程管理',1,''),(329,'admin',1,'Admin/live/chapters','章节管理',1,''),(330,'admin',1,'Admin/live/addChapter','添加、编辑章节',1,''),(331,'admin',1,'Admin/Order/index','所有订单',1,''),(332,'admin',1,'Admin/Order/edit','查看、编辑订单',1,''),(333,'admin',1,'Admin/Order/cancel','已取消订单',1,''),(334,'admin',1,'Admin/Order/lists','账单管理',1,''),(335,'admin',1,'Admin/product/lists','所有内容',1,''),(336,'admin',1,'Admin/product/Category','分类管理',1,''),(337,'admin',1,'Admin/Feedback/lists','所有内容',1,''),(338,'admin',1,'Admin/Feedback/Category','分类管理',1,''),(339,'admin',1,'Admin/Aboutus/lists','所有内容',1,''),(340,'admin',1,'Admin/Aboutus/Category','分类管理',1,''),(341,'admin',1,'Admin/Config/website','网站信息',1,''),(342,'admin',1,'Admin/product/edit','添加、编辑内容',1,''),(343,'admin',1,'Admin/product/addCategory','添加、编辑分类',1,''),(344,'admin',1,'Admin/Feedback/edit','添加、编辑内容',1,''),(345,'admin',1,'Admin/Feedback/addCategory','添加、编辑分类',1,''),(346,'admin',1,'Admin/Aboutus/edit','添加、编辑内容',1,''),(347,'admin',1,'Admin/Aboutus/addCategory','添加、编辑分类',1,''),(348,'admin',1,'Admin/product/trash','内容回收站',1,''),(349,'admin',1,'Admin/product/operateCategory','分类操作',1,''),(350,'admin',1,'Admin/Feedback/trash','内容回收站',1,''),(351,'admin',1,'Admin/Feedback/operateCategory','分类操作',1,''),(352,'admin',1,'Admin/Aboutus/trash','内容回收站',1,''),(353,'admin',1,'Admin/Aboutus/operateCategory','分类操作',1,''),(354,'admin',1,'Admin/product/setStatus','内容状态设置',1,''),(355,'admin',1,'Admin/product/categoryTrash','分类回收站',1,''),(356,'admin',1,'Admin/Feedback/setStatus','内容状态设置',1,''),(357,'admin',1,'Admin/Feedback/categoryTrash','分类回收站',1,''),(358,'admin',1,'Admin/Aboutus/setStatus','内容状态设置',1,''),(359,'admin',1,'Admin/Aboutus/categoryTrash','分类回收站',1,''),(360,'admin',2,'Admin/product/lists','产品管理',1,''),(361,'admin',2,'Admin/Examination/questionpapersList','在线考试',1,''),(362,'admin',2,'Admin/Feedback/lists','留言反馈',1,''),(363,'admin',2,'Admin/Aboutus/lists','关于我们',1,''),(364,'admin',2,'Admin/Order/index','财务管理',1,''),(365,'admin',1,'Admin/live/add','添加、编辑课程',1,''),(366,'admin',1,'Admin/Examination/previewquestionPaper','预览试卷',1,''),(367,'admin',1,'Admin/vod/add','添加、编辑点播',1,''),(368,'admin',1,'Admin/wenku/add','添加、编辑文库',1,''),(369,'admin',2,'Admin/Config/website','系统',1,''),(370,'admin',1,'Admin/vod/setstatus','删除内容',1,''),(371,'admin',1,'Admin/wenku/setstatus','删除内容',1,''),(372,'admin',1,'Admin/Examination/selectquestion','创建试卷->题目设置',1,''),(373,'admin',1,'Admin/Examination/selectquestionleft','创建试卷->题目设置->左侧',1,''),(374,'admin',1,'Admin/Examination/selectquestionright','创建试卷->题目设置->右侧',1,''),(375,'admin',1,'Admin/Examination/edittopic_single_choice','添加单选题',1,''),(376,'admin',1,'Admin/Examination/editTopic_choice','添加多选题',1,''),(377,'admin',1,'Admin/Examination/editTopic_fill','添加填空题',1,''),(378,'admin',1,'Admin/editTopic_determine','添加判断题',-1,''),(379,'admin',1,'Admin/Examination/editTopic_essay','添加问答题',1,''),(380,'admin',1,'Admin/Examination/editTopic_material','添加材料题',1,''),(381,'admin',1,'Admin/Examination/removeTopic','题库删除',1,''),(382,'admin',1,'Admin/Examination/previewTopic','预览题库',1,''),(383,'admin',1,'Admin/Examination/subtopicsList','管理材料题库',1,''),(384,'admin',1,'Admin/Examination/editTopic_determine','添加判断题',1,''),(385,'admin',1,'Admin/Examination/setstatusquestion','设置试题状态',1,''),(386,'admin',1,'Admin/Examination/removeTestpaper','删除试卷',1,'');
/*!40000 ALTER TABLE `onethink_auth_rule` ENABLE KEYS */;

#
# Structure for table "onethink_avatar"
#

DROP TABLE IF EXISTS `onethink_avatar`;
CREATE TABLE `onethink_avatar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `path` varchar(70) NOT NULL,
  `create_time` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `is_temp` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

#
# Data for table "onethink_avatar"
#

/*!40000 ALTER TABLE `onethink_avatar` DISABLE KEYS */;
INSERT INTO `onethink_avatar` VALUES (10,58,'2015-04-26/553cc5fbbd845-28856a6c.png',1430046216,1,0),(41,2,'2018-08-13/5b713f5e3b460-5a7f1075.png',1534148449,1,0),(43,4,'2018-08-13/5b713fa96bd01-8556b83b.png',1534148524,1,0),(46,9,'2018-08-13/5b71404cd0bdb-c5879273.png',1534148688,1,0),(50,10,'2018-08-13/5b71413606e1b-5ad7001e.png',1534148920,1,0),(52,11,'2018-08-13/5b7143d229aea-80e9d26b.png',1534149591,1,0),(54,16,'2018-08-13/5b7144292185e-a769b642.png',1534149676,1,0),(56,8,'2018-08-13/5b7144c45f836-58910552.png',1534149830,1,0),(58,6,'2018-08-13/5b717212d9006-e15cc53a.png',1534161434,1,0),(60,3,'2018-08-24/5b7fd4fe9982f-3aa62929.png',1535104262,1,0),(62,7,'2018-08-24/5b7fd5b4e0c1b-813f0814.png',1535104443,1,0),(64,1,'2018-08-29/5b86b6d0ce19d-c462e6ca.png',1535555313,1,0);
/*!40000 ALTER TABLE `onethink_avatar` ENABLE KEYS */;

#
# Structure for table "onethink_category"
#

DROP TABLE IF EXISTS `onethink_category`;
CREATE TABLE `onethink_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '分类ID',
  `name` varchar(30) NOT NULL COMMENT '标志',
  `title` varchar(50) NOT NULL COMMENT '标题',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上级分类ID',
  `sort` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序（同级有效）',
  `list_row` tinyint(3) unsigned NOT NULL DEFAULT '10' COMMENT '列表每页行数',
  `meta_title` varchar(50) NOT NULL DEFAULT '' COMMENT 'SEO的网页标题',
  `keywords` varchar(255) NOT NULL DEFAULT '' COMMENT '关键字',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '描述',
  `template_index` varchar(100) NOT NULL COMMENT '频道页模板',
  `template_lists` varchar(100) NOT NULL COMMENT '列表页模板',
  `template_detail` varchar(100) NOT NULL COMMENT '详情页模板',
  `template_edit` varchar(100) NOT NULL COMMENT '编辑页模板',
  `model` varchar(100) NOT NULL DEFAULT '' COMMENT '关联模型',
  `type` varchar(100) NOT NULL DEFAULT '' COMMENT '允许发布的内容类型',
  `link_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '外链',
  `allow_publish` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否允许发布内容',
  `display` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '可见性',
  `reply` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否允许回复',
  `check` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '发布的文章是否需要审核',
  `reply_model` varchar(100) NOT NULL DEFAULT '',
  `extend` text NOT NULL COMMENT '扩展设置',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '数据状态',
  `icon` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '分类图标',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_name` (`name`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=utf8 COMMENT='分类表';

#
# Data for table "onethink_category"
#

/*!40000 ALTER TABLE `onethink_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `onethink_category` ENABLE KEYS */;

#
# Structure for table "onethink_channel"
#

DROP TABLE IF EXISTS `onethink_channel`;
CREATE TABLE `onethink_channel` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '频道ID',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上级频道ID',
  `title` char(30) NOT NULL COMMENT '频道标题',
  `url` char(100) NOT NULL COMMENT '频道连接',
  `sort` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '导航排序',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态',
  `target` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '新窗口打开',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

#
# Data for table "onethink_channel"
#

/*!40000 ALTER TABLE `onethink_channel` DISABLE KEYS */;
INSERT INTO `onethink_channel` VALUES (1,0,'首页','Home/Index/index',1,1379475111,1429037057,1,0),(13,0,'课程中心','Live/Index/index',3,1262282474,1525605499,1,0),(15,0,'视频点播','Vod/Index/index',4,1422901522,1422981944,1,0),(16,0,'在线文档','Wenku/Index/index',5,1422901562,1422981958,1,0),(20,0,'在线考试','Examination/Index/index',5,1420421553,1420421553,1,0),(28,0,'名师风采','teacher/index/index',9,1523603389,1525605288,1,0),(29,0,'在线留言','Feedback/index/index',17,1523603413,1531752491,1,0),(30,0,'新闻资讯','News/index/index',22,1523603434,1525605319,1,0),(33,0,'关于我们','Aboutus/index/detail/?id=1',23,1525605621,1525605667,1,0);
/*!40000 ALTER TABLE `onethink_channel` ENABLE KEYS */;

#
# Structure for table "onethink_company"
#

DROP TABLE IF EXISTS `onethink_company`;
CREATE TABLE `onethink_company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL COMMENT '机构名称',
  `ico` int(11) NOT NULL COMMENT '机构图标',
  `detail` varchar(1000) NOT NULL COMMENT '机构简介',
  `token` varchar(1000) NOT NULL COMMENT '微信令牌',
  `changetime` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '状态，-1：删除；0：禁用；1：启用',
  `createtime` int(11) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='机构信息';

#
# Data for table "onethink_company"
#

/*!40000 ALTER TABLE `onethink_company` DISABLE KEYS */;
INSERT INTO `onethink_company` VALUES (4,'深圳市明天见科技有限公司',0,'','1111111111',1533739822,1,1420351068);
/*!40000 ALTER TABLE `onethink_company` ENABLE KEYS */;

#
# Structure for table "onethink_company_administrator"
#

DROP TABLE IF EXISTS `onethink_company_administrator`;
CREATE TABLE `onethink_company_administrator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `companyid` int(11) NOT NULL,
  `uid` int(11) NOT NULL COMMENT '用户ID',
  `name` varchar(25) NOT NULL COMMENT '用户名称',
  `changetime` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '状态，-1：删除；0：禁用；1：启用；2：未审核',
  `createtime` int(11) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COMMENT='机构管理员信息';

#
# Data for table "onethink_company_administrator"
#

/*!40000 ALTER TABLE `onethink_company_administrator` DISABLE KEYS */;
INSERT INTO `onethink_company_administrator` VALUES (52,8,4,'test',1420722190,1,1420722190);
/*!40000 ALTER TABLE `onethink_company_administrator` ENABLE KEYS */;

#
# Structure for table "onethink_company_usergroup"
#

DROP TABLE IF EXISTS `onethink_company_usergroup`;
CREATE TABLE `onethink_company_usergroup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(25) NOT NULL,
  `createtime` int(11) NOT NULL,
  `updatetime` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `pid` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

#
# Data for table "onethink_company_usergroup"
#

/*!40000 ALTER TABLE `onethink_company_usergroup` DISABLE KEYS */;
INSERT INTO `onethink_company_usergroup` VALUES (1,'默认',1420347601,1422633724,1,0,0),(2,'222',1422633743,0,1,1,0),(3,'568',1422633854,0,1,2,0);
/*!40000 ALTER TABLE `onethink_company_usergroup` ENABLE KEYS */;

#
# Structure for table "onethink_config"
#

DROP TABLE IF EXISTS `onethink_config`;
CREATE TABLE `onethink_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '配置ID',
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '配置名称',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '配置类型',
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '配置说明',
  `group` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '配置分组',
  `extra` varchar(255) NOT NULL DEFAULT '' COMMENT '配置值',
  `remark` varchar(100) NOT NULL COMMENT '配置说明',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态',
  `value` text NOT NULL COMMENT '配置值',
  `sort` smallint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_name` (`name`),
  KEY `type` (`type`),
  KEY `group` (`group`)
) ENGINE=MyISAM AUTO_INCREMENT=10473 DEFAULT CHARSET=utf8;

#
# Data for table "onethink_config"
#

/*!40000 ALTER TABLE `onethink_config` DISABLE KEYS */;
INSERT INTO `onethink_config` VALUES (1,'WEB_SITE_TITLE',1,'网站标题',1,'','网站标题前台显示标题',1378898976,1532097941,1,'集创思在线教学系统',0),(2,'WEB_SITE_DESCRIPTION',2,'网站描述',1,'','网站搜索引擎描述',1378898976,1379235841,1,'集创思在线教学系统',1),(3,'WEB_SITE_KEYWORD',2,'网站关键字',1,'','网站搜索引擎关键字',1378898976,1381390100,1,'集创思在线教学系统',8),(4,'WEB_SITE_CLOSE',4,'关闭站点',1,'0:关闭,1:开启','站点关闭后其他用户不能访问，管理员可以正常访问',1378898976,1379235296,1,'1',1),(9,'CONFIG_TYPE_LIST',3,'配置类型列表',4,'','主要用于数据解析和页面表单的生成',1378898976,1379235348,1,'0:数字\r\n1:字符\r\n2:文本\r\n3:数组\r\n4:枚举',2),(10,'WEB_SITE_ICP',1,'网站备案号',1,'','设置在网站底部显示的备案号，如“沪ICP备12007941号-2',1378900335,1379235859,1,'',9),(11,'DOCUMENT_POSITION',3,'文档推荐位',2,'','文档推荐位，推荐到多个位置KEY值相加即可',1379053380,1379235329,1,'1:列表页推荐\r\n2:频道页推荐\r\n4:网站首页推荐',3),(12,'DOCUMENT_DISPLAY',3,'文档可见性',2,'','文章可见性仅影响前台显示，后台不收影响',1379056370,1379235322,1,'0:所有人可见\r\n1:仅注册会员可见\r\n2:仅管理员可见',4),(13,'COLOR_STYLE',4,'后台色系',1,'default_color:默认\r\nblue_color:紫罗兰','后台颜色风格',1379122533,1379235904,1,'default_color',10),(20,'CONFIG_GROUP_LIST',3,'配置分组',4,'','配置分组',1379228036,1384418383,1,'1:基本\r\n2:内容\r\n3:用户\r\n4:系统\r\n5:支付',4),(21,'HOOKS_TYPE',3,'钩子的类型',4,'','类型 1-用于扩展显示内容，2-用于扩展业务处理',1379313397,1379313407,1,'1:视图\r\n2:控制器',6),(22,'AUTH_CONFIG',3,'Auth配置',4,'','自定义Auth.class.php类配置',1379409310,1379409564,1,'AUTH_ON:1\r\nAUTH_TYPE:2',8),(23,'OPEN_DRAFTBOX',4,'是否开启草稿功能',2,'0:关闭草稿功能\r\n1:开启草稿功能\r\n','新增文章时的草稿功能配置',1379484332,1379484591,1,'1',1),(24,'DRAFT_AOTOSAVE_INTERVAL',0,'自动保存草稿时间',2,'','自动保存草稿的时间间隔，单位：秒',1379484574,1386143323,1,'60',2),(25,'LIST_ROWS',0,'后台每页记录数',2,'','后台数据每页显示记录数',1379503896,1535103758,1,'20',10),(26,'USER_ALLOW_REGISTER',4,'是否允许用户注册',3,'0:关闭注册\r\n1:允许注册','是否开放用户注册',1379504487,1379504580,1,'1',3),(27,'CODEMIRROR_THEME',4,'预览插件的CodeMirror主题',4,'3024-day:3024 day\r\n3024-night:3024 night\r\nambiance:ambiance\r\nbase16-dark:base16 dark\r\nbase16-light:base16 light\r\nblackboard:blackboard\r\ncobalt:cobalt\r\neclipse:eclipse\r\nelegant:elegant\r\nerlang-dark:erlang-dark\r\nlesser-dark:lesser-dark\r\nmidnight:midnight','详情见CodeMirror官网',1379814385,1384740813,1,'ambiance',3),(28,'DATA_BACKUP_PATH',1,'数据库备份根路径',4,'','路径必须以 / 结尾',1381482411,1381482411,1,'./Data/',5),(29,'DATA_BACKUP_PART_SIZE',0,'数据库备份卷大小',4,'','该值用于限制压缩后的分卷最大长度。单位：B；建议设置20M',1381482488,1381729564,1,'20971520',7),(30,'DATA_BACKUP_COMPRESS',4,'数据库备份文件是否启用压缩',4,'0:不压缩\r\n1:启用压缩','压缩备份文件需要PHP环境支持gzopen,gzwrite函数',1381713345,1381729544,1,'1',9),(31,'DATA_BACKUP_COMPRESS_LEVEL',4,'数据库备份文件压缩级别',4,'1:普通\r\n4:一般\r\n9:最高','数据库备份文件的压缩级别，该配置在开启压缩时生效',1381713408,1381713408,1,'9',10),(32,'DEVELOP_MODE',4,'开启开发者模式',4,'0:关闭\r\n1:开启','是否开启开发者模式',1383105995,1383291877,1,'0',11),(33,'ALLOW_VISIT',3,'不受限控制器方法',0,'','',1386644047,1386644741,1,'0:article/draftbox\r\n1:article/mydocument\r\n2:Category/tree\r\n3:Index/verify\r\n4:file/upload\r\n5:file/download\r\n6:user/updatePassword\r\n7:user/updateNickname\r\n8:user/submitPassword\r\n9:user/submitNickname\r\n10:file/uploadpicture',0),(34,'DENY_VISIT',3,'超管专限控制器方法',0,'','仅超级管理员可访问的控制器方法',1386644141,1386644659,1,'0:Addons/addhook\r\n1:Addons/edithook\r\n2:Addons/delhook\r\n3:Addons/updateHook\r\n4:Admin/getMenus\r\n5:Admin/recordList\r\n6:AuthManager/updateRules\r\n7:AuthManager/tree',0),(35,'REPLY_LIST_ROWS',0,'回复列表每页条数',2,'','',1386645376,1387178083,1,'10',0),(36,'ADMIN_ALLOW_IP',2,'后台允许访问IP',4,'','多个用逗号分隔，如果不配置表示不限制IP访问',1387165454,1387165553,1,'',12),(37,'SHOW_PAGE_TRACE',4,'是否显示页面Trace',4,'0:关闭\r\n1:开启','是否显示页面Trace信息',1387165685,1387165685,1,'0',1),(38,'_EXPRESSION_EXPRESSION',0,'',0,'','',0,0,0,'miniblog',0),(39,'VERIFY_OPEN',4,'验证码配置',4,'0:全部关闭\r\n1:全部显示\r\n2:注册显示\r\n3:登陆显示','验证码配置',1429798325,1429798360,1,'2',0),(40,'WEB_SITE',0,'网站名称',1,'','用于邮件,短信,站内信显示',1429798544,1429798544,1,'集创思在线教学系统',0),(41,'ALIPAYPARTNER',1,'1-支付宝商户号',5,'','这里是你在成功申请支付宝接口后获取到的PID',1431010036,1431010036,1,'231',0),(42,'ALIPAYKEY',1,'支付宝密钥',5,'','这里是你在成功申请支付宝接口后获取到的Key',1431010128,1431010128,1,'123',0),(43,'ALIPAYEMAIL',1,'支付宝收款账号',5,'','支付宝收款账号邮箱',1431010180,1431010180,1,'123123',0),(44,'DEFAULT_LAYOUT',2,'默认布局',0,'','defaultlayout  whiteboardlayout gaopaiyilayout',1532097861,1532101076,1,'defaultlayout',0),(1004,'_CONFIG_QRCODE',0,'',0,'','',1427339647,1427339647,1,'',0),(1006,'_CONFIG_SUBSCRIB_US',0,'',0,'','',1427339647,1427339647,1,'<p>业务QQ：276905621</p><p>联系地址：浙江省桐乡市环城南路1号电子商务中心</p><p>联系电话：0573-88037510</p>',0),(10006,'_CONFIG_JUMP_BACKGROUND',0,'',0,'','',1533355155,1533355155,1,'',0),(10007,'_CONFIG_SUCCESS_WAIT_TIME',0,'',0,'','',1533355155,1533355155,1,'2',0),(10008,'_CONFIG_ERROR_WAIT_TIME',0,'',0,'','',1533355155,1533355155,1,'5',0),(10009,'_CONFIG_OPEN_IM',0,'',0,'','',1533355155,1533355155,1,'1',0),(10010,'_CONFIG_GET_INFORMATION',0,'',0,'','',1533355155,1533355155,1,'1',0),(10011,'_CONFIG_GET_INFORMATION_INTERN',0,'',0,'','',1533355155,1533355155,1,'10',0),(10012,'_CONFIG_PICTURE_UPLOAD_DRIVER',0,'',0,'','',1533355155,1533355155,1,'local',0),(10013,'_CONFIG_DOWNLOAD_UPLOAD_DRIVER',0,'',0,'','',1533355155,1533355155,1,'local',0),(10014,'_CONFIG_WEBSOCKET_ADDRESS',0,'',0,'','',1533355155,1533355155,1,'127.0.0.1',0),(10015,'_CONFIG_WEBSOCKET_PORT',0,'',0,'','',1533355155,1533355155,1,'8000',0),(10019,'_CONFIG_FIRST_USER_RUN',0,'',0,'','',1533398402,1533398402,1,'2018-08-05',0),(10040,'_CONFIG_COMPANY',0,'',0,'','',1533479648,1533479648,1,'<div class=\"link-partner-con clearfix\" style=\"margin:0px;padding:0px;font-family:&quot;color:#E9E4E4;background-color:#FAFAFA;\">\r\n\t<a href=\"http://www.233.com/about/link.htm\"><strong>友情链接：</strong></a><a href=\"http://edu.qq.com/\" target=\"_blank\">腾讯教育</a>&nbsp;&nbsp;<a href=\"http://edu.163.com/\" target=\"_blank\">网易教育</a>&nbsp;&nbsp;<a href=\"http://www.233.com/\" target=\"_blank\">233网校</a>&nbsp;&nbsp;<a href=\"http://www.51test.net/\" target=\"_blank\">无忧考网</a><a href=\"http://www.exam8.com/\" target=\"_blank\">考试吧</a>&nbsp;<a href=\"http://www.kaoyan.com/\" target=\"_blank\">考研帮</a>&nbsp;&nbsp;<a href=\"http://www.kekenet.com/\" target=\"_blank\">可可英语</a>&nbsp;&nbsp;<a href=\"http://www.offcn.com/\" target=\"_blank\">公务员考试网</a>&nbsp;&nbsp;<a href=\"http://www.tingroom.com/\" target=\"_blank\">在线英语听力室</a>&nbsp;&nbsp;<a href=\"http://www.zxxk.com/\" target=\"_blank\">中学学科网</a>&nbsp;&nbsp;<a href=\"http://www.24en.com/\" target=\"_blank\">爱思英语</a>&nbsp;&nbsp;<a href=\"http://www.ichacha.net/\" target=\"_blank\">在线翻译</a>&nbsp;&nbsp;<a href=\"http://www.docin.com/\" target=\"_blank\">豆丁网</a>&nbsp;&nbsp;<a href=\"http://www.tingclass.net/\" target=\"_blank\">听力课堂</a>&nbsp;&nbsp;<a href=\"http://www.chinakaoyan.com/\" target=\"_blank\">中国考研网</a><a href=\"http://www.233.com/about/link.htm\" target=\"_blank\"></a> \r\n</div>\r\n<p>\r\n\t<br />\r\n</p>\r\n<p>\r\n\t<a href=\"/index.php?s=/aboutus/index/detail/id/1.html\">关于我们</a> | <a href=\"/index.php?s=/aboutus/index/detail/id/4.html\">联系我们</a> | <a href=\"/index.php?s=/aboutus/index/detail/id/2.html\">人才招聘</a>&nbsp; 客服热线：4008 096 xxx\r\n</p>\r\n<p>\r\n\tCopyright &copy; 2018 在线教学平台 All rights reserved 版权所有 复制必究 备案号：京ICP备xxxx号\r\n</p>\r\n<p>\r\n\t<br />\r\n</p>\r\n<table style=\"width:100%;\">\r\n\t<tbody>\r\n\t\t<tr>\r\n\t\t\t<td align=\"center\">\r\n\t\t\t\t<table style=\"width:80%;\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" bordercolor=\"#000000\" class=\"ke-zeroborder\" align=\"center\">\r\n\t\t\t\t\t<tbody>\r\n\t\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t\t<td align=\"center\">\r\n\t\t\t\t\t\t\t\t<span><img src=\"/Uploads/Editor/2018-05-09/5af30f983b47b.jpg\" alt=\"\" /><br />\r\n</span> \r\n\t\t\t\t\t\t\t</td>\r\n\t\t\t\t\t\t\t<td align=\"center\">\r\n\t\t\t\t\t\t\t\t<img src=\"/Uploads/Editor/2018-05-09/5af30f984f232.jpg\" alt=\"\" /><span><br />\r\n</span> \r\n\t\t\t\t\t\t\t</td>\r\n\t\t\t\t\t\t\t<td align=\"center\">\r\n\t\t\t\t\t\t\t\t<img src=\"/Uploads/Editor/2018-05-09/5af30f986f0c7.jpg\" alt=\"\" /><span><br />\r\n</span> \r\n\t\t\t\t\t\t\t</td>\r\n\t\t\t\t\t\t\t<td align=\"center\">\r\n\t\t\t\t\t\t\t\t<img src=\"/Uploads/Editor/2018-05-09/5af30f988ebad.jpg\" alt=\"\" /> \r\n\t\t\t\t\t\t\t</td>\r\n\t\t\t\t\t\t\t<td align=\"center\">\r\n\t\t\t\t\t\t\t\t<img src=\"/Uploads/Editor/2018-05-09/5af30f98b0426.jpg\" alt=\"\" /> <br />\r\n\t\t\t\t\t\t\t</td>\r\n\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t</tbody>\r\n\t\t\t\t</table>\r\n\t\t\t</td>\r\n\t\t</tr>\r\n\t</tbody>\r\n</table>',0),(10181,'_CONFIG_ICP',0,'',0,'','',1533481574,1533481574,1,'111',0),(10183,'_CONFIG_QRCODE_BOTTOM',0,'',0,'','',1533481574,1533481574,1,'',0),(10200,'_CONFIG_WXPAY_APPSECRET',0,'微信公众帐号secert',0,'','',1535725921,1535725921,0,'',0),(10205,'_CONFIG_ABOUT_US',0,'',0,'','',1533999826,1533999826,1,'暂无内容',0),(10406,'_CONFIG_APP_ANDROID_URL',0,'',0,'','',1535725921,1535725921,1,'',0),(10408,'_CONFIG_APP_IOS_URL',0,'',0,'','',1535725921,1535725921,1,'',0),(10429,'_CONFIG_APP_ANDROID_QRCODE',0,'',0,'','',1535987263,1535987263,1,'170',0),(10430,'_CONFIG_APP_IOS_QRCODE',0,'',0,'','',1535987263,1535987263,1,'170',0),(10457,'_CONFIG_WEB_SITE_NAME',0,'',0,'','',1537268365,1537268365,1,'蒲公英在线教学平台',0),(10458,'_CONFIG_WEB_SITE_DESCRIPTION',0,'',0,'','',1537268365,1537268365,1,'网站描述网站描述',0),(10459,'_CONFIG_WEB_SITE_KEYWORD',0,'',0,'','',1537268365,1537268365,1,'网站关键字 网站关键字 ',0),(10460,'_CONFIG_LOGO',0,'',0,'','',1537268365,1537268365,1,'160',0),(10461,'_CONFIG_APP_DOWNLOAD_QRCODE',0,'',0,'','',1537268365,1537268365,1,'175',0),(10462,'_CONFIG_WEBSITE_QRCODE',0,'',0,'','',1537268365,1537268365,1,'174',0),(10463,'_CONFIG_COPY_RIGHT',0,'',0,'','',1537268365,1537268365,1,'<div class=\"link-partner-con clearfix\" style=\"margin:0px;padding:0px;font-family:&quot;color:#E9E4E4;background-color:#FAFAFA;\">\r\n\t<a href=\"http://www.233.com/about/link.htm\"><strong>友情链接：</strong></a><a href=\"http://edu.qq.com/\" target=\"_blank\">腾讯教育</a>&nbsp;&nbsp;<a href=\"http://edu.163.com/\" target=\"_blank\">网易教育</a>&nbsp;&nbsp;<a href=\"http://www.233.com/\" target=\"_blank\">233网校</a>&nbsp;&nbsp;<a href=\"http://www.51test.net/\" target=\"_blank\">无忧考网</a><a href=\"http://www.exam8.com/\" target=\"_blank\">考试吧</a>&nbsp;<a href=\"http://www.kaoyan.com/\" target=\"_blank\">考研帮</a>&nbsp;&nbsp;<a href=\"http://www.kekenet.com/\" target=\"_blank\">可可英语</a>&nbsp;&nbsp;<a href=\"http://www.offcn.com/\" target=\"_blank\">公务员考试网</a>&nbsp;&nbsp;<a href=\"http://www.tingroom.com/\" target=\"_blank\">在线英语听力室</a>&nbsp;&nbsp;<a href=\"http://www.zxxk.com/\" target=\"_blank\">中学学科网</a>&nbsp;&nbsp;<a href=\"http://www.24en.com/\" target=\"_blank\">爱思英语</a>&nbsp;&nbsp;<a href=\"http://www.ichacha.net/\" target=\"_blank\">在线翻译</a>&nbsp;&nbsp;<a href=\"http://www.docin.com/\" target=\"_blank\">豆丁网</a>&nbsp;&nbsp;<a href=\"http://www.tingclass.net/\" target=\"_blank\">听力课堂</a>&nbsp;&nbsp;<a href=\"http://www.chinakaoyan.com/\" target=\"_blank\">中国考研网</a><a href=\"http://www.233.com/about/link.htm\" target=\"_blank\"></a> \r\n</div>\r\n<p>\r\n\t<br />\r\n</p>\r\n<p>\r\n\t<a href=\"/index.php?s=/aboutus/index/detail/id/1.html\">关于我们</a> | <a href=\"/index.php?s=/aboutus/index/detail/id/4.html\">联系我们</a> | <a href=\"/index.php?s=/aboutus/index/detail/id/2.html\">人才招聘</a>&nbsp; 客服热线：4008 096 xxx\r\n</p>\r\n<p>\r\n\tCopyright &copy; 2018 在线教学平台 All rights reserved 版权所有 复制必究 备案号：<span style=\"color:#434343;font-family:&quot;background-color:#FFFFFF;\">粤ICP备14058704号-3</span> \r\n</p>\r\n<p>\r\n\t<br />\r\n</p>\r\n<div style=\"text-align:center;\">\r\n\t<img src=\"/Uploads/Editor/2018-05-09/5af30f983b47b.jpg\" alt=\"\" />&nbsp;&nbsp;<img src=\"/Uploads/Editor/2018-05-09/5af30f984f232.jpg\" alt=\"\" />&nbsp;&nbsp;<img src=\"/Uploads/Editor/2018-05-09/5af30f986f0c7.jpg\" alt=\"\" />&nbsp;&nbsp;<img src=\"/Uploads/Editor/2018-05-09/5af30f988ebad.jpg\" alt=\"\" />&nbsp;&nbsp;<img src=\"/Uploads/Editor/2018-05-09/5af30f98b0426.jpg\" alt=\"\" /> \r\n</div>',0),(10464,'_CONFIG_ALIPAY_STATUS',0,'',0,'','',1537268365,1537268365,1,'1',0),(10465,'_CONFIG_ALIPAY_APPID',0,'',0,'','',1537268365,1537268365,1,'2018081461016340',0),(10466,'_CONFIG_ALIPAY_PRIVATE_KEY',0,'',0,'','',1537268365,1537268365,1,'MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQCK4ShH42HS4kKz3LOg4pGCST79O6cHQydtX7I/cVganaTycntYZ/S6kFxlwpP+udq2VlBI4Qd6SS9XCC4DYqm4udiJSiae9Kj8VXQrS/f7am22WTqCq4nwF4OsEgGVD6HuXFBQoHjftWeDgt2wBXvE1kZJN0N38iD52eA6DROOtWQY1Qz+P+S9dXAydHOtoMa9jU49APahz1LbkBssdHjv886uBtLjVPUFmPntQuCXvzVmAEedr5+gk9rWC97vaHKERobu9PjSNBbsl6hzuHNE95irSaT41D+nETk85j8yAzWq9NmlCJuK6uZiaBG1c2YN8C0ESp9GrDTHOKqBntN9AgMBAAECggEAHcrdZEaQFrg5DPKcijfwdR2XaKWiWDl8vMbZqyh6eQM2flg2w6lRY7BSUfYi33MpSxJLGMdFXmNSx33WuR0yQZGEtTb2AAWGNtNyH1OluAaF0KdlmOCJr7qroX8fXcXDvCmLhTBXnc4BjcHGItuaSIia/VvgmluT3WVy56Ekf+lyup9gtL7TNi97gigBF5wekshGiFja1XGgmQbym3yxhhBs6ZYH7y9MQBDXCrMz/GXiA7HEN2BeK6QaODewxeiBsFA/5aQnSDJfIf8LyWKI75Jm5PmtAPzfTKDI+r3Jkw70Bsed7v5FzJULmg5xkhzMJzz6kHSpM3aUIZALEhnXgQKBgQDFbRSeY6wi6cXkp3Rc0u65AJWiMisvdUKjEWrTpnbBO9l2eZzN0gLGxTiJ4fKp3xpZrQ5bKXAikeYelQk5s19IymUuAgF8lYQZRRnWlBzJxiG+bWMLM7fHbf4VwDQ9uBQBm5njZxqz4QBNTa+7X6xiJ1ctlUVYlH4rpXjidV1XnQKBgQC0FVf2DuLuOF5krGLi++L6VETDW0/LB2UU1miWH6ayWsCcc6eqeVzl2JDRJJCR60kYgv7tLgqw00aoKeL2RZJ79gs5Y77c3Z/srUKuVwRETmSxhQhqRNTLOoMA5g6FE0yKgLscSZ2gFj6TDUo7/qixRI22OcYBlzdiXxeOLVfVYQKBgQC61ZkOr9rmi3+I/WQkuEXM9J2nCn1OA1WVxtTnCYEXK5GIClz3dwjDnT79VcP1OLrSJPESGqwROyugw4Agh/zjgQ6xtJo9ka2a0Ic8R5za4tNqSFDT+BSy+gfcA7IsunjMcLn4t8lQc916SsvEsi0MEpjw/XPL+XNR0N4Oye0VDQKBgEWDn6q54Ft4oudVq+5WsS1Ubh7DFrAWsKw0f7bDjQN4CLXb5zLlGjkXOf+hj7TkEBlIJ8PCbBoJ1FKBqLzL6lmzhm2m1TxIyL0BvKWzrU/4uuHTqoXrAAFbGsq0A5LW+krUmmW2/QOY0prNHITALroO7m0TLB3dE2IDtwII+sjBAoGABdC61Zf63m6BQhoafpW455SDgGqHZxdo2tMBaTLBhMRXvm0DiRqgbNzlbtD/snVGnyXEl0wE1adFo3fh6a9m0oLOgIpH6ClVHPoz5Zviuceu0J4Hl9TMDBovJTbqyTj7fT9esYkfZz7/+CKCREJC1ztsUFRHt4tBx3BMO5d+/yE=',0),(10467,'_CONFIG_ALIPAY_PUBLIC_KEY',0,'',0,'','',1537268365,1537268365,1,'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAqKz6sjzhrIsvD9/4J/kod5Pc1BNdjMxnqfVBZVbAEx/yl4nAyA2Qxa9VJtmEqeyYwxgo+Uu6h9o37+r4H3fICrY/26L5Qciv+AMH/d/fCvDg8aUKycJx2e7FgnXnf/UpkJwxXNy4CvMfIlGagS7xOkeHSEGKVdVQGtgmtnARP0/aQVmc3tgW93yu/Y32p+fD4DonViiwWVmQLjaLXSTLNmmlylBsXCnYeHrIOmpHmQsnpMnPbDVqF6HEmhE/snPxoMm9c+7bxZHRZDKQkEl2CRHX4bivUmBH9/dJW/dTBYf54gNid5QM+P7LKojY9oXvnkHWOZAGn0uCoM7R7WQGEwIDAQAB',0),(10468,'_CONFIG_WXPAY_STATUS',0,'',0,'','',1537268365,1537268365,1,'1',0),(10469,'_CONFIG_WXPAY_APPID',0,'',0,'','',1537268365,1537268365,1,'wxc854b7a102d4ebc1',0),(10470,'_CONFIG_WXPAY_MCHID',0,'',0,'','',1537268365,1537268365,1,'1273297701',0),(10471,'_CONFIG_WXPAY_KEY',0,'',0,'','',1537268365,1537268365,1,'8934e7d15453e97507ef794cf7b0520d',0),(10472,'_CONFIG_MEETINGWEB_URL',0,'',0,'','',1537268365,1537268365,1,'http://www.zaixianjiaoxue.net/meeting/meeting.php',0);
/*!40000 ALTER TABLE `onethink_config` ENABLE KEYS */;

#
# Structure for table "onethink_custom"
#

DROP TABLE IF EXISTS `onethink_custom`;
CREATE TABLE `onethink_custom` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(25) NOT NULL COMMENT '标题',
  `content` varchar(1000) NOT NULL COMMENT '内容',
  `companyid` int(11) NOT NULL,
  `changetime` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '状态，-1：删除；0：禁用；1：启用；2：未审核',
  `createtime` int(11) NOT NULL COMMENT '创建时间',
  `category` int(11) NOT NULL COMMENT '分类',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='定制服务';

#
# Data for table "onethink_custom"
#

/*!40000 ALTER TABLE `onethink_custom` DISABLE KEYS */;
/*!40000 ALTER TABLE `onethink_custom` ENABLE KEYS */;

#
# Structure for table "onethink_custom_category"
#

DROP TABLE IF EXISTS `onethink_custom_category`;
CREATE TABLE `onethink_custom_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(25) NOT NULL,
  `createtime` int(11) NOT NULL,
  `updatetime` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `pid` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

#
# Data for table "onethink_custom_category"
#

/*!40000 ALTER TABLE `onethink_custom_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `onethink_custom_category` ENABLE KEYS */;

#
# Structure for table "onethink_district"
#

DROP TABLE IF EXISTS `onethink_district`;
CREATE TABLE `onethink_district` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `level` tinyint(4) unsigned NOT NULL DEFAULT '0',
  `upid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=910007 DEFAULT CHARSET=utf8 COMMENT='中国省市区乡镇数据表';

#
# Data for table "onethink_district"
#

/*!40000 ALTER TABLE `onethink_district` DISABLE KEYS */;
INSERT INTO `onethink_district` VALUES (110000,'北京市',1,0),(110100,'北京市',2,110000),(110101,'东城区',3,110100),(110102,'西城区',3,110100),(110103,'崇文区',3,110100),(110104,'宣武区',3,110100),(110105,'朝阳区',3,110100),(110106,'丰台区',3,110100),(110107,'石景山区',3,110100),(110108,'海淀区',3,110100),(110109,'门头沟区',3,110100),(110111,'房山区',3,110100),(110112,'通州区',3,110100),(110113,'顺义区',3,110100),(110114,'昌平区',3,110100),(110115,'大兴区',3,110100),(110116,'怀柔区',3,110100),(110117,'平谷区',3,110100),(110200,'县',2,110000),(110228,'密云县',3,110200),(110229,'延庆县',3,110200),(120000,'天津市',1,0),(120100,'市辖区',2,120000),(120101,'和平区',3,120100),(120102,'河东区',3,120100),(120103,'河西区',3,120100),(120104,'南开区',3,120100),(120105,'河北区',3,120100),(120106,'红桥区',3,120100),(120107,'塘沽区',3,120100),(120108,'汉沽区',3,120100),(120109,'大港区',3,120100),(120110,'东丽区',3,120100),(120111,'西青区',3,120100),(120112,'津南区',3,120100),(120113,'北辰区',3,120100),(120114,'武清区',3,120100),(120115,'宝坻区',3,120100),(120200,'县',2,120000),(120221,'宁河县',3,120200),(120223,'静海县',3,120200),(120225,'蓟　县',3,120200),(130000,'河北省',1,0),(130100,'石家庄市',2,130000),(130101,'市辖区',3,130100),(130102,'长安区',3,130100),(130103,'桥东区',3,130100),(130104,'桥西区',3,130100),(130105,'新华区',3,130100),(130107,'井陉矿区',3,130100),(130108,'裕华区',3,130100),(130121,'井陉县',3,130100),(130123,'正定县',3,130100),(130124,'栾城县',3,130100),(130125,'行唐县',3,130100),(130126,'灵寿县',3,130100),(130127,'高邑县',3,130100),(130128,'深泽县',3,130100),(130129,'赞皇县',3,130100),(130130,'无极县',3,130100),(130131,'平山县',3,130100),(130132,'元氏县',3,130100),(130133,'赵　县',3,130100),(130181,'辛集市',3,130100),(130182,'藁城市',3,130100),(130183,'晋州市',3,130100),(130184,'新乐市',3,130100),(130185,'鹿泉市',3,130100),(130200,'唐山市',2,130000),(130201,'市辖区',3,130200),(130202,'路南区',3,130200),(130203,'路北区',3,130200),(130204,'古冶区',3,130200),(130205,'开平区',3,130200),(130207,'丰南区',3,130200),(130208,'丰润区',3,130200),(130223,'滦　县',3,130200),(130224,'滦南县',3,130200),(130225,'乐亭县',3,130200),(130227,'迁西县',3,130200),(130229,'玉田县',3,130200),(130230,'唐海县',3,130200),(130281,'遵化市',3,130200),(130283,'迁安市',3,130200),(130300,'秦皇岛市',2,130000),(130301,'市辖区',3,130300),(130302,'海港区',3,130300),(130303,'山海关区',3,130300),(130304,'北戴河区',3,130300),(130321,'青龙满族自治县',3,130300),(130322,'昌黎县',3,130300),(130323,'抚宁县',3,130300),(130324,'卢龙县',3,130300),(130400,'邯郸市',2,130000),(130401,'市辖区',3,130400),(130402,'邯山区',3,130400),(130403,'丛台区',3,130400),(130404,'复兴区',3,130400),(130406,'峰峰矿区',3,130400),(130421,'邯郸县',3,130400),(130423,'临漳县',3,130400),(130424,'成安县',3,130400),(130425,'大名县',3,130400),(130426,'涉　县',3,130400),(130427,'磁　县',3,130400),(130428,'肥乡县',3,130400),(130429,'永年县',3,130400),(130430,'邱　县',3,130400),(130431,'鸡泽县',3,130400),(130432,'广平县',3,130400),(130433,'馆陶县',3,130400),(130434,'魏　县',3,130400),(130435,'曲周县',3,130400),(130481,'武安市',3,130400),(130500,'邢台市',2,130000),(130501,'市辖区',3,130500),(130502,'桥东区',3,130500),(130503,'桥西区',3,130500),(130521,'邢台县',3,130500),(130522,'临城县',3,130500),(130523,'内丘县',3,130500),(130524,'柏乡县',3,130500),(130525,'隆尧县',3,130500),(130526,'任　县',3,130500),(130527,'南和县',3,130500),(130528,'宁晋县',3,130500),(130529,'巨鹿县',3,130500),(130530,'新河县',3,130500),(130531,'广宗县',3,130500),(130532,'平乡县',3,130500),(130533,'威　县',3,130500),(130534,'清河县',3,130500),(130535,'临西县',3,130500),(130581,'南宫市',3,130500),(130582,'沙河市',3,130500),(130600,'保定市',2,130000),(130601,'市辖区',3,130600),(130602,'新市区',3,130600),(130603,'北市区',3,130600),(130604,'南市区',3,130600),(130621,'满城县',3,130600),(130622,'清苑县',3,130600),(130623,'涞水县',3,130600),(130624,'阜平县',3,130600),(130625,'徐水县',3,130600),(130626,'定兴县',3,130600),(130627,'唐　县',3,130600),(130628,'高阳县',3,130600),(130629,'容城县',3,130600),(130630,'涞源县',3,130600),(130631,'望都县',3,130600),(130632,'安新县',3,130600),(130633,'易　县',3,130600),(130634,'曲阳县',3,130600),(130635,'蠡　县',3,130600),(130636,'顺平县',3,130600),(130637,'博野县',3,130600),(130638,'雄　县',3,130600),(130681,'涿州市',3,130600),(130682,'定州市',3,130600),(130683,'安国市',3,130600),(130684,'高碑店市',3,130600),(130700,'张家口市',2,130000),(130701,'市辖区',3,130700),(130702,'桥东区',3,130700),(130703,'桥西区',3,130700),(130705,'宣化区',3,130700),(130706,'下花园区',3,130700),(130721,'宣化县',3,130700),(130722,'张北县',3,130700),(130723,'康保县',3,130700),(130724,'沽源县',3,130700),(130725,'尚义县',3,130700),(130726,'蔚　县',3,130700),(130727,'阳原县',3,130700),(130728,'怀安县',3,130700),(130729,'万全县',3,130700),(130730,'怀来县',3,130700),(130731,'涿鹿县',3,130700),(130732,'赤城县',3,130700),(130733,'崇礼县',3,130700),(130800,'承德市',2,130000),(130801,'市辖区',3,130800),(130802,'双桥区',3,130800),(130803,'双滦区',3,130800),(130804,'鹰手营子矿区',3,130800),(130821,'承德县',3,130800),(130822,'兴隆县',3,130800),(130823,'平泉县',3,130800),(130824,'滦平县',3,130800),(130825,'隆化县',3,130800),(130826,'丰宁满族自治县',3,130800),(130827,'宽城满族自治县',3,130800),(130828,'围场满族蒙古族自治县',3,130800),(130900,'沧州市',2,130000),(130901,'市辖区',3,130900),(130902,'新华区',3,130900),(130903,'运河区',3,130900),(130921,'沧　县',3,130900),(130922,'青　县',3,130900),(130923,'东光县',3,130900),(130924,'海兴县',3,130900),(130925,'盐山县',3,130900),(130926,'肃宁县',3,130900),(130927,'南皮县',3,130900),(130928,'吴桥县',3,130900),(130929,'献　县',3,130900),(130930,'孟村回族自治县',3,130900),(130981,'泊头市',3,130900),(130982,'任丘市',3,130900),(130983,'黄骅市',3,130900),(130984,'河间市',3,130900),(131000,'廊坊市',2,130000),(131001,'市辖区',3,131000),(131002,'安次区',3,131000),(131003,'广阳区',3,131000),(131022,'固安县',3,131000),(131023,'永清县',3,131000),(131024,'香河县',3,131000),(131025,'大城县',3,131000),(131026,'文安县',3,131000),(131028,'大厂回族自治县',3,131000),(131081,'霸州市',3,131000),(131082,'三河市',3,131000),(131100,'衡水市',2,130000),(131101,'市辖区',3,131100),(131102,'桃城区',3,131100),(131121,'枣强县',3,131100),(131122,'武邑县',3,131100),(131123,'武强县',3,131100),(131124,'饶阳县',3,131100),(131125,'安平县',3,131100),(131126,'故城县',3,131100),(131127,'景　县',3,131100),(131128,'阜城县',3,131100),(131181,'冀州市',3,131100),(131182,'深州市',3,131100),(140000,'山西省',1,0),(140100,'太原市',2,140000),(140101,'市辖区',3,140100),(140105,'小店区',3,140100),(140106,'迎泽区',3,140100),(140107,'杏花岭区',3,140100),(140108,'尖草坪区',3,140100),(140109,'万柏林区',3,140100),(140110,'晋源区',3,140100),(140121,'清徐县',3,140100),(140122,'阳曲县',3,140100),(140123,'娄烦县',3,140100),(140181,'古交市',3,140100),(140200,'大同市',2,140000),(140201,'市辖区',3,140200),(140202,'城　区',3,140200),(140203,'矿　区',3,140200),(140211,'南郊区',3,140200),(140212,'新荣区',3,140200),(140221,'阳高县',3,140200),(140222,'天镇县',3,140200),(140223,'广灵县',3,140200),(140224,'灵丘县',3,140200),(140225,'浑源县',3,140200),(140226,'左云县',3,140200),(140227,'大同县',3,140200),(140300,'阳泉市',2,140000),(140301,'市辖区',3,140300),(140302,'城　区',3,140300),(140303,'矿　区',3,140300),(140311,'郊　区',3,140300),(140321,'平定县',3,140300),(140322,'盂　县',3,140300),(140400,'长治市',2,140000),(140401,'市辖区',3,140400),(140402,'城　区',3,140400),(140411,'郊　区',3,140400),(140421,'长治县',3,140400),(140423,'襄垣县',3,140400),(140424,'屯留县',3,140400),(140425,'平顺县',3,140400),(140426,'黎城县',3,140400),(140427,'壶关县',3,140400),(140428,'长子县',3,140400),(140429,'武乡县',3,140400),(140430,'沁　县',3,140400),(140431,'沁源县',3,140400),(140481,'潞城市',3,140400),(140500,'晋城市',2,140000),(140501,'市辖区',3,140500),(140502,'城　区',3,140500),(140521,'沁水县',3,140500),(140522,'阳城县',3,140500),(140524,'陵川县',3,140500),(140525,'泽州县',3,140500),(140581,'高平市',3,140500),(140600,'朔州市',2,140000),(140601,'市辖区',3,140600),(140602,'朔城区',3,140600),(140603,'平鲁区',3,140600),(140621,'山阴县',3,140600),(140622,'应　县',3,140600),(140623,'右玉县',3,140600),(140624,'怀仁县',3,140600),(140700,'晋中市',2,140000),(140701,'市辖区',3,140700),(140702,'榆次区',3,140700),(140721,'榆社县',3,140700),(140722,'左权县',3,140700),(140723,'和顺县',3,140700),(140724,'昔阳县',3,140700),(140725,'寿阳县',3,140700),(140726,'太谷县',3,140700),(140727,'祁　县',3,140700),(140728,'平遥县',3,140700),(140729,'灵石县',3,140700),(140781,'介休市',3,140700),(140800,'运城市',2,140000),(140801,'市辖区',3,140800),(140802,'盐湖区',3,140800),(140821,'临猗县',3,140800),(140822,'万荣县',3,140800),(140823,'闻喜县',3,140800),(140824,'稷山县',3,140800),(140825,'新绛县',3,140800),(140826,'绛　县',3,140800),(140827,'垣曲县',3,140800),(140828,'夏　县',3,140800),(140829,'平陆县',3,140800),(140830,'芮城县',3,140800),(140881,'永济市',3,140800),(140882,'河津市',3,140800),(140900,'忻州市',2,140000),(140901,'市辖区',3,140900),(140902,'忻府区',3,140900),(140921,'定襄县',3,140900),(140922,'五台县',3,140900),(140923,'代　县',3,140900),(140924,'繁峙县',3,140900),(140925,'宁武县',3,140900),(140926,'静乐县',3,140900),(140927,'神池县',3,140900),(140928,'五寨县',3,140900),(140929,'岢岚县',3,140900),(140930,'河曲县',3,140900),(140931,'保德县',3,140900),(140932,'偏关县',3,140900),(140981,'原平市',3,140900),(141000,'临汾市',2,140000),(141001,'市辖区',3,141000),(141002,'尧都区',3,141000),(141021,'曲沃县',3,141000),(141022,'翼城县',3,141000),(141023,'襄汾县',3,141000),(141024,'洪洞县',3,141000),(141025,'古　县',3,141000),(141026,'安泽县',3,141000),(141027,'浮山县',3,141000),(141028,'吉　县',3,141000),(141029,'乡宁县',3,141000),(141030,'大宁县',3,141000),(141031,'隰　县',3,141000),(141032,'永和县',3,141000),(141033,'蒲　县',3,141000),(141034,'汾西县',3,141000),(141081,'侯马市',3,141000),(141082,'霍州市',3,141000),(141100,'吕梁市',2,140000),(141101,'市辖区',3,141100),(141102,'离石区',3,141100),(141121,'文水县',3,141100),(141122,'交城县',3,141100),(141123,'兴　县',3,141100),(141124,'临　县',3,141100),(141125,'柳林县',3,141100),(141126,'石楼县',3,141100),(141127,'岚　县',3,141100),(141128,'方山县',3,141100),(141129,'中阳县',3,141100),(141130,'交口县',3,141100),(141181,'孝义市',3,141100),(141182,'汾阳市',3,141100),(150000,'内蒙古',1,0),(150100,'呼和浩特市',2,150000),(150101,'市辖区',3,150100),(150102,'新城区',3,150100),(150103,'回民区',3,150100),(150104,'玉泉区',3,150100),(150105,'赛罕区',3,150100),(150121,'土默特左旗',3,150100),(150122,'托克托县',3,150100),(150123,'和林格尔县',3,150100),(150124,'清水河县',3,150100),(150125,'武川县',3,150100),(150200,'包头市',2,150000),(150201,'市辖区',3,150200),(150202,'东河区',3,150200),(150203,'昆都仑区',3,150200),(150204,'青山区',3,150200),(150205,'石拐区',3,150200),(150206,'白云矿区',3,150200),(150207,'九原区',3,150200),(150221,'土默特右旗',3,150200),(150222,'固阳县',3,150200),(150223,'达尔罕茂明安联合旗',3,150200),(150300,'乌海市',2,150000),(150301,'市辖区',3,150300),(150302,'海勃湾区',3,150300),(150303,'海南区',3,150300),(150304,'乌达区',3,150300),(150400,'赤峰市',2,150000),(150401,'市辖区',3,150400),(150402,'红山区',3,150400),(150403,'元宝山区',3,150400),(150404,'松山区',3,150400),(150421,'阿鲁科尔沁旗',3,150400),(150422,'巴林左旗',3,150400),(150423,'巴林右旗',3,150400),(150424,'林西县',3,150400),(150425,'克什克腾旗',3,150400),(150426,'翁牛特旗',3,150400),(150428,'喀喇沁旗',3,150400),(150429,'宁城县',3,150400),(150430,'敖汉旗',3,150400),(150500,'通辽市',2,150000),(150501,'市辖区',3,150500),(150502,'科尔沁区',3,150500),(150521,'科尔沁左翼中旗',3,150500),(150522,'科尔沁左翼后旗',3,150500),(150523,'开鲁县',3,150500),(150524,'库伦旗',3,150500),(150525,'奈曼旗',3,150500),(150526,'扎鲁特旗',3,150500),(150581,'霍林郭勒市',3,150500),(150600,'鄂尔多斯市',2,150000),(150602,'东胜区',3,150600),(150621,'达拉特旗',3,150600),(150622,'准格尔旗',3,150600),(150623,'鄂托克前旗',3,150600),(150624,'鄂托克旗',3,150600),(150625,'杭锦旗',3,150600),(150626,'乌审旗',3,150600),(150627,'伊金霍洛旗',3,150600),(150700,'呼伦贝尔市',2,150000),(150701,'市辖区',3,150700),(150702,'海拉尔区',3,150700),(150721,'阿荣旗',3,150700),(150722,'莫力达瓦达斡尔族自治旗',3,150700),(150723,'鄂伦春自治旗',3,150700),(150724,'鄂温克族自治旗',3,150700),(150725,'陈巴尔虎旗',3,150700),(150726,'新巴尔虎左旗',3,150700),(150727,'新巴尔虎右旗',3,150700),(150781,'满洲里市',3,150700),(150782,'牙克石市',3,150700),(150783,'扎兰屯市',3,150700),(150784,'额尔古纳市',3,150700),(150785,'根河市',3,150700),(150800,'巴彦淖尔市',2,150000),(150801,'市辖区',3,150800),(150802,'临河区',3,150800),(150821,'五原县',3,150800),(150822,'磴口县',3,150800),(150823,'乌拉特前旗',3,150800),(150824,'乌拉特中旗',3,150800),(150825,'乌拉特后旗',3,150800),(150826,'杭锦后旗',3,150800),(150900,'乌兰察布市',2,150000),(150901,'市辖区',3,150900),(150902,'集宁区',3,150900),(150921,'卓资县',3,150900),(150922,'化德县',3,150900),(150923,'商都县',3,150900),(150924,'兴和县',3,150900),(150925,'凉城县',3,150900),(150926,'察哈尔右翼前旗',3,150900),(150927,'察哈尔右翼中旗',3,150900),(150928,'察哈尔右翼后旗',3,150900),(150929,'四子王旗',3,150900),(150981,'丰镇市',3,150900),(152200,'兴安盟',2,150000),(152201,'乌兰浩特市',3,152200),(152202,'阿尔山市',3,152200),(152221,'科尔沁右翼前旗',3,152200),(152222,'科尔沁右翼中旗',3,152200),(152223,'扎赉特旗',3,152200),(152224,'突泉县',3,152200),(152500,'锡林郭勒盟',2,150000),(152501,'二连浩特市',3,152500),(152502,'锡林浩特市',3,152500),(152522,'阿巴嘎旗',3,152500),(152523,'苏尼特左旗',3,152500),(152524,'苏尼特右旗',3,152500),(152525,'东乌珠穆沁旗',3,152500),(152526,'西乌珠穆沁旗',3,152500),(152527,'太仆寺旗',3,152500),(152528,'镶黄旗',3,152500),(152529,'正镶白旗',3,152500),(152530,'正蓝旗',3,152500),(152531,'多伦县',3,152500),(152900,'阿拉善盟',2,150000),(152921,'阿拉善左旗',3,152900),(152922,'阿拉善右旗',3,152900),(152923,'额济纳旗',3,152900),(210000,'辽宁省',1,0),(210100,'沈阳市',2,210000),(210101,'市辖区',3,210100),(210102,'和平区',3,210100),(210103,'沈河区',3,210100),(210104,'大东区',3,210100),(210105,'皇姑区',3,210100),(210106,'铁西区',3,210100),(210111,'苏家屯区',3,210100),(210112,'东陵区',3,210100),(210113,'新城子区',3,210100),(210114,'于洪区',3,210100),(210122,'辽中县',3,210100),(210123,'康平县',3,210100),(210124,'法库县',3,210100),(210181,'新民市',3,210100),(210200,'大连市',2,210000),(210201,'市辖区',3,210200),(210202,'中山区',3,210200),(210203,'西岗区',3,210200),(210204,'沙河口区',3,210200),(210211,'甘井子区',3,210200),(210212,'旅顺口区',3,210200),(210213,'金州区',3,210200),(210224,'长海县',3,210200),(210281,'瓦房店市',3,210200),(210282,'普兰店市',3,210200),(210283,'庄河市',3,210200),(210300,'鞍山市',2,210000),(210301,'市辖区',3,210300),(210302,'铁东区',3,210300),(210303,'铁西区',3,210300),(210304,'立山区',3,210300),(210311,'千山区',3,210300),(210321,'台安县',3,210300),(210323,'岫岩满族自治县',3,210300),(210381,'海城市',3,210300),(210400,'抚顺市',2,210000),(210401,'市辖区',3,210400),(210402,'新抚区',3,210400),(210403,'东洲区',3,210400),(210404,'望花区',3,210400),(210411,'顺城区',3,210400),(210421,'抚顺县',3,210400),(210422,'新宾满族自治县',3,210400),(210423,'清原满族自治县',3,210400),(210500,'本溪市',2,210000),(210501,'市辖区',3,210500),(210502,'平山区',3,210500),(210503,'溪湖区',3,210500),(210504,'明山区',3,210500),(210505,'南芬区',3,210500),(210521,'本溪满族自治县',3,210500),(210522,'桓仁满族自治县',3,210500),(210600,'丹东市',2,210000),(210601,'市辖区',3,210600),(210602,'元宝区',3,210600),(210603,'振兴区',3,210600),(210604,'振安区',3,210600),(210624,'宽甸满族自治县',3,210600),(210681,'东港市',3,210600),(210682,'凤城市',3,210600),(210700,'锦州市',2,210000),(210701,'市辖区',3,210700),(210702,'古塔区',3,210700),(210703,'凌河区',3,210700),(210711,'太和区',3,210700),(210726,'黑山县',3,210700),(210727,'义　县',3,210700),(210781,'凌海市',3,210700),(210782,'北宁市',3,210700),(210800,'营口市',2,210000),(210801,'市辖区',3,210800),(210802,'站前区',3,210800),(210803,'西市区',3,210800),(210804,'鲅鱼圈区',3,210800),(210811,'老边区',3,210800),(210881,'盖州市',3,210800),(210882,'大石桥市',3,210800),(210900,'阜新市',2,210000),(210901,'市辖区',3,210900),(210902,'海州区',3,210900),(210903,'新邱区',3,210900),(210904,'太平区',3,210900),(210905,'清河门区',3,210900),(210911,'细河区',3,210900),(210921,'阜新蒙古族自治县',3,210900),(210922,'彰武县',3,210900),(211000,'辽阳市',2,210000),(211001,'市辖区',3,211000),(211002,'白塔区',3,211000),(211003,'文圣区',3,211000),(211004,'宏伟区',3,211000),(211005,'弓长岭区',3,211000),(211011,'太子河区',3,211000),(211021,'辽阳县',3,211000),(211081,'灯塔市',3,211000),(211100,'盘锦市',2,210000),(211101,'市辖区',3,211100),(211102,'双台子区',3,211100),(211103,'兴隆台区',3,211100),(211121,'大洼县',3,211100),(211122,'盘山县',3,211100),(211200,'铁岭市',2,210000),(211201,'市辖区',3,211200),(211202,'银州区',3,211200),(211204,'清河区',3,211200),(211221,'铁岭县',3,211200),(211223,'西丰县',3,211200),(211224,'昌图县',3,211200),(211281,'调兵山市',3,211200),(211282,'开原市',3,211200),(211300,'朝阳市',2,210000),(211301,'市辖区',3,211300),(211302,'双塔区',3,211300),(211303,'龙城区',3,211300),(211321,'朝阳县',3,211300),(211322,'建平县',3,211300),(211324,'喀喇沁左翼蒙古族自治县',3,211300),(211381,'北票市',3,211300),(211382,'凌源市',3,211300),(211400,'葫芦岛市',2,210000),(211401,'市辖区',3,211400),(211402,'连山区',3,211400),(211403,'龙港区',3,211400),(211404,'南票区',3,211400),(211421,'绥中县',3,211400),(211422,'建昌县',3,211400),(211481,'兴城市',3,211400),(220000,'吉林省',1,0),(220100,'长春市',2,220000),(220101,'市辖区',3,220100),(220102,'南关区',3,220100),(220103,'宽城区',3,220100),(220104,'朝阳区',3,220100),(220105,'二道区',3,220100),(220106,'绿园区',3,220100),(220112,'双阳区',3,220100),(220122,'农安县',3,220100),(220181,'九台市',3,220100),(220182,'榆树市',3,220100),(220183,'德惠市',3,220100),(220200,'吉林市',2,220000),(220201,'市辖区',3,220200),(220202,'昌邑区',3,220200),(220203,'龙潭区',3,220200),(220204,'船营区',3,220200),(220211,'丰满区',3,220200),(220221,'永吉县',3,220200),(220281,'蛟河市',3,220200),(220282,'桦甸市',3,220200),(220283,'舒兰市',3,220200),(220284,'磐石市',3,220200),(220300,'四平市',2,220000),(220301,'市辖区',3,220300),(220302,'铁西区',3,220300),(220303,'铁东区',3,220300),(220322,'梨树县',3,220300),(220323,'伊通满族自治县',3,220300),(220381,'公主岭市',3,220300),(220382,'双辽市',3,220300),(220400,'辽源市',2,220000),(220401,'市辖区',3,220400),(220402,'龙山区',3,220400),(220403,'西安区',3,220400),(220421,'东丰县',3,220400),(220422,'东辽县',3,220400),(220500,'通化市',2,220000),(220501,'市辖区',3,220500),(220502,'东昌区',3,220500),(220503,'二道江区',3,220500),(220521,'通化县',3,220500),(220523,'辉南县',3,220500),(220524,'柳河县',3,220500),(220581,'梅河口市',3,220500),(220582,'集安市',3,220500),(220600,'白山市',2,220000),(220601,'市辖区',3,220600),(220602,'八道江区',3,220600),(220621,'抚松县',3,220600),(220622,'靖宇县',3,220600),(220623,'长白朝鲜族自治县',3,220600),(220625,'江源县',3,220600),(220681,'临江市',3,220600),(220700,'松原市',2,220000),(220701,'市辖区',3,220700),(220702,'宁江区',3,220700),(220721,'前郭尔罗斯蒙古族自治县',3,220700),(220722,'长岭县',3,220700),(220723,'乾安县',3,220700),(220724,'扶余县',3,220700),(220800,'白城市',2,220000),(220801,'市辖区',3,220800),(220802,'洮北区',3,220800),(220821,'镇赉县',3,220800),(220822,'通榆县',3,220800),(220881,'洮南市',3,220800),(220882,'大安市',3,220800),(222400,'延边朝鲜族自治州',2,220000),(222401,'延吉市',3,222400),(222402,'图们市',3,222400),(222403,'敦化市',3,222400),(222404,'珲春市',3,222400),(222405,'龙井市',3,222400),(222406,'和龙市',3,222400),(222424,'汪清县',3,222400),(222426,'安图县',3,222400),(230000,'黑龙江',1,0),(230100,'哈尔滨市',2,230000),(230101,'市辖区',3,230100),(230102,'道里区',3,230100),(230103,'南岗区',3,230100),(230104,'道外区',3,230100),(230106,'香坊区',3,230100),(230107,'动力区',3,230100),(230108,'平房区',3,230100),(230109,'松北区',3,230100),(230111,'呼兰区',3,230100),(230123,'依兰县',3,230100),(230124,'方正县',3,230100),(230125,'宾　县',3,230100),(230126,'巴彦县',3,230100),(230127,'木兰县',3,230100),(230128,'通河县',3,230100),(230129,'延寿县',3,230100),(230181,'阿城市',3,230100),(230182,'双城市',3,230100),(230183,'尚志市',3,230100),(230184,'五常市',3,230100),(230200,'齐齐哈尔市',2,230000),(230201,'市辖区',3,230200),(230202,'龙沙区',3,230200),(230203,'建华区',3,230200),(230204,'铁锋区',3,230200),(230205,'昂昂溪区',3,230200),(230206,'富拉尔基区',3,230200),(230207,'碾子山区',3,230200),(230208,'梅里斯达斡尔族区',3,230200),(230221,'龙江县',3,230200),(230223,'依安县',3,230200),(230224,'泰来县',3,230200),(230225,'甘南县',3,230200),(230227,'富裕县',3,230200),(230229,'克山县',3,230200),(230230,'克东县',3,230200),(230231,'拜泉县',3,230200),(230281,'讷河市',3,230200),(230300,'鸡西市',2,230000),(230301,'市辖区',3,230300),(230302,'鸡冠区',3,230300),(230303,'恒山区',3,230300),(230304,'滴道区',3,230300),(230305,'梨树区',3,230300),(230306,'城子河区',3,230300),(230307,'麻山区',3,230300),(230321,'鸡东县',3,230300),(230381,'虎林市',3,230300),(230382,'密山市',3,230300),(230400,'鹤岗市',2,230000),(230401,'市辖区',3,230400),(230402,'向阳区',3,230400),(230403,'工农区',3,230400),(230404,'南山区',3,230400),(230405,'兴安区',3,230400),(230406,'东山区',3,230400),(230407,'兴山区',3,230400),(230421,'萝北县',3,230400),(230422,'绥滨县',3,230400),(230500,'双鸭山市',2,230000),(230501,'市辖区',3,230500),(230502,'尖山区',3,230500),(230503,'岭东区',3,230500),(230505,'四方台区',3,230500),(230506,'宝山区',3,230500),(230521,'集贤县',3,230500),(230522,'友谊县',3,230500),(230523,'宝清县',3,230500),(230524,'饶河县',3,230500),(230600,'大庆市',2,230000),(230601,'市辖区',3,230600),(230602,'萨尔图区',3,230600),(230603,'龙凤区',3,230600),(230604,'让胡路区',3,230600),(230605,'红岗区',3,230600),(230606,'大同区',3,230600),(230621,'肇州县',3,230600),(230622,'肇源县',3,230600),(230623,'林甸县',3,230600),(230624,'杜尔伯特蒙古族自治县',3,230600),(230700,'伊春市',2,230000),(230701,'市辖区',3,230700),(230702,'伊春区',3,230700),(230703,'南岔区',3,230700),(230704,'友好区',3,230700),(230705,'西林区',3,230700),(230706,'翠峦区',3,230700),(230707,'新青区',3,230700),(230708,'美溪区',3,230700),(230709,'金山屯区',3,230700),(230710,'五营区',3,230700),(230711,'乌马河区',3,230700),(230712,'汤旺河区',3,230700),(230713,'带岭区',3,230700),(230714,'乌伊岭区',3,230700),(230715,'红星区',3,230700),(230716,'上甘岭区',3,230700),(230722,'嘉荫县',3,230700),(230781,'铁力市',3,230700),(230800,'佳木斯市',2,230000),(230801,'市辖区',3,230800),(230802,'永红区',3,230800),(230803,'向阳区',3,230800),(230804,'前进区',3,230800),(230805,'东风区',3,230800),(230811,'郊　区',3,230800),(230822,'桦南县',3,230800),(230826,'桦川县',3,230800),(230828,'汤原县',3,230800),(230833,'抚远县',3,230800),(230881,'同江市',3,230800),(230882,'富锦市',3,230800),(230900,'七台河市',2,230000),(230901,'市辖区',3,230900),(230902,'新兴区',3,230900),(230903,'桃山区',3,230900),(230904,'茄子河区',3,230900),(230921,'勃利县',3,230900),(231000,'牡丹江市',2,230000),(231001,'市辖区',3,231000),(231002,'东安区',3,231000),(231003,'阳明区',3,231000),(231004,'爱民区',3,231000),(231005,'西安区',3,231000),(231024,'东宁县',3,231000),(231025,'林口县',3,231000),(231081,'绥芬河市',3,231000),(231083,'海林市',3,231000),(231084,'宁安市',3,231000),(231085,'穆棱市',3,231000),(231100,'黑河市',2,230000),(231101,'市辖区',3,231100),(231102,'爱辉区',3,231100),(231121,'嫩江县',3,231100),(231123,'逊克县',3,231100),(231124,'孙吴县',3,231100),(231181,'北安市',3,231100),(231182,'五大连池市',3,231100),(231200,'绥化市',2,230000),(231201,'市辖区',3,231200),(231202,'北林区',3,231200),(231221,'望奎县',3,231200),(231222,'兰西县',3,231200),(231223,'青冈县',3,231200),(231224,'庆安县',3,231200),(231225,'明水县',3,231200),(231226,'绥棱县',3,231200),(231281,'安达市',3,231200),(231282,'肇东市',3,231200),(231283,'海伦市',3,231200),(232700,'大兴安岭地区',2,230000),(232721,'呼玛县',3,232700),(232722,'塔河县',3,232700),(232723,'漠河县',3,232700),(310000,'上海市',1,0),(310100,'市辖区',2,310000),(310101,'黄浦区',3,310100),(310103,'卢湾区',3,310100),(310104,'徐汇区',3,310100),(310105,'长宁区',3,310100),(310106,'静安区',3,310100),(310107,'普陀区',3,310100),(310108,'闸北区',3,310100),(310109,'虹口区',3,310100),(310110,'杨浦区',3,310100),(310112,'闵行区',3,310100),(310113,'宝山区',3,310100),(310114,'嘉定区',3,310100),(310115,'浦东新区',3,310100),(310116,'金山区',3,310100),(310117,'松江区',3,310100),(310118,'青浦区',3,310100),(310119,'南汇区',3,310100),(310120,'奉贤区',3,310100),(310200,'县',2,310000),(310230,'崇明县',3,310200),(320000,'江苏省',1,0),(320100,'南京市',2,320000),(320101,'市辖区',3,320100),(320102,'玄武区',3,320100),(320103,'白下区',3,320100),(320104,'秦淮区',3,320100),(320105,'建邺区',3,320100),(320106,'鼓楼区',3,320100),(320107,'下关区',3,320100),(320111,'浦口区',3,320100),(320113,'栖霞区',3,320100),(320114,'雨花台区',3,320100),(320115,'江宁区',3,320100),(320116,'六合区',3,320100),(320124,'溧水县',3,320100),(320125,'高淳县',3,320100),(320200,'无锡市',2,320000),(320201,'市辖区',3,320200),(320202,'崇安区',3,320200),(320203,'南长区',3,320200),(320204,'北塘区',3,320200),(320205,'锡山区',3,320200),(320206,'惠山区',3,320200),(320211,'滨湖区',3,320200),(320281,'江阴市',3,320200),(320282,'宜兴市',3,320200),(320300,'徐州市',2,320000),(320301,'市辖区',3,320300),(320302,'鼓楼区',3,320300),(320303,'云龙区',3,320300),(320304,'九里区',3,320300),(320305,'贾汪区',3,320300),(320311,'泉山区',3,320300),(320321,'丰　县',3,320300),(320322,'沛　县',3,320300),(320323,'铜山县',3,320300),(320324,'睢宁县',3,320300),(320381,'新沂市',3,320300),(320382,'邳州市',3,320300),(320400,'常州市',2,320000),(320401,'市辖区',3,320400),(320402,'天宁区',3,320400),(320404,'钟楼区',3,320400),(320405,'戚墅堰区',3,320400),(320411,'新北区',3,320400),(320412,'武进区',3,320400),(320481,'溧阳市',3,320400),(320482,'金坛市',3,320400),(320500,'苏州市',2,320000),(320501,'市辖区',3,320500),(320502,'沧浪区',3,320500),(320503,'平江区',3,320500),(320504,'金阊区',3,320500),(320505,'虎丘区',3,320500),(320506,'吴中区',3,320500),(320507,'相城区',3,320500),(320581,'常熟市',3,320500),(320582,'张家港市',3,320500),(320583,'昆山市',3,320500),(320584,'吴江市',3,320500),(320585,'太仓市',3,320500),(320600,'南通市',2,320000),(320601,'市辖区',3,320600),(320602,'崇川区',3,320600),(320611,'港闸区',3,320600),(320621,'海安县',3,320600),(320623,'如东县',3,320600),(320681,'启东市',3,320600),(320682,'如皋市',3,320600),(320683,'通州市',3,320600),(320684,'海门市',3,320600),(320700,'连云港市',2,320000),(320701,'市辖区',3,320700),(320703,'连云区',3,320700),(320705,'新浦区',3,320700),(320706,'海州区',3,320700),(320721,'赣榆县',3,320700),(320722,'东海县',3,320700),(320723,'灌云县',3,320700),(320724,'灌南县',3,320700),(320800,'淮安市',2,320000),(320801,'市辖区',3,320800),(320802,'清河区',3,320800),(320803,'楚州区',3,320800),(320804,'淮阴区',3,320800),(320811,'清浦区',3,320800),(320826,'涟水县',3,320800),(320829,'洪泽县',3,320800),(320830,'盱眙县',3,320800),(320831,'金湖县',3,320800),(320900,'盐城市',2,320000),(320901,'市辖区',3,320900),(320902,'亭湖区',3,320900),(320903,'盐都区',3,320900),(320921,'响水县',3,320900),(320922,'滨海县',3,320900),(320923,'阜宁县',3,320900),(320924,'射阳县',3,320900),(320925,'建湖县',3,320900),(320981,'东台市',3,320900),(320982,'大丰市',3,320900),(321000,'扬州市',2,320000),(321001,'市辖区',3,321000),(321002,'广陵区',3,321000),(321003,'邗江区',3,321000),(321011,'郊　区',3,321000),(321023,'宝应县',3,321000),(321081,'仪征市',3,321000),(321084,'高邮市',3,321000),(321088,'江都市',3,321000),(321100,'镇江市',2,320000),(321101,'市辖区',3,321100),(321102,'京口区',3,321100),(321111,'润州区',3,321100),(321112,'丹徒区',3,321100),(321181,'丹阳市',3,321100),(321182,'扬中市',3,321100),(321183,'句容市',3,321100),(321200,'泰州市',2,320000),(321201,'市辖区',3,321200),(321202,'海陵区',3,321200),(321203,'高港区',3,321200),(321281,'兴化市',3,321200),(321282,'靖江市',3,321200),(321283,'泰兴市',3,321200),(321284,'姜堰市',3,321200),(321300,'宿迁市',2,320000),(321301,'市辖区',3,321300),(321302,'宿城区',3,321300),(321311,'宿豫区',3,321300),(321322,'沭阳县',3,321300),(321323,'泗阳县',3,321300),(321324,'泗洪县',3,321300),(330000,'浙江省',1,0),(330100,'杭州市',2,330000),(330101,'市辖区',3,330100),(330102,'上城区',3,330100),(330103,'下城区',3,330100),(330104,'江干区',3,330100),(330105,'拱墅区',3,330100),(330106,'西湖区',3,330100),(330108,'滨江区',3,330100),(330109,'萧山区',3,330100),(330110,'余杭区',3,330100),(330122,'桐庐县',3,330100),(330127,'淳安县',3,330100),(330182,'建德市',3,330100),(330183,'富阳市',3,330100),(330185,'临安市',3,330100),(330200,'宁波市',2,330000),(330201,'市辖区',3,330200),(330203,'海曙区',3,330200),(330204,'江东区',3,330200),(330205,'江北区',3,330200),(330206,'北仑区',3,330200),(330211,'镇海区',3,330200),(330212,'鄞州区',3,330200),(330225,'象山县',3,330200),(330226,'宁海县',3,330200),(330281,'余姚市',3,330200),(330282,'慈溪市',3,330200),(330283,'奉化市',3,330200),(330300,'温州市',2,330000),(330301,'市辖区',3,330300),(330302,'鹿城区',3,330300),(330303,'龙湾区',3,330300),(330304,'瓯海区',3,330300),(330322,'洞头县',3,330300),(330324,'永嘉县',3,330300),(330326,'平阳县',3,330300),(330327,'苍南县',3,330300),(330328,'文成县',3,330300),(330329,'泰顺县',3,330300),(330381,'瑞安市',3,330300),(330382,'乐清市',3,330300),(330400,'嘉兴市',2,330000),(330401,'市辖区',3,330400),(330402,'秀城区',3,330400),(330411,'秀洲区',3,330400),(330421,'嘉善县',3,330400),(330424,'海盐县',3,330400),(330481,'海宁市',3,330400),(330482,'平湖市',3,330400),(330483,'桐乡市',3,330400),(330500,'湖州市',2,330000),(330501,'市辖区',3,330500),(330502,'吴兴区',3,330500),(330503,'南浔区',3,330500),(330521,'德清县',3,330500),(330522,'长兴县',3,330500),(330523,'安吉县',3,330500),(330600,'绍兴市',2,330000),(330601,'市辖区',3,330600),(330602,'越城区',3,330600),(330621,'绍兴县',3,330600),(330624,'新昌县',3,330600),(330681,'诸暨市',3,330600),(330682,'上虞市',3,330600),(330683,'嵊州市',3,330600),(330700,'金华市',2,330000),(330701,'市辖区',3,330700),(330702,'婺城区',3,330700),(330703,'金东区',3,330700),(330723,'武义县',3,330700),(330726,'浦江县',3,330700),(330727,'磐安县',3,330700),(330781,'兰溪市',3,330700),(330782,'义乌市',3,330700),(330783,'东阳市',3,330700),(330784,'永康市',3,330700),(330800,'衢州市',2,330000),(330801,'市辖区',3,330800),(330802,'柯城区',3,330800),(330803,'衢江区',3,330800),(330822,'常山县',3,330800),(330824,'开化县',3,330800),(330825,'龙游县',3,330800),(330881,'江山市',3,330800),(330900,'舟山市',2,330000),(330901,'市辖区',3,330900),(330902,'定海区',3,330900),(330903,'普陀区',3,330900),(330921,'岱山县',3,330900),(330922,'嵊泗县',3,330900),(331000,'台州市',2,330000),(331001,'市辖区',3,331000),(331002,'椒江区',3,331000),(331003,'黄岩区',3,331000),(331004,'路桥区',3,331000),(331021,'玉环县',3,331000),(331022,'三门县',3,331000),(331023,'天台县',3,331000),(331024,'仙居县',3,331000),(331081,'温岭市',3,331000),(331082,'临海市',3,331000),(331100,'丽水市',2,330000),(331101,'市辖区',3,331100),(331102,'莲都区',3,331100),(331121,'青田县',3,331100),(331122,'缙云县',3,331100),(331123,'遂昌县',3,331100),(331124,'松阳县',3,331100),(331125,'云和县',3,331100),(331126,'庆元县',3,331100),(331127,'景宁畲族自治县',3,331100),(331181,'龙泉市',3,331100),(340000,'安徽省',1,0),(340100,'合肥市',2,340000),(340101,'市辖区',3,340100),(340102,'瑶海区',3,340100),(340103,'庐阳区',3,340100),(340104,'蜀山区',3,340100),(340111,'包河区',3,340100),(340121,'长丰县',3,340100),(340122,'肥东县',3,340100),(340123,'肥西县',3,340100),(340200,'芜湖市',2,340000),(340201,'市辖区',3,340200),(340202,'镜湖区',3,340200),(340203,'马塘区',3,340200),(340204,'新芜区',3,340200),(340207,'鸠江区',3,340200),(340221,'芜湖县',3,340200),(340222,'繁昌县',3,340200),(340223,'南陵县',3,340200),(340300,'蚌埠市',2,340000),(340301,'市辖区',3,340300),(340302,'龙子湖区',3,340300),(340303,'蚌山区',3,340300),(340304,'禹会区',3,340300),(340311,'淮上区',3,340300),(340321,'怀远县',3,340300),(340322,'五河县',3,340300),(340323,'固镇县',3,340300),(340400,'淮南市',2,340000),(340401,'市辖区',3,340400),(340402,'大通区',3,340400),(340403,'田家庵区',3,340400),(340404,'谢家集区',3,340400),(340405,'八公山区',3,340400),(340406,'潘集区',3,340400),(340421,'凤台县',3,340400),(340500,'马鞍山市',2,340000),(340501,'市辖区',3,340500),(340502,'金家庄区',3,340500),(340503,'花山区',3,340500),(340504,'雨山区',3,340500),(340521,'当涂县',3,340500),(340600,'淮北市',2,340000),(340601,'市辖区',3,340600),(340602,'杜集区',3,340600),(340603,'相山区',3,340600),(340604,'烈山区',3,340600),(340621,'濉溪县',3,340600),(340700,'铜陵市',2,340000),(340701,'市辖区',3,340700),(340702,'铜官山区',3,340700),(340703,'狮子山区',3,340700),(340711,'郊　区',3,340700),(340721,'铜陵县',3,340700),(340800,'安庆市',2,340000),(340801,'市辖区',3,340800),(340802,'迎江区',3,340800),(340803,'大观区',3,340800),(340811,'郊　区',3,340800),(340822,'怀宁县',3,340800),(340823,'枞阳县',3,340800),(340824,'潜山县',3,340800),(340825,'太湖县',3,340800),(340826,'宿松县',3,340800),(340827,'望江县',3,340800),(340828,'岳西县',3,340800),(340881,'桐城市',3,340800),(341000,'黄山市',2,340000),(341001,'市辖区',3,341000),(341002,'屯溪区',3,341000),(341003,'黄山区',3,341000),(341004,'徽州区',3,341000),(341021,'歙　县',3,341000),(341022,'休宁县',3,341000),(341023,'黟　县',3,341000),(341024,'祁门县',3,341000),(341100,'滁州市',2,340000),(341101,'市辖区',3,341100),(341102,'琅琊区',3,341100),(341103,'南谯区',3,341100),(341122,'来安县',3,341100),(341124,'全椒县',3,341100),(341125,'定远县',3,341100),(341126,'凤阳县',3,341100),(341181,'天长市',3,341100),(341182,'明光市',3,341100),(341200,'阜阳市',2,340000),(341201,'市辖区',3,341200),(341202,'颍州区',3,341200),(341203,'颍东区',3,341200),(341204,'颍泉区',3,341200),(341221,'临泉县',3,341200),(341222,'太和县',3,341200),(341225,'阜南县',3,341200),(341226,'颍上县',3,341200),(341282,'界首市',3,341200),(341300,'宿州市',2,340000),(341301,'市辖区',3,341300),(341302,'墉桥区',3,341300),(341321,'砀山县',3,341300),(341322,'萧　县',3,341300),(341323,'灵璧县',3,341300),(341324,'泗　县',3,341300),(341401,'庐江县',3,340100),(341402,'巢湖市',3,340100),(341422,'无为县',3,340200),(341423,'含山县',3,340500),(341424,'和　县',3,340500),(341500,'六安市',2,340000),(341501,'市辖区',3,341500),(341502,'金安区',3,341500),(341503,'裕安区',3,341500),(341521,'寿　县',3,341500),(341522,'霍邱县',3,341500),(341523,'舒城县',3,341500),(341524,'金寨县',3,341500),(341525,'霍山县',3,341500),(341600,'亳州市',2,340000),(341601,'市辖区',3,341600),(341602,'谯城区',3,341600),(341621,'涡阳县',3,341600),(341622,'蒙城县',3,341600),(341623,'利辛县',3,341600),(341700,'池州市',2,340000),(341701,'市辖区',3,341700),(341702,'贵池区',3,341700),(341721,'东至县',3,341700),(341722,'石台县',3,341700),(341723,'青阳县',3,341700),(341800,'宣城市',2,340000),(341801,'市辖区',3,341800),(341802,'宣州区',3,341800),(341821,'郎溪县',3,341800),(341822,'广德县',3,341800),(341823,'泾　县',3,341800),(341824,'绩溪县',3,341800),(341825,'旌德县',3,341800),(341881,'宁国市',3,341800),(350000,'福建省',1,0),(350100,'福州市',2,350000),(350101,'市辖区',3,350100),(350102,'鼓楼区',3,350100),(350103,'台江区',3,350100),(350104,'仓山区',3,350100),(350105,'马尾区',3,350100),(350111,'晋安区',3,350100),(350121,'闽侯县',3,350100),(350122,'连江县',3,350100),(350123,'罗源县',3,350100),(350124,'闽清县',3,350100),(350125,'永泰县',3,350100),(350128,'平潭县',3,350100),(350181,'福清市',3,350100),(350182,'长乐市',3,350100),(350200,'厦门市',2,350000),(350201,'市辖区',3,350200),(350203,'思明区',3,350200),(350205,'海沧区',3,350200),(350206,'湖里区',3,350200),(350211,'集美区',3,350200),(350212,'同安区',3,350200),(350213,'翔安区',3,350200),(350300,'莆田市',2,350000),(350301,'市辖区',3,350300),(350302,'城厢区',3,350300),(350303,'涵江区',3,350300),(350304,'荔城区',3,350300),(350305,'秀屿区',3,350300),(350322,'仙游县',3,350300),(350400,'三明市',2,350000),(350401,'市辖区',3,350400),(350402,'梅列区',3,350400),(350403,'三元区',3,350400),(350421,'明溪县',3,350400),(350423,'清流县',3,350400),(350424,'宁化县',3,350400),(350425,'大田县',3,350400),(350426,'尤溪县',3,350400),(350427,'沙　县',3,350400),(350428,'将乐县',3,350400),(350429,'泰宁县',3,350400),(350430,'建宁县',3,350400),(350481,'永安市',3,350400),(350500,'泉州市',2,350000),(350501,'市辖区',3,350500),(350502,'鲤城区',3,350500),(350503,'丰泽区',3,350500),(350504,'洛江区',3,350500),(350505,'泉港区',3,350500),(350521,'惠安县',3,350500),(350524,'安溪县',3,350500),(350525,'永春县',3,350500),(350526,'德化县',3,350500),(350527,'金门县',3,350500),(350581,'石狮市',3,350500),(350582,'晋江市',3,350500),(350583,'南安市',3,350500),(350600,'漳州市',2,350000),(350601,'市辖区',3,350600),(350602,'芗城区',3,350600),(350603,'龙文区',3,350600),(350622,'云霄县',3,350600),(350623,'漳浦县',3,350600),(350624,'诏安县',3,350600),(350625,'长泰县',3,350600),(350626,'东山县',3,350600),(350627,'南靖县',3,350600),(350628,'平和县',3,350600),(350629,'华安县',3,350600),(350681,'龙海市',3,350600),(350700,'南平市',2,350000),(350701,'市辖区',3,350700),(350702,'延平区',3,350700),(350721,'顺昌县',3,350700),(350722,'浦城县',3,350700),(350723,'光泽县',3,350700),(350724,'松溪县',3,350700),(350725,'政和县',3,350700),(350781,'邵武市',3,350700),(350782,'武夷山市',3,350700),(350783,'建瓯市',3,350700),(350784,'建阳市',3,350700),(350800,'龙岩市',2,350000),(350801,'市辖区',3,350800),(350802,'新罗区',3,350800),(350821,'长汀县',3,350800),(350822,'永定县',3,350800),(350823,'上杭县',3,350800),(350824,'武平县',3,350800),(350825,'连城县',3,350800),(350881,'漳平市',3,350800),(350900,'宁德市',2,350000),(350901,'市辖区',3,350900),(350902,'蕉城区',3,350900),(350921,'霞浦县',3,350900),(350922,'古田县',3,350900),(350923,'屏南县',3,350900),(350924,'寿宁县',3,350900),(350925,'周宁县',3,350900),(350926,'柘荣县',3,350900),(350981,'福安市',3,350900),(350982,'福鼎市',3,350900),(360000,'江西省',1,0),(360100,'南昌市',2,360000),(360101,'市辖区',3,360100),(360102,'东湖区',3,360100),(360103,'西湖区',3,360100),(360104,'青云谱区',3,360100),(360105,'湾里区',3,360100),(360111,'青山湖区',3,360100),(360121,'南昌县',3,360100),(360122,'新建县',3,360100),(360123,'安义县',3,360100),(360124,'进贤县',3,360100),(360200,'景德镇市',2,360000),(360201,'市辖区',3,360200),(360202,'昌江区',3,360200),(360203,'珠山区',3,360200),(360222,'浮梁县',3,360200),(360281,'乐平市',3,360200),(360300,'萍乡市',2,360000),(360301,'市辖区',3,360300),(360302,'安源区',3,360300),(360313,'湘东区',3,360300),(360321,'莲花县',3,360300),(360322,'上栗县',3,360300),(360323,'芦溪县',3,360300),(360400,'九江市',2,360000),(360401,'市辖区',3,360400),(360402,'庐山区',3,360400),(360403,'浔阳区',3,360400),(360421,'九江县',3,360400),(360423,'武宁县',3,360400),(360424,'修水县',3,360400),(360425,'永修县',3,360400),(360426,'德安县',3,360400),(360427,'星子县',3,360400),(360428,'都昌县',3,360400),(360429,'湖口县',3,360400),(360430,'彭泽县',3,360400),(360481,'瑞昌市',3,360400),(360500,'新余市',2,360000),(360501,'市辖区',3,360500),(360502,'渝水区',3,360500),(360521,'分宜县',3,360500),(360600,'鹰潭市',2,360000),(360601,'市辖区',3,360600),(360602,'月湖区',3,360600),(360622,'余江县',3,360600),(360681,'贵溪市',3,360600),(360700,'赣州市',2,360000),(360701,'市辖区',3,360700),(360702,'章贡区',3,360700),(360721,'赣　县',3,360700),(360722,'信丰县',3,360700),(360723,'大余县',3,360700),(360724,'上犹县',3,360700),(360725,'崇义县',3,360700),(360726,'安远县',3,360700),(360727,'龙南县',3,360700),(360728,'定南县',3,360700),(360729,'全南县',3,360700),(360730,'宁都县',3,360700),(360731,'于都县',3,360700),(360732,'兴国县',3,360700),(360733,'会昌县',3,360700),(360734,'寻乌县',3,360700),(360735,'石城县',3,360700),(360781,'瑞金市',3,360700),(360782,'南康市',3,360700),(360800,'吉安市',2,360000),(360801,'市辖区',3,360800),(360802,'吉州区',3,360800),(360803,'青原区',3,360800),(360821,'吉安县',3,360800),(360822,'吉水县',3,360800),(360823,'峡江县',3,360800),(360824,'新干县',3,360800),(360825,'永丰县',3,360800),(360826,'泰和县',3,360800),(360827,'遂川县',3,360800),(360828,'万安县',3,360800),(360829,'安福县',3,360800),(360830,'永新县',3,360800),(360881,'井冈山市',3,360800),(360900,'宜春市',2,360000),(360901,'市辖区',3,360900),(360902,'袁州区',3,360900),(360921,'奉新县',3,360900),(360922,'万载县',3,360900),(360923,'上高县',3,360900),(360924,'宜丰县',3,360900),(360925,'靖安县',3,360900),(360926,'铜鼓县',3,360900),(360981,'丰城市',3,360900),(360982,'樟树市',3,360900),(360983,'高安市',3,360900),(361000,'抚州市',2,360000),(361001,'市辖区',3,361000),(361002,'临川区',3,361000),(361021,'南城县',3,361000),(361022,'黎川县',3,361000),(361023,'南丰县',3,361000),(361024,'崇仁县',3,361000),(361025,'乐安县',3,361000),(361026,'宜黄县',3,361000),(361027,'金溪县',3,361000),(361028,'资溪县',3,361000),(361029,'东乡县',3,361000),(361030,'广昌县',3,361000),(361100,'上饶市',2,360000),(361101,'市辖区',3,361100),(361102,'信州区',3,361100),(361121,'上饶县',3,361100),(361122,'广丰县',3,361100),(361123,'玉山县',3,361100),(361124,'铅山县',3,361100),(361125,'横峰县',3,361100),(361126,'弋阳县',3,361100),(361127,'余干县',3,361100),(361128,'鄱阳县',3,361100),(361129,'万年县',3,361100),(361130,'婺源县',3,361100),(361181,'德兴市',3,361100),(370000,'山东省',1,0),(370100,'济南市',2,370000),(370101,'市辖区',3,370100),(370102,'历下区',3,370100),(370103,'市中区',3,370100),(370104,'槐荫区',3,370100),(370105,'天桥区',3,370100),(370112,'历城区',3,370100),(370113,'长清区',3,370100),(370124,'平阴县',3,370100),(370125,'济阳县',3,370100),(370126,'商河县',3,370100),(370181,'章丘市',3,370100),(370200,'青岛市',2,370000),(370201,'市辖区',3,370200),(370202,'市南区',3,370200),(370203,'市北区',3,370200),(370205,'四方区',3,370200),(370211,'黄岛区',3,370200),(370212,'崂山区',3,370200),(370213,'李沧区',3,370200),(370214,'城阳区',3,370200),(370281,'胶州市',3,370200),(370282,'即墨市',3,370200),(370283,'平度市',3,370200),(370284,'胶南市',3,370200),(370285,'莱西市',3,370200),(370300,'淄博市',2,370000),(370301,'市辖区',3,370300),(370302,'淄川区',3,370300),(370303,'张店区',3,370300),(370304,'博山区',3,370300),(370305,'临淄区',3,370300),(370306,'周村区',3,370300),(370321,'桓台县',3,370300),(370322,'高青县',3,370300),(370323,'沂源县',3,370300),(370400,'枣庄市',2,370000),(370401,'市辖区',3,370400),(370402,'市中区',3,370400),(370403,'薛城区',3,370400),(370404,'峄城区',3,370400),(370405,'台儿庄区',3,370400),(370406,'山亭区',3,370400),(370481,'滕州市',3,370400),(370500,'东营市',2,370000),(370501,'市辖区',3,370500),(370502,'东营区',3,370500),(370503,'河口区',3,370500),(370521,'垦利县',3,370500),(370522,'利津县',3,370500),(370523,'广饶县',3,370500),(370600,'烟台市',2,370000),(370601,'市辖区',3,370600),(370602,'芝罘区',3,370600),(370611,'福山区',3,370600),(370612,'牟平区',3,370600),(370613,'莱山区',3,370600),(370634,'长岛县',3,370600),(370681,'龙口市',3,370600),(370682,'莱阳市',3,370600),(370683,'莱州市',3,370600),(370684,'蓬莱市',3,370600),(370685,'招远市',3,370600),(370686,'栖霞市',3,370600),(370687,'海阳市',3,370600),(370700,'潍坊市',2,370000),(370701,'市辖区',3,370700),(370702,'潍城区',3,370700),(370703,'寒亭区',3,370700),(370704,'坊子区',3,370700),(370705,'奎文区',3,370700),(370724,'临朐县',3,370700),(370725,'昌乐县',3,370700),(370781,'青州市',3,370700),(370782,'诸城市',3,370700),(370783,'寿光市',3,370700),(370784,'安丘市',3,370700),(370785,'高密市',3,370700),(370786,'昌邑市',3,370700),(370800,'济宁市',2,370000),(370801,'市辖区',3,370800),(370802,'市中区',3,370800),(370811,'任城区',3,370800),(370826,'微山县',3,370800),(370827,'鱼台县',3,370800),(370828,'金乡县',3,370800),(370829,'嘉祥县',3,370800),(370830,'汶上县',3,370800),(370831,'泗水县',3,370800),(370832,'梁山县',3,370800),(370881,'曲阜市',3,370800),(370882,'兖州市',3,370800),(370883,'邹城市',3,370800),(370900,'泰安市',2,370000),(370901,'市辖区',3,370900),(370902,'泰山区',3,370900),(370903,'岱岳区',3,370900),(370921,'宁阳县',3,370900),(370923,'东平县',3,370900),(370982,'新泰市',3,370900),(370983,'肥城市',3,370900),(371000,'威海市',2,370000),(371001,'市辖区',3,371000),(371002,'环翠区',3,371000),(371081,'文登市',3,371000),(371082,'荣成市',3,371000),(371083,'乳山市',3,371000),(371100,'日照市',2,370000),(371101,'市辖区',3,371100),(371102,'东港区',3,371100),(371103,'岚山区',3,371100),(371121,'五莲县',3,371100),(371122,'莒　县',3,371100),(371200,'莱芜市',2,370000),(371201,'市辖区',3,371200),(371202,'莱城区',3,371200),(371203,'钢城区',3,371200),(371300,'临沂市',2,370000),(371301,'市辖区',3,371300),(371302,'兰山区',3,371300),(371311,'罗庄区',3,371300),(371312,'河东区',3,371300),(371321,'沂南县',3,371300),(371322,'郯城县',3,371300),(371323,'沂水县',3,371300),(371324,'苍山县',3,371300),(371325,'费　县',3,371300),(371326,'平邑县',3,371300),(371327,'莒南县',3,371300),(371328,'蒙阴县',3,371300),(371329,'临沭县',3,371300),(371400,'德州市',2,370000),(371401,'市辖区',3,371400),(371402,'德城区',3,371400),(371421,'陵　县',3,371400),(371422,'宁津县',3,371400),(371423,'庆云县',3,371400),(371424,'临邑县',3,371400),(371425,'齐河县',3,371400),(371426,'平原县',3,371400),(371427,'夏津县',3,371400),(371428,'武城县',3,371400),(371481,'乐陵市',3,371400),(371482,'禹城市',3,371400),(371500,'聊城市',2,370000),(371501,'市辖区',3,371500),(371502,'东昌府区',3,371500),(371521,'阳谷县',3,371500),(371522,'莘　县',3,371500),(371523,'茌平县',3,371500),(371524,'东阿县',3,371500),(371525,'冠　县',3,371500),(371526,'高唐县',3,371500),(371581,'临清市',3,371500),(371600,'滨州市',2,370000),(371601,'市辖区',3,371600),(371602,'滨城区',3,371600),(371621,'惠民县',3,371600),(371622,'阳信县',3,371600),(371623,'无棣县',3,371600),(371624,'沾化县',3,371600),(371625,'博兴县',3,371600),(371626,'邹平县',3,371600),(371700,'菏泽市',2,370000),(371701,'市辖区',3,371700),(371702,'牡丹区',3,371700),(371721,'曹　县',3,371700),(371722,'单　县',3,371700),(371723,'成武县',3,371700),(371724,'巨野县',3,371700),(371725,'郓城县',3,371700),(371726,'鄄城县',3,371700),(371727,'定陶县',3,371700),(371728,'东明县',3,371700),(410000,'河南省',1,0),(410100,'郑州市',2,410000),(410101,'市辖区',3,410100),(410102,'中原区',3,410100),(410103,'二七区',3,410100),(410104,'管城回族区',3,410100),(410105,'金水区',3,410100),(410106,'上街区',3,410100),(410108,'邙山区',3,410100),(410122,'中牟县',3,410100),(410181,'巩义市',3,410100),(410182,'荥阳市',3,410100),(410183,'新密市',3,410100),(410184,'新郑市',3,410100),(410185,'登封市',3,410100),(410200,'开封市',2,410000),(410201,'市辖区',3,410200),(410202,'龙亭区',3,410200),(410203,'顺河回族区',3,410200),(410204,'鼓楼区',3,410200),(410205,'南关区',3,410200),(410211,'郊　区',3,410200),(410221,'杞　县',3,410200),(410222,'通许县',3,410200),(410223,'尉氏县',3,410200),(410224,'开封县',3,410200),(410225,'兰考县',3,410200),(410300,'洛阳市',2,410000),(410301,'市辖区',3,410300),(410302,'老城区',3,410300),(410303,'西工区',3,410300),(410304,'廛河回族区',3,410300),(410305,'涧西区',3,410300),(410306,'吉利区',3,410300),(410307,'洛龙区',3,410300),(410322,'孟津县',3,410300),(410323,'新安县',3,410300),(410324,'栾川县',3,410300),(410325,'嵩　县',3,410300),(410326,'汝阳县',3,410300),(410327,'宜阳县',3,410300),(410328,'洛宁县',3,410300),(410329,'伊川县',3,410300),(410381,'偃师市',3,410300),(410400,'平顶山市',2,410000),(410401,'市辖区',3,410400),(410402,'新华区',3,410400),(410403,'卫东区',3,410400),(410404,'石龙区',3,410400),(410411,'湛河区',3,410400),(410421,'宝丰县',3,410400),(410422,'叶　县',3,410400),(410423,'鲁山县',3,410400),(410425,'郏　县',3,410400),(410481,'舞钢市',3,410400),(410482,'汝州市',3,410400),(410500,'安阳市',2,410000),(410501,'市辖区',3,410500),(410502,'文峰区',3,410500),(410503,'北关区',3,410500),(410505,'殷都区',3,410500),(410506,'龙安区',3,410500),(410522,'安阳县',3,410500),(410523,'汤阴县',3,410500),(410526,'滑　县',3,410500),(410527,'内黄县',3,410500),(410581,'林州市',3,410500),(410600,'鹤壁市',2,410000),(410601,'市辖区',3,410600),(410602,'鹤山区',3,410600),(410603,'山城区',3,410600),(410611,'淇滨区',3,410600),(410621,'浚　县',3,410600),(410622,'淇　县',3,410600),(410700,'新乡市',2,410000),(410701,'市辖区',3,410700),(410702,'红旗区',3,410700),(410703,'卫滨区',3,410700),(410704,'凤泉区',3,410700),(410711,'牧野区',3,410700),(410721,'新乡县',3,410700),(410724,'获嘉县',3,410700),(410725,'原阳县',3,410700),(410726,'延津县',3,410700),(410727,'封丘县',3,410700),(410728,'长垣县',3,410700),(410781,'卫辉市',3,410700),(410782,'辉县市',3,410700),(410800,'焦作市',2,410000),(410801,'市辖区',3,410800),(410802,'解放区',3,410800),(410803,'中站区',3,410800),(410804,'马村区',3,410800),(410811,'山阳区',3,410800),(410821,'修武县',3,410800),(410822,'博爱县',3,410800),(410823,'武陟县',3,410800),(410825,'温　县',3,410800),(410881,'济源市',3,410800),(410882,'沁阳市',3,410800),(410883,'孟州市',3,410800),(410900,'濮阳市',2,410000),(410901,'市辖区',3,410900),(410902,'华龙区',3,410900),(410922,'清丰县',3,410900),(410923,'南乐县',3,410900),(410926,'范　县',3,410900),(410927,'台前县',3,410900),(410928,'濮阳县',3,410900),(411000,'许昌市',2,410000),(411001,'市辖区',3,411000),(411002,'魏都区',3,411000),(411023,'许昌县',3,411000),(411024,'鄢陵县',3,411000),(411025,'襄城县',3,411000),(411081,'禹州市',3,411000),(411082,'长葛市',3,411000),(411100,'漯河市',2,410000),(411101,'市辖区',3,411100),(411102,'源汇区',3,411100),(411103,'郾城区',3,411100),(411104,'召陵区',3,411100),(411121,'舞阳县',3,411100),(411122,'临颍县',3,411100),(411200,'三门峡市',2,410000),(411201,'市辖区',3,411200),(411202,'湖滨区',3,411200),(411221,'渑池县',3,411200),(411222,'陕　县',3,411200),(411224,'卢氏县',3,411200),(411281,'义马市',3,411200),(411282,'灵宝市',3,411200),(411300,'南阳市',2,410000),(411301,'市辖区',3,411300),(411302,'宛城区',3,411300),(411303,'卧龙区',3,411300),(411321,'南召县',3,411300),(411322,'方城县',3,411300),(411323,'西峡县',3,411300),(411324,'镇平县',3,411300),(411325,'内乡县',3,411300),(411326,'淅川县',3,411300),(411327,'社旗县',3,411300),(411328,'唐河县',3,411300),(411329,'新野县',3,411300),(411330,'桐柏县',3,411300),(411381,'邓州市',3,411300),(411400,'商丘市',2,410000),(411401,'市辖区',3,411400),(411402,'梁园区',3,411400),(411403,'睢阳区',3,411400),(411421,'民权县',3,411400),(411422,'睢　县',3,411400),(411423,'宁陵县',3,411400),(411424,'柘城县',3,411400),(411425,'虞城县',3,411400),(411426,'夏邑县',3,411400),(411481,'永城市',3,411400),(411500,'信阳市',2,410000),(411501,'市辖区',3,411500),(411502,'师河区',3,411500),(411503,'平桥区',3,411500),(411521,'罗山县',3,411500),(411522,'光山县',3,411500),(411523,'新　县',3,411500),(411524,'商城县',3,411500),(411525,'固始县',3,411500),(411526,'潢川县',3,411500),(411527,'淮滨县',3,411500),(411528,'息　县',3,411500),(411600,'周口市',2,410000),(411601,'市辖区',3,411600),(411602,'川汇区',3,411600),(411621,'扶沟县',3,411600),(411622,'西华县',3,411600),(411623,'商水县',3,411600),(411624,'沈丘县',3,411600),(411625,'郸城县',3,411600),(411626,'淮阳县',3,411600),(411627,'太康县',3,411600),(411628,'鹿邑县',3,411600),(411681,'项城市',3,411600),(411700,'驻马店市',2,410000),(411701,'市辖区',3,411700),(411702,'驿城区',3,411700),(411721,'西平县',3,411700),(411722,'上蔡县',3,411700),(411723,'平舆县',3,411700),(411724,'正阳县',3,411700),(411725,'确山县',3,411700),(411726,'泌阳县',3,411700),(411727,'汝南县',3,411700),(411728,'遂平县',3,411700),(411729,'新蔡县',3,411700),(420000,'湖北省',1,0),(420100,'武汉市',2,420000),(420101,'市辖区',3,420100),(420102,'江岸区',3,420100),(420103,'江汉区',3,420100),(420104,'乔口区',3,420100),(420105,'汉阳区',3,420100),(420106,'武昌区',3,420100),(420107,'青山区',3,420100),(420111,'洪山区',3,420100),(420112,'东西湖区',3,420100),(420113,'汉南区',3,420100),(420114,'蔡甸区',3,420100),(420115,'江夏区',3,420100),(420116,'黄陂区',3,420100),(420117,'新洲区',3,420100),(420200,'黄石市',2,420000),(420201,'市辖区',3,420200),(420202,'黄石港区',3,420200),(420203,'西塞山区',3,420200),(420204,'下陆区',3,420200),(420205,'铁山区',3,420200),(420222,'阳新县',3,420200),(420281,'大冶市',3,420200),(420300,'十堰市',2,420000),(420301,'市辖区',3,420300),(420302,'茅箭区',3,420300),(420303,'张湾区',3,420300),(420321,'郧　县',3,420300),(420322,'郧西县',3,420300),(420323,'竹山县',3,420300),(420324,'竹溪县',3,420300),(420325,'房　县',3,420300),(420381,'丹江口市',3,420300),(420500,'宜昌市',2,420000),(420501,'市辖区',3,420500),(420502,'西陵区',3,420500),(420503,'伍家岗区',3,420500),(420504,'点军区',3,420500),(420505,'猇亭区',3,420500),(420506,'夷陵区',3,420500),(420525,'远安县',3,420500),(420526,'兴山县',3,420500),(420527,'秭归县',3,420500),(420528,'长阳土家族自治县',3,420500),(420529,'五峰土家族自治县',3,420500),(420581,'宜都市',3,420500),(420582,'当阳市',3,420500),(420583,'枝江市',3,420500),(420600,'襄樊市',2,420000),(420601,'市辖区',3,420600),(420602,'襄城区',3,420600),(420606,'樊城区',3,420600),(420607,'襄阳区',3,420600),(420624,'南漳县',3,420600),(420625,'谷城县',3,420600),(420626,'保康县',3,420600),(420682,'老河口市',3,420600),(420683,'枣阳市',3,420600),(420684,'宜城市',3,420600),(420700,'鄂州市',2,420000),(420701,'市辖区',3,420700),(420702,'梁子湖区',3,420700),(420703,'华容区',3,420700),(420704,'鄂城区',3,420700),(420800,'荆门市',2,420000),(420801,'市辖区',3,420800),(420802,'东宝区',3,420800),(420804,'掇刀区',3,420800),(420821,'京山县',3,420800),(420822,'沙洋县',3,420800),(420881,'钟祥市',3,420800),(420900,'孝感市',2,420000),(420901,'市辖区',3,420900),(420902,'孝南区',3,420900),(420921,'孝昌县',3,420900),(420922,'大悟县',3,420900),(420923,'云梦县',3,420900),(420981,'应城市',3,420900),(420982,'安陆市',3,420900),(420984,'汉川市',3,420900),(421000,'荆州市',2,420000),(421001,'市辖区',3,421000),(421002,'沙市区',3,421000),(421003,'荆州区',3,421000),(421022,'公安县',3,421000),(421023,'监利县',3,421000),(421024,'江陵县',3,421000),(421081,'石首市',3,421000),(421083,'洪湖市',3,421000),(421087,'松滋市',3,421000),(421100,'黄冈市',2,420000),(421101,'市辖区',3,421100),(421102,'黄州区',3,421100),(421121,'团风县',3,421100),(421122,'红安县',3,421100),(421123,'罗田县',3,421100),(421124,'英山县',3,421100),(421125,'浠水县',3,421100),(421126,'蕲春县',3,421100),(421127,'黄梅县',3,421100),(421181,'麻城市',3,421100),(421182,'武穴市',3,421100),(421200,'咸宁市',2,420000),(421201,'市辖区',3,421200),(421202,'咸安区',3,421200),(421221,'嘉鱼县',3,421200),(421222,'通城县',3,421200),(421223,'崇阳县',3,421200),(421224,'通山县',3,421200),(421281,'赤壁市',3,421200),(421300,'随州市',2,420000),(421301,'市辖区',3,421300),(421302,'曾都区',3,421300),(421381,'广水市',3,421300),(422800,'恩施土家族苗族自治州',2,420000),(422801,'恩施市',3,422800),(422802,'利川市',3,422800),(422822,'建始县',3,422800),(422823,'巴东县',3,422800),(422825,'宣恩县',3,422800),(422826,'咸丰县',3,422800),(422827,'来凤县',3,422800),(422828,'鹤峰县',3,422800),(429000,'省直辖行政单位',2,420000),(429004,'仙桃市',3,429000),(429005,'潜江市',3,429000),(429006,'天门市',3,429000),(429021,'神农架林区',3,429000),(430000,'湖南省',1,0),(430100,'长沙市',2,430000),(430101,'市辖区',3,430100),(430102,'芙蓉区',3,430100),(430103,'天心区',3,430100),(430104,'岳麓区',3,430100),(430105,'开福区',3,430100),(430111,'雨花区',3,430100),(430121,'长沙县',3,430100),(430122,'望城县',3,430100),(430124,'宁乡县',3,430100),(430181,'浏阳市',3,430100),(430200,'株洲市',2,430000),(430201,'市辖区',3,430200),(430202,'荷塘区',3,430200),(430203,'芦淞区',3,430200),(430204,'石峰区',3,430200),(430211,'天元区',3,430200),(430221,'株洲县',3,430200),(430223,'攸　县',3,430200),(430224,'茶陵县',3,430200),(430225,'炎陵县',3,430200),(430281,'醴陵市',3,430200),(430300,'湘潭市',2,430000),(430301,'市辖区',3,430300),(430302,'雨湖区',3,430300),(430304,'岳塘区',3,430300),(430321,'湘潭县',3,430300),(430381,'湘乡市',3,430300),(430382,'韶山市',3,430300),(430400,'衡阳市',2,430000),(430401,'市辖区',3,430400),(430405,'珠晖区',3,430400),(430406,'雁峰区',3,430400),(430407,'石鼓区',3,430400),(430408,'蒸湘区',3,430400),(430412,'南岳区',3,430400),(430421,'衡阳县',3,430400),(430422,'衡南县',3,430400),(430423,'衡山县',3,430400),(430424,'衡东县',3,430400),(430426,'祁东县',3,430400),(430481,'耒阳市',3,430400),(430482,'常宁市',3,430400),(430500,'邵阳市',2,430000),(430501,'市辖区',3,430500),(430502,'双清区',3,430500),(430503,'大祥区',3,430500),(430511,'北塔区',3,430500),(430521,'邵东县',3,430500),(430522,'新邵县',3,430500),(430523,'邵阳县',3,430500),(430524,'隆回县',3,430500),(430525,'洞口县',3,430500),(430527,'绥宁县',3,430500),(430528,'新宁县',3,430500),(430529,'城步苗族自治县',3,430500),(430581,'武冈市',3,430500),(430600,'岳阳市',2,430000),(430601,'市辖区',3,430600),(430602,'岳阳楼区',3,430600),(430603,'云溪区',3,430600),(430611,'君山区',3,430600),(430621,'岳阳县',3,430600),(430623,'华容县',3,430600),(430624,'湘阴县',3,430600),(430626,'平江县',3,430600),(430681,'汨罗市',3,430600),(430682,'临湘市',3,430600),(430700,'常德市',2,430000),(430701,'市辖区',3,430700),(430702,'武陵区',3,430700),(430703,'鼎城区',3,430700),(430721,'安乡县',3,430700),(430722,'汉寿县',3,430700),(430723,'澧　县',3,430700),(430724,'临澧县',3,430700),(430725,'桃源县',3,430700),(430726,'石门县',3,430700),(430781,'津市市',3,430700),(430800,'张家界市',2,430000),(430801,'市辖区',3,430800),(430802,'永定区',3,430800),(430811,'武陵源区',3,430800),(430821,'慈利县',3,430800),(430822,'桑植县',3,430800),(430900,'益阳市',2,430000),(430901,'市辖区',3,430900),(430902,'资阳区',3,430900),(430903,'赫山区',3,430900),(430921,'南　县',3,430900),(430922,'桃江县',3,430900),(430923,'安化县',3,430900),(430981,'沅江市',3,430900),(431000,'郴州市',2,430000),(431001,'市辖区',3,431000),(431002,'北湖区',3,431000),(431003,'苏仙区',3,431000),(431021,'桂阳县',3,431000),(431022,'宜章县',3,431000),(431023,'永兴县',3,431000),(431024,'嘉禾县',3,431000),(431025,'临武县',3,431000),(431026,'汝城县',3,431000),(431027,'桂东县',3,431000),(431028,'安仁县',3,431000),(431081,'资兴市',3,431000),(431100,'永州市',2,430000),(431101,'市辖区',3,431100),(431102,'芝山区',3,431100),(431103,'冷水滩区',3,431100),(431121,'祁阳县',3,431100),(431122,'东安县',3,431100),(431123,'双牌县',3,431100),(431124,'道　县',3,431100),(431125,'江永县',3,431100),(431126,'宁远县',3,431100),(431127,'蓝山县',3,431100),(431128,'新田县',3,431100),(431129,'江华瑶族自治县',3,431100),(431200,'怀化市',2,430000),(431201,'市辖区',3,431200),(431202,'鹤城区',3,431200),(431221,'中方县',3,431200),(431222,'沅陵县',3,431200),(431223,'辰溪县',3,431200),(431224,'溆浦县',3,431200),(431225,'会同县',3,431200),(431226,'麻阳苗族自治县',3,431200),(431227,'新晃侗族自治县',3,431200),(431228,'芷江侗族自治县',3,431200),(431229,'靖州苗族侗族自治县',3,431200),(431230,'通道侗族自治县',3,431200),(431281,'洪江市',3,431200),(431300,'娄底市',2,430000),(431301,'市辖区',3,431300),(431302,'娄星区',3,431300),(431321,'双峰县',3,431300),(431322,'新化县',3,431300),(431381,'冷水江市',3,431300),(431382,'涟源市',3,431300),(433100,'湘西土家族苗族自治州',2,430000),(433101,'吉首市',3,433100),(433122,'泸溪县',3,433100),(433123,'凤凰县',3,433100),(433124,'花垣县',3,433100),(433125,'保靖县',3,433100),(433126,'古丈县',3,433100),(433127,'永顺县',3,433100),(433130,'龙山县',3,433100),(440000,'广东省',1,0),(440100,'广州市',2,440000),(440101,'市辖区',3,440100),(440102,'东山区',3,440100),(440103,'荔湾区',3,440100),(440104,'越秀区',3,440100),(440105,'海珠区',3,440100),(440106,'天河区',3,440100),(440107,'芳村区',3,440100),(440111,'白云区',3,440100),(440112,'黄埔区',3,440100),(440113,'番禺区',3,440100),(440114,'花都区',3,440100),(440183,'增城市',3,440100),(440184,'从化市',3,440100),(440200,'韶关市',2,440000),(440201,'市辖区',3,440200),(440203,'武江区',3,440200),(440204,'浈江区',3,440200),(440205,'曲江区',3,440200),(440222,'始兴县',3,440200),(440224,'仁化县',3,440200),(440229,'翁源县',3,440200),(440232,'乳源瑶族自治县',3,440200),(440233,'新丰县',3,440200),(440281,'乐昌市',3,440200),(440282,'南雄市',3,440200),(440300,'深圳市',2,440000),(440301,'市辖区',3,440300),(440303,'罗湖区',3,440300),(440304,'福田区',3,440300),(440305,'南山区',3,440300),(440306,'宝安区',3,440300),(440307,'龙岗区',3,440300),(440308,'盐田区',3,440300),(440400,'珠海市',2,440000),(440401,'市辖区',3,440400),(440402,'香洲区',3,440400),(440403,'斗门区',3,440400),(440404,'金湾区',3,440400),(440500,'汕头市',2,440000),(440501,'市辖区',3,440500),(440507,'龙湖区',3,440500),(440511,'金平区',3,440500),(440512,'濠江区',3,440500),(440513,'潮阳区',3,440500),(440514,'潮南区',3,440500),(440515,'澄海区',3,440500),(440523,'南澳县',3,440500),(440600,'佛山市',2,440000),(440601,'市辖区',3,440600),(440604,'禅城区',3,440600),(440605,'南海区',3,440600),(440606,'顺德区',3,440600),(440607,'三水区',3,440600),(440608,'高明区',3,440600),(440700,'江门市',2,440000),(440701,'市辖区',3,440700),(440703,'蓬江区',3,440700),(440704,'江海区',3,440700),(440705,'新会区',3,440700),(440781,'台山市',3,440700),(440783,'开平市',3,440700),(440784,'鹤山市',3,440700),(440785,'恩平市',3,440700),(440800,'湛江市',2,440000),(440801,'市辖区',3,440800),(440802,'赤坎区',3,440800),(440803,'霞山区',3,440800),(440804,'坡头区',3,440800),(440811,'麻章区',3,440800),(440823,'遂溪县',3,440800),(440825,'徐闻县',3,440800),(440881,'廉江市',3,440800),(440882,'雷州市',3,440800),(440883,'吴川市',3,440800),(440900,'茂名市',2,440000),(440901,'市辖区',3,440900),(440902,'茂南区',3,440900),(440903,'茂港区',3,440900),(440923,'电白县',3,440900),(440981,'高州市',3,440900),(440982,'化州市',3,440900),(440983,'信宜市',3,440900),(441200,'肇庆市',2,440000),(441201,'市辖区',3,441200),(441202,'端州区',3,441200),(441203,'鼎湖区',3,441200),(441223,'广宁县',3,441200),(441224,'怀集县',3,441200),(441225,'封开县',3,441200),(441226,'德庆县',3,441200),(441283,'高要市',3,441200),(441284,'四会市',3,441200),(441300,'惠州市',2,440000),(441301,'市辖区',3,441300),(441302,'惠城区',3,441300),(441303,'惠阳区',3,441300),(441322,'博罗县',3,441300),(441323,'惠东县',3,441300),(441324,'龙门县',3,441300),(441400,'梅州市',2,440000),(441401,'市辖区',3,441400),(441402,'梅江区',3,441400),(441421,'梅　县',3,441400),(441422,'大埔县',3,441400),(441423,'丰顺县',3,441400),(441424,'五华县',3,441400),(441426,'平远县',3,441400),(441427,'蕉岭县',3,441400),(441481,'兴宁市',3,441400),(441500,'汕尾市',2,440000),(441501,'市辖区',3,441500),(441502,'城　区',3,441500),(441521,'海丰县',3,441500),(441523,'陆河县',3,441500),(441581,'陆丰市',3,441500),(441600,'河源市',2,440000),(441601,'市辖区',3,441600),(441602,'源城区',3,441600),(441621,'紫金县',3,441600),(441622,'龙川县',3,441600),(441623,'连平县',3,441600),(441624,'和平县',3,441600),(441625,'东源县',3,441600),(441700,'阳江市',2,440000),(441701,'市辖区',3,441700),(441702,'江城区',3,441700),(441721,'阳西县',3,441700),(441723,'阳东县',3,441700),(441781,'阳春市',3,441700),(441800,'清远市',2,440000),(441801,'市辖区',3,441800),(441802,'清城区',3,441800),(441821,'佛冈县',3,441800),(441823,'阳山县',3,441800),(441825,'连山壮族瑶族自治县',3,441800),(441826,'连南瑶族自治县',3,441800),(441827,'清新县',3,441800),(441881,'英德市',3,441800),(441882,'连州市',3,441800),(441900,'东莞市',2,440000),(442000,'中山市',2,440000),(445100,'潮州市',2,440000),(445101,'市辖区',3,445100),(445102,'湘桥区',3,445100),(445121,'潮安县',3,445100),(445122,'饶平县',3,445100),(445200,'揭阳市',2,440000),(445201,'市辖区',3,445200),(445202,'榕城区',3,445200),(445221,'揭东县',3,445200),(445222,'揭西县',3,445200),(445224,'惠来县',3,445200),(445281,'普宁市',3,445200),(445300,'云浮市',2,440000),(445301,'市辖区',3,445300),(445302,'云城区',3,445300),(445321,'新兴县',3,445300),(445322,'郁南县',3,445300),(445323,'云安县',3,445300),(445381,'罗定市',3,445300),(450000,'广西省',1,0),(450100,'南宁市',2,450000),(450101,'市辖区',3,450100),(450102,'兴宁区',3,450100),(450103,'青秀区',3,450100),(450105,'江南区',3,450100),(450107,'西乡塘区',3,450100),(450108,'良庆区',3,450100),(450109,'邕宁区',3,450100),(450122,'武鸣县',3,450100),(450123,'隆安县',3,450100),(450124,'马山县',3,450100),(450125,'上林县',3,450100),(450126,'宾阳县',3,450100),(450127,'横　县',3,450100),(450200,'柳州市',2,450000),(450201,'市辖区',3,450200),(450202,'城中区',3,450200),(450203,'鱼峰区',3,450200),(450204,'柳南区',3,450200),(450205,'柳北区',3,450200),(450221,'柳江县',3,450200),(450222,'柳城县',3,450200),(450223,'鹿寨县',3,450200),(450224,'融安县',3,450200),(450225,'融水苗族自治县',3,450200),(450226,'三江侗族自治县',3,450200),(450300,'桂林市',2,450000),(450301,'市辖区',3,450300),(450302,'秀峰区',3,450300),(450303,'叠彩区',3,450300),(450304,'象山区',3,450300),(450305,'七星区',3,450300),(450311,'雁山区',3,450300),(450321,'阳朔县',3,450300),(450322,'临桂县',3,450300),(450323,'灵川县',3,450300),(450324,'全州县',3,450300),(450325,'兴安县',3,450300),(450326,'永福县',3,450300),(450327,'灌阳县',3,450300),(450328,'龙胜各族自治县',3,450300),(450329,'资源县',3,450300),(450330,'平乐县',3,450300),(450331,'荔蒲县',3,450300),(450332,'恭城瑶族自治县',3,450300),(450400,'梧州市',2,450000),(450401,'市辖区',3,450400),(450403,'万秀区',3,450400),(450404,'蝶山区',3,450400),(450405,'长洲区',3,450400),(450421,'苍梧县',3,450400),(450422,'藤　县',3,450400),(450423,'蒙山县',3,450400),(450481,'岑溪市',3,450400),(450500,'北海市',2,450000),(450501,'市辖区',3,450500),(450502,'海城区',3,450500),(450503,'银海区',3,450500),(450512,'铁山港区',3,450500),(450521,'合浦县',3,450500),(450600,'防城港市',2,450000),(450601,'市辖区',3,450600),(450602,'港口区',3,450600),(450603,'防城区',3,450600),(450621,'上思县',3,450600),(450681,'东兴市',3,450600),(450700,'钦州市',2,450000),(450701,'市辖区',3,450700),(450702,'钦南区',3,450700),(450703,'钦北区',3,450700),(450721,'灵山县',3,450700),(450722,'浦北县',3,450700),(450800,'贵港市',2,450000),(450801,'市辖区',3,450800),(450802,'港北区',3,450800),(450803,'港南区',3,450800),(450804,'覃塘区',3,450800),(450821,'平南县',3,450800),(450881,'桂平市',3,450800),(450900,'玉林市',2,450000),(450901,'市辖区',3,450900),(450902,'玉州区',3,450900),(450921,'容　县',3,450900),(450922,'陆川县',3,450900),(450923,'博白县',3,450900),(450924,'兴业县',3,450900),(450981,'北流市',3,450900),(451000,'百色市',2,450000),(451001,'市辖区',3,451000),(451002,'右江区',3,451000),(451021,'田阳县',3,451000),(451022,'田东县',3,451000),(451023,'平果县',3,451000),(451024,'德保县',3,451000),(451025,'靖西县',3,451000),(451026,'那坡县',3,451000),(451027,'凌云县',3,451000),(451028,'乐业县',3,451000),(451029,'田林县',3,451000),(451030,'西林县',3,451000),(451031,'隆林各族自治县',3,451000),(451100,'贺州市',2,450000),(451101,'市辖区',3,451100),(451102,'八步区',3,451100),(451121,'昭平县',3,451100),(451122,'钟山县',3,451100),(451123,'富川瑶族自治县',3,451100),(451200,'河池市',2,450000),(451201,'市辖区',3,451200),(451202,'金城江区',3,451200),(451221,'南丹县',3,451200),(451222,'天峨县',3,451200),(451223,'凤山县',3,451200),(451224,'东兰县',3,451200),(451225,'罗城仫佬族自治县',3,451200),(451226,'环江毛南族自治县',3,451200),(451227,'巴马瑶族自治县',3,451200),(451228,'都安瑶族自治县',3,451200),(451229,'大化瑶族自治县',3,451200),(451281,'宜州市',3,451200),(451300,'来宾市',2,450000),(451301,'市辖区',3,451300),(451302,'兴宾区',3,451300),(451321,'忻城县',3,451300),(451322,'象州县',3,451300),(451323,'武宣县',3,451300),(451324,'金秀瑶族自治县',3,451300),(451381,'合山市',3,451300),(451400,'崇左市',2,450000),(451401,'市辖区',3,451400),(451402,'江洲区',3,451400),(451421,'扶绥县',3,451400),(451422,'宁明县',3,451400),(451423,'龙州县',3,451400),(451424,'大新县',3,451400),(451425,'天等县',3,451400),(451481,'凭祥市',3,451400),(460000,'海南省',1,0),(460100,'海口市',2,460000),(460101,'市辖区',3,460100),(460105,'秀英区',3,460100),(460106,'龙华区',3,460100),(460107,'琼山区',3,460100),(460108,'美兰区',3,460100),(460200,'三亚市',2,460000),(460201,'市辖区',3,460200),(469000,'省直辖县级行政单位',2,460000),(469001,'五指山市',3,469000),(469002,'琼海市',3,469000),(469003,'儋州市',3,469000),(469005,'文昌市',3,469000),(469006,'万宁市',3,469000),(469007,'东方市',3,469000),(469025,'定安县',3,469000),(469026,'屯昌县',3,469000),(469027,'澄迈县',3,469000),(469028,'临高县',3,469000),(469030,'白沙黎族自治县',3,469000),(469031,'昌江黎族自治县',3,469000),(469033,'乐东黎族自治县',3,469000),(469034,'陵水黎族自治县',3,469000),(469035,'保亭黎族苗族自治县',3,469000),(469036,'琼中黎族苗族自治县',3,469000),(469037,'西沙群岛',3,469000),(469038,'南沙群岛',3,469000),(469039,'中沙群岛的岛礁及其海域',3,469000),(500000,'重庆市',1,0),(500100,'市辖区',2,500000),(500101,'万州区',3,500100),(500102,'涪陵区',3,500100),(500103,'渝中区',3,500100),(500104,'大渡口区',3,500100),(500105,'江北区',3,500100),(500106,'沙坪坝区',3,500100),(500107,'九龙坡区',3,500100),(500108,'南岸区',3,500100),(500109,'北碚区',3,500100),(500110,'万盛区',3,500100),(500111,'双桥区',3,500100),(500112,'渝北区',3,500100),(500113,'巴南区',3,500100),(500114,'黔江区',3,500100),(500115,'长寿区',3,500100),(500200,'县',2,500000),(500222,'綦江县',3,500200),(500223,'潼南县',3,500200),(500224,'铜梁县',3,500200),(500225,'大足县',3,500200),(500226,'荣昌县',3,500200),(500227,'璧山县',3,500200),(500228,'梁平县',3,500200),(500229,'城口县',3,500200),(500230,'丰都县',3,500200),(500231,'垫江县',3,500200),(500232,'武隆县',3,500200),(500233,'忠　县',3,500200),(500234,'开　县',3,500200),(500235,'云阳县',3,500200),(500236,'奉节县',3,500200),(500237,'巫山县',3,500200),(500238,'巫溪县',3,500200),(500240,'石柱土家族自治县',3,500200),(500241,'秀山土家族苗族自治县',3,500200),(500242,'酉阳土家族苗族自治县',3,500200),(500243,'彭水苗族土家族自治县',3,500200),(500300,'市',2,500000),(500381,'江津市',3,500300),(500382,'合川市',3,500300),(500383,'永川市',3,500300),(500384,'南川市',3,500300),(510000,'四川省',1,0),(510100,'成都市',2,510000),(510101,'市辖区',3,510100),(510104,'锦江区',3,510100),(510105,'青羊区',3,510100),(510106,'金牛区',3,510100),(510107,'武侯区',3,510100),(510108,'成华区',3,510100),(510112,'龙泉驿区',3,510100),(510113,'青白江区',3,510100),(510114,'新都区',3,510100),(510115,'温江区',3,510100),(510121,'金堂县',3,510100),(510122,'双流县',3,510100),(510124,'郫　县',3,510100),(510129,'大邑县',3,510100),(510131,'蒲江县',3,510100),(510132,'新津县',3,510100),(510181,'都江堰市',3,510100),(510182,'彭州市',3,510100),(510183,'邛崃市',3,510100),(510184,'崇州市',3,510100),(510300,'自贡市',2,510000),(510301,'市辖区',3,510300),(510302,'自流井区',3,510300),(510303,'贡井区',3,510300),(510304,'大安区',3,510300),(510311,'沿滩区',3,510300),(510321,'荣　县',3,510300),(510322,'富顺县',3,510300),(510400,'攀枝花市',2,510000),(510401,'市辖区',3,510400),(510402,'东　区',3,510400),(510403,'西　区',3,510400),(510411,'仁和区',3,510400),(510421,'米易县',3,510400),(510422,'盐边县',3,510400),(510500,'泸州市',2,510000),(510501,'市辖区',3,510500),(510502,'江阳区',3,510500),(510503,'纳溪区',3,510500),(510504,'龙马潭区',3,510500),(510521,'泸　县',3,510500),(510522,'合江县',3,510500),(510524,'叙永县',3,510500),(510525,'古蔺县',3,510500),(510600,'德阳市',2,510000),(510601,'市辖区',3,510600),(510603,'旌阳区',3,510600),(510623,'中江县',3,510600),(510626,'罗江县',3,510600),(510681,'广汉市',3,510600),(510682,'什邡市',3,510600),(510683,'绵竹市',3,510600),(510700,'绵阳市',2,510000),(510701,'市辖区',3,510700),(510703,'涪城区',3,510700),(510704,'游仙区',3,510700),(510722,'三台县',3,510700),(510723,'盐亭县',3,510700),(510724,'安　县',3,510700),(510725,'梓潼县',3,510700),(510726,'北川羌族自治县',3,510700),(510727,'平武县',3,510700),(510781,'江油市',3,510700),(510800,'广元市',2,510000),(510801,'市辖区',3,510800),(510802,'市中区',3,510800),(510811,'元坝区',3,510800),(510812,'朝天区',3,510800),(510821,'旺苍县',3,510800),(510822,'青川县',3,510800),(510823,'剑阁县',3,510800),(510824,'苍溪县',3,510800),(510900,'遂宁市',2,510000),(510901,'市辖区',3,510900),(510903,'船山区',3,510900),(510904,'安居区',3,510900),(510921,'蓬溪县',3,510900),(510922,'射洪县',3,510900),(510923,'大英县',3,510900),(511000,'内江市',2,510000),(511001,'市辖区',3,511000),(511002,'市中区',3,511000),(511011,'东兴区',3,511000),(511024,'威远县',3,511000),(511025,'资中县',3,511000),(511028,'隆昌县',3,511000),(511100,'乐山市',2,510000),(511101,'市辖区',3,511100),(511102,'市中区',3,511100),(511111,'沙湾区',3,511100),(511112,'五通桥区',3,511100),(511113,'金口河区',3,511100),(511123,'犍为县',3,511100),(511124,'井研县',3,511100),(511126,'夹江县',3,511100),(511129,'沐川县',3,511100),(511132,'峨边彝族自治县',3,511100),(511133,'马边彝族自治县',3,511100),(511181,'峨眉山市',3,511100),(511300,'南充市',2,510000),(511301,'市辖区',3,511300),(511302,'顺庆区',3,511300),(511303,'高坪区',3,511300),(511304,'嘉陵区',3,511300),(511321,'南部县',3,511300),(511322,'营山县',3,511300),(511323,'蓬安县',3,511300),(511324,'仪陇县',3,511300),(511325,'西充县',3,511300),(511381,'阆中市',3,511300),(511400,'眉山市',2,510000),(511401,'市辖区',3,511400),(511402,'东坡区',3,511400),(511421,'仁寿县',3,511400),(511422,'彭山县',3,511400),(511423,'洪雅县',3,511400),(511424,'丹棱县',3,511400),(511425,'青神县',3,511400),(511500,'宜宾市',2,510000),(511501,'市辖区',3,511500),(511502,'翠屏区',3,511500),(511521,'宜宾县',3,511500),(511522,'南溪县',3,511500),(511523,'江安县',3,511500),(511524,'长宁县',3,511500),(511525,'高　县',3,511500),(511526,'珙　县',3,511500),(511527,'筠连县',3,511500),(511528,'兴文县',3,511500),(511529,'屏山县',3,511500),(511600,'广安市',2,510000),(511601,'市辖区',3,511600),(511602,'广安区',3,511600),(511621,'岳池县',3,511600),(511622,'武胜县',3,511600),(511623,'邻水县',3,511600),(511681,'华莹市',3,511600),(511700,'达州市',2,510000),(511701,'市辖区',3,511700),(511702,'通川区',3,511700),(511721,'达　县',3,511700),(511722,'宣汉县',3,511700),(511723,'开江县',3,511700),(511724,'大竹县',3,511700),(511725,'渠　县',3,511700),(511781,'万源市',3,511700),(511800,'雅安市',2,510000),(511801,'市辖区',3,511800),(511802,'雨城区',3,511800),(511821,'名山县',3,511800),(511822,'荥经县',3,511800),(511823,'汉源县',3,511800),(511824,'石棉县',3,511800),(511825,'天全县',3,511800),(511826,'芦山县',3,511800),(511827,'宝兴县',3,511800),(511900,'巴中市',2,510000),(511901,'市辖区',3,511900),(511902,'巴州区',3,511900),(511921,'通江县',3,511900),(511922,'南江县',3,511900),(511923,'平昌县',3,511900),(512000,'资阳市',2,510000),(512001,'市辖区',3,512000),(512002,'雁江区',3,512000),(512021,'安岳县',3,512000),(512022,'乐至县',3,512000),(512081,'简阳市',3,512000),(513200,'阿坝藏族羌族自治州',2,510000),(513221,'汶川县',3,513200),(513222,'理　县',3,513200),(513223,'茂　县',3,513200),(513224,'松潘县',3,513200),(513225,'九寨沟县',3,513200),(513226,'金川县',3,513200),(513227,'小金县',3,513200),(513228,'黑水县',3,513200),(513229,'马尔康县',3,513200),(513230,'壤塘县',3,513200),(513231,'阿坝县',3,513200),(513232,'若尔盖县',3,513200),(513233,'红原县',3,513200),(513300,'甘孜藏族自治州',2,510000),(513321,'康定县',3,513300),(513322,'泸定县',3,513300),(513323,'丹巴县',3,513300),(513324,'九龙县',3,513300),(513325,'雅江县',3,513300),(513326,'道孚县',3,513300),(513327,'炉霍县',3,513300),(513328,'甘孜县',3,513300),(513329,'新龙县',3,513300),(513330,'德格县',3,513300),(513331,'白玉县',3,513300),(513332,'石渠县',3,513300),(513333,'色达县',3,513300),(513334,'理塘县',3,513300),(513335,'巴塘县',3,513300),(513336,'乡城县',3,513300),(513337,'稻城县',3,513300),(513338,'得荣县',3,513300),(513400,'凉山彝族自治州',2,510000),(513401,'西昌市',3,513400),(513422,'木里藏族自治县',3,513400),(513423,'盐源县',3,513400),(513424,'德昌县',3,513400),(513425,'会理县',3,513400),(513426,'会东县',3,513400),(513427,'宁南县',3,513400),(513428,'普格县',3,513400),(513429,'布拖县',3,513400),(513430,'金阳县',3,513400),(513431,'昭觉县',3,513400),(513432,'喜德县',3,513400),(513433,'冕宁县',3,513400),(513434,'越西县',3,513400),(513435,'甘洛县',3,513400),(513436,'美姑县',3,513400),(513437,'雷波县',3,513400),(520000,'贵州省',1,0),(520100,'贵阳市',2,520000),(520101,'市辖区',3,520100),(520102,'南明区',3,520100),(520103,'云岩区',3,520100),(520111,'花溪区',3,520100),(520112,'乌当区',3,520100),(520113,'白云区',3,520100),(520114,'小河区',3,520100),(520121,'开阳县',3,520100),(520122,'息烽县',3,520100),(520123,'修文县',3,520100),(520181,'清镇市',3,520100),(520200,'六盘水市',2,520000),(520201,'钟山区',3,520200),(520203,'六枝特区',3,520200),(520221,'水城县',3,520200),(520222,'盘　县',3,520200),(520300,'遵义市',2,520000),(520301,'市辖区',3,520300),(520302,'红花岗区',3,520300),(520303,'汇川区',3,520300),(520321,'遵义县',3,520300),(520322,'桐梓县',3,520300),(520323,'绥阳县',3,520300),(520324,'正安县',3,520300),(520325,'道真仡佬族苗族自治县',3,520300),(520326,'务川仡佬族苗族自治县',3,520300),(520327,'凤冈县',3,520300),(520328,'湄潭县',3,520300),(520329,'余庆县',3,520300),(520330,'习水县',3,520300),(520381,'赤水市',3,520300),(520382,'仁怀市',3,520300),(520400,'安顺市',2,520000),(520401,'市辖区',3,520400),(520402,'西秀区',3,520400),(520421,'平坝县',3,520400),(520422,'普定县',3,520400),(520423,'镇宁布依族苗族自治县',3,520400),(520424,'关岭布依族苗族自治县',3,520400),(520425,'紫云苗族布依族自治县',3,520400),(522200,'铜仁地区',2,520000),(522201,'铜仁市',3,522200),(522222,'江口县',3,522200),(522223,'玉屏侗族自治县',3,522200),(522224,'石阡县',3,522200),(522225,'思南县',3,522200),(522226,'印江土家族苗族自治县',3,522200),(522227,'德江县',3,522200),(522228,'沿河土家族自治县',3,522200),(522229,'松桃苗族自治县',3,522200),(522230,'万山特区',3,522200),(522300,'黔西南布依族苗族自治州',2,520000),(522301,'兴义市',3,522300),(522322,'兴仁县',3,522300),(522323,'普安县',3,522300),(522324,'晴隆县',3,522300),(522325,'贞丰县',3,522300),(522326,'望谟县',3,522300),(522327,'册亨县',3,522300),(522328,'安龙县',3,522300),(522400,'毕节地区',2,520000),(522401,'毕节市',3,522400),(522422,'大方县',3,522400),(522423,'黔西县',3,522400),(522424,'金沙县',3,522400),(522425,'织金县',3,522400),(522426,'纳雍县',3,522400),(522427,'威宁彝族回族苗族自治县',3,522400),(522428,'赫章县',3,522400),(522600,'黔东南苗族侗族自治州',2,520000),(522601,'凯里市',3,522600),(522622,'黄平县',3,522600),(522623,'施秉县',3,522600),(522624,'三穗县',3,522600),(522625,'镇远县',3,522600),(522626,'岑巩县',3,522600),(522627,'天柱县',3,522600),(522628,'锦屏县',3,522600),(522629,'剑河县',3,522600),(522630,'台江县',3,522600),(522631,'黎平县',3,522600),(522632,'榕江县',3,522600),(522633,'从江县',3,522600),(522634,'雷山县',3,522600),(522635,'麻江县',3,522600),(522636,'丹寨县',3,522600),(522700,'黔南布依族苗族自治州',2,520000),(522701,'都匀市',3,522700),(522702,'福泉市',3,522700),(522722,'荔波县',3,522700),(522723,'贵定县',3,522700),(522725,'瓮安县',3,522700),(522726,'独山县',3,522700),(522727,'平塘县',3,522700),(522728,'罗甸县',3,522700),(522729,'长顺县',3,522700),(522730,'龙里县',3,522700),(522731,'惠水县',3,522700),(522732,'三都水族自治县',3,522700),(530000,'云南省',1,0),(530100,'昆明市',2,530000),(530101,'市辖区',3,530100),(530102,'五华区',3,530100),(530103,'盘龙区',3,530100),(530111,'官渡区',3,530100),(530112,'西山区',3,530100),(530113,'东川区',3,530100),(530121,'呈贡县',3,530100),(530122,'晋宁县',3,530100),(530124,'富民县',3,530100),(530125,'宜良县',3,530100),(530126,'石林彝族自治县',3,530100),(530127,'嵩明县',3,530100),(530128,'禄劝彝族苗族自治县',3,530100),(530129,'寻甸回族彝族自治县',3,530100),(530181,'安宁市',3,530100),(530300,'曲靖市',2,530000),(530301,'市辖区',3,530300),(530302,'麒麟区',3,530300),(530321,'马龙县',3,530300),(530322,'陆良县',3,530300),(530323,'师宗县',3,530300),(530324,'罗平县',3,530300),(530325,'富源县',3,530300),(530326,'会泽县',3,530300),(530328,'沾益县',3,530300),(530381,'宣威市',3,530300),(530400,'玉溪市',2,530000),(530401,'市辖区',3,530400),(530402,'红塔区',3,530400),(530421,'江川县',3,530400),(530422,'澄江县',3,530400),(530423,'通海县',3,530400),(530424,'华宁县',3,530400),(530425,'易门县',3,530400),(530426,'峨山彝族自治县',3,530400),(530427,'新平彝族傣族自治县',3,530400),(530428,'元江哈尼族彝族傣族自治县',3,530400),(530500,'保山市',2,530000),(530501,'市辖区',3,530500),(530502,'隆阳区',3,530500),(530521,'施甸县',3,530500),(530522,'腾冲县',3,530500),(530523,'龙陵县',3,530500),(530524,'昌宁县',3,530500),(530600,'昭通市',2,530000),(530601,'市辖区',3,530600),(530602,'昭阳区',3,530600),(530621,'鲁甸县',3,530600),(530622,'巧家县',3,530600),(530623,'盐津县',3,530600),(530624,'大关县',3,530600),(530625,'永善县',3,530600),(530626,'绥江县',3,530600),(530627,'镇雄县',3,530600),(530628,'彝良县',3,530600),(530629,'威信县',3,530600),(530630,'水富县',3,530600),(530700,'丽江市',2,530000),(530701,'市辖区',3,530700),(530702,'古城区',3,530700),(530721,'玉龙纳西族自治县',3,530700),(530722,'永胜县',3,530700),(530723,'华坪县',3,530700),(530724,'宁蒗彝族自治县',3,530700),(530800,'思茅市',2,530000),(530801,'市辖区',3,530800),(530802,'翠云区',3,530800),(530821,'普洱哈尼族彝族自治县',3,530800),(530822,'墨江哈尼族自治县',3,530800),(530823,'景东彝族自治县',3,530800),(530824,'景谷傣族彝族自治县',3,530800),(530825,'镇沅彝族哈尼族拉祜族自治县',3,530800),(530826,'江城哈尼族彝族自治县',3,530800),(530827,'孟连傣族拉祜族佤族自治县',3,530800),(530828,'澜沧拉祜族自治县',3,530800),(530829,'西盟佤族自治县',3,530800),(530900,'临沧市',2,530000),(530901,'市辖区',3,530900),(530902,'临翔区',3,530900),(530921,'凤庆县',3,530900),(530922,'云　县',3,530900),(530923,'永德县',3,530900),(530924,'镇康县',3,530900),(530925,'双江拉祜族佤族布朗族傣族自治县',3,530900),(530926,'耿马傣族佤族自治县',3,530900),(530927,'沧源佤族自治县',3,530900),(532300,'楚雄彝族自治州',2,530000),(532301,'楚雄市',3,532300),(532322,'双柏县',3,532300),(532323,'牟定县',3,532300),(532324,'南华县',3,532300),(532325,'姚安县',3,532300),(532326,'大姚县',3,532300),(532327,'永仁县',3,532300),(532328,'元谋县',3,532300),(532329,'武定县',3,532300),(532331,'禄丰县',3,532300),(532500,'红河哈尼族彝族自治州',2,530000),(532501,'个旧市',3,532500),(532502,'开远市',3,532500),(532522,'蒙自县',3,532500),(532523,'屏边苗族自治县',3,532500),(532524,'建水县',3,532500),(532525,'石屏县',3,532500),(532526,'弥勒县',3,532500),(532527,'泸西县',3,532500),(532528,'元阳县',3,532500),(532529,'红河县',3,532500),(532530,'金平苗族瑶族傣族自治县',3,532500),(532531,'绿春县',3,532500),(532532,'河口瑶族自治县',3,532500),(532600,'文山壮族苗族自治州',2,530000),(532621,'文山县',3,532600),(532622,'砚山县',3,532600),(532623,'西畴县',3,532600),(532624,'麻栗坡县',3,532600),(532625,'马关县',3,532600),(532626,'丘北县',3,532600),(532627,'广南县',3,532600),(532628,'富宁县',3,532600),(532800,'西双版纳傣族自治州',2,530000),(532801,'景洪市',3,532800),(532822,'勐海县',3,532800),(532823,'勐腊县',3,532800),(532900,'大理白族自治州',2,530000),(532901,'大理市',3,532900),(532922,'漾濞彝族自治县',3,532900),(532923,'祥云县',3,532900),(532924,'宾川县',3,532900),(532925,'弥渡县',3,532900),(532926,'南涧彝族自治县',3,532900),(532927,'巍山彝族回族自治县',3,532900),(532928,'永平县',3,532900),(532929,'云龙县',3,532900),(532930,'洱源县',3,532900),(532931,'剑川县',3,532900),(532932,'鹤庆县',3,532900),(533100,'德宏傣族景颇族自治州',2,530000),(533102,'瑞丽市',3,533100),(533103,'潞西市',3,533100),(533122,'梁河县',3,533100),(533123,'盈江县',3,533100),(533124,'陇川县',3,533100),(533300,'怒江傈僳族自治州',2,530000),(533321,'泸水县',3,533300),(533323,'福贡县',3,533300),(533324,'贡山独龙族怒族自治县',3,533300),(533325,'兰坪白族普米族自治县',3,533300),(533400,'迪庆藏族自治州',2,530000),(533421,'香格里拉县',3,533400),(533422,'德钦县',3,533400),(533423,'维西傈僳族自治县',3,533400),(540000,'西　藏',1,0),(540100,'拉萨市',2,540000),(540101,'市辖区',3,540100),(540102,'城关区',3,540100),(540121,'林周县',3,540100),(540122,'当雄县',3,540100),(540123,'尼木县',3,540100),(540124,'曲水县',3,540100),(540125,'堆龙德庆县',3,540100),(540126,'达孜县',3,540100),(540127,'墨竹工卡县',3,540100),(542100,'昌都地区',2,540000),(542121,'昌都县',3,542100),(542122,'江达县',3,542100),(542123,'贡觉县',3,542100),(542124,'类乌齐县',3,542100),(542125,'丁青县',3,542100),(542126,'察雅县',3,542100),(542127,'八宿县',3,542100),(542128,'左贡县',3,542100),(542129,'芒康县',3,542100),(542132,'洛隆县',3,542100),(542133,'边坝县',3,542100),(542200,'山南地区',2,540000),(542221,'乃东县',3,542200),(542222,'扎囊县',3,542200),(542223,'贡嘎县',3,542200),(542224,'桑日县',3,542200),(542225,'琼结县',3,542200),(542226,'曲松县',3,542200),(542227,'措美县',3,542200),(542228,'洛扎县',3,542200),(542229,'加查县',3,542200),(542231,'隆子县',3,542200),(542232,'错那县',3,542200),(542233,'浪卡子县',3,542200),(542300,'日喀则地区',2,540000),(542301,'日喀则市',3,542300),(542322,'南木林县',3,542300),(542323,'江孜县',3,542300),(542324,'定日县',3,542300),(542325,'萨迦县',3,542300),(542326,'拉孜县',3,542300),(542327,'昂仁县',3,542300),(542328,'谢通门县',3,542300),(542329,'白朗县',3,542300),(542330,'仁布县',3,542300),(542331,'康马县',3,542300),(542332,'定结县',3,542300),(542333,'仲巴县',3,542300),(542334,'亚东县',3,542300),(542335,'吉隆县',3,542300),(542336,'聂拉木县',3,542300),(542337,'萨嘎县',3,542300),(542338,'岗巴县',3,542300),(542400,'那曲地区',2,540000),(542421,'那曲县',3,542400),(542422,'嘉黎县',3,542400),(542423,'比如县',3,542400),(542424,'聂荣县',3,542400),(542425,'安多县',3,542400),(542426,'申扎县',3,542400),(542427,'索　县',3,542400),(542428,'班戈县',3,542400),(542429,'巴青县',3,542400),(542430,'尼玛县',3,542400),(542500,'阿里地区',2,540000),(542521,'普兰县',3,542500),(542522,'札达县',3,542500),(542523,'噶尔县',3,542500),(542524,'日土县',3,542500),(542525,'革吉县',3,542500),(542526,'改则县',3,542500),(542527,'措勤县',3,542500),(542600,'林芝地区',2,540000),(542621,'林芝县',3,542600),(542622,'工布江达县',3,542600),(542623,'米林县',3,542600),(542624,'墨脱县',3,542600),(542625,'波密县',3,542600),(542626,'察隅县',3,542600),(542627,'朗　县',3,542600),(610000,'陕西省',1,0),(610100,'西安市',2,610000),(610101,'市辖区',3,610100),(610102,'新城区',3,610100),(610103,'碑林区',3,610100),(610104,'莲湖区',3,610100),(610111,'灞桥区',3,610100),(610112,'未央区',3,610100),(610113,'雁塔区',3,610100),(610114,'阎良区',3,610100),(610115,'临潼区',3,610100),(610116,'长安区',3,610100),(610122,'蓝田县',3,610100),(610124,'周至县',3,610100),(610125,'户　县',3,610100),(610126,'高陵县',3,610100),(610200,'铜川市',2,610000),(610201,'市辖区',3,610200),(610202,'王益区',3,610200),(610203,'印台区',3,610200),(610204,'耀州区',3,610200),(610222,'宜君县',3,610200),(610300,'宝鸡市',2,610000),(610301,'市辖区',3,610300),(610302,'渭滨区',3,610300),(610303,'金台区',3,610300),(610304,'陈仓区',3,610300),(610322,'凤翔县',3,610300),(610323,'岐山县',3,610300),(610324,'扶风县',3,610300),(610326,'眉　县',3,610300),(610327,'陇　县',3,610300),(610328,'千阳县',3,610300),(610329,'麟游县',3,610300),(610330,'凤　县',3,610300),(610331,'太白县',3,610300),(610400,'咸阳市',2,610000),(610401,'市辖区',3,610400),(610402,'秦都区',3,610400),(610403,'杨凌区',3,610400),(610404,'渭城区',3,610400),(610422,'三原县',3,610400),(610423,'泾阳县',3,610400),(610424,'乾　县',3,610400),(610425,'礼泉县',3,610400),(610426,'永寿县',3,610400),(610427,'彬　县',3,610400),(610428,'长武县',3,610400),(610429,'旬邑县',3,610400),(610430,'淳化县',3,610400),(610431,'武功县',3,610400),(610481,'兴平市',3,610400),(610500,'渭南市',2,610000),(610501,'市辖区',3,610500),(610502,'临渭区',3,610500),(610521,'华　县',3,610500),(610522,'潼关县',3,610500),(610523,'大荔县',3,610500),(610524,'合阳县',3,610500),(610525,'澄城县',3,610500),(610526,'蒲城县',3,610500),(610527,'白水县',3,610500),(610528,'富平县',3,610500),(610581,'韩城市',3,610500),(610582,'华阴市',3,610500),(610600,'延安市',2,610000),(610601,'市辖区',3,610600),(610602,'宝塔区',3,610600),(610621,'延长县',3,610600),(610622,'延川县',3,610600),(610623,'子长县',3,610600),(610624,'安塞县',3,610600),(610625,'志丹县',3,610600),(610626,'吴旗县',3,610600),(610627,'甘泉县',3,610600),(610628,'富　县',3,610600),(610629,'洛川县',3,610600),(610630,'宜川县',3,610600),(610631,'黄龙县',3,610600),(610632,'黄陵县',3,610600),(610700,'汉中市',2,610000),(610701,'市辖区',3,610700),(610702,'汉台区',3,610700),(610721,'南郑县',3,610700),(610722,'城固县',3,610700),(610723,'洋　县',3,610700),(610724,'西乡县',3,610700),(610725,'勉　县',3,610700),(610726,'宁强县',3,610700),(610727,'略阳县',3,610700),(610728,'镇巴县',3,610700),(610729,'留坝县',3,610700),(610730,'佛坪县',3,610700),(610800,'榆林市',2,610000),(610801,'市辖区',3,610800),(610802,'榆阳区',3,610800),(610821,'神木县',3,610800),(610822,'府谷县',3,610800),(610823,'横山县',3,610800),(610824,'靖边县',3,610800),(610825,'定边县',3,610800),(610826,'绥德县',3,610800),(610827,'米脂县',3,610800),(610828,'佳　县',3,610800),(610829,'吴堡县',3,610800),(610830,'清涧县',3,610800),(610831,'子洲县',3,610800),(610900,'安康市',2,610000),(610901,'市辖区',3,610900),(610902,'汉滨区',3,610900),(610921,'汉阴县',3,610900),(610922,'石泉县',3,610900),(610923,'宁陕县',3,610900),(610924,'紫阳县',3,610900),(610925,'岚皋县',3,610900),(610926,'平利县',3,610900),(610927,'镇坪县',3,610900),(610928,'旬阳县',3,610900),(610929,'白河县',3,610900),(611000,'商洛市',2,610000),(611001,'市辖区',3,611000),(611002,'商州区',3,611000),(611021,'洛南县',3,611000),(611022,'丹凤县',3,611000),(611023,'商南县',3,611000),(611024,'山阳县',3,611000),(611025,'镇安县',3,611000),(611026,'柞水县',3,611000),(620000,'甘肃省',1,0),(620100,'兰州市',2,620000),(620101,'市辖区',3,620100),(620102,'城关区',3,620100),(620103,'七里河区',3,620100),(620104,'西固区',3,620100),(620105,'安宁区',3,620100),(620111,'红古区',3,620100),(620121,'永登县',3,620100),(620122,'皋兰县',3,620100),(620123,'榆中县',3,620100),(620200,'嘉峪关市',2,620000),(620201,'市辖区',3,620200),(620300,'金昌市',2,620000),(620301,'市辖区',3,620300),(620302,'金川区',3,620300),(620321,'永昌县',3,620300),(620400,'白银市',2,620000),(620401,'市辖区',3,620400),(620402,'白银区',3,620400),(620403,'平川区',3,620400),(620421,'靖远县',3,620400),(620422,'会宁县',3,620400),(620423,'景泰县',3,620400),(620500,'天水市',2,620000),(620501,'市辖区',3,620500),(620502,'秦城区',3,620500),(620503,'北道区',3,620500),(620521,'清水县',3,620500),(620522,'秦安县',3,620500),(620523,'甘谷县',3,620500),(620524,'武山县',3,620500),(620525,'张家川回族自治县',3,620500),(620600,'武威市',2,620000),(620601,'市辖区',3,620600),(620602,'凉州区',3,620600),(620621,'民勤县',3,620600),(620622,'古浪县',3,620600),(620623,'天祝藏族自治县',3,620600),(620700,'张掖市',2,620000),(620701,'市辖区',3,620700),(620702,'甘州区',3,620700),(620721,'肃南裕固族自治县',3,620700),(620722,'民乐县',3,620700),(620723,'临泽县',3,620700),(620724,'高台县',3,620700),(620725,'山丹县',3,620700),(620800,'平凉市',2,620000),(620801,'市辖区',3,620800),(620802,'崆峒区',3,620800),(620821,'泾川县',3,620800),(620822,'灵台县',3,620800),(620823,'崇信县',3,620800),(620824,'华亭县',3,620800),(620825,'庄浪县',3,620800),(620826,'静宁县',3,620800),(620900,'酒泉市',2,620000),(620901,'市辖区',3,620900),(620902,'肃州区',3,620900),(620921,'金塔县',3,620900),(620922,'安西县',3,620900),(620923,'肃北蒙古族自治县',3,620900),(620924,'阿克塞哈萨克族自治县',3,620900),(620981,'玉门市',3,620900),(620982,'敦煌市',3,620900),(621000,'庆阳市',2,620000),(621001,'市辖区',3,621000),(621002,'西峰区',3,621000),(621021,'庆城县',3,621000),(621022,'环　县',3,621000),(621023,'华池县',3,621000),(621024,'合水县',3,621000),(621025,'正宁县',3,621000),(621026,'宁　县',3,621000),(621027,'镇原县',3,621000),(621100,'定西市',2,620000),(621101,'市辖区',3,621100),(621102,'安定区',3,621100),(621121,'通渭县',3,621100),(621122,'陇西县',3,621100),(621123,'渭源县',3,621100),(621124,'临洮县',3,621100),(621125,'漳　县',3,621100),(621126,'岷　县',3,621100),(621200,'陇南市',2,620000),(621201,'市辖区',3,621200),(621202,'武都区',3,621200),(621221,'成　县',3,621200),(621222,'文　县',3,621200),(621223,'宕昌县',3,621200),(621224,'康　县',3,621200),(621225,'西和县',3,621200),(621226,'礼　县',3,621200),(621227,'徽　县',3,621200),(621228,'两当县',3,621200),(622900,'临夏回族自治州',2,620000),(622901,'临夏市',3,622900),(622921,'临夏县',3,622900),(622922,'康乐县',3,622900),(622923,'永靖县',3,622900),(622924,'广河县',3,622900),(622925,'和政县',3,622900),(622926,'东乡族自治县',3,622900),(622927,'积石山保安族东乡族撒拉族自治县',3,622900),(623000,'甘南藏族自治州',2,620000),(623001,'合作市',3,623000),(623021,'临潭县',3,623000),(623022,'卓尼县',3,623000),(623023,'舟曲县',3,623000),(623024,'迭部县',3,623000),(623025,'玛曲县',3,623000),(623026,'碌曲县',3,623000),(623027,'夏河县',3,623000),(630000,'青海省',1,0),(630100,'西宁市',2,630000),(630101,'市辖区',3,630100),(630102,'城东区',3,630100),(630103,'城中区',3,630100),(630104,'城西区',3,630100),(630105,'城北区',3,630100),(630121,'大通回族土族自治县',3,630100),(630122,'湟中县',3,630100),(630123,'湟源县',3,630100),(632100,'海东地区',2,630000),(632121,'平安县',3,632100),(632122,'民和回族土族自治县',3,632100),(632123,'乐都县',3,632100),(632126,'互助土族自治县',3,632100),(632127,'化隆回族自治县',3,632100),(632128,'循化撒拉族自治县',3,632100),(632200,'海北藏族自治州',2,630000),(632221,'门源回族自治县',3,632200),(632222,'祁连县',3,632200),(632223,'海晏县',3,632200),(632224,'刚察县',3,632200),(632300,'黄南藏族自治州',2,630000),(632321,'同仁县',3,632300),(632322,'尖扎县',3,632300),(632323,'泽库县',3,632300),(632324,'河南蒙古族自治县',3,632300),(632500,'海南藏族自治州',2,630000),(632521,'共和县',3,632500),(632522,'同德县',3,632500),(632523,'贵德县',3,632500),(632524,'兴海县',3,632500),(632525,'贵南县',3,632500),(632600,'果洛藏族自治州',2,630000),(632621,'玛沁县',3,632600),(632622,'班玛县',3,632600),(632623,'甘德县',3,632600),(632624,'达日县',3,632600),(632625,'久治县',3,632600),(632626,'玛多县',3,632600),(632700,'玉树藏族自治州',2,630000),(632721,'玉树县',3,632700),(632722,'杂多县',3,632700),(632723,'称多县',3,632700),(632724,'治多县',3,632700),(632725,'囊谦县',3,632700),(632726,'曲麻莱县',3,632700),(632800,'海西蒙古族藏族自治州',2,630000),(632801,'格尔木市',3,632800),(632802,'德令哈市',3,632800),(632821,'乌兰县',3,632800),(632822,'都兰县',3,632800),(632823,'天峻县',3,632800),(640000,'宁　夏',1,0),(640100,'银川市',2,640000),(640101,'市辖区',3,640100),(640104,'兴庆区',3,640100),(640105,'西夏区',3,640100),(640106,'金凤区',3,640100),(640121,'永宁县',3,640100),(640122,'贺兰县',3,640100),(640181,'灵武市',3,640100),(640200,'石嘴山市',2,640000),(640201,'市辖区',3,640200),(640202,'大武口区',3,640200),(640205,'惠农区',3,640200),(640221,'平罗县',3,640200),(640300,'吴忠市',2,640000),(640301,'市辖区',3,640300),(640302,'利通区',3,640300),(640323,'盐池县',3,640300),(640324,'同心县',3,640300),(640381,'青铜峡市',3,640300),(640400,'固原市',2,640000),(640401,'市辖区',3,640400),(640402,'原州区',3,640400),(640422,'西吉县',3,640400),(640423,'隆德县',3,640400),(640424,'泾源县',3,640400),(640425,'彭阳县',3,640400),(640500,'中卫市',2,640000),(640501,'市辖区',3,640500),(640502,'沙坡头区',3,640500),(640521,'中宁县',3,640500),(640522,'海原县',3,640500),(650000,'新　疆',1,0),(650100,'乌鲁木齐市',2,650000),(650101,'市辖区',3,650100),(650102,'天山区',3,650100),(650103,'沙依巴克区',3,650100),(650104,'新市区',3,650100),(650105,'水磨沟区',3,650100),(650106,'头屯河区',3,650100),(650107,'达坂城区',3,650100),(650108,'东山区',3,650100),(650121,'乌鲁木齐县',3,650100),(650200,'克拉玛依市',2,650000),(650201,'市辖区',3,650200),(650202,'独山子区',3,650200),(650203,'克拉玛依区',3,650200),(650204,'白碱滩区',3,650200),(650205,'乌尔禾区',3,650200),(652100,'吐鲁番地区',2,650000),(652101,'吐鲁番市',3,652100),(652122,'鄯善县',3,652100),(652123,'托克逊县',3,652100),(652200,'哈密地区',2,650000),(652201,'哈密市',3,652200),(652222,'巴里坤哈萨克自治县',3,652200),(652223,'伊吾县',3,652200),(652300,'昌吉回族自治州',2,650000),(652301,'昌吉市',3,652300),(652302,'阜康市',3,652300),(652303,'米泉市',3,652300),(652323,'呼图壁县',3,652300),(652324,'玛纳斯县',3,652300),(652325,'奇台县',3,652300),(652327,'吉木萨尔县',3,652300),(652328,'木垒哈萨克自治县',3,652300),(652700,'博尔塔拉蒙古自治州',2,650000),(652701,'博乐市',3,652700),(652722,'精河县',3,652700),(652723,'温泉县',3,652700),(652800,'巴音郭楞蒙古自治州',2,650000),(652801,'库尔勒市',3,652800),(652822,'轮台县',3,652800),(652823,'尉犁县',3,652800),(652824,'若羌县',3,652800),(652825,'且末县',3,652800),(652826,'焉耆回族自治县',3,652800),(652827,'和静县',3,652800),(652828,'和硕县',3,652800),(652829,'博湖县',3,652800),(652900,'阿克苏地区',2,650000),(652901,'阿克苏市',3,652900),(652922,'温宿县',3,652900),(652923,'库车县',3,652900),(652924,'沙雅县',3,652900),(652925,'新和县',3,652900),(652926,'拜城县',3,652900),(652927,'乌什县',3,652900),(652928,'阿瓦提县',3,652900),(652929,'柯坪县',3,652900),(653000,'克孜勒苏柯尔克孜自治州',2,650000),(653001,'阿图什市',3,653000),(653022,'阿克陶县',3,653000),(653023,'阿合奇县',3,653000),(653024,'乌恰县',3,653000),(653100,'喀什地区',2,650000),(653101,'喀什市',3,653100),(653121,'疏附县',3,653100),(653122,'疏勒县',3,653100),(653123,'英吉沙县',3,653100),(653124,'泽普县',3,653100),(653125,'莎车县',3,653100),(653126,'叶城县',3,653100),(653127,'麦盖提县',3,653100),(653128,'岳普湖县',3,653100),(653129,'伽师县',3,653100),(653130,'巴楚县',3,653100),(653131,'塔什库尔干塔吉克自治县',3,653100),(653200,'和田地区',2,650000),(653201,'和田市',3,653200),(653221,'和田县',3,653200),(653222,'墨玉县',3,653200),(653223,'皮山县',3,653200),(653224,'洛浦县',3,653200),(653225,'策勒县',3,653200),(653226,'于田县',3,653200),(653227,'民丰县',3,653200),(654000,'伊犁哈萨克自治州',2,650000),(654002,'伊宁市',3,654000),(654003,'奎屯市',3,654000),(654021,'伊宁县',3,654000),(654022,'察布查尔锡伯自治县',3,654000),(654023,'霍城县',3,654000),(654024,'巩留县',3,654000),(654025,'新源县',3,654000),(654026,'昭苏县',3,654000),(654027,'特克斯县',3,654000),(654028,'尼勒克县',3,654000),(654200,'塔城地区',2,650000),(654201,'塔城市',3,654200),(654202,'乌苏市',3,654200),(654221,'额敏县',3,654200),(654223,'沙湾县',3,654200),(654224,'托里县',3,654200),(654225,'裕民县',3,654200),(654226,'和布克赛尔蒙古自治县',3,654200),(654300,'阿勒泰地区',2,650000),(654301,'阿勒泰市',3,654300),(654321,'布尔津县',3,654300),(654322,'富蕴县',3,654300),(654323,'福海县',3,654300),(654324,'哈巴河县',3,654300),(654325,'青河县',3,654300),(654326,'吉木乃县',3,654300),(659000,'省直辖行政单位',2,650000),(659001,'石河子市',3,659000),(659002,'阿拉尔市',3,659000),(659003,'图木舒克市',3,659000),(659004,'五家渠市',3,659000),(710000,'台湾省',1,0),(710001,'台北市',2,710000),(710002,'台北县',3,710001),(710003,'基隆市',2,710000),(710004,'花莲县',3,710003),(810000,'香　港',1,0),(810001,'香港',2,810000),(810002,'中西区',3,810001),(810003,'九龙城区',3,810001),(810004,'南区',3,810001),(810005,'黄大仙区',3,810001),(810006,'油尖旺区',3,810001),(810007,'葵青区',3,810001),(810008,'西贡区',3,810001),(810009,'屯门区',3,810001),(810010,'荃湾区',3,810001),(810011,'东区',3,810001),(810012,'观塘区',3,810001),(810013,'深水步区',3,810001),(810014,'湾仔区',3,810001),(810015,'离岛区',3,810001),(810016,'北区',3,810001),(810017,'沙田区',3,810001),(810018,'大埔区',3,810001),(810019,'元朗区',3,810001),(820000,'澳　门',1,0),(820001,'澳门',2,820000),(820002,'澳门',3,820001),(910005,'中山市',3,442000),(910006,'东莞市',3,441900);
/*!40000 ALTER TABLE `onethink_district` ENABLE KEYS */;

#
# Structure for table "onethink_document"
#

DROP TABLE IF EXISTS `onethink_document`;
CREATE TABLE `onethink_document` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '文档ID',
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `name` char(40) NOT NULL DEFAULT '' COMMENT '标识',
  `title` char(80) NOT NULL DEFAULT '' COMMENT '标题',
  `category_id` int(10) unsigned NOT NULL COMMENT '所属分类',
  `description` char(140) NOT NULL DEFAULT '' COMMENT '描述',
  `root` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '根节点',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '所属ID',
  `model_id` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '内容模型ID',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '2' COMMENT '内容类型',
  `position` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '推荐位',
  `link_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '外链',
  `cover_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '封面',
  `display` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '可见性',
  `deadline` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '截至时间',
  `attach` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '附件数量',
  `view` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '浏览量',
  `comment` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '评论数',
  `extend` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '扩展统计字段',
  `level` int(10) NOT NULL DEFAULT '0' COMMENT '优先级',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '数据状态',
  PRIMARY KEY (`id`),
  KEY `idx_category_status` (`category_id`,`status`),
  KEY `idx_status_type_pid` (`status`,`uid`,`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COMMENT='文档模型基础表';

#
# Data for table "onethink_document"
#

/*!40000 ALTER TABLE `onethink_document` DISABLE KEYS */;
/*!40000 ALTER TABLE `onethink_document` ENABLE KEYS */;

#
# Structure for table "onethink_document_article"
#

DROP TABLE IF EXISTS `onethink_document_article`;
CREATE TABLE `onethink_document_article` (
  `id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文档ID',
  `parse` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '内容解析类型',
  `content` text NOT NULL COMMENT '文章内容',
  `template` varchar(100) NOT NULL DEFAULT '' COMMENT '详情页显示模板',
  `bookmark` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '收藏数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文档模型文章表';

#
# Data for table "onethink_document_article"
#

/*!40000 ALTER TABLE `onethink_document_article` DISABLE KEYS */;
/*!40000 ALTER TABLE `onethink_document_article` ENABLE KEYS */;

#
# Structure for table "onethink_document_download"
#

DROP TABLE IF EXISTS `onethink_document_download`;
CREATE TABLE `onethink_document_download` (
  `id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文档ID',
  `parse` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '内容解析类型',
  `content` text NOT NULL COMMENT '下载详细描述',
  `template` varchar(100) NOT NULL DEFAULT '' COMMENT '详情页显示模板',
  `file_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文件ID',
  `download` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '下载次数',
  `size` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '文件大小',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文档模型下载表';

#
# Data for table "onethink_document_download"
#

/*!40000 ALTER TABLE `onethink_document_download` DISABLE KEYS */;
/*!40000 ALTER TABLE `onethink_document_download` ENABLE KEYS */;

#
# Structure for table "onethink_document_news"
#

DROP TABLE IF EXISTS `onethink_document_news`;
CREATE TABLE `onethink_document_news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `content` text NOT NULL COMMENT '内容',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

#
# Data for table "onethink_document_news"
#

/*!40000 ALTER TABLE `onethink_document_news` DISABLE KEYS */;
/*!40000 ALTER TABLE `onethink_document_news` ENABLE KEYS */;

#
# Structure for table "onethink_document_page"
#

DROP TABLE IF EXISTS `onethink_document_page`;
CREATE TABLE `onethink_document_page` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `Test` varchar(255) NOT NULL COMMENT 'test',
  `content` text NOT NULL COMMENT '内容',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

#
# Data for table "onethink_document_page"
#

/*!40000 ALTER TABLE `onethink_document_page` DISABLE KEYS */;
/*!40000 ALTER TABLE `onethink_document_page` ENABLE KEYS */;

#
# Structure for table "onethink_document_product"
#

DROP TABLE IF EXISTS `onethink_document_product`;
CREATE TABLE `onethink_document_product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `content` text NOT NULL COMMENT '描述',
  `image` varchar(255) NOT NULL COMMENT '产品图片',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

#
# Data for table "onethink_document_product"
#

/*!40000 ALTER TABLE `onethink_document_product` DISABLE KEYS */;
/*!40000 ALTER TABLE `onethink_document_product` ENABLE KEYS */;

#
# Structure for table "onethink_document_question"
#

DROP TABLE IF EXISTS `onethink_document_question`;
CREATE TABLE `onethink_document_question` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `result` varchar(255) NOT NULL COMMENT '结果',
  `difficulty` char(50) NOT NULL DEFAULT '0' COMMENT '难度',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

#
# Data for table "onethink_document_question"
#

/*!40000 ALTER TABLE `onethink_document_question` DISABLE KEYS */;
/*!40000 ALTER TABLE `onethink_document_question` ENABLE KEYS */;

#
# Structure for table "onethink_download"
#

DROP TABLE IF EXISTS `onethink_download`;
CREATE TABLE `onethink_download` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(25) NOT NULL COMMENT '标题',
  `image` int(11) NOT NULL COMMENT '图片',
  `file` int(11) NOT NULL COMMENT '视频',
  `categoryid` int(11) NOT NULL COMMENT '分类',
  `content` varchar(1000) NOT NULL COMMENT '内容',
  `companyid` int(11) NOT NULL,
  `changetime` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '状态，-1：删除；0：禁用；1：启用；2：未审核',
  `createtime` int(11) NOT NULL COMMENT '创建时间',
  `category` int(11) NOT NULL COMMENT '分类',
  `view` int(10) NOT NULL DEFAULT '0',
  `price` float(10,2) NOT NULL DEFAULT '0.00' COMMENT '价格',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='下载管理';

#
# Data for table "onethink_download"
#

/*!40000 ALTER TABLE `onethink_download` DISABLE KEYS */;
/*!40000 ALTER TABLE `onethink_download` ENABLE KEYS */;

#
# Structure for table "onethink_download_category"
#

DROP TABLE IF EXISTS `onethink_download_category`;
CREATE TABLE `onethink_download_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(25) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `pid` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

#
# Data for table "onethink_download_category"
#

/*!40000 ALTER TABLE `onethink_download_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `onethink_download_category` ENABLE KEYS */;

#
# Structure for table "onethink_feedback"
#

DROP TABLE IF EXISTS `onethink_feedback`;
CREATE TABLE `onethink_feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact` varchar(25) NOT NULL DEFAULT '' COMMENT '标题',
  `mobile` varchar(20) DEFAULT NULL,
  `image` int(11) NOT NULL COMMENT '图片',
  `categoryid` int(11) NOT NULL COMMENT '分配',
  `weixin` varchar(20) DEFAULT NULL,
  `qq` varchar(20) DEFAULT NULL,
  `content` text COMMENT '内容',
  `changetime` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '状态，-1：删除；0：禁用；1：启用；2：未审核',
  `createtime` int(11) NOT NULL COMMENT '创建时间',
  `view` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '浏览量',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='定制字画';

#
# Data for table "onethink_feedback"
#

/*!40000 ALTER TABLE `onethink_feedback` DISABLE KEYS */;
INSERT INTO `onethink_feedback` VALUES (3,'王小姐','13488888888',0,0,'@#￥WD￥%@#','75542341','请速联系我',1531836744,1,1531836744,0),(4,'王先生','13418780533',0,0,'','','请问老师如何加盟呀。',1535368509,1,1535368509,0),(5,'陈小姐','13888888888',0,0,'','','手机网友测试',1535615798,1,1535615798,0);
/*!40000 ALTER TABLE `onethink_feedback` ENABLE KEYS */;

#
# Structure for table "onethink_feedback_category"
#

DROP TABLE IF EXISTS `onethink_feedback_category`;
CREATE TABLE `onethink_feedback_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(25) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `pid` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "onethink_feedback_category"
#

/*!40000 ALTER TABLE `onethink_feedback_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `onethink_feedback_category` ENABLE KEYS */;

#
# Structure for table "onethink_field"
#

DROP TABLE IF EXISTS `onethink_field`;
CREATE TABLE `onethink_field` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `field_id` int(11) NOT NULL,
  `field_data` text NOT NULL,
  `createTime` int(11) NOT NULL,
  `changeTime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

#
# Data for table "onethink_field"
#

/*!40000 ALTER TABLE `onethink_field` DISABLE KEYS */;
INSERT INTO `onethink_field` VALUES (1,1,1,'',1430322852,1535555076),(2,2,1,'1234555',1431611988,1534175133),(3,16,1,'123123',1524317125,1534176069),(4,16,3,'<p class=\"p\" style=\"text-indent:28px;font-family:&quot;\">\r\n\t<span style=\"font-size:14px;font-family:宋体;\">张剑，男，1965年11月生，浙江遂昌人，先后毕业于中国美术学院、厦门大学艺术学院，研究生学历，硕士学位，教授，中国美术家协会会员，浙江省油画家协会理事，金华市美术家协会副主席，金华市广告协会副会长，国际商业美术设计师协会专家委员会浙江地区委员会委员，历任宁波美术馆常务副馆长、天一阁书画艺术院执行院长，现任金华职业技术学院艺术设计学院院长、副书记。</span>\r\n</p>\r\n<p class=\"p\" style=\"text-indent:28px;font-family:&quot;\">\r\n\t<span style=\"font-size:14px;font-family:宋体;\">主要研究方向：美术学研究，从事《造型基础》、《设计构成》、《材料语言》、《思维训练》等专业课程的教学工作，在所从事的专业领域取得一定的成就，公开发表学术论文20余篇，其中CSSCI收录1篇，编写出版学术著作1部、教材2部；主持完成各级科研项目5项，其中国家社科基金项目1项、省部级及项目1项；作品曾获文化部全国“群星奖”铜奖、浙江省金奖，并多次在省、市美展中获奖，多件作品被国内外收场机构及个人收藏；主持策划大型美术展览30余项。</span>\r\n</p>',1524317125,1534176069),(5,2,3,'<span style=\"font-family:宋体;background-color:#FFFFFF;\">赵庭芳，男，1966年4月6日生，安徽省宣城市人。&nbsp;</span><br />\r\n<span style=\"font-family:宋体;background-color:#FFFFFF;\">1984年9月—1988年7月，学习于安徽师范大学中文系中文本科专业，取得文学士学位。</span><br />\r\n<span style=\"font-family:宋体;background-color:#FFFFFF;\">1988年7月——1992年7月，工作于宣州市杨柳中学，从事高中语文教学；担任班主任、教研组长。</span><br />\r\n<span style=\"font-family:宋体;background-color:#FFFFFF;\">1992年8月——1996年8月，工作于宣州市第二中学，从事高中语文教学；担任班主任、教研组长。</span><br />\r\n<span style=\"font-family:宋体;background-color:#FFFFFF;\">1996年9月至今，工作于宣城中学，从事高中语文教学；担任班主任。担任语文教研副组长，兼任校图书馆馆长、《宣中教研》编辑。</span><br />\r\n<p>\r\n\t<span style=\"font-family:宋体;background-color:#FFFFFF;\">工作23年来，一直在教学一线从事高中语文教学工作；其中有16年担任高中毕业班教学工作；14年担任班主任。</span> \r\n</p>\r\n<p>\r\n\t<span><span style=\"background-color:#FFFFFF;\">教学成绩：</span></span> \r\n</p>\r\n<p>\r\n\t<span><span style=\"background-color:#FFFFFF;\"><span style=\"font-family:宋体;background-color:#FFFFFF;\"><span style=\"font-family:宋体;background-color:#FFFFFF;\">1．连年安徽省会考、学业水平测试合格率100%；2010届所任教两个班学生语文学业水平测试优秀率均达93%。</span><br />\r\n<span style=\"font-family:宋体;background-color:#FFFFFF;\">2．1996年，因高考语文单科成绩突出，受宣州市教委表彰。</span><br />\r\n<span style=\"font-family:宋体;background-color:#FFFFFF;\">3．1996——1998年，连续三年参加高考阅卷；1996年，被安徽省高校招生委员会授予“安徽省优秀评卷教师”称号。</span><br />\r\n<span style=\"font-family:宋体;background-color:#FFFFFF;\">4．2000年4月，参加宣城地区中学语文课堂教学大赛，获宣城地区一等奖。</span><br />\r\n<span style=\"font-family:宋体;background-color:#FFFFFF;\">5．2000年5月，参加安徽省中学语文课堂教学大赛，获安徽省二等奖。</span><br />\r\n<span style=\"font-family:宋体;background-color:#FFFFFF;\">6．2001年9月，被学校评为“宣城中学第二届师德标兵”。</span><br />\r\n<span style=\"font-family:宋体;background-color:#FFFFFF;\">7．2001年9月，被学校评为“宣城中学优秀班主任”。</span><br />\r\n<span style=\"font-family:宋体;background-color:#FFFFFF;\">8．2002年评为第一届“宣城市青年骨干教师”；</span><br />\r\n<span style=\"font-family:宋体;background-color:#FFFFFF;\">9．2003年评为宣城市第一届“中学语文学科带头人”；</span><br />\r\n<span style=\"font-family:宋体;background-color:#FFFFFF;\">10．2004年评为宣城市第三届“教坛新星”；</span><br />\r\n<span style=\"font-family:宋体;background-color:#FFFFFF;\">11．参加省级骨干教师培训。</span><br />\r\n<span style=\"font-family:宋体;background-color:#FFFFFF;\">12．1997至今，先后担任王文章、胡应生、李媛、何伟、艾岷、单晓飞等年轻教师的指导教师；</span><br />\r\n<span style=\"font-family:宋体;background-color:#FFFFFF;\">13．担任学校“语文高考指导小组成员”、“现代教育技术开发研究小组成员”，积极从员高考研究和课件开发，为学校教科研再上一个台阶尽自己的一份责任。</span><br />\r\n<span style=\"font-family:宋体;background-color:#FFFFFF;\">14．曾担任校刊《奋飞文学》副主编，印发三期《奋飞文学》，为学生文学创作提供了一方园地。</span><br />\r\n<span style=\"font-family:宋体;background-color:#FFFFFF;\">15．2008——2011年，担任安徽省远程教育语文学科首席辅导教师；和其他五位辅导教师一起组织全省高中语文远程教育受训教师学习，设定语文学科的关键话题并组织围绕关键话题展开讨论，解答教师提问；命制考核试题；评定受训教师学业成绩；评定优秀学员；完成学科简报。</span><br />\r\n<span style=\"font-family:宋体;background-color:#FFFFFF;\">16．高考研讨会示范课、主题发言、专题讲座材料。</span><br />\r\n<span style=\"font-family:宋体;background-color:#FFFFFF;\">（1）2004宣城市高考语文研讨会（泾县）上“文言文阅读教学观摩课”一节。</span><br />\r\n<span style=\"font-family:宋体;background-color:#FFFFFF;\">（2）2007年皖江四市高考语文研讨会（马鞍山）上作“近年来全国及各省市语文高考试题的变化及启示”的专题报告。</span><br />\r\n<span style=\"font-family:宋体;background-color:#FFFFFF;\">（3）2010年皖江五市高考语文研讨会（安庆）上作“2010年安徽省高考语文学科文学类文本阅读备考策略”专题报告。</span><br />\r\n<span style=\"font-family:宋体;background-color:#FFFFFF;\">17．2010年10月，参加教育部考试中心高考命题调研工作会议（安庆），就安徽省高考语文学科考试命题发表意见。</span></span><br />\r\n</span></span>\r\n</p>',1531573731,1534175133),(6,1,3,'<p style=\"font-family:宋体;background-color:#FFFFFF;\">\r\n\t<br />\r\n</p>',1532080620,1535555076),(7,4,3,'<span style=\"font-family:宋体;background-color:#FFFFFF;\">1968年出生，1986年开始从事教育工作，从教26年。安师大汉语言文学专业毕业，中学语文高级教师。2006年获得国家二级心理咨询师资格。多年担任班主任年级组长工作，多次获得学校优秀班主任、优秀年级组长称号。</span><br />\r\n<span style=\"font-family:宋体;background-color:#FFFFFF;\">2004年被评为宣城市“教坛新星”</span><br />\r\n<span style=\"font-family:宋体;background-color:#FFFFFF;\">2008年被评为市级教研先进个人。</span><br />\r\n<span style=\"font-family:宋体;background-color:#FFFFFF;\">2008年获得市级“优秀共产党员”称号。</span><br />\r\n<span style=\"font-family:宋体;background-color:#FFFFFF;\">2011年被评为市级骨干教师。</span><br />\r\n<span style=\"font-family:宋体;background-color:#FFFFFF;\">2014年荣获全国优秀教师称号。</span><br />\r\n<span style=\"font-family:宋体;background-color:#FFFFFF;\">多篇语文教学及心理健康教育论文获奖，主持并完成了市级教育科研课题《中学生心理健康教育模式》的研究。</span><br />\r\n<span style=\"font-family:宋体;background-color:#FFFFFF;\">所辅导学生多人次在省作文竞赛、华东六省一市作文竞赛、全国网络作文大赛获奖。</span>',1534175245,1534175245),(8,6,3,'<p style=\"font-family:宋体;background-color:#FFFFFF;\">\r\n\t荣誉称号：<br />\r\n2004年评为宣城市第三届“教坛新星”；<br />\r\n2005年评为宣城市第三届“骨干教师”；<br />\r\n2006年评为宣城市第三届“学科带头人”；<br />\r\n2008年被评为宣城市第二届“教科研先进个人”。\r\n</p>\r\n<p style=\"font-family:宋体;background-color:#FFFFFF;\">\r\n\t<br />\r\n工作成果：<br />\r\n近5年来，获中国教育学会论文评比一等奖1次，论文、教学设计获市一等奖5次，CN刊号杂志发表论文3篇。\r\n</p>\r\n<p style=\"font-family:宋体;background-color:#FFFFFF;\">\r\n\t参与安徽省十六所重点高中辅导丛书《创新学案》、宣城市教育体育局审批并推广使用的《高中同步练习》、校本课程《宛陵诗风》的编写工作。多次承担省市范围试卷命题工作。\r\n</p>\r\n<p style=\"font-family:宋体;background-color:#FFFFFF;\">\r\n\t辅导学生参加演讲、主持比赛，成绩优异，获得指导教师特等奖三次。<br />\r\n曾获“中华经典诵读”朗诵比赛教师组省二等奖，宣城市教育系统普通话比赛“朗读项”第一名，宣城市市直“书香伴我行”演讲比赛第一名。\r\n</p>\r\n<p style=\"font-family:宋体;background-color:#FFFFFF;\">\r\n\t<br />\r\n研训经历：<br />\r\n2001年至今，参加省级普通话测试员培训四次；<br />\r\n2009年参加骨干教师华师大暑期培训；<br />\r\n2011年参加“国培计划”骨干教师研训。\r\n</p>',1534175385,1534175385),(9,8,3,'<p style=\"font-family:宋体;background-color:#FFFFFF;\">\r\n\t&nbsp; 孙老师： 1992年7月毕业于安徽师范大学物理系，分配到安徽省宣城中学工作至今。安徽省宣城中学物理教研组组长，中共党员，教育硕士，中国物理学会会员，安徽省宣城市拔尖人才、宣城市学科带头人、青年骨干教师，宣城市教科研先进个人，宣城市优秀团干，安徽省宣城市物理学会、宣城市教育委员会中学物理教学专业委员会副秘书长、常务理事、理事，安徽省高中物理奥赛二级教练。“安徽省优秀阅卷教师”、 “安徽师范大学优秀教育硕士”。\r\n</p>\r\n<p style=\"font-family:宋体;background-color:#FFFFFF;\">\r\n\t&nbsp; 宣城中学教科研先进个人、优秀班主任、先进教研组长、学校“班级管理特殊贡献奖”获得者，所带班级多次被授予“市示范班级”。发表国家级、省级论文十多篇，参编（著）教学用书三本。教学教研论文评比获全国一等奖两次、二等奖三次，省级二等奖一次、三等奖一次，市级教学教研论文一等奖九次、二等奖三次，三等奖一次，市级高中物理教师优质课大奖赛二等奖二次。省级课题“探究式教学在中学物理教学实践中运用实践研究”核心组成员，主持市级课题“新课程下的初高中物理教学衔接问题研究”，获阶段性成果，并即将结题。结合教育实践在国内首次提出的“高中物理实验思维能力结构模型分析及其培养实践研究”被认可，并发表于国家级（物理）核心杂志《物理实验》07年第2期。\r\n</p>',1534175569,1534175569),(10,9,3,'<p align=\"left\" style=\"font-family:宋体;background-color:#FFFFFF;\">\r\n\t&nbsp; 王祥，1985年7月生于宣城水东，中共党员，中学一级教师（2012年）。 1999年考入宣城中学高中部，2006年毕业于安徽师范大学地理系。自毕业至今，一直任教于宣城中学。\r\n</p>\r\n<p align=\"left\" style=\"font-family:宋体;background-color:#FFFFFF;\">\r\n\t&nbsp; 自任教以来获得的主要荣誉有：<br />\r\n&nbsp; 1、2010年：<br />\r\n&nbsp; 2009～2010学年全市中小学优秀教学设计一等奖<br />\r\n&nbsp; 2010年宣城市高中地理优质课评选一等奖<br />\r\n&nbsp; 2、2011年：<br />\r\n&nbsp; 宣城中学优秀教学设计评选一等奖、<br />\r\n&nbsp; 2011年宣城市高考地理复习研讨会论文评选一等奖<br />\r\n&nbsp; 2011年高考优秀评卷教师<br />\r\n&nbsp; 2011年安徽省高中地理优质课评选一等奖<br />\r\n&nbsp; 2011年全省优秀基础教育资源评选二等奖<br />\r\n&nbsp; 3、2012年：<br />\r\n&nbsp; 2012年全市中学地理优秀教学论文评选一等奖<br />\r\n&nbsp; 2012年度全国地理优质数字课程资源评选一等奖<br />\r\n&nbsp; 2012年安徽省地理优质数字课程资源评选一等奖<br />\r\n&nbsp; 2012年宣城中学高考“农垦奖教金”<br />\r\n&nbsp; 4、2013年：<br />\r\n&nbsp; 2012～2013学年度安徽省中小学教师继续教育“优秀学员”<br />\r\n&nbsp; 2013年皖江三市高中地理复习研讨会交流材料评选一等奖<br />\r\n&nbsp; 指导16名学生在“宣城市首届中学气象科普大赛”中获奖（其中：一等奖3人，二等奖5人，市三等奖8人）　<br />\r\n&nbsp; 指导1名学生（罗雨心）在“2013年安徽省气象部门科普作品创作大赛”获青少年组优秀奖（此奖项全省共5人）<br />\r\n&nbsp; 5、2014年：<br />\r\n&nbsp; 教学论文《例谈基于课堂笔试化的讲义式复习模式——以&lt;城市化与工业化&gt;专题复习为例》发表于《地理教学》2014年第3期\r\n</p>',1534175699,1534175699),(11,10,3,'<p align=\"left\" style=\"font-family:宋体;background-color:#FFFFFF;\">\r\n\t&nbsp; 2005年毕业于安徽师范大学体育学院， 2008年获得安徽省第三届体育教学展示课（录像）二等奖，并多次获得宣城市优秀教学设计和创新案例设计一等奖；2011年被评为校内先进个人；同时工作期间多次担任校篮球队、排球队主教练和宣城市第一届中小学生运动会宣州区代表队排球队主教练。\r\n</p>\r\n<p style=\"font-family:宋体;background-color:#FFFFFF;\">\r\n\t&nbsp;&nbsp;<strong>附：<br />\r\n</strong>&nbsp; 2007年、2009年获得宣城市中小学优秀教学设计比赛一等奖<br />\r\n&nbsp; 2008年获得安徽省第三届体育教学展示课（录像）二等奖<br />\r\n&nbsp; 2010年获得宣城市中小学创新案例设计一等奖\r\n</p>\r\n<p style=\"font-family:宋体;background-color:#FFFFFF;\">\r\n\t&nbsp;&nbsp;<strong>担任教练期间获得：<br />\r\n</strong>&nbsp; 08年宣城市第三届高级中学排球赛男子组第四名<br />\r\n&nbsp; 10年宣城市第四届高级中学篮球赛女子第二名<br />\r\n&nbsp; 11年宣城市第四届高级中学排球赛男子组第五名<br />\r\n&nbsp; 11年宣城市第一届中小学生运动会排球项目男子乙组第一名、女子乙组第四名\r\n</p>',1534175852,1534175852),(12,11,3,'<p class=\"p\" style=\"text-indent:28px;font-family:&quot;\">\r\n\t<span style=\"font-size:14px;font-family:宋体;\">赵伟乾，男，1957年10月生，河南开封人，本科学历，教授。</span>\r\n</p>\r\n<p class=\"p\" style=\"text-indent:28px;font-family:&quot;\">\r\n\t<span style=\"font-size:14px;font-family:宋体;\">主要研究方向：美术教育及中国画研究，从事素描、色彩、中国画等专业课程的教学工作35年。在所从事的专业领域取得了一定的成绩，公开发表学术论文20余篇，其中国家一级期刊3篇，主持完成各级科研项目6项，其中省级项目1项，厅局级项目2项，金华市社科联重点项目2项，金华市教育局2007年度教育科研优秀成果三等奖。获全国第二届大学生艺术展演活动高校艺术教育科研论文三等奖，省大学生艺术展演高校教师科研论文一等奖；获中国文联、人民画报主办2000年世界华人艺术展铜奖，并授予“世界华人艺术家”；获中国文联主办第四界当代中国山水画展创新奖；获2008年《艺术百家》年度作品奖一等奖等。</span>\r\n</p>',1534175951,1534175951),(13,3,3,'<span style=\"color:#727272;font-family:Arial, Helvetica, sans-serif;\">河北灵寿人。2005年毕业于河北师范大学文学院，文学学士，中学一级教师。在教学过程中，践行德高为师，学高为范，坚持以学生为主体，以教师为主导，以求教学相长，开拓创新。本着对学生高度负责的精神，虚心向老教师请教，积极听课，认真备课，用心上好每节课。日常生活中，以身作则，为人师表，通过日常的班主任管理工作，帮助学生树立正确的世界观、人生观、价值观，多次被评为“优秀青年教师”“优秀班主任”、校级“常规优秀班主任”“高考功勋教师”“高考金牌功勋教师”等，2008年年终考核因高考成绩突出被评为校级优秀，2011年年终考核授予市级嘉奖，2015年荣获校级“最美班主任”“市级德育工作者”和“省级德育工作者”等荣誉称号，2015年所带的班级荣获“省级优秀班集体”荣誉称号。德育论文曾获河北省一等奖和市二等奖，在《语文教学通讯》《语文报》《语文周报》《作文评点报》《考试报》等刊物上发表教学论文及文章数篇，同时参编《智慧心灯》、《真情彩虹》、《风流人物》《中国古代诗歌散文集》等书籍。</span>',1535104208,1535104300),(14,7,3,'<span style=\"color:#727272;font-family:Arial, Helvetica, sans-serif;\">2004年毕业于河北师范大学文学院，同年到河北正定中学任教，中学一级教师。作为语文教师，极为推崇叶圣陶先生的教育教学理念：“教任何功课，最终目的都在于达到不需要教。”叶老此言的核心在于让学生“能够自己去探索，自己去辨析，自己去历练，从而获得正确的知识和熟练的能力”，这种理念即使放到现在也毫不过时。在培养学生的同时，注意发挥教育者的主观能动性，通过点播和熏陶启发学生的语文思维；注意通过教学科研使自己的教育理念和教学艺术不断完善，目前已在《语文教学通讯》《语文月刊》《名作欣赏》《语文天地》《语文周报》《语文报》等国家级、省级报刊杂志发表论文百余篇，所撰写论文曾获市级教学论文评比一等奖，积极参与校本教材的编写，并参编《时文选萃》《精短美文锦囊》《PK高考》《最时文》等教辅书籍。从教几年来，有喜悦也有失落，有坎坷也有收获，但一直秉持“师生平等，互相塑造”的信念，努力营造公正、和谐、互补的师生关系，与学生一起进步，一起发展。</span>',1535104427,1535104427);
/*!40000 ALTER TABLE `onethink_field` ENABLE KEYS */;

#
# Structure for table "onethink_field_group"
#

DROP TABLE IF EXISTS `onethink_field_group`;
CREATE TABLE `onethink_field_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `profile_name` varchar(25) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `createTime` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  `visiable` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "onethink_field_group"
#

/*!40000 ALTER TABLE `onethink_field_group` DISABLE KEYS */;
INSERT INTO `onethink_field_group` VALUES (1,'个人资料',1,1430321819,0,1);
/*!40000 ALTER TABLE `onethink_field_group` ENABLE KEYS */;

#
# Structure for table "onethink_field_setting"
#

DROP TABLE IF EXISTS `onethink_field_setting`;
CREATE TABLE `onethink_field_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `field_name` varchar(25) NOT NULL,
  `profile_group_id` int(11) NOT NULL,
  `visiable` tinyint(4) NOT NULL DEFAULT '1',
  `required` tinyint(4) NOT NULL DEFAULT '0',
  `sort` int(11) NOT NULL,
  `form_type` varchar(25) NOT NULL,
  `form_default_value` varchar(200) NOT NULL,
  `validation` varchar(25) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `createTime` int(11) NOT NULL,
  `child_form_type` varchar(25) NOT NULL,
  `input_tips` varchar(100) NOT NULL COMMENT '输入提示',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

#
# Data for table "onethink_field_setting"
#

/*!40000 ALTER TABLE `onethink_field_setting` DISABLE KEYS */;
INSERT INTO `onethink_field_setting` VALUES (1,'QQ',1,1,0,0,'input','','',1,1430321855,'string',''),(2,'memo',1,1,0,0,'textarea','','',-1,1523886194,'',''),(3,'个人介绍',1,1,0,0,'webeditor','','',1,1523886367,'','');
/*!40000 ALTER TABLE `onethink_field_setting` ENABLE KEYS */;

#
# Structure for table "onethink_file"
#

DROP TABLE IF EXISTS `onethink_file`;
CREATE TABLE `onethink_file` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '文件ID',
  `name` char(30) NOT NULL DEFAULT '' COMMENT '原始文件名',
  `savename` char(20) NOT NULL DEFAULT '' COMMENT '保存名称',
  `savepath` char(30) NOT NULL DEFAULT '' COMMENT '文件保存路径',
  `ext` char(5) NOT NULL DEFAULT '' COMMENT '文件后缀',
  `mime` char(40) NOT NULL DEFAULT '' COMMENT '文件mime类型',
  `size` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文件大小',
  `md5` char(32) NOT NULL DEFAULT '' COMMENT '文件md5',
  `sha1` char(40) NOT NULL DEFAULT '' COMMENT '文件 sha1编码',
  `location` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '文件保存位置',
  `create_time` int(10) unsigned NOT NULL COMMENT '上传时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_md5` (`md5`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COMMENT='文件表';

#
# Data for table "onethink_file"
#

/*!40000 ALTER TABLE `onethink_file` DISABLE KEYS */;
INSERT INTO `onethink_file` VALUES (17,'1.pdf','5b5589bc01bec.pdf','2018-07-23/','pdf','application/octet-stream',195854,'a87554e8118fc304bc03d7f9b64fd925','dcb5ee2481e4af96686dc8bafc4e86eddd8015dd',0,1532332475);
/*!40000 ALTER TABLE `onethink_file` ENABLE KEYS */;

#
# Structure for table "onethink_hooks"
#

DROP TABLE IF EXISTS `onethink_hooks`;
CREATE TABLE `onethink_hooks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(40) NOT NULL DEFAULT '' COMMENT '钩子名称',
  `description` text NOT NULL COMMENT '描述',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '类型',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `addons` varchar(255) NOT NULL DEFAULT '' COMMENT '钩子挂载的插件 ''，''分割',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

#
# Data for table "onethink_hooks"
#

/*!40000 ALTER TABLE `onethink_hooks` DISABLE KEYS */;
INSERT INTO `onethink_hooks` VALUES (1,'pageHeader','页面header钩子，一般用于加载插件CSS文件和代码',1,0,'ImageSlider'),(2,'pageFooter','页面footer钩子，一般用于加载插件JS文件和JS代码',1,0,'ReturnTop,Mail'),(3,'documentEditForm','添加编辑表单的 扩展内容钩子',1,0,'Attachment'),(4,'documentDetailAfter','文档末尾显示',1,1262295015,'Attachment,SocialComment,Avatar'),(5,'documentDetailBefore','页面内容前显示用钩子',1,0,''),(6,'documentSaveComplete','保存文档数据后的扩展钩子',2,0,'Attachment'),(7,'documentEditFormContent','添加编辑表单的内容显示钩子',1,0,'Editor'),(8,'adminArticleEdit','后台内容编辑页编辑器',1,1378982734,'EditorForAdmin'),(13,'AdminIndex','首页小格子个性化显示',1,1382596073,'SiteStat,SystemInfo,DevTeam,LocalComment,Mail'),(14,'topicComment','评论提交方式扩展钩子。',1,1380163518,'Editor'),(16,'app_begin','应用开始',2,1384481614,''),(17,'localComment','本地评论插件',1,1424252287,'LocalComment'),(18,'J_China_City','每个系统都需要的一个中国省市区三级联动插件。想天-駿濤修改，将镇级地区移除',1,1429956630,'ChinaCity'),(19,'userConfig','用户配置页面钩子',1,1430044748,''),(20,'indexAliPlay','支付宝钩子',1,1430737781,'indexAliPlay,AliPlay'),(21,'SyncLogin','第三方账号同步登陆',1,1431444098,'SyncLogin');
/*!40000 ALTER TABLE `onethink_hooks` ENABLE KEYS */;

#
# Structure for table "onethink_live"
#

DROP TABLE IF EXISTS `onethink_live`;
CREATE TABLE `onethink_live` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT '0',
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '标题',
  `image` int(11) NOT NULL COMMENT '图片',
  `categoryid` varchar(20) NOT NULL DEFAULT '0' COMMENT '分配',
  `content` text COMMENT '内容',
  `companyid` int(11) NOT NULL,
  `changetime` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '状态，-1：删除；0：禁用；1：启用；2：未审核',
  `createtime` int(11) NOT NULL COMMENT '创建时间',
  `category` int(11) NOT NULL COMMENT '分类',
  `view` int(10) NOT NULL DEFAULT '0',
  `price` float(10,2) NOT NULL DEFAULT '0.00' COMMENT '价格',
  `starttime` int(11) unsigned DEFAULT NULL COMMENT '开始时间',
  `endtime` int(11) unsigned DEFAULT NULL COMMENT '结束时间',
  `teacherid` varchar(10) DEFAULT '0',
  `userId` varchar(10) DEFAULT NULL COMMENT '发布者ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COMMENT='点播管理';

#
# Data for table "onethink_live"
#

/*!40000 ALTER TABLE `onethink_live` DISABLE KEYS */;
INSERT INTO `onethink_live` VALUES (2,0,'初二数学重难题秒杀技巧',130,'2','本课程面向三年级学生，是三年级课程的第二期（配套三年级下册）。直播教学时间是3月5日起，每周一晚上19：00-20：00，共14节新课，1次测试。<br />\r\n<p>\r\n\t<img src=\"/Uploads/Editor/2018-05-09/5af2c68ce737c.png\" alt=\"\" /> \r\n</p>',0,1525660596,1,1427036739,0,22,100.00,NULL,NULL,'0',NULL),(3,0,'“超级拼读”5天训练营-掌握背单词奥秘',131,'2','本课程面向三年级学生，是三年级课程的第二期（配套三年级下册）。直播教学时间是3月5日起，每周一晚上19：00-20：00，共14节新课，1次测试。<br />\r\n<p>\r\n\t<img src=\"/Uploads/Editor/2018-05-09/5af2c68ce737c.png\" alt=\"\" /> \r\n</p>',0,1525660696,1,1428768609,0,21,120.00,1531900800,1531905000,'0',NULL),(4,0,'39个单词搞定非谓语动词',132,'2','本课程面向三年级学生，是三年级课程的第二期（配套三年级下册）。直播教学时间是3月5日起，每周一晚上19：00-20：00，共14节新课，1次测试。<br />\r\n<p>\r\n\t<img src=\"/Uploads/Editor/2018-05-09/5af2c68ce737c.png\" alt=\"\" /> \r\n</p>',0,1525660793,1,1428768659,0,18,200.00,1531900800,1531905000,'0',NULL),(5,0,'英语的原理 死记硬背VS英语思维',133,'2','本课程面向三年级学生，是三年级课程的第二期（配套三年级下册）。直播教学时间是3月5日起，每周一晚上19：00-20：00，共14节新课，1次测试。<br />\r\n<p>\r\n\t<img src=\"/Uploads/Editor/2018-05-09/5af2c68ce737c.png\" alt=\"\" /> \r\n</p>',0,1525660881,1,1429456880,0,26,300.00,1531900800,1531905000,'0',NULL),(6,0,'7天训练之治愈系—结构的力量vs死记硬背',134,'2','本课程面向三年级学生，是三年级课程的第二期（配套三年级下册）。直播教学时间是3月5日起，每周一晚上19：00-20：00，共14节新课，1次测试。<br />\r\n<p>\r\n\t<img src=\"/Uploads/Editor/2018-05-09/5af2c68ce737c.png\" alt=\"\" /> \r\n</p>',0,1525660937,1,1429456939,0,39,400.00,1531900800,1531905000,'0',NULL),(7,0,'奥数思维派专题——几何城堡',135,'2','本课程面向三年级学生，是三年级课程的第二期（配套三年级下册）。直播教学时间是3月5日起，每周一晚上19：00-20：00，共14节新课，1次测试。<br />\r\n<p>\r\n\t<img src=\"/Uploads/Editor/2018-05-09/5af2c68ce737c.png\" alt=\"\" /> \r\n</p>',0,1525660990,1,1429456969,0,145,1000.00,1531900800,1531905000,'0',NULL),(9,0,'新初一语文直播阅读写作目标班',136,'2','本课程面向三年级学生，是三年级课程的第二期（配套三年级下册）。直播教学时间是3月5日起，每周一晚上19：00-20：00，共14节新课，1次测试。<br />\n<p>\n\t<img src=\"/Uploads/Editor/2018-05-09/5af2c68ce737c.png\" alt=\"\" /> \n</p>',0,1525661063,1,1525661063,0,23,400.00,1531900800,1531905000,'0',NULL),(10,0,'小学英语语法通关',137,'2','本课程面向三年级学生，是三年级课程的第二期（配套三年级下册）。直播教学时间是3月5日起，每周一晚上19：00-20：00，共14节新课，1次测试。<br />\n<p>\n\t<img src=\"/Uploads/Editor/2018-05-09/5af2c68ce737c.png\" alt=\"\" /> \n</p>',0,1525661140,1,1525661140,0,18,400.00,1531900800,1531905000,'0',NULL),(11,0,'初二数学重难题秒杀技巧',138,'2','本课程面向三年级学生，是三年级课程的第二期（配套三年级下册）。直播教学时间是3月5日起，每周一晚上19：00-20：00，共14节新课，1次测试。<br />\n<p>\n\t<img src=\"/Uploads/Editor/2018-05-09/5af2c68ce737c.png\" alt=\"\" /> \n</p>',0,1525661265,1,1525661265,0,20,180.00,1531900800,1531905000,'0',NULL),(12,0,'高考28天—数学抢分押题',139,'2','本课程面向三年级学生，是三年级课程的第二期（配套三年级下册）。直播教学时间是3月5日起，每周一晚上19：00-20：00，共14节新课，1次测试。<br />\n<p>\n\t<img src=\"/Uploads/Editor/2018-05-09/5af2c68ce737c.png\" alt=\"\" /> \n</p>',0,1525661411,1,1525661411,0,368,450.00,1531900800,1531905000,'0',NULL),(13,0,'高考语文最后40天冲刺及写作55分+',140,'2','本课程面向三年级学生，是三年级课程的第二期（配套三年级下册）。直播教学时间是3月5日起，每周一晚上19：00-20：00，共14节新课，1次测试。<br />\n<p>\n\t<img src=\"/Uploads/Editor/2018-05-09/5af2c68ce737c.png\" alt=\"\" /> \n</p>',0,1525661536,1,1525661536,0,382,600.00,1531900800,1531905000,'0',NULL),(14,0,'1小时征服雅思阅读最难Headings',141,'2','',0,1525661605,1,1525661605,0,413,300.00,1531900800,1531905000,'0',NULL),(15,0,'巧治托福听力顽疾',142,'2','本课程面向三年级学生，是三年级课程的第二期（配套三年级下册）。直播教学时间是3月5日起，每周一晚上19：00-20：00，共14节新课，1次测试。<br />\n<p>\n\t<img src=\"/Uploads/Editor/2018-05-09/5af2c68ce737c.png\" alt=\"\" /> \n</p>',0,1525661722,1,1525661722,0,374,200.00,1531900800,1531905000,'0',NULL),(16,0,'雅思考官带你拿高分之雅思5分全程课',143,'2','本课程面向三年级学生，是三年级课程的第二期（配套三年级下册）。直播教学时间是3月5日起，每周一晚上19：00-20：00，共14节新课，1次测试。<br />\r\n<p>\r\n\t<img src=\"/Uploads/Editor/2018-05-09/5af2c68ce737c.png\" alt=\"\" /> \r\n</p>',0,1535366383,1,1525661804,0,437,0.10,1531900800,1531905000,'2',NULL),(17,0,'MissWu带你拿下雅思口语7分',144,'2','本课程面向三年级学生，是三年级课程的第二期（配套三年级下册）。直播教学时间是3月5日起，每周一晚上19：00-20：00，共14节新课，1次测试。<br />\n<p>\n\t<img src=\"/Uploads/Editor/2018-05-09/5af2c68ce737c.png\" alt=\"\" /> \n</p>',0,1525661914,1,1525661914,0,363,200.00,1531900800,1531905000,'2',NULL),(18,0,'万法归宗之英语语法速成全集',145,'2','本课程面向三年级学生，是三年级课程的第二期（配套三年级下册）。直播教学时间是3月5日起，每周一晚上19：00-20：00，共14节新课，1次测试。<br />\r\n<p>\r\n\t<img src=\"/Uploads/Editor/2018-05-09/5af2c68ce737c.png\" alt=\"\" /> \r\n</p>',0,1535641937,1,1525662433,0,389,0.01,1531900800,1531905000,'2',NULL),(19,0,'让你的思维导图从零到颜值爆表！',146,'2,11,16','本课程面向三年级学生，是三年级课程的第二期（配套三年级下册）。直播教学时间是3月5日起，每周一晚上19：00-20：00，共14节新课，1次测试。<br />\r\n<p>\r\n\t<img src=\"/Uploads/Editor/2018-05-09/5af2c68ce737c.png\" alt=\"\" /> \r\n</p>',0,1535195081,1,1525662684,0,999,0.00,1531900800,1531905000,'2',NULL);
/*!40000 ALTER TABLE `onethink_live` ENABLE KEYS */;

#
# Structure for table "onethink_live_category"
#

DROP TABLE IF EXISTS `onethink_live_category`;
CREATE TABLE `onethink_live_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(25) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `pid` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

#
# Data for table "onethink_live_category"
#

/*!40000 ALTER TABLE `onethink_live_category` DISABLE KEYS */;
INSERT INTO `onethink_live_category` VALUES (1,'科目',1427033808,1531622380,1,0,0),(2,'语文',1427033815,1429517749,1,1,0),(10,'数学',1429517757,1429517752,1,1,0),(11,'英语',1429517770,1429517804,1,1,0),(12,'年级',1533547596,1533547754,1,12,0),(13,'一年级',1533547741,1533547733,-1,0,0),(14,'年级',1533547774,1533547767,1,0,0),(15,'一年级',1533547787,1533547800,1,14,0),(16,'二年级',1533547809,1533547804,1,14,0),(17,'三年级',1533547817,1533547813,1,14,0);
/*!40000 ALTER TABLE `onethink_live_category` ENABLE KEYS */;

#
# Structure for table "onethink_live_chapters"
#

DROP TABLE IF EXISTS `onethink_live_chapters`;
CREATE TABLE `onethink_live_chapters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT '0',
  `courseid` int(11) DEFAULT '0',
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '标题',
  `content` text COMMENT '内容',
  `companyid` int(11) NOT NULL,
  `changetime` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '状态，-1：删除；0：禁用；1：启用；2：未审核',
  `createtime` int(11) NOT NULL COMMENT '创建时间',
  `category` int(11) NOT NULL COMMENT '分类',
  `view` int(10) NOT NULL DEFAULT '0',
  `sort` int(10) NOT NULL DEFAULT '0',
  `starttime` int(11) unsigned DEFAULT NULL COMMENT '开始时间',
  `endtime` int(11) unsigned DEFAULT NULL COMMENT '结束时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COMMENT='课程章节';

#
# Data for table "onethink_live_chapters"
#

/*!40000 ALTER TABLE `onethink_live_chapters` DISABLE KEYS */;
INSERT INTO `onethink_live_chapters` VALUES (27,19,19,'安装','1111111111333',0,1532172280,1,1532150486,0,0,0,NULL,NULL),(28,19,19,'系统配置','1111111111111',0,1532172288,1,1532150623,0,0,0,NULL,NULL),(29,19,19,'登陆','1111111111111111',0,1532172294,1,1532150675,0,0,0,NULL,NULL),(30,19,19,'4444444','',0,1532172303,1,1532172303,0,0,0,NULL,NULL),(31,19,19,'5555555555','',0,1532172309,1,1532172309,0,0,0,NULL,NULL),(32,19,19,'66666666','',0,1532172315,1,1532172315,0,0,0,NULL,NULL),(33,19,19,'777777777','',0,1532172321,1,1532172321,0,0,0,NULL,NULL),(34,19,19,'8888888888','',0,1532172326,1,1532172326,0,0,0,NULL,NULL),(35,19,19,'999999999999','',0,1532172332,1,1532172332,0,0,0,NULL,NULL),(36,19,19,'第10章节','',0,1532172338,1,1532172338,0,0,0,NULL,NULL),(37,36,19,'子章节一','11111111111111111111111',0,1532185146,1,1532182584,0,0,0,NULL,NULL),(38,36,19,'子章节二','<p>\r\n\t222222222222222\r\n</p>\r\n<p>\r\n\t33333333333333333333333\r\n</p>\r\n<p>\r\n\t44444444444444444444444444444<img src=\"https://img-blog.csdn.net/20170817140130843?watermark/2/text/aHR0cDovL2Jsb2cuY3Nkbi5uZXQvbmVzbzUyMA==/font/5a6L5L2T/fontsize/400/fill/I0JBQkFCMA==/dissolve/70/gravity/Center\" width=\"600\" height=\"304\" alt=\"\" /> \r\n</p>\r\n<img src=\"https://img-blog.csdn.net/20170817140130843?watermark/2/text/aHR0cDovL2Jsb2cuY3Nkbi5uZXQvbmVzbzUyMA==/font/5a6L5L2T/fontsize/400/fill/I0JBQkFCMA==/dissolve/70/gravity/Center\" width=\"600\" height=\"304\" alt=\"\" /> \r\n<img src=\"https://img-blog.csdn.net/20170817140130843?watermark/2/text/aHR0cDovL2Jsb2cuY3Nkbi5uZXQvbmVzbzUyMA==/font/5a6L5L2T/fontsize/400/fill/I0JBQkFCMA==/dissolve/70/gravity/Center\" width=\"600\" height=\"304\" alt=\"\" /> \r\n<img src=\"https://img-blog.csdn.net/20170817140130843?watermark/2/text/aHR0cDovL2Jsb2cuY3Nkbi5uZXQvbmVzbzUyMA==/font/5a6L5L2T/fontsize/400/fill/I0JBQkFCMA==/dissolve/70/gravity/Center\" width=\"600\" height=\"304\" alt=\"\" /> \r\n<img src=\"https://img-blog.csdn.net/20170817140130843?watermark/2/text/aHR0cDovL2Jsb2cuY3Nkbi5uZXQvbmVzbzUyMA==/font/5a6L5L2T/fontsize/400/fill/I0JBQkFCMA==/dissolve/70/gravity/Center\" width=\"600\" height=\"304\" alt=\"\" /> \r\n<img src=\"https://img-blog.csdn.net/20170817140130843?watermark/2/text/aHR0cDovL2Jsb2cuY3Nkbi5uZXQvbmVzbzUyMA==/font/5a6L5L2T/fontsize/400/fill/I0JBQkFCMA==/dissolve/70/gravity/Center\" width=\"600\" height=\"304\" alt=\"\" /> ',0,1532218592,1,1532182592,0,0,0,NULL,NULL),(39,36,19,'子章节三','',0,1532182599,1,1532182599,0,0,0,NULL,NULL);
/*!40000 ALTER TABLE `onethink_live_chapters` ENABLE KEYS */;

#
# Structure for table "onethink_local_comment"
#

DROP TABLE IF EXISTS `onethink_local_comment`;
CREATE TABLE `onethink_local_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `app` text NOT NULL,
  `mod` text NOT NULL,
  `row_id` int(11) NOT NULL,
  `parse` int(11) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `create_time` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=122 DEFAULT CHARSET=utf8;

#
# Data for table "onethink_local_comment"
#

/*!40000 ALTER TABLE `onethink_local_comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `onethink_local_comment` ENABLE KEYS */;

#
# Structure for table "onethink_mail_history"
#

DROP TABLE IF EXISTS `onethink_mail_history`;
CREATE TABLE `onethink_mail_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `create_time` int(11) NOT NULL,
  `from` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "onethink_mail_history"
#

/*!40000 ALTER TABLE `onethink_mail_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `onethink_mail_history` ENABLE KEYS */;

#
# Structure for table "onethink_mail_history_link"
#

DROP TABLE IF EXISTS `onethink_mail_history_link`;
CREATE TABLE `onethink_mail_history_link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail_id` int(11) NOT NULL,
  `to` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "onethink_mail_history_link"
#

/*!40000 ALTER TABLE `onethink_mail_history_link` DISABLE KEYS */;
/*!40000 ALTER TABLE `onethink_mail_history_link` ENABLE KEYS */;

#
# Structure for table "onethink_mail_list"
#

DROP TABLE IF EXISTS `onethink_mail_list`;
CREATE TABLE `onethink_mail_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "onethink_mail_list"
#

/*!40000 ALTER TABLE `onethink_mail_list` DISABLE KEYS */;
/*!40000 ALTER TABLE `onethink_mail_list` ENABLE KEYS */;

#
# Structure for table "onethink_mail_token"
#

DROP TABLE IF EXISTS `onethink_mail_token`;
CREATE TABLE `onethink_mail_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `token` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "onethink_mail_token"
#

/*!40000 ALTER TABLE `onethink_mail_token` DISABLE KEYS */;
/*!40000 ALTER TABLE `onethink_mail_token` ENABLE KEYS */;

#
# Structure for table "onethink_member"
#

DROP TABLE IF EXISTS `onethink_member`;
CREATE TABLE `onethink_member` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `nickname` char(16) NOT NULL DEFAULT '' COMMENT '昵称',
  `sex` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '性别',
  `birthday` date NOT NULL DEFAULT '0000-00-00' COMMENT '生日',
  `qq` char(10) NOT NULL DEFAULT '' COMMENT 'qq号',
  `score` mediumint(8) NOT NULL DEFAULT '0' COMMENT '用户积分',
  `login` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '登录次数',
  `reg_ip` bigint(20) NOT NULL DEFAULT '0' COMMENT '注册IP',
  `reg_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '注册时间',
  `last_login_ip` bigint(20) NOT NULL DEFAULT '0' COMMENT '最后登录IP',
  `last_login_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '会员状态',
  `companyid` int(11) NOT NULL DEFAULT '0',
  `signature` text NOT NULL,
  `tox_money` int(11) NOT NULL,
  `pos_province` int(11) NOT NULL,
  `pos_city` int(11) NOT NULL,
  `pos_district` int(11) NOT NULL,
  `pos_community` int(11) NOT NULL,
  `isteacher` tinyint(3) DEFAULT '0' COMMENT '1 yes,0 not',
  PRIMARY KEY (`uid`),
  KEY `status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COMMENT='会员表';

#
# Data for table "onethink_member"
#

/*!40000 ALTER TABLE `onethink_member` DISABLE KEYS */;
INSERT INTO `onethink_member` VALUES (1,'admin',0,'0000-00-00','',880,338,0,1417682189,3682966960,1537426015,1,0,'都到我碗里来',0,0,0,0,0,0),(2,'韩老师',1,'0000-00-00','',250,154,2130706433,1262285313,1032669985,1537102587,1,0,'做最好的老师',0,440000,440300,440303,0,1),(3,'黄老师',0,'0000-00-00','',20,2,0,0,1032670198,1535199122,1,0,'一切为了学生',0,0,0,0,0,1),(4,'王老师',0,'0000-00-00','',60,12,0,0,1901732268,1534175196,1,0,'老师好 好老师',0,110000,0,0,0,1),(6,'李老师',0,'0000-00-00','',10,2,0,0,1901732268,1534175350,1,0,'一个好人',0,0,0,0,0,1),(7,'戴老师',0,'0000-00-00','',10,1,0,0,1032670198,1535104352,1,0,'表扬使人进步，批评使人落后。',0,0,0,0,0,1),(8,'孙老师',0,'0000-00-00','',10,2,0,0,1901732268,1534175419,1,0,'老师辛苦了',0,0,0,0,0,1),(9,'赵老师',0,'0000-00-00','',10,2,2130706433,1429885611,1901732268,1534175596,1,0,'同学们辛苦了',0,0,0,0,0,1),(10,'刘老师',0,'0000-00-00','',10,2,2130706433,1429886205,1901732268,1534175739,1,0,'有进步 继续保持',0,0,0,0,0,1),(11,'孟老师',0,'0000-00-00','',10,2,2130706433,1429886277,1901732268,1534175924,1,0,'好 好 好!!!',0,0,0,0,0,1),(16,'金老师',1,'0000-00-00','',40,8,3071042821,1524315975,1901732268,1534175989,1,0,'我为自己代言',0,0,0,0,0,1),(17,'用户1',0,'0000-00-00','',80,57,2032684708,1535102685,3070969914,1537024527,1,0,'',0,0,0,0,0,0);
/*!40000 ALTER TABLE `onethink_member` ENABLE KEYS */;

#
# Structure for table "onethink_menu"
#

DROP TABLE IF EXISTS `onethink_menu`;
CREATE TABLE `onethink_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '文档ID',
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '标题',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上级分类ID',
  `sort` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序（同级有效）',
  `url` char(255) NOT NULL DEFAULT '' COMMENT '链接地址',
  `hide` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否隐藏',
  `tip` varchar(255) NOT NULL DEFAULT '' COMMENT '提示',
  `group` varchar(50) DEFAULT '' COMMENT '分组',
  `is_dev` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否仅开发者模式可见',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=296 DEFAULT CHARSET=utf8;

#
# Data for table "onethink_menu"
#

/*!40000 ALTER TABLE `onethink_menu` DISABLE KEYS */;
INSERT INTO `onethink_menu` VALUES (1,'首页',0,1,'Index/index',0,'','',0),(2,'内容',0,2,'Article/mydocument',2,'','',0),(3,'文档列表',2,0,'article/index',1,'','内容',0),(4,'新增',3,0,'article/add',0,'','',0),(5,'编辑',3,0,'article/edit',0,'','',0),(6,'改变状态',3,0,'article/setStatus',0,'','',0),(7,'保存',3,0,'article/update',0,'','',0),(8,'保存草稿',3,0,'article/autoSave',0,'','',0),(9,'移动',3,0,'article/move',0,'','',0),(10,'复制',3,0,'article/copy',0,'','',0),(11,'粘贴',3,0,'article/paste',0,'','',0),(12,'导入',3,0,'article/batchOperate',0,'','',0),(13,'回收站',2,0,'article/recycle',1,'','内容',0),(14,'还原',13,0,'article/permit',0,'','',0),(15,'清空',13,0,'article/clear',0,'','',0),(16,'用户',0,3,'User/index',0,'','',0),(17,'用户信息',16,0,'User/index',0,'','用户管理',0),(18,'新增用户',17,0,'User/add',0,'添加新用户','',0),(19,'用户行为',16,0,'User/action',1,'','行为管理',0),(20,'新增用户行为',19,0,'User/addaction',0,'','',0),(21,'编辑用户行为',19,0,'User/editaction',0,'','',0),(22,'保存用户行为',19,0,'User/saveAction',0,'\"用户->用户行为\"保存编辑和新增的用户行为','',0),(23,'变更行为状态',19,0,'User/setStatus',0,'\"用户->用户行为\"中的启用,禁用和删除权限','',0),(24,'禁用会员',19,0,'User/changeStatus?method=forbidUser',0,'\"用户->用户信息\"中的禁用','',0),(25,'启用会员',19,0,'User/changeStatus?method=resumeUser',0,'\"用户->用户信息\"中的启用','',0),(26,'删除会员',19,0,'User/changeStatus?method=deleteUser',0,'\"用户->用户信息\"中的删除','',0),(27,'权限管理',16,0,'AuthManager/index',1,'','用户管理',0),(28,'删除',27,0,'AuthManager/changeStatus?method=deleteGroup',0,'删除用户组','',0),(29,'禁用',27,0,'AuthManager/changeStatus?method=forbidGroup',0,'禁用用户组','',0),(30,'恢复',27,0,'AuthManager/changeStatus?method=resumeGroup',0,'恢复已禁用的用户组','',0),(31,'新增',27,0,'AuthManager/createGroup',0,'创建新的用户组','',0),(32,'编辑',27,0,'AuthManager/editGroup',0,'编辑用户组名称和描述','',0),(33,'保存用户组',27,0,'AuthManager/writeGroup',0,'新增和编辑用户组的\"保存\"按钮','',0),(34,'授权',27,0,'AuthManager/group',0,'\"后台 \\ 用户 \\ 用户信息\"列表页的\"授权\"操作按钮,用于设置用户所属用户组','',0),(35,'访问授权',27,0,'AuthManager/access',0,'\"后台 \\ 用户 \\ 权限管理\"列表页的\"访问授权\"操作按钮','',0),(36,'成员授权',27,0,'AuthManager/user',0,'\"后台 \\ 用户 \\ 权限管理\"列表页的\"成员授权\"操作按钮','',0),(37,'解除授权',27,0,'AuthManager/removeFromGroup',0,'\"成员授权\"列表页内的解除授权操作按钮','',0),(38,'保存成员授权',27,0,'AuthManager/addToGroup',0,'\"用户信息\"列表页\"授权\"时的\"保存\"按钮和\"成员授权\"里右上角的\"添加\"按钮)','',0),(39,'分类授权',27,0,'AuthManager/category',0,'\"后台 \\ 用户 \\ 权限管理\"列表页的\"分类授权\"操作按钮','',0),(40,'保存分类授权',27,0,'AuthManager/addToCategory',0,'\"分类授权\"页面的\"保存\"按钮','',0),(41,'模型授权',27,0,'AuthManager/modelauth',0,'\"后台 \\ 用户 \\ 权限管理\"列表页的\"模型授权\"操作按钮','',0),(42,'保存模型授权',27,0,'AuthManager/addToModel',0,'\"分类授权\"页面的\"保存\"按钮','',0),(43,'扩展',0,7,'Addons/index',2,'','',0),(44,'插件管理',43,1,'Addons/index',0,'','扩展',0),(45,'创建',44,0,'Addons/create',0,'服务器上创建插件结构向导','',0),(46,'检测创建',44,0,'Addons/checkForm',0,'检测插件是否可以创建','',0),(47,'预览',44,0,'Addons/preview',0,'预览插件定义类文件','',0),(48,'快速生成插件',44,0,'Addons/build',0,'开始生成插件结构','',0),(49,'设置',44,0,'Addons/config',0,'设置插件配置','',0),(50,'禁用',44,0,'Addons/disable',0,'禁用插件','',0),(51,'启用',44,0,'Addons/enable',0,'启用插件','',0),(52,'安装',44,0,'Addons/install',0,'安装插件','',0),(53,'卸载',44,0,'Addons/uninstall',0,'卸载插件','',0),(54,'更新配置',44,0,'Addons/saveconfig',0,'更新插件配置处理','',0),(55,'插件后台列表',44,0,'Addons/adminList',0,'','',0),(56,'URL方式访问插件',44,0,'Addons/execute',0,'控制是否有权限通过url访问插件控制器方法','',0),(57,'钩子管理',43,2,'Addons/hooks',0,'','扩展',0),(58,'模型管理',68,3,'Model/index',1,'','系统设置',0),(59,'新增',58,0,'model/add',0,'','',0),(60,'编辑',58,0,'model/edit',0,'','',0),(61,'改变状态',58,0,'model/setStatus',0,'','',0),(62,'保存数据',58,0,'model/update',0,'','',0),(63,'属性管理',68,0,'Attribute/index',1,'网站属性配置。','',0),(64,'新增',63,0,'Attribute/add',0,'','',0),(65,'编辑',63,0,'Attribute/edit',0,'','',0),(66,'改变状态',63,0,'Attribute/setStatus',0,'','',0),(67,'保存数据',63,0,'Attribute/update',0,'','',0),(68,'系统',0,2,'Config/website',0,'','',0),(69,'网站设置',68,1,'Config/group',1,'','系统设置',0),(70,'配置管理',68,4,'Config/index',1,'','系统设置',0),(71,'编辑',70,0,'Config/edit',0,'新增编辑和保存配置','',0),(72,'删除',70,0,'Config/del',0,'删除配置','',0),(73,'新增',70,0,'Config/add',0,'新增配置','',0),(74,'保存',70,0,'Config/save',0,'保存配置','',0),(75,'菜单管理',68,5,'Menu/index',0,'','系统设置',0),(76,'导航管理',68,6,'Channel/index',0,'','系统设置',0),(77,'新增',76,0,'Channel/add',0,'','',0),(78,'编辑',76,0,'Channel/edit',0,'','',0),(79,'删除',76,0,'Channel/del',0,'','',0),(80,'分类管理',68,2,'Category/index',1,'','系统设置',0),(81,'编辑',80,0,'Category/edit',0,'编辑和保存栏目分类','',0),(82,'新增',80,0,'Category/add',0,'新增栏目分类','',0),(83,'删除',80,0,'Category/remove',0,'删除栏目分类','',0),(84,'移动',80,0,'Category/operate/type/move',0,'移动栏目分类','',0),(85,'合并',80,0,'Category/operate/type/merge',0,'合并栏目分类','',0),(86,'备份数据库',68,0,'Database/index?type=export',0,'','数据备份',0),(87,'备份',86,0,'Database/export',0,'备份数据库','',0),(88,'优化表',86,0,'Database/optimize',0,'优化数据表','',0),(89,'修复表',86,0,'Database/repair',0,'修复数据表','',0),(90,'还原数据库',68,0,'Database/index?type=import',0,'','数据备份',0),(91,'恢复',90,0,'Database/import',0,'数据库恢复','',0),(92,'删除',90,0,'Database/del',0,'删除备份文件','',0),(96,'新增',75,0,'Menu/add',0,'','系统设置',0),(98,'编辑',75,0,'Menu/edit',0,'','',0),(104,'下载管理',102,0,'Think/lists?model=download',0,'','',0),(105,'配置管理',102,0,'Think/lists?model=config',0,'','',0),(106,'行为日志',16,0,'Action/actionlog',0,'','行为管理',0),(108,'修改密码',16,0,'User/updatePassword',1,'','',0),(109,'修改昵称',16,0,'User/updateNickname',1,'','',0),(110,'查看行为日志',106,0,'action/edit',1,'','',0),(112,'新增数据',58,0,'think/add',1,'','',0),(113,'编辑数据',58,0,'think/edit',1,'','',0),(114,'导入',75,0,'Menu/import',0,'','',0),(115,'生成',58,0,'Model/generate',0,'','',0),(116,'新增钩子',57,0,'Addons/addHook',0,'','',0),(117,'编辑钩子',57,0,'Addons/edithook',0,'','',0),(118,'文档排序',3,0,'Article/sort',1,'','',0),(119,'排序',70,0,'Config/sort',1,'','',0),(120,'排序',75,0,'Menu/sort',1,'','',0),(121,'排序',76,0,'Channel/sort',1,'','',0),(139,'机构管理',0,69,'Company/companylist',2,'','',0),(141,'机构列表',139,8,'Company/companylist',0,'','机构管理',0),(142,'添加、编辑机构',139,8,'company/companyedit',1,'','机构管理',0),(143,'回收站',139,9,'company/trash',0,'','机构管理',0),(144,'机构管理员列表',139,9,'company/administratorlist',1,'','机构管理',0),(145,'添加、编辑机构管理员',139,11,'company/administratoredit',1,'','机构管理',0),(146,'用户组管理',139,2,'company/usergroup',0,'','机构配置',0),(147,'用户组回收站',139,3,'company/usergrouptrash',0,'','机构配置',0),(148,'添加、编辑用户组',139,0,'company/addusergroup',1,'','',0),(149,'用户组操作',139,0,'company/operateusergroup',1,'','',0),(150,'用户管理',139,2,'company/users',0,'','机构配置',0),(170,'幻灯片',0,8,'poster/lists',0,'','',0),(171,'所有幻灯片',170,1,'poster/lists',0,'','幻灯片',0),(172,'添加、编辑幻灯片',170,2,'poster/edit',1,'','幻灯片',0),(173,'回收站',170,3,'poster/trash',0,'','幻灯片',0),(174,'房间管理',0,22,'Room/lists',2,'','',0),(175,'所有房间',174,1,'room/lists',0,'','房间管理',0),(176,'添加、编辑房间',174,2,'room/edit',1,'','房间管理',0),(177,'房间回收站',174,3,'room/trash',0,'','房间管理',0),(178,'房间分类',174,1,'room/Category',0,'','房间配置',0),(179,'添加、编辑分类',174,2,'room/addCategory',1,'','房间配置',0),(180,'分类操作',174,3,'room/operateCategory',1,'','',0),(181,'分类回收站',174,4,'room/categoryTrash',0,'','房间配置',0),(182,'点播管理',0,23,'vod/lists',0,'','',0),(183,'所有点播',182,1,'vod/lists',0,'','点播管理',0),(184,'添加、编辑点播',182,2,'vod/add',1,'','点播管理',0),(185,'回收站',182,3,'vod/trash',0,'','点播管理',0),(186,'点播分类',182,1,'vod/Category',0,'','点播配置',0),(187,'添加、编辑点播分类',182,2,'vod/addCategory',1,'','点播配置',0),(188,'分类操作',182,3,'vod/operateCategory',1,'','点播配置',0),(189,'分类回收站',182,4,'vod/categoryTrash',0,'','点播配置',0),(190,'资讯管理',0,27,'news/lists',0,'','',0),(191,'所有资讯',190,1,'news/lists',0,'','资讯管理',0),(192,'添加、编辑资讯',190,2,'news/edit',1,'','资讯管理',0),(193,'回收站',190,3,'news/trash',0,'','资讯管理',0),(194,'分类',190,1,'news/Category',0,'','资讯配置',0),(195,'添加、编辑资讯',190,2,'news/addCategory',1,'','资讯配置',0),(196,'分类操作',190,3,'news/operateCategory',1,'','资讯配置',0),(197,'分类回收站',190,4,'news/categoryTrash',0,'','资讯配置',0),(198,'资料下载',0,22,'download/lists',1,'','',0),(199,'所有资料下载',198,1,'download/lists',0,'','资料下载管理',0),(200,'添加、编辑资料下载',198,2,'download/edit',1,'','资料下载管理',0),(201,'视频回收站',198,3,'download/trash',0,'','资料下载管理',0),(202,'资料下载分类',198,1,'download/Category',0,'','资料下载配置',0),(203,'添加、编辑资料下载',198,2,'download/addCategory',1,'','资料下载配置',0),(204,'分类操作',198,3,'download/operateCategory',1,'','资料下载配置',0),(205,'分类回收站',198,4,'download/categoryTrash',0,'','资料下载配置',0),(206,'文库管理',0,24,'wenku/lists',0,'','',0),(207,'所有文库',206,1,'wenku/lists',0,'','文库管理',0),(208,'添加、编辑文库',206,2,'wenku/add',1,'','文库管理',0),(209,'回收站',206,3,'wenku/trash',0,'','文库管理',0),(210,'文库分类',206,1,'wenku/Category',0,'','文库配置',0),(211,'添加、编辑分类',206,2,'wenku/addCategory',1,'','文库配置',0),(212,'分类操作',206,3,'wenku/operateCategory',1,'','文库配置',0),(213,'分类回收站',206,4,'wenku/categoryTrash',0,'','文库配置',0),(214,'在线考试',0,25,'Examination/questionpapersList',0,'','',0),(215,'考试记录',214,1,'Examination/recordList',1,'','在线考试',0),(216,'题库管理',214,2,'Examination/topicsList',0,'','在线考试',0),(217,'试卷管理',214,3,'Examination/questionpapersList',0,'','在线考试',0),(218,'编辑题目',216,1,'Examination/editTopic',1,'','题库管理',0),(219,'新增题目',216,2,'Examination/addtopic',1,'','题库管理',0),(220,'试卷编辑',217,0,'Examination/edittestpaper',0,'','',0),(221,'试卷题目管理',217,0,'Examination/topicManage',0,'','',0),(222,'课程管理',0,22,'live/lists',0,'','',0),(223,'所有内容',222,1,'live/lists',0,'','课程管理',0),(224,'添加、编辑课程',222,2,'live/add',1,'','课程管理',0),(225,'回收站',222,3,'live/trash',0,'','课程管理',0),(226,'分类管理',222,1,'live/Category',0,'','课程配置',0),(227,'添加、编辑分类',222,2,'live/addCategory',1,'','课程配置',0),(228,'分类操作',222,3,'live/operateCategory',1,'','课程配置',0),(229,'分类回收站',222,4,'live/categoryTrash',0,'','课程配置',0),(230,'内容状态设置',222,4,'live/setStatus',1,'','课程管理',0),(231,'分类',214,1,'Examination/Category',0,'','配置',0),(232,'添加、编辑分类',214,2,'Examination/addCategory',1,'','配置',0),(233,'分类操作',214,3,'Examination/operateCategory',1,'','配置',0),(234,'分类回收站',214,4,'Examination/categoryTrash',0,'','配置',0),(235,'模块管理',43,0,'module/lists',0,'','云平台',0),(236,'卸载模块',43,0,'module/uninstall',1,'','云平台',0),(237,'模块安装',43,0,'module/install',1,'','云平台',0),(238,'扩展资料',16,3,'user/profile',1,'','用户管理',0),(239,'用户扩展资料列表',16,4,'user/expandinfo_select',1,'','用户管理',0),(240,'产品管理',0,22,'product/lists',2,'','',0),(241,'所有内容',240,1,'product/lists',0,'','产品管理',0),(242,'添加、编辑内容',240,2,'product/edit',1,'','产品管理',0),(243,'内容回收站',240,3,'product/trash',0,'','产品管理',0),(244,'内容状态设置',240,4,'product/setStatus',1,'','产品管理',0),(245,'分类管理',240,1,'product/Category',0,'','产品配置',0),(246,'添加、编辑分类',240,2,'product/addCategory',1,'','产品配置',0),(247,'分类操作',240,3,'product/operateCategory',1,'','产品配置',0),(248,'分类回收站',240,4,'product/categoryTrash',0,'','产品配置',0),(249,'留言反馈',0,26,'Feedback/lists',0,'','',0),(250,'所有内容',249,1,'Feedback/lists',0,'','留言反馈',0),(251,'添加、编辑内容',249,2,'Feedback/edit',1,'','留言反馈',0),(252,'内容回收站',249,3,'Feedback/trash',0,'','留言反馈',0),(253,'内容状态设置',249,4,'Feedback/setStatus',1,'','留言反馈',0),(254,'分类管理',249,1,'Feedback/Category',1,'','留言反馈',0),(255,'添加、编辑分类',249,2,'Feedback/addCategory',1,'','留言反馈',0),(256,'分类操作',249,3,'Feedback/operateCategory',1,'','留言反馈',0),(257,'分类回收站',249,4,'Feedback/categoryTrash',1,'','留言反馈',0),(258,'关于我们',0,28,'Aboutus/lists',0,'','',0),(259,'所有内容',258,1,'Aboutus/lists',0,'','关于我们',0),(260,'添加、编辑内容',258,2,'Aboutus/edit',1,'','关于我们',0),(261,'内容回收站',258,3,'Aboutus/trash',0,'','关于我们',0),(262,'内容状态设置',258,4,'Aboutus/setStatus',1,'','关于我们',0),(263,'分类管理',258,1,'Aboutus/Category',1,'','分类配置',0),(264,'添加、编辑分类',258,2,'Aboutus/addCategory',1,'','分类配置',0),(265,'分类操作',258,3,'Aboutus/operateCategory',1,'','分类配置',0),(266,'分类回收站',258,4,'Aboutus/categoryTrash',1,'','分类配置',0),(267,'章节管理',222,0,'live/chapters',1,'','课程管理',0),(268,'添加、编辑章节',222,0,'live/addChapter',1,'','课程管理',0),(269,'财务管理',0,30,'Order/index',0,'','',0),(270,'所有订单',269,0,'Order/index',0,'','订单管理',0),(271,'查看、编辑订单',269,0,'Order/edit',1,'','订单管理',0),(272,'已取消订单',269,0,'Order/cancel',0,'','订单管理',0),(273,'账单管理',269,0,'Order/lists',0,'','财务管理',0),(274,'网站信息',68,1,'Config/website',0,'','系统设置',0),(275,'已删除栏目',222,0,'live/add',1,'','课程管理',0),(276,'预览试卷',214,0,'Examination/previewquestionPaper',1,'','在线考试',0),(277,'删除内容',182,0,'vod/setstatus',1,'','点播管理',0),(278,'删除内容',206,0,'wenku/setstatus',1,'','文库管理',0),(279,'创建试卷->题目设置',214,0,'Examination/selectquestion',1,'','在线考试',0),(280,'创建试卷->题目设置->左侧',214,0,'Examination/selectquestionleft',1,'','在线考试',0),(281,'创建试卷->题目设置->右侧',214,0,'Examination/selectquestionright',1,'','在线考试',0),(282,'添加单选题',216,0,'Examination/edittopic_single_choice',1,'','题库管理',0),(283,'添加多选题',216,0,'Examination/editTopic_choice',1,'','题库管理',0),(284,'添加填空题',216,0,'Examination/editTopic_fill',1,'','题库管理',0),(285,'添加判断题',216,0,'Examination/editTopic_determine',1,'','题库管理',0),(286,'添加问答题',216,0,'Examination/editTopic_essay',1,'','题库管理',0),(287,'添加材料题',216,0,'Examination/editTopic_material',1,'','题库管理',0),(288,'题库删除',216,0,'Examination/removeTopic',1,'','题库管理',0),(289,'编辑题库',216,0,'Examination/editTopic',1,'','题库管理',0),(290,'预览题库',216,0,'Examination/previewTopic',1,'','题库管理',0),(291,'管理材料题库',216,0,'Examination/subtopicsList',1,'','题库管理',0),(292,'设置试题状态',216,0,'Examination/setstatusquestion',1,'','题库管理',0),(293,'删除试卷',217,0,'Examination/removeTestpaper',1,'','试卷管理',0),(294,'上传文件',182,0,'builderfile/upload',1,'','点播管理',0),(295,'编辑器上传文件',182,0,'addons/execute',1,'','点播管理',0);
/*!40000 ALTER TABLE `onethink_menu` ENABLE KEYS */;

#
# Structure for table "onethink_message"
#

DROP TABLE IF EXISTS `onethink_message`;
CREATE TABLE `onethink_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_uid` int(11) NOT NULL,
  `to_uid` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `create_time` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL COMMENT '0系统消息,1用户消息,2应用消息',
  `is_read` tinyint(4) NOT NULL,
  `last_toast` int(11) NOT NULL,
  `url` varchar(400) NOT NULL,
  `talk_id` int(11) NOT NULL,
  `appname` varchar(30) NOT NULL,
  `apptype` varchar(30) NOT NULL,
  `source_id` int(11) NOT NULL,
  `find_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=336 DEFAULT CHARSET=utf8 COMMENT='thinkox新增消息表';

#
# Data for table "onethink_message"
#

/*!40000 ALTER TABLE `onethink_message` DISABLE KEYS */;
INSERT INTO `onethink_message` VALUES (322,0,1,'游客评论了您','评论内容：[geili][ma]',1420131963,0,1,1423547771,'http://127.0.0.1/thinkox/index.php?s=/event/index/detail/id/9.html',0,'Event','',0,0,0),(323,0,1,'游客评论了您','评论内容：sdvsdv',1428754376,0,0,0,'http://127.0.0.1/edu/index.php?s=/news/index/detail/id/9.html',0,'News','',0,0,0),(324,0,9,'游客评论了您','评论内容：sdvsdvs',1428755184,0,0,0,'http://127.0.0.1/edu/index.php?s=/news/index/detail/id/9.html',0,'News','',0,0,0),(325,0,1,'游客评论了您','评论内容：hahaha',1428769599,0,0,0,'http://127.0.0.1/edu/index.php?s=/live/index/detail/id/3.html',0,'Live','',0,0,0),(326,0,1,'游客评论了您','评论内容：ddddddddddddd',1428770469,0,0,0,'http://127.0.0.1/edu/index.php?s=/wenku/index/detail/id/2.html',0,'Wenku','',0,0,0),(327,0,1,'游客评论了您','评论内容：[geili]',1429448937,0,0,0,'http://127.0.0.1/edu/index.php?s=/news/index/detail/id/10.html',0,'News','',0,0,0),(328,0,1,'游客评论了您','评论内容：[meng][dajiao][dangao]',1429457594,0,0,0,'http://127.0.0.1/edu/index.php?s=/news/index/detail/id/2.html',0,'News','',0,0,0),(329,0,1,'游客评论了您','评论内容：qwwwwwwwwwww',1430584468,0,0,0,'http://127.0.0.1/edu/index.php?s=/download/index/detail/id/1.html',0,'Download','',0,0,0),(330,0,1,'游客评论了您','评论内容：wwwwwwwwwwww',1430584482,0,0,0,'http://127.0.0.1/edu/index.php?s=/news/index/detail/id/10.html',0,'News','',0,0,0),(331,2,1,'lrwqq评论了您','评论内容：[chong]',1431249525,0,0,0,'http://127.0.0.1/edu/index.php?s=/news/index/detail/id/22.html',0,'News','',0,0,0),(332,0,1,'游客评论了您','评论内容：[gangga]',1523866133,0,0,0,'http://127.0.0.1/index.php?s=/news/index/detail/id/10.html',0,'News','',0,0,0),(333,0,1,'游客评论了您','评论内容：[geili]',1530874392,0,0,0,'http://edu.mingtianjian.net/index.php?s=/live/index/detail/id/19.html',0,'Live','',0,0,0),(334,2,1,'lrwqq评论了您','评论内容：[cahan][danu][geili]',1532334189,0,0,0,'http://www.zaixianjiaoxue.net/index.php?s=/news/index/detail/id/9.html',0,'News','',0,0,0),(335,2,1,'lrwqq评论了您','评论内容：[bizui][ciya][da][dabian][dabing][dajiao]',1532334217,0,0,0,'http://www.zaixianjiaoxue.net/index.php?s=/news/index/detail/id/9/page/1.html',0,'News','',0,0,0);
/*!40000 ALTER TABLE `onethink_message` ENABLE KEYS */;

#
# Structure for table "onethink_message_old"
#

DROP TABLE IF EXISTS `onethink_message_old`;
CREATE TABLE `onethink_message_old` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(25) NOT NULL COMMENT '标题',
  `image` int(11) NOT NULL,
  `content` varchar(1000) NOT NULL COMMENT '内容',
  `companyid` int(11) NOT NULL,
  `changetime` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '状态，-1：删除；0：禁用；1：启用；2：未审核',
  `createtime` int(11) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='系统消息';

#
# Data for table "onethink_message_old"
#

/*!40000 ALTER TABLE `onethink_message_old` DISABLE KEYS */;
INSERT INTO `onethink_message_old` VALUES (2,'落马官员频现休假式服刑 800余人被重新收监',0,'落马官员频现休假式服刑 800余人被重新收监落马官员频现休假式服刑 800余人被重新收监落马官员频现休假式服刑 800余人被重新收监',0,1262282673,0,1262282590),(3,'7旬大爷嫌公交停太远 向司机丢文革时期榴弹',0,'7旬大爷嫌公交停太远 向司机丢文革时期榴弹7旬大爷嫌公交停太远 向司机丢文革时期榴弹7旬大爷嫌公交停太远 向司机丢文革时期榴弹7旬大爷嫌公交停太远 向司机丢文革时期榴弹7旬大爷嫌公交停太远 向司机丢文革时期榴弹',0,1262282686,1,1262282686),(4,'水利所12人私分800万 副所长:不清楚没参与我没',0,'水利所12人私分800万 副所长:不清楚没参与我没管水利所12人私分800万 副所长:不清楚没参与我没管水利所12人私分800万 副所长:不清楚没参与我没管水利所12人私分800万 副所长:不清楚没参与我没管水利所12人私分800万 副所长:不清楚没参与我没管',0,1262282697,1,1262282697),(5,'东莞两工人争抢女友 一人被匕首刺穿脑袋',0,'东莞两工人争抢女友 一人被匕首刺穿脑袋东莞两工人争抢女友 一人被匕首刺穿脑袋东莞两工人争抢女友 一人被匕首刺穿脑袋东莞两工人争抢女友 一人被匕首刺穿脑袋东莞两工人争抢女友 一人被匕首刺穿脑袋东莞两工人争抢女友 一人被匕首刺穿脑袋东莞两工人争抢女友 一人被匕首刺穿脑袋东莞两工人争抢女友 一人被匕首刺穿脑袋',0,1262282709,1,1262282709),(6,'网传温州乞丐甩万元买iPhone6 店员:钱不够没',0,'网传温州乞丐甩万元买iPhone6 店员:钱不够没买网传温州乞丐甩万元买iPhone6 店员:钱不够没买网传温州乞丐甩万元买iPhone6 店员:钱不够没买网传温州乞丐甩万元买iPhone6 店员:钱不够没买网传温州乞丐甩万元买iPhone6 店员:钱不够没买网传温州乞丐甩万元买iPhone6 店员:钱不够没买网传温州乞丐甩万元买iPhone6 店员:钱不够没买网传温州乞丐甩万元买iPhone6 店员:钱不够没买',0,1262282721,1,1262282721),(7,'浙江现最“壕”车库 豪车云集堪比车展',0,'浙江现最“壕”车库 豪车云集堪比车展浙江现最“壕”车库 豪车云集堪比车展浙江现最“壕”车库 豪车云集堪比车展浙江现最“壕”车库 豪车云集堪比车展浙江现最“壕”车库 豪车云集堪比车展浙江现最“壕”车库 豪车云集堪比车展浙江现最“壕”车库 豪车云集堪比车展浙江现最“壕”车库 豪车云集堪比车展浙江现最“壕”车库 豪车云集堪比车展浙江现最“壕”车库 豪车云集堪比车展',0,1262282734,1,1262282734),(8,'王菲分享自拍视频 窦靖童李嫣罕见一同曝光',0,'王菲分享自拍视频 窦靖童李嫣罕见一同曝光王菲分享自拍视频 窦靖童李嫣罕见一同曝光王菲分享自拍视频 窦靖童李嫣罕见一同曝光王菲分享自拍视频 窦靖童李嫣罕见一同曝光王菲分享自拍视频 窦靖童李嫣罕见一同曝光王菲分享自拍视频 窦靖童李嫣罕见一同曝光王菲分享自拍视频 窦靖童李嫣罕见一同曝光王菲分享自拍视频 窦靖童李嫣罕见一同曝光王菲分享自拍视频 窦靖童李嫣罕见一同曝光王菲分享自拍视频 窦靖童李嫣罕见一同曝光王菲分享自拍视频 窦靖童李嫣罕见一同曝光',0,1262282753,1,1262282753),(9,'123456',0,'34r34r3',0,1421082856,-1,1421082856),(10,'34r34r',0,'34r34r34r',0,1421082907,-1,1421082907),(11,'wef',0,'wefwef',0,1421083032,-1,1421083032),(12,'wefwefw',0,'fwefwefwef',0,1421083126,-1,1421083126),(13,'wf',0,'wefwefw',0,1421083158,-1,1421083158),(14,'11',7,'EWFWEFW',0,1422328696,1,1422328696);
/*!40000 ALTER TABLE `onethink_message_old` ENABLE KEYS */;

#
# Structure for table "onethink_model"
#

DROP TABLE IF EXISTS `onethink_model`;
CREATE TABLE `onethink_model` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '模型ID',
  `name` char(30) NOT NULL DEFAULT '' COMMENT '模型标识',
  `title` char(30) NOT NULL DEFAULT '' COMMENT '模型名称',
  `extend` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '继承的模型',
  `relation` varchar(30) NOT NULL DEFAULT '' COMMENT '继承与被继承模型的关联字段',
  `need_pk` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '新建表时是否需要主键字段',
  `field_sort` text NOT NULL COMMENT '表单字段排序',
  `field_group` varchar(255) NOT NULL DEFAULT '1:基础' COMMENT '字段分组',
  `attribute_list` text NOT NULL COMMENT '属性列表（表的字段）',
  `template_list` varchar(100) NOT NULL DEFAULT '' COMMENT '列表模板',
  `template_add` varchar(100) NOT NULL DEFAULT '' COMMENT '新增模板',
  `template_edit` varchar(100) NOT NULL DEFAULT '' COMMENT '编辑模板',
  `list_grid` text NOT NULL COMMENT '列表定义',
  `list_row` smallint(2) unsigned NOT NULL DEFAULT '10' COMMENT '列表数据长度',
  `search_key` varchar(50) NOT NULL DEFAULT '' COMMENT '默认搜索字段',
  `search_list` varchar(255) NOT NULL DEFAULT '' COMMENT '高级搜索的字段',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '状态',
  `engine_type` varchar(25) NOT NULL DEFAULT 'MyISAM' COMMENT '数据库引擎',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='文档模型表';

#
# Data for table "onethink_model"
#

/*!40000 ALTER TABLE `onethink_model` DISABLE KEYS */;
INSERT INTO `onethink_model` VALUES (1,'document','基础文档',0,'',1,'{\"1\":[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"12\",\"13\",\"14\",\"15\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\"]}','1:基础','','','','','id:编号\r\ntitle:标题:article/index?cate_id=[category_id]&pid=[id]\r\ntype|get_document_type:类型\r\nlevel:优先级\r\nupdate_time|time_format:最后更新\r\nstatus_text:状态\r\nview:浏览\r\nid:操作:[EDIT]&cate_id=[category_id]|编辑,article/setstatus?status=-1&ids=[id]|删除',0,'','',1383891233,1384507827,1,'MyISAM'),(2,'article','文章',1,'',1,'{\"1\":[\"3\",\"24\",\"2\",\"5\"],\"2\":[\"9\",\"13\",\"19\",\"10\",\"12\",\"16\",\"17\",\"26\",\"20\",\"14\",\"11\",\"25\"]}','1:基础,2:扩展','','','','','id:编号\r\ntitle:标题:article/edit?cate_id=[category_id]&id=[id]\r\ncontent:内容',0,'','',1383891243,1387260622,1,'MyISAM'),(3,'download','下载',1,'',1,'{\"1\":[\"3\",\"28\",\"30\",\"32\",\"2\",\"5\",\"31\"],\"2\":[\"13\",\"10\",\"27\",\"9\",\"12\",\"16\",\"17\",\"19\",\"11\",\"20\",\"14\",\"29\"]}','1:基础,2:扩展','','','','','id:编号\r\ntitle:标题',0,'','',1383891252,1387260449,1,'MyISAM');
/*!40000 ALTER TABLE `onethink_model` ENABLE KEYS */;

#
# Structure for table "onethink_module"
#

DROP TABLE IF EXISTS `onethink_module`;
CREATE TABLE `onethink_module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL COMMENT '模块名',
  `alias` varchar(30) NOT NULL COMMENT '中文名',
  `version` varchar(20) NOT NULL COMMENT '版本号',
  `is_com` tinyint(4) NOT NULL COMMENT '是否商业版',
  `show_nav` tinyint(4) NOT NULL COMMENT '是否显示在导航栏中',
  `summary` varchar(200) NOT NULL COMMENT '简介',
  `developer` varchar(50) NOT NULL COMMENT '开发者',
  `website` varchar(200) NOT NULL COMMENT '网址',
  `entry` varchar(50) NOT NULL COMMENT '前台入口',
  `is_setup` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否已安装',
  `sort` int(11) NOT NULL COMMENT '模块排序',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `name_2` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COMMENT='模块管理表';

#
# Data for table "onethink_module"
#

/*!40000 ALTER TABLE `onethink_module` DISABLE KEYS */;
INSERT INTO `onethink_module` VALUES (21,'Blog','资讯','1.0.0',0,1,'原OneThink的内容模块，ThinkOX实现了前台界面，传统的CMS模块','上海顶想信息科技有限公司','http://www.topthink.net/','Blog/index/index',1,0),(22,'Event','活动','1.0.0',0,1,'活动模块，用户可以发起活动','嘉兴想天信息科技有限公司','http://www.ourstu.com','Event/index/index',1,0),(23,'Forum','论坛','1.0.0',0,1,'论坛模块，比较简单的论坛模块','嘉兴想天信息科技有限公司','http://www.ourstu.com','Forum/index/index',1,0),(24,'Group','群组','1.0.0',0,1,'群组模块，允许用户建立自己的圈子','嘉兴想天信息科技有限公司','http://www.ourstu.com','Group/index/index',1,0),(25,'Home','网站主页模块','1.0.0',0,1,'首页模块，主要用于展示网站内容','嘉兴想天信息科技有限公司','http://www.ourstu.com','Home/index/index',1,0),(26,'Issue','专辑','1.0.0',0,1,'专辑模块，适用于精品内容展示','嘉兴想天信息科技有限公司','http://www.ourstu.com','Issue/index/index',1,0),(27,'People','会员展示','1.0.0',0,1,'会员展示模块，可以用于会员的查找','嘉兴想天信息科技有限公司','http://www.ourstu.com','People/index/index',1,0),(28,'Shop','积分商城','1.0.0',0,1,'积分商城模块，用户可以使用积分兑换商品','嘉兴想天信息科技有限公司','http://www.ourstu.com','Shop/index/index',1,0),(29,'Weibo','微博','1.0.0',0,1,'微博模块，用户可以发布微博','嘉兴想天信息科技有限公司','http://www.ourstu.com','Weibo/index/index',1,0),(30,'Notice','通知公告','1.0.0',0,1,'通知公告','','','Notice/index/index',1,0),(31,'Examination','在线考试','1.0.0',0,1,'在线考试，用户可以参与考试','上海闪尖软件公司','http://www.51shanjian.com','Examination/index/index',1,0),(32,'Product','通知公告','1.0.0',0,1,'通知公告','','','Product/index/index',1,0);
/*!40000 ALTER TABLE `onethink_module` ENABLE KEYS */;

#
# Structure for table "onethink_news"
#

DROP TABLE IF EXISTS `onethink_news`;
CREATE TABLE `onethink_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '标题',
  `image` int(11) NOT NULL COMMENT '图片',
  `video` int(11) NOT NULL COMMENT '视频',
  `categoryid` varchar(20) NOT NULL DEFAULT '0' COMMENT '分类',
  `content` text NOT NULL COMMENT '内容',
  `companyid` int(11) NOT NULL,
  `changetime` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '状态，-1：删除；0：禁用；1：启用；2：未审核',
  `createtime` int(11) NOT NULL COMMENT '创建时间',
  `category` int(11) NOT NULL COMMENT '分类',
  `view` int(10) unsigned NOT NULL DEFAULT '0',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COMMENT='资讯管理';

#
# Data for table "onethink_news"
#

/*!40000 ALTER TABLE `onethink_news` DISABLE KEYS */;
INSERT INTO `onethink_news` VALUES (2,'少儿英语学习网站Top10，赶紧收藏！',153,0,'9','<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t少儿英语学习的启蒙需要大量的信息积累和听说读写的同步练习，同时还要培养儿童学英语的学习兴趣。少儿英语学习网站则是初学英语非常适合的途径，可以阅读权威的知识和最新的资讯，少儿英语学习网上图文并茂的故事也是少儿英语学习最好的素材。今天小编整理了国外英语在线学习网站TOP10，这些网站都比较专业，专为少儿英语学习打造。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;text-align:center;\">\r\n\t<img src=\"http://5b0988e595225.cdn.sohucs.com/images/20180509/d46c0a41af5e49c495e9ac5b05f8bf7f.jpeg\" style=\"height:auto;\" /> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\tTop10：pbskids.org\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\tPBS是美国电视网的一个儿童类节目网站，不带任何商业性质，画面色彩丰富，充满童趣，内容涵盖各种儿童小游戏、父母育儿指南等，适合2-12岁的儿童。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\tTop9：www.funbrain.com\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t这个网站上有一百多种可以和孩子互动的游戏，让孩子在游戏过程\r\n</p>',0,1535281342,1,1420130354,0,356,6),(3,'心理学家17年积累1000个案例:什么决定孩子的学',154,0,'8','<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span>给孩子受益终身的人文底色</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<img src=\"http://5b0988e595225.cdn.sohucs.com/images/20180509/aa78e3101f9e49c7b0e7035fea61f8d1.jpeg\" style=\"height:auto;\" />\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span>本文转载自公众号“小多童书”（ID:xiaoduoui）</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t什么决定了孩子的学习成绩？\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t智商吗？刷题吗？还是过来人常常教诲的，“在小学养成良好的学习习惯”？\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span>今天我们推送的文章，探讨的就是怎样让孩子在小学阶段养成受益终身的学习习惯。作者谢刚，北师大教育心理学硕士，美国天普大学心理学博士，现在美国加州从事校园心理工作，有着丰富的一线工作经验。</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t她认为，智商高，并不一定代表着学习好。孩子的个性特点、学习态度和时间管理等行为习惯才是影响学习效果的软件。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span>文 | 谢刚</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t我在美国加州从事学校心理学工作，主要负责教育心理的测评、诊断和咨询工作。在工作十七年中的1000多案例里面，大于85%的都是由于各种不同的原因而造成的学习问题。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t所以，非常荣幸今天有机会跟大家分享工作中的观察，<span style=\"font-weight:700;\">探讨一下怎么样让孩子在小学阶段养成受益终身的学习习惯。</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">1</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span><span style=\"font-weight:700;\">智商高，并不代表学习好</span></span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t我们做学校心理学工作的，第一步都是做测评。当孩子在学习上有任何问题的时候，我们第一个工具是智商测试。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t所以，当初在刚开始工作的时候，我以为找到了预测学习的最简洁的途径。因为通过两个小时的智商测试，我可以把孩子的能力，哪个地方弱，哪个地方强，全部清晰地给家长列出来。可是，很快我就发现，<span style=\"font-weight:700;\">很多孩子在智力上没有任何问题，在班里却有各种学习的问题。</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t举个例子来说，2001年我业余时间帮一家心理公司做智商的研究，碰到一个七岁的聪慧过人的小姑娘，一对一的智商测试结果高达140以上，也就是说一百个同龄孩子里面不到一个孩子会出现这么高的分数。父母提到她在二年级的班上常被老师批评不专心。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t我立刻断言：“她肯定什么都懂，老师讲的东西对她没有吸引力。智商这么高，跳级啊！”\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t结果，父母兴奋地找到学校时，碰了一鼻子灰：“跳什么跳？二年级要做的功课还在规定的时间内完不成呢，转到三年级肯定跟不上！”\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t现在想想当时<span style=\"font-weight:700;\">对智商的盲目崇拜</span>，真的很惭愧。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<img src=\"http://5b0988e595225.cdn.sohucs.com/images/20180509/3e007eae6b5b4c51b3646dd8f973dbac.jpeg\" style=\"height:auto;\" />\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t后来我越来越发现，智力会帮助学习，但对学习的结果而言，智商只是一个因素。学习的硬件，比如记忆力，理解力，词汇量，推理能力，信息处理速度等，其效果容易看得到；但<span style=\"font-weight:700;\">无形的软件，影响着硬件能发挥到什么程度。</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t教育心理学在过去五六十年，一直在研究到底<span style=\"font-weight:700;\">是什么因素，对学习有最强的影响力？</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t这里面，当然有许多潜在因素都在发挥影响，但<span style=\"font-weight:700;\">我根据自己的观察，总结了最重要的三点：</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span><span style=\"font-weight:700;\">一是孩子的个性特点；</span></span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span><span style=\"font-weight:700;\">二是学习态度；</span></span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span><span style=\"font-weight:700;\">三是时间管理等行为习惯。</span></span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<img src=\"http://5b0988e595225.cdn.sohucs.com/images/20180509/e243fbeaa62541d9b82da096bf0b390e.png\" style=\"height:auto;\" />\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">你知道吗？</span>\r\n</p>\r\n<ol style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<li>\r\n\t\t智商高，不代表学习好。\r\n\t</li>\r\n\t<li>\r\n\t\t学习的硬件，比如记忆力，理解力，其效果容易看得到；但良好的习惯就好像无形的软件，影响着硬件能发挥到什么程度。\r\n\t</li>\r\n</ol>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">2</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">摸准孩子的个性，</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">系统提升专注力</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t有些家长告诉我，孩子在六七岁时，已经开始出现厌学的现象了，这是非常不正常的。<span style=\"font-weight:700;\">这个阶段是孩子的求知欲、好奇心最强的时候，如果出现厌学，那一定是学习的内容，跟孩子的学习能力特点，有很大的差距。</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t传统的教育模式比较强调听力理解和处理能力，但很多孩子需要其他的学习方式。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span><span style=\"font-weight:700;\">美国教育心理学的研究发现，擅长用听力来学习的人（Auditory Learners）大概占整个人口的30%。65%左右的人，天生需要一些视觉的帮助。</span></span>比如说，学地理需要画个图像，才能记得更清楚，学历史时需要画一个time line，通过视觉来帮助记忆。还有大约5%的人需要通过触觉来学习，需要动手做才能达到最好的学习效果。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t经过这17年的观察，我发现，<span style=\"font-weight:700;\">孩子确实各有不同的能力特点，和对传统教育的要求，这与父母的期待常常不吻合，就需要父母在养育过程中多观察和接纳孩子。</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">教育是要以长取胜而不是以短取败，</span>花很大心力去教，不如用心去观察，先找到孩子的特点在哪里。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t很多家长可能看过下面这个学习的金字塔。这个金字塔告诉大家：\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">讲座这种形式的学习，不到10%的孩子会吸收的比较快；</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">50%以上的孩子会在与别人讨论的过程中吸收理解的比较快</span>；\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">90%的孩子，在重复教给别人的过程中他会吸收理解的最好。</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<img src=\"http://5b0988e595225.cdn.sohucs.com/images/20180509/be2b2fff2c2244609f82a6786108f932.jpeg\" style=\"height:auto;\" />\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t因此，对于刚上学的孩子，可以在家里准备一块白板，鼓励他们当老师，把课堂上学到的知识教给家人，不但提高学习的乐趣，同时还加强了理解。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t有一点要特别提一下，<span style=\"font-weight:700;\">对学习影响特别大的一个因素，就是专注力——这是孩子天生的气质特点。</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">电子产品对注意力的影响是非常大的。</span>在美国有一个研究，对2600个孩子进行跟踪调查研究，发现<span style=\"font-weight:700;\">他们在2岁时在电子产品上花费的时间，对7岁时的自控力、条理能力都有负面的影响。</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<img src=\"http://5b0988e595225.cdn.sohucs.com/images/20180509/87624f5160e845a5a10040bf97e2541b.jpeg\" style=\"height:auto;\" />\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t那孩子如果天生能专注的时间就比较短，该怎么办？在这里提醒大家七点：\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">1、每天按时休息、保证有规律的睡眠。</span>睡眠的状态会直接影响到孩子的专注力。像学龄儿童一定要保证9-10个小时的睡觉。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">2、减少周围分心的事物，保持一致的学习环境。</span>比如说，在家里一定要有固定的学习桌子，每天做作业要在这个桌子上，桌子上尽量减少别的东西。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">3、有意识地培养孩子的观察力。</span>“你今天去姥姥家有没有发现姥姥家的家具有什么不一样吗？”“你有没有看到妈妈发型、衣服等，今天有什么不一样的地方吗？”提醒孩子观察周围的事情，会无形中提高他的专注力。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">4、预习和复习，了解一些内容，更容易跟得上老师的讲解。</span>尤其是小学高年级的孩子。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">5、教学方式多样化。</span>如果孩子坐不住的话，可以把作业分成几个部分，比如说，今天有四页作业，那我们就可以分成四个部分，我们先做一页。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">6、利用一些工具来帮助孩子。</span>如果孩子只能坐下来5分钟，那我们就定6分钟的计时器，等计时器叮的一响的时候，孩子就可以停下来休息一下喝点水，休息一下再回来，慢慢来延长这个计时器的时间。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">7、学习内容本身。</span><span style=\"font-weight:700;\">太容易或者太难都不利于专注力，都会影响学习，最佳的状态就是孩子稍微努力一下就可以达到的程度。</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t比如阅读，<span style=\"font-weight:700;\">能够独立阅读的，是100个字里面有94个字，孩子能够准确地读出来。</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t当孩子在学习上有困难的时候，我们的测评第一个就是要测一下孩子在阅读、数学和写作达到了什么程度，那现在的作业要求是不是太难？很多时候这是造成孩子厌学、不良的学习习惯的原因。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span><span style=\"font-weight:700;\">你知道吗？</span></span>\r\n</p>\r\n<ol style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<li>\r\n\t\t讲座这种形式的学习，不到10%的孩子会吸收的比较快； 50%以上的孩子会在与别人讨论的过程中吸收理解的比较快； 90%的孩子，在重复教给别人的过程中他会吸收理解的最好。\r\n\t</li>\r\n\t<li>\r\n\t\t孩子2岁时在电子产品上花费的时间，对7岁时的自控力、条理能力都有负面的影响。\r\n\t</li>\r\n</ol>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t3\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">最害怕孩子没有求知欲</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t我们今天要重点讲的，就是学习的态度，也就是求知欲。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span><span style=\"font-weight:700;\">孩子为什么喜欢学习？</span></span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t我观察了很多喜欢学习的孩子，都是因为<span style=\"font-weight:700;\"><span>学习的过程给她带来了成就感，</span>而且<span>在学习中，与家长和老师的互动中，加强了健康的人际关系。</span></span>如果这两个心理需要达不到，孩子则会逃避学习。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t斯坦福心理系教授凯萝·杜艾克博士（Dr. Carol Dweck）研究了35年上进心（motivation），她提出<span>：<span style=\"font-weight:700;\">父母能给孩子最好的礼物，</span></span><span style=\"font-weight:700;\">就是教给他们去热爱挑战，感兴趣去找到失误的原因，享受努力的过程，保持强烈的求知欲。</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t而<span style=\"font-weight:700;\">孩子面对困难和挫折的情绪和态度，又受什么样的“理念”左右呢？</span>一方面有基因的影响，另一方面来自环境。美国积极心理学的创始人之一马丁·塞利格曼博士（Dr. Martin Seligman）的研究表明，<span style=\"font-weight:700;\">孩子对挫折的态度，在8岁左右开始形成。其中一个重要的影响因素，就是父母对日常生活事件的因果分析。</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t如果父母对好事的解释，是长久的、概括化和个人化的，比如“你交流能力真好，我都被你说服了！”等，孩子就慢慢会形成乐观的解释方式。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t如果父母对失败的解释，是长久的、概括化和个人化的，比如“你就是记性差！”、“女孩子数学都不好！”等，孩子就慢慢会形成悲观的解释方式。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<img src=\"http://5b0988e595225.cdn.sohucs.com/images/20180509/8dfc6ed7a9554a6e8f6b12d96298eff0.jpeg\" style=\"height:auto;\" />\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t杜艾克博士做过很多关于这方面的研究。她反复把这个实验用在不同的年龄阶段，发现最后的结论都是一样的：\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">如果孩子在学习中，努力的过程，常常被肯定，常常被鼓励的话，那孩子在面对困难的任务的时候，就更愿意去尝试，愿意去付出更多的努力。</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t我自己的孩子下象棋，这个在象棋上也非常的明显。因为象棋正式的比赛，一场棋赛是六个半小时，如果孩子只是盯着要赢的结果去下的话，这六个半小时就会非常痛苦。可是孩子要是喜欢的是下棋思考过程的话，就会觉得这六个半小时很享受。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t《心态》（Mindset: The New Psychology of Success）是杜艾克博士的书，家长可以用来检查一下我们自己是不是有<span style=\"font-weight:700;\">成长的心态</span>——可通过以下三个方面来检测：\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">1、失败、被批评时是否感觉羞耻或要反击；</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">2、看到别人比自己强时是否嫉妒并失去自己前进的动力；</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">3、做自己不熟悉的事时是否有恐惧。</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t这些都可以帮助家长来调整好我们自己成长的心态，帮助孩子拥有成长的心态。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">你知道吗？</span>\r\n</p>\r\n<ol style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<li>\r\n\t\t如果父母对好事的解释，是长久的、概括化和个人化的，比如“你交流能力真好，我都被你说服了！”等，孩子就慢慢会形成乐观的解释方式。\r\n\t</li>\r\n\t<li>\r\n\t\t如果父母对失败的解释，是长久的、概括化和个人化的，比如“你就是记性差！”、“女孩子数学都不好！”等，孩子就慢慢会形成悲观的解释方式。\r\n\t</li>\r\n</ol>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t4\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">良好的行为习惯</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">让孩子学习有持续动力</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t最后一点影响学习的因素是，<span style=\"font-weight:700;\">外表可以看到的行为习惯，特别是时间的管理、责任感、条理性、自控力等，都是对学习有关键作用的软因素。</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t举个例子来说，有的家长问道：\r\n</p>\r\n<blockquote style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<p>\r\n\t\t<span>“孩子小学一年级，办事情比较拖沓，尤其是写作业，特别慢。感觉他心里压力很大，7岁的孩子，他一直在纠结不想写，不愿意写，溜号，望天，手里拿着玩具摆弄……10分钟的作业，要写一个多小时，对学习没有兴趣，该怎么办呢？而且孩子坐不住，总在动来动去，用他自己的话来说就是心里长草，静不下来。”</span>\r\n\t</p>\r\n</blockquote>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t后来我询问家长，发现，有一样事情，孩子的专注力特别高，就是乐高，除了乐高，其他什么事情都坚持不下去。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t那么，原因就呼之欲出了：从小学一年级开始，对读写的要求就比较高，听力理解也是传统的教育方式比较强调的一个技能。可是，<span style=\"font-weight:700;\">读写作业，并不能给孩子带来成就感，相反，给他带来的是种挫折感，因为他习惯触觉型、动手型的学习</span>。他在学校里，也许因为写得比较慢，完成不了作业，老师也许有一些不太积极的反馈，那孩子就更有挫折感了。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t学习本身变成了给他带来挫折感的事情，那他肯定是对学习没有兴趣，总是走神。那对于这个孩子来讲，该怎么办？\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<img src=\"http://5b0988e595225.cdn.sohucs.com/images/20180509/56cbda639b1b4f33bdc191e350763727.jpeg\" style=\"height:auto;\" />\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">首先，看看这个孩子的能力特点是什么。</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t他喜欢动手操作，喜欢乐高，那我们就从他喜欢的事情上来调动他学习的兴趣。比如说，阅读上，我们可不可以去找一些关于乐高的书？说明书也好，其他的书也好，让孩子看到后知道，阅读是自己吸收有用知识的一个途径，可以多看一些这样的课外书。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t他喜欢动手操作，那么，有没有比较侧重动手能力的教学方式？比如说，我们就告诉他，赶快把作业6点前做完，做完之后，我们好6点半去上乐高课；比如说，数学，能不能用乐高来摆计算题？\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t这些都是结合孩子的长处，来帮助孩子对学习更有兴趣的一个途径。不然的话，一个七岁的孩子，这时候就已经有这样的学习习惯，长此下去，对学习会越来越逃避。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">其次，帮助孩子养成良好的行为习惯。</span>有5个具体的建议：\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">1、给孩子一些工具。</span>举个例子，记忆方面，学习理论曾经研究过，早上刚起床的半个小时，还有晚上睡觉前的半个小时，人的记忆力会比平时多大概30%，把需要记忆的东西移到这两个时间是一个非常好的习惯。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">2、用固定的时间来做作业。</span>有的家长告诉我，这个孩子9点以后才开始做作业，一做做到12点了，拖拖拉拉，影响了睡眠。那我的问题是，为什么孩子放学的时候是3点，但9点才开始做作业呢？这就是行为的习惯没有养成。写作业一定要有固定的时间，特别是小学的时候。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">建议是，放学回到家后，先休息一下，吃点东西，做点自己喜欢做的不一样的事情。</span>因为在学校里面，大部分的学习内容都是跟阅读和数学逻辑相关的，那么调整一下，也许就是听听音乐、打打球，也许是玩一下橡皮泥，转移一下大脑活动的区域，降低疲劳。这之后我们就要养成，比如说，在吃饭以前也好，吃饭以后也好，有一个固定的地方、固定的时间做作业。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">3、学龄儿童的家规要跟孩子一起商量着完成。</span>你可以问一下孩子，你觉得我们吃饭以前是先做数学还是做阅读呢，吃饭以后我们再做另外一部分。这样就可以把作业分开，使孩子做的时间不至于特别长。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">4、对于注意力不是特别专注的孩子，能够提供一个小的奖励。</span>比如说，喜欢跟爸爸出去打球，那我们就先来做数学，数学做完之后，我们先出去跟爸爸打十分钟的球，然后回来吃饭，吃完饭我们再来做其他的作业，这个对孩子都是一个动力。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">5、要在家里养成良好的作息习惯。</span>小学的时候，晚上10点一定要开始睡觉了，如果10点前没做完作业的话，抱歉，我们要熄灯了，第二天作业做不完，成绩受影响，交不上去，要自己承担这个后果。这是个很好的学习的机会，到第二天的时候，孩子会更加用心，要把事情在10点之前做完。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">你知道吗？</span>\r\n</p>\r\n<ol style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<li>\r\n\t\t写作业一定要有固定的时间，特别是小学的时候。\r\n\t</li>\r\n\t<li>\r\n\t\t放学回到家后，先休息一下，吃点东西，做点自己喜欢做的不一样的事情。转移一下大脑活动的区域，降低疲劳。\r\n\t</li>\r\n\t<li>\r\n\t\t这之后就要养成，在吃饭以前也好，吃饭以后也好，有一个固定的地方、固定的时间做作业。\r\n\t</li>\r\n</ol>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t5\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">父母真正影响孩子的</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">是言行的记忆</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">孩子在学习上，自律能力方面，自控能力方面，时间管理方面，犯错误是非常正常的。</span>因为孩子自控力这部分大脑的发育是最晚的，要到25岁左右才能完全发育成熟，孩子预测不到自己行为的后果。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t我们如果能够正确看待孩子在学习过程中犯的一些错误的话，那我们能够更好的帮助他为将来的成长而学习，<span style=\"font-weight:700;\">我们管教的目的，就是为了起到一个教的作用，能让孩子掌握这些优良的品格和习惯，</span><span style=\"font-weight:700;\">千万不要惩罚正常但是不正确的行为</span>。比如说，他坐不住，自控能力差。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t很多事和他的天性、年龄的发展阶段也是有关系的。<span style=\"font-weight:700;\">七八岁的孩子，让他分心的事情非常多，坐不住，特别是男孩子，</span><span style=\"font-weight:700;\">这非常正常，虽然是一个不正确的行为。</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t其实，孩子跟我们在一起的18年的过程中，其中12年、13年都是在学校里度过的。最终希望孩子学到什么呢？我们真正影响孩子什么呢？就是他言行的记忆。这个记忆，包括孩子如何看待自己、如何待人接物、如何解释自己在学习中碰到的失误失败，这些都会内化成孩子性格中的一部分。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t如果在这个学习的过程中，<span style=\"font-weight:700;\">我们帮助孩子感受到和父母、老师之间的亲密的关系，感到自己受尊重，有归属感的话，孩子的上进心的基本心理需要就得到满足了，他就更愿意去实现自己的潜能。</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t如果我们同时还给孩子机会去发展自己的潜力，能够根据他的能力特点去帮助他找到获得成就感的活动，能够在学习中带来更多的成就感的话，那孩子对将来的学习就打下了一个很好的基础。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">你知道吗？</span>\r\n</p>\r\n<ol style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<li>\r\n\t\t七八岁的孩子，让他分心的事情非常多，坐不住，特别是男孩子，这非常正常，虽然是一个不正确的行为。\r\n\t</li>\r\n\t<li>\r\n\t\t帮助孩子感受到和父母、老师之间的亲密的关系，感到自己受尊重，有归属感的话，孩子上进心的基本心理需要就得到满足了，也就更愿意去实现自己的潜能。\r\n\t</li>\r\n</ol>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span>本文转载自公众号“小多童书”(ID：xiaoduoui)：小多童书，是面向未来的国际化优才成长平台。以前瞻、探究、明辨为原则，与国际顶尖的阅读和教育资源接轨，致力于同时培养青少年科学和人文素养，促进人的全面发展，为未来提供更多的可能性。</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span><span style=\"font-weight:700;\">少习若天成</span></span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span><span style=\"font-weight:700;\">中小学生该怎么学《论语》</span></span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span><span style=\"font-weight:700;\">家长怎么指导？老师如何解读</span></span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span><span style=\"font-weight:700;\">李山精讲《课本里的论语》</span></span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span><span style=\"font-weight:700;\">覆盖权威中小学教材《论语》字句</span></span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span><span style=\"font-weight:700;\">还原章节，句意串讲</span></span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span><span style=\"font-weight:700;\">结合《左传》《史记》等进行拓展</span></span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span><span style=\"font-weight:700;\">带孩子明辨是非</span></span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span><span style=\"font-weight:700;\">多闻阙疑，读通经典</span></span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span><span style=\"font-weight:700;\">25讲 158节视频课</span></span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span><span style=\"font-weight:700;\">每周更新1讲</span></span>\r\n</p>',0,1525864308,1,1420130411,0,357,5),(5,'为什么绘本故事对孩子的学习很重要',155,0,'8,9','<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t不知道大家有没有想过为什么男孩和女孩会选择特定的玩具，为什么女生想穿粉色衣服成为公主，而大部分男孩子想成为勇士和太空冒险家？其实这种现象在绘本故事的选择中也很常见。在做过的一些研究中发现故事，在儿童对文化和性别角色等方面有着强烈的影响。而不单单只是培养孩子的读写能力，绘本故事更向孩子传达了价值观和社会规范，反过来塑造了儿童对现实的看法。有很多孩子会通过绘本故事中角色的表现，来思考自己的行为举止。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t1.为什么绘本故事重要\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<img src=\"http://5b0988e595225.cdn.sohucs.com/images/20180509/0fd9959d583041ce92671bb8ad02248f.jpeg\" style=\"height:auto;\" />\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t无论是通过图画书，舞蹈，图像还是口头叙述，这些都是我们沟通的最基本的方式之一。而故事可以帮助读者理解作者及其角色的思维方式，以及他们为什么如此行事。同样绘本故事也是通过儿童的视角来发展的，因此故事可以帮助孩子培养感情，培养想象力和发散性思维。让孩子思考围绕故事产生的一系列的事件。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t2.建立跨文化视角\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<img src=\"http://5b0988e595225.cdn.sohucs.com/images/20180509/ae879bb35d7d49518ff48bece4a6456a.png\" style=\"height:auto;\" />\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t现在世界各个地方的交流非常广泛，而在这种多样性的环境下，孩子可以通过非常多的渠道来认识世界，比如通过国外的绘本故事当孩子们阅读来自世界各地的其他孩子的故事。这样可以学习一些新的观点。熟悉不同文化的民族特色。\r\n</p>',0,1525864381,1,1423148414,0,372,4),(6,'苦学不如会学，怎样才能进入高效率学习状态？',156,0,'8,9','<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">一、怎样衡量自己是否进入高效率学习状态</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span>进入高效率学习状态的人，存在以下明显感觉或特征：</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span>☑</span><span>记忆上有一种超清晰的感觉，能清楚地知道今天比以前多学了哪些新知识</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span>☑</span><span>每天的学习处在一种亢奋的状态中，遇到疑难问题如获至宝</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span>☑</span><span>解题、记忆觉得极其顺畅，学过的内容自己感觉像刻在脑海中一样</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span>☑</span><span>充满着自信，并且感觉自信心不断膨胀</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span>☑</span><span>从不低看自己，不会为学习成绩所左右，善于反思自己学习行为，并不断调节自己学习时间和学习内容，能不断吸收他人长处为自己所用</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span>☑</span><span>感觉没有什么东西可以阻挡自己的学习脚步</span><span>　</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span>☑</span><span>有相对稳定的学习计划，各学科学习普遍能得到兼顾，且学习主动性强，发现问题总期待能在最短时间内予以解决</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span>☑</span><span>做过的题目标注到位，并能采用长时记忆的方式不断循环性地复习笔记和做过的练习，不必重新梳理解题思路和构建模型</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span>☑</span><span>有主动翻看各类参考资料并进行知识对比、吸收、归纳的意识</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<img src=\"http://5b0988e595225.cdn.sohucs.com/images/20180509/339df9c82eb34abb9bcf4571e38c9c21.jpeg\" width=\"auto\" style=\"height:auto;\" />\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">二、怎样才能进入高效率学习状态</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span>要想进入高效率学习状态，一般要做到以下几点：</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">1.学习上要有明确的学习计划表</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span>拿到学校的课程表后，便能模拟课程表安排好每天课余时间学习计划表，列出每天的学习科目和学习时间段，并尽量详细地列明早晨几点到几点读什么书，中午几点到几点午睡，傍晚几点到几点体育锻练或课外阅读，晚上几点到几点各安排哪几科学习，每一科目学习上一般兼顾到学习的吸收、复习、练习、归纳、预习五大环节，连各科学习期间的休息时间以及睡觉和起床都列出来。当然，能在近一两天内挤出一些时间补上则更好。</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">2.要有保证且合理的睡眠时间</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span>有了保证且合理的睡眠时间，整个高效率学习环节才能有保证。</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span>早上尽量不要过早起床，能六点多起床就足够了。早晨能低强度锻炼十几分钟，一天精神会特别好，早读一般安排两科朗读、背诵(可侧重安排语文、英语科，其它科也可安排读一读)，尽量不要在一科朗读或背诵上花费过多的时间，否则对长时记忆不利。</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span>中午要尽量午睡40到50分钟左右，但不要睡眠过长时间，这是整个学习过程最重要但最易被学生忽视的环节。为了能放心午睡和防止午睡过头，最好在家中或租住的地方配一架闹钟来提醒自己。在家睡不着，可提早到学校，看看一会儿书，然后伏睡半个钟头(冬天伏睡要注意防着凉)。</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span>每天晚上能好好钻研三～四科，每科安排四十～六十分钟就足够了，切不可在一科上花过多的时间。晚上尽量不要超过十一半点睡觉，有些人超过时间人还未睡，头脑会越来越兴奋，以后非常难入睡，这容易影响第二天的学习。</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">3.学会放下架子向他人求教</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span>若碰到个别存疑且深入思考后还无法解决的问题时，最好当天就向同学或老师求教，尽量不要拖到第二天。如果当时没人可问，可以先在书中做个记号或书相关页面折起来做个记号。最好的做法是准备一个小小疑问记录本，记下内容，路上走时灵感一来可翻开看一看，碰到老师和同学可随时讨教。当一个人具备一种打破沙锅问到底的精神时，才可以比别人多懂得一些知识，最终远远超越别人。</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">4.力求化别人的知识为自己的知识</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span>自己有不懂的地方，向同学问清楚，自己也掌握了，就可以和同学在这一点上持平;若自己已掌握了某种方法，再将别人更加巧妙的方法学会，思路便会更加开阔，以后别人遇到一个问题无法解决时，自己却可以从多方面入手解决，思维能力和解决问题的能力便能远超别人</span><span>。</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span>所以平时做完一道题后，不妨问问其他同学，看他们有没有想出其他更加巧妙的解题思路、方法和技巧，有就尽量向他们求教。即使自己平时成绩比别人好，这时也应放下架子谦虚地向别人学习，毕竟每个人都有其长处。自己往往也能通过这种谦虚的求教而赢得别人的尊敬。</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">5.每天学会吸收一些课外知识</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span>每天力求抽一点时间看一二张含有数、理、化、语文、英语等各种内容的参考性报纸或网站些试题做。一旦方法试用熟了，别人的方法便会成为我们自己的方法。这样，解题时思路便会比别人开阔得多，思维也不易受到限制，答题心态会比别人好得多。</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span>从吸收的角度来说，每天晚上一个学科学习时间安排上要考虑方法试用时间、预习时间、某一章节练习时间、复习时间的分配，个别有超前学习意识和能力的学生还要考虑超前学习时间的分配。如实在觉得时间不够，那些有超前学习意识和能力的学生可考虑利用星期六或星期天进行超前学习，暂时不挤占当天某一学科练习或复习时间。</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">6.尽量利用参考书自学和解疑</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span>学习某一章节时，感觉不会很清楚，不要动不动就拿问题问老师，可先找一些参考书来看一看相应的章节，自然就比不看清楚得多。若还有不清楚的地方，才考虑问同学和老师。这时不要怕问同学和老师，看参考书后还有不懂的地方，往往是比较难以理解的地方，老师发现这一点也会很高兴给你解答。</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">7.学会对比和选择</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span>如有条件，尽量通过翻看几本不同的参考书，了解对某些问题的不同视角和看法，力求在某些知识的了解上比同学甚至于老师都多，这样才能在知识与能力上远远超越别人。</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">8.尽量超前学习</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span>有可求教的地方和条件，尽量争取超前学习。</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span>暑假和寒假往往有较长自由时间，这个时间是超前学习的黄金时间，是提升自己学习能力的最佳时间，大多数人都可以利用这个时间弥补自己缺漏，主攻几个学科，大致学完一些学科，为自己以后自由调节学习时间打下铺垫，全面提高自己的综合能力。最不可轻易浪费掉的时间便是这一时间。</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span>每个人都可以借助参考书自学，或向他人学习，提前学完一章或几章内容，遇到不懂的地方可暂时先记下来，以后问老师，老师看到你超前学习肯定会高兴地指点你。等老师教到相关内容时，你自然就比别人学得深、懂得也透彻一些，同时可通过对比学习弥补超前学习时出现缺漏之处。</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">9.学会发散性思维，养成良好的标注习惯</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span>解题过程中千万不要满足于得出答案，关键要清楚答案如何而来。如果无法给第二者详细解释，则意味着自己还不是真正弄清楚，完全有弄清楚的必要。</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span>一本练习册要力求发挥其十倍功效，要想办法使它变成一本参考书，变成新公式、新方法运用的实验场和解题方法的记录本。个别实在简单的题目可以只标答案，甚至可以跳过去不做，对于那些需要思考一番才能确定答案的题目要做适当的标注(即批注)。</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span>对于数、理、化等一些学科，个别选择题除标明正确答案外，要力求把每一题错的选项改成正确的选项，或指明错误原因，或标出证明性实例和反驳性实例。做一题要力求发散思维，争取用多种方法做出来。</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span>对于那些有多种解题思路和方法的题目，要将其视为最优题，尽量一题多解，写在一张白纸上再粘贴在练习册相应位置，便于复习参考。</span>\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span>这样做题目，做一题得多题，记忆深刻不说，今后解题思维也比别人开阔得多，思路不易受到限制，解决问题能力也能远胜他人。以后别人日久生疏，又得重新花时间做这道题时，而你却可以把时间投在其它知识点的深入分析和了解上，你便会远远将别人抛到后面。</span>\r\n</p>',0,1525864506,1,1423148461,0,327,3),(9,'为每一个学生创造主动发展的无限空间',157,0,'8,9','<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t不知道大家有没有想过为什么男孩和女孩会选择特定的玩具，为什么女生想穿粉色衣服成为公主，而大部分男孩子想成为勇士和太空冒险家？其实这种现象在绘本故事的选择中也很常见。在做过的一些研究中发现故事，在儿童对文化和性别角色等方面有着强烈的影响。而不单单只是培养孩子的读写能力，绘本故事更向孩子传达了价值观和社会规范，反过来塑造了儿童对现实的看法。有很多孩子会通过绘本故事中角色的表现，来思考自己的行为举止。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t1.为什么绘本故事重要\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<img src=\"http://5b0988e595225.cdn.sohucs.com/images/20180509/0fd9959d583041ce92671bb8ad02248f.jpeg\" style=\"height:auto;\" /> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t无论是通过图画书，舞蹈，图像还是口头叙述，这些都是我们沟通的最基本的方式之一。而故事可以帮助读者理解作者及其角色的思维方式，以及他们为什么如此行事。同样绘本故事也是通过儿童的视角来发展的，因此故事可以帮助孩子培养感情，培养想象力和发散性思维。让孩子思考围绕故事产生的一系列的事件。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t2.建立跨文化视角\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<img src=\"http://5b0988e595225.cdn.sohucs.com/images/20180509/ae879bb35d7d49518ff48bece4a6456a.png\" style=\"height:auto;\" /> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t现在世界各个地方的交流非常广泛，而在这种多样性的环境下，孩子可以通过非常多的渠道来认识世界，比如通过国外的绘本故事当孩子们阅读来自世界各地的其他孩子的故事。这样可以学习一些新的观点。熟悉不同文化的民族特色。\r\n</p>',0,1525864703,1,1423149053,0,694,2),(10,'什么决定孩子的学习',169,0,'8,9','<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span>给孩子受益终身的人文底色</span> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<img src=\"http://5b0988e595225.cdn.sohucs.com/images/20180509/aa78e3101f9e49c7b0e7035fea61f8d1.jpeg\" style=\"height:auto;\" /> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span>本文转载自公众号“小多童书”（ID:xiaoduoui）</span> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t什么决定了孩子的学习成绩？\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t智商吗？刷题吗？还是过来人常常教诲的，“在小学养成良好的学习习惯”？\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span>今天我们推送的文章，探讨的就是怎样让孩子在小学阶段养成受益终身的学习习惯。作者谢刚，北师大教育心理学硕士，美国天普大学心理学博士，现在美国加州从事校园心理工作，有着丰富的一线工作经验。</span> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t她认为，智商高，并不一定代表着学习好。孩子的个性特点、学习态度和时间管理等行为习惯才是影响学习效果的软件。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span>文 | 谢刚</span> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t我在美国加州从事学校心理学工作，主要负责教育心理的测评、诊断和咨询工作。在工作十七年中的1000多案例里面，大于85%的都是由于各种不同的原因而造成的学习问题。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t所以，非常荣幸今天有机会跟大家分享工作中的观察，<span style=\"font-weight:700;\">探讨一下怎么样让孩子在小学阶段养成受益终身的学习习惯。</span> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">1</span> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span><span style=\"font-weight:700;\">智商高，并不代表学习好</span></span> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t我们做学校心理学工作的，第一步都是做测评。当孩子在学习上有任何问题的时候，我们第一个工具是智商测试。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t所以，当初在刚开始工作的时候，我以为找到了预测学习的最简洁的途径。因为通过两个小时的智商测试，我可以把孩子的能力，哪个地方弱，哪个地方强，全部清晰地给家长列出来。可是，很快我就发现，<span style=\"font-weight:700;\">很多孩子在智力上没有任何问题，在班里却有各种学习的问题。</span> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t举个例子来说，2001年我业余时间帮一家心理公司做智商的研究，碰到一个七岁的聪慧过人的小姑娘，一对一的智商测试结果高达140以上，也就是说一百个同龄孩子里面不到一个孩子会出现这么高的分数。父母提到她在二年级的班上常被老师批评不专心。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t我立刻断言：“她肯定什么都懂，老师讲的东西对她没有吸引力。智商这么高，跳级啊！”\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t结果，父母兴奋地找到学校时，碰了一鼻子灰：“跳什么跳？二年级要做的功课还在规定的时间内完不成呢，转到三年级肯定跟不上！”\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t现在想想当时<span style=\"font-weight:700;\">对智商的盲目崇拜</span>，真的很惭愧。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<img src=\"http://5b0988e595225.cdn.sohucs.com/images/20180509/3e007eae6b5b4c51b3646dd8f973dbac.jpeg\" style=\"height:auto;\" /> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t后来我越来越发现，智力会帮助学习，但对学习的结果而言，智商只是一个因素。学习的硬件，比如记忆力，理解力，词汇量，推理能力，信息处理速度等，其效果容易看得到；但<span style=\"font-weight:700;\">无形的软件，影响着硬件能发挥到什么程度。</span> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t教育心理学在过去五六十年，一直在研究到底<span style=\"font-weight:700;\">是什么因素，对学习有最强的影响力？</span> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t这里面，当然有许多潜在因素都在发挥影响，但<span style=\"font-weight:700;\">我根据自己的观察，总结了最重要的三点：</span> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span><span style=\"font-weight:700;\">一是孩子的个性特点；</span></span> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span><span style=\"font-weight:700;\">二是学习态度；</span></span> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span><span style=\"font-weight:700;\">三是时间管理等行为习惯。</span></span> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<img src=\"http://5b0988e595225.cdn.sohucs.com/images/20180509/e243fbeaa62541d9b82da096bf0b390e.png\" style=\"height:auto;\" /> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">你知道吗？</span> \r\n</p>\r\n<ol style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<li>\r\n\t\t智商高，不代表学习好。\r\n\t</li>\r\n\t<li>\r\n\t\t学习的硬件，比如记忆力，理解力，其效果容易看得到；但良好的习惯就好像无形的软件，影响着硬件能发挥到什么程度。\r\n\t</li>\r\n</ol>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">2</span> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">摸准孩子的个性，</span> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">系统提升专注力</span> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t有些家长告诉我，孩子在六七岁时，已经开始出现厌学的现象了，这是非常不正常的。<span style=\"font-weight:700;\">这个阶段是孩子的求知欲、好奇心最强的时候，如果出现厌学，那一定是学习的内容，跟孩子的学习能力特点，有很大的差距。</span> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t传统的教育模式比较强调听力理解和处理能力，但很多孩子需要其他的学习方式。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span><span style=\"font-weight:700;\">美国教育心理学的研究发现，擅长用听力来学习的人（Auditory Learners）大概占整个人口的30%。65%左右的人，天生需要一些视觉的帮助。</span></span>比如说，学地理需要画个图像，才能记得更清楚，学历史时需要画一个time line，通过视觉来帮助记忆。还有大约5%的人需要通过触觉来学习，需要动手做才能达到最好的学习效果。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t经过这17年的观察，我发现，<span style=\"font-weight:700;\">孩子确实各有不同的能力特点，和对传统教育的要求，这与父母的期待常常不吻合，就需要父母在养育过程中多观察和接纳孩子。</span> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">教育是要以长取胜而不是以短取败，</span>花很大心力去教，不如用心去观察，先找到孩子的特点在哪里。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t很多家长可能看过下面这个学习的金字塔。这个金字塔告诉大家：\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">讲座这种形式的学习，不到10%的孩子会吸收的比较快；</span> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">50%以上的孩子会在与别人讨论的过程中吸收理解的比较快</span>；\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">90%的孩子，在重复教给别人的过程中他会吸收理解的最好。</span> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<img src=\"http://5b0988e595225.cdn.sohucs.com/images/20180509/be2b2fff2c2244609f82a6786108f932.jpeg\" style=\"height:auto;\" /> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t因此，对于刚上学的孩子，可以在家里准备一块白板，鼓励他们当老师，把课堂上学到的知识教给家人，不但提高学习的乐趣，同时还加强了理解。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t有一点要特别提一下，<span style=\"font-weight:700;\">对学习影响特别大的一个因素，就是专注力——这是孩子天生的气质特点。</span> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">电子产品对注意力的影响是非常大的。</span>在美国有一个研究，对2600个孩子进行跟踪调查研究，发现<span style=\"font-weight:700;\">他们在2岁时在电子产品上花费的时间，对7岁时的自控力、条理能力都有负面的影响。</span> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<img src=\"http://5b0988e595225.cdn.sohucs.com/images/20180509/87624f5160e845a5a10040bf97e2541b.jpeg\" style=\"height:auto;\" /> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t那孩子如果天生能专注的时间就比较短，该怎么办？在这里提醒大家七点：\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">1、每天按时休息、保证有规律的睡眠。</span>睡眠的状态会直接影响到孩子的专注力。像学龄儿童一定要保证9-10个小时的睡觉。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">2、减少周围分心的事物，保持一致的学习环境。</span>比如说，在家里一定要有固定的学习桌子，每天做作业要在这个桌子上，桌子上尽量减少别的东西。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">3、有意识地培养孩子的观察力。</span>“你今天去姥姥家有没有发现姥姥家的家具有什么不一样吗？”“你有没有看到妈妈发型、衣服等，今天有什么不一样的地方吗？”提醒孩子观察周围的事情，会无形中提高他的专注力。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">4、预习和复习，了解一些内容，更容易跟得上老师的讲解。</span>尤其是小学高年级的孩子。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">5、教学方式多样化。</span>如果孩子坐不住的话，可以把作业分成几个部分，比如说，今天有四页作业，那我们就可以分成四个部分，我们先做一页。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">6、利用一些工具来帮助孩子。</span>如果孩子只能坐下来5分钟，那我们就定6分钟的计时器，等计时器叮的一响的时候，孩子就可以停下来休息一下喝点水，休息一下再回来，慢慢来延长这个计时器的时间。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">7、学习内容本身。</span><span style=\"font-weight:700;\">太容易或者太难都不利于专注力，都会影响学习，最佳的状态就是孩子稍微努力一下就可以达到的程度。</span> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t比如阅读，<span style=\"font-weight:700;\">能够独立阅读的，是100个字里面有94个字，孩子能够准确地读出来。</span> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t当孩子在学习上有困难的时候，我们的测评第一个就是要测一下孩子在阅读、数学和写作达到了什么程度，那现在的作业要求是不是太难？很多时候这是造成孩子厌学、不良的学习习惯的原因。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span><span style=\"font-weight:700;\">你知道吗？</span></span> \r\n</p>\r\n<ol style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<li>\r\n\t\t讲座这种形式的学习，不到10%的孩子会吸收的比较快； 50%以上的孩子会在与别人讨论的过程中吸收理解的比较快； 90%的孩子，在重复教给别人的过程中他会吸收理解的最好。\r\n\t</li>\r\n\t<li>\r\n\t\t孩子2岁时在电子产品上花费的时间，对7岁时的自控力、条理能力都有负面的影响。\r\n\t</li>\r\n</ol>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t3\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">最害怕孩子没有求知欲</span> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t我们今天要重点讲的，就是学习的态度，也就是求知欲。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span><span style=\"font-weight:700;\">孩子为什么喜欢学习？</span></span> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t我观察了很多喜欢学习的孩子，都是因为<span style=\"font-weight:700;\"><span>学习的过程给她带来了成就感，</span>而且<span>在学习中，与家长和老师的互动中，加强了健康的人际关系。</span></span>如果这两个心理需要达不到，孩子则会逃避学习。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t斯坦福心理系教授凯萝·杜艾克博士（Dr. Carol Dweck）研究了35年上进心（motivation），她提出<span>：<span style=\"font-weight:700;\">父母能给孩子最好的礼物，</span></span><span style=\"font-weight:700;\">就是教给他们去热爱挑战，感兴趣去找到失误的原因，享受努力的过程，保持强烈的求知欲。</span> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t而<span style=\"font-weight:700;\">孩子面对困难和挫折的情绪和态度，又受什么样的“理念”左右呢？</span>一方面有基因的影响，另一方面来自环境。美国积极心理学的创始人之一马丁·塞利格曼博士（Dr. Martin Seligman）的研究表明，<span style=\"font-weight:700;\">孩子对挫折的态度，在8岁左右开始形成。其中一个重要的影响因素，就是父母对日常生活事件的因果分析。</span> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t如果父母对好事的解释，是长久的、概括化和个人化的，比如“你交流能力真好，我都被你说服了！”等，孩子就慢慢会形成乐观的解释方式。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t如果父母对失败的解释，是长久的、概括化和个人化的，比如“你就是记性差！”、“女孩子数学都不好！”等，孩子就慢慢会形成悲观的解释方式。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<img src=\"http://5b0988e595225.cdn.sohucs.com/images/20180509/8dfc6ed7a9554a6e8f6b12d96298eff0.jpeg\" style=\"height:auto;\" /> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t杜艾克博士做过很多关于这方面的研究。她反复把这个实验用在不同的年龄阶段，发现最后的结论都是一样的：\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">如果孩子在学习中，努力的过程，常常被肯定，常常被鼓励的话，那孩子在面对困难的任务的时候，就更愿意去尝试，愿意去付出更多的努力。</span> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t我自己的孩子下象棋，这个在象棋上也非常的明显。因为象棋正式的比赛，一场棋赛是六个半小时，如果孩子只是盯着要赢的结果去下的话，这六个半小时就会非常痛苦。可是孩子要是喜欢的是下棋思考过程的话，就会觉得这六个半小时很享受。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t《心态》（Mindset: The New Psychology of Success）是杜艾克博士的书，家长可以用来检查一下我们自己是不是有<span style=\"font-weight:700;\">成长的心态</span>——可通过以下三个方面来检测：\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">1、失败、被批评时是否感觉羞耻或要反击；</span> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">2、看到别人比自己强时是否嫉妒并失去自己前进的动力；</span> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">3、做自己不熟悉的事时是否有恐惧。</span> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t这些都可以帮助家长来调整好我们自己成长的心态，帮助孩子拥有成长的心态。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">你知道吗？</span> \r\n</p>\r\n<ol style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<li>\r\n\t\t如果父母对好事的解释，是长久的、概括化和个人化的，比如“你交流能力真好，我都被你说服了！”等，孩子就慢慢会形成乐观的解释方式。\r\n\t</li>\r\n\t<li>\r\n\t\t如果父母对失败的解释，是长久的、概括化和个人化的，比如“你就是记性差！”、“女孩子数学都不好！”等，孩子就慢慢会形成悲观的解释方式。\r\n\t</li>\r\n</ol>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t4\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">良好的行为习惯</span> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">让孩子学习有持续动力</span> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t最后一点影响学习的因素是，<span style=\"font-weight:700;\">外表可以看到的行为习惯，特别是时间的管理、责任感、条理性、自控力等，都是对学习有关键作用的软因素。</span> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t举个例子来说，有的家长问道：\r\n</p>\r\n<blockquote style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<p>\r\n\t\t<span>“孩子小学一年级，办事情比较拖沓，尤其是写作业，特别慢。感觉他心里压力很大，7岁的孩子，他一直在纠结不想写，不愿意写，溜号，望天，手里拿着玩具摆弄……10分钟的作业，要写一个多小时，对学习没有兴趣，该怎么办呢？而且孩子坐不住，总在动来动去，用他自己的话来说就是心里长草，静不下来。”</span> \r\n\t</p>\r\n</blockquote>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t后来我询问家长，发现，有一样事情，孩子的专注力特别高，就是乐高，除了乐高，其他什么事情都坚持不下去。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t那么，原因就呼之欲出了：从小学一年级开始，对读写的要求就比较高，听力理解也是传统的教育方式比较强调的一个技能。可是，<span style=\"font-weight:700;\">读写作业，并不能给孩子带来成就感，相反，给他带来的是种挫折感，因为他习惯触觉型、动手型的学习</span>。他在学校里，也许因为写得比较慢，完成不了作业，老师也许有一些不太积极的反馈，那孩子就更有挫折感了。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t学习本身变成了给他带来挫折感的事情，那他肯定是对学习没有兴趣，总是走神。那对于这个孩子来讲，该怎么办？\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<img src=\"http://5b0988e595225.cdn.sohucs.com/images/20180509/56cbda639b1b4f33bdc191e350763727.jpeg\" style=\"height:auto;\" /> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">首先，看看这个孩子的能力特点是什么。</span> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t他喜欢动手操作，喜欢乐高，那我们就从他喜欢的事情上来调动他学习的兴趣。比如说，阅读上，我们可不可以去找一些关于乐高的书？说明书也好，其他的书也好，让孩子看到后知道，阅读是自己吸收有用知识的一个途径，可以多看一些这样的课外书。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t他喜欢动手操作，那么，有没有比较侧重动手能力的教学方式？比如说，我们就告诉他，赶快把作业6点前做完，做完之后，我们好6点半去上乐高课；比如说，数学，能不能用乐高来摆计算题？\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t这些都是结合孩子的长处，来帮助孩子对学习更有兴趣的一个途径。不然的话，一个七岁的孩子，这时候就已经有这样的学习习惯，长此下去，对学习会越来越逃避。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">其次，帮助孩子养成良好的行为习惯。</span>有5个具体的建议：\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">1、给孩子一些工具。</span>举个例子，记忆方面，学习理论曾经研究过，早上刚起床的半个小时，还有晚上睡觉前的半个小时，人的记忆力会比平时多大概30%，把需要记忆的东西移到这两个时间是一个非常好的习惯。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">2、用固定的时间来做作业。</span>有的家长告诉我，这个孩子9点以后才开始做作业，一做做到12点了，拖拖拉拉，影响了睡眠。那我的问题是，为什么孩子放学的时候是3点，但9点才开始做作业呢？这就是行为的习惯没有养成。写作业一定要有固定的时间，特别是小学的时候。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">建议是，放学回到家后，先休息一下，吃点东西，做点自己喜欢做的不一样的事情。</span>因为在学校里面，大部分的学习内容都是跟阅读和数学逻辑相关的，那么调整一下，也许就是听听音乐、打打球，也许是玩一下橡皮泥，转移一下大脑活动的区域，降低疲劳。这之后我们就要养成，比如说，在吃饭以前也好，吃饭以后也好，有一个固定的地方、固定的时间做作业。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">3、学龄儿童的家规要跟孩子一起商量着完成。</span>你可以问一下孩子，你觉得我们吃饭以前是先做数学还是做阅读呢，吃饭以后我们再做另外一部分。这样就可以把作业分开，使孩子做的时间不至于特别长。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">4、对于注意力不是特别专注的孩子，能够提供一个小的奖励。</span>比如说，喜欢跟爸爸出去打球，那我们就先来做数学，数学做完之后，我们先出去跟爸爸打十分钟的球，然后回来吃饭，吃完饭我们再来做其他的作业，这个对孩子都是一个动力。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">5、要在家里养成良好的作息习惯。</span>小学的时候，晚上10点一定要开始睡觉了，如果10点前没做完作业的话，抱歉，我们要熄灯了，第二天作业做不完，成绩受影响，交不上去，要自己承担这个后果。这是个很好的学习的机会，到第二天的时候，孩子会更加用心，要把事情在10点之前做完。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">你知道吗？</span> \r\n</p>\r\n<ol style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<li>\r\n\t\t写作业一定要有固定的时间，特别是小学的时候。\r\n\t</li>\r\n\t<li>\r\n\t\t放学回到家后，先休息一下，吃点东西，做点自己喜欢做的不一样的事情。转移一下大脑活动的区域，降低疲劳。\r\n\t</li>\r\n\t<li>\r\n\t\t这之后就要养成，在吃饭以前也好，吃饭以后也好，有一个固定的地方、固定的时间做作业。\r\n\t</li>\r\n</ol>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t5\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">父母真正影响孩子的</span> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">是言行的记忆</span> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">孩子在学习上，自律能力方面，自控能力方面，时间管理方面，犯错误是非常正常的。</span>因为孩子自控力这部分大脑的发育是最晚的，要到25岁左右才能完全发育成熟，孩子预测不到自己行为的后果。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t我们如果能够正确看待孩子在学习过程中犯的一些错误的话，那我们能够更好的帮助他为将来的成长而学习，<span style=\"font-weight:700;\">我们管教的目的，就是为了起到一个教的作用，能让孩子掌握这些优良的品格和习惯，</span><span style=\"font-weight:700;\">千万不要惩罚正常但是不正确的行为</span>。比如说，他坐不住，自控能力差。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t很多事和他的天性、年龄的发展阶段也是有关系的。<span style=\"font-weight:700;\">七八岁的孩子，让他分心的事情非常多，坐不住，特别是男孩子，</span><span style=\"font-weight:700;\">这非常正常，虽然是一个不正确的行为。</span> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t其实，孩子跟我们在一起的18年的过程中，其中12年、13年都是在学校里度过的。最终希望孩子学到什么呢？我们真正影响孩子什么呢？就是他言行的记忆。这个记忆，包括孩子如何看待自己、如何待人接物、如何解释自己在学习中碰到的失误失败，这些都会内化成孩子性格中的一部分。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t如果在这个学习的过程中，<span style=\"font-weight:700;\">我们帮助孩子感受到和父母、老师之间的亲密的关系，感到自己受尊重，有归属感的话，孩子的上进心的基本心理需要就得到满足了，他就更愿意去实现自己的潜能。</span> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t如果我们同时还给孩子机会去发展自己的潜力，能够根据他的能力特点去帮助他找到获得成就感的活动，能够在学习中带来更多的成就感的话，那孩子对将来的学习就打下了一个很好的基础。\r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span style=\"font-weight:700;\">你知道吗？</span> \r\n</p>\r\n<ol style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<li>\r\n\t\t七八岁的孩子，让他分心的事情非常多，坐不住，特别是男孩子，这非常正常，虽然是一个不正确的行为。\r\n\t</li>\r\n\t<li>\r\n\t\t帮助孩子感受到和父母、老师之间的亲密的关系，感到自己受尊重，有归属感的话，孩子上进心的基本心理需要就得到满足了，也就更愿意去实现自己的潜能。\r\n\t</li>\r\n</ol>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span>本文转载自公众号“小多童书”(ID：xiaoduoui)：小多童书，是面向未来的国际化优才成长平台。以前瞻、探究、明辨为原则，与国际顶尖的阅读和教育资源接轨，致力于同时培养青少年科学和人文素养，促进人的全面发展，为未来提供更多的可能性。</span> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span><span style=\"font-weight:700;\">少习若天成</span></span> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span><span style=\"font-weight:700;\">中小学生该怎么学《论语》</span></span> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span><span style=\"font-weight:700;\">家长怎么指导？老师如何解读</span></span> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span><span style=\"font-weight:700;\">李山精讲《课本里的论语》</span></span> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span><span style=\"font-weight:700;\">覆盖权威中小学教材《论语》字句</span></span> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span><span style=\"font-weight:700;\">还原章节，句意串讲</span></span> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span><span style=\"font-weight:700;\">结合《左传》《史记》等进行拓展</span></span> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span><span style=\"font-weight:700;\">带孩子明辨是非</span></span> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span><span style=\"font-weight:700;\">多闻阙疑，读通经典</span></span> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span><span style=\"font-weight:700;\">25讲 158节视频课</span></span> \r\n</p>\r\n<p style=\"font-size:16px;color:#191919;font-family:&quot;background-color:#FFFFFF;\">\r\n\t<span><span style=\"font-weight:700;\">每周更新1讲</span></span> \r\n</p>',0,1535616137,1,1428760161,0,422,1);
/*!40000 ALTER TABLE `onethink_news` ENABLE KEYS */;

#
# Structure for table "onethink_news_category"
#

DROP TABLE IF EXISTS `onethink_news_category`;
CREATE TABLE `onethink_news_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(25) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `pid` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

#
# Data for table "onethink_news_category"
#

/*!40000 ALTER TABLE `onethink_news_category` DISABLE KEYS */;
INSERT INTO `onethink_news_category` VALUES (1,'新闻',1420129756,1525621797,1,0,0),(8,'公司新闻',1525621804,1525621822,1,1,0),(9,'行业动态',1525621810,1525621822,1,1,0);
/*!40000 ALTER TABLE `onethink_news_category` ENABLE KEYS */;

#
# Structure for table "onethink_notice"
#

DROP TABLE IF EXISTS `onethink_notice`;
CREATE TABLE `onethink_notice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(25) NOT NULL COMMENT '标题',
  `image` int(11) NOT NULL,
  `content` varchar(1000) NOT NULL COMMENT '内容',
  `companyid` int(11) NOT NULL,
  `changetime` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '状态，-1：删除；0：禁用；1：启用；2：未审核',
  `createtime` int(11) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COMMENT='通知公告';

#
# Data for table "onethink_notice"
#

/*!40000 ALTER TABLE `onethink_notice` DISABLE KEYS */;
/*!40000 ALTER TABLE `onethink_notice` ENABLE KEYS */;

#
# Structure for table "onethink_openid"
#

DROP TABLE IF EXISTS `onethink_openid`;
CREATE TABLE `onethink_openid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(20) DEFAULT NULL,
  `openid` varchar(50) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "onethink_openid"
#

/*!40000 ALTER TABLE `onethink_openid` DISABLE KEYS */;
INSERT INTO `onethink_openid` VALUES (2,'52',NULL);
/*!40000 ALTER TABLE `onethink_openid` ENABLE KEYS */;

#
# Structure for table "onethink_order"
#

DROP TABLE IF EXISTS `onethink_order`;
CREATE TABLE `onethink_order` (
  `id` int(225) unsigned NOT NULL AUTO_INCREMENT COMMENT '订单id',
  `orderid` varchar(225) NOT NULL DEFAULT '',
  `tag` varchar(225) NOT NULL DEFAULT '',
  `pricetotal` decimal(50,2) NOT NULL DEFAULT '0.00',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0-系统生成完成1-用户已提交订单2在线支付完成  6订单已取消',
  `assistant` varchar(225) DEFAULT '无' COMMENT '操作人',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `uid` int(10) unsigned NOT NULL DEFAULT '0',
  `username` varchar(20) DEFAULT NULL COMMENT '用户名',
  `shipprice` decimal(50,2) NOT NULL DEFAULT '0.00',
  `display` int(10) unsigned NOT NULL DEFAULT '0',
  `isover` varchar(225) NOT NULL DEFAULT '',
  `ispay` tinyint(2) NOT NULL DEFAULT '0' COMMENT '1在线支付未完成2在线支付完成3-货到付款',
  `total` decimal(50,2) NOT NULL DEFAULT '0.00',
  `tool` varchar(225) NOT NULL DEFAULT '' COMMENT '是否默认地址',
  `addressid` int(10) unsigned NOT NULL DEFAULT '0',
  `toolid` varchar(225) NOT NULL DEFAULT '',
  `isdefault` int(10) unsigned NOT NULL DEFAULT '0',
  `info` varchar(225) NOT NULL DEFAULT '',
  `shipway` varchar(225) NOT NULL DEFAULT '' COMMENT '送货方式',
  `invoice` varchar(225) NOT NULL DEFAULT '' COMMENT '发票',
  `message` varchar(225) NOT NULL DEFAULT '' COMMENT '留言',
  `backinfo` varchar(225) NOT NULL DEFAULT '',
  `score` int(10) unsigned NOT NULL DEFAULT '0',
  `codeid` varchar(225) NOT NULL DEFAULT '',
  `codemoney` decimal(50,2) NOT NULL DEFAULT '0.00',
  `send_name` varchar(225) NOT NULL DEFAULT '',
  `send_contact` varchar(225) NOT NULL DEFAULT '',
  `send_address` varchar(225) NOT NULL DEFAULT '',
  `paymode` varchar(20) DEFAULT NULL COMMENT '支付方式 Alipay  Wxpay',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=154 DEFAULT CHARSET=utf8 COMMENT='订单表';

#
# Data for table "onethink_order"
#

/*!40000 ALTER TABLE `onethink_order` DISABLE KEYS */;
/*!40000 ALTER TABLE `onethink_order` ENABLE KEYS */;

#
# Structure for table "onethink_ordercancel"
#

DROP TABLE IF EXISTS `onethink_ordercancel`;
CREATE TABLE `onethink_ordercancel` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `goodid` int(10) unsigned NOT NULL DEFAULT '0',
  `num` int(10) unsigned NOT NULL DEFAULT '0',
  `orderid` varchar(225) NOT NULL DEFAULT '' COMMENT '订单号',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(225) NOT NULL DEFAULT '',
  `reason` varchar(225) NOT NULL DEFAULT '',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0',
  `assistant` int(10) unsigned NOT NULL DEFAULT '0',
  `shopid` int(10) unsigned NOT NULL DEFAULT '0',
  `refuse_info` varchar(225) NOT NULL DEFAULT '',
  `status` tinyint(2) NOT NULL DEFAULT '0',
  `info` varchar(225) NOT NULL DEFAULT '',
  `parameters` varchar(225) NOT NULL DEFAULT '',
  `cash` decimal(50,2) NOT NULL DEFAULT '0.00',
  `count` int(10) unsigned NOT NULL DEFAULT '0',
  `uid` int(11) unsigned DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='订单取消表';

#
# Data for table "onethink_ordercancel"
#

/*!40000 ALTER TABLE `onethink_ordercancel` DISABLE KEYS */;
/*!40000 ALTER TABLE `onethink_ordercancel` ENABLE KEYS */;

#
# Structure for table "onethink_orderlist"
#

DROP TABLE IF EXISTS `onethink_orderlist`;
CREATE TABLE `onethink_orderlist` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `MODULE_NAME` varchar(20) NOT NULL COMMENT '产品所属模块',
  `url` varchar(100) NOT NULL COMMENT '产品地址',
  `title` varchar(100) NOT NULL COMMENT '产品名称',
  `goodid` int(10) unsigned NOT NULL DEFAULT '0',
  `num` int(10) unsigned NOT NULL DEFAULT '0',
  `orderid` varchar(225) DEFAULT NULL COMMENT '订单号',
  `uid` int(10) unsigned NOT NULL DEFAULT '0',
  `username` varchar(255) DEFAULT NULL COMMENT '用户名',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '未提交订单1-表示已提交订单或已支付2-已完成3-退货4-换货',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `price` decimal(50,2) NOT NULL DEFAULT '0.00',
  `parameters` varchar(225) NOT NULL DEFAULT '' COMMENT '参数',
  `sort` varchar(225) NOT NULL DEFAULT '' COMMENT '序号',
  `iscomment` varchar(225) NOT NULL DEFAULT '',
  `total` decimal(50,2) NOT NULL DEFAULT '0.00',
  `tag` varchar(225) NOT NULL DEFAULT '' COMMENT '支付标识号',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=120 DEFAULT CHARSET=utf8;

#
# Data for table "onethink_orderlist"
#

/*!40000 ALTER TABLE `onethink_orderlist` DISABLE KEYS */;
/*!40000 ALTER TABLE `onethink_orderlist` ENABLE KEYS */;

#
# Structure for table "onethink_pay"
#

DROP TABLE IF EXISTS `onethink_pay`;
CREATE TABLE `onethink_pay` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `out_trade_no` varchar(100) NOT NULL DEFAULT '',
  `money` decimal(50,2) NOT NULL DEFAULT '0.00' COMMENT '优惠后的总金额',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '数据状态 1:已提交  2:支付成功',
  `type` int(10) NOT NULL DEFAULT '0' COMMENT '付款类型1-货到付款2-在线支付',
  `uid` int(10) NOT NULL DEFAULT '0',
  `username` varchar(255) DEFAULT NULL COMMENT '用户名',
  `total` decimal(50,2) NOT NULL DEFAULT '0.00',
  `yunfee` decimal(50,2) NOT NULL DEFAULT '0.00' COMMENT '运费',
  `ratio` decimal(50,2) NOT NULL DEFAULT '0.00' COMMENT '积分抵消金额',
  `ratioscore` int(10) NOT NULL DEFAULT '0' COMMENT '消耗积分',
  `coupon` decimal(50,2) NOT NULL DEFAULT '0.00',
  `couponcode` varchar(255) NOT NULL DEFAULT '',
  `callback` varchar(255) NOT NULL DEFAULT '0',
  `addressid` varchar(255) NOT NULL DEFAULT '0' COMMENT '地址',
  `url` varchar(255) NOT NULL DEFAULT '0',
  `param` text,
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=98 DEFAULT CHARSET=utf8 COMMENT='在线支付表';

#
# Data for table "onethink_pay"
#

/*!40000 ALTER TABLE `onethink_pay` DISABLE KEYS */;
/*!40000 ALTER TABLE `onethink_pay` ENABLE KEYS */;

#
# Structure for table "onethink_picture"
#

DROP TABLE IF EXISTS `onethink_picture`;
CREATE TABLE `onethink_picture` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id自增',
  `path` varchar(255) NOT NULL DEFAULT '' COMMENT '路径',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '图片链接',
  `md5` char(32) NOT NULL DEFAULT '' COMMENT '文件md5',
  `sha1` char(40) NOT NULL DEFAULT '' COMMENT '文件 sha1编码',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=176 DEFAULT CHARSET=utf8;

#
# Data for table "onethink_picture"
#

/*!40000 ALTER TABLE `onethink_picture` DISABLE KEYS */;
INSERT INTO `onethink_picture` VALUES (19,'/Uploads/Picture/2015-04-11/55292566cb80b.jpg','','e6a6581bdd0b5a13d6564838f00d0129','c3759295ceb9267953a91dcdb987a89b0a89fd68',1,1428759910),(20,'/Uploads/Picture/2015-04-11/552925884ea78.jpg','','c806ba7d2780080404db729b5a104122','9e5d019b3f783b07a90c838f0befc4dd2148b7cc',1,1428759944),(21,'/Uploads/Picture/2015-04-11/552925b47f63d.jpg','','6232ffb011561e01b534eb210e2c34ba','c68d59e293139ee69262fb083347f077209de770',1,1428759988),(22,'/Uploads/Picture/2015-04-11/5529264263450.jpg','','ef9e87c12dcdc6bafce593e7a2b86356','5a0101421d683cd7306e3fa9374820c1aa8c2481',1,1428760130),(23,'/Uploads/Picture/2015-04-12/552946e8770ba.jpg','','583dd5b542458a319eecf58a19bbfd00','89adc555f2704188531c7db1add83893df1a20f3',1,1428768488),(24,'/Uploads/Picture/2015-04-12/5529478782edf.jpg','','cb841061c0b169f6dded8bceba0de286','2446bd42ab796f4d48a66dbddfebc6df4bf8d688',1,1428768647),(25,'/Uploads/Picture/2015-04-15/552e684664df6.png','','d78fb97235a0e51fd272a4032c316f37','4d63fb4e6608c82dabc59d780b54aa8d55024c76',1,1429104710),(26,'/Uploads/Picture/2015-04-15/552e6c31ccde7.jpg','','a43f5a0cd4549edc10f56767aceaebf6','72754bfd38c50aad7c47f5f0c431d10298f5840b',1,1429105713),(27,'/Uploads/Picture/2015-04-15/552e6c7b495eb.jpg','','75b18b6fc18779853818047798195cfb','e49cff43633db016ccef38ecafeb26ebc9cb1582',1,1429105787),(28,'/Uploads/Picture/2015-04-15/552e6cc8b47d2.jpg','','e094e5ba431887375bd6eee3f946f74f','783b0531ea343c097341f305a78c2056567f5c5b',1,1429105864),(29,'/Uploads/Picture/2015-04-19/5533c7c18a66f.jpg','','503ff1e4d1182d1af075ec3ace37cdc7','b458a1e814a43454a3f68409669e9df31923a667',1,1429456833),(30,'/Uploads/Picture/2015-04-19/5533c829926e6.jpg','','f2f6335589cba1ecd923e78daef60e74','10771cacfe5e6824e38be19930c4f97c4476ce5c',1,1429456937),(31,'/Uploads/Picture/2015-04-19/5533c83f9a44a.jpg','','fe438b142715178cb841ca52c2a5fdaa','235a88a9ab712bd60808f82866c08a91e63f5bed',1,1429456959),(32,'/Uploads/Picture/2015-04-19/5533c8d2455cf.jpg','','7567712d11553801652d27ca2120b02f','990bb74241b3bd076f07e42727581e026fcb6b4b',1,1429457106),(33,'/Uploads/Picture/2015-04-19/5533c905f07e0.jpg','','d3fa8ded2822bdba57997c6d6ad94c42','53191cb11c9fb1d16cf801906ed838f154471b30',1,1429457157),(34,'/Uploads/Picture/2015-04-19/5533c94ee1867.jpg','','74416cc4dd7e6a3577f51968eb5794eb','b81399159380fbcef3dcf90482802ef29ad01332',1,1429457230),(35,'/Uploads/Picture/2015-04-19/5533c98a6aa59.jpg','','3010c52271cf3232b0f380af6dd226db','4049cf03ea9cd24c2b15865851c1bacf11dd94df',1,1429457290),(36,'/Uploads/Picture/2015-04-19/5533c9b9af6a0.jpg','','bb0a61c314eccf431209f06e163d7bcc','9cf4c2b011c72661d11b575c7f910436cf0fdb74',1,1429457337),(37,'/Uploads/Picture/2015-04-19/5533ca3049d49.jpg','','a0e68352b500afef13fc9cf42ce97db6','011fd492b67cfd78bf102f1a0f1686a00f08dd11',1,1429457456),(38,'/Uploads/Picture/2015-04-20/55350806ba272.jpg','','2ad71f3968794f448b851c022e9a6aa0','72d10b97645fe43a724d04b50ecd514d1f5d3fd6',1,1429538822),(39,'/Uploads/Picture/2015-04-20/5535081eabc40.jpg','','56b87b33ef5f0c1617a281dce4e780dc','eb5559459aa21ed39c1a1c5a4c59bd2090a085e4',1,1429538846),(40,'/Uploads/Picture/2015-04-20/553508548c4bf.jpg','','d8a3a52369f3a9ad9ab70ba5015e822d','3259ab2c8d33c513a69e735718b687dd175c5c98',1,1429538900),(41,'/Uploads/Picture/2015-04-20/5535087d172dc.jpg','','7ae6076dcecfb73e7c75c9a90ca4c1b9','188cded4203ad417e1cccc4d470d449113deafef',1,1429538940),(42,'/Uploads/Picture/2015-04-20/553508b75fc04.jpg','','3d5309591cde6d7c8503fa8ecd1d18f6','eeb62b5c2b224161199b1df033dea84925793033',1,1429538999),(43,'/Uploads/Picture/2015-05-12/55521ee937ecc.gif','','636e3ae8279925f2d95b359c90eda54f','94b63ef1172f815fc22713c662c7d71d3da49a7f',1,1431445225),(44,'/Uploads/Picture/2018-04-13/5ad0b31d40972.jpg','','8638be15a29181a9276e879357a9de2c','979b815240ca93334769fd8f8c9f7b293c037aa5',1,1523626781),(45,'/Uploads/Picture/2018-04-14/5ad1d3c739ae6.jpg','','a4aaf1b5b3d21013a76f27f6cf594db2','88b70d7efbbce322cbe4cf41fef4e80a65cb6e35',1,1523700679),(46,'/Uploads/Picture/2018-04-14/5ad1d87c1a331.png','','fe5192b64f47307d5ab0ab43f111ed9e','d2328211d20e93144e9feca910c885351a30c012',1,1523701884),(47,'/Uploads/Picture/2018-04-15/5ad2f48003804.jpg','','d8b12a657cb40db129d35e498d5c9337','41ae1e1b1622ac28a2f43da291a93fb029a196bb',1,1523774591),(48,'/Uploads/Picture/2018-04-15/5ad2f48eddd6a.jpg','','a55ea038fc27a860131fe2bb1e140716','ee57d6d4ec304eb98469f5523e45eb1da2d06a20',1,1523774606),(49,'/Uploads/Picture/2018-04-15/5ad2f49caf507.jpg','','2bb0779a1a1633b95de572e3a295c868','506992fa59ae75a0e7d9956a77fa0b35d40eb58a',1,1523774620),(50,'/Uploads/Picture/2018-04-15/5ad2f4a81cde6.jpg','','bb5ec3194e26b145d26e8db743fd4243','a32f6fe62f347d88d8a2c70a07f1bd2984180dd7',1,1523774632),(51,'/Uploads/Picture/2018-04-15/5ad2f921427f8.jpg','','ad22c3702f5be3ab6de49bea8801dc04','77e080a4ce9d9842e153d866ea1c7b14676ffceb',1,1523775777),(52,'/Uploads/Picture/2018-04-15/5ad2f93a866ec.jpg','','6cc2aa0a2d7ecdfd0f4592b1943cf482','67ddc8aca3a234984d962a6f9051ee6fd77d62e1',1,1523775802),(53,'/Uploads/Picture/2018-04-21/5adb3e09e3bb2.JPG','','98cc5e47fad05ac97a8d693dc2dd13b9','e7a7b4b02fa239284b4fc051caaa92e13d9a3309',1,1524317705),(54,'/Uploads/Picture/2018-04-21/5adb4256168f8.JPG','','2bee7b6d0579a428c628c143acab94e0','ae10dd16c34aa7138af634b84f3230cb71bd1d9c',1,1524318806),(55,'/Uploads/Picture/2018-04-21/5adb426a4d128.JPG','','7276af0724c305a02bd6966df582a3ad','c7288e650c5484cc9b675baf70f3b39e525d451d',1,1524318826),(56,'/Uploads/Picture/2018-04-21/5adb4280b4012.JPG','','d848a12b0353f0d597495d72d4f57bcb','26b366afa4745c4a266588c4a9178fb9f6d55b10',1,1524318848),(57,'/Uploads/Picture/2018-04-21/5adb429376dc9.JPG','','f8bbcf8b32f3c1418dfd90e2f535e815','d915d031446a2d0831e971579cdd7420c168386c',1,1524318867),(58,'/Uploads/Picture/2018-04-21/5adb454f6e5fa.JPG','','02ac28d2c15696f5eafdb9a9ba69b58e','0f95d67f63edc0f74406ac6c425cb17739fdfff0',1,1524319567),(59,'/Uploads/Picture/2018-04-21/5adb456206967.JPG','','348860e548feb8070573a7ad7560582b','9e54c29a711ad09a29d5e1b3f23453f7108764cd',1,1524319586),(60,'/Uploads/Picture/2018-04-21/5adb458a78fa0.JPG','','37f43d5fdd296812c4ebc3e2acdf14aa','59d9388927dce7d43987420c15254ca677045ef0',1,1524319626),(61,'/Uploads/Picture/2018-04-21/5adb459a58a09.JPG','','3957a7980e7aea4eb7bd642de77d025b','8d54c4e2d4dece810c65e87173fe100dfa261df1',1,1524319642),(62,'/Uploads/Picture/2018-04-21/5adb45b019bf0.JPG','','943aa48429362b905719c19c5278efce','24b2b8ea44f71b2d686a436b779df81e1961cac8',1,1524319664),(63,'/Uploads/Picture/2018-04-21/5adb45c3a33bd.JPG','','ac32bdf7aacbc26ee3b29e4177d4ebf6','2e80d11d0f6ed6d0d17783382df3f929fcbb3a84',1,1524319683),(64,'/Uploads/Picture/2018-04-21/5adb45d52eb02.JPG','','8f975e6fabca91d263271c044b144e7a','45920742a733be5736191fa68782acb499178604',1,1524319701),(65,'/Uploads/Picture/2018-04-21/5adb45ef1de32.JPG','','2478ae60b50b28a87007877849db1154','d796760808e68d05d39ff5608993186e60535492',1,1524319727),(66,'/Uploads/Picture/2018-04-21/5adb46013f39b.JPG','','c0b82f1abd77de2d04cc39c0651329d8','cc159770f16a6a6b4945e351d206fc04643fc2e5',1,1524319745),(67,'/Uploads/Picture/2018-04-21/5adb4666627c7.JPG','','45592fbc57a4d7c179e8c8043e62d688','aa33654ea1bac46f24fe2cc509eddf34a4e5c4a0',1,1524319846),(68,'/Uploads/Picture/2018-04-21/5adb46791e3cf.JPG','','6fe54afcec54bd95b03d89422824171d','7aaa8da2f23f16b8e7edf769eb6318fe794163a3',1,1524319865),(69,'/Uploads/Picture/2018-04-21/5adb468a4fdb7.JPG','','60603e6634ad0287a33374ad06434ad0','1a7cf244d7d2424de7bc3a216125a6533404e729',1,1524319882),(70,'/Uploads/Picture/2018-04-21/5adb469a6a72e.JPG','','127b93dcab10ec47eaa54ed6318bd644','fef11f9db256658f91e3bfa1c21c84d73132ee77',1,1524319898),(71,'/Uploads/Picture/2018-04-21/5adb46b6c4d0f.JPG','','7b0b75e6362b2dcf8fc3aa097fb6f18c','0073cff98dc27c95f864d82fff9eb4a384ba76bf',1,1524319926),(72,'/Uploads/Picture/2018-04-21/5adb46c9b2f76.JPG','','2a467f45c3c760d5aedd4dfe4f4bb018','3a415a8e608992ff013e95a4c1b8cf95d4b2da92',1,1524319945),(73,'/Uploads/Picture/2018-04-21/5adb46db53b21.JPG','','5513a1bb8806e4079ca9e4d077fee49e','b181bfde8b4365470b009a71c3f463fec1c4d78c',1,1524319963),(74,'/Uploads/Picture/2018-04-21/5adb46efd57fd.JPG','','c3b15944517c7b865d3f6ec127713d4b','5dd83bb773f7cb393bfb8be85e083b02b9d0d58c',1,1524319983),(75,'/Uploads/Picture/2018-04-21/5adb4703f40e6.JPG','','e00e75673e1bb62a98b4994c854ab736','a5f64e73dff1ff3a7f9dd705b8eb6b47b51bd905',1,1524320003),(76,'/Uploads/Picture/2018-04-21/5adb4715a3ef4.JPG','','2ebf9e79fe4a5baad3018d9a4e027f23','5b7c385f2c91418d91633a289bbf04e9009e91f0',1,1524320021),(77,'/Uploads/Picture/2018-04-21/5adb4726b3dcc.JPG','','f3a09f8a7aa199cef47243c0ebdf45a7','117bbe55768de7dcfbdab7f1dc0e26cceb215515',1,1524320038),(78,'/Uploads/Picture/2018-04-25/5ae02cd706db9.jpg','','1f738fe5c770d2618c2eb0a585a51d92','57b30a85c99751f42a08efe625099fe7ae423525',1,1524640983),(79,'/Uploads/Picture/2018-04-25/5ae02cfcbb223.jpg','','5fef67b1a023884104317364f5f7c274','604fbd23232109f7216220876f8995ef18f1843e',1,1524641020),(80,'/Uploads/Picture/2018-04-25/5ae02d3acbcbf.jpg','','f1f7a77e78e1d310211d46b3eac08f31','79daa9d6704f862fdb06ef02d04a434e9e4c5cc0',1,1524641082),(81,'/Uploads/Picture/2018-04-25/5ae02d4dcb3d7.jpg','','515e4e5d17fee696505651b980a9b154','6b8eadcc2791a8143a7fdeccc53b3c9794caf87b',1,1524641101),(82,'/Uploads/Picture/2018-04-25/5ae063d709b01.jpg','','0f792a9a9cf6a14c1e8d7950dcfc8430','65b131ecad0a37b77b70633f0bc4996bb7bec5c1',1,1524655063),(83,'/Uploads/Picture/2018-04-25/5ae063eb11831.jpg','','27a206b2c8f795ad5ad12e4cb8a490b8','156f346f8d51047bf96f66d9fb086da0fe202659',1,1524655083),(84,'/Uploads/Picture/2018-04-27/5ae288cb811ac.jpg','','361839d77bac9c05454a7c03d29bd690','043da167e98634e01fcb2f143bfbde9546a1eb26',1,1524795595),(85,'/Uploads/Picture/2018-04-27/5ae2902564626.jpg','','18b3024f5a258a0f32e90088d0d4a943','e150461b1975a1d4226695810f87197fb9f2f7da',1,1524797477),(86,'/Uploads/Picture/2018-04-27/5ae29034059c5.jpg','','44a67310e104b8fcf83ed80022ce9d2f','a06787268fe4d8594f134e2580c36db4b1111630',1,1524797491),(87,'/Uploads/Picture/2018-04-28/5ae43ea30e358.jpg','','66d0ada1af5756938dc1cb566efb82d8','a4a18134034fcae26997a362f83a0b9093467412',1,1524907683),(88,'/Uploads/Picture/2018-04-28/5ae43eb00be31.jpg','','71136df0e521042d851f8e73e9c03bc9','466782c5a05dbb5534b106e94d46547c46b5060c',1,1524907696),(89,'/Uploads/Picture/2018-05-02/5ae95edb6e91f.png','','d365f1391372243534f831f681272ba7','2eb775f589b0f81e72f85256c44304004db0b957',1,1525243611),(90,'/Uploads/Picture/2018-05-02/5ae95f118360a.jpg','','cbf03cb63d24bd581856972954859b23','4d3cb6b35ade64e14047b3bc02c1482746f02712',1,1525243665),(91,'/Uploads/Picture/2018-05-02/5ae95f3e7bab1.jpg','','11e0654aa4da0fa62d9b82392b10dc4c','5f0a5259f7c250b79e52a13a357d8278307ea2de',1,1525243710),(92,'/Uploads/Picture/2018-05-02/5ae95f69bee5b.png','','0c8d40fa6e47219db23166a10ff260b1','874731c0548d6c1682411253aaaa8c1e01a0d267',1,1525243753),(93,'/Uploads/Picture/2018-05-02/5ae95fac63d78.png','','1322a62d8831e515631387f4fd8c0a32','eb084adb40c382ece347504ebbfd2bf4f553284f',1,1525243820),(94,'/Uploads/Picture/2018-05-02/5ae95fd86d03e.jpg','','dc0803d8c6876554c816e7b3e7f602ab','36d11b2cb2a8bd09fec37fefacaa89287e4f7724',1,1525243864),(95,'/Uploads/Picture/2018-05-02/5ae9600dd7791.jpg','','e488300079d6f6bb4155144426516cdb','e38351f4f2e5e4f3397418b1cbb057daad85da03',1,1525243917),(96,'/Uploads/Picture/2018-05-02/5ae9603559d35.jpg','','0b01287b2b46169d5cc789a0f86c4823','42eeb593fe84d535d535d46c7101b10cdbac70f2',1,1525243957),(97,'/Uploads/Picture/2018-05-02/5ae9606808e95.jpg','','397b2b203b1c19c1081068ba4bb9aa0d','8560f7008a552f68186c1cbb91728b50f1a072a6',1,1525244007),(98,'/Uploads/Picture/2018-05-02/5ae9608f33032.jpg','','0e6ef873346ea6fd146359b7c6e09cc1','8cf46400c9c539802fa0ba2d56d74c3263c0c7f1',1,1525244047),(99,'/Uploads/Picture/2018-05-02/5ae960ba14bd9.png','','657362ab57bfc024bded03d70512120c','262d29195c2fbfb3acba4084bfddfd4c0de567c8',1,1525244090),(100,'/Uploads/Picture/2018-05-02/5ae9610be5f21.jpg','','ee7a77cfaa73f362c0e73422dc4c7705','ea32baf7c2e798b75f1bb302c38d7e58db1f48e9',1,1525244171),(101,'/Uploads/Picture/2018-05-02/5ae961783a144.jpg','','4db2fc021d9c5de15f5d289d3e977ffc','1dbf05afd7e99bda74239ccd4301894dc0a86699',1,1525244280),(102,'/Uploads/Picture/2018-05-02/5ae961aecb392.png','','bf1a0f0ade5fbdfc8060b4742267d648','3b655cc6f2ce17b23b723d8fe887e16bf9388293',1,1525244334),(103,'/Uploads/Picture/2018-05-02/5ae961e0e212d.png','','49def27613cc6c46adc564279f9b9526','2bf21874106478810f6e1abbb5f4e942158ab120',1,1525244384),(104,'/Uploads/Picture/2018-05-02/5ae9620d324c2.jpg','','ca03b1ebd76be4a8d55a319237975bc7','aa73ce74909acb3f984abf8282f0e90d0dc313bf',1,1525244429),(105,'/Uploads/Picture/2018-05-02/5ae96232d423c.jpg','','c685330e9fe7e6e3696b5bd93576621f','45bda82302df62cd4bbccacd09c459d3d4289bca',1,1525244466),(106,'/Uploads/Picture/2018-05-02/5ae962550c30d.jpg','','352c3b955462e5a7a951e813926c6096','8cc9163c9f7ff987b342fbe45b8868e3d077ac3a',1,1525244501),(107,'/Uploads/Picture/2018-05-02/5ae9638e0f1a3.png','','9754104edb790254ea53ceebdf22b6b8','9724eb24be2faca4361e1e364cfc8597269265e1',1,1525244814),(108,'/Uploads/Picture/2018-05-02/5ae963bc17564.png','','2e23a8da185af5d2556b88785ba015a4','7431187dc4d9eac7ede64e833989a0a89b1757d5',1,1525244860),(109,'/Uploads/Picture/2018-05-02/5ae963ea1c57f.jpg','','6ad6ed282ef3f5d5014da84aa0a29f5f','888f0524dc10cf7b74c93753fa2a83debc615008',1,1525244906),(110,'/Uploads/Picture/2018-05-02/5ae96414b412c.jpg','','3739bcbb0fb5bd310d1b90bf20ca3829','0dacf522a15b26e7406deb30861c45de4952a884',1,1525244948),(111,'/Uploads/Picture/2018-05-02/5ae9667080c4b.jpg','','73dd704a71c138999946fe7249b5dea1','dd0b92f89da99f1d7cab44a6b91c73b067b2baae',1,1525245552),(112,'/Uploads/Picture/2018-05-02/5ae9669c9cda0.jpg','','e5844e8493176ddf33fb3d4f2bc845a2','493ae61d46425a3ce98055d559ddcfadda4bbbf8',1,1525245596),(113,'/Uploads/Picture/2018-05-02/5ae969a54a5f0.jpg','','a65b5cf4cc8bea78b79ba07c93644784','7249afec5153a2cc1b921dc71ce27cd021b33b0b',1,1525246373),(114,'/Uploads/Picture/2018-05-02/5ae969fcc8d3a.jpg','','41f8906a266172f3b6626a3bce9d9f36','dabf660578a63644f61050c269393eb39c36b160',1,1525246460),(115,'/Uploads/Picture/2018-05-02/5ae96a20d03f1.jpg','','229434e8e80511b0d6baca0a187dbd4d','10486fb63b8f6f6aedcd899791e5f534c44a4eb0',1,1525246496),(116,'/Uploads/Picture/2018-05-02/5ae96a3ee6203.jpg','','dbe959b7de05113059d71050c7717c46','c97c017d42c12780d0218887f80b9f8fc6a6dc48',1,1525246526),(117,'/Uploads/Picture/2018-05-02/5ae96a664d47d.jpg','','36695aec25ecc2758f2e18a68403227c','8f8ceb76e5d5c012495b9b13da7e40944e193628',1,1525246566),(118,'/Uploads/Picture/2018-05-02/5ae96a8608310.jpg','','d3c863037dc4099f8420921c8a2d605f','143c322b568c39829b0cbbd677a89200a1d26100',1,1525246598),(119,'/Uploads/Picture/2018-05-02/5ae96ac7b9e3b.jpg','','dd4a53c152c88fd6039e8cd290fa26f7','31a86c26644521df0b44827360a4367f3872f57c',1,1525246663),(120,'/Uploads/Picture/2018-05-02/5ae97048d6176.jpg','','b87a6819a9eab756ff636fb7d77df378','b6f0a10079815e95bbda6d3e9b994b7d10a381fe',1,1525248072),(121,'/Uploads/Picture/2018-05-02/5ae9707297d24.png','','dc5f78585e059cacb6a880b3c7416d8f','dca7a1b0a2555650229a93e1e590f4e1fc41d4ea',1,1525248114),(122,'/Uploads/Picture/2018-05-02/5ae970ab59072.png','','99d600f20cfbf0eef90a536e02313770','5ce0271f3ee56dc3d200c3aec20d94f9e8f34093',1,1525248171),(123,'/Uploads/Picture/2018-05-02/5ae970d29fe43.jpg','','986cda500572d02b69d4612199cf6273','bb16f2c3d09e26ad9f71b56003a748ea3c2e6205',1,1525248210),(124,'/Uploads/Picture/2018-05-02/5ae970fd2c228.jpg','','76470044c1c10e783660f8645d9345b7','15d4ac643fa9c9ae0d5ce503a4c34461da12c725',1,1525248253),(125,'/Uploads/Picture/2018-05-02/5ae97155cde01.jpg','','7392f6d0bf4b57155cc65a3c348dd6eb','6d605ce97abca64ff67d7df73e1769cac1114c7a',1,1525248341),(126,'/Uploads/Picture/2018-05-02/5ae97184a71ec.jpg','','92827fcc398d939b4930b1e46f31776b','0a780a4c4e90a6209f4c5545af4037ee4fc162a5',1,1525248388),(127,'/Uploads/Picture/2018-05-02/5ae971f32fc5c.jpg','','1a62795bb54b8dbe168a9b95d4d263db','5feb711f678027b0da7a0293756fa646642acfc8',1,1525248499),(128,'/Uploads/Picture/2018-05-02/5ae972235e06a.jpg','','fd6e02cc889778fffd791572fb9e9e3d','76ac64279bee2ab1285cfb4890429365bcaf879d',1,1525248547),(129,'/Uploads/Picture/2018-05-02/5ae9724a7cd7a.jpg','','350662c49119af261a25b1fffabe7e7e','8e747d1232590f40027623bba99b5758676e905b',1,1525248586),(130,'/Uploads/Picture/2018-05-07/5aefbbb27b7b0.jpg','','60b1f2a1420bbd48eaf629eb38fca4fc','135d011895d22801eba8fd3e6723a20dc4ef7efe',1,1525660594),(131,'/Uploads/Picture/2018-05-07/5aefbc171d6cc.jpg','','56c3a200d7a5fa3c04400f61fc8075f4','dce6804c099d1bca121235a300a544f956203917',1,1525660695),(132,'/Uploads/Picture/2018-05-07/5aefbc7803313.jpg','','3a9ce44f700f9e96e8891a215b472ba8','7574f77c986fdaac0d678a8c36c1bfd0222eae72',1,1525660791),(133,'/Uploads/Picture/2018-05-07/5aefbccf2dc94.jpg','','49b7da9b5e5ec8c91d53e779ad6fe89b','1178b9e43b4b034958ee7fa0da4eea67c97b1a1f',1,1525660879),(134,'/Uploads/Picture/2018-05-07/5aefbd06a2d9d.jpg','','666f23918dcb0689f6914e21326c7fd3','8eb007d6b3b2aae678f35963294620731da09f25',1,1525660934),(135,'/Uploads/Picture/2018-05-07/5aefbd3c28ac2.jpg','','9b1dd5b7a4fca07b77ad0632eac0e8a9','3fa95ae8d10f3602505398ee59312c2576ad7cf4',1,1525660988),(136,'/Uploads/Picture/2018-05-07/5aefbd819fb6a.jpg','','e9e4d2e337c72322b5b017f01ef04611','d9e1d4e09268d31306fab6ab3e94f99a85550bf5',1,1525661057),(137,'/Uploads/Picture/2018-05-07/5aefbdd3420d9.png','','be1a50168ef8ab38aad9ce1486832d69','a147d09c52896b04c4e3fd929fcf0aaa09deef7d',1,1525661139),(138,'/Uploads/Picture/2018-05-07/5aefbe4e0cc3c.png','','48ec40e3c873ba4f4319db6c1bf6c472','c09dbca6091b5c2f974cc6cf80de26fd052442ab',1,1525661262),(139,'/Uploads/Picture/2018-05-07/5aefbee118a83.jpg','','f5c00a343f6d02bce4a19154244b8abb','bb5d959c99ed47e7f5b2c2ee65a7caf0249db0c5',1,1525661409),(140,'/Uploads/Picture/2018-05-07/5aefbf5f0d717.jpg','','857d56e8814cda3ed81b64d0e595e8ae','2bc291d4f9bc508619005cf052b57b941e213201',1,1525661535),(141,'/Uploads/Picture/2018-05-07/5aefbfa391a7e.jpg','','7b484e192f53e8fc0a96f327c4599ccc','e6018ef3a1ee4397c434848a61657dc84974e7c9',1,1525661603),(142,'/Uploads/Picture/2018-05-07/5aefc015df0a8.jpg','','f1bd6521ecf2f556dc9fe1535dce14f2','a698717fbffa2ecd84e2fd257f7f2d2de3eb4085',1,1525661717),(143,'/Uploads/Picture/2018-05-07/5aefc06aeceea.jpg','','9e0f5ab97621a584819eb93b9cd61759','4ab77ff3820aab9f9ceb0253c6a5d722cbd2bc46',1,1525661802),(144,'/Uploads/Picture/2018-05-07/5aefc0d8ddd48.jpg','','6c4f12864edb1b89c6e2f2b5c69e85bc','972490c82957700c776efc60c0c0d373b1705819',1,1525661912),(145,'/Uploads/Picture/2018-05-07/5aefc2df42c50.jpg','','feaefbca7507a7dd3116434b0482d4c3','c3d061d233b4c684f92f8c8822b98ecbb0d3897a',1,1525662431),(146,'/Uploads/Picture/2018-05-07/5aefc3db79dd3.jpg','','8f22b6fe9af20eb624807f490809c227','431fd63e750ecca7b723c83971a0b11c7cf2281e',1,1525662683),(147,'/Uploads/Picture/2018-05-07/5af0115c32be7.jpg','','ded0559f239bba9e26e7ffaf9d893386','63dcde0817a25f93e200e5c96bd1d775d5e193ff',1,1525682524),(148,'/Uploads/Picture/2018-05-07/5af0116ebf414.jpg','','cb552c77601bdde71853580c5562745d','653d47e05964ebb1bcf6ef8e1c1549f1cf8b0228',1,1525682542),(149,'/Uploads/Picture/2018-05-07/5af01244710e3.jpg','','fb01c767974b7db31fbf0c09c4aee6da','6f932bc69b0960bbcd6bd6e5435f85f963d4a8ad',1,1525682756),(150,'/Uploads/Picture/2018-05-07/5af012a991f68.jpg','','8705c92bb7bc280df90aec13b258aa4d','b88595d51c13b840e19a6149402a2eb12e95a78f',1,1525682857),(151,'/Uploads/Picture/2018-05-07/5af01312386ee.jpg','','e740b86198a9f0b9972bbada21f6a912','efd251c175bec95a68bb65db28ef18401882328c',1,1525682962),(152,'/Uploads/Picture/2018-05-07/5af0135d9a9e9.jpg','','9ec293aba54be4ff64271fc3558e9420','419c2af6e56d1ffa8c9219578158f84a7b4b1158',1,1525683037),(153,'/Uploads/Picture/2018-05-09/5af2d669915df.jpg','','ea8871b0236c942a73fd645d50eea816','158af075e3f28524fa41817d2581372efc0fd4d2',1,1525864041),(154,'/Uploads/Picture/2018-05-09/5af2d710a88a9.jpg','','2d71149b8436e455f7d1ebd276e02253','262bed2230ba987c18266bd7b70c3396ab9d98a8',1,1525864208),(155,'/Uploads/Picture/2018-05-09/5af2d7b63c344.jpg','','9fcc6c0a8ef7645482f30afb68eaa302','0ff2f1fe433402d134a06d33b771e576d8e4ac8a',1,1525864374),(156,'/Uploads/Picture/2018-05-09/5af2d82ac2744.jpg','','fc5a60f5f27f2543c8c25db86bd60e01','03238f77a474c74809b8dd52d0d677d61b950a0c',1,1525864490),(157,'/Uploads/Picture/2018-05-09/5af2d8d6446a3.jpg','','555765bb02d207ff94ec82ce51a418e3','2a765b87b1f7a4272f82cb4dbb7cbe5ad433838a',1,1525864662),(158,'/Uploads/Picture/2018-05-14/5af96a170815c.jpg','','a1f82485ca3483e1fd3d5159269cddb4','fd73ab35cb062fdc512b30d6351a343bc645f027',1,1526295062),(159,'/Uploads/Picture/2018-08-05/5b6686b9550c7.jpg','','c806d11e485ec31ff8e3de2c63769a8c','072b6d74162a9adad76a7209d9918c20790d2606',1,1533445817),(160,'/Uploads/Picture/2018-08-05/5b66d7cc523f1.png','','f7312931232d9b55cf423937cc1426b2','10b699b61faa025874b842e58b800620c97000ef',1,1533466572),(161,'/Uploads/Picture/2018-08-05/5b6713d8cbd1f.jpg','','7aeb63172817d2ccc2001cbae68adc93','bac958162b0619210a7978561bdb185e6a7c7721',1,1533481944),(162,'/Uploads/Picture/2018-08-05/5b671447bca90.jpg','','e88fa1f3befd4aa321b2fbc0c77d53d4','e367414c927b9394a58cab4c532b22d5bd7d1e90',1,1533482055),(163,'/Uploads/Picture/2018-08-05/5b671b3db6889.jpg','','1cf89753667465672ade89e928fd31a4','e0759077ea27c330b9936f0bc98e18e50ec834ce',1,1533483837),(164,'/Uploads/Picture/2018-08-05/5b671b75c5cd3.png','','950876b29e6c04645708107c951dd50d','29d2c809598e6bb4780396738ccfdb9b81a991c9',1,1533483893),(165,'/Uploads/Picture/2018-08-05/5b671cb2ad34c.jpg','','4d3ad829b68a9b7b0e4817c2c1468f47','462cce589261a75d92c7b61e8aa7fa183687499e',1,1533484210),(166,'/Uploads/Picture/2018-08-06/5b671f818b66f.jpg','','e9503b512d3883be11ca1d776dc27bf7','ad251b8180d16f0ceec1e5fba83455e74556e3a7',1,1533484929),(167,'/Uploads/Picture/2018-08-06/5b671f87aedc5.jpg','','c0e0b8a5ce75580f6f6d12dd06a4eeaa','c4ed9137c3a484e81a1c5f18429186cdb980ea92',1,1533484935),(168,'/Uploads/Picture/2018-08-06/5b67a26fa1c8b.jpg','','df4d805e577698e182e64d2e3a0d3239','c320b91b3a145273dc47945bbb3e74ab8c25902d',1,1533518447),(169,'/Uploads/Picture/2018-08-30/5b87a4864ecb7.png','','4ca26961bef3a7af496f6290c52c19ab','2025abfbcbb37dbcbf9caaf6acde5a1d73ff2ef1',1,1535616134),(170,'/Uploads/Picture/2018-09-02/5b8ad0e16a12a.png','','5c1d6f7514c3a8472c58eab1248b9ee7','8955a00e60f0e7b4597e5c5e0b835a5c004d848c',1,1535824097),(171,'/Uploads/Picture/2018-09-07/5b92331c9863b.jpg','','eaafbda869c3cb738a9f3dba2cee87f7','8a06e7fe55248257d9ee32a86abc3b0780ee8ef6',1,1536307996),(172,'/Uploads/Picture/2018-09-07/5b9233bdae990.jpg','','d6e33f2b741dfbbc64cb5a738244473b','615ea58b53f00077d7a2f04157777a1d886bfa38',1,1536308157),(173,'/Uploads/Picture/2018-09-07/5b9233caec032.jpg','','620d4355048f24f30234e6c8f7e4589c','6b23ceab8d6830fc11ebca318381078159775ad8',1,1536308170),(174,'/Uploads/Picture/2018-09-18/5ba0da6949673.png','','e73039cbe01a487509457c42bab09b7d','58cb1334d507714651dfbc84d54191b15dc5408f',1,1537268329),(175,'/Uploads/Picture/2018-09-18/5ba0da89081c3.png','','0aa519b5d0760c5cd568177ed144b716','421db0fa0d2ef164726e7488cbf1eb330be8f6b4',1,1537268360);
/*!40000 ALTER TABLE `onethink_picture` ENABLE KEYS */;

#
# Structure for table "onethink_poster"
#

DROP TABLE IF EXISTS `onethink_poster`;
CREATE TABLE `onethink_poster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(25) NOT NULL COMMENT '标题',
  `image` int(11) NOT NULL COMMENT '图片',
  `appimage` varchar(11) DEFAULT NULL COMMENT '移动端图片',
  `content` varchar(1000) NOT NULL COMMENT '内容',
  `url` varchar(100) NOT NULL COMMENT '链接',
  `companyid` int(11) NOT NULL,
  `changetime` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '状态，-1：删除；0：禁用；1：启用；2：未审核',
  `createtime` int(11) NOT NULL COMMENT '创建时间',
  `sort` int(11) DEFAULT NULL COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='企业海报';

#
# Data for table "onethink_poster"
#

/*!40000 ALTER TABLE `onethink_poster` DISABLE KEYS */;
INSERT INTO `onethink_poster` VALUES (2,'首页幻灯片3',152,'171','','',0,1536308172,1,1422350561,1),(3,'首页幻灯片2',148,'173','','',0,1536308159,1,1422350573,2),(5,'首页幻灯片1',149,'172','','',0,1536307998,1,1523775847,3);
/*!40000 ALTER TABLE `onethink_poster` ENABLE KEYS */;

#
# Structure for table "onethink_product"
#

DROP TABLE IF EXISTS `onethink_product`;
CREATE TABLE `onethink_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(25) NOT NULL COMMENT '标题',
  `image` int(11) NOT NULL COMMENT '图片',
  `categoryid` int(11) NOT NULL DEFAULT '0' COMMENT '0 字画 1 艺术衍生品 3 海外艺术品',
  `teacherid` int(11) DEFAULT '0' COMMENT '专家ID',
  `content` text COMMENT '内容',
  `companyid` int(11) NOT NULL,
  `changetime` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '状态，-1：删除；0：禁用；1：启用；2：未审核',
  `createtime` int(11) NOT NULL COMMENT '创建时间',
  `category` int(11) NOT NULL COMMENT '分类',
  `view` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '浏览量',
  `price` int(11) NOT NULL DEFAULT '0' COMMENT '价格',
  `marketprice` varchar(20) DEFAULT NULL,
  `size` varchar(20) DEFAULT NULL,
  `zhxz` varchar(50) DEFAULT NULL,
  `ticai` varchar(50) DEFAULT NULL,
  `chicun` varchar(50) DEFAULT NULL,
  `image1` int(11) DEFAULT NULL,
  `image2` int(11) DEFAULT NULL,
  `image3` int(11) DEFAULT NULL,
  `image4` int(11) DEFAULT NULL,
  `image5` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9109 DEFAULT CHARSET=utf8 COMMENT='产品管理';

#
# Data for table "onethink_product"
#

/*!40000 ALTER TABLE `onethink_product` DISABLE KEYS */;
INSERT INTO `onethink_product` VALUES (9108,'',0,0,0,'',0,0,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `onethink_product` ENABLE KEYS */;

#
# Structure for table "onethink_product_category"
#

DROP TABLE IF EXISTS `onethink_product_category`;
CREATE TABLE `onethink_product_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(25) NOT NULL,
  `entitle` varchar(20) DEFAULT NULL COMMENT '英文名',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `pid` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;

#
# Data for table "onethink_product_category"
#

/*!40000 ALTER TABLE `onethink_product_category` DISABLE KEYS */;
INSERT INTO `onethink_product_category` VALUES (1,'题材','ticai',1523598623,1523959279,1,0,0),(2,'尺寸','chicun',1523598631,1523959298,1,0,0),(3,'价格','price',1523598640,1523959326,1,0,0),(4,'水墨山水画',NULL,1523598656,1523598653,1,1,0),(5,'青绿山水画',NULL,1523598665,1523598662,1,1,0),(6,'小尺寸',NULL,1523598689,1523598686,1,2,0),(7,'斗方',NULL,1523598699,1523598697,1,2,0),(8,'三尺横幅',NULL,1523598710,1523598708,1,2,0),(9,'三尺竖幅',NULL,1523598718,1523598716,1,2,0),(10,'四尺横幅',NULL,1523598726,1523598724,1,2,0),(11,'四尺竖幅',NULL,1523598737,1523598735,1,2,0),(12,'六尺横幅',NULL,1523598747,1523598744,1,2,0),(13,'六尺竖幅',NULL,1523598757,1523598755,1,2,0),(14,'八尺',NULL,1523598768,1523598765,1,2,0),(15,' 一丈二',NULL,1523598778,1523598774,1,2,0),(16,'大尺寸',NULL,1523598788,1523598786,1,2,0),(17,'四条屏',NULL,1523598804,1523598801,1,2,0),(18,'中堂',NULL,1523598855,1523598853,1,2,0),(19,'对联',NULL,1523598864,1523598862,1,2,0),(20,'册页',NULL,1523598873,1523598871,1,2,0),(21,'长卷',NULL,1523598881,1523598879,1,2,0),(22,'500元以下',NULL,1523612057,1523612036,1,3,0),(23,' 500--1000元',NULL,1523612074,1523612070,1,3,0),(24,'1000--2000元',NULL,1523612086,1523612083,1,3,0),(25,'2000--5000元',NULL,1523612098,1523612095,1,3,0),(26,'5000--10000元',NULL,1523612115,1523612112,1,3,0),(27,'10000--20000元',NULL,1523612125,1523612123,1,3,0),(28,'20000--50000元',NULL,1523612134,1523612132,1,3,0),(29,'50000元以上',NULL,1523612143,1523612141,1,3,0),(30,'艺术衍生品','',1524555049,1524555043,1,0,0),(31,'艺术品灯具','',1524555060,1524999457,1,30,1),(32,'艺术品摆件','',1524555070,1524999462,1,30,5),(33,'陶瓷艺术品','',1524555078,1524999463,1,30,6),(34,'海外艺术品','',1524557616,1524557613,1,0,0),(35,'办公','',1524557628,1524883064,1,34,0),(36,'生活','',1524557637,1524883066,1,34,0),(37,'艺术','',1524557646,1524883070,1,34,0),(38,'产品分类','',1524627325,1524627316,1,0,0),(39,'中国书画','',1524627342,1524627339,1,38,0),(40,'艺术衍生品','',1524627359,1524627357,1,38,0),(41,'海外艺术品','',1524627373,1524627371,1,38,0),(42,'众筹','',1524654970,1524654962,1,38,0),(43,'拍卖','',1524795490,1524795508,1,38,0),(44,'众筹','',1524799436,1524799433,1,0,0),(45,'产品众筹','',1524799450,1524883218,1,44,0),(46,'项目众筹','',1524799460,1524883222,1,44,0),(47,'拍卖','',1524807106,1524807100,1,0,0),(48,'分类一','',1524807115,1524807110,1,47,0),(49,'分类二','',1524807123,1524807119,1,47,0),(50,'艺术装饰品','',1524882802,1524999458,1,30,2),(51,'铜艺术品','',1524882811,1524999461,1,30,3),(52,'吧台艺术品','礼品',1524882823,1524999462,1,30,4),(53,'配饰','',1524883074,1524883072,1,34,0),(54,'中国书画','',1524999033,1524999031,1,0,0),(55,'花鸟画','',1524999065,1524999356,1,54,1),(56,'人物画','',1524999075,1524999355,1,54,2),(57,'山水画','',1524999087,1524999339,1,54,3),(58,'书法','',1524999102,1524999353,1,54,4),(59,'篆刻','',1524999109,1524999351,1,54,5);
/*!40000 ALTER TABLE `onethink_product_category` ENABLE KEYS */;

#
# Structure for table "onethink_question"
#

DROP TABLE IF EXISTS `onethink_question`;
CREATE TABLE `onethink_question` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '题目ID',
  `type` varchar(64) NOT NULL DEFAULT '' COMMENT '题目类型',
  `stem` text COMMENT '题干',
  `score` float(10,1) unsigned NOT NULL DEFAULT '0.0' COMMENT '分数',
  `answer` text COMMENT '参考答案',
  `analysis` text COMMENT '解析',
  `metas` text COMMENT '题目元信息',
  `categoryId` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '类别',
  `difficulty` varchar(64) NOT NULL DEFAULT 'normal' COMMENT '难度',
  `target` varchar(255) NOT NULL DEFAULT '' COMMENT '从属于',
  `parentId` int(10) unsigned DEFAULT '0' COMMENT '材料父ID',
  `subCount` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '子题数量',
  `finishedTimes` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '完成次数',
  `passedTimes` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '成功次数',
  `userId` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
  `updatedTime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `createdTime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `status` tinyint(4) NOT NULL COMMENT '状态，-1：删除；0：禁用；1：启用；2：未审核',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COMMENT='问题表';

#
# Data for table "onethink_question"
#

/*!40000 ALTER TABLE `onethink_question` DISABLE KEYS */;
INSERT INTO `onethink_question` VALUES (2,'single_choice','<p>\r\n\t<span style=\"color:#333333;font-family:&quot;font-size:14px;background-color:#FFFFFF;\">教师组织孩子记忆一组材料时，会引导他们进行分类记忆。这种记忆策略属于（　　）</span>\r\n</p>',2.0,'[\"0\"]','','{\"choices\":[\"6KeG6KeJ5aSN6L+w562W55Wl\",\"54m55b6B5aSN5ZCI562W55Wl\",\"5aSN6L+w562W55Wl\",\"57uE57uH5oCn562W55Wl\"]}',0,'normal','course-1',0,0,0,0,1,1526263133,1526263133,0),(5,'fill','<p>\r\n\t机动车仪表板上（如图所示）亮表示什么？[[县道编号]]\r\n</p>',2.0,'[[\"5Y6/6YGT57yW5Y+3\"]]','','[]',0,'normal','course-2',0,0,0,0,1,1526264950,1526264950,0),(13,'single_choice','<span style=\"color:#404040;font-family:&quot;font-size:14px;line-height:30px;background-color:#F6F6F6;\"><span style=\"color:#333333;font-family:&quot;font-size:14px;background-color:#FFFFFF;\">关于幼儿园区域游戏活动，以下看法正确的是（　　）</span></span>',2.0,'[\"B\"]','','{\"choices\":[\"PHNwYW4gc3R5bGU9ImNvbG9yOiM0MDQwNDA7Zm9udC1mYW1pbHk6IiBmb250LXNpemU6MTRweDtsaW5lLWhlaWdodDozMHB4O2JhY2tncm91bmQtY29sb3I6I2Y2ZjZmNjsiPSIiPuWMuuWfn+a4uOaIj+a0u+WKqOi/m+ihjOS4re+8jOW5vOWEv+S4jeiDveabtOaNouW3sumAieWMuuWfnzwvc3Bhbj48c3BhbiBzdHlsZT0iY29sb3I6IzQwNDA0MDtmb250LWZhbWlseToiIGZvbnQtc2l6ZToxNHB4O2xpbmUtaGVpZ2h0OjMwcHg7YmFja2dyb3VuZC1jb2xvcjojZjZmNmY2OyI9IiI+PGltZyBzcmM9Ii9lZHUvVXBsb2Fkcy9FZGl0b3IvMjAxNS0wMi0yMy81NGVhMjdhNDU3NGRmLnBuZyIgYWx0PSIiIC8+PC9zcGFuPg==\",\"PHNwYW4gc3R5bGU9ImNvbG9yOiM0MDQwNDA7Zm9udC1mYW1pbHk6IiBmb250LXNpemU6MTRweDtsaW5lLWhlaWdodDozMHB4O2JhY2tncm91bmQtY29sb3I6I2Y2ZjZmNjsiPSIiPuimgeWKoOW8uuWvueW5vOWEv+WbreWMuuWfn+a0u+WKqOeahOaMh+WvvOWSjOeuoeeQhu+8jOW5vOWEv+aVmeW4iOWPr+S7pemaj+aEj+S7i+WFpTwvc3Bhbj48c3BhbiBzdHlsZT0iY29sb3I6IzQwNDA0MDtmb250LWZhbWlseToiIGZvbnQtc2l6ZToxNHB4O2xpbmUtaGVpZ2h0OjMwcHg7YmFja2dyb3VuZC1jb2xvcjojZjZmNmY2OyI9IiI+PGltZyBzcmM9Ii9lZHUvVXBsb2Fkcy9FZGl0b3IvMjAxNS0wMi0yMy81NGVhMjdhNDU3NGRmLnBuZyIgYWx0PSIiIC8+PC9zcGFuPg==\",\"PHNwYW4gc3R5bGU9ImNvbG9yOiM0MDQwNDA7Zm9udC1mYW1pbHk6IiBmb250LXNpemU6MTRweDtsaW5lLWhlaWdodDozMHB4O2JhY2tncm91bmQtY29sb3I6I2Y2ZjZmNjsiPSIiPuS4uuS6huWFheWIhuWPkeaMpeWMuuWfn+a4uOaIj+a0u+WKqOS7t+WAvO+8jOWMuuWfn+a0u+WKqOeahOadkOaWmeaKleaUvui2iuWkmui2iuWlvTwvc3Bhbj48c3BhbiBzdHlsZT0iY29sb3I6IzQwNDA0MDtmb250LWZhbWlseToiIGZvbnQtc2l6ZToxNHB4O2xpbmUtaGVpZ2h0OjMwcHg7YmFja2dyb3VuZC1jb2xvcjojZjZmNmY2OyI9IiI+PGltZyBzcmM9Ii9lZHUvVXBsb2Fkcy9FZGl0b3IvMjAxNS0wMi0yMy81NGVhMjdhNDU3NGRmLnBuZyIgYWx0PSIiIC8+PC9zcGFuPg==\",\"5Yy65Z+f5ri45oiP5rS75Yqo5Lit6KeE5YiZ55qE5Yi26K6i6ZyA6KaB5bm85YS/55qE5Y+C5LiO\"]}',0,'normal','',0,0,0,0,0,1526263321,1526263321,0),(14,'choice','机动车仪表板上（如图所示）亮表示什么？',2.0,'[\"A\",\"B\",\"C\"]','','{\"choices\":[\"5py65Yqo6L2m5Luq6KGo5p2/5LiK77yI5aaC5Zu+5omA56S677yJ5Lqu6KGo56S65LuA5LmI77yf\",\"5py65Yqo6L2m5Luq6KGo5p2/5LiK77yI5aaC5Zu+5omA56S677yJ5Lqu6KGo56S65LuA5LmI77yf\",\"5py65Yqo6L2m5Luq6KGo5p2/5LiK77yI5aaC5Zu+5omA56S677yJ5Lqu6KGo56S65LuA5LmI77yf\",\"5py65Yqo6L2m5Luq6KGo5p2/5LiK77yI5aaC5Zu+5omA56S677yJ5Lqu6KGo56S65LuA5LmI77yf\"]}',0,'normal','',0,0,0,0,0,1526264868,1526264868,0),(16,'essay','超过机动车驾驶证有效期一年以上未换证被注销，但未超过2年的，机动车驾驶人应当如何恢复驾驶资格？',2.0,'[\"\"]','','[]',0,'normal','',0,0,0,0,0,1526265184,1526265184,0),(21,'fill','使用伪造、变造的机动车号牌一次记[[3]]分？',2.0,'[[\"Mw==\"]]','','[]',0,'normal','',0,0,0,0,0,1526265013,1526265013,0),(25,'material','关于龟兔赛跑的，请完成以下试题。',2.0,'[]','','[]',0,'normal','',0,0,0,0,0,1526265280,1526265280,0),(27,'determine','上道路行驶的机动车有哪种情形交通警察可依法扣留车辆？',2.0,'[\"1\"]','','[]',0,'normal','',0,0,0,0,0,1526265515,1526265515,0),(28,'determine','装有ABS系统的机动车在冰雪路面上会最大限度缩短制动距离。',2.0,'[\"0\"]','','[]',0,'normal','',0,0,0,0,0,1526265398,1526265398,0),(29,'single_choice','如图所示，机动车在这种道路上行驶，在道路中间通行的原因是什么？',2.0,'[\"\"]','','{\"choices\":[\"5Zyo6YGT6Lev5Lit6Ze06YCa6KGM6KeG57q/5aW9\",\"6Ziy5q2i6L2m6L6G5Yay5Ye66Lev5aSW\",\"57uZ5Lik5L6n55qE6Z2e5py65Yqo6L2m5ZKM6KGM5Lq655WZ5pyJ5YWF6Laz55qE6YCa6KGM56m66Ze0\",\"5Zyo6YGT6Lev5Lit6Ze06YCa6KGM6YCf5bqm5b+r\"]}',0,'normal','',25,0,0,0,0,1526265658,1526265658,0);
/*!40000 ALTER TABLE `onethink_question` ENABLE KEYS */;

#
# Structure for table "onethink_room"
#

DROP TABLE IF EXISTS `onethink_room`;
CREATE TABLE `onethink_room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(25) NOT NULL COMMENT '标题',
  `categoryid` int(11) NOT NULL,
  `content` text NOT NULL COMMENT '内容',
  `companyid` int(11) NOT NULL,
  `changetime` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '状态，-1：删除；0：禁用；1：启用；2：未审核',
  `createtime` int(11) NOT NULL COMMENT '创建时间',
  `category` int(11) NOT NULL COMMENT '分类',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='房间管理';

#
# Data for table "onethink_room"
#

/*!40000 ALTER TABLE `onethink_room` DISABLE KEYS */;
/*!40000 ALTER TABLE `onethink_room` ENABLE KEYS */;

#
# Structure for table "onethink_room_category"
#

DROP TABLE IF EXISTS `onethink_room_category`;
CREATE TABLE `onethink_room_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(25) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `pid` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

#
# Data for table "onethink_room_category"
#

/*!40000 ALTER TABLE `onethink_room_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `onethink_room_category` ENABLE KEYS */;

#
# Structure for table "onethink_seo_rule"
#

DROP TABLE IF EXISTS `onethink_seo_rule`;
CREATE TABLE `onethink_seo_rule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `app` varchar(40) NOT NULL,
  `controller` varchar(40) NOT NULL,
  `action` varchar(40) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `seo_keywords` text NOT NULL,
  `seo_description` text NOT NULL,
  `seo_title` text NOT NULL,
  `sort` int(11) NOT NULL,
  `summary` varchar(500) NOT NULL COMMENT 'seo变量介绍',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10000 DEFAULT CHARSET=utf8;

#
# Data for table "onethink_seo_rule"
#

/*!40000 ALTER TABLE `onethink_seo_rule` DISABLE KEYS */;
INSERT INTO `onethink_seo_rule` VALUES (1000,'整站标题','','','',1,'','','',7,'-'),(1001,'用户中心','Ucenter','index','index',1,'{$user_info.username|text}的个人主页','{$user_info.username|text}的个人主页','{$user_info.nickname|op_t}的个人主页',3,'-'),(1002,'网站首页','Home','Index','index',1,'','','',0,'-'),(1003,'积分商城首页','Shop','Index','index',1,'','','',0,'-'),(1004,'商品列表','Shop','Index','goods',1,'','','',0,'category_name：当前分类名\nchild_category_name：子分类名'),(1005,'商品详情','Shop','Index','goodsdetail',1,'','','',0,'content：商品变量集\n   content.goods_name 商品名\n   content.goods_introduct 商品简介\n   content.goods_detail 商品详情'),(1006,'活动主页','Event','Index','index',1,'','','',0,'-'),(1007,'活动详情','Event','Index','detail',1,'','','',0,'content：活动变量集\n   content.title 活动名称\n   content.type.title 活动分类名\n   content.user.nickname 发起人昵称\n   content.address 活动地点\n   content.limitCount 人数限制'),(1008,'活动成员','Event','Index','member',1,'','','',0,'-'),(1009,'专辑首页','Issue','Index','index',1,'','','',0,'-'),(1010,'专辑详情','Issue','Index','issuecontentdetail',1,'','','',0,'content：专辑内容变量集\n   content.user.nickname 内容发布者昵称\n   content.user.signature 内容发布者签名\n   content.url 内容的Url\n   content.title 内容标题\n   content.create_time|friendlyDate 发布时间\n   content.update_time|friendlyDate 更新时间'),(1011,'论坛主页','Forum','Index','index',1,'','','',0,'-'),(1012,'某个版块的帖子列表','Forum','Index','forum',1,'','','',0,'forum：版块变量集\n   forum.description 版块描述\n   forum.title 版块名称\n   forum.topic_count 主题数\n   forum.total_count 帖子数'),(1013,'帖子详情','Forum','Index','detail',1,'','','',0,'post：帖子变量集\n   post.title 帖子标题\n   post.content 帖子详情\n   post.forum.title 帖子所在版块标题\n   '),(1014,'搜索帖子','Forum','Index','search',1,'','','',0,'keywords：搜索的关键词，2.4.0以后版本提供'),(1015,'随便看看','Forum','Index','look',1,'','','',0,'-'),(1016,'全部版块','Forum','Index','lists',1,'','','',0,'-'),(1017,'资讯首页/某个分类下的文章列表','News','Index','index',1,'','','',0,'now_category.title 当前分类的名称'),(1018,'某篇文章的内容页','News','Index','detail',1,'','','',0,'now_category.title 当前分类的名称\ninfo：文章变量集\n   info.title 文章标题\n   info.description 文章摘要\n   info.source 文章来源\n   info.detail.content 文章内容\nauthor.nickname 作者昵称\nauthor.signature 作者签名\n   '),(1019,'微博首页','Weibo','Index','index',1,'{$MODULE_ALIAS}','{$MODULE_ALIAS}首页','{$MODULE_ALIAS}-{$website_name}',0,'title：我关注的、热门微博、全站关注'),(1020,'某条微博的详情页','Weibo','Index','weibodetail',1,'{$weibo.title|text},{$website_name},{$MODULE_ALIAS}','{$weibo.content|text}','{$weibo.content|text}——{$MODULE_ALIAS}',0,'weibo:微博变量集\n   weibo.user.nickname 发布者昵称\n   weibo.content 微博内容'),(1021,'微博搜索页面','Weibo','Index','search',1,'','','',0,'search_keywords：搜索关键词'),(1022,'热门话题列表','Weibo','Topic','topic',1,'','','',0,'-'),(1023,'某个话题的话题页','Weibo','Topic','index',1,'','','',0,'topic：话题变量集\n   topic.name 话题名称\nhost：话题主持人变量集\n   host.nickname 主持人昵称'),(1024,'自动跳转到我的群组','Group','Index','index',1,'','','',0,'-'),(1025,'全部群组','Group','Index','groups',1,'','','',0,'-'),(1026,'我的群组-帖子列表','Group','Index','my',1,'','','',0,'-'),(1027,'我的群组-全部关注的群组列表','Group','Index','mygroup',1,'','','',0,'-'),(1028,'某个群组的帖子列表页面','Group','Index','group',1,'','','',0,'search_key：如果查找帖子，则是关键词\ngroup：群组变量集\n   group.title 群组标题\n   group.user.nickname 创始人昵称\n   group.member_count 群组人数'),(1029,'某篇帖子的内容页','Group','Index','detail',1,'','','',0,'group：群组变量集\n   group.title 群组标题\n   group.user.nickname 创始人昵称\n   group.member_count 群组人数\npost：帖子变量集\n   post.title 帖子标题\n   post.content 帖子内容'),(1030,'创建群组','Group','Index','create',1,'','','',0,'-'),(1031,'发现','Group','Index','discover',1,'','','',0,'-'),(1032,'精选','Group','Index','select',1,'','','',0,'-'),(1033,'找人首页','People','Index','index',1,'{$MODULE_ALIAS}','{$MODULE_ALIAS}','{$MODULE_ALIAS}',0,'-'),(1034,'微店首页','Store','Index','index',1,'','','',0,'-'),(1035,'某个分类下的商品列表页','Store','Index','li',1,'','','',0,'type：当前分类变量集\n   type.title 分类名称'),(1036,'搜索商品列表页','Store','Index','search',1,'','','',0,'searchKey：搜索关键词'),(1037,'单个商品的详情页','Store','Index','info',1,'','','',0,'info：商品变量集\n   info.title 商品标题\n   info.des 商品描述\n   info.shop：店铺变量集\n       info.shop.title 店铺名称\n       info.shop.summary 店铺简介\n       info.shop.position 店铺所在地\n       info.shop.user.nickname 店主昵称'),(1038,'店铺街','Store','Index','lists',1,'','','',0,'-'),(1039,'某个店铺的首页','Store','Shop','detail',1,'','','',0,'shop：店铺变量集\n   shop.title 店铺名称\n   shop.summary 店铺简介\n   shop.position 店铺所在地\n   shop.user.nickname 店主昵称'),(1040,'某个店铺下的商品列表页','Store','Shop','goods',1,'','','',0,'shop：店铺变量集\n   shop.title 店铺名称\n   shop.summary 店铺简介\n   shop.position 店铺所在地\n   shop.user.nickname 店主昵称'),(1041,'分类信息首页','Cat','Index','index',1,'','','',0,'-'),(1042,'某个模型下的列表页','Cat','Index','li',1,'','','',0,'entity：当前模型变量集\n   entity.alias 模型名'),(1043,'某条信息的详情页','Cat','Index','info',1,'','','',0,'entity：当前模型变量集\n   entity.alias 模型名\ninfo：当前信息\n   info.title 信息名称\nuser.nickname 发布者昵称'),(1044,'待回答页面','Question','Index','waitanswer',1,'','','',0,'-'),(1045,'热门问题','Question','Index','goodquestion',1,'','','',0,'-'),(1046,'我的回答','Question','Index','myquestion',1,'','','',0,'-'),(1047,'全部问题','Question','Index','questions',1,'','','',0,'-'),(1048,'详情','Question','Index','detail',1,'','','',0,'question：问题变量集\n   question.title 问题标题\n   question.description 问题描述\n   question.answer_num 回答数\nbest_answer：最佳回答\n   best_answer.content 最佳答案内容');
/*!40000 ALTER TABLE `onethink_seo_rule` ENABLE KEYS */;

#
# Structure for table "onethink_session"
#

DROP TABLE IF EXISTS `onethink_session`;
CREATE TABLE `onethink_session` (
  `session_id` varchar(255) NOT NULL DEFAULT '',
  `session_expire` int(11) DEFAULT NULL,
  `session_data` text,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "onethink_session"
#

/*!40000 ALTER TABLE `onethink_session` DISABLE KEYS */;
INSERT INTO `onethink_session` VALUES ('rk7bq7v9t5mquh07g5b5kgh463',1533387291,'onethink_admin|a:2:{s:9:\"user_auth\";a:4:{s:3:\"uid\";s:1:\"1\";s:8:\"username\";s:5:\"admin\";s:15:\"last_login_time\";s:10:\"1533386501\";s:9:\"companyid\";i:0;}s:14:\"user_auth_sign\";s:40:\"32abb3b1a6441507f013791f254f9a00fe40af50\";}');
/*!40000 ALTER TABLE `onethink_session` ENABLE KEYS */;

#
# Structure for table "onethink_sync_login"
#

DROP TABLE IF EXISTS `onethink_sync_login`;
CREATE TABLE `onethink_sync_login` (
  `uid` int(11) NOT NULL,
  `openid` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `access_token` varchar(255) NOT NULL,
  `refresh_token` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "onethink_sync_login"
#

/*!40000 ALTER TABLE `onethink_sync_login` DISABLE KEYS */;
/*!40000 ALTER TABLE `onethink_sync_login` ENABLE KEYS */;

#
# Structure for table "onethink_testpaper"
#

DROP TABLE IF EXISTS `onethink_testpaper`;
CREATE TABLE `onethink_testpaper` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '试卷ID',
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '试卷名称',
  `image` int(11) NOT NULL COMMENT '图片',
  `categoryid` varchar(20) NOT NULL DEFAULT '0',
  `description` text COMMENT '试卷说明',
  `limitedTime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '限时(单位：秒)',
  `pattern` varchar(255) NOT NULL DEFAULT '' COMMENT '试卷生成/显示模式',
  `target` varchar(255) NOT NULL DEFAULT '' COMMENT '试卷所属对象',
  `status` tinyint(4) NOT NULL COMMENT '状态，-1：删除；0：禁用；1：启用；2：未审核',
  `score` float(10,1) unsigned NOT NULL DEFAULT '0.0' COMMENT '总分',
  `passedScore` float(10,1) unsigned NOT NULL DEFAULT '0.0' COMMENT '通过考试的分数线',
  `itemCount` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '题目数量',
  `createdUserId` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建人',
  `createdTime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updatedUserId` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '修改人',
  `updatedTime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
  `metas` text COMMENT '题型排序',
  `view` int(10) NOT NULL DEFAULT '0',
  `price` float(10,2) NOT NULL DEFAULT '0.00' COMMENT '价格',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=113 DEFAULT CHARSET=utf8;

#
# Data for table "onethink_testpaper"
#

/*!40000 ALTER TABLE `onethink_testpaper` DISABLE KEYS */;
INSERT INTO `onethink_testpaper` VALUES (1,'2018年国企招聘考试（写作）',130,'1','<span style=\"color:#808080;font-family:&quot;font-size:14px;background-color:#FFFFFF;\"><span style=\"color:#222222;font-family:Consolas, &quot;background-color:#FFFFFF;\"><span style=\"color:#333333;font-family:&quot;font-size:medium;\">2018年国企招聘考试（写作）在线题库是《易考宝典》考试在线题库之一，是专门为参加“国企招聘考试”的朋友量身定做的自我测试系统，是个人，培训学校进行考试前训练、备考冲刺的最佳考试平台，题型丰富，图文并茂，内容全面，题库设计符合考试最新大纲，内容丰富，海量试题。</span></span></span>',10,'','',1,0.0,0.0,0,0,1526292249,0,1526292249,'{\"question_type_seq\":[\"single_choice\",\"choice\",\"fill\",\"determine\",\"essay\",\"material\"],\"itemquestions\":{\"single_choice\":\"13\",\"choice\":\"14,14\",\"fill\":\"21,21,5\",\"determine\":\"28\",\"essay\":\"16\",\"material\":\"25\"},\"score\":{\"single_choice\":\"2\",\"choice\":\"2\",\"fill\":\"2\",\"determine\":\"2\",\"essay\":\"2\",\"material\":\"2\"},\"questionnum\":[1,2,3,1,1,1],\"missScore\":{\"choice\":\"0\",\"uncertain_choice\":\"0\"}}',1,0.00),(2,'2018年建筑施工企业三类人员考试',131,'1','<span style=\"color:#808080;font-family:&quot;font-size:14px;background-color:#FFFFFF;\"><span style=\"color:#222222;font-family:Consolas, &quot;background-color:#FFFFFF;\"><span style=\"font-family:&quot;font-size:medium;\"><span style=\"color:#333333;font-family:&quot;font-size:medium;\">2018年建筑施工企业三类人员考试（项目负责人·B证）在线题库是在线题库之一，是专门为参加建筑施工企业三类人员考试的朋友量身定做的自我测试系统，是个人、培训学校进行考试前训练、备考冲刺的最佳考试平台，题型丰富，图文并茂，内容全面，题库设计符合考试最新大纲，海量试题。软件包括了最有价值的模拟考场，有计时打分等功能，就像亲身体会考试一样；还有大量的模拟试题及历年试题，针对某些新颖、灵活的试题会相应地提供专业级的解题思路。</span></span></span></span>',10,'','',1,0.0,0.0,0,0,1526294849,0,1526294849,'{\"question_type_seq\":[\"single_choice\",\"choice\",\"fill\",\"determine\",\"essay\",\"material\"],\"itemquestions\":{\"single_choice\":\"13\",\"choice\":\"14,14\",\"fill\":\"21,21,5\",\"determine\":\"28\",\"essay\":\"16\",\"material\":\"25\"},\"score\":{\"single_choice\":\"2\",\"choice\":\"2\",\"fill\":\"2\",\"determine\":\"2\",\"essay\":\"2\",\"material\":\"2\"},\"questionnum\":[1,2,3,1,1,1],\"missScore\":{\"choice\":\"0\",\"uncertain_choice\":\"0\"}}',1,0.00),(3,'2018年成人高等教育学士学位英语水平考试',132,'1','<span style=\"color:#808080;font-family:&quot;font-size:14px;background-color:#FFFFFF;\"><span style=\"color:#222222;font-family:Consolas, &quot;background-color:#FFFFFF;\"><span style=\"color:#333333;font-family:&quot;font-size:medium;\">2018年成人高等教育学士学位英语水平考试（成人英语三级）在线题库是在线题库之一，是专门为参加成人高等教育学士学位英语水平考试的朋友量身定做的自我测试系统，是个人、培训学校进行考试前训练、备考冲刺的最佳考试平台，题型丰富，图文并茂，内容全面，题库设计符合考试最新大纲，海量试题。软件包括了最富有价值的模拟考场，有计时打分等功能，就像亲身体会考试一样；还有大量的模拟试题及历年试题，针对某些新颖、灵活的试题会相应地提供专业级的解题思路。</span></span></span>',10,'','',1,0.0,0.0,0,0,1526294930,0,1526294930,'{\"question_type_seq\":[\"single_choice\",\"choice\",\"fill\",\"determine\",\"essay\",\"material\"],\"itemquestions\":{\"single_choice\":\"13\",\"choice\":\"14,14\",\"fill\":\"21,21,5\",\"determine\":\"28\",\"essay\":\"16\",\"material\":\"25\"},\"score\":{\"single_choice\":\"2\",\"choice\":\"2\",\"fill\":\"2\",\"determine\":\"2\",\"essay\":\"2\",\"material\":\"2\"},\"questionnum\":[1,2,3,1,1,1],\"missScore\":{\"choice\":\"0\",\"uncertain_choice\":\"0\"}}',0,0.00),(4,'2018年全国初级电焊工考试在线题库',144,'1','<span style=\"color:#808080;font-family:&quot;font-size:14px;background-color:#FFFFFF;\"><span style=\"color:#222222;font-family:Consolas, &quot;background-color:#FFFFFF;\"><span style=\"color:#333333;font-family:&quot;font-size:medium;\">2018年全国初级电焊工考试在线题库是在线题库之一，是专门为参加电焊工考试的朋友量身定做的自我测试系统，是个人，培训学校进行考前训练、备考冲刺的最佳考试平台，题型丰富，图文并茂，内容全面，题库设计符合考试最新大纲，内容丰富，海量试题。包括了最有价值的模拟考场，软件有记时打分的功能，就像亲身体会考试一样，还有大量的模拟试题及历年试题，针对某些新颖，灵活试题会相应的并提供专业级的解题思路。</span></span></span>',10,'','',1,0.0,0.0,0,0,1526294969,0,1526294969,'{\"question_type_seq\":[\"single_choice\",\"choice\",\"fill\",\"determine\",\"essay\",\"material\"],\"itemquestions\":{\"single_choice\":\"13\",\"choice\":\"14,14\",\"fill\":\"21,21,5\",\"determine\":\"28\",\"essay\":\"16\",\"material\":\"25\"},\"score\":{\"single_choice\":\"2\",\"choice\":\"2\",\"fill\":\"2\",\"determine\":\"2\",\"essay\":\"2\",\"material\":\"2\"},\"questionnum\":[1,2,3,1,1,1],\"missScore\":{\"choice\":\"0\",\"uncertain_choice\":\"0\"}}',0,0.00),(5,'2018年事业单位招聘考试（职业能力倾向测验·B类）',145,'1','<span style=\"color:#808080;font-family:&quot;font-size:14px;background-color:#FFFFFF;\"><span style=\"color:#222222;font-family:Consolas, &quot;background-color:#FFFFFF;\"><span style=\"color:#333333;font-family:&quot;font-size:medium;\">2018年事业单位招聘考试（职业能力倾向测验·B类）在线题库是在线题库系统，是专门为参加事业单位招聘考试的朋友量身定做的自我测试系统，是个人、培训学校进行考试前训练、备考冲刺的最佳考试平台，题型丰富，图文并茂，内容全面，题库设计符合考试最新大纲，海量试题。软件包括了最有价值的模拟考场，有计时打分等功能，就像亲身体会考试一样；还有大量的模拟试题及历年试题，针对某些新颖、灵活的试题会相应地提供专业级的解题思路。</span></span></span>',10,'','',1,0.0,0.0,0,0,1526295006,0,1526295006,'{\"question_type_seq\":[\"single_choice\",\"choice\",\"fill\",\"determine\",\"essay\",\"material\"],\"itemquestions\":{\"single_choice\":\"13\",\"choice\":\"14,14\",\"fill\":\"21,21,5\",\"determine\":\"28\",\"essay\":\"16\",\"material\":\"25\"},\"score\":{\"single_choice\":\"2\",\"choice\":\"2\",\"fill\":\"2\",\"determine\":\"2\",\"essay\":\"2\",\"material\":\"2\"},\"questionnum\":[1,2,3,1,1,1],\"missScore\":{\"choice\":\"0\",\"uncertain_choice\":\"0\"}}',0,0.00),(6,'2018年土建施工员考试（专业基础知识）在线题库',134,'1','<span style=\"color:#808080;font-family:&quot;font-size:14px;background-color:#FFFFFF;\"><span style=\"color:#222222;font-family:Consolas, &quot;background-color:#FFFFFF;\"><span style=\"color:#333333;font-family:&quot;font-size:medium;\">2018年土建施工员考试（专业基础知识）在线题库是在线题库之一，是专门为参加土建施工员考试的朋友量身定做的自我测试系统，是个人、培训学校进行考试前训练、备考冲刺的最佳考试平台，题型丰富，图文并茂，内容全面，题库设计符合考试最新大纲，海量试题。软件包括了最有价值的模拟考场，有计时打分等功能，就像亲身体会考试一样；还有大量的模拟试题及历年试题，针对某些新颖、灵活的试题会相应地提供专业级的解题思路。</span></span></span>',10,'','',1,0.0,0.0,0,0,1526295053,0,1526295053,'{\"question_type_seq\":[\"single_choice\",\"choice\",\"fill\",\"determine\",\"essay\",\"material\"],\"itemquestions\":{\"single_choice\":\"13\",\"choice\":\"14,14\",\"fill\":\"21,21,5\",\"determine\":\"28\",\"essay\":\"16\",\"material\":\"25\"},\"score\":{\"single_choice\":\"2\",\"choice\":\"2\",\"fill\":\"2\",\"determine\":\"2\",\"essay\":\"2\",\"material\":\"2\"},\"questionnum\":[1,2,3,1,1,1],\"missScore\":{\"choice\":\"0\",\"uncertain_choice\":\"0\"}}',0,0.00),(7,'2018年全国英语等级考试（PETS）三级在线题库',136,'1','<span style=\"color:#808080;font-family:&quot;font-size:14px;background-color:#FFFFFF;\"><span style=\"color:#222222;font-family:Consolas, &quot;background-color:#FFFFFF;\"><span style=\"color:#333333;font-family:&quot;font-size:medium;\">2018年全国英语等级考试（PETS）三级在线题库是在线题库之一，是专门为参加全国英语等级考试（PETS）的朋友量身定做的自我测试系统，是个人，培训学校进行考试前训练、备考冲刺的最佳考试平台，题型丰富，内容全面，题库设计符合考试最新大纲，内容丰富，海量试题。包括了大量的强化训练试题及历年试题，针对某些新颖，灵活试题会相应的并提供专业级的解题思路。</span></span></span>',10,'','',1,0.0,0.0,0,0,1526295090,0,1526295090,'{\"question_type_seq\":[\"single_choice\",\"choice\",\"fill\",\"determine\",\"essay\",\"material\"],\"itemquestions\":{\"single_choice\":\"13\",\"choice\":\"14,14\",\"fill\":\"21,21,5\",\"determine\":\"28\",\"essay\":\"16\",\"material\":\"25\"},\"score\":{\"single_choice\":\"2\",\"choice\":\"2\",\"fill\":\"2\",\"determine\":\"2\",\"essay\":\"2\",\"material\":\"2\"},\"questionnum\":[1,2,3,1,1,1],\"missScore\":{\"choice\":\"0\",\"uncertain_choice\":\"0\"}}',1,0.00),(8,'2018年住房和城乡建设领域现场专业人员考试（合同管理）在线题库',136,'5,6,7','<span style=\"color:#808080;font-family:&quot;font-size:14px;background-color:#FFFFFF;\"><span style=\"color:#222222;font-family:Consolas, &quot;background-color:#FFFFFF;\"><span style=\"color:#333333;font-family:&quot;font-size:medium;\">2018年住房和城乡建设领域现场专业人员考试（合同管理）在线题库是在线题库系统之一，是专门为参加住房和城乡建设领域现场专业人员考试的朋友量身定做的自我测试系统，是个人、培训学校进行考试前训练、备考冲刺的最佳考试平台，题型丰富，图文并茂，内容全面，题库设计符合考试最新大纲，海量试题。软件包括了最富有价值的模拟考场，有计时打分等功能，就像亲身体会考试一样；还有大量的模拟试题及历年试题，针对某些新颖、灵活的试题会相应地提供专业级的解题思路。</span></span></span>',10,'','',1,0.0,0.0,0,0,1535282257,0,1535282257,'{\"question_type_seq\":[\"single_choice\",\"choice\",\"fill\",\"determine\",\"essay\",\"material\"],\"itemquestions\":{\"single_choice\":\"13\",\"choice\":\"14,14\",\"fill\":\"21,21,5\",\"determine\":\"28\",\"essay\":\"16\",\"material\":\"25\"},\"score\":{\"single_choice\":\"2\",\"choice\":\"2\",\"fill\":\"2\",\"determine\":\"2\",\"essay\":\"2\",\"material\":\"2\"},\"questionnum\":[1,2,3,1,1,1],\"missScore\":{\"choice\":\"0\",\"uncertain_choice\":\"0\"}}',0,0.00),(9,'小学生劳动教育问题调查问卷（学生部分）',130,'1','<span style=\"color:#808080;font-family:&quot;font-size:14px;background-color:#FFFFFF;\"><span style=\"color:#222222;font-family:Consolas, &quot;background-color:#FFFFFF;\">您好！感谢您阅读此份问卷，本问卷的目的在于了解当前一些关于我国小学生劳动教育问题的具体状况，本问卷不涉及姓名，答案没有对错之分，只用于统计分析，对您提供的信息我们将严格保密，衷心感谢您的参与和支持！</span></span>',10,'','',1,0.0,0.0,0,0,1526265556,0,1526265556,'{\"question_type_seq\":[\"single_choice\",\"choice\",\"fill\",\"determine\",\"essay\",\"material\"],\"itemquestions\":{\"single_choice\":\"13\",\"choice\":\"14,14\",\"fill\":\"21,21,5\",\"determine\":\"28\",\"essay\":\"16\",\"material\":\"25\"},\"score\":{\"single_choice\":\"2\",\"choice\":\"2\",\"fill\":\"2\",\"determine\":\"2\",\"essay\":\"2\",\"material\":\"2\"},\"questionnum\":[1,2,3,1,1,1],\"missScore\":{\"choice\":\"0\",\"uncertain_choice\":\"0\"}}',0,0.00),(10,'2018年低压电工特种作业操作证考试在线题库',142,'1','<span style=\"color:#808080;font-family:&quot;font-size:14px;background-color:#FFFFFF;\"><span style=\"color:#222222;font-family:Consolas, &quot;background-color:#FFFFFF;\"><span style=\"color:#333333;font-family:&quot;font-size:medium;\">2018年低压电工特种作业操作证考试在线题库是在线题库之一，是专门为参加低压电工操作证考试的朋友量身定做的自我测试系统，是个人，培训学校进行考试前训练、备考冲刺的最佳考试平台，题型丰富，图文并茂，内容全面，题库设计符合考试最新大纲，内容丰富，海量试题。包括了最有价值的模拟考场，软件有记时打分的功能，就像亲身体会考试一样，还有大量的模拟试题，针对某些新颖，灵活试题会相应的并提供专业级的解题思路。</span></span></span>',10,'','',1,0.0,0.0,0,0,1526294820,0,1526294820,'{\"question_type_seq\":[\"single_choice\",\"choice\",\"fill\",\"determine\",\"essay\",\"material\"],\"itemquestions\":{\"single_choice\":\"13\",\"choice\":\"14,14\",\"fill\":\"21,21,5\",\"determine\":\"28\",\"essay\":\"16\",\"material\":\"25\"},\"score\":{\"single_choice\":\"2\",\"choice\":\"2\",\"fill\":\"2\",\"determine\":\"2\",\"essay\":\"2\",\"material\":\"2\"},\"questionnum\":[1,2,3,1,1,1],\"missScore\":{\"choice\":\"0\",\"uncertain_choice\":\"0\"}}',1,0.00);
/*!40000 ALTER TABLE `onethink_testpaper` ENABLE KEYS */;

#
# Structure for table "onethink_testpaper_category"
#

DROP TABLE IF EXISTS `onethink_testpaper_category`;
CREATE TABLE `onethink_testpaper_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(25) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `pid` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

#
# Data for table "onethink_testpaper_category"
#

/*!40000 ALTER TABLE `onethink_testpaper_category` DISABLE KEYS */;
INSERT INTO `onethink_testpaper_category` VALUES (1,'科目',1427207942,1531622747,1,0,0),(5,'语文',1525620734,1525621655,1,1,0),(6,'数学',1525621660,1525621655,1,1,0),(7,'英语',1525621667,1525621663,1,1,0);
/*!40000 ALTER TABLE `onethink_testpaper_category` ENABLE KEYS */;

#
# Structure for table "onethink_testpaper_item"
#

DROP TABLE IF EXISTS `onethink_testpaper_item`;
CREATE TABLE `onethink_testpaper_item` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '试卷条目ID',
  `testId` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '所属试卷',
  `seq` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '题目顺序',
  `questionId` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '题目ID',
  `questionType` varchar(64) NOT NULL DEFAULT '' COMMENT '题目类别',
  `parentId` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '父题ID',
  `score` float(10,1) unsigned NOT NULL DEFAULT '0.0' COMMENT '分值',
  `missScore` float(10,1) unsigned NOT NULL DEFAULT '0.0' COMMENT '漏选得分',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=389 DEFAULT CHARSET=utf8;

#
# Data for table "onethink_testpaper_item"
#

/*!40000 ALTER TABLE `onethink_testpaper_item` DISABLE KEYS */;
INSERT INTO `onethink_testpaper_item` VALUES (56,9,1,14,'choice',0,1.0,0.0),(57,9,1,21,'fill',0,2.0,0.0),(58,9,2,5,'fill',0,2.0,0.0),(59,9,1,28,'determine',0,6.0,0.0),(60,9,2,27,'determine',0,6.0,0.0),(61,9,3,17,'determine',0,6.0,0.0),(227,1,1,13,'single_choice',0,2.0,0.0),(228,1,1,14,'choice',0,2.0,0.0),(229,1,2,14,'choice',0,2.0,0.0),(230,1,1,21,'fill',0,2.0,0.0),(231,1,2,21,'fill',0,2.0,0.0),(232,1,3,5,'fill',0,2.0,0.0),(233,1,1,28,'determine',0,2.0,0.0),(234,1,1,16,'essay',0,2.0,0.0),(235,1,1,25,'material',0,2.0,0.0),(299,10,1,13,'single_choice',0,2.0,0.0),(300,10,1,14,'choice',0,2.0,0.0),(301,10,2,14,'choice',0,2.0,0.0),(302,10,1,21,'fill',0,2.0,0.0),(303,10,2,21,'fill',0,2.0,0.0),(304,10,3,5,'fill',0,2.0,0.0),(305,10,1,28,'determine',0,2.0,0.0),(306,10,1,16,'essay',0,2.0,0.0),(307,10,1,25,'material',0,2.0,0.0),(308,2,1,13,'single_choice',0,2.0,0.0),(309,2,1,14,'choice',0,2.0,0.0),(310,2,2,14,'choice',0,2.0,0.0),(311,2,1,21,'fill',0,2.0,0.0),(312,2,2,21,'fill',0,2.0,0.0),(313,2,3,5,'fill',0,2.0,0.0),(314,2,1,28,'determine',0,2.0,0.0),(315,2,1,16,'essay',0,2.0,0.0),(316,2,1,25,'material',0,2.0,0.0),(326,3,1,13,'single_choice',0,2.0,0.0),(327,3,1,14,'choice',0,2.0,0.0),(328,3,2,14,'choice',0,2.0,0.0),(329,3,1,21,'fill',0,2.0,0.0),(330,3,2,21,'fill',0,2.0,0.0),(331,3,3,5,'fill',0,2.0,0.0),(332,3,1,28,'determine',0,2.0,0.0),(333,3,1,16,'essay',0,2.0,0.0),(334,3,1,25,'material',0,2.0,0.0),(335,4,1,13,'single_choice',0,2.0,0.0),(336,4,1,14,'choice',0,2.0,0.0),(337,4,2,14,'choice',0,2.0,0.0),(338,4,1,21,'fill',0,2.0,0.0),(339,4,2,21,'fill',0,2.0,0.0),(340,4,3,5,'fill',0,2.0,0.0),(341,4,1,28,'determine',0,2.0,0.0),(342,4,1,16,'essay',0,2.0,0.0),(343,4,1,25,'material',0,2.0,0.0),(344,5,1,13,'single_choice',0,2.0,0.0),(345,5,1,14,'choice',0,2.0,0.0),(346,5,2,14,'choice',0,2.0,0.0),(347,5,1,21,'fill',0,2.0,0.0),(348,5,2,21,'fill',0,2.0,0.0),(349,5,3,5,'fill',0,2.0,0.0),(350,5,1,28,'determine',0,2.0,0.0),(351,5,1,16,'essay',0,2.0,0.0),(352,5,1,25,'material',0,2.0,0.0),(353,6,1,13,'single_choice',0,2.0,0.0),(354,6,1,14,'choice',0,2.0,0.0),(355,6,2,14,'choice',0,2.0,0.0),(356,6,1,21,'fill',0,2.0,0.0),(357,6,2,21,'fill',0,2.0,0.0),(358,6,3,5,'fill',0,2.0,0.0),(359,6,1,28,'determine',0,2.0,0.0),(360,6,1,16,'essay',0,2.0,0.0),(361,6,1,25,'material',0,2.0,0.0),(362,7,1,13,'single_choice',0,2.0,0.0),(363,7,1,14,'choice',0,2.0,0.0),(364,7,2,14,'choice',0,2.0,0.0),(365,7,1,21,'fill',0,2.0,0.0),(366,7,2,21,'fill',0,2.0,0.0),(367,7,3,5,'fill',0,2.0,0.0),(368,7,1,28,'determine',0,2.0,0.0),(369,7,1,16,'essay',0,2.0,0.0),(370,7,1,25,'material',0,2.0,0.0),(380,8,1,13,'single_choice',0,2.0,0.0),(381,8,1,14,'choice',0,2.0,0.0),(382,8,2,14,'choice',0,2.0,0.0),(383,8,1,21,'fill',0,2.0,0.0),(384,8,2,21,'fill',0,2.0,0.0),(385,8,3,5,'fill',0,2.0,0.0),(386,8,1,28,'determine',0,2.0,0.0),(387,8,1,16,'essay',0,2.0,0.0),(388,8,1,25,'material',0,2.0,0.0);
/*!40000 ALTER TABLE `onethink_testpaper_item` ENABLE KEYS */;

#
# Structure for table "onethink_testpaper_item_result"
#

DROP TABLE IF EXISTS `onethink_testpaper_item_result`;
CREATE TABLE `onethink_testpaper_item_result` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '试卷题目做题结果ID',
  `itemId` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '试卷条目ID',
  `testId` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '试卷ID',
  `testPaperResultId` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '试卷结果ID',
  `userId` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '做题人ID',
  `questionId` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '题目ID',
  `status` enum('none','right','partRight','wrong','noAnswer') NOT NULL DEFAULT 'none' COMMENT '结果状态',
  `score` float(10,1) NOT NULL DEFAULT '0.0' COMMENT '得分',
  `answer` text COMMENT '回答',
  `teacherSay` text COMMENT '老师评价',
  PRIMARY KEY (`id`),
  KEY `testPaperResultId` (`testPaperResultId`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='用户试卷：每题答案';

#
# Data for table "onethink_testpaper_item_result"
#

INSERT INTO `onethink_testpaper_item_result` VALUES (1,0,10,1,1,5,'none',0.0,'[[\"\"]]',''),(2,0,10,1,1,13,'none',0.0,'[]',''),(3,0,10,1,1,14,'none',0.0,'[]',''),(4,0,10,1,1,16,'none',0.0,'[\"CQk=\"]',''),(5,0,10,1,1,21,'none',0.0,'[[\"\"]]',''),(6,0,10,1,1,29,'none',0.0,'[]',''),(7,0,10,1,1,28,'none',0.0,'[]','');

#
# Structure for table "onethink_testpaper_result"
#

DROP TABLE IF EXISTS `onethink_testpaper_result`;
CREATE TABLE `onethink_testpaper_result` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '试卷结果ID',
  `paperName` varchar(255) NOT NULL DEFAULT '' COMMENT '试卷名称',
  `testId` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '试卷ID',
  `userId` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '做卷人ID',
  `username` varchar(20) DEFAULT NULL,
  `score` float(10,1) unsigned NOT NULL DEFAULT '0.0' COMMENT '总分',
  `objectiveScore` float(10,1) unsigned NOT NULL DEFAULT '0.0' COMMENT '主观题得分',
  `subjectiveScore` float(10,1) unsigned NOT NULL DEFAULT '0.0' COMMENT '客观题得分',
  `teacherSay` text COMMENT '老师评价',
  `rightItemCount` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '正确题目数',
  `passedStatus` enum('none','passed','unpassed') NOT NULL DEFAULT 'none' COMMENT '考试通过状态，none表示该考试没有',
  `limitedTime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '试卷限制时间(秒)',
  `beginTime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '开始时间',
  `endTime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '结束时间',
  `updateTime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后更新时间',
  `active` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `status` enum('doing','paused','reviewing','finished') NOT NULL COMMENT '状态',
  `target` varchar(255) NOT NULL DEFAULT '' COMMENT '试卷结果所属对象',
  `checkTeacherId` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '批卷老师ID',
  `checkedTime` int(11) NOT NULL DEFAULT '0' COMMENT '批卷时间',
  `usedTime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='用户试卷';

#
# Data for table "onethink_testpaper_result"
#

INSERT INTO `onethink_testpaper_result` VALUES (1,'2018年低压电工特种作业操作证考试在线题库',10,1,'admin',0.0,0.0,0.0,NULL,0,'none',10,0,0,1537280886,0,'finished','',0,0,0);

#
# Structure for table "onethink_topics"
#

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='题库表';

#
# Data for table "onethink_topics"
#

/*!40000 ALTER TABLE `onethink_topics` DISABLE KEYS */;
/*!40000 ALTER TABLE `onethink_topics` ENABLE KEYS */;

#
# Structure for table "onethink_ucenter_admin"
#

DROP TABLE IF EXISTS `onethink_ucenter_admin`;
CREATE TABLE `onethink_ucenter_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '管理员ID',
  `member_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '管理员用户ID',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '管理员状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='管理员表';

#
# Data for table "onethink_ucenter_admin"
#

/*!40000 ALTER TABLE `onethink_ucenter_admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `onethink_ucenter_admin` ENABLE KEYS */;

#
# Structure for table "onethink_ucenter_app"
#

DROP TABLE IF EXISTS `onethink_ucenter_app`;
CREATE TABLE `onethink_ucenter_app` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '应用ID',
  `title` varchar(30) NOT NULL COMMENT '应用名称',
  `url` varchar(100) NOT NULL COMMENT '应用URL',
  `ip` char(15) NOT NULL COMMENT '应用IP',
  `auth_key` varchar(100) NOT NULL COMMENT '加密KEY',
  `sys_login` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '同步登陆',
  `allow_ip` varchar(255) NOT NULL COMMENT '允许访问的IP',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '应用状态',
  PRIMARY KEY (`id`),
  KEY `status` (`status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='应用表';

#
# Data for table "onethink_ucenter_app"
#

/*!40000 ALTER TABLE `onethink_ucenter_app` DISABLE KEYS */;
/*!40000 ALTER TABLE `onethink_ucenter_app` ENABLE KEYS */;

#
# Structure for table "onethink_ucenter_member"
#

DROP TABLE IF EXISTS `onethink_ucenter_member`;
CREATE TABLE `onethink_ucenter_member` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `username` char(16) NOT NULL COMMENT '用户名',
  `password` char(32) NOT NULL COMMENT '密码',
  `email` char(32) NOT NULL COMMENT '用户邮箱',
  `mobile` char(15) NOT NULL COMMENT '用户手机',
  `reg_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '注册时间',
  `reg_ip` bigint(20) NOT NULL DEFAULT '0' COMMENT '注册IP',
  `last_login_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `last_login_ip` bigint(20) NOT NULL DEFAULT '0' COMMENT '最后登录IP',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(4) DEFAULT '0' COMMENT '用户状态',
  `type` varchar(10) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COMMENT='用户表';

#
# Data for table "onethink_ucenter_member"
#

/*!40000 ALTER TABLE `onethink_ucenter_member` DISABLE KEYS */;
INSERT INTO `onethink_ucenter_member` VALUES (1,'admin','52ac10e5b741e71cb948b1a72f33d285','email1@qq.com','',1417682189,2130706433,1537426015,3682966960,1417682189,1,'1'),(2,'teacher1','fc0929fa52d0eeefaf5137232b13ea35','email2@qq.com','',1430056671,2130706433,1537102587,1032669985,1430056671,1,'1'),(3,'teacher2','fc0929fa52d0eeefaf5137232b13ea35','email3@qq.com','',1417685725,2130706433,1535199122,1032670198,1417685725,1,'1'),(4,'teacher3','fc0929fa52d0eeefaf5137232b13ea35','email4@qq.com','',1418222975,2130706433,1534175196,1901732268,1418222975,1,'1'),(5,'teacher4','fc0929fa52d0eeefaf5137232b13ea35','email5@qq.com','',1419820110,2130706433,1420186849,2130706433,1419820110,1,'1'),(6,'teacher5','fc0929fa52d0eeefaf5137232b13ea35','email6@qq.com','',1420254278,2130706433,1534175350,1901732268,1420254278,1,'1'),(7,'teacher6','fc0929fa52d0eeefaf5137232b13ea35','email7@qq.com','',1420305961,2130706433,1535104352,1032670198,1420305961,1,'1'),(8,'teacher7','fc0929fa52d0eeefaf5137232b13ea35','email8@qq.com','',1420306136,2130706433,1534175419,1901732268,1420306136,1,'1'),(9,'teacher8','fc0929fa52d0eeefaf5137232b13ea35','email9@qq.com','',1429800325,2130706433,1534175596,1901732268,1429800325,1,'1'),(10,'teacher9','fc0929fa52d0eeefaf5137232b13ea35','email10@qq.com','',1429801755,2130706433,1534175739,1901732268,1429801755,1,'1'),(11,'teacher10','fc0929fa52d0eeefaf5137232b13ea35','email11@qq.com','',1429886277,2130706433,1534175924,1901732268,1429886277,1,'1'),(16,'teacher11','fc0929fa52d0eeefaf5137232b13ea35','email12@qq.com','',1524315975,3071042821,1534175989,1901732268,1524315975,1,'1'),(17,'user1','fc0929fa52d0eeefaf5137232b13ea35','email13@qq.com','',1535102685,2032684708,1537024527,3070969914,1535102685,1,'1');
/*!40000 ALTER TABLE `onethink_ucenter_member` ENABLE KEYS */;

#
# Structure for table "onethink_ucenter_setting"
#

DROP TABLE IF EXISTS `onethink_ucenter_setting`;
CREATE TABLE `onethink_ucenter_setting` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '设置ID',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '配置类型（1-用户配置）',
  `value` text NOT NULL COMMENT '配置数据',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='设置表';

#
# Data for table "onethink_ucenter_setting"
#

/*!40000 ALTER TABLE `onethink_ucenter_setting` DISABLE KEYS */;
/*!40000 ALTER TABLE `onethink_ucenter_setting` ENABLE KEYS */;

#
# Structure for table "onethink_url"
#

DROP TABLE IF EXISTS `onethink_url`;
CREATE TABLE `onethink_url` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '链接唯一标识',
  `url` char(255) NOT NULL DEFAULT '' COMMENT '链接地址',
  `short` char(100) NOT NULL DEFAULT '' COMMENT '短网址',
  `status` tinyint(2) NOT NULL DEFAULT '2' COMMENT '状态',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_url` (`url`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='链接表';

#
# Data for table "onethink_url"
#

/*!40000 ALTER TABLE `onethink_url` DISABLE KEYS */;
/*!40000 ALTER TABLE `onethink_url` ENABLE KEYS */;

#
# Structure for table "onethink_user_token"
#

DROP TABLE IF EXISTS `onethink_user_token`;
CREATE TABLE `onethink_user_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "onethink_user_token"
#

/*!40000 ALTER TABLE `onethink_user_token` DISABLE KEYS */;
/*!40000 ALTER TABLE `onethink_user_token` ENABLE KEYS */;

#
# Structure for table "onethink_userdata"
#

DROP TABLE IF EXISTS `onethink_userdata`;
CREATE TABLE `onethink_userdata` (
  `uid` int(10) unsigned NOT NULL COMMENT '用户id',
  `type` tinyint(3) unsigned NOT NULL COMMENT '类型标识',
  `target_id` int(10) unsigned NOT NULL COMMENT '目标id',
  UNIQUE KEY `uid` (`uid`,`type`,`target_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "onethink_userdata"
#

/*!40000 ALTER TABLE `onethink_userdata` DISABLE KEYS */;
/*!40000 ALTER TABLE `onethink_userdata` ENABLE KEYS */;

#
# Structure for table "onethink_vod"
#

DROP TABLE IF EXISTS `onethink_vod`;
CREATE TABLE `onethink_vod` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '标题',
  `image` int(11) NOT NULL,
  `video` varchar(100) DEFAULT NULL,
  `categoryid` varchar(20) NOT NULL DEFAULT '0' COMMENT '分类',
  `content` text NOT NULL COMMENT '内容',
  `companyid` int(11) NOT NULL,
  `changetime` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '状态，-1：删除；0：禁用；1：启用；2：未审核',
  `createtime` int(11) NOT NULL COMMENT '创建时间',
  `category` int(11) NOT NULL COMMENT '分类',
  `view` int(10) NOT NULL DEFAULT '0',
  `price` float(10,2) NOT NULL DEFAULT '0.00' COMMENT '价格',
  `userId` varchar(10) DEFAULT NULL COMMENT '发布者ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COMMENT='点播管理';

#
# Data for table "onethink_vod"
#

/*!40000 ALTER TABLE `onethink_vod` DISABLE KEYS */;
INSERT INTO `onethink_vod` VALUES (10,'初二数学重难题秒杀技巧',134,'./Uploads/test.mp4','1','<img src=\"/Uploads/Editor/2018-05-09/5af2d0aa8cdfd.jpg\" alt=\"\" /><img src=\"/Uploads/Editor/2018-05-09/5af2d0b953263.jpg\" alt=\"\" />',0,1429105789,1,1423946096,0,16,0.00,NULL),(11,'“超级拼读”5天训练营-掌握背单词奥秘',135,'./Uploads/test.mp4','1','<img src=\"/Uploads/Editor/2018-05-09/5af2d0aa8cdfd.jpg\" alt=\"\" /><img src=\"/Uploads/Editor/2018-05-09/5af2d0b953263.jpg\" alt=\"\" />',0,1429105878,1,1429104726,0,14,0.00,NULL),(12,'39个单词搞定非谓语动词',136,'./Uploads/test.mp4','1','<img src=\"/Uploads/Editor/2018-05-09/5af2d0aa8cdfd.jpg\" alt=\"\" /><img src=\"/Uploads/Editor/2018-05-09/5af2d0b953263.jpg\" alt=\"\" />',0,1429457117,1,1429457117,0,28,0.00,NULL),(14,'英语的原理 死记硬背VS英语思维',131,'./Uploads/test.mp4','1','<img src=\"/Uploads/Editor/2018-05-09/5af2d0aa8cdfd.jpg\" alt=\"\" /><img src=\"/Uploads/Editor/2018-05-09/5af2d0b953263.jpg\" alt=\"\" />',0,1429105789,1,1423946096,0,19,0.00,NULL),(15,'7天训练之治愈系—结构的力量vs死记硬背',137,'./Uploads/test.mp4','1','<img src=\"/Uploads/Editor/2018-05-09/5af2d0aa8cdfd.jpg\" alt=\"\" /><img src=\"/Uploads/Editor/2018-05-09/5af2d0b953263.jpg\" alt=\"\" />',0,1429105878,1,1429104726,0,13,0.00,NULL),(16,'奥数思维派专题——几何城堡',142,'./Uploads/test.mp4','1','<img src=\"/Uploads/Editor/2018-05-09/5af2d0aa8cdfd.jpg\" alt=\"\" /><img src=\"/Uploads/Editor/2018-05-09/5af2d0b953263.jpg\" alt=\"\" />',0,1429457117,1,1429457117,0,14,0.00,NULL),(17,'新初一语文直播阅读写作目标班',132,'./Uploads/test.mp4','5,7,8','<img src=\"/Uploads/Editor/2018-05-09/5af2d0aa8cdfd.jpg\" alt=\"\" /><img src=\"/Uploads/Editor/2018-05-09/5af2d0b953263.jpg\" alt=\"\" /><a href=\"/del.html\">111111111111</a>',0,1535817228,1,1429457160,0,93,0.00,NULL),(18,'小学英语语法通关',133,'./Uploads/test.mp4','1','<img src=\"/Uploads/Editor/2018-05-09/5af2d0aa8cdfd.jpg\" alt=\"\" /><img src=\"/Uploads/Editor/2018-05-09/5af2d0b953263.jpg\" alt=\"\" />',0,1429105789,1,1423946096,0,16,0.00,NULL),(19,'初二数学重难题秒杀技巧',143,'./Uploads/test.mp4','1','<img src=\"/Uploads/Editor/2018-05-09/5af2d0aa8cdfd.jpg\" alt=\"\" /><img src=\"/Uploads/Editor/2018-05-09/5af2d0b953263.jpg\" alt=\"\" />',0,1429105878,1,1429104726,0,16,0.00,NULL),(20,'高考28天—数学抢分押题',146,'./Uploads/test.mp4','1','<img src=\"/Uploads/Editor/2018-05-09/5af2d0aa8cdfd.jpg\" alt=\"\" /><img src=\"/Uploads/Editor/2018-05-09/5af2d0b953263.jpg\" alt=\"\" />',0,1429457117,1,1429457117,0,502,0.00,NULL),(21,'高考语文最后40天冲刺及写作55分+',138,'./Uploads/test.mp4','7','<img src=\"/Uploads/Editor/2018-05-09/5af2d0aa8cdfd.jpg\" alt=\"\" /><img src=\"/Uploads/Editor/2018-05-09/5af2d0b953263.jpg\" alt=\"\" />',0,1535786437,1,1429457160,0,550,0.00,NULL),(22,'1小时征服雅思阅读最难Headings',139,'./Uploads/test.mp4','1','<img src=\"/Uploads/Editor/2018-05-09/5af2d0aa8cdfd.jpg\" alt=\"\" /><img src=\"/Uploads/Editor/2018-05-09/5af2d0b953263.jpg\" alt=\"\" />',0,1429105789,1,1423946096,0,501,0.00,NULL),(23,'巧治托福听力顽疾',145,'./Uploads/test.mp4','1','<img src=\"/Uploads/Editor/2018-05-09/5af2d0aa8cdfd.jpg\" alt=\"\" /><img src=\"/Uploads/Editor/2018-05-09/5af2d0b953263.jpg\" alt=\"\" />',0,1429105878,1,1429104726,0,500,0.00,NULL),(24,'雅思考官带你拿高分之雅思5分全程课',141,'./Uploads/test.mp4','1','<img src=\"/Uploads/Editor/2018-05-09/5af2d0aa8cdfd.jpg\" alt=\"\" /><img src=\"/Uploads/Editor/2018-05-09/5af2d0b953263.jpg\" alt=\"\" />',0,1429457117,1,1429457117,0,496,0.00,NULL),(25,'MissWu带你拿下雅思口语7分',140,'./Uploads/test.mp4','1','<img src=\"/Uploads/Editor/2018-05-09/5af2d0aa8cdfd.jpg\" alt=\"\" /><img src=\"/Uploads/Editor/2018-05-09/5af2d0b953263.jpg\" alt=\"\" />',0,1431612511,1,1429457160,0,522,10.00,NULL),(26,'万法归宗之英语语法速成全集',130,'./Uploads/test.mp4','1','<img src=\"/Uploads/Editor/2018-05-09/5af2d0aa8cdfd.jpg\" alt=\"\" /><img src=\"/Uploads/Editor/2018-05-09/5af2d0b953263.jpg\" alt=\"\" />',0,1525862641,1,1429457160,0,550,10.00,NULL),(27,'让你的思维导图从零到颜值爆表！',144,'./Uploads/test.mp4','1','<img src=\"/Uploads/Editor/2018-05-09/5af2d0aa8cdfd.jpg\" alt=\"\" /><img src=\"/Uploads/Editor/2018-05-09/5af2d0b953263.jpg\" alt=\"\" />',0,1431612511,1,1429457160,0,607,10.00,NULL);
/*!40000 ALTER TABLE `onethink_vod` ENABLE KEYS */;

#
# Structure for table "onethink_vod_category"
#

DROP TABLE IF EXISTS `onethink_vod_category`;
CREATE TABLE `onethink_vod_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(25) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `pid` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

#
# Data for table "onethink_vod_category"
#

/*!40000 ALTER TABLE `onethink_vod_category` DISABLE KEYS */;
INSERT INTO `onethink_vod_category` VALUES (1,'科目',1403507725,1531622558,1,0,0),(5,'语文',1429517860,1531622553,1,1,0),(7,'数学',1429518029,1531622554,1,1,0),(8,'英语',1429518042,1531622554,1,1,0);
/*!40000 ALTER TABLE `onethink_vod_category` ENABLE KEYS */;

#
# Structure for table "onethink_wenku"
#

DROP TABLE IF EXISTS `onethink_wenku`;
CREATE TABLE `onethink_wenku` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '标题',
  `image` int(11) NOT NULL COMMENT '图片',
  `file` varchar(100) DEFAULT NULL COMMENT '文件',
  `categoryid` varchar(20) NOT NULL DEFAULT '0' COMMENT '分类',
  `content` varchar(1000) NOT NULL COMMENT '内容',
  `companyid` int(11) NOT NULL,
  `changetime` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '状态，-1：删除；0：禁用；1：启用；2：未审核',
  `createtime` int(11) NOT NULL COMMENT '创建时间',
  `category` int(11) NOT NULL COMMENT '分类',
  `view` int(10) NOT NULL DEFAULT '0',
  `price` float(10,2) NOT NULL DEFAULT '0.00' COMMENT '价格',
  `userId` varchar(10) DEFAULT NULL COMMENT '发布者ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COMMENT='文库管理';

#
# Data for table "onethink_wenku"
#

/*!40000 ALTER TABLE `onethink_wenku` DISABLE KEYS */;
INSERT INTO `onethink_wenku` VALUES (9,'初二数学重难题秒杀技巧',142,'./Uploads/Download/2018-07-23/5b5589bc01bec.pdf','8','',0,1262278826,1,1262278826,0,39,0.00,NULL),(10,'1小时征服雅思阅读最难Headings',143,'./Uploads/Download/2018-07-23/5b5589bc01bec.pdf','6','',0,1429457248,1,1429457248,0,19,0.00,NULL),(11,'高考28天—数学抢分押题',144,'./Uploads/Download/2018-07-23/5b5589bc01bec.pdf','6','',0,1429457293,1,1429457293,0,17,0.00,NULL),(12,'高考语文最后40天冲刺及写作55分+',130,'./Uploads/Download/2018-07-23/5b5589bc01bec.pdf','2,3,4','',0,1535281800,1,1429457340,0,28,0.00,NULL),(13,'MissWu带你拿下雅思口语7分',131,'./Uploads/Download/2018-07-23/5b5589bc01bec.pdf','8','',0,1262278826,1,1262278826,0,23,0.00,NULL),(14,'万法归宗之英语语法速成全集',145,'./Uploads/Download/2018-07-23/5b5589bc01bec.pdf','6','',0,1429457248,1,1429457248,0,14,0.00,NULL),(15,'巧治托福听力顽疾',133,'./Uploads/Download/2018-07-23/5b5589bc01bec.pdf','6','',0,1429457293,1,1429457293,0,18,0.00,NULL),(16,'雅思考官带你拿高分之雅思5分全程课',132,'./Uploads/Download/2018-07-23/5b5589bc01bec.pdf','6','',0,1429457340,1,1429457340,0,20,0.00,NULL),(17,'英语的原理 死记硬背VS英语思维',138,'./Uploads/Download/2018-07-23/5b5589bc01bec.pdf','8','',0,1262278826,1,1262278826,0,41,0.00,NULL),(18,'7天训练之治愈系—结构的力量vs死记硬背',137,'./Uploads/Download/2018-07-23/5b5589bc01bec.pdf','6','',0,1429457248,1,1429457248,0,15,0.00,NULL),(19,'“超级拼读”5天训练营-掌握背单词奥秘',136,'./Uploads/Download/2018-07-23/5b5589bc01bec.pdf','6','',0,1429457293,1,1429457293,0,14,0.00,NULL),(20,'39个单词搞定非谓语动词',139,'./Uploads/Download/2018-07-23/5b5589bc01bec.pdf','6','',0,1429457340,1,1429457340,0,14,0.00,NULL),(21,'小学英语语法通关',140,'./Uploads/Download/2018-07-23/5b5589bc01bec.pdf','8','',0,1262278826,1,1262278826,0,21,0.00,NULL),(22,'初二数学重难题秒杀技巧',135,'./Uploads/Download/2018-07-23/5b5589bc01bec.pdf','6','',0,1429457248,1,1429457248,0,12,0.00,NULL),(23,'奥数思维派专题——几何城堡',134,'./Uploads/Download/2018-07-23/5b5589bc01bec.pdf','6','',0,1429457293,1,1429457293,0,14,0.00,NULL),(24,'新初一语文直播阅读写作目标班',140,'./Uploads/Download/2018-07-23/5b5589bc01bec.pdf','6','',0,1429457340,1,1429457340,0,52,0.00,NULL);
/*!40000 ALTER TABLE `onethink_wenku` ENABLE KEYS */;

#
# Structure for table "onethink_wenku_category"
#

DROP TABLE IF EXISTS `onethink_wenku_category`;
CREATE TABLE `onethink_wenku_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(25) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `pid` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

#
# Data for table "onethink_wenku_category"
#

/*!40000 ALTER TABLE `onethink_wenku_category` DISABLE KEYS */;
INSERT INTO `onethink_wenku_category` VALUES (1,'科目',1262278574,1531622642,1,0,0),(2,'英语',1262278590,1531622652,1,1,0),(3,'数学',1262278603,1531622648,1,1,0),(4,'语文',1262278616,1531622645,1,1,0);
/*!40000 ALTER TABLE `onethink_wenku_category` ENABLE KEYS */;
