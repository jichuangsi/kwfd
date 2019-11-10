<?php

/**
 * @author: 
 */

/**
 * 参数数量任意，返回第一个非空参数
 * @return mixed|null
 */
function alt() {
    for($i = 0 ; $i < func_num_args(); $i++) {
        $arg = func_get_arg($i);
        if($arg) {
            return $arg;
        }
    }
    return null;
}

function array_gets($array, $fields) {
    $result = array();
    foreach($fields as $e) {
        if(array_key_exists($e, $array)) {
            $result[$e] = $array[$e];
        }
    }
    return $result;
}

function saveMobileInSession($mobile) {
    session_start();
    session('send_sms', array('mobile'=>$mobile));
}

function getMobileFromSession() {
    return session('send_sms.mobile');
}

function ordersn(){
    $yCode = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J');
    $orderSn = $yCode[((intval(date('Y')) - 2011)%10)] . strtoupper(dechex(date('m'))) . date('d') . substr(time(), -5) . substr(microtime(), 2, 5) . sprintf('%04d%02d', rand(1000, 9999),rand(0,99));
    return $orderSn;
}