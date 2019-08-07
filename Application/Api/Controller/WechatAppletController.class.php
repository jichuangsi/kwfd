<?php
/**
 * Created by PhpStorm.
 * User: 
 * Date: 1/15/14
 * Time: 4:17 PM
 */
namespace Api\Controller;

use Think\Model;
use Think\Exception;

header('Access-Control-Allow-Origin:*');

class WechatAppletController extends ApiController
{
    protected $errMsg = array(
        "5001"=>"微信小程序不可用！",
        "5002"=>"微信小程序授权码为空！",
        "5003"=>"微信小程序获取openId异常！",
        "5004"=>"用户状态异常，请联系管理员！",
        "5005"=>"并没关联用户！",
        "5006"=>"用户关联参数异常！",
        "5007"=>"已存在关联用户！",
        "5008"=>"不存在该用户，请注册！",
        "5009"=>"用户名检验异常！",
        "5010"=>"用户名存在非法字符！",
        "5011"=>"用户名已存在！",
        "5012"=>"用户邮箱格式错误！",
        "5013"=>"非法邮箱！",
        "5014"=>"用户邮箱已存在！",
        "5015"=>"用户注册异常！请联系管理员。",
        "5016"=>"用户登出参数异常！",
        "5017"=>"创建订单参数异常！",
        "5018"=>"操作超时，请重新登录！",
        "5019"=>"产品已下架！",
        "5020"=>"重复提交订单！",
        "5021"=>"订单生成异常！",
        "5022"=>"支付参数异常！",
        "5023"=>"微信统一下单接口返回异常！",
        "5999"=>"未知错误！"
    );
    
    protected $successMsg = array(
        "login"=>"用户登录成功",
        "binding"=>"用户绑定成功",
        "info"=>"获取用户信息成功",
        "logout"=>"用户登出成功",
        "order"=>"订单生成成功",
        "pay"=>"微信预支付成功"
    );
    
    public function _initialize()
    {       
        parent::_initialize();
    }
    
    public function login($code=''){//php.ini增加php_openssl.dll
        
        if(empty(C("WECHAT_APPLET_OPENID_URL"))||empty(C("WECHAT_APPLET_APPID"))||empty(C("WECHAT_APPLET_SECRET"))){
            $this->apiError("5001", $this->errMsg["5001"]);
        }
        
        if(empty($code)){
            $this->apiError("5002", $this->errMsg["5002"]);
        }

        $url = str_replace("__CODE__", $code, str_replace("__SECRET__", C("WECHAT_APPLET_SECRET"), str_replace("__APPID__", C("WECHAT_APPLET_APPID") , C("WECHAT_APPLET_OPENID_URL"))));
        
        //$url = "https://api.weixin.qq.com/sns/jscode2session?appid=wxb8f0f7c6edd6d9e6&secret=1a88783accd027b70794d7fd261e3318&js_code=023xq5Vg05pOYw1tbeTg0gsiVg0xq5Va&grant_type=authorization_code";
                
        $wechatInfo = json_decode(file_get_contents($url),true);
        
        //print_r($wechatInfo);exit;
        
        /* $wechatInfo = Array("session_key" => "o1obcoqHtV74vNXD3Nr8wQ==","openid" => "osRmp5cx-EkToyjWVx6edu0RGLI8");  
        $wechatInfo = Array("session_key" => "gQa/1ZLZS/3772nUwfOUyg==","openid" => "oiNVd5RxJ-Gaq31z2G2ZnSnZqJs8"); */ 
        
        if(!$wechatInfo||!is_array($wechatInfo)||!$wechatInfo["openid"]||!$wechatInfo["session_key"]){
            $this->apiError("5003", $this->errMsg["5003"]);
        }
        
        //$map['status'] = array('egt', 0);
        $map['wx_applet_openid'] = $wechatInfo["openid"];
        $member = M("Member")->field('uid,nickname,status,sex,signature,isteacher,wx_applet_openid')->where($map)->select();
        //print_r($member);
        if($member&&$member[0]&&$member[0]['status']>0){
            session_start();
            $session_key = str_replace("/", "_", $wechatInfo["session_key"]);
            session($session_key, $member[0]);
            $member[0]['wx_applet_session_key'] = $session_key;
            $this->apiSuccess($this->successMsg["login"], null, array('data' => $member[0]));
        }elseif($member&&$member[0]&&$member[0]['status']<=0){
            $this->apiError("5004", $this->errMsg["5004"]);
        }elseif(!$member){
            $this->apiError("5005", $this->errMsg["5005"], null, array("openid"=>$wechatInfo["openid"], "session_key"=>$wechatInfo["session_key"]));
        }        
    }
    
