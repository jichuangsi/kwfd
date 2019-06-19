<?php
namespace Examination\Controller;

use Think\Controller;
/**
 * Class IndexController
 * @package Examination\Controller
 */
class IndexController extends Controller
{
    /**
     * 初始化
     */
	protected $_model="Testpaper";
    protected $_modelname="在线考试";
    protected $datamodel;
    protected $categorymodel;
	
    public function _initialize()
    {
        $this->datamodel = D($this->_model.'/'.$this->_model);
		$this->categorymodel = D($this->_model.'Category');
 

        $tree = $this->categorymodel->getTree();
 
		//$tree=array($tree);
 
		//var_dump($tree);
        $this->assign('tree', $tree);
		
        $menu_list = array(
            'left' =>
                array(
                    array('tab' => 'all', 'title' => '全部', 'href' => U('index')),
                )
        );
        foreach ($tree as $category) {
            $menu = array('tab' => 'category_' . $category['id'], 'title' => $category['title'], 'href' => U('index', array('category_id' => $category['id'])));
            if ($category['_']) {
                $menu['children'][] = array( 'title' => '全部', 'href' => U('index', array('category_id' => $category['id'])));
                foreach ($category['_'] as $child)
                    $menu['children'][] = array( 'title' => $child['title'], 'href' => U('index', array('category_id' => $child['id'])));
            }
            $menu_list['left'][] = $menu;
        }

        $this->assign('menu_list', $menu_list);
    }

