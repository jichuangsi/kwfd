<?php

namespace Usercenter\Controller;
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
		$this->remote=new RemoteApi();
		/*
		echo "<br><br><br><br>";
		dump(data_auth_sign(session('remote_user_auth')));
		dump(session('remote_user_auth'));
		$user=session('remote_user_auth');
		dump(session('remote_user_auth_sign') ."|".data_auth_sign($user));
        dump(is_remote_login());
		//die();
		/*
		session('[destroy]');
		define('UID',is_remote_login());
        if( !UID ){// 还没登录 跳转到登录页面
            $this->redirect('index/login');
        }
		*/
    }
    /*
     * 首页
     */
    public function index($page = 1, $r = 20)
    {
		$this->display();
    }
    public function login($username = null, $password = null, $redirect = null)
	{
		
	    if(IS_POST)
		{
			if(empty($username)||empty($password))
			{
				$this->error('帐号、密码必须填写');
			}

			//$this->show($username);	
			//$this->show($password);	
			$sql="select * from user where  userEmail = '$username' AND userPassword = '$password'";
            $result=$this->remote->query($sql);

			if (sizeof($result)>0)
			{
			   $row = $result[0]; 
			   
			           /* 记录登录SESSION和COOKIES */
               $auth = array(
                'uid'             => $row["userId"],
                //'username'        => $row["userName"],
                'last_login_time' => '1421086751'
               );

               session('remote_user_auth', $auth);
               session('remote_user_auth_sign', data_auth_sign($auth));

               //bind openid userid
			   $fmap['userid'] = $row["userId"];
               $list =D('openid')->where($fmap)->select();

			   if(empty($list))
			   {
			     $Dao = D('openid');
				 $data['userid'] = $row["userId"];
                 $data['openid'] = session("openid");
				 // 写入数据
                 if($lastInsId = $Dao->add($data))
				 {
                        //echo "插入数据 id 为：$lastInsId";
						
                 } else {
                        $this->error('数据写入错误！');
                 }
			   }
			   else
			   {
			    
			   }
			   if(empty($redirect))
			   {
                 $this->success('登录成功',U('information'));
			   }
			   else
			   {
				 $redirect=urldecode($redirect);
                 $redirect=preg_replace('/&amp;/','&',$redirect);
				 $this->success('登录成功',$redirect);
			   }
			   //die($redirect);
               //redirect($redirect,2 ,'正在跳转，请稍候......' );
			   //$this->success('登录成功',$redirect);
			   //die($row["userName"].$redirect."openid:".$this->_post('wecha_id'));
			}
			else
			{
			   $this->error('您的登陆信息错误<br />请核实后再登陆');
			}
		}
		else
		{
		  $this->display();
		}
		
	}
	/* 退出登录 */
    public function logout(){
        if(is_remote_login()){
            session('[destroy]');
            $this->success('退出成功！', U('login'));
        } else {
            $this->redirect('login');
        }
    }
	public function register()
	{

		if(IS_POST)
		{
            $username=$this->_post('username','htmlspecialchars');
			$password=$this->_post('password','htmlspecialchars');
			$repassword=$this->_post('repassword','htmlspecialchars');
			$email=$this->_post('email','htmlspecialchars');
			$mobile=$this->_post('mobile','htmlspecialchars');
			if($username==false||$password==false||$repassword==false||$email==false||$mobile==false)
			{
				$this->error('请填写完整');
			}
			if($password!=$repassword)
			{
			    $this->error('两次输入密码不一致。');
			}
            $sql="select * from user where  userEnglishName = '$username' or userEmail = '$email' or userMobilephone='$mobile'";
            $result=@mysql_query($sql,$this->dbconn);
			if (@mysql_num_rows($result) >0 )
			{
                $this->error('注册失败，你填写的信息已存在。');
			}
			else
			{
				//INSERT INTO user(userEnglishName,userName,userPassword,userEmail,userMobilephone,userType,createUser,createTime) //VALUES('username','username','password','email@qq.com','13418780533',4,169,'2014-06-04 10:00:12')
               $createtime=date('Y-m-d H:i:s');
			   $sql="INSERT INTO user(userName,userEnglishName,userPassword,userEmail,userMobilephone,userType,createUser,createTime) VALUES('$username','$username','$password','$email','$mobile',4,169,'".$createtime."')";
			   //file_put_contents("debug.txt",$sql);
			   //die($sql);
               if(!@mysql_query($sql,$this->dbconn))
			   {
			     $this->error('注册失败，请联系网站管理员。');
			   }
               else
			   {
                 $this->success('注册成功',U('Login/index')."&token=".$this->_get("token")."&wecha_id=".$this->_get('wecha_id'));
			   }
			}
        }
		else
		{
	        $this->display();
		}
	}
    public function information($page = 1, $r = 20)
    {
			if(!is_remote_login()){// 还没登录 跳转到登录页面
               $this->redirect('login');
            } 
			
			$rows=$this->remote->query("select * from user where userId =".session('remote_user_auth.uid'));
			$this->assign('info',$rows[0]);
			$data=$this->remote->query("select c.* from company c ,project p  where c.companyId=p.project_companyId and p.projectId=(select train_projectId from train where train_studentId=(select studentId from user_student where student_userId=".session('remote_user_auth.uid')."))");
            //dump($data);
			//die();
			if(!$data)
			{
			  $data[0]["companyName"]="无";
			}
            $this->assign('company',$data[0]);

			$sql="select studentScore from user_student where student_userId=".session('remote_user_auth.uid');
			$data=$this->remote->query("select studentScore from user_student where student_userId=".session('remote_user_auth.uid'));
			if(!$data)
			{
			  $data["score"]="未知";
			}			
			else
			{
			  $data["score"]=($data["studentScore"]+0)."分";
			}	
            $this->assign('pttel',$data);
			
			$data=$this->remote->query("select w.rumen from user_student s , writingGrade w where s.studentId=w.studentId and w.isdelete=0 and s.student_userId=".session('remote_user_auth.uid'));
			if(!$data)
			{
			  $data["score"]="未知";
			}
			else
			{
			  $data["score"]=($data["rumen"]+0)."分";
			}			
            $this->assign('ptwrite',$data);

			$this->display();
    }
    /*
     * 首页
     */
    public function course($page = 1, $r = 20)
    {
		if(!is_remote_login()){// 还没登录 跳转到登录页面
           $this->redirect('login');
        } 
			
		$data=$this->remote->query("select * from user where userId =".session('remote_user_auth.uid'));
		$this->assign('info',$data[0]);
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
    /*
     * 首页
     */
    public function score($page = 1, $r = 20)
    {
		if(!is_remote_login()){// 还没登录 跳转到登录页面
           $this->redirect('login');
        }
		$this->display();
    }
    /*
     * 首页
     */
    public function friend($page = 1, $r = 20)
    {
		if(!is_remote_login()){// 还没登录 跳转到登录页面
           $this->redirect('login');
        }
		$this->display();
    }
	public function tongbu($param =null)
    {
		if(empty($param))return;
		$params=preg_split('/\|\|/',$param);
		$auth = array(
                'uid'             => $params[0],
                'username'        => $params[1],
				'companyid'        => $params[2],
                'last_login_time' => '1421086751'
        );

        session('remote_user_auth', $auth);
        session('remote_user_auth_sign', data_auth_sign($auth));
		$this->display();
		//file_put_contents('debug.txt',$param);
    }
	/*********************************************************************
    函数名称:encrypt
    函数作用:加密解密字符串
    使用方法:
    加密     :encrypt('str','E','nowamagic');
    解密     :encrypt('被加密过的字符串','D','nowamagic');
    参数说明:
    $string   :需要加密解密的字符串
    $operation:判断是加密还是解密:E:加密   D:解密
    $key      :加密的钥匙(密匙);
    *********************************************************************/
    function encrypt($string,$operation,$key='')
    {
        $key=md5($key);
        $key_length=strlen($key);
        $string=$operation=='D'?base64_decode($string):substr(md5($string.$key),0,8).$string;
        $string_length=strlen($string);
        $rndkey=$box=array();
        $result='';
        for($i=0;$i<=255;$i++)
        {
            $rndkey[$i]=ord($key[$i%$key_length]);
            $box[$i]=$i;
        }
        for($j=$i=0;$i<256;$i++)
        {
            $j=($j+$box[$i]+$rndkey[$i])%256;
            $tmp=$box[$i];
            $box[$i]=$box[$j];
            $box[$j]=$tmp;
        }
        for($a=$j=$i=0;$i<$string_length;$i++)
        {
            $a=($a+1)%256;
            $j=($j+$box[$a])%256;
            $tmp=$box[$a];
            $box[$a]=$box[$j];
            $box[$j]=$tmp;
            $result.=chr(ord($string[$i])^($box[($box[$a]+$box[$j])%256]));
        }
        if($operation=='D')
        {
            if(substr($result,0,8)==substr(md5(substr($result,8).$key),0,8))
            {
                return substr($result,8);
            }
            else
            {
                return'';
            }
        }
        else
        {
            return str_replace('=','',base64_encode($result));
        }
    }
}