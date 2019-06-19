<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-6-18
 * Time: 上午10:07
 * @author 
 */
namespace Admin\Controller;

use Admin\Builder\AdminConfigBuilder;
use Admin\Builder\AdminListBuilder;
use Admin\Builder\AdminTreeListBuilder;
use Admin\Model\AuthRuleModel;
use Admin\Model\AuthGroupModel;
use Admin\Builder\Combiner;
/**
 * 后台订单控制器
 */
class OrderController extends AdminController {
    protected $_model="Order";
	protected $_modelname="订单";
	protected $datamodel;
    function _initialize()
    {

		$this->datamodel = D($this->_model.'/'.$this->_model);
        parent::_initialize();

    }	
    /**
     * 订单管理
     */
    public function index($page = 1, $r = 20){
        /* 查询条件初始化 */
	
       $map['id']  = array('gt',0);
	   foreach(I() as $key=>$val)
		{
           if(!(strpos($key,'search_') === FALSE))
		   {
			  if($val=="")continue;
			  $tempkey=str_replace('search_','',$key);
			  $map[$tempkey] = array('like', '%' . $val . '%');
		   }
        }
		if(!empty(I('begin_time')) && !empty(I('end_time')))
		{
 
			$map['create_time'] = array(array('EGT', I('begin_time')), array('ELT', I('end_time')));
		}
		else if(!empty(I('begin_time')))
		{
			$map["create_time"]=array('egt',I('begin_time'));
		}
		else if(!empty(I('end_time')))
		{
			$map["create_time"]=array('elt',I('end_time'));
		}
	   $map["status"]=array('neq',6);
	   //dump($map);
       $lists = $this->datamodel->where($map)->order('id desc')->page($page, $r)->select();
	   $totalCount = $this->datamodel->where($map)->count();
	   foreach ($lists as $key=>&$val) {
          $val['ispay']=$val['ispay']==2?"已付款":"未付款";
       }
		
	   $builder = new AdminListBuilder();
       $builder->title('所有'.$this->_modelname."(不包含已取消订单)");
       $builder->meta_title = '所有'.$this->_modelname;
	   //$builder->buttonNew(U($this->_model.'/add'))->buttonDelete(U('setStatus'))->setStatusUrl(U('setStatus'));
	   $builder->keyId()->keyText('orderid', $this->_modelname.'ID')->keyText('uid', '用户ID')->keyText('username', '用户名')->keyText('total', '金额')->keyText('ispay', '状态')->keyCreateTime('create_time', '下单时间')
	   ->keyDoActionEdit($this->_model.'/edit?id=###',"订单详情");
	   //->keyDoAction($this->_model.'/setstatus?status=-1&ids=###','删除','操作',array('class'=>'confirm ajax-get'));
        //$builder->search('内容', 'name');
	   $builder->setSearchPostUrl(U('index'));
	   $builder->search('订单ID', 'search_orderid');
	   $builder->search('用户ID', 'search_uid');
	   $builder->search('开始时间', 'begin_time','time');
	   $builder->search('结束时间', 'end_time','time');
	   //$builder->search('老师', 'search_seller_id','select','',$this->teacher());
	   $builder->data($lists);
       $builder->pagination($totalCount, $r);
       $builder->display();
    }
   /**
     * 订单管理
     */
    public function cancel($page = 1, $r = 20){
        /* 查询条件初始化 */
	
       $map['id']  = array('gt',0);
	   foreach(I() as $key=>$val)
		{
           if(!(strpos($key,'search_') === FALSE))
		   {
			  if($val=="")continue;
			  $tempkey=str_replace('search_','',$key);
			  $map[$tempkey] = array('like', '%' . $val . '%');
		   }
        }
		if(!empty(I('begin_time')) && !empty(I('end_time')))
		{
 
			$map['create_time'] = array(array('EGT', I('begin_time')), array('ELT', I('end_time')));
		}
		else if(!empty(I('begin_time')))
		{
			$map["create_time"]=array('egt',I('begin_time'));
		}
		else if(!empty(I('end_time')))
		{
			$map["create_time"]=array('elt',I('end_time'));
		}
	   //dump($map);
	   $map["status"]=6;
       $lists = $this->datamodel->where($map)->order('id desc')->page($page, $r)->select();
	   $totalCount = $this->datamodel->where($map)->count();
	   foreach ($lists as $key=>&$val) {
          $val['status']="已取消";
       }
		
	   $builder = new AdminListBuilder();
       $builder->title('所有已取消订单');
       $builder->meta_title = '所有'.$this->_modelname;
	   //$builder->buttonNew(U($this->_model.'/add'))->buttonDelete(U('setStatus'))->setStatusUrl(U('setStatus'));
	   $builder->keyId()->keyText('orderid', $this->_modelname.'ID')->keyText('uid', '用户ID')->keyText('username', '用户名')->keyText('total', '金额')->keyText('status', '状态')->keyCreateTime('create_time', '下单时间')
	   ->keyDoActionEdit($this->_model.'/edit?id=###',"订单详情");
	   //->keyDoAction($this->_model.'/setstatus?status=-1&ids=###','删除','操作',array('class'=>'confirm ajax-get'));
        //$builder->search('内容', 'name');
	   $builder->setSearchPostUrl(U('cancel'));
	   $builder->search('订单ID', 'search_orderid');
	   $builder->search('用户ID', 'search_uid');
	   $builder->search('开始时间', 'begin_time','time');
	   $builder->search('结束时间', 'end_time','time');
	   //$builder->search('老师', 'search_seller_id','select','',$this->teacher());
	   $builder->data($lists);
       $builder->pagination($totalCount, $r);
       $builder->display();
    }
    public function teacher($group_id=5){
		
        $auth_group = M('AuthGroup')->where( array('status'=>array('egt','0'),'module'=>'admin','type'=>AuthGroupModel::TYPE_ADMIN) )
            ->getfield('id,id,title,rules');
        $prefix   = C('DB_PREFIX');
        $map['a.group_id']=$group_id;
        $l_table  = $prefix.(AuthGroupModel::MEMBER);
        $r_table  = $prefix.(AuthGroupModel::AUTH_GROUP_ACCESS);
        //$model    = M()->table( $l_table.' m' )->join ( $r_table.' a ON m.uid=a.uid' );
		$lists    = M(AuthGroupModel::AUTH_GROUP_ACCESS)->alias('a')->where($map)->join($l_table.' m ON a.uid=m.uid' )->select();
		foreach ($lists as $key=>&$val) {
            $val['id']=$val['uid'];
			$val['name']=$val['nickname'];
        }
		return array_column($lists,'name','id');
    }
	/**
     * 订单管理
     */
    public function lists($page = 1, $r = 20){
        /* 查询条件初始化 */
	
       $map['id']  = array('gt',0);
	   foreach(I() as $key=>$val)
		{
           if(!(strpos($key,'search_') === FALSE))
		   {
			  if($val=="")continue;
			  $tempkey=str_replace('search_','',$key);
			  $map[$tempkey] = array('like', '%' . $val . '%');
		   }
        }
		if(!empty(I('begin_time')) && !empty(I('end_time')))
		{
 
			$map['create_time'] = array(array('EGT', I('begin_time')), array('ELT', I('end_time')));
		}
		else if(!empty(I('begin_time')))
		{
			$map["create_time"]=array('egt',I('begin_time'));
		}
		else if(!empty(I('end_time')))
		{
			$map["create_time"]=array('elt',I('end_time'));
		}
	   $map["ispay"]=array('eq',2);
	   //dump($map);
       $lists = $this->datamodel->where($map)->order('id desc')->page($page, $r)->select();
	   //var_dump($lists);
	   //var_dump($this->datamodel->_sql());
	   $totalCount = $this->datamodel->where($map)->count();
	   $money=0;
	   foreach ($lists as $key=>&$val) {
		  $money+=$val['pricetotal'];
          $val['ispay']=$val['ispay']==2?"已付款":"未付款";
       }
		
	   $data = array('总额', $money."元");
       $statistic_top = Combiner::instance('HLabelView')->setTitle("")->setData($data)->getView();
		
	   $builder = new AdminListBuilder();
       $builder->title('账单管理');
       $builder->meta_title = '账单管理';
	   //$builder->buttonNew(U($this->_model.'/add'))->buttonDelete(U('setStatus'))->setStatusUrl(U('setStatus'));
	   $builder->keyId()->keyText('orderid', $this->_modelname.'ID')->keyText('uid', '用户ID')->keyText('username', '用户名')->keyText('total', '金额')->keyText('ispay', '状态')->keyCreateTime('create_time', '下单时间')
	   ->hookCombiner('search_top', $statistic_top)
	   ->keyDoActionEdit($this->_model.'/edit?id=###',"订单详情");
	   //->keyDoAction($this->_model.'/setstatus?status=-1&ids=###','删除','操作',array('class'=>'confirm ajax-get'));
        //$builder->search('内容', 'name');
	   $builder->setSearchPostUrl(U('lists'));
	   $builder->search('订单ID', 'search_orderid');
	   $builder->search('用户ID', 'search_uid');
	   $builder->search('开始时间', 'begin_time','time');
	   $builder->search('结束时间', 'end_time','time');
	   //$builder->search('老师', 'search_seller_id','select','',$this->teacher());
	   $builder->data($lists);
       $builder->pagination($totalCount, $r);
       $builder->display();
    }
    /**
     * 新增订单
     * @author 烟消云散 <1010422715@qq.com>
     */
    public function add(){
        if(IS_POST){
            $Config = D('order');
            $data = $Config->create();
            if($data){
                if($Config->add()){
                    S('DB_CONFIG_DATA',null);
                    $this->success('新增成功', U('index'));
                } else {
                    $this->error('新增失败');
                }
            } else {
                $this->error($Config->getError());
            }
        } else {
            $this->meta_title = '新增配置';
            $this->assign('info',null);
            $this->display('edit');
        }
    }

