<?php
$postVars = array("email" => "$_POST['email']", 
"username" => "$_POST['username']",
"password" => "$_POST['password']",
"name" => "$_POST['name']",
"email" => $_POST['email'],
);

$whippedCleanNick = mysqli_real_escape_string($postVars['username']);
$whippedClean = "";


?>