    public function binding($o='', $u='', $s=''){
        if(empty($o)||empty($u)||empty($s)){
            $this->apiError("5006", $this->errMsg["5006"]);
        }
        $map['wx_applet_openid'] = $o;
        $exit = M("Member")->field('uid,nickname,status,sex,signature,isteacher,wx_applet_openid')->where($map)->count();
        
        if($exit>0){
            $this->apiError("5007", $this->errMsg["5007"]);
        }
        
        $user = $this->api->info($u,false,false);
        if($user){
            unset($map);
            $map['uid'] = $user[0];
            $member_arr = M("Member")->field('uid,nickname,status,sex,signature,isteacher,wx_applet_openid')->where($map)->select();            
            if($member_arr&&$member_arr[0]&&$member_arr[0]['status']>0){
                $member = $member_arr[0];
                $member['wx_applet_openid'] = $o;
                M("Member")->save($member);
                session_start();
                session($s, $member);
                $member['wx_applet_session_key'] = $s;
                $this->apiSuccess($this->successMsg["binding"], null, array('data' => $member));
            }else{
                $this->apiError("5015", $this->errMsg["5015"]); break;
            }
        }else{
            $this->apiError("5008", $this->errMsg["5008"]);
        }
    }
    
    public function register($o='', $u='', $e='', $s=''){
        if(empty($o)||empty($u)||empty($e)||empty($s)){
            $this->apiError("5006", $this->errMsg["5006"]);
        }
        $map['wx_applet_openid'] = $o;
        $exit = M("Member")->field('uid,nickname,status,sex,signature,isteacher,wx_applet_openid')->where($map)->count();
        
        if($exit>0){
            $this->apiError("5007", $this->errMsg["5007"]);
        }        
        
        $ret = $this->api->register($u, $u, '123456', $e);
            
        if($ret>0){
            unset($map);
            $map['uid'] = $ret;
            $member_arr = M("Member")->field('uid,nickname,status,sex,signature,isteacher,wx_applet_openid')->where($map)->select();
            if($member_arr&&$member_arr[0]&&$member_arr[0]['status']>0){
                $member = $member_arr[0];
                $member['wx_applet_openid'] = $o;
                M("Member")->save($member);
                session_start();
                session($s, $member);
                $member['wx_applet_session_key'] = $s;
                $this->apiSuccess($this->successMsg["binding"], null, array('data' => $member));
            }else{
                $this->apiError("5015", $this->errMsg["5015"]); break;
            }            
        }else{
            switch($ret){
                case -1: $this->apiError("5009", $this->errMsg["5009"]); break;
                case -2: $this->apiError("5010", $this->errMsg["5010"]); break;
                case -3: $this->apiError("5011", $this->errMsg["5011"]); break;
                case -5: $this->apiError("5012", $this->errMsg["5012"]); break;
                case -7: $this->apiError("5013", $this->errMsg["5013"]); break;
                case -8: $this->apiError("5014", $this->errMsg["5014"]); break;
                default: $this->apiError("5999", $this->errMsg["5999"]); break;
            }
        }        
    }
    
    public function getUserInfo($s=''){
        $this->apiSuccess($this->successMsg["info"], null, array('data' => session($s)));
    }
    
    public function logout($s=''){
        if(empty($s)){
            $this->apiError("5016", $this->errMsg["5016"]);
        }
        session($s, null);
        $this->apiSuccess($this->successMsg["logout"], null, null);
    }
    
