<?php
require_once 'errorcodesAndTitles.php';
require 'countryCode.php';
require_once 'config.php';

if($debugMode == true) {
  getCountryCode($ipMethod, 1);
} else {
  getCountryCode($ipMethod, 0);
}

?>
