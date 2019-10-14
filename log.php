<html>
    <title>Login</title>
   <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <script src="https://www.google.com/reCAPTCHA/api.js" async defer></script>
</head>
<body oncontextmenu="return false;">
    <style type="text/css">
      input:active {
  background-color: #ba4a00!important;
}
    </style>
           <center>
      <br><img scr="image/logo.png">
      <h1 style="color:#FE6C2C;font-family: Cooper Black;font-size: 60px;">mDrive</h1><br>
<fieldset style="height:auto;width:25%;
        border:0;margin-top: 1%;border-radius: 10px;background:rgba(0,0,0,.6); ">
<legend><img src="image/user.png" height="auto" width="15%" style="margin-bottom: 10px"></legend>
<form action="" method="POST">
<i class="fa fa-user" style="font-size: 15px;color: white"></i>
<input type="text" placeholder="Enter username" name="user" title="Enter Username" id="user" autocomplete="off" required style="outline: none;height: 30px;width:70%;border-radius: 4px;border:1;font-weight: bold;" ><br>
&nbsp<i class="fa fa-lock" style="font-size: 15px;color: white"></i>
<input type="password" placeholder="Enter Password" name="pass" title="Enter Password" id="pass" autocomplete="off" required style="margin-top: 10px;outline: none;height: 30px;width: 70%;border-radius: 4px;border:1;font-weight: bold;">
<br>
<input type="checkbox" onclick="myFunction()"><font color="white">Show Password&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<br><input type="submit" name="submit" onclick="chkInternetStatus();" value="Login" style="background-color:blue;color: white;border-radius: 3px;margin-top: 10px;font-size: 15px;outline: none;width: 70px;margin-left: 180px;height: 25px;border:none;margin-bottom: 10px;cursor: pointer; "><br>Don't have an account?<a href="tc" style="text-decoration: none;margin-left: 0px;margin-bottom: 10px;"><font color="white"><font color='#00f224'><b>SignUp</b></font></i></a><br>
<a href="forget" style="text-decoration: none;margin-left: 0px;margin-top: 10px"><font color="white">Forget Password</a>
</form></fieldset>
<script>
function myFunction() {
  var x = document.getElementById("pass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }

}
 //  document.getElementById("user").style.backgroundColor = "#0cff85";
</script>
<?php
require 'mailer/PHPMailerAutoload.php';
if(isset($_POST['submit']))
{
  error_reporting(0);
  session_start();
require("conn.php");
$user=$_POST['user'];
$pass=base64_encode($_POST['pass']);

//and captcha LIKE '%{$cap}%'
$sql="select * from user_table where email='$user' and password='$pass' ";
$record=mysqli_query($con,$sql);
$row=mysqli_fetch_array($record);
if($row['email']==$user && $row['password']==$pass && $row['verify']==0 )
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
        $mail->Subject = "Verify User";
        $mail->Body = "<fieldset height='auto' width='auto' style='border-color:#cb42f4;border-radius:10px;border:3px solid #cb42f4;'><b><table border=0 style='background-color:black;width:100%'><font color='orange' size='10px'><center>mDrive</b></font><br>Thanks <b><font color='orange'>".$row['name']."</font></b> For Register.Please Verify Account<br><hr><fieldset height='auto' width='auto'><h2><u>Profile Details</u></h2><b>Register Date: </b>". date("Y/m/d") ."<br><b>Name: </b>".$row['name']."<br><b>Username: </b>".$row['email']."<br><b>Email: </b>".$row['email2']."<br><b>Mobile_No: </b>".$row['mob']."<br><b>Question: </b>".$row['ques']."<br><b>Answer: </b>".$row['ans']."<br><b>Verify Link: </b>http://localhost/mDrive/user/verify.php?key=".$row['con']."<br></center></fieldset></fieldset>";
        //$mail->addAttachment('C:\Users\Bappa\Downloads\zenit_retro_camera_photos_map_107245_1600x1200.jpg');


        $mail->AddAddress($row['email2']);

        if(!$mail->Send()) {
            //echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            //echo "Message has been sent";
        }
echo "<script>alert('Please Verify Your Email!')</script>";
    }
if($row['email']==$user && $row['password']==$pass && $row['verify']==1 )
  {
 date_default_timezone_set('Asia/Kolkata');
     $test=$_SERVER['HTTP_USER_AGENT'];
     $browser = get_browser();
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
        $mail->Subject = "Login Activity";
        $mail->Body = "<fieldset height='auto' width='auto' style='border-color:#cb42f4;border-radius:10px;border:3px solid #cb42f4;'><b><table border=0 style='background-color:black;width:100%'><font color='orange' size='10px'><center>mDrive</b></font></center><br><b><font color='#000516'>".$row['email']."</font></b> is Login now in <b>mDrive</b><br><b>Login IP: </b>".$row['session']."<br><b>Date: </b>".date("Y/m/d h:i:sa")."<br><b>Device Info : </b>".$test."</fieldset>";
        //$mail->addAttachment('C:\Users\Bappa\Downloads\zenit_retro_camera_photos_map_107245_1600x1200.jpg');


        $mail->AddAddress($row['email2']);

        if(!$mail->Send()) {
            //echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            //echo "Message has been sent";
        }
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (30 * 60) ;
    $_SESSION['email']=$user;
    $_SESSION['email2']=$email;
    $sta="Online";
    $sql2=mysqli_query($con,"SELECT * FROM tbl2 WHERE username1='$user'");
    $row2=mysqli_fetch_array($sql2);
    if($row2['username1']==$user)
    {
    $rs=mysqli_query($con,"UPDATE tbl2 SET status='$sta',login_time_date=date('Y/m/d h:i:sa') WHERE username1='$user'");
    }
    else
    {
    $rs=mysqli_query($con,"insert into tbl2(username1,status)values('".$user."','".$sta."')");
    }
    //echo "<br><font color=red>Welcome ".$user."</font>";
   echo "<br><img src='image/wait7.gif' height='15%'>";
   header("Refresh:2; url=homepage.welcome");
  } 
  else
  {
      $user=$_POST['user'];
      $sql="select * from user_table where email='$user'";
      $record=mysqli_query($con,$sql);
      while($row=mysqli_fetch_array($record))
      {
     date_default_timezone_set('Asia/Kolkata');
     $test=$_SERVER['HTTP_USER_AGENT'];
     $browser = get_browser();
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
        $mail->Subject = "Login Alert";
        $mail->Body = "<fieldset height='auto' width='auto' style='border-color:#cb42f4;border-radius:10px;border:3px solid #cb42f4;'><b><table border=0 style='background-color:black;width:100%'><font color='orange' size='10px'><center>mDrive</b></font></center><br><center><font color='red' size='5px'>***Alert***</font><hr></center><b><font color='#000516'>".$row['email']."</font></b> is Trying to Login in <b>mDrive</b><br><b>Login IP: </b>".$row['session']."<br><b>Date: </b>".date("Y/m/d h:i:sa")."<br><b>Device Info : </b>".$test."</fieldset>";
        //$mail->addAttachment('C:\Users\Bappa\Downloads\zenit_retro_camera_photos_map_107245_1600x1200.jpg');

        $mail->AddAddress($row['email2']);

        if(!$mail->Send()) {
            //echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            //echo "Message has been sent";
        }
      //echo base64_decode($row['password']);
      echo "<br><font color='red'>Worng Userid / Password</font><br>";
     // header('Location:log.php');
  }
}
if($row['email']!=$user)
    {
echo "<br><font color='red'>You are not register</font><br>";
    }
}
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