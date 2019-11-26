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

class OrderController extends ApiController
{

    protected $errMsg = array(
        "6001"=>"订单查询缺少用户信息参数！",       
        "6002"=>"订单查询缺少订单号参数！", 
        "6003"=>"订单不存在！", 
        "6004"=>"申请取消订单失败，请联系管理员！",
        "6005"=>"所查询订单不存在！",
        "6006"=>"订单生成缺少必要参数！", 
        "6007"=>"订单重复提交！",
        "6008"=>"订单生成异常！",
        "6009"=>"订单查询缺少必要参数！",
        "6010"=>"订单更新缺少必要参数！", 
        "6999"=>"未知错误！"
    );
    
    protected $successMsg = array(        
        "check"=>"订单检查成功",
        "query"=>"订单列表查询成功",
        "detail"=>"订单详情查询成功",
        "cancel"=>"订单已取消",
        "create"=>"订单已生成成功",
        "update"=>"订单已更新成功"
    );
    
    protected $coursemodel;
    protected $categorymodel;
    protected $schedulemodel;
    protected $orderlistmodel;
    protected $orderlistdetailmodel;
    protected $ordermodel;
    protected $ordercancelmodel;
    
    public function _initialize()
    {
        $this->coursemodel = D('Live/Live');
        $this->categorymodel = D('Live/LiveCategory');
        $this->schedulemodel = D('Live/LiveSchedule');
        $this->orderlistmodel = D('Cart/Orderlist');
        $this->orderlistdetailmodel = D('Cart/Orderlistdetail');
        $this->ordermodel = D("Cart/order");
        $this->ordercancelmodel=D("Cart/ordercancel");
        parent::_initialize();
    }
    
    public function orderCheck($u=''){
        if(empty($u)){
            $this->apiError('6001', $this->errMsg["6001"]);
        }
        
        $map['uid']=$u;
        $ordercount = $this->ordermodel->where($map)->count();
        
        if(!$ordercount){
            $this->apiSuccess($this->successMsg["check"], null, array('count'=>$ordercount));
        }
        
        unset($map);
        unset($ordercount);
        $map['orders.uid']=$u;
        $orderTags=array();
        $orders = $this->ordermodel->alias("orders")->field('orders.tag')->join('RIGHT JOIN '.C('DB_PREFIX').'orderlist as orderlist on orders.id=orderlist.orderid')->where($map)->select();
        //echo $this->ordermodel->getLastSql();
        foreach($orders as $k => $v){
            if (!in_array($v, $orderTags)){                
                array_push($orderTags, $v);
            }
        }
        $this->apiSuccess($this->successMsg["check"], null, array('count'=>count($orderTags)));
    }    
    
    public function orderQuery($p = 1, $r = 20, $u='', $s = -1, $g=''){
        
        if(empty($u)){
            $this->apiError('6001', $this->errMsg["6001"]);
        }
        
        $mapmodel=array("all"=>array('orders.uid'=>$u),"PaymentsMade"=>array('orders.uid'=>$u,'orders.ispay'=>2),"PaymentsDue"=>array('orders.uid'=>$u,'orders.ispay'=>1));
        switch($s)
        {
            case 2://已付款
                $tab = "PaymentsMade";
                break;
            case 1://未付款
                $tab = "PaymentsDue";
                break;
            case "all":
            default:
                $tab = "all";
                break;
        }
        $map=$mapmodel[$tab];
        
        if(empty($g)){
            $totalCount = $this->ordermodel->alias("orders")->where($map)->count();            
        }else{
            $res = $this->ordermodel->alias("orders")
                    ->join('RIGHT JOIN '.C('DB_PREFIX').'orderlist as orderlist on orders.id = orderlist.orderid and orderlist.orgId='.$g)
                    ->where($map)->group("orderlist.tag")->select();
           $totalCount = count($res);
        }
        
        $result['data'] = $this->fetchOrders($map,$p,$r,array('orgId'=>$g));
        $result['count'] = $totalCount;
        
        $this->apiSuccess($this->successMsg["query"], null, $result);
    }
    
