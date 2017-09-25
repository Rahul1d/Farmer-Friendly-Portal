<?php

include_once('config.php');
session_start();

if(isset($_SESSION['user'])){
$id=$_SESSION['user'];

echo $id."<br>";
$id1 = $_GET['info'];
echo $id1;
}
else
	include_once('login.html');
//session_destroy();




?>