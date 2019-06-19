<?php

namespace Product\Controller;
use Live\Api\SecretUtilTools;
use Think\Controller;

/**
 * Class IndexController
 * @package Shop\Controller
 */
class AuctionController extends Controller
{
    /**
     * 初始化
     */
    protected $_model="Product";
    protected $_modelname="产品";
    protected $datamodel;
    protected $categorymodel;
	
	protected $des;
	protected $pricedata=array("22"=>array("0","500"),"23"=>array("500","1000"),"24"=>array("1000","2000"),"25"=>array("2000","5000"),"26"=>array("5000","10000"),"27"=>array("10000","20000"),"28"=>array("20000","50000"),"29"=>array("90000","500000"));
    public function _initialize()
    { 
		$this->datamodel = D($this->_model.'/'.$this->_model);
		$this->categorymodel = D($this->_model.'/'.$this->_model.'Category');
		
		$tree = $this->categorymodel->getTree(47);
		$tree=array($tree);
        $this->assign('tree', $tree);
		//var_dump($tree);
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
        //var_dump($tree);
        $this->assign('menu_list', $menu_list);
		
		$this->des = new SecretUtilTools();
		//dump($this->des->encrypt('wefwefwe'));
    }

    /*
     * 首页
     */
    public function index($page = 1,$count =16, $category_id = 0)
    {
		 
	    $map['status'] = 1;
		 
		if(!empty(I("ticai")))
		{
			//echo I("ticai");
			$map['ticai'] = I("ticai");
		}
		if(!empty(I("chicun")))
		{
			//echo I("chicun");
			$map['chicun'] = I("chicun");
		}
		if(!empty(I("price")))
		{
			//echo I("price");
			$map['price'] = array('between',$this->pricedata[I("price")]);
		}
		$map['categoryid']=43;
        $goods_list = $this->datamodel->where($map)->order('view desc')->page($page, $count )->select();
        //echo $this->datamodel->_sql();
		$totalCount = $this->datamodel->where($map)->count();
		$this->assign('contents', $goods_list);
		$this->assign('totalPageCount', $totalCount);
		$this->assign('count', $count);
		 
		$this->display();
    }
    public function Detail($id = 0,$category=1)
    {
        $data = $this->datamodel->find($id);
        if (!$data) {
            $this->error('404 not found');
        }
		//die($data["chicun"]);
		$category_ticai = $this->categorymodel->where(array('pid'=>1))->order('id asc')->select();
		$ticai = array_combine(array_column($category_ticai, 'id'), array_column($category_ticai, 'title'));
		$ticai[0]="";
		
		$category_chicun = $this->categorymodel->where(array('pid'=>2))->order('id asc')->select();
		$chicun = array_combine(array_column($category_chicun, 'id'), array_column($category_chicun, 'title'));
		$chicun[0]="";	
		
        $data["ticai"]=$ticai[$data["ticai"]];			
		$data["chicun"]=$chicun[$data["chicun"]];	
		
		$bigimg=array();
		for($i=1;$i<6;$i++)
		{
		  if($data["image".$i]!="0")
		  {
			$bigimg[]=get_cover($data["image".$i],"path");
		  }
		}
	    
		$data["bigimg"]=$bigimg; 
		if($data["teacherid"]!="0")
		{
			 $teacher=D('Admin/Member')->where(array('uid'=>$data["teacherid"]))->select();
			 if($teacher)
			 {
				 $data["teacher"]=$teacher[0]["nickname"];
			 }
		}
		$this->assign('data', $data);
		
        //var_dump($data);
		$categorymap['status'] = 1;
        $categorymap['id'] = $category;
		$categorydata = $this->categorymodel->where($categorymap)->order('createtime desc')->select();
		//dump($categorydata[0]['title']);
				/* 更新浏览数 */
		$map = array('id' => $id);
		$this->datamodel->where($map)->setInc('view');
		
		$this->assign('categorytitle', $categorydata[0]['title']);
		
		        //查看最多
		$hotmap['status'] = 1;

        $hotdata = $this->datamodel->where($hotmap)->order('id desc')->limit(10)->select();
        $this->assign('hotdata', $hotdata);
		
		$this->display();
    }
    public function cart($id = 0)
    {
        $data = $this->datamodel->find($id);
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