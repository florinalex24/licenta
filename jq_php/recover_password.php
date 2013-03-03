<?php
    require_once("../php_classes/users_class.php");
    require_once("../php_classes/emails_class.php");
    $response['err'] = 1;
    $credentials = $_POST["credentials"];
    $email = $credentials[0]['value'];
    $check_email = Users::get_recover_email($email);
    $nr_inreg = $check_email->rowCount();
    $check_email = $check_email->fetch();
    if($nr_inreg<1){
        $response['err'] = 1;
    }
    elseif(empty($check_email["hash_validation"])){
        $response['err'] = 2;
    }
    else{
        $getHash = $check_email['hash_validation'];
        $response['hash'] = $getHash;
        emails::recover_password($check_email['email'],$getHash);
        $response['err'] = 0;
    }
    //$nr_inreg = $check_user->rowCount();
    echo json_encode($response);
?>