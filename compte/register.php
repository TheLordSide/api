<?php
require_once("../config/api.php");
require_once("../config/Mailconfig.php");
include_once("../config/json-header.php");

$pdo= getconnexion();
function register(){

    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(!empty($_POST['compte_user_mail']) || !empty($_POST['compte_password']) || !empty($_POST['compte_nom']) || !empty($_POST['compte_prenom'])){
            userexist($_POST['compte_user_mail'],$_POST['compte_nom'],$_POST['compte_prenom'],$_POST['compte_password']); 
        }
        else{
            resultjson(false,"Plusieurs informations manquant");

    }
}
}


function userexist($email,$nom,$prenom,$mdp){
    global $pdo;
    //verification de l'unicite du email
    $requete = $pdo->prepare("SELECT * from etudiants where etudiants_email =:val_email");
    $requete->bindParam('val_email',$email);
    $requete->execute();
    if ($requete-> rowcount()){
        resultjson(false,"les informations entrées indiquent que le compte exite déjà");  

        //verification si compte existe deja et est confirmee
    }
    else{

            //Insertion dans la BD
            $OTP= generate_otp();
            try{

                $insertion = $pdo->prepare("INSERT INTO `etudiants` ( `etudiants_nom`, `etudiants_prenom`, `etudiants_email`, `etudiants_module`, `etudiants_phone`, `etudiants_inscription`, `etudiants_localite`, `etudiants_password`, `etudiants_confirmed_status`, `otp_code`) VALUES (:val_nom, :val_prenom, :val_email, NULL, NULL, NULL,NULL,:val_pass,'false',:val_otp); ");   
                $insertion->bindParam('val_nom',$nom);
                $insertion->bindParam('val_prenom',$prenom);
                $insertion->bindParam('val_email',$email);
                $insertion->bindParam('val_pass',$mdp);
                $insertion->bindParam('val_otp',$OTP);
                $insertion->execute();
                $response["success"]=true;
                $response["message"]="Vous avez crééz votre compte avec succès. Rendez-vous à votre adresse mail pour confirmer";
                $response["email"]=$email;
                $response["nom"]=$nom;
                $response["prenom"]=$prenom;
                echo json_encode($response);
                //envoie mail
                Sendmail($_POST['compte_user_mail'], $_POST['compte_nom'], $OTP);
            }
            catch(Exception $ddd ){
                $response2["success"]=false;
                $response2["message"]="Quelque chose s'est mal passé";
                echo json_encode($response2);
                echo $ddd;
            }

   
    }

}


if($_SERVER['REQUEST_METHOD']=='POST'){
    register();
}