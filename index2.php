<?php
$msg = "";
//if upload button is pressed
if(isset($_POST['upload']))
{
	//the path to store the uploaded image
	$target = "images/".basename($_FILES['image']['name']);
	
	//connect to the database
	$db = mysqli_connect("localhost","root","","photos");
	
	//get all the submitted data from the form
	$image = $_FILES['image']['name'];
	$text = $_POST['text'];
	
	$sql = "INSERT INTO `images`(`image`,text) VALUES ('$image','$text')";
	mysqli_query($db,$sql);
	
	if(move_uploaded_file($_FILES['image']['tmp_name'],$target))
	{
		$msg = "Image uploaded sucessfully";
	}
	else
	{
		$msg = "There was a problem uploading image";
	}
}
?>










<!DOCTYPE html>
<html>
<head>
	<title>Image Upload</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
<div id="content">

<?php
	$db = mysqli_connect("localhost","root","","photos");
	$sql = "SELECT * FROM images";
	$result = mysqli_query($db,$sql);
	while($row = mysqli_fetch_array($result))
	{
		echo "<div id='img_div'>";
		echo "<img src='images/".$row['image']."' >";
		echo "<p>".$row['text']."</p>";
		echo "</div>";
	}

?>

	<form method="post" action="index.php" enctype="multipart/form-data">
		<input type="hidden" name="size" value="1000000">
		<div>
			<input type="file" name="image">
		</div>
		<div>
			<textarea name="text" cols="40" rows="4" placeholders="say something about this image..."></textarea>
		</div>
		<div>
			<input type="submit" name="upload" value="Upload Image">
		</div>
		</form>
</div>
</body>
</html>