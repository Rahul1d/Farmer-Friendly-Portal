<!DOCTYPE html>
<?php
include_once('config.php');
//session_start();

?>

<html lang="en">
    
   

<head>
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

	
      <script src="js/bootstrap.min.js" type="text/javascript"></script>

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
        
 ..dropdown-menu {background:#FFF !important; color:#000 !important;}
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
.navbar-inverse {
    background-color: #7FFF00;
    border-color: #E7E7E7;
}
/* title */
.navbar-inverse .navbar-brand {
    color: black;
}
.navbar-default .navbar-brand:hover,
.navbar-default .navbar-brand:focus {
    color: #5E5E5E;
}
/* link */
.navbar-default .navbar-nav > li > a {
    color: #777;
}
.navbar-default .navbar-nav > li > a:hover,
.navbar-default .navbar-nav > li > a:focus {
    color: #333;
}
.navbar-default .navbar-nav > .active > a, 
.navbar-default .navbar-nav > .active > a:hover, 
.navbar-default .navbar-nav > .active > a:focus {
    color: #555;
    background-color: #E7E7E7;
}
.navbar-default .navbar-nav > .open > a, 
.navbar-default .navbar-nav > .open > a:hover, 
.navbar-default .navbar-nav > .open > a:focus {
    color: #555;
    background-color: #D5D5D5;
}
/* caret */
.navbar-default .navbar-nav > .dropdown > a .caret {
    border-top-color: #777;
    border-bottom-color: #777;
}
.navbar-default .navbar-nav > .dropdown > a:hover .caret,
.navbar-default .navbar-nav > .dropdown > a:focus .caret {
    border-top-color: #333;
    border-bottom-color: #333;
}
.navbar-default .navbar-nav > .open > a .caret, 
.navbar-default .navbar-nav > .open > a:hover .caret, 
.navbar-default .navbar-nav > .open > a:focus .caret {
    border-top-color: #555;
    border-bottom-color: #555;
}
/* mobile version */
.navbar-default .navbar-toggle {
    border-color: #DDD;
}
.navbar-default .navbar-toggle:hover,
.navbar-default .navbar-toggle:focus {
    background-color: #DDD;
}
.navbar-default .navbar-toggle .icon-bar {
    background-color: #CCC;
}
@media (max-width: 767px) {
    .navbar-default .navbar-nav .open .dropdown-menu > li > a {
        color: #777;
    }
    .navbar-default .navbar-nav .open .dropdown-menu > li > a:hover,
    .navbar-default .navbar-nav .open .dropdown-menu > li > a:focus {
        color: #333;
    }
}
    </style>

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
				
<a href="index.php">
	<img src="logo.jpg" class="img-circle"
   style="position:absolute; left:10px; top:10px; width:200px; height:100px; border:none;"
   alt="fixed position Willmaster logo"
   /></a>


 
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="about.php">About</a>
                    </li>
					<?php
					if(!isset($_SESSION['user']) || $_SESSION['login']=='M')
					{
						?>
					
					<li>
					
                   <a onclick="document.getElementById('id01').style.display='block'">Login</a>
				   </li>
				 
				<?php	}?>
					
					<?php
				   if(isset($_SESSION['user']) && $_SESSION['login']!='M')
					{ 
			 $id	= $_SESSION['user'];
						$sql = "select * from customer_tb where Customer_id = $id" ;
						$res = mysql_query($sql,$link) or die(mysql_error());
						$result = mysql_fetch_assoc($res);
						?>
				   <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $result['Customer_name']; ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="orderinfo.php">Orders</a>
                            </li>
                            <li>
                                <a href="userinfo.php">User info</a>
                            </li>
                            <li>
                   <a href="<?php WEB_URL ?>User/logout.php">Logout</a>
				   </li>

                        </ul>
                    </li>
					
				   
				   <?php	}?>
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>
                    
                    
                   
                
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <!--/.new-->
    <div id="id01" class="modal p1">
  
  <form class="modal-content animate" action="User/login.php" method="post" >
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="mom.jpg" class="p1" >
    </div>

    <div class="container ">
      <label><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="email"  style="width:190px" required >
<br><br>

      <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" style="width:190px" required>
<br>
        
      <p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button class="p1" type="submit" name="submit" style="background-color:green;height:40px;width:200px">Login</button></p>

 <p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="User/reg.php" ><button type="button"  style="background-color:red;height:40px;width:200px">Register</button></a></p>
      
      
    </div>

    
  </form>
</div>
