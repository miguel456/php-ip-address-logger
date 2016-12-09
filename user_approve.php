<?php
session_start();
require 'database.php';

// authentication
function checkIfLoggedIn($username) { // possible vulnerablility detected
  if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true) {
    return true;
  }
  else
    return false;
  }
}
//////////////////// UNFINISHED ////////////////////////////////
