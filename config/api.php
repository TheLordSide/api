<?php
include("../config/json-header.php");
function getconnexion(){
    try {
        $user ='root';
        $pass = '';
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=inta_online', $user,$pass);
        $response["success"]= true;
        return $pdo;
       
    }
    catch(Exception $execpt){
        resultjson(false,"Connexion impossible");
    }

}

getconnexion();

    


    