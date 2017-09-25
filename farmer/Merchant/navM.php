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

	
      <script src="../js/bootstrap.min.js" type="text/javascript"></script>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>
.navbar-inverse {
    background-color: #FF4500;
    background-color: #7FF00;
    border-color: #E7E7E7;
}
/* title */
.navbar-inverse .navbar-brand {
    color: #0F7896;
}
</style>
</head>
    
    

<body>
   
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
             <a href="../index.php">	<img src="logo.jpg" class="img-circle"
   style="position:absolute; left:10px; top:10px; width:200px; height:100px; border:none;"
   alt="fixed position Willmaster logo"
   />   </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="../index.php">Buyer's Home</a>
                    </li>
                    <li>
                        <a href="../about.php">About</a>
                    </li>
					
                    <li>
                        <a href="../contact.php">Contact</a>
                    </li>
                    
                    
                  					<?php
				   if(isset($_SESSION['Merchant'])  )
					{ 
			
							?>
					<li>		
                   <a href="logout.php">Logout</a>    
                    </li>
					
				   
				   <?php	}?> 
                
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <!--/.new-->
    
  
</div>
