<?php

    //database conf
    
    /*$dbconf['driver']='mysql';
    $dbconf['dbhost']='localhost';
    $dbconf['dbuser']='root';
    $dbconf['dbpass']='linuxlinux';
    $dbconf['dbname']='storypub';
    $dsn=$dbconf['driver'].':host='.$dbconf['dbhost'].';dbname='.$dbconf['dbname'];
    $usr=$dbconf['dbuser'];
    $pwd=$dbconf['dbpass'];*/

//Configuracion general
    $config['displayErrorDetails'] = true; //POdemos ver los detalles de los errores
    $config['addContentLengthHeader']=false; //Información GET/POST/..
//Configuración PDO
    $config['db']['host']='localhost';
    /*$config['db']['user']='root';*/
    $config['db']['pass']='linuxlinux';
    $config['db']['user']='klopez_root';
    
    $config['db']['dbname']='klopez_storypub';