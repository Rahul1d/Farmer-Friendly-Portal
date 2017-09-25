<HEAD>
 <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

<script src="../jquery/jquery-3.1.1.js"></script>
<script type="text/javascript" src="../tableExport.js"></script>
<script type="text/javascript" src="../base64.js"></script>
<script type="text/javascript" src="../jspdf/libs/sprintf.js"></script>

<script type="text/javascript" src="../jspdf/libs/base64.js"></script>
<script type="text/javascript" src="../jspdf/jspdf.js"</script>

</HEAD>

<?php 
include_once('config.php');
session_start();

include_once('navM.php');

if(isset($_SESSION['Merchant']) && ($_SESSION['login'] = 'M'))
{
	 $id	= $_SESSION['Merchant'];
						$sql = "select * from merchant_tb where Merchant_id = $id" ;
						$res = mysql_query($sql,$link) or die(mysql_error());
						$result = mysql_fetch_assoc($res);
						
	?>
	
	<br><br>
	<!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Products
                   
                </h1>
               <br>
	<ul class="breadcrumb">
  <li><a href="success.php">Home</a></li>
  <li class="active">Products</li> 
</ul>
            </div>
        </div>

	
	<?php 
	
		echo "Welcome ".$result['Merchant_name']."<br>";
		$sql1 = "select * from product_tb where Merchant_id = $id";
        $res1 = mysql_query($sql1,$link) or die(mysql_error());		
		    $count = mysql_num_rows($res1);
			if($count > 0)
			{ ?>
		 <div class="table-responsive">
          <table class="table table-striped table-hover table-bordered ">
            <tbody><tr>
                <th>No.</th>
                <th>Product name
                <th>Item in Stock
                <th>Item Sold
                 <th> View
              </tr>
			  <?php
			  $i=1;
				while($result1 = mysql_fetch_assoc($res1))
				{
				?><tr>
				<td>
				<?php
			echo	$i++;	
			?>  <td>
			<?php
		$pid	=$result1['Product_id'];
			$sql2 = "select * from product_tb where Product_id = $pid";
           $res2 = mysql_query($sql2,$link) or die(mysql_error());	
            	$result2 = mysql_fetch_assoc($res2);	
               echo $result2['Product_name']	;			
            ?>
			<td>
			<?php
			echo $result2['Product_Quantity'];
			?><td>
			<?php
			echo $result2['Items_Sold'];
		   ?>
		    <td>
                    <a href="viewOrders.php?oid=<?php echo $result1['Product_id']; ?>"><button class="btn btn-sm btn-info"><span class="glyphicon glyphicon-zoom-in"></span> View</button></a>&nbsp;
			
			<?php
			}
			}
						
						
						
						
}


?>