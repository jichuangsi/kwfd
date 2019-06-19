<?php

namespace Payoff\Controller;
use Think\Controller;

/**
 * Class IndexController
 * @package Shop\Controller
 * 
 */
class IndexController extends Controller
{
    public function _initialize()
    {
      /* 读取站点配置 */
       $config = api('Config/lists');
       //dump($config);die();
       C($config); //添加配置
    }
 
    public function index() 
	{ 

		if (IS_POST) {
            //页面上通过表单选择在线支付类型，支付宝为alipay 财付通为tenpay
            $paytype = I('post.paytype');

			
		    $config=C('payment.' . $paytype);
			//dump($config);
            $config = array_merge($config,array('email' => C('ALIPAYEMAIL'),'key' =>  C('ALIPAYKEY'),'partner' =>  C('ALIPAYPARTNER')));
            $pay = new \Think\Pay($paytype,$config);   	
	
			if(!empty($_POST['orderid'])){ 
		    $order_no=trim($_POST['orderid']);//未付款订单号
			$body= C('SITENAME')."订单支付";//商品描述
			$title=C('SITENAME')."订单支付";//设置商品名称
				}
			//else{
			// $order_no = $pay->createOrderNo(); //充值，生成订单号
			// $body= C('SITENAME')."会员充值"；//商品描述
				//}
            $vo = new \Think\Pay\PayVo();
			
            $vo->setBody($body)
                    ->setFee(I('post.money')) //支付金额
                    ->setOrderNo($order_no)//订单号
                    ->setTitle($title)//设置商品名称
                    ->setCallback("Payoff/Index/success")// 设置支付完成后的后续操作接口 
                    ->setUrl(U("Payoff/Index/over")) // 设置支付完成后的跳转地址
                    ->setParam(array('order_id' => $order_no));
            echo $pay->buildRequestForm($vo);
			
        } 
		else
		{
           if(!is_login())
		   {
	          $this->error( "您还没有登陆",U("User/login") );	
	       }
   
		   //uid调用
	       $user=session('user_auth');
           $uid=$user['uid'];

           $this->meta_title = '支付订单';
            //在此之前goods1的业务订单已经生成，状态为等待支付
		   $id=I("get.orderid");
		   $order=D("Cart/order");
		
		   $this->assign('orderid',$id);
	
	       $data=$order->where("orderid='$id'")->find();
		  
	       $this->assign('data',$data);
           $this->display();
        }
		
	
	}

     /**
     * 订单支付成功
     * @param type $money
     * @param type $param
     */
    public function success($money, $param) 
	{
		if (session("pay_verify") == true) 
		{
		  session("pay_verify", null);
		   //处理业务订单、改名业务订单状态 为 支付成功
		  M("pay")->where(array('out_trade_no' => $param['order_id']))->setField('status',2);

		  $data = array('status'=>'1','ispay'=>'2');//设置订单为已经支付,状态为已提交
		  M('Cart/order')->where(array('tag' => $param['order_id']))->setField($data);
		}
		else 
		{
		  E("Access Denied");
		}
	}
	 
	public function over() 
	{
        if(!is_login()){
	       $this->error( "您还没有登陆",U("User/login") );	
		}
		$this->meta_title = '支付成功';
 
        $this->display('success');

       
    }
    /**
     * 支付结果返回
     */
    public function notify() {
        $apitype = I('get.apitype');

        $pay = new \Think\Pay($apitype, C('payment.' . $apitype));
        if (IS_POST && !empty($_POST)) {
            $notify = $_POST;
        } elseif (IS_GET && !empty($_GET)) {
            $notify = $_GET;
            unset($notify['method']);
            unset($notify['apitype']);
        } else {
            exit('Access Denied');
        }
        //验证
        if ($pay->verifyNotify($notify)) {
            //获取订单信息
            $info = $pay->getInfo();

            if ($info['status']) {
                $payinfo = M("Pay")->field(true)->where(array('out_trade_no' => $info['out_trade_no']))->find();
                if ($payinfo['status'] == 0 && $payinfo['callback']) {
                    session("pay_verify", true);
                    $check = R($payinfo['callback'], array('money' => $info['money'], 'param' => unserialize($payinfo['param'])));
                    if ($check !== false) {
                        M("Pay")->where(array('out_trade_no' => $info['out_trade_no']))->setField(array('update_time' => time(), 'status' => 1));
                    }
                }
                if (I('get.method') == "return") {
                    redirect($payinfo['url']);
                } else {
                    $pay->notifySuccess();
                }
            } else {
                $this->error("支付失败！");
            }
        } else {
            E("Access Denied");
        }
    }


}
