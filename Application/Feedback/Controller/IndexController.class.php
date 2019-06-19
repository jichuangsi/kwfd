<?php

namespace Feedback\Controller;
use Live\Api\SecretUtilTools;
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
    }

    /*
     * 首页
     */
    public function index()
    {
	   
		$this->display();
    }
    /*
     * 首页
     */
    public function save()
    {
		if(IS_POST)
		{
		   
          if(!check_verify($_POST["verifycode"]))
	      {
            $this->error('验证码输入错误！');
          }
		  $data['contact']=$_POST["contact"];
		  $data['mobile']=$_POST["mobile"];
		  $data['weixin']=$_POST["weixin"];
		  $data['qq']=$_POST["qq"];
		  $data['content']=$_POST["content"];
		  $data['status'] = 1;
          $data['changetime'] = time();
		  $data['createtime'] = time();
          D('Feedback')->add($data);
		  $this->success('留言成功', U('Home/Index/index'));
		}
    }
	public function verify(){
        $verify = new \Think\Verify();
        $verify->entry(1);
    }
}