<?php
    session_start();
require("conn.php");
require_once "db.php";
$email=$_SESSION['email'];
$sql=("DELETE FROM `form_table` WHERE email='$email' AND id='$_GET[id]' ");
if ($con->query($sql) == TRUE)  {
    //echo "<script>alert('Record deleted successfully')</script>";
    echo "<script>location.href='upload_image'</script>";
    //header("location:upload_image.php");
} else {
    echo "Error deleting record: ";
}
?>