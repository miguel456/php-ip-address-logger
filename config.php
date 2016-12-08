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
* Author may be reached via e-mail: hello@worldofdiamondsmail.us.to
*/

// *******************MISCELLANEOUS SETTINGS************

// Don't turn on unless you think there is something wrong
$debugMode = false;
$dieOrContinue = "die"; // Possible options: Die - Will kill script if no database connection is able to be made. continue: Will let script continue even if db connection was not made. Will log to a file.
$ipMethod = "$_SERVER[REMOTE_ADDR]"; // Chose a custom method of retrieving the user's IP. Must return an absolute address (e.g. 120.120.102.20).

// *******************DATABASE CONNECTION INFORMATION - REQUIRES CHANGES**************

define("DB_HOST", "Your database host's IP address/Hostname");
define("DB_PASSWORD", "Your database password");
define("DB_DATABASE", "iplogger"); // Don't change
define("DB_USERNAME", "Your username");
define("DB_PORT", "3306"); // Don't change unless your host has the db server on a different port

// ************BEHAVIOR MODE SETTINGS****************

/* Supported Behaviour Modes:
* 404 (404 Not Found - Recommended setting!) 
* 500 (Internal Server Error)
* 301 (301 Moved Permanently)
* 204 (204 No Content)
* 302 (302 Found)
* 307 (307 Temporary Redirect)
* 308 (Permanent Redirect)
* 400 (400 Bad Request - Used for malformed requests; has nothing to do with the criminal's actions being bad, so watch out on use.)
* 401 (401 Unauthorized)
* 403 (403 Forbidden)
* 410 (410 Gone)
* 418 (TROLL ALERT - 418 I'm a Teapot - See RFC 2324)
* 429 (429 Too Many Requests)
* 451 (451 Unavailable for Legal Reasons)
* 503 (503 Service Temporarily Unavailable)
* 450 (TROLL ALERT - 450 Blocked by Windows Parental Controls - This code isn't official, use for trolling criminals only while still logging their address)
*/

define("sitename", "My Awesome Website"); // Text to put on the title before error code (Ex. "sitename - error code")
define("site_webmaster_email", "myname@mysite.com");
define("homepage", ""); // Reserved for future update (Unused as of now)
define("behaviormode", "CHANGE THIS OR THE APP WILL USE 404"); // See the list above for a valid code
define("doubleconfirmation", "YES"); // Debug double confirmation. May override manual setting.
define("apiKey", ""); // You must provide a valid API key. without it, the script will not translate the error pages.

// ********************FALLBACK SETTINGS - UNUSED*****************************

define("Address1", "");
define("Address2", "");
define("Address3", "");
define("Address4", "");
define("Address5", "");

//Note: The above settings will only work if dieOrContinue is true.

?>
