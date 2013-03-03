<?php
    //session_start();
    //require_once("../php_classes/users_class.php");
    require_once("../admin/configs/config_admin.inc.php");    

    $getAcType = Users::get_account_type();
    $ac_type = array();$i=0;
    while($row = $getAcType->fetch()){
        $ac_type[$i]["DisplayText"] = $row["account_type"];
        $ac_type[$i]["Value"] = $row["id_account"];
        $i++;
    }
    $acc_type_all = array();
    $acc_type_all["Result"] = "OK";
    $acc_type_all["Options"] = $ac_type;
    echo json_encode($acc_type_all);
?>