<?php
// Get user's country code, for displaying multillingual webpages.

require_once 'config.php';

/**
* 
* Get country code for specified IP address.
*
* Ex. getCountryCode($anIpAddress, 1);
* Returns true or false based on success
*
*/
function getCountryCode($hostnameOrIP)
{
	$ch = curl_init();
	
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_USERAGENT, 'PHPIPAddressLogger/Alpha1.2.1');
	
	curl_setopt($ch, CURLOPT_URL, "http://api.db-ip.com/v2/" . API_KEY . "/$hostnameOrIP");
	
	$response = curl_exec($ch);
	$json_response = json_decode($response, true);
	
	if(isset($json_response['error']))
	{
		throw new IllegalStateException("An error has ocurred whilst attempting to retrieve IP address info: " . $json_response['error']);	
	}
	
	return $json_response['countryCode'];
	
	curl_close($ch);
	
}

?>
