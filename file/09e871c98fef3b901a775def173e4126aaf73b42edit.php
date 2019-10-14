<html>
<body>
<?php
require("sqlconnection.php");
$id=$_GET['id'];
$sql="select * from emp_details where id='".$id."'";
$rs=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($rs))
{
?>
<form action="" method="post">
Name:<input type="text" value="<?=$row['name'] ?>" name="name"><br>
Roll:<input type="text" value="<?=$row['roll']?>" name="roll"><br>
Department:<input type="text" value="<?=$row['department']?>" name="department"><br>
<input type="submit" value="Update" name="update">
</form>
<?php
}
?>
<?php
if(isset($_POST['update']))
{
 $name=$_POST['name'];
$roll=$_POST['roll'];
$department=$_POST['department'];
$sql="update emp_details set name='".$name."', roll='".$roll."', department='".$department."' where id='".$id."'";
$rs=mysqli_query($con,$sql);
$rs2=mysqli_query($con,"select * from emp_details");
?>
<table border="2">
<?php
while($row=mysqli_fetch_array($rs2))
{
 ?>
<tr>
<td><?=$row['id'] ?></td>
<td><?=$row['name'] ?></td>
<td><?=$row['roll'] ?></td>
<td><?=$row['department'] ?></td>
</tr>
<?php
}
}
?>

</table>
</body>
</html>