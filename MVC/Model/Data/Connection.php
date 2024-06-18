<?php
class Connection{
    public static function Connect(){
        $serverName = "db";
        $userName = "root";
        $password = "password";

        try{
            $conn = new PDO("mysql:host=$serverName;dbname=HELPDESK",$userName,$password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connection success!";
            return $conn;
        }
        catch(PDOException $e){
            echo "Miss Connection!". $e->getMessage();
            return null;
        }
    }
}
?>