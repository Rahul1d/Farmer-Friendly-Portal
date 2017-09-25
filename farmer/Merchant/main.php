<html>
<head>
 <link rel="stylesheet" href="../css/bootstrap.css"/>
    <link rel="stylesheet" href="../css/bootstrapValidator.css"/>

    <script type="text/javascript" src="../jquery/jquery.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/bootstrapValidator.js"></script>
 <script src="jquery-1.9.0.min.js"></script>
    <script>
      $(document).ready(function() {
        $(".add").click(function() {
          $('<div><input class="file" name="user_files[]" type="file" ><span class="rem" ><a href="javascript:void(0);" >Remove</span></div>').appendTo(".contents");

        });
        $('.contents').on('click', '.rem', function() {
          $(this).parent("div").remove();
        });

      });
    </script>
<script type="text/javascript">
function AjaxFunction()
{
var httpxml;
try
  {
  // Firefox, Opera 8.0+, Safari
  httpxml=new XMLHttpRequest();
  }
catch (e)
  {
  // Internet Explorer
		  try
   			 		{
   				 httpxml=new ActiveXObject("Msxml2.XMLHTTP");
    				}
  			catch (e)
    				{
    			try
      		{
      		httpxml=new ActiveXObject("Microsoft.XMLHTTP");
     		 }
    			catch (e)
      		{
      		alert("Your browser does not support AJAX!");
      		return false;
      		}
    		}
  }
function stateck() 
    {
    if(httpxml.readyState==4)
      {
//alert(httpxml.responseText);
var myarray = JSON.parse(httpxml.responseText);
// Remove the options from 2nd dropdown list 
for(j=document.testform.subcat.options.length-1;j>=0;j--)
{
document.testform.subcat.remove(j);
}


for (i=0;i<myarray.data.length;i++)
{
var optn = document.createElement("OPTION");
optn.text = myarray.data[i].sub_category_name;
optn.value = myarray.data[i].sub_category_id;  // You can change this to subcategory 
document.testform.subcat.options.add(optn);

} 
      }
    } // end of function stateck
	var url="dd.php";
var cat_id=document.getElementById('s1').value;
url=url+"?cat_id="+cat_id;
url=url+"&sid="+Math.random();
httpxml.onreadystatechange=stateck;
//alert(url);
httpxml.open("GET",url,true);
httpxml.send(null);
  }
</script>
</head>
<body>
<div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Add Product:
                    
                </h1>
				</div>
				</div>
<form name="testform" class="well form-horizontal" method='POST' action='mainck.php' enctype="multipart/form-data" onsubmit="return Validate()">

						<div class="form-group">
                                <label class="col-lg-3 control-label">Product Name:</label>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" name="pname" required/>
                                </div>
                            </div>
							
							<div class="form-group">
 
<label for="expertise" class="col-lg-3 control-label">Select Category First</label>
 
<div class="col-sm-3">
<?Php
require "config.php";// connection to database 

echo "  <select name=cat id='s1' class='form-control' onchange=AjaxFunction();>
<option value='default'>Select One</option>";

$sql="select * from category_tb "; // Query to collect data from table 

$res = mysql_query($sql,$link);
//$res = mysql_fetch_assoc($res);
while($row=mysql_fetch_assoc($res)) {
			$resultset[] = $row;
		}
foreach ($resultset as $row) {
echo "<option value=$row[Category_id]>$row[Category_name]</option>";
}
?>
</select>
</div></div>
<br>

<div class="form-group">
 
<label for="expertise" class="col-lg-3 control-label">Select Subcategory First</label>
 
<div class="col-sm-3">
<select name=subcat id='s2' class='form-control'>

</select>
</div></div>
<div class="form-group">
                                <label class="col-lg-3 control-label">Mrp</label>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" name="product_cp" required/>
                                </div>
                            </div>
<div class="form-group">
                                <label class="col-lg-3 control-label">Selling Price</label>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" name="product_sp" required/>
                                </div>
                            </div>
							<div class="form-group">
                                <label class="col-lg-3 control-label">Quantity available in Stock:</label>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" name="quantity" required/>
                                </div>
                            </div><div class="form-group">
                                <label class="col-lg-3 control-label">Maximum Quantity which a customer can Order:</label>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" name="max_quantity" required/>
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-lg-3 control-label">Description</label>
                                <div class="col-lg-5">
                                    <textarea rows="4" cols="10" class="form-control" name="desc" required ></textarea>
                                </div>
                            </div>



 
           
                  <div class="form-group">
                                <label class="col-lg-3 control-label">Add Image</label>
                                <div class="col-lg-5">

                  <input class="file form-control" name="user_files[]" type="file" data-show-caption="true" required ><a href="javascript:void(0);" class="add" >Add More</a>
                  <div class="contents"></div>
                  <div class="height10"></div>
				  </div></div>
                  <div class="form-group">
				   <label class="col-lg-3 control-label"></label>
				  <div class="col-lg-3"><input type="submit" class="submit form-control" name="submit"   /> </div>
                				  <div class="col-lg-3"><button type="button" class=" form-control" onClick="location.href='success.php'"   >Cancel</button> </div></div>

              </form>
			  <script>

cat= document.testform.cat;
// pid = document.register.password;


//eid = document.register.email;
//gid = document.register.gender;
//lid = document.register.lang;	

function Validate()
{
  //alert("hiii");
    if(catvalidate(cat))

   return true;
 
  return false; 
 
 }
 
function catvalidate(cat)
{
	if(cat.value== 'default')
	{  alert("Plaease select a category"); 
       cat.focus();
		return false;
	}
	return true;
}
 </script>
</body>
</html>


