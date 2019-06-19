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