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

use Think\Model;
/**
 * Class ShopController
 * @package Admin\controller
 * 
 */
class CompanyController extends AdminController
{

    protected $companyModel;
    protected $companyadministrator;
    protected $companyusergroup;
    function _initialize()
    {

		$this->companyModel = D('Company/Company');
		$this->companyadministrator = D('Company/CompanyAdministrator');
		$this->companyusergroup=D('Company/CompanyUsergroup');
        parent::_initialize();

    }
	 /**商品列表
     * @param int $page
     * @param int $r
     */
	public function companylist($page = 1, $r = 20)
    {
		$map['status'] = array('egt', 0);
		//dump($data);
        $data = $this->companyModel->where($map)->order('createtime desc')->page($page, $r)->select();
		
		$builder = new AdminListBuilder();
        $builder->title('机构列表');
        $builder->meta_title = '机构列表';
		$builder->buttonNew(U('company/companyedit'))->buttonDelete(U('setStatus'))->setStatusUrl(U('setStatus'));

		$builder->keyId()->keyText('name', '机构名称')->keyUpdateTime('changetime', '更新时间')->keyCreateTime('createtime', '创建时间')->keyDoActionEdit('company/companyedit?id=###')->keyDoActionEdit('company/administratorlist?companyid=###','设置机构管理员');
        //$builder->search('内容', 'name');
		$builder->data($data);
        $builder->pagination($totalCount, $r);
        $builder->display();
	}
	 /**
     * @param int $id
     * @param $goods_name
     * @param $goods_ico
     * @param $goods_introduct
     * @param $goods_detail
     * @param $tox_money_need
     * @param $goods_num
     * @param $status
     * @param $category_id
     * @param $is_new
     * @param $sell_num
	 */
    public function companyedit($id = 0, $name = '', $ico = '', $detail = '', $status = '')
    {
	   $isEdit = $id ? 1 : 0;
	   if (IS_POST) 
	   {
	        if ($name == '' || $name == null) {
                $this->error('请输入名称');
            }            
            $data['name'] = $name;
            $data['ico'] = $ico;
            $data['detail'] = $detail;
            $data['status'] = $status;
            $data['changetime'] = time();
			if ($isEdit) {
                $rs = $this->companyModel->where('id=' . $id)->save($data);
            } else {
                //商品名存在验证
                $map['status'] = array('egt', 0);
                $map['name'] = $name;
                if ($this->companyModel->where($map)->count()) {
                    $this->error('已存在同名数据');
                }

                $data['createtime'] = time();
                $rs = $this->companyModel->add($data);
            }
            if ($rs) {
                $this->success($isEdit ? '编辑成功' : '添加成功', U('company/companylist'));
            } else {
                $this->error($isEdit ? '编辑失败' : '添加失败');
            }
	   }
	   else 
	   {
		    $builder = new AdminConfigBuilder();
            $builder->title($isEdit ? '编辑机构' : '添加机构');
            $builder->meta_title = $isEdit ? '编辑机构' : '添加机构';
			$builder->keyId()->keyText('name', '机构名称')->keySingleImage('ico', '图标')->keyEditor('detail', '详情')
                ->keyStatus('status', '状态');
            if ($isEdit) {
                $data = $this->companyModel->where('id=' . $id)->find();
                $builder->data($data);
                $builder->buttonSubmit(U('company/companyedit'));
                $builder->buttonBack();
                $builder->display();
            } else {
                $data['status'] = 1;
                $builder->buttonSubmit(U('company/companyedit'));
                $builder->buttonBack();
                $builder->data($data);
                $builder->display();
            }
	   }
	}
    /**
     * 设置商品状态：删除=-1，禁用=0，启用=1
     * @param $ids
     * @param $status
     */
    public function setstatus($ids, $status)
    {
        $builder = new AdminListBuilder();
        $builder->doSetStatus('company', $ids, $status);
    }
	/**商品回收站
     * @param int $page
     * @param int $r
     */
    public function trash($page = 1, $r = 10,$model='')
    {
        $builder = new AdminListBuilder();
        $builder->clearTrash($model);
        //读取微博列表
        $map = array('status' => -1);
        $dataList = $this->companyModel->where($map)->order('changetime desc')->page($page, $r)->select();
        $totalCount = $this->companyModel->where($map)->count();
        //显示页面

        $builder->title('回收站')
            ->setStatusUrl(U('setstatus'))->buttonRestore()->buttonClear('company/company')
            ->keyId()->keyLink('name', '标题', 'company/companyedit?id=###')->keyCreateTime('createtime')->keyStatus()
            ->data($dataList)
            ->pagination($totalCount, $r)
            ->display();
    }
    public function administratorlist($companyid,$page = 1, $r = 10)
    {
		$map['companyid'] = array('eq',$companyid);
        $list = $this->companyadministrator->where($map)->order('createtime desc')->page($page, $r)->select();
		$totalCount = $this->companyadministrator->where($map)->count();
        foreach ($companyList as &$val) {

        }
        unset($val);
		
		$builder = new AdminListBuilder();
        $builder->title('机构管理员列表');
        $builder->meta_title = '机构管理员列表';
		        $builder->buttonNew(U('company/administratoredit?companyid='.$companyid))->buttonDelete(U('company/administratordelete')."?uid=###",'删除');

		$builder->keyId()->keyText('uid', '用户ID')->keyText('name', '用户名称')->keyCreateTime('createtime');
		$builder->data($list);
        $builder->pagination($totalCount, $r);
        $builder->display();
    }
	public function administratoredit($companyid='',$id = 0,$uid='')
    {
	   $isEdit = $id ? 1 : 0;
	   if (IS_POST) 
	   {
	        if ($uid == '' || $uid == null) {
                $this->error('请输入用户ID');
            }  
			if(preg_replace('/\d/','',$uid)==="")
			{
			}
			else
			{
                $this->error('用户ID类型为数字，请重新输入。');
			}
			$map['uid'] = $uid;
            if ($this->companyadministrator->where($map)->count()) {
                    $this->error('已存在同名数据');
            }
		    $result=D('Admin/Member')->where($map)->select();
			if($result)
			{
	            if(is_numeric($uid)){
                   if ( is_administrator($uid) ) {
                        $this->error('该用户为超级管理员');
                   }
                }
				
				$data['uid'] = $uid;
			    $data['name'] = $result[0]['nickname'];
			    $data['changetime'] = time();
			    $data['status'] = 1;
			    $data['companyid'] = $companyid;
				$data['createtime'] = time();
                $rs = $this->companyadministrator->add($data);
				
				$uid = $uid;
                $gid = 4;
                if( empty($uid) ){
                     $this->error('参数有误');
                }
                $AuthGroup = D('Admin/AuthGroup');
                if(is_numeric($uid)){
                   if ( is_administrator($uid) ) {
                        $this->error('该用户为超级管理员');
                   }
                }

                if( $gid && !$AuthGroup->checkGroupId($gid)){
                   $this->error($AuthGroup->error);
                }
                if ( $AuthGroup->addToGroup($uid,$gid) ){
                   //$this->success('操作成功');
                }else{
                  $this->error($AuthGroup->getError());
                }
			}
			else
			{
                $this->error('查不到用户，请重新输入UID');
			}
            if ($rs) {
                $this->success($isEdit ? '编辑成功' : '添加成功', U('company/administratorlist?companyid='.$companyid));
            } else {
                $this->error($isEdit ? '编辑失败' : '添加失败');
            }
	   }
	   else 
	   {
		    $builder = new AdminConfigBuilder();
            $builder->title($isEdit ? '编辑机构管理员' : '添加机构管理员');
            $builder->meta_title = $isEdit ? '编辑机构管理员' : '添加机构管理员';
			$builder->keyId()->keyInteger('uid', '用户ID')->key('companyid','','','hidden');
            if ($isEdit) {
                $data = $this->companyadministrator->where('id=' . $id)->find();
                $builder->data($data);
                $builder->buttonSubmit(U('company/administratoredit'));
                $builder->buttonBack();
                $builder->display();
            } else {
			    $data['companyid']=$companyid;
                $builder->buttonSubmit(U('company/administratoredit'));
                $builder->buttonBack();
                $builder->data($data);
                $builder->display();
            }
	   }
	}
	public function administratordelete($ids,$status)
	{
		if(is_array($ids))
		{
		   if(sizeof($ids)!=1)
		   {
		      $this->error('请选择一条数据。');
		   }
		}
		$ids = is_array($ids) ? $ids : explode(',', $ids);
		
		$result=D('Company/CompanyAdministrator')->where(array('id' => array('in', $ids)))->select();
        D('Company/CompanyAdministrator')->where(array('id' => array('in', $ids)))->delete();
		
		$uid = $result[0]['uid'];
        $gid = 4;
        if( empty($uid) || empty($gid) ){
            $this->error('参数有误');
        }
        $AuthGroup = D('Admin/AuthGroup');
        if( !$AuthGroup->find($gid)){
            $this->error('用户组不存在');
        }
        if ($AuthGroup->removeFromGroup($uid,$gid) ){
            $this->success('操作成功');
        }else{
            $this->error('操作失败');
        }
		
        //$this->success('删除成功', $_SERVER['HTTP_REFERER']);
	}
	    /**商品分类
     * @author 
     */
    public function usergroup()
    {
        //显示页面
        $builder = new AdminTreeListBuilder();
        $attr['class'] = 'btn ajax-post';
        $attr['target-form'] = 'ids';

        $tree = $this->companyusergroup->getTree(0, 'id,title,sort,pid,status');

        $builder->title('用户组管理')
            ->buttonNew(U('Company/usergroupadd'))
			->setModel('usergroup')
            ->data($tree)
            ->display();
    }
	/**分类添加
     * @param int $id
     * @param int $pid
     * @author 
     */
    public function addusergroup($id = 0, $pid = 0)
    {
        if (IS_POST) {
            if ($id != 0) {
                $category = $this->companyusergroup->create();
                if ($this->companyusergroup->save($category)) {

                    $this->success('编辑成功。', U('Company/usergroup'));
                } else {
                    $this->error('编辑失败。');
                }
            } else {
                $category = $this->companyusergroup->create();
                if ($this->companyusergroup->add($category)) {

                    $this->success('新增成功。', U('Company/usergroup'));
                } else {
                    $this->error('新增失败。');
                }
            }


        } else {
            $builder = new AdminConfigBuilder();
            $categorys = $this->companyusergroup->select();
            $opt = array();
            foreach ($categorys as $category) {
                $opt[$category['id']] = $category['title'];
            }
            if ($id != 0) {
                $category = $this->companyusergroup->find($id);
            } else {
                $category = array('pid' => $pid, 'status' => 1);
                $father_category_pid=$this->companyusergroup->where(array('id'=>$pid))->getField('pid');
                if($father_category_pid!=0){
                    $this->error('分类不能超过二级！');
                }
            }


            $builder->title('新增分类')->keyId()->keyText('title', '标题')->keySelect('pid', '父分类', '选择父级分类', array('0' => '顶级分类') + $opt)
                ->keyStatus()->keyCreateTime()->keyUpdateTime()
                ->data($category)
                ->buttonSubmit(U('Company/addusergroup'))->buttonBack()->display();
        }

    }
	public function operateusergroup($type = 'move', $from = 0)
    {
        $builder = new AdminConfigBuilder();
        $from = $this->companyusergroup->find($from);

        $opt = array();
        $categorys = $this->companyusergroup->select();
        foreach ($categorys as $category) {
            $opt[$category['id']] = $category['title'];
        }
        if ($type === 'move') {

            $builder->title('移动分类')->keyId()->keySelect('pid', '父分类', '选择父分类', $opt)->buttonSubmit(U('Company/addusergroup'))->buttonBack()->data($from)->display();
        } else {

            $builder->title('合并分类')->keyId()->keySelect('toid', '合并至的分类', '选择合并至的分类', $opt)->buttonSubmit(U('Company/doMergeusergroup'))->buttonBack()->data($from)->display();
        }

    }

