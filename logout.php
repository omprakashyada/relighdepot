<?php session_start(); /* Starts the session */
session_destroy();
unset($_SESSION['username']);
unset($_SESSION['password']);
header('location:login.php');

// Set session variables
$_SESSION["favcolor"] = "green";
echo $_SESSION["favanimal"] = "cat";
echo "Session variables are set.";


?>
