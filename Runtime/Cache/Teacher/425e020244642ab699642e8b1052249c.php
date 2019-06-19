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
        
<script type="text/javascript" src="http://www.love88.cn/apps/pc/public/js/magnifier.js"></script><!--产品图片-->
<script type="text/javascript" src="http://www.love88.cn/apps/pc/public/js/zoomify.min.js"></script><!--放大图片-->

<link rel="stylesheet" type="text/css" href="http://www.love88.cn/apps/pc/public/css/zoomify.min.css">
<link rel="stylesheet" type="text/css" href="http://www.love88.cn/apps/pc/public/css/magnifier.css">
<script type="text/javascript">
//产品图片 
			$(function() {
				
				var magnifierConfig = {
					magnifier : "#magnifier1",//最外层的大容器
					width : 500,//承载容器宽
					height : 500,//承载容器高
					moveWidth : null,//如果设置了移动盒子的宽度，则不计算缩放比例
					zoom : 2.5//缩放比例
				};
			
				var _magnifier = magnifier(magnifierConfig);
			
			});
</script>
<style>

.cont-category-p{
	width: 100%;
	height: 60px;
	font-size: 20px;
	line-height: 60px;
	color: #333333;
}

/*商品列表*/
.product-content{
	width: 100%;
}
.product-mocontainer{
	width: 1240px;
	min-height: 600px;
	margin: 0 auto;
	/*margin-top: 30px;*/
}
.advertisement {
    background-color: #000b10;
    text-align: center;
    height: 100px;
}

/*左侧栏*/
.help-left{
	width: 208px;
	margin-bottom: 6px;
	margin-right: 6px;
	background-color: #fff;
	float: left;
	padding: 36px 0;
}
.help-left-one{
	margin-bottom: 12px;
}
.category-nav-link{
	padding-left: 48px;
	line-height: 52px;
	color: #333;
	font-size: 16px;	
	/*background-color: pink;*/
}
.home-category-nav .category-nav-link {
    line-height: 33px;
    color: #757575;
    font-size: 14px;
    display: block;
    height: 100%;
}
.home-category-nav-item:hover a{
	color:#333;
}

/*右侧内容*/
.help-right{
	width: 994px;
	float: right;
}
.page-content{
	position: relative;
	padding: 20px 15px 15px;
	background-color: #fff;
}
.rich_media_content {
	min-height: 490px;
    overflow: hidden;
    color: #3e3e3e;
    /*background-color: pink;*/
}
.help-title{
	margin-top: 0px;
	margin-bottom: 20px;
	font-size: 20px;
	line-height: normal;
	font-family: Helvetica;
	-webkit-text-stroke-color: rgb(0, 0, 0);
	-webkit-text-stroke-width: initial;
	text-align: center;
	clear: both;
	min-height: 1em;
	white-space: pre-wrap;
}
.rich_media_content p{
	margin-top: 0px;
	margin-bottom: 0px;
	line-height: normal;
	font-family: Helvetica;
	-webkit-text-stroke-color: rgb(0, 0, 0);
	-webkit-text-stroke-width: initial;
	text-align: left;
}
.rich_media_content p img{
	text-align: center;
}

/*产品*/
.product-content{
	width: 100%;
}

/*商品详情*/
.product-middle{
	width: 100%;
	min-height: 400px;
	background-color: #fff;
	padding-top: 20px;
}


