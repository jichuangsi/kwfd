<?php
/**
 * Created by PhpStorm.
 * User: 
 * Date: 1/15/14
 * Time: 4:17 PM
 */
namespace Api\Controller;

header('Access-Control-Allow-Origin:*');

class AboutusController extends ApiController
{
    protected $_model="Aboutus";
    protected $datamodel;
    
    public function _initialize()
    {
        $this->datamodel = D($this->_model.'/'.$this->_model);
        parent::_initialize();
    }
   
    public function categoryQuery(){
        
        $lists = $this->datamodel->field('id')->order('sort asc')->select();
        $ret = array();
        if($lists&&is_array($lists)){
            foreach($lists as $k => $v){
                array_push($ret, $v['id']);
            }
        }else if($lists&&is_string($lists)){
            array_push($ret, $lists);
        }
        $this->apiSuccess('获取分类列表成功', null, array('data'=>$ret));
    }
    
    public function detailQuery($id = ''){
        $map = array();
        if(!empty($id)){
            $map['id'] = $id;
        }
        $map['status']=1;
        $lists = $this->datamodel->field('id, title, content')->where($map)->order('sort asc')->limit(1)->select();
        //print_r($lists);
        if($lists[0]['content']&&!empty($lists[0]['content'])){
            $lists[0]['content'] = $this->replace_img($lists[0]['content']);
        }
        $this->apiSuccess('获取详细内容成功', null, array('data'=>$lists));
    }
}