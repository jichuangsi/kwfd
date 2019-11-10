<?php
/**
 * Created by PhpStorm.
 * User: 
 * Date: 14-3-11
 * Time: PM1:13
 */

namespace Usercenter\Controller;

use Think\Controller;

class LiveController extends BaseController
{
    protected $ordermodel;
    protected $orderlistmodel;
	public function _initialize()
    {
        parent::_initialize();
        /* if (!is_login()) {
            $this->error('请登陆后再访问本页面。');
        } */
        $this->ordermodel=D("Cart/order");
        $this->orderlistmodel=D("Cart/orderlist");
    }

    public function index($tab = 'all',$page = 1, $r = 12)
    {	   
        $uid = get_uid();
	   //$mapmodel=array("all"=>array('l.uid'=>get_uid()),"PaymentsMade"=>array('uid'=>get_uid(),'ispay'=>2),"PaymentsDue"=>array('uid'=>get_uid(),'ispay'=>1));
       $mapmodel=array("all"=>array('l.uid'=>$uid),"PaymentsMade"=>array('l.uid'=>$uid,'live.endtime'=>array('lt',NOW_TIME)),"PaymentsDue"=>array('l.uid'=>$uid,'live.starttime'=>array('gt',NOW_TIME)));
	   switch($tab)
	   {
		   case "PaymentsMade"://已付款
		        $map=$mapmodel[$tab];
		   break;
		   case "PaymentsDue"://未付款
		        $map=$mapmodel[$tab];
		   break;
		   case "all":
		   default:
		        $map=$mapmodel[$tab];
		   break;		   
	   }
	   
	   $curlUrl = C('MAJOR_ORDER_API_URL');
	   $majorOrg = C('MAJOR_ORG');
	   if($curlUrl){
	       $s = $tab==='PaymentsMade'?2:($tab==='PaymentsDue'?1:-1);
	       $action = "orderListQuery/p/$page/r/$r/u/$uid/s/$s";
	       
	       if(!$majorOrg){
	           if(!empty(C('ORG_ID'))){
	               $action .= "/g/".C('ORG_ID');
	           }else{
	               $this->error( "缺少必要机构参数",U("usercenter/config/index") );
	           }
	       }
	       
	       $curlParams = array(str_replace("__ACTION__", $action, $curlUrl));
	       
	       $result = json_decode(api('CurlRequest/get', $curlParams),true);
	       //dump($result);
	       if($result){
	           if(is_array($result)){
	               if($result['success']){
	                   $list = $result['data'];
	                   $totalCount = $result['count'];
	               }else{
	                   $this->error( "查单异常：".$result['message'],U("usercenter/config/index") );
	               }
	           }else if(is_string($result)){
	               $this->error( "查单异常：".$result,U("usercenter/config/index") );
	           }else{
	               $this->error( "查单未知异常",U("usercenter/config/index") );
	           }
	       }
	       
	   }else{
	       //$map['total']=array('neq',0);
	       $list = $this->orderlistmodel->alias("l")->field('l.*,o.*,live.*')->join(C('DB_PREFIX').'Order o ON l.tag=o.orderid','LEFT')->join(C('DB_PREFIX').'Live live ON l.goodid=live.id','LEFT')->where($map)->order('l.id desc')->page($page, $r)->select();
	       //dump($this->orderlistmodel->_SQL());
	       $totalCount = $this->orderlistmodel->alias("l")->join(C('DB_PREFIX').'Order o ON l.tag=o.orderid','LEFT')->join(C('DB_PREFIX').'Live live ON l.goodid=live.id','LEFT')->where($map)->count();
	   }
	   
	   //dump($list);
	   $this->assign('tab', $tab);
	   $this->assign('list', $list);
	   $this->assign('totalPageCount', $totalCount);
       $this->assign('count', $r);
	   $this->display();
    }
    public function gotomeeting($id='')
    {
		//echo base64_decode(I('gotomeeting'));
		$this->display();
	}

}