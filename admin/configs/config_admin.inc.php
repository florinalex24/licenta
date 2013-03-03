<?php
session_start();
require_once('../php_classes/users_class.php');
require_once('../php_classes/validateData_class.php');
$good_con = 1;
if(isset($_SESSION['user_id']) && $_SESSION['user_id']>0){
    $check_user = Users::check_admin_user($_SESSION['user_id']);
    if($check_user==1){
        $good_con = 1;
    }
    else{
        $good_con = 0;
    }
}
else{
    $good_con = 0;
}
if($good_con==0){
    session_destroy();
    header("Location:../authorization_failed.php");
}

require('../Smarty/libs/Smarty.class.php');
$smarty = new Smarty;




?>