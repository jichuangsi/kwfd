<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 蒲公英在线教学 <2014058008@qq.com> <http://www.zaixianjiaoxue.net>
// +----------------------------------------------------------------------

namespace Admin\Controller;

use Admin\Builder\AdminConfigBuilder;
use Admin\Builder\AdminListBuilder;
use Admin\Builder\AdminSortBuilder;
use Home\Model\MemberModel;
use User\Api\UserApi;
use User\Api\UserRemoteApi;
require_once('./Conf/user.php');
if(UC_REMOTE) require_once('./api/uc_client/client.php');
/**
 * 后台用户控制器
 * 
 */
class UserController extends AdminController {

    /**
     * 用户管理首页
     * 
     */
    public function index(){
        $nickname       =   I('nickname');
        $map['status']  =   array('egt',0);
        if(is_numeric($nickname)){
            $map['uid|nickname']=   array(intval($nickname),array('like','%'.$nickname.'%'),'_multi'=>true);
        }else{
            $map['nickname']    =   array('like', '%'.(string)$nickname.'%');
        }
        if(IS_ROOT){
            $map['uid']    =   array('neq', UID);
        }
        $list   = $this->lists('Member', $map);
        int_to_string($list);
        $this->assign('_list', $list);
        $this->meta_title = '用户信息';
        $this->display();
    }
	
	    /**
     * 重置用户密码
     * @author 
     */
    public function initPass()
    {
        $uids = I('id');
        !is_array($uids) && $uids = explode(',', $uids);
        foreach ($uids as $key => &$val) {
			$val+=0;
            if (!query_user('uid', $val)) {
                unset($uids[$key]);
            }
        }
        if (!count($uids)) {
            $this->error("找不到用户");
        }
		
        //$ucModel = UCenterMember();
        if(UC_REMOTE){
            foreach($uids as $k => $v){
                $info =  uc_get_user($v, true, false);
                if($info&&$info[1]&&$info[2]){
                    $res = uc_user_edit($info[1],'',UC_RESET_PW,$info[2],true);
                }
            }
        }else{
            $ucModel = D('User/UcenterMember');
            $data = $ucModel->create(array('password' => UC_RESET_PW));
            $res = $ucModel->where(array('id' => array('in', $uids)))->save(array('password' => $data['password']));
        }		
        if ($res>=0) {
            $this->success("操作成功");
        } else {
            $this->error("操作失败,密码更新失败。");
        }
		 
    }
    /**
     * 设置身份是否为老师
     * 
     */
    public function setTeacher($id=0,$val=0){
		$uid = I('get.id');
        $Member =   D('Member');
        $data['isteacher']=$val;

        $res = $Member->where(array('uid'=>$uid))->save($data);
		$AuthGroup = D('AuthGroupAccess');
        if($val)
		{
			$AuthGroup->add(array('group_id'=>5,'uid'=>$uid));
		}
		else
		{
			//为单个用户批量添加用户组时,先删除旧数据
            $AuthGroup->where(array('uid'=>$uid))->delete();
		}
        if($res){
            $this->success('设置成功！');
        }else{
            $this->error('设置失败！');
        }
    }
    /**
     * 修改昵称初始化
     * 
     */
    public function updateNickname(){
        $nickname = M('Member')->getFieldByUid(UID, 'nickname');
        $this->assign('nickname', $nickname);
        $this->meta_title = '修改昵称';
        $this->display();
    }

    /**
     * 修改昵称提交
     * 
     */
    public function submitNickname(){
        //获取参数
        $nickname = I('post.nickname');
        $password = I('post.password');
        empty($nickname) && $this->error('请输入昵称');
        empty($password) && $this->error('请输入密码');

        //密码验证
        if(UC_REMOTE){
            $User   =   new UserRemoteApi();
            $info = $User->info(UID);
            if($info&&$info[0]){
                $uid = $info[0];
            }else{
                $this->error('密码不正确');
            }          
        }else{
            $User   =   new UserApi();
            $uid    =   $User->login(UID, $password, 4);
            ($uid == -2) && $this->error('密码不正确');
        }        

        $Member =   D('Member');
        $data   =   $Member->create(array('nickname'=>$nickname));
        if(!$data){
            $this->error($Member->getError());
        }

        $res = $Member->where(array('uid'=>$uid))->save($data);

        if($res){
            $user               =   session('user_auth');
            $user['username']   =   $data['nickname'];
            session('user_auth', $user);
            session('user_auth_sign', data_auth_sign($user));
            $this->success('修改昵称成功！');
        }else{
            $this->error('修改昵称失败！');
        }
    }

