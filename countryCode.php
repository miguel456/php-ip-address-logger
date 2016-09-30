<?php
// Get user's country code, for displaying multillingual webpages.

require_once 'config.php';

function getCountryCode($hostnameOrIP) {
	
	$countryCode = geoip_country_code_by_name($hostnameOrIP);
	global $debugMode = $debug; // may not work
	if($debug == true) {
		echo "Retrieved country code:" . $countryCode;
	}
	return $countryCode;
}
  
?>
