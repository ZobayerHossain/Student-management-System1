<?php
session_start();
session_destroy();
setcookie("user_id", "", time() - 3600);
setcookie("user_email", "", time() - 3600);
header("Location: login.php");
exit;
?>
