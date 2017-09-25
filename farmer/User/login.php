<?php
include_once("config.php");
session_start();


if (isset($_POST['submit']))
{
//$email = "abc@gmail.com";
//$password = 123456789;
$email= $_POST['email'];
$password = $_POST['password'];
//echo $email;
//echo $password;
$sql = "Select * From customer_tb where Customer_email='$email' and Customer_password='$password'";
//echo $em;
$res = mysql_query($sql,$link);
//echo mysql_num_rows($res);

if(mysql_num_rows($res)==1)
{
	echo "Login successfull";
  // $_SESSION['user']= $email;
  // echo $_SESSION['user'];
    echo "<br> Redirecting to Homepage :))";
   while($db_field = mysql_fetch_assoc($res))
{
	//print $db_field['Customer_id']."<br>";
	$_SESSION['user'] = $db_field['Customer_id'];
	$_SESSION['login'] = "C";
	//echo $_SESSION['user'];
	//print$db_field['Category_name']."<br>";
	//print$db_field['age']."<br>";
	//print$db_field['status']."<br>";
	
}
   
   echo '<script language="javascript">';
echo 'alert("logged in successfully ")';
echo '</script>';//header("Refresh: 5; url=index.php");
 

     header("Refresh : 1 ; url = " . WEB_URL . "index.php");
	// echo 'Logged in successfully.'; 
	}
else{
	 echo '<script language="javascript">';
echo 'alert("cannot log in failed")';
echo '</script>';//header("Refresh: 5; url=index.php");
 

     header("Refresh : 0 ; url = " . WEB_URL . "index.php");
	echo "error";
echo mysql_error($link);
}
}
?>