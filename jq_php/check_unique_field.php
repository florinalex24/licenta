<?php
    session_start();
    require_once("../php_classes/users_class.php");
    $response['err'] = 1;
    
    $type = $_POST["type"];
    if($type=="uname"){
        $uname = trim($_POST["uname"]);
        $check_user = Users::check_unique_user($uname);
    }
    elseif($type=="uemail"){
        $email = $_POST["uemail"];
        $check_user = Users::check_unique_email($email);
    }
    if($check_user>0){
        $response['err'] = 1;
    }
    else{
        $response['err'] = 0;        
    }
    echo json_encode($response);
?>