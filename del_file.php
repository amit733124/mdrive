<?php
    session_start();
require("conn.php");
require_once "db.php";
$email=$_SESSION['email'];
$sql=("DELETE FROM file WHERE email='$email' AND id='$_GET[id]' ");
if ($con->query($sql) == TRUE)  {
    echo "Record deleted successfully";
    header("location:upload_file.php");
} else {
    echo "Error deleting record: ";
}
?>