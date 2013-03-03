<?php
    class connection{
        public static function conn(){
            try {
                $dbh = new PDO("mysql:host=localhost;dbname=lic_db", "root", "umbparola");
                return $dbh;
            } catch (PDOException $exception) {
                $error = "error connecting";
                return $error;
            }

        }
    }
?>