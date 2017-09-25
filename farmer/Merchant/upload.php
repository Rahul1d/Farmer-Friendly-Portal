<html>




<?php
//include_once('config.php');
if(isset($_POST['submit']))
{
	$file_name = $_FILES['image']['name'];
	$file_type = $_FILES['image']['type'];
	$file_size = $_FILES['image']['size'];
	$tmp_name = $_FILES['image']['tmp_name'];
	
	if($file_name)
	{
		move_uploaded_file($tmp_name,"img/$file_name");
	}
	
}

?>

<body>
<form id="form1" name="frm" enctype="multipart/form-data" method="post" action="">
Choose image 
<input type="file" name="image">
<input type="submit" name="submit" value="upload">
</form>

</body>
</html>
<?php

$folder = "img/";
if(is_dir($folder))
{
	if($handle = opendir($folder))
	while($file=readdir(($handle)) != false)	
	{
		//if($file==='.' || $file==='..') continue;
		echo '<img src = "img/'.$file.'" width = "500" height = "200" >';
	}
	closedir($handle);
	}
	

