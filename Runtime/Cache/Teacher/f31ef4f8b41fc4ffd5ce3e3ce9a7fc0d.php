<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">

<?php echo hook('syncMeta');?>
 
<title><?php echo modC('WEB_SITE_NAME','','Config');?></title>
<meta name="description" content="<?php echo modC('WEB_SITE_DESCRIPTION','','Config');?>"/>
<meta name="keywords" content="<?php echo modC('WEB_SITE_KEYWORD','','Config');?>"/>
 
<!-- 为了让html5shiv生效，请将所有的CSS都添加到此处 -->
<link href="/Public/static/bootstrap/css/bootstrap.css" rel="stylesheet"/>
<link type="text/css" rel="stylesheet" href="/Public/static/qtip/jquery.qtip.css"/>
<link type="text/css" rel="stylesheet" href="/Public/Core/js/ext/toastr/toastr.min.css"/>
<link href="/Public/Core/css/oneplus.css" rel="stylesheet"/>
<link type="text/css" rel="stylesheet" href="/Public/Core/js/ext/magnific/magnific-popup.css"/>


<!-- 增强IE兼容性 -->
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="/Public/static/bootstrap/js/html5shiv.js"></script>
<script src="/Public/static/bootstrap/js/respond.js"></script>
<![endif]-->

<!-- jQuery库 -->
<!--[if lt IE 9]>
<script type="text/javascript" src="/Public/static/jquery-1.10.2.min.js"></script>
<![endif]-->
<!--[if gte IE 9]><!-->
<script type="text/javascript" src="/Public/static/jquery-2.0.3.min.js"></script>
<!--<![endif]-->

<!--合并前的js-->
<!-- Bootstrap库 -->
<script type="text/javascript" src="/Public/static/bootstrap/js/bootstrap.min.js"></script>

<!-- 其他库-->
<script src="/Public/static/qtip/jquery.qtip.js"></script>
<script type="text/javascript" src="/Public/Core/js/ext/toastr/toastr.min.js"></script>
<script type="text/javascript" src="/Public/Core/js/ext/slimscroll/jquery.slimscroll.min.js"></script>
<script type="text/javascript" src="/Public/static/jquery.iframe-transport.js"></script>
<script type="text/javascript" src="/Public/static/jquery-placeholder-master/jquery.placeholder.js"></script>
<script type="text/javascript" src="/Public/Core/js/ext/lazyload/lazyload.js"></script>
<script type="text/javascript" src="/Public/Core/js/ext/magnific/jquery.magnific-popup.min.js"></script>
<!--CNZZ广告管家，可自行更改-->
<!--<script type='text/javascript' src='http://js.adm.cnzz.net/js/abase.js'></script>-->
<!--CNZZ广告管家，可自行更改end
 自定义js-->
<script type="text/javascript" src="/Public/Core/js/core.js"></script>

<script type="text/javascript" src="/Public/static/jquery.transit-master/jquery.transit.js"></script>
<!--合并前的js-->
<?php $config = api('Config/lists'); C($config); $icp=C('WEB_SITE_ICP'); $count_code=C('COUNT_CODE'); ?>
<script type="text/javascript">
    var ThinkPHP = window.Think = {
        "ROOT": "", //当前网站地址
        "APP": "/index.php?s=", //当前项目地址
        "PUBLIC": "/Public", //项目公共目录地址
        "DEEP": "<?php echo C('URL_PATHINFO_DEPR');?>", //PATHINFO分割符
        "MODEL": ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
        "VAR": ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"],
        'URL_MODEL': "<?php echo C('URL_MODEL');?>",
        'WEIBO_ID': "<?php echo C('SHARE_WEIBO_ID');?>"
    }
</script>

<!-- Bootstrap库 -->
<!--
<?php $js[]=urlencode('/static/bootstrap/js/bootstrap.min.js'); ?>

