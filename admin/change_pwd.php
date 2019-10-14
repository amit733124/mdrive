<?php
    session_start();

    if (!isset($_SESSION['username'])) {
        echo "<script>alert('Please Login again')</script>";
        echo "<a href='index'>Click Here to Login</a>";
    }
        else { 
        	$now = time();
 
    if($now > $_SESSION['expire'])
 
    {
 
        session_destroy();
 
    }
?>
<html>
<title>Change Password</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body oncontextmenu="return false;" style="background-image: url(image/n.png); ">
<center>
<form action="" method="POST">
<fieldset style="
background-color:#e5e5e5;height:200px;width:400px;border-radius: 10px">
<h1>Change Password</h1>
<i class="fa fa-lock" style="font-size: 23px;color: #0f0b38"></i><input type="password" placeholder="Enter Old Password"  name="old_pwd" autocomplete="off" style="font-size: 20px;background:transparent;outline: none;" ><br><br>
<i class="fa fa-lock" style="font-size: 23px;color: #0f0b38"></i><input type="password" placeholder="Enter New password"  name="pwd" style="font-size: 20px;background:transparent;outline: none;"><br>
<button type="submit" name="s1" style="margin-top: 5px;margin-left:30px;color:white;background-color:green;border-radius:10px">Change</button>
<a href="homepage" style="text-decoration: none;color:white;background-color: orange;border-radius: 10px">Back</a>
</fieldset>
<?php
if(isset($_POST['s1']))
{
require("conn.php");
$mail=$_POST['old_pwd'];
$pwd=$_POST['pwd'];
$rs=mysqli_query($con,"UPDATE admin_table SET password='$pwd'WHERE password='$mail'");
if($rs)
echo "Password Change Success"."<br>";
echo "Please Wait....";
header("Refresh:2; url=homepage");
}
}
?>
</form>
</center>
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