<?php

namespace Train\Controller;
use Remote\Api\RemoteApi;
use Think\Controller;

/**
 * Class IndexController
 * @package Shop\Controller
 */
class IndexController extends Controller
{
    /**
     * 初始化
     */
	protected $remote;
    public function _initialize()
    { 
		$this->remote       =   new RemoteApi();
        if(!is_remote_login()){// 还没登录 跳转到登录页面
           $this->redirect('Usercenter/Index/login');
        }
        if(session('remote_user_auth.companyid')=="0")
		{
           $this->error('对不起，你没有访问企业专区权限！');
		}
    }
    /*
     * 首页
     */
    public function index($page = 1, $r = 20)
    {
		$this->display();
    }
	public function circles($page = 1, $r = 20)
    {
	    $data=$this->remote->query("select t.train_projectId,t.trainId from train t ,user_student s where t.train_studentId=s.studentId and s.student_userId=3841");
	    $data=$this->remote->query("select * from user where userId in(select student_userId from user_student where studentId in(select train_studentId from train where train_projectId=".$data[0]["train_projectId"]." and trainId!=".$data[0]["trainId"]."))");
		$this->assign('data', $data);
		$this->display();
    }
	public function score($page = 1, $r = 20)
    {
	    $data=$this->remote->query("select sum(w.tempo+w.interact+w.quality+w.rumen+w.unit) score  from writinggrade w ,user_student s where w.isDelete=0  and w.studentId =s.studentId and s.student_userId=3467");
		$this->assign('data', $data);
		$this->display();
    }	
    public function progress($page = 1, $r = 20)
    {
		$data=$this->remote->query("select t.train_studentId,t.trainId from train t ,user_student s where t.train_studentId=s.studentId and s.student_userId=3387");
        $course1=$this->remote->query("select p.planTheme,l.lessonDuty ,l.lessonTrainDuty from lesson l,plan p,planRel pr  where l.lesson_planRelId=pr.planRelId and pr.planRel_planId = p.planId and l.isdelete=0 and l.lesson_trainId=".$data[0]["trainId"]." order by pr.planRelNo");
		/*
		["planTheme"] => string(37) "NDE Module3 Daily Activities SectionA"
        ["lessonDuty"] => string(1) "1"
        ["lessonTrainDuty"] => string(1) "0"
		*/
		foreach ($course1 as &$value) {
            switch($value["lessonDuty"])
			{
			  case "0":
			     $value["progress"]="未上";
				 break;
			  case "1":
			     if ($value["lessonTrainDuty"]=="0") 
				 {
                     $value["progress"]="实上";
                 } elseif ($value["lessonTrainDuty"]=="1") {
                     $value["progress"]="学生缺席";
                 } else {
                     $value["progress"]="未知";
                 }
				 break; 
			  case "2":
			     $value["progress"]="取消";
				 break; 
			  case "4":
			     $value["progress"]="取消";
				 break; 
			  case "5":
			     $value["progress"]="教师缺席";
				 break; 
			   default:
			     $value["progress"]="未知";
			}
        }
		unset($value);
		$this->assign('course1', $course1);
		
	    $course2=$this->remote->query("select p.planTheme,l.lessonElectiveDuty from lessonelective l,plan p,planRel pr ,lessonDesc le where le.lessonDesc_lessonelectiveId=l.lessonelectiveId and l.lessonelective_planRelId=pr.planRelId and pr.planRel_planId = p.planId and l.isdelete=0 and le.lessonDesc_trainId=3181 order by pr.planRelNo");
		/*
        ["planTheme"] => string(44) "宀辨仼娌欓緳璇撅細How to manage your time锛�"
        ["lessonElectiveDuty"] => string(1) "1"
		*/
		foreach ($course2 as &$value) {
            switch($value["lessonElectiveDuty"])
			{
			  case "0":
			     $value["progress"]="未上";
				 break;
			  case "1":
			     $value["progress"]="未上";
				 break;  
			   default:
			     $value["progress"]="未知";
			}
        }
		unset($value);

		$this->assign('course2', $course2);
		
	    $course3=$this->remote->query("select p.englishtitle,pt.status from placementtest pt ,plan p where pt.planId=p.planId and pt.studentId=3214");
		/*
        ["englishtitle"] => string(24) "Placement test (Writing)"
        ["status"] => string(1) "3"
		*/
		foreach ($course3 as &$value) {
            switch($value["status"])
			{
			  case "0":
			     $value["progress"]="未开始";
				 break;
			  case "1":
			     $value["progress"]="进行中";
				 break;  
			  case "2":
			     $value["progress"]="过期";
				 break;  
			  case "3":
			     $value["progress"]="完成";
				 break;  
			   default:
			     $value["progress"]="未知";
			}
        }
		unset($value);
		$this->assign('course3', $course3);
		
	    $course4=$this->remote->query("select p.englishtitle,wl.status from writingLesson wl ,plan p where wl.planId=p.planId and wl.studentId=3214");
		/*
        ["englishtitle"] => string(14) "1. Punctuation"
        ["status"] => string(1) "2"
		*/
		foreach ($course4 as &$value) {
            switch($value["status"])
			{
			  case "-1":
			     $value["progress"]="开始";
				 break;
			  case "0":
			     $value["progress"]="进行中";
				 break;
			  case "1":
			     $value["progress"]="进行中";
				 break;  
			  case "2":
			     $value["progress"]="过期";
				 break;  
			  case "3":
			     $value["progress"]="完成";
				 break;  
			   default:
			     $value["progress"]="未知";
			}
        }
		unset($value);
		$this->assign('course4', $course4);
		
	    $course5=$this->remote->query("select p.englishtitle,ut.status from unitTest ut,plan p where ut.planId=p.planId and ut.studentId=3214");
		/*
        ["englishtitle"] => string(14) "Mastery test 1"
        ["status"] => string(1) "3"
		*/
		foreach ($course5 as &$value) {
            switch($value["status"])
			{
			  case "0":
			     $value["progress"]="未开始";
				 break;
			  case "1":
			     $value["progress"]="进行中";
				 break;  
			  case "2":
			     $value["progress"]="过期";
				 break;  
			  case "3":
			     $value["progress"]="完成";
				 break;  
			   default:
			     $value["progress"]="未知";
			}
        }
		unset($value);
		$this->assign('course5', $course5);
		$this->display();
    }
    public function course($page = 1, $r = 20)
    {
		$data=$this->remote->query("select t.train_studentId,t.trainId from train t ,user_student s where t.train_studentId=s.studentId and s.student_userId=3387");
        $course1=$this->remote->query("select p.planTheme,l.lessonDuty ,l.lessonTrainDuty from lesson l,plan p,planRel pr  where l.lesson_planRelId=pr.planRelId and pr.planRel_planId = p.planId and l.isdelete=0 and l.lesson_trainId=".$data[0]["trainId"]." order by pr.planRelNo");
		/*
		["planTheme"] => string(37) "NDE Module3 Daily Activities SectionA"
        ["lessonDuty"] => string(1) "1"
        ["lessonTrainDuty"] => string(1) "0"
		*/
		$this->assign('course1', $course1);
		
	    $course2=$this->remote->query("select p.planTheme,l.lessonElectiveDuty from lessonelective l,plan p,planRel pr ,lessonDesc le where le.lessonDesc_lessonelectiveId=l.lessonelectiveId and l.lessonelective_planRelId=pr.planRelId and pr.planRel_planId = p.planId and l.isdelete=0 and le.lessonDesc_trainId=3181 order by pr.planRelNo");
		/*
        ["planTheme"] => string(44) "宀辨仼娌欓緳璇撅細How to manage your time锛�"
        ["lessonElectiveDuty"] => string(1) "1"
		*/
		$this->assign('course2', $course2);
		
	    $course3=$this->remote->query("select p.englishtitle,pt.status from placementtest pt ,plan p where pt.planId=p.planId and pt.studentId=3214");
		/*
        ["englishtitle"] => string(24) "Placement test (Writing)"
        ["status"] => string(1) "3"
		*/
		$this->assign('course3', $course3);
		
	    $course4=$this->remote->query("select p.englishtitle,wl.status from writingLesson wl ,plan p where wl.planId=p.planId and wl.studentId=3214");
		/*
        ["englishtitle"] => string(14) "1. Punctuation"
        ["status"] => string(1) "2"
		*/
		$this->assign('course4', $course4);
		
	    $course5=$this->remote->query("select p.englishtitle,ut.status from unitTest ut,plan p where ut.planId=p.planId and ut.studentId=3214");
		/*
        ["englishtitle"] => string(14) "Mastery test 1"
        ["status"] => string(1) "3"
		*/
		$this->assign('course5', $course5);
		$this->display();
    }
}