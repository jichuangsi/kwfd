<?php
namespace OT\TagLib;
use Think\Template\TagLib;
/**
 * ThinkCMS 系文档模型标签库
 */
class Article extends TagLib{
	/**
	 * 定义标签列表
	 * @var array
	 */
	protected $tags   =  array(
		'partlist' => array('attr' => 'id,field,page,name', 'close' => 1), //段落列表
		'partpage' => array('attr' => 'id,listrow', 'close' => 0), //段落分页
		'prev'     => array('attr' => 'name,info', 'close' => 1), //获取上一篇文章信息
		'next'     => array('attr' => 'name,info', 'close' => 1), //获取下一篇文章信息
		'page'     => array('attr' => 'cate,listrow', 'close' => 0), //列表分页
		'position' => array('attr' => 'pos,cate,limit,filed,name', 'close' => 1), //获取推荐位列表
		'list'     => array('attr' => 'name,category,child,page,row,field', 'close' => 1), //获取指定分类列表
		'lists'     => array('attr' => 'modelid', 'close' => 1), //获取指定分类列表
		'listbycategory'     => array('attr' => 'category', 'close' => 1), //获取指定分类列表
		'listbycategorypage'     => array('attr' => 'category,row', 'close' => 0), //列表分页

	);

	public function _list($tag, $content){
		$name   = $tag['name'];
		$cate   = $tag['category'];
		$child  = empty($tag['child']) ? 'false' : $tag['child'];
		$row    = empty($tag['row'])   ? '10' : $tag['row'];
		$field  = empty($tag['field']) ? 'true' : $tag['field'];
		$parse  = '<?php ';
		//$parse .= '$category=D(\'Category\')->getChildrenId('.$cate.');';
		$parse .= '$category=D(\'Category\')->getChildrenIdandParentId('.$cate.');';
		$parse .= '$__LIST__ = D(\'Document\')->page(!empty($_GET["p"])?$_GET["p"]:1,'.$row.')->lists(';
		$parse .= '$category, \'`level` DESC,`id` DESC\', 1,';
		$parse .= $field . ');';
		$parse .= ' ?>';
		//die('$category=D(\'Category\')->getChildrenId('.$cate.');'.'$__LIST__ = D(\'Document\')->page(!empty($_GET["p"])?$_GET["p"]:1,'.$row.')->lists('.'$category, \'`level` DESC,`id` DESC\', 1,);');
		$parse .= '<volist name="__LIST__" id="'. $name .'">';
		$parse .= $content;
		$parse .= '</volist>';
		return $parse;
	}
    public function _lists($tag, $content){
	    $error="lists error";
		$model   = $tag['model'];
		$name   = $tag['name'];
		//获取模型信息
		
		$parse  = '<?php ';
		$parse .= '$model = M(\'Model\')->getByName("'.$model.'");';
		$parse .= '$map	=	array();'; 
		$parse .= '$fields = array();';
		$parse .= '$row    = empty($model[\'list_row\']) ? 10 : $model[\'list_row\'];';
		$parse .= 'if($model[\'extend\'])';
		$parse .= '{';
		$parse .= '  $name   = get_table_name($model[\'id\']);';
		$parse .= '  $parent = get_table_name($model[\'extend\']);';
		$parse .= '  $fix    = C("DB_PREFIX");';
		$parse .= '  /* 查询记录数 */';
		$parse .= '  $count = M($parent)->join("INNER JOIN ".$fix."".$name." ON ".$fix."".$parent.".id = ".$fix."".$name.".id")->where($map)->count();';
		$parse .= '  /* 查询记录数 */';
		$parse .= '  $__LIST__= M($parent)';
		$parse .= '  ->join("INNER JOIN ".$fix."".$name." ON ".$fix."".$parent.".id = ".$fix."".$name.".id")';
		//$parse .= '  ->field(empty($fields) ? true : $fields)';
		$parse .= '  ->where($map)';
		$parse .= '  ->order($fix."".$parent.".id DESC")';
		$parse .= '  ->page(!empty($_GET["p"])?$_GET["p"]:1, $row)';
		$parse .= '  ->select();';
		$parse .= '}';
		$parse .= 'else';
		$parse .= '{';
		$parse .= '  echo(\''.$error.'\');';
		$parse .= '}';
		$parse .= ' ?>';
		$parse .= '<volist name="__LIST__" id="'. $name .'">';
		$parse .= $content;
		$parse .= '</volist>';
		return $parse;
	}
	public function _listbycategory($tag, $content){
	    $error="lists error";
		$category   = $tag['category'];
		$listrow = $tag['listrow'];
		$listrow = empty($listrow)?10:$listrow;
		$name   = $tag['name'];
		//获取模型信息
		
		$parse  = '<?php ';
		$parse .= 'if(preg_replace(\'/\\\\d/\',\'\',\''.$category.'\')==="")';
        $parse .= '{';
		$parse .= '  $category=M(\'Category\')->find(\''.$category.'\');';
		$parse .= '}';
		$parse .= 'else';
		$parse .= '{';
		$parse .= '  $category=M(\'Category\')->where(\'name="'.$category.'"\')->select();';
		$parse .= '}';
		$parse .= '$category_ids="";';
		$parse .= 'if(!empty($category[\'pid\']))';
		$parse .= '{';
		$parse .= '  $category_ids=$category[\'id\'];';
		$parse .= '}';
		$parse .= 'else';
		$parse .= '{';
		$parse .= '  $category_ids=D(\'Category\')->getChildrenIdandParentId('.$category.');';
		$parse .= '}';
		//$parse .= 'dump($category);'; 
		//$parse .= 'dump($category_ids);'; 
		$parse .= '$model = M(\'Model\')->find($category[\'model\']);';
		$parse .= '$map	=	array();'; 
		$parse .= '$fields = array();';
		$parse .= '$listrow    = \''.$listrow.'\';';
		$parse .= 'if($model[\'extend\'])';
		$parse .= '{';
		$parse .= '  $name   = get_table_name($model[\'id\']);';
		$parse .= '  $parent = get_table_name($model[\'extend\']);';
		$parse .= '  $fix    = C("DB_PREFIX");';
		$parse .= '  /* 查询记录数 */';
		$parse .= '  $map_category_id[\'category_id\']  = array(\'in\',\'\'.$category_ids.\'\');';
		$parse .= '  $count = M($parent)->where($map_category_id)->join("INNER JOIN ".$fix."".$name." ON ".$fix."".$parent.".id = ".$fix."".$name.".id")->where($map)->count();';
		$parse .= '  /* 查询记录数 */';
		$parse .= '  $__LIST__= M($parent)';
		//$parse .= '  ->alias("__DOCUMENT__")';
		$parse .= '  ->where($map_category_id)';
		$parse .= '  ->join("INNER JOIN ".$fix."".$name." ON ".$fix."".$parent.".id = ".$fix."".$name.".id")';
		//$parse .= '  ->join("INNER JOIN ".$fix."".$name." ON __DOCUMENT__.id = ".$fix."".$name.".id")';
		//$parse .= '  ->field(empty($fields) ? true : $fields)';
		//$parse .= '  ->field(empty($fields) ? true : $fields)';
        //$parse .= '  ->field($fix."".$name.".title")';
		$parse .= '  ->field("*")';
		$parse .= '  ->order($fix."".$parent.".id DESC")';
		$parse .= '  ->page(!empty($_GET["p"])?$_GET["p"]:1, $listrow)';
		$parse .= '  ->select();';
		$parse .= '}';
		$parse .= 'else';
		$parse .= '{';
		$parse .= '  echo(\''.$error.'\');';
		$parse .= '}';
		//$parse .= 'dump("INNER JOIN ".$fix."".$name." ON __DOCUMENT__.id = ".$fix."".$name.".id");'; 
		$parse .= ' ?>';
		$parse .= '<volist name="__LIST__" id="'. $name .'">';
		$parse .= $content;
		$parse .= '</volist>';
		return $parse;
	}
		/* 列表数据分页 */
	public function _listbycategorypage($tag){
	    $error="lists error";
		$category   = $tag['category'];
		$listrow = $tag['listrow'];
		//获取模型信息
		
		$parse  = '<?php ';
		$parse .= 'if(preg_replace(\'/\\\\d/\',\'\',\''.$category.'\')==="")';
        $parse .= '{';
		$parse .= '  $category=M(\'Category\')->find(\''.$category.'\');';
		$parse .= '}';
		$parse .= 'else';
		$parse .= '{';
		$parse .= '  $category=M(\'Category\')->where(\'name="'.$category.'"\')->select();';
		$parse .= '}';
		$parse .= '$category_ids="";';
		$parse .= 'if(!empty($category[\'pid\']))';
		$parse .= '{';
		$parse .= '  $category_ids=$category[\'id\'];';
		$parse .= '}';
		$parse .= 'else';
		$parse .= '{';
		$parse .= '  $category_ids=D(\'Category\')->getChildrenIdandParentId('.$category.');';
		$parse .= '}';
		//$parse .= 'dump($category);'; 
		//$parse .= 'dump($category_ids);'; 
		$parse .= '$model = M(\'Model\')->find($category[\'model\']);';
		$parse .= '$map	=	array();'; 
		$parse .= '$fields = array();';
		$parse .= '$row    = empty($model[\'list_row\']) ? 10 : $model[\'list_row\'];';
		$parse .= 'if($model[\'extend\'])';
		$parse .= '{';
		$parse .= '  $name   = get_table_name($model[\'id\']);';
		$parse .= '  $parent = get_table_name($model[\'extend\']);';
		$parse .= '  $fix    = C("DB_PREFIX");';
		$parse .= '  /* 查询记录数 */';
		$parse .= '  $map_category_id[\'category_id\']  = array(\'in\',\'\'.$category_ids.\'\');';
		$parse .= '  $count = M($parent)->where($map_category_id)->join("INNER JOIN ".$fix."".$name." ON ".$fix."".$parent.".id = ".$fix."".$name.".id")->where($map)->count();';
		$parse  .= '$__PAGE__ = new \Think\Page($count, ' . $listrow . ');';
		$parse  .= 'echo $__PAGE__->show();';
		$parse .= '}';
		$parse .= 'else';
		$parse .= '{';
		$parse .= '  echo(\''.$error.'\');';
		$parse .= '}';
		$parse .= ' ?>';
		return $parse;
	}
	/* 推荐位列表 */
	public function _position($tag, $content){
		$pos    = $tag['pos'];
		$cate   = $tag['cate'];
		$limit  = empty($tag['limit']) ? 'null' : $tag['limit'];
		$field  = empty($tag['field']) ? 'true' : $tag['field'];
		$name   = $tag['name'];
		$parse  = '<?php ';
		$parse .= '$__POSLIST__ = D(\'Document\')->position(';
		$parse .= $pos . ',';
		$parse .= $cate . ',';
		$parse .= $limit . ',';
		$parse .= $field . ');';
		$parse .= ' ?>';
		$parse .= '<volist name="__POSLIST__" id="'. $name .'">';
		$parse .= $content;
		$parse .= '</volist>';
		return $parse;
	}

