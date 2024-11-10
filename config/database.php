<?php
    function getDBConnection()
    {
        try{
            $db = new PDO('mysql::host=localhost;dbname=mvc_toko0060','root','');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        } catch(PDOException $e){
            echo 'Connection Failed : '.$e->getMessage();
        }
    }
?>