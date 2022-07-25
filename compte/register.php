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
    $requete = $pdo->prepare("SELECT * from compte where compte_user_mail =:val_email");
    $requete->bindParam('val_email',$email);
    $requete->execute();
    if ($requete-> rowcount()){
        resultjson(false,"les informations entrées indiquent que le compte exite déjà");  

        //verification si compte existe deja et est confirmee
    }
    else{

        try
        {
            //Insertion dans la BD
            $insertion = $pdo->prepare("INSERT INTO `compte` ( `compte_nom`, `compte_prenom`, `compte_user_mail`, `compte_password`, `compte_confirmed_on`, `compte_confirmed_status`) VALUES (:val_nom, :val_prenom, :val_email, :val_pass, NULL, NULL); ");   
            $insertion->bindParam('val_nom',$nom);
            $insertion->bindParam('val_prenom',$prenom);
            $insertion->bindParam('val_email',$email);
            $insertion->bindParam('val_pass',$mdp);
            $insertion->execute();

            //envoie mail
            
            
            $response["success"]=true;
            $response["message"]="Vous avez crééz votre compte avec succès. Rendez-vous à votre adresse mail pour confirmer";
            $response["email"]=$email;
            $response["nom"]=$nom;
            $response["prenom"]=$prenom;
            
            echo json_encode($response);

            //envoie mail

            $OTP= generate_otp();
            Sendmail($_POST['compte_user_mail'], $_POST['compte_nom'], $OTP);
        
           }
           //catch error
       catch(Exception $zzz){
           echo $zzz;
       }  
   
   
    }

}


if($_SERVER['REQUEST_METHOD']=='POST'){
    register();
}