<?php
require_once("../config/api.php");
include_once("../config/json-header.php");
$pdo= getconnexion();
function cours(){
    global $pdo;
    $query = $pdo->prepare("select * from cours");
    $query->execute();
    $response["liste"]=$query->fetchAll();
   
    echo json_encode($response);
}

cours();

if($_SERVER['REQUEST_METHOD']=='POST'){
    cours();
}