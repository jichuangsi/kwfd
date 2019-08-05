<?php
/**
 * Created by PhpStorm.
 * User: 
 * Date: 1/15/14
 * Time: 4:17 PM
 */
namespace Api\Controller;

header('Access-Control-Allow-Origin:*');

class TeacherController extends ApiController
{
   
    public function listQuery($p = 1,$r =10){
        
        $ret = array();
        
        $map['m.status'] = 1;
        $map['m.isteacher'] = 1;
        
        $teachers = M("Member")->alias("m")->field('m.uid,m.nickname,m.sex,m.signature,CASE WHEN ISNULL(a.path) THEN "Addons/Avatar/default.jpg" ELSE CONCAT("Uploads/Avatar/",a.path) end as path,f.field_data as info')->join(C('DB_PREFIX').'avatar a ON m.uid=a.uid','LEFT')->join('(select * from '.C('DB_PREFIX').'field where field_id=3) f ON m.uid=f.uid','LEFT')->where($map)->order('m.uid asc')->page($p, $r)->select();
        //dump(M("Member")->_sql());
        $totalCount = M("Member")->alias("m")->field('m.*,CASE WHEN ISNULL(a.path) THEN "Addons/Avatar/default.jpg" ELSE CONCAT("Uploads/Avatar/",a.path) end as path,f.field_data as info')->join(C('DB_PREFIX').'avatar a ON m.uid=a.uid','LEFT')->join('(select * from '.C('DB_PREFIX').'field where field_id=3) f ON m.uid=f.uid','LEFT')->where($map)->count();
        //dump($teachers);
              
        foreach($teachers as $k => &$v){
            $v['path'] = $this->protocol.'/'.$v['path'];
            if($v['info']&&!empty($v['info'])){
                $this->replace_img($v['info']);
            } 
        }
        
        $ret['data'] = $teachers;
        $ret['count'] = $totalCount;
        
        $this->apiSuccess('获取列表成功', null, $ret);
    }
    
    public function courseQuery($id = 0, $p = 1, $r =10){
        
        /* $map['m.status'] = 1;
        $map['m.isteacher'] = 1;
        $map['m.uid'] = $id;
        $data = M("Member")->alias("m")->field('m.*,CASE WHEN ISNULL(a.path) THEN "Addons/Avatar/default.jpg" ELSE CONCAT("Uploads/Avatar/",a.path) end as path,f.field_data as info')->join(C('DB_PREFIX').'avatar a ON m.uid=a.uid','LEFT')->join('(select * from '.C('DB_PREFIX').'field where field_id=3) f ON m.uid=f.uid','LEFT')->where($map)->select();
        
        if (!$data||!$data[0]) {
            $this->apiError('404', '该记录不存在！');
        }    
        
        $teacher = $data[0];
        $teacher['path'] = $_SERVER['SERVER_PORT'] == 443 ? "https://" : "http://" . $_SERVER['HTTP_HOST'].'/'.$teacher['path']; */

        if(empty($id)||$id===0){
            $this->apiError('404', '该记录不存在！');
        }
        
        //老师课程
        $hotmap['status'] = 1;
        $hotmap['teacherid'] = $id;
        $hotdata = D("Live/Live")->where($hotmap)->order('view desc, id desc')->page($p,$r)->select();
        $totalCount = D("Live/Live")->where($hotmap)->count();
        
        $ret['data'] = $hotdata;
        $ret['count'] = $totalCount;        
        
        $this->apiSuccess('获取详细内容成功', null, $ret);
    }
}