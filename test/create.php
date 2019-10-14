<!DOCTYPE html>
<html>
<head>
	<title>file</title>
</head>
<body>
	<form action="" method="post">
<input type="text" name="folder_name" id="folder_name" class="form-control" />
 <input type="submit" name="create" value="create"><br>
 <input type="text" name="folder_name1" id="folder_name1" class="form-control" />
  <input type="submit" name="Delete" value="Delete">
</form>
<?php
if(isset($_POST['create']))
{
// change the name below for the folder you want
$dir =$_POST['folder_name'];
$file_to_write = 'index.php';
$content_to_write = "<h1>No Access File</h1>";

if( is_dir($dir) === false )
{
    mkdir($dir);
}

$file = fopen($dir . '/' . $file_to_write,"w");
// a different way to write content into
 //fwrite($file,"Hello World.");

fwrite($file, $content_to_write);
unlink($dir);
// closes the file
fclose($file);
// this will show the created file from the created folder on screen
//include $dir . '/' . $file_to_write;
//echo basename(__DIR__);
$dirs = array_filter(glob('*'), 'is_dir');
print_r( $dirs);
}
?>
<?php
if(isset($_POST['Delete']))
{
// change the name below for the folder you want
$dir =$_POST['folder_name1'];
$files = glob($dir.'/*'); //get all file names
foreach($files as $file){
    if(is_file($file))
    unlink($file); //delete file

}
rmdir($dir);
}
?>
</body>
</html>