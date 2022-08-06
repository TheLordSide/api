<?php
include("../config/json-header.php");
function getconnexion(){
    try {
        //local build
       // $user ='root';
       // $pass = '';
       // $host = 'localhost';
       // $pdo = new PDO('mysql:host='.$host.';dbname=inta_online', $user,$pass);
       // $response["success"]= true;
        //return $pdo;  
        //heroku build
        $user ='u709774492_inta_online';
        $pass = '@w6P1G2uQ';
        $host = 'sql355.main-hosting.eu';
        $pdo = new PDO('mysql:host='.$host.';dbname=u709774492_inta_online', $user,$pass);
        $response["success"]= true;
        return $pdo;  
    }
    catch(Exception $execpt){
        resultjson(false,"Impossible de contacter le serveur pour l'instant");
    }

}


    


    