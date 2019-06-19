<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo ($meta_title); ?>|管理平台</title>
    <link href="/Public/favicon.ico" type="image/x-icon" rel="shortcut icon">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/base.css" media="all">
    <!--link rel="stylesheet" type="text/css" href="/Public/Admin/css/common.css" media="all"-->
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/module.css">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/style.css" media="all">
	<link rel="stylesheet" type="text/css" href="/Public/Admin/css/<?php echo (C("COLOR_STYLE")); ?>.css" media="all">
 

    <link rel="stylesheet" href="/Application/Admin/Static/adminlte/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Application/Admin/Static/adminlte/dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="/Application/Admin/Static/adminlte/dist/css/skins/_all-skins.min.css">
     <link rel="stylesheet" type="text/css" href="/Application/Admin/Static/css/oc/admin.css" media="all">
	<!--[if lt IE 9]>
    <script type="text/javascript" src="/Public/static/jquery-1.10.2.min.js"></script>
    <![endif]--><!--[if gte IE 9]><!-->
    <script type="text/javascript" src="/Public/static/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="/Application/Admin/Static/js/jquery.mousewheel.js"></script>
    <!--<![endif]-->
	
	<link href="/Public/static/datetimepicker/css/datetimepicker.css" rel="stylesheet" type="text/css">
    <link href="/Public/static/datetimepicker/css/dropdown.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="/Public/static/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="/Public/static/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>

	<script type="text/javascript" src="/Public/static/uploadify/jquery.uploadify.min.js"></script>

    