    /**商品分类合并
     * @param $id
     * @param $toid
     * @author 
     */
    public function doMergeusergroup($id, $toid)
    {
        $effect_count = D('Admin/Member')->where(array('category_id' => $id))->setField('category_id', $toid);
        $this->companyusergroup->where(array('id' => $id))->setField('status', -1);
        $this->success('合并分类成功。共影响了' . $effect_count . '个内容。', $this->companyusergroup);
        //TODO 实现合并功能 shop_category
    }

    /**
     * 设置商品分类状态：删除=-1，禁用=0，启用=1
     * @param $ids
     * @param $status
     * @author 
     */
    public function setusergroupstatus($ids, $status)
    {
        $builder = new AdminListBuilder();
        $builder->doSetStatus('CompanyUsergroup', $ids, $status);
    }
    /**分类回收站
     * @param int $page
     * @param int $r
     * @author 
     */
    public function usergrouptrash($page = 1, $r = 20,$model='')
    {
        $builder = new AdminListBuilder();
        $builder->clearTrash($model);
        //读取微博列表
        $map = array('status' => -1);
        $list = $this->companyusergroup->where($map)->page($page, $r)->select();
        $totalCount = $this->companyusergroup->where($map)->count();

        //显示页面

        $builder->title('用户组回收站')
            ->setStatusUrl(U('setusergroupstatus'))->buttonRestore()->buttonClear('CompanyUsergroup')
            ->keyId()->keyText('title', '标题')->keyStatus()->keyCreateTime()
            ->data($list)
            ->pagination($totalCount, $r)
            ->display();
    }
	public function users()
	{
	    $nickname       =   I('nickname');
        $map['status']  =   array('egt',0);
        if(is_numeric($nickname)){
            $map['uid|nickname']=   array(intval($nickname),array('like','%'.$nickname.'%'),'_multi'=>true);
        }else{
            $map['nickname']    =   array('like', '%'.(string)$nickname.'%');
        }

        $list   = $this->lists('Member', $map);
		$list=array();
        int_to_string($list);
		
		$builder = new AdminListBuilder();
        $builder->title('用户列表');
        $builder->meta_title = '用户列表';
		        $builder->buttonNew(U('company/useredit?companyid='.$companyid))->buttonDelete(U('company/userdelete'),'删除');

		$builder->keyId('uid', '用户ID')->keyText('nickname', '用户名称')->keyCreateTime('last_login_time','最后登录时间')->keyCreateTime('reg_time','注册时间')->keyDoActionEdit('company/userdelete?id=###');
		$builder->data($list);
        $builder->pagination($totalCount, $r);
        $builder->display();
	}
}
