<?php
/**
 * Created by PhpStorm.
 * User: 
 * Date: 14-3-11
 * Time: PM1:13
 */

namespace Usercenter\Controller;

use Think\Controller;

class OrderController extends BaseController
{
    protected $ordermodel;
    protected $orderlistmodel;
	protected $ordercancelmodel;
	public function _initialize()
    {
        parent::_initialize();
        /* if (!is_login()) {
            $this->error('请登陆后再访问本页面。');
        } */
        $this->ordermodel=D("Cart/order");
        $this->orderlistmodel=D("Cart/orderlist");
		$this->ordercancelmodel=D("Cart/ordercancel");
    }

    public function index($page = 1, $tab = 'all',$page = 1, $r = 10)
    {	   
       $uid = get_uid();
       $mapmodel=array("all"=>array('uid'=>$uid),"PaymentsMade"=>array('uid'=>$uid,'ispay'=>2),"PaymentsDue"=>array('uid'=>$uid,'ispay'=>1));
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
	       
	       $s = $tab==='all'?-1:$mapmodel[$tab]['ispay'];
	       $action = "orderQuery/p/$page/r/$r/u/$uid/s/$s";
	       
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
	       $list = $this->ordermodel->where($map)->order('id desc')->page($page, $r)->select();
	       foreach($list as $key=> $val)
	       {
	           $list[$key]['orderlist']=$this->orderlistmodel->alias("orderlist")->field('orderlist.*,live.image')->join('LEFT JOIN '.C('DB_PREFIX').'live as live on live.id=orderlist.goodid')->where('orderid=\''.$val['id'].'\'')->select();
	       }
	       $totalCount = $this->ordermodel->where($map)->count();
	   }
 		   
	   //dump($list);
	   $this->assign('tab', $tab);
	   $this->assign('list', $list);
	   $this->assign('totalPageCount', $totalCount);
       $this->assign('count', $r);
	   $this->display();
    }
    public function cancel($orderid="0")
    {
        $uid = get_uid();
        $curlUrl = C('MAJOR_ORDER_API_URL');
        
        if($curlUrl){ 
            
            $action = "orderCancel/u/$uid/o/$orderid";
            
            $curlParams = array(str_replace("__ACTION__", $action, $curlUrl));
            
            $result = json_decode(api('CurlRequest/get', $curlParams),true);

            //dump($result);
            if($result){
                if(is_array($result)){
                    if($result['success']){
                        $this->success('订单已取消',U("index"));
                    }else{
                        $this->error('申请失败，请重试');
                    }
                }else if(is_string($result)){
                    $this->error('申请失败，请重试');
                }else{
                    $this->error('申请失败，请重试');
                }
            }
            
        }else{
            //$id   orderid
            $order=D("Cart/order");
            $map['orderid']=$orderid;
            $orderdata=$order->where($map)->select();
            if(!$orderdata)
            {
                $this->error('订单不存在。');
            }
            $status=$orderdata[0]["status"];
            $ispay=$orderdata[0]["ispay"];
            $cash=$orderdata[0]["total"];
            //dump($orderdata);
            
            //订单已提交或未支付直接取消
            if($status==1 && $ispay==1)
            {
                //设置订单取消
                //保存数据到取消表中后台调用
                $cancel=D("Cart/ordercancel");
                $cancel->create();
                $cancel->create_time=NOW_TIME;
                $cancel->status=3;
                $cancel->orderid=$orderid;
                $cancel->cash=$cash;//取消的金额
                $cancel->num=1;//取消的数量
                $cancel->count=1;//取消的种类
                $cancel->info="自助取消";
                $cancel->uid=$orderdata[0]["uid"];
                $cancel->username=$orderdata[0]["username"];
                $cancel ->add();
                //设置订单为订单已取消
                $data = array('status'=>'6','backinfo'=>'订单已关闭');
                //更新订单列表订单状态为已取消，清空取消订单操作
                if($order->where("orderid='$orderid'")->setField($data))
                {
                    $this->success('订单已取消',U("index"));
                }
                else
                {
                    $this->error('申请失败，请重试');
                }
            }
        }
			
	}


}