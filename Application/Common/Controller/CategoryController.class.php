<?php

namespace Common\Controller;

use Think\Controller;

class CategoryController extends Controller
{
    /**
     * 初始化
     */
    public function _initialize()
    { 
        
    }

    public function ShowCategory($tree)
    {
	   $this->assign('tree', $tree);
	   $this->display('./Application/Common/View/Public/Category.html');
    }
    public function ShowHCategory($tree)
    {
	   $this->assign('tree', $tree);
	   $this->display('./Application/Common/View/Public/HCategory.html');
    }
	public function ShowNoTitleCategory($tree,$url="#")
    {
	   $this->assign('tree', $tree);
	   $this->assign('url', $url);
	   $this->display('./Application/Common/View/Public/NoTitleCategory.html');
    }
}