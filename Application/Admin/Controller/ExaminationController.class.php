<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-12-31
 * Time: 上午11:00
 * @author <1395881288@qq.com>
 */
namespace Admin\Controller;

use Admin\Builder\AdminConfigBuilder;
use Admin\Builder\AdminListBuilder;
use Admin\Builder\AdminTreeListBuilder;

use Think\Model;

/**
 * Class ExaminationController
 * @package Admin\controller
 * 
 */
class ExaminationController extends AdminController
{
    protected $questionModel;
	protected $TestpaperModel;
	protected $TestpaperItemModel;
	protected $TestpaperResultModel;
	protected $TestpaperItemResultModel;
	
	protected $supportedQuestionTypes = array('choice','single_choice', 'uncertain_choice', 'fill', 'material', 'essay', 'determine');
    /*
	protected $questionType=array(
	    	'single_choice' => '单选题',
	    	'choice' => '多选题',
            'uncertain_choice' => '不定项选择题',
	    	'fill' => '填空题',
	    	'determine' => '判断题',
	    	'essay' => '问答题',
	    	'material' => '材料题',
    );
	*/
	protected $questionType=array(
	    	'single_choice' => '单选题',
	    	'choice' => '多选题',
	    	'fill' => '填空题',
	    	'determine' => '判断题',
	    	'essay' => '问答题',
	    	'material' => '材料题',
    );
    protected $difficulty= array(
	    	'simple' => '简单',
	    	'normal' => '一般',
	    	'difficulty' => '困难',
    );
        protected $_model="Examination";
	protected $_modelname="在线考试";
	protected $datamodel;
    protected $categorymodel;
	function _initialize()
    {

		$this->questionModel = D('Examination/Question');
		$this->TestpaperModel = D('Examination/Testpaper');
		$this->TestpaperItemModel = D('Examination/TestpaperItem');
		
		$this->TestpaperResultModel = D('Examination/TestpaperResult');
		$this->TestpaperItemResultModel = D('Examination/TestpaperItemResult');
		
		$this->datamodel = D('Examination/Testpaper');
		$this->categorymodel = D('Examination/TestpaperCategory');
        parent::_initialize();

    }
	/**
     * 考试记录
     * @author <1395881288@qq.com>
     */
    public function recordList( $testId=0,$page = 1, $r = 20)
    {
        //读取数据
        $map['testId']=$testId;
        $arr['id'] = $id;
        $list = $this->TestpaperResultModel->where($map)->page($page, $r)->order('id desc')->select();
        //dump($map);
		foreach ($list as &$v) {
			$v['mark']=$v['checkedTime']>0?'已批阅':'未批阅';
            //$v['member_name'] = get_nickname($v['userId']);
        }
		$totalCount = $this->TestpaperResultModel->where($map)->count();
        $arr['view'] = $totalCount;
        M('testpaper')->where("id=".$id)->save($arr['view']);
        //显示页面
        $builder = new AdminListBuilder();
        $builder
            ->title('考试记录管理')
            ->buttonDelete(U('Admin/Examination/removeRecord'))
            ->keyId()
            ->keyText('username', '用户')
            ->keyText('mark', '状态')
            ->keyText('score', '得分')
            ->keyCreateTime('checkedTime','批阅时间')
            ->keyDoActionEdit('correctpaper?testId='.$testId.'&id=###','批阅')
            ->data($list)
            ->pagination($totalCount, $r)
            ->display();
    }
	/**
     * 考试记录管理
     * @author <1395881288@qq.com>
     */
    public function correctpaper($testId=0,$id=0)
	{
       if(IS_POST)
	   {
		  $score=0;
		  $exit=0;
	      foreach($_POST as $key=>$val)
          {
			  if(!(strpos($key,'score_') === FALSE))
			  {
				$score+=$val;
				if($val=='')
				{
                  $exit=1;
				}
				$insertobj.=",".str_replace('score_','',$key).":";
			    $insertobj.="'".$val."'";
              }
          }
		  if($exit)
		  {
		     $this->error("请填写得分。");
		  }
		  //echo 'testId:'.$testId.' id:'.$id.' score:'.$score;
		  foreach($_POST as $key=>$val)
          {
			  if(!(strpos($key,'score_') === FALSE))
			  {
                 unset($map);
				 $map['testPaperResultId']=$id;
                 $map['userId']=I('userId');
                 $map['questionId']=str_replace('score_','',$key);
				 unset($data);
				 $data['score']=$val;
                 $result = $this->TestpaperItemResultModel->where($map)->save($data);
				 //dump($result);
              }
          }
		  unset($map);
		  $map['id']=$id;
		  unset($data);
		  $data['score']=$score;
          $data['teacherSay']=I('teacherSay');
		  $data['checkedTime']=time();
		  $result = $this->TestpaperResultModel->where($map)->save($data);
		  $this->success("批阅完毕。",U('recordlist',array('testId'=>$testId)));
		  die();
	   }

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
	   $this->display('./Application/Examination/View/default/Index/correctpaper.html');
	}
 
