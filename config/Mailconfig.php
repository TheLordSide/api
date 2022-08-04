<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'C:/xampp/htdocs/PHPMailer/src/Exception.php';
require 'C:/xampp/htdocs/PHPMailer/src/PHPMailer.php';
require 'C:/xampp/htdocs/PHPMailer/src/SMTP.php';
require("../config/generate_OTP.php");
include_once("../config/json-header.php");

function Sendmail($destinataire,$nom_destinataire, $OTP){
       //Server settings
    $mail = new PHPMailer(true);
    try{ 
        $mail->SMTPDebug = 0;
        $mail->setLanguage('fr', '../PHPMailer/language/');  
        $mail->isSMTP();                                                            // envoi avec le SMTP du serveur
        $mail->Host       = 'smtp.gmail.com';                            // serveur SMTP
        $mail->SMTPAuth   = true;                                            // le serveur SMTP nécessite une authentification ("false" sinon)
        $mail->Username   = 'esagndetogo1@gmail.com';     // login SMTP
        $mail->Password   = 'mofunbebvxpopjbu';                                                // Mot de passe SMTP
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;     // encodage des données TLS (ou juste 'tls') > "Aucun chiffrement des données"; sinon PHPMailer::ENCRYPTION_SMTPS (ou juste 'ssl')
        $mail->Port       = 465;    
        
            //Recipients
        $mail->setFrom('esagndetogo1@gmail.com', 'no-reply@esagndetogo1@gmail.com');
        $mail->addAddress($destinataire, $nom_destinataire);     //Add a recipient     
        
            //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "Code de veerification $nom_destinataire";
        $mail->Body    = "Voici votre code code de vérification : $OTP";
        $mail->AltBody = "Voici votre code code de vérification : $OTP";
        $mail->send();  
    }
    catch(Exception $mailex){
        $response["success"]=false;
        $response["message"]="Email non envoyé";
        echo json_encode($response);

    }

    
}

