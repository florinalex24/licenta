<?php
    //session_start();
    //require_once("../php_classes/users_class.php");
    require_once("../admin/configs/config_admin.inc.php");    
    
    $response['err'] = 1;
    $getUsers = Users::select_all_users();
    $users = array();
    $i=1;
    while($row = $getUsers->fetch()){
        $dateConectare = json_decode($row["ip"]);
        $conect = 'ip='.$dateConectare->ip.' pcname='.$dateConectare->pcname;
        if($row["data_insert"] !="0000-00-00 00:00:00"){
            $source = $row['data_insert'];
            $date = new DateTime($source);
            $data = $date->format('d-m-Y H:m:s');
        }
        else{
            $date = "00-00-0000 00:00:00";
        }
        $users[] = array(
                                   "id"=>$row["id"],
                                   "nrcrt"=>$i++,
                                   "username"=>$row["username"],
                                   "email"=>$row["email"],
                                   "id_account"=>$row["id_account"],
                                   "activ"=>$row["activ"],
                                   "ip"=>$conect,
                                   "data_insert"=>$data,
                                   "password"=>$row["password"],
                                   );
    }
    $users_all = array();
    $user_all["Result"] = "OK";
    $user_all["Records"] = $users;
    //$user_all = json_encode($user_all);    
    echo json_encode($user_all);
?>