<?php
require_once("../config/api.php");
include_once("../config/json-header.php");
$pdo= getconnexion();
function cours(){
    global $pdo;
    $query = $pdo->prepare("select * from cours");
    $query->execute();
    $response["total"]=$query->rowCount();
    $response["Liste"]=$query->fetchAll();
    $response["success"]=true;
    $response["message"]="liste des cours disponibles";
    echo json_encode($response);
}

cours();