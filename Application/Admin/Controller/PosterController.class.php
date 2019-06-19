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
class PosterController extends AdminController
{
    protected $_model="Poster";
    protected $dataModel;
    protected $_modelname="幻灯片";

    function _initialize()
    {
		$this->dataModel = D('Poster/Poster');
        parent::_initialize();

    }
	 /**商品列表
     * @param int $page
     * @param int $r
     */
	public function lists($page = 1, $r = 20)
    {

        $map['status'] = array('egt', 0);
        $data = $this->dataModel->where($map)->order('createtime desc')->page($page, $r)->select();
		$totalCount = $this->dataModel->where($map)->count();
        foreach ($companyList as &$val) {

        }
        unset($val);
		
		$builder = new AdminListBuilder();
        $builder->title('所有'.$this->_modelname);
        $builder->meta_title = '所有'.$this->_modelname;
		        $builder->buttonNew(U('poster/edit'))->buttonDelete(U('setStatus'))->setStatusUrl(U('setStatus'));

		$builder->keyId()->keyText('title', '标题')->keyImage('image', '图片')->keyImage('appimage', 'app上显示的图片')->keyUpdateTime('changetime')->keyCreateTime('createtime')
		->keyText('sort','排序')
		->keyDoActionEdit('poster/edit?id=###')
		->keyDoAction($this->_model.'/setstatus?status=-1&ids=###','删除','操作',array('class'=>'confirm ajax-get'));
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
    public function edit($id = 0, $title = '',$image = '',$appimage = '' ,$content = '' ,$url = '', $status = '')
    {
	   $isEdit = $id ? 1 : 0;
	   if (IS_POST) 
	   {
			if ($title == '' || $title == null) {
                $this->error('请输入标题');
            }            
            $data['title'] = $title;
			$data['image'] = $image;
			$data['appimage'] = $appimage;
            $data['content'] = $content;
			$data['url'] = $url;
            $data['status'] = $status;
            $data['changetime'] = time();
			if ($isEdit) {
                $rs = $this->dataModel->where('id=' . $id)->save($data);
            } else {
                //商品名存在验证
                $map['status'] = array('egt', 0);
                $map['title'] = $title;
                if ($this->dataModel->where($map)->count()) {
                    $this->error('已存在同名数据');
                }
                $lastid = $this->dataModel->order('id desc')->limit(1)->getField('id');
		        $data['sort'] = $lastid+1;
                $data['createtime'] = time();
                $rs = $this->dataModel->add($data);
            }
            if ($rs) {
                $this->success($isEdit ? '编辑成功' : '添加成功', U('poster/lists'));
            } else {
                $this->error($isEdit ? '编辑失败' : '添加失败');
            }
	   }
	   else 
	   {
		    $builder = new AdminConfigBuilder();
            $builder->title($isEdit ? '编辑'.$this->_modelname : '添加'.$this->_modelname);
            $builder->meta_title = $isEdit ? '编辑'.$this->_modelname : '添加'.$this->_modelname;
			$builder->keyId()->keyText('title', '标题')
			->keySingleImage('image', '电脑上显示的图片','建议尺寸 1920*512')
			->keySingleImage('appimage', '在App显示的图片','建议尺寸 1140*550')
			->keyText('url', '链接','例如：http://www.xxx.com,可以为空')
			->keyStatus('status', '状态');
            if ($isEdit) {
                $data = $this->dataModel->where('id=' . $id)->find();
                $builder->data($data);
                $builder->buttonSubmit(U('poster/edit'));
                $builder->buttonBack();
                $builder->display();
            } else {
                $data['status'] = 1;
                $builder->buttonSubmit(U('poster/edit'));
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
        $builder->doSetStatus('poster', $ids, $status);
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
        $dataList = $this->dataModel->where($map)->order('changetime desc')->page($page, $r)->select();
        $totalCount = $this->dataModel->where($map)->count();
        //显示页面

        $builder->title('回收站')
            ->setStatusUrl(U('setstatus'))->buttonRestore()->buttonClear('poster/poster')
            ->keyId()->keyLink('title', '标题', 'poster/edit?id=###')->keyCreateTime('createtime')
			/*->keyStatus()*/
			->keyDoAction($this->_model.'/setstatus?status=1&ids=###','还原','操作',array('class'=>'ajax-get'))
			->keyDoAction($this->_model.'/trash?model='.$this->_model.'&ids=###','删除','操作',array('class'=>'confirm','onClick'=>'javascript:$(\'.ids\').prop(\'checked\',false);$(this).parent().parent().find(\'.ids\').prop(\'checked\',true);$(\'button:contains(清空)\').click();return false;'))
            ->data($dataList)
            ->pagination($totalCount, $r)
            ->display();
	}
	public function editsort(){
		foreach($_POST as $k=>$v)
		{
			if(strpos($k,'sort')=== false)
		    {
			  continue;
		    }
			$k = str_replace('sort','',$k);
			$data[$k]=$v;
			if(!is_numeric($v))
            {
			  continue;
		    }
			
			$this->dataModel->where(array('id'=>$k))->setField('sort',$v);
		}
		$this->success('保存成功');
	}
}
