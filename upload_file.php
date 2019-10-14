<?php
    session_start();

    if (!isset($_SESSION['email'])) {
        echo "<script>alert('Please Login again')</script>";
        echo "<script>location.href='index'</script>";
    }
        else { 
        $now = time();
 
    if($now > $_SESSION['expire'])
 
    {
      require("conn.php");
   $pwd="Offline"; 
   $username=$_SESSION['email'];
    $rs=mysqli_query($con,"UPDATE tbl2 SET status='$pwd' WHERE username1='$username'");
        session_destroy();
 
    }
?>
<?php    
error_reporting(0);    
require_once "db.php";
$email=$_SESSION['email'];
$b=0;
$result2=mysqli_query($db,"select * from user_table where email='".$email."' ");
$row2=mysqli_fetch_array($result2);
$limit=$row2['limitt'];
$result=mysqli_query($db,"select * from form_table where email='".$email."' ORDER BY id DESC ");
while($row=mysqli_fetch_array($result))
{ 
//$b++;
$b=$b+$file=filesize($row['images']);
$c=$b/1024;
$d=$c/1024;
if($d>=$limit)
{
  ?>
  <script>alert('Please Update Your Account');</script>
  <script>location.href='https://test.instamojo.com/@mDrive/l85076a5750e745f5b51345b0416fe5ba/';</script>";
  <?php
}
  }
  //echo "<h3 style='margin-left:710px;color:#0e2575'>Total Uploads:".$b."</h3>";
    ?> 
<html>
<title>Upload File</title>
<head>
  <link rel="icon" href="images/cpanel.png" sizes="26x26">
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0"></head>
<body oncontextmenu="return false;">
<style>
body {
  margin: 0;
  font-family: "Lato", sans-serif;
}

.sidebar {
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #2A3F54;
  position: fixed;
  height: 100%;
  overflow: auto;
  top: 0;
  color: white;

}

.sidebar a {
  display: block;
  color: white;
  padding: 16px;
  text-decoration: none;
}
 
.sidebar a.active {
  background-color: #2A3F54;
  color: white;
}

.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}

div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: auto;
}

@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}
.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 55px 62px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  margin-top: 60px;
  position: fixed;
}
div.gallery {
  margin: 5px;
  border: 1px solid #ccc;
  float: right;
  margin-left: 120px;
  background-size: cover;
}
@media only screen and (max-width: 500px) {

    .card
    {
       display:inline-block;
  transition:2s ease;
  margin-left: 0px;
  width: 90%;
    }
  }

</style>
</head>
<body>
	<fieldset style="background-color: #EDEDED;height: 5%;border:none;">mDrive</fieldset>
  <div class="sidebar">
 <a class="active" href="#" style="font-family: Cooper Black;">
  <center><img src="image/user.png"  height="7%" width="auto"><br>Welcome <?php echo $_SESSION['email']?></a></center>
  <hr>
  <a href="homepage.welcome"><i class="fa fa-home"></i> Home</a>
  <a href="upload_image"><i class="fa fa-image"></i> Upload Images</a>
  <a href="upload_file"><i class="fa fa-file"></i> Upload Files</a>
  <!--<a href="media.php"><i class="fa fa-film"></i> Upload Media</a>-->
  <a href="change_pwd"><i class="fas fa-key"></i> Change Password</a>
  <a href="backups"><i class="fa fa-refresh fa-spin"></i> Backups</a>
  <a href="feed_test"><i class="fa fa-send"></i> Feedback</a>
  <a href="del_account"><i class="fa fa-trash"></i> Delete Account</a>
  <a href="logout" onclick="return confirm('Are you sure you want to logout?');"><i class="fa fa-power-off"></i> Logout</a>
</div>
<div class="card">
<div class="content">
  <i class="fa fa-file" style="font-size: 40px;color: #2A3F54;">Upload Files/</i><br>
 <form action="query2.php" method="POST" enctype="multipart/form-data" style="margin-left:5px;margin-top: 5px">
<br>Name: <input type="text" name="name" autocomplete="off" required style="padding-left: auto;"> <br>
 Select file:<input type="file" name="fileToUpload" id="fileToUpload" style="margin-top: 5px;margin-bottom: 5px"> <br>
<button type="submit" style='background-color: #4CAF50;color: white;padding: 8px 16px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;border-radius: 10px;'><i class="fa fa-cloud-upload"></i>Upload</button> 
<a href="del_file_all.php?email=<?php echo $_SESSION['email']; ?>" onclick="return confirm('Are you sure to all Delete ?');"><i class="fa fa-trash" name="submit" style="color: red;margin-left: 920px">Delete All</i></a></div></center>
</form></div></div>
            </html>
<?php
        
require_once "db.php";
$email=$_SESSION['email'];
$result=mysqli_query($db,"select * from file where email='".$email."' ");
while($row=mysqli_fetch_array($result))
{ 
    ?>


<div class="gallery">
  <a target="" href="<?php echo $row['file']; ?>">
  <img src="image/file.jpg" alt="Cinque Terre" width="108" height="105">
  </a>
 <center><div class="desc"><?php echo $row['name'];?>
  <a href="share?link=<?php echo $row['file']; ?>" onclick="return confirm('Are you sure to share?');" target='_blank' ><img src="image/test.svg" height="3%"></a>
 <a href="del_file.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?');"><i class="fa fa-trash" name="submit" style="color: red;margin-left: 15px"></i></a>
 </div></center>
</div>
<?php
}
}//header("location:homepage.php");
?>
<script type="text/javascript">
  document.onkeydown = function(e) {
if(event.keyCode == 123) {
return false;
}
if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
return false;
}
}
</script>
</body>
</html>
