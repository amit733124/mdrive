<?php
require("conn.php");
$sql="select * from feedback";
$record=mysqli_query($con,$sql);
echo "<table border='1'>";
echo "<tr><th>Name</th><th>Email</th><th>Rate</th><th>Comments</th><th>User</th></tr>";
while($row=mysqli_fetch_array($record))
{
echo "<tr>";
echo "<td>".$row[1]." ".$row[2]."</td>";
echo "<td>".$row[3]."</td>";
echo "<td>".$row[4]."</td>";
echo "<td>".$row[5]."</td>";
echo "<td>".$row[6]."</td>";
echo "</tr>";
}
echo "</table>";
?>