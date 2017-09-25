<head>
<!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

<script src="jquery/jquery-3.1.1.js"></script>
<script type="text/javascript" src="tableExport.js"></script>
<script type="text/javascript" src="base64.js"></script>
<script type="text/javascript" src="jspdf/libs/sprintf.js"></script>

<script type="text/javascript" src="jspdf/libs/base64.js"></script>
<script type="text/javascript" src="jspdf/jspdf.js"</script>
</head>

<?php
include_once('config.php');
session_start();

include_once('nav.php');

if(isset($_SESSION['user']) && ($_SESSION['login'] != 'M'))
{
	 $id	= $_SESSION['user'];
						$sql = "select * from customer_tb where Customer_id = $id" ;
						$res = mysql_query($sql,$link) or die(mysql_error());
						$result = mysql_fetch_assoc($res);
    $oid = $_GET['oid']	;	
     	$sql1 = "select * from order_tb where Order_id = $oid" ;
						$res1 = mysql_query($sql1,$link) or die(mysql_error());
						$result1 = mysql_fetch_assoc($res1);
			$pid = $result1['Product_id']		;
		$sql2 = "select * from product_tb where Product_id = $pid" ;
						$res2 = mysql_query($sql2,$link) or die(mysql_error());
						$result2 = mysql_fetch_assoc($res2);	
						
	?>
	
	<!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
			<br>
		<br>
		<br>
                <h1 class="page-header">Orders
                   
                </h1>
               <br>
	<ul class="breadcrumb">
  <li><a href="index.php">Home</a></li>
  <li href = "orderinfo.php">Orders</li> 
  <li class = "active"> View Orders</li> 
</ul>
            </div>
        </div>
		
		<div class="table-responsive">
	<table class="table table-bordered" id ="tableID" >
	<caption> Order Summary </caption>
	  
<tr>	  <td colspan= "2" style = "width:30% ; text-align:center; font-weight:bold ;" align = "center"> Receipt :-

	<tr>
	<td>Product Name
	<td><?php echo $result2['Product_name']; ?>
	<tr>
	<td>Product Quantity
	<td><?php echo $result1['Order_Quantity'] ; ?>
	<tr>
	<td>Amount
	<td><?php echo $result1['Order_Quantity'] * $result2['Product_sp'] ; ?>
		<tr>
	<td>Name
	<td><?php echo $result['Customer_name']; ?>
	<tr>
	<td>Deliver to Adress
	<td><?php echo $result['Customer_Address']; ?>
		<tr>
	<td>Order Status
	<td><?php echo $result1['Order_Status'] ; ?>
		<tr>
	<td>  Expected Delivery Date
	<td><?php  echo $result1['Order_deliveryDate'] ;?>
	
</table>
</div>

	<a href="index.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
	<button name="btn" align="right" class = "btn pull-right" id="print" onClick ="$('#tableID').tableExport({type:'pdf',escape:'false'});"  >print PDF</button>
	
<?php
} 
?>
