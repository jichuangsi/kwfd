<?php
/**
 * Created by PhpStorm.
 * User: 
 * Date: 1/15/14
 * Time: 4:17 PM
 */
namespace Api\Controller;

use Think\Model;
use Think\Exception;

header('Access-Control-Allow-Origin:*');

class LiveConsoleController extends ApiController
{
    protected $errMsg = array(
        "9001"=>"请输入用户名！",
        "9002"=>"请输入密码！",
        "9003"=>"登陆信息异常！",
        "9004"=>"参数信息异常！",
        "9005"=>"请登录！",
        "9006"=>"课程信息异常！",
        "9007"=>"提交数据异常！",
        "9999"=>"未知错误！"
    );
    
    protected $successMsg = array(
        "login"=>"用户登录成功",
        "info"=>"获取用户信息成功",
        "logout"=>"用户登出成功",
        "detail"=>"获取课程列表成功",
        "material"=>"获取课程资源成功",
        "comment"=>"获取课程评论成功",
    );
    
    protected $membermodel;
    protected $coursemodel;
    protected $categorymodel;
    protected $chaptersmodel;
    protected $ordermodel;
    protected $orderlistmodel;
    protected $orderlistdetailmodel;
    
    public function _initialize()
    {       
        $this->membermodel = D('Home/Member');
        $this->coursemodel = D('Live/Live');
        $this->categorymodel = D('Live/LiveCategory');
        $this->chaptersmodel = D('Live/LiveChapters');
        $this->ordermodel = D("Cart/order");
        $this->orderlistmodel = D('Cart/Orderlist');
        $this->orderlistdetailmodel = D('Cart/Orderlistdetail');
        parent::_initialize();
    }
    
    public function login(){
        
        $loginInfo = $this->parseJosonInRequest();
        
        if(!$loginInfo||empty($loginInfo)){
            $this->apiError("9003", $this->errMsg["9003"]);
        }
        
        $username = isset($loginInfo['username'])?$loginInfo['username']:"";
        $password = isset($loginInfo['password'])?$loginInfo['password']:"";
        
        if(empty($username)){
            $this->apiError("9001", $this->errMsg["9001"]);
        }
        
        if(empty($password)){
            $this->apiError("9002", $this->errMsg["9002"]);
        }
        
        $uid = $this->api->login($username, $password);
        
        if(0 < $uid){ //UC登录成功
            /* 登录用户 */            
            if($this->membermodel->login($uid, $remember == 'on')){ //登录用户
                //TODO:跳转到登录前页面
                $this->updateCourseStatus();
                $this->apiSuccess($this->successMsg["login"], null, array('data' => session('user_auth')));//, 'sessid'=>session_id()
            } else {
                $this->error();
                $this->apiError("9003", $Member->getError());
            }
            
        } else { //登录失败
            switch($uid) {
                case -1: $error = '用户不存在或被禁用！'; break; //系统级别禁用
                case -2: $error = '密码错误！'; break;
                default: $error = '未知错误！'; break; // 0-接口参数错误（调试阶段使用）
            }
            $this->apiError("9003", $error);
        }
        
    }        
    
    public function getUserInfo(){
        $this->apiSuccess($this->successMsg["info"], null, array('data' => session('user_auth')));
    }
    
    public function logout(){
        if(is_login()){
            $this->membermodel->logout();
            $this->apiSuccess($this->successMsg["logout"], null, null);
        } else {
            $this->apiSuccess($this->successMsg["logout"], null, null);
        }
    }
    
