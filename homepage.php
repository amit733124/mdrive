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
    require("conn.php");
    $setLogged=mysqli_query($con,"UPDATE user_table SET status='".time()."'WHERE user_id='".$_SESSION["email"]."'");

?>
<html>
<title>Homepage</title>
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
  --/background-image: linear-gradient(#05ffdd,green,#4c0459);
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
  height: 1000px;
  position:fixed;
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
  border-radius: 10px;
}
.modal {
  display: none; 
  position: fixed;
  z-index: 1; 
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 30%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}
@media only screen and (max-width: 500px) {


    .card
    {
       display:none;
  transition:2s ease;
  margin-left: 0px;
  width:0px;
    }
    .card2{
        display:inline-block;
         margin-left: 40px;
         
    }
  }
  @media only screen and (min-width: 600px) {
    .card2{
        display:none;
         margin-left: 0px;
         
    }
  }
</style>
</head>
<body>
  <?php
      error_reporting(0);
    //session_start();
 require("db.php");
$email=$_SESSION['email'];
$result=mysqli_query($db,"select * from user_table where email='".$email."' ");
$row=mysqli_fetch_array($result);
{
  if($row['day']==date("d") && $row['month']==date("m"))
{
    ?>
    <marquee><img src="image/ba.gif" height="10%"><b><font color='green'>HAPPY BIRTHDAY </font><i><font color='#00052d'> <?php echo $row['name']?><img src="image/ba.gif" height="10%"></font></marquee>
    <!--<img src="image/birthday2.jpg" height='10%' width='20%' style="margin-left: 510px">-->
    <?php
}
?>
  <div class="sidebar">
  <a class="active" href="#" style="font-family: Cooper Black;">
  <center><img src="image/user.png"  height="7%" width="auto"><br>Welcome <?php echo $_SESSION['email']?></a></center>
  <hr>
  <a href="homepage.welcome"><i class="fa fa-home"></i> Home</a>
  <a href="upload_image"><i class="fa fa-image"></i> Upload Images</a>
  <a href="upload_file"><i class="fas fa-file"></i> Upload Files</a>
  <a href="change_pwd"><i class="fas fa-key"></i> Change Password</a>
  <a href="backups"><i class="fa fa-refresh fa-spin"></i> Backups</a>
  <a href="feed_test"><i class="fa fa-send"></i> Feedback</a>
  <a href="del_account"><i class="fa fa-trash"></i> Delete Account</a>
 <a href="logout" onclick="return confirm('Are you sure you want to logout?');"><i class="fa fa-power-off"></i> Logout</a>
</div>
<div class="card2">
<marquee><h1>Welcome <font color="red"><?php echo $_SESSION['email']?></font></h1></marquee><br>
<?php
      error_reporting(0);
    //session_start();
 require_once("db.php");
$email=$_SESSION['email'];
$result=mysqli_query($db,"select * from user_table where email='".$email."' ");
while($row=mysqli_fetch_array($result))
{
    ?>
<h3>Your Login IP: <?php echo $row['session']?></h3>
<?php
$limit=$row['limitt'];
}
?>
</div>
<div class="card">
<div class="content">
  <i class="fa fa-dashboard" style="font-size: 40px;color: #2A3F54;position: fixed;">Dashboard/</i><br>
<a href="upload_image" class="button" style="box-shadow: 0px 8px 15px rgba(0,0,0,0.8);background-image: linear-gradient(#d942f4,#4c0459);"><i class="fa fa-image"></i> Images</a>
<a href="upload_file" class="button" style="margin-left: 220px;background-image: linear-gradient(#05ffdd,blue);border-radius: 10px;padding-left: 80px;position: fixed;box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.8);"><i class="fa fa-file"></i> Files</a>
<a href="#" class="button" id="myBtn" style="margin-left: 430px;background-image: linear-gradient(#ffb563,#7a4306);box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.8);"><i id="myBtn" class="fas fa-user"></i> Profile&nbsp&nbsp&nbsp</a>
<a href="search" class="button" style="margin-left: 645px;background-image: linear-gradient(#d5ff59,#014400);padding-left:50px;box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.8);"><i class="fa fa-search"></i> Search&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a>
<?php    
error_reporting(0);    
require_once "db.php";
$email=$_SESSION['email'];
$b=0;
$result=mysqli_query($db,"select * from form_table where email='".$email."' ORDER BY id DESC ");
while($row=mysqli_fetch_array($result))
{ 
//$b++;

$b=$b+$file=filesize($row['images']);
$c=$b/1024;
$d=$c/1024;
  }

  //echo "<h3 style='margin-left:710px;color:#0e2575'>Total Uploads:".$b."</h3>";
    ?>       
<a href="#" class="button" style="margin-left: 870px;background-image: linear-gradient(#ffc4c5, #3d1d1d);padding-left: 10px;box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.8);"><i class="fa fa-server"></i> Total Used: <?php echo round($d)."MB/". $limit."GB";?></a>
<img src="image/welcome.png" style="position: fixed; margin-top: 300px;margin-left: 230px">
<a href="logout" class="button1" onclick="return confirm('Are you sure you want to logout?');" style="font-size:20px;margin-left: 1040px;color:red;position: fixed;text-decoration: none;"><i class="fa fa-sign-out"></i>Logout</a>
</div></div>

<div id="myModal" class="modal">
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <img src="image/user.png" height="20%" width="20%"><br>
    </div>
    <div class="modal-body">
      <?php
      error_reporting(0);
    //session_start();
 require("db.php");
$email=$_SESSION['email'];
$result=mysqli_query($db,"select * from user_table where email='".$email."' ");
while($row=mysqli_fetch_array($result))
{

  echo "<table border='0'>";
  echo "<tr>";
 echo "<td>Name: ".$row[0]."</tr>";
 echo "<tr>";
 echo "<td>Username: ".$row[1]."</tr>";
 echo "<tr>";
 echo "<td>Email: ".$row[8]."</tr>";
 echo "<tr>";
 echo "<td>Mobile No: ".$row[9]."</tr>";
 echo "<tr>";
 echo "<td>Security Question: ".$row[10]."</tr>";
 echo "<tr>";
 echo "<td>Answer: ".$row[11]."</tr>";
 echo "<tr>";
 echo "<td>Register Date: ".$row[13]."</tr>";
 echo "<tr>";
 echo "<td>Update Date: ".$row[14]."</tr>";
 echo "<tr>";
?>
 <td><hr><a href="update_profile?id=<?php echo $_SESSION['email'] ?>" onclick="return confirm('Are you sure to Update ?');"><i class="fa fa-pencil"> Edit</a></i>&nbsp&nbsp&nbsp&nbsp<a href="show_profile_password" onclick="return confirm('Are you sure to show ?');"><i class="fa fa-eye"> Show Password</a></i>&nbsp&nbsp&nbsp&nbsp<a href="change_profile_pwd" onclick="return confirm('Are you sure to change ?');"><i class="fas fa-key"> Password Change</a></i></td>
  <?php
  echo "</tr>";

}
?>
    </div>
    <div class="modal-footer">
      <h3>User Profile</h3>
    </div>
  </div>
<?php
}
}
?>
</div>
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
<script>
// Get the modal
var modal = document.getElementById('myModal');
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0]; 
btn.onclick = function() {
  modal.style.display = "block";
}
span.onclick = function() {
  modal.style.display = "none";
}
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

</script>
</body>
</html>
