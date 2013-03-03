<?php
    require_once("../admin/configs/config_admin.inc.php");    
    $validateId=$_REQUEST['fieldId'];
    $getField = explode("-",$validateId);
    $getField = $getField[1];
    print_r($_POST);
    $uname = $_GET["fieldValue"];
    $uname = trim($uname);

    if($getField=="username"){
        $check_user = Users::check_unique_user($uname);
    }
    elseif($getField=="email"){
        $check_user = Users::check_unique_email($uname);
    }
    else{
        $check_user = 1;
    }
    
    $arrayToJs = array();
    $arrayToJs[0] = $validateId;
    $arrayToJs[1] = false;
    if($check_user < 1 ){		
	$arrayToJs[1] = true;		
    }else{
	$arrayToJs[1] = false;
    }
    echo json_encode($arrayToJs);	
?>






