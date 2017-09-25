<?php
include("config.php");

$id = mysql_query("SELECT * FROM Category_tb");
//echo $id;
//echo "Rahul";

/*while($db_field = mysql_fetch_assoc($id))
{
	print$db_field['Category_id']."<br>";
	print$db_field['Category_name']."<br>";
	//print$db_field['age']."<br>";
	//print$db_field['status']."<br>";
	
}
*/
$sql=mysql_query("SELECT Category_id,Category_name FROM Category_tb");
if(mysql_num_rows($sql)){
$select= '<select name="cat">';
$select .="<option value='default'> SELECT A OPTION</option>";
while($rs=mysql_fetch_array($sql)){
      $select.='<option value="'.$rs['Category_id'].'">'.$rs['Category_name'].'</option>';
  }
}
$select.='</select>';
echo $select;

$sql=mysql_query("SELECT  * FROM sub_category_tb");
if(mysql_num_rows($sql)){
$select= '<select name="cat">';
$select .="<option value='default'> SELECT A Subcategory</option>";
while($rs=mysql_fetch_array($sql)){
      $select.='<option value="'.$rs['sub_category_id'].'">'.$rs['sub_category_name'].'</option>';
  }
}
$select.='</select>';
echo $select;




	/*$choice = mysql_real_escape_string($_GET['choice']);
	
	$query = "SELECT * FROM sub_category_tb WHERE category_id='$choice'";
	
	$result = mysql_query($query);
		
	while ($row = mysql_fetch_array($result)) {
   		echo "<option>" . $row{'dd_val'} . "</option>";
	}

//$res = mysql_query("insert into tb_1(name,age,status)values('shashi',65,'pass')");
//my
?>
<html>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<script>
$("#first-choice").change(function() {
  $("#second-choice").load("getter.php?choice=" + $("#first-choice").val());
});
</script>

*/
