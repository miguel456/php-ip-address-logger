<?php

require_once 'database.php';

session_start();

$postData = array("username" => "$_POST['USERNAME']", "password" => "$_POST['PASSWORD']");

$sanitizePostUntrustedDataUsername = htmlspecialchars($postData['username']);
$injectionCounterMeasuresUsername = mysqli_real_escape_string($sanitizePostUntrustedDataUsername);

$sanitizePostUntrustedDataPassword = htmlspecialchars($postData['password']);
$injectionCounterMeasuresPassword = mysqli_real_escape_string($sanitizePostUntrustedDataPassword);

// Final sanitized data: $injectionCountermeasuresUsername and $injectionCounterMeasuresPassword.
$args = "SELECT * FROM users LIMIT 10;";
$retrieveUsers = mysqli_query($connection, $args);
$fetchArray = mysqli_fetch_array($retriveUsers); // get all users in form of an array

?>
