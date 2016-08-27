<?php
require 'capture.php'; // Most of the code that logs the user's IP address is on the required file

/**
* PHP Address Logger - The PHP IP logger and Honeypot - Copyright (C) 2016 miguel456
*
* This program is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
*
* This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License along with this program. If not, see http://www.gnu.org/licenses/.
* Full license: LICENSE.md within this repo.
* Author may be reached via e-mail: miguel456@worldofdiamondsmail.us.to
*/
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Loading...</title>
        <meta name="author" content="miguel456">
    </head>
    <body>
        <div align="center">
            <?php logAddress(); //TODO: Remove this function call (When changes are pushed) ?>
            <p>Logging <?php echo $_SERVER['REMOTE_ADDR']; ?>&nbsp;... </p> 
            <p>Attempting to cleanse logs...</p>
            <?php deleteBigFile(); // Check log file and determine whether it is elegible for deletion ?>
        </div>
    </body>
</html>
