<?php
require_once("../config/api.php");
include_once("../config/json-header.php");
$pdo= getconnexion();

function signup(){
    global $pdo;
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(!empty($_POST['compte_user_mail']) && !empty($_POST['compte_password'])){
            global $pdo;
            try {
                $requete=$pdo->prepare("SELECT * FROM etudiants where etudiants_email =:valeur1 and etudiants_password =:valeur2;");
                $requete->bindParam(':valeur1',$_POST['compte_user_mail']);
                $requete->bindParam(':valeur2',$_POST['compte_password']);
                $requete->execute();
                if ($requete-> rowcount()){
                    $response["success"]=true;
                    $response["message"]="Content de vous revoir!!!";
                    $response["email"]=$_POST['compte_user_mail'];
                    $response["password"]=$_POST['compte_password'];
                    echo json_encode($response);

                   // resultjson(true,"ce compte existe",);
                }
                else{
                    resultjson(false,"Impossible de se connecter");
                }
            }
            catch(Exception $ex){
                echo $ex;
            }
     
        }
        else{
            resultjson(false,"email ou mot de passe vide");

    }
  }
}

if($_SERVER['REQUEST_METHOD']=='POST'){
    signup();
}