    /**
     * 修改密码初始化
     * 
     */
    public function updatePassword(){
        $this->meta_title = '修改密码';
        $this->display();
    }

    /**
     * 修改密码提交
     * 
     */
    public function submitPassword(){
        //获取参数
        $password   =   I('post.old');
        empty($password) && $this->error('请输入原密码');
        $data['password'] = I('post.password');
        empty($data['password']) && $this->error('请输入新密码');
        $repassword = I('post.repassword');
        empty($repassword) && $this->error('请输入确认密码');

        if($data['password'] !== $repassword){
            $this->error('您输入的新密码与确认密码不一致');
        }
        
        if(UC_REMOTE){
            $Api    =   new UserRemoteApi();
        }else{
            $Api    =   new UserApi();
        }        
        $res    =   $Api->updateInfo(UID, $password, $data);
        if($res['status']){
            $this->success('修改密码成功！');
        }else{
            $this->error($res['info']);
        }
    }

    /**
     * 用户行为列表
     * 
     */
    public function action(){
        //获取列表数据
        $Action =   M('Action')->where(array('status'=>array('gt',-1)));
        $list   =   $this->lists($Action);
        int_to_string($list);
        // 记录当前列表页的cookie
        Cookie('__forward__',$_SERVER['REQUEST_URI']);

        $this->assign('_list', $list);
        $this->meta_title = '用户行为';
        $this->display();
    }

    /**
     * 新增行为
     * 
     */
    public function addAction(){
        $this->meta_title = '新增行为';
        $this->assign('data',null);
        $this->display('editaction');
    }

    /**
     * 编辑行为
     * 
     */
    public function editAction(){
        $id = I('get.id');
        empty($id) && $this->error('参数不能为空！');
        $data = M('Action')->field(true)->find($id);

        $this->assign('data',$data);
        $this->meta_title = '编辑行为';
        $this->display();
    }

    /**
     * 更新行为
     * 
     */
    public function saveAction(){
        $res = D('Action')->update();
        if(!$res){
            $this->error(D('Action')->getError());
        }else{
            $this->success($res['id']?'更新成功！':'新增成功！', Cookie('__forward__'));
        }
    }

    /**
     * 会员状态修改
     * @author 朱亚杰 <zhuyajie@topthink.net>
     */
    public function changeStatus($method=null){
        $id = array_unique((array)I('id',0));
        if( in_array(C('USER_ADMINISTRATOR'), $id)){
            $this->error("不允许对超级管理员执行该操作!");
        }
        $id = is_array($id) ? implode(',',$id) : $id;
        if ( empty($id) ) {
            $this->error('请选择要操作的数据!');
        }
        $map['uid'] =   array('in',$id);
        switch ( strtolower($method) ){
            case 'forbiduser':
                $this->forbid('Member', $map );
                break;
            case 'resumeuser':
                $this->resume('Member', $map );
                break;
            case 'deleteuser':
                $this->delete('Member', $map );
                break;
            default:
                $this->error('参数非法');
        }
    }

