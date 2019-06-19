<?php
return array(

 'app_begin' =>  array('Behavior\CheckLang'),
 'login_listener'=>array('LoginListener'),
 'app_init'=>array('Common\Behavior\InitHook'),
 'action_begin' => array('Common\Behavior\InitModuleInfo'),
	
);