<?php
require_once("connection_class.php");
//require_once("../php_func/some_functions.php");
class Users{
    public function __construct(){
        $this->dbh = connection::conn();
        return $this->dbh;
    }
    public static function setCon(){
        $dbh = connection::conn();
        return $dbh;
    }
    public static function check_credentials($username,$password){
        $selectUserName = "select * from users where username = :username and password = :password";
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
    
    public static function check_unique_user($username){
        $getUser = "select * from users where username= :username";
        $q = self::setCon()->prepare($getUser);
        $q->bindParam(':username',$username,PDO::PARAM_STR, 100);
        $q->execute();
        $nrRows = $q->rowCount();
        return $nrRows;
    }
    
    public static function check_unique_email($email){
        $getUser = "select * from users where email= :email";
        $q = self::setCon()->prepare($getUser);
        $q->bindParam(':email',$email,PDO::PARAM_STR, 100);
        $q->execute();
        $nrRowss = $q->rowCount();
        return $nrRowss;
    }
    public static function insert_new_user($username,$email,$password){
        $dbh = self::setCon();
        $insertUser = "insert into users values(null, :username, :password, :email, :hashMe, '10', '1', :getUsersPcData, now())";
        $q = $dbh->prepare($insertUser);
        $hashMe = sha1($username+$email+$password);
        
        $q->bindParam(':username', $username, PDO::PARAM_STR, 100);
        $q->bindParam(':password', sha1($password), PDO::PARAM_STR, 50);
        $q->bindParam(':email', $email, PDO::PARAM_STR, 100);
        $q->bindParam(':hashMe', $hashMe, PDO::PARAM_STR, 50);
        $q->bindParam(':getUsersPcData', self::getUsersPCData(), PDO::PARAM_STR, 200);
        $q->execute();
        $id = $dbh->lastInsertId();
        return $id;
    }
    public static function get_recover_email($email){
        $select_email = "select * from users where email = :email";
        $q = self::setCon()->prepare($select_email);
        $q->bindParam(':email',$email,PDO::PARAM_STR,100);
        $q->execute();
        $q->setFetchMode(PDO::FETCH_ASSOC);
        return $q;
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