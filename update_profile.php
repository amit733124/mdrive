<?php
    session_start();

    if (!isset($_SESSION['email'])) {
        echo "<script>alert('Please Login again')</script>";
        echo "<script>location.href='index.php'</script>";
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
<title>Update Profile</title>
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
  <?php
  require("conn.php");
  $user=$_SESSION['email'];
  $sql="select * from user_table where email='$user'";
  $record=mysqli_query($con,$sql);
  $row=mysqli_fetch_array($record);
  ?>
  <a href="Users/del_account.php?email=<?php echo $_SESSION['email']; ?>&&email2=<?php echo base64_encode($row['email2']); ?>" onclick="return confirm('Are you sure to Delete Account ?');"><i class="fa fa-trash"></i> Delete Account</a>
  <a href="logout.php" onclick="return confirm('Are you sure you want to logout?');"><i class="fa fa-power-off"></i> Logout</a>
</div>
<div class="card">
<div class="content">
  <i class="fa fa-pencil" style="font-size: 40px;color: #2A3F54;">Update Profile/</i><br>
   <?php
      error_reporting(0);
    //session_start();
 require("db.php");
$email=$_SESSION['email'];
$result=mysqli_query($db,"select * from user_table where email='".$email."' ");
while($row=mysqli_fetch_array($result))
{
 $name=$row[0];
 $pin=$row[8];
 $email=$row[8];
 $mob=$row[9];
 $ques=$row[10];
 $ans=$row[11];
 $day=$row[15];
 $month=$row[16];
 $year=$row[17];
}
?>
<fieldset style="height: auto;width:20%;margin-left: 320px;border-radius: 10px">
  <center>
    <form method="post" action="">
    <table>
<tr>
<th> <input type="text" name="name" placeholder="Enter Name" pattern="[A-Za-z].{4,}" value="<?php echo $name;?>" style="margin-bottom: 10px"></tr>
  <tr><th><input type="email" name="mail" placeholder="Enter Email"  value="<?php echo $email;?>" style="margin-bottom: 10px"></tr>
<tr><th><input type="text" name="mob" placeholder="Enter Mob" maxlength="10" pattern="[0-9]{10}" value="<?php echo $mob;?>" style="margin-bottom: 10px"></tr>
<tr><th><select name="ques">
  <option><?php echo $ques;?></option>
   <option>What is your pet name?</option>
  <option>What is your nike name?</option>
  <option>Who is your best friend?</option>
  <option>Who is your fev singer?</option>
</select>
</tr>
<tr><th><input type="text" name="ans" placeholder="Enter Answer" value="<?php echo $ans;?>" style="margin-bottom: 10px"></tr>
  <tr><th>DOB:<input type="number" name="day" placeholder="DD" value="<?php echo $day;?>" style="margin-bottom: 10px;width:40px">&nbsp<input type="number" name="month" placeholder="MM" value="<?php echo $month;?>" style="margin-bottom: 10px;width:40px">&nbsp<input type="text" name="year" placeholder="YYYY" value="<?php echo $year;?>" style="margin-bottom: 10px;width:50px"></th></tr>
  <tr><th><input type="password" name="pin" placeholder="Enter Profile Password" title="Please Enter Your Profile Password" required style="margin-bottom: 10px;"></tr>
  <tr><th><input type="submit" name="update"  onclick="ValidateEmail(document.form1.mail)" value="Update">&nbsp<input type="reset" name="reset" value="Reset"></th></tr>
</table>
 </div></div>
</form>
</center>
 <script type="text/javascript">
function ValidateEmail(inputText)
{
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(inputText.value.match(mailformat))
{
document.form1.mail.focus();
return true;
}
else
{
alert("You have entered an invalid email address!");
document.form1.mail.focus();
return false;
}
}
</script>

<?php
require 'mailer/PHPMailerAutoload.php';
if(isset($_POST['update']) && isset($_POST['pin']))
{
error_reporting(0);
require("conn.php");
$username=$_SESSION['email'];
$pin=base64_encode($_POST['pin']);
$result2=mysqli_query($con,"select * from user_table where email='".$username."' and profile_pwd='".$pin."' ");
while($row2=mysqli_fetch_array($result2))
{
 $dpin=$row2[5];
}
if($dpin==$pin)
{
$username=$_SESSION['email'];
$name=strip_tags($_POST['name']);
$email=strip_tags($_POST['mail']);
$mob=strip_tags($_POST['mob']);
$ques=strip_tags($_POST['ques']);
$ans=strip_tags($_POST['ans']);
$day=strip_tags($_POST['day']);
$month=strip_tags($_POST['month']);
$year=strip_tags($_POST['year']);
$rs=mysqli_query($con,"UPDATE user_table SET name='$name',email2='$email',mob_no='$mob',ques='$ques',ans='$ans',day='$day',month='$month',year='$year' WHERE email='$username' ");
if($rs)
{
date_default_timezone_set('Asia/Kolkata');
$mail = new PHPMailer(); // create a new object
        $mail->IsSMTP(); // enable SMTP
        $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPAuth = true; // authentication enabled
        $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 587;  //465; // or 587
        $mail->IsHTML(true);
        $mail->Username = "mdrivestorage2019@gmail.com";
        $mail->Password = "Amit@123";
        $mail->SetFrom("mdrivestorage2019@gmail.com","mDrive");
        //$mail->addAddress('mdrivestorage2019@gmail.com',"mDrive"); 
        $mail->Subject = "Update Profile";
        $mail->Body = "<fieldset height='auto' width='auto' style='border-color:#cb42f4;border-radius:10px;border:3px solid #cb42f4;'><b><table border=0 style='background-color:black;width:100%'><font color='orange' size='10px'><center>mDrive</b></font><br><h4><center><font color='green'>Profile Update Success</font></center></h4><hr><br><fieldset height='auto' width='auto'><h2><u>Update Profile Details</u></h2><b>Update Date: </b>". date("Y/m/d") ."<br><b>Name: </b>".$_POST['name']."<br><b>Username: </b>".$_SESSION['email']."<br><b>Email: </b>".$_POST['mail']."<br><b>Mobile_No: </b>".$_POST['mob']."<br><b>Question: </b>".$_POST['ques']."<br><b>Answer: </b>".$_POST['ans']."<br></center></fieldset></fieldset>";
        //$mail->addAttachment('C:\Users\Bappa\Downloads\zenit_retro_camera_photos_map_107245_1600x1200.jpg');


        $mail->AddAddress($_POST['mail']);

        if(!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            //echo "Message has been sent";
        }
        //

echo "<script>alert('Profile Update Success')</script>";
echo "<script>location.href='homepage'</script>";
}
}
else
{
  echo "<script>alert('Profile Not Update / password Incorrect')</script>";
  echo "<script>location.href='update_profile'</script>";
}
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
