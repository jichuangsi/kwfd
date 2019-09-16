<?php
/**
 * Created by PhpStorm.
 * User: 
 * Date: 14-3-12
 * Time: AM10:08
 */

namespace Admin\Builder;

class AdminConfigBuilder extends AdminBuilder
{
    private $_title;
    private $_keyList = array();
    private $_data = array();
    private $_buttonList = array();
    private $_savePostUrl = array();
    private $_group = array();
    private $_callback = null;
    private $_filter = array();
	
    public function title($title)
    {
        $this->_title = $title;
        $this->meta_title = $title;
        return $this;
    }

    /**
     * suggest  页面标题边上的提示信息
     * @param $suggest
     * @return $this
     * @author:xjw129xjt(肖骏涛) xjt@ourstu.com
     */
    public function suggest($suggest)
    {
        $this->_suggest = $suggest;
        return $this;
    }

    public function filter($filter)
    {
        $filter = is_array($filter) ? $filter : explode(',', $filter);
        $this->_filter = $filter;
        return $this;
    }


    public function callback($callback)
    {
        $this->_callback = $callback;
        return $this;
    }

    public function key($name, $title, $subtitle = null, $type, $opt = null)
    {
        $key = array('name' => $name, 'title' => $title, 'subtitle' => $subtitle, 'type' => $type, 'opt' => $opt);
        $this->_keyList[] = $key;
        return $this;
    }

    public function keyHidden($name, $title, $subtitle = null)
    {
        return $this->key($name, $title, $subtitle, 'hidden');
    }

    public function keyReadOnly($name, $title, $subtitle = null)
    {
        return $this->key($name, $title, $subtitle, 'readonly');
    }

    public function keyText($name, $title, $subtitle = null)
    {
        return $this->key($name, $title, $subtitle, 'text');
    }

    public function keyTextArea($name, $title, $subtitle = null)
    {
        return $this->key($name, $title, $subtitle, 'textarea');
    }

    public function keyInteger($name, $title, $subtitle = null)
    {
        return $this->key($name, $title, $subtitle, 'integer');
    }

    public function keyUid($name, $title, $subtitle = null)
    {
        return $this->key($name, $title, $subtitle, 'uid');
    }

    public function keyStatus($name = 'status', $title = '状态', $subtitle = null)
    {
        $map = array(-1 => '删除', 0 => '禁用', 1 => '启用', 2 => '未审核');
        return $this->keySelect($name, $title, $subtitle, $map);
    }
    
    public function keyRecommend($name = 'recommend', $title = '推荐', $subtitle = null)
    {
        $map = array(0 => '不启用', 1 => '启用');
        return $this->keySelect($name, $title, $subtitle, $map);
    }

    public function keySelect($name, $title, $subtitle = null, $options)
    {
        return $this->key($name, $title, $subtitle, 'select', $options);
    }

    public function keyRadio($name, $title, $subtitle = null, $options)
    {
        return $this->key($name, $title, $subtitle, 'radio', $options);
    }

    public function keyCheckBox($name, $title, $subtitle = null, $options)
    {
        return $this->key($name, $title, $subtitle, 'checkbox', $options);
    }

    public function keyEditor($name, $title, $subtitle = null)
    {
        return $this->key($name, $title, $subtitle, 'editor');
    }

    public function keyMiniEditor($name, $title, $subtitle = null, $option = null)
    {
        return $this->key($name, $title, $subtitle, 'minieditor',$option);
    }
    public function keyTime($name, $title, $subtitle = null)
    {
        return $this->key($name, $title, $subtitle, 'time');
    }

    public function keyExamTopic($name, $title, $subtitle = null, $option = null)
    {
        return $this->key($name, $title, $subtitle, 'ExamTopic',$option);
    }
    public function keyCreateTime($name = 'create_time', $title = '创建时间', $subtitle = null)
    {
        return $this->keyTime($name, $title, $subtitle);
    }

    public function keyBool($name, $title, $subtitle = null)
    {
        $map = array(1 => '是', 0 => '否');
        return $this->keyRadio($name, $title, $subtitle, $map);
    }

    public function keyUpdateTime($name = 'update_time', $title = '修改时间', $subtitle = null)
    {
        return $this->keyTime($name, $title, $subtitle);
    }

