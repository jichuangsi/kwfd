<?php

namespace Vod\Controller;

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
	protected $_model="Vod";
    protected $_modelname="点播";
    protected $datamodel;
    protected $categorymodel;
	
    public function _initialize()
    { 
        $this->datamodel = D($this->_model.'/'.$this->_model);
		$this->categorymodel = D($this->_model.'/'.$this->_model.'Category');
 
        $tree = $this->categorymodel->getTree();
		//$tree=array($tree);
 
		//var_dump($tree);
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

    }
    /*
     * 首页
     */
     public function index($page = 1,$count =20, $categoryid = 0)
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
		
        $goods_list = $this->datamodel->where($map)->order('id desc,view desc')->page($page, $count )->select();
        //echo $this->datamodel->_sql();
		$totalCount = $this->datamodel->where($map)->count();
		$this->assign('contents', $goods_list);
		$this->assign('totalPageCount', $totalCount);
		$this->assign('count', $count);
		 
		$this->display();
    }
    public function Detail($id = 0,$category=1)
    {
        $data = D('Vod')->find($id);
        if (!$data) {
            $this->error('404 not found');
        }
		$this->assign('data', $data);
        //dump($data);
		$categorymap['status'] = 1;
        $categorymap['id'] = $category;
		$categorydata = D('VodCategory')->where($categorymap)->order('createtime desc')->select();
		//dump($categorydata[0]['title']);
				/* 更新浏览数 */
		$map = array('id' => $id);
		D('Vod')->where($map)->setInc('view');
		
		$this->assign('categorytitle', $categorydata[0]['title']);
		
		        //查看最多
		$hotmap['status'] = 1;
        $hotdata = D('Vod')->where($hotmap)->order('view desc')->limit(10)->select();
        $this->assign('hotdata', $hotdata);
		
		$this->display();
    }
    public function cart($id = 0)
    {
        $data = D('Vod')->find($id);
        if (!$data) {
            $this->error('404 not found');
        }
		$data['name']=$data['title'];
		$data['qty']=1;
		$data['MODULE_NAME']=MODULE_NAME;
		$data['url']=$_SERVER['HTTP_REFERER'];
		//dump($data);	
		$cart=A('Cart/Index');
		$cart->insert($data);
    }
}