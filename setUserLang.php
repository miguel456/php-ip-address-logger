<?php
require_once 'errorcodesAndTitles.php';
require 'countryCode.php';
require_once 'config.php';

if($debugMode == true) {
  $debugFunc = getCountryCode($ipMethod, 1);
} 
else {
  $nodebugFunc = getCountryCode($ipMethod, 0);
}

switch($nodebugFunc)

?>
