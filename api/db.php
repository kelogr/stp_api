<?php
    
    $dbconf['driver']='mysql';
    $dbconf['dbhost']='localhost';
    $dbconf['dbuser']='klopez_root';
    $dbconf['dbpass']='linuxlinux';
    $dbconf['dbname']='klopez_storypub';
    $dsn=$dbconf['driver'].':host='.$dbconf['dbhost'].';dbname='.$dbconf['dbname'];
    $usr=$dbconf['dbuser'];
    $pwd=$dbconf['dbpass'];


    require 'config.slim.php';
    
    function getDB(){
        try{
            $dbh = new PDO('mysql:host=localhost;dbname=klopez_storypub', 'klopez_root', 'linuxlinux');
        }
        catch (PDOException $ex){
            return null;
        }
        
        return $dbh;
    }
