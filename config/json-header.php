<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

function resultjson($success,$msg,$total=NULL,$lists=NULL){
    $result["success"]=$success;
    $result["message"]=$msg;
    $result["total"]=$total;
    $result["list"]=$lists;
    echo json_encode($result);
}