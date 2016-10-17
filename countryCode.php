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
	global $debugMode;
	
	define('invalidFunctionErrorMessage', 'Invalid function usage: You must supply a valid IP address. How else would you want me to give you a country code without an IP??');
	if(empty($hostnameOrIP)) {
		return invalidFunctionErrorMessage;
	}
	$error = "invalid"; // if response body contains this, abort
	$linebreak = "<br>";
	$apiUse = file_get_contents('http://api.db-ip.com/v2/' . apiKey . '/' .  $hostnameOrIP, false);
	$parseResponse = json_decode($apiUse, true);
	
	if(in_array($error, $parseResponse)) {
		if($debugMode == true) {
			echo $linebreak;
			echo "ERROR: Your API key is either invalid or something is not working with the API. Translation features will NOT work.";
			echo $linebreak;
		}
		return NULL;
	}
	
	if(!defined('doubleconfirmation')) {
		if($debugMode == true) {
			echo $linebreak;
			echo "WARN: Global double debug confirmation constant is not defined. A config value has been left empty.";
			echo $linebreak;
		}
		define('doubleconfirmation', 'UNDEFINED');
	}
	if(!empty($parseResponse) && $debugMode == true || doubleconfirmation !== 'NO') {
		echo $linebreak;
		echo "INFO: Parsing downloaded API JSON file.";
		echo $linebreak;
	} else {
		if($debugMode == true || doubleconfirmation !== 'NO') {
			echo $linebreak;
			echo "ERROR: Could not parse/download API JSON file. Language functions will NOT work.";
			echo $linebreak;
		}
	}
	
		
	
	$response = $parseResponse["countryCode"];
	if($debugMode == true && $usedebug = 1) {
		echo $linebreak;
    	        echo "Given IP's country code is: " . $response . ". Using to define language.";
    	        echo $linebreak;
	}
	
	if(empty($parseResponse)) {
		return NULL;
	}
	return $response;
}

?>