.product-up{
	width: 1240px;
	margin: 0 auto;

	margin-bottom: 5px;
	padding-top: 10px;
}
.product-left{
	float: left;
	width: 500px;
	height: auto;
	position: relative;
	z-index: 10;
}
.product-left-nav{
	float: left;
}
.product-left-list{
	width: 70px;
	padding: 5px;
	margin-bottom: 14px;
	border: 1px solid #e0e0e0;
	cursor: pointer;
}
.list-active{
	border: 1px solid #ff6700;
	cursor: default;
}
.product-left-nav ul .product-left-list img{
	width: 60px;
	height: 60px;
}
/*大图*/
.product-left-big{
	width: 482px;
	height: 482px;
	position: relative;
	/*background-color: pink;*/
	left: 140px;
	float: left;
}
.product-left-big img{
	width: 482px;
	height: 482px;
}
/*分享*/
.sharess{
	margin: 10px 0 20px;
}
.sharess>div{
	float: left;
	border: 1px solid #eee;
	margin-right: 10px;
	cursor: pointer;
}
/*.sharess div:hover{
	border: 1px solid #f10582;
}
.sharess div:hover a{
	color: #f10582;
}*/
.sharess div a{
	display: inline-block;
	padding: 2px 5px;
	font-size: 14px;
	color: #999;
}
.sharess div a img{
	width:15px;
	margin-left: 5px;
	margin-bottom: 3px;
	display: inline-block;
	vertical-align: middle;
}
/*分享连接地址*/
.fxd{
	position: relative;
}
.fxd:hover .fxd_con{
	display: block;
}
.fxd .fxd_con{
	position: absolute;
	top: 24px;left: -1px;
	background-color: #fff;
	z-index: 999;display: none;
	
}
.bdshare_l_c{
	width: 210px;
	float: left;
	border: 1px solid #e9e9e9;
	text-align: left;
}
.bdshare_l_c p{
	width: 100%;
	font: 14px/22px '宋体';
	text-indent: .5em;
	font-weight: 700;
	border-top: 1px solid #fbfbfb;
	border-bottom: 1px solid #f2f1f1;
	background-color: #f6f6f6;
	float: left;
	padding: 5px 0;
	margin: 0;
}
.bdshare_l_c ul{
	width: 100%;
	float: left;
	padding: 8px 0;
	overflow: hidden;
}
.bdshare_l_c ul li{
	width: 48%;
	height: 26px;
	float: left;
	margin: 2px;
}
.bdshare_l_c ul li a{
	color: #565656;
	font: 12px '宋体'; 
	display: block;
	width: 98%;
	padding: 6px 0;
	text-indent: 2.4em;
	background: url(../img/fenxiang_is.png) no-repeat;
	height: auto !important;
}
.bd_mshare{background-position: 0 -2070px !important;}
.bd_qzone{background-position: 0 -75px !important;}
.bd_tsina{background-position: 0 -115px !important;}
.bd_bdysc{background-position: 0 -2550px !important;}
.bd_renren{background-position: 0 -195px !important;}
.bd_tqq{background-position: 0 -235px !important;}
.bd_bdxc{background-position: 0 -2190px !important;}
.bd_kaixin001{background-position: 0 -275px !important;}
.bd_tqf{background-position: 0 -315px !important;}
.bd_tieba{background-position: 0 -595px !important;}
.bd_douban{background-position: 0 -395px !important;}
.bd_tsohu{background-position: 0 -435px !important;}
.bd_bdhome{background-position: 0 -155px !important;}
.bd_sqq{background-position: 0 -2230px !important;}
.bd_thx{background-position: 0 -1829px !important;}
.bd_more{background-image: url(../img/fenxiang_is.png?cdnversion=20131219) !important;
background-position: 0 4px !important;}
/*右侧*/
.product-right{
	float: left;
	width: auto;  
	height: auto;
	margin-bottom: 6px;
	min-height: 338px; 
}
/*加入购物车*/
.buy { 

    border: 0px;
    position: relative;
	padding-left: 60px;
}
a.guanwang.yous{
	float: right;
}
a.guanwang.hang{
	margin-left: 20px;
	width: 80px;
}
a.guanwang{
	display: inline-block;
	width: 100px;
	height: 25px;	
	text-align: center;
	line-height: 25px;
	font-size: 14px;
	background: #f0f0f0;
	font-weight: normal;
	margin-right: 26px;
}
.buy h1{
	font-weight: bold;
	color: #333;
	padding: 10px 15px;
	font-size: 18px;
}
.buy>div{
	line-height: 30px;
	vertical-align: top;
	padding: 5px 17px;
	font-size: 16px;
} 
.buy>div.author span{margin-left:150px;color:#999;}
.buy>div.author span bb{margin:0 10px;}
.buy>div.huiyuan{
	
	height: 60px;
	line-height: 45px;
	margin-top: 15px;
	font-size:16px; 
	padding-right: 0;
}
.buy>div.huiyuan span{margin-right: 35px;}
/*价格--会员价*/
.huiyuan .price{
	color: #f10582;
	font-size:32px;
	margin-right: 30px;
}
.huiyuan .marketprice{
	font-size: 22px; 
}
/*装裱*/
.zhuangbiao{
	margin: 5px 0;
	border-bottom: #e0e0e0 1px dashed;
	/* display:none; */
}
.zhuangbiao cite{
	float: left;
	font-style: normal;
	font-weight: normal;
	height: 25px;
	line-height: 22px;
	padding: 2px 0;
	
}
.zhuangbiao div{
	float: left;
	width: 100px;
	margin-right: 10px;
	position: relative
}
.zhuangbiao div.active a{border: #f10582 2px solid;}
.zhuangbiao div.active b{display: block;}
.zhuangbiao div b{
	display: none;
	width: 12px;
	height: 12px;
	line-height: 0;
	background: url(../img/red-duihao.png) no-repeat;
	position: absolute;
	right: 2px;
	bottom: 2px;
}
.zhuangbiao div a{
	font-family: "宋体";
	display: block;
	height: 25px;
	line-height: 22px;
	border: #e0e0e0 1px solid;
	padding: 1px;
	color: #999;
	text-align: center;
	white-space: nowrap;
	overflow: hidden;
}

/*加入购物车*/
.buy>div.purchase{
	padding: 0;
}
.buy .name {
    color: #333;
    float: left;
    font-size: 18px;
}
.buy .price .subscript {
    margin-right: 3px;
}
.purchase{
    margin-top: 30px;
    height: 55px;
    text-align: center;
}
.purchase::after{
	clear: both;
}

.btn {
	display: inline-block;
	width: 48%;
    height: 55px;
    background-color: #fff;
    line-height: 39px;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 16px;
    font-weight: 400;
    text-align: center;
    white-space: nowrap;
    border: 1px solid #ff6700;
}

.btn-primary {
	width: 200px;
	color: #c40000;
    /*color: #fff;
    background-color: #cc0000; */
    /* border-color: #cc0000; */
	background: #ffeded;
	border: solid #c40000 1px;
    margin-right: 30px;
}
.btn-store{
	width: 200px;
	/* background: #ffeded; */
	/* border: solid #c40000 1px; */
	background: #f10582;
	border: 0;
	color: #fff;
	font-size:22px;
}
.btn-store:hover{color:#fff;}
/* .btn-primary:hover{ */
	/* color:#fff; */
	/* background-color: #F92672; */
	/* border: solid #F92672 1px; */
/* }
.btn-store:hover{
	color:#c40000;
	background-color: #fff;
} */
/*商品信息*/
.store-message ul{
	border-bottom: 1px solid #e0e0e0;
	border-top: 1px solid #e0e0e0;
	padding: 10px 0;
	margin-top: 20px;
}
.store-message ul::before,.store-message ul::after{
	content: "";
	display: table;
}
.store-message ul::after{
	clear: both;
}
.store-message-eval{
	width: 33.3%;
	float: left;
}
.store-message-eval a{
	display: block;
	font-size:12px;
	color: #757575;
	padding-left: 26px;
	border-right: 1px solid #e0e0e0;
	position: relative;
}
.store-message-eval a:last-of-type{
	border: none;
}
.store-message-eval a img{
	width: 12px;
	height: 12px;
	vertical-align: middle;
	position: absolute;
	left: 11px;
	top: 1px;
}
.store-message-eval a:hover{
	color: #ff6700;
}
.store-look-more{
	display: inline-block;
	font-size: 16px;
	color: #757575;
	margin-top: 15px;
	margin-left: 5px;
}
.store-look-more:hover{
	color: #FF6700;
}


/*商品信息*/
.goods-info{
	float: left;
	margin-right: 50px;
	display: none;
}
.goods-info::after{
	clear: both;
}
.goods-picture{
	width: 64px;
	height: 60px;
	float: left;
	font-size: 12px;
	text-align: center;
	line-height: 60px;
	color: #fff;
	background-color: #fff;
}
.goods-picture img{
	margin-top: 5px;
	width: 50px;
	height: 50px;
}
.goods-words{
	width: 168px;
	white-space: nowrap;
	text-overflow: ellipsis;
	overflow: hidden;
	float: right;
	padding-top: 10px;
}
.goods-words strong{
	font-weight: normal;
	font-size: 16px;
	color: #757575;
}
.goods-words p em{
	color: #ff6700;
}
.goods-words p del{
	color: #b0b0b0;
}
/*详情*/
.titles{
	width: 100%;background-color: #fff;margin: 10px 0;
}
.product-list-nav{
	width: 100%;
	margin: 0 auto;
	
}
.product-list-nav>li{
	width:9%;
	float: left;
	height: 40px;
	line-height: 40px;
	text-align: center;
}
.product-list-nav>li.active{
	border-top: #f10582 2px solid;background: #fff;
}
.product-list-nav>li>a{
	color: #757575;
	font-size: 14px;
}
.product-list-nav>li.active a{color: #f10582;}
.product-list-nav>li>a:hover{
	color: #f10582;
}

/*加入购物车*/
.add-cart{
	width: 160px;
	height: 38px;
	background-color: #ff6700;
	color: #fff;
	display: none;
	margin: 11px 0;
	float: right;
}
.add-cart a{
	display: block;
	width: 160px;
	height: 38px;
	line-height: 38px;
	text-align: center;
	background-color: #ff6700;
	color: #fff;
}
/*详情*/
.product-down{ 
	width:100%; 
	min-height: 200px;
	margin: 0 auto;
	padding: 10px;
	border: 1px solid #e7e7e7;
}
/*详情标题*/
.details_title{
	width: 100%;
	height:36px;
	line-height: 36px;
	background: #bb1718 url(../img/det_daohang.png) no-repeat;
	background-size: 100%;
	margin: 25px auto;
}
.details_title>div{
	font-size: 20px;
	font-weight:800;
	color: #FFF;
	padding-left:75px;  
}
.details_title>div img{ 
	width:2%;
	vertical-align:middle;
	margin-bottom:3px;
	display: inline-block;
	margin-right:30px; 
}
/*详情图片*/ 
.details_pic{
	width: 100%;
	padding: 88px 0;
}
.details_pic.guding{
	padding:0;
}
.details_pic img{
	display: block;
	cursor: pointer;
	height: auto;
	width: auto;
	max-width: 950px;
	max-height: 800px;
	margin: 10px auto;
	overflow: hidden; 
	
} 
.details_pic img:hover{
	cursor: -webkit-zoom-in;
	cursor: zoom-in;
}
.details_pic img.zoomify.zoomed{
	cursor: pointer !important;

}
.details_pic.painter{margin-bottom:30px;} 
.details_pic.painter img{width: 40%;}
/*书画家与作品简介*/
.jianjie{padding: 0 30px;}
.jianjie h3{margin:10px 0 0 0;}
.jianjie p{
	text-indent: 2em;
	margin: 10px 0;
	line-height: 32px;
	font-size: 14px; 
	color: #666;
}
.jianjie .kankan{
	float:right;
	color:#f10582;
	font-size:14px;
	text-decoration:underline;	
	font-weight:normal;
}

.rmb-box1{
    display:block;
	float: left;
	margin: 0px 0px 10px 0px;
	margin-right:0%;
	width:260px;
	height:260px;
	padding: 5px 0;
	transition: left .2s ease,border .5s,z-index .5s;
	padding-bottom: 15px;
	top: 1px;
	background-color: #fff;   
	border: 1px solid #cccccc;
	padding-top: 0;
}
.rmb-box1:hover{
	box-shadow: 0 15px 30px rgba(0,0,0,0.1);
	z-index: 20;
	top: -1px;
	
}

.rmb-product-detail1 {
	width: 100%;
	text-align: center;
	height: 260px;
	border-bottom: solid #cccccc 1px;
	background: #fff;
	overflow: hidden;
}
.rmb-product-detail1>a{
	width: 100%;
	height: 260px;
	display: grid;
	display: flex; 
	vertical-align: middle;
	text-align: center;
	
}
.rmb-product-detail1>a>img{
	max-width: 93%;
	max-height: 93%;
	vertical-align: middle;
	margin: auto;
}
.rmb-product-detail1>a img:hover{ 
  	cursor: pointer;  
    transition: all 0.6s; 
	 -webkit-transform:scale(1.1,1.1);
    -moz-transform:scale(1.1,1.1);
    -transform:scale(1.1,1.1);
}

.rmb-product-desc1{
	margin-top: 1.5px;
	text-align: left;
	padding-left: 10px;
	font-size:14px;
	height: 61px; 
}
.rmb-product-explain1 a{
	color: #454545;
	font-size: 14px; 
	line-height: 18px;
}

ul{list-style-type:none;margin:0px 10px;padding:0px}
.rmb-box{
    display:block;
	float: left;
	margin: 0px 0px 10px 0px;
	margin-right:1.332%;
	width:24%;
	position: relative;
	padding: 5px 0;
	transition: left .2s ease,border .5s,z-index .5s;
	padding-bottom: 15px;
	top: 1px;
	background-color: #fff;   
	border: 1px solid #cccccc;
	padding-top: 0;
	min-height: 240px;
}
.rmb-box:nth-child(4n){margin-right: 0;}
.rmb-box:hover{
	box-shadow: 0 15px 30px rgba(0,0,0,0.1);
	z-index: 20;
	top: -1px;
	
}

.rmb-product-detail {
	width: 100%;
	text-align: center;
	height: 150px;
	border-bottom: solid #cccccc 1px;
	background: #fff;
	overflow: hidden;
}
.rmb-product-detail>a{
	width: 100%;
	height: 150px;
	display: grid;
	display: flex; 
	vertical-align: middle;
	text-align: center;
	
}
.rmb-product-detail>a>img{
	max-width: 100%;
	/*max-height: 100%;*/
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
	height: 39px; 
}
.rmb-product-explain{padding:4px 0px;border:0px solid #ff0000;height:26px;overflow:hidden}
.rmb-product-explain a{
	color: #454545;
	font-size: 14px; 
}
.rmb-product-price{;border:0px solid #ff0000;margin:0px;padding:5px 0px 0px 0px}
</style>
    <link type="text/css" rel="stylesheet" href="/Public/Teacher/css/style.css"/>
    <div class="container" style="min-height: 400px">
        <div class="row">
            <div class="col-md-12">
                <!---------------------------------------->
				
				<div class="common_block_border">
                    <div class="common_block_title">老师介绍</div>               
                    <!---------------------------------------->
					 <div style="clear:both;padding:0px 10px;border-bottom:1px dashed #cccccc;margin:10px 0px 0px 0px">
					  <div class="rmb-box1">
                    
					      <div class="rmb-product-detail1">
		                            <a href="javascript:void(0)" target="_blank">
										<img src="<?php echo ($data["path"]); ?>" data-echo="<?php echo ($data["path"]); ?>">	
									</a>												 
						  </div>

					   </div>
					   <div style="float:left;padding-left:20px;width:745px;">
					      <div style="font-size:18px"><?php echo ($data['nickname']); ?></div>
						  <div style="margin-top:15px;font-size:16px">
						    <?php echo ($data['info']); ?>
							 </div>
					   </div>
					   <div style="clear:both;height:30px"></div>
                     </div>		
					<!---------------------------------------->
				</div>
				<!---------------------------------------->
            </div>
            <div class="col-md-12">
                <!---------------------------------------->
				  <div class="common_block_border blog_position" style="min-height:500px">
                    <div class="common_block_title"><?php echo ($data['nickname']); ?>的课程</div>
 
					<ul>
					    <?php if(is_array($hotdata)): $i = 0; $__LIST__ = $hotdata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="rmb-box">
                    
					        <div class="rmb-product-detail">
									<a href="<?php echo U('/Live/index/Detail',array('id'=>$vo["id"]));?>" target="_blank">
										<img src="<?php echo (get_cover($vo['image'],'path')); ?>" data-echo="<?php echo (get_cover($vo['image'],'path')); ?>">	
									</a>													 
								</div>  
								<div class="rmb-product-desc">
									<div class="rmb-product-explain"><a href="<?php echo U('Detail',array('id'=>$vo["id"]));?>" target="_blank"><?php echo ($vo["title"]); ?></a></div>
									<div class="rmb-product-explain">时间：<?php echo (date('Y-m-d H:i',$vo["starttime"])); ?>~<?php echo (date('H:i',$vo["endtime"])); ?></div>
									<div class="rmb-product-price">
									    <span>&yen;<bb>&nbsp;<?php echo ($vo["price"]); ?></bb></span>
									</div>
						    </div>

					     </li><?php endforeach; endif; else: echo "" ;endif; ?>
					  </ul>
					 <div style="clear:both;height:0px"></div>
					 <?php if(count($hotdata) == 0): ?><div style="font-size:3em;padding:2em 0;color: #ccc;text-align: center;height:200px">还没有内容哦。O(∩_∩)O~</div><?php endif; ?>
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