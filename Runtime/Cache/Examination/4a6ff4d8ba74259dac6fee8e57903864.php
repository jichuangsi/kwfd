<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<title>题目预览</title>
</head>
<script type="text/javascript" src="/Public/static/jquery-2.0.3.min.js"></script>
<link href="/Public/static/bootstrap/css/bootstrap.css" rel="stylesheet"/>
<link type="text/css" rel="stylesheet" href="/Public/static/qtip/jquery.qtip.css"/>
<link type="text/css" rel="stylesheet" href="/Public/Core/js/ext/toastr/toastr.min.css"/>
<link href="/Public/Core/css/oneplus.css" rel="stylesheet"/>
<link type="text/css" rel="stylesheet" href="/Public/Core/js/ext/magnific/magnific-popup.css"/>

    <style type="text/css">
	body
	{
	    padding:0; margin:0;
		font-size:14px;
	}
	.title{font-size:14px;font-weight:bold;line-height:25px;margin:10px 0px 0px 0px}
	.description{background-color:#eaeaea; border:1px dashed #cccccc;padding:5px;margin:10px 0px 0px 0px}
	.optionul{margin:0px 0px 0px 20px;list-style-type:none;padding:0px}
					.optionul li{margin:5px 0px}
					.question_info u,.optionul u{text-decoration:none }
					.bot_add{margin:0px 0px 5px 60px}
					.add_questio{margin:5px 0px}

    .submit{margin:10px 0px 20px 20px}
	ul{margin:0px;padding:0px;list-style-type:none}
	.leftdiv{width:40px;;float:left;text-align: center;}
	.rightdiv{float:left;margin-left:10px}
	.marginleft40{margin-left:50px}
    .hrdotted{height:1px;border:none;border-top:1px dashed #dddddd;}
    .testpaper-question-seq {
      font-size: 20px;
      color: #3a87ad;
    }

    .testpaper-question-score {
      font-size:12px;
      color:#aaa;
      border:1px solid #ccc;
      padding:0px 1px;
      border-radius:5px;
      background:#f6f6f6;
      display: inline-block;
    }

    </style>
<body>

<form action="<?php echo U('submitexam',array('id'=>I('id')));?>" method="post" class="form-horizontal">

    <link type="text/css" rel="stylesheet" href="/Public/Examination/css/style.css"/>
    
	<?php $az = 'abcdefghijklmnopqrstuvwxyz'; ?>
<div class="container">
  <div class="row">
	 <div class="col-md-12" style="text-align:right">
		 <a href="/" class="btn btn-primary">首页</a> <a href="javascript:history.back()" class="btn btn-primary">后退</a>
	 </div>
  </div>
</div>
<div class="container">

  <div class="common_block_border">
    <div class="common_block_title"><?php echo ($questionPaperdata['name']); ?></div>
    <div style="margin: 15px">
	<?php echo ($questionPaperdata['description']); ?>
	</div>
  </div>
</div>
<div class="container" style="min-height: 400px">
        <div class="row">
            <div class="col-md-9">
                <!---------------------------------------->

<ul class="examul">
<?php $questionTypeArr=array( 'single_choice' => '单选题', 'choice' => '多选题', 'fill' => '填空题', 'determine' => '判断题', 'essay' => '问答题', 'material' => '材料题', ); $json=json_decode($questionPaperdata['metas']); $questionnum=0; foreach($json->question_type_seq as $key=>$val) { if($json->itemquestions->$val=="")continue; ?>
<li>
   <div class="common_block_border">
    <div class="common_block_title"><?php echo ($questionTypeArr[$val]); ?></div>
  <?php unset($map); $map['id'] = array('in',$json->itemquestions->$val); $list=D('Examination/Question')->where($map)->select(); $subnum=0; foreach($list as $_key=>$data) { $questionnum+=1; $data['score']=$json->score->$data['type']; if($data['type']=='material') { $mapsub['parentId'] = array('eq',$data['id']); $subdata=D('Examination/Question')->where($mapsub)->select(); } ?>
  <div style="margin: 20px">
		     <?php switch($data["type"]): case "single_choice": ?><a name="<?php echo ($questionnum); ?>"></a>	    
		<div class="leftdiv">
          <div class="testpaper-question-seq"><?php echo ($questionnum); ?></div>
          <div class="testpaper-question-score"><?php echo ($data['score']); ?>分</div>
		</div>
		<div class="rightdiv"><?php echo ($data["stem"]); ?></div>
		<?php $itemquestionanswer=json_decode($data['answer'],false); $questionanswer=json_decode($answer[$data['id']],false); $answericon="wrong"; if(sizeof($questionanswer)>0) { if(base64_decode($questionanswer[0])==$itemquestionanswer[0]) { $answericon="right"; } } ?>
        <div style="clear:both"></div>
	    <?php $jsonitems=json_decode($data['metas'],false); foreach($jsonitems->choices as $key=>$val) { ?>
				<table width="100%"  border="0" cellspacing="0" cellpadding="0" class="marginleft40">
                    <tr>
                       <td width=30><?php echo (strtoupper(msubstr($az,$key,1,'utf-8',false))); ?>:</td>
                       <td><?php echo (stripslashes(base64_decode($val))); ?></td>
                    </tr>
                </table>
				<?php } ?>
		<?php  foreach($jsonitems->choices as $key=>$val) { ?>
				<label class="radio-inline marginleft40" ><input type="radio" data-type="choice" 
				name="question_<?php echo ($data['id']); ?>" 
				<?php if(in_array(base64_encode(strtoupper(msubstr($az,$key,1,'utf-8',false))),$questionanswer)) { ?>
				 checked="checked" 
                <?php } ?>
				value="<?php echo (strtoupper(msubstr($az,$key,1,'utf-8',false))); ?>">&nbsp;<?php echo (strtoupper(msubstr($az,$key,1,'utf-8',false))); ?></label>
				<?php } break;?>    
	<?php case "choice": ?><a name="<?php echo ($questionnum); ?>"></a>
	    <div class="leftdiv">
          <div class="testpaper-question-seq"><?php echo ($questionnum); ?></div>
          <div class="testpaper-question-score"><?php echo ($data['score']); ?>分</div>
		</div>
		<div class="rightdiv"><?php echo ($data["stem"]); ?></div>
		<?php $itemquestionanswer=json_decode($data['answer'],false); $questionanswer=json_decode($answer[$data['id']],false); $answericon="wrong"; if(sizeof($questionanswer)==sizeof($itemquestionanswer)) { $answericon="right"; foreach($itemquestionanswer as $key=>$val) { if(base64_decode($questionanswer[$key])!=$val) { $answericon="wrong"; break; } } } ?>
        <div style="clear:both"></div>
	    <?php $jsonitems=json_decode($data['metas'],false); foreach($jsonitems->choices as $key=>$val) { ?>
				<table width="100%"  border="0" cellspacing="0" cellpadding="0" class="marginleft40">
                    <tr>
                       <td width=30><?php echo (strtoupper(msubstr($az,$key,1,'utf-8',false))); ?>:</td>
                       <td><?php echo (stripslashes(base64_decode($val))); ?></td>
                    </tr>
                </table>
				<?php } ?>
		<?php foreach($jsonitems->choices as $key=>$val) { ?>
				<label class="checkbox-inline marginleft40"><input type="checkbox" data-type="choice" 
				<?php if(in_array(base64_encode(strtoupper(msubstr($az,$key,1,'utf-8',false))),$questionanswer)) { ?>
				 checked="checked" 
                <?php } ?>
				name="question_<?php echo ($data['id']); ?>[]" value="<?php echo (strtoupper(msubstr($az,$key,1,'utf-8',false))); ?>">&nbsp;<?php echo (strtoupper(msubstr($az,$key,1,'utf-8',false))); ?></label>
				<?php } break;?>
	<?php case "fill": ?><a name="<?php echo ($questionnum); ?>"></a>
	    <?php $title=$data['stem']; preg_match_all('/\\[\\[.+?\\]\\]/i' ,$data['stem'] ,$res); $i=0; foreach($res[0] as $key=>$val) { $title=str_replace($val,"<span style='text-decoration:underline;color:#ff0000'>  (".++$i.")  </span>",$title); } ?>
			<div class="leftdiv">
              <div class="testpaper-question-seq"><?php echo ($questionnum); ?></div>
              <div class="testpaper-question-score"><?php echo ($data['score']); ?>分</div>
		    </div>
	  	    <div class="rightdiv"><?php echo ($title); ?></div>
        <?php $itemquestionanswer=json_decode($data['answer'],false); $questionanswer=json_decode($answer[$data['id']],false); $answericon="wrong"; if(sizeof($questionanswer)==sizeof($itemquestionanswer)) { $answericon="right"; foreach($itemquestionanswer as $key=>$val) { if($questionanswer[$key][0]!=$val[0]) { $answericon="wrong"; break; } } } ?>
        <div style="clear:both"></div>
			<?php  $i=0; foreach($res[0] as $key=>$val) { ?>
				   <div class="marginleft40"><input class="form-control " style="margin:5px 0px" type="text" data-type="fill" 
				   value="<?php if(sizeof($questionanswer)>=($key+1)) echo base64_decode($questionanswer[$key][0]); ?>"
				   name="question_<?php echo ($data['id']); ?>[]" placeholder="填空(<?php echo ++$i;?>)答案，请填在这里"></div>
				<?php } break;?>
	<?php case "determine": ?><a name="<?php echo ($questionnum); ?>"></a>
	    <div class="leftdiv">
          <div class="testpaper-question-seq"><?php echo ($questionnum); ?></div>
          <div class="testpaper-question-score"><?php echo ($data['score']); ?>分</div>
		</div>
		<div class="rightdiv"><?php echo ($data["stem"]); ?></div>
		<?php $itemquestionanswer=json_decode($data['answer'],false); $questionanswer=json_decode($answer[$data['id']],false); $answericon="wrong"; if(sizeof($questionanswer)==sizeof($itemquestionanswer)) { if(base64_decode($questionanswer[0])==$itemquestionanswer[0]) { $answericon="right"; } } ?>
        <div style="clear:both"></div>
	    <?php $data['metas']='{"choices":["正确","错误"]}'; $jsonitems=json_decode($data['metas'],false); foreach($jsonitems->choices as $key=>$val) { ?>
				<?php } ?>
		<?php  foreach($jsonitems->choices as $key=>$val) { ?>
				<label  class="radio-inline marginleft40"><input type="radio" data-type="choice"
				<?php if(in_array(base64_encode(1-$key),$questionanswer)) { ?>
				 checked="checked" 
                <?php } ?>
				name="question_<?php echo ($data['id']); ?>" value="<?php echo 1-$key; ?>"><?php echo ($val); ?></label>
				<?php } break;?>
	<?php case "essay": ?><a name="<?php echo ($questionnum); ?>"></a>
	    <div class="leftdiv">
          <div class="testpaper-question-seq"><?php echo ($questionnum); ?></div>
          <div class="testpaper-question-score"><?php echo ($data['score']); ?>分</div>
		</div>
		<div class="rightdiv"><?php echo ($data["stem"]); ?></div>
        <div style="clear:both"></div>
		<div class="marginleft40">
		<textarea class="form-control" name="question_<?php echo ($data['id']); ?>" cols="" rows="6"><?php $questionanswer=json_decode($answer[$data['id']],false); if(sizeof($questionanswer)>0) { echo base64_decode($questionanswer[0]); } ?>
		</textarea>
	    </div><?php break;?>
	<?php case "material": ?><div class="well"><?php echo ($data["stem"]); ?></div>
		<?php $subnum=0; ?>
		<?php if(is_array($subdata)): $i = 0; $__LIST__ = $subdata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i; $data['score']=$json->score->$data['type']; ?>
             <?php switch($data["type"]): case "single_choice": ?><a name="<?php echo ($questionnum); ?>"></a>	    
		<div class="leftdiv">
          <div class="testpaper-question-seq"><?php echo ($questionnum); ?></div>
          <div class="testpaper-question-score"><?php echo ($data['score']); ?>分</div>
		</div>
		<div class="rightdiv"><?php echo ($data["stem"]); ?></div>
		<?php $itemquestionanswer=json_decode($data['answer'],false); $questionanswer=json_decode($answer[$data['id']],false); $answericon="wrong"; if(sizeof($questionanswer)>0) { if(base64_decode($questionanswer[0])==$itemquestionanswer[0]) { $answericon="right"; } } ?>
        <div style="clear:both"></div>
	    <?php $jsonitems=json_decode($data['metas'],false); foreach($jsonitems->choices as $key=>$val) { ?>
				<table width="100%"  border="0" cellspacing="0" cellpadding="0" class="marginleft40">
                    <tr>
                       <td width=30><?php echo (strtoupper(msubstr($az,$key,1,'utf-8',false))); ?>:</td>
                       <td><?php echo (stripslashes(base64_decode($val))); ?></td>
                    </tr>
                </table>
				<?php } ?>
		<?php  foreach($jsonitems->choices as $key=>$val) { ?>
				<label class="radio-inline marginleft40" ><input type="radio" data-type="choice" 
				name="question_<?php echo ($data['id']); ?>" 
				<?php if(in_array(base64_encode(strtoupper(msubstr($az,$key,1,'utf-8',false))),$questionanswer)) { ?>
				 checked="checked" 
                <?php } ?>
				value="<?php echo (strtoupper(msubstr($az,$key,1,'utf-8',false))); ?>">&nbsp;<?php echo (strtoupper(msubstr($az,$key,1,'utf-8',false))); ?></label>
				<?php } break;?>    
	<?php case "choice": ?><a name="<?php echo ($questionnum); ?>"></a>
	    <div class="leftdiv">
          <div class="testpaper-question-seq"><?php echo ($questionnum); ?></div>
          <div class="testpaper-question-score"><?php echo ($data['score']); ?>分</div>
		</div>
		<div class="rightdiv"><?php echo ($data["stem"]); ?></div>
		<?php $itemquestionanswer=json_decode($data['answer'],false); $questionanswer=json_decode($answer[$data['id']],false); $answericon="wrong"; if(sizeof($questionanswer)==sizeof($itemquestionanswer)) { $answericon="right"; foreach($itemquestionanswer as $key=>$val) { if(base64_decode($questionanswer[$key])!=$val) { $answericon="wrong"; break; } } } ?>
        <div style="clear:both"></div>
	    <?php $jsonitems=json_decode($data['metas'],false); foreach($jsonitems->choices as $key=>$val) { ?>
				<table width="100%"  border="0" cellspacing="0" cellpadding="0" class="marginleft40">
                    <tr>
                       <td width=30><?php echo (strtoupper(msubstr($az,$key,1,'utf-8',false))); ?>:</td>
                       <td><?php echo (stripslashes(base64_decode($val))); ?></td>
                    </tr>
                </table>
				<?php } ?>
		<?php foreach($jsonitems->choices as $key=>$val) { ?>
				<label class="checkbox-inline marginleft40"><input type="checkbox" data-type="choice" 
				<?php if(in_array(base64_encode(strtoupper(msubstr($az,$key,1,'utf-8',false))),$questionanswer)) { ?>
				 checked="checked" 
                <?php } ?>
				name="question_<?php echo ($data['id']); ?>[]" value="<?php echo (strtoupper(msubstr($az,$key,1,'utf-8',false))); ?>">&nbsp;<?php echo (strtoupper(msubstr($az,$key,1,'utf-8',false))); ?></label>
				<?php } break;?>
	<?php case "fill": ?><a name="<?php echo ($questionnum); ?>"></a>
	    <?php $title=$data['stem']; preg_match_all('/\\[\\[.+?\\]\\]/i' ,$data['stem'] ,$res); $i=0; foreach($res[0] as $key=>$val) { $title=str_replace($val,"<span style='text-decoration:underline;color:#ff0000'>  (".++$i.")  </span>",$title); } ?>
			<div class="leftdiv">
              <div class="testpaper-question-seq"><?php echo ($questionnum); ?></div>
              <div class="testpaper-question-score"><?php echo ($data['score']); ?>分</div>
		    </div>
	  	    <div class="rightdiv"><?php echo ($title); ?></div>
        <?php $itemquestionanswer=json_decode($data['answer'],false); $questionanswer=json_decode($answer[$data['id']],false); $answericon="wrong"; if(sizeof($questionanswer)==sizeof($itemquestionanswer)) { $answericon="right"; foreach($itemquestionanswer as $key=>$val) { if($questionanswer[$key][0]!=$val[0]) { $answericon="wrong"; break; } } } ?>
        <div style="clear:both"></div>
			<?php  $i=0; foreach($res[0] as $key=>$val) { ?>
				   <div class="marginleft40"><input class="form-control " style="margin:5px 0px" type="text" data-type="fill" 
				   value="<?php if(sizeof($questionanswer)>=($key+1)) echo base64_decode($questionanswer[$key][0]); ?>"
				   name="question_<?php echo ($data['id']); ?>[]" placeholder="填空(<?php echo ++$i;?>)答案，请填在这里"></div>
				<?php } break;?>
	<?php case "determine": ?><a name="<?php echo ($questionnum); ?>"></a>
	    <div class="leftdiv">
          <div class="testpaper-question-seq"><?php echo ($questionnum); ?></div>
          <div class="testpaper-question-score"><?php echo ($data['score']); ?>分</div>
		</div>
		<div class="rightdiv"><?php echo ($data["stem"]); ?></div>
		<?php $itemquestionanswer=json_decode($data['answer'],false); $questionanswer=json_decode($answer[$data['id']],false); $answericon="wrong"; if(sizeof($questionanswer)==sizeof($itemquestionanswer)) { if(base64_decode($questionanswer[0])==$itemquestionanswer[0]) { $answericon="right"; } } ?>
        <div style="clear:both"></div>
	    <?php $data['metas']='{"choices":["正确","错误"]}'; $jsonitems=json_decode($data['metas'],false); foreach($jsonitems->choices as $key=>$val) { ?>
				<?php } ?>
		<?php  foreach($jsonitems->choices as $key=>$val) { ?>
				<label  class="radio-inline marginleft40"><input type="radio" data-type="choice"
				<?php if(in_array(base64_encode(1-$key),$questionanswer)) { ?>
				 checked="checked" 
                <?php } ?>
				name="question_<?php echo ($data['id']); ?>" value="<?php echo 1-$key; ?>"><?php echo ($val); ?></label>
				<?php } break;?>
	<?php case "essay": ?><a name="<?php echo ($questionnum); ?>"></a>
	    <div class="leftdiv">
          <div class="testpaper-question-seq"><?php echo ($questionnum); ?></div>
          <div class="testpaper-question-score"><?php echo ($data['score']); ?>分</div>
		</div>
		<div class="rightdiv"><?php echo ($data["stem"]); ?></div>
        <div style="clear:both"></div>
		<div class="marginleft40">
		<textarea class="form-control" name="question_<?php echo ($data['id']); ?>" cols="" rows="6"><?php $questionanswer=json_decode($answer[$data['id']],false); if(sizeof($questionanswer)>0) { echo base64_decode($questionanswer[0]); } ?>
		</textarea>
	    </div><?php break;?>
	<?php default: ?>找不到试题类型。<?php endswitch;?>
			 <?php if(sizeof($subdata)>1 && $subnum%2==0) { echo '<hr style="margin: 20px 0px">'; } ?>
			 <?php $subnum+=1; $questionnum+=1; endforeach; endif; else: echo "" ;endif; break;?>
	<?php default: ?>找不到试题类型。<?php endswitch;?>
  </div>
  <?php if(sizeof($list)>1 && $subnum%2==0) { echo '<hr style="margin: 0px 20px">'; } ?>
  <?php $subnum+=1; } ?>
  </div>
</li>

<?php } ?>
</ul>
<?php ?>
<?php ?>
				<!---------------------------------------->
            </div>
            <div class="col-md-3">
                <!---------------------------------------->
				<div  id="examcontrol">
				   <div class="common_block_border blog_position">
                    <div class="common_block_title">快速导航</div>
					 
                      <div style="margin: 15px">
					    <?php for($i=0;$i<$questionnum;$i++) { ?>
						<a href="javascript:;" data-anchor="#question19" class="btn btn-default btn-index pull-left  active" style="margin:0px 10px 10px 0px"><?php echo ($i+1); ?></a>
						<?php } ?>
						<?php if($questionPaperdata["limitedTime"]!="0") { if(is_numeric($questionPaperdata["limitedTime"])) { ?>
						   <script>
						   var clock=new clock();
                           var timer;
						   $(function(){
						     timer=setInterval("clock.move()",1000);
						   })
						   /*
                           window.onload=function(){
                                 timer=setInterval("clock.move()",1000);
                           }
						   */
        function clock(){
            this.s=<?php echo ($questionPaperdata["limitedTime"]); ?>*60;//$questionPaperdata["limitedTime"]
            this.move=function(){
                document.getElementById("timer").innerHTML=exchange(this.s);
                this.s=this.s-1;
                if(this.s<0){
                    //alert("时间到");
                    clearTimeout(timer);
					$('button[type="submit"]').click();
                }
            }
        }
        function exchange(time){
            this.m=Math.floor(time/60);
			this.m=this.m<10?"0"+this.m:this.m;
            this.h=Math.floor(time/3600);
			this.h=this.h<10?"0"+this.h:this.h;
            this.s=(time%60);
			this.s=this.s<10?"0"+this.s:this.s;
            this.text=this.h+":"+this.m+":"+this.s;
            return this.text;
        }
                           </script>
						   <div style="clear:both; text-align:center;padding:10px 0px">倒计时：<span id="timer"></span></div>
						   <?php } } ?>
						<button type="submit" class="btn btn-primary btn-block">我要交卷</button>
						<div class="clearfix mtm mbm"></div>
					  </div>
                  </div>
				</div> 
				<!---------------------------------------->
            </div>

			
        </div>

    </div>
</form>	
</body>
</html>