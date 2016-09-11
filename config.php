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

// *******************MISCELLANEOUS SETTINGS************

// Don't turn on unless you think there is something wrong
$debugMode = false;
define("idiotmode", "false"); // Unused

// *******************DATABASE CONNECTION INFORMATION - REQUIRES CHANGES**************

define("DB_HOST", "Your database host's IP address/Hostname");
define("DB_PASSWORD", "Your database password");
define("DB_DATABASE", "iplogger"); // Don't change
define("DB_USERNAME", "Your username");
define("DB_PORT", "3306"); // Don't change unless your host has the db server on a different port

// ************BEHAVIOR MODE SETTINGS****************

/* Supported Behaviour Modes:
* silent (Completely silent, 200 OK + redirect to main page - Warning! This setting is risky. The bot will be alarmed and if the criminal finds that this is an honeypot, you're screwed! (or not))
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
define("homepage", ""); // Unused
define("behaviormode", "CHANGE THIS OR THE APP WILL USE 404"); // See the list above for a valid code

// ********************FALLBACK SETTINGS - UNUSED*****************************

define("Address1", "");
define("Address2", "");
define("Address3", "");
define("Address4", "");
define("Address5", "");

//Note: The above settings will only work if the database connection has failed.

?>