    public function getCurrentEvents($start, $end){
        
        if(!is_login()){
            $this->apiError("9005", $this->errMsg["9005"]);
        }
        
        if(empty($start)||empty($end)){
            $this->apiError("9004", $this->errMsg["9004"]);
        }
        
        //dump(strtotime($start));
        //dump(strtotime($end));
        
        $start_time = strtotime($start);
        $end_time = strtotime($end);
        
        unset($map);
        unset($where);
        //开始时间早于当前但结束时间在$start_time与$end_time之间
        $where[0]['d.starttime'] = array('lt',$start_time);
        $where[0]['d.endtime'] = array(array('egt',$start_time),array('elt',$end_time));
        //开始时间与结束时间在$start_time与$end_time之间
        $where[1]['d.starttime'] = array('egt',$start_time);
        $where[1]['d.endtime'] = array('elt',$end_time);
        //开始时间在$start_time与$end_time之间但结束时间晚于$end_time
        $where[2]['d.starttime'] = array(array('egt',$start_time),array('elt',$end_time));
        $where[2]['d.endtime'] = array('gt',$end_time);
        //开始时间早于$start_time与结束时间晚于$end_time
        $where[3]['d.starttime'] = array('lt',$start_time);
        $where[3]['d.endtime'] = array('gt',$end_time);
        
        $where['_logic'] = 'or';
        $map['_complex'] = $where;
        
        $map['l.MODULE_NAME']='Live';        
        $map['o.status']=2;//已付款
        $map['c.status']=1;//已启用       
        $map['c.online']=1;//线上课
        if($this->isTeacher()){
            $map['d.teacherid']=$this->get_uid();
        }else{
            $map['l.uid']=$this->get_uid();
        }
        
        $courses = $this->orderlistmodel->alias("l")->field('l.id, d.id as did, d.goodid as cid, c.title, c.orgId, c.orgName, d.starttime, d.endtime')
                        ->join(C('DB_PREFIX').'orderlistdetail d ON d.orderlistid=l.id','INNER')
                        ->join(C('DB_PREFIX').'order o ON o.id=l.orderid','INNER')
                        ->join(C('DB_PREFIX').'live c ON c.id=l.goodid','INNER')
                        ->where($map)->select();
        
        //echo $this->orderlistmodel->_sql(); exit;
        
        //dump($courses);exit;
        
        $return = array();
        foreach($courses as $v){            
            array_push($return, ['id'=>$v['id'],'title'=>$v['title'],'did'=>$v['did'],'cid'=>$v['cid'],'orgId'=>$v['orgId'],'orgName'=>$v['orgName'],'start'=>date(DATE_ISO8601, $v['starttime']),'end'=>date(DATE_ISO8601, $v['endtime'])]);
        }
        
        /* 返回JSON数据 */
        $this->ajaxReturn($return);
    }
    
    public function getCurrentCourses(){
        
        if(!is_login()){
         $this->apiError("9005", $this->errMsg["9005"]);
         }
        
        $map['l.MODULE_NAME']='Live';
        $map['o.status']=2;//已付款
        $map['c.status']=1;//已启用
        $map['c.online']=1;//线上课
        if($this->isTeacher()){
            //$courses = $this->orderlistmodel->alias("l")->field('l.id as oid, c.id as cid, c.title, c.orgId, c.orgName, c.image, c.price, c.teacherid')
            $oid = $this->orderlistdetailmodel->alias('d')->field('d.orderlistid as oid')->where(['d.teacherid'=>$this->get_uid()])->group('d.orderlistid')->select();
            $param = array();
            foreach($oid as $o){
                array_push($param, $o['oid']);
            }
            
            $map['l.id']=array('IN', implode(",", $param));
            $courses = $this->orderlistmodel->alias("l")->field('l.id as oid, c.id as cid, c.title, c.orgId, c.orgName, c.image, c.price, c.teacherid, c.categoryid')
                        ->join(C('DB_PREFIX').'order o ON o.id=l.orderid','INNER')
                        ->join(C('DB_PREFIX').'live c ON c.id=l.goodid','INNER')
                        ->where($map)->select();
            
        }else{
            $map['l.uid']=$this->get_uid();
            
            $courses = $this->orderlistmodel->alias("l")->field('l.id as oid, c.id as cid, c.title, c.orgId, c.orgName, c.image, c.price, c.teacherid, c.categoryid')
                        ->join(C('DB_PREFIX').'orderlistdetail d ON d.orderlistid=l.id','INNER')
                        ->join(C('DB_PREFIX').'order o ON o.id=l.orderid','INNER')
                        ->join(C('DB_PREFIX').'live c ON c.id=l.goodid','INNER')
                        ->group('l.id')
                        ->where($map)->select();
        }
        
        
        foreach($courses as &$course){
             
            if($course['image']){
                $course['imageurl'] = $this->protocol.get_cover($course['image'], 'path');
            }else{
                $course['imageurl'] = NULL;
            }
            
            unset($map);
            unset($option);
            $map['m.uid'] = $course['teacherid'];
            $option['where'] = $map;
            $teacher = $this->membermodel->alias("m")->field('m.uid,m.nickname,m.sex,m.status,m.isteacher,CASE WHEN ISNULL(a.path) THEN "Addons/Avatar/default.jpg" ELSE CONCAT("Uploads/Avatar/",a.path) end as path')
                            ->join(C('DB_PREFIX').'avatar a ON m.uid=a.uid','LEFT')->find($option);
            if($teacher){
                $teacher['imageurl'] = $this->protocol .'/'. $teacher['path'];
                $course['teacher'] = $teacher;
            }else{
                $course['teacher'] = NULL;
            }
            
            unset($map);
            $map['o.goodid'] = $course['cid'];
            $map['o.MODULE_NAME']='Live';
            $sold = $this->orderlistmodel->alias("o")->where($map)->count();
            if($sold){
                $course['sold'] = $sold;
            }else{
                $course['sold'] = 0;
            }
            
            if ($course['categoryid']) {
                $categoryids = $course['categoryid'];
                $categorydata = $this->categorymodel->where("id in ($categoryids) and status = 1")->select();
                foreach ($categorydata as $ckey => $cval) {
                    $course['category'] .= $cval['title'] . ',';
                }
                $course['category'] = substr($course['category'], 0, strlen($course['category']) - 1);
                unset($course['categoryid']);
            }else{
                $course['category'] = NULL;
            }
            
            unset($map);
            $map['c.id'] = $course['cid'];
            $comments = $this->coursemodel->alias("c")->field('l.id')->join(C('DB_PREFIX').'local_comment l ON l.row_id=c.id','LEFT')->where($map)->count();
            $map['l.score'] = array('gt', 3);
            $goods = $this->coursemodel->alias("c")->field('l.id')->join(C('DB_PREFIX').'local_comment l ON l.row_id=c.id','LEFT')->where($map)->count();
            if($goods&&$comments){
                $course['good'] = round(intval($goods)/intval($comments)*100).'%';
            }else{
                $course['good'] = '0%';
            }
        }
                    
                    
        //print_r($courses);
        $this->apiSuccess($this->successMsg['detail'], null, array('data'=>$courses));
    }
    
