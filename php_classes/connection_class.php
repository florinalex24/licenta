<?php
    class connection{
        public static function conn(){
            try {
                $dbh = new PDO("mysql:host=localhost;dbname=lic_bd", "root", "fl9l8n7x");
                return $dbh;
            } catch (PDOException $exception) {
                $error = "error connecting";
                echo $error;
                return $error;
            }

        }
    }
?>