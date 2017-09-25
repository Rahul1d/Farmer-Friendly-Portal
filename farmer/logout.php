<?php
include_once('config.php');
session_start();
session_destroy();

     header("Location: " . WEB_URL . "try/index.php");


?>
