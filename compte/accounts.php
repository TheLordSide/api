<?php
require_once("../config/api.php");
include_once("../config/json-header.php");
$pdo= getconnexion();
function userlist(){
    global $pdo;
    $query = $pdo->prepare("select * from compte");
    $query->execute();
    $tot["total"]=$query->rowCount();
    $list["userlist"]=$query->fetchAll();
    resultjson(true,"Liste des Comptes: ", $tot,$list);
    
}

userlist();
