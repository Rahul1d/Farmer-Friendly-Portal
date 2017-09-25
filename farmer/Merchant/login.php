<?php
include_once("config.php");
session_start();

$email= $_POST['email'];
$password = $_POST['password'];
if (isset($_POST['submit']))
{
//$email = "abc@gmail.com";
//$password = 123456789;
//echo $email;
//echo $password;
$sql = "Select * From merchant_tb where Merchant_email='$email' and Merchant_password='$password'";
//echo $em;
$res = mysql_query($sql,$link);
//echo mysql_num_rows($res);

if(mysql_num_rows($res)==1)
{
	echo "Login successfull";
  echo"   Rediecting To Merchant Page ";
   
   while($db_field = mysql_fetch_assoc($res))
{
	print $db_field['Merchant_id']."<br>";
	$_SESSION['Merchant'] = $db_field['Merchant_id'];
	$_SESSION['login'] = "M";
	echo $_SESSION['Merchant'];
	//print$db_field['Category_name']."<br>";
	//print$db_field['age']."<br>";
	//print$db_field['status']."<br>";
	
}
 echo '<script language="javascript">';
echo 'alert("logged in successfully")';
echo '</script>';//header("Refresh: 5; url=index.php");
 

     header("Refresh : 1 ; url = " . WEB_URL . "Merchant/success.php");
    // header("location:success.php");
	}
else{
	 echo '<script language="javascript">';
echo 'alert("cannot log in failed")';
echo '</script>';//header("Refresh: 5; url=index.php");
 

     header("Refresh : 0 ; url = " . WEB_URL . "Merchant/indexM.php");
	echo "error";
echo mysql_error($link);
}
}
?>