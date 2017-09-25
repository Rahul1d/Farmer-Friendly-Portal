<?php
//include('config.php');


  if (isset($_POST["sub1"]) || isset($_POST["sub2"])) {
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

        /*    $magicianObj = new imageLib($filepath);
            $magicianObj->resizeImage(100, 100);
            $magicianObj->saveImage($folderName . 'thumb/' . $filename, 100);

            /*             * ****** insert into database starts ******** */
        /*    try {
              $stmt->bindValue(":img", $filename);
              $stmt->execute();
              $result = $stmt->rowCount();
              if ($result > 0) {
                // file uplaoded successfully.
              } else {
                // failed to insert into database.
              }
            } catch (Exception $ex) {
              $emsg .= "<strong>" . $ex->getMessage() . "</strong>. <br>";
            }
            /*             * ****** insert into database ends ******** */
			 
			$imgi = $filename ;
			 $sql = "Insert into image_tb (image_name) values ('$imgi')" ;
			 $res = mysql_query($sql,$link);
			 echo mysql_error($link);
			 echo $res;
			
			
          }
        } else {
          $emsg .= "<strong>" . $_FILES["user_files"]["name"][$i] . "</strong> not a valid image. <br>";
        }
      }
	  
    }


    $msg .= (strlen($smsg) > 0) ? successMessage($smsg) : "";
    $msg .= (strlen($emsg) > 0) ? errorMessage($emsg) : "";
  } else {
    $msg = errorMessage("You must upload atleast one file");
  }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
   
    <link rel="stylesheet" href="style.css" type="text/css" />
    <style>
      .files{height: 30px; margin: 10px 10px 0 0;width: 250px; }
      .add{ font-size: 14px; color: #EB028F; border: none; }
      .rem a{ font-size: 14px; color: #f00; border: none; }
      .submit{width: 110px; height: 30px; background: #6D37B0; color: #fff;text-align: center;}
    </style>
   
  </head>
  <body>
    <div id="container">
      <div id="body">
        <div class="mainTitle" >Upload multiple images create thumbnails and save path to database with php and mysql</div>
        <div class="height20"></div>
        <article>
       
          <div class="height20"></div>
          <div style="width: 380px; margin: 0 auto;">
            <h3 style="text-align: center;">Image will be resized to 100px X 100px </h3>
            <form name="f1" action="try.php" method="post" enctype="multipart/form-data">            
           <!--   <fieldset>
              
                <input class="files" name="user_files[]" type="file" multiple="multiple" >
                <div class="height10"></div>
                <div><input type="submit" class="submit" name="sub1" value="Upload Images" /> </div>
              </fieldset> 
            </form>
            <div style="width: 380px; margin: 0 auto;">
			-->
             
            </div>
          </div>
          <div class="height10"></div>
         <?php
        // fetch all records
          $sql = "SELECT * FROM image_tb ";
		 $res = mysql_query($sql);
		 $error = mysql_error($link);
	echo $error;
		// $images = mysql_fetch_assoc($res);
		// echo count($images);
        /*  try {
            $stmt = $DB->prepare($sql);
            $stmt->execute();
            $images = $stmt->fetchAll();
          } catch (Exception $ex) {
            echo $ex->getMessage();
          }*/
          ?>
       <!--   <table class="bordered">
            <tr><th>ID</th><th>thumbnail</th><th>ORIGINAL</th></tr>
            <?php
	/*		$img = mysql_fetch_assoc($res);
            if (count($img) > 0) {
              while($img = mysql_fetch_assoc($res)){
                ?>
                <tr>
                  <td style="text-align: center;"><?php echo $img['image_id']; ?></td>
                  <td style="text-align: center;">
                    <a href="uploads/thumb/<?php echo $img['image_name']; ?>" target="_blank">
                      <img src="uploads/thumb/<?php echo $img['image_name']; ?>" alt="<?php echo $img['image_name']; ?>">
                    </a>
                  </td>
                  <td style="text-align: center;">
                    <a href="uploads/<?php echo $img['image_name']; ?>" target="_blank">
                      <img src="uploads/<?php echo $img['image_name']; ?>" alt="<?php echo $img['image_name']; ?>" width="300" height="300">
                    </a>
                  </td>
                </tr>  
                <?php
              }
            } else {
              ?>
			   <tr>
              <td colspan="3">No images in the database.</td>
            </tr> 
            <?php } ?>
          </table>
          <div class="height10"></div>
        </article>
        <div class="height10"></div>
        <footer>
          <div class="copyright"> &copy; 2013 <a href="http://www.thesoftwareguy.in" target="_blank">thesoftwareguy</a>. All rights reserved </div>
          <div class="footerlogo"><a href="http://www.thesoftwareguy.in" target="_blank"><img src="http://www.thesoftwareguy.in/thesoftwareguy-logo-small.png" width="200" height="47" alt="thesoftwareguy logo" /></a> </div>
        </footer>
      </div>
    </div>

  </body>
</html>
<?php

function errorMessage($str) {
  return '<div style="width:50%; margin:0 auto; border:2px solid #F00;padding:2px; color:#000; margin-top:10px; text-align:center;">' . $str . '</div>';
}

function successMessage($str) {
  return '<div style="width:50%; margin:0 auto; border:2px solid #06C;padding:2px; color:#000; margin-top:10px; text-align:center;">' . $str . '</div>';
}
?>