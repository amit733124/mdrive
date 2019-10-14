<?php
    session_start();
require("conn.php");
require_once "db.php";
$sql=("DELETE FROM `user_table` WHERE email='$_GET[email]' ");
if ($con->query($sql) == TRUE)  {
    echo "Record deleted successfully";
    header("location:view_user.php");
} else {
    echo "Error deleting record: ";
}
?>