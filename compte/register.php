<?php
require_once("../config/api.php");
include_once("../config/json-header.php");
$pdo= getconnexion();
function register(){

    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(!empty($_POST['compte_user_mail']) || !empty($_POST['compte_password'])){
            global $pdo;
            $requete=$pdo->prepare("INSERT INTO `compte` (`compte_user_mail`, `compte_password`, `compte_confirmed_at`) VALUES ( :valeur1, :valeur2, NULL);");
            $requete->bindParam(':valeur1',$_POST['compte_user_mail']);
            $requete->bindParam(':valeur2',$_POST['compte_password']);
            $requete->execute();
            resultjson(true,"le compte a ete creer");
            
        }
        else{
            resultjson(false,"email ou mot de passe vide");

    }

}
}



if($_SERVER['REQUEST_METHOD']=='GET'){
}

if($_SERVER['REQUEST_METHOD']=='POST'){
    register();
}