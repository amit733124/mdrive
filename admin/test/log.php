<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
	<div class="login-box">
		<img src="k1.jpg" class="a">
		<h1>Admin Login Here</h1>
		<form method="post" action="">
			<p>Username: </p>
			<input type="text" name="username" placeholder="Enter Username" required>
			<p>Password: </p>
			<input type="password" name="pass" id="pass" placeholder="Enter Password" required>
			<i class="fa fa-eye" onclick="myFunction()" style="margin-bottom:10px; ">Show Password</i>
			<input type="submit" name="submit" value="Login">
			<a href="#">Forget Password</a>
		
	<script>
function myFunction() {
  var x = document.getElementById("pass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
<?php
if(isset($_POST['submit']))
{
  error_reporting(E_ALL);
  session_start();
require("conn.php");
$user=$_POST['username'];
$pass=$_POST['pass'];

//and captcha LIKE '%{$cap}%'
$sql="select * from admin_table where username='$user' and password='$pass' ";
$record=mysqli_query($con,$sql);
$row=mysqli_fetch_array($record);
if($row['username']==$user && $row['password']==$pass)
  {
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (30 * 60) ;
    $_SESSION['username']=$user;
    //echo "<br><font color=red>Welcome ".$user."</font>";
    echo "<br><img src='image/wait7.gif' height='15%'>";
    header("Refresh:2.5; url=homepage.php");
  } 
  
  else
  {
   
      echo "<br><font color='red' style='margin-bottom:120px'>Worng Userid / Password</font><br>";
     // header('Location:log.php');
  }
}
?>
</form>
</div>
</body>
</html>