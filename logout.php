<?php
// destroy and unset session
if($_SESSION['isLoggedIn'] == false) {
    header("HTTP/1.1 400 Bad Request");
    header("Location: login.php");
} elseif($_SESSION['isLoggedIn'] == true) {
    echo "Logging user " . $_SESSION['username'] . "out. Goodbye! ";
    session_unset();
    session_destroy();
    unset($_SESSION['id']);
    header("Location: login.php");
} else
    echo "Unknown error while trying to sign you out. Please try logging in again.";
