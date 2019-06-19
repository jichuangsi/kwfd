<?php

namespace Coursecenter\Controller;

use Think\Controller;

/**
 * Class IndexController
 * @package Shop\Controller
 */
class IndexController extends Controller
{
    /**
     * 初始化
     */
    public function _initialize()
    {
		if(!is_remote_login()){// 还没登录 跳转到登录页面
           $this->redirect('Usercenter/Index/login');
        }
        if(session('remote_user_auth.companyid')=="0")
		{
           $this->error('对不起，你没有访问企业专区权限！');
		}
    }
    /*
     * 首页
     */
    public function index($page = 1, $r = 20)
    {
		$this->display();
    }
    public function shop($page = 1, $r = 20)
    {
		$this->display();
    }
    public function notice($page = 1, $r = 20)
    {
		$this->display();
    }
    public function aboutus($page = 1, $r = 20)
    {
		$this->display();
    }
}