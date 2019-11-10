<?php

namespace Payoff\Controller;
use Think\Controller;

/**
 * Class IndexController
 * @package Shop\Controller
 * 
 */
class JuhepayController extends Controller
{
	protected $orderModel;
	protected $orderlistModel;
	private $tip = "__NAME__-支付中心";
	private $lxk = "乐享";
    public function _initialize()
    {
        $this->orderModel = D('Cart/Order');
        $this->orderlistModel = D('Cart/Orderlist');
        $config =   S('DB_CONFIG_DATA');
        if(!$config){
            $config =   api('Config/lists');
            S('DB_CONFIG_DATA',$config);
        }
        C($config); //添加配置
    }
 
    public function index() 
	{ 
	      $orderid=I('get.o');
		  $data=$this->orderModel->where("orderid='$orderid'")->find();
	      if(!$data)
		  {
			 $this->error( "找不到订单。",U("/Home/Index/index") );
		  } 
		  $cnt=$this->orderlistModel->where("tag='$orderid'")->count();
		  if(!$cnt)
		  {
		      $this->error( "找不到订单。",U("/Home/Index/index") );
		  } 
		  $cnt=$this->orderlistModel->where("tag='$orderid'")->group("orgId")->count();
		  if($cnt==="1"){
		      $res=$this->orderlistModel->where("tag='$orderid'")->order('create_time desc')->limit(1)->select();
		      $name = $res[0]['orgName'];
		  }else{
		      $name = $this->lxk;
		  }
		 
		  $data['orgName'] = str_replace("__NAME__", $name, $this->tip);
		  $this->assign('data', $data);
		  $this->display();
	
	}
	
	public function submitPayment() {
	    
	    $this->checkRequestHeaders();
	}
	
	private function checkRequestHeaders(){
	    
	    $user_agent = $_SERVER['HTTP_USER_AGENT'];
	    
	    // 微信浏览器
	    if (stripos($user_agent, 'MicroMessenger') > -1) {	        
	        
	        preg_match('/.*?(MicroMessenger\/([0-9.]+))\s*/', $user_agent, $matches);//echo "MicroMessenger";
	        
	        echo 'Version:'.$matches[2];// 获取版本号
	        
	        return true;
	        
	    } 
	    // 支付宝浏览器
	    else if(stripos($user_agent, 'AlipayClient') > -1){	        
	        
	        preg_match('/.*?(AlipayClient\/([0-9.]+))\s*/', $user_agent, $matches);//echo "MicroMessenger";
	        
	        echo 'Version:'.$matches[2];// 获取版本号
	        
	        return true;
	    }
	    
	}
	
	public function em_getallheaders()
	{
	    foreach ($_SERVER as $name => $value)
	    {
	        if (substr($name, 0, 5) == 'HTTP_')
	        {
	            $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
	        }
	    }
	    return $headers;
	}
	
	//在使用正则检查下字符串
	/* if($demandInfo['new_status'] == Api_Crm_SystemConfig::DEMAND_STATUS_WAIT_ALLOT ){
	    $headers = $this->em_getallheaders();
	    $bool = preg_match("/android/i",$headers['User-Agent']);
	    if($bool == TRUE){
	        $result['telephone']=substr($result['telephone'],0,3).str_repeat('*',8);
	    }else{
	        $this->code_back('104');
	    }
	} */
	

     /**
     * 微信支付完毕跳转回来地址
     * @param type $money
     * @param type $param
     */
    /* public function returnurl($orderid="") 
	{
		$data= M('order')->where(array('orderid' => $orderid))->find();
		if(!$data)
		{
				echo "查无此订单。";
				die();
		}
		$this->assign('data', $data);
		$this->display();	 
			 
	} */
	 

    /**
     * 微信异步通知接口
     */
    /* public function notifyurl() {
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
    } */

}
