<?php
    session_start();

    if (!isset($_SESSION['email'])) {
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
<title>Change Password</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body oncontextmenu="return false;" style="background-image: url(image/back3.jpg); ">
<center>
<form action="" method="POST">
<fieldset style="
background-color:#e5e5e5;height:auto;width:300px;border-radius: 10px">
<h1>Change Password</h1>
<hr>
<i class="fas fa-key" style="font-size: 23px;color: #0f0b38"></i><input type="password" placeholder="Enter Old Password"  name="old_pwd" autocomplete="off" style="font-size: 20px;outline: none;" ><br>
<i class="fas fa-key" style="font-size: 23px;color: #0f0b38"></i><input type="password" placeholder="Enter Password" name="pwd" id="pwd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" autocomplete="off" required style="margin-top: 10px;font-size: 20px;"><br>
<i class="fas fa-key" style="font-size: 23px;color: #0f0b38"></i><input type="text" placeholder="Enter Confirm Password" name="cpwd" id="cpwd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" autocomplete="off" required style="margin-top: 10px;font-size: 20px;"><br>
<input type="submit" name="s1" value="change" onclick="validatePassword()" style="margin-top: 5px;margin-left:10px;padding-left:20px;padding-right:20px;height:4%;color:white;background-color:green;border-radius:10px"><br>
<a href="homepage.welcome" style="text-decoration: none;color: white"><img src='image/back1.png' height="4%"></a></button>
</fieldset>
<script type="text/javascript">
    var password = document.getElementById("pwd")
  , confirm_password = document.getElementById("cpwd");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}
password.onchange = validatePassword();
confirm_password.onkeyup = validatePassword();
</script>
<?php
require 'mailer/PHPMailerAutoload.php';
if(isset($_POST['s1']))
{
require("conn.php");
$username=$_SESSION['email'];
$old_pwd=base64_encode($_POST['old_pwd']);
$cpwd=$_POST['cpwd'];
$pwd=base64_encode($_POST['pwd']);
$sql="select * from user_table where email='$username'";
$record=mysqli_query($con,$sql);
$row=mysqli_fetch_array($record);
if($row['password']==$old_pwd)
{
$rs=mysqli_query($con,"UPDATE user_table SET password='$pwd' WHERE password='$old_pwd' and email='$username' ");
if($rs)
{

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
        $mail->addAddress('mdrivestorage2019@gmail.com',"mDrive"); 
        $mail->Subject = "Password Change";
        $mail->Body = "<fieldset height='auto' width='auto' style='border-color:#cb42f4;border-radius:10px;border:3px solid #cb42f4;'><b><table border=0 style='background-color:black;width:100%'><font color='orange' size='10px'><center>mDrive</b></font></table></center><br><font color='green' size='5px'><center><b>Password Change Success</b></center></font></fieldset>";
        //$mail->addAttachment('C:\Users\Bappa\Downloads\zenit_retro_camera_photos_map_107245_1600x1200.jpg');

        $mail->AddAddress($row['email2']);

        if(!$mail->Send()) {
            //echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            //echo "Message has been sent";
        }
echo "<script>alert('Password Change Success')</script>";
echo "<script>location.href='homepage'</script>";
}
}
else
{
  echo "<script>alert('Old Password not match')</script>";
  echo "<script>location.href='change_pwd'</script>";
}
}
}
?>
</form>
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