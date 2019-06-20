<?php
/**
 * PHPExcel
 *
 * Copyright (c) 2006 - 2014 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt    LGPL
 * @version    1.8.0, 2014-03-02
 */


/**
 * PHPExcel
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class Alipay
{
	/**
     * 买卖安全校验码
     *
     * @access public
     * @var string
     */
    public $key;
    
    /**
     * 央求参数配置，支付宝接口文档中所需的参数
     *
     * @access public
     * @var array
     */
    public $alipay_config=array();
    
    /**
     * HTTPS证书，用于cURL
     * 默许和本类文件同级目录的cacert.pem文件
     *
     * @access public
     * @var string
     */
    public $credential;
    
    public $notify_data = null;
    
    /**
     * 支付宝即时到账网关地址
     */
    const ALIPAY_GATEWAY = 'https://mapi.alipay.com/gateway.do?';
    
    /**
     * HTTPS方式音讯验证地址
     */
    const HTTPS_VERIFY_URL = 'https://mapi.alipay.com/gateway.do?service=notify_verify&';
    
    /**
     * HTTP方式音讯验证地址
     */
    const HTTP_VERIFY_URL = 'http://notify.alipay.com/trade/notify_query.do?';
    
    /**
     * 移动网页支付网关
     * @var string
     */
    const ALIPAY_PAGE_GATEWAY = 'http://wappaygw.alipay.com/service/rest.htm?';
    
	
    
    /**
     * 创立支付包即时到账央求url
     *
     * @access public
     * @return void
     */
    public function buildRequest() {
        $this->alipay_config['sign'] = $this->signData();
        return self::ALIPAY_GATEWAY . $this->createQueryString('', true);       
    }
    
    /**
     * 创立支付宝手机网页支付链接
     * @return string
     */
    public function buildPageUrl()
    {
        $this->alipay_config['sign'] = $this->signData();
        $url = self::ALIPAY_PAGE_GATEWAY. $this->createQueryString('');
        
        $response = $this->getHttpResponseGET($url);
        $res = $this->parseResponse(trim($response));
        //重新组合支付央求参数
        $this->alipay_config['service'] = 'alipay.wap.auth.authAndExecute';
        $this->alipay_config['req_data'] = '<auth_and_execute_req><request_token>'.$res['request_token'].'</request_token></auth_and_execute_req>';
        
        $this->alipay_config['sign'] = $this->signData();
        return self::ALIPAY_PAGE_GATEWAY. $this->createQueryString('', true);
    }
    
    /**
     * 验证支付宝异步通知参数合法性
     *
     * @access public
     * @return boolean
     */
    public function verifyNotify() {
        $param_tmp = $this->filter(); //过滤待签名数据
        if(!isset($this->alipay_config['notify_data'])) {
            return false;
        }
        $this->notify_data = $this->xmlToArray($this->alipay_config['notify_data']);
        $this->alipay_config['notify_id'] = $this->notify_data['notify_id'];
        $responseTxt = 'true';
        if( !empty( $this->alipay_config['notify_id'] ) ) {
            $responseTxt = $this->getResponse();
        }
        unset($this->alipay_config['notify_id']);
        $txt = 'service=';
        $txt .= $this->alipay_config['service'];
        $txt .= '&v='.$this->alipay_config['v'];
        $txt .= '&sec_id='.$this->alipay_config['sec_id'];
        $txt .= '¬ify_data='.$this->alipay_config['notify_data'];
        $txt .= $this->key;     
        $sign = md5($txt);
 
        if ( preg_match("/true$/i",$responseTxt) && ($sign == $this->alipay_config['sign']) ) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * 解析授权接口前往
     * @param string $content 授权接口前往的文本数据
     * @throws \Exception
     * @return array
     */
    private function parseResponse($content) {
        parse_str($content, $arr);
        $data = isset($arr['res_data']) ? $arr['res_data'] : $arr['res_error'];
        $res_data = simplexml_load_string($data);
        if(strlen($res_data->request_token) == 0 || strlen($res_data->msg) > 0) {
            throw new \Exception('code:'.$res_data->code.','.$res_data->msg);
        }
        $arr['request_token'] = $res_data->request_token->__toString();
        return $arr;
    }
    
    /**
     * simpleXML对象转成数组
     * @param string $xml
     * @return multitype:NULL
     */
    private function xmlToArray($xml)
    {
        $xml_obj = simplexml_load_string($xml, 'SimpleXMLIterator');
        $arr = array();
        $xml_obj->rewind(); //指针指向第一个元素
        while (1) {
            if( ! is_object($xml_obj->current()) )
            {
                break;
            }
            $arr[$xml_obj->key()] = $xml_obj->current()->__toString();
            $xml_obj->next(); //指向下一个元素
        }
        return $arr;
    }
    
    /**
     * 签名数据
     * 签名规则:
     *     sign和sign_type不参加签名，需求去掉
     *     对参数数组依据键名按照字母顺序升序排序
     *     排序完成之后键值对用&字符衔接，组成URL的查询字符串方式待签名字符串，待签名数据不需用url encoding
     *     MD5签名：私钥拼接到待签名字符串的前面，然后用md5对字符串运算，失掉32位签名结果
     *    
     * @return string 已签名数据
     */
    private function signData() {
        $param_tmp = $this->getSignString(); //待签名字符串
        
        if( !isset($this->key) ) {
            return FALSE;
        }
        
        $sign = '';
        
        //签名数据
        switch ($this->alipay_config['sec_id']) {
            case '001': //rsa
                $sign = $this->rsaSign($param_tmp);
                break;
            case 'DES':
                break;
            default:
                $sign = $this->md5Sign($param_tmp);
        }
        
        return $sign;
    }
    
    /**
     * MD5加密字符串
     *
     * @access private
     * @param string $data 待加密字符串
     * @return string
     */
    private function md5Sign( $data ) {
        return md5($data . $this->key);
    }
    
    /**
     * RSA 加密字符串
     *
     * @param string $data 待加密字符串
     * @return string
     */
    private function rsaSign( $data ) {
        return false;
    }
    
    /**
     * 取得待签名数据
     *
     * @access private
     * @return string
     */
    private function getSignString() {
        $param_tmp = $this->filter(); //过滤待签名数据
        
        //排序
        ksort($param_tmp);
        reset($param_tmp);
        
        //创立查询字符串方式的待签名数据
        return $this->createQueryString($param_tmp);
    }
    
    /**
     * 过滤待签名数据，去掉sing、sing_type及空值
     *
     * @access private
     * @return array
     */
    private function filter() {
        $para_filter = array();
        foreach($this->alipay_config as $key => $value){
            if($key == "sign" || $key == "sign_type" || empty($value)) continue;
            else $para_filter[$key] = $value;
        }
        return $para_filter;
    }
    
    /**
     * 用&拼接字符串,构成URL查询字符串
     *
     * @access private
     * @param array $data
     * @param boolean $is_encode 能否对值做urlencode
     * @return string
     */
    private function createQueryString($data=NULL, $is_encode=false ) {
        $arr = empty($data) ? $this->alipay_config : $data;
        $arg = '';
        foreach( $arr as $key => $value ) {
            if($is_encode) {
                $key = urlencode($key);
                $value = urlencode($value);
            }
            $arg .= $key . '=' . $value . '&';
        }
        $arg = substr($arg, 0, strlen($arg)-1); //去掉最后一个&
        //假设存在本义字符，那么去掉本义
        if(get_magic_quotes_gpc()) {$arg = stripslashes($arg);}
        
        return $arg;
    }
    
    /**
     * 获取远程效劳器ATN结果,验证前往URL
     *
     * 验证结果集：
     * invalid命令参数不对 出现这个错误，请检测前往处置中partner和key能否为空
     * true 前往正确信息
     * false 请反省防火墙或许是效劳器阻止端口效果以及验证时间能否超过一分钟
     *
     * @access private
     * @return 效劳器ATN结果
     */
    private function getResponse() {
        //载入支付配置
        $config = $alipayConfig;
        
        $transport = strtolower(trim($config['transport']));
        $partner = trim($config['partner']);
        $veryfy_url = '';
        if($transport == 'https') {
            $veryfy_url = self::HTTPS_VERIFY_URL;
        }
        else {
            $veryfy_url = self::HTTP_VERIFY_URL;
        }
        $veryfy_url = $veryfy_url."partner=" . $partner . "¬ify_id=" . $this->alipay_config['notify_id'];
        $responseTxt = $this->getHttpResponseGET($veryfy_url);
    
        return $responseTxt;
    }
    
    /**
     * 取证书，用于cURL的央求
     *
     * @access private
     * @return string 证书途径
     */
    private function getCr() {
        if( ! empty($this->credential) ) {
            return $this->credential;
        }
        return __DIR__ . DIRECTORY_SEPARATOR .'cacert.pem';
    }
    
    /**
     * 远程获取数据，POST形式
     * 留意：
     * 1.运用Crul需求修正效劳器中php.ini文件的设置，找到php_curl.dll去掉前面的";"就行了
     * 2.文件夹中cacert.pem是SSL证书请保证其途径有效，目前默许途径是：getcwd().'\\cacert.pem'
     *
     * @param $url 指定URL残缺途径地址
     * @param $cacert_url 指定以后任务目录相对途径
     * @param $para 央求的数据
     * @param $input_charset 编码格式。默许值：空值
     * return 远程输入的数据
     */
    private function getHttpResponsePOST($url, $para, $input_charset = '') {
    
        if (trim($input_charset) != '') {
            $url = $url."_input_charset=".$input_charset;
        }
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);//SSL证书认证
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);//严厉认证
        curl_setopt($curl, CURLOPT_CAINFO,$this->getCr());//证书地址
        curl_setopt($curl, CURLOPT_HEADER, 0 ); // 过滤HTTP头
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);// 显示输入结果
        curl_setopt($curl, CURLOPT_POST,true); // post传输数据
        curl_setopt($curl, CURLOPT_POSTFIELDS,$para);// post传输数据
        $responseText = curl_exec($curl);
        //var_dump( curl_error($curl) );//假设执行curl进程中出现异常，可翻开此开关，以便查看异常内容
        curl_close($curl);
    
        return $responseText;
    }
    
    /**
     * 远程获取数据，GET形式
     * 留意：
     * 1.运用Crul需求修正效劳器中php.ini文件的设置，找到php_curl.dll去掉前面的";"就行了
     * 2.文件夹中cacert.pem是SSL证书请保证其途径有效，目前默许途径是：getcwd().'\\cacert.pem'
     *
     * @param $url 指定URL残缺途径地址
     * @param $cacert_url 指定以后任务目录相对途径
     * return 远程输入的数据
     */
    private function getHttpResponseGET($url) {
        
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, 0 ); // 过滤HTTP头
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);// 显示输入结果
//        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);//SSL证书认证
//        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);//严厉认证
//        curl_setopt($curl, CURLOPT_CAINFO,$this->getCr());//证书地址
        $responseText = curl_exec($curl);
        //var_dump( curl_error($curl) );exit;//假设执行curl进程中出现异常，可翻开此开关，以便查看异常内容
        curl_close($curl);
    
        return $responseText;
    }

}