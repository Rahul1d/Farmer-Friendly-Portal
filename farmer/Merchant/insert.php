<?php

include('config.php');
//Fetching Values from URL  
$name= $_POST['username'];
$email= $_POST['email'];
$password = $_POST['password'];
$phoneno = $_POST['phoneNumber'];
$loc= $_POST['Address'];
// Establishing connection with server..

if (isset($_POST['submit1'])) {
//Insert query 
  /*  echo $name;
	echo $email;
	echo $password;
	echo $phoneno;
	echo $loc;*/
	$sql = "insert into merchant_tb(Merchant_name, Merchant_email,Merchant_password,Merchant_phoneno,Merchant_loc) values ('$name', '$email', '$password','$phoneno','$loc')";
    $query = mysql_query($sql,$link);
	$error = mysql_error($link);
	echo $error;
	 mysql_close($link);
	 
	  echo '<script language="javascript">';
echo 'alert("User Registered!!!!! Now Merchant can Login")';
echo '</script>';//header("Refresh: 5; url=index.php");
//	 echo "Errormessage: ".$db->error;
 header("Refresh : 2 ; url =  indexM.php");
    echo "Form Submitted succesfully";
	echo "Redirecting To LOGIN!!!";
	if(!$query)
		echo "could not enter";
	
	echo $query;
}
//connection closed
?>