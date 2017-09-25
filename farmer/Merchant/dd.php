<?Php
@$cat_id=$_GET['cat_id'];
//$cat_id=2;
/// Preventing injection attack //// 
if(!is_numeric($cat_id)){
echo "Data Error";
exit;
 }
/// end of checking injection attack ////
require "config.php";

$sql="select sub_category_name,sub_category_id from sub_category_tb where category_id='$cat_id'";

//$resultset = array();
$res = mysql_query($sql,$link);
echo mysql_error($link);
//$res = mysql_fetch_assoc($res);
while($row=mysql_fetch_assoc($res)) {
			//echo $row['sub_category_id']."<br>";
			//echo $row['sub_category_name'];
			
			$resultset[] = $row;
			
		}

$main = array('data'=>$resultset);
echo json_encode($main);
?>