&lt;!&ndash; 其他库 &ndash;&gt;
<script src="/Public/static/qtip/jquery.qtip.js"></script>
<script type="text/javascript" src="/Public/Core/js/ext/toastr/toastr.min.js"></script>
<script type="text/javascript" src="/Public/Core/js/ext/slimscroll/jquery.slimscroll.min.js"></script>
<script type="text/javascript" src="/Public/static/jquery.iframe-transport.js"></script>
-->
<!--CNZZ广告管家，可自行更改-->
<!--<script type='text/javascript' src='http://js.adm.cnzz.net/js/abase.js'></script>-->
<!--CNZZ广告管家，可自行更改end-->
<!-- 自定义js -->
<!--<script src="/Public/js.php?get=<?php echo implode(',',$js);?>"></script>-->


<script>
    //全局内容的定义
    var _ROOT_ = "";
    var MID = "<?php echo is_login();?>";
    var MODULE_NAME="<?php echo MODULE_NAME; ?>";
    var ACTION_NAME="<?php echo ACTION_NAME; ?>";
    var initNum = "<?php echo C('WEIBO_WORDS_COUNT');?>";
</script>

<audio id="music" src="" autoplay="autoplay"></audio>
<!-- 页面header钩子，一般用于加载插件CSS文件和代码 -->

</head>
<body>
	<!-- 头部 -->
	<!--[if lt IE 8]>
<div class="alert alert-danger" style="margin-bottom: 0">您正在使用 <strong>过时的</strong> 浏览器. 是时候 <a target="_blank" href="http://browsehappy.com/">更换一个更好的浏览器</a> 来提升用户体验.</div>
<![endif]-->
<!-- HTML-->

