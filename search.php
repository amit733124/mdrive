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
<title>Upload_Image</title>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
  margin: 4px;
  border: 1px solid #ccc;
  float: right;
  background-size: cover;
  
}
table {
  border-collapse: collapse;
  width: 80%;
  margin-left: 210px;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>
	<fieldset style="background-color: #EDEDED;height: 5%;border:none;">mDrive</fieldset>
  <div class="sidebar">
  <a class="active" href="#" style="font-family: Cooper Black;">
  <center><img src="image/user.png"  height="7%" width="auto"><br>Welcome <?php echo $_SESSION['email']?></a></center>  <hr>
  <a href="homepage.welcome"><i class="fa fa-home"></i> Home</a>
  <a class="active" href="upload_image"><i class="fa fa-image"></i> Upload Images</a>
  <a href="upload_file"><i class="fa fa-file"></i> Upload Files</a>
<!--<a href="media.php"><i class="fa fa-film"></i> Upload Media</a>-->
  <a href="change_pwd"><i class="fas fa-key"></i> Change Password</a>
  <a href="backups"><i class="fa fa-refresh fa-spin"></i> Backups</a>
  <a href="feed_test"><i class="fa fa-send"></i> Feedback</a>
  <a href="del_account"><i class="fa fa-trash"></i> Delete Account</a>
  <a href="logout" onclick="return confirm('Are you sure you want to logout?');"><i class="fa fa-power-off"></i> Logout</a>
</div>
<div class="content">
  <i class="fa fa-image" style="font-size: 40px;color: #2A3F54;">Search/</i><br>
 <form action="" method="POST" style="margin-left: 5px;margin-top: 5px">
Select Search:<input type="radio" name="select" value="img">Images<input type="radio" name="select" value="file">Files
<br>
Select Date: <input type="date" name="from" autocomplete="off" required style="padding-left: auto;margin-bottom: 5px"> <br>
<input type="submit" name="search" value="search" style='background-color: #4CAF50;color: white;padding: 8px 16px;text-align: center;text-decoration: none;display: inline-block;border-radius: 10px;font-size: 16px;'>
</div></center></form>
<?php
if(isset($_POST['search']))
{
	if(!isset($_POST['select']))
	{
     echo "<center><font color='red'>Please Select Option</font></center>";
	}
error_reporting(0);    
$from=$_POST['from'];
$select=$_POST['select'];
require_once "db.php";
if($select=='img')
{
$email=$_SESSION['email'];
$result=mysqli_query($db,"select * from form_table where email='".$email."' and date_time='".$from."'");
while($row=mysqli_fetch_array($result))
{ 
$kaboom = explode(".", $row['images']);
    ?>
    <center>
<!--<div class="gallery">
  <a target="" href="<?php echo $row['images']; ?>">-->
    <!--<img src="<?php echo $row['images']; ?>" width="280" height="250">-->
    <table>
      <tr>
        <th>Date</th>
        <th>File Name</th>
        <th>Size</th>
        <th>Type</th>
        <th>View</th>
        <th>Download</th>
        <th>Delete</th>
        <th>Share</th>
      </tr>
      <tr>
        <td><?php echo $row['date_time'];?></td>
        <td><?php echo $row['name'];?></td>
        <td><?php echo filesize($row['images']);?> bytes</td>
        <td><?php echo end($kaboom);?></td>
        <td><a href="<?php echo $row['images']; ?>"><img src="<?php echo $row['images']; ?>" width="30" height="25"></a></td>
        <td><a target="" href="<?php echo $row['images']; ?>"><i class="fa fa-download" style="color: green;margin-left: 15px"></i></a></td>
        <td><a href="del.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure to Delete ?');"><i class="fa fa-trash" name="submit" style="color: red;margin-left: 15px"></i></a></td>
        <td><a href="share?link=<?php echo $row['images']; ?>" onclick="return confirm('Are you sure to share?');" target='_blank' ><i class="fa fa-share" style="color: blue;margin-left: 15px"></i></a></td>
    </table>
    <?php
}
}
if($select=='file')
{
$email=$_SESSION['email'];
$result=mysqli_query($db,"select * from file where email='".$email."' and date_time='".$from."'");
while($row=mysqli_fetch_array($result))
{ 
$kaboom = explode(".", $row['file']);
    ?>
    <center>
<!--<div class="gallery">
  <a target="" href="<?php echo $row['images']; ?>">-->
    <!--<img src="<?php echo $row['images']; ?>" width="280" height="250">-->
    <table>
      <tr>
        <th>Date</th>
        <th>File Name</th>
        <th>Size</th>
        <th>Type</th>
        <th>Download</th>
        <th>Delete</th>
        <th>Share</th>
      </tr>
      <tr>
        <td><?php echo $row['date_time'];?></td>
        <td><?php echo $row['name'];?></td>
        <td><?php echo filesize($row['file']);?> bytes</td>
        <td><?php echo end($kaboom);?></td>
        <td><a target="" href="<?php echo $row['file']; ?>"><i class="fa fa-download" style="color: green;margin-left: 15px"></i></a></td>
        <td><a href="del_file.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?');"><i class="fa fa-trash" name="submit" style="color: red;margin-left: 15px"></i></a></td>
        <td><a href="share?link=<?php echo $row['file']; ?>" onclick="return confirm('Are you sure to share?');" target='_blank' ><i class="fa fa-share" style="color: blue;margin-left: 15px"></i></a></td>
    </table>
    <?php
}
}
}
}
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
</html>