    public function orderListQuery($p = 1, $r = 20, $u='', $s = -1, $g=''){
        
        if(empty($u)){
            $this->apiError('6001', $this->errMsg["6001"]);
        }        
        
        unset($map);
        $map['orderlist.uid'] = $u;
        if($g){
            $map['detail.orgId'] = $g;
        }else{
            $map['detail.orgId'] = array('gt',0);
        }
        
        if(intval($p)===1){
            $orgs = $this->orderlistmodel->alias("orderlist")
                        //->field('orderlist.orgId, orderlist.goodid, orderlist.url, min(orderlist.updateFlag) as updateFlag')         
                        ->field('detail.orgId, detail.goodid, detail.url, min(detail.updateFlag) as updateFlag')      
                        ->join(C('DB_PREFIX').'orderlistdetail detail ON orderlist.id=detail.orderlistid','LEFT')
                        ->where($map)->group("detail.orgId, detail.goodid")->select();          
            $params = array();
            foreach($orgs as $k => $v){
                
                if($v['orgId']){
                    if (array_key_exists($v['orgId'],$params)){
                        array_push($params[$v['orgId']]['goodid'],$v['goodid']);
                    }else{
                        $params[$v['orgId']]['url'] = $v['url'];
                        $params[$v['orgId']]['updateFlag'] = $v['updateFlag'];
                        $params[$v['orgId']]['goodid'] = array($v['goodid']);
                    }
                }
            }
            
            foreach($params as $k => $v){
                $res = $this->fetchCourses(array('updateFlag'=>$v['updateFlag'],'orgid'=>$k,'goodid'=>$v['goodid']), $v['url']);
                if($res){
                    foreach($res as $k1 => $v1){
                        unset($map);
                        unset($update);
                        if($v1['id']&&$v1['orgId']){
                            $map['goodid'] = $v1['id'];
                            $map['orgId'] = $v1['orgId'];
                            $update['title'] = $v1['title'];
                            $update['image'] = $v1['imageurl'];
                            $update['view'] = intval($v1['view']);
                            //$update['starttime'] = intval($v1['starttime']);
                            //$update['endtime'] = intval($v1['endtime']);
                            $update['updateFlag'] = intval($v1['updateFlag']);
                            //$update['courseStatus'] = intval($v1['status']);
                            $update['online'] = intval($v1['online']);
                            //$this->orderlistmodel->where($map)->setField($update);
                            $this->orderlistdetailmodel->where($map)->setField($update);
                        }
                    }
                }
            }
        }        
        
        unset($map);
        $map['l.uid']=$u;
        if($g){
            $map['d.orgId'] = $g;
        }else{
            $map['d.orgId'] = array('gt',0);
        }
        switch($s)
        {
            case 2://已付款
                $map['d.endtime'] = array('lt',NOW_TIME);
                break;
            case 1://未付款
                $map['d.starttime'] = array('gt',NOW_TIME);
                break;
            case -1:
            default: break;
        }
        
        $list = $this->orderlistmodel->alias("l")->field('l.*,o.*,d.*')
                ->join(C('DB_PREFIX').'Order o ON l.tag=o.orderid','LEFT')
                ->join(C('DB_PREFIX').'Orderlistdetail d ON d.orderlistid=l.id','LEFT')
                ->where($map)->order('l.id desc, d.id asc')->page($p, $r)->select();
        //dump($this->orderlistmodel->_SQL());
        $totalCount = $this->orderlistmodel->alias("l")
                        ->join(C('DB_PREFIX').'Order o ON l.tag=o.orderid','LEFT')
                        ->join(C('DB_PREFIX').'Orderlistdetail d ON d.orderlistid=l.id','LEFT')
                        ->where($map)->count();      
        
        
        $result['data'] = $list;
        $result['count'] = $totalCount;
        $this->apiSuccess($this->successMsg["query"], null, $result);
        
    }
    
