<?php
// destroy and unset session
require_once '../config.php';
session_start();

if($_SESSION['isLoggedIn'] == false && !isset($_COOKIE['loginAuthorized']) && $_SESSION['authorizedByEndCode'] == null) {
         header("HTTP/1.1 400 Bad Request");
         header("Location: " . domainRoot . "/" . appRoot . "/admin/login");
} elseif($_SESSION['isLoggedIn'] == true) {
        
        header("HTTP/1.1 200 0K");
        session_unset();
        session_destroy();
        unset($_SESSION['id']);
        header("Location: " . domainRoot . "/" . appRoot . "/admin/login");
  
} else {
    
    header("HTTP/1.1 500 Internal Server Error");
    header("Location: " . domainRoot . "/" . appRoot . "/admin "); // let other part of script determine what's going on
    
    if($debugMode == true) {
        echo "<br>";
        echo "An error has ocurred while attempting to log user " . $_SESSION['username'] . " out.";
    }
}

