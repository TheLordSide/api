<?php
require_once("../config/api.php");
include_once("../config/json-header.php");

$pdo= getconnexion();
function verifyotp(){
    global $pdo;
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(!empty($_POST['otp'])&&!empty($_POST['compte_user_mail'])){
                global $pdo;
            $requete = $pdo->prepare("SELECT * from etudiants where otp_code=:val_otp and etudiants_email=:val_email and  etudiants_confirmed_status='false';");
            $requete->bindParam('val_email',$_POST['compte_user_mail']);
            $requete->bindParam('val_otp',$_POST['otp']);
            $requete->execute();
            if($requete->rowcount()){
                updateaccountstatus($_POST['otp'],$_POST['compte_user_mail']);
            }
            else{
                resultjson(false,"Le compte est déjà confirmé, Connectez-vous");
            }
        }
        else{
            resultjson(false,"Aucun code OTP saisi, consultez votre mail pour obtenir le code");
        }

    }
}


function updateaccountstatus($OTP,$email){
    global $pdo;
    $updatequery = $pdo->prepare("UPDATE `etudiants` SET `etudiants_confirmed_status` = 'true' WHERE etudiants_email =:val_email and otp_code=:val_otp;");
    $updatequery->bindParam('val_email',$email);
    $updatequery->bindParam('val_otp',$OTP);
    $updatequery->execute();
    resultjson(true,"Compte confirmé avec succès");
}


if($_SERVER['REQUEST_METHOD']=='POST'){
    verifyotp();
}