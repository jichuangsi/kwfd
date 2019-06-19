<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/24
 * Time: 9:09
 */

namespace Admin\Builder;


use Think\Template\TagLib\Html;
use Think\View;

class Combiner extends View
{

    public static function getTplConf()
    {
        $base = './Application/Admin/View/default/Builder/Case/';
        $builderConf = array(
            'SimpleTags' => $base . "SimpleTags.html",
            'RelatedWords' => $base . "RelatedWords.html",
            'MultiText' => $base . "MultiText.html",
            'LinkedSelect' => $base . "LinkedSelect.html",
            'text' => $base . "Text.html",
            'hidden' => $base . "Hidden.html",
            'readonly' => $base . "Readonly.html",
            'integer' => $base . "Integer.html",
            'uid' => $base . "Uid.html",
            'select' => $base . "Select.html",
            'radio' => $base . "Radio.html",
            'image' => $base . "Image.html",
            'imagefile' => $base . "ImageFile.html",
            'uploadtemplatefile' => $base . "UploadTemplateFile.html",
            'audiofile' => $base . "AudioFile.html",
            'videofile' => $base . "VideoFile.html",
            'documentfile' => $base . "DocumentFile.html",
            'checkbox' => $base . "Checkbox.html",
            'editor' => $base . "Editor.html",
            'minieditor' => $base . "MiniEditor.html",
            'textarea' => $base . "Textarea.html",
            'time' => $base . "Time.html",
            'SingleChoice' => $base . "SingleChoice.html",
            'Choice' => $base . "Choice.html",
            'player' => $base . "Player.html",
            'Hotspot' => $base . "HotSpot.html",
            'ResearchItem' => $base . "ResearchItem.html",
            'ResearchResult' => $base . "ResearchResult.html",
            'ExamItem' => $base . "ExamItem.html",
            'tags' => $base . "Tags.html",
            'ExamTopic' => $base . "ExamTopic.html",
            'publishfield' => $base . "PublishField.html",
        );
        $base2 = './Application/Admin/View/default/Builder/Combiner/Standard/';
        $combinerConf = array(
            'layout_horizontal_tab' => $base2 . 'horizontal_tab.html',
            'plot_panel' => $base2 . 'plot_panel.html',
            'simple_list' => $base2 . 'simple_list.html',
            'datepicker_range' => $base2 . 'datepicker_range.html',
            'datepicker' => $base2 . 'datepicker.html',
        );
        $base3 = './Application/Admin/View/default/Builder/Combiner/';
        $combinerTempConf = array(
            'plot_panel2' => $base3 . 'plot_panel2.html',
            'plot_panel_top' => $base3 . 'plot_panel_top.html',
            'date_list' => $base3 . 'date_list.html'
        );
        return array_merge($builderConf, $combinerConf, $combinerTempConf);
    }

    /**
     * 用模板引擎解析模板
     * @param $name
     * @param array $vars
     * @return string
     */
    public static function fetchView($name, $vars = array())
    {
        $templateFile = self::getTpl($name);
        return self::fetchV($templateFile, $vars);
    }

    /**
     * 用模板引擎解析模板
     * @param $templateFile
     * @param $vars
     * @return string
     */
    public static function fetchV($templateFile, $vars)
    {
        if (empty($templateFile) || !is_file($templateFile))
            return '';
        $v = new View();
        $v->assign($vars);
        return $v->fetch($templateFile);
    }

    /**
     * 根据名称获取模板路径
     * @param $name
     * @return string
     */
    public static function getTpl($name)
    {
        $conf = self::getTplConf();
        if (empty($name) || !in_array($name, array_keys($conf))) {
//            echo '<p style="color: red;">模板[' . $name . ']没有定义</p>';
            return $name;
        }
        return $conf[$name];
    }

    /**
     * 用模板引擎解析模板
     * @param $templateFile
     * @return string
     */
    public function combine($templateFile)
    {
        $this->fetchView($templateFile, $this->tVar);
    }