    public function getEventDetail($p = 1, $r = 10, $oid='', $cid='', $orgId='', $end=0){
        
        if(!is_login()){
            $this->apiError("9005", $this->errMsg["9005"]);
         }
        
        if(empty($oid)||empty($cid)||empty($orgId)){
            $this->apiError("9004", $this->errMsg["9004"]);
        }
        
        unset($map);
        unset($option);
        $map['id'] = $cid;
        $map['orgId'] = $orgId;
        $option['where'] = $map;
        $course = $this->coursemodel->field('id,title,image,teacherid,orgId,orgName,starttime,endtime,period,price')->find($option);
        if (!$course) {
            $this->apiError("9006", $this->errMsg["9006"]);
        }
        
        if($course['image']){
            $course['imageurl'] = $this->protocol.get_cover($course['image'], 'path');
        }else{
            $course['imageurl'] = NULL;
        }        
        
        unset($map);
        unset($option);
        $map['m.uid'] = $course['teacherid'];
        $option['where'] = $map;
        $teacher = $this->membermodel->alias("m")->field('m.uid,m.nickname,m.sex,m.status,m.isteacher,CASE WHEN ISNULL(a.path) THEN "Addons/Avatar/default.jpg" ELSE CONCAT("Uploads/Avatar/",a.path) end as path')
                    ->join(C('DB_PREFIX').'avatar a ON m.uid=a.uid','LEFT')->find($option);
        if($teacher){
            $teacher['imageurl'] = $this->protocol .'/'. $teacher['path'];
            $course['teacher'] = $teacher;
        }else{
            $course['teacher'] = NULL;
        }
        
        unset($map);
        $map['o.goodid'] = $cid;
        $map['o.MODULE_NAME']='Live';
        $sold = $this->orderlistmodel->alias("o")->where($map)->count();
        if($sold){
            $course['sold'] = $sold;
        }else{
            $course['sold'] = 0;
        }
        
        unset($map);
        $map['d.goodid'] = $cid;
        $map['d.orgId'] = $orgId;
        //$map['l.uid'] = $this->get_uid();
        if($this->isTeacher()){
            $map['d.teacherid']=$this->get_uid();
        }else{
            $map['l.uid']=$this->get_uid();
        }
        $map['l.id'] = $oid;
        if($end) $map['d.courseStatus'] = array('gt', 3);
        else $map['d.courseStatus'] = array('elt', 3);
        
        $course['c_tot'] = $this->orderlistdetailmodel->alias("d")->field('d.*')->join(C('DB_PREFIX').'orderlist l ON l.id=d.orderlistid','INNER')->where($map)->order('d.starttime desc')->count();
        
        $classes = $this->orderlistdetailmodel->alias("d")->field('d.*, (d.endtime-d.starttime)/3600 as duraion')->join(C('DB_PREFIX').'orderlist l ON l.id=d.orderlistid','INNER')->where($map)->order('d.starttime desc')->page($p, $r)->select();
        //echo $this->orderlistdetailmodel->_sql();exit;
        if($classes&&!empty($classes)){
            $course['classes'] = $classes;
            if(!$end){
                $course['rest'] = count($classes);
            }
        }else{
            $course['classes'] = NULL;
            if(!$end) $course['rest'] = 0;            
        }
        
        unset($map);
        $map['c.id'] = $cid;
        $comments = $this->coursemodel->alias("c")->field('l.id')->join(C('DB_PREFIX').'local_comment l ON l.row_id=c.id','LEFT')->where($map)->select();
        $map['l.score'] = array('gt', 3);
        $goods = $this->coursemodel->alias("c")->field('l.id')->join(C('DB_PREFIX').'local_comment l ON l.row_id=c.id','LEFT')->where($map)->count();
        if($comments&&!empty($comments)){
            if($goods){
                $course['good'] = round(intval($goods)/count($comments)*100).'%';
            }else{
                $course['good'] = '0%';
            }            
            $course['comments'] = count($comments);
        }else{
            $course['comments'] = $comments;
            $course['good'] = '0%';
        }        
        
        //print_r($course);
        $this->apiSuccess($this->successMsg['detail'], null, array('data'=>$course));
    }
    
