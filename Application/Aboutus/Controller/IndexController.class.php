<?php

namespace Aboutus\Controller;
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
    protected $_model="Aboutus";
    protected $_modelname="产品";
    protected $datamodel;
    protected $categorymodel;
	
 
    public function _initialize()
    { 
		$this->datamodel = D($this->_model.'/'.$this->_model);
		$this->categorymodel = D($this->_model.'/'.$this->_model.'Category');
		
		$tree = D($this->_model.'Category')->getTree();
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
        //var_dump($menu_list);
        $this->assign('menu_list', $menu_list);
		
 
    }
	
    /*
     * 首页
     */
    public function index($page = 1,$count =16, $category_id = 0)
    {
		
	    $map['status'] = 1;
 
        $goods_list = $this->datamodel->where($map)->order('view desc')->page($page, $count )->select();
        //echo $this->datamodel->_sql();
		$totalCount = $this->datamodel->where($map)->count();
		$this->assign('contents', $goods_list);
		$this->assign('totalPageCount', $totalCount);
		$this->assign('count', $count);
		 
		$this->display();
    }
    public function Detail($id = 0)
    {
 
		$this->assign('data', $data);
		
        $data = $this->datamodel->find($id);
        if (!$data) {
            $this->error('404 not found');
        }
	
		$this->assign('data', $data);
		
		$map['status']=1;
		$lists = $this->datamodel->where($map)->order('sort asc')->select();
        
		$this->assign('lists', $lists);
		
		$this->display();
    }
	public function Common($id = 0)
    {

	
		$this->assign('data', $data);
		
        $data = $this->datamodel->find($id);
        if (!$data) {
            $this->error('404 not found');
        }
	
		$this->assign('data', $data);
		
		$map['status']=1;
		$lists = $this->datamodel->where($map)->select();
        
		$this->assign('lists', $lists);
		
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