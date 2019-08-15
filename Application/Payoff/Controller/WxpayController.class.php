<?php

namespace Payoff\Controller;
use Think\Controller;

/**
 * Class IndexController
 * @package Shop\Controller
 * 
 */
class WxpayController extends Controller
{
	protected $orderModel;
    public function _initialize()
    {
        $this->orderModel = D('Cart/Order');        
        $config = api('Config/lists');
        C($config); //添加配置
    }
 
    public function index() 
	{ 

		if (IS_POST) {
          $orderid=I('orderid');
		  $data=$this->orderModel->where("orderid='$orderid'")->find();
	      if(!$data)
		  {
			 $this->error( "找不到订单。",U("/Home/Index/index") );
		  } 

		  include(ROOT_PATH.'extend/Wxpay/lib/WxPay.Api.php');
		  include(ROOT_PATH.'extend/Wxpay/example/WxPay.NativePay.php');
		  include(ROOT_PATH.'extend/Wxpay/example/log.php'); 
		  
		  $notify = new \NativePay();

		  //模式二
		  /**
		   * 流程：
		   * 1、调用统一下单，取得code_url，生成二维码
		   * 2、用户扫描二维码，进行支付
		   * 3、支付完成之后，微信服务器会通知支付成功
		   * 4、在支付成功通知中需要查单确认是否真正支付成功（见：notify.php）
		   */
		  $input = new \WxPayUnifiedOrder();
		  $input->SetBody("在线支付");
		  $input->SetAttach("在线支付");
		  $input->SetOut_trade_no($data["orderid"]);
		  $input->SetTotal_fee($data["pricetotal"]*100);
		  $input->SetTime_start(date("YmdHis"));
		  $input->SetTime_expire(date("YmdHis", time() + 600));
		  $input->SetGoods_tag("test");
		  $input->SetNotify_url("http://".$_SERVER['HTTP_HOST']."/index.php/Payoff/Wxpay/notifyurl.html");
		  $input->SetTrade_type("NATIVE");
		  $input->SetProduct_id("123456789");

		  $result = $notify->GetPayUrl($input);
		  $url = $result["code_url"];
		  //echo $url;
		  $this->assign('data', $data);
		  $this->assign('url', $url);
		  $this->display();
        } 
		else
		{
		   E("Access Denied");
        }
		
	
	}

     /**
     * 微信支付完毕跳转回来地址
     * @param type $money
     * @param type $param
     */
    public function returnurl($orderid="") 
	{
		$data= M('order')->where(array('orderid' => $orderid))->find();
		if(!$data)
		{
				echo "查无此订单。";
				die();
		}
		$this->assign('data', $data);
		$this->display();	 
			 
	}
	 

    /**
     * 微信异步通知接口
     */
    public function notifyurl() {
		if (IS_POST) {
 


		   include(ROOT_PATH.'extend/Wxpay/example/PayNotifyCallBack.php'); 
		   
		   //初始化日志
           $logHandler= new \CLogFileHandler(ROOT_PATH.'extend/Wxpay/logs/'.date('Y-m-d').'.log');
           $log = \Log::Init($logHandler, 15);

		   $config = new \WxPayConfig();
           $notify = new \PayNotifyCallBack();
           $notify->Handle($config, false);
		   file_put_contents("debugwx.txt",$notify->GetReturn_code());
		   if($notify->GetReturn_code()=="SUCCESS")
		   {
			   //file_put_contents("debugwx.txt",json_encode($notify->GetData()));
			   $postdata=$notify->GetData();
			   $out_trade_no=$postdata["out_trade_no"];
			   $data= M('order')->where(array('orderid' => $out_trade_no))->find();
			   if(!$data)
		       {
				 
		       }
			   else
			   {
			       $data = array('status'=>'2','update_time'=>NOW_TIME);
			       M("pay")->where(array('out_trade_no' => $out_trade_no))->setField($data);
			       unset($data);
			       $data = array('status'=>'2','ispay'=>'2','paymode'=>'Wxpay','backinfo'=>'支付完成','update_time'=>NOW_TIME);//设置订单为已经支付,状态为已提交
			       M('order')->where(array('orderid' => $out_trade_no))->setField($data);
			   }
		   }
        } 
		else
		{
		   die("Access Denied");
        }
		
    }
    public function checkpay($orderid="") {
		$return="";
		$data=$this->orderModel->where("orderid='$orderid'")->find();
		if(!$data)
		{
			$return=array('info' => '查不到订单。', 'status' => 0);
		}
		else
		{
			if($data["ispay"]==2)
			{
				$return=array('info' => '支付完成。', 'status' => 1);
			}
			else
			{
				$return=array('info' => '支付中。', 'status' => 0);
			}
		}
	    header('Content-type: application/json');
        exit(json_encode($return));
    }

}
