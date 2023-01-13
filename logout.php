<?php
session_start();
session_destroy();
header('Location: index.php'); //will return to login once the session logged in is false
exit;
?>