<?php
    session_start();

    if (!isset($_SESSION['username'])) {
        echo "<script>alert('Please Login again')</script>";
        echo "<a href='index'>Click Here to Login</a>";
    }
        else { 
          $now = time();
 
    if($now > $_SESSION['expire'])
 
    {
 
        session_destroy();
 
    }
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
  background-image: url(image/add.jpg);
  margin: 0;
  font-family: "Lato", sans-serif;
  background-repeat:no-repeat;
  background-size: cover; 
}

.sidebar {
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #FFFFFF;
  position: fixed;
  height: 100%;
  overflow: auto;
  top: 0;
  color: white;
}

.sidebar a {
  display: block;
  color: black;
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
</style>
</head>
<body>
	<fieldset style="background-color: #EDEDED;height: 5%;border:none;position: fixed;"></fieldset>
  <div class="sidebar">
  <a class="active" href="#" style="font-family: Cooper Black;">
  <center><img src="image/user.png"  height="7%" width="auto"><br>Welcome <?php echo $_SESSION['username']?></a></center>
  <hr>
  <a href="homepage"><i class="fa fa-home"></i> Home</a>
  <a href="#" id="myBtn"><i class="fa fa-user"></i> Admin Profile</a>
  <a href="add_admin" name="add"><i class="fa fa-user-plus" name="add"></i> Add Admin</a>
  <a href="view_user"><i class="fas fa-eye"></i> View Users</a>
  <a href="active_user2"><i class="fas fa-users"></i> Active Users</a>
  <a href="activity"><i class="fa fa-history"></i> Activity</a>
  <a href="change_pwd"><i class="fas fa-key"></i> Change Password</a>
  <a href="feedback"><i class="fa fa-send"></i> Feedback List</a>
  <a href="logout"><i class="fa fa-power-off"></i> Logout</a>
</div>

<div class="content">
<a href="logout" class="button1" style="font-size:20px;margin-left: 1040px;color:red;position: fixed;text-decoration: none;"><i class="fa fa-sign-out"></i>Logout</a>
<div class="content">
  <i class="fa fa-eye" style="font-size: 40px;color: #2A3F54;margin-bottom: 10px;margin-left: 0px">Active Users/</i><br>
<?php
require("conn.php");
$sql="select * from tbl2 where status='Online' ";
$record=mysqli_query($con,$sql);
echo "<table style='border:1px solid #ddd;background-color:#F1F1F1'>";
echo "<tr style='background-color:green;color:white'><th>Username</th><th>Status</th><th>Login_Time_Date</th></tr>";
while($row=mysqli_fetch_array($record))
{
echo "<tr>";
echo "<td>".$row[1]."</td>";
echo "<td style='color:red;font-family:bold'>".$row[2]."</td>";
echo "<td>".$row[3]."</td>";
echo "</tr>";
}
echo "</table>";
?>
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
$email=$_SESSION['username'];
$result=mysqli_query($db,"select * from admin_table where username='".$email."' ");
while($row=mysqli_fetch_array($result))
{
  echo "<table border='0'>";
  echo "<tr>";
 echo "<td>Name: ".$row[0]."</tr>";
 echo "<tr>";
 echo "<td>Username: ".$row[1]."</tr>";
}
?>
    </div>
    <div class="modal-footer">
      <h3>User Profile</h3>
    </div>
  </div>
<?php
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
