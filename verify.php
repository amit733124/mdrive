<?php
if(isset($_GET['key']))
{
require("conn.php");
$key=$_GET['key'];
$sql="select con,verify from user_table where verify= 0 and con='$key' LIMIT 1";
$record=mysqli_query($con,$sql);
if($record->num_rows==1)
{
$rs=mysqli_query($con,"UPDATE user_table SET verify=1 WHERE con='$key'");
if($rs)
{
	echo "<center><img src='image/veri.jpg' height=auto><h1>Please Wait...</center>";
	header("refresh:3;url=index");
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