    /**
     * 返回一个组件类的实例
     * @param string $className
     * @return bool
     */
    public static function instance($className = '', array $args = array())
    {
        $className = '\\Admin\\Builder\\' . $className;
        if (!class_exists($className)) {
            echo '<p style="color: red;">class [' . $className . '] not exist</p>';
            exit();
        }
        $reflectionClass = new \ReflectionClass($className);
        return $reflectionClass->newInstanceArgs($args);
    }
}


/**
 * **********************************************************************
 * @description 动态构建html页面元素
 * **********************************************************************
 */

/**
 * Class UIComponent
 * @package Admin\Builder
 */
abstract class UIComponent
{
    protected $componentId = '';
    protected $vars = array();
    protected $basepath = './Application/Admin/View/default/Builder/Combiner/Standard';
    protected $template = '';

    private $viewHandle;

    protected function createComponentId()
    {
        $charid = strtoupper(md5(uniqid(mt_rand(), true)));
        $hyphen = chr(45);// "-"
        $uuid = substr($charid, 0, 8) . $hyphen
            . substr($charid, 8, 4) . $hyphen
            . substr($charid, 12, 4) . $hyphen
            . substr($charid, 16, 4) . $hyphen
            . substr($charid, 20, 12);
        return 'ui-' . $uuid;
    }

    public function __construct()
    {
        $this->componentId = '';
        $this->vars['componentId'] = $this->createComponentId();
        $this->viewHandle = new View();
    }

    /**
     * 解析模板
     * @return string
     */
    protected function fetchView()
    {
        $this->viewHandle->assign($this->vars);
        $tplfile = $this->basepath . '/' . $this->template;
		 
        !is_file($tplfile) && $this->fatal('模板文件[' . $tplfile . ']不存在');
        return $this->viewHandle->fetch($tplfile);
    }

    public function getView()
    {
        return $this->fetchView();
    }

    /**
     * 致命错误
     * @param $msg
     */
    protected function fatal($msg)
    {
        echo '<p style="color: red;">' . $msg . '</p>';
        exit();
    }
}

/**
 * a 标签
 * Class Anchor
 * @package Admin\Builder
 */
class Anchor extends UIComponent
{
    protected $template = 'anchor.html';

    public function __construct($text = '')
    {
        parent::__construct();
        $this->setText($text);
    }

    public function setText($text = '')
    {
        $this->vars['text'] = $text;
        return $this;
    }

    public function setLink($link = '#')
    {
        $this->vars['href'] = $link;
        return $this;
    }

    public function setTarget($target = '_self')
    {
        $this->vars['target'] = $target;
        return $this;
    }

    public function setId($id)
    {
        $this->vars['id'] = $id;
        return $this;
    }

    public function setClass($class)
    {
        $this->vars['class'] = $class;
        return $this;
    }

    public function setTitle($title = '')
    {
        $this->vars['title'] = $title;
        return $this;
    }
}

/**
 * Class Selector select控件
 * @package Admin\Builder
 */
class Selector extends UIComponent
{
    protected $template = 'selector.html';

    public function __construct(array $options = array(), $selected = '', $idMode = false)
    {
        parent::__construct();
        $this->setOptions($options);
        if (strlen($selected))
            $this->setSelected($selected, $idMode);
    }

    public function setOptions(array $options = array())
    {
        $this->vars['options'] = $options;
        return $this;
    }

    public function addOption($id = '', $name = '', $isSelect = false)
    {
        $this->vars['options'][] = array('id' => $id, 'name' => $name, 'selcted' => $isSelect);
        return $this;
    }

    public function setSelected($name = '', $idMode = false)
    {
        foreach ($this->vars['options'] as &$option) {
            if ($idMode) {
                if ($option['id'] == $name) {
                    $option['selected'] = true;
                } else {
                    $option['selected'] = false;
                }
            } else {
                if ($option['name'] == $name) {
                    $option['selected'] = true;
                } else {
                    $option['selected'] = false;
                }
            }
        }
        return $this;
    }
}

class PlainSelector extends Selector
{
    protected $template = 'plain_selector.html';
}

/**
 * Class DatePicker 日期选择框组件
 * @package Admin\Builder
 */
class DatePicker extends UIComponent
{
    protected $template = 'datepicker.html';
}

/**
 * Class DatePickerRange 日期范围组件
 * @package Admin\Builder
 */
