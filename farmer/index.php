<!DOCTYPE html>
<?php
include_once('config.php');
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
    <style>
    .cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}
        

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}
   .animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}
@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
} 
        .modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 30%; /* Could be more or less, depending on screen size */
}

    </style>

<body>
   
    <?php include_once('nav.php');

	?>
    <!--/.new-->

    <!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <img class="mySlides" src="ff.jpg">
                <div class="carousel-caption">
                    
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url(aa.jpg);"></div>
                <div class="carousel-caption">
                  
                </div>
            </div>
            <div class="item">
                <img class="mySlides" src="kk.jpg">
                <div class="carousel-caption">
                    
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>

    <!-- Page Content -->
    <div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Welcome to Farmer Friendly Website
                </h1>
            </div>

           
            
        </div>
        <!-- /.row -->
  <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Our Products:</h2>
            </div>
		<?php
		
    /*    $sql1 = "select product_id from image_tb group by product_id";
		$res = mysql_query($sql1,$link);
	     echo mysql_error($link);
		  while($result = mysql_fetch_assoc($res))
		 {
			 $pid = $result['product_id'];
			 echo $result['product_id']."<br>";
		 }
		 */
		 $sql = "select * from product_tb  order by Rand() limit 5 ";
		 $res = mysql_query($sql,$link);
		 while($result = mysql_fetch_assoc($res))
		 {
			 $pid = $result['Product_id'];
		//	 echo $result['Product_id']."<br>";
		 $sql1 = "select * from image_tb where product_id = $pid";	 
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
		//	echo $img[$a];
		
			 ?>
		
        <!-- Portfolio Section -->
       
            <div class="col-md-4 col-sm-6">
			
                <a href="product.php?info=<?php echo $pid; ?>">
                    <img class="img-responsive img-portfolio img-hover" height= "600" width= "450" src="<?php echo WEB_URL?>/Merchant/uploads/<?php echo $img[$a]; ?>" alt="<?php echo $img[$a]; ?>">
                </a>
			<?php	echo "<strong>".$result['Product_name']."</strong>";
			?>
            </div>
         <?php
           }
		
		?>
        </div>
        <!-- /.row -->

		<?php 
 $sql1 = "select * from product_tb order by Items_Sold desc limit 1";
 
		 $res1 = mysql_query($sql1,$link);
		 while($result1 = mysql_fetch_assoc($res1))
		 {//echo $result1['Product_name'];
	 $pid = $result1['Product_id'];
		//	 echo $result['Product_id']."<br>";
		 $sql2 = "select * from image_tb where product_id = $pid";	 
		    $res2 = mysql_query($sql2,$link);
			echo mysql_error($link);
			$img = array();$i=0;
			 while($result2 = mysql_fetch_assoc($res2))
			 {
				 $img[$i] = $result2['image_name'];
				 $i++;
			//	 echo  $result1['image_name'];
			 }
			$a = array_rand($img,1);
		//	echo $img[$a];
		 
		?>

        <!-- Features Section -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Top Selling Product</h2>
            </div>
            <div class="col-md-6">
                
           <a href="product.php?info=<?php echo $pid; ?>">
                    <img class="img-responsive img-portfolio img-hover" height= "600" width= "450" src="<?php echo WEB_URL?>/Merchant/uploads/<?php echo $img[$a]; ?>" alt="<?php echo $img[$a]; ?>">
                </a>
        </div>
		<div class="col-md-6">
                 <?php echo "<strong>".$result1['Product_name']."</strong><br><br>";
				 echo $result1['Product_desc']."<br><br>";
				 	           $mrp = $result1['Product_cp'];
			   $sp = $result1['Product_sp'];
			   $dis = $mrp - $sp;
			  // echo $dis;
			   $disp = ($dis/$mrp)*100;
			    
			   echo "<br>M.R.P : <strike>" . $mrp."</strike><br>";
			   echo "<br>S.P : <strong>" . $sp."</strong><br>";  
			   echo "<br>Discount : " .intval($disp)."%<br>";
	       
		      
	         
                ?>        
       <?php     if($result1['Product_Quantity'] >= $result1['Product_MaxQuant']) {    ?>
				<a href = "Payment.php?product=<?php echo $result1['Product_id'] ;?> " ><img src = "<?php echo WEB_URL ?>/Images/buy.png" alt="buy" ></a>
				 <?php  
	   }
 else{    ?>
	     <img src="outofstock.jpg" alt="outofstock" height="100" width="400"> 
      <?php  }	   ?>
 
                   
                </div>
        <!-- /.row -->

        <hr>

        <!-- Call to Action Section -->
        
           
      
	  <?php }
?>
</div>
        <hr>
		
		
		<br><br>
		<br><br>
		<br><br>
		<br>
		<a href="Merchant/indexM.php"><Small><p align="right"> Want to sell??</p><Strong><p align="right"> Become A SELLER </p></a>
       
	<a href="Merchant/indexM.php">	<p align ="right"><img src="sell.jpg" ></p></a>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; 2016 Farmer Friendly Portal</p>
                    
                </div>
            </div>
        </footer>

    
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 
    })
    
var modal = document.getElementById('id01');


window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

    </script>
    
    </div>
    </body>

</html>
