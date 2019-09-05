<?php


namespace Cart\Controller;
use Cart\Api\Cart;
use Think\Controller;

/**
 * Class IndexController
 * @package Shop\Controller
 * 
 */
class IndexController extends Controller
{

    /**
     * 商城初始化
     * @author 
     */
	protected $orderModel;
	protected $orderlistModel;
	protected $cart;
    public function _initialize()
    {
       $this->cart = new Cart();
	   $this->orderModel = D('Order');
	   $this->orderlistModel = D('Orderlist');
       /* 读取站点配置 */
       $config = api('Config/lists');
       //dump($config);die();
       C($config); //添加配置
    }

    public function index()
    {
	   /*
	   $this->cart->destroy ();
	   dump($this->cart->contents ());
	   $status = $this->cart->insert ( array (
				'id' => 2,
				'name' =>'你好iphone6',
				'qty' => 2,
				'price' => 200 
		) );
		echo "插入后<br>".$status;
		dump($this->cart->contents ());
		echo "删除后<br>".$status;
		 $this->cart->delete("c81e728d9d4c2f636f067f89cc14862c");
		dump($this->cart->contents ());
		*/
		$this->assign('cart',$this->cart->contents());
		//dump($this->cart->contents() );
		$this->display();
    }
// 添加物品

	public function insert($data) {
		$status = $this->cart->insert($data);
		/*
		$status = $this->cart->insert ( array (
				'id' => 1,
				'name' => '燕子翩2014春季新款女装蕾丝修身显瘦连衣裙长袖弹力',
				'qty' => 1,
				'price' => 200 
		));
		*/
		//dump($this->cart->contents ());
		$this->redirect('Cart/Index/index');
	}
	
	// 更新物品
	public function update($id=0,$qty=0) {
		$status = $this->cart->update ( array (
				'rowid' => md5($id),
				'qty' => $qty 
		) );
		$this->assign ( 'cart', $this->cart->contents() );
		$this->redirect('index');
	}
	// 更新物品
	public function delete($id=0) {
		$rowid=md5($id);
		$this->cart->delete($rowid);
		$this->assign ( 'cart', $this->cart->contents() );
		$this->redirect('index');
	}	
	// 清空物品
	public function clear() {
		$this->cart->destroy ();
		$this->assign('cart',$this->cart->contents() );
		$this->redirect('index');
	}
	function ordersn(){
      $yCode = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J');
      $orderSn = $yCode[intval(date('Y')) - 2011] . strtoupper(dechex(date('m'))) . date('d') . substr(time(), -5) . substr(microtime(), 2, 5) . sprintf('%04d%02d', rand(1000, 9999),rand(0,99));
      return $orderSn;
    }
    public function order()
	{
		if(!is_login()){
	       $this->error( "您还没有登陆",U("home/user/login") );	
		}
		/* uid调用*/
        $uid=get_uid();
		/* 创建订单*/
	 if(IS_POST)
	 {
	  $goodlist=M("orderlist");
	  $order=M("order");
	  $tag=$this->ordersn(); //标识号
	  foreach($this->cart->contents() as $key => $val) 
	  {
		if( ! is_array($val) OR ! isset($val['price']) OR ! isset($val['qty'])) {
                continue;
        }
        $id = $val["id"];
		$num = $val["qty"];
		$goodlist->MODULE_NAME =$val["MODULE_NAME"];		
		$goodlist->title =$val["name"];
		$goodlist->url =$val["url"];
		$goodlist->goodid = $id;
		$goodlist->status = 1;
		$goodlist->orderid ='';
		$goodlist->parameters ="";
		$goodlist->sort =0;
		$goodlist->num = $num;
		$goodlist->uid=$uid;
		if(!empty($val["suid"])){
		    $goodlist->suid=$val["suid"];
		}
		$goodlist->username=query_user('nickname',$uid);
		$goodlist->tag=$tag;//标识号必须相同
		$goodlist->create_time= NOW_TIME;
		$goodprice=$val['price'];
        $goodlist->price =$goodprice;
		$goodtotal=$val['subtotal'];
		$goodlist->total =$goodtotal;
		$goodlist->add();
      } 
	  $this->assign('tag',$tag);
	 }
	 $this->cart->destroy();
	 //$this->redirect('createorder',array('tag'=>$tag));
	 $this->display();

	}
	public function createorder() { 
		if(!is_login()){
	       $this->error( "您还没有登陆",U("home/user/login") );	
		}
		/* uid调用*/
        $uid=get_uid();
		$tag=htmlspecialchars($_POST["tag"]);
		$order=D("order");

		$value=$order->where("tag='$tag'")->getField('id');
        isset($value)&& $this->error('重复提交订单');

		$data['score']=0;//积分 暂时不用
		$data['codeid']=0;//优惠券  暂时不用
		$data['codemoney']=0;//优惠券可使用的金额 暂时不用
		$senderid=0;
		$data['addressid']=0;//买家地址 暂时不用
		$data['total']=$this->getPricetotal($tag);  //订单的商品总额

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
	    $data['ispay']="1";
	    $data['status']="1";//待支付
	    //根据订单id保存对应的费用数据
        $orderid=$order->add($data);
		M("orderlist")->where("tag='$tag'")->setField('orderid',$orderid);
		
		$pay=M("Pay");
	    $pay->create();       
		$pay->money=$data['total'];
		$pay->ratio=0;
		$pay->total=$data['total'];
		$pay->out_trade_no=$tag;
		$pay->yunfee=0;
		$pay->coupon=0;
		$pay->uid=$uid;
		$pay->username=query_user('nickname',$uid);
		$pay->ratioscore=0;
		$pay->couponcode=0;
		$pay->addressid=0;
        $pay->create_time=NOW_TIME;
        $pay->type=1;//在线支付
		$pay->status=1;//待支付
		$pay->add();
		
        $this->meta_title = '订单支付';
        $data=D("order")->where("orderid='$tag'")->find();
		$this->assign('data',$data);
        $this->assign('orderid',$tag);
		
		if(($data['pricetotal']+0)==0)//订单金额为0的免费课程，直接修改状态为已支付
		{
			M("pay")->where(array('out_trade_no' => $tag))->setField('status',2);

		    $data = array('status'=>'2','ispay'=>'2','paymode'=>'');//设置订单为已经支付,状态为已提交
		    M('order')->where(array('orderid' => $tag))->setField($data);
			$this->display("returnurl");
		}
        else
		{			
	       //支付页
           $this->display("Payoff@Index:index");
		}
	}
    public function getPricetotal($tag) { 
        
        $data = M("orderlist")->where("tag='$tag'")->select();
        foreach ($data as $k=>$val) {
			$price=$val['price'];
            $total += $val['num'] * $price;
        }
        return sprintf("%01.2f", $total);
    }	
}