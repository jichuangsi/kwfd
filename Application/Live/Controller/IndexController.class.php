<?php

namespace Live\Controller;
use Live\Api\SecretUtilTools;
use Live\Api\Crypt;
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
    protected $_model="Live";
    protected $_modelname="点播";
    protected $datamodel;
    protected $categorymodel;
	protected $chaptersmodel;
	protected $des;
	protected $crypt;
    public function _initialize()
    { 
		$this->datamodel = D($this->_model.'/'.$this->_model);
		$this->categorymodel = D($this->_model.'/'.$this->_model.'Category');
		$this->chaptersmodel = D($this->_model.'/'.$this->_model.'Chapters');
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

		
		//$http_type = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https://' : 'http://';
        //echo $http_type . $_SERVER['HTTP_HOST'];
		//echo $http_type . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; 
 		
    }
	public function getmenu()
    {
		$tree = $this->categorymodel->getTree(1);
		$tree=array($tree);
        echo json_encode($tree);
	}

	public function gotomeeting($id=0)
	{
		 $data = $this->datamodel->find($id);
         if (!$data) {
            $this->error('404 not found');
         }
		  
		  
		if(!is_login())
		{
	        //$this->error( "您还没有登陆",U("/Home/User/login") );
            $uid=NOW_TIME;
			$username="游客";
			$role="1";
			
	    }
		else
		{
		  $uid=get_uid();
		  $user = query_user(array('id','nickname', 'signature', 'email', 'mobile', 'avatar128', 'rank_link', 'sex', 'pos_province', 'pos_city', 'pos_district', 'pos_community'), $uid);
	      //dump($user);
		  $userid=$uid;
		  $username=$user['nickname'];
		  if($uid==$data["teacherid"])
		  {
			  $role="4";
		  }
		  else
		  {
			  $role="2";
		  }
		  //var_dump($data);
		  
		}
		
		$room = $id.'-'.$data["createtime"];
		
		$this->des = new SecretUtilTools();
		//dump($this->des->encrypt('wefwefwe'));
		$this->crypt=new Crypt();
		$this->crypt->init("TESTTEST");
		
		$meetingappid=modC('MEETINGWEB_APP_ID',0,'Config');
		$parameter="userid=".$uid."&user=".$username."&role=".$role."&room=".$room."&title=".$data["title"]."&appid=".$meetingappid;
		//echo $parameter;
		//$parameter="userid=1431958326&user=user1431958326&role=manager&room=7";
		//$parameter=$this->crypt->encrypt($parameter);
		$parameter=urlencode(base64_encode($parameter));
		//echo $parameter;
		//die();
        $meetingurl=modC('MEETINGWEB_URL',0,'Config');
		//die($meetingurl);
		header("location: $meetingurl?a=".$parameter);
	}
	
	public function statistics(){
	    $action = $_POST['action'];
	    $room = $_POST['room'];
	    $uid = $_POST['uid']?$_POST['uid']:get_uid();
	    $uname = $_POST['uname']?$_POST['uname']:session('user_auth')['username'];
	    $isteacher = $_POST['isteacher']?$_POST['isteacher']:session('user_auth')['isteacher'];
	    //echo 'room:'.$room.';uid:'.$uid.';uname:'.$uname.';isteacher:'.$isteacher;
	    
	    if(!is_dir('lock')){
	        mkdir('lock');
	    }
	    if(!is_dir('lock/Live')){
	        mkdir('lock/Live');
	    }
	    
	    $fp = fopen('lock/Live/'.$room.'.txt', "w+");
	    if(flock($fp,LOCK_EX)){
	        if(!$isteacher){
	            if(strcasecmp($action,'JOIN')==0){
	                $join_users = F('Live/'.$room);
	                if($join_users){
	                    $ids = $join_users['ids'];
	                    if(!array_key_exists($uid, $ids)){
	                        $ids[$uid] = $uname;
	                        $total = count($ids);
	                        $max = $join_users['max']<$total?$total:$join_users['max'];
	                        $join_users = array('ids'=>$ids,'total'=>$total,'max'=>$max);
	                    }
	                }else{
	                    $join_users = array('ids'=>array($uid=>$uname),'total'=>1,'max'=>1);
	                }
	                F('Live/'.$room,$join_users);
	            }else if(strcasecmp($action,'LEAVE')==0){
	                $join_users = F('Live/'.$room);
	                if($join_users){
	                    $ids = $join_users['ids'];
	                    if(array_key_exists($uid, $ids)){
	                        $ids = array_diff_key($ids, [$uid=>$uname]);
	                        $total = count($ids);
	                        $max = $join_users['max']<$total?$total:$join_users['max'];
	                        $join_users = array('ids'=>$ids,'total'=>$total,'max'=>$max);
	                        F('Live/'.$room,$join_users);
	                    }
	                }
	            }
	            //print_r($join_users);
	        }else{
	            if(strcasecmp($action,'QUERY')==0){
	                $join_users = F('Live/'.$room);
	                if($join_users){
	                    return $this->ajaxReturn($join_users);
	                }
	            }else if(strcasecmp($action,'LEAVE')==0){
	                $rid = strtok($room,'-');
	                $join_users = F('Live/'.$room);
	                
	                if($join_users){
	                    $data['max'] = $join_users['max'];
	                    $this->datamodel->where('id=' . $rid)->save($data);
	                    //echo $this->datamodel->_sql();
	                    F('Live/'.$room,NULL);
	                }
	            }
	        }
	        flock($fp,LOCK_UN);
	    }
	    fclose($fp);
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
        $data = $this->datamodel->find($id);
        if (!$data) {
            $this->error('404 not found');
        }
		
 
		//var_dump($data);
		$this->assign('data', $data);
        //dump($data);
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
        $hotdata = $this->datamodel->where($hotmap)->order('view desc')->limit(10)->select();
        $this->assign('hotdata', $hotdata);
		
		$chapters=$this->chaptersmodel->getTree($id);
		//dump($chapters);
		$this->assign('chapters', $chapters);
		
		
		unset($map);
		$map['m.uid'] = $data['teacherid'];
		$teacher = M("Member")->alias("m")->field('m.*,CASE WHEN ISNULL(a.path) THEN "Addons/Avatar/default.jpg" ELSE CONCAT("Uploads/Avatar/",a.path) end as path')->join(C('DB_PREFIX').'avatar a ON m.uid=a.uid','LEFT')->where($map)->select();
		//dump(M("Member")->_sql()); 
		//dump($teacher); 
		$this->assign('teacher', $teacher); 
		
		unset($map);
		$map['o.goodid'] = $data['id'];
		$map['o.MODULE_NAME']=MODULE_NAME;
		$orderlist = M("Orderlist")->alias("o")->field('m.*,a.*,CASE WHEN ISNULL(a.path) THEN "Addons/Avatar/default.jpg" ELSE CONCAT("Uploads/Avatar/",a.path) end as path')->join(C('DB_PREFIX').'Member m ON m.uid=o.uid','LEFT')->join(C('DB_PREFIX').'avatar a ON m.uid=a.uid','LEFT')->where($map)->select();
		//dump(M("Orderlist")->_sql()); 
        //dump($orderlist); 
		$this->assign('orderlist', $orderlist);
		 
		
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
    public function appcourse($uid = 0)
    {
        $data = $this->datamodel->field('id,title,starttime,endtime,"课程简介:无" as description')->where("teacherid='$uid'")->select();
 
		//dump($data);
        if (!$data) {
            exit(json_encode([
                'code' => 1,
                'message' => '暂无课程'
            ]));
        }
		else
		{
			foreach($data as $key=>&$val)
			{
				if(!empty($val['starttime']))
				{
					$val['starttime']=date('Y-m-d H:i',$val['starttime']);
				}
				if(!empty($val['endtime']))
				{
					$val['endtime']=date('Y-m-d H:i',$val['endtime']);
				}
			}
            exit(json_encode([
                'code' => 0,
				'message' => '',
                'lists' => $data
            ]));
		}
    }	
}