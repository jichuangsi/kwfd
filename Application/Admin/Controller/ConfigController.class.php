<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 蒲公英在线教学 <2014058008@qq.com> <http://www.zaixianjiaoxue.net>
// +----------------------------------------------------------------------

namespace Admin\Controller;
use Admin\Builder\AdminConfigBuilderNew;
/**
 * 后台配置控制器
 * 
 */
class ConfigController extends AdminController {

    /**
     * 配置管理
     * 
     */
    public function index(){
        /* 查询条件初始化 */
        $map = array();
        $map  = array('status' => 1);
        if(isset($_GET['group'])){
            $map['group']   =   I('group',0);
        }
        if(isset($_GET['name'])){
            $map['name']    =   array('like', '%'.(string)I('name').'%');
        }

        $list = $this->lists('Config', $map,'sort,id');
        // 记录当前列表页的cookie
        Cookie('__forward__',$_SERVER['REQUEST_URI']);

        $this->assign('group',C('CONFIG_GROUP_LIST'));
        $this->assign('group_id',I('get.group',0));
        $this->assign('list', $list);
        $this->meta_title = '配置管理';
        $this->display();
    }

    /**
     * 新增配置
     * 
     */
    public function add(){
        if(IS_POST){
            $Config = D('Config');
            $data = $Config->create();
            if($data){
                if($Config->add()){
                    S('DB_CONFIG_DATA',null);
                    $this->success('新增成功', U('index'));
                } else {
                    $this->error('新增失败');
                }
            } else {
                $this->error($Config->getError());
            }
        } else {
            $this->meta_title = '新增配置';
            $this->assign('info',null);
            $this->display('edit');
        }
    }

    /**
     * 编辑配置
     * 
     */
    public function edit($id = 0){
        if(IS_POST){
            $Config = D('Config');
            $data = $Config->create();
            if($data){
                if($Config->save()){
                    S('DB_CONFIG_DATA',null);
                    //记录行为
                    action_log('update_config','config',$data['id'],UID);
                    $this->success('更新成功', Cookie('__forward__'));
                } else {
                    $this->error('更新失败');
                }
            } else {
                $this->error($Config->getError());
            }
        } else {
            $info = array();
            /* 获取数据 */
            $info = M('Config')->field(true)->find($id);

            if(false === $info){
                $this->error('获取配置信息错误');
            }
            $this->assign('info', $info);
            $this->meta_title = '编辑配置';
            $this->display();
        }
    }

    /**
     * 批量保存配置
     * 
     */
    public function save($config){
        if($config && is_array($config)){
            $Config = M('Config');
            foreach ($config as $name => $value) {
                $map = array('name' => $name);
                $Config->where($map)->setField('value', $value);
            }
        }
        S('DB_CONFIG_DATA',null);
        $this->success('保存成功！');
    }

    /**
     * 删除配置
     * 
     */
    public function del(){
        $id = array_unique((array)I('id',0));

        if ( empty($id) ) {
            $this->error('请选择要操作的数据!');
        }

        $map = array('id' => array('in', $id) );
        if(M('Config')->where($map)->delete()){
            S('DB_CONFIG_DATA',null);
            //记录行为
            action_log('update_config','config',$id,UID);
            $this->success('删除成功');
        } else {
            $this->error('删除失败！');
        }
    }

    // 获取某个标签的配置参数
    public function group() {
        $id     =   I('get.id',1);
        $type   =   C('CONFIG_GROUP_LIST');
        $list   =   M("Config")->where(array('status'=>1,'group'=>$id))->field('id,name,title,extra,value,remark,type')->order('sort')->select();
        if($list) {
            $this->assign('list',$list);
        }
        $this->assign('id',$id);
        $this->meta_title = $type[$id].'设置';
        $this->display();
    }

    /**
     * 配置排序
     * 
     */
    public function sort(){
        if(IS_GET){
            $ids = I('get.ids');

            //获取排序的数据
            $map = array('status'=>array('gt',-1));
            if(!empty($ids)){
                $map['id'] = array('in',$ids);
            }elseif(I('group')){
                $map['group']	=	I('group');
            }
            $list = M('Config')->where($map)->field('id,title')->order('sort asc,id asc')->select();

            $this->assign('list', $list);
            $this->meta_title = '配置排序';
            $this->display();
        }elseif (IS_POST){
            $ids = I('post.ids');
            $ids = explode(',', $ids);
            foreach ($ids as $key=>$value){
                $res = M('Config')->where(array('id'=>$value))->setField('sort', $key+1);
            }
            if($res !== false){
                $this->success('排序成功！',Cookie('__forward__'));
            }else{
                $this->eorror('排序失败！');
            }
        }else{
            $this->error('非法请求！');
        }
    }

