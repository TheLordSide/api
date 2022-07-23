<?php
require_once("../config/api.php");
include_once("../config/json-header.php");
$pdo= getconnexion();
function register(){

    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(!empty($_POST['compte_user_mail']) || !empty($_POST['compte_password']) || !empty($_POST['compte_nom']) || !empty($_POST['compte_prenom'])){
            try
             {
                userexist($_POST['compte_user_mail']);
                }
        
            catch(Exception $zzz){
                echo $zzz;
            }
           
        }
        else{
            resultjson(false,"Plusieurs informations manquant");

    }
}
}


function userexist($email){
    global $pdo;
    $requete = $pdo->prepare("SELECT * from compte where compte_user_mail =:val_email");
    $requete->bindParam('val_email',$email);
    $requete->execute();
    if ($requete-> rowcount()){
        resultjson(false,"les informations entrées indiquent que le compte exite déjà");  
    }

}


if($_SERVER['REQUEST_METHOD']=='POST'){
    register();
}