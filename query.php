<?php
error_reporting(0);
include 'db.php';
$name=$_POST['name'];
$email=$_SESSION['email'];
$id=$_POST['id'];
require("conn.php");
$target_dir = "Users/".$email."/";
$b=basename($_FILES["fileToUpload"]["name"]);
$target_file = $target_dir.sha1("Images_Drive").base64_encode("mDrive").$b;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
if ($_FILES["fileToUpload"]["size"] > 500000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
ini_set('upload_max_filesize', '10M');
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed')</script>";
    $uploadOk = 0;
}
if ($uploadOk == 0) {
    //echo " Sorry, your file was not uploaded.";
   // echo "<a href='upload_image.php' style='background-color: #4CAF50;color: white;padding: 8px 16px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;'>Go Back</a>";
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        //echo "<h3>The image ". basename( $_FILES["fileToUpload"]["name"]). " has uploaded and The account has been created succesfully.</h2>";
       // session_start();
        $email=$_SESSION['email'];
        $file=$target_file;
        $sql="INSERT INTO form_table(name,images,email,password,date_time)VALUES('$name','$file','$email','$id',NOW())";
        $rs=mysqli_query($db,$sql);
        if($rs)
        {
        //echo "<br><img src='image/upload2.gif' height='15%'>";
        header("Refresh:0; url=upload_image");
        //header("location:upload_image.php");
    }
    else
    {
        echo "Caption ".$name." already Present<br>";
        echo "<script>alert('Please Provide another name')</scrpt>";
    }
    } else {
        echo "<script>alert('Sorry, there was an error uploading your file')</script>";
    }
}
//echo "<h3>Click Here To <a href='upload_image.php' style='background-color: #4CAF50;color: white;padding: 8px 16px;text-align: center;text-decoration: none;display: inline-block;font-size: 20px;'>Go Back</a></h3>";
?>