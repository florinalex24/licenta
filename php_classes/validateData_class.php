<?php
require_once("users_class.php");

//data validation class
class validateData{
    public static function validate_username($username){
        $check_doubles = Users::check_unique_user($username);
        if(empty($username)){
            return 1;
        }
        elseif($check_doubles>0){
            return 1;
        }
        elseif(!preg_match("/[a-zA-Z0-9_'-]/",$username)) {
            return 1;
        }
        else{
            return 0;
        }
    }
    public static function validate_password($password){
        if(strlen($password)<6){
            return 1;
        }
        else{
            return 0;
        }
    }
    public static function validate_email($email){
        $check_doubles = Users::check_unique_email($email);
        if($check_doubles>0){
            return 1;
        }
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return 1;
        }
        else{
            return 0;
        }
    }
    public static function validate_id($id){
        if(isset($id) && $id>0){
            return 0;
        }
        else{
            return 1;
        }
    }

}
?>