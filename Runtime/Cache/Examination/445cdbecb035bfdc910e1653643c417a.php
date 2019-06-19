<?php if (!defined('THINK_PATH')) exit(); if(is_array($tree)): $i = 0; $__LIST__ = $tree;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><dl class="cate-item" style="display:block;clear:both;border:0px solid #ff0000">
		<dt class="cf">
		   <?php echo ($list['title']); ?>
		</dt>
		<div class="hdd">
		        <?php $categoryids=$_GET['categoryid']?$_GET['categoryid']:""; if($categoryids!="") { $categoryids = explode("_", $categoryids); } else { $categoryids =[]; } $selectsub=0; $sublists=[]; if($list['_']) { $sublists = array_column($list['_'], 'id'); foreach($categoryids as $key=>$val) { if(in_array($val, $sublists)) { $selectsub=1; break; } } } if($selectsub==0) { $temp=$categoryids; } else if($selectsub==1) { $temp = array_diff($categoryids, $sublists); } ?>
		        <a href="<?php echo U($url,array('categoryid'=>implode("_",$temp)));?>" <?php if($selectsub == 0): ?>class="active"<?php endif; ?>>全部</a>
                <?php if(!empty($list['_'])): if(is_array($list['_'])): $i = 0; $__LIST__ = $list['_'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sublist): $mod = ($i % 2 );++$i; $temp = array_diff($categoryids,$sublist); if(in_array($sublist["id"],$categoryids)) { } else { $temp=array_merge($temp,array($sublist["id"])); } $temp=implode("_",$temp); ?>
				      <a href="<?php echo U($url,array('categoryid'=>$temp));?>" <?php if(in_array($sublist["id"], $categoryids)){ echo 'class="active"';} ?>><?php echo ($sublist["title"]); ?></a><?php endforeach; endif; else: echo "" ;endif; endif; ?>
		</div>
		<div style="clear:both;height:0px"></div>
	</dl><?php endforeach; endif; else: echo "" ;endif; ?>