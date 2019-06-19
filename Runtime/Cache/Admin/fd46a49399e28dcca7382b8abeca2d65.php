<?php if (!defined('THINK_PATH')) exit();?><style type="text/css">
    .<?php echo ($componentId); ?>{
        border:  1px solid #cccccc;
        background-color: #eeeeee;
    }
    .<?php echo ($componentId); ?> .title{
        border-right: 1px solid #cccccc;;
                    }
    .<?php echo ($componentId); ?> span{
        display: inline-block;
        padding: 0px 10px;
		line-height:40px;
                    }
</style>
<div class="<?php echo ($componentId); ?>">
    <?php if(empty($title)): else: ?>
	  <span class="title"><?php echo ($title); ?></span><?php endif; ?>
    
    <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><span><?php echo ($item); ?></span><?php endforeach; endif; else: echo "" ;endif; ?>
</div>