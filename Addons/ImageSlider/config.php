<?php
$channels = D('Channel')->field(['title', 'url'])->where(['pid' => 0, 'status' => 1])->order('sort asc')->select();

$tips = '';
foreach ($channels as $channel) {
    $tips .= $channel['title'];
    $module = array_shift(array_filter(explode('/', $channel['url'])));
    $tips .= '|' . $module . ',';
}
$tips = substr($tips, 0, -1);
return array(
    'second' => array(
        'title' => '轮播间隔时间（单位 毫秒）:',
        'type' => 'text',
        'value' => '3000',             //表单的默认值
    ),
    'direction' => array(
        'title' => '图片滚动方向:',
        'type' => 'radio',
        'options' => array(
            'horizontal' => '横向滚动',
            'vertical' => '纵向滚动',
        ),
        'value' => 'horizontal',
    ),
//    'imgWidth' => array(
//        'title' => '容器宽度（单位　像素）',
//        'type' => 'text',
//        'value' => '760'
//    ),
    'imgHeight' => array(
        'title' => '容器高度位　像素）',
        'type' => 'text',
        'value' => '350'
    ),
    'url' => array(
        'title' => '图片链接<span class="text-muted">（一行对应一个图片,示例 Home|http://mysite.com/index.html）[' . $tips . ']<span>',
        'type' => 'textarea',
        'value' => ''
    ),
    'images' => array(
        'title' => '轮播图片<span class="text-muted">(与图片链接一一对应（双击可移除）</span>',
        'type' => 'picture_union',
        'value' => ''
    )
);
					