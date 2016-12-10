<?php
session_start();
require_once '../../config.php';
?>
<!doctype HTML>
<html>
  <head>
    <title><?php echo sitename ?> &ndash; PHP IP Address Logger</title>
  </head>
  <body>
    <div align="center">
	<h1>Access is reserved to restricted users only! If you wish to become an authorized user, please <a href="mailto:<?php echo site_webmaster_email ?>">send us an email!</a></h1>
    <h3><?php echo sitename ?> IP management System &ndash; Login</h3>
    <br>
    <form name="login" method="POST" action="/auth"><br>
      Username:
      <input type="text" name="username" value="" required><br>
      Password:
      <input type="password" name="password" value="" required>
      <br>Remember me?<br>
      <input type="radio" name="rememberme" value="Yes"> Yes | No<input type="radio" name="radio" value="No">
      <br>
      <input type="submit" name="submit" value="Login">
    </form>
	</div>
   </body>
  </html>