    /**
     * 在线考试首页
     */
    public function index($page = 1,$count =8, $categoryid = 0)
    {
	    $map['status'] = 1;
		if(!empty(I("categoryid")))
		{
			//$map['categoryid'] = I("categoryid");
			$categoryarr=explode("_",$categoryid);
			//$map['_string'] = 'status=1 AND score>10';
			$map['_string'] = '0=0';
			foreach($categoryarr as $key=>$val)
			{
				$map['_string'].= ' AND instr(CONCAT(",",categoryid,","),",'.$val.',")>0';
			} 
		} 
		if(!empty(I("price")))
		{
			//echo I("price");
			$map['price'] = array('between',$this->pricedata[I("price")]);
		}
		
        $goods_list = $this->datamodel->where($map)->order('id desc,view desc')->page($page, $count )->select();
        //var_dump($goods_list);
		//echo $this->datamodel->_sql();
		$totalCount = $this->datamodel->where($map)->count();
		$this->assign('contents', $goods_list);
		$this->assign('totalPageCount', $totalCount);
		$this->assign('count', $count);
		        //查看最多
		unset($map);
		$map['status'] = 1;
        $hotdata = $this->datamodel->where($map)->order('view desc')->limit(10)->select();
        $this->assign('hotdata', $hotdata);
		
		$this->display();
    }
	public function Detail($id)
    {
	   $questionPaperdata=D('Testpaper')->where(array('id'=>$id))->find();
	   //dump($data);
       //$json=json_decode($data['metas']);
	   
	   $this->assign('questionPaperdata',$questionPaperdata);
	   $this->display();
    }
    /**
     * 参加考试
     */
    public function joinExam(){
        $id=I('id');
        $map['tr.testpaper_id']=$id;
        //获取该试卷的所有试题
        $this->topics=M('testpaper_relevance as tr')
                            ->join(C('DB_PREFIX').'topics as t on tr.topic_id=t.id')
                            ->where($map)
                            ->order('tr.id asc')
                            ->select();
        $this->assign("tid",$id);
        $this->display();
    }
	/**
     * 提交考试
     * @author 张志勇<316235872@qq.com>
     */
    public function submitexam($id=0)
	{
		if(!is_login())
		{
	       $this->error( "您还没有登录",U("Home/User/login") );	
		   die();
	    }
		$uid=is_login();
		$map['testId']=$id;
		$map['userId']=$uid;		
		$data=D('TestpaperResult')->where($map)->find();
		if($data)
		{
	       //$this->error("您已做过此试卷了。");		
		}
        //die($id);
		/*
		$result=$_POST;
		//dump($_POST);
		foreach($result as $k=>$v)
		{
            //获取该题的分数
			//dump($v);
        }
		*/

		$questionPaperdata=D('Testpaper')->where(array('id'=>$id))->find();
		//dump($questionPaperdata);
		//die();
	    $json=json_decode($questionPaperdata['metas']);
		$totalscore=0;
	    foreach($json->question_type_seq as $key=>$val)
        {
            $totalscore+=($json->score->$val+0)*($json->questionnum[$key]+0);
        }
		
		//dump($questionPaperdata);
		unset($data);
        $data['paperName']=$questionPaperdata['name'];	
		$data['testId']=$id;
		$data['userId']=$uid;
		$data['username']=query_user("nickname",$uid);	
		$data['limitedTime']=$questionPaperdata['limitedTime'];	
		$data['limitedTime']=$questionPaperdata['limitedTime'];	
		$data['updateTime']=time();	
		$data['createtime']=time();	
		$data['totalscore']=$totalscore;	
        $data['passedStatus']='none';	
        $data['status']='finished';
        //$data['checkTeacherId']=session('user_auth.companyid');
		$lastid=D('TestpaperResult')->add($data);
        //dump($lastid);
		
        
		//dump($json);
		$questionids="";
        foreach($json->itemquestions as $key=>$val)
        {
          //echo $key."=".$val;
		  if($val=="")continue;
          $questionids=$questionids==""?$val:$questionids.",".$val;
        }
        //echo $questionids;

		unset($map);
        $map['id']  = array('in',$questionids);
		//dump($map);
        $list=D('Examination/Question')->where($map)->select();
		//dump($list);
		foreach($list as $key=>$data)
		{
		   if($data['type']=='material')
	           {
	             $mapsub['parentId']  = array('eq',$data['id']);
	             $subdata=D('Examination/Question')->where($mapsub)->select();
	             //dump($subdata);
				 foreach($subdata as $_subkey=>$subdatadata)
                 {
				    $dataitem['itemId']=0;
					$dataitem['testId']=$id;
		            $dataitem['testPaperResultId']=$lastid;	
		            $dataitem['userId']=$uid;	
		            $dataitem['questionId']=$subdatadata['id'];	
                    $dataitem['status']='none';	
			        $dataitem['score']=0;
				    $postanswer=I('post.question_'.$subdatadata['id']);
				    $answer='[]';
				    if($postanswer)
				    {
				      $answer='';
					  if(is_array($postanswer))
			          {
				        foreach($postanswer as $k=>$v)
                        {
					  	  $v=base64_encode($v);
						  if($subdatadata['type']=="fill")
						  {
						  	$v='["'.$v.'"]';
						  }
						  else
						  {
						    $v='"'.$v.'"';
						  }
				          $answer=$answer==''?$v:$answer.",".$v;
                        }
				        $answer='['.$answer.']';
                      }
                      else
                      {
				        $answer='["'.base64_encode($postanswer).'"]';
			          }
				    }
                    $dataitem['answer']=$answer;
				    $dataitem['teacherSay']='';
				    D('TestpaperItemResult')->add($dataitem);
				  }
	           }
			   else
			   {
				  $dataitem['itemId']=0;
				  $dataitem['testId']=$id;
		          $dataitem['testPaperResultId']=$lastid;	
		          $dataitem['userId']=$uid;	
		          $dataitem['questionId']=$data['id'];	
                  $dataitem['status']='none';
				  $dataitem['score']=0;
				  
				  $postanswer=I('post.question_'.$data['id']);
				  $answer='[]';
				  if($postanswer)
				  {
				      $answer='';
					  if(is_array($postanswer))
			          {
				        foreach($postanswer as $k=>$v)
                        {
					  	  $v=base64_encode($v);
						  //echo $data['type'];
						  if($data['type']=="fill")
						  {
						  	$v='["'.$v.'"]';
						  }
						  else
						  {
						    $v='"'.$v.'"';
						  }
				          $answer=$answer==''?$v:$answer.",".$v;
                        }
				        $answer='['.$answer.']';
                      }
                      else
                      {
				        $answer='["'.base64_encode($postanswer).'"]';
			          }
				  }
                  $dataitem['answer']=$answer;
				  
				  $dataitem['teacherSay']='';
				  $returncode=D('TestpaperItemResult')->add($dataitem);
				  //dump($dataitem);
                  //die($returncode);

              }
		}
		//die();
		/*
		foreach($json->question_type_seq as $key=>$val)
        {
			$map['id']  = array('in',$json->itemquestions->$val);
            $list=D('Examination/Question')->where($map)->select();
						dump($list);

			foreach($list as $_key=>$data)
            {
			   echo $data['type'];
			   if($data['type']=='material')
	           {
	             $mapsub['parentId']  = array('eq',$data['id']);
	             $subdata=D('Examination/Question')->where($mapsub)->select();
	             //dump($subdata);
				 foreach($subdata as $_subkey=>$subdatadata)
                 {
				    $dataitem['itemId']=0;
					$dataitem['testId']=$id;
		            $dataitem['testPaperResultId']=$lastid;	
		            $dataitem['userId']=$uid;	
		            $dataitem['questionId']=$subdatadata['id'];	
                    $dataitem['status']='none';	
			        $dataitem['score']=0;
				  $postanswer=I('post.question_'.$subdatadata['id']);
				  $answer="[]";
				  if($postanswer)
				  {
				    $answer="";
					if(is_array($postanswer))
			        {
				      foreach($postanswer as $k=>$v)
                      {
						$v=base64_encode($v);
				        $answer=$answer==""?$v:$answer.",".$v;
                      }
				       $answer='['.$answer.']';
                    }
                    else
                    {
				      $answer='["'.base64_encode($postanswer).'"]';
			        }
				  }
                  $dataitem['answer']=$answer;
				  $dataitem['teacherSay']='';
				  D('TestpaperItemResult')->add($dataitem);
				 }
	           }
			   else
			   {
				  $dataitem['itemId']=0;
				  $dataitem['testId']=$id;
		          $dataitem['testPaperResultId']=$lastid;	
		          $dataitem['userId']=$uid;	
		          $dataitem['questionId']=$data['id'];	
                  $dataitem['status']='none';
				  $dataitem['score']=0;
				  
				  $postanswer=I('post.question_'.$data['id']);
				  $answer="[]";
				  if($postanswer)
				  {
				    $answer="";
					if(is_array($postanswer))
			        {
				      foreach($postanswer as $k=>$v)
                      {
						$v=base64_encode($v);
				        $answer=$answer==""?$v:$answer.",".$v;
                      }
				       $answer='['.$answer.']';
                    }
                    else
                    {
				      $answer='["'.base64_encode($postanswer).'"]';
			        }
				  }
                  $dataitem['answer']=$answer;
				  
				  $dataitem['teacherSay']='';
				  D('TestpaperItemResult')->add($dataitem);

			   }

             }
		}
		*/
		$update['view']=$data['view']+1;
        D('Testpaper')->where('id='.$id)->save($update);
		if($questionPaperdata['examdecide']=="0")//学生自评
		{
			//die("lastid".$lastid);
			redirect(U('correctpaper',array('testId'=>$id,'id'=>$lastid,'autosubmit'=>'true')));
			//$this->success("考试完毕,马上自动评卷。",U('correctpaper',array('testId'=>$id,'id'=>$lastid,'autosubmit'=>'true')),0);
	    }
		else//老师评卷
		{
		  $this->success("考试完毕，请等待老师批阅。",U('Home/Index/index'));
		}

    }
    /**
     * 考试处理
     * @author 张志勇<316235872@qq.com>
     */
    public function examHandle(){
         $result=$_POST;
         $uid=is_login();    //用户id
         $tid=I('post.tid'); //试卷id
         $score=0;           //考试得分
         //遍历题目及答案
         foreach($result as $k=>$v){
            //获取该题的分数
            $topic=M('topics')->where("id=$k")->field('answer,grade')->find();
            if($topic['answer']==$v){$score+=$topic['grade'];}
         }
         $data=array();
         $data['testpaper_id']=$tid;
         $data['member_id']=$uid;
         $data['grade']=$score;
         $data['add_time']=time();
         if(M('test_history')->add($data)){
             $this->success("考试完成！",U('Examination/Index/index'));
         }else{
             $this->error("考试失败！",U('Examination/Index/index'));
         }
    }
}