<div id="top_bar" class="top_bar" style="display:none">
    <div class="container">
        <div class="row  ">
            <?php if(is_login()): else: ?>
                <div class="col-xs-6 text-center visible-xs">
                    <a href="<?php echo U('Home/User/login');?>" style="padding-top: 10px;display: block;font-size: 16px;color: #ccc !important;">登录</a>
                </div>
                <div class="col-xs-6 text-center visible-xs">
                    <a href="<?php echo U('Home/User/register');?>" style="padding-top: 10px;display: block;font-size: 16px;color: #ccc!important;">注册</a>
                </div><?php endif; ?>
            <div class="col-md-6 col-sm-6 hidden-xs">
               <?php if(C('SHARE_WEIBO_ID') != ''): ?>分享<a class="share_weibo" id="weibo_shareBtn" target="_blank"></a>
                   <script>
                       $(function () {
                           weiboShare();//处理微博分享
                       })
                   </script><?php endif; ?>
            </div>
            <div class="col-md-6 col-xs-12  text-right top_right">

                <ul class="nav navbar-nav navbar-right">
                    <!-- <li>
                         &lt;!&ndash;换肤功能预留&ndash;&gt;
                        <a>换肤</a>
                        &lt;!&ndash;换肤功能预留end&ndash;&gt;
                    </li>-->
                    <!--登陆面板-->
                    <?php if(is_login()): ?><li>
                            <a style="margin-right: 15px;" title="修改资料" href="<?php echo U('Usercenter/Config/index');?>"><i
                                    class="glyphicon glyphicon-cog"></i></a>
                        </li>
                        <li class="top_spliter hidden-xs"></li>
                        <li class="dropdown">
                            <!--php>
                                //$common_header_user = query_user(array('nickname'));
                            </php-->
                            <a role="button" class="dropdown-toggle dropdown-toggle-avatar" data-toggle="dropdown">
                                <?php echo ($common_header_user["nickname"]); ?>&nbsp;<i style="font-size: 12px"
                                                                       class="glyphicon glyphicon-chevron-down"></i>
                            </a>
                            <ul class="dropdown-menu text-left" role="menu">
                                <li><a href="<?php echo U('UserCenter/Index/index');?>"><span
                                        class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;个人主页</a>
                                </li>
                                <li><a href="<?php echo U('Usercenter/message/message');?>"><span
                                        class="glyphicon glyphicon-star"></span>&nbsp;&nbsp;消息中心</a>
                                </li>
                                <li><a href="<?php echo U('Usercenter/Collection/index');?>"><span
                                        class="glyphicon glyphicon-star"></span>&nbsp;&nbsp;我的收藏</a>
                                </li>

                                <li><a href="<?php echo U('Usercenter/Index/rank');?>"><span
                                        class="glyphicon glyphicon-star"></span>&nbsp;&nbsp;我的头衔</a>
                                </li>
                                <?php echo hook('personalMenus');?>
                                <?php if(is_administrator()): ?><li><a href="<?php echo U('Admin/Index/index');?>" target="_blank"><span
                                            class="glyphicon glyphicon-dashboard"></span>&nbsp;&nbsp;管理后台</a></li><?php endif; ?>
                                <li><a event-node="logout"><span
                                        class="glyphicon glyphicon-off"></span>&nbsp;&nbsp;注销</a>
                                </li>
                            </ul>
                        </li>
                        <li class="top_spliter hidden-xs"></li>
                        <?php else: ?>
                        <li class="top_spliter hidden-xs"></li>
                        <li class="hidden-xs">
                            <a href="<?php echo U('Home/User/login');?>">登录</a>
                        </li>
                        <li class="hidden-xs">
                            <a href="<?php echo U('Home/User/register');?>">注册</a>
                        </li>
                        <li class="spliter hidden-xs"></li><?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<div id="logo_bar" class="logo_bar  hidden-xs" style="background: #ffffff;">
    <div class="container">
        <div class="row logo" style="position:relative">
            <div style="position:absolute;left:0px">
			 <?php $logo = get_cover(modC('LOGO',0,'Config'),'path'); $logo = $logo?$logo:'/Public/images/logo.png'; ?>
                <a href="<?php echo U('Home/Index/index');?>"><img src="<?php echo ($logo); ?>" style="max-width:100%;max-height:100%"/></a>
            </div>
            
            <div style="position:absolute;right:10px">

                           <ul class="loginregister">
						   <li style="margin-left:30px"><a href="#" app-data-toggle="popover" title="<b>扫码下载官方APP</b>" data-placement="bottom" data-content=""> <span class="icons icon-app"></span><p>客户端</p></a></li>
						   <?php if(is_login()): ?><li><a href="<?php echo U('Cart/Index/index');?>"> <span class="icons icon-cart"></span><p>购物车</p></a></li>
								  <li><a href="<?php echo U('Home/User/logout');?>"> <span class="icons icon-logout"></span><p>退出</p></a></li>						   
						          <li><a href="<?php echo U('UserCenter/Config/index');?>"> <span class="icons icon-login"></span><p>会员中心</p></a></li>
                           <?php else: ?>
						   		  <li><a href="<?php echo U('Cart/Index/index');?>"> <span class="icons icon-cart"></span><p>购物车</p></a></li>
                                  <li><a href="<?php echo U('Home/User/register');?>"> <span class="icons icon-zhuce"></span><p>注册</p></a></li>
                                  <li><a href="<?php echo U('Home/User/login');?>"> <span class="icons icon-login"></span><p>登录</p></a></li><?php endif; ?>
                           </ul>

            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-fixed-top" style="display:none">
  <div class="container">
  <!-- navbar-header -->
    <div class="navbar-header">
	  <a class="navbar-brand" href="#">Project Name</a>
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      
    </div>
    <!-- navbar-nav -->
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#features">Features</a></li>
        <li><a href="#about_me">About me</a></li>
      </ul>
    </div>
  </div>