    public function orderPostQuery(){
        $postdata = json_decode($_POST['p'],true);
        
        if(empty($postdata)){
            $this->apiError('6009', $this->errMsg["6009"]);
        }
        
        unset($map);
        foreach($postdata as $k => $v){
            if($k!='g'&&$k!='p'&&$k!='r'){
                $map[$k] = $v;
            }
        }        
        
        if(empty($postdata['g'])){
            $totalCount = $this->ordermodel->alias("orders")->where($map)->count();
        }else{
            $res = $this->ordermodel->alias("orders")
                    ->join('RIGHT JOIN '.C('DB_PREFIX').'orderlist as orderlist on orders.id = orderlist.orderid and orderlist.orgId='.$postdata['g'])
                    ->where($map)->group("orderlist.tag")->select();
            $totalCount = count($res);
        }
        
        $result['data'] = $this->fetchOrders($map,$postdata['p'],$postdata['r'],array('orgId'=>$postdata['g']));
        $result['count'] = $totalCount;
        
        $this->apiSuccess($this->successMsg["query"], null, $result);
    }
    
    public function orderCreate(){
        $postdata = json_decode($_POST['p'],true);
        
        if(empty($postdata)){
            $this->apiError('6006', $this->errMsg["6006"]);
        }
        //dump($postdata);
        
        $model = new Model();
        $order = $model->table(C(DB_PREFIX)."order");
        $tag = ordersn();
        unset($map);
        $map['tag'] = $tag;
        $value=$order->where($map)->getField('id');
        //dump($tag);
        if(isset($value)){
            $this->apiError("6007", $this->errMsg["6007"]);
        }        
        
        //创建订单--start
        $model->startTrans();
        try{
            //新建订单条目           
            $amount = 0;
            $uid = "";
            $username = "";            
            foreach($postdata as $key => $val){
                unset($data);                
                $total = $val['num']*$val['price'];
                $status = $total==0?2:1;
                $amount += $total;
                $data['MODULE_NAME'] = $val['MODULE_NAME'];
                $data['title'] = $val['title'];
                $data['url'] = $val['url'];
                $data['goodid'] = $val['goodid'];
                $data['status'] = $status;
                $data['orderid'] = '';
                $data['parameters'] = '';
                $data['sort'] = 0;
                $data['num'] = $val['num'];
                $data['uid'] = $uid =$val['uid'];
                $data['username'] = $username =$val['username'];
                $data['tag'] = $tag;
                $data['create_time'] = NOW_TIME;
                $data['price'] = $val['price'];
                $data['total'] = $total;
                /* $data['orgId'] = $val['orgId'];
                $data['orgName'] = $val['orgName']; */
                if(isset($val["suid"])&&!empty($val["suid"])){
                    $data['suid'] = $val["suid"];
                }
                /* if(!empty($val["image"])){
                    $data['image'] = $val["image"];
                }
                if(!empty($val["view"])){
                    $data['view'] = $val["view"];
                }
                if(!empty($val["starttime"])){
                    $data['starttime'] = $val["starttime"];
                }
                if(!empty($val["endtime"])){
                    $data['endtime'] = $val["endtime"];
                }
                $data['courseStatus'] = $val["courseStatus"];  
                $data['online'] = $val["online"];  
                $data['updateFlag'] = $val["updateFlag"];          */       
                //dump($data);
                $orderlist=$model->table(C(DB_PREFIX)."orderlist");
                $newid= $orderlist->add($data);
                //echo $orderlist->_sql();
                
                if($newid){
                    
                    if(isset($val["sid"])&&!empty($val["sid"])){
                        unset($map);
                        $map['courseid']=$val['goodid'];
                        $map['s.id'] = array('IN', implode(',', explode('-', $val["sid"])));                        
                        $schedules = $this->schedulemodel->alias("s")->field('s.teacherid, s.interval, s.starttime, s.endtime')->where($map)->select();
                    }else{   
                        $schedules = array();
                        array_push($schedules, ['teacherid'=>$val["teacherid"],'interval'=>$val["interval"],'starttime'=>$val["starttime"],'endtime'=>$val["endtime"]]);
                    }
                    
                    foreach($schedules as $skey => $sval){
                        unset($data);
                        $data=array();
                        
                        if(intval($sval['interval'])===0){//特定上课时间
                            $param['MODULE_NAME'] = $val['MODULE_NAME'];
                            $param['title'] = $val['title'];
                            $param['url'] = $val['url'];
                            $param['goodid'] = $val['goodid'];
                            $param['orderlistid'] = $newid;
                            $param['orgId'] = $val['orgId'];
                            $param['orgName'] = $val['orgName'];
                            if(!empty($val["image"])){
                                $param['image'] = $val["image"];
                            }
                            if(!empty($val["view"])){
                                $param['view'] = $val["view"];
                            }
                            if(!empty($sval["starttime"])){
                                $param['starttime'] = $sval["starttime"];
                            }
                            if(!empty($sval["endtime"])){
                                $param['endtime'] = $sval["endtime"];
                            }
                            $param['courseStatus'] = $val["courseStatus"];
                            $param['online'] = $val["online"];
                            $param['updateFlag'] = $val["updateFlag"];
                            $param['teacherid'] = $sval["teacherid"];
                            
                            array_push($data, $param);
                        }else{//规律上课时间
                            $r = 0;
                            for($i = 0; $i < intval($val['period']); $i++){
                                unset($param);
                                $timeStr = "0 seconds";
                                switch(intval($sval['interval'])){
                                    case 2: $timeStr = (1*$i)." days"; break;//每天(含周末)
                                    case 3: {
                                        if($i===0)
                                            $timeStr  = (1*$i)." days";
                                            else{
                                                $j = 0;
                                                while(true){
                                                    $z = ((1*($r?$r:$i))+$j);
                                                    $timeStr  = $z ." days";
                                                    if(!$this->checkWeekend($sval["starttime"], $timeStr)){
                                                        $r = $z+1;
                                                        break;
                                                    }
                                                    $j++;
                                                }
                                            }
                                    };
                                    break;//每天(不含周末)
                                    case 4: $timeStr = (2*$i)." days"; break;//隔天(含周末)
                                    case 5: {
                                        if($i===0)
                                            $timeStr = (2*$i)." days";
                                            else{
                                                $j = 0;
                                                while(true){
                                                    $z = ((($r?$r:(2*$i)))+$j);
                                                    $timeStr  = $z ." days";
                                                    if(!$this->checkWeekend($sval["starttime"], $timeStr)){
                                                        $r = $z+2;
                                                        break;
                                                    }
                                                    $j+=1;
                                                }
                                            }
                                    };
                                    break;//隔天(不含周末)
                                    case 6: $timeStr = (7*$i)." days"; break;//每周
                                    case 7: $timeStr = (1*$i)." months"; break;//每月
                                    case 8: $timeStr = (3*$i)." months"; break;//每季
                                    case 9: $timeStr = (1*$i)." years"; break;//每年
                                }
                                
                                $param['MODULE_NAME'] = $val['MODULE_NAME'];
                                $param['title'] = $val['title'];
                                $param['url'] = $val['url'];
                                $param['goodid'] = $val['goodid'];
                                $param['orderlistid'] = $newid;
                                $param['orgId'] = $val['orgId'];
                                $param['orgName'] = $val['orgName'];
                                if(!empty($val["image"])){
                                    $param['image'] = $val["image"];
                                }
                                if(!empty($val["view"])){
                                    $param['view'] = $val["view"];
                                }
                                if(!empty($sval["starttime"])){
                                    //$param['starttime'] = $val["starttime"];
                                    //$param['starttimetest'] = date_add(date_create(date(DATE_ISO8601, $val["starttime"])),date_interval_create_from_date_string($timeStr));
                                    $param['starttime'] = date_timestamp_get(date_add(date_create(date(DATE_ISO8601, $sval["starttime"])),date_interval_create_from_date_string($timeStr)));
                                }
                                if(!empty($sval["endtime"])){
                                    //$param['endtime'] = $val["endtime"];
                                    //$param['endtimetest'] = date_add(date_create(date(DATE_ISO8601, $val["endtime"])),date_interval_create_from_date_string($timeStr));
                                    $param['endtime'] = date_timestamp_get(date_add(date_create(date(DATE_ISO8601, $sval["endtime"])),date_interval_create_from_date_string($timeStr)));
                                }
                                $param['courseStatus'] = $val["courseStatus"];
                                $param['online'] = $val["online"];
                                $param['updateFlag'] = $val["updateFlag"];
                                $param['teacherid'] = $sval["teacherid"];
                                
                                array_push($data, $param);
                            }
                        }
                        
                        foreach($data as $v){
                            $orderlistdetail=$model->table(C(DB_PREFIX)."orderlistdetail");
                            $orderlistdetail->add($v);
                        }
                        //echo $orderlistdetail->_sql();
                        
                        /* $test=array();
                        array_push($test, $data); */
                    }
                    //$this->apiSuccess($this->successMsg["create"], null, $test);
                    
                }
            }
            
            //新建订单
            unset($data);
            $order = $model->table(C(DB_PREFIX)."order");
            $data['score']=0;//积分 暂时不用
            $data['codeid']=0;//优惠券  暂时不用
            $data['codemoney']=0;//优惠券可使用的金额 暂时不用
            $data['addressid']=0;//买家地址 暂时不用
            $data['total']=$amount;  //订单的商品总额
            $data['create_time']=NOW_TIME;
            $data['shipprice']=0; //订单的运费 暂时不用
            //计算提交的订单的总费用
            $data['pricetotal']=$data['total']; //计算提交的订单的总费用
            $data['orderid']=$tag;
            $data['tag']=$tag;
            $data['uid']=$uid;
            $data['username']=$username;
            //设置订单状态为用户为未能完成，不删除数据
            $data['backinfo']="等待支付";
            $data['ispay']=$amount==0?"2":"1";
            $data['status']=$amount==0?"2":"1";//支付状态
            $data['paymode']=$amount==0?"":null;
            //根据订单id保存对应的费用数据
            //dump($data);
            $orderid=$order->add($data);
            
            unset($map);
            $orderlist=$model->table(C(DB_PREFIX)."orderlist");
            $map['tag'] = $tag;
            $orderlist->where($map)->setField('orderid',$orderid);
            
            //新建订单支付记录
            unset($data);
            $pay=$model->table(C(DB_PREFIX)."pay");
            $data['money']=$amount;
            $data['ratio']=0;
            $data['total']=$amount;
            $data['out_trade_no']=$tag;
            $data['yunfee']=0;
            $data['coupon']=0;
            $data['uid']=$uid;
            $data['username']=$username;
            $data['ratioscore']=0;
            $data['couponcode']=0;
            $data['addressid']=0;
            $data['create_time']=NOW_TIME;
            $data['type']=1;//在线支付
            $data['status']=$amount==0?"2":"1";//待支付
            //dump($data);
            $pay->add($data);
            
            $model->commit();
        }catch (Exception $e){
            $model->rollback();
            $this->apiError("6008", $this->errMsg["6008"]);
        }
        //创建订单--end
        
        unset($ret);
        $ret['orderid'] = $tag;
        $ret['pricetotal'] = $amount;
        unset($result);
        $result['data'] = $ret;
        
        $this->apiSuccess($this->successMsg["create"], null, $result);
    }
    
