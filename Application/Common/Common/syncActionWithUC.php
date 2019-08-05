<?php

const SCRIPT_TEMP = '<script type="text/javascript" src="__URL__" reload="1"></script>';

function login(){
    //print_r(session('user_center'));    
    $uc = session('user_center');
    if($uc[0]&&$uc[3]){
        require_once('./Conf/user.php');
        if(UC_REMOTE){
            require_once('./api/uc_client/client.php');
            execSyncScrpt(uc_user_synlogin($uc[0]));
            if($uc[3]){
                $uc[3] = 0;
                session('user_center',$uc);
            }
        }
    }
}

function logout(){
    require_once('./Conf/user.php');
    if(UC_REMOTE){
        require_once('./api/uc_client/client.php');
        execSyncScrpt(uc_user_synlogout());
    }
}

function execSyncScrpt($ucsynlogin){
    if (preg_match_all('/"http(.+?)"/', $ucsynlogin, $matches)) {
        foreach ($matches[0] as $k=>$val){
            $v=str_replace('"','',$val);
            if(!empty($v)&&substr_count($v, $_SERVER['HTTP_HOST'])==0){
                echo str_replace("__URL__", $v, SCRIPT_TEMP);                
            }
        }
    }
}
?>