	/* 列表数据分页 */
	public function _page($tag){
		$cate    = $tag['cate'];
		$listrow = $tag['listrow'];
		$parse   = '<?php ';
		$parse  .= '$__PAGE__ = new \Think\Page(get_list_count(' . $cate . '), ' . $listrow . ');';
		$parse  .= 'echo $__PAGE__->show();';
		$parse  .= ' ?>';
		return $parse;
	}

	/* 获取下一篇文章信息 */
	public function _next($tag, $content){
		$name   = $tag['name'];
		$info   = $tag['info'];
		$parse  = '<?php ';
		$parse .= '$' . $name . ' = D(\'Document\')->next($' . $info . ');';
		$parse .= ' ?>';
		$parse .= '<notempty name="' . $name . '">';
		$parse .= $content;
		$parse .= '</notempty>';
		return $parse;
	}

	/* 获取上一篇文章信息 */
	public function _prev($tag, $content){
		$name   = $tag['name'];
		$info   = $tag['info'];
		$parse  = '<?php ';
		$parse .= '$' . $name . ' = D(\'Document\')->prev($' . $info . ');';
		$parse .= ' ?>';
		$parse .= '<notempty name="' . $name . '">';
		$parse .= $content;
		$parse .= '</notempty>';
		return $parse;
	}

