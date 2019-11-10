<?php
/**
 * Created by PhpStorm.
 * User: 
 * Date: 14-3-11
 * Time: PM1:13
 */

namespace Usercenter\Controller;

use Think\Controller;

class ExaminationController extends BaseController
{
    protected $TestpaperModel;
	protected $TestpaperItemModel;
	protected $TestpaperResultModel;
	protected $TestpaperItemResultModel;
	
	protected $_model="Examination";
	public function _initialize()
    {
        parent::_initialize();
        /* if (!is_login()) {
            $this->error('请登陆后再访问本页面。');
        } */
        $this->TestpaperModel = D('Examination/Testpaper');
		$this->TestpaperItemModel = D('Examination/TestpaperItem');
		
		$this->TestpaperResultModel = D('Examination/TestpaperResult');
		$this->TestpaperItemResultModel = D('Examination/TestpaperItemResult');
    }

    public function index($tab = 'all',$page = 1, $count = 12)
    {	
	   $mapmodel=array("all"=>array('result.userId'=>get_uid()),"PaymentsMade"=>array('result.userId'=>get_uid(),'result.checkedTime'=>array('gt',0)),"PaymentsDue"=>array('result.userId'=>get_uid(),'result.checkedTime'=>array('eq',0)));
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
	   
	    
	   $list = $this->TestpaperResultModel->alias("result")->join(C('DB_PREFIX').'Testpaper testpaper ON result.testId=testpaper.id','LEFT')->where($map)->order('result.id desc')->page($page, $count )->select();
	   //dump($list);
       //echo $this->TestpaperResultModel->_sql();
	   $totalCount = $this->TestpaperResultModel->alias("result")->join(C('DB_PREFIX').'Testpaper testpaper ON result.testId=testpaper.id','LEFT')->where($map)->count();
	   $this->assign('tab', $tab);
	   $this->assign('list', $list);
	   $this->assign('totalPageCount', $totalCount);
       $this->assign('count', $r);
	   $this->display();
    }
    /**
     * 考试结果
     * @author <1395881288@qq.com>
     */
    public function correctpaper($testId=0,$id=0)
	{
		$questionPaperdata=$this->TestpaperModel->where(array('id'=>$testId))->find();

       $result=$this->TestpaperResultModel->find($id);
       
       $this->assign('userId',$result['userId']);

	   $map['testId']=$testId;
	   $map['userId']=$result['userId'];

	   $itemresult=$this->TestpaperItemResultModel->where($map)->select();
	   
	   foreach ($itemresult as &$val) {
		   $val['score']=$val['score']+0;
       }
       unset($val);
	   //dump(array_column($itemresult,'score', 'questionId'));
       //dump($itemresult);
       //dump(array_column($itemresult,'score', 'questionId'));
       //dump(array_column($itemresult,'score', 'questionId'));
       $this->assign('answer',array_column($itemresult,'answer', 'questionId'));
	   $this->assign('mark',array_column($itemresult,'score', 'questionId'));
	   $this->assign('questionPaperdata',$questionPaperdata);
       $this->assign('result',$result);
	   $this->display('./Application/Examination/View/default/Index/examresult.html');
	}


}