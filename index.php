<?php

require 'capture.php'; // Script's heart (Vital file)
require 'errorcodesAndTitles.php'; // Set this page's title and status code, plus the error page
require 'setUserLang.php'; // Set the user's language for the error pages
$linebreak = "<br>";

if($debugMode == true || doubleconfirmation !== 'NO') {
  echo $linebreak;
  echo "Script initializing. Requiring main file, language file, and cookie file.";
  echo $linebreak;
}
