
<!DOCTYPE html>
<?php include('config.php');
  session_start();
   ?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body >

   <?php 
  // $nav = echo WEB_URL . "nav.php";
   include( 'nav.php');
   ?>
   
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
				<br>
				<br>
				<?php $id1 = $_GET['info']; 
                       
					   $sql = "select * from product_tb where Product_id = $id1 ";
			$res = mysql_query($sql,$link);
			echo mysql_error($link);
             $result = mysql_fetch_assoc($res);
				echo $result['Product_name'];
         
		    
				?>
                    
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a>
                    </li>
                    <li class="active">Products</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Portfolio Item Row -->
        <div class="row">

            <div class="col-md-8">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>
                     <div class="carousel-inner">
                    <!-- Wrapper for slides -->
					<?php 
					$sql1 = "select * from image_tb where product_id = $id1";
					$res1 = mysql_query($sql1,$link);
					$i=0;
			echo mysql_error($link);
             while($result1 = mysql_fetch_assoc($res1))
			 {
				 $img[] = $result1['image_name'];
				 $i++;
			 }
				?>	
					                
                   
                        <div class="item active">
                            <img class="img-hover" height="400" width="700" src="<?php echo WEB_URL?>/Merchant/uploads/<?php echo $img[0]; ?>" alt="<?php echo $img[0]; ?>">
                          
							</div>
					<?php 
					     for($j=1; $j< $i ;$j++)
						 { ?>
							 <div class="item">
                            <img class="img-hover"  height="400" width="700"src="<?php echo WEB_URL?>/Merchant/uploads/<?php echo $img[$j]?>" alt="<?php echo $img[$j]; ?>">
                          
							</div> 
						 <?php }
					       ?>
			
                    </div>    
                    
               
                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>

            <div class="col-md-4">
                <h3>Product Description</h3>
       <h2><?php echo $result['Product_desc']."<br>";
	           $mrp = $result['Product_cp'];
			   $sp = $result['Product_sp'];
			   $dis = $mrp - $sp;
			  // echo $dis;
			   $disp = ($dis/$mrp)*100;
			    
			   echo "<br>M.R.P : <strike>" . $mrp."</strike><br>";
			   echo "<br>S.P : <strong>" . $sp."</strong><br>";  
			   echo "<br>Discount : " .intval($disp)."%<br>";
	       
		      
	         
                ?>       
             <?php     if($result['Product_Quantity'] >= $result['Product_MaxQuant']) {    ?>
				<a href = "Payment.php?product=<?php echo $id1 ;?> " ><img src = "<?php echo WEB_URL ?>/Images/buy.png" alt="buy" ></a>
				 <?php  
	   }
 else{    ?>
      <br>
	  <br>
	     <img src="outofstock.jpg" alt="outofstock" height="100" width="400" > 
      <?php  }	   ?>
             <?php 
		/*	 if(!isset($_SESSION['user'])){
              //  echo "Please Log In First";
				
				echo '<script language="javascript">';
echo 'alert("Please log in First ")';
echo '</script>';//header("Refresh: 5; url=index.php");
 

     //header("Refresh : 5 ; url = " . WEB_URL . "try/index.php");
            //    echo "<script>setTimeout(\"location.href = '#';\",1500);</script>"; 
			 }  */
 ?>

 </h2>     

               
            </div>

        </div>
        <!-- /.row -->

		
		<!--
        <!-- Related Projects Row 
        <div class="row">

            <div class="col-lg-12">
                <h3 class="page-header">Related Projects</h3>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive img-hover img-related" src="http://placehold.it/500x300" alt="">
                </a>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive img-hover img-related" src="http://placehold.it/500x300" alt="">
                </a>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive img-hover img-related" src="http://placehold.it/500x300" alt="">
                </a>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive img-hover img-related" src="http://placehold.it/500x300" alt="">
                </a>
            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	</body>
    


</html>
