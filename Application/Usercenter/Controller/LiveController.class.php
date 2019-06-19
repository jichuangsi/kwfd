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
        if (!is_login()) {
            $this->error('请登陆后再访问本页面。');
        }
        $this->ordermodel=D("Cart/order");
        $this->orderlistmodel=D("Cart/orderlist");
    }

    public function index($tab = 'all',$page = 1, $r = 12)
    {	   
	   //$mapmodel=array("all"=>array('l.uid'=>get_uid()),"PaymentsMade"=>array('uid'=>get_uid(),'ispay'=>2),"PaymentsDue"=>array('uid'=>get_uid(),'ispay'=>1));
	   $mapmodel=array("all"=>array('l.uid'=>get_uid()),"PaymentsMade"=>array('l.uid'=>get_uid(),'live.endtime'=>array('lt',NOW_TIME)),"PaymentsDue"=>array('l.uid'=>get_uid(),'live.starttime'=>array('gt',NOW_TIME)));
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
	   $list = $this->orderlistmodel->alias("l")->field('l.*,o.*,live.*')->join(C('DB_PREFIX').'Order o ON l.tag=o.orderid','LEFT')->join(C('DB_PREFIX').'Live live ON l.goodid=live.id','LEFT')->where($map)->order('l.id desc')->page($page, $r)->select();
	   //dump($this->orderlistmodel->_SQL());
	   $totalCount = $this->orderlistmodel->alias("l")->join(C('DB_PREFIX').'Order o ON l.tag=o.orderid','LEFT')->join(C('DB_PREFIX').'Live live ON l.goodid=live.id','LEFT')->where($map)->count();
	   
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