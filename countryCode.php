<?php
// Get user's country code, for displaying multillingual webpages.

require_once 'config.php';

function getCountryCode($hostnameOrIP, $useDebug = "0") {
	$linebreak = "<br>";
	$apiUse = file_get_contents('https://freegeoip.net/json/' . $hostnameOrIP);
	$decodeJson = json_decode($apiUse, true);
	if($useDebug == 1) {
    	        echo $linebreak;
    	        echo "Given IP's country code is: " . $decodeJson["country_code"] . ". Using to define language.";
    	        echo $linebreak;
	}
	if(empty($decodeJson)) {
		if($useDebug == 1) {
			echo $linebreak;
			echo "Unknown error: JSON may have not been decoded properly or API is down";
			echo $linebreak;
		}
	}
	return $decodeJson["country_code"];
}

// function test
if($debugMode == true) {
	$MyTestIP = $ipMethod;
	echo getCountryCode($MyTestIP, 0);
}
?>
