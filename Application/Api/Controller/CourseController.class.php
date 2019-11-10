<?php
/**
 * Created by PhpStorm.
 * User: 
 * Date: 1/15/14
 * Time: 4:17 PM
 */
namespace Api\Controller;

header('Access-Control-Allow-Origin:*');

class CourseController extends ApiController
{

    protected $errMsg = array(
        "7001"=>"该记录不存在！",
        "7002"=>"机构活动查询缺少活动信息参数！"
    );
    
    protected $successMsg = array(
        "query"=>"'获取课程列表成功'",
        "category"=>"获取分类列表成功",
        "recommend"=>"获取推荐课程列表成功",
        "detail"=>"获取课堂详情成功",
        "check"=>"机构活动检查成功",
        "activity"=>"获取制定活动课程列表成功"
    );
    
    protected $datamodel;
    protected $categorymodel;
    protected $orderlistmodel;
    protected $chaptersmodel;
    
    public function _initialize()
    {
        $this->datamodel = D('Live/Live');
        $this->categorymodel = D('Live/LiveCategory');
        $this->orderlistmodel = D('Cart/Orderlist');
        $this->chaptersmodel = D('Live/LiveChapters');
        parent::_initialize();
    }
    
    public function activityCheck($i = 0, $o = ''){
        
        $map['activityId']=$i;
        $majorOrg = C('MAJOR_ORG');
        if($majorOrg&&$o){
            $map['orgId']=$o;
        }
        $activitycount = $this->datamodel->where($map)->count();        
        
        $this->apiSuccess($this->successMsg["check"], null, array('count'=>$activitycount));
        
    }    
    
    /**
     * 根据关键字搜索课堂列表API
     *
     * @param number $p
     *            //页数
     * @param number $r
     *            //每页条数
     * @param string $t
     *            //课堂标题
     * @param string $c
     *            //课堂内容
     * @param string $y
     *            //课堂分类
     */
    public function courseQuery($p = 1, $r = 20, $t = '', $c = '', $y = '', $o = '')
    {
        // echo I('title').'==='.$content;
        /*
         * if(empty($title)&&empty($content)&&empty($categoryid)){
         * $this->apiError(3001, "查询条件不能为空");
         * }else{
         *
         * }
         */
        $this->query($p, $r, $t, $c, $y, $o, $this->successMsg['query']);
    }

    /**
     * 返回課堂分類列表API
     */
    public function categoryQuery($id=0)
    {
        $tree = $this->categorymodel->getTree($id, true, 0);
        $this->apiSuccess($this->successMsg['category'], null, array('data' => $tree));
    }
    
    /**
     * 返回当前机构推荐課堂列表API
     */
    public function recommendQuery($p = 1, $r = 20, $t = '', $c = '', $y = '', $o = '')
    {
        $option['recommend'] = true;
        $this->query($p, $r, $t, $c, $y, $o, $this->successMsg['recommend'], $option);
    }
    
    /**
     * 返回当前机构参与指定活动課堂列表API
     */
    public function activiryQuery($i = 0, $p = 1, $r = 20, $t = '', $c = '', $y = '', $o = '')
    {
        $option['activity'] = true;
        $option['activityId'] = $i;
        $this->query($p, $r, $t, $c, $y, $o, $this->successMsg['activity'], $option);
    }
    
    public function detailQuery($id = 0, $v = true)
    {
        if(empty($id)||$id===0){
            $this->apiError('7001', $this->errMsg['7001']);
        }
        
        $data = $this->datamodel->field('id,title,image,categoryid,content,view,price,starttime,endtime,teacherid,online')->find($id);
        if (!$data) {
            $this->apiError('7001', $this->errMsg['7001']);
        }
        
        //dump($data);
        if($data['content']&&!empty($data['content'])){
            $data['content'] = $this->replace_img($data['content']);
        }
        
        /* 更新浏览数 */
        if($v){
            $map = array('id' => $id);
            $this->datamodel->where($map)->setInc('view');
        }
                
        //查看最多
        /* $hotmap['status'] = 1;
        $hotdata = $this->datamodel->where($hotmap)->order('view desc')->limit(10)->select();
        $this->assign('hotdata', $hotdata); */
        
        $chapters=$this->chaptersmodel->getTree($id);
        //dump($chapters);
        if($chapters){
            $data['chapters'] = $chapters['_'];
        }
        
        unset($map);
        $map['m.uid'] = $data['teacherid'];
        $teacher = M("Member")->alias("m")->field('m.uid,m.nickname,m.sex,m.signature,CASE WHEN ISNULL(a.path) THEN "Addons/Avatar/default.jpg" ELSE CONCAT("'.$this->protocol.'/Uploads/Avatar/",a.path) end as path')->join(C('DB_PREFIX').'avatar a ON m.uid=a.uid','LEFT')->where($map)->select();
        //dump($teacher);        
        if($teacher&&$teacher[0]){
            $data['teacher'] = $teacher[0];
        }
        
        if (!empty($data['categoryid'])) {
            $data['category'] = '';
            $categoryids = $data['categoryid'];
            $categorydata = $this->categorymodel->where("id in ($categoryids) and status = 1")->select();
            foreach ($categorydata as $ckey => $cval) {
                $data['category'] .= $cval['title'] . ',';
            }
            $data['category'] = substr($data['category'], 0, strlen($data['category']) - 1);
        }
        
        unset($map);
        $map['o.goodid'] = $data['id'];
        $map['o.MODULE_NAME']='Live';
        $sold = M("Orderlist")->alias("o")->field('m.*,a.*,CASE WHEN ISNULL(a.path) THEN "Addons/Avatar/default.jpg" ELSE CONCAT("Uploads/Avatar/",a.path) end as path')->join(C('DB_PREFIX').'Member m ON m.uid=o.uid','LEFT')->join(C('DB_PREFIX').'avatar a ON m.uid=a.uid','LEFT')->where($map)->count();
        //dump($orderlist);
        if($sold){
            $data['sold'] = $sold;
        }
        
        if (!empty($data['image'])) {
            $data['imageurl'] = $this->protocol . get_cover($data['image'], 'path');
        }
        
        $this->apiSuccess($this->successMsg['detail'], null, array('data'=>$data));
    }
    
