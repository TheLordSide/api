<?php
header('Content-Type: application/json');
$user ='root';
$pass = '';
try {
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=inta_online', $user,$pass);
    $message["success"]= true;
    return $pdo;
}
catch(Exception $execpt){
    $message["success"]= false;
    $message["response"]= "échec de la connexion BD";
}

echo json_encode($message);
    


    