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
  <a href="homepage"><i class="fa fa-home"></i> Home</a>
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
  <i class="fa fa-refresh fa-spin" style="font-size: 35px;color: #2A3F54;"></i><font size="6px">Backups Files/</font><br>
  <form method="post" action="">
    <center>
    <fieldset style="border:none;background-color: #dcdee2">
      <h1 style="color:white;background-color: green">BackUp Your Images/Files</h1>
        <input type="password" name="pin" placeholder="Enter Profile Password" title="Please Enter Your Profile Password" required style="margin-top: 5px;height:5%;border-radius:10px;outline: none;">
    <input type="submit" name="backups" value="Backups Now" style="margin-top: 5px;color:white;background-color: orange;margin-left: 5px;border-radius: 10px;height: 25px;outline: none;">
  </form>
  </fieldset>
  <?php
  if(isset($_POST['backups']) && isset($_POST['pin']))
  {
    require("conn.php");
    error_reporting(0);
  $user=$_SESSION['email'];
  $pin=base64_encode($_POST['pin']);
  $result2=mysqli_query($con,"select * from user_table where email='".$user."' and profile_pwd='".$pin."' ");
$row2=mysqli_fetch_array($result2);
if($row2[5]==$pin)
{
  $pathdir="Users/".$user."/";
$nameArchive="Users/".$user."/".$user.".zip";
$zip=new ZipArchive;
if($zip->open($nameArchive,ZipArchive::CREATE)===TRUE){
  $dir=opendir($pathdir);
  while($file=readdir($dir)){
    if(is_file($pathdir.$file)){
      $zip->addFile($pathdir.$file,$file);
    }
  }
  $zip->close();
  ?>
  <a href='Users/<?php echo $user;?>/<?php echo $user;?>.zip' download>
  <img src="image/download.gif" width="104" height="142">
</a>
<?php
}
}
else
{
 echo "<script>alert('Profile Password not match')</script>";
 echo "<script>location.href='backups'</script>"; 
}
}
  ?>
 </div></div>
<?php
}//header("location:homepage.php");
?>
</center>
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