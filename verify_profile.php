<?php
if(isset($_GET['key']))
{
require("conn.php");
$key=$_GET['key'];
$sql="select con2,verify2 from user_table where verify2= 0 and con2='$key'";
$record=mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
</head>
<body oncontextmenu="return false;">
<center>
	<?php 
	if($record->num_rows==1)
	{
	?>
	<fieldset style="height: auto;width: 20%">
		<form action="" method="post">
			<h1 style="color:#FE6C2C;font-family: Cooper Black;font-size: 30px;">mDrive</h1><br>
<input type="password" placeholder="Enter Password" name="pwd" id="pwd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,16}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 5 or more characters" autocomplete="off" required style="margin-bottom: 10px">
<input type="submit" name="submit" value="submit">
</form>
</fieldset>
</center>
<?php
}
?>
<?php 
	if($record->num_rows==0)
	{
	?>
	<center>
		<h1>Your Session is Over</h1>
		<a  href="index">Goto Login Page</a>
</center>
<?php
}
?>
<script type="text/javascript">
  document.onkeydown = function(e) {
if(event.keyCode == 123) {
return false;
}
if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
return false;
}
}
</script>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
	$pwd=base64_encode($_POST['pwd']);
if($record->num_rows==1)
{
	$pwd=base64_encode($_POST['pwd']);
	$rs=mysqli_query($con,"UPDATE user_table SET verify2=1,profile_pwd='$pwd' WHERE con2='$key'");
//$rs=mysqli_query($con,"UPDATE user_table SET verify2=0 WHERE con2='$key'");

	
//$rs=mysqli_query($con,"UPDATE user_table SET verify2=1,profile_pwd='$pwd' WHERE con2='$key'");
if($rs)
{
	echo "<script>alert('Your Profile Password Change Success')</script>";
	echo "<script>location.href='homepage'</script>";
}
else
{
	echo $con->error;
}
}
else
{
	echo "<script>alert('Your Account is already verify')</script>";
	echo "<script>location.href='index'</script>";
}
}
}
else
{
	echo "<script>alert('something went worng')</script>";
	echo "<script>location.href='index'</script>";
}
?>


<html>
<head>
	<title>Verify Account</title>
</head>
<body>

</body>
</html>