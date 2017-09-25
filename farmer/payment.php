   <head>
  
   <script src="jquery/jquery-3.1.1.js"></script>
   <script src="js/bootstrap.min.js" type="text/javascript"></script>

  
   
   </head>

<?php
  include_once('config.php');
  session_start();
 
  if(!isset($_SESSION['user']))
  {
	  echo '<script language="javascript">';
echo 'alert("Please login to continue order")';
  echo '</script>'; 
  $page = $_SERVER['HTTP_REFERER'];
  header("Refresh : 0 ;url = $page " );
/* 
 
  */
  } 
  else
	  
  //echo "payment success" ;
   include_once('nav.php');
   ?>

<?php
    $user = $_SESSION['user'];
	echo $user;
	 $id = $_GET['product'];
	 
	$sql = "select * from customer_tb where Customer_id = $user";
 $res=	mysql_query($sql,$link);
      echo mysql_error($link);
	$result = mysql_fetch_assoc($res);
	
/*	echo $result['Customer_name'];
	echo $result['Customer_phoneno'];
	echo $result['Customer_email'];
	echo $result['Customer_Address'];
	*/
	
	$sql1 = "select * from product_tb where Product_id = $id";
	 $res1 =	mysql_query($sql1,$link);
      echo mysql_error($link);
	$result1 = mysql_fetch_assoc($res1);
?>
   <body>
   
 

   <br>
   <br>
   <br>
   <br>
   
   <div class = "container">
   <table class = "table table-bordered">
   <tr>
   <th style = "width:30%"> User
   <th style = "width:70%" >Info
   <tr>
   <td>Name :
   <td><?php echo $result['Customer_name']; ?>
   <tr>
   <td>Address(Deliver to) :
   <td><?php echo $result['Customer_Address']; ?>
   <tr>
   <td>Phone no :
   <td><?php echo $result['Customer_phoneno']; ?>
   <tr>
   
   </table>
   </div>
     <div class="alert alert-info">
	<br>
	<Strong>Note :</strong> The maximum Quantity which can be ordered is <strong><?php echo $result1['Product_MaxQuant'] ?></strong> .
	The orders which are above this will be automatically Cancelled.
	</div>
   <div class="container">

	<table id="cart" class="table table-hover table-condensed">
    				<thead>
						<tr>
							<th style="width:50%">Product</th>
							<th style="width:10%">Price</th>
							<th style="width:8%">Quantity</th>
							<th style="width:22%" class="text-center">Subtotal</th>
							<th style="width:10%"></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td data-th="Product">
								<div class="row">
								
									<div class="col-sm-10">
										<h4 class="nomargin"><?php echo $result1['Product_name'];?></h4>
										<p><?php echo $result1['Product_desc'] ;?>.</p>
									</div>
								</div>
							</td>
							<td data-th="Price"><p id = "price"><?php echo $result1['Product_sp'] ;?>.</p> </td>
							<td data-th="Quantity">
								<input type="number" class="form-control text-center" value="1" id ="quanity">
							</td>
							<td data-th="Subtotal" class="text-center" ><p id = "subtotal"><?php echo $result1['Product_sp']; ?></p></td>
							<td class="actions" data-th="">
								<button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
								<button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>								
							</td>
						</tr>
					</tbody>
					<tfoot>
						<tr class="visible-xs">
							<td class="text-center"><strong></strong></td>
						</tr>
						<tr>
							<td><a href="index.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
							<td colspan="2" class="hidden-xs"></td>
							<td class="hidden-xs text-center"><strong>Rs.<p id = "subtotal1"><?php echo $result1['Product_sp']; ?></p></strong></td>
						<td>
					<div>	<button type="button" id="chk"  data-toggle="modal" data-target="#dummyModal" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></button></td>
						      <div id="dummyModal"  class="modal ">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Confirmation</h4>
                </div>
                <div class="modal-body">
                    <p>Do you want to confirm your order  before closing?</p>
                    <p class="text-warning"><small>If you don't save, your changes will be lost.</small></p>
                </div>
                <div class="modal-footer">
				<form method="post" action="order.php">
    <input type="hidden" name="pid" value="<?php echo $result1['Product_id']; ?>">
	<input type ="hidden" id="quantity1" name="quantity" value = "">
   

                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" id="save" class="btn btn-primary">
					</form>
                </div>
            </div>
        </div>

</div>
</div>
						</tr>
					</tfoot>
				</table>
				
				    


  </div>
      <!-- Modal HTML -->
 <script type="text/javascript">
       $(document).ready(function () { 
	    var one = parseFloat($("#quanity").val());
		   if(one <= 0 || one == ' ' )
		   {
			   alert('quantity cant be negative or zero');
		   }
		  // var one = parseInt($("#quanity").number(), 10);
var two = parseInt($("#price").text(), 10);
$("#subtotal").text(one * two);
$("#subtotal1").text(one * two);
$("#quantity1").val(one );

           $('#quanity').change(function () { 
		   
		   
		    var one = parseFloat($(this).val());
		   if(one <= 0 || one == ' ' )
		   {
			   alert('quantity cant be negative or zero');
		   }
		  // var one = parseInt($("#quanity").number(), 10);
var two = parseInt($("#price").text(), 10);
$("#subtotal").text(one * two);
$("#subtotal1").text(one * two);
$("#quantity1").val(one );

//alert(two );
 });
	   //});
  
  $("#chk").click(function(){
       $("#dummyModal").modal('show');
    });
	
       });
	/*   $(":input").bind('keyup mouseup', function () {
    alert("changed");            
});*/
    </script>
  
	

				

 