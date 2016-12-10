<?php
require_once '../../config.php';
/**
* This function will return true if the user is logged in to the admin panel. Will return false if otherwise.
* Checks if the username session variable is set and that isLoggedIn is true.
*/
function sessionAuthorize($username) { // possible vulnerablility detected
  if(isset($_SESSION['isLoggedIn']) && $_SESSION['username'] = $username && $_SESSION['isLoggedIn'] == true) {
    $_SESSION['authorizedByEndCode'] = "true";
    setcookie("loginAuthorized", "true"); 
    return true;
  }
  else {
    return false;
  }
}
function isAuthorized() {
  if($_COOKIE['loginAuthorized'] == true && $_SESSION['authorizedByEndCode'] == true) {
    return true;
  }
  else {
    return false;
  }
}
function accessVerify(){
  if(isAuthorized() !== true) {
    header("HTTP/1.1 403 Forbidden");
    header("Location: " . domainRoot . "/" . appRoot . "/admin/login");
  }
}
