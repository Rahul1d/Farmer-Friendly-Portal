<?php 
include_once('config.php');
session_start();

$id=$_SESSION['user'];

$sql = "Select * from product_tb where Merchant_id = $id ";
$res = mysql_query($sql,$link);
//$result = mysql_fetch_assoc($res);
while($result = mysql_fetch_assoc($res)){
    $pid = $result['Product_id'];

$sql1 = "Select * from image_tb where product_id = $pid ";
$res1 = mysql_query($sql1,$link);
//$result1 = mysql_fetch_assoc($res);
while($result1 = mysql_fetch_assoc($res1))
{
	echo $result1['image_id'];

?>	 <img src="uploads/<?php echo $result1['image_name']; ?>" alt="<?php echo $result1['image_name']; ?>">

<?php
}

}


?>