    public function keyTitle($name = 'title', $title = '标题', $subtitle = null)
    {
        return $this->keyText($name, $title, $subtitle);
    }

    public function keyId($name = 'id', $title = '编号', $subtitle = null)
    {
        return $this->keyReadOnly($name, $title, $subtitle);
    }

    public function keyMultiUserGroup($name, $title, $subtitle = null)
    {
        $options = $this->readUserGroups();
        return $this->keyCheckBox($name, $title, $subtitle, $options);
    }

    public function keySingleImage($name, $title, $subtitle = null)
    {

        return $this->key($name, $title, $subtitle, 'image');
    }
    public function keyMultiImage($name, $title, $subtitle = null, $limit = '')
    {
        return $this->key($name, $title, $subtitle, 'multiImage', $limit);
    }
    public function keySingleUserGroup($name, $title, $subtitle = null)
    {
        $options = $this->readUserGroups();
        return $this->keySelect($name, $title, $subtitle, $options);
    }
	
    public function keySingleFile($name, $title, $subtitle = null)
    {
        return $this->key($name, $title, $subtitle, 'file');
    }
	public function keyFileCanEdit($name, $title, $subtitle = null)
    {
        return $this->key($name, $title, $subtitle, 'FileCanEdit');
    }
    public function keySingleChoice($name, $title, $subtitle = null)
    {
        return $this->key($name, $title, $subtitle, 'SingleChoice');
    }
    public function keyChoice($name, $title, $subtitle = null)
    {
        return $this->key($name, $title, $subtitle, 'Choice');
    }
	public function keyCategory($name, $title, $subtitle = null,$opt=null)
    {
        return $this->key($name, $title, $subtitle, 'Category',$opt);
	}    
	public function keyOrgCategory($name, $title, $subtitle, $options)
	{
	    return $this->key($name, $title, $subtitle, 'OrgCategory', $options);
	}
	
    public function button($title, $attr = array())
    {
        $this->_buttonList[] = array('title' => $title, 'attr' => $attr);
        return $this;
    }

    public function buttonSubmit($url = '', $title = '确定')
    {
        if ($url == '') {
            $url = __SELF__;
        }
        $this->savePostUrl($url);

        $attr = array();
        $attr['class'] = "btn submit-btn ajax-post";// btn-lg
        $attr['id'] = 'submit';
        $attr['type'] = 'submit';
        $attr['target-form'] = 'form-horizontal';
        return $this->button($title, $attr);
    }

    public function buttonBack($title = '返回')
    {
        $attr = array();
        $attr['onclick'] = 'javascript:history.back(-1);return false;';
        $attr['class'] = 'btn btn-return';// btn-lg
        return $this->button($title, $attr);
    }

    public function data($list)
    {
        $this->_data = $list;
        return $this;
    }

    public function savePostUrl($url)
    {
        if ($url) {
            $this->_savePostUrl = $url;
        }
    }

    public function display($templateFile="admin_config")
    {
        //将数据融入到key中
        foreach ($this->_keyList as &$e) {
            $e['value'] = $this->_data[$e['name']];
        }

        //编译按钮的html属性
        foreach ($this->_buttonList as &$button) {
            $button['attr'] = $this->compileHtmlAttr($button['attr']);
        }

        //显示页面
        $this->assign('group', $this->_group);
        $this->assign('title', $this->_title);
		$this->assign('suggest', $this->_suggest);
        $this->assign('keyList', $this->_keyList);
        $this->assign('buttonList', $this->_buttonList);
        $this->assign('savePostUrl', $this->_savePostUrl);
        parent::display($templateFile);
    }
   /**
     * keyChosen  多选菜单
     * @param $name
     * @param $title
     * @param null $subtitle
     * @param $options
     * @return $this
     * @author:xjw129xjt(肖骏涛) xjt@ourstu.com
     */
    public function keyChosen($name, $title, $subtitle = null, $options)
    {
        // 解析option数组
        if (key($options) === 0) {
            if (!is_array(reset($options))) {
                foreach ($options as $key => &$val) {
                    $val = array($val, $val);
                }
                unset($key, $val);
            }
        } else {
            foreach ($options as $key => &$val) {
                foreach ($val as $k => &$v) {
                    if (!is_array($v)) {
                        $v = array($v, $v);
                    }
                }
                unset($k, $v);
            }
            unset($key, $val);
        }
        return $this->key($name, $title, $subtitle, 'chosen', $options);
    }

