<?php
session_start();
require 'controllers/loginController.php';
accessVerify();

echo "<p>Welcome to the control panel, " . $_SESSION['username'] . "! Your session has been approved, as your login credentials were correct. </p>";
echo '<br><p>Available actions: <a href="approve_user.php">Approve an user</a></p>';