    public function getEventMaterial($cid='', $orgId=''){
        if(!is_login()){
         $this->apiError("9005", $this->errMsg["9005"]);
         }
        
        if(empty($cid)||empty($orgId)){
            $this->apiError("9004", $this->errMsg["9004"]);
        }
        
        unset($map);
        unset($option);
        $map['id'] = $cid;
        $map['orgId'] = $orgId;
        $option['where'] = $map;
        $course = $this->coursemodel->field('id,title,image,orgId,orgName,categoryid,images,starttime,endtime')->find($option);
        if (!$course) {
            $this->apiError("9006", $this->errMsg["9006"]);
        }
        
        if($course['image']){
            $course['image'] = $this->protocol.get_cover($course['image'], 'path');
        }else{
            $course['image'] = NULL;
        }
        
        if ($course['categoryid']) {
            $categoryids = $course['categoryid'];
            $categorydata = $this->categorymodel->where("id in ($categoryids) and status = 1")->select();
            foreach ($categorydata as $ckey => $cval) {
                $course['category'] .= $cval['title'] . ',';
            }
            $course['category'] = substr($course['category'], 0, strlen($course['category']) - 1);
            unset($course['categoryid']);
        }else{
            $course['category'] = NULL;
        }
        
        $chapters=$this->chaptersmodel->getTree($cid, true, 0);
        //print_r($chapters);
        if($chapters&&isset($chapters['_'])&&!empty($chapters['_'])){     
            $course['chapters'] = $chapters;
            foreach($course['chapters']['_'] as &$c){                
                $this->encodeContent($c);
            }
        }else{
            $course['chapters'] = NULL;
        }
        //print_r($course['chapters']);
        $images = array();
        if($course["images"]){
            $imagesId = explode(",", $course["images"]);
            foreach($imagesId as $k => $v){
                array_push($images, $this->protocol.get_cover($v, 'path'));
            }
        }
        
        if($images&&!empty($images)){
            $course["images"] = $images;
        }else{
            $course["images"] = NULL;
        }
        
        $this->apiSuccess($this->successMsg['material'], null, array('data'=>$course));
    }
    
