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
	protected $protocol;
	protected $orderlistdetailmodel;
    public function _initialize()
    { 
		$this->datamodel = D($this->_model.'/'.$this->_model);
		$this->categorymodel = D($this->_model.'/'.$this->_model.'Category');
		$this->chaptersmodel = D($this->_model.'/'.$this->_model.'Chapters');
		$this->orderlistdetailmodel = D('Cart/Orderlistdetail');
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
        
        /* 读取站点配置 */
        $config =   S('DB_CONFIG_DATA');
        if(!$config){
            $config =   api('Config/lists');
            S('DB_CONFIG_DATA',$config);
        }
        C($config); //添加配置
		
        $http_type = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https://' : 'http://';
        $this->protocol = $http_type . $_SERVER['HTTP_HOST'];
    }
	public function getmenu()
    {
		$tree = $this->categorymodel->getTree(1);
		$tree=array($tree);
        echo json_encode($tree);
	}

	public function gotomeeting($id=0, $orgId)
	{
	    unset($map);
	    $map['id'] = $id;
	    $map['orgId'] = $orgId;
	    $data = $this->datamodel->where($map)->count();
		 
         if (!$data) {
            $this->error('请到相应的机构上课！');
         }
		  
         unset($data);
         $data = $this->datamodel->where($map)->find();
		  
		if(!is_login())
		{
	        //$this->error( "您还没有登陆",U("/Home/User/login") );
            $uid=NOW_TIME;
			$username="游客";
			$role="1";
			$this->error( "您还没有登陆",U("/Home/User/login") );
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
			  
			  $param['goodid'] = $id;
			  $param['orgId'] = $orgId;
			  $param['courseStatus'] = 1;
			  $param['teacherid'] = $uid;
			  $param['starttime'] = array('elt',time()+15*60);
			  $rs = $this->orderlistdetailmodel->where($param)->setField(['courseStatus'=>3]);
			  /* print_r($this->orderlistdetailmodel->where($param)->select());
			  echo $this->orderlistdetailmodel->_sql();exit; */
			  /* $rs = $this->datamodel->where($map)->where(['status'=>1])->setField(['status'=>3]); //老师上课			  
			  if($rs) $this->datamodel->where($map)->setInc('updateFlag'); */
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
		
		//$meetingappid=modC('MEETINGWEB_APP_ID',0,'Config');
		$meetingappid=C('_CONFIG_MEETINGWEB_APP_ID');
		$whiteboardtoken=C('_CONFIG_MEETINGWEB_WB_TOKEN');
		$wbuuid=$this->getwbuuid($room);
		$parameter="userid=".$uid."&user=".$username."&role=".$role."&room=".$room."&title=".$data["title"]."&appid=".$meetingappid;
		if(!empty($whiteboardtoken)){
		    $parameter.="&wbtoken=".$whiteboardtoken;
		}
		if($role=="2"&&!empty($wbuuid)){
		    $parameter.="&wbuuid=".$wbuuid;
		}
		//echo $parameter;exit;
		//$parameter="userid=1431958326&user=user1431958326&role=manager&room=7";
		//$parameter=$this->crypt->encrypt($parameter);
		$parameter=urlencode(base64_encode($parameter));
		//echo $parameter;
		//die();
        //$meetingurl=modC('MEETINGWEB_URL',0,'Config');
        $meetingurl=C('_CONFIG_MEETINGWEB_URL');
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
	    
	    if(strcasecmp($action,'QUERY')==0){
	        $join_users = F('Live/'.$room);
	        if($join_users){
	            return $this->ajaxReturn($join_users);
	        }
	    }else{
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
	                            //$join_users = array('ids'=>$ids,'total'=>$total,'max'=>$max);
	                            $join_users['ids'] = $ids;
	                            $join_users['total'] = $total;
	                            $join_users['max'] = $max;
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
	                            //$join_users = array('ids'=>$ids,'total'=>$total,'max'=>$max);
	                            $join_users['ids'] = $ids;
	                            $join_users['total'] = $total;
	                            $join_users['max'] = $max;
	                            F('Live/'.$room,$join_users);
	                        }
	                    }
	                }
	                //print_r($join_users);
	            }else{
	                if(strcasecmp($action,'LEAVE')==0){
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
	}
	
	public function setwbuuid(){
	    $room = $_POST['room'];
	    $uuid = $_POST['uuid'];
	    $isteacher = $_POST['isteacher'];
	    
	    if(empty($room)||empty($uuid)||empty($isteacher)){
	        return $this->ajaxReturn('fail');
	    }
	    
	    if(!is_dir('lock')){
	        mkdir('lock');
	    }
	    if(!is_dir('lock/Live')){
	        mkdir('lock/Live');
	    }	
	    
	    $fp = fopen('lock/Live/'.$room.'.txt', "w+");
	    if(flock($fp,LOCK_EX)){
	        if($isteacher==1){
	            $join_users = F('Live/'.$room);
	            if($join_users){
	                $join_users['wb_uuid'] = $uuid;
	            }else{
	                $join_users = array('wb_uuid'=>$uuid);
	            }
	            F('Live/'.$room,$join_users);
	            return $this->ajaxReturn('success');
	        }
	        flock($fp,LOCK_UN);
	    }
	    fclose($fp);
	}
	
	private function getwbuuid($room){	    
	    
	    if(empty($room)||!is_dir('lock')||!is_dir('lock/Live')){
	        return null;
	    }
	    
	    $join_users = F('Live/'.$room);
	    if($join_users){
	        return $join_users['wb_uuid'];
	    }else{
	        return null;
	    }
	}
	
	public function setshareuuid(){
	    $room = $_POST['room'];
	    $uuid = $_POST['uuid'];
	    $isteacher = $_POST['isteacher'];
	    
	    if(empty($room)||empty($uuid)||empty($isteacher)){
	        return $this->ajaxReturn('fail');
	    }
	    
	    if(!is_dir('lock')){
	        mkdir('lock');
	    }
	    if(!is_dir('lock/Live')){
	        mkdir('lock/Live');
	    }
	    
	    $fp = fopen('lock/Live/'.$room.'.txt', "w+");
	    if(flock($fp,LOCK_EX)){
	        if($isteacher==1){
	            $join_users = F('Live/'.$room);
	            if($join_users){
	                $join_users['ss_uuid'] = $uuid;
	            }else{
	                $join_users = array('ss_uuid'=>$uuid);
	            }
	            F('Live/'.$room,$join_users);
	            return $this->ajaxReturn('success');
	        }
	        flock($fp,LOCK_UN);
	    }
	    fclose($fp);
	}
	
	public function getshareuuid(){
	    
	    $room = $_POST['room'];
	    
	    if(empty($room)||!is_dir('lock')||!is_dir('lock/Live')){
	        return null;
	    }
	    
	    $join_users = F('Live/'.$room);
	    if($join_users){
	        $res = $join_users['ss_uuid'];
	    }else{
	        $res = null;
	    }
	    
	    return $this->ajaxReturn($res);
	}
	
	public function getjoiners(){
	    $room = $_POST['room'];
	    
	    if(empty($room)){
	        return $this->ajaxReturn('fail');
	    }
	    
	    $data = explode("-",$room);
	    
	    if(!$data||!$data[0]||empty($data[0])){
	        return $this->ajaxReturn('fail');
	    }
	    
	    $map['o.goodid'] = $data[0];
	    $map['o.MODULE_NAME']=MODULE_NAME;
	    $orderlist = M("Orderlist")->alias("o")->field('o.uid,o.username')->where($map)->select();
	    
	    $res = array();
	    foreach($orderlist as $v => $k){
	        if (!array_key_exists($k['uid'],$res)){
	            $res[$k['uid']] = $k['username'];
	        }
	    }    	    
	    
	    unset($map);
	    $map['o.id'] = $data[0];
	    $teacher = $this->datamodel->alias('o')->field('o.teacherid,m.nickname')->join(C('DB_PREFIX').'member m ON m.uid=o.teacherid','LEFT')->where($map)->select();
	    //echo $this->datamodel->_sql();
	    foreach($teacher as $v => $k){
	        if (!array_key_exists($k['teacherid'],$res)){
	            $res[$k['teacherid']] = $k['nickname'];
	        }
	    }
	    
	    return $this->ajaxReturn($res);
	}
	
	public function uploadPictures(){
	    
    	    $room = $_POST['room'];
    	           
    	    if(empty($room)){
    	        return $this->ajaxReturn('fail');
    	    }
    	    
    	    $data = explode("-",$room);
    	    
    	    if(!$data||!$data[0]||empty($data[0])){
    	        return $this->ajaxReturn('fail');
    	    }
	    
    	    /* 返回标准数据 */
    	    $return  = array('status' => 1, 'info' => 'success', 'data' => '');    	    
    	    
    	    $Picture = D($this->_model.'/Picture');
    	    
    	    $driver = modC('PICTURE_UPLOAD_DRIVER','local','config');
    	    $driver = check_driver_is_exist($driver);
    	    $uploadConfig = get_upload_config($driver);
    	    
    	     $info = $Picture->upload(
    	        $_FILES,
    	        C('PICTURE_UPLOAD'),
    	        $driver,
    	        $uploadConfig
    	        ); //TODO:上传到远程服务器
    	   
	        if($info){	            
	            unset($map);
	            $map['id'] = $data[0];
	            $ret = $this->datamodel->field("images")->where($map)->find();	 
	            
	            $data = array();
	            if($ret["images"]){
	                $images = $ret["images"].',';
	                $imagesId = explode(",", $ret["images"]);
	                foreach($imagesId as $k => $v){
	                    array_push($data, array('id'=>$v,'path'=>$this->protocol.get_cover($v, 'path')));
	                }
	            }else{
	                $images = '';
	            }	            
	            
	            foreach($info as $k => $v){
	                $images .= $v['id'].',';
	                array_push($data, array('id'=>$v['id'],'path'=>$this->protocol.$v['path']));
	            }
	            
	            if($images){	                
	                $this->datamodel->where($map)->setField('images', substr($images, 0, strlen($images)-1));	                
	            }
	            
	            
	            $return['data'] = $data;	            
	            
	            $return['status'] = 1;
	            
	        } else {
	            $return['status'] = 0;
	            $return['info']   = $Picture->getError();
	        }
	    
	    
	       /* 返回JSON数据 */
	        $this->ajaxReturn($return);
	}
	
	public function getPictures(){
	    $room = $_POST['room'];
	    
	    if(empty($room)){
	        return $this->ajaxReturn('fail');
	    }
	    
	    $data = explode("-",$room);
	    
	    if(!$data||!$data[0]||empty($data[0])){
	        return $this->ajaxReturn('fail');
	    }
	    
	    /* 返回标准数据 */
	    $return  = array('status' => 1, 'info' => 'success', 'data' => '');
	    
	    unset($map);
	    $map['id'] = $data[0];
	    $ret = $this->datamodel->field("images")->where($map)->find();
	    
	    if($ret){
	        $data = array();
	        if($ret["images"]){
	            $imagesId = explode(",", $ret["images"]);
	            foreach($imagesId as $k => $v){
	                array_push($data, array('id'=>$v,'path'=>$this->protocol.get_cover($v, 'path')));
	            }
	        }
	        
	        $return['data'] = $data;
	        
	        $return['status'] = 1;
	    }else{
	        $return['status'] = 0;
	        $return['info']   = 'fail';
	    }
	    
	    /* 返回JSON数据 */
	    $this->ajaxReturn($return);
	}
	
	public function removePictures(){
	    $room = $_POST['room'];
	    $removeId = $_POST['imageId'];
	    
	    if(empty($room)||empty($removeId)){
	        return $this->ajaxReturn('fail');
	    }
	    
	    $data = explode("-",$room);
	    
	    if(!$data||!$data[0]||empty($data[0])){
	        return $this->ajaxReturn('fail');
	    }
	    
	    /* 返回标准数据 */
	    $return  = array('status' => 1, 'info' => 'success', 'data' => '');
	    
	    unset($map);
	    $map['id'] = $data[0];
	    $ret = $this->datamodel->field("images")->where($map)->find();
	    
	    if($ret){
	        unset($data);
	        $data = array();
	        if($ret["images"]){
	            
	            $removeIds = explode(",", $removeId);
	            $imageIds = explode(",", $ret["images"]);
	            $diff = array_diff($imageIds, $removeIds);
	             
	            $images = '';
	            foreach($diff as $k => $v){
	                $images .= $v.',';
	                array_push($data, array('id'=>$v,'path'=>$this->protocol.get_cover($v, 'path')));
	            }
	            
	            if($images&&count($diff)>0){
	                $this->datamodel->where($map)->setField('images', substr($images, 0, strlen($images)-1));
	            }else if(count($diff)==0){
	                $this->datamodel->where($map)->setField('images', '');
	            }
	        }
	        
	        $return['data'] = $data;
	        
	        $return['status'] = 1;
	    }else{
	        $return['status'] = 0;
	        $return['info']   = 'fail';
	    }
	    
	    /* 返回JSON数据 */
	    $this->ajaxReturn($return);
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
		
        $goods_list = $this->datamodel->where($map)->order('recommend desc, createtime desc, view desc')->page($page, $count )->select();
        //echo $this->datamodel->_sql();
		$totalCount = $this->datamodel->where($map)->count();
		$this->assign('contents', $goods_list);
		$this->assign('totalPageCount', $totalCount);
		$this->assign('count', $count);
		 
		$this->display();
    }
    public function Detail($id = 0,$category=1,$u='')
    {
        $data = $this->datamodel->find($id);
        if (!$data) {
            $this->error('404 not found');
        }		
 
		//var_dump($data);
		$this->assign('data', $data);
        //dump($data);
        
		if(!empty($u)){
		    $this->assign('suid', $u);
		}
		
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
		 
		if(is_login()){
		    $qrCodeUrl = str_ireplace('__org__',C('ORG_ID'),str_ireplace('__user__',get_uid(),str_ireplace('__course__',$id,C('_CONFIG_LX_QRCODE_URL'))));
		    //dump($qrCodeUrl);
		    $this->assign('qrCodeUrl', $qrCodeUrl);
		}
		
		$this->display();
    }
    public function cart($id = 0, $suid='')
    {
        $data = $this->datamodel->find($id);
        if (!$data) {
            $this->error('404 not found');
        }
		$data['name']=$data['title'];
		$data['qty']=1;
		$data['MODULE_NAME']=MODULE_NAME;
		$data['url']=$_SERVER['HTTP_REFERER'];
		if(!empty($suid)) $data['suid']=$suid;
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