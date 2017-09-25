<?php 

?>
<head>
 <script src="jquery/jquery-3.1.1.js"></script>
<script type="text/javascript" src="tableExport.js"></script>
<script type="text/javascript" src="base64.js"></script>
<script type="text/javascript" src="jspdf/libs/sprintf.js"></script>

<script type="text/javascript" src="jspdf/libs/base64.js"></script>
<script type="text/javascript" src="jspdf/jspdf.js"</script>

 <script type="text/javascript">
       $(document).ready(function () { 
  $("#print").click(function(){
     //  $("#dummyModal").modal('show');
//	 $('#tableID').tableExport({type:'pdf',escape:'false'});
   // window.location.href = "index.php";
    });
	   //});
  
 
       });
	/*   $(":input").bind('keyup mouseup', function () {
    alert("changed");            
});*/
    </script>
</head>

<?php
//include_once('config.php');
//session_start();
include_once('config.php');
session_start();
include_once('nav.php');

$id = $_SESSION['user'];
$pid = $_POST['pid'];
$quantity = $_POST['quantity'];

//echo $_POST['pid'];
//echo $_POST['quantity'];

$sql = "select * from product_tb where Product_id = $pid";
$res = mysql_query($sql,$link) or die(mysql_error());
$result = mysql_fetch_assoc($res);
  // $pname = $result[]
	$pquantity = $result['Product_MaxQuant'];


/*echo $pquantity;
echo $quantity;
*/
if($quantity <= $pquantity)
{
	$date = strtotime("+7 day");
	//echo "<br>".$date."<br>";
	//echo date('M d, Y', $date);
 $date =	date('d M Y', $date);
 //$d =   STR_TO_DATE('$d', '%d-%m-%Y') ;
 // echo  "<br>".$d;
       $sql2 = "select * from customer_tb where Customer_id = $id";
	  $res2 = mysql_query($sql2,$link) or die(mysql_error());
	  echo mysql_error($link);
	  while($result2 = mysql_fetch_assoc($res2))
	  {
		  $name = $result2['Customer_name'];
		  $add = $result2['Customer_Address'];
	  }
	  
      $sql1 = "insert into order_tb (Customer_id,Product_id,Order_Status,Order_Quantity,Order_deliveryDate) values ($id,$pid,'Confirmed',$quantity,now() + INTERVAL 7 day )" ;
	  $res1 = mysql_query($sql1) or die(mysql_error());
	  echo mysql_error($link);
     
	 $sql3 = "update product_tb set Items_Sold = Items_Sold + $quantity where Product_id = $pid" ;
	 $res3 = mysql_query($sql3) or die(mysql_error());
	 echo mysql_error($link);
	 $sql3 = "update product_tb set Product_Quantity = Product_Quantity - $quantity where Product_id = $pid" ;
	 $res3 = mysql_query($sql3) or die(mysql_error());
      echo mysql_error($link);
	//echo "Order successfully";
	
	?>
	
	<br><br><br>
	<div class="table-responsive">
	<table class="table table-bordered" id ="tableID" >
	<caption> Order Summary </caption>
	  
<tr>	  <td colspan= "2" style = "width:30% ; text-align:center; font-weight:bold ;" align = "center"> Receipt :-

	<tr>
	<td>Product Name
	<td><?php echo $result['Product_name']; ?>
	<tr>
	<td>Product Quantity
	<td><?php echo $quantity ; ?>
	<tr>
	<td>Amount
	<td><?php echo $quantity * $result['Product_sp'] ; ?>
		<tr>
	<td>Name
	<td><?php echo $name; ?>
	<tr>
	<td>Deliver to Adress
	<td><?php echo $add; ?>
		<tr>
	<td>Order Status
	<td>Confirmed
		<tr>
	<td>  Expected Delivery Date
	<td><?php  echo $date ;?>
	
</table>
</div>
     
	<a href="index.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
	<button name="btn" align="right" class = "btn pull-right" id="print" onClick ="$('#tableID').tableExport({type:'pdf',escape:'false'});"  >print PDF</button>
	<?php	
	
	
	
	
	
}
else
{
  ?>
  <br><br><br><br>
   <div class="alert alert-info">
	<br>
	<Strong>Note :</strong> The Order was Cancelled because the Quantity which was Chosen Exceeds the Maximum Quantity
	</div>
	<a href="index.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
	
  <?php
      
}

?>