    public function orderDetail($u='', $o=''){
        
        if(empty($u)){
            $this->apiError('6001', $this->errMsg["6001"]);
        }
        
        if(empty($o)){
            $this->apiError('6002', $this->errMsg["6002"]);
        }        
        
        $map['orders.uid']=$u;
        $map['orders.orderid']=$o;
        
        $result['data'] = $this->fetchOrders($map);
        
        $this->apiSuccess($this->successMsg["detail"], null, $result);
    }
    
    public function orderCancel($u='', $o =''){        
        
        if(empty($u)){
            $this->apiError('6001', $this->errMsg["6001"]);
        }
        
        if(empty($o)){
            $this->apiError('6002', $this->errMsg["6002"]);
        }
        
        $map['uid']=$u;
        $map['orderid']=$o;
        $orderdata=$this->ordermodel->where($map)->select();
        if(!$orderdata)
        {
            $this->apiError('6003', $this->errMsg["6003"]);
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
            $this->ordercancelmodel->create();
            $this->ordercancelmodel->create_time=NOW_TIME;
            $this->ordercancelmodel->status=3;
            $this->ordercancelmodel->orderid=$o;
            $this->ordercancelmodel->cash=$cash;//取消的金额
            $this->ordercancelmodel->num=1;//取消的数量
            $this->ordercancelmodel->count=1;//取消的种类
            $this->ordercancelmodel->info="自助取消";
            $this->ordercancelmodel->uid=$orderdata[0]["uid"];
            $this->ordercancelmodel->username=$orderdata[0]["username"];
            $this->ordercancelmodel ->add();
            //设置订单为订单已取消
            $data = array('status'=>'6','backinfo'=>'订单已关闭','update_time'=>NOW_TIME);
            //更新订单列表订单状态为已取消，清空取消订单操作
            if($this->ordermodel->where("orderid='$o'")->setField($data))
            {
                $this->apiSuccess($this->successMsg["cancel"], null, null);
            }
            else
            {
                $this->apiError("6004", $this->errMsg["6004"]);
            }
        }else{
            $this->apiError("6004", $this->errMsg["6004"]);
        }
    }    
    
