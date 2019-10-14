<?php
include 'db.php';
//$name=$_POST['name'];
//$id=$_POST['id'];
$target_dir = "media/";
$target_file = $target_dir .sha1("Images"). basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if(isset($_POST["submit"])) {
    $check = getmediasize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

if ($_FILES["fileToUpload"]["size"] > 5000000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
ini_set('upload_max_filesize', '10M');
if($imageFileType != "mp4" && $imageFileType != "3gp" && $imageFileType != "ogg"
&& $imageFileType != "wmv" && $imageFileType != "AVI" && $imageFileType != "flv" && $imageFileType != "wav" && $imageFileType != "rtf" && $imageFileType != "py" && $imageFileType != "sql") {
    echo "Sorry, only mp4, 3gp, wmv , avi , flv files are allowed.";
    $uploadOk = 0;
}
if ($uploadOk == 0) {
    echo " Sorry, your file was not uploaded.";
    echo "<a href='upload_file.php' style='background-color: #4CAF50;color: white;padding: 8px 16px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;'>Go Back</a>";
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "<h3>The image ". basename( $_FILES["fileToUpload"]["name"]). " has uploaded and The account has been created succesfully.</h2>";
        session_start();
        $email=$_SESSION['email'];
        $sql="INSERT INTO media(name,media,email)VALUES('$name','$target_file','$email')";
        $rs=mysqli_query($db,$sql);
        header("location:upload_file.php");
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
echo "<h3>Click Here To <a href='upload_file.php' style='background-color: #4CAF50;color: white;padding: 8px 16px;text-align: center;text-decoration: none;display: inline-block;font-size: 20px;'>Go Back</a></h3>";
?>