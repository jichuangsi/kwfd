<?php

namespace News\Controller;

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
	protected $_model="News";
    protected $_modelname="新闻";
    protected $datamodel;
    protected $categorymodel;
    public function _initialize()
    { 
	    $this->datamodel = D($this->_model.'/'.$this->_model);
		$this->categorymodel = D($this->_model.'Category');
 

        $tree = $this->categorymodel->getTree(1);
 
		$tree=array($tree);
 
		//var_dump($tree);
        $this->assign('tree', $tree);
		
        /*
		$tree = D('NewsCategory')->getTree();
        $this->assign('tree', $tree);
        $menu_list = array(
            'left' =>
                array(
                    array('tab' => 'all', 'title' => '全部', 'href' => U('index')),
                )
        );
        foreach ($tree as $category) {
            $menu = array('tab' => 'category_' . $category['id'], 'title' => $category['title'], 'href' => U('index', array('category_id' => $category['id'])));
            if ($category['_']) {
                $menu['children'][] = array( 'title' => '全部', 'href' => U('index', array('category_id' => $category['id'])));
                foreach ($category['_'] as $child)
                    $menu['children'][] = array( 'title' => $child['title'], 'href' => U('index', array('category_id' => $child['id'])));
            }
            $menu_list['left'][] = $menu;
        }

        $this->assign('menu_list', $menu_list);
		*/
    }
    /*
     * 首页
     */
    public function index($page = 1,$count =10, $categoryid = 0)
    {
	    $map['status'] = 1;
		if(!empty(I("categoryid")))
		{
			//$map['categoryid'] = I("categoryid");
			$categoryarr=explode("_",$categoryid);
			//$map['_string'] = 'status=1 AND score>10';
			$map['_string'] = '0=0';
			foreach($categoryarr as $key=>$val)
			{
				$map['_string'].= ' AND instr(CONCAT(",",categoryid,","),",'.$val.',")>0';
			} 
		} 
		if(!empty(I("price")))
		{
			//echo I("price");
			$map['price'] = array('between',$this->pricedata[I("price")]);
		}
		
        $goods_list = $this->datamodel->where($map)->order('id desc')->page($page, $count )->select();
        //var_dump($goods_list);
		//echo $this->datamodel->_sql();
		$totalCount = $this->datamodel->where($map)->count();
		$this->assign('contents', $goods_list);
		$this->assign('totalPageCount', $totalCount);
		$this->assign('count', $count);
		
       // dump( 'category_'.intval($category_id));exit;
        //查看最多
		unset($map);
		$map['status'] = 1;
        $hotdata = $this->datamodel->where($map)->order('view desc')->limit(10)->select();
        $this->assign('hotdata', $hotdata);
 
        $this->display();
    }
    public function Detail($id = 0,$category=1)
    {
        $data = D('News')->find($id);
        if (!$data) {
            $this->error('404 not found');
        }
		$this->assign('data', $data);
        //dump($data);
		$categorymap['status'] = 1;
        $categorymap['id'] = $category;
		$categorydata = D('NewsCategory')->where($categorymap)->order('createtime desc')->select();
		//dump($categorydata[0]['title']);
				/* 更新浏览数 */
		$map = array('id' => $id);
		D('News')->where($map)->setInc('view');
		
		$this->assign('categorytitle', $categorydata[0]['title']);
		
		        //查看最多
		$hotmap['status'] = 1;
        $hotdata = D('News')->where($hotmap)->order('view desc')->limit(10)->select();
        $this->assign('hotdata', $hotdata);
		
		$this->display();
    }
}