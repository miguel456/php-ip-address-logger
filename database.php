<?php
//Database connection file, do not change anything
//TODO: Add connection functions

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
* 
*/
require 'config.php';

$connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE, DB_PORT);

if(!$connection) { // Fall back to text logging and text whitelist retrieval if connection fails or throws an error
    fallback(); // function defined on capture.php
    if ($debugMode == true) {
        echo "Connection to the database was NOT successful. Falling back to regular logging methods (text). php_errors will have more errors than usual.";
    }
}
else {
    if ($debugMode == true) {
        echo "<br>";
        echo "Connection to the database successful.";
        echo "<br>";
    }
}
?>
