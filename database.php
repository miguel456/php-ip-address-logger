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
require 'config.php'; // needed for mysqli connection constants and user-option dieOrContinue.

$connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE, DB_PORT);
$errorMessage = "Failed to connect to the database. Please put the right details to avoid your app being compromised"; // error message to be displayed 

// TODO: Complete visual mess; cleanup
if(!$connection) { // password wrong? no internet? echo debug messages and execute code based on user option (die or fallback).
    if($debugMode == true) { // is it turned on? let user know that his password is wrong.
        echo "<br>";
        echo "WARNING: NO DATABASE CONNECTION HAS BEEN MADE";
        echo "<br>";
    }

    if($dieOrContinue == "die") { // is it die? print debug messages if mode is turned on, then exit script.
        
        if($debugMode == true) { // TODO: Possible Bug; double-check where debug-mode begins to make sure DB connection won't affect its functionality.
            echo "Script has been killed as there is no database connection.";
        } // is it turned on? let user know script has been killed based on his choice.
        
        exit($errorMessage); // It will exit anyway; not dependent on debug mode logic statement.
    }
    else { // not "die"? make it fallback.
        fallback(); // function can be found at the bottom of capture.php file
        // !! Fallback will generate a buch of errors, but it still does its job (MySQL code can't be executed, those are the errors)
    }
}
else { // connection successful? don't execute user-option code nor failure debug messages and tell him db connection was successful.
    if ($debugMode == true) {
        echo "<br>";
        echo "Connection to the database successful.";
        echo "<br>";
    }
}
?>
