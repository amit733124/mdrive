<?php
error_reporting(0);
include 'db.php';
require("conn.php");
$sql="select * from user_table ";
$record=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($record))
{
$target_dir = $row[1]."/";
}
echo $target_dir;
?>