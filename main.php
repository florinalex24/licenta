<?php
require_once("start_config.php");
if(isset($_SESSION) && isset($_SESSION['user_id']) && $_SESSION['user_id']>0){
    $get_date = Users::get_user_type($_SESSION['user_id']);
    $get_date = $get_date->fetch();
    if($_SESSION['user_type']==$get_date['type']){
        $is_admin = false;
        if($get_date['type']==10){
            $is_admin = true;
        }
        else{
            $is_admin = false;
        }
    }
    echo '<pre>';
    print_r($get_date);
    echo '</pre>';

    $smarty->assign("is_admin",$is_admin);
    $smarty->assign("Name", "me");
    $smarty->display('main.tpl');
}
else{
    header("Location:index.php");
}

?>