</nav>
<div id="nav_bar" class="nav_bar " style="margin-bottom:15px;display:block">
    <nav class="container" id="nav_bar_container" role="navigation">
	
	<!--导航栏菜单项-->

        <div class="row visible-xs">
            <div class="navbar-header">
			    <a class="navbar-brand" href="/" style="color:#ffffff;line-height:30px;font-size:16px;font-weight:bold"><?php echo modC('WEB_SITE_NAME','','Config');?></a>
                <button type="button" class="navbar-toggle  collapsed" data-toggle="collapse" data-target="#nav_bar_main">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
				
            </div>
        </div>
        <div class="collapse navbar-collapse " id="nav_bar_main">
		
            <ul class="nav navbar-nav  " style="font-size: 16px;margin:0px;padding:0px">
                <?php $__NAV__ = M('Channel')->field(true)->where("status=1")->order("sort")->select(); if(is_array($__NAV__)): $i = 0; $__LIST__ = $__NAV__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i; if(($nav["pid"]) == "0"): $children=D('Channel')->where(array('pid'=>$nav['id']))->order('sort asc')->select(); if($children){ ?>
                        <li class="dropdown">
                            <a class="dropdown-toggle nav_item" data-toggle="dropdown" href="#" style="color:<?php echo ($nav["color"]); ?>">

                                <?php echo ($nav["title"]); ?> <span class="caret"></span><?php if(($nav["band_text"]) != ""): ?><span class="badge" style="background: <?php echo ($nav["band_color"]); ?>"><?php echo ($nav["band_text"]); ?></span><?php endif; ?>
                            </a>
                            <ul class="dropdown-menu">
                                <?php if(is_array($children)): $i = 0; $__LIST__ = $children;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$subnav): $mod = ($i % 2 );++$i;?><li role="presentation"><a role="menuitem" tabindex="-1" style="color:<?php echo ($subnav["color"]); ?>"
                                                               href="<?php echo (get_nav_url($subnav["url"])); ?>"
                                                               target="<?php if(($subnav["target"]) == "1"): ?>_blank<?php else: ?>_self<?php endif; ?>"><?php echo ($subnav["title"]); if(($subnav["band_text"]) != ""): ?><span class="badge" style="background: <?php echo ($subnav["band_color"]); ?>"><?php echo ($subnav["band_text"]); ?></span><?php endif; ?></a>
                                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </li>
                        <?php }else{ ?>
                        <li class="<?php if((get_nav_active($nav["url"])) == "1"): ?>active<?php else: endif; ?>">
                            <a href="<?php echo (get_nav_url($nav["url"])); ?>"
                               target="<?php if(($nav["target"]) == "1"): ?>_blank<?php else: ?>_self<?php endif; ?>" style="color:<?php echo ($nav["color"]); ?>"><?php echo ($nav["title"]); if(($nav["band_text"]) != ""): ?><span class="badge" style="background: <?php echo ($nav["band_color"]); ?>"><?php echo ($nav["band_text"]); ?></span><?php endif; ?></a>
                        </li>
                        <?php } endif; endforeach; endif; else: echo "" ;endif; ?>
				<?php if(is_login()): ?><li class="visible-xs"><a href="<?php echo U('UserCenter/Config/index');?>">会员中心</a></li>
								  <li class="visible-xs"><a href="<?php echo U('Home/User/logout');?>">退出</a></li>	
						   		  <li class="visible-xs"><a href="<?php echo U('Cart/Index/index');?>">购物车</a></li>
								  				   
						          
                <?php else: ?>
				                  <li class="visible-xs"><a href="<?php echo U('Home/User/login');?>">登录</a></li>
				                  <li class="visible-xs"><a href="<?php echo U('Home/User/register');?>">注册</a></li>
						   		  <li class="visible-xs"><a href="<?php echo U('Cart/Index/index');?>">购物车</a></li><?php endif; ?>
            </ul>

        </div>

        


    </nav>
</div>
<a id="goTopBtn"></a>
<div id="app_content_wrapper" style="display:none;">
  <div style="padding:0px 0px 0px 0px">
          <div style="width:150px;float:left;text-align:center;line-height:20px;padding-left:12px">
		    <div style="text-align:left;line-height:18px;font-size:14px">第一步：扫码下载App</div>
		    <img src="<?php echo get_cover(modC('APP_DOWNLOAD_QRCODE',1,'Config'),'path');?>" style="width:100%;max-width:100%"/>
			
		  </div>

	      <div style="width:150px;float:left;text-align:center;line-height:20px;padding-left:12px">
		    
			<div style="text-align:left;line-height:18px;font-size:14px">第二步：App打开后扫码绑定网址</div>
		    <img src="<?php echo get_cover(modC('WEBSITE_QRCODE',1,'Config'),'path');?>" style="width:100%;max-width:100%"/>
			
		  </div>
		  <div style="height:10px;clear:both"></div>
  </div>
