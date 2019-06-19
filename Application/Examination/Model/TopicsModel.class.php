<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 蒲公英在线教学 <2014058008@qq.com> <http://www.zaixianjiaoxue.net>
// +----------------------------------------------------------------------

namespace Examination\Model;
use Think\Model;

/**
 * 题库模型
 */
class TopicsModel extends Model{
    //根据题目id获取题目名称
    public function getTopicName($uid){
        return $this->where(array('id'=>(int)$uid))->getField('name');
    }
    //根据题目id获取题目内容
    public function getTopicContent($uid){
        return $this->where(array('id'=>(int)$uid))->getField('content');
    }
}
