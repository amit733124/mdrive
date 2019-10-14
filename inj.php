<!DOCTYPE html>
<html>
<head>
	<title>ok</title>
</head>
<body>
	<form action="" method="post">
<input type="text" placeholder="Enter Full Name" name="name"><br>
<input type="submit" name="submit" value="submit">
</form>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
require("conn.php");
$name=$_POST['name'];
$name=mysqli_real_escape_string($con,$name);
$key=md5(time().$name);
echo $key;
}
?>