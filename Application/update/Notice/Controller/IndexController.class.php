<?php

namespace Notice\Controller;

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
        $map['status'] = 1;
		$map['companyid'] = session('remote_user_auth.companyid');
        $data = D('Notice')->where($map)->order('createtime desc')->page($page, $r)->select();
		$this->assign('data', $data);
        //dump($data);
		$this->display();
    }
    /*
     * 商品详情页
     * @param int $id
     */
    public function Detail($id = 0)
    {
        $data = D('Notice')->find($id);
        if (!$data) {
            $this->error('404 not found');
        }
		$this->assign('data', $data);
        //dump($data);
		$this->display();
    }
    public function train()
    {
		$this->display();
    }
    public function custom()
    {
		$this->display();
    }
}