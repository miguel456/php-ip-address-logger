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

switch (behaviormode) {
    case "404":
        header('HTTP/1.1 404 Not Found');
        echo "<title>" . sitename . " - " . $siteTitles["notfound"] . "</title>";
        break;
    case "500":
        header('HTTP/1.1 500 Internal Server Error');
        echo "<title>" . sitename . " - " . $siteTitles["servererror"] . "</title>";
        break;
    case "301":
        header('HTTP/1.1 301 Moved Permanently');
        echo "<title>" . sitename . " - " . $siteTitles["movedpermanently"] . "</title>";
        break;
    case "204":
        header('HTTP/1.1 204 No Content');
        echo "<title>" . sitename . " - " . $siteTitles["nocontent"] . "</title>";
        break;
    case "302":
        header('HTTP/1.1 302 Found');
        echo "<title>" . sitename . " - " . $siteTitles["found"] . "</title>";
        break;
    case "307":
        header('HTTP/1.1 307 Temporary Redirect');
        echo "<title>" . sitename . " - " . $siteTitles["tempredir"] . "</title>";
        break;
    case "308":
        header('HTTP/1.1 308 Permanent Redirect');
        echo "<title>" . sitename . " - " . $siteTitles["permredir"] . "</title>";
        break;
    case "400":
        header('HTTP/1.1 400 Bad Request');
        echo "<title>" . sitename . " - " . $siteTitles["badreq"] . "</title>";
        break;
    case "401":
        header('HTTP/1.1 401 Unauthorized');
        echo "<title>" . sitename . " - " . $siteTitles["unauthorized"] . "</title>";
        break;
    case "403":
        header('HTTP/1.1 403 Forbidden');
        echo "<title>" . sitename . " - " . $siteTitles["forbidden"] . "</title>";
        break;
    case "410":
        header('HTTP/1.1 410 Gone');
        echo "<title>" . sitename . " - " . $siteTitles["gone"] . "</title>";
        break;
    case "418":
        header('HTTP/1.1 418 I\'m a Teapot');
        echo "<title>" . sitename . " - " . $siteTitles["troll"] . "</title>";
        break;
    case "429":
        header('HTTP/1.1 429 Too Many Requests');
        echo "<title>" . sitename . " - " . $siteTitles["toomanyreqs"] . "</title>";
        break;
    case "451":
        header('HTTP/1.1 451 Unavailable for Legal Reasons');
        echo "<title>" . sitename . " - " . $siteTitles["legal"] . "</title>";
        break;
    case "503":
        header('HTTP/1.1 503 Service Temporarily Unavailable');
        echo "<title>" . sitename . " - " . "503 Service Temporarily Unavailable" . "</title>";
        break;
    case "450":
        echo "<title>" . sitename . " - " . $siteTitles["windows-unofficial"] . "</title>";
        break;
    default:
        header('HTTP/1.1 404 Not Found');
        echo "<title>" . sitename . " - " . $siteTitles["notfound"] . "</title>";
        if($debugMode == true) {
            echo "<br>";
            echo "Warning: Unsupported behavior mode. Please change it to something valid, otherwise the errorcode will stay as default (404).";
        }
}