    public function add($username = '', $password = '', $repassword = '', $email = ''){
        if(IS_POST){
            /* 检测密码 */
            if($password != $repassword){
                $this->error('密码和重复密码不一致！');
            }
            
            /* 调用注册接口注册用户 */
            if(UC_REMOTE){
                $User   =   new UserRemoteApi;
            }else{
                $User   =   new UserApi;
            }            
            $uid    =   $User->register($username, $username, $password, $email);
            if(0 < $uid){ //注册成功
                /* $user = array('uid' => $uid, 'nickname' => $username, 'status' => 1);
                if(!M('Member')->add($user)){
                    $this->error('用户添加失败！');
                } else {
                    $this->success('用户添加成功！',U('index'));
                } */
                $this->success('用户添加成功！',U('index'));
            } else { //注册失败，显示错误信息
                $this->error($this->showRegError($uid));
            }
        } else {
            $this->meta_title = '新增用户';
            $this->display();
        }
    }

    /**
     * 获取用户注册错误信息
     * @param  integer $code 错误编码
     * @return string        错误信息
     */
    private function showRegError($code = 0){
        switch ($code) {
            case -1:  $error = '用户名长度必须在16个字符以内！'; break;
            case -2:  $error = '用户名被禁止注册！'; break;
            case -3:  $error = '用户名被占用！'; break;
            case -4:  $error = '密码长度必须在6-30个字符之间！'; break;
            case -5:  $error = '邮箱格式不正确！'; break;
            case -6:  $error = '邮箱长度必须在1-32个字符之间！'; break;
            case -7:  $error = '邮箱被禁止注册！'; break;
            case -8:  $error = '邮箱被占用！'; break;
            case -9:  $error = '手机格式不正确！'; break;
            case -10: $error = '手机被禁止注册！'; break;
            case -11: $error = '手机号被占用！'; break;
            default:  $error = '未知错误';
        }
        return $error;
    }
/**用户扩展资料信息页
     * @param null $uid
     * @author 
     */
    public function expandinfo_select($page = 1, $r = 20)
    {
        $nickname = I('nickname');
        $map['status'] = array('egt', 0);
        if (is_numeric($nickname)) {
            $map['uid|nickname'] = array(intval($nickname), array('like', '%' . $nickname . '%'), '_multi' => true);
        } else {
            $map['nickname'] = array('like', '%' . (string)$nickname . '%');
        }
        $list = M('Member')->where($map)->order('last_login_time desc')->page($page, $r)->select();
        $totalCount = M('Member')->where($map)->count();
        int_to_string($list);
        //扩展信息查询
        $map_profile['status'] = 1;
        $field_group = D('field_group')->where($map_profile)->select();
        $field_group_ids = array_column($field_group, 'id');
        $map_profile['profile_group_id'] = array('in', $field_group_ids);
        $fields_list = D('field_setting')->where($map_profile)->getField('id,field_name,form_type');
        $fields_list = array_combine(array_column($fields_list, 'field_name'), $fields_list);
        $fields_list = array_slice($fields_list, 0, 8);//取出前8条，用户扩展资料默认显示8条
        foreach ($list as &$tkl) {
            $tkl['id'] = $tkl['uid'];
            $map_field['uid'] = $tkl['uid'];
            foreach ($fields_list as $key => $val) {
                $map_field['field_id'] = $val['id'];
                $field_data = D('field')->where($map_field)->getField('field_data');
                if ($field_data == null || $field_data == '') {
                    $tkl[$key] = '';
                } else {
                    $tkl[$key] = $field_data;
                }
            }
        }
        $builder = new AdminListBuilder();
        $builder->title("用户扩展资料列表");
        $builder->meta_title = '用户扩展资料列表';
        $builder->setSearchPostUrl(U('Admin/User/expandinfo_select'))->search('搜索', 'nickname', 'text', '请输入用户昵称或者ID');
        $builder->keyId()->keyLink('nickname', "昵称", 'User/expandinfo_details?uid=###');
        foreach ($fields_list as $vt) {
            $builder->keyText($vt['field_name'], $vt['field_name']);
        }
        $builder->data($list);
        $builder->pagination($totalCount, $r);
        $builder->display();
    }
    /**用户扩展资料详情
     * @param string $uid
     * @author 
     */
    public function expandinfo_details($uid = 0)
    {
        $map['uid'] = $uid;
        $map['status'] = array('egt', 0);
        $member = M('Member')->where($map)->find();
        $member['id'] = $member['uid'];
        //扩展信息查询
        $map_profile['status'] = 1;
        $field_group = D('field_group')->where($map_profile)->select();
        $field_group_ids = array_column($field_group, 'id');
        $map_profile['profile_group_id'] = array('in', $field_group_ids);
        $fields_list = D('field_setting')->where($map_profile)->getField('id,field_name,form_type');
        $fields_list = array_combine(array_column($fields_list, 'field_name'), $fields_list);
        $map_field['uid'] = $member['uid'];
        foreach ($fields_list as $key => $val) {
            $map_field['field_id'] = $val['id'];
            $field_data = D('field')->where($map_field)->getField('field_data');
            if ($field_data == null || $field_data == '') {
                $member[$key] = '';
            } else {
                $member[$key] = $field_data;
            }
            $member[$key] = $field_data;
        }
        $builder = new AdminConfigBuilder();
        $builder->title("用户扩展资料详情");
        $builder->meta_title = '用户扩展资料详情';
        $builder->keyId()->keyReadOnly('nickname', "用户名称");
        foreach ($fields_list as $vt) {
            $builder->keyReadOnly($vt['field_name'], $vt['field_name']);
        }
        $builder->data($member);
        $builder->buttonBack();
        $builder->display();
    }

