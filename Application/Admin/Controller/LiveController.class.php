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
class LiveController extends AdminController
{

    protected $_model="Live";
	protected $_modelname="课程";
	protected $_chaptersmodel="LiveChapters";
	protected $datamodel;
    protected $categorymodel;
	protected $chaptersmodel;
	protected $schedulemodel;
    function _initialize()
    {

		$this->datamodel = D($this->_model.'/'.$this->_model);
		$this->categorymodel = D($this->_model.'/'.$this->_model.'Category');
		$this->chaptersmodel = D($this->_model.'/'.$this->_model.'Chapters');
		$this->schedulemodel = D($this->_model.'/'.$this->_model.'Schedule');
        parent::_initialize();

    }
	 /**商品列表
     * @param int $page
     * @param int $r
     */
	public function lists($page = 1, $r = 20)
    {
        $majorOrg = C('MAJOR_ORG');
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
		if(!empty(I('begin_time')) && !empty(I('end_time')))
		{
 
			$map['createtime'] = array(array('EGT', I('begin_time')), array('ELT', I('end_time')));
		}
		else if(!empty(I('begin_time')))
		{
			$map["createtime"]=array('egt',I('begin_time'));
		}
		else if(!empty(I('end_time')))
		{
			$map["createtime"]=array('elt',I('end_time'));
		}
        if(session('user_auth')['isteacher']=='1') 
        {
			//$map["userId"]=array('eq',UID);
			
			$teacherCourse = array();			
			$soldCourse = M('Orderlistdetail')->alias('s')->field('s.goodid as courseid')->where(['s.teacherid'=>UID])->group('s.goodid')->select();	
			foreach($soldCourse as $v){
			    array_push($teacherCourse, $v['courseid']);
			}
			$selfCourse = $this->datamodel->alias('c')->field('c.id as courseid')->where(['c.userid'=>UID])->select();		
			foreach($selfCourse as $v){
			    array_push($teacherCourse, $v['courseid']);
			}
			if(!empty($teacherCourse)){
			    $map["id"]=array('IN',implode(',', array_unique($teacherCourse)));
			}
		}		
		
		$orderBy = 'online desc, createtime desc, view desc';
		if($majorOrg&&IS_ROOT){
		    $orderBy = 'id desc, orgId asc, recommend desc, ' . $orderBy;
		}
		
		$data = $this->datamodel->where($map)->order($orderBy)->page($page, $r)->select();
        //echo $this->datamodel->_sql();
		$totalCount = $this->datamodel->where($map)->count();
		
		foreach ($data as $key=>&$val) {
		    if($val['status']==='1'){
		        if($val['online']){
		            $val['gotomeeting'] = '<a href="'.U('Live/index/gotomeeting?id='.$val["id"].'&orgId='.$val["orgId"]).'" target="_blank" class="btn">进入课堂</a>';
		        }else{
		            $val['gotomeeting'] = '<div class="btn" style="background-color:#FFC125">非直播</div>';
		        }		    
		    }else{
		        $val['gotomeeting'] = '<div class="btn" style="background-color:#ec2b2b">课堂暂不可用</div>';
		    }
		    /* if($val['endtime']<time()){
		        $val['gotomeeting'] = '<div class="btn" style="background-color:#ec2b2b">课堂已结束</div>';
		    }else{
		        if($val['status']==='1'){
		            if($val['online']){
		                $val['gotomeeting'] = '<a href="'.U('Live/index/gotomeeting?id='.$val["id"].'&orgId='.$val["orgId"]).'" target="_blank" class="btn">进入课堂</a>';
		            }else{
		                $val['gotomeeting'] = '<div onclick="alert(\'该课程不提供直播功能。\')"  class="btn">进入课堂</div>';
		            }
		        }else if($val['status']==='3'){
		            $val['gotomeeting'] = '<a href="'.U($this->_model.'/endCourse?id='.$val["id"].'&orgId='.$val["orgId"]).'" class="btn confirm ajax-get">结束课堂</a>';
		        }else if($val['status']==='4'){
		            $val['gotomeeting'] = '<div class="btn" style="background-color:#ec2b2b">课堂已结束</div>';
		        }else{
		            $val['gotomeeting'] = '<div class="btn">课堂暂不可用</div>';
		        }
		    } */                
        }
		 
		$builder = new AdminListBuilder();
        $builder->title('所有'.$this->_modelname);
        $builder->meta_title = '所有'.$this->_modelname;
		$builder->buttonNew(U($this->_model.'/add'));
		//->buttonDelete(U('setStatus'))->setStatusUrl(U('setStatus'));

		if(IS_ROOT){
		    $builder->keyId()->keyText('title', $this->_modelname.'名称');
		    if($majorOrg){
		        $builder->keyText('orgName', '所属机构');
		    }
		    $builder->keyUpdateTime('changetime', '更新时间')->keyCreateTime('createtime', '创建时间')
		        //->keyHtml('gotomeeting', '进入课堂')
    		    ->keyOnline()
    		    ->keyStatus()
    		    ->keyRecommend()->setRecommendUrl(U('setRecommend'))
    		    ->keyDoAction('chapters?courseid=###','章节管理','操作')
    		    ->keyDoActionEdit($this->_model.'/add?id=###')
    		    ->keyDoAction($this->_model.'/setstatus?status=-1&ids=###','删除','操作',array('class'=>'confirm ajax-get'));
		}else{
		    $builder->keyId()->keyText('title', $this->_modelname.'名称');
		    if($majorOrg){
		        $builder->keyText('orgName', '所属机构');
		    }
		    $builder->keyUpdateTime('changetime', '更新时间')
    		    ->keyCreateTime('createtime', '创建时间')
    		    ->keyHtml('gotomeeting', '进入课堂')
    		    ->keyOnline()
    		    ->keyStatus()
    		    ->keyDoAction('chapters?courseid=###','章节管理','操作')
    		    ->keyDoActionEdit($this->_model.'/add?id=###')
    		    ->keyDoAction($this->_model.'/setstatus?status=-1&ids=###','删除','操作',array('class'=>'confirm ajax-get'));
		}		

        //$builder->search('内容', 'name');
		$builder->setSearchPostUrl(U('lists'));
		$builder->search('标题', 'title');
		$builder->search('内容', 'content');
        $builder->search('开始时间', 'begin_time','time');
	    $builder->search('结束时间', 'end_time','time');		
		$builder->data($data);
        $builder->pagination($totalCount, $r);
        $builder->display();
	}
		
