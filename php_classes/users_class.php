<?php
require_once("connection_class.php");
//require_once("../php_func/some_functions.php");
class Users{
    public function __construct(){
        $this->dbh = connection::conn();
        return $this->dbh;
    }
    public function setCon(){
        $dbh = connection::conn();
        return $dbh;
    }
    public static function check_credentials($username,$password){
        $selectUserName = "select * from users where username = :username and password = :password and activ=2";
        $q = self::setCon()->prepare($selectUserName);
        $q->bindParam(':username',$username,PDO::PARAM_STR, 100);
        $q->bindParam(':password',sha1($password),PDO::PARAM_STR, 100);
        $q->execute();
        $q->setFetchMode(PDO::FETCH_BOTH);
        return $q;
    }
    
    public static function get_user_type($user_id){
        $selectUserName = "select * from users where id= :id";
        $q = self::setCon()->prepare($selectUserName);
        $q->bindParam(':id',$user_id,PDO::PARAM_INT);
        $q->execute();
        $q->setFetchMode(PDO::FETCH_BOTH);
        return $q;
    }
    
    public static function check_unique_user($username,$self_id=0){
        $getUser = "select * from users where username= :username";
        if($self_id !=0){
            $getUser .= " and id != :self_id";
        }
        $q = self::setCon()->prepare($getUser);
        $q->bindParam(':username',$username,PDO::PARAM_STR, 100);
        if($self_id !=0){
            $q->bindParam(':self_id',$self_id,PDO::PARAM_INT);
        }
        $q->execute();
        $nrRows = $q->rowCount();
        return $nrRows;
    }
    
    public static function check_unique_email($email,$self_id=0){
        $getUser = "select * from users where email= :email";
        if($self_id!=0){
            $getUser .= " and id != :self_id";
        }
        $q = self::setCon()->prepare($getUser);
        $q->bindParam(':email',$email,PDO::PARAM_STR, 100);
        if($self_id !=0){        
            $q->bindParam(':self_id',$self_id,PDO::PARAM_INT);
        }
        $q->execute();
        $nrRowss = $q->rowCount();
        return $nrRowss;
    }
    
    public static function check_admin_user($id){
        $getUserData = "select * from users where id=:id";
        $q = self::setCon()->prepare($getUserData);
        $q->bindParam(':id',$id,PDO::PARAM_INT);
        $q->execute();
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $row = $q->fetch();
        if($row['type']==10){
            return 1;
        }
        else{
            return 0;
        }
    }
    
    public static function select_all_users(){
        $getUsers = "select * from users
        left join account_type on account_type.id_account=users.type
        order by type desc, id asc";
        $q = self::setCon()->prepare($getUsers);
        $q->execute();
        $q->setFetchMode(PDO::FETCH_BOTH);
        return $q;
    }

    public static function get_last_inserted_user($id){
        $getUsers = "select * from users
        left join account_type on account_type.id_account=users.type
        where id=:id
        order by type desc, id asc";
        $q = self::setCon()->prepare($getUsers);
        $q->bindParam(':id',$id,PDO::PARAM_INT);
        $q->execute();
        $q->setFetchMode(PDO::FETCH_ASSOC);
        return $q;
    }
    
    public static function get_account_type(){
        $getAcType = "select * from account_type";
        $q = self::setCon()->prepare($getAcType);
        $q->execute();
        $q->setFetchMode(PDO::FETCH_ASSOC);
        //print_r($q->errorInfo());
        return $q;
    }
    
    public static function insert_new_user($username,$email,$password,$user_type="0",$active="0"){
        $dbh = self::setCon();
        $insertUser = "insert into users values(null, :username, :password, :email, :hashMe, :user_type, :active, :getUsersPcData, now())";
        $q = $dbh->prepare($insertUser);
        $hashMe = sha1($username+$email+$password);
        
        $q->bindParam(':username', $username, PDO::PARAM_STR, 100);
        $q->bindParam(':password', sha1($password), PDO::PARAM_STR, 50);
        $q->bindParam(':email', $email, PDO::PARAM_STR, 100);
        $q->bindParam(':hashMe', $hashMe, PDO::PARAM_STR, 50);
        $q->bindParam(':user_type', $user_type, PDO::PARAM_STR, 2);
        $q->bindParam(':active', $active, PDO::PARAM_INT);
        $q->bindParam(':getUsersPcData', self::getUsersPCData(), PDO::PARAM_STR, 200);
        $q->execute();
        $id = $dbh->lastInsertId();
        return $id;
    }
    
    public static function delecte_user_from_admin($id){
        $get_user_data = self::get_last_inserted_user($id);
        $get_user_data->fetch();
        $delete_user = "delete from users where id=:id";
        $q = self::setCon()->prepare($delete_user);
        $q->bindParam("id",$id,PDO::PARAM_INT);
        $q->execute();
    }
    
    private function getUsersPCData(){
        if (getenv("HTTP_CLIENT_IP")) $ip = getenv("HTTP_CLIENT_IP"); 
        else if(getenv("HTTP_X_FORWARDED_FOR")) $ip = getenv("HTTP_X_FORWARDED_FOR"); 
        else if(getenv("REMOTE_ADDR")) $ip = getenv("REMOTE_ADDR"); 
        else $ip = "UNKNOWN";
        $pcname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $users_machine['ip']=$ip;
        $users_machine['pcname'] = $pcname;
        $users_machine = json_encode($users_machine);
        return $users_machine; 
    }    
    
}
?>