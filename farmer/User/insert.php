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
    echo $name;
	echo $email;
	echo $password;
	echo $phoneno;
	echo $loc;
	$sql = "insert into customer_tb(Customer_name, Customer_email,Customer_password,Customer_phoneno,Customer_Address) values ('$name', '$email', '$password','$phoneno','$loc')";
    $query = mysql_query($sql,$link);
	$error = mysql_error($link);
	echo $error;
	// mysql_close($link);
	 
//	 echo "Errormessage: ".$db->error;
 echo '<script language="javascript">';
echo 'alert("User Registered!!!!! Now User can Login")';
echo '</script>';//header("Refresh: 5; url=index.php");
 

     header("Refresh : 2 ; url =  ../index.php");
    echo "Form Submitted succesfully";
	if(!$query)
		echo "could not enter";
	
	echo $query;
}
//connection closed
?>