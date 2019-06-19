<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 蒲公英在线教学 <2014058008@qq.com> <http://www.zaixianjiaoxue.net>
// +----------------------------------------------------------------------

namespace Shop\Model;
use Think\Model;

/**
 * Class ShopConfigModel
 * @package Shop\Model
 * 
 */
class ShopConfigModel extends Model {

    protected $tableName='shop_config';
	protected $_validate = array(
		array('url','require','url必须填写'), //默认情况下用正则进行验证
        array('cname', '1,25', '中文名长度不合法', self::EXISTS_VALIDATE, 'length'),
	);
    protected $_auto = array(
        array('changetime', NOW_TIME, self::MODEL_INSERT),
    );

}