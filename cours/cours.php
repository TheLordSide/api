<?php
require_once("../config/api.php");
include_once("../config/json-header.php");
$pdo= getconnexion();
function cours(){
    global $pdo;
    $query = $pdo->prepare("select * from cours");
    $query->execute();
    $tot["total"]=$query->rowCount();
    $list["courslist"]=$query->fetchAll();
    resultjson(true,"Liste des cours: ", $tot,$list);
    
}

cours();