<?php

namespace Teacher\Controller;
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
    protected $_model="Product";
    protected $_modelname="产品";
    protected $datamodel;
    protected $categorymodel;
	
	protected $des;
	
    public function _initialize()
    { 
		$this->datamodel = D('Admin/Member');
		$this->categorymodel = D($this->_model.'/'.$this->_model.'Category');
		
		$tree = D('Live/LiveCategory')->getTree();
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
		
		$this->des = new SecretUtilTools();
		//dump($this->des->encrypt('wefwefwe'));
    }

    /*
     * 首页
     */
    public function index($page = 1,$count =10, $categoryid = 0)
    {
		
	    $map['m.status'] = 1;
		$map['m.isteacher'] = 1;
		//$map['f.field_id'] = 3;
		if(!empty(I("categoryid")))
		{
			//$map['categoryid'] = I("categoryid");
			$categoryarr=explode("_",$categoryid);
			//$map['_string'] = 'status=1 AND score>10';
			$map['_string'] = '0=0';
			foreach($categoryarr as $key=>$val)
			{
				$map['_string'].= ' AND instr(CONCAT(",",m.categoryid,","),",'.$val.',")>0';
			} 
		} 
		$teachers = M("Member")->alias("m")->field('m.*,CASE WHEN ISNULL(a.path) THEN "Addons/Avatar/default.jpg" ELSE CONCAT("Uploads/Avatar/",a.path) end as path,f.field_data as info')->join(C('DB_PREFIX').'avatar a ON m.uid=a.uid','LEFT')->join('(select * from '.C('DB_PREFIX').'field where field_id=3) f ON m.uid=f.uid','LEFT')->where($map)->order('m.uid asc')->page($page, $count )->select();
        //dump(M("Member")->_sql());
        $totalCount = M("Member")->alias("m")->field('m.*,CASE WHEN ISNULL(a.path) THEN "Addons/Avatar/default.jpg" ELSE CONCAT("Uploads/Avatar/",a.path) end as path,f.field_data as info')->join(C('DB_PREFIX').'avatar a ON m.uid=a.uid','LEFT')->join('(select * from '.C('DB_PREFIX').'field where field_id=3) f ON m.uid=f.uid','LEFT')->where($map)->count();
		//dump($teachers);
		$this->assign('contents', $teachers);
		$this->assign('totalPageCount', $totalCount);
		$this->assign('count', $count);
		$this->display();
    }
    public function Detail($id = 0,$page = 1,$count =12)
    {
		 
        //$data = $this->datamodel->find($id);
	    $map['m.status'] = 1;
		$map['m.isteacher'] = 1;
		$map['m.uid'] = $id;
		$data = M("Member")->alias("m")->field('m.*,CASE WHEN ISNULL(a.path) THEN "Addons/Avatar/default.jpg" ELSE CONCAT("Uploads/Avatar/",a.path) end as path,f.field_data as info')->join(C('DB_PREFIX').'avatar a ON m.uid=a.uid','LEFT')->join('(select * from '.C('DB_PREFIX').'field where field_id=3) f ON m.uid=f.uid','LEFT')->where($map)->select();
        //dump($data);
        if (!$data) {
            $this->error('404 not found');
        }
 
		$this->assign('data', $data[0]);
		
 
		//老师课程
		$hotmap['status'] = 1;
		$hotmap['teacherid'] = $data[0]["uid"];
		$hotdata = D("Live/Live")->where($hotmap)->order('id desc')->page($page,$count)->select();
		$totalCount = D("Live/Live")->where($hotmap)->count();

        $this->assign('hotdata', $hotdata);
		$this->assign('totalPageCount', $totalCount);
		$this->assign('count', $count);
		//var_dump($hotdata);
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