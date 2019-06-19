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

use Think\model;
/**
 * Class ShopController
 * @package Admin\controller
 * 
 */
class ProductController extends AdminController
{

    protected $_model="Product";
	protected $_modelname="产品";
	protected $datamodel;
    protected $categorymodel;
    function _initialize()
    {

		$this->datamodel = D($this->_model.'/'.$this->_model);
		$this->categorymodel = D($this->_model.'/'.$this->_model.'Category');
        parent::_initialize();

    }
	 /**商品列表
     * @param int $page
     * @param int $r
     */
	public function lists($page = 1, $r = 15)
    {
		$map['status'] = array('egt', 0);
		//dump($data);
		$search_title=I('title');
		if(!empty($search_title))
		{
            $map['title'] = array('like', '%' . $search_title . '%');
		}

		$search_content=I('content');
		if (!empty($search_content))
		{
            $map['content'] = array('like', '%' . $search_content . '%');
		}			
        $data = $this->datamodel->where($map)->order('createtime desc')->page($page, $r)->select();
		$totalCount = $this->datamodel->where($map)->count();
		$builder = new AdminListBuilder();
        $builder->title('所有'.$this->_modelname);
        $builder->meta_title = '所有'.$this->_modelname;
		$builder->buttonNew(U($this->_model.'/add',array('categoryid'=>39)),"添加中国字画")
		->buttonNew(U($this->_model.'/add',array('categoryid'=>40)),"艺术衍生品")
		->buttonNew(U($this->_model.'/add',array('categoryid'=>41)),"海外艺术品")
		->buttonNew(U($this->_model.'/add',array('categoryid'=>42)),"众筹")
		->buttonNew(U($this->_model.'/add',array('categoryid'=>43)),"拍卖")
		->buttonDelete(U('setStatus'))->setStatusUrl(U('setStatus'));

		$builder->keyId()->keyText('title', $this->_modelname.'名称')->keyUpdateTime('changetime', '更新时间')->keyCreateTime('createtime', '创建时间')->keyDoActionEdit($this->_model.'/add?id=###')
		->keyDoAction($this->_model.'/setstatus?status=-1&ids=###','删除','操作',array('class'=>'confirm ajax-get'));

        //$builder->search('内容', 'name');
		$builder->setSearchPostUrl(U('lists'));
		$builder->search('标题', 'title');
		$builder->search('内容', 'content');		
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
    public function add($id = 0, $title = '', $image = '', $content = '', $categoryid = 0,$teacherid=0, $price=0,$marketprice=0,$status = '',$size='',$zhxz='',$ticai=0,$chicun=0,$image1=0,$image2=0,$image3=0,$image4=0,$image5=0)
    {
	   $isEdit = $id ? 1 : 0;
	   if (IS_POST) 
	   {
	        if ($title == '' || $title == null) {
                $this->error('请输入名称');
            }    
            if (!is_numeric($price))	
            {
				$this->error('请输入正确的价格。');
			}				
            $data['title'] = $title;
			$data['categoryid'] = $categoryid;
			$data['teacherid'] = $teacherid;
            $data['image'] = $image;
            $data['content'] = $content;
            $data['price'] = $price;
			$data['marketprice'] = $marketprice;
			
            $data['status'] = $status;
			$data['size'] = $size;
			$data['zhxz'] = $zhxz;
			$data['ticai'] = $ticai;
			$data['chicun'] = $chicun;
			$data['image1'] = $image1;
			$data['image2'] = $image2;
			$data['image3'] = $image3;
			$data['image4'] = $image4;
			$data['image5'] = $image5;
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
                $this->success($isEdit ? '编辑成功' : '添加成功', U($this->_model.'/lists'));
            } else {
                $this->error($isEdit ? '编辑失败' : '添加失败');
            }
	   }
	   else 
	   {
		    $builder = new AdminConfigBuilder();
            $builder->title($isEdit ? '编辑'.$this->_modelname: '添加'.$this->_modelname);
            $builder->meta_title = $isEdit ? '编辑'.$this->_modelname : '添加'.$this->_modelname;
			
			            //获取分类列表
            $category_map['status'] = array('egt', 0);
			$category_map['pid'] =38;
            $category_lists = $this->categorymodel->where($category_map)->order('pid desc')->select();
			$options = array_combine(array_column($category_lists, 'id'), array_column($category_lists, 'title'));
            //var_dump($options);
			//->keyTime('content', '开始时间')->keyTime('content', '结束时间')
			
			$category_ticai = $this->categorymodel->where(array('pid'=>1))->order('id asc')->select();
			$ticai = array_combine(array_column($category_ticai, 'id'), array_column($category_ticai, 'title'));
			
			$category_chicun = $this->categorymodel->where(array('pid'=>2))->order('id asc')->select();
			$chicun = array_combine(array_column($category_chicun, 'id'), array_column($category_chicun, 'title'));
			
			$members = D("Admin/Member")->where(array('isteacher'=>1,'status'=>1))->order('uid asc')->select();
			$teacher = array_combine(array_column($members, 'uid'), array_column($members, 'nickname'));
			//var_dump($teacher);
			/*
			$ticai=array(
			'0'=>'主持人',
			'1'=>'嘉宾'
			);
			*/
			$builder->keyId()->keyText('title', $this->_modelname.'名称')
			->keySelect('categoryid', '分类', '', $options)
			->keySingleImage('image', '图标')
			->keyText('price', '价格','')
			->keyText('marketprice', '市场价','')
			->keyText('size', '尺寸','')
			->keyText('zhxz', '字画性质','')
			->keyRadio('ticai', '题材', '', $ticai)
			->keyRadio('chicun', '尺寸', '', $chicun)
			->keySingleImage('image1', '大图1')
			->keySingleImage('image2', '大图2')
			->keySingleImage('image3', '大图3')
			->keySingleImage('image4', '大图4')
			->keySingleImage('image5', '大图5')
			->keyRadio('teacherid', '作家', '', $teacher)
			->keyEditor('content', '详情')
                
				->keyStatus('status', '状态');
            if ($isEdit) {
                $data = $this->datamodel->where('id=' . $id)->find();
                $builder->data($data);
                $builder->buttonSubmit(U($this->_model.'/add'));
                $builder->buttonBack();
                $builder->display();
            } else {
                $data['price'] = 1;
                $data['status'] = 1;
				$data['categoryid']=$categoryid;
				$data['size'] = "";
				$data['zhxz'] = "100%真人手绘原稿，宣纸";
                $builder->buttonSubmit(U($this->_model.'/add'));
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

    public function setstatus($ids= '', $status)
    {
		if ($ids=='') {
                $this->error('请选择数据。');
        }
		$builder = new AdminListBuilder();
        $builder->doSetStatus($this->_model.'', $ids, $status);
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
        $dataList = $this->datamodel->where($map)->order('changetime desc')->page($page, $r)->select();
        $totalCount = $this->datamodel->where($map)->count();
        //显示页面

        $builder->title('回收站')
            ->setStatusUrl(U('setstatus'))->buttonRestore()->buttonClear($this->_model.'/'.$this->_model)
            ->keyId()->keyLink('title', '标题', $this->_model.'/add?id=###')->keyCreateTime('createtime')
			/*->keyStatus()*/
			->keyDoAction($this->_model.'/setstatus?status=1&ids=###','还原','操作',array('class'=>'ajax-get'))
			->keyDoAction($this->_model.'/trash?model='.$this->_model.'&ids=###','删除','操作',array('class'=>'confirm','onClick'=>'javascript:$(\'.ids\').prop(\'checked\',false);$(this).parent().parent().find(\'.ids\').prop(\'checked\',true);$(\'button:contains(清空)\').click();return false;'))
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

        $tree = $this->categorymodel->getTree(0, 'id,title,entitle,sort,pid,status');
	    //dump($tree);
        $builder->title($this->_modelname.'分类')
            ->buttonNew(U($this->_model.'/addcategory'))
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

                    $this->success('编辑成功。', U($this->_model.'/category'));
                } else {
                    $this->error('编辑失败。');
                }
            } else {
                $category = $this->categorymodel->create();
                if ($this->categorymodel->add($category)) {

                    $this->success('新增成功。', U($this->_model.'/category'));
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
                    //$this->error('分类不能超过二级！');
                }
            }


            $builder->title('新增分类')->keyId()->keyText('title', '标题')->keyText('entitle', '英文名')->keySelect('pid', '父分类', '选择父级分类', array('0' => '顶级分类') + $opt)
                ->keyStatus()->keyCreateTime()->keyUpdateTime()
                ->data($category)
                ->buttonSubmit(U($this->_model.'/addcategory'))->buttonBack()->display();
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

            $builder->title('移动分类')->keyId()->keySelect('pid', '父分类', '选择父分类', $opt)->buttonSubmit(U($this->_model.'/addcategory'))->buttonBack()->data($from)->display();
        } else {

            $builder->title('合并分类')->keyId()->keySelect('toid', '合并至的分类', '选择合并至的分类', $opt)->buttonSubmit(U($this->_model.'/mergecategory'))->buttonBack()->data($from)->display();
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
        $this->success('合并分类成功。共影响了' . $effect_count . '个内容。',U($this->_model.'/category'));
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
		die("禁止删除");
        $builder = new AdminListBuilder();
        $builder->doSetStatus($this->_model.'Category', $ids, $status);
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
            ->setStatusUrl(U('setcategorystatus'))->buttonRestore()->buttonClear($this->_model.'Category')
            ->keyId()->keyText('title', '标题')->keyStatus()->keyCreateTime('create_time')
            ->data($list)
            ->pagination($totalCount, $r)
            ->display();
    }
	
}
