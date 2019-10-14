<?php
    session_start();
require("conn.php");
require_once "db.php";
$sql=("DELETE FROM `tbl2` WHERE id='$_GET[id]' ");
if ($con->query($sql) == TRUE)  {
    echo "Record deleted successfully";
    header("location:activity");
} else {
    echo "Error deleting record: ";
}
?>