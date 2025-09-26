<?php
session_start();
session_unset();
session_destroy();

// Delete cookies too
setcookie("email", "", time() - 3600, "/");
setcookie("name", "", time() - 3600, "/");

// Redirect to login
header("Location: login.php");
exit();
?>
