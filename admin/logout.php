<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="images/cpanel.png" sizes="26x26">
	<title>Logout</title>
</head>
<body>
<?php
    session_start();
    session_destroy();
    echo "<center><br><img src='image/thank.jpg' height='50%' width='50%'></center>";
    header("Refresh:3; url=index.php");
    //header('Location:index.php');
?>
</body>
</html>
