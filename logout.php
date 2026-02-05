<?php
   session_start();
   session_destroy(); 
   echo 'You have been logged out. Redirecting...';
   header('Refresh: 2; URL = login.php');
   exit();
?>