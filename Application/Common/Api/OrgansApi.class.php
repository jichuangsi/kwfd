<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

namespace Common\Api;
class OrgansApi {
    
    public static function categoryLists($url){
        
        $orgCategory = self::getOrgansCategoryFromMaster($url);
        
        return $orgCategory;
    }

    private static function getOrgansCategoryFromMaster($url){
        if(empty($url)) return NULL;
        
        $arr = json_decode(file_get_contents($url),true);
        
        //dump($arr);
        
        $ret = array();
        
        if($arr&&$arr['errorCode']=="1"&&$arr['data']&&count($arr['data'])>0){
            self::iterateOrgansCategory($arr['data'], $ret, 0);
        }        
        //print_r($ret);
        /* if(!$arr){
            $arr["errorCode"] = "1";
            $arr["data"][0] = array("id"=>1,"name"=>"测试机构分类1");
            $arr["data"][1] = array("id"=>2,"name"=>"测试机构分类2");                
        } */
        
        if($ret&&count($ret)>0){
            return $ret;
        }        
        
        return NULL;
    }
    
    private static function iterateOrgansCategory(&$data, &$ret, $level){        
        foreach($data as $k => $v){            
            if(!$v[data]||count($v[data])==0){
                array_push($ret, array("id"=>$v['id'],"name"=>self::formatOrganName($v['name'], $level), "level"=>$level));
            }else{
                if(!empty($v['id'])&&!empty($v['name'])){
                    array_push($ret, array("id"=>$v['id'],"name"=>self::formatOrganName($v['name'], $level), "level"=>$level));
                }
                self::iterateOrgansCategory($v[data], $ret, $level+1);
            }
        }        
    }
    
    private static function formatOrganName($name, $level){
        if($level==0) return $name;
        
        $prefix = "┣";
        for($i = 0; $i<$level; $i++){
            $prefix .= '━';
        }
        
        return $prefix.$name;
    }

}