
PHP Address Logger - The PHP IP logger and Honeypot - Copyright (C) 2016 miguel456

This program is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program. If not, see http://www.gnu.org/licenses/.
Full license: LICENSE.md within this repo.
Author may be reached via e-mail: miguel456@worldofdiamondsmail.us.to





# PHP Compatibility
This program was developed and tested against PHP version 5.4.45. Any other versions are untested and the program may not work at all. If you whish to use this, please use only PHP version ```5.4.45```.

# OO Porting 5% finished
The codebase is being rewritten in Object-Oriented PHP.

# Supported Webservers
- Apache Foundation Webserver
- ~~Microsoft IIS~~ - No longer supported
- IBM Http server
- LiteSpeed Webserver
- nginx
- And all other available webservers, besides Windows based servers (i.e. IIS)

# Broken features warning
The admin panel feature is currently non-function and unfinished. I recommend not using it until further notice.


# php-ip-address-logger
Log IP addresses simply without the need to check server logs; Useful for seeing who accessed a page at what time. This is a low interaction honeypot and you may set up multiple directores with several installations. Communication between them is a planned feature (See [Releases](https://git.io/v6hjp "Releases") for a list of planned features + pre-releases) as well as URL reporting when multiple are installed.

Quick note: Most of this project is PHP. The only HTML content here is the fake error pages and their translated counterparts, that's why HTML percentage is bigger than PHP's. Don't listen to GitHub's math! :P

This ~~simple~~ script will log someone's IP address upon visiting a page, to your database. ~~Can be repurposed to log something else by changing a few variables.~~

# Branches
Use of the web-interface branch is not supported as it is under constant development and there are things that are unfinished. Please use one of the releaeses or download from Master only.

# Installation

Simply drag and drop the scripts to the directory you want to log. ~~Rename from index.php to something else if you already have one, and then make something of yours point there.~~ 
Then, import the SQL file to your database and fill in its login details in the config file.
**IMPORTANT!** You must configure every line of the config.php file, otherwise the app **WILL** not work!

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
- ~~Interface for whitelisting addresses~~  ON HOLD
- ~~Add security support for apache (.htaccess)~~ Done, with MySQL support there is no need for a .htaccess 
- ~~Make script silently handle errors without letting end-user know (the fallback is the error handling)~~ Done
- ~~Grab HTTP Headers and referrers, and filter them~~ Done
- ~~Idiot Mode Done~~ REMOVED
- Add multi-language support for each error page (based on IP) - Halfway done
- Add web interface for easily whitelisting and "victim" retrieval, therefore not requiring technical knowledge.

--
More features are coming! Check out the latest release's release notes for them (That release has essentially the same source code as the main repo, which you are viewing).  
--


# Retrieving the badguys' addresses
Simply use your favorite SQL client and open the "addresses" table, and select the data. All the addresses that have hit the URL you rigged will be there, along with a detailed timestamp. 

# Whitelisting users
To keep someone from having their address sent to the DB, simply insert their numerical IP into the "whitelist" table. Then the app will exit if it finds someone with an address inside "whitelist".

# Bugs, errors or feature suggestions/improvements
Report all bugs you find (Although I think there are none at the moment), leave suggestions or improvement requests in a ticket. You can also start a pull request for a new feature/improvement and I'll look into it.