    /**
     * keyMultiInput  输入组组件
     * @param $name
     * @param $title
     * @param $subtitle
     * @param $config
     * @param null $style
     * @return $this
     * @author:xjw129xjt(肖骏涛) xjt@ourstu.com
     */
    public function keyMultiInput($name, $title, $subtitle, $config, $style = null)
    {
        empty($style) && $style = 'width:400px;';
        $key = array('name' => $name, 'title' => $title, 'subtitle' => $subtitle, 'type' => 'multiInput', 'config' => $config, 'style' => $style);
        $this->_keyList[] = $key;
        return $this;
    }

    /**插入配置分组
     * @param       $name 组名
     * @param array $list 组内字段列表
     * @return $this
     * @auth 肖骏涛
     */
    public function group($name, $list = array())
    {
        !is_array($list) && $list = explode(',', $list);
        $this->_group[$name] = $list;
        return $this;
    }

    public function groups($list = array())
    {
        foreach ($list as $key => $v) {
            $this->_group[$key] = is_array($v) ? $v : explode(',', $v);
        }
        return $this;
    }


	
    /**自动处理配置存储事件，配置项必须全大写
     * @auth 陈一枭
     */
    public function handleConfig()
    {
        if (IS_POST) {
            $success = false;
            $configModel = D('Config');
            foreach (I('') as $k => $v) {
				if (in_array($k, $this->_filter)) {
                    $success = 1;
                    continue;
                }
                $config['name'] = '_' . strtoupper(CONTROLLER_NAME) . '_' . strtoupper($k);
                $config['type'] = 0;
                $config['title'] = '';
                $config['group'] = 0;
                $config['extra'] = '';
                $config['remark'] = '';
                $config['create_time'] = time();
                $config['update_time'] = time();
                $config['status'] = 1;
                $config['value'] = is_array($v) ? implode(',', $v) : $v;
                $config['sort'] = 0;
                if ($configModel->add($config, null, true)) {
                    $success = 1;
                }
                $tag = 'conf_' . strtoupper(CONTROLLER_NAME) . '_' . strtoupper($k);
                S($tag, null);
                /*if ($configModel->where(array('name' =>  '_' . CONTROLLER_NAME . '_' .$k))->count()) {
                    if ($configModel->save($config)) {
                        $success = 1;
                    }
                } else {
                    if ($configModel->add($config)) {
                        $success = 1;
                    }
                }*/

            }
            if ($success) {
				if ($this->_callback) {
                    $str = $this->_callback;
                    A(CONTROLLER_NAME)->$str(I(''));
                }
                header('Content-type: application/json');
                exit(json_encode(array('info' => '保存配置成功。', 'status' => 1, 'url' => __SELF__)));
            } else {
                header('Content-type: application/json');
                exit(json_encode(array('info' => '保存配置失败。', 'status' => 0, 'url' => __SELF__)));
            }


        } else {
            $configs = D('Config')->where(array('name' => array('like', '_' . strtoupper(CONTROLLER_NAME) . '_' . '%')))->limit(999)->select();
            $data = array();
            foreach ($configs as $k => $v) {
                $key = str_replace('_' . strtoupper(CONTROLLER_NAME) . '_', '', strtoupper($v['name']));
                $data[$key] = $v['value'];
            }
            return $data;
        }
    }

    private function readUserGroups()
    {
        $list = M('AuthGroup')->where(array('status' => 1))->order('id asc')->select();
        $result = array();
        foreach ($list as $group) {
            $result[$group['id']] = $group['title'];
        }
        return $result;
    }

    public function setDefault($data, $key, $value)
    {
        $data[$key] = $data[$key] != null ? $data[$key] : $value;
        return $data;
    }

    public function keyDefault($key, $value)
    {
        $data = $this->_data;
        $data[$key] = $data[$key] !== null ? $data[$key] : $value;
        $this->_data = $data;
        return $this;
    }
	
}