    public function createOrder($s='',$i='',$n=1){
        if(empty($s)||empty($i)){
            $this->apiError("5017", $this->errMsg["5017"]);
        }
        
        $user = session($s);        
        if(!$user||!$user['uid']){
            $this->apiError("5018", $this->errMsg["5018"]);
        }
        $uid = $user['uid'];
        
        $live = M('Live');
        unset($map);
        $map['status'] = 1;
        $map['id'] = $i;        
        $course = $live->field('id,title,image,price')->where($map)->select();        
        if(!$course||!$course[0]){
            $this->apiError("5019", $this->errMsg["5019"]);
        }        
        //print_r($course[0]);
        
        if (!empty($course[0]['image'])) {
            $imageurl = $this->protocol . get_cover($course[0]['image'], 'path');
        }
                
        $model = new Model();
        //$order=M("order");
        $order = $model->table(C(DB_PREFIX)."order");
        $tag = $this->ordersn();
        unset($map);
        $map['tag'] = $tag;
        $value=$order->where($map)->getField('id');
        if(isset($value)){
            $this->apiError("5020", $this->errMsg["5020"]);
        }
        
        $total = $n*$course[0]['price'];
        $status = $total==0?2:1;
        
        $model->startTrans();
        try{
            //新建订单条目
            //$orderlist=M("orderlist"); 
            $orderlist=$model->table(C(DB_PREFIX)."orderlist");
            unset($data);
            $data['MODULE_NAME'] = 'Live';
            $data['title'] = $course[0]["title"];
            $data['url'] = $this->protocol.'/index.php?s=/live/index/detail/id/'.$i.'.html';
            $data['goodid'] = $i;
            $data['status'] = $status;
            $data['orderid'] = '';
            $data['parameters'] = '';
            $data['sort'] = 0;
            $data['num'] = $n;
            $data['uid'] = $uid;
            $data['username'] = query_user('nickname',$uid);
            $data['tag'] = $tag;
            $data['create_time'] = NOW_TIME;
            $data['price'] = $course[0]['price'];
            $data['total'] = $total;
            $orderlist->add($data);    
            
            //新建订单
            unset($data);
            $order = $model->table(C(DB_PREFIX)."order");
            $data['score']=0;//积分 暂时不用
            $data['codeid']=0;//优惠券  暂时不用
            $data['codemoney']=0;//优惠券可使用的金额 暂时不用
            $data['addressid']=0;//买家地址 暂时不用
            $data['total']=$total;  //订单的商品总额        
            $data['create_time']=NOW_TIME;
            $data['shipprice']=0; //订单的运费 暂时不用
            //计算提交的订单的总费用
            $data['pricetotal']=$data['total']; //计算提交的订单的总费用
            $data['orderid']=$tag;
            $data['tag']=$tag;
            $data['uid']=$uid;
            $data['username']=query_user('nickname',$uid);
            //设置订单状态为用户为未能完成，不删除数据
            $data['backinfo']="等待支付";
            $data['ispay']=$total==0?"2":"1";
            $data['status']=$status;//待支付
            $data['paymode']=$total==0?"":null;
            //根据订单id保存对应的费用数据   
            $orderid=$order->add($data);
            
            unset($map);
            $orderlist=$model->table(C(DB_PREFIX)."orderlist");
            $map['tag'] = $tag;
            $orderlist->where($map)->setField('orderid',$orderid);
            
            //新建订单支付记录
            //$pay=M("Pay");
            unset($data);
            $pay=$model->table(C(DB_PREFIX)."pay");
            $data['money']=$n*$course[0]['price'];
            $data['ratio']=0;
            $data['total']=$n*$course[0]['price'];
            $data['out_trade_no']=$tag;
            $data['yunfee']=0;
            $data['coupon']=0;
            $data['uid']=$uid;
            $data['username']=query_user('nickname',$uid);
            $data['ratioscore']=0;
            $data['couponcode']=0;
            $data['addressid']=0;
            $data['create_time']=NOW_TIME;
            $data['type']=1;//在线支付
            $data['status']=$status;//待支付
            $pay->add($data);  
            
            $model->commit();
        }catch (Exception $e){
            $model->rollback();
            $this->apiError("5021", $this->errMsg["5021"]);
        }
        
        unset($ret);
        $ret['order'] = $tag;
        $ret['num'] = $n;
        $ret['price'] = $course[0]['price'];
        $ret['total'] = $total;
        $ret['status'] = $status;
        $ret['title'] = $course[0]["title"];
        $ret['imageurl'] = $imageurl;
        
        $this->apiSuccess($this->successMsg["order"], null, array('data' => $ret));        
    }
    
