<?php
include_once('config.php');

include_once('navM.php');


$user = $_SESSION['Merchant'];
//echo $_SESSION['login'];

$sql = "Select * From merchant_tb where Merchant_id= '$user'";
$res = mysql_query($sql,$link);
$db_field = mysql_fetch_assoc($res)

	/*echo "Merchant_id :-->>" . $db_field['Merchant_id']."<br>";
	print "Merchant_name :-->>" .$db_field['Merchant_name']."<br>";
	print "Merchant_email :-->>" .$db_field['Merchant_email']."<br>";
	print "Merchant_loc :-->>". $db_field['Merchant_loc']."<br>";
	
	
*/



?>
<html>
<body>

<br><br><hr><h1>WELCOME</h1> <br><br>
<table class="table">
<tr>
<th>Merchant Name
<th><?php  echo $db_field['Merchant_name']; ?>
<tr>
<td>Located At
<td><?php  echo $db_field['Merchant_loc']; ?>
<tr>
<td>Email:
<td><?php  echo $db_field['Merchant_email']; ?>
</table>

<div class="form-group">
 
  <div class="col-md-3">
  <button type="button" class="btn " name = "AddProduct" onClick="location.href='main.php'">Add Product  
  </div>
</div>
<button type="button" class="btn "  onClick="location.href='productinfo.php'">View Products added</button>

