<?php

namespace Room\Controller;

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
    public function index($page = 1, $categoryid = 0)
    {
		$category_id = intval($categoryid);
        $goods_category = D('RoomCategory')->find($category_id);
        if ($category_id != 0) {
            $category_id = intval($category_id);
            $goods_categorys = D('RoomCategory')->where("id=%d OR pid=%d", array($category_id, $category_id))->limit(999)->select();
            $ids = array();
            foreach ($goods_categorys as $v) {
                $ids[] = $v['id'];
            }
            $map['categoryid'] = array('in', implode(',', $ids));
        }

        $map['status'] = 1;
        $goods_list = D('Room')->where($map)->order('createtime desc')->page($page, 8)->field(true)->select();
        $totalCount = D('Room')->where($map)->count();
        foreach ($goods_list as &$v) {
            $v['category'] = D('RoomCategory')->field('id,title')->find($v['category_id']);
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
            $cate_name = D('RoomCategory')->where(array('id' => $top_category_id))->getField('title');
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
		$map['status'] = 1;
        $hotdata = D('Room')->where($map)->order('view desc')->limit(10)->select();
        $this->assign('hotdata', $hotdata);
        $this->display();
    }
    public function Detail($id = 0,$category=1)
    {
        $data = D('Room')->find($id);
        if (!$data) {
            $this->error('404 not found');
        }
		$this->assign('data', $data);
        //dump($data);
		$categorymap['status'] = 1;
        $categorymap['id'] = $category;
		$categorydata = D('RoomCategory')->where($categorymap)->order('createtime desc')->select();
		//dump($categorydata[0]['title']);
				/* 更新浏览数 */
		$map = array('id' => $id);
		D('Room')->where($map)->setInc('view');
		
		$this->assign('categorytitle', $categorydata[0]['title']);
		
		        //查看最多
		$hotmap['status'] = 1;
        $hotdata = D('Room')->where($hotmap)->order('view desc')->limit(10)->select();
        $this->assign('hotdata', $hotdata);
		
		$this->display();
    }
}