class DatePickerRange extends UIComponent
{
    protected $template = 'datepicker_range.html';

    public function __construct($dateFrom = '', $dateTo = '', $label = '')
    {
        parent::__construct();
        $this->setDateFrom($dateFrom);
        $this->setDateTo($dateTo);
        $this->setLabel($label);
    }

    public function setDateFrom($date = '')
    {
        $this->vars['from'] = $date;
        return $this;
    }

    public function setDateTo($date = '')
    {
        $this->vars['to'] = $date;
        return $this;
    }

    public function setLabel($label = '')
    {
        $this->vars['label'] = $label;
        return $this;
    }

    protected function defaultDateFormat()
    {
        return date('Y-m-d', time());
    }

}

/**
 * Class TabView Tab切换组件
 * @package Admin\Builder
 */
class TabView extends UIComponent
{
}

class HorizontalTabView extends TabView
{
    protected $template = 'horizontal_tab.html';

    public function addTab($tabName, $tabContent = '')
    {
        $tabName = trim($tabName);
        if (!is_string($tabName) && !is_numeric($tabName))
            $this->fatal('tab名称不能为空');

        if ($tabContent instanceof UIComponent)
            $tabContent = $tabContent->getView();
        $tab['name'] = 'lht_' . rand(0, 99999);
        $tab['title'] = $tabName;
        $tab['content'] = $tabContent;
        $this->vars['tabs'][] = $tab;
    }
}

/**
 * Class HorizontalStaticTabView 静态Tab标签
 * @package Admin\Builder
 */
class HorizontalStaticTabView extends TabView
{
    protected $template = 'horizontal_static_tab.html';

    public function addTab($tabName, $link = '', $isCurrent = 0)
    {
        $tabName = trim($tabName);
        if (!is_string($tabName) && !is_numeric($tabName))
            $this->fatal('tab名称不能为空');
        $tab['name'] = 'lhst_' . rand(0, 99999);
        $tab['title'] = $tabName;
        $tab['href'] = $link;
        $tab['current'] = $isCurrent;
        $this->vars['tabs'][] = $tab;
        return $this;
    }

    public function setCurrent($tabName = '')
    {
        if (empty($tabName))
            return $this;
        foreach ($this->vars['tabs'] as &$tab) {
            if ($tab['title'] == $tabName)
                $tab['current'] = 1;
        }
        return $this;
    }

    public function setContent($content = '')
    {
        $this->vars['content'] = $content;
        return $this;
    }
}

/**
 * Class LayoutHorizontal 水平布局
 * @package Admin\Builder
 */
class LayoutHorizontal extends UIComponent
{
    protected $template = 'layout_horizontal.html';

    public function addCol($col)
    {
        $this->vars['cols'][] = $col;
        return $this;
    }
}

/**
 * Class LayoutVertical 垂直布局
 * @package Admin\Builder
 */
class LayoutVertical extends UIComponent
{
    protected $template = 'layout_vertical.html';

    public function addRow($row)
    {
        $this->vars['rows'][] = $row;
        return $this;
    }
}

/**
 * 简单列表控件
 * Class SimpleListView
 * @package Admin\Builder
 */
class SimpleListView extends UIComponent
{
    protected $template = 'simple_list.html';

    public function addColumn($name, $title)
    {
        $this->vars['columns'][] = array('name' => $name, 'value' => $title);
        return $this;
    }

    public function setColumns(array $columns = array())
    {
        $this->vars['columns'] = array_merge($this->vars['columns'], $columns);
        return $this;
    }

    public function hideColumns($trigger = true)
    {
        $this->vars['hide_column'] = $trigger;
        return $this;
    }

    public function setData($listData)
    {
        $this->vars['data'] = $listData;
        return $this;
    }

    public function setPage($page)
    {
        $this->vars['page'] = $page;
        return $this;
    }
}

class HLabelView extends UIComponent
{
    protected $template = 'h_label.html';

    public function setTitle($title)
    {
        $this->vars['title'] = $title;
        return $this;
    }

    public function setData($data)
    {
        $this->vars['data'] = $data;
        return $this;
    }
}