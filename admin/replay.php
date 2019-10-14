<?php
    //session_start();

    if (!isset($_SESSION['username'])) {
        echo "<script>alert('Please Login again')</script>";
        echo "<a href='index'>Click Here to Login</a>";
    }
        else { 
          
?>
<html>
<head>
	<title>Feedback</title>
</head>
<center>
<body style="background-color: #F5F5F5;">
	<form method="post" action="r_success.php">
<fieldset style="height: auto;width: 20%;background-color: #FFFFFF;margin-top: 10px;border-radius: 10px">
	<h2>Add Admin!</h2>
	<hr>
		<table><tr><th>Full Name</th>
	<td><input type="text" placeholder="First Name" name="fname" required></td></tr>
		<tr><th>Username</th>
	<td><input type="text" placeholder="Username" name="user_id" style="margin-top: 5px"></tr>
     <tr><th>Password</th>
     	<td><input type="password" placeholder="Enter Password" name="pass" style="margin-top: 5px">
        </tr>
        <tr><th>&nbsp</th>
     	<td><input type="submit" name="submit" value="Submit">
     		<input type="reset" name="reset" value="Reset">
        </tr>
       </table>
</fieldset>
</form>
<?php
}
?>
</center>
</body>
</html>