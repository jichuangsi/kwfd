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
class CurlRequestApi {
    
    public static function post($url = '', $post_data = array()){
        
        $result = self::request($url, $post_data, 'POST');
        
        return $result;
    }
    
    public static function get($url = '', $get_data = array()){
        
        $result = self::request($url, $get_data, 'GET');
        
        return $result;
    }

    private static function request($url = '', $data = array(), $method = 'GET', $second = 30) {
        if (empty($url)) {
            return false;
        }
        
        $ch = curl_init();//初始化curl
        /* $headers = [
            'form-data' => ['Content-Type: multipart/form-data'],
            'json'      => ['Content-Type: application/json'],
        ]; */
        
        
        if($method == 'GET'){
            if($data){
                $querystring = http_build_query($data);
                $url = $url.'?'.$querystring;
            }
        }
        //dump($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, $second);//设置超时
        curl_setopt($ch, CURLOPT_URL, $url);//抓取指定网页
        //curl_setopt($ch, CURLOPT_HTTPHEADER,$headers[$type]);        
        curl_setopt($ch, CURLOPT_HEADER, FALSE);//设置header
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);//要求结果为字符串且输出到屏幕上
        
        if($method == 'POST'){
            $post_data = "p=" . urlencode(json_encode($data));
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST,'POST');     // 请求方式
            curl_setopt($ch, CURLOPT_POST, TRUE);//post提交方式
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        }
        
        $data = curl_exec($ch);//运行curl
        
        //返回结果
        if($data){
            curl_close($ch);
            return $data;
        } else {
            $error = curl_error($ch);
            //$error = curl_errno($ch);
            curl_close($ch);
            return $error;
        }        
    }
}