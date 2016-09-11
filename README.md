
PHP Address Logger - The PHP IP logger and Honeypot - Copyright (C) 2016 miguel456

This program is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program. If not, see http://www.gnu.org/licenses/.
Full license: LICENSE.md within this repo.
Author may be reached via e-mail: miguel456@worldofdiamondsmail.us.to





# ~~REQUIRED~~
~~BEFORE CONTINUING, MAKE SURE THAT YOU USE IIS AND CREATE A HIDDEN SEGMENT FOR ("addresses.txt") and ("whitelist.txt")!! I DON'T SUPPORT APACHE, AND IF YOU WANT TO USE THIS THERE, MAKE SURE TO CREATE A .HTACCESS FILE DENYING ACCESS TO THEM!! I AM NOT RESPONSIBLE FOR ANY SECURITY BREACH. BE ADVISED.~~


# php-ip-address-logger
Log IP addresses simply without the need to check server logs; Useful for seeing who accessed a page at what time. This is a low interaction honeypot and you may set up multiple directores with several installations. Communication between them is a planned feature (See [Releases](https://git.io/v6hjp "Releases") for a list of planned features + pre-releases) as well as URL reporting when multiple are installed.

This simple script will log someone's IP address upon visiting a page, to your database. ~~Can be repurposed to log something else by changing a few variables.~~

# Installation

Simply drag and drop the scripts to the directory you want to log. ~~Rename from index.php to something else if you already have one, and then make something of yours point there.~~ 
Then, import the SQL file to your database and fill in its login details in the config file.

# Uses 
I originally created this as I was getting too many 404's to non-existent locations, such as phpMyAdmin or PMA. So, as there was no similar software to do this,
I decided to go ahead and write this, and set up an honeypot. This way, I know their address without going through thousands of entries in the log.

-- 
If you want to, you can use this code as a base to log something; it's up to you.
Note that I am an absolute beginner and this is my first ever repo. I don't even know if there are useful use cases other than an honeypot, and this may even be obsolete. I didn't find anything similar to use!
--

# Upcoming Features
- ~~Logging to MySQL~~ Done
- ~~Config file (Better Whitelisting System, fallback in case db fails)~~ Done
- ~~Grabbing config values from MySQL (Will replace above)~~ DEVELOPMENT CANCELLED
- ~~Interface for whitelisting addresses (After MySQL is done)~~  ON HOLD
- ~~Add security support for apache (.htaccess)~~ Done, with MySQL support there is no need for a .htaccess 
- ~~Make script silently handle errors without letting end-user know (the fallback is the error handling)~~ Done
- Grab HTTP Headers and referrers, and filter them
- ~~Send a cookie with their information and make them send it back (Like statistics data)~~ DEVELOPMENT CANCELLED
- ~~Idiot Mode~~ Done

--
More features are coming! Check out the latest release's release notes for them (That release has essentially the same source code as the main repo, which you are viewing).  
--
# 3^rd Party Sources
The recently added "Idiot Mode", a reference to the now-taken-down virus site http://youareanidiot.org, is using a recreated version of it in JavaScript, develped by rodneyrehm. His repository can be found [here.](https://github.com/rodneyrehm/you-are-an-idiot/)
I only included his source-code for the Idiot Mode. The code that makes the "You are An Idiot" page appear is mine, but the code that creates it isn't. As there is a lack of a valid license in the repo, I can only limit myself to disclaiming copyright in his JavaScript code and to give credit.

# Known Caveats
- When turning on the Idiot mode, no music would play and the smiley faces were just question marks. I don't recommend using it until the JavaScript developer fixes it. 
- The debug mode will say that Idiot mode is active, when in fact it isn't. This isn't a major issue and everything should work as expected.


# Retrieving the badguys' addresses
Simply use your favorite SQL client and open the "addresses" table, and select the data. All the addresses that have hit the URL you rigged will be there, along with a detailed timestamp. 

# Whitelisting users
To keep someone from having their address sent to the DB, simply insert their numerical IP into the "whitelist" table. Then the app will exit if it finds someone with an address inside "whitelist".

# Bugs, errors or feature suggestions/improvements
Report all bugs you find (Although I think there are none at the moment), leave suggestions or improvement requests in a ticket. You can also start a pull request for a new feature/improvement and I'll look into it.

# Security
~~Warning! The scripts create two files named addresses.txt and whitelist.txt. YOU MUST define a hidden segment in filtering rules (IIS Users) for both of them, or create a .htaccess file doing so (Apache users). Note that I DO NOT support Apache~~
At the moment, there are no security concerns. There are, however, if you fail to fill in the db details.
