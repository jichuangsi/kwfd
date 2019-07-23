<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 蒲公英在线教学 <2014058008@qq.com> <http://www.zaixianjiaoxue.net>
// +----------------------------------------------------------------------

namespace Home\Controller;
use OT\DataDictionary;

/**
 * 前台首页控制器
 * 主要获取首页聚合数据
 */
class IndexController extends HomeController {
	//系统首页
    public function index($page = 1, $r = 5){

		$map['status'] = 1;
		$hotdata = D('Live/Live')->where($map)->order('recommend desc, createtime desc, view desc')->limit(8)->select();
		//echo D('Live/Live')->_sql();
        $this->assign('livehotdata', $hotdata);
		//var_dump($hotdata);
		
		$map['status'] = 1;
        $hotdata = D('Vod/Vod')->where($map)->order('id desc,view desc')->limit(8)->select();
        $this->assign('vodhotdata', $hotdata);
		//var_dump($hotdata);
		
		$map['status'] = 1;
        $hotdata = D('News/News')->where($map)->order('id desc,view desc')->limit(6)->select();
        $this->assign('newshotdata', $hotdata);
		//var_dump($hotdata);
		
		unset($map);
		$map['m.status'] = 1;
		$map['m.isteacher'] = 1;
		$teachers = M("Member")->alias("m")->field('m.*,CASE WHEN ISNULL(a.path) THEN "Addons/Avatar/default.jpg" ELSE CONCAT("Uploads/Avatar/",a.path) end as path')->join(C('DB_PREFIX').'avatar a ON m.uid=a.uid','LEFT')->where($map)->order('m.uid asc')->limit(8)->select();
		//dump(M("Member")->_sql()); 
		//dump($teachers); 
		$this->assign('teachers', $teachers); 
		 
		unset($map);
		$map['status'] = 1;
        $poster = D('Poster/Poster')->where($map)->order('sort asc')->select();
        $this->assign('poster', $poster);
		//var_dump($poster);
		$this->display();
    }
    public function downloadapp(){
		$this->display();
	}
	public function qrcode($content='')
    {
	   if (IS_POST || !empty($content)) 
	   {
		include(ROOT_PATH.'extend/phpqrcode/phpqrcode.php');
		$ewm=new \QRcode();
        $ewm::png($content);
	   }
	   else
	   {
		   $html = <<<EOF
<html>
    <head>
        <meta name="viewport" content="width=device-width">
        <meta name="viewport" content="width=device-width">
    </head>
    <body>
        <form action="posturl" method="post">
		  <b>生成二维码：</b><br>
          <p>二维码内容: <input type="text" name="content" style="width:100%"/></p>
 
          <input type="submit" value="提交" />
</form>
    </body>
</html>
EOF;
          $html=str_replace("posturl",U('qrcode'),$html);
          echo $html;
	   }
	}
    /**
     * 获取表情列表。
     */
    public function getSmile()
    {
        //这段代码不是测试代码，请勿删除
        exit(json_encode(D('Common/Expression')->getAllExpression()));
    }
}