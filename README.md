# REQUIRED
BEFORE CONTINUING, MAKE SURE THAT YOU USE IIS AND CREATE A HIDDEN SEGMENT FOR ("addresses.txt") and ("whitelist.txt")!! I DON'T SUPPORT APACHE, AND IF YOU WANT TO USE THIS THERE, MAKE SURE TO CREATE A .HTACCESS FILE DENYING ACCESS TO THEM!! I AM NOT RESPONSIBLE FOR ANY SECURITY BREACH. BE ADVISED.


# php-ip-address-logger
Log IP addresses simply without the need to check server logs; Useful for seeing who accessed a page at what time. I'm planning writing data to MySQL, so you could display the data somewhere.

This simple script will log someone's IP address upon visiting a page, to a file. Can be repurposed to log something else by changing a few variables.

# Installation

Simply drag and drop the scripts to the directory you want to log. Rename from index.php to something else if you already have one, and then make something of yours point there.
The code will be commented so you can understand.

# Uses 
I originally created this as I was getting too many 404's to non-existent locations, such as phpMyAdmin or PMA. So, as there was no similar software to do this,
I decided to go ahead and write this, and set up an honeypot. This way, I know their address without going through thousands of entries in the log.

-- 
If you want to, you can use this code as a base to log something; it's up to you.
Note that I am an absolute beginner and this is my first ever repo. I don't even know if there are useful use cases other than an honeypot, and this may even be obsolete. I didn't find anything similar to use!
--

# Upcoming Features
- ~~Logging to MySQL - Underway - See below~~ DEVELOPMENT PAUSED 
- Config file (Better Whitelisting System, fallback in case db fails) - 40% Done
- ~~Grabbing config values from MySQL (Will replace above) - 50% Done (First dev release is waiting commit~~ DEVELOPMENT PAUSED
- ~~Interface for whitelisting addresses (After MySQL is done)~~
- Add security support for apache (.htaccess) (A pull request with the .htaccess file would be nice!)
- Make script silently handle errors without letting end-user know
- Grab HTTP Headers and referrers, and filter them
- ~~Send a cookie with their information and make them send it back (Like statistics data)~~

# Bugs, errors or feature suggestions/improvements
Report all bugs you find (Although I think there are none :D), leave suggestions or improvement requests in a ticket. You can also start a pull request for a new feature/improvement and I'll look into it.

# Security
Warning! The scripts create two files named addresses.txt and whitelist.txt. YOU MUST define a hidden segment in filtering rules (IIS Users) for both of them, or create a .htaccess file doing so (Apache users). Note that I DO NOT support Apache.
