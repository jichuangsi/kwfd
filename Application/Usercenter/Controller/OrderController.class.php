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
        if (!is_login()) {
            $this->error('请登陆后再访问本页面。');
        }
        $this->ordermodel=D("Cart/order");
        $this->orderlistmodel=D("Cart/orderlist");
		$this->ordercancelmodel=D("Cart/ordercancel");
    }

    public function index($page = 1, $tab = 'all',$page = 1, $r = 10)
    {	   
	   $mapmodel=array("all"=>array('uid'=>get_uid()),"PaymentsMade"=>array('uid'=>get_uid(),'ispay'=>2),"PaymentsDue"=>array('uid'=>get_uid(),'ispay'=>1));
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
	   
	   //$map['total']=array('neq',0);
	   $list = $this->ordermodel->where($map)->order('id desc')->page($page, $r)->select();
	   foreach($list as $key=> $val)
	   {
         $list[$key]['orderlist']=$this->orderlistmodel->alias("orderlist")->field('orderlist.*,live.image')->join('LEFT JOIN '.C('DB_PREFIX').'live as live on live.id=orderlist.goodid')->where('orderid=\''.$val['id'].'\'')->select();
	   }
	   $totalCount = $this->ordermodel->where($map)->count();
	   
 		   
	   //dump($list);
	   $this->assign('tab', $tab);
	   $this->assign('list', $list);
	   $this->assign('totalPageCount', $totalCount);
       $this->assign('count', $r);
	   $this->display();
    }
    public function cancel($orderid="0")
    {
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