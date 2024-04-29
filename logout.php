<?php
session_start(); // start the session

//unset all the session variables
$_SESSION = array();

//destroy the session
session_destroy();

//redirect to log in page
header("Location: sign-in.php");

//terminate the script immediately after redirecting to log in page
exit;
?>