<?php
require 'countryCode.php';
require_once 'config.php';

$nodebugFunc = getCountryCode($ipMethod, 0);
$linebreak = "<br>"; // Time saver


switch($nodebugFunc) {
  case "PT":
    if($debugMode == true) {
      echo "<br>";
      echo "User language is " . $nodebugFunc . ". Setting language to Portuguese.";
      echo "<br>";
    }
    setcookie("language", "PT");
    break;
  case "US":
    if($debugMode == true) {
      echo "<br>";
      echo "User language is " . $nodebugFunc . ". Setting language to American English.";
      echo "<br>";
    }
    setcookie("language", "en-US");
    break;
  case "GB":
    if($debugMode == true) {
      echo "<br>";
      echo "User language is " . $nodebugFunc . ". Setting user language to British English.";
      echo "<br>";
    }
    setcookie("language", "en-GB");
    break;
  case "CN":
    if($debugMode == true) {
      echo "<br>";
      echo "User language is " . $nodebugFunc . ". Setting user language to Chinese.";
      echo "<br>";
    }
    setcookie("language", "CN");
    break;
  case "FR":
    if($debugMode == true) {
      echo $linebreak;
      echo "User language is " . $nodebugFunc . ". Setting user language to French.";
      echo $linebreak;
    }
    setcookie("language", "FR");
    break;
  case "DE":
    if($debugMode == true) {
      echo $linebreak;
      echo "User language is " . $nodebugFunc . ". Setting user language to German/Deutsch.";
      echo $linebreak;
    }
    setcookie("language", "DE");
    break;
  case "RU":
    if($debugMode == true) {
      echo $linebreak;
      echo "User language is " . $nodebugFunc . ". Setting user language to Russian.";
      echo $linebreak;
    }
    setcookie("language", "RU");
    break;
  case "BR":
    setcookie("language", "PT");
    break;
  default:
    if($debugMode == true) {
      echo $linebreak;
      echo "User language was not recognised, using/setting default language (en-US).";
      echo $linebreak;
    }
    setcookie("language", "en-US");
    break;
}

?>
