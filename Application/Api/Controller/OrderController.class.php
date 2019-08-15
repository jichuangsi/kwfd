<?php
/**
 * Created by PhpStorm.
 * User: 
 * Date: 1/15/14
 * Time: 4:17 PM
 */
namespace Api\Controller;

header('Access-Control-Allow-Origin:*');

class OrderController extends ApiController
{

    protected $errMsg = array(
        "6001"=>"订单查询缺少用户信息参数！",       
        "6002"=>"订单查询缺少订单号参数！", 
        "6003"=>"订单不存在！", 
        "6004"=>"申请取消订单失败，请联系管理员！",
        "6005"=>"所查询订单不存在！",
        "6999"=>"未知错误！"
    );
    
    protected $successMsg = array(        
        "check"=>"订单检查成功",
        "query"=>"订单列表查询成功",
        "detail"=>"订单详情查询成功",
        "cancel"=>"订单已取消"
    );
    
    protected $coursemodel;
    protected $categorymodel;
    protected $orderlistmodel;
    protected $ordermodel;
    protected $ordercancelmodel;
    
    public function _initialize()
    {
        $this->coursemodel = D('Live/Live');
        $this->categorymodel = D('Live/LiveCategory');
        $this->orderlistmodel = D('Cart/Orderlist');
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
    
    public function orderQuery($p = 1, $r = 20, $u='', $s = -1){
        
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
        
        $totalCount = $this->ordermodel->alias("orders")->where($map)->count();
        
        $result[data] = $this->fetchOrders($map,$p,$r);
        $result['count'] = $totalCount;
        
        $this->apiSuccess($this->successMsg["query"], null, $result);
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
        
        $result[data] = $this->fetchOrders($map);
        
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
    
    private function fetchOrders($map, $p = 1, $r = 20){
        $list = $this->ordermodel->alias("orders")
                    ->field("orders.id,orders.orderid,orders.pricetotal,orders.create_time,orders.update_time,orders.status,orders.uid,orders.username,orders.ispay,orders.total")
                    //->join('LEFT JOIN '.C('DB_PREFIX').'orderlist as orderlist on orders.id=orderlist.orderid')
                    ->where($map)->order('id desc')->page($p, $r)->select();
        
        if(!$list){
            $this->apiError('6005', $this->errMsg["6005"]);
        }
        
        foreach($list as $key=> $val)
        {
            $list[$key]['orderlist']=$this->orderlistmodel->alias("orderlist")
                                    ->field('orderlist.id,orderlist.url,orderlist.title,orderlist.goodid,orderlist.num,orderlist.price,orderlist.total,live.image,live.view')
                                    ->join('LEFT JOIN '.C('DB_PREFIX').'live as live on live.id=orderlist.goodid')->where('orderid=\''.$val['id'].'\'')->select();
            
            foreach($list[$key]['orderlist'] as $k => &$v){
                if(!empty($v["image"])){
                    $v['imageurl'] = $this->protocol . get_cover($v['image'], 'path');
                }
                
                unset($map);
                $map['o.goodid'] = $v['goodid'];
                $map['o.MODULE_NAME']='Live';
                $sold = $this->orderlistmodel->alias("o")->where($map)->count();
                $v['sold'] = $sold;
            }
        }
        
        return $list;
    }
}