   /**
     * 题库列表
     * @author <1395881288@qq.com>
     */
    public function topicsList($page = 1, $r = 20)
    {
        $map=array();
		$map['parentId'] = '0';
		$map['status'] = array('gt',-1);
        //读取数据
        $list = $this->questionModel->where($map)->page($page, $r)->order('id desc')->select();
		foreach ($list as &$val) {
		   $val["stem"]=msubstr(strip_tags($val["stem"]),0,30,'utf-8',true);
           $val["zhtype"] = $this->questionType[$val["type"]];
		   if($val["type"]=='material')
		   {
		     $val["subtopic"] = '管理子题';
		   }
        }
        unset($val);
		//var_dump($list);
        $totalCount = $this->questionModel->where($map)->count();
        //显示页面
        $builder = new AdminListBuilder();
        $builder
            ->title('题库管理')
			->buttonNew(U('Examination/edittopic_single_choice'),'添加单选题')
            ->buttonNew(U('Examination/editTopic_choice'),'添加多选题')
			->buttonNew(U('Examination/editTopic_fill'),'添加填空题')
			->buttonNew(U('Examination/editTopic_determine'),'添加判断题')
			->buttonNew(U('Examination/editTopic_essay'),'添加问答题')
			->buttonNew(U('Examination/editTopic_material'),'添加材料题')
            //->buttonDelete(U('Admin/Examination/removeTopic'))
            ->keyId()
            ->keyText('stem', '题干')
            ->keyText('zhtype', '类型')
            ->keyTime('createdTime','创建时间')
            ->keyLink('subtopic', '材料题库子题', 'subtopicsList?parentId=###')
			->keyDoActionMorePara('editTopic?type=###&id=###','编辑','操作')
			->keyDoAction('previewTopic?id=###','预览','操作')
			->keyDoAction('setstatusquestion?status=-1&ids=###','删除','操作',array('class'=>'confirm ajax-get'))
            ->data($list)
            ->pagination($totalCount, $r)
            ->display();
    }
  /**
     * 题库列表
     * @author <1395881288@qq.com>
     */
    public function subtopicsList($parentId=null, $page = 1, $r = 10)
    {
        $map=array();
		$map['parentId'] = $parentId;
		$map['status'] = array('gt',-1);
		$parentdata=$this->questionModel->where(array('id'=>$parentId))->find();
		//echo(msubstr(strip_tags($parentdata['stem']),0,20,'utf-8',true));
        //读取数据
        $list = $this->questionModel->where($map)->page($page, $r)->order('updatedTime desc')->select();
		foreach ($list as &$val) {
		   $val["stem"]=msubstr(strip_tags($val["stem"]),0,30,'utf-8',true);
           $val["zhtype"] = $this->questionType[$val["type"]];
		   if($val["type"]=='material')
		   {
		     $val["subtopic"] = '管理子题';
		   }
        }
        unset($val);
		//dump($list);
        $totalCount = $this->questionModel->where($map)->count();
        //显示页面
        $builder = new AdminListBuilder();
        $builder
            ->title('题库管理->'.msubstr(strip_tags($parentdata['stem']),0,20,'utf-8',true))
			->buttonNew(U('Examination/edittopic_single_choice',$map),'添加单选题')
            ->buttonNew(U('Examination/editTopic_choice',$map),'添加多选题')
			->buttonNew(U('Examination/editTopic_fill',$map),'添加填空题')
			->buttonNew(U('Examination/editTopic_determine',$map),'添加判断题')
			->buttonNew(U('Examination/editTopic_essay',$map),'添加问答题')
            //->buttonDelete(U('Admin/Examination/removeTopic'))
            ->keyId()
            ->keyText('stem', '题干')
            ->keyText('zhtype', '类型')
            ->keyTime('updatedTime','最后更新')
			->keyDoActionMorePara('editTopic?type=###&id=###','编辑','操作')
			->keyDoAction('previewTopic?id=###','预览','操作')
			->keyDoAction('setstatusquestion?status=-1&ids=###','删除','操作',array('class'=>'confirm ajax-get'))
            ->data($list)
            ->pagination($totalCount, $r)
            ->display();
    }
    /**
     * 试题预览
     * @author <1395881288@qq.com>
     */
    public function previewtopic($id)
    {
	   $data=$this->questionModel->where(array('id'=>$id))->find();
	   //dump($data);
	   if($data['type']=='material')
	   {
	      $subdata = $this->questionModel->where(array('parentId'=>$id))->select();
		  $this->assign('subdata',$subdata);
	   }
	   $this->assign('data',$data);
	   $this->display('./Application/Examination/View/default/Index/previewtopic.html');
    }
    /**
     * 试题预览
     * @author <1395881288@qq.com>
     */
    public function previewquestionPaper($id)
    {
	   $questionPaperdata=$this->TestpaperModel->where(array('id'=>$id))->find();
	   //dump($questionPaperdata);
       //$json=json_decode($data['metas']);
	   
	   $this->assign('questionPaperdata',$questionPaperdata);
	   $this->display('./Application/Examination/View/default/Index/previewquestionPaper.html');
    }
    /**
     * 试卷管理
     * @author <1395881288@qq.com>
     */
    public function questionPapersList($page = 1, $r = 20)
    {
        $map=array();
		$map['status'] = array('egt', -1);
		//dump($data);
		$search_title=I('title');
		if(!empty($search_title))
		{
            $map['name'] = array('like', '%' . $search_title . '%');
		}

		$search_content=I('content');
		if (!empty($search_content))
		{
            $map['description'] = array('like', '%' . $search_content . '%');
		}
        if(!empty(I('begin_time')) && !empty(I('end_time')))
		{
 
			$map['createdTime'] = array(array('EGT', I('begin_time')), array('ELT', I('end_time')));
		}
		else if(!empty(I('begin_time')))
		{
			$map["createdTime"]=array('egt',I('begin_time'));
		}
		else if(!empty(I('end_time')))
		{
			$map["createdTime"]=array('elt',I('end_time'));
		}	
		if(session('user_auth')['isteacher']=='1')
        {
			$map["createdUserId"]=array('eq',UID);
		}
        //读取数据
        $model = M('testpaper');
        $list = $model->where($map)->page($page, $r)->order('id desc')->select();
        $totalCount = $model->where($map)->count();
		//echo($model->_sql());
        //显示页面
        $builder = new AdminListBuilder();
        $builder
            ->title('试卷管理')
            ->buttonNew(U('Admin/Examination/editTestpaper'),'新增')
            //->buttonDelete(U('Admin/Examination/removeTestpaper'))
            ->keyId()
            ->keyText('name', '名称')
            //->keyText('score', '总分')
            ->keyCreateTime('createdTime','创建时间')->keyStatus()
            //->keyDoAction('topicManage?id=###','题目管理')
            ->keyDoActionEdit('editTestpaper?id=###')
			->keyDoActionEdit('recordlist?testId=###','批阅试卷')
			->keyDoActionEdit('previewquestionPaper?id=###','预览')
			->keyDoAction($this->_model.'/removeTestpaper?status=-1&ids=###','删除','操作',array('class'=>'confirm ajax-get'))
			->setSearchPostUrl(U('questionPapersList'))
		    ->search('标题', 'title')
		    ->search('内容', 'content')	
            ->search('开始时间', 'begin_time','time')
	         ->search('结束时间', 'end_time','time')
            ->data($list)
            ->pagination($totalCount, $r)
            ->display();
    }
    /**
     * 试卷题目管理
     * @author <1395881288@qq.com>
     */
    public function topicManage($page = 1, $r = 10)
    {
        $id=I('id');
        $map = array('testpaper_id' => $id);
        //读取数据
        $model = M('testpaper_relevance');
        $list = $model->where($map)->page($page, $r)->order('id asc')->select();
        $totalCount = $model->where($map)->count();
        
        $TopicsModel=D('Examination/Topics');
        foreach ($list as &$v){$v['topic_content'] = $TopicsModel->getTopicContent($v['topic_id']);}
        
        //显示页面
        $builder = new AdminListBuilder();
        $builder
            ->title('试卷题目管理')
            ->buttonNew(U('Admin/Examination/addTopic',array('id'=>$id)),'新增')
            ->buttonDelete(U('Admin/Examination/removePaperTopic'))
            ->keyId()
            ->keyText('topic_content', '题目内容')
            ->data($list)
            ->pagination($totalCount, $r)
            ->display();
    }
    /**
     * 删除题目
     * @author <1395881288@qq.com>
     */
    public function removeTopic()
    {
        $ids=I('ids');
        if($ids==NULL){$this->error("请先选择删除数据");}
        else{
            //先查询所有试卷中是否存在该题目，存在则提示无法删除，不存在则删除。
            if(M('testpaper_relevance')->where(array('topic_id' => array('in',$ids)))->count()>=1){
                $this->error("该题目存在于试卷中，请先删除试卷。");
            }else{
                M('topics')->where(array('id' => array('in',$ids)))->delete();
                $this->success('删除题目成功。');
            }
        }
    }
    /**
     * 删除考试记录
     * @author <1395881288@qq.com>
     */
    public function removeRecord()
    {
             $ids=I('ids');
             if($ids==NULL){$this->error("请先选择删除数据");}
             else{
                    M('test_history')->where(array('id' => array('in',$ids)))->delete();
                    $this->success('删除考试记录成功。');
             }
    }
    /**
     * 删除试卷中的题目
     * @author <1395881288@qq.com>
     */
    public function removePaperTopic()
    {
            $ids=I('ids');
            if($ids==NULL){$this->error("请先选择删除数据");}
            else{
            M('testpaper_relevance')->where(array('id' => array('in',$ids)))->delete();
            D('Examination/Testpaper')->updateScore();
            $this->success('删除题目成功。');
            }
    }
    /**
     * 删除试卷
     * @author <1395881288@qq.com>
     */
    public function removeTestpaper()
    {
            $ids=I('ids');
            if($ids==NULL){$this->error("请先选择删除数据");}
            else{
            //先删除试卷与题目关联关系
            M('testpaper_relevance')->where(array('testpaper_id' => array('in',$ids)))->delete();
            //删除试卷
            M('testpaper')->where(array('id' => array('in',$ids)))->delete();
            //删除试卷的考试记录
            M('test_history')->where(array('testpaper_id' => array('in',$ids)))->delete();
            $this->success('删除试卷成功。');
            }
    }
    
    
    