	public function chapters($courseid=0,$pid=0,$page = 1, $r = 20)
    {
		
		
		$map['status'] = array('egt', 0);
		if(empty($pid))
		{
			$map['courseid'] = $courseid;
			
			$chaptertitle="章节";
		}
		else
		{
			
			$chaptertitle="文章";
		}
        $map['pid'] = $pid;
 
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
        $data = $this->chaptersmodel->where($map)->order('createtime desc')->page($page, $r)->select();
		//dump($this->chaptersmodel->_sql());
		$totalCount = $this->chaptersmodel->where($map)->count();
		$builder = new AdminListBuilder();
        $builder->title('所有'.$chaptertitle);
        $builder->meta_title = '所有'.$chaptertitle;
		$builder->buttonNew(U($this->_model.'/addChapter?pid='.$pid."&courseid=".$courseid))->buttonDelete(U('setchaptersstatus'))->setStatusUrl(U('setchaptersstatus'));

		$builder->keyId()->keyText('title', '名称')->keyUpdateTime('changetime', '更新时间')->keyCreateTime('createtime', '创建时间');
		
		if(empty($pid))
		{
		   $builder->keyDoAction('chapters?pid=###&courseid='.$courseid,'文章管理','操作');
		}
		$builder->keyDoActionEdit($this->_model.'/addChapter?id=###&pid='.$pid."&courseid=".$courseid)
		->keyDoAction($this->_model.'/setchaptersstatus?status=-1&ids=###','删除','操作',array('class'=>'confirm ajax-get'));

        //$builder->search('内容', 'name');
		$builder->setSearchPostUrl(U('chapters'));
		$builder->search('标题', 'title');
		$builder->search('内容', 'content');	
        $builder->search('pid', 'pid','hidden');
        $builder->search('courseid', 'courseid','hidden');		
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
	public function add(
	    $id = 0, $title = '', $image = '', $content = '', $categoryid = array(), $price=0,$status = '',$recommend = 0,
	    $starttime=0,$endtime=0,$pid=0,$teacherid=0,$commission=0,$online=0,$activityId=0,$activityName='',$activityRule='',
	    $orgCatId=0,$orgId=0,$orgName='',$period=1,$interval=1,$schedules='')
	{   	    
	   $majorOrg = C('MAJOR_ORG');
	   $isEdit = $id ? 1 : 0;
	   if (IS_POST) 
	   {   	       	       
	       
	        if ($title == '' || $title == null) {
                $this->error('请输入名称');
            }    
            if (!is_numeric($price)||$price<0)	
            {
				$this->error('请输入正确的价格。');
			}	
			if (!is_numeric($period)||intval($period)<1)
			{
			    $this->error('请输入正确的总课时。');
			}
			if (intval($period)===1&&intval($interval)>1)
			{
			    $this->error('请输入合理的总课时与课时间隔。');
			}
			
			if(IS_ROOT){
			    if (!is_numeric($commission)||$commission<0)
			    {
			        $this->error('请输入正确的分润。');
			    }	
			    
			    if ($recommend>0)
			    {
			        unset($map);
			        $map['recommend'] = $recommend;
			        if($majorOrg&&$orgId){
			            $map['orgId'] = $orgId;
			            $tip = '该机构';
			        }
			        $rs = $this->datamodel->field('id')->where($map)->select();
			        $ret = array();
			        foreach($rs as $k=>$v){
			            array_push($ret,$v['id']);
			        }
			        if(!in_array($id, $ret)&&count($ret)>=C('RECOMMEND_MAX_NUM')){
			            $this->error($tip.'已推荐三个课程。');
			        }
			    }
			    
			    if($activityId>0){
			        
			        $rs = 0;
			        if ($isEdit) {
    			        unset($map);
    			        $map['id'] = $id;
    			        $map['activityId'] = $activityId;
    			        $map['price'] = $price;
    			        $rs = $this->datamodel->where($map)->count();
			        }
			        
			        if(!$isEdit||($isEdit&&!$rs)){
			            if(!$majorOrg){
			                $activitylist = S('MASTER_CONFIG_ACTIVITY');
			                $data['activityId'] = $activityId;
			                foreach($activitylist as $k => $v){
			                    if($v['id']==$activityId){
			                        $data['activityName'] = $v['name'];
			                        $rule = $v['activityrule'];
			                        break;
			                    }
			                }
			            }else{
			                $data['activityId'] = $activityId;
			                $data['activityName'] = $activityName;
			                $rule = $activityRule;
			            }
			            
			            if($rule&&!empty($rule)){
			                $this->adjustPrice($price, $rule);
			            }
			        }
			    }else if($activityId==0){
			        $data['activityName'] = '';
			        $data['activityId'] = $activityId;
			    }
			    
			    if($majorOrg){
			        if($orgCatId&&empty($orgId)){
			            $this->error('请选择分类下机构。');
			        }
			        if($orgCatId&&$orgId&&$orgName){
			            $data['orgCatId'] = $orgCatId;
			            $data['orgId'] = $orgId;
			            $data['orgName'] = $orgName;
			        }else if(!$orgCatId){
			            $data['orgCatId'] = 0;
			            $data['orgId'] = 0;
			            $data['orgName'] = '';
			        }
			    }else{
			        if(C('ORG_ID')&&C('ORG_NAME')){
			            $data['orgCatId'] = 0;
			            $data['orgId'] = C('ORG_ID');
			            $data['orgName'] = C('ORG_NAME');
			        }			        
			    }
			}else{
			    if(C('ORG_ID')&&C('ORG_NAME')){
			        $data['orgCatId'] = 0;
			        $data['orgId'] = C('ORG_ID');
			        $data['orgName'] = C('ORG_NAME');
			    }
			}
			
            $data['title'] = $title;
			$data['categoryid'] = implode(",",$categoryid);
            $data['image'] = $image;
            $data['content'] = $content;
            $data['price'] = $price;	            
            $data['status'] = $status;
            $data['online'] = $online;
            $data['changetime'] = time();
            $data['period'] = intval($period);
            $data['interval'] = intval($interval);
			$data['starttime'] = $starttime;
			$data['endtime'] = $endtime;
			$data['pid'] = $pid;
			if(IS_ROOT){
			    $data['teacherid'] = $teacherid;
			    $data['commission'] = $commission;
			    $data['recommend'] = $recommend;
			}else
			    $data['teacherid'] = UID;
			   
			if ($isEdit) {
			    if(IS_ROOT){
			        $data['userId'] = $teacherid;
			    }
			    $rs = $this->datamodel->where('id=' . $id)->save($data);
			    if($rs) $this->datamodel->where('id=' . $id)->setInc('updateFlag');
            } else {
                //商品名存在验证
                unset($map);
                $map['status'] = array('egt', 0);
                $map['title'] = $title;
				/*
                if ($this->datamodel->where($map)->count()) {
                    $this->error('已存在同名数据');
                }
				*/
                if(IS_ROOT){
                    $data['userId'] = $teacherid;
                }else{
                    $data['userId'] = UID;
                }                
                $data['createtime'] = time();
                $rs = $this->datamodel->add($data);
                
            }
            if ($rs) {
                if($schedules) $this->setCourseSchedules($isEdit?$id:$rs, $schedules);
                
                if(IS_ROOT){                          
                    if($majorOrg){
                        $gid = $data['orgId'];                        
                    }else{
                        $gid = C('ORG_ID');
                    }
                    $aid = $data['activityId'];
                    $kid = $isEdit?$id:$rs;
                    
                    if($gid&&$aid!=null&&$kid){                        
                        $arr = file_get_contents(str_replace('__K__', $kid, str_replace('__A__', $aid, str_replace('__G__', $gid, C('MASTER_API_ACTIVITY_CALLBACK')))),true);
                        //dump($arr);
                    }else{
                        //echo $gid . '---' . $aid . '---' . $kid;
                    }                    
                }
                
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
			
			
			unset($map);
		    $map['m.status'] = 1;
		    $map['m.isteacher'] = 1;
		    $teachers = M("Member")->alias("m")->field('m.uid as teacherid,m.nickname as title')->join(C('DB_PREFIX').'avatar a ON m.uid=a.uid','LEFT')->where($map)->select();
		    //dump(M("Member")->_sql()); 
		    
		    $teachers = array_combine(array_column($teachers, 'teacherid'), array_column($teachers, 'title'));
		    $teachersoptions = array(0=>'不安排老师');
		    foreach($teachers as $k => $v){
		        $teachersoptions[$k] = $v;
		    }
		    //dump($teachersoptions); 
			
			$onlineoptions = array('否','是');
			//dump($onlineoptions); 
			
			//$intervaloptions = array(0=>'特定日期',1=>'一次',2=>'每天(含周末)',3=>'每天(不含周末)',4=>'隔天(含周末)',5=>'隔天(不含周末)',6=>'每周',7=>'每月',8=>'每季',9=>'每年');
			$intervaloptions = get_course_interval(-1);
			
			$tree = $this->categorymodel->getTree(0, 'id,title,sort,pid,status');
			//var_dump($tree);
			//->keyTime('content', '开始时间')->keyTime('content', '结束时间')
			
			$activitylist = S('MASTER_CONFIG_ACTIVITY');
			$activityoptions = array(0=>'请选择');
			foreach($activitylist as $k => $v){
			    if(!array_key_exists($v['id'], $activityoptions)){
			        $activityoptions[$v['id']] = $v['name'];
			    }
			}
			
			if($majorOrg){
			    $orgCategories = S('MASTER_CONFIG_ORG_CATEGORY');
			    $orgCategoryOptions = array(0=>'请选择');
			    foreach($orgCategories as $k => $v){
			        if(!array_key_exists($v['id'], $orgCategoryOptions)){
			            $orgCategoryOptions[$v['id']] = $v['name'];
			        }
			    }
			}
			
			if(IS_ROOT){
			 $builder->keyId()->keyText('title', $this->_modelname.'名称');
			 if($majorOrg&&$orgCategoryOptions&&count($orgCategoryOptions)>1){
			     $builder->keyOrgCategory("orgCatId", '平台机构', '每个课程只能属于一个平台机构', $orgCategoryOptions);
			 }		
			 if(!$majorOrg&&$activityoptions&&count($activityoptions)>1){
			     $builder->keySelect("activityId", '平台活动', '每个课程只能参加一个平台活动', $activityoptions);
			 }else if($majorOrg){
			     $builder->keySelect("activityId", '平台活动', '每个课程只能参加一个平台活动', $activityoptions)->keyHidden('activityName')->keyHidden('activityRule');
			 }
			 $builder->keySingleImage('image', '图标','建议尺寸：250*150')->keyEditor('content', '详情')
                ->keyText('price', '价格','')
                ->keyText('commission', '分润','请填0~100')
                ->keyText('period', '总课时','请填大于0')
                //->keyRadio("interval","课时间隔","",$intervaloptions)
    			//->keyTime('starttime', '课程开始时间','')->keyTime('endtime', '课程结束时间','')
				//->keyRadio("teacherid","老师","",$teachersoptions)
				->keyCategory('categoryid',"分类","",$tree)
				->keyHidden('pid')
				->keyStatus('status', '状态')
				->keyRecommend('recommend', '推荐', '最多推荐三个课程')
				->keyRadio("online","是否线上","",$onlineoptions)
				->keySchedule("schedules","上课时间表","",array('teachers'=>$teachersoptions, 'interval'=>$intervaloptions))
			     ;	
			}else{
			 $builder->keyId()->keyText('title', $this->_modelname.'名称')->keySingleImage('image', '图标','建议尺寸：250*150')->keyEditor('content', '详情')
			    ->keyText('price', '价格','')
			    ->keyText('period', '总课时','请填大于0')
			    //->keyRadio("interval","课时间隔","",$intervaloptions)
			    //->keyTime('starttime', '开始时间','')->keyTime('endtime', '结束时间','')
			    //->keyRadio("teacherid","老师","",$teachersoptions)
			    ->keyCategory('categoryid',"分类","",$tree)
			    ->keyHidden('pid')
			    ->keyStatus('status', '状态')
			    ->keyRadio("online","是否线上","",$onlineoptions)
			    ->keySchedule("schedules","上课时间表","",array('teachers'=>NULL, 'interval'=>$intervaloptions))
			     ;
			}
            if ($isEdit) {
                $data = $this->datamodel->where('id=' . $id)->find();
                
                $schedules = $this->schedulemodel->where(['courseid'=>$id])->order('id asc')->select();
                if($schedules&&!empty($schedules)){
                    $data['schedules'] = $schedules;
                }
                
                $builder->data($data);
                if($majorOrg){
                    if($data['orgId'])
                        $this->assign('orgIdSelected', $data['orgId']);
                    if($data['activityId'])
                        $this->assign('activityIdSelected', $data['activityId']);
                        
                }
                $builder->buttonSubmit(U($this->_model.'/add'));
                $builder->buttonBack();
                $builder->display();
            } else {
                $data['price'] = 0;
                $data['period'] = 1;
                $data['interval'] = 1;
                $data['status'] = 1;
                $data['recommend'] = 0;
                $data['online'] = 0;
                $data['commission'] = 0;
				$data['pid'] = $pid;
				if(count($teachersoptions)>0)
				{
					$data['teacherid'] = $teachers[0]['teacherid'];
				}
                $builder->buttonSubmit(U($this->_model.'/add'));
                $builder->buttonBack();
                $builder->data($data);
                $builder->display();
            }
	   }
	}
	
	private function setCourseSchedules($id, $schedules){
	    $scheduleArr = json_decode($schedules, true);
	    //dump($scheduleArr);exit;
	    unset($map);
	    $map['courseid'] = $id;
	    $old_schedules = $this->schedulemodel->where($map)->select();
	    if($old_schedules&&!empty($old_schedules)){	        
	        $rmt_schedule = array();
	        foreach($old_schedules as $k => $v){
	            $isExist = false;
	            foreach($scheduleArr as $k1 => &$v1){
	                if(!$v1['id']||empty($v1['id'])) continue;
	                if($v1['id']==$v['id']){
	                    unset($map);
	                    $map['id'] = $v1['id'];
	                    $map['courseid'] = $id;
	                    $v1['teacherid'] = $v1['teacherid']?$v1['teacherid']:get_uid();
	                    $v1['starttime'] = strtotime($v1['starttime']);
	                    $v1['endtime'] = strtotime($v1['endtime']);
	                    $this->schedulemodel->where($map)->setField($v1);
	                    $isExist=true;
	                }
	            }
	            if(!$isExist) array_push($rmt_schedule, $v);
	        }
	        
	        foreach($rmt_schedule as $k => $v){
	            unset($map);
	            $map['id'] = $v['id'];
	            $map['courseid'] = $id;
	            $this->schedulemodel->where($map)->delete();
	        }
	    }
	    
	    foreach($scheduleArr as $k => $v){
	        if($v['id']&&!empty($v['id'])) continue;
	        unset($data);
	        $data['courseid'] = $id;
	        $data['teacherid'] = $v['teacher']?$v['teacher']:get_uid();
	        $data['interval'] = $v['interval'];
	        $data['starttime'] = strtotime($v['starttime']);
	        $data['endtime'] = strtotime($v['endtime']);
	        
	        $this->schedulemodel->add($data);
	    }
	    
	}
	
	
	public function addChapter($id = 0, $title = '', $image = '', $content = '', $categoryid = 0, $price=0,$status = '',$starttime=0,$endtime=0,$pid=0,$courseid=0)
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
            $data['image'] = $image;
            $data['content'] = $content;
             $data['status'] = $status;
            $data['changetime'] = time();
 			$data['pid'] = $pid;
			$data['courseid'] = $courseid;
			if ($isEdit) {
                $rs = $this->chaptersmodel->where('id=' . $id)->save($data);
            } else {
                //商品名存在验证
                $map['status'] = array('egt', 0);
                $map['title'] = $title;
                if ($this->chaptersmodel->where($map)->count()) {
                    $this->error('已存在同名数据');
                }

                $data['createtime'] = time();
                $rs = $this->chaptersmodel->add($data);
            }
            if ($rs) {
                $this->success($isEdit ? '编辑成功' : '添加成功', U($this->_model.'/chapters',array('pid'=>$pid,'courseid'=>$courseid)));
            } else {
                $this->error($isEdit ? '编辑失败' : '添加失败');
            }
	   }
	   else 
	   {
		    $pdata=$this->chaptersmodel->find($pid);
		    $chaptertitle="文章";
		    if(!$pdata)
		    {
		       $chaptertitle="章节";
		    }
		
		    $builder = new AdminConfigBuilder();
            $builder->title($isEdit ? '编辑'.$chaptertitle: '添加'.$chaptertitle);
            $builder->meta_title = $isEdit ? '编辑'.$chaptertitle : '添加'.$chaptertitle;
			
 
			//->keyTime('content', '开始时间')->keyTime('content', '结束时间')
			$builder->keyId()->keyText('title', '名称');
			if($pdata){
			  $builder->keyEditor('content', '详情');
			}
			$builder->keyHidden('pid')->keyStatus('status', '状态');
            if ($isEdit) {
                $data = $this->chaptersmodel->where('id=' . $id)->find();
                $builder->data($data);
                $builder->buttonSubmit(U($this->_model.'/addChapter',array('pid'=>$pid,'courseid'=>$courseid)));
                $builder->buttonBack();
                $builder->display();
            } else {
                $data['status'] = 1;
				$data['pid'] = $pid;
				$data['courseid'] = $courseid;
                $builder->buttonSubmit(U($this->_model.'/addChapter',array('pid'=>$pid,'courseid'=>$courseid)));
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

    public function setchaptersstatus($ids= '', $status)
    {
		if ($ids=='') {
                $this->error('请选择数据。');
        }

		$builder = new AdminListBuilder();
        $builder->doSetStatus($this->_chaptersmodel.'', $ids, $status);
    }
    public function setstatus($ids= '', $status)
    {
		if ($ids=='') {
           $this->error('请选择数据。');
        }
		$builder = new AdminListBuilder();
        $builder->doSetStatus($this->_model.'', $ids, $status);
    }
    public function setRecommend($ids= '', $recommend, $orgId='')
    {
        if ($ids=='') {
            $this->error('请选择数据。');
        }
        $builder = new AdminListBuilder();
        $builder->doSetRecommend($this->_model.'', $ids, $recommend, $orgId);
    }
    public function endCourse($id=0, $orgId){
        unset($map);
        $map['id'] = $id;
        $map['orgId'] = $orgId;
        
        $rs = $this->datamodel->where($map)->where(['status'=>3])->setField(['status'=>4]); //老师上课
        if($rs) $rs=$this->datamodel->where($map)->setInc('updateFlag');
        
        if($rs)
            $this->success('设置成功', $_SERVER['HTTP_REFERER']); 
        else 
            $this->success('设置失败', $_SERVER['HTTP_REFERER']); 
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

        $tree = $this->categorymodel->getTree(0, 'id,title,sort,pid,status');
	    //var_dump($tree);
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
	
    private function adjustPrice(&$price, $rule = ''){
        if(!$rule && empty($rule)) return;
        $rules = explode(";",strtolower($rule));
        foreach($rules as $k => $rule){
            $items = explode(":",strtolower($rule));
            if(!is_array($items) || count($items) <= 1) return;
            switch($items[0]){
                case "p" : {
                    if(is_numeric($items[1]) && $items[1] >= 0){
                        $price = $items[1];                        
                    }
                    break;
                }
                case "d" : {
                    if(is_numeric($items[1]) && $items[1] >= 0){
                        $price = $price * $items[1];
                    }
                    break;
                }
                default : break;
            }            
        }
    }
    
}
