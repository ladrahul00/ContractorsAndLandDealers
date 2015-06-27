<html>
<title>
Upload image</title>
<body>
<!--
<form method="POST" action="<?php //echo $_SERVER['PHP_SELF'];?>">
File :<input type="file" name="file" value="file">
<input type="submit" value="Upload" name="submit">
</form>-->
<form action="<?php echo $_SERVER['PHP_SELF'];?>"  method="post" enctype="multipart/form-data">
  <input type="file" name="file" size="50" maxlength="25"> <br> 
  <input type="submit" name="upload" value="Upload">
  <input type="submit" name="disp" value="display image">
</form>
</body>

<?php

	mysql_connect('localhost','root','')OR die('Could not connect to MySQL: ' .mysqli_connect_error());
	mysql_select_db('image');


	if(isset($_POST['upload']))
	{  
		$name=addslashes($_FILES['file']['name']);
		$image=addslashes($_FILES['file']['tmp_name']);
		$image=file_get_contents($image);
		$image=base64_encode($image);
		$type=$_FILES['file']['type'];
		$target_path = "images/".$name; 
		$size=$_FILES['file']['size'];
		$up=move_uploaded_file($_FILES['file']['tmp_name'],$target_path);
		$q=mysql_query("INSERT INTO IMAGE (name,image_type,image_size,image)VALUES('".$name."' ,'{$type}','{$size}','{$image}')") or die (mysql_error());
		if(!$up) 
		{
			echo'<script> alert("image not uploaded!");</script>';
		}
		elseif(!$q)
		{
			echo'<script> alert("Image not stored!");</script>';
		}
		else
			echo "<script> alert( 'Image stored and uploaded successfullys!' ); </script>";          
	}


	if(isset($_POST['disp'])){
		$result=mysql_query("SELECT * FROM IMAGE") or die (mysql_error());
		
		while($row=mysql_fetch_array($result)){
			echo '<img src="data:image;base64,'.$row["image"].'">';
		}
		
		
	}

?> 