    /**扩展用户信息分组列表
     * @author 
     */
    public function profile($page = 1, $r = 20)
    {
        $map['status'] = array('egt', 0);
        $profileList = D('field_group')->where($map)->order("sort asc")->page($page, $r)->select();
        $totalCount = D('field_group')->where($map)->count();
        $builder = new AdminListBuilder();
        $builder->title("扩展信息分组列表");
        $builder->meta_title = '扩展信息分组';
        $builder->buttonNew(U('editProfile', array('id' => '0')))->buttonDelete(U('changeProfileStatus', array('status' => '-1')))->setStatusUrl(U('changeProfileStatus'))->buttonSort(U('sortProfile'));
        $builder->keyId()->keyText('profile_name', "分组名称")->keyText('sort', '排序')->keyTime("createTime", "创建时间")->keyBool('visiable', '是否公开');
        $builder->keyStatus()->keyDoAction('User/field?id=###', '管理字段')->keyDoAction('User/editProfile?id=###', '编辑');
        $builder->data($profileList);
        $builder->pagination($totalCount, $r);
        $builder->display();
    }

    /**扩展分组排序
     * @author 
     */
    public function sortProfile($ids = null)
    {
        if (IS_POST) {
            $builder = new AdminSortBuilder();
            $builder->doSort('Field_group', $ids);
        } else {
            $map['status'] = array('egt', 0);
            $list = D('field_group')->where($map)->order("sort asc")->select();
            foreach ($list as $key => $val) {
                $list[$key]['title'] = $val['profile_name'];
            }
            $builder = new AdminSortBuilder();
            $builder->meta_title = '分组排序';
            $builder->data($list);
            $builder->buttonSubmit(U('sortProfile'))->buttonBack();
            $builder->display();
        }
    }

