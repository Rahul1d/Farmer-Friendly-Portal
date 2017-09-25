<?php
include_once('config.php');
session_start();
session_destroy();



      echo '<script language="javascript">';
echo 'alert("Logged out successfully ")';
echo '</script>';//header("Refresh: 5; url=index.php");
 

     header("Refresh : 0 ; url = " . WEB_URL . "index.php");
   //  header("Location: " . WEB_URL . "try/index.php");


?>
