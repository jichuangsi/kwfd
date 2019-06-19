<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 蒲公英在线教学 <2014058008@qq.com> <http://www.zaixianjiaoxue.net>
// +----------------------------------------------------------------------

namespace Home\Controller;
use OT\DataDictionary;

/**
 * 前台首页控制器
 * 主要获取首页聚合数据
 */
class IndexController extends HomeController {
	//系统首页
    public function index($page = 1, $r = 5){
	//dump("<br><br><br><br>");
	//dump(session('remote_user_auth'));
	    $map['status'] = 1;
		$map['companyid'] = session('remote_user_auth.companyid');
        $data = D('News')->where($map)->order('createtime desc')->page($page, $r)->select();
		$this->assign('data', $data);
        //dump($data);
		$this->display();
    }

}