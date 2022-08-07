<?php
include_once("../config/json-header.php");

function generate_otp(){

$OTP = rand(100000,999999);
return $OTP;
}