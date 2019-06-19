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

use Think\modell;
/**
 * Class ShopController
 * @package Admin\controller
 * 
 */
class RoomController extends AdminController
{

    protected $datamodel;
    protected $categorymodel;
    function _initialize()
    {

		$this->datamodel = D('Room/Room');
		$this->categorymodel = D('Room/RoomCategory');
        parent::_initialize();

    }
	 /**商品列表
     * @param int $page
     * @param int $r
     */
	public function lists($page = 1, $r = 20)
    {
		$map['status'] = array('egt', 0);
		//dump($data);
        $data = $this->datamodel->where($map)->order('createtime desc')->page($page, $r)->select();
		
		$builder = new AdminListBuilder();
        $builder->title('所有房间');
        $builder->meta_title = '所有房间';
		$builder->buttonNew(U('room/add'))->buttonDelete(U('setStatus'))->setStatusUrl(U('setStatus'));

		$builder->keyId()->keyText('title', '房间名称')->keyUpdateTime('changetime', '更新时间')->keyCreateTime('createtime', '创建时间')->keyDoActionEdit('room/add?id=###');
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
    public function add($id = 0, $title = '', $image = '', $content = '', $categoryid = 0, $status = '')
    {
	   $isEdit = $id ? 1 : 0;
	   if (IS_POST) 
	   {
	        if ($title == '' || $title == null) {
                $this->error('请输入名称');
            }            
            $data['title'] = $title;
			$data['categoryid'] = $categoryid;
            $data['image'] = $image;
            $data['content'] = $content;
            $data['status'] = $status;
            $data['changetime'] = time();
			if ($isEdit) {
                $rs = $this->datamodel->where('id=' . $id)->save($data);
            } else {
                //商品名存在验证
                $map['status'] = array('egt', 0);
                $map['title'] = $title;
                if ($this->datamodel->where($map)->count()) {
                    $this->error('已存在同名数据');
                }

                $data['createtime'] = time();
                $rs = $this->datamodel->add($data);
            }
            if ($rs) {
                $this->success($isEdit ? '编辑成功' : '添加成功', U('room/lists'));
            } else {
                $this->error($isEdit ? '编辑失败' : '添加失败');
            }
	   }
	   else 
	   {
		    $builder = new AdminConfigBuilder();
            $builder->title($isEdit ? '编辑房间' : '添加房间');
            $builder->meta_title = $isEdit ? '编辑房间' : '添加房间';
			
			            //获取分类列表
            $category_map['status'] = array('egt', 0);
            $category_lists = $this->categorymodel->where($categoryid)->order('pid desc')->select();
			$options = array_combine(array_column($category_lists, 'id'), array_column($category_lists, 'title'));
			//->keyTime('content', '开始时间')->keyTime('content', '结束时间')
			$builder->keyId()->keyText('title', '房间名称')->keySelect('categoryid', '分类', '', $options)->keySingleImage('ico', '图标')->keyEditor('content', '详情')
                ->keyStatus('status', '状态');
            if ($isEdit) {
                $data = $this->datamodel->where('id=' . $id)->find();
                $builder->data($data);
                $builder->buttonSubmit(U('room/add'));
                $builder->buttonBack();
                $builder->display();
            } else {
                $data['status'] = 1;
                $builder->buttonSubmit(U('room/add'));
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
        $builder->doSetStatus('room', $ids, $status);
    }
	/**商品回收站
     * @param int $page
     * @param int $r
     */
    public function trash($page = 1, $r = 10,$modell='')
    {
        $builder = new AdminListBuilder();
        $builder->clearTrash($modell);
        //读取微博列表
        $map = array('status' => -1);
        $dataList = $this->datamodel->where($map)->order('changetime desc')->page($page, $r)->select();
        $totalCount = $this->datamodel->where($map)->count();
        //显示页面

        $builder->title('回收站')
            ->setStatusUrl(U('setstatus'))->buttonRestore()->buttonClear('room/room')
            ->keyId()->keyLink('title', '标题', 'room/add?id=###')->keyCreateTime('createtime')->keyStatus()
            ->data($dataList)
            ->pagination($totalCount, $r)
            ->display();
    }
	    /**商品分类
     * @author 
     */
    public function category()
    {
        //显示页面
        $builder = new AdminTreeListBuilder();
        $attr['class'] = 'btn ajax-post';
        $attr['target-form'] = 'ids';

        $tree = $this->categorymodel->getTree(0, 'id,title,sort,pid,status');

        $builder->title('房间分类')
            ->buttonNew(U('room/addcategory'))
			->setmodel('category')
            ->data($tree)
            ->display();
    }
	/**分类添加
     * @param int $id
     * @param int $pid
     * @author 
     */
    public function addcategory($id = 0, $pid = 0)
    {
        if (IS_POST) {
            if ($id != 0) {
                $category = $this->categorymodel->create();
                if ($this->categorymodel->save($category)) {

                    $this->success('编辑成功。', U('room/category'));
                } else {
                    $this->error('编辑失败。');
                }
            } else {
                $category = $this->categorymodel->create();
                if ($this->categorymodel->add($category)) {

                    $this->success('新增成功。', U('room/category'));
                } else {
                    $this->error('新增失败。');
                }
            }


        } else {
            $builder = new AdminConfigBuilder();
            $categorys = $this->categorymodel->select();
            $opt = array();
            foreach ($categorys as $category) {
                $opt[$category['id']] = $category['title'];
            }
            if ($id != 0) {
                $category = $this->categorymodel->find($id);
            } else {
                $category = array('pid' => $pid, 'status' => 1);
                $father_category_pid=$this->categorymodel->where(array('id'=>$pid))->getField('pid');
                if($father_category_pid!=0){
                    $this->error('分类不能超过二级！');
                }
            }


            $builder->title('新增分类')->keyId()->keyText('title', '标题')->keySelect('pid', '父分类', '选择父级分类', array('0' => '顶级分类') + $opt)
                ->keyStatus()->keyCreateTime()->keyUpdateTime()
                ->data($category)
                ->buttonSubmit(U('room/addcategory'))->buttonBack()->display();
        }

    }
	public function operatecategory($type = 'move', $from = 0)
    {
        $builder = new AdminConfigBuilder();
        $from = $this->categorymodel->find($from);

        $opt = array();
        $categorys = $this->categorymodel->select();
        foreach ($categorys as $category) {
            $opt[$category['id']] = $category['title'];
        }
        if ($type === 'move') {

            $builder->title('移动分类')->keyId()->keySelect('pid', '父分类', '选择父分类', $opt)->buttonSubmit(U('room/addcategory'))->buttonBack()->data($from)->display();
        } else {

            $builder->title('合并分类')->keyId()->keySelect('toid', '合并至的分类', '选择合并至的分类', $opt)->buttonSubmit(U('room/mergecategory'))->buttonBack()->data($from)->display();
        }

    }

    /**商品分类合并
     * @param $id
     * @param $toid
     * @author 
     */
    public function mergecategory($id, $toid)
    {
        $effect_count = $this->datamodel->where(array('categoryid' => $id))->setField('categoryid', $toid);
		$this->categorymodel->where(array('id' => $id))->setField('status', -1);
        $this->success('合并分类成功。共影响了' . $effect_count . '个内容。',U('room/category'));
        //TODO 实现合并功能 shop_category
    }

    /**
     * 设置商品分类状态：删除=-1，禁用=0，启用=1
     * @param $ids
     * @param $status
     * @author 
     */
    public function setcategorystatus($ids, $status)
    {
        $builder = new AdminListBuilder();
        $builder->doSetStatus('RoomCategory', $ids, $status);
    }
    /**分类回收站
     * @param int $page
     * @param int $r
     * @author 
     */
    public function categorytrash($page = 1, $r = 20,$model='')
    {
        $builder = new AdminListBuilder();
        $builder->clearTrash($model);
        //读取微博列表
        $map = array('status' => -1);
        $list = $this->categorymodel->where($map)->page($page, $r)->select();
        $totalCount = $this->categorymodel->where($map)->count();

        //显示页面

        $builder->title('分类回收站')
            ->setStatusUrl(U('setcategorystatus'))->buttonRestore()->buttonClear('RoomCategory')
            ->keyId()->keyText('title', '标题')->keyStatus()->keyCreateTime('create_time')
            ->data($list)
            ->pagination($totalCount, $r)
            ->display();
    }
	
}
