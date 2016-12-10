<?php

/**
* This function will return true if the user is logged in to the admin panel. Will return false if otherwise.
* Checks if the username session variable is set and that isLoggedIn is true.
*/
function sessionAuthorize($username) { // possible vulnerablility detected
  if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true) {
    $_SESSION['authorizedByEndCode'] = "true";
    setcookie("loginAuthorized", "true"); 
    return true;
  }
  else
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
