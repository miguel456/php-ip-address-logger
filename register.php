<?php
require 'config.php';
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
      <form action="register_user.php" method="POST">
        Username:<br>
        <input type="text" name="username" value="urname12345" required><br>
        Password:<br>
        <input type="text" name="password" value="12445" required><br>
        E-mail:<br>
        <input type="email" name="email" value="myname@mydomain.com" required><br>
        Additional information:<br>
        <textarea rows="5" col="50">
          Type in some additional information here such as why you are registering and by whom you were invited
        </textarea>
      </form>
    </div>
  </body>
</html>

  
