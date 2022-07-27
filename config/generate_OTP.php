<?php
include_once("../config/json-header.php");

function generate_otp(){

$OTP = rand(1000,9999);
return $OTP;
}