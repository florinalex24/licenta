<?php
    require_once("../admin/configs/config_admin.inc.php");    
    $users_all = array();
    $user_all["Result"] = "ERROR";
    if($_POST["id"] == $_SESSION["user_id"]){
        $user_all["Result"] = "ERROR! Nu poti sterge contul de administrator de pe care esti logat!!!";
    }
    else{
        $id = $_POST["id"];
        $check_id = validateData::validate_id($_POST["id"]);
        $checksum = $check_id;
        if($checksum>0){
            $user_all["Result"] = "ERROR";
        }
        else{
            $deleteUser = Users::delecte_user_from_admin($id);
            $user_all["Result"] = "OK";
        }
    }

    echo json_encode($user_all);
?>