    /**
     * 编辑题目
     * @author <1395881288@qq.com>
     */
    public function editTopic($type=null,$id = null, $name = '', $content = '', $ao = '',$bo = '',$co = '',$do = '', $answer = '', $grade = 0,$update_time = 0)
    {
		$topic = $this->questionModel->where(array('id' => $id))->find();
		if (!$topic) {
            $this->error('404 not found');
        }
		if (in_array(trim($topic["type"]),$this->supportedQuestionTypes))
		{
		    redirect(U('editTopic_'.$topic["type"],array('id' =>$topic["id"])));
		}
		else
		{
            $this->error('不支持题型。');
		}
		die();
		if (IS_POST) {
            //判断是否为编辑模式
            $isEdit = $id ? true : false;

            //生成数据
            $data = array('name' => $name, 'update_time' => time(), 'content' => $content, 'ao' => $ao, 'bo' => $bo, 'co' => $co, 'do' => $do, 'answer' => $answer, 'grade' => $grade);

            //写入数据库
            $model = M('topics');
            if ($isEdit) {
                $data['id'] = $id;
                $data = $model->create($data);
                $result = $model->where(array('id' => $id))->save($data);
                if (!$result) {
                    $this->error('编辑失败');
                }
            } else {
                $data = $model->create($data);
                $result = $model->add($data);
                if (!$result) {
                    $this->error('创建失败');
                }
            }

            //返回成功信息
            $this->success($isEdit ? '编辑成功' : '保存成功');

        } else {
            //判断是否为编辑模式
            $isEdit = $id ? true : false;

            //如果是编辑模式，读取题目信息
            if ($isEdit) {
                $topic = M('topics')->where(array('id' => $id))->find();
            } else {
                $topic = array('update_time' => time());
            }
            //答案选项
            $answers_array=array('a'=>'A','b'=>'B','c'=>'C','d'=>'D');
            //分数选项
            $grade_array=array('1'=>'1分','2'=>'2分','5'=>'5分','10'=>'10分');
            //显示页面
            $builder = new AdminConfigBuilder();
            $builder
                ->title($isEdit ? '编辑题目' : '新增题目')
                ->keyId()
                ->keyText('name','名称','题目名称')
                ->keyTextArea('content', '内容', '题目内容')
                ->keyText('ao','A','A 选项内容')
                ->keyText('bo','B','B 选项内容')
                ->keyText('co','C','C 选项内容')
                ->keyText('do','D','D 选项内容')
                ->keySelect('answer', '正确答案', '选择正确答案', $answers_array)
                ->keySelect('grade', '题目分数', '选择本题分数', $grade_array)
                ->data($topic)
                ->buttonSubmit(U('editTopic'))->buttonBack()
                ->display();
        }

    }
    public function edittopic_choice($id = null,$questiontype=null,$stem=null,$score=2,$answer=null,$analysis=null,$item=null,$difficulty=null,$parentId=0)
	{
	  if (IS_POST) {
	      $insertobj="";
	      foreach($_POST as $key=>$val)
          {
			  if(is_array($val))
			  {
				$insertobj.=",".$key.":";
			    $insertobj.="'".implode(",",$val)."'";
              }
              else
              {
				$insertobj.=",".$key.":";
			    $insertobj.="'".$val."'";
			  }
          }
		  //file_put_contents("debug.txt",$insertobj);
		  
            //判断是否为编辑模式
            $isEdit = $id ? true : false;
			$metas='{"choices":[';
			for($i=0;$i<sizeof($item);$i++)
			{
		  	   if($metas=='{"choices":[')
			   {
			     $metas.='"'.base64_encode($item[$i]).'"';
			   }
			   else
			   {
			   	 $metas.=',"'.base64_encode($item[$i]).'"';
			   }
			}
            $metas.=']}';
			
			$answerval='[';
			for($i=0;$i<sizeof($answer);$i++)
			{
		  	   if($answerval=='[')
			   {
			     $answerval.='"'.$answer[$i].'"';
			   }
			   else
			   {
			   	 $answerval.=',"'.$answer[$i].'"';
			   }
			}
            $answerval.=']';
			//file_put_contents("debug.txt",sizeof($answer).'|'.implode(",",$answer).'|'.$answerval);
            //生成数据
            $data = array('type' => $questiontype, 'stem' => $stem, 'score' => $score, 'answer' => $answerval, 'analysis' => $analysis, 'metas' => $metas, 'difficulty' => $difficulty, 'categoryId' => 0,'parentId'=>$parentId,'subCount'=>0,'updatedTime' => time(),'createdTime' => time());

            //写入数据库
            if ($isEdit) {
                $data['id'] = $id;
                $data = $this->questionModel->create($data);
                $result = $this->questionModel->where(array('id' => $id))->save($data);
                if (!$result) {
                    $this->error('编辑失败');
                }
            } else {
				$data['userId'] = UID;
                $data = $this->questionModel->create($data);
                $result = $this->questionModel->add($data);
                if (!$result) {
                    $this->error('创建失败');
                }
            }

            //返回成功信息
			if($parentId==0)
			{
			  $this->success($isEdit ? '编辑成功' : '保存成功',U('topicslist'));
			}
			else
			{
			  $this->success($isEdit ? '编辑成功' : '保存成功',U('subtopicslist',array('parentId'=>$parentId)));
			}

        } else {
            //判断是否为编辑模式
            $isEdit = $id ? true : false;

            //如果是编辑模式，读取题目信息
            if ($isEdit) {
                $topic = $this->questionModel->where(array('id' => $id))->find();
				$topic["questionanswer"]=$topic["answer"];
            } else {
            }
			//dump($topic);
			$topic["questiontype"]='choice';

            //显示页面
            $builder = new AdminConfigBuilder();
            $builder
                ->title($isEdit ? '编辑题目' : '新增题目')
                ->keyId()
				->keyRadio('difficulty', '难度', '', $this->difficulty)
                ->keyMiniEditor('stem', '题干', '',array('height' => '100px'))
				->keyChoice('metas','选项','多选题')
				->keyMiniEditor('analysis', '解析', '',array('height' => '100px'))
				->keyHidden('questiontype', '','')
				->keyHidden('questionanswer', '','')
                ->data($topic)
                ->buttonSubmit(U('edittopic_choice'))->buttonBack()
                ->display();
        }
	}
	public function edittopic_single_choice($id = null,$questiontype=null,$stem=null,$score=2,$answer=null,$analysis=null,$item=null,$difficulty=null,$parentId=0)
	{
	  if (IS_POST) {
	      $insertobj="";
	      foreach($_POST as $key=>$val)
          {
			  if(is_array($val))
			  {
				$insertobj.=",".$key.":";
			    $insertobj.="'".implode(",",$val)."'";
              }
              else
              {
				$insertobj.=",".$key.":";
			    $insertobj.="'".$val."'";
			  }
          }
		  //file_put_contents("debug.txt",$parentId);
		  //die();
            //判断是否为编辑模式
            $isEdit = $id ? true : false;
			$metas='{"choices":[';
			for($i=0;$i<sizeof($item);$i++)
			{
		  	   if($metas=='{"choices":[')
			   {
			     $metas.='"'.base64_encode($item[$i]).'"';
			   }
			   else
			   {
			   	 $metas.=',"'.base64_encode($item[$i]).'"';
			   }
			}
            $metas.=']}';
			$answer='["'.$answer.'"]';
            //生成数据
            $data = array('type' => $questiontype, 'stem' => $stem, 'score' => $score, 'answer' => $answer, 'analysis' => $analysis, 'metas' => $metas, 'difficulty' => $difficulty, 'categoryId' => 0,'parentId'=>$parentId,'subCount'=>0,'updatedTime' => time(),'createdTime' => time());

            //写入数据库
            if ($isEdit) {
                $data['id'] = $id;
                $data = $this->questionModel->create($data);
                $result = $this->questionModel->where(array('id' => $id))->save($data);
                if (!$result) {
                    $this->error('编辑失败');
                }
            } else {
				$data['userId'] = UID;
                $data = $this->questionModel->create($data);
                $result = $this->questionModel->add($data);
                if (!$result) {
                    $this->error('创建失败');
                }
            }

            //返回成功信息
			if($parentId==0)
			{
			  $this->success($isEdit ? '编辑成功' : '保存成功',U('topicslist'));
			}
			else
			{
			  $this->success($isEdit ? '编辑成功' : '保存成功',U('subtopicslist',array('parentId'=>$parentId)));
			}

        } else {
            //判断是否为编辑模式
            $isEdit = $id ? true : false;

            //如果是编辑模式，读取题目信息
            if ($isEdit) {
                $topic = $this->questionModel->where(array('id' => $id))->find();
				$topic["questionanswer"]=$topic["answer"];
            } 
			else 
			{
            }
			$topic["questiontype"]='single_choice';

            //显示页面
            $builder = new AdminConfigBuilder();
            $builder
                ->title($isEdit ? '编辑题目' : '新增题目')
                ->keyId()
				->keyRadio('difficulty', '难度', '', $this->difficulty)
                ->keyMiniEditor('stem', '题干', '',array('height' => '100px'))
				->keySingleChoice('metas','选项','单选题')
				->keyMiniEditor('analysis', '解析', '',array('height' => '100px'))
				->keyHidden('questiontype', '','')
				->keyHidden('questionanswer', '','')
                ->data($topic)
                ->buttonSubmit(U('edittopic_single_choice',array('parentId'=>$parentId)))->buttonBack()
                ->display();
        }
	}
    public function edittopic_uncertain_choice($id = null)
	{
	  die($id);
	}
	public function edittopic_fill($id = null,$questiontype=null,$stem=null,$score=2,$answer=null,$analysis=null,$item=null,$difficulty=null,$parentId=0)
	{
	  if (IS_POST) {
	      $insertobj="";
	      foreach($_POST as $key=>$val)
          {
			  if(is_array($val))
			  {
				$insertobj.=",".$key.":";
			    $insertobj.="'".implode(",",$val)."'";
              }
              else
              {
				$insertobj.=",".$key.":";
			    $insertobj.="'".$val."'";
			  }
          }
		  //file_put_contents("debug.txt",$insertobj);
		  
            //判断是否为编辑模式
            $isEdit = $id ? true : false;

            $metas='[]';
			$answerstr='[';
			preg_match_all('/\\[\\[.+?\\]\\]/i' ,$stem ,$res);
			foreach($res[0] as $key=>$val)
            {
                 $val=preg_replace('/(\\[\\[|\\]\\])/','',$val);
                 //file_put_contents("debug.txt",$val);
				 if($answerstr=='[')
			     {
			       $answerstr.='["'.base64_encode($val).'"]';
			     }
			     else
			     {
			       $answerstr.=',["'.base64_encode($val).'"]';
			     }
            }
			$answerstr.=']';
            //生成数据
            $data = array('type' => $questiontype, 'stem' => $stem, 'score' => $score, 'answer' => $answerstr, 'analysis' => $analysis, 'metas' => $metas, 'difficulty' => $difficulty, 'categoryId' => 0,'parentId'=>$parentId,'subCount'=>0,'updatedTime' => time(),'createdTime' => time());

            //写入数据库
            if ($isEdit) {
                $data['id'] = $id;
                $data = $this->questionModel->create($data);
                $result = $this->questionModel->where(array('id' => $id))->save($data);
                if (!$result) {
                    $this->error('编辑失败');
                }
            } else {
				$data['userId'] = UID;
                $data = $this->questionModel->create($data);
                $result = $this->questionModel->add($data);
                if (!$result) {
                    $this->error('创建失败');
                }
            }

            //返回成功信息
			if($parentId==0)
			{
			  $this->success($isEdit ? '编辑成功' : '保存成功',U('topicslist'));
			}
			else
			{
			  $this->success($isEdit ? '编辑成功' : '保存成功',U('subtopicslist',array('parentId'=>$parentId)));
			}

        } else {
            //判断是否为编辑模式
            $isEdit = $id ? true : false;

            //如果是编辑模式，读取题目信息
            if ($isEdit) {
                $topic = $this->questionModel->where(array('id' => $id))->find();
				
				$json=json_decode($topic['answer'],true);
				//dump(stripslashes(base64_decode($json[0])));
				$topic["questionanswer"]=$topic["answer"];
            } 
			else 
			{
            }
			$topic["questiontype"]='fill';

            //显示页面
            $builder = new AdminConfigBuilder();
            $builder
                ->title($isEdit ? '编辑题目' : '新增题目')
                ->keyId()
				->keyRadio('difficulty', '难度', '', $this->difficulty)
                ->keyMiniEditor('stem', '题干', '请在填空处输入：[[答案]]，举例说明：今年是201[[5]]年',array('height' => '200px'))
				->keyMiniEditor('analysis', '解析', '',array('height' => '100px'))
				->keyHidden('questiontype', '','')
				->keyHidden('questionanswer', '','')
                ->data($topic)
                ->buttonSubmit(U('edittopic_fill',array('parentId'=>$parentId)))->buttonBack()
                ->display();
        }
	}	
    public function edittopic_material($id = null,$questiontype=null,$stem=null,$score=2,$answer=null,$analysis=null,$item=null,$difficulty=null,$parentId=0)
	{
	  if (IS_POST) {
	      $insertobj="";
	      foreach($_POST as $key=>$val)
          {
			  if(is_array($val))
			  {
				$insertobj.=",".$key.":";
			    $insertobj.="'".implode(",",$val)."'";
              }
              else
              {
				$insertobj.=",".$key.":";
			    $insertobj.="'".$val."'";
			  }
          }
		  //file_put_contents("debug.txt",$insertobj);
		  
            //判断是否为编辑模式
            $isEdit = $id ? true : false;

            $metas='[]';
			$answer='[]';
            //生成数据
            $data = array('type' => $questiontype, 'stem' => $stem, 'score' => $score, 'answer' => $answer, 'analysis' => $analysis, 'metas' => $metas, 'difficulty' => $difficulty, 'categoryId' => 0,'parentId'=>$parentId,'subCount'=>0,'updatedTime' => time(),'createdTime' => time());

            //写入数据库
            if ($isEdit) {
                $data['id'] = $id;
                $data = $this->questionModel->create($data);
                $result = $this->questionModel->where(array('id' => $id))->save($data);
                if (!$result) {
                    $this->error('编辑失败');
                }
            } else {
				$data['userId'] = UID;
                $data = $this->questionModel->create($data);
                $result = $this->questionModel->add($data);
                if (!$result) {
                    $this->error('创建失败');
                }
            }
            //file_put_contents("debug.txt",'parentId:'.$parentId);
            //返回成功信息
			if(false)
			{
			  $this->success($isEdit ? '编辑成功' : '保存成功',U('topicslist'));
			}
			else
			{
			  $this->success($isEdit ? '编辑成功' : '保存成功',U('subtopicslist',array('parentId'=>$result)));
			}

        } else {
            //判断是否为编辑模式
            $isEdit = $id ? true : false;

            //如果是编辑模式，读取题目信息
            if ($isEdit) {
                $topic = $this->questionModel->where(array('id' => $id))->find();
				
				$json=json_decode($topic['answer'],true);
				//dump(stripslashes(base64_decode($json[0])));
				$topic['answer']=stripslashes(base64_decode($json[0]));
				$topic["questionanswer"]=$topic["answer"];
            } 
			else 
			{
            }
			$topic["questiontype"]='material';

            //显示页面
            $builder = new AdminConfigBuilder();
            $builder
                ->title($isEdit ? '编辑题目' : '新增题目')
                ->keyId()
				->keyRadio('difficulty', '难度', '', $this->difficulty)
                ->keyMiniEditor('stem', '题干', '',array('height' => '200px'))
				->keyMiniEditor('analysis', '解析', '',array('height' => '100px'))
				->keyHidden('questiontype', '','')
				->keyHidden('questionanswer', '','')
                ->data($topic)
                ->buttonSubmit(U('edittopic_material',array('parentId'=>$parentId)),'保存并添加子题')->buttonBack()
                ->display();
        }
	}
	public function edittopic_essay($id = null,$questiontype=null,$stem=null,$score=2,$answer=null,$analysis=null,$item=null,$difficulty=null,$parentId=0)
	{
	  if (IS_POST) {
	      $insertobj="";
	      foreach($_POST as $key=>$val)
          {
			  if(is_array($val))
			  {
				$insertobj.=",".$key.":";
			    $insertobj.="'".implode(",",$val)."'";
              }
              else
              {
				$insertobj.=",".$key.":";
			    $insertobj.="'".$val."'";
			  }
          }
		  //file_put_contents("debug.txt",$insertobj);
		  
            //判断是否为编辑模式
            $isEdit = $id ? true : false;

            $metas='[]';
			$answer='["'.base64_encode($answer).'"]';
            //生成数据
            $data = array('type' => $questiontype, 'stem' => $stem, 'score' => $score, 'answer' => $answer, 'analysis' => $analysis, 'metas' => $metas, 'difficulty' => $difficulty, 'categoryId' => 0,'parentId'=>$parentId,'subCount'=>0,'updatedTime' => time(),'createdTime' => time());

            //写入数据库
            if ($isEdit) {
                $data['id'] = $id;
                $data = $this->questionModel->create($data);
                $result = $this->questionModel->where(array('id' => $id))->save($data);
                if (!$result) {
                    $this->error('编辑失败');
                }
            } else {
				$data['userId'] = UID;
                $data = $this->questionModel->create($data);
                $result = $this->questionModel->add($data);
                if (!$result) {
                    $this->error('创建失败');
                }
            }

            //返回成功信息
			if($parentId==0)
			{
			  $this->success($isEdit ? '编辑成功' : '保存成功',U('topicslist'));
			}
			else
			{
			  $this->success($isEdit ? '编辑成功' : '保存成功',U('subtopicslist',array('parentId'=>$parentId)));
			}

        } else {
            //判断是否为编辑模式
            $isEdit = $id ? true : false;

            //如果是编辑模式，读取题目信息
            if ($isEdit) {
                $topic = $this->questionModel->where(array('id' => $id))->find();
				
				$json=json_decode($topic['answer'],true);
				//dump(stripslashes(base64_decode($json[0])));
				$topic['answer']=stripslashes(base64_decode($json[0]));
				$topic["questionanswer"]=$topic["answer"];
            } 
			else 
			{
            }
			$topic["questiontype"]='essay';

            //显示页面
            $builder = new AdminConfigBuilder();
            $builder
                ->title($isEdit ? '编辑题目' : '新增题目')
                ->keyId()
				->keyRadio('difficulty', '难度', '', $this->difficulty)
                ->keyMiniEditor('stem', '题干', '',array('height' => '200px'))
				->keyMiniEditor('answer', '答案', '',array('height' => '200px'))
				->keyMiniEditor('analysis', '解析', '',array('height' => '100px'))
				->keyHidden('questiontype', '','')
				->keyHidden('questionanswer', '','')
                ->data($topic)
                ->buttonSubmit(U('edittopic_essay',array('parentId'=>$parentId)))->buttonBack()
                ->display();
        }
	}	
	public function edittopic_determine($id = null,$questiontype=null,$stem=null,$score=2,$answer=null,$analysis=null,$item=null,$difficulty=null,$parentId=0)
	{
	  if (IS_POST) {
	      $insertobj="";
	      foreach($_POST as $key=>$val)
          {
			  if(is_array($val))
			  {
				$insertobj.=",".$key.":";
			    $insertobj.="'".implode(",",$val)."'";
              }
              else
              {
				$insertobj.=",".$key.":";
			    $insertobj.="'".$val."'";
			  }
          }
		  //file_put_contents("debug.txt",$insertobj);
		  
            //判断是否为编辑模式
            $isEdit = $id ? true : false;

            $metas='[]';
			$answer='["'.$answer.'"]';
            //生成数据
            $data = array('type' => $questiontype, 'stem' => $stem, 'score' => $score, 'answer' => $answer, 'analysis' => $analysis, 'metas' => $metas, 'difficulty' => $difficulty, 'categoryId' => 0,'parentId'=>$parentId,'subCount'=>0,'updatedTime' => time(),'createdTime' => time());

            //写入数据库
            if ($isEdit) {
                $data['id'] = $id;
                $data = $this->questionModel->create($data);
                $result = $this->questionModel->where(array('id' => $id))->save($data);
                if (!$result) {
                    $this->error('编辑失败');
                }
            } else {
				$data['userId'] = UID;
                $data = $this->questionModel->create($data);
                $result = $this->questionModel->add($data);
                if (!$result) {
                    $this->error('创建失败');
                }
            }

            //返回成功信息
			if($parentId==0)
			{
			  $this->success($isEdit ? '编辑成功' : '保存成功',U('topicslist'));
			}
			else
			{
			  $this->success($isEdit ? '编辑成功' : '保存成功',U('subtopicslist',array('parentId'=>$parentId)));
			}

        } else {
            //判断是否为编辑模式
            $isEdit = $id ? true : false;

            //如果是编辑模式，读取题目信息
            if ($isEdit) {
                $topic = $this->questionModel->where(array('id' => $id))->find();
				
				$json=json_decode($topic['answer'],true);
				//dump(stripslashes(base64_decode($json[0])));
				$topic['answer']=$json[0];
				$topic["questionanswer"]=$topic["answer"];
            } 
			else 
			{
            }
			$topic["questiontype"]='determine';

            //显示页面
            $builder = new AdminConfigBuilder();
            $builder
                ->title($isEdit ? '编辑题目' : '新增题目')
                ->keyId()
				->keyRadio('difficulty', '难度', '', $this->difficulty)
                ->keyMiniEditor('stem', '题干', '',array('height' => '200px'))
				->keyRadio('answer', '答案', '',array('1' => '正确','0' => '错误'))
				->keyMiniEditor('analysis', '解析', '',array('height' => '100px'))
				->keyHidden('questiontype', '','')
				->keyHidden('questionanswer', '','')
                ->data($topic)
                ->buttonSubmit(U('edittopic_determine',array('parentId'=>$parentId)))->buttonBack()
                ->display();
        }
	}	
    /**
     * 编辑试卷
     * @author <1395881288@qq.com>
     */
    public function editTestpaper($id = null, $name = '',$image = '',$categoryid = array(),$description = '',$score=null,$limitedTime = 0, $questionType=null,$question_type_seq=null,$questionnum=null,$item_questions=null, $status = '')
    {
        if (IS_POST) {
            //判断是否为编辑模式

			$question_type_seq_str='';
			$itemquestions="";
			foreach($question_type_seq as $key=>$val)
            {
               if($question_type_seq_str=='')
			   {
			     $question_type_seq_str='{"question_type_seq":["'.$val.'"';
			   }
			   else
			   {
			     $question_type_seq_str.=',"'.$val.'"';
			   }
			   if($itemquestions=='')
			   {
			     $itemquestions=',"itemquestions":{"'.$val.'":"'.$item_questions[$key].'"';
			   }
			   else
			   {
			     $itemquestions.=',"'.$val.'":"'.$item_questions[$key].'"';
			   }
            }
			$question_type_seq_str.=']';
			
			$itemquestions.='}';
			
			$question_type_seq_str.=$itemquestions;
			
			$score_str='';
			foreach($score as $key=>$val)
            {
               if($score_str=='')
			   {
			     $score_str='{"'.$question_type_seq[$key].'":"'.$val.'"';
			   }
			   else
			   {
			     $score_str.=',"'.$question_type_seq[$key].'":"'.$val.'"';
			   }
            }
			$score_str.='}';
			$question_type_seq_str.=',"score":'.$score_str;
			$questionnum=implode(",",$questionnum);
			$questionnum=',"questionnum":['.$questionnum.']';
			$question_type_seq_str.=$questionnum;
			$question_type_seq_str.=',"missScore":{"choice":"0","uncertain_choice":"0"}}';
			//file_put_contents("debug.txt",$question_type_seq_str);
			//die();
			
            $isEdit = $id ? true : false;

			
            //生成数据
            $data = array('name' => $name,'image'=>$image, 'description' => $description,'limitedTime'=>$limitedTime,'metas'=>$question_type_seq_str,'updatedTime' => time(),'createdTime' => time());
            $data['categoryid'] = implode(",",$categoryid);
	        $data['status'] = $status;
            //写入数据库
            if ($isEdit) {
                $data['id'] = $id;
                $data = $this->TestpaperModel->create($data);
                $result = $this->TestpaperModel->where(array('id' => $id))->save($data);
                if (!$result) {
                    $this->error('编辑失败');
                }
				$this->TestpaperItemModel->where(array('testId' => $id))->delete();
            } else {
				$data['createdUserId'] = UID;
                $data = $this->TestpaperModel->create($data);
                $result = $this->TestpaperModel->add($data);
                if (!$result) {
                    $this->error('创建失败');
                }
            }
			foreach($question_type_seq as $key=>$val)
            {
               if($item_questions[$key]=="")continue;
			   unset($data);
			   $data=array();
			   $data['testId']=$isEdit?$id:$result;
			   $data['questionType']=$val;
			   foreach(split(',',$item_questions[$key]) as $_key=>$_val)
			   {
			      $data['seq']=($_key+1);
				  $data['questionId']=$_val;
				  $data['parentId']=0;
				  $data['score']=$score[$key];
				  $data['parentId']=0;
				  $data['missScore']=0;
				  $this->TestpaperItemModel->add($data);
			   }
            }
			
            //返回成功信息
            $this->success($isEdit ? '编辑成功' : '保存成功',U('questionPapersList'));

        } else {
            //判断是否为编辑模式
            $isEdit = $id ? true : false;

            //如果是编辑模式，读取题目信息
            if ($isEdit) {
                $testpaper = M('testpaper')->where(array('id' => $id))->find();
            } else {
                $testpaper = array('limitedTime' => 0);
            }
            if($testpaper['metas']==null)
			{
			   $testpaper['metas']='{"question_type_seq":["single_choice","choice","fill","determine","essay","material"],"itemquestions":{"single_choice":"","choice":"","fill":"","determine":"","essay":"","material":""},"score":{"single_choice":"2","choice":"2","fill":"2","determine":"2","essay":"2","material":"2"},"missScore":{"choice":"0","uncertain_choice":"0"},"questionnum":["0","0","0","0","0","0"]}';
			}
			$testpaper['questionType']=$this->questionType;
		
			            //获取分类列表
            $category_map['status'] = array('egt', 0);
			$category_map['pid'] = array('gt', 0);
            $category_lists = $this->categorymodel->where($category_map)->order('id asc')->select();
	    
			$options = array_combine(array_column($category_lists, 'id'), array_column($category_lists, 'title'));
		    //dump($options);
            $tree = $this->categorymodel->getTree(0, 'id,title,sort,pid,status');		
            //显示页面
            $builder = new AdminConfigBuilder();
            $builder
                ->title($isEdit ? '编辑试卷' : '新增试卷')
                ->keyId()
                ->keyText('name','名称','试卷名称')
		        //->keySelect('categoryid', '分类', '', $options)
		        ->keySingleImage('image', '图标','建议尺寸：250*150')
				->keyCategory('categoryid',"分类","",$tree)
				->keyMiniEditor('description', '试卷说明', '',array('height' => '200px'))
				->keyInteger('limitedTime', '时间限制', '0分钟，表示无限制')
				->keyExamTopic('metas', '题目设置', '')
				->keyStatus('status', '状态')
				->keyHidden('questionType', '', '')
                ->data($testpaper)
                ->buttonSubmit(U('editTestpaper'))->buttonBack()
                ->display();
        }

    }
    public function selectquestion($id = null,$type=null)
	{
		$this->assign('id',$id);
		$this->assign('type',$type);
        $this->display('./Application/Examination/View/default/Index/selectquestion.html');
	}
	public function selectquestionleft($id = '',$type = '',$page = 1, $r = 5)
	{
        $map=array();
		$map['m.testId']=$id;
		$map['m.questionType']=$type;
		//$map['parentId']=0;
        //读取数据
        $list = $this->TestpaperItemModel->alias("m")->join(C('DB_PREFIX').'question q ON m.questionId=q.id','LEFT')->where($map)->order('m.seq asc')->select();
        $totalCount = $this->TestpaperItemModel->alias("m")->where($map)->count();
		//dump($list);
		$this->assign('list',$list);
		$this->assign('totalPageCount',$totalCount);
        $this->display('./Application/Examination/View/default/Index/selectquestionleft.html');
	}
    public function selectquestionright($testpaperid = '',$type = '',$page = 1, $r = 13)
	{
        $map=array();
		$map['type']=$type;
        //读取数据
        $model = M('question');
        $list = $model->where($map)->page($page, $r)->order('updatedTime desc')->select();
        $totalCount = $model->where($map)->count();
		
		$this->assign('list',$list);
		$this->assign('totalPageCount',$totalCount);
        $this->display('./Application/Examination/View/default/Index/selectquestionright.html');
	}
    /**
     * 添加试卷题目
     * @author <1395881288@qq.com>
     */
    public function addTopic($id = null, $testpaper_id = '', $topic_id = '')
    {
        if (IS_POST) {
            //判断是否为编辑模式
            $isEdit = $id ? true : false;

            //生成数据
            $data = array('testpaper_id' => $testpaper_id, 'topic_id' => $topic_id);

            //写入数据库
            $model = M('testpaper_relevance');
            if ($isEdit) {
                $data['id'] = $id;
                $data = $model->create($data);
                $result = $model->where(array('id' => $id))->save($data);
                if (!$result) {
                    $this->error('编辑失败');
                }
            } else {
                $data = $model->create($data);
                $result = $model->add($data);
                if (!$result) {
                    $this->error('创建失败');
                }
            }
            D('Examination/Testpaper')->updateScore(); //更新试卷总分
            //返回成功信息
            $this->success($isEdit ? '编辑成功' : '保存成功');

        } else {
            //判断是否为编辑模式
            $isEdit = $id ? true : false;
            $topic = array('testpaper_id' => I('id'));
            
            //根据试卷id获取当前试卷中已存在的题目
            $testpaper_relevance=M('testpaper_relevance')->where($topic)->select();
            //用于存放已存在的题目id
            $testpaper_relevance_array=array();
            //将已存在的题目id提取出来
            for($i=0;$i<count($testpaper_relevance);$i++){
                $testpaper_relevance_array[]=$testpaper_relevance[$i]['topic_id'];
            }
            
            $map['id']  = array('not in',$testpaper_relevance_array);
            if(count($testpaper_relevance_array)<1){$map=NULL;}
            $topics=M('topics')->where($map)->select();
            
            //题目选项
            $topic_array=array();
            for($j=0;$j<count($topics);$j++){
                $topic_array[$topics[$j]['id']]=$topics[$j]['content'];
            }
            //显示页面
            $builder = new AdminConfigBuilder();
            $builder
                ->title('新增题目')
                ->keyId()
                ->keyHidden('testpaper_id')
                ->keySelect('topic_id', '题目', '选择题目', $topic_array)
                ->data($topic)
                ->buttonSubmit(U('addTopic'))->buttonBack()
                ->display();
        }

    }
    /**
     * 设置商品状态：删除=-1，禁用=0，启用=1
     * @param $ids
     * @param $status
     */

    public function setstatusquestion($ids= '', $status)
    {
		if ($ids=='') {
                $this->error('请选择数据。');
        }
		$builder = new AdminListBuilder();
        $builder->doSetStatus('Question', $ids, $status);
    }
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
            ->keyId()->keyLink('title', '标题', $this->_model.'/add?id=###')->keyCreateTime('createtime')->keyStatus()
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
                    $this->error('分类不能超过二级！');
                }
            }


            $builder->title('新增分类')->keyId()->keyText('title', '标题')->keySelect('pid', '父分类', '选择父级分类', array('0' => '顶级分类') + $opt)
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
        $builder = new AdminListBuilder();
        $builder->doSetStatus('TestpaperCategory', $ids, $status);
    }
    /**分类回收站
     * @param int $page
     * @param int $r
     * @author 
     */
    public function categorytrash($page = 1, $r = 20,$model='')
    {
        $builder = new AdminListBuilder();
        $builder->clearTrash('TestpaperCategory');
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
