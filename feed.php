<?php
    session_start();

    if (!isset($_SESSION['email'])) {
        echo "<script>alert('Please Login again')</script>";
        echo "<a href='index.php'>Click Here to Login</a>";
    }
        else { 
        	$now = time();
 
    if($now > $_SESSION['expire'])
 
    {
 
        session_destroy();
 
    }
?>
<html>
<head>
	<title>Feedback</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<center>
<form method="post" action="">
<body style="background-color: #F5F5F5">
	
<fieldset style="height: 80%;width: 50%;background-color: #FFFFFF">
	<h2>Rate my Software!</h2>
	<h4>Please let us know your experience with My Software</h4>
	<hr>
		<table><tr><th>Full Name</th>
	<td><input type="text" placeholder="First Name" name="fname" required>
	<td><input type="text" placeholder="Last Name" name="lname" required style="margin-left: 20px"></tr>
		<tr><th>E-mail</th>
	<td><input type="text" placeholder="xyz@gmail.com" name="mail" required style="width: 200%;margin-top: 5px"></tr>
		<tr><th>Rate:</th>
			<td><input type="radio" name="rate" value="bad" style="margin-top:5px ">Bad
            <input type="radio" name="rate" value="Good" style="margin-top:5px ">Good
            <input type="radio" name="rate" value="Excellent" style="margin-top:5px ">Excellent
        </tr>
     <tr><th>How would you<br> suggest I improve it?</th>
     	<td><textarea name="msg" style="height: 203px; width: 181px; margin: 0px; margin-top: 5px"></textarea>
        </tr>
        <tr><th>&nbsp</th>
     	<td><input type="submit" name="submit" value="Submit">
     		<input type="reset" name="reset" value="Reset">
        </tr>
       </table>
</fieldset>
</form>
<?php
if(isset($_POST['submit']))
  {
 require("conn.php");
 require("db.php");
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['mail'];
$feed=$_POST['rate'];
$msg=$_POST['msg'];
$user=$_SESSION['email'];
//$rs=mysqli_query($con,"insert into feedback(first,last,email)values('".$fname."','".$lname."','".$email."')");
$rs=mysqli_query($con,"insert into feedback(first,last,email,rate,msg,user)values('".$fname."','".$lname."','".$email."','".$feed."','".$msg."','".$user."')");
 if($rs)
 {
  echo "success";
  header("success.php");
 }
 else
 {
  echo " not Sucess";
 }
}
?>
</center>
</body>
<?php
}
?>
</html>