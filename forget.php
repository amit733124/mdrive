<html>
    <title>Forget Password</title>
    <link rel="icon" href="images/cpanel.png" sizes="26x26">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<body oncontextmenu="return false;" style="background-image: url(image/back.png)">
    <style>
@media only screen and (max-width:800px) {
  
  .main {
    width: 80%;
    padding: 0;
  }
  .right {
    width: 100%;
  
}
@media only screen and (max-width:500px) {
  
  .menu, .main, .right {
    width: 100%;
  }
  
}
</style>
    <center>
      <h1 style="color:red;">Forget Your Password?</h1><br>
<fieldset style="height:30%;width:20%;
        border:1;margin-top: 1%;border-radius: 20px;background-color: #e5e5e5;box-shadow: 5px 5px #888888 ">
<legend><i class="fa fa-lock" style="font-size: 40px;color: blue"></i><br></legend>
<form action="" method="POST">

&nbsp<i class="fa fa-user" style="font-size: 15px;color: blue"></i>
<input type="text" placeholder="Enter username" name="user" autocomplete="off" required style="border-radius: 5px;"><br>
<i class="fa fa-check" style="font-size: 15px;color: blue"></i>
<select style="margin-top: 10px;border-radius: 5px;" name="ques">
  <option>What is your pet name?</option>
  <option>What is your nike name?</option>
  <option>Who is your fev singer?</option>
  <option>Who is your best friend?</option>
</select><br>
&nbsp<i class="fa fa-question" style="font-size: 15px;color: blue"></i>
<input type="text" placeholder="Your Answer" name="ans" autocomplete="off"  required style="margin-top: 10px;border-radius: 5px;"><br>
<input type="submit" name="submit" value="Get Password" style="background-color:#F26C32;color: white;border-radius: 5px;margin-top: 10px; "><br>
<a href="index" style="text-decoration: none;margin-left: 150px;">Login<i class="fa fa-arrow-right"></i></a>
</form></fieldset>
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
<?php
require 'mailer/PHPMailerAutoload.php';
if(isset($_POST['submit']))
{
  error_reporting(E_ALL);
  session_start();
require("conn.php");
$user=$_POST['user'];
$ques=$_POST['ques'];
$ans=$_POST['ans'];

//and captcha LIKE '%{$cap}%'
$sql="select * from user_table where email='$user' and ques='$ques' and ans='$ans' ";
$record=mysqli_query($con,$sql);
$row=mysqli_fetch_array($record);
if($row['email']==$user && $row['ques']==$ques && $row['ans']==$ans)
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
        $mail->Subject = "Forget Password";
        $url="http://localhost/mDrive/user";
        $mail->Body = "<fieldset height='auto' width='auto' style='border-color:#cb42f4;border-radius:10px;border:3px solid #cb42f4;'><b><table border=0 style='background-color:black;width:100%'><font color='orange' size='10px'><center>mDrive</b></font></table></center><br><b>Username:</b> ".$row['email']." <br><b>Password: <b>".base64_decode($row['password'])."<br>Date: ". date("Y/m/d") ."<hr><br><font color='red'><center>If You Want to change password then goto <a href='$url'>login</a> & change password</center></font></fieldset>";
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
        echo "<script>alert('Password sent in your register email address')</script>";
        echo "<script>location.href='index'</script>";
    //echo "<a href=index.php style='text-decoration: none;font-size:30px'>Go to Login Page</a><i class='fa fa-arrow-right'></i>";
  }
  else
  {
   
      echo "<br><font color='red'>Worng Information</font><br>";
     // header('Location:log.php');
  }
}
?>
</body>
</html>