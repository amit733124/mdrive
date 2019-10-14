<?php
    session_start();

    if (!isset($_SESSION['email'])) {
        echo "<script>alert('Please Login again')</script>";
        echo "<script>location.href='../index'</script>";
    }
        else { 
require("conn.php");
require_once "db.php";
$dir=$_GET['email'];
$mail=base64_decode($_GET['email2']);
$sql=("DELETE FROM `user_table` WHERE email='$_GET[email]' AND email2='$mail'");
$sql2=("DELETE FROM `form_table` WHERE email='$_GET[email]' ");
$sql3=("DELETE FROM `file` WHERE email='$_GET[email]' ");
$sql4=("DELETE FROM `tbl2` WHERE username1='$_GET[email]' ");
if (($con->query($sql) == TRUE) && ($con->query($sql2) == TRUE) && ($con->query($sql3) == TRUE) && ($con->query($sql4) == TRUE)) {
	session_destroy();
	$files = glob($dir.'/*'); 
foreach($files as $file){
    if(is_file($file))
    unlink($file);
}
rmdir($dir);
	echo "<center><h1>Account Delete Success</h1></center><br>";
    echo "<center><img src='Image/del.gif' height='30%'></center>";
    header("refresh:5;url=../index.php");
} else {
    echo "Error delete ";
}
}
?>