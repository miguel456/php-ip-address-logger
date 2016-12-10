<?php
require_once '../../config.php';
?>

<!doctype HTML>
<html>
  <head>
    <meta charset="UTF-8">
    <title>User Registration</title>
  </head>
  <body>
    <div align="center">
      <h1>Welcome to <?php echo sitename ?> IP management dashboard</h1>
      <h3>Access is reserved to authorized users only!</h3>
      <p style="font-weight: bold">If you wish to become an authorized user, please <a href="mailto:<?php echo site_webmaster_email ?>">send us an email!</a></p>
      <br>
      <br>
      <form action="/new" method="POST">
        Username:<br>
        <input type="text" name="username" value="" required><br>
        Password:<br>
        <input type="password" name="password" value="" required><br>
        E-mail:<br>
        <input type="email" name="email" value="" required><br>
        Additional information:<br><br>
        <textarea name="addinfo" rows="5" col="50">
          Type in some additional information here such as why you are registering and by whom you were invited
        </textarea><br>
        <input type="submit" name="submit" value="Register"><br>
      </form>
    </div>
  </body>
</html>
