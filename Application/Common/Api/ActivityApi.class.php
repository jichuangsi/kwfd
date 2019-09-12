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
    
    public static function lists($url, $orgId){
        
        $activity = self::getActivityFromMaster($url, $orgId);
        
        return $activity;
    }

    private static function getActivityFromMaster($url, $orgId){
        if(empty($url)||empty($orgId)) return NULL;
        
        $arr = json_decode(file_get_contents($url.$orgId),true);
        
        /* if(!$arr){
            $arr["errorCode"] = "1";
            $arr["data"][0] = array("id"=>1,"name"=>"测试活动1","activityrule"=>"p:1;d:0.3","description"=>"");
            $arr["data"][1] = array("id"=>2,"name"=>"测试活动2","activityrule"=>"d:0.3","description"=>"");                
        } */
        
        if($arr['data']&&is_array($arr['data'])&&count($arr['data'])>0){
            return $arr['data'];
        }        
        
        return NULL;
    }

}