    /**网站信息设置
     * @auth 陈一枭
     */
    public function website()
    {
        $http_type = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https://' : 'http://';
        //echo $http_type . $_SERVER['HTTP_HOST'].U('/').'Home/Index/downloadapp.html';
 
        $builder = new AdminConfigBuilderNew();
	 
        $data = $builder->handleConfig();
        $builder->title(L('_SITE_INFO_'))->suggest(L('_SITE_INFO_VICE_'));
        /*        $builder->keySelect('LANG', L('_WEBSITE_LANGUAGE_'), L('_SELECT_THE_DEFAULT_LANGUAGE_'), array('zh-cn' => L('_SIMPLIFIED_CHINESE_'), 'en-us' => L('_ENGLISH_')));*/
        $builder->keyText('WEB_SITE_NAME', "网站名称", "");
		$builder->keyTextArea('WEB_SITE_DESCRIPTION', "网站描述", "");
		$builder->keyText('WEB_SITE_KEYWORD', "网站关键字","多个关键字都好隔开");

        $builder->keySingleImage('LOGO', L('_SITE_LOGO_'), 'logo将等比缩放显示 默认高度100 宽度不限制');
        $builder->keySingleImage('QRCODE_BOTTOM', '底部二维码', '设置在网站底部显示的二维码，建议尺寸120*120');
        //$builder->keyMultiImage('QRCODE', L('_QR_WEIXIN_'), L('_QR_WEIXIN_VICE_'));

		
        //$builder->keySingleImage('APP_DOWNLOAD_QRCODE', 'App扫码下载地址', '请拷贝地址 '.$http_type . $_SERVER['HTTP_HOST'].U('/').'Home/Index/downloadapp.html 生成二维码然后上传');
        $builder->keySingleImage('APP_DOWNLOAD_QRCODE', 'App扫码下载地址', '请上传微信小程序二维码');
        $builder->keySingleImage('WEBSITE_QRCODE', '网址二维码', '请拷贝地址 '.$http_type . $_SERVER['HTTP_HOST'].' 生成二维码然后上传');
		
		//$builder->keySingleImage('APP_ANDROID_QRCODE', '安卓二维码', '安卓app扫码下载');
		//$builder->keySingleFile('APP_ANDROID_URL', "安卓下载地址", '安卓app地址');
		//$builder->keySingleImage('APP_IOS_QRCODE', '苹果二维码', '苹果app扫码下载');
		//$builder->keySingleFile('APP_IOS_URL', "苹果下载地址", '苹果app地址');
		
        $builder->group(L('_BASIC_INFORMATION_'), array('WEB_SITE_NAME','LOGO', 'WEB_SITE_DESCRIPTION', 'WEB_SITE_KEYWORD','APP_DOWNLOAD_QRCODE', 'WEBSITE_QRCODE'));
 


        $builder->keyMiniEditor('ABOUT_US', L('_CONTENT_ABOUT_US_'), L('_CONTENT_ABOUT_US_VICE_'),['height'=>'200px']);
        $builder->keyMiniEditor('COPY_RIGHT', '网页底部', '页脚内容',['height'=>'200px']);
 
        $builder->group(L('_THE_FOOTER_INFORMATION_'), array('COPY_RIGHT'));
 
        $status=array('0'=>'禁用','1'=>'启用');
        $builder->keySelect('ALIPAY_STATUS',"支付宝 状态","",$status);
        $builder->keyText('ALIPAY_APPID', "支付宝 APPID", "");
        $builder->keyText('ALIPAY_PRIVATE_KEY', "支付宝 商户私钥", "");
        $builder->keyText('ALIPAY_PUBLIC_KEY', "支付宝 公钥");
		
		$builder->keySelect('WXPAY_STATUS',"微信支付 状态","",$status);
		$builder->keyText('WXPAY_APPID', "微信支付 商户APPID", "");
        $builder->keyText('WXPAY_MCHID', "微信支付 商户号", "");
        $builder->keyText('WXPAY_KEY', "微信支付 商户支付密钥", "");
		$builder->keyText('WXPAY_APPSECRET', "微信支付 微信公众帐号secert", "");
		
		//$builder->group("支付配置", array('ALIPAY_STATUS','ALIPAY_APPID', 'ALIPAY_PRIVATE_KEY', 'ALIPAY_PUBLIC_KEY', 'WXPAY_STATUS','WXPAY_APPID', 'WXPAY_MCHID', 'WXPAY_KEY'));
		
		$builder->keyText('MEETINGWEB_URL', "在线课堂地址","默认地址为 https://你的网址:端口/LiveBroadcast/check.html");
		
		$builder->keyText('MEETINGWEB_APP_ID', "在线课堂第三方接口KEY","声网APPID");
		
		//$builder->group("在线课堂", array('MEETINGWEB_URL','MEETINGWEB_APP_ID'));

        //$builder->group("APP配置", array('APP_ANDROID_QRCODE', 'APP_IOS_QRCODE'));

  
        



 
        $builder->data($data);
        $builder->keyDefault('WEBSOCKET_PORT', 8000);
        $builder->keyDefault('WEBSOCKET_ADDRESS', gethostbyname($_SERVER['SERVER_NAME']));
 

        $builder->keyDefault('SUCCESS_WAIT_TIME', 2);
        $builder->keyDefault('ERROR_WAIT_TIME', 5);
        $builder->keyDefault('LANG', 'zh-cn');
        $builder->keyDefault('GET_INFORMATION',1);
        $builder->keyDefault('GET_INFORMATION_INTERNAL',10);
        $builder->keyDefault('OPEN_IM',1);

        $builder->buttonSubmit();
        $builder->display("admin_confignew");
	}		
	
}
