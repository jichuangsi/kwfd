<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 蒲公英在线教学 <2014058008@qq.com> <http://www.zaixianjiaoxue.net>
// +----------------------------------------------------------------------

/**
 * 前台配置文件
 * 所有除开系统级别的前台配置
 */

return array(

    // 预先加载的标签库
    'TAGLIB_PRE_LOAD' => 'OT\\TagLib\\Article,OT\\TagLib\\Think',

    /* 主题设置 */
    'DEFAULT_THEME' => 'default', // 默认模板主题名称

    /* SESSION 和 COOKIE 配置 */
    //'SESSION_PREFIX' => 'onethink_home', //session前缀
    //'COOKIE_PREFIX' => 'onethink_home_', // Cookie前缀 避免冲突
    'SESSION_PREFIX' => $_SERVER['HTTP_HOST'], //session前缀
    'COOKIE_PREFIX' => $_SERVER['HTTP_HOST'].'_', // Cookie前缀 避免冲突

    /* 模板相关配置 */
    'TMPL_PARSE_STRING' => array(
        '__STATIC__' => __ROOT__ . '/Public/static',
        '__ADDONS__' => __ROOT__ . '/Public/' . MODULE_NAME . '/Addons',
        '__IMG__' => __ROOT__ . '/Public/' . MODULE_NAME . '/images',
        '__CSS__' => __ROOT__ . '/Public/' . MODULE_NAME . '/css',
        '__JS__' => __ROOT__ . '/Public/' . MODULE_NAME . '/js',
    ),




    'NEED_VERIFY'=>true,//此处控制默认是否需要审核，该配置项为了便于部署起见，暂时通过在此修改来设定。

/* 支付设置 */
    'payment' => array(
        'tenpay' => array(
            // 加密key，开通财付通账户后给予
            'key' =>  C('TENPAYKEY'),
            // 合作者ID，财付通有该配置，开通财付通账户后给予
            'partner' => C('TENPAYPARTNER')
        ),
        'alipay' => array(
            // 收款账号邮箱
            'email' =>C('ALIPAYEMAIL'),
            // 加密key，开通支付宝账户后给予
            'key' => C('ALIPAYKEY'),
            // 合作者ID，支付宝有该配置，开通易宝账户后给予
            'partner' => C('ALIPAYPARTNER')
        ),
        'palpay' => array(
            'business' =>  C('PALPAYPARTNER')
        ),
        'yeepay' => array(
            'key' =>  C('YEEPAYPARTNER'),
            'partner' =>  C('YEEPAYKEY')
        ),
        'kuaiqian' => array(
            'key' =>  C('KUAIQIANPARTNER'),
            'partner' =>  C('KUAIQIANKEY')
        ),
        'unionpay' => array(
            'key' =>  C('UNIONPARTNER'),
            'partner' =>  C('UNIONKEY')
        )
    ),
//支付宝配置参数
 'alipay_config'=>array(
       'partner' =>C('ALIPAYPARTNER'),   //这里是你在成功申请支付宝接口后获取到的PID,通过后台配置读取；
    'key'=>C('ALIPAYKEY'),//这里是你在成功申请支付宝接口后获取到的Key.通过后台配置读取
    'sign_type'=>strtoupper('MD5'),
    'input_charset'=> strtolower('utf-8'),
    'cacert'=> getcwd().'\\cacert.pem',
    'transport'=> 'http',
      ),
     //以上配置项，是从接口包中alipay.config.php 文件中复制过来，进行配置；
    
 'alipay'   =>array(
 //这里是卖家的支付宝账号，也就是你申请接口时注册的支付宝账号
 'seller_email'=>'pay@xxx.com',
 //这里是异步通知页面url，提交到项目的Pay控制器的notifyurl方法；
 'notify_url'=>'http://www.ijquery.net/Pay/notifyurl', 
 //这里是页面跳转通知url，提交到项目的Pay控制器的returnurl方法；
 'return_url'=>'http://www.ijquery.net/Pay/returnurl',
 //支付成功跳转到的页面，我这里跳转到项目的User控制器，myorder方法，并传参payed（已支付列表）
 'successpage'=>'User/myorder?ordtype=payed',   
 //支付失败跳转到的页面，我这里跳转到项目的User控制器，myorder方法，并传参unpay（未支付列表）
 'errorpage'=>'User/myorder?ordtype=unpay', 
 )
);
