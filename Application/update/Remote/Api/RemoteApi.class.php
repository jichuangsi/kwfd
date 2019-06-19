<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 蒲公英在线教学 <2014058008@qq.com> <http://www.zaixianjiaoxue.net>
// +----------------------------------------------------------------------

namespace Remote\Api;
use Remote\Api\Api;

class RemoteApi extends Api{
    /**
     * 构造方法，实例化操作模型
     */
	public $dbuser = "dxy";
    public $dbpass = "Dxy909090.";
    public $dbname = "dailyedu";
    public $dbhost = "61.155.173.155:3310";
    public $dbconn;
	/*
	public $dbuser = "dxy";
    public $dbpass = "Dxy909090.";
    public $dbname = "dailyedu";
    public $dbhost = "61.155.173.155:3310";
    public $dbconn;
	*/
    protected function _init(){
		$this->dbconn = @mysql_connect($this->dbhost, $this->dbuser, $this->dbpass) or die("Unable to connect to MySQL server");
        @mysql_query("SET NAMES 'utf8'");
		@mysql_select_db($this->dbname, $this->dbconn) or die("Unable to select database");
    }
	public function execute($sql)
    {
       //sql="INSERT INTO DATABASE(NAME,PASS) VALUES(NAME_NEW,PSE_NEW)"
        @mysql_query($sql,$this->dbconn);
    }
    public function query($sql)
    {
		$result = array();
		$res=@mysql_query($sql,$this->dbconn);
		$num=mysql_num_rows($res);
		if($num>0)
		{
		  while ($row = mysql_fetch_assoc($res)) {
             $result[]=$row;
          }
		}
		return $result;
    }
    public function getcontent()
    {
		//$query="select userName from user where userId=".$id;
		$query="select * from user";
		$result =$this->query($query);
		$data = @mysql_fetch_array($result);
        return($data[0]);

    }
}
