<!doctype html public "-//w3c//dtd html 3.2//en">

<html>

<head>
<title></title>
</head>

<body >

<?Php
include_once('config.php');

if(isset($_POST['submit'])){
echo "\$_POST['fname'] = $_POST[pname]<br>
\$_POST['cat'] = $_POST[cat]<br>
\$_POST['subcat'] = $_POST[subcat]
";
echo $_POST['product_cp']."<br>".$_POST['product_sp']."<br>".$_POST['quantity']."<br>".$_POST['max_quantity']."<br>";
session_start();
$product_name = $_POST['pname'];
$product_cat = $_POST['cat'];
$product_subcat = $_POST['subcat'];
$product_cp = $_POST['product_cp'];
$product_sp = $_POST['product_sp'];
$product_quantity = $_POST['quantity'];
$max_quantity = $_POST['max_quantity'];
$product_desc = $_POST['desc'];
$id = $_SESSION['Merchant'];
$sql = "insert into product_tb(Product_name,Category_id,sub_category_id,Merchant_id,Product_desc,Product_cp,Product_sp,Product_Quantity,Product_MaxQuant) 
values ('$product_name',$product_cat,$product_subcat,$id,'$product_desc',$product_cp,$product_sp,$product_quantity,$max_quantity) ";

 $res = mysql_query($sql,$link);
// echo $res;
echo mysql_error($link);
if($res)
  $pid = mysql_insert_id()	;
 echo mysql_error($link);
 
 /*
 
 $sql = "select * from product_tb where Product_id =(select max(Product_id))";
 $res = mysql_query($sql,$link);
 //echo $res;
 echo mysql_error($link);
 
 $get = mysql_fetch_assoc($res);
 */
 //$pid = $get['Product_id'];
 echo $pid."<br>";
}
/*
while (list ($key,$val) = each ($_POST)) {
echo "\$$key = $val";
echo "<br>";
} 
*/
?>

<>
<br>
</body>

</html>
<?php
//include('config.php');


  if (isset($_POST["submit"])) {
  // include resized library
 // require_once('./php-image-magician/php_image_magician.php');
  $msg = "";
   $smsg = "";
    $emsg = "";
  
  $valid_image_check = array("image/gif", "image/jpeg", "image/jpg", "image/png", "image/bmp");
  if (count($_FILES["user_files"]) > 0) {
    $folderName = "uploads/";

   // $sql = "INSERT INTO tbl_images(image_name) VALUES (:img)";
   // $stmt = $DB->prepare($sql);
   
    for ($i = 0; $i < count($_FILES["user_files"]["name"]); $i++) {

      if ($_FILES["user_files"]["name"][$i] <> "") {

        $image_mime = strtolower(image_type_to_mime_type(exif_imagetype($_FILES["user_files"]["tmp_name"][$i])));
        // if valid image type then upload
        if (in_array($image_mime, $valid_image_check)) {

          $ext = explode("/", strtolower($image_mime));
          $ext = strtolower(end($ext));
          $filename = rand(10000, 990000) . '_' . time() . '.' . $ext;
          $filepath = $folderName . $filename;

          if (!move_uploaded_file($_FILES["user_files"]["tmp_name"][$i], $filepath)) {
            $emsg .= "Failed to upload <strong>" . $_FILES["user_files"]["name"][$i] . "</strong>. <br>";
            $counter++;
          } else {
            $smsg .= "<strong>" . $_FILES["user_files"]["name"][$i] . "</strong> uploaded successfully. <br>";

      
			 
			$imgi = $filename ;
			 $sql = "Insert into image_tb (image_name,product_id) values ('$imgi',$pid)" ;
			 $res = mysql_query($sql,$link);
			 echo mysql_error($link);
			 echo $res;
			
			
          }
        } else {
          $emsg .= "<strong>" . $_FILES["user_files"]["name"][$i] . "</strong> not a valid image. <br>";
        }
      }
	  
    }


   // $msg .= (strlen($smsg) > 0) ? successMessage($smsg) : "";
   // $msg .= (strlen($emsg) > 0) ? errorMessage($emsg) : "";
  } else {
    //$msg = errorMessage("You must upload atleast one file");
  }
}
 echo '<script language="javascript">';
echo 'alert("Product Added Suceessfully!!!!!!!")';
echo '</script>';
header("Refresh : 2 ; url =  success.php");
//header("location:success.php")
?>
