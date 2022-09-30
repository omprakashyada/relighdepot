<?php

if (!(isset($_SESSION['username']) && $_SESSION['password'] != '')) {
   header ("Location:login.php");
 } else {

 }
?>