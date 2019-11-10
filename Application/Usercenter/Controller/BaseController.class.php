<?php
/**
 * Created by PhpStorm.
 * User: 
 * Date: 14-3-11
 * Time: PM3:40
 */

namespace Usercenter\Controller;

use Think\Controller;

class BaseController extends Controller
{
    public function _initialize()
    {
        /* $uid = intval($_REQUEST['uid']) ? intval($_REQUEST['uid']) : is_login();
        if (!$uid) {
            $this->error('需要登录');
        }
        $this->assign('uid', $uid);
        $this->mid = is_login(); */
        if (!is_login()) {
            $this->error('请登陆后再访问本页面。');
        }
        $this->assign('uid', get_uid());
        /* 读取站点配置 */
        $config =   S('DB_CONFIG_DATA');
        if(!$config){
            $config =   api('Config/lists');
            S('DB_CONFIG_DATA',$config);
        }
        C($config); //添加配置
    }

    protected function defaultTabHash($tabHash)
    {
        $tabHash = op_t($_REQUEST['tabHash']) ?  op_t($_REQUEST['tabHash']): $tabHash;
        $this->assign('tabHash', $tabHash);
    }

    protected function getCall($uid)
    {
        if ($uid == is_login()) {
            return '我';
        } else {
            $apiProfile = callApi('User/getProfile', array($uid));
            return $apiProfile['sex'] == 'm' ? '他' : '她';
        }
    }

    protected function ensureApiSuccess($result)
    {
        if (!$result['success']) {
            $this->error($result['message'], $result['url']);
        }
    }

    protected function requireLogin()
    {
        if (!is_login()) {
            $this->error('必须登录才能操作');
        }
    }
}