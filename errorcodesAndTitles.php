<?php
require_once 'config.php';
$siteTitles = array(
"notfound" => "404 Not Found",
"servererror" => "500 Internal Server Error",
"movedpermanently" => "301 Moved Permanently",
"nocontent" => "204 No Content",
"found" => "302 Found",
"tempredir" => "307 Temporary Redirect",
"permredir" => "308 Permanent Redirect",
"badreq" => "400 Bad Request",
"unauthorized" => "401 Unauthorized",
"forbidden" => "403 Forbidden",
"gone" => "410 Gone",
"troll" => "418 I'm a Teapot",
"toomanyreqs" => "429 Too Many Requests",
"legal" => "451 Unavailable for Legal Reasons",
"windows-unofficial" => "450 Blocked by Windows Parental Controls"
);

$possibleCountryCodes = array("Portuguese" => "PT",
                              "USEnglish" => "US",
                              "GBEnglish" => "GB",
                              "Chinese" => "CN",
                              "French" => "FR",
                              "German" => "DE",
                              "Russian" => "RU"
                              );


switch (behaviormode) {
    case "404":
        header('HTTP/1.1 404 Not Found');
        echo "<title>" . sitename . " - " . $siteTitles["notfound"] . "</title>";
        include('/statusPages/404.html');
        break;
    case "500":
        header('HTTP/1.1 500 Internal Server Error');
        echo "<title>" . sitename . " - " . $siteTitles["servererror"] . "</title>";
        include('/statusPages/500.html');
        break;
    case "301":
        header('HTTP/1.1 301 Moved Permanently');
        echo "<title>" . sitename . " - " . $siteTitles["movedpermanently"] . "</title>";
        include('/statusPages/301.html');
        break;
    case "204":
        header('HTTP/1.1 204 No Content');
        echo "<title>" . sitename . " - " . $siteTitles["nocontent"] . "</title>";
        include('/statusPages/204.html');
        break;
    case "302":
        header('HTTP/1.1 302 Found');
        echo "<title>" . sitename . " - " . $siteTitles["found"] . "</title>";
        include('/statusPages/302.html');
        break;
    case "307":
        header('HTTP/1.1 307 Temporary Redirect');
        echo "<title>" . sitename . " - " . $siteTitles["tempredir"] . "</title>";
        include('/statusPages/307.html');
        break;
    case "308":
        header('HTTP/1.1 308 Permanent Redirect');
        echo "<title>" . sitename . " - " . $siteTitles["permredir"] . "</title>";
        include('/statusPages/308.html');
        break;
    case "400":
        header('HTTP/1.1 400 Bad Request');
        echo "<title>" . sitename . " - " . $siteTitles["badreq"] . "</title>";
        include('/statusPages/400.html');
        break;
    case "401":
        header('HTTP/1.1 401 Unauthorized');
        echo "<title>" . sitename . " - " . $siteTitles["unauthorized"] . "</title>";
        include('/statusPages/401.html');
        break;
    case "403":
        header('HTTP/1.1 403 Forbidden');
        echo "<title>" . sitename . " - " . $siteTitles["forbidden"] . "</title>";
        include('/statusPages/403.html');
        break;
    case "410":
        header('HTTP/1.1 410 Gone');
        echo "<title>" . sitename . " - " . $siteTitles["gone"] . "</title>";
        include('/statusPages/410.html');
        break;
    case "418":
        header('HTTP/1.1 418 I\'m a Teapot');
        echo "<title>" . sitename . " - " . $siteTitles["troll"] . "</title>";
        include('/statusPages/418.html');
        break;
    case "429":
        header('HTTP/1.1 429 Too Many Requests');
        echo "<title>" . sitename . " - " . $siteTitles["toomanyreqs"] . "</title>";
        include('/statusPages/429.html');
        break;
    case "451":
        header('HTTP/1.1 451 Unavailable for Legal Reasons');
        echo "<title>" . sitename . " - " . $siteTitles["legal"] . "</title>";
        include('/statusPages/451.html');
        break;
    case "503":
        header('HTTP/1.1 503 Service Temporarily Unavailable');
        echo "<title>" . sitename . " - " . "503 Service Temporarily Unavailable" . "</title>";
        include('/statusPages/503.html');
        break;
    case "450":
        echo "<title>" . sitename . " - " . $siteTitles["windows-unofficial"] . "</title>";
        include('/statusPages/450.html');
        break;
    default:
        header('HTTP/1.1 404 Not Found');
        echo "<title>" . sitename . " - " . $siteTitles["notfound"] . "</title>";
        include('/statusPages/404.html');
        if($debugMode == true) {
            echo "<br>";
            echo "Warning: Unsupported behavior mode. Please change it to something valid, otherwise the errorcode will stay as default (404).";
        }
}
