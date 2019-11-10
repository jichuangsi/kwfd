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
class ConfigApi {
    /**
     * 获取数据库中的配置列表
     * @return array 配置数组
     */
    public static function lists(){
        $map    = array('status' => 1);
        $data   = M('Config')->where($map)->field('type,name,value')->select();        
        
        $config = array();
        if($data && is_array($data)){
            foreach ($data as $value) {
                $config[$value['name']] = self::parse($value['type'], $value['value']);
            }
        }        
        
        self::getConfigFromMaster($config);
        
        return $config;
    }

    private static function getConfigFromMaster(&$config){
        if(empty($config['MASTER_API_CONFIG'])) return;
        
        $arr = json_decode(file_get_contents($config['MASTER_API_CONFIG'].$_SERVER['HTTP_HOST']),true);
        
        if($arr['data']&&is_array($arr['data'])){
            foreach($arr['data'] as $k => $v){
                if($v['c_key']){//支付配置
                    switch ($v['c_key']){
                        case 'wap_ali_id'://wap版支付宝接口收款帐号
                            //$config['_CONFIG_ALIPAY_APPID'] = $v['c_value'];
                            break;
                        case 'wap_ali_partner'://wap版支付宝接口合作者身份
                            $config['_CONFIG_ALIPAY_APPID'] = $v['c_value'];
                            break;
                        case 'wap_ali_private_keys'://小B支付宝接口私钥
                            $config['_CONFIG_ALIPAY_PRIVATE_KEY'] = $v['c_value'];
                            break;
                        case 'wap_ali_public_keys'://小B支付宝接口公钥
                            $config['_CONFIG_ALIPAY_PUBLIC_KEY'] = $v['c_value'];
                            break;
                        case 'weixin_appid'://中台微信公众号AppID（应用ID）
                            $config['_CONFIG_WXPAY_APPID'] = $v['c_value'];
                            break;
                        case 'weixin_appsecret'://中台微信公众号AppSecret（应用密钥）
                            $config['_CONFIG_WXPAY_APPSECRET'] = $v['c_value'];
                            break;
                        case 'weixin_payid'://中台微信支付接口MCHID（商户号）
                            $config['_CONFIG_WXPAY_MCHID'] = $v['c_value'];
                            break;
                        case 'weixin_paykey'://中台微信支付接口KEY（商户API密钥）
                            $config['_CONFIG_WXPAY_KEY'] = $v['c_value'];
                            break;
                    }
                }else{//其他配置                    
                    if($v['appid']){//声网直播appid
                        $config['_CONFIG_MEETINGWEB_APP_ID'] = $v['appid'];
                    }
                    if($v['zhibourl']){//直播地址
                        $config['_CONFIG_MEETINGWEB_URL'] = $v['zhibourl'];
                    }
                    if($v['platetoken']){//netless白板token
                        $config['_CONFIG_MEETINGWEB_WB_TOKEN'] = $v['platetoken'];
                    }
                    if($v['wxapp_appid']){//微信小程序appid
                        $config['WECHAT_APPLET_APPID'] = $v['wxapp_appid'];
                    }
                    if($v['wxapp_appsecret']){//微信小程序secret
                        $config['WECHAT_APPLET_SECRET'] = $v['wxapp_appsecret'];
                    }
                    if($v['merchant_id']){//微信小程序secret
                        $config['WECHAT_APPLET_MCHID'] = $v['merchant_id'];
                    }
                    if($v['merchant_key']){//微信小程序secret
                        $config['WECHAT_APPLET_KEY'] = $v['merchant_key'];
                    }
                    if($v['id']){//机构所在中台id
                        $config['ORG_ID'] = $v['id'];
                    }
                    if($v['title']){//机构所在中台名字
                        $config['ORG_NAME'] = $v['title'];
                    }
                }
            }
            
            if(!empty($config['_CONFIG_ALIPAY_APPID'])&&!empty($config['_CONFIG_ALIPAY_PRIVATE_KEY'])&&!empty($config['_CONFIG_ALIPAY_PUBLIC_KEY'])){
                $config['_CONFIG_ALIPAY_STATUS'] = 1;
            }else{
                $config['_CONFIG_ALIPAY_STATUS'] = 0;
            }
            if(!empty($config['_CONFIG_WXPAY_APPID'])&&!empty($config['_CONFIG_WXPAY_MCHID'])&&!empty($config['_CONFIG_WXPAY_KEY'])){
                $config['_CONFIG_WXPAY_STATUS'] = 1;
            }else{
                $config['_CONFIG_WXPAY_STATUS'] = 0;
            }
        }
    }
    
    /**
     * 根据配置类型解析配置
     * @param  integer $type  配置类型
     * @param  string  $value 配置值
     */
    private static function parse($type, $value){
        switch ($type) {
            case 3: //解析数组
                $array = preg_split('/[,;\r\n]+/', trim($value, ",;\r\n"));
                if(strpos($value,':')){
                    $value  = array();
                    foreach ($array as $val) {
                        list($k, $v) = explode(':', $val);
                        $value[$k]   = $v;
                    }
                }else{
                    $value =    $array;
                }
                break;
        }
        return $value;
    }	
}