    public function orderPostUpdate(){
        $postdata = json_decode($_POST['p'],true);
        
        if(empty($postdata)||empty($postdata['id'])){
            $this->apiError('6010', $this->errMsg["6010"]);
        }
        
        unset($map);
        unset($update);
        $map['id'] = $postdata['id'];
        
        foreach($postdata as $k => $v){
            if($k!='id'){
                $update[$k] = $v;
            }
        }
        $ret = $this->ordermodel->where($map)->setField($update);
        $result['data'] = $ret;
        
        $this->apiSuccess($this->successMsg["update"], null, $result);
    }
    
    private function fetchOrders($map, $p = 1, $r = 20, $option = array()){
        
        if($option['orgId']){
            $list = $this->ordermodel->alias("orders")
                    ->field("orders.id,orders.orderid,orders.pricetotal,orders.create_time,orders.update_time,orders.status,orders.uid,orders.username,orders.ispay,orders.total")
                    ->join('RIGHT JOIN '.C('DB_PREFIX').'orderlist as orderlist on orders.id = orderlist.orderid and orderlist.orgId='.$option['orgId'])
                    ->where($map)->group("orderlist.tag")->order('orders.id desc')->page($p, $r)->select();
        }else {
            $list = $this->ordermodel->alias("orders")
                    ->field("orders.id,orders.orderid,orders.pricetotal,orders.create_time,orders.update_time,orders.status,orders.uid,orders.username,orders.ispay,orders.total")
                    //->join('LEFT JOIN '.C('DB_PREFIX').'orderlist as orderlist on orders.id=orderlist.orderid')
                    ->where($map)->order('id desc')->page($p, $r)->select();
        }
        
        if(!$list){
            $this->apiError('6005', $this->errMsg["6005"]);
        }
        
        foreach($list as $key=> $val)
        {
            unset($map);
            $map['orderid'] = $val['id'];
            if($option['orgId']){
                $map['orgId'] = $option['orgId'];
            }
            $list[$key]['orderlist']=$this->orderlistmodel->alias("orderlist")
                                    ->field('orderlist.id,detail.url,detail.title,detail.goodid,orderlist.num,orderlist.price,
                                             orderlist.total,detail.orgId,detail.orgName,detail.image,detail.view,detail.starttime,detail.endtime')
                                    ->join('LEFT JOIN '.C('DB_PREFIX').'orderlistdetail as detail on detail.orderlistid=orderlist.id')
                                    ->where($map)->select();
            
            
            foreach($list[$key]['orderlist'] as $k => &$v){
                
                $result = $this->fetchCourse($v['goodid'],$v['url']);
                if($result){
                    $v['image'] = $result['imageurl'];
                    $v['view'] = $result['view'];
                    $v['title'] = $result['title'];
                    $v['starttime'] = $result['starttime'];
                    $v['endtime'] = $result['endtime'];
                }/* else{
                    if(!empty($v["image"])){
                        $v['imageurl'] = $this->protocol . get_cover($v['image'], 'path');
                    }
                }  */       
                
                unset($map);
                $map['o.goodid'] = $v['goodid'];
                $map['o.MODULE_NAME']='Live';
                $sold = $this->orderlistmodel->alias("o")->where($map)->group("orgId")->count();
                $v['sold'] = $sold;
            }
        }
        
        return $list;
    }
    
    private function fetchCourse($goodid='',$url=''){
        $curlUrl = C('MAJOR_COURSE_API_URL');
        
        if($curlUrl&&$url&&$goodid){
            $urls = parse_url($url);
            if($urls&&!empty($urls['scheme'])&&!empty($urls['host'])){
                $host = $urls['scheme']."://".$urls['host'].(!empty($urls['port'])?":".$urls['port']:"");
                $action = "detailQuery/id/$goodid/v/0";
                
                $curlParams = array(str_replace("__HOST__", $host, str_replace("__ACTION__", $action, $curlUrl)));
                
                $result = json_decode(api('CurlRequest/get', $curlParams),true);
                
                if($result){
                    if(is_array($result)){
                        if($result['success']){
                            return $result['data'];                            
                        }else{
                            return false;
                        }
                    }else if(is_string($result)){
                        return false;
                    }else{
                        return false;;
                    }
                } 
            }
        }
        
        return false;
        
    }
    
    private function fetchCourses($params=array(),$url=''){
        $curlUrl = C('MAJOR_COURSE_API_URL');
        
        if($curlUrl&&$url&&count($params)>0){
            $urls = parse_url($url);
            if($urls&&!empty($urls['scheme'])&&!empty($urls['host'])){
                $host = $urls['scheme']."://".$urls['host'].(!empty($urls['port'])?":".$urls['port']:"");
                
                $curlParams = array(str_replace("__HOST__", $host, str_replace("__ACTION__", 'detailsQuery', $curlUrl)), $params);
                
                $result = json_decode(api('CurlRequest/post', $curlParams),true);
                
                if($result){
                    if(is_array($result)){
                        if($result['success']){
                            return $result['data'];
                        }else{
                            return false;
                        }
                    }else if(is_string($result)){
                        return false;
                    }else{
                        return false;;
                    }
                }
            }
        }
        
        return false;
    }
    
    private function checkWeekend($time, $timeStr){        
        $str = date_timestamp_get(date_add(date_create(date(DATE_ISO8601, $time)),date_interval_create_from_date_string($timeStr)));  
        //return $str.'---'.$time.'---'.$timeStr;
        if((date('w',$str)==6) || (date('w',$str) == 0)){            
            return true;
        }else{
            return false;
        }
        
    }
}