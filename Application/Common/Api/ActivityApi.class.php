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
class ActivityApi {
    
    public static function lists($url){
        
        $activity = self::getActivityFromMaster($url);
        
        return $activity;
    }

    private static function getActivityFromMaster($url){
        if(empty($url)) return NULL;
        
        $arr = json_decode(file_get_contents($url.$_SERVER['HTTP_HOST']),true);
        
        /* if(!$arr){
            $arr["errorCode"] = "1";
            $arr["data"][0] = array("id"=>1,"name"=>"测试活动1","rule"=>"p:1;d:0.3");
            $arr["data"][1] = array("id"=>2,"name"=>"测试活动2","rule"=>"d:0.3");                
        } */
        
        if($arr['data']&&is_array($arr['data'])&&count($arr['data'])>0){
            return $arr['data'];
        }        
        
        return NULL;
    }

}