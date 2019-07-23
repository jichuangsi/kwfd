<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 蒲公英在线教学 <2014058008@qq.com> <http://www.zaixianjiaoxue.net>
// +----------------------------------------------------------------------

namespace User\Api;
use User\Api\Api;
//use User\Model\UcenterMemberModel;

define('UC_USER_CHECK_USERNAME_FAILED', -1);
define('UC_USER_USERNAME_BADWORD', -2);
define('UC_USER_USERNAME_EXISTS', -3);
define('UC_USER_EMAIL_FORMAT_ILLEGAL', -4);
define('UC_USER_EMAIL_ACCESS_ILLEGAL', -5);
define('UC_USER_EMAIL_EXISTS', -6);

class UserRemoteApi extends Api{
    /**
     * 构造方法，实例化操作模型
     */
    protected function _init(){
        
    }

    /**
     * 注册一个新用户
     * @param  string $username 用户名
     * @param  string $password 用户密码
     * @param  string $email    用户邮箱
     * @param  string $mobile   用户手机号码
     * @return integer          注册成功-用户信息，注册失败-错误编号
     */
    public function register($username,$nickname,$password, $email){        
        /* 添加用户 */
        $uid = uc_user_register($username,$password, $email); 
        if($uid>0){
            $result = D('Home/Member')->registerMember($nickname,$uid);
            return $result ? $result : 0; //0-未知错误，大于0-注册成功
        } else {
            switch($uid){
                case UC_USER_CHECK_USERNAME_FAILED: $errno = -1; break;
                case UC_USER_USERNAME_BADWORD: $errno = -2; break;
                case UC_USER_USERNAME_EXISTS: $errno = -3; break;
                case UC_USER_EMAIL_FORMAT_ILLEGAL: $errno = -5; break;
                case UC_USER_EMAIL_ACCESS_ILLEGAL: $errno = -7; break;
                case UC_USER_EMAIL_EXISTS: $errno = -8; break;
            }
            return $errno;
        }
    }

    /**
     * 用户登录认证
     * @param  string  $username 用户名
     * @param  string  $password 用户密码
     * @param  integer $type     用户名类型 （1-用户名，2-邮箱，3-手机，4-UID）
     * @return integer           登录成功-用户ID，登录失败-错误编号
     */
    public function login($username, $password, $type = 1){
        list($uid, $username, $password, $email) = uc_user_login($username, $password);
        if($uid){
            if($uid>0){
                $uc = array($uid,$username,$email);
                session('user_center', $uc);
                self::execSyncLoginScrpt(uc_user_synlogin($uid));
                return $uid;
            }else{
                return $uid;
            }            
        }
        return 0;
    }

    /**
     * 获取用户信息
     * @param  string  $uid         用户ID或用户名
     * @param  boolean $is_username 是否使用用户名查询
     * @return array                用户信息
     */
    public function info($uid, $isuid = true){        
        return uc_get_user($uid, $isuid);
    }

    /**
     * 检测用户名
     * @param  string  $field  用户名
     * @return integer         错误编号
     */
    public function checkUsername($username){
        return uc_user_checkname($username);
    }

    /**
     * 检测邮箱
     * @param  string  $email  邮箱
     * @return integer         错误编号
     */
    public function checkEmail($email){
        return uc_user_checkemail($email);
    }

    /**
     * 检测手机
     * @param  string  $mobile  手机
     * @return integer         错误编号
     */
    public function checkMobile($mobile){
        
    }

    /**
     * 更新用户信息
     * @param int $uid 用户id
     * @param string $password 密码，用来验证
     * @param array $data 修改的字段数组
     * @return true 修改成功，false 修改失败
     * 
     */
    public function updateInfo($uid, $password, $data){
        $info = uc_get_user($uid, true);
        if($info&&$info[1]){
            $rs = uc_user_edit($info[1],$password,$data['password']);
            if($rs>0){
                $return['status'] = true;
                $result['info'] = '密码修改成功';
            }else if($rs==0){
                $return['status'] = false;
                $result['info'] = '密码未修改。';
            }else{
                $return['status'] = false;
                $result['info'] = '密码修改失败';
            }
        }else{
            $return['status'] = false;
            $return['info'] = '用户不存在';
        }
        return $return;
    }
    
    public static function execSyncLoginScrpt($ucsynlogin){
        if (preg_match_all('/"http(.+?)"/', $ucsynlogin, $matches)) {
            foreach ($matches[0] as $k=>$val){
                $v=str_replace('"','',$val);
                if(!empty($v)&&substr_count($v, $_SERVER['HTTP_HOST'])==0){
                    file_get_contents($v);
                }
            }
        }
    }
}
