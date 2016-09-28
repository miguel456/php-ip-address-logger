<?php
// login.php
require_once 'config.php';
$linebreak = "<br>";

if($debugMode == true) {
	echo $linebreak;
}

switch($authMethod) { // decide which file to show, based on config value. Each file has session_start so it's not needed to put it here.
	case "POST":
	    if($debugMode == true) { // *1
			echo $linebreak;
			echo "Safest login method selected.";
			echo $linebreak;
		}
		include('loginPOST.html');
		break;
	case "GET":
	    if($debugMode == true) { // *1
			echo $linebreak;
			echo "WARNING: Your selected method " . $authMethod . " is very unsafe. We recommend switching to POST ASAP.";
			echo $linebreak;
		}
		include('loginGET.html');
		break;
	default:
        if($debugMode == true) { // *1
			echo $linebreak
			echo "WARNING: No valid login method is either selected or misspelled. Please re-check your config file and try again. Valid methods are: POST and GET.";
			echo $linebreak;
		}
		break;
}
// *1 = show debug messages
<?
