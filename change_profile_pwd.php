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
<title>Change Profile Password</title>
<head>
    <link rel="icon" href="images/cpanel.png" sizes="26x26">
 <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></head>
<body oncontextmenu="return false;" style="background-image: url(image/test.jpg); ">
<center>
<form action="" method="POST">
<fieldset style="
background-color:#e5e5e5;height:auto;width:300px;border-radius: 10px">
<h2>Enter Your Register Email</h2>
<h4>Change Profile Password</h4>
<hr>
<i class="fa fa-envelope" style="font-size: 18px;color: #0f0b38"></i> <input type="email" placeholder="xyz@gmail.com" name="mail" required style="width: auto;margin-top: 5px;outline: none;"><br>
<i class="fas fa-key" style="font-size: 18px;color: #0f0b38"></i> <input type="password" placeholder="Enter Your Profile Password" name="password" required style="width: auto;margin-top: 8px;outline: none;"><br>
<input type="submit" name="send" value="Send" onclick="ValidateEmail(document.form1.mail)" style="margin-top: 5px;margin-left:30px;color:white;background-color:green;border-radius:10px">
<button type="submit" style="margin-top: 5px;margin-left:30px;color:white;background-color:orange;border-radius:10px"><a href="homepage" style="text-decoration: none;color: white">Back</a></button>
</fieldset>
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
if(isset($_POST['send']))
{
require("conn.php");
$mail=$_POST['mail'];
$password=base64_encode($_POST['password']);
$email=$_SESSION['email'];
//$key=md5(time().$email);
$result=mysqli_query($con,"select * from user_table where email='".$email."' ");
while($row=mysqli_fetch_array($result))
{
if($row['email2']==$mail && $row['profile_pwd']==$password)
{
$rs=mysqli_query($con,"UPDATE user_table SET verify2=0 WHERE email='$email' AND NOW()<=DATE_ADD(update_time,INTERVAL 10 MINUTE)");
$count=mysqli_num_rows($rs);
if(!empty($count))
{
   $rs=mysqli_query($con,"UPDATE user_table SET verify2=1 WHERE email='$email'"); 
}
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
        $mail->Subject = "Change Profile Password";
        $mail->Body = "<fieldset height='auto' width='auto' style='border-color:#cb42f4;border-radius:10px;border:3px solid #cb42f4;'><b><table border=0 style='background-color:black;width:100%'><font color='orange' size='10px'><center>mDrive</b></font></table></center><br><b>Username:</b> ".$row['email']." <br>New Password Link: </b>http://localhost/mDrive/user/verify_profile.php?key=".$row['con2']."<hr><br><font color='red'><center>Link validity 10 minute</center></font></fieldset>";
        //$mail->addAttachment('C:\Users\Bappa\Downloads\zenit_retro_camera_photos_map_107245_1600x1200.jpg');

        $mail->AddAddress($row['email2']);

        if(!$mail->Send()) {
            //echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            //echo "Message has been sent";
        }

    //$_SESSION['email']=$user;
    //echo "<br><font color=green>Username: ".$user."</font><br>";
    //echo "<font color=green>Password: ".$row['password']."</font><br>";
        //echo "<br><br><font color='red' size='8px'>Password send in your register email address</font><br>";
        echo "<script>alert('Link sent in your register email address')</script>";
        echo "<script>location.href='homepage'</script>";
    //echo "<a href=index.php style='text-decoration: none;font-size:30px'>Go to Login Page</a><i class='fa fa-arrow-right'></i>";
}
else
{
  echo "<script>alert('Email id not register in database or password not match')</script>";
  echo "<script>location.href='change_profile_pwd'</script>";
}
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