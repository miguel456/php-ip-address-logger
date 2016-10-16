<?php
// Get user's country code, for displaying multillingual webpages.

require_once 'config.php';

/**
* 
* Get country code for specified IP address.
*
* Ex. getCountryCode($anIpAddress, 1);
* 1 will output debug messages (i.e. api down) while 0 will remain silent
*
*/
function getCountryCode($hostnameOrIP, $useDebug = "0") {
	global $debugMode; // Variable globalization
	define('ERROR_MESSAGE', 'Error: Could not read JSON returned from remote server!');
	
	$linebreak = "<br>";
	$apiUse = file_get_contents('https://freegeoip.net/json/' . $hostnameOrIP, false);
	$parse_response = json_decode($apiUse, true);
	
	$response = $parse_response["country_code"];
	if(!defined('doubleconfirmation')) {
		define('doubleconfirmation', 'UNDEFINED'); // Undefined is the same as YES
	}
	
	if($debugMode == true && $usedebug = 1 || doubleconfirmation !== 'NO') { // double debug confirmation
		echo $linebreak;
    	        echo "Given IP's country code is: " . $response . ". Using to define language.";
    	        echo $linebreak;
	}
	if(empty($parse_response)) {
		if($debugMode == true && $usedebug == 1 || doubleconfirmation == 'YES') {
			echo $linebreak;
			echo ERROR_MESSAGE;
			echo $linebreak;
		}
	}
	return $response
}

// function test
if($debugMode == true) {
	echo getCountryCode($ipMethod, 1);
}
?>