    /**
     * 编辑订单
     * @author 烟消云散 <1010422715@qq.com>
     */
    public function edit($id = 0){
        if(IS_POST){
            $Form = D('order');
          $user=session('user_auth');
          $uid=$user['uid'];
            if($_POST["id"]){ 
                $Form->create();
				$id=$_POST["id"];
				$Form->update_time = NOW_TIME;
			$Form->assistant = $uid;

           $result=$Form->where("id='$id'")->save();
                if($result){
                    //记录行为
                    action_log('update_order', 'order', $data['id'], UID);
                    $this->success('更新成功', Cookie('__forward__'));
                } else {
                    $this->error('更新失败55'.$id);
                }
            } else {
                $this->error($Config->getError());
            }
        } else {
            $info = array();
            /* 获取数据 */
            $info = M('order')->find($id);
$detail= M('order')->where("id='$id'")->select();
         $list=M('orderlist')->alias("orderlist")->field('orderlist.*,live.image')->join('LEFT JOIN '.C('DB_PREFIX').'live as live on live.id=orderlist.goodid')->where("orderid='$id'")->select();

         //$list=M('orderlist')->where("orderid='$id'")->select();
//dump($list);
//die();
$addressid=M('order')->where("id='$id'")->getField("addressid");
$address=M('transport')->where("id='$addressid'")->select();
 $this->assign('alist', $address);
            if(false === $info){
                $this->error('获取订单信息错误');
            }
$this->assign('list', $list);
            $this->assign('detail', $detail);
			 $this->assign('info', $info);
			 $this->assign('a', $orderid);
            $this->meta_title = '编辑订单';
            $this->display();
        }
    }
  /**
     * 订单发货
     * @author 烟消云散 <1010422715@qq.com>
     */
    public function send($id = 0){
        if(IS_POST){
            $Form = D('order');
        $user=session('user_auth');
          $uid=$user['uid'];
            if($_POST["id"]){ 
				$id=$_POST["id"];
			
               $Form->create();
			$user=session('user_auth');
            $uid=$user['uid'];
            $Form->assistant = $uid;
			$Form->update_time = NOW_TIME;
            $Form->status="2";
			$orderid=M('order')->where("id='$id'")->getField("orderid");
    $result=$Form->where("id='$id'")->save();

//根据订单id获取购物清单
$del=M("shoplist")->where("orderid='$id'")->select();

foreach($del as $k=>$val)
	{
//获取购物清单数据表产品id，字段id
$byid=$val["id"];
$goodid=$val["goodid"];
		   //销量加1 库存减1
             $sales= M('document_product')->where("id='$goodid'")->setInc('totalsales');
              $stock= M('document_product')->where("id='$goodid'")->setDec('stock');
$data['status']=2;
$shop=M("shoplist");
 M("shoplist")->where("id='$byid'")->save($data);
}

                if($result){
                    //记录行为
                    action_log('update_order', 'order', $data['id'], UID);
                    $this->success('更新成功', Cookie('__forward__'));
                } else {
                    $this->error('更新失败'.$id);
                }
            } else {
                $this->error($Config->getError());
            }
        } else {
            $info = array();
            /* 获取数据 */
            $info = M('order')->find($id);
$detail= M('order')->where("id='$id'")->select();
$list=M('shoplist')->where("orderid='$id'")->select();

            if(false === $info){
                $this->error('获取订单信息错误');
            }
$this->assign('list', $list);
            $this->assign('detail', $detail);
			 $this->assign('info', $info);
			
            $this->meta_title = '订单发货';
            $this->display();
        }
    }

  
   /**
     * 删除订单
     * @author yangweijie <yangweijiester@gmail.com>
     */
    public function del(){
       if(IS_POST){
             $ids = I('post.id');
            $order = M("order");
			
            if(is_array($ids)){
                             foreach($ids as $id){
		
                             $order->where("id='$id'")->delete();
							 $shop=M("shoplist");
							 $shop->where("orderid='$id'")->delete(); 
                }
            }
           $this->success("删除成功！");
        }else{
            $id = I('get.id');
            $db = M("order");
            $status = $db->where("id='$id'")->delete();
            if ($status){
                $this->success("删除成功！");
            }else{
                $this->error("删除失败！");
            }
        } 
    }




}