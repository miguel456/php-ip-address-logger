<?php

require 'capture.php'; // Script's heart (Vital file)
require 'errorcodesAndTitles.php'; // Set this page's title and status code
require_once 'config.php'; // Grab config values for statements below

// WARNING!!! DELETE THE HTML COMMENTS IF YOU WANT TO KEEP A LOW PROFILE! THEY ARE PUBLIC!

?>
<!DOCTYPE HTML>
<html>
<head>
  <?php
  if($idiotMode == true) {
    include('8befd2b93712d364c978d87ccf47882b.php');
  }
  if($debugMode == true) {
    echo "<br>";
    echo "Activating idiot mode!";
  }
  else {
    if($debugMode == true) {
      echo "<br>";
      echo "The idiot mode was not activated due to user-defined setting.";
    }
  }
  
  ?>
  
<!-- The title will be defined by the app, don't put a title tag or you risk bugging it! -->
</head>
<body>

<!-- Add the HTML code corresponding to the mode you selected -->

</body>
</html>
