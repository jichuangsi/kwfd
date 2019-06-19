<?php

/**
 * 安装程序配置文件
 */

define('INSTALL_APP_PATH', realpath('./') . '/');

return array(

    'ORIGINAL_TABLE_PREFIX' => 'ocenter_', //默认表前缀

    /* 模板相关配置 */
    'TMPL_PARSE_STRING' => array(
        '__STATIC__' => __ROOT__ . '/Public/static',
        '__ADDONS__' => __ROOT__ . '/Public/' . MODULE_NAME . '/Addons',
        '__IMG__' => __ROOT__ . '/Public/' . MODULE_NAME . '/images',
        '__CSS__' => __ROOT__ . '/Public/' . MODULE_NAME . '/css',
        '__JS__' => __ROOT__ . '/Public/' . MODULE_NAME . '/js',
        '__ZUI__'=>__ROOT__.'/Public/zui',
        '__NAME__'=>'集创思在线教学系统',
        '__COMPANY__'=>'深圳市明天见科技有限公司',
        '__WEBSITE__'=>'www.zaixianjiaoxue.net',
        '__COMPANY_WEBSITE__'=>'www.mingtianjian.net'
    ),
    /* URL配置 */
    'URL_MODEL' => 3, //URL模式
    'DEFAULT_THEME' =>  'default',  // 默认模板主题名称
    'SESSION_PREFIX' => 'openedu', //session前缀
    'COOKIE_PREFIX' => 'openedu_', // Cookie前缀 避免冲突

    //设置session普通存储，安装完成后，系统会配置Session数据库存储——实现用户在线统计
    'SESSION_TYPE'          => '',           //设置session普通存储


);