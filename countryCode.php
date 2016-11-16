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
function getCountryCode($hostnameOrIP) {
	
	if(empty($hostnameOrIP)) {
		return null;
	}
	$error = "invalid"; // if response body contains this, abort
	$apiUse = file_get_contents('http://api.db-ip.com/v2/' . apiKey . '/' .  $hostnameOrIP, false);
	$parseResponse = json_decode($apiUse, true);
	
	if(in_array($error, $parseResponse)) {
		return null;
	}
	
	$response = $parseResponse["countryCode"];
	
	if(empty($parseResponse)) {
		return NULL;
	}
	return $response;
}

?>