</head>
<body>
    <!-- 头部 -->
    <div class="header">
        <!-- Logo -->
        <span class="logo"></span>
        <!-- /Logo -->

        <!-- 主导航 -->
        <ul class="main-nav">
            <?php if(is_array($__MENU__["main"])): $i = 0; $__LIST__ = $__MENU__["main"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li class="<?php echo ((isset($menu["class"]) && ($menu["class"] !== ""))?($menu["class"]):''); ?>"><a href="<?php echo (u($menu["url"])); ?>"><?php echo ($menu["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <!-- /主导航 -->

   
        <!-- 用户栏 -->
        <div class="user-bar">
            <a href="javascript:;" class="user-entrance"><i class="icon-user"></i></a>
            <ul class="nav-list user-menu hidden">
                <li class="manager">你好，<em title="<?php echo session('user_auth.username');?>"><?php echo session('user_auth.username');?></em></li>
                <li><a href="<?php echo U('User/updatePassword');?>">修改密码</a></li>
                <li><a href="<?php echo U('User/updateNickname');?>">修改昵称</a></li>
                <li><a href="<?php echo U('Public/logout');?>">退出</a></li>
            </ul>
        </div>
        
             <!-- 缓存 -->
        <div class="cache">
            <a onclick="$.get('cc.php');alert('缓存清理成功。')"  class="cache-delete" title="清除缓存"><i class="icon-cache"></i></a>
        </div>
    </div>
    <!-- /头部 -->

    <!-- 边栏 -->
    <div class="sidebar">
        <!-- 子导航 -->
        
            <div id="subnav" class="subnav">
                <?php if(!empty($_extra_menu)): ?>
                    <?php echo extra_menu($_extra_menu,$__MENU__); endif; ?>
                <?php if(is_array($__MENU__["child"])): $i = 0; $__LIST__ = $__MENU__["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub_menu): $mod = ($i % 2 );++$i;?><!-- 子导航 -->
                    <?php if(!empty($sub_menu)): if(!empty($key)): ?><h3><i class="icon icon-unfold"></i><?php echo ($key); ?></h3><?php endif; ?>
                        <ul class="side-sub-menu">
                            <?php if(is_array($sub_menu)): $i = 0; $__LIST__ = $sub_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li>
                                    <a class="item" href="<?php echo (u($menu["url"])); ?>"><?php echo ($menu["title"]); ?></a>
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul><?php endif; ?>
                    <!-- /子导航 --><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        
        <!-- /子导航 -->
    </div>
    <!-- /边栏 -->

    <!-- 内容区 -->
    <div id="main-content">
        <div id="top-alert" class="fixed alert alert-error" style="display: none;">
            <button class="close fixed" style="margin-top: 4px;">&times;</button>
            <div class="alert-content">这是内容</div>
        </div>
        <div id="main" class="main">
            
            <!-- nav -->
            <?php if(!empty($_show_nav)): ?><div class="breadcrumb">
                <span>您的位置:</span>
                <?php $i = '1'; ?>
                <?php if(is_array($_nav)): foreach($_nav as $k=>$v): if($i == count($_nav)): ?><span><?php echo ($v); ?></span>
                    <?php else: ?>
                    <span><a href="<?php echo ($k); ?>"><?php echo ($v); ?></a>&gt;</span><?php endif; ?>
                    <?php $i = $i+1; endforeach; endif; ?>
            </div><?php endif; ?>
            <!-- nav -->
            

            
<style>
/***
Custom tabs
***/
/* In BS3.0.0 tabbable class was removed. We had to added it back */
.tabbable:before,
.tabbable:after {
  content: " ";
  display: table; }

.tabbable:after {
  clear: both; }

.tabbable-custom {
  margin-bottom: 15px;
  padding: 0px;
  overflow: hidden;
  /* justified tabs */
  /* boxless tabs */
  /* below justified tabs */
  /* full width tabs */
  /* below tabs */ }
  .tabbable-custom > .nav-tabs {
    border: none;
    margin: 0px; }
    .tabbable-custom > .nav-tabs > li {
      margin-right: 2px;
      border-top: 2px solid transparent; }
      .tabbable-custom > .nav-tabs > li > a {
        margin-right: 0;
        -webkit-border-radius: 0;
        -moz-border-radius: 0;
        -ms-border-radius: 0;
        -o-border-radius: 0;
        border-radius: 0; 
		color:#555555;}
        .tabbable-custom > .nav-tabs > li > a:hover {
          background: none;
		  color:#000000;
          border-color: transparent; }
      .tabbable-custom > .nav-tabs > li.active {
        border-top: 3px solid #3d72fe;
		color:#555555;
        margin-top: 0;
        position: relative; }
        .tabbable-custom > .nav-tabs > li.active > a {
          border-top: none !important;
          font-weight: 400;
          -webkit-border-radius: 0;
          -moz-border-radius: 0;
          -ms-border-radius: 0;
          -o-border-radius: 0;
          border-radius: 0; }
          .tabbable-custom > .nav-tabs > li.active > a:hover {
            -webkit-border-radius: 0;
            -moz-border-radius: 0;
            -ms-border-radius: 0;
            -o-border-radius: 0;
            border-radius: 0;
            border-top: none;
            background: #fff;
            border-color: #d4d4d4 #d4d4d4 transparent; }
  .tabbable-custom > .tab-content {
    background-color: #fff;
    border: 1px solid #ddd;
    padding: 10px;
    -webkit-border-radius: 0 0 4px 4px;
    -moz-border-radius: 0 0 4px 4px;
    -ms-border-radius: 0 0 4px 4px;
    -o-border-radius: 0 0 4px 4px;
    border-radius: 0 0 4px 4px; }
  .tabbable-custom.nav-justified > .tab-content {
    margin-top: -1px; }
  .tabbable-custom.boxless > .tab-content {
    padding: 15px 0;
    border-left: none;
    border-right: none;
    border-bottom: none; }
  .tabbable-custom.tabs-below.nav-justified .tab-content {
    margin-top: 0px;
    margin-bottom: -2px;
    -webkit-border-radius: 4px 4px 0 0;
    -moz-border-radius: 4px 4px 0 0;
    -ms-border-radius: 4px 4px 0 0;
    -o-border-radius: 4px 4px 0 0;
    border-radius: 4px 4px 0 0; }
  .tabbable-custom.tabbable-full-width > .nav-tabs > li > a {
    color: #424242;
    font-size: 15px;
    padding: 9px 15px; }
  .tabbable-custom.tabbable-full-width > .tab-content {
    padding: 15px 0;
    border-left: none;
    border-right: none;
    border-bottom: none; }
  .tabbable-custom.tabs-below .nav-tabs > li > a {
    border-top: none;
    border-bottom: 2px solid transparent;
    margin-top: -1px; }
  .tabbable-custom.tabs-below .nav-tabs > li.active {
    border-top: none;
    border-bottom: 3px solid #d12610;
    margin-bottom: 0;
    position: relative; }
    .tabbable-custom.tabs-below .nav-tabs > li.active > a {
      border-bottom: none; }
      .tabbable-custom.tabs-below .nav-tabs > li.active > a:hover {
        background: #fff;
        border-color: #d4d4d4 #d4d4d4 transparent; }

.tabbable-custom.tabbable-noborder > .nav-tabs > li > a {
  border: 0; }

.tabbable-custom.tabbable-noborder .tab-content {
  border: 0; }

.portlet:not(.light) .tabbable-line {
  padding-top: 15px; }

.tabbable-line > .nav-tabs {
  border: none;
  margin: 0px; }
  .tabbable-line > .nav-tabs > li {
    margin: 0; }
    .tabbable-line > .nav-tabs > li > a {
      background: none !important;
      border: 0;
      margin: 0;
      padding-left: 15px;
      padding-right: 15px;
      color: #737373; }
      .tabbable-line > .nav-tabs > li > a > i {
        color: #a6a6a6; }
    .tabbable-line > .nav-tabs > li.active {
      background: none;
      border-bottom: 4px solid #36c6d3;
      position: relative; }
      .tabbable-line > .nav-tabs > li.active > a {
        border: 0;
        color: #333; }
        .tabbable-line > .nav-tabs > li.active > a > i {
          color: #404040; }
    .tabbable-line > .nav-tabs > li.open,
    .tabbable-line > .nav-tabs > li:hover {
      background: none;
      border-bottom: 4px solid #9fe4ea; }
      .tabbable-line > .nav-tabs > li.open > a,
      .tabbable-line > .nav-tabs > li:hover > a {
        border: 0;
        background: none !important;
        color: #333; }
        .tabbable-line > .nav-tabs > li.open > a > i,
        .tabbable-line > .nav-tabs > li:hover > a > i {
          color: #a6a6a6; }
      .tabbable-line > .nav-tabs > li.open .dropdown-menu,
      .tabbable-line > .nav-tabs > li:hover .dropdown-menu {
        margin-top: 0px; }

.tabbable-line > .tab-content {
  margin-top: 0;
  border: 0;
  border-top: 1px solid #eef1f5;
  padding: 30px 0; }
  .page-container-bg-solid .tabbable-line > .tab-content {
    border-top: 1px solid #dae2ea; }
  .portlet .tabbable-line > .tab-content {
    padding-bottom: 0; }

.tabbable-line.tabs-below > .nav-tabs > li {
  border-top: 4px solid transparent; }
  .tabbable-line.tabs-below > .nav-tabs > li > a {
    margin-top: 0; }
  .tabbable-line.tabs-below > .nav-tabs > li:hover {
    border-bottom: 0;
    border-top: 4px solid #fbdcde; }
  .tabbable-line.tabs-below > .nav-tabs > li.active {
    margin-bottom: -2px;
    border-bottom: 0;
    border-top: 4px solid #ed6b75; }

.tabbable-line.tabs-below > .tab-content {
  margin-top: -10px;
  border-top: 0;
  border-bottom: 1px solid #eee;
  padding-bottom: 15px; }

.portlet .tabbable-bordered {
  margin-top: 20px; }

.tabbable-bordered .nav-tabs {
  margin-bottom: 0;
  border-bottom: 0; }

.tabbable-bordered .tab-content {
  padding: 30px 20px 20px 20px;
  border: 1px solid #ddd;
  background: #ffffff; }

</style>
    <div class="page-bar" style="display:none">
        <ul class="page-breadcrumb">
            <li>
                <a href="<?php echo U('Admin/Index/index');?>">首页  </a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span><?php echo ($title); ?></span>
            </li>
        </ul>
        <div class="page-toolbar">
            <a class="btn btn-danger" data-role="addTo"><i class="icon-plus"></i> 添加到常用操作</a>
<?php $controller = CONTROLLER_NAME; $current = M('Menu')->where("url like '%$controller/" . ACTION_NAME . "' AND pid > 0")->field('id')->find(); ?>
<input type="hidden" id="current" value="<?php echo ($current); ?>">

<script>
    $('[data-role="addTo"]').click(function () {
        var id = "<?php echo ($current['id']); ?>";
        var url = "<?php echo U('Admin/Index/addTo');?>";
        $.post(url, {id: id}, function (msg) {
            if (msg.status) {
                console.log(msg);
                toast.success(msg.info);
                /*setTimeout(function () {
                 window.location.reload();
                 }, 500);*/
            } else {
                toast.error(msg.info);
            }
        }, 'json')
    });
</script>

        </div>
    </div>

    <div class="main-title">
        <h2><?php echo ($title); ?>            <?php if($suggest): ?>（<?php echo ($suggest); ?>）<?php endif; ?></h2>
    </div>

    <div class="with-padding">
        <div class="tab-wrap tabbable-custom" style="margin-bottom: 5px">
            <ul class="nav nav-tabs group_nav">
                <?php if(is_array($group)): $i = 0; $__LIST__ = $group;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vGroup): $mod = ($i % 2 );++$i;?><li class="<?php if( $i == 1): ?>active<?php endif; ?>"><a href="javascript:"><?php echo ($key); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <div class="tab-content">
                <form action="<?php echo ($savePostUrl); ?>" method="post" class="form-horizontal">
                    <?php if($group){ ?>
                    <!--看板-->
                    <?php if(is_array($group)): $i = 0; $__LIST__ = $group;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vGroup): $mod = ($i % 2 );++$i;?><div class="group_list" style="<?php if($i != 1): ?>display: none;<?php endif; ?>">
                            <?php if(is_array($keyList)): $i = 0; $__LIST__ = $keyList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$field): $mod = ($i % 2 );++$i; if(in_array($field['name'],$vGroup)||(is_array($field['name'])&&in_array(implode('|', $field['name']),$vGroup))){ ?>
                                <label class="item-label"><?php echo (htmlspecialchars($field["title"])); ?>
    <?php if($field['subtitle']): ?><span class="check-tips">（<?php echo ($field["subtitle"]); ?>）</span><?php endif; ?>
</label>
<?php if($field['name'] == 'action'): ?><p style="color: #f00;"><?php echo L("_DEVELOPMENT_STAFF_ATTENTION_"); echo L("_YOU_USE_A_FIELD_NAMED_ACTION_");?>，<?php echo L("_BECAUSE_THIS_FIELD_NAME_WILL_BE_WITH_FORM_");?>[action]<?php echo L("_CONFLICT_WHICH_CAUSES_THE_FORM_TO_BE_UNABLE_TO_COMMIT_PLEASE_USE_ANOTHER_NAME_");?></p><?php endif; ?>
<div class="controls ">
<?php switch($field["type"]): case "text": ?><input type="text" name="<?php echo ($field["name"]); ?>" value="<?php echo (htmlspecialchars($field["value"])); ?>"
               class="text input-large form-control" style="width: 400px"/><?php break;?>

    <?php case "label": echo ($field["value"]); break;?>


    <?php case "hidden": ?><input type="hidden" name="<?php echo ($field["name"]); ?>" value="<?php echo ($field["value"]); ?>" class="text input-large"/><?php break;?>
    <?php case "readonly": ?><input type="hidden" name="<?php echo ($field["name"]); ?>" value="<?php echo ($field["value"]); ?>" class="text input-large form-control"
               style="width: 400px" placeholder=<?php echo L("_NO_NEED_TO_FILL_IN_WITH_DOUBLE_");?> readonly/>
        <p class="lead" ><?php echo ($field["value"]); ?></p><?php break;?>
    <?php case "area_readonly": ?><p class="lead" ><?php echo ($field["value"]); ?></p><?php break;?>
    <?php case "integer": ?><input type="text" name="<?php echo ($field["name"]); ?>" value="<?php echo ($field["value"]); ?>" class="text input-large form-control"
               style="width: 400px"/><?php break;?>
    <?php case "uid": ?><input type="text" name="<?php echo ($field["name"]); ?>" value="<?php echo ($field["value"]); ?>" class="text input-large form-control"
               style="width: 100px"/><?php break;?>
    <?php case "select": ?><select name="<?php echo ($field["name"]); ?>" class="form-control" style="width:auto;">
            <?php if(is_array($field["opt"])): $i = 0; $__LIST__ = $field["opt"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$option): $mod = ($i % 2 );++$i; $selected = $field['value']==$key ? 'selected' : ''; ?>
                <option value="<?php echo ($key); ?>"
                <?php echo ($selected); ?>><?php echo (htmlspecialchars($option)); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
        </select><?php break;?>
    <?php case "colorPicker": $colorPicker = 1; ?>
        <div class="color-picker" style="width:100px;height: 30px;">
            <input type="text" name="<?php echo ($field["name"]); ?>" class="simple_color_callback form-control" onchange="setColorPicker(this);" value="<?php echo ((isset($field["value"]) && ($field["value"] !== ""))?($field["value"]):''); ?>" style="width: 100px;"/>
        </div><?php break;?>
    <?php case "radio": if(is_array($field["opt"])): $i = 0; $__LIST__ = $field["opt"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$option): $mod = ($i % 2 );++$i; $checked = $field['value']==$key ? 'checked' : ''; $inputId = "id_$field[name]_$key"; ?>
            <label for="<?php echo ($inputId); ?>"> <input id="<?php echo ($inputId); ?>" name="<?php echo ($field["name"]); ?>" value="<?php echo ($key); ?>" type="radio"
                <?php echo ($checked); ?>/>
                <?php echo ($option); ?></label> &nbsp;&nbsp;&nbsp;&nbsp;<?php endforeach; endif; else: echo "" ;endif; break;?>
    <?php case "icon": ?><div class='icon-chose' title=<?php echo L("_SELECT_ICON_WITH_DOUBLE_");?> style="width: 400px;">
            <select name="<?php echo ($field["name"]); ?>" title=<?php echo L("_SELECT_ICON_WITH_DOUBLE_");?> class="chosen-icons" data-value="<?php echo ((isset($field["value"]) && ($field["value"] !== ""))?($field["value"]):'icon-star'); ?>"></select>
        </div>
        <?php if(!$have_icon){ $have_icon=1; ?>
        <script src="__ZUI__/lib/chosen/chosen.icons.min.js"></script>
        <link href="__ZUI__/lib/chosen/chosen.icons.css" rel="stylesheet">
        <?php } ?>
        <script>
            $(function(){
                $('.chosen-container').remove()
                $('form select.chosen-icons').attr('class','chosen-icons');
                $('form select.chosen-icons').data('zui.chosenIcons',null);
                $('form select.chosen-icons').data('chosen',null);
                $('form select.chosen-icons').chosenIcons();
            });
        </script><?php break;?>

    <?php case "singleFile": echo W('Common/UploadFile/render',array(array('name'=>$field['name'],'value'=>$field['value']))); break;?>
    <?php case "multiFile": echo W('Common/UploadMultiFile/render',array(array('name'=>$field['name'],'limit'=>9,'value'=>$field['value']))); break;?>
    <?php case "image": ?><div class="controls">
                            <input type="file" id="upload_picture_<?php echo ($field["name"]); ?>">
                            <input type="hidden" name="<?php echo ($field["name"]); ?>" id="cover_id_<?php echo ($field["name"]); ?>" value="<?php echo ($field['value']); ?>"/>
                            <div class="upload-img-box">
                                <?php if(!empty($field["value"])): ?><div class="upload-pre-item"><img src="<?php echo (get_cover($field["value"],'path')); ?>"/></div><?php endif; ?>
                            </div>
                        </div>
                        <script type="text/javascript">
						$(function(){
						
                            //上传图片
                            /* 初始化上传插件 */
                            $("#upload_picture_<?php echo ($field["name"]); ?>").uploadify({
                                "height"          : 30,
                                "swf"             : "/Public/static/uploadify/uploadify.swf",
                                "fileObjName"     : "download",
                                "buttonText"      : "上传图片",
                                "uploader"        : "<?php echo U('File/uploadPicture',array('session_id'=>session_id()));?>",
                                "width"           : 120,
                                'removeTimeout'	  : 1,
                                'fileTypeExts'	  : '*.jpg; *.png; *.gif;',
                                "onUploadSuccess" : uploadPicture<?php echo ($field["name"]); ?>,
                                'onFallback' : function() {
                                    alert('未检测到兼容版本的Flash.');
                                }
                            });
                            function uploadPicture<?php echo ($field["name"]); ?>(file, data){
							    //alert(data.toString());
                                var data = $.parseJSON(data);
                                var src = '';
                                if(data.status){
                                    $("#cover_id_<?php echo ($field["name"]); ?>").val(data.id);
                                    src = data.url || '' + data.path
                                    $("#cover_id_<?php echo ($field["name"]); ?>").parent().find('.upload-img-box').html(
                                            '<div class="upload-pre-item"><img src="' + src + '"/></div>'
                                    );
                                } else {
                                    updateAlert(data.info);
                                    setTimeout(function(){
                                        $('#top-alert').find('button').click();
                                        $(that).removeClass('disabled').prop('disabled',false);
                                    },1500);
                                }
                            }
						})	
                        </script><?php break;?>
    <?php case "singleImage": ?><div class="controls">
            <div id="upload_single_image_<?php echo ($field["name"]); ?>" style="padding-bottom: 5px;"><?php echo L("_SELECT_PICTURES_");?></div>
            <input class="attach" type="hidden" name="<?php echo ($field["name"]); ?>" value="<?php echo ($field['value']); ?>"/>
            <div class="upload-img-box">
                <div class="upload-pre-item popup-gallery">

                <?php if(!empty($field["value"])): ?><div class="each">
                    <a href="<?php echo (get_cover($field["value"],'path')); ?>" title=<?php echo L("_CLICK_TO_SEE_THE_BIG_PICTURE_WITH_DOUBLE_");?>>
                        <img src="<?php echo (get_cover($field["value"],'path')); ?>">
                    </a>
                        <div class="text-center opacity del_btn" ></div>
                        <div onclick="admin_image.removeImage($(this),'<?php echo ($field["value"]); ?>')"  class="text-center del_btn"><?php echo L("_DELETE_");?></div>
                    </div><?php endif; ?>
                </div>
            </div>
        </div>
        <script>
            $(function () {
                var uploader_<?php echo ($field["name"]); ?>= WebUploader.create({
                    // 选完文件后，是否自动上传。
                    auto: true,
                    // swf文件路径
                    swf: 'Uploader.swf',
                    // 文件接收服务端。
                    server: "<?php echo U('File/uploadPicture',array('session_id'=>session_id()));?>",
                    // 选择文件的按钮。可选。
                    // 内部根据当前运行是创建，可能是input元素，也可能是flash.
                    pick: '#upload_single_image_<?php echo ($field["name"]); ?>',
                    // 只允许选择图片文件
                    accept: {
                        title: 'Images',
                        extensions: 'gif,jpg,jpeg,bmp,png',
                        mimeTypes: 'image/*'
                    }
                });
                uploader_<?php echo ($field["name"]); ?>.on('fileQueued', function (file) {
                    uploader_<?php echo ($field["name"]); ?>.upload();
                });
                /*上传成功**/
                uploader_<?php echo ($field["name"]); ?>.on('uploadSuccess', function (file, data) {
                    if (data.status) {
                        $("[name='<?php echo ($field["name"]); ?>']").val(data.id);
                        $("[name='<?php echo ($field["name"]); ?>']").parent().find('.upload-pre-item').html(
                                ' <div class="each"><a href="'+ data.path+'" title=<?php echo L("_CLICK_TO_SEE_THE_BIG_PICTURE_WITH_DOUBLE_");?>><img src="'+ data.path+'"></a><div class="text-center opacity del_btn" ></div>' +
                                        '<div onclick="admin_image.removeImage($(this),'+data.id+')"  class="text-center del_btn"><?php echo L("_DELETE_");?></div></div>'
                        );
                        uploader_<?php echo ($field["name"]); ?>.reset();
                    } else {
                        updateAlert(data.info);
                        setTimeout(function () {
                            $('#top-alert').find('button').click();
                            $(that).removeClass('disabled').prop('disabled', false);
                        }, 1500);
                    }
                });
            })
        </script><?php break;?>
    <?php case "multiImage": ?><div class="controls multiImage">
            <div id="upload_multi_image_<?php echo ($field["name"]); ?>" style="padding-bottom: 5px;"><?php echo L("_SELECT_PICTURES_");?></div>
            <input class="attach" type="hidden" name="<?php echo ($field["name"]); ?>" value="<?php echo ($field['value']); ?>"/>
            <div class="upload-img-box">
                <div class="upload-pre-item popup-gallery">

                    <?php if(!empty($field["value"])): $aIds = explode(',',$field['value']); ?>
                        <?php if(is_array($aIds)): $i = 0; $__LIST__ = $aIds;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$aId): $mod = ($i % 2 );++$i;?><div class="each">
                                <a href="<?php echo (get_cover($aId,'path')); ?>" title=<?php echo L("_CLICK_TO_SEE_THE_BIG_PICTURE_WITH_DOUBLE_");?>>
                                    <img src="<?php echo (get_cover($aId,'path')); ?>">
                                </a>
                                <div class="text-center opacity del_btn" ></div>
                                <div onclick="admin_image.removeImage($(this),'<?php echo ($aId); ?>')"  class="text-center del_btn"><?php echo L("_DELETE_");?></div>
                            </div><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                </div>
            </div>
        </div>
        <script>
            $(function () {
                var id = "#upload_multi_image_<?php echo ($field["name"]); ?>";
                var limit = parseInt('<?php echo ($field["opt"]); ?>');
                var uploader_<?php echo ($field["name"]); ?>= WebUploader.create({
                    // 选完文件后，是否自动上传。
                      // sw<?php echo L("_F_FILE_PATH_");?>
                    swf: 'Uploader.swf',
                    // 文件接收服务端。
                    server: "<?php echo U('File/uploadPicture',array('session_id'=>session_id()));?>",
                    // 选择文件的按钮。可选。
                    // 内部根据当前运行是创建，可能是input元素，<?php echo L("_AND_IT_COULD_BE_FLASH_");?>.
                    //pick: '#upload_multi_image_<?php echo ($field["name"]); ?>',
                    pick: {'id': id, 'multi': true},
                    fileNumLimit: limit,
                    // 只允许<?php echo L("_SELECT_PICTURES_");?>文件。
                    accept: {
                        title: 'Images',
                        extensions: 'gif,jpg,jpeg,bmp,png',
                        mimeTypes: 'image/*'
                    }
                });
                uploader_<?php echo ($field["name"]); ?>.on('fileQueued', function (file) {
                    uploader_<?php echo ($field["name"]); ?>.upload();
                });
                uploader_<?php echo ($field["name"]); ?>.on('uploadFinished', function (file) {
                    uploader_<?php echo ($field["name"]); ?>.reset();
                });
                /*上传成功**/
                uploader_<?php echo ($field["name"]); ?>.on('uploadSuccess', function (file, data) {
                          if (data.status) {
                            var ids = $("[name='<?php echo ($field["name"]); ?>']").val();
                            ids = ids.split(',');
                          if( ids.indexOf(data.id) == -1){
                                var rids = admin_image.upAttachVal('add',data.id, $("[name='<?php echo ($field["name"]); ?>']"));
                              if(rids.length>limit){
                                  updateAlert(<?php echo L('_EXCEED_THE_PICTURE_LIMIT_WITH_SINGLE_');?>);
                                  return;
                              }
                              $("[name='<?php echo ($field["name"]); ?>']").parent().find('.upload-pre-item').append(
                                        ' <div class="each"><a href="'+ data.path+'" title=<?php echo L("_CLICK_TO_SEE_THE_BIG_PICTURE_WITH_DOUBLE_");?>><img src="'+ data.path+'"></a><div class="text-center opacity del_btn" ></div>' +
                                                '<div onclick="admin_image.removeImage($(this),'+data.id+')"  class="text-center del_btn"><?php echo L("_DELETE_");?></div></div>'
                                );
                            }else{
                                updateAlert(<?php echo L('_THE_PICTURE_ALREADY_EXISTS_WITH_SINGLE_');?>);
                            }
                        } else {
                            updateAlert(data.info);
                            setTimeout(function () {
                                $('#top-alert').find('button').click();
                                $(that).removeClass('disabled').prop('disabled', false);
                            }, 1500);
                        }
                });
            })
        </script><?php break;?>

    <?php case "checkbox": $importCheckBox = true; ?>
        <?php $field['value_array'] = explode(',', $field['value']); ?>
        <?php if(is_array($field["opt"])): $i = 0; $__LIST__ = $field["opt"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$option): $mod = ($i % 2 );++$i; $checked = in_array($key,$field['value_array']) ? 'checked' : ''; $inputId = "id_$field[name]_$key"; ?>
            <label for="<?php echo ($inputId); ?>"> <input type="checkbox" value="<?php echo ($key); ?>" id="<?php echo ($inputId); ?>" class="oneplus-checkbox"
                                            data-field-name="<?php echo ($field["name"]); ?>" <?php echo ($checked); ?>/>
                <?php echo ($option); ?></label><?php endforeach; endif; else: echo "" ;endif; ?>
        <input type="hidden" name="<?php echo ($field["name"]); ?>" class="oneplus-checkbox-hidden"
               data-field-name="<?php echo ($field["name"]); ?>" value="<?php echo ($field["value"]); ?>"/><?php break;?>
    <?php case "editor": echo W('Common/Ueditor/editor',array($field['name'],$field['name'],$field['value'],$field['style']['width'],$field['style']['height'],$field['config'])); break;?>
	<?php case "minieditor": ?><label class="textarea">
                            <textarea name="<?php echo ($field["name"]); ?>"><?php echo (htmlspecialchars($field["value"])); ?></textarea>
                            <link rel="stylesheet" href="/Public/static/kindeditor/default/default.css" />
			<script charset="utf-8" src="/Public/static/kindeditor/kindeditor-min.js"></script>
			<script charset="utf-8" src="/Public/static/kindeditor/zh_CN.js"></script>
			<script type="text/javascript">
				var editor<?php echo ($field["name"]); ?>;
				KindEditor.ready(function(K) {
					editor<?php echo ($field["name"]); ?> = K.create('textarea[name="<?php echo ($field["name"]); ?>"]', {
						allowFileManager : false,
						themesPath: K.basePath,
						width: '100%',
						height: '<?php echo ($field["opt"]["height"]); ?>',
						resizeType: 1,
						pasteType : 2,
						urlType : 'absolute',
						items : [
						'source', '|','fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
						'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
						'insertunorderedlist', '|', 'emoticons', 'image', 'link'],
						fileManagerJson : '<?php echo U('fileManagerJson');?>',
						//uploadJson : '<?php echo U('uploadJson');?>' }
						uploadJson : '<?php echo addons_url("EditorForAdmin://Upload/ke_upimg");?>'
					});
				});

				$(function(){
					//传统表单提交同步
					$('textarea[name="<?php echo ($field["name"]); ?>"]').closest('form').submit(function(){
						editor<?php echo ($field["name"]); ?>.sync();
					});
					//ajax提交之前同步
					$('button[type="submit"],#submit,.ajax-post').click(function(){
						editor<?php echo ($field["name"]); ?>.sync();
					});
				})
			</script>
                        </label><?php break;?>
    <?php case "markdown": echo W('Common/EditorMd/markDown',array($field['name'],$field['name'],$field['value'],$field['config'])); break;?>
    <?php case "chooseEditor": ?><span data-role="name" style="display: none"><?php echo ($field['name']); ?></span>
        <span data-role="markdown_config" style="display: none"><?php echo (urlencode($field['config']['markdown'])); ?></span>
        <span data-role="editor_config" style="display: none"><?php echo (urlencode($field['config']['editor'])); ?></span>
        <span data-role="etype" style="display: none"><?php echo ($field['editor']); ?></span>
        <input name="etype" type="hidden" value="<?php echo ($field['editor']); ?>"/>
        <?php if($field['editor'] == 'editor'): ?><button class="btn" type="button" data-role="show-markdown">切换至<span data-role="editor-type">MarkDown</span>编辑器</button>
            <div data-role="editor-box">
                <?php echo W('Common/Ueditor/editor',array($field['name'],$field['name'],$field['value'],$field['style']['width'],$field['style']['height'],$field['config']['editor']));?>
            </div>
        <?php elseif($field['editor'] == 'markdown'): ?>
            <button class="btn" type="button" data-role="show-markdown">切换至<span data-role="editor-type">富文本</span>编辑器</button>
            <div data-role="editor-box">
                <?php echo W('Common/EditorMd/markDown',array($field['name'],$field['name'],$field['value'],$field['config']['markdown']));?>
            </div><?php endif; ?>
        <script type="text/javascript" charset="utf-8" src="/Public/static/ueditor/ueditor.config.js"></script>
        <script type="text/javascript" charset="utf-8" src="/Public/static/ueditor/ueditor.all.min.js"></script>
        <script>
            var load_js_css = true ;
            var do_mk_margin = false ;
            var editor_name = '' ;
            var show_change_editor_name = '' ;
            $('[data-role="show-markdown"]').click(function(){
                var showType = changeEditorType() ;
                var data = {} ;
                if(showType == 'markdown'){
                    data.value = ue_<?php echo ($field['name']); ?>.getContent() ;
                    if(check_change(data.value) == false){
                        return false;
                    }
                    UE.getEditor("<?php echo ($field['name']); ?>_ue",[]).destroy();
                    $('#<?php echo ($field['name']); ?>_ue').remove() ;
                    $('[data-role="editor-box"]').empty() ;
                }else{
                    data.value = md_editor.getHTML() ;
                    if(check_change(data.value) == false){
                        return false;
                    }
                }
                $('[data-role="editor-type"]').html(show_change_editor_name) ;
                var url = "<?php echo U('Admin/editorTool/chooseEditor');?>" ;
                data.config = $('[data-role="'+showType+'_config"]').text() ;
                data.type = showType ;
                data.name = "<?php echo ($field['name']); ?>" ;
                data.style = "<?php echo (urlencode(json_encode($field['style']))); ?>" ;
                data.no_load = 1 ;

                if(load_js_css){
                    load_script(showType) ;
                    load_js_css=false;
                }
                $('[data-role="editor-box"]').load(url,data,function () {
                    if(do_mk_margin){
                        $(document).keydown() ;
                    }
                });
            });
            $(document).keydown(function(){
                if(do_mk_margin) {
                    $('.CodeMirror-sizer:last').css('margin-left','29px') ;
                }
            });
            function check_change(value) {
                if(value != ''){
                    return confirm('切换到'+editor_name+'编辑器可能出现排版丢失，确定要切换吗？');
                }
                return true;
            }
            function changeEditorType() {
                var type = $("span[data-role='etype']").html() ;
                var showType = '' ;
                if(type == "markdown") {
                    editor_name = '富文本' ;
                    show_change_editor_name = 'MarkDown' ;
                    showType = 'editor' ;
                    do_mk_margin = false ;
                }else if(type == "editor"){
                    editor_name = 'MarkDown' ;
                    show_change_editor_name = '富文本' ;
                    showType = 'markdown' ;
                    do_mk_margin = true ;
                }
                $("input[name='etype']").val(showType) ;
                $("span[data-role='etype']").html(showType) ;
                return showType ;
            }
            function load_script(name) {
                if (name == 'markdown'){
                    $("<link>").attr({ rel: "stylesheet",
                        type: "text/css",
                        href: "/Public/static/editor.md/css/editormd.min.css"
                    }).appendTo("head");
                    $.getScript("/Public/static/editor.md/editormd.min.js") ;
                }
            }
        </script><?php break;?>
    <?php case "textarea": ?><textarea name="<?php echo ($field["name"]); ?>" class="text input-large form-control"
                  style="height: 8em;width: 400px;height: 200px"><?php echo (htmlspecialchars($field["value"])); ?></textarea><?php break;?>
    <?php case "time": $importDatetimePicker = true; if(!$field['value']){ $field['value'] = time(); } ?>
        <input type="hidden" name="<?php echo ($field["name"]); ?>" value="<?php echo ($field["value"]); ?>"/>
        <div class="input-group date">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            <input type="text" data-field-name="<?php echo ($field["name"]); ?>" class="text input-large form-time time form-control pull-left"
                   style="width: 282px" value="<?php echo (time_format($field["value"],'H:i')); ?>" placeholder=<?php echo L("_PLEASE_CHOOSE_TIME_WITH_DOUBLE_");?>/>
        </div><?php break;?>
    <?php case "date": $importDatetimePicker = true; if(!$field['value']){ $field['value'] = time(); } ?>

        <input type="hidden" name="<?php echo ($field["name"]); ?>" value="<?php echo ($field["value"]); ?>"/>
        <div class="input-group date">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            <input type="text" data-field-name="<?php echo ($field["name"]); ?>" class="text input-large form-date time form-control pull-left"
                   style="width: 282px" value="<?php echo (time_format($field["value"],'Y-m-d')); ?>" placeholder=<?php echo L("_PLEASE_CHOOSE_TIME_WITH_DOUBLE_");?>/>
        </div><?php break;?>
    <?php case "datetime": $importDatetimePicker = true; if(!$field['value']){ $field['value'] = time(); } ?>
        <input type="hidden" name="<?php echo ($field["name"]); ?>" value="<?php echo ($field["value"]); ?>"/>
        <div class="input-group date">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            <input type="text" data-field-name="<?php echo ($field["name"]); ?>" class="text form-datetime time form-control pull-left"
                   style="width: 282px" value="<?php echo (time_format($field["value"])); ?>" placeholder=<?php echo L("_PLEASE_CHOOSE_TIME_WITH_DOUBLE_");?>/>
        </div><?php break;?>

    <!--添加城市选择（需安装城市联动插件,css样式不好处理排版有点怪）-->
    <?php case "city": ?><style type="text/css">
    			.form-control {
				display:inline-block;
				width: 120px;
				}
			</style>
            <!--修正在编辑信息时无法正常显示已经保存的地区信息-->
            <?php echo hook('J_China_City',array('province'=>$field['value']['0'],'city'=>$field['value']['1'],'district'=>$field['value']['2'],'community'=>$field['value']['3'])); break;?>

    <!--弹出窗口选择并返回值（目前只支持返回ID）开始->
    <?php case "dataselect": ?><input type="text" name="<?php echo ($field["name"]); ?>" id="<?php echo ($field["name"]); ?>" value="<?php echo (htmlspecialchars($field["value"])); ?>"
               class="text input-large form-control" style="width: 400px;display:inline-block;"/><input class="btn" style="margin-left:10px" type="button" value=<?php echo L("_CHOICE_WITH_DOUBLE_");?> onclick="openwin('<?php echo ($field["opt"]); ?>','600','500')">
			     <script type="text/javascript">
						//弹出窗口
						function openwin(url,width,height){
						    var l=window.screen.width ;
						    var w= window.screen.height;
						    var al=(l-width)/2;
						    var aw=(w-height)/2;
						    var OpenWindow=window.open(url,<?php echo L("_POP_UP_WINDOW_WITH_DOUBLE_");?>,"toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=yes,width="+width+",height="+height+",top="+aw+",left="+al+"");
						    OpenWindow.focus();
						if(OpenWindow!=null){ //弹出窗口关闭事件
						//if(window.attachEvent) OpenWindow.attachEvent("onbeforeunload",   quickOut);
						if(window.attachEvent) OpenWindow.attachEvent("onunload",   quickOut);
						}
						}
						//关闭触发方法
						function quickOut()
						{
						alert(<?php echo L("_THE_WINDOW_IS_CLOSED_WITH_DOUBLE_");?>);
						}
				 </script><?php break;?>
	<!--弹出窗口选择并返回值（目前只支持返回ID）结束 -->

    <?php case "nestable": $has_nestable=1; ?>
        <input type="hidden" name="<?php echo ($field["name"]); ?>" value='<?php echo json_encode($field["value"]);?>'/>
        <div class="nestables nestable-group" data-name="<?php echo ($field["name"]); ?>">
            <?php foreach($field['value'] as $key =>$nestable){ ?>
            <div class="portlet light bordered" data-id="<?php echo ($nestable['data-id']); ?>" data-title="<?php echo ($nestable['title']); ?>" style="float:left;margin-right:10px;width: <?php echo ((isset($nestable['width']) && ($nestable['width'] !== ""))?($nestable['width']):300); ?>px;">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject font-green sbold uppercase"><strong><?php echo ($nestable['title']); ?></strong></span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="dd nestable_list_one" id="nestable_list_<?php echo ($key+1); ?>">
                        <?php if(!empty($nestable["items"])): ?><ol class="dd-list">
                                <?php if(is_array($nestable["items"])): $i = 0; $__LIST__ = $nestable["items"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="dd-item" data-id="<?php echo ($vo["data-id"]); ?>" data-title="<?php echo ($vo["title"]); ?>">
                                        <div class="dd-handle"> <?php echo ($vo["title"]); ?> </div>
                                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ol>
                            <?php else: ?>
                            <div class="dd-empty"></div><?php endif; ?>
                    </div>
                </div>
            </div>
            <?php } ?>
            <div class="clearfix"></div>
        </div><?php break;?>
    <?php case "chosen": $chosen_select2=true; ?>
        <select name="<?php echo ($field["name"]); ?>[]" class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="<?php echo ($field["title"]); ?>" style="width: 400px" tabindex="-1" aria-hidden="true">
            <?php if( key($field['opt']) === 0){ ?>
            <?php if(is_array($field['opt'])): $i = 0; $__LIST__ = $field['opt'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$option): $mod = ($i % 2 );++$i; $selected = in_array(reset($option),$field['value'])? 'selected' : ''; ?>
                <option value="<?php echo reset($option);?>" <?php echo ($selected); ?>><?php echo (htmlspecialchars(end($option))); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            <?php }else{ foreach($field['opt'] as $optgroupkey =>$optgroup){ ?>
            <optgroup label="<?php echo ($optgroupkey); ?>">
                <?php if(is_array($optgroup)): $i = 0; $__LIST__ = $optgroup;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$option): $mod = ($i % 2 );++$i; $selected = in_array(reset($option),$field['value'])? 'selected' : ''; ?>
                    <option value="<?php echo reset($option);?>" <?php echo ($selected); ?>><?php echo (htmlspecialchars(end($option))); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            </optgroup>
            <?php } } ?>
        </select><?php break;?>
    <?php case "multiInput": ?><div class="clearfix" style="<?php echo ($field['style']); ?>">
        <?php $field['name'] = is_array($field['name'])?$field['name']:explode('|',$field['name']); foreach($field['name'] as $key=>$val){ ?>
        <?php switch($field['config'][$key]['type']): case "text": ?><input type="text" name="<?php echo ($val); ?>" value="<?php echo (htmlspecialchars($field['value'][$key])); ?>"
                       class=" pull-left text form-control" style="<?php echo ($field['config'][$key]['style']); ?>" placeholder="<?php echo ($field['config'][$key]['placeholder']); ?>"/><?php break;?>
            <?php case "select": ?><select name="<?php echo ($val); ?>" class="pull-left form-control" style="<?php echo ($field['config'][$key]['style']); ?>" >
                    <?php foreach($field['config'][$key]['opt'] as $key_opt =>$option){ ?>
                    <?php $selected = $field['value'][$key]==$key_opt ? 'selected' : ''; ?>
                    <option value="<?php echo ($key_opt); ?>"<?php echo ($selected); ?>><?php echo (htmlspecialchars($option)); ?></option>
                    <?php } ?>
                </select><?php break; endswitch;?>
        <?php } ?>
        </div><?php break;?>

    <?php case "autoComplete": $delimiter = $field['opt']['delimiter']?$field['opt']['delimiter']:','; ?>

        <input type="text" name="<?php echo ($field["name"]); ?>" value="<?php echo (htmlspecialchars($field["value"])); ?>"
               class="text input-large form-control" style="width: 400px"/>

        <script src="/Public/js/ext/tokeninput/jquery.tokeninput.js"></script>
        <link href="/Public/js/ext/tokeninput/token-input-facebook.css" rel="stylesheet">

        <script>
            $(function () {
                $('[name="<?php echo ($field["name"]); ?>"]').tokenInput("<?php echo ($field['opt']['url']); ?>", {
                    theme: "facebook",
                    preventDuplicates: true,
                    tokenDelimiter: "<?php echo ($delimiter); ?>",
                    value: '<?php echo (htmlspecialchars($field["value"])); ?>'
                });
            });
        </script><?php break;?>



    <?php case "userDefined": echo ($field["definedHtml"]); break;?>

    <?php default: ?>
    <span style="color: #f00;"><?php echo L("_ERROR_"); echo L("_COLON_"); echo L("_UNKNOWN_FIELD_TYPE_"); echo ($field["type"]); ?></span>
    <input type="hidden" name="<?php echo ($field["name"]); ?>" value="<?php echo (htmlspecialchars($field["value"])); ?>"/><?php endswitch;?>
</div>
                                <?php } endforeach; endif; else: echo "" ;endif; ?>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>

                    <?php }else{ ?>
                    <?php if(is_array($keyList)): $i = 0; $__LIST__ = $keyList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$field): $mod = ($i % 2 );++$i;?><label class="item-label"><?php echo (htmlspecialchars($field["title"])); ?>
    <?php if($field['subtitle']): ?><span class="check-tips">（<?php echo ($field["subtitle"]); ?>）</span><?php endif; ?>
</label>
<?php if($field['name'] == 'action'): ?><p style="color: #f00;"><?php echo L("_DEVELOPMENT_STAFF_ATTENTION_"); echo L("_YOU_USE_A_FIELD_NAMED_ACTION_");?>，<?php echo L("_BECAUSE_THIS_FIELD_NAME_WILL_BE_WITH_FORM_");?>[action]<?php echo L("_CONFLICT_WHICH_CAUSES_THE_FORM_TO_BE_UNABLE_TO_COMMIT_PLEASE_USE_ANOTHER_NAME_");?></p><?php endif; ?>
<div class="controls ">
<?php switch($field["type"]): case "text": ?><input type="text" name="<?php echo ($field["name"]); ?>" value="<?php echo (htmlspecialchars($field["value"])); ?>"
               class="text input-large form-control" style="width: 400px"/><?php break;?>

    <?php case "label": echo ($field["value"]); break;?>


    <?php case "hidden": ?><input type="hidden" name="<?php echo ($field["name"]); ?>" value="<?php echo ($field["value"]); ?>" class="text input-large"/><?php break;?>
    <?php case "readonly": ?><input type="hidden" name="<?php echo ($field["name"]); ?>" value="<?php echo ($field["value"]); ?>" class="text input-large form-control"
               style="width: 400px" placeholder=<?php echo L("_NO_NEED_TO_FILL_IN_WITH_DOUBLE_");?> readonly/>
        <p class="lead" ><?php echo ($field["value"]); ?></p><?php break;?>
    <?php case "area_readonly": ?><p class="lead" ><?php echo ($field["value"]); ?></p><?php break;?>
    <?php case "integer": ?><input type="text" name="<?php echo ($field["name"]); ?>" value="<?php echo ($field["value"]); ?>" class="text input-large form-control"
               style="width: 400px"/><?php break;?>
    <?php case "uid": ?><input type="text" name="<?php echo ($field["name"]); ?>" value="<?php echo ($field["value"]); ?>" class="text input-large form-control"
               style="width: 100px"/><?php break;?>
    <?php case "select": ?><select name="<?php echo ($field["name"]); ?>" class="form-control" style="width:auto;">
            <?php if(is_array($field["opt"])): $i = 0; $__LIST__ = $field["opt"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$option): $mod = ($i % 2 );++$i; $selected = $field['value']==$key ? 'selected' : ''; ?>
                <option value="<?php echo ($key); ?>"
                <?php echo ($selected); ?>><?php echo (htmlspecialchars($option)); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
        </select><?php break;?>
    <?php case "colorPicker": $colorPicker = 1; ?>
        <div class="color-picker" style="width:100px;height: 30px;">
            <input type="text" name="<?php echo ($field["name"]); ?>" class="simple_color_callback form-control" onchange="setColorPicker(this);" value="<?php echo ((isset($field["value"]) && ($field["value"] !== ""))?($field["value"]):''); ?>" style="width: 100px;"/>
        </div><?php break;?>
    <?php case "radio": if(is_array($field["opt"])): $i = 0; $__LIST__ = $field["opt"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$option): $mod = ($i % 2 );++$i; $checked = $field['value']==$key ? 'checked' : ''; $inputId = "id_$field[name]_$key"; ?>
            <label for="<?php echo ($inputId); ?>"> <input id="<?php echo ($inputId); ?>" name="<?php echo ($field["name"]); ?>" value="<?php echo ($key); ?>" type="radio"
                <?php echo ($checked); ?>/>
                <?php echo ($option); ?></label> &nbsp;&nbsp;&nbsp;&nbsp;<?php endforeach; endif; else: echo "" ;endif; break;?>
    <?php case "icon": ?><div class='icon-chose' title=<?php echo L("_SELECT_ICON_WITH_DOUBLE_");?> style="width: 400px;">
            <select name="<?php echo ($field["name"]); ?>" title=<?php echo L("_SELECT_ICON_WITH_DOUBLE_");?> class="chosen-icons" data-value="<?php echo ((isset($field["value"]) && ($field["value"] !== ""))?($field["value"]):'icon-star'); ?>"></select>
        </div>
        <?php if(!$have_icon){ $have_icon=1; ?>
        <script src="__ZUI__/lib/chosen/chosen.icons.min.js"></script>
        <link href="__ZUI__/lib/chosen/chosen.icons.css" rel="stylesheet">
        <?php } ?>
        <script>
            $(function(){
                $('.chosen-container').remove()
                $('form select.chosen-icons').attr('class','chosen-icons');
                $('form select.chosen-icons').data('zui.chosenIcons',null);
                $('form select.chosen-icons').data('chosen',null);
                $('form select.chosen-icons').chosenIcons();
            });
        </script><?php break;?>

    <?php case "singleFile": echo W('Common/UploadFile/render',array(array('name'=>$field['name'],'value'=>$field['value']))); break;?>
    <?php case "multiFile": echo W('Common/UploadMultiFile/render',array(array('name'=>$field['name'],'limit'=>9,'value'=>$field['value']))); break;?>
    <?php case "image": ?><div class="controls">
                            <input type="file" id="upload_picture_<?php echo ($field["name"]); ?>">
                            <input type="hidden" name="<?php echo ($field["name"]); ?>" id="cover_id_<?php echo ($field["name"]); ?>" value="<?php echo ($field['value']); ?>"/>
                            <div class="upload-img-box">
                                <?php if(!empty($field["value"])): ?><div class="upload-pre-item"><img src="<?php echo (get_cover($field["value"],'path')); ?>"/></div><?php endif; ?>
                            </div>
                        </div>
                        <script type="text/javascript">
						$(function(){
						
                            //上传图片
                            /* 初始化上传插件 */
                            $("#upload_picture_<?php echo ($field["name"]); ?>").uploadify({
                                "height"          : 30,
                                "swf"             : "/Public/static/uploadify/uploadify.swf",
                                "fileObjName"     : "download",
                                "buttonText"      : "上传图片",
                                "uploader"        : "<?php echo U('File/uploadPicture',array('session_id'=>session_id()));?>",
                                "width"           : 120,
                                'removeTimeout'	  : 1,
                                'fileTypeExts'	  : '*.jpg; *.png; *.gif;',
                                "onUploadSuccess" : uploadPicture<?php echo ($field["name"]); ?>,
                                'onFallback' : function() {
                                    alert('未检测到兼容版本的Flash.');
                                }
                            });
                            function uploadPicture<?php echo ($field["name"]); ?>(file, data){
							    //alert(data.toString());
                                var data = $.parseJSON(data);
                                var src = '';
                                if(data.status){
                                    $("#cover_id_<?php echo ($field["name"]); ?>").val(data.id);
                                    src = data.url || '' + data.path
                                    $("#cover_id_<?php echo ($field["name"]); ?>").parent().find('.upload-img-box').html(
                                            '<div class="upload-pre-item"><img src="' + src + '"/></div>'
                                    );
                                } else {
                                    updateAlert(data.info);
                                    setTimeout(function(){
                                        $('#top-alert').find('button').click();
                                        $(that).removeClass('disabled').prop('disabled',false);
                                    },1500);
                                }
                            }
						})	
                        </script><?php break;?>
    <?php case "singleImage": ?><div class="controls">
            <div id="upload_single_image_<?php echo ($field["name"]); ?>" style="padding-bottom: 5px;"><?php echo L("_SELECT_PICTURES_");?></div>
            <input class="attach" type="hidden" name="<?php echo ($field["name"]); ?>" value="<?php echo ($field['value']); ?>"/>
            <div class="upload-img-box">
                <div class="upload-pre-item popup-gallery">

                <?php if(!empty($field["value"])): ?><div class="each">
                    <a href="<?php echo (get_cover($field["value"],'path')); ?>" title=<?php echo L("_CLICK_TO_SEE_THE_BIG_PICTURE_WITH_DOUBLE_");?>>
                        <img src="<?php echo (get_cover($field["value"],'path')); ?>">
                    </a>
                        <div class="text-center opacity del_btn" ></div>
                        <div onclick="admin_image.removeImage($(this),'<?php echo ($field["value"]); ?>')"  class="text-center del_btn"><?php echo L("_DELETE_");?></div>
                    </div><?php endif; ?>
                </div>
            </div>
        </div>
        <script>
            $(function () {
                var uploader_<?php echo ($field["name"]); ?>= WebUploader.create({
                    // 选完文件后，是否自动上传。
                    auto: true,
                    // swf文件路径
                    swf: 'Uploader.swf',
                    // 文件接收服务端。
                    server: "<?php echo U('File/uploadPicture',array('session_id'=>session_id()));?>",
                    // 选择文件的按钮。可选。
                    // 内部根据当前运行是创建，可能是input元素，也可能是flash.
                    pick: '#upload_single_image_<?php echo ($field["name"]); ?>',
                    // 只允许选择图片文件
                    accept: {
                        title: 'Images',
                        extensions: 'gif,jpg,jpeg,bmp,png',
                        mimeTypes: 'image/*'
                    }
                });
                uploader_<?php echo ($field["name"]); ?>.on('fileQueued', function (file) {
                    uploader_<?php echo ($field["name"]); ?>.upload();
                });
                /*上传成功**/
                uploader_<?php echo ($field["name"]); ?>.on('uploadSuccess', function (file, data) {
                    if (data.status) {
                        $("[name='<?php echo ($field["name"]); ?>']").val(data.id);
                        $("[name='<?php echo ($field["name"]); ?>']").parent().find('.upload-pre-item').html(
                                ' <div class="each"><a href="'+ data.path+'" title=<?php echo L("_CLICK_TO_SEE_THE_BIG_PICTURE_WITH_DOUBLE_");?>><img src="'+ data.path+'"></a><div class="text-center opacity del_btn" ></div>' +
                                        '<div onclick="admin_image.removeImage($(this),'+data.id+')"  class="text-center del_btn"><?php echo L("_DELETE_");?></div></div>'
                        );
                        uploader_<?php echo ($field["name"]); ?>.reset();
                    } else {
                        updateAlert(data.info);
                        setTimeout(function () {
                            $('#top-alert').find('button').click();
                            $(that).removeClass('disabled').prop('disabled', false);
                        }, 1500);
                    }
                });
            })
        </script><?php break;?>
    <?php case "multiImage": ?><div class="controls multiImage">
            <div id="upload_multi_image_<?php echo ($field["name"]); ?>" style="padding-bottom: 5px;"><?php echo L("_SELECT_PICTURES_");?></div>
            <input class="attach" type="hidden" name="<?php echo ($field["name"]); ?>" value="<?php echo ($field['value']); ?>"/>
            <div class="upload-img-box">
                <div class="upload-pre-item popup-gallery">

                    <?php if(!empty($field["value"])): $aIds = explode(',',$field['value']); ?>
                        <?php if(is_array($aIds)): $i = 0; $__LIST__ = $aIds;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$aId): $mod = ($i % 2 );++$i;?><div class="each">
                                <a href="<?php echo (get_cover($aId,'path')); ?>" title=<?php echo L("_CLICK_TO_SEE_THE_BIG_PICTURE_WITH_DOUBLE_");?>>
                                    <img src="<?php echo (get_cover($aId,'path')); ?>">
                                </a>
                                <div class="text-center opacity del_btn" ></div>
                                <div onclick="admin_image.removeImage($(this),'<?php echo ($aId); ?>')"  class="text-center del_btn"><?php echo L("_DELETE_");?></div>
                            </div><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                </div>
            </div>
        </div>
        <script>
            $(function () {
                var id = "#upload_multi_image_<?php echo ($field["name"]); ?>";
                var limit = parseInt('<?php echo ($field["opt"]); ?>');
                var uploader_<?php echo ($field["name"]); ?>= WebUploader.create({
                    // 选完文件后，是否自动上传。
                      // sw<?php echo L("_F_FILE_PATH_");?>
                    swf: 'Uploader.swf',
                    // 文件接收服务端。
                    server: "<?php echo U('File/uploadPicture',array('session_id'=>session_id()));?>",
                    // 选择文件的按钮。可选。
                    // 内部根据当前运行是创建，可能是input元素，<?php echo L("_AND_IT_COULD_BE_FLASH_");?>.
                    //pick: '#upload_multi_image_<?php echo ($field["name"]); ?>',
                    pick: {'id': id, 'multi': true},
                    fileNumLimit: limit,
                    // 只允许<?php echo L("_SELECT_PICTURES_");?>文件。
                    accept: {
                        title: 'Images',
                        extensions: 'gif,jpg,jpeg,bmp,png',
                        mimeTypes: 'image/*'
                    }
                });
                uploader_<?php echo ($field["name"]); ?>.on('fileQueued', function (file) {
                    uploader_<?php echo ($field["name"]); ?>.upload();
                });
                uploader_<?php echo ($field["name"]); ?>.on('uploadFinished', function (file) {
                    uploader_<?php echo ($field["name"]); ?>.reset();
                });
                /*上传成功**/
                uploader_<?php echo ($field["name"]); ?>.on('uploadSuccess', function (file, data) {
                          if (data.status) {
                            var ids = $("[name='<?php echo ($field["name"]); ?>']").val();
                            ids = ids.split(',');
                          if( ids.indexOf(data.id) == -1){
                                var rids = admin_image.upAttachVal('add',data.id, $("[name='<?php echo ($field["name"]); ?>']"));
                              if(rids.length>limit){
                                  updateAlert(<?php echo L('_EXCEED_THE_PICTURE_LIMIT_WITH_SINGLE_');?>);
                                  return;
                              }
                              $("[name='<?php echo ($field["name"]); ?>']").parent().find('.upload-pre-item').append(
                                        ' <div class="each"><a href="'+ data.path+'" title=<?php echo L("_CLICK_TO_SEE_THE_BIG_PICTURE_WITH_DOUBLE_");?>><img src="'+ data.path+'"></a><div class="text-center opacity del_btn" ></div>' +
                                                '<div onclick="admin_image.removeImage($(this),'+data.id+')"  class="text-center del_btn"><?php echo L("_DELETE_");?></div></div>'
                                );
                            }else{
                                updateAlert(<?php echo L('_THE_PICTURE_ALREADY_EXISTS_WITH_SINGLE_');?>);
                            }
                        } else {
                            updateAlert(data.info);
                            setTimeout(function () {
                                $('#top-alert').find('button').click();
                                $(that).removeClass('disabled').prop('disabled', false);
                            }, 1500);
                        }
                });
            })
        </script><?php break;?>

    <?php case "checkbox": $importCheckBox = true; ?>
        <?php $field['value_array'] = explode(',', $field['value']); ?>
        <?php if(is_array($field["opt"])): $i = 0; $__LIST__ = $field["opt"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$option): $mod = ($i % 2 );++$i; $checked = in_array($key,$field['value_array']) ? 'checked' : ''; $inputId = "id_$field[name]_$key"; ?>
            <label for="<?php echo ($inputId); ?>"> <input type="checkbox" value="<?php echo ($key); ?>" id="<?php echo ($inputId); ?>" class="oneplus-checkbox"
                                            data-field-name="<?php echo ($field["name"]); ?>" <?php echo ($checked); ?>/>
                <?php echo ($option); ?></label><?php endforeach; endif; else: echo "" ;endif; ?>
        <input type="hidden" name="<?php echo ($field["name"]); ?>" class="oneplus-checkbox-hidden"
               data-field-name="<?php echo ($field["name"]); ?>" value="<?php echo ($field["value"]); ?>"/><?php break;?>
    <?php case "editor": echo W('Common/Ueditor/editor',array($field['name'],$field['name'],$field['value'],$field['style']['width'],$field['style']['height'],$field['config'])); break;?>
	<?php case "minieditor": ?><label class="textarea">
                            <textarea name="<?php echo ($field["name"]); ?>"><?php echo (htmlspecialchars($field["value"])); ?></textarea>
                            <link rel="stylesheet" href="/Public/static/kindeditor/default/default.css" />
			<script charset="utf-8" src="/Public/static/kindeditor/kindeditor-min.js"></script>
			<script charset="utf-8" src="/Public/static/kindeditor/zh_CN.js"></script>
			<script type="text/javascript">
				var editor<?php echo ($field["name"]); ?>;
				KindEditor.ready(function(K) {
					editor<?php echo ($field["name"]); ?> = K.create('textarea[name="<?php echo ($field["name"]); ?>"]', {
						allowFileManager : false,
						themesPath: K.basePath,
						width: '100%',
						height: '<?php echo ($field["opt"]["height"]); ?>',
						resizeType: 1,
						pasteType : 2,
						urlType : 'absolute',
						items : [
						'source', '|','fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
						'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
						'insertunorderedlist', '|', 'emoticons', 'image', 'link'],
						fileManagerJson : '<?php echo U('fileManagerJson');?>',
						//uploadJson : '<?php echo U('uploadJson');?>' }
						uploadJson : '<?php echo addons_url("EditorForAdmin://Upload/ke_upimg");?>'
					});
				});

				$(function(){
					//传统表单提交同步
					$('textarea[name="<?php echo ($field["name"]); ?>"]').closest('form').submit(function(){
						editor<?php echo ($field["name"]); ?>.sync();
					});
					//ajax提交之前同步
					$('button[type="submit"],#submit,.ajax-post').click(function(){
						editor<?php echo ($field["name"]); ?>.sync();
					});
				})
			</script>
                        </label><?php break;?>
    <?php case "markdown": echo W('Common/EditorMd/markDown',array($field['name'],$field['name'],$field['value'],$field['config'])); break;?>
    <?php case "chooseEditor": ?><span data-role="name" style="display: none"><?php echo ($field['name']); ?></span>
        <span data-role="markdown_config" style="display: none"><?php echo (urlencode($field['config']['markdown'])); ?></span>
        <span data-role="editor_config" style="display: none"><?php echo (urlencode($field['config']['editor'])); ?></span>
        <span data-role="etype" style="display: none"><?php echo ($field['editor']); ?></span>
        <input name="etype" type="hidden" value="<?php echo ($field['editor']); ?>"/>
        <?php if($field['editor'] == 'editor'): ?><button class="btn" type="button" data-role="show-markdown">切换至<span data-role="editor-type">MarkDown</span>编辑器</button>
            <div data-role="editor-box">
                <?php echo W('Common/Ueditor/editor',array($field['name'],$field['name'],$field['value'],$field['style']['width'],$field['style']['height'],$field['config']['editor']));?>
            </div>
        <?php elseif($field['editor'] == 'markdown'): ?>
            <button class="btn" type="button" data-role="show-markdown">切换至<span data-role="editor-type">富文本</span>编辑器</button>
            <div data-role="editor-box">
                <?php echo W('Common/EditorMd/markDown',array($field['name'],$field['name'],$field['value'],$field['config']['markdown']));?>
            </div><?php endif; ?>
        <script type="text/javascript" charset="utf-8" src="/Public/static/ueditor/ueditor.config.js"></script>
        <script type="text/javascript" charset="utf-8" src="/Public/static/ueditor/ueditor.all.min.js"></script>
        <script>
            var load_js_css = true ;
            var do_mk_margin = false ;
            var editor_name = '' ;
            var show_change_editor_name = '' ;
            $('[data-role="show-markdown"]').click(function(){
                var showType = changeEditorType() ;
                var data = {} ;
                if(showType == 'markdown'){
                    data.value = ue_<?php echo ($field['name']); ?>.getContent() ;
                    if(check_change(data.value) == false){
                        return false;
                    }
                    UE.getEditor("<?php echo ($field['name']); ?>_ue",[]).destroy();
                    $('#<?php echo ($field['name']); ?>_ue').remove() ;
                    $('[data-role="editor-box"]').empty() ;
                }else{
                    data.value = md_editor.getHTML() ;
                    if(check_change(data.value) == false){
                        return false;
                    }
                }
                $('[data-role="editor-type"]').html(show_change_editor_name) ;
                var url = "<?php echo U('Admin/editorTool/chooseEditor');?>" ;
                data.config = $('[data-role="'+showType+'_config"]').text() ;
                data.type = showType ;
                data.name = "<?php echo ($field['name']); ?>" ;
                data.style = "<?php echo (urlencode(json_encode($field['style']))); ?>" ;
                data.no_load = 1 ;

                if(load_js_css){
                    load_script(showType) ;
                    load_js_css=false;
                }
                $('[data-role="editor-box"]').load(url,data,function () {
                    if(do_mk_margin){
                        $(document).keydown() ;
                    }
                });
            });
            $(document).keydown(function(){
                if(do_mk_margin) {
                    $('.CodeMirror-sizer:last').css('margin-left','29px') ;
                }
            });
            function check_change(value) {
                if(value != ''){
                    return confirm('切换到'+editor_name+'编辑器可能出现排版丢失，确定要切换吗？');
                }
                return true;
            }
            function changeEditorType() {
                var type = $("span[data-role='etype']").html() ;
                var showType = '' ;
                if(type == "markdown") {
                    editor_name = '富文本' ;
                    show_change_editor_name = 'MarkDown' ;
                    showType = 'editor' ;
                    do_mk_margin = false ;
                }else if(type == "editor"){
                    editor_name = 'MarkDown' ;
                    show_change_editor_name = '富文本' ;
                    showType = 'markdown' ;
                    do_mk_margin = true ;
                }
                $("input[name='etype']").val(showType) ;
                $("span[data-role='etype']").html(showType) ;
                return showType ;
            }
            function load_script(name) {
                if (name == 'markdown'){
                    $("<link>").attr({ rel: "stylesheet",
                        type: "text/css",
                        href: "/Public/static/editor.md/css/editormd.min.css"
                    }).appendTo("head");
                    $.getScript("/Public/static/editor.md/editormd.min.js") ;
                }
            }
        </script><?php break;?>
    <?php case "textarea": ?><textarea name="<?php echo ($field["name"]); ?>" class="text input-large form-control"
                  style="height: 8em;width: 400px;height: 200px"><?php echo (htmlspecialchars($field["value"])); ?></textarea><?php break;?>
    <?php case "time": $importDatetimePicker = true; if(!$field['value']){ $field['value'] = time(); } ?>
        <input type="hidden" name="<?php echo ($field["name"]); ?>" value="<?php echo ($field["value"]); ?>"/>
        <div class="input-group date">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            <input type="text" data-field-name="<?php echo ($field["name"]); ?>" class="text input-large form-time time form-control pull-left"
                   style="width: 282px" value="<?php echo (time_format($field["value"],'H:i')); ?>" placeholder=<?php echo L("_PLEASE_CHOOSE_TIME_WITH_DOUBLE_");?>/>
        </div><?php break;?>
    <?php case "date": $importDatetimePicker = true; if(!$field['value']){ $field['value'] = time(); } ?>

        <input type="hidden" name="<?php echo ($field["name"]); ?>" value="<?php echo ($field["value"]); ?>"/>
        <div class="input-group date">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            <input type="text" data-field-name="<?php echo ($field["name"]); ?>" class="text input-large form-date time form-control pull-left"
                   style="width: 282px" value="<?php echo (time_format($field["value"],'Y-m-d')); ?>" placeholder=<?php echo L("_PLEASE_CHOOSE_TIME_WITH_DOUBLE_");?>/>
        </div><?php break;?>
    <?php case "datetime": $importDatetimePicker = true; if(!$field['value']){ $field['value'] = time(); } ?>
        <input type="hidden" name="<?php echo ($field["name"]); ?>" value="<?php echo ($field["value"]); ?>"/>
        <div class="input-group date">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            <input type="text" data-field-name="<?php echo ($field["name"]); ?>" class="text form-datetime time form-control pull-left"
                   style="width: 282px" value="<?php echo (time_format($field["value"])); ?>" placeholder=<?php echo L("_PLEASE_CHOOSE_TIME_WITH_DOUBLE_");?>/>
        </div><?php break;?>

    <!--添加城市选择（需安装城市联动插件,css样式不好处理排版有点怪）-->
    <?php case "city": ?><style type="text/css">
    			.form-control {
				display:inline-block;
				width: 120px;
				}
			</style>
            <!--修正在编辑信息时无法正常显示已经保存的地区信息-->
            <?php echo hook('J_China_City',array('province'=>$field['value']['0'],'city'=>$field['value']['1'],'district'=>$field['value']['2'],'community'=>$field['value']['3'])); break;?>

    <!--弹出窗口选择并返回值（目前只支持返回ID）开始->
    <?php case "dataselect": ?><input type="text" name="<?php echo ($field["name"]); ?>" id="<?php echo ($field["name"]); ?>" value="<?php echo (htmlspecialchars($field["value"])); ?>"
               class="text input-large form-control" style="width: 400px;display:inline-block;"/><input class="btn" style="margin-left:10px" type="button" value=<?php echo L("_CHOICE_WITH_DOUBLE_");?> onclick="openwin('<?php echo ($field["opt"]); ?>','600','500')">
			     <script type="text/javascript">
						//弹出窗口
						function openwin(url,width,height){
						    var l=window.screen.width ;
						    var w= window.screen.height;
						    var al=(l-width)/2;
						    var aw=(w-height)/2;
						    var OpenWindow=window.open(url,<?php echo L("_POP_UP_WINDOW_WITH_DOUBLE_");?>,"toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=yes,width="+width+",height="+height+",top="+aw+",left="+al+"");
						    OpenWindow.focus();
						if(OpenWindow!=null){ //弹出窗口关闭事件
						//if(window.attachEvent) OpenWindow.attachEvent("onbeforeunload",   quickOut);
						if(window.attachEvent) OpenWindow.attachEvent("onunload",   quickOut);
						}
						}
						//关闭触发方法
						function quickOut()
						{
						alert(<?php echo L("_THE_WINDOW_IS_CLOSED_WITH_DOUBLE_");?>);
						}
				 </script><?php break;?>
	<!--弹出窗口选择并返回值（目前只支持返回ID）结束 -->

    <?php case "nestable": $has_nestable=1; ?>
        <input type="hidden" name="<?php echo ($field["name"]); ?>" value='<?php echo json_encode($field["value"]);?>'/>
        <div class="nestables nestable-group" data-name="<?php echo ($field["name"]); ?>">
            <?php foreach($field['value'] as $key =>$nestable){ ?>
            <div class="portlet light bordered" data-id="<?php echo ($nestable['data-id']); ?>" data-title="<?php echo ($nestable['title']); ?>" style="float:left;margin-right:10px;width: <?php echo ((isset($nestable['width']) && ($nestable['width'] !== ""))?($nestable['width']):300); ?>px;">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject font-green sbold uppercase"><strong><?php echo ($nestable['title']); ?></strong></span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="dd nestable_list_one" id="nestable_list_<?php echo ($key+1); ?>">
                        <?php if(!empty($nestable["items"])): ?><ol class="dd-list">
                                <?php if(is_array($nestable["items"])): $i = 0; $__LIST__ = $nestable["items"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="dd-item" data-id="<?php echo ($vo["data-id"]); ?>" data-title="<?php echo ($vo["title"]); ?>">
                                        <div class="dd-handle"> <?php echo ($vo["title"]); ?> </div>
                                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ol>
                            <?php else: ?>
                            <div class="dd-empty"></div><?php endif; ?>
                    </div>
                </div>
            </div>
            <?php } ?>
            <div class="clearfix"></div>
        </div><?php break;?>
    <?php case "chosen": $chosen_select2=true; ?>
        <select name="<?php echo ($field["name"]); ?>[]" class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="<?php echo ($field["title"]); ?>" style="width: 400px" tabindex="-1" aria-hidden="true">
            <?php if( key($field['opt']) === 0){ ?>
            <?php if(is_array($field['opt'])): $i = 0; $__LIST__ = $field['opt'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$option): $mod = ($i % 2 );++$i; $selected = in_array(reset($option),$field['value'])? 'selected' : ''; ?>
                <option value="<?php echo reset($option);?>" <?php echo ($selected); ?>><?php echo (htmlspecialchars(end($option))); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            <?php }else{ foreach($field['opt'] as $optgroupkey =>$optgroup){ ?>
            <optgroup label="<?php echo ($optgroupkey); ?>">
                <?php if(is_array($optgroup)): $i = 0; $__LIST__ = $optgroup;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$option): $mod = ($i % 2 );++$i; $selected = in_array(reset($option),$field['value'])? 'selected' : ''; ?>
                    <option value="<?php echo reset($option);?>" <?php echo ($selected); ?>><?php echo (htmlspecialchars(end($option))); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            </optgroup>
            <?php } } ?>
        </select><?php break;?>
    <?php case "multiInput": ?><div class="clearfix" style="<?php echo ($field['style']); ?>">
        <?php $field['name'] = is_array($field['name'])?$field['name']:explode('|',$field['name']); foreach($field['name'] as $key=>$val){ ?>
        <?php switch($field['config'][$key]['type']): case "text": ?><input type="text" name="<?php echo ($val); ?>" value="<?php echo (htmlspecialchars($field['value'][$key])); ?>"
                       class=" pull-left text form-control" style="<?php echo ($field['config'][$key]['style']); ?>" placeholder="<?php echo ($field['config'][$key]['placeholder']); ?>"/><?php break;?>
            <?php case "select": ?><select name="<?php echo ($val); ?>" class="pull-left form-control" style="<?php echo ($field['config'][$key]['style']); ?>" >
                    <?php foreach($field['config'][$key]['opt'] as $key_opt =>$option){ ?>
                    <?php $selected = $field['value'][$key]==$key_opt ? 'selected' : ''; ?>
                    <option value="<?php echo ($key_opt); ?>"<?php echo ($selected); ?>><?php echo (htmlspecialchars($option)); ?></option>
                    <?php } ?>
                </select><?php break; endswitch;?>
        <?php } ?>
        </div><?php break;?>

    <?php case "autoComplete": $delimiter = $field['opt']['delimiter']?$field['opt']['delimiter']:','; ?>

        <input type="text" name="<?php echo ($field["name"]); ?>" value="<?php echo (htmlspecialchars($field["value"])); ?>"
               class="text input-large form-control" style="width: 400px"/>

        <script src="/Public/js/ext/tokeninput/jquery.tokeninput.js"></script>
        <link href="/Public/js/ext/tokeninput/token-input-facebook.css" rel="stylesheet">

        <script>
            $(function () {
                $('[name="<?php echo ($field["name"]); ?>"]').tokenInput("<?php echo ($field['opt']['url']); ?>", {
                    theme: "facebook",
                    preventDuplicates: true,
                    tokenDelimiter: "<?php echo ($delimiter); ?>",
                    value: '<?php echo (htmlspecialchars($field["value"])); ?>'
                });
            });
        </script><?php break;?>



    <?php case "userDefined": echo ($field["definedHtml"]); break;?>

    <?php default: ?>
    <span style="color: #f00;"><?php echo L("_ERROR_"); echo L("_COLON_"); echo L("_UNKNOWN_FIELD_TYPE_"); echo ($field["type"]); ?></span>
    <input type="hidden" name="<?php echo ($field["name"]); ?>" value="<?php echo (htmlspecialchars($field["value"])); ?>"/><?php endswitch;?>
</div><?php endforeach; endif; else: echo "" ;endif; ?>
                    <?php } ?>
                    <br/>
                    <div class="form-item">
                        <?php if(is_array($buttonList)): $i = 0; $__LIST__ = $buttonList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$button): $mod = ($i % 2 );++$i;?><button <?php echo ($button["attr"]); ?>>&nbsp; &nbsp; &nbsp; <?php echo ($button["title"]); ?>&nbsp; &nbsp; &nbsp; </button>&nbsp; &nbsp; &nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </form>
            </div>
        </div>
    </div>


        </div>
        <div class="cont-ft">
            <div class="copyright">
                <div class="fl">感谢使用<a href="http://www.onethink.cn" target="_blank"></a>管理平台</div>
                <div class="fr">V<?php echo (ONETHINK_VERSION); ?></div>
            </div>
        </div>
    </div>
    <!-- /内容区 -->
    <script type="text/javascript">
    (function(){
        var ThinkPHP = window.Think = {
            "ROOT"   : "", //当前网站地址
            "APP"    : "/index.php?s=", //当前项目地址
            "PUBLIC" : "/Public", //项目公共目录地址
            "DEEP"   : "<?php echo C('URL_PATHINFO_DEPR');?>", //PATHINFO分割符
            "MODEL"  : ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
            "VAR"    : ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"]
        }
    })();
    </script>
    <script type="text/javascript" src="/Public/static/think.js"></script>
	<link rel="stylesheet" href="/Application/Admin/Static/bootstrap/plugins/bootstrap-toastr/toastr.min.css">
	<script src="/Application/Admin/Static/bootstrap/plugins/bootstrap-toastr/toastr.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="/Application/Admin/Static/js/com/com.toast.class.js"></script>
    <script type="text/javascript" src="/Application/Admin/Static/js/common.js"></script>

    <script type="text/javascript">
        +function(){
            var $window = $(window), $subnav = $("#subnav"), url;
            $window.resize(function(){
                $("#main").css("min-height", $window.height() - 130);
            }).resize();

            /* 左边菜单高亮 */
            url = window.location.pathname + window.location.search;
            url = url.replace(/(\/(p)\/\d+)|(&p=\d+)|(\/(id)\/\d+)|(&id=\d+)|(\/(group)\/\d+)|(&group=\d+)/, "");
            $subnav.find("a[href='" + url + "']").parent().addClass("current");

            /* 左边菜单显示收起 */
            $("#subnav").on("click", "h3", function(){
                var $this = $(this);
                $this.find(".icon").toggleClass("icon-fold");
                $this.next().slideToggle("fast").siblings(".side-sub-menu:visible").
                      prev("h3").find("i").addClass("icon-fold").end().end().hide();
            });

            $("#subnav h3 a").click(function(e){e.stopPropagation()});

            /* 头部管理员菜单 */
            $(".user-bar").mouseenter(function(){
                var userMenu = $(this).children(".user-menu ");
                userMenu.removeClass("hidden");
                clearTimeout(userMenu.data("timeout"));
            }).mouseleave(function(){
                var userMenu = $(this).children(".user-menu");
                userMenu.data("timeout") && clearTimeout(userMenu.data("timeout"));
                userMenu.data("timeout", setTimeout(function(){userMenu.addClass("hidden")}, 100));
            });

	        /* 表单获取焦点变色 */
	        $("form").on("focus", "input", function(){
		        $(this).addClass('focus');
	        }).on("blur","input",function(){
				        $(this).removeClass('focus');
			        });
		    $("form").on("focus", "textarea", function(){
			    $(this).closest('label').addClass('focus');
		    }).on("blur","textarea",function(){
			    $(this).closest('label').removeClass('focus');
		    });

            // 导航栏超出窗口高度后的模拟滚动条
            var sHeight = $(".sidebar").height();
            var subHeight  = $(".subnav").height();
            var diff = subHeight - sHeight; //250
            var sub = $(".subnav");
            if(diff > 0){
                $(window).mousewheel(function(event, delta){
                    if(delta>0){
                        if(parseInt(sub.css('marginTop'))>-10){
                            sub.css('marginTop','0px');
                        }else{
                            sub.css('marginTop','+='+10);
                        }
                    }else{
                        if(parseInt(sub.css('marginTop'))<'-'+(diff-10)){
                            sub.css('marginTop','-'+(diff-10));
                        }else{
                            sub.css('marginTop','-='+10);
                        }
                    }
                });
            }
        }();
    </script>
    
    <?php if($chosen_select2): ?><link rel="stylesheet" href="/Application/Admin/Static/adminlte/plugins/select2/select2.min.css">
        <script src="/Application/Admin/Static/adminlte/plugins/select2/select2.full.min.js"></script>
        <script>
            $(function(){
                $(".select2").select2();
            })
        </script><?php endif; ?>
    <?php if($has_nestable): ?><link href="/Application/Admin/Static/bootstrap/plugins/jquery-nestable/jquery.nestable.css" rel="stylesheet" type="text/css"/>
        <script src="/Application/Admin/Static/bootstrap/plugins/jquery-nestable/jquery.nestable.js" type="text/javascript"></script>
        <script src="/Application/Admin/Static/bootstrap/js/ui-nestable.min.js" type="text/javascript"></script>
        <script>
            $('.nestables').find('.dd').nestable({
                maxDepth:1
            });
            $('.nestable_list_one').on('change',function(){
                var obj=$(this).parents('.nestables');
                var nestable=new Array();
                obj.find('.portlet').each(function(index,element){
                    if ($(element).data('id')) {
                        nestable[index] =  new Object();
                        nestable[index]['data-id'] =  $(element).data('id');
                        nestable[index]['title'] =  $(element).data('title');
                        nestable[index]['items'] =  $(element).find('.dd').nestable('serialize');
                        nestable[index]['items'].forEach(function(li){
                            li['data-id']=li['id'];
                        });
                    }
                });
                var nestable_str=JSON.stringify(nestable);
                var flag=obj.data('name');
                $('[name="'+flag+'"]').val(nestable_str);
            });
        </script><?php endif; ?>

    <?php if($importDatetimePicker): ?><link href="/Application/Admin/Static/bootstrap/plugins/datetimepicker/datetimepicker.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="/Application/Admin/Static/bootstrap/plugins/datetimepicker/datetimepicker.min.js"></script>

        <script>
            $('.form-datetime').datetimepicker({
                language: "zh-CN",
                autoclose: true,
                format: 'yyyy-mm-dd hh:ii'
            });
            $('.form-date').datetimepicker({
                language: "zh-CN",
                minView: 2,
                autoclose: true,
                format: 'yyyy-mm-dd'
            });
            $('.form-time').datetimepicker({
                language: "zh-CN",
                minView: 0,
                startView:1,
                autoclose: true,
                format: 'hh:ii'
            });
            $('.time').change(function () {
                var fieldName = $(this).attr('data-field-name');
                var dateString = $(this).val();
                var date = new Date(dateString);
                var timestamp = date.getTime();
                $('[name=' + fieldName + ']').val(Math.floor(timestamp / 1000));
            });
        </script><?php endif; ?>
    <?php if($colorPicker): ?><script type="text/javascript" src="/Application/Admin/Static/js/jquery.simple-color.js"></script>
        <script>
            $(function(){
                $('.simple_color_callback').simpleColor({
                    boxWidth:20,
                    cellWidth: 20,
                    cellHeight: 20,
                    chooserCSS:{ 'z-index': 500 },
                    displayCSS: { 'border': 0 ,
                        'width': '32px',
                        'height': '32px',
                        'margin-top': '-32px'
                    },
                    onSelect: function(hex, element) {
                        $('#tw_color').val('#'+hex);
                    }
                });
                $('.simple_color_callback').show();
                $('.simpleColorContainer').css('margin-left','105px');
                $('.simpleColorDisplay').css('border','1px solid #DFDFDF');
            });
            var setColorPicker=function(obj){
                var color=$(obj).val();
                $(obj).parents('.color-picker').find('.simpleColorDisplay').css('background',color);
            }
        </script><?php endif; ?>

    <?php if($importCheckBox): ?><script>
            $(function () {
                function implode(x, list) {
                    var result = "";
                    for (var i = 0; i < list.length; i++) {
                        if (result == "") {
                            result += list[i];
                        } else {
                            result += ',' + list[i];
                        }
                    }
                    return result;
                }

                $('.oneplus-checkbox').change(function (e) {
                    var fieldName = $(this).attr('data-field-name');
                    var checked = $('.oneplus-checkbox[data-field-name=' + fieldName + ']:checked');
                    var result = [];
                    for (var i = 0; i < checked.length; i++) {
                        var checkbox = $(checked.get(i));
                        result.push(checkbox.attr('value'));
                    }
                    result = implode(',', result);
                    $('.oneplus-checkbox-hidden[data-field-name=' + fieldName + ']').val(result);
                });
            })
        </script><?php endif; ?>

    <script type="text/javascript">
        $(function () {
            $('.group_nav li a').click(function () {
                $('.group_list').hide();
                $('.group_list').eq($(".group_nav li a").index(this)).show();
                $('.group_nav li').removeClass('active');
                $(this).parent().addClass('active');
				window.location.hash=new Date().getTime(); 
            })
        })
        Think.setValue("type", <?php echo ((isset($info["type"]) && ($info["type"] !== ""))?($info["type"]):0); ?>);
        Think.setValue("group", <?php echo ((isset($info["group"]) && ($info["group"] !== ""))?($info["group"]):0); ?>);
        //导航高亮
        highlight_subnav('<?php echo U('Config / index');?>');
    </script>
    <link type="text/css" rel="stylesheet" href="/Public/js/ext/magnific/magnific-popup.css"/>
    <script type="text/javascript" src="/Public/js/ext/magnific/jquery.magnific-popup.min.js"></script>

    <script type="text/javascript" charset="utf-8" src="/Public/js/ext/webuploader/js/webuploader.js"></script>
    <link href="/Public/js/ext/webuploader/css/webuploader.css" type="text/css" rel="stylesheet">


    <script>
        $(document).ready(function () {
            $('.popup-gallery').each(function () { // the containers for all your galleries
                $(this).magnificPopup({
                    delegate: 'a',
                    type: 'image',
                    tLoading: '<?php echo L("_LOADING_");?>#%curr%...',
                    mainClass: 'mfp-img-mobile',
                    gallery: {
                        enabled: true,
                        navigateByImgClick: true,
                        preload: [0, 1] // Will preload 0 - before current, and 1 after the current image

                    },
                    image: {
                        tError: '<a href="%url%"><?php echo L("_PICTURE_");?>#%curr%</a><?php echo L("_COULD_NOT_BE_LOADED_");?>',
                        titleSrc: function (item) {
                            /*           return item.el.attr('title') + '<small>by Marsel Van Oosten</small>';*/
                            return '';
                        },
                        verticalFit: true
                    }
                });
            });
            <?php echo ($myJs); ?>
        });
    </script>

</body>
</html>