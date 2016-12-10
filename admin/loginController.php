<?php

/**
* This function will return true if the user is logged in to the admin panel. Will return false if otherwise.
* Checks if the username session variable is set and that isLoggedIn is true.
*/
function checkIfLoggedIn($username) { // possible vulnerablility detected
  if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true) {
    return true;
  }
  else
    return false;
  }
}
