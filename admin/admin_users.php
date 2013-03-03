<?php
require_once("configs/config_admin.inc.php");

$getUsers = Users::select_all_users();
$users = array();
while($row = $getUsers->fetch()){
    $users[] = array(
                                   "id"=>$row["id"],
                                   "username"=>$row["username"],
                                   "email"=>$row["email"],
                                   "type"=>$row["account_type"],
                                   "activ"=>$row["activ"],
                                   "ip"=>$row["ip"],
                                   "cont_creat"=>$row["data_insert"],
                                   );
}
$user_all["Result"] = "OK";
$user_all["Recors"] = $users;
$user_all = json_encode($user_all);
$smarty->assign("users",$users_all);
$smarty->display('admin_users.tpl');
?>
