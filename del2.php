<?php
    session_start();
require("conn.php");
require_once "db.php";
$email=$_SESSION['email'];
$sql=("DELETE FROM `form_table` WHERE email='$email'");
if ($con->query($sql) == TRUE)  {
    echo "Record deleted successfully";
    header("location:upload_image.php");
} else {
    echo "Error deleting record: ";
}
?>