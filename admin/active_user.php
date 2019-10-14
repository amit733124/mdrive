<?php
    session_start();
    require("conn.php");
$sql="select * from user_table";
$record=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($record))
{
    $loggedTime=time()-120; //2 minutes
if($row['status']>$loggedTime)
{
    echo "online";
}
else
{
    echo "Offline";
}
}
?>