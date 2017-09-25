

<!DOCTYPE html>
<HEAD>
 <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

<script src="jquery/jquery-3.1.1.js"></script>
<script type="text/javascript" src="tableExport.js"></script>
<script type="text/javascript" src="base64.js"></script>
<script type="text/javascript" src="jspdf/libs/sprintf.js"></script>

<script type="text/javascript" src="jspdf/libs/base64.js"></script>
<script type="text/javascript" src="jspdf/jspdf.js"</script>

</HEAD>
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
						
?>
<html lang="en">


<body>

   <br><br>
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User:
                    
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a>
                    </li>
                    <li class="active">User</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
		
		
		<table class="table">
		<tr>
		<th>Name 
		<th><?php echo $result['Customer_name'] ?>
		<tr>
		<td>Email
		<td><?php echo $result['Customer_email'] ?>
		<tr>
		<td>Phone no 
		<td><?php echo $result['Customer_phoneno'] ?>
		<tr>
		<td>Address
		<td><?php echo $result['Customer_Address'] ?>
		<tr>
		<td>
		<td>
		<tr>
		<td>
		<td>
		
<?php }
		?>