    /**扩展字段列表
     * @param $id
     * @author 
     */
    public function field($id, $page = 1, $r = 20)
    {
        $profile = D('field_group')->where('id=' . $id)->find();
        $map['status'] = array('egt', 0);
        $map['profile_group_id'] = $id;
        $field_list = D('field_setting')->where($map)->order("sort asc")->page($page, $r)->select();
        $totalCount = D('field_setting')->where($map)->count();
        $type_default = array(
            'input' => '单行文本框',
            'radio' => '单选按钮',
            'checkbox' => '多选框',
            'select' => '下拉选择框',
            'time' => '日期',
            'textarea' => '多行文本框'
        );
        $child_type = array(
            'string' => '字符串',
            'phone' => '手机号码',
            'email' => '邮箱',
            'number' => '数字'
        );
        foreach ($field_list as &$val) {
            $val['form_type'] = $type_default[$val['form_type']];
            $val['child_form_type'] = $child_type[$val['child_form_type']];
        }
        $builder = new AdminListBuilder();
        $builder->title('【' . $profile['profile_name'] . '】 字段管理');
        $builder->meta_title = $profile['profile_name'] . '字段管理';
        $builder->buttonNew(U('editFieldSetting', array('id' => '0', 'profile_group_id' => $id)))->buttonDelete(U('setFieldSettingStatus', array('status' => '-1')))->setStatusUrl(U('setFieldSettingStatus'))->buttonSort(U('sortField', array('id' => $id)))->button('返回', array('href' => U('profile')));
        $builder->keyId()->keyText('field_name', "字段名称")->keyBool('visiable', '是否公开')->keyBool('required', '是否必填')->keyText('sort', "排序")->keyText('form_type', '表单类型')->keyText('child_form_type', '二级表单类型')->keyText('form_default_value', '默认值')->keyText('validation', '表单验证方式')->keyText('input_tips', '用户输入提示');
        $builder->keyTime("createTime", "创建时间")->keyStatus()->keyDoAction('User/editFieldSetting?profile_group_id=' . $id . '&id=###', '编辑');
        $builder->data($field_list);
        $builder->pagination($totalCount, $r);
        $builder->display();
    }

    /**分组排序
     * @param $id
     * @author 
     */
    public function sortField($id = '', $ids = null)
    {
        if (IS_POST) {
            $builder = new AdminSortBuilder();
            $builder->doSort('Field_group', $ids);
        } else {
            $profile = D('field_group')->where('id=' . $id)->find();
            $map['status'] = array('egt', 0);
            $map['profile_group_id'] = $id;
            $list = D('field_setting')->where($map)->order("sort asc")->select();
            foreach ($list as $key => $val) {
                $list[$key]['title'] = $val['field_name'];
            }
            $builder = new AdminSortBuilder();
            $builder->meta_title = $profile['profile_name'] . '字段排序';
            $builder->data($list);
            $builder->buttonSubmit(U('sortField'))->buttonBack();
            $builder->display();
        }
    }

    /**添加、编辑字段信息
     * @param $id
     * @param $profile_group_id
     * @param $field_name
     * @param $child_form_type
     * @param $visiable
     * @param $required
     * @param $form_type
     * @param $form_default_value
     * @param $validation
     * @param $input_tips
     * @author 
     */
    public function editFieldSetting($id = 0, $profile_group_id = 0, $field_name = '', $child_form_type = 0, $visiable = 0, $required = 0, $form_type = 0, $form_default_value = '', $validation = 0, $input_tips = '')
    {
        if (IS_POST) {
            $data['field_name'] = $field_name;
            if ($data['field_name'] == '') {
                $this->error('字段名称不能为空！');
            }
            $data['profile_group_id'] = $profile_group_id;
            $data['visiable'] = $visiable;
            $data['required'] = $required;
            $data['form_type'] = $form_type;
            $data['input_tips'] = $input_tips;
            if ($form_type == 'input') {
                $data['child_form_type'] = $child_form_type;
            }
            $data['form_default_value'] = $form_default_value;
            $data['validation'] = $validation;
            if ($id != '') {
                $res = D('field_setting')->where('id=' . $id)->save($data);
            } else {
                $map['field_name'] = $field_name;
                $map['status'] = array('egt', 0);
                $map['profile_group_id'] = $profile_group_id;
                if (D('field_setting')->where($map)->count() > 0) {
                    $this->error('该分组下已经有同名字段，请使用其他名称！');
                }
                $data['status'] = 1;
                $data['createTime'] = time();
                $data['sort'] = 0;
                $res = D('field_setting')->add($data);
            }
            if ($res) {
                $this->success($id == '' ? "添加字段成功" : "编辑字段成功", U('field', array('id' => $profile_group_id)));
            } else {
                $this->error($id == '' ? "添加字段失败" : "编辑字段失败");
            }
        } else {
            $builder = new AdminConfigBuilder();
            if ($id != 0) {
                $field_setting = D('field_setting')->where('id=' . $id)->find();
                $builder->title("修改字段信息");
                $builder->meta_title = '修改字段信息';
            } else {
                $builder->title("添加字段");
                $builder->meta_title = '新增字段';
                $field_setting['profile_group_id'] = $profile_group_id;
                $field_setting['visiable'] = 1;
                $field_setting['required'] = 1;
            }
            $type_default = array(
                'input' => '单行文本框',
                'radio' => '单选按钮',
                'checkbox' => '多选框',
                'select' => '下拉选择框',
                'time' => '日期',
                'textarea' => '多行文本框',
				'webeditor' => 'html编辑器'
            );
            $child_type = array(
                'string' => '字符串',
                'phone' => '手机号码',
                'email' => '邮箱',
                'number' => '数字'
            );
            $builder->keyReadOnly("id", "标识")->keyReadOnly('profile_group_id', '分组id')->keyText('field_name', "字段名称")->keySelect('form_type', "表单类型", '', $type_default)->keySelect('child_form_type', "二级表单类型", '', $child_type)->keyTextArea('form_default_value', '默认值', "多个值用'|'分割开")
                ->keyText('validation', '表单验证规则', '例：min=5&max=10')->keyText('input_tips', '用户输入提示', '提示用户如何输入该字段信息')->keyBool('visiable', '是否公开')->keyBool('required', '是否必填');
            $builder->data($field_setting);
            $builder->buttonSubmit(U('editFieldSetting'), $id == 0 ? "添加" : "修改")->buttonBack();

            $builder->display();
        }

    }

