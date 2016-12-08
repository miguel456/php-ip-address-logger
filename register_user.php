<?php
require_once 'config.php';
require 'database.php';

// Begin data validation
define("concurrentmessage", "Please fill in the registration form instead of accessing this page directly!");
$dataset = array("username" => $_POST['username'],
                 "email" => $_POST['email'],
                 "password" => $_POST['password'],
                 "addinfo" => $_POST['addinfo']
                 );
// exits if it finds any of the variables below empty (i.e. person has not filled form)
if(!isset($dataset['username'])) {
  exit(concurrentmessage);
}
elseif(!isset($dataset['email'])) {
  exit(concurrentmessage);
}
elseif(!isset($dataset['password'])) {
  exit(concurrentmessage);
}
elseif(!isset($dataset['addinfo'])) {
  exit(concurrentmessage);
} 
									 
$escapeData_username = mysqli_real_escape_string($connection, $dataset['username']);
$escapeData_email = mysqli_real_escape_string($connection, $dataset['email']);
$escapeData_password = mysqli_real_escape_string($connection, $dataset['password']);
$escapedData_addinfo = mysqli_real_escape_string($connection, $dataset['addinfo']);

// hash the password
$hashedpassword = password_hash($escapeData_password, PASSWORD_BCRYPT);

// insert user into the database

$insertusers = "INSERT INTO `admins` (`admin_id`, `admin_username`, `admin_password`, `admin_email`, `permission_canApproveUsers`, `admin_realname`, `admin_addinfo`, `admin_saltpassphrase`, `approved`) VALUES ('', '$escapeData_username', '$hashedpassword', '$escapeData_email', '0', 'Not mentioned', '$escapeData_addinfo', '', 'no');";
mysqli_query($connection, $insertusers);
mysqli_close($connection);
echo '<p style="text-align=center">Registration has been completed successfully; Your administrator will approve your registration soon, assuming you are authorized by the owner(s) of this system/installation.</p>';
