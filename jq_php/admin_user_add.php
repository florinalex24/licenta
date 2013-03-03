<?php
    require_once("../admin/configs/config_admin.inc.php");    

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $activ = "1";

    $check_username = validateData::validate_username($_POST["username"]);
    $check_email = validateData::validate_email($_POST["email"]);
    $check_password = validateData::validate_password($_POST["password"]);
    $checksum = $check_username + $check_password + $check_email;
    if($checksum>0){
        $form_err=1;
    }
    else{
        $form_err=0;
        $insertUser = Users::insert_new_user($username,$email,$password,"10",$activ);
        if($insertUser>0){
            $getLastRow = Users::get_last_inserted_user($insertUser);
            $getdata = $getLastRow->fetch();

            $dateConectare = json_decode($getdata["ip"]);
            $conect = 'ip='.$dateConectare->ip.' pcname='.$dateConectare->pcname;
            if($getdata["data_insert"] !="0000-00-00 00:00:00"){
                $source = $getdata['data_insert'];
                $date = new DateTime($source);
                $data = $date->format('d-m-Y H:m:s');
            }
            else{
                $date = "00-00-0000 00:00:00";
            }
            $getdata["nrcrt"] = $getdata["id"];
            $getdata["ip"] = $conect;
            $getdata["data_insert"] = $data;
        }
        else{

        }
    }

    
    $users_all = array();
    $user_all["Result"] = "OK";
    $user_all["Record"] = $getdata;
    //$user_all = json_encode($user_all);    
    echo json_encode($user_all);
?>