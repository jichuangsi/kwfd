<?php

namespace Settled\Controller;
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
	
	protected $des;
	protected $pricedata=array("22"=>array("0","500"),"23"=>array("500","1000"),"24"=>array("1000","2000"),"25"=>array("2000","5000"),"26"=>array("5000","10000"),"27"=>array("10000","20000"),"28"=>array("20000","50000"),"29"=>array("90000","500000"));
    public function _initialize()
    { 
		$this->datamodel = D($this->_model.'/'.$this->_model);
		$this->categorymodel = D($this->_model.'/'.$this->_model.'Category');
		
		$tree = $this->categorymodel->getTree();
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
        //var_dump($tree);
        $this->assign('menu_list', $menu_list);
		
		$this->des = new SecretUtilTools();
		//dump($this->des->encrypt('wefwefwe'));
    }
	public function gotomeeting($id=0)
	{
		/*
		if(!is_login())
		   {
	          $this->error( "您还没有登陆",U("/Home/User/login") );	
	       }
		$uid=get_uid();
		$user = query_user(array('id','nickname', 'signature', 'email', 'mobile', 'avatar128', 'rank_link', 'sex', 'pos_province', 'pos_city', 'pos_district', 'pos_community'), $uid);
	    dump($user);
		$userid=$uid;
		$username=$user['nickname'];
		*/
		
		$parameter="userid=".NOW_TIME."&user=user".NOW_TIME."&role=manager&room=".$id;
		//echo $parameter;
		$parameter="userid=1431958326&user=user1431958326&role=manager&room=7";
		$parameter=$this->des->encryptForDES($parameter,"1234abcd");
        $parameter=urlencode($parameter);
		//echo $parameter;
		//die();

		//window.location.href="http://121.40.78.164:5080/meeting/client/meeting/meetingnx/gotomeeting.jsp?a="+json.url;
		header("location:http://115.29.47.217:5080/meeting/client/meeting/bin-debug/gotomeeting.jsp?a=".$parameter);
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
		
		$map['categoryid']=1;
		$lists = $this->datamodel->where($map)->select();
        
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
		
		$map['categoryid']=1;
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