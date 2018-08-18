<?php
header("Access-Control-Allow-Origin: *");
require_once './unirest/src/Unirest.php';

$postdata = file_get_contents("php://input");

//echo ($postdata);
echo "Email is";

$response = Unirest\Request::get("https://pozzad-email-validator.p.mashape.com/emailvalidator/validateEmail/$postdata",
  array(
    "X-Mashape-Key" => "4faywslZeZmsheUM6Zq8ZOocmEi6p1C4AWsjsnxhoW3x30DY0l",
    "Accept" => "application/json"
  )
);

$array = json_decode(json_encode($response), True);

$response_val=0;
$response_val=$array["body"]["isValid"];
if($response_val==1){
	echo " Valid";
}else{
	echo " Invalid";
}


?>
