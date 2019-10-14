<?php
    session_start();

    if (!isset($_SESSION['email'])) {
        echo "<script>alert('Please Login again')</script>";
        echo "<script>location.href='index'</script>";
    }
        else {
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="images/cpanel.png" sizes="26x26">
	<title>Logout</title>
</head>
<body>
<?php
error_reporting(0);
    require("conn.php");
   $pwd="Offline"; 
   $username=$_SESSION['email'];
    $rs=mysqli_query($con,"UPDATE tbl2 SET status='$pwd' WHERE username1='$username'");
    session_destroy();
    echo "<center><br><img src='image/thank.jpg' height='50%' width='50%'></center>";
    header("Refresh:3; url=index");
    //header('Location:index.php');
  }
?>
</body>
</html>