    public function detailsQuery(){
        $postdata = json_decode($_POST['p'],true);
        
        if(!$postdata||count($postdata)===0||!$postdata['goodid']||count($postdata['goodid'])===0){
            $this->apiError('7001', $this->errMsg['7001']);
        }
        
        unset($map);
        $map['id'] = array('in', $postdata['goodid']);
        $map['updateFlag'] = array('gt', $postdata['updateFlag']);
        $majorOrg = C('MAJOR_ORG');
        if($majorOrg){
            $map['orgId'] = $postdata['orgid'];
        }
        $data = $this->datamodel->field('id,title,image,categoryid,view,price,starttime,endtime,teacherid,online,updateFlag,orgId,status,online')->where($map)->select();
        //$data = $this->datamodel->_sql();
        if (!$data) {
            $this->apiError('7001', $this->errMsg['7001']);
        }
        
        foreach($data as $k => &$v){
            if (!empty($v['image'])) {
                $v['imageurl'] = $this->protocol . get_cover($v['image'], 'path');
            }
        }
       
        $result['data'] = $data; 
        
        $this->apiSuccess($this->successMsg["create"], null, $result);
    }
    
    
    private function query($page = 1, $row = 20, $title = '', $content = '', $category = '', $orgId = '', $message = 'sucess', $option = array()){        
        
        $order = $option['recommend']?'recommend desc,createtime desc,view desc':'createtime desc,view desc';
        
        $majorOrg = C('MAJOR_ORG');
        if($majorOrg&&$orgId){
            $map['orgId']=$orgId;
        }
        
        $map['status'] = array(
            'egt',
            0
        );
        if($option['recommend']){
            $map['recommend'] = array(
                'eq',
                1
            );
        }   
        
        if($option['activity']){
            $map['activityId'] = array(
                'eq',
                $option['activityId']
            );
        }
        
        $search_title = $title;
        if (! empty($search_title)) {
            $map['title'] = array(
                'like',
                '%' . $search_title . '%'
            );
        }
        
        $search_content = $content;
        if (! empty($search_content)) {
            $map['content'] = array(
                'like',
                '%' . $search_content . '%'
            );
        }
        $search_category = $category;        
        if (! empty($search_category)) {
            $categoryarr = explode("_", $search_category);
            $nodeIds = array();
            foreach($categoryarr as $key => $val){                
                $this->iterateTree($this->categorymodel->getTree($val), $nodeIds);                
            }
            //print_r($nodeIds);
            $map['_string'] = '0=0';
            $temp = '(';
            foreach ($nodeIds as $key => $val) {
                if($key===count($nodeIds)-1){
                    $temp .= ' instr(CONCAT(",",categoryid,","),",' . $val . ',")>0';
                }else{
                    $temp .= ' instr(CONCAT(",",categoryid,","),",' . $val . ',")>0 OR';
                }
                
            }
            $temp .= ' )';   
            $map['_string'] .= ' AND ' .$temp;
        }
        
        $data = $this->datamodel->field('id,title,image,categoryid,view,price')
            ->where($map)
            ->order($order)
            ->page($page, $row)
            ->select();
        //echo $datamodel->_sql();
        $totalCount = $this->datamodel->where($map)->count();
        
        foreach ($data as $key => $val) {
            if (! empty($val['categoryid'])) {
                $data[$key]['category'] = '';
                $categoryids = $val['categoryid'];
                $categorydata = $this->categorymodel->where("id in ($categoryids) and status = 1")->select();
                foreach ($categorydata as $ckey => $cval) {
                    $data[$key]['category'] .= $cval['title'] . ',';
                }
                $data[$key]['category'] = substr($data[$key]['category'], 0, strlen($data[$key]['category']) - 1);
            }
            
            unset($map);
            $map['goodid'] = $val['id'];
            $map['MODULE_NAME'] = 'Live';
            $data[$key]['sold'] = $this->orderlistmodel->where($map)->count();
            
            if (! empty($val['image'])) {
                $data[$key]['imageurl'] = $this->protocol . get_cover($val['image'], 'path');
            }
        }
        
        $result[data] = $data;
        $result['count'] = $totalCount;
        
        $this->apiSuccess($message, null, $result);
    }
    
    private function iterateTree($tree, &$nodeIds){
        //print_r($tree);       
        array_push($nodeIds, $tree['id']);
        if($tree['_']&&is_array($tree['_'])&&count($tree['_'])){            
            foreach($tree['_'] as $k => $v){                
                $this->iterateTree($v, $nodeIds);
            }
        }
    }
}