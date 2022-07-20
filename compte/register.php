<?php
$pdo=require_once("../config/api.php");
function checkuser($usermail,$password){
   
}

function userlist(){
    global $pdo;
    $query = $pdo->prepare("select * from compte");
    $query->execute();
}

