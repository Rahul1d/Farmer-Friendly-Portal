<?php 
 include_once('config.php');
 //session_start();
 include_once('navM.php');
?>

<html>
<body>
<br>
<br>
<br>
<div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">WelCome To Merchant's Portal::
                    
                </h1>
				</div>
<div class="row">
<div class="col-md-8">

           <img src="seller.jpg" alt="sell" height="400" width="800">   
                  
                </div>
          <?php if(isset($_SESSION['Merchant']))

			{		
                $id = $_SESSION['Merchant'];
				$sql = "select * from Merchant_tb where Merchant_id = $id";
				$res = mysql_query($sql);
				echo mysql_error($link);
				$result = mysql_fetch_assoc($res);
				echo "<h1>WELCOME :" .$result['Merchant_name'];
				

			?>
			<br><br>
			<a href="success.php" ><button class="btn" >EXplore !! </button></a>
			<?php  }?>
			<?php if(!isset($_SESSION['Merchant']))

			{				?>
			
			<div class="col-md-4">
               
               
           
			
<form method="post" name="register" action="login.php" onsubmit="return Validate(this)" id="form1" class="well form-horizontal">
<div class="form-group">
      <label class="control-label col-sm-2" for="name">Email</label>
      <div class="col-sm-8">
        <input class="form-control" name="email" placeholder="Email" type="text">
      </div>
    </div>
<div class="form-group">
      <label class="control-label col-sm-2" for="name">Password</label>
      <div class="col-sm-4">
        <input class="form-control" name="password" placeholder="Password" type="password">
      </div>
    </div>
<!-- Button -->
<div class="form-group">
  <label class="col-md-2 control-label"></label>
  <div class="col-md-4">
    

<input type="submit" name="submit" class="btn " value="Login" id="sub" onclick="return Validate()">
</div>
</div>
<div class="form-group">
	 <div class="col-sm-offset-2 col-sm-10">
		<p> Don't have an account?<a href="RegM.php"> Register</a> now!</p>
	 </div>
	</div>
</div>

</form>
</div>
<script>

//uid = document.register.userid;
 pid = document.register.password;


eid = document.register.email;
//gid = document.register.gender;
//lid = document.register.lang;	

function Validate()
{
  //alert("hiii");
    if(evalidate(eid))
   if(pidvalidate(pid))
   return true;
 
  return false; 
 
 }
 
 
 
   function pidvalidate(uid, a, b)
 { 
 if(uid.value.length== 0 )
 { alert("The password should be in between can't be empty" );
 uid.focus();
 return false;
 
 }
 return true;
 }
 
 function pvalidate(uid)
 { patt=/^[0-9]+$/;
 if(uid.value.length== 0 || uid.value.length!=10 )
 { alert("The phone no lenghth should be 10" );
 uid.focus();
 return false;
 }
 if(uid.value.match(patt))
 {
 return true;
 }
 else{
 alert("The Phone no should conatin only numbers");
 uid.focus();
 return false;
 }
 return true;
 }
 
 function nidvalidate(nid)
 {  patt = /^[a-z A-Z]+$/;
 if(nid.value.match(patt))
 { return true;}
 else
 {alert("The name should conatin alphabets only" );
 nid.focus();
 return false;
 
 }
 }
 
 function adidvalidate(nid)
 {  patt = /^[a-z A-Z 0-9]+$/;
 if(nid.value.match(patt))
 { return true;}
 else
 {alert("The address  should not contaon spaecial symbols " );
 nid.focus();
 return false;
 
 }
 }
 
 function evalidate(eid)
 { //patt=/^([a-z A-Z 0-9_ \. \-]) + \@ (([a-z A-Z 0-9 \-] + \. ) + ([a-z A-Z]{2,3}) $)/;
    patt = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  if(eid.value.match(patt))
  return true;
  else{
  alert("Invalid email Address");
  eid.focus;
  return false;
  }
 }
 
	</script>
	<?php	}?>
	<!--
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
	
	<script src="js/jquery-3.1.1.min.js"></script>
	<script>

$('#form1').submit(function(e)
{
e.preventDefault();
 $.ajax({
     type: 'POST',
     url: 'insert.php',
     data: $("#form1").serialize(),
     success: function(response) {

     }
   });
});
</script>-->
</body>
</html>