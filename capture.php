<?php
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


// TODO: require 'config.php'; (Revert part of last commit)
function logAddress() {
    subjectIsWhitelisted(); // Check whether user is whitelisted; if so, stop script and prevent IP from being logged
    date_default_timezone_set('UTC');
    $getDate = date('l jS \of F Y h:i:s A');
    $logAddress = fopen('addresses.txt', 'a+'); // Open file
    fwrite($logAddress, $getDate . " - " . $_SERVER['REMOTE_ADDR']); // Write user's IP address to a file followed by the time and date
    fclose($logAddress); // Close the file
}

function subjectIsWhitelisted() { // For exclusive use in this file only; shouldn't be called elsewhere
    $whitelisted = "You are whitelisted. Not logging address.";
    $getWhitelist = fopen('whitelist.txt', 'r');
    $readData = fread($getWhitelist, 40);
    fclose($getWhitelist);
    //Write your IP address in the place of 0.0.0.0
    if($readData == "0.0.0.0") { // TODO: Replace with someting like define(); to allow for flexibility, or a variable linking to a config with an array
        exit($whitelisted); // Prevent IP from being logged
    }
    else {
        // Move on, log that guy's address! But first, let him know.
        $intruder = "You shouldnt be here!";
        echo $intruder;
        echo "<br>";
    }
}

function deleteBigFile() { // Fool proofing; If people spam the page or file gets above 10m, it gets deleted. Function's called on index.php.
    $getLogFile = 'addresses.txt';
    if(file_exists($getLogFile) && filesize($getLogFile) > 10000000) {
        unlink($getLogFile);
    }
    else {
        // do nothing
    }
}
