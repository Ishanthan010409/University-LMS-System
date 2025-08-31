<?php
session_start();
session_destroy();
header('Location: firstlogin.php'); // Redirect to login page after logging out
exit();
?>