	/* 段落数据分页 */
	public function _partpage($tag){
		$id      = $tag['id'];
		if ( isset($tag['listrow']) ) {
			$listrow = $tag['listrow'];
		}else{
			$listrow = 10;
		}
		$parse   = '<?php ';
		$parse  .= '$__PAGE__ = new \Think\Page(get_part_count(' . $id . '), ' . $listrow . ');';
		$parse  .= 'echo $__PAGE__->show();';
		$parse  .= ' ?>';
		return $parse;
	}

	/* 段落列表 */
	public function _partlist($tag, $content){
		$id     = $tag['id'];
		$field  = $tag['field'];
		$name   = $tag['name'];
		if ( isset($tag['listrow']) ) {
			$listrow = $tag['listrow'];
		}else{
			$listrow = 10;
		}
		$parse  = '<?php ';
		$parse .= '$__PARTLIST__ = D(\'Document\')->part(' . $id . ',  !empty($_GET["p"])?$_GET["p"]:1, \'' . $field . '\','. $listrow .');';
		$parse .= ' ?>';
		$parse .= '<?php $page=(!empty($_GET["p"])?$_GET["p"]:1)-1; ?>';
		$parse .= '<volist name="__PARTLIST__" id="'. $name .'">';
		$parse .= $content;
		$parse .= '</volist>';
		return $parse;
	}
}