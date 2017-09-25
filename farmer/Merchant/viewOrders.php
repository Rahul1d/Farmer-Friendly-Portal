<?php 
include_once('config.php');
//session_start();

include_once('navM.php');

$id = $_GET['oid'];
echo $id;
 $sql1 = "select * from image_tb where product_id = $id";	 
		    $res1 = mysql_query($sql1,$link);
			echo mysql_error($link);
			$img = array();$i=0;
			 while($result1 = mysql_fetch_assoc($res1))
			 {
				 $img[$i] = $result1['image_name'];
				 $i++;
			//	 echo  $result1['image_name'];
			 }
			$a = array_rand($img,1);
?>
<div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Products
                   
                </h1>
               <br>
	<ul class="breadcrumb">
  <li><a href="success.php">Home</a></li>
  <li><a href="productinfo.php">Products</a></li>
  <li class="active">View Product:</li> 
</ul>
            </div>
        </div>
		
		        <div class="row">
            <div class="col-md-7">
                <a href="portfolio-item.html">
                    <img class=" img-hover" height= "450" width= "650" src="uploads/<?php echo $img[$a]; ?>" alt="<?php echo $img[$a]; ?>">
                </a>
            </div>
            <div class="col-md-5">
            <div class="table-responsive">
          <table class="table table-striped table-hover table-bordered ">
            <tbody><tr>
                <th>No.</th>
                <th>Product name
                <th>Item in Stock
                <th>Item Sold
                 
              </tr>
			  <?php
			  $i=1;
				
				?><tr>
				<td>
				<?php
			echo	$i++;	
			?>  <td>
			<?php
		//$pid	=$result1['Product_id'];
			$sql2 = "select * from product_tb where Product_id = $id";
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
		   </table>
		   <table class="table-responsive table" >
		    <tr>
			<th>DESC
			<tr>
			<td><?php echo $result2['Product_desc']; ?>
                   
			
			<?php
			
						
						
						
						



?>             
            </div>
        </div>
		</div>