</div>
<script type="text/javascript">

$(function(){
  $("*[transitionparent]").hover(function(){ 
     $(this).find("*[transition]").stop().transition({perspective: '500px',rotateY: 180});
  }, 
  function(){ 
     //$(this).transition({rotateY: 180});
	 $(this).find("*[transition]").stop().transition({perspective: '500px',rotateY: 0});
  }) 
  $("[app-data-toggle='popover']").popover({
                 html : true,
				 trigger: 'hover',
                 content: function() {
                   return $('#app_content_wrapper').html();
                 }
				 
  }).on("show.bs.popover", function () { $(this).data("bs.popover").tip().css("max-width", "330px"); });;
 
});
</script>
	<!-- /头部 -->
	<!-- 主体 -->
	
<div id="main-container" class="container">
    <div class="row" >
        
<style>
ul{list-style-type:none;margin:0px 10px;padding:0px}
.rmb-box{
    display:block;
	float: left;
	margin: 0px 0px 10px 0px;
	margin-right:0%;
	width:200px;
	height:200px;
	padding: 5px 0;
	transition: left .2s ease,border .5s,z-index .5s;
	padding-bottom: 15px;
	top: 1px;
	background-color: #fff;   
	border: 1px solid #cccccc;
	padding-top: 0;
}
.rmb-box:hover{
	box-shadow: 0 15px 30px rgba(0,0,0,0.1);
	z-index: 20;
	top: -1px;
	
}

.rmb-product-detail {
	width: 100%;
	text-align: center;
	height: 200px;
	border-bottom: solid #cccccc 1px;
	background: #fff;
	overflow: hidden;
}
.rmb-product-detail>a{
	width: 100%;
	height: 200px;
	display: grid;
	display: flex; 
	vertical-align: middle;
	text-align: center;
	
}
.rmb-product-detail>a>img{
	max-width: 93%;
	max-height: 93%;
	vertical-align: middle;
	margin: auto;
}
.rmb-product-detail>a img:hover{ 
  	cursor: pointer;  
    transition: all 0.6s; 
	 -webkit-transform:scale(1.1,1.1);
    -moz-transform:scale(1.1,1.1);
    -transform:scale(1.1,1.1);
}

.rmb-product-desc{
	margin-top: 1.5px;
	text-align: left;
	padding-left: 10px;
	font-size:14px;
	height: 61px; 
}
.rmb-product-explain a{
	color: #454545;
	font-size: 14px; 
	line-height: 18px;
}

.description{
position:absolute;left:200px;padding:0px 20px;right:0px
}
.description-text{height:153px}