    public function pay($s='', $o=''){
        if(empty($s)||empty($o)){
            $this->apiError("5022", $this->errMsg["5022"]);
        }
        
        $user = session($s);
        if(!$user||!$user['uid']||!$user['wx_applet_openid']){
            $this->apiError("5018", $this->errMsg["5018"]);
        }
        $openid = $user['wx_applet_openid'];
        
        $payment = M("pay")->where(array('out_trade_no' => $o))->find();        
        if(!$payment){
            $this->apiError("5022", $this->errMsg["5022"]);
        }
        
        /* $order = M('order')->where(array('orderid' => $o))->find();        
        if(!$order){
            $this->apiError("5022", $this->errMsg["5022"]);
        } */
        
        include(ROOT_PATH.'extend/Wxpay/lib/WxPay.Api.php');
        include(ROOT_PATH.'extend/Wxpay/example/WxPay.ConfigXCX.php');
        //use './extend/Wxpay/example/log.php';
        
        $input = new \WxPayUnifiedOrder();
        $input->SetBody("test");
        $input->SetAttach("test");
        //$input->SetBody($o);
    	//$input->SetAttach("test");
    	$input->SetOut_trade_no($o);
    	$input->SetTotal_fee($payment["total"]*100);
    	$input->SetTime_start(date("YmdHis"));
    	$input->SetTime_expire(date("YmdHis", time() + 600));
    	$input->SetGoods_tag("test");
    	$input->SetNotify_url("http://".$_SERVER['HTTP_HOST']."/index.php/Payoff/Wxpay/notifyurl.html");
    	$input->SetTrade_type("JSAPI");
    	$input->SetProduct_id("123456789");
    	$input->SetOpenid($openid);
    	$config = new \WxPayConfigXCX(); 	       
    	
    	
    	try{
    	    $order = \WxPayApi::unifiedOrder($config, $input); 
    	    $parameters = $this->GetJsApiParameters($order);
    	    $this->apiSuccess($this->successMsg["pay"], null, array('data' => json_decode($parameters)));   
    	}catch(Exception $e){
    	    $this->apiError("5023", $this->errMsg["5023"]);
    	}
    	
    }
    
    private function ordersn(){
        $yCode = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J');
        $orderSn = $yCode[intval(date('Y')) - 2011] . strtoupper(dechex(date('m'))) . date('d') . substr(time(), -5) . substr(microtime(), 2, 5) . sprintf('%04d%02d', rand(1000, 9999),rand(0,99));
        return $orderSn;
    }
    
    private function GetJsApiParameters($UnifiedOrderResult)
    {
        if(!array_key_exists("appid", $UnifiedOrderResult)
            || !array_key_exists("prepay_id", $UnifiedOrderResult)
            || $UnifiedOrderResult['prepay_id'] == "")
        {
            throw new \WxPayException("参数错误");
        }
        
        $jsapi = new \WxPayJsApiPay();
        $jsapi->SetAppid($UnifiedOrderResult["appid"]);
        $timeStamp = time();
        $jsapi->SetTimeStamp("$timeStamp");
        $jsapi->SetNonceStr(\WxPayApi::getNonceStr());
        $jsapi->SetPackage("prepay_id=" . $UnifiedOrderResult['prepay_id']);
        
        $config = new \WxPayConfigXCX();
        $jsapi->SetPaySign($jsapi->MakeSign($config));
        $parameters = json_encode($jsapi->GetValues());
        return $parameters;
    }
}