<?php

namespace Download\Controller;

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
		$tree = D('DownloadCategory')->getTree();
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
    public function index($page = 1, $category_id = 0)
    {
		$category_id = intval($category_id);
        $goods_category = D('DownloadCategory')->find($category_id);
        if ($category_id != 0) {
            $category_id = intval($category_id);
            $goods_categorys = D('DownloadCategory')->where("id=%d OR pid=%d", array($category_id, $category_id))->limit(999)->select();
            $ids = array();
            foreach ($goods_categorys as $v) {
                $ids[] = $v['id'];
            }
            $map['categoryid'] = array('in', implode(',', $ids));
        }

        $map['status'] = 1;
        $goods_list = D('Download')->where($map)->order('createtime desc')->page($page, 8)->field(true)->select();
        $totalCount = D('Download')->where($map)->count();
        foreach ($goods_list as &$v) {
            $v['category'] = D('DownloadCategory')->field('id,title')->find($v['category_id']);
        }
		//dump($goods_list);
        unset($v);
        $this->assign('contents', $goods_list);
        $this->assign('totalPageCount', $totalCount);
        $top_category_id = $goods_category['pid'] == 0 ? $goods_category['id'] : $goods_category['pid'];
        $this->assign('top_category', $top_category_id);
        $this->assign('category_id', $category_id);
		
        if ($top_category_id == $category_id) {
            $cate_name = $goods_category['title'];
            $this->assign('category_name', $cate_name);
        } else {
            $cate_name = D('DownloadCategory')->where(array('id' => $top_category_id))->getField('title');
            $this->assign('category_name', $cate_name);
            $this->assign('child_category_name', $goods_category['title']);
        }
		
        $this->setTitle('{$category_name|op_t}' . ' 商城');
        $this->setKeywords('{$category_name|op_t}' . ', 商城');
		
        if($category_id==0){
            $this->assign('current', 'all');
        }else{
            $this->assign('current', 'category_'.$top_category_id);
        }
		
       // dump( 'category_'.intval($category_id));exit;
        //查看最多
		unset($map);				
		$map['status'] = 1;
        $hotdata = D('Download')->where($map)->order('view desc')->limit(10)->select();
        $this->assign('hotdata', $hotdata);
		
		$tree = D('DownloadCategory')->getTree();
        $this->assign('tree', $tree);
		
        $this->display();
    }
    public function Detail($id = 0,$category=1)
    {       
	   $data = D('Download')->find($id);
        if (!$data) {
            $this->error('404 not found');
        }
		$this->assign('data', $data);
        //dump($data);
		$categorymap['status'] = 1;
        $categorymap['id'] = $category;
		$categorydata = D('DownloadCategory')->where($categorymap)->order('createtime desc')->select();
		//dump($categorydata[0]['title']);
				/* 更新浏览数 */
		$map = array('id' => $id);
		D('Download')->where($map)->setInc('view');
		
		$this->assign('categorytitle', $categorydata[0]['title']);
		
		        //查看最多
		$hotmap['status'] = 1;
        $hotdata = D('Download')->where($hotmap)->order('view desc')->limit(10)->select();
        $this->assign('hotdata', $hotdata);
		
		$this->display();
    }
    public function cart($id = 0)
    {
        $data = D('Download')->find($id);
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
    function get_url() {
        $sys_protocal = isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://';
        $php_self = $_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
        $path_info = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
        $relate_url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : $php_self.(isset($_SERVER['QUERY_STRING']) ? '?'.$_SERVER['QUERY_STRING'] : $path_info);
        return $sys_protocal.(isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '').$relate_url;
 }	
}