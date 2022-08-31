<?php
require_once("../config/api.php");
include_once("../config/json-header.php");
$pdo = getconnexion();
function createcours()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (
            !empty($_POST['cours_nom']) || !empty($_POST['cours_auteur']) || !empty($_POST['cours_module']) ||
            !empty($_POST['cours_image']) || !empty($_POST['cours_description']) || !empty($_POST['cours_prix']) ||
            !empty($_POST['cours_prix2']) ||
            !empty($_POST['cours_volumeh'])
        ) {
            coursexit(
                $_POST['cours_nom'],
                $_POST['cours_auteur'],
                $_POST['cours_module'],
                $_POST['cours_image'],
                $_POST['cours_description'],
                $_POST['cours_prix'],
                $_POST['cours_prix2'],
                $_POST['cours_volumeh']
            );
        } else {
            resultjson(false, "Plusieurs informations manquantes");
        }
    }
}

function coursexit(
    $coursnom,
    $coursauteur,
    $coursmodule,
    $coursimage,
    $coursdescription,
    $coursprix,
    $coursprix2,
    $coursvolumeh
) {
    global $pdo;

}

function generatecoursserial(){
    
}
