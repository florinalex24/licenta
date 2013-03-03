<?php
 /**
 * Example Application

 * @package Example-application
 */

require('Smarty/libs/Smarty.class.php');

$smarty = new Smarty;

require_once("Smarty/libs/languages_classes_1.php");
require_once("php_classes/users_class.php");
require_once("php_classes/validateData_class.php");
//include('Localizer.class.php');
$lang = "ro";
Localizer::init($lang);
$smarty->registerPlugin('block', 'translate', array('Localizer', 'translate'), true);

$smarty->assign("lang",$lang);

//inserting new account
if(isset($_POST['create_account'])){
    
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $check_username = validateData::validate_username($_POST["username"]);
    $check_email = validateData::validate_email($_POST["email"]);
    $check_password = validateData::validate_password($_POST["password"]);
    $checksum = $check_username + $check_password + $check_email;
    if($checksum>0){
        $form_err=1;
    }
    else{
        $form_err=0;
        $insertUser = Users::insert_new_user($username,$email,$password);
        if($insertUser>0){
            $form_ok = 1;
            $smarty->assign("form_ok",$form_ok);
        }
        else{
            $query_err=1;
            $smarty->assign("query_err",$query_err);
        }
    }
    $smarty->assign("form_error",$form_err);
}

//$smarty->force_compile = true;
//$smarty->debugging = true;
//$smarty->caching = true;
//$smarty->cache_lifetime = 120;

$smarty->assign('username', "flo");
$smarty->assign("Name", "me");
$smarty->display('index.tpl');
?>
