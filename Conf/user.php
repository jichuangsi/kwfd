<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

/**
 * UCenter客户端配置文件
 * 注意：该配置文件请使用常量方式定义
 */
define('UC_RESET_PW', '123456');
//本地ucenter
define('UC_APP_ID', 1); //应用ID
define('UC_API_TYPE', 'Model'); //可选值 Model / Service
define('UC_AUTH_KEY', '>|Zvb$wE^Jhmp;kd_goi4)PF75@yqK<3QeU6~=sT'); //加密KEY
define('UC_DB_DSN', 'mysqli://root:root@127.0.0.1:3306/jcszaixian'); // 数据库连接，使用Model方式调用API必须配置此项
define('UC_TABLE_PREFIX', 'onethink_'); // 数据表前缀，使用Model方式调用API必须配置此项
//远程ucenter
define('UC_REMOTE', true); // 设置远程地址调用ucenter
/* define('UC_API', 'http://192.168.31.123:84');
define('UC_KEY', 'a922twFcYQFzURPysChok6puc/DaDuMoeAwhP/g');
define('UC_APPID', '4'); */
//define('UC_API', 'http://192.168.100.34:96');
define('UC_API', 'http://192.168.31.108:96');
define('UC_KEY', 'a922twFcYQFzURPysChok6puc/DaDuMoeAwhP/g');
define('UC_APPID', '1');
/* define('UC_API', 'http://ucenter.jichuangsi.com');
define('UC_KEY', '437azmaCOegEtHieExs6AwFb/Bd6X2lrwdeSD7I');
define('UC_APPID', '3'); */
define('UC_IP', ''); // 远程地址调用ucenter
define('UC_CHARSET', 'utf-8');
define('UC_PPP', '20');
define('UC_SYNC', 1);