    public function getEventComment($p = 1, $r = 10, $cid='', $orgId=''){
        if(!is_login()){
         $this->apiError("9005", $this->errMsg["9005"]);
         }
        
        if(empty($cid)||empty($orgId)){
            $this->apiError("9004", $this->errMsg["9004"]);
        }
        
        unset($map);
        unset($option);
        $map['id'] = $cid;
        $map['orgId'] = $orgId;
        $option['where'] = $map;
        $course = $this->coursemodel->field('id,title,image,orgId,orgName,categoryid,images,starttime,endtime')->find($option);
        if (!$course) {
            $this->apiError("9006", $this->errMsg["9006"]);
        }
        
        unset($map);
        $map['c.id'] = $cid;
        $commentsAll = $this->coursemodel->alias("c")->field('l.score')
                        ->join(C('DB_PREFIX').'local_comment l ON l.row_id=c.id','LEFT')
                        ->where($map)->order('l.create_time desc')->select();
        $course['c_tot'] = 0;
        $course['c_good'] = 0;
        $course['c_soso'] = 0;
        $course['c_bad'] = 0;
        foreach($commentsAll as &$v){
            if($v['score']>3){
                ++$course['c_good'];
            }else if($v['score']<3){
                ++$course['c_bad'];
            }else{
                ++$course['c_soso'];
            }
        }
        $course['c_tot'] = count($commentsAll);        
        
        unset($map);
        $map['c.id'] = $cid;
        $comments = $this->coursemodel->alias("c")->field('l.content,l.uid,l.create_time,l.score,m.nickname,m.sex,m.status,CASE WHEN ISNULL(a.path) THEN "Addons/Avatar/default.jpg" ELSE CONCAT("Uploads/Avatar/",a.path) end as path')
                    ->join(C('DB_PREFIX').'local_comment l ON l.row_id=c.id','LEFT')
                    ->join(C('DB_PREFIX').'member m ON m.uid=l.uid','LEFT')
                    ->join(C('DB_PREFIX').'avatar a ON m.uid=a.uid','LEFT')
                    ->where($map)->order('l.create_time desc')->page($p, $r)->select();
        
        
        foreach($comments as &$v){
            $v['image'] = $this->protocol .'/'. $v['path'];
            $v['timeTip'] = friendlyDate($v['create_time']);
            unset($v['path']);
        }
        
        if($comments&&!empty($comments)){
            $course['comments'] = $comments;
        }else{
            $course['comments'] = NULL;
        }
        //print_r($course);
        $this->apiSuccess($this->successMsg['comment'], null, array('data'=>$course));
    }
    
    public function postComment(){
        if(!is_login()){
         $this->apiError("9005", $this->errMsg["9005"]);
         }
        
        $commentInfo = $this->parseJosonInRequest();
        
        if(!$commentInfo||empty($commentInfo)){
            $this->apiError("9004", $this->errMsg["9004"]);
        }
        
        $cid = isset($commentInfo['cid'])?$commentInfo['cid']:"";
        $orgId = isset($commentInfo['orgId'])?$commentInfo['orgId']:"";
        
        if(!$cid||!$orgId){
            $this->apiError("9004", $this->errMsg["9004"]);
        }
        
        $score = isset($commentInfo['score'])?$commentInfo['score']:"";
        $comment = isset($commentInfo['comment'])?$commentInfo['comment']:"";
        
        unset($data);
        $data['uid'] = $this->get_uid();
        $data['app'] = 'Live';
        $data['mod'] = 'index';
        $data['row_id'] = $cid;
        $data['parse'] = 0;
        $data['content'] = op_t($comment);
        $data['create_time'] = NOW_TIME;
        $data['pid'] = 0;
        $data['status'] = 1;
        $data['score'] = $score;
        
        $model = new Model();        
        $model->startTrans();
        try{
            $localComment = $model->table(C(DB_PREFIX)."local_comment");            
            $newid= $localComment->add($data);    
            $model->commit();
        }catch (Exception $e){
            $model->rollback();
            $this->apiError("9007", $this->errMsg["9007"]);
        }
        
        $this->apiSuccess($this->successMsg['submit'], null, null);
    }
    
    private function encodeContent(&$chapters){
        //print_r($chapters);
        $chapters['content'] = htmlspecialchars($chapters['content']);
        if($chapters['_']&&!empty($chapters['_'])){
            foreach($chapters['_'] as &$v){
                $this->encodeContent($v);
            }
        }
    }
    
    private function updateCourseStatus(){
        
        $map['l.uid'] = $this->get_uid();
        $map['d.courseStatus'] = 3;
        $map['d.endtime'] = array('elt', time());
        $endCourses = $this->orderlistdetailmodel->alias('d')->field("d.id")->join(C('DB_PREFIX').'orderlist l ON l.id=d.orderlistid','INNER')->where($map)->select();
        //echo $this->orderlistdetailmodel->_sql();
        //print_r($endCourses);
        
        $param = array();
        foreach($endCourses as $o){
            array_push($param, $o['id']);
        }
        unset($map);
        $map['d.id']=array('IN', implode(",", $param));
        $this->orderlistdetailmodel->alias('d')->where($map)->setField(['courseStatus'=>4]);
    }
    
    private function parseJosonInRequest(){
        
        return json_decode(file_get_contents("php://input"), true);
    }
    
    private function get_uid(){
        //return 19;
        return get_uid();
    }
    
    private function isTeacher(){
        return false;
        //return session('user_auth')['isteacher'];
    }
}