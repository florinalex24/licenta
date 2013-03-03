<?php
    session_start();
    require_once("../php_classes/users_class.php");
    $response['err'] = 1;
    
    $credentials = $_POST["credentials"];
    $username = $credentials[0]['value'];
    $password = $credentials[1]['value'];
    
    $check_user = Users::check_credentials($username,$password);
    $nr_inreg = $check_user->rowCount();
    if($nr_inreg>0){
        $response['err'] = 0;
        $user_date = $check_user->fetch();
        $_SESSION['user_id'] = $user_date['id'];
        $_SESSION['username'] = $user_date['username'];
        $_SESSION['user_type'] = $user_date['type'];
    }
    else{
        $response['err'] = 1;
    }
    echo json_encode($response);
?>