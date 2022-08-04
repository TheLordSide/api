<?php
include("../config/json-header.php");
function getconnexion(){
    try {
        $user ='root';
        $pass = '';
        $host = 'localhost';
        $pdo = new PDO('mysql:host='.$host.';dbname=inta_online', $user,$pass);
        $response["success"]= true;
        return $pdo;  
    }
    catch(Exception $execpt){
        resultjson(false,"Impossible de contacter le serveur pour l'instant");
    }

}


    


    