<?php
session_start();
require '../../../database.php';
define("concurrentLoginFailureMessage", "Please fill in the login form instead of accessing this page directly!");
$loginDataset = array("username" => $_POST['username'],
                      "password" => $_POST['password'],
                      "rememberoption" => $_POST['rememberme']
                      );
if(empty($loginDataset['username'])) {
    exit(concurrentLoginFailureMessage);
} elseif(empty($loginDataset['password'])) {
    exit(concurrentLoginFailureMessage);
} elseif(empty($loginDataset['rememberme'])) {
    exit(concurrentLoginFailureMessage);
}
$SANITIZE_loginDataset_username = mysqli_real_escape_string($connection, $loginDataset['username']);
$SANITIZE_loginDataset_password = mysqli_real_escape_string($connection, $loginDataset['password']);
if($loginDataset['rememberoption'] == 'Yes') {
    setcookie("remember-me", "Yes");
}
else {
  setcookie("remember-me", "No");
}
$userGettableQuery_selectdb = "Use iplogger;";
$userGettableQuery_retrieveusers = "SELECT * FROM 'admins' LIMIT 10";
mysqli_query($connection, $userGettableQuery_selectdb);
$fetch_associative_array = mysqli_query($connection, $userGettableQuery_retrieveusers);
$userArray = mysqli_fetch_assoc($fetch_associative_array);
if(!in_array($userArray, $SANITIZE_loginDataset_username)) {
    echo "Unknown username! Please register for an account!";
} elseif($userArray['activated'] !== 'Yes') {
    header("HTTP/1.1 401 Unauthorized");
    echo "Login unauthorized! User is not activated!";
} elseif(!password_verify($SANITIZE_loginDataset_password, $userArray['password'])) {
    header("HTTP/1.1 401 Unauthorized");
    echo "Wrong username/password combination!";
    $loginAttempts = 0;
    $loginAttempts++;
    setcookie("failedLoginAttempts", $loginAttempts);
} else {
   header("HTTP/1.1 200 OK");
   echo "Logging in...";
   
   $sess_id = rand(0, 100);
   $_SESSION['username'] = $SANITIZE_loginDataset_username;
   $_SESSION['id'] = $sess_id;
   $_SESSION['isLoggedIn'] = true;
  
   echo "Welcome " . $_SESSION['username'] . "You can now access restricted webpages. ";
} // session is ready to be used elsewhere!
