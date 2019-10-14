<!DOCTYPE html>
<html>
<head>
	<title>file</title>
</head>
<body>
	<form action="" method="post">
<input type="text" name="folder_name" id="folder_name" class="form-control" />
 <input type="submit" name="create" value="create">
</form>
<?php
if(isset($_POST['create']))
{
// change the name below for the folder you want
$dir =$_POST['folder_name'];

$file_to_write = 'test.txt';
$content_to_write = "The content";

if( is_dir($dir) === false )
{
    mkdir($dir);
}

$file = fopen($dir . '/' . $file_to_write,"w");

// a different way to write content into
// fwrite($file,"Hello World.");

fwrite($file, $content_to_write);

// closes the file
fclose($file);

// this will show the created file from the created folder on screen
include $dir . '/' . $file_to_write;
//echo basename(__DIR__);
$dirs = array_filter(glob('*'), 'is_dir');
print_r( $dirs);
}
?>
</body>
</html>