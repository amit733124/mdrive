<!DOCTYPE html>
<html>
<head>
	<title>file</title>
</head>
<body>
	<form action="" method="post">
<input type="text" name="folder_name" id="folder_name" class="form-control" />
 <button type="button" name="create" value="create" >Create</button>
</form>
<?php
if(isset($_POST["create"]))
 {
  if(!file_exists($_POST["folder_name"])) 
  {
   mkdir($_POST["folder_name"], 0777, true);
   echo 'Folder Created';
  }
  else
  {
   echo 'Folder Already Created';
  }
 }
 echo basename(__DIR__);
$file = fopen("test.txt","w");
echo fwrite($file,"Hello World. Testing!");
fclose($file);

?>
</body>
</html>