@media screen and (max-width:768px){
.rmb-box{
    display:block;
	float: left;
	margin: 0px 0px 10px 0px;
	margin-right:0%;
	width:160px;
	height:160px;
	padding: 5px 0;
	transition: left .2s ease,border .5s,z-index .5s;
	padding-bottom: 15px;
	top: 1px;
	background-color: #fff;   
	border: 1px solid #cccccc;
	padding-top: 0;
}
.rmb-box:hover{
	box-shadow: 0 15px 30px rgba(0,0,0,0.1);
	z-index: 20;
	top: -1px;
	
}

.rmb-product-detail {
	width: 100%;
	text-align: center;
	height: 160px;
	border-bottom: solid #cccccc 1px;
	background: #fff;
	overflow: hidden;
}
.rmb-product-detail>a{
	width: 100%;
	height: 160px;
	display: grid;
	display: flex; 
	vertical-align: middle;
	text-align: center;
	
}

.description{
position:absolute;left:170px;padding:0px 10px;right:0px
}
.description-text{height:125px}
}
</style>
    <link type="text/css" rel="stylesheet" href="/Public/Teacher/css/style.css"/>
    <div class="container" style="min-height: 400px">
        <div class="row">
		    <div class="col-md-12 hidden">
                <!---------------------------------------->
				  <div class="common_block_border blog_position">
                    <div class="common_block_title" style="display:none">所有分类</div>
					 <div class="category">
					 <link type="text/css" rel="stylesheet" href="/Public/Common/css/hcategory.css"/>
					 <script type="text/javascript" src="/Public/Common/js/category.js"></script>
	 
					  <div style="display:block">
					  <?php $tree_list = A("Common/Category"); $tree_list->ShowNoTitleCategory($tree,"/Teacher/index/index"); ?>
					  </div>
					 </div>
                    <div style="margin:0px 15px;height:10px;clear:both"></div>
                  </div>
				  
				
            </div>
            <div class="col-md-12">
                <!---------------------------------------->
				
				<div class="common_block_border">
                    <div class="common_block_title">所有名师</div>
					 
					<?php if(is_array($contents)): $i = 0; $__LIST__ = $contents;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div style="clear:both;padding:0px 10px;border-bottom:1px dashed #cccccc;margin:10px 0px 0px 0px; position: relative">
					  <div class="rmb-box">
                    
					      <div class="rmb-product-detail">
									<a href="<?php echo U('Detail',array('id'=>$vo['uid']));?>">
										<img src="<?php echo ($vo["path"]); ?>" data-echo="<?php echo ($vo["path"]); ?>">	
									</a>													 
						  </div>
 
					   </div>
					   <div class="description">
					      <div style="font-size:18px"><?php echo ($vo["nickname"]); ?></div>
						  <div class="description-text" style="margin-top:15px;font-size:14px;line-height:25px;border:0px solid #ff0000;overflow:hidden;color:#666666">
						     <a href="<?php echo U('Detail',array('id'=>$vo['uid']));?>" style="color:#666666">
                             <?php echo (msubstr(strip_tags($vo["info"]),0,342,"utf-8",true)); ?>
							 </a>
						  </div>
						  <div style="text-align:right;display:none">
						     <a href="<?php echo U('Teacher/Index/Detail',array('id'=>$vo["uid"]));?>" class="btn btn-default btn-sm">&nbsp;&nbsp;等多介绍 &gt;&nbsp;&nbsp;</a>
						  </div>
						  
					   </div>
					   <div style="clear:both;height:0px"></div>
                     </div><?php endforeach; endif; else: echo "" ;endif; ?>
					 
                    <div style="clear:both;height:0px"></div>
					<?php if(count($contents) == 0): ?><div style="font-size:20px;padding:2em 0;color: #ccc;text-align: center;height:500px">该分类下现在还没有内容哦。O(∩_∩)O~</div><?php endif; ?>
					<div class="text-right" style="margin-right:20px;">
                       <?php echo getPagination($totalPageCount,$count);?>
                    </div>
				</div>
				<!---------------------------------------->
            </div>


			
        </div>

    </div>

    </div>
</div>

<script type="text/javascript">
    $(function(){
        $(window).resize(function(){
            $("#main-container").css("min-height", $(window).height() - 343);
        }).resize();
    })
</script>
	<!-- /主体 -->
	<!-- 底部 -->
	<!-- 底部
================================================== -->

<div style="padding: 5px"></div>
<div class="footer-jumbotron footer_bar">
    <div class="container" >
	    <div class="row" style="text-align:center">
		<?php echo modC('COPY_RIGHT','','Config');?>
	   
         
        </div>
    </div>
</div>

 

<script type="text/javascript" src="/Public/Core/js/ext/placeholder/placeholder.js"></script>
<script type="text/javascript" src="/Public/Core/js/ext/atwho/atwho.js"></script>
<link type="text/css" rel="stylesheet" href="/Public/Core/js/ext/atwho//atwho.css"/>


 <!-- 用于加载js代码 -->
<script>
    $(function() {
        $("img.lazy").lazyload({effect: "fadeIn",threshold:200,failure_limit : 100});
    });  
</script>
<!-- 页面footer钩子，一般用于加载插件JS文件和JS代码 -->
 
<div class="hidden"><!-- 用于加载统计代码等隐藏元素 -->
    
</div>
	<!-- /底部 -->
</body>
</html>