    /**设置字段状态：删除=-1，禁用=0，启用=1
     * @param $ids
     * @param $status
     * @author 
     */
    public function setFieldSettingStatus($ids, $status)
    {
        $builder = new AdminListBuilder();
        $builder->doSetStatus('field_setting', $ids, $status);
    }

    /**设置分组状态：删除=-1，禁用=0，启用=1
     * @param $status
     * @author 
     */
    public function changeProfileStatus($status)
    {
        $id = array_unique((array)I('ids', 0));
        if ($id[0] == 0) {
            $this->error('请选择要操作的数据!');
        }
        $id = is_array($id) ? $id : explode(',', $id);
        D('field_group')->where(array('id' => array('in', $id)))->setField('status', $status);
        if ($status == -1) {
            $this->success('删除成功');
        } else if ($status == 0) {
            $this->success('禁用成功');
        } else {
            $this->success('启用成功');
        }

    }

    /**添加、编辑分组信息
     * @param $id
     * * @param $profile_name
     * @author 
     */
    public function editProfile($id = 0, $profile_name = '', $visiable = 1)
    {
        if (IS_POST) {
            $data['profile_name'] = $profile_name;
            $data['visiable'] = $visiable;
            if ($data['profile_name'] == '') {
                $this->error('分组名称不能为空！');
            }
            if ($id != '') {
                $res = D('field_group')->where('id=' . $id)->save($data);
            } else {
                $map['profile_name'] = $profile_name;
                $map['status'] = array('egt', 0);
                if (D('field_group')->where($map)->count() > 0) {
                    $this->error('已经有同名分组，请使用其他分组名称！');
                }
                $data['status'] = 1;
                $data['createTime'] = time();
                $res = D('field_group')->add($data);
            }
            if ($res) {
                $this->success($id == '' ? "添加分组成功" : "编辑分组成功", U('profile'));
            } else {
                $this->error($id == '' ? "添加分组失败" : "编辑分组失败");
            }
        } else {
            $builder = new AdminConfigBuilder();
            if ($id != 0) {
                $profile = D('field_group')->where('id=' . $id)->find();
                $builder->title("修改分组信息");
                $builder->meta_title = '修改分组信息';
            } else {
                $builder->title("添加扩展信息分组");
                $builder->meta_title = '新增分组';
            }
            $builder->keyReadOnly("id", "标识")->keyText('profile_name', '分组名称')->keyBool('visiable', '是否公开');
            $builder->data($profile);
            $builder->buttonSubmit(U('editProfile'), $id == 0 ? "添加" : "修改")->buttonBack();
            $builder->display();
        }

    }
	
}
