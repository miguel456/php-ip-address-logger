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

require  'database.php';
require_once 'config.php'; // DON'T CHANGE THIS REQUIRE_ONCE TO REQUIRE, IT WILL BREAK THE ENTIRE APP

// Define all necessary variables for use, including some statements, but not all
//FIXME: This doesn't work; try to fix first

if($debugMode == true) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_WARNING | E_ERROR);
    // Please don't turn display_errors to on your php.ini! It's not needed!
    echo "WARNING! DEBUG MODE IS ACTIVE. PLEASE TURN IT OFF IT YOU ARE FINISHED WITH DEBUGGING.";
    echo "<br>";
    echo "Note: PHP will create a low-level warning when the script is executed for someone who's not whitelisted. Please dismiss it.";
}
// whitelist check
$useDatabase = "USE iplogger;";
$grabStuff = "SELECT * FROM whitelist LIMIT 10";
$subjectIP = $_SERVER['REMOTE_ADDR'];
$youAreWhitelisted = "You are whitelisted. Exiting, not logging address.";
mysqli_query($connection, $useDatabase); // May be obsolete but better safe than sorry (Tells the server to use that DB, database.php already does that)
mysqli_query($connection, $grabStuff); // "SELECT * FROM whitelist LIMIT 10;";
$result = mysqli_query($connection, $grabStuff);
$string = mysqli_fetch_array($result);
$stringToSearch = $subjectIP;

if(in_array($stringToSearch, $string)) {
    exit($youAreWhitelisted);
} 
else {
    // nothin'
}


/**
 * The below code will take the subject's IP address and insert it into the database, assuming the code above hasn't aborted the script.
 * Also, include dirbname incase the user is using multiple traps
 */
 // database add
 
$createDatabase = "CREATE DATABASE IF NOT EXISTS iplogger;";
$address = "$_SERVER[REMOTE_ADDR]"; // Fetch user's IP address
mysqli_query($connection, $useDatabase);
$insertIP = "INSERT INTO `addresses` (`addresses`, `time`) VALUES ('$address', now());";
// $selectDatabase = "SELECT * FROM iplogger;"; (obsolete)
mysqli_query($connection, $createDatabase);
$insertLoc = __DIR__; //WARNING, CHANGES UNTESTED
$insertLocSQL = "INSERT INTO location VALUES ($insertLoc);";
mysqli_query($connection, $insertLocSQL); //untested, please report any bugs or malfunctioning
mysqli_query($connection, $insertIP); //tested. working.

if(isset($_SERVER['HTTP_REFERER'])) {
    if($debugMode == true) {
        echo "Client did send an http referer. Inserting into DB."
    }
    $refererNonSanitized = $_SERVER['HTTP_REFERER'];
    $refererAlreadySanitized = htmlspecialchars($refererNonSanitized);
    $refererAlreadySanitizedSQL = "INSERT INTO httpreferer VALUES ($refererAlreadySanitized);";
    mysqli_query($connection, $refererAlreadySanitizedSQL);
}
else {
    if($debugMode == true) {
        echo "Client did not send a referer. Either he is using xww.ro (or some other service) or he typed in the address directly. Not performing insertive query."
    }
}


mysqli_close($connection); // Closes the connection


/**
 * This function will delete the text log file in case it exceeds 10 megabytes. This is here as there is a concern for trolls that
 * may spam a page therefore making the log as big as they want.
 * The function is rarely called, except when a database connection has failed and fallback() is called as well.
 */
function deleteBigFile() {
    $getLogFile = 'addresses.txt';
    if(file_exists($getLogFile) && filesize($getLogFile) > 10000000) {
        unlink($getLogFile);
    }
    else {
        // do nothing
    }
    if($debugMode == true) {
        echo "<br>";
        echo "Function deleteBigFile() was called. Assuming the app has fallen back to default logging methods.";
    }
}

/**
 * This function is called when no database connection is available. The function calls the legacy function subjectIsWhitelisted().
 * This function does exactly the same as the MySQL code above, in exception that it writes to a file as a direct result of
 * connecting to the database not being available.
 */
function fallback() { // Formerly logAddress()
    subjectIsWhitelistedLegacy();
    deleteBigFile();
    date_default_timezone_set('UTC');
    $getDate = date('l jS \of F Y h:i:s A');
    $logAddress = fopen('addresses.txt', 'a+'); // Open file
    fwrite($logAddress, $getDate . " - " . $_SERVER['REMOTE_ADDR']);
    fclose($logAddress);
}


function subjectIsWhitelistedLegacy() { // For exclusive use in this file only; shouldn't be called elsewhere
    $whitelisted = "You are whitelisted. Not logging address.";
    $getWhitelist = fopen('whitelist.txt', 'r');
    $readData = fread($getWhitelist, 40);
    fclose($getWhitelist);
    //Write your IP address in the place of 0.0.0.0
    switch ($readData) {
        case "0.0.0.0": //
            exit($whitelisted); // Prevent IP from being logged
            break;
        default:
            // Move on, log that guy's address! But first, let him know.
            $intruder = "You shouldnt be here!";
            echo $intruder;
            echo "<br>";
            break;
    }
}
/**
 * Changes this commit:
 * - Cleared code of over-commenting
 * - Removed the exccessive dependency for functions
 * - Removed the main logAddress function and turned it into a legacy function (Which is only called in case of errors)
 * - Added DocBlocs
 * - Added config for legacy logAddress (Which now is fallback(), called on database.php (incase of error only)
 */
 
?>
