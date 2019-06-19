<link rel="stylesheet" type="text/css" href="__ROOT__/Addons/ImageSlider/FlexSlider/flexslider.css" />
<style type="text/css">
    .flex-direction-nav li{line-height: 40px;}
    .flexslider .slides > li {
        overflow: hidden;
        height:{$config.imgHeight}px;
    }
    .flex-control-nav{bottom: 10px;}
</style>
<script type="text/javascript" src="__ROOT__/Addons/ImageSlider/FlexSlider/jquery.flexslider-min.js"></script>
<script type="text/javascript">
$(function() {
  $('.flexslider').flexslider({
    animation: "slide",
        prevText:'',
        nextText: "",
        thumbCaptions　: true,
        slideshowSpeed : {$config.second|default='3000'},
        itemHeight:200,
        direction: "{$config.direction|default='horizontal'}"
  });
});
</script>
<!-- Place somewhere in the <body> of your page -->
<!--<div class="flexslider" style="width:{$config.imgWidth}px; height:{$config.imgHeight}px;">-->
<div class="flexslider">
  <ul class="slides">
      <foreach name="urls" item="url" key="k">
        <li>
            <a href="{$url}" target="_blank"><img src="{$images[$k].path}" /></a>
        </li>
      </foreach>
    <!-- items mirrored twice, total of 12 -->
  </ul>
</div>