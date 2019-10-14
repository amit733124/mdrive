<?php
if(isset($_GET['YXhDIQY']))
{
?>
<html>
<title>Sign Up</title>
<head>
  <link rel="icon" href="images/cpanel.png" sizes="26x26">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></head>
<body oncontextmenu="return false;" onload='document.form1.mail.focus()' style="background-image: url(image/back.png)">
  <style type="text/css">
    input[type=text]
    {
      border-radius: 7px!important;
      background-color: rgb(0,0,0,.7);
      width: 250px;
      height: 40px;
      margin-top: 10px;
      color:white;
      outline-color:green;
    }
    input[type=password]
    {
      border-radius: 7px!important;
      background-color: rgb(0,0,0,.7);
      width: 250px;
      height: 40px;
      margin-top: 10px;
      color:white;
      outline-color:red;
    }
    input[type=email]
    {
      border-radius: 7px!important;
      background-color: rgb(0,0,0,.7);
      width: 250px;
      height: 40px;
      margin-top: 10px;
      color:white;
      outline-color:green;
    }
    input[type=tel]
    {
      border-radius: 7px!important;
      background-color: rgb(0,0,0,.7);
      width: 250px;
      height: 40px;
      margin-top: 10px;
      color:white;
      outline-color:green;
    }
    input[type=submit]
    {
      border-radius: 7px!important;
      background-color: green;
      width: 250px;
      height: 40px;
      margin-top: 10px;
      color:white;
      margin-left: 10px;
      outline:none;
    }
    select
    {
      border-radius: 7px!important;
      background-color: rgb(0,0,0,.7);
      width: 250px;
      height: 40px;
      margin-top: 10px;
      color: white;
      outline-color:green;
    }
    ::placeholder {
     color: white;
     opacity: 1;
       }
  </style>
<center>
<fieldset style="height:auto;width:40%;
        border:1;border-radius: 20px;background:rgba(0,0,0,.7);">
        <h3><font color="red"> ***All Input is Required*** </font></h3><hr>
<form action="" method="POST" onsubmit="return checkInp()" name="myForm">
<i class="fa fa-user" style="font-size: 15px;color: white"></i>
<input type="text" placeholder="Enter Full Name" onkeypress="return blockSpecialChar3(event)" name="name" pattern="[A-Za-z].{4,}" title="Minimum four charecter input" autocomplete="off" required style="text-transform: uppercase;" ><br>
<i class="fa fa-user" style="font-size: 15px;color: white;margin-top: 10px"></i>
<input type="text" placeholder="Enter username" onkeypress="return blockSpecialChar(event)" autosave="off" name="mail" autocomplete="off" pattern="[A-Za-z].{4,}" title="five or more characters" required ><br>
<i class="fa fa-lock" style="font-size: 15px;color: white"></i>
<input type="password" placeholder="Enter Password" name="pwd" id="pwd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" autocomplete="off" required style="margin-top: 10px"><br>
<i class="fa fa-lock" style="font-size: 15px;color: white"></i>
<input type="text" placeholder="Enter Confirm Password" name="cpwd" id="cpwd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" autocomplete="off" required style="margin-top: 10px"><br>
<i class="fa fa-envelope" style="font-size: 11px;color: white"></i>
<input type="email" placeholder="xyz@gmail.com" onkeypress="return blockSpecialChar4(event)" name="email" required style="margin-top: 10px"><br>
<i class="fa fa-mobile" style="font-size: 20px;color: white"></i>
<input type="tel" placeholder="Enter Mobile Number" onkeypress="return blockSpecialChar2(event)" name="mob" maxlength="10" pattern="[0-9]{10}" autocomplete="off" title="Enter 10 digit Mobile Number" required style="margin-top: 10px"><br>
<i class="fa fa-check" style="font-size: 15px;color: white"></i>
<select style="margin-top: 10px" name="ques">
  <option disabled>Security Question</option>
  <option>What is your pet name?</option>
  <option>What is your nike name?</option>
  <option>Who is your fev singer?</option>
  <option>Who is your best friend?</option>
</select><br>
<i class="fa fa-question" style="font-size: 15px;color: white"></i>
<input type="text" placeholder="Your Answer" onkeypress="return blockSpecialChar(event)" name="ans" autocomplete="off" pattern="[A-Za-z].{2,}"  title="Invalid input" required style="margin-top: 10px"><br>
<i class="fa fa-lock" style="font-size: 15px;color: white"></i>
<input type="password" placeholder="Enter Profile Password" name="profile_pwd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,16}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 5 or more characters" autocomplete="off" required style="margin-top: 10px"><br>
<input type="submit" name="s1" value="Signup" onclick="ValidateEmail(document.form1.mail)" onclick="validatePassword()" style="cursor: pointer;"><br><a href="index" style="text-decoration: none;margin-left: 150px;color: white">Login<i class="fa fa-arrow-right"></i></a></fieldset>
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
<script type="text/javascript">
        function blockSpecialChar(e) {
            var k = e.keyCode;
            return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8   || (k >= 48 && k <= 57));

        }
        function blockSpecialChar2(e) {
            var k = e.keyCode;
            return (k >= 48 && k <= 57);

        }
        function blockSpecialChar3(e) {
            var k = e.keyCode;
            return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k==32);

        }
         function blockSpecialChar4(e) {
            var k = e.keyCode;
            return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 64 || k == 46 || (k >= 48 && k <= 57));

        }

    </script>
<script type="text/javascript">
  function checkInp()
{
  var x=document.forms["myForm"]["mob"].value;
  if (isNaN(x)) 
  {
    alert("Must input numbers");
    return false;
  }
}
</script>
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
if(isset($_POST['s1']) && !empty($_POST['name']) && !empty($_POST['mail']) && !empty($_POST['email'])  && !empty($_POST['pwd']) && !empty($_POST['mob']) && !empty($_POST['ques']) && !empty($_POST['ans']) && !empty($_POST['profile_pwd']))
{
  error_reporting(0);
  session_start();
require("conn.php");
$session=$_SERVER['REMOTE_ADDR'];
$name=strip_tags($_POST['name']);
$mail=strip_tags($_POST['mail']);
$pwd=base64_encode($_POST['pwd']);
$email=$_POST['email'];
$mob=strip_tags($_POST['mob']);
$ques=strip_tags($_POST['ques']);
$ans=strip_tags($_POST['ans']);
$profile_pwd=base64_encode($_POST['profile_pwd']);
$key=md5(time().$mail);
$key2=md5(time().$email);
/*$file_to_write1 = '.htaccess';
$content_to_write1 = 'RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^([^\.]+)$ $1.php [NC,L]
';*/
$file_to_write = 'index.php';
$content_to_write = "<h1>No Access File</h1>";
if( is_dir($mail) === false )
{
    mkdir("Users/".$mail);
}
$file = fopen("Users/".$mail . '/' . $file_to_write,"w");
//$file1 = fopen("Users/".$mail. '/' . $file_to_write1,"w");
fwrite($file, $cotent_to_write);
//fwrite($file1, $content_to_write1);
fclose($file);
//fclose($file1);
$rs=mysqli_query($con,"insert into user_table(name,email,password,con,profile_pwd,con2,email2,mob_no,ques,ans,session)values('".$name."','".$mail."','".$pwd."','".$key."','".$profile_pwd."','".$key2."','".$email."','".$mob."','".$ques."','".$ans."','".$session."')");
if($rs)
{
/* Authorisation details.
  $username = "pranati5pm@gmail.com";
  $hash = "0b192a8f877448124ae35321f2470b28fcef428e9d49d074649c533c211bf942";

  // Config variables. Consult http://api.textlocal.in/docs for more info.
  $test = "0";

  // Data for text message. This is the text message data.
  $sender = "TXTLCL"; // This is who the message appears to be from.
  $numbers = $_POST['mob']; // A single number or a comma-seperated list of numbers
  $message = "Thanks ".$_POST['name']." Register for mDrive...Please Verify your email address.";
  // 612 chars or less
  // A single number or a comma-seperated list of numbers
  $message = urlencode($message);
  $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
  $ch = curl_init('http://api.textlocal.in/send/?');
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $result = curl_exec($ch); // This is the result from the API
  curl_close($ch);*/
  $field = array(
    "sender_id" => "FSTSMS",
    "language" => "english",
    "route" => "qt",
    "numbers" => $mob,
    "message" =>"13164" ,
    "variables" => "{#BB#}|{#AA#}",
    "variables_values" => $name."|asdaswdx"
);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($field),
  CURLOPT_HTTPHEADER => array(
    "authorization: 4ieBoBwDR5iigyjEtSiiOgcVhorpay5g2l5UiPzLHRyQvtMt2bzaLoJSF8ZT",
    "cache-control: no-cache",
    "accept: */*",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  ///echo $response;
  //echo "<script>alert('SMS sent success');</script>";
}
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
        $mail->Body = "<fieldset height='auto' width='auto' style='border-color:#cb42f4;border-radius:10px;border:3px solid #cb42f4;'><b><table border=0 style='background-color:black;width:100%'><font color='orange' size='10px'><center>mDrive</b></font><br>Thanks <b><font color='orange'>".$_POST['name']."</font></b> For Register.Please Verify Account<br><hr><fieldset height='auto' width='auto'><h2><u>Profile Details</u></h2><b>Register Date: </b>". date("Y/m/d") ."<br><b>Name: </b>".$_POST['name']."<br><b>Username: </b>".$_POST['mail']."<br><b>Email: </b>".$_POST['email']."<br><b>Mobile_No: </b>".$_POST['mob']."<br><b>Question: </b>".$_POST['ques']."<br><b>Answer: </b>".$_POST['ans']."<br><b>Verify Link: </b>http://localhost/mDrive/user/verify.php?key=".$key."<br></center></fieldset></fieldset>";
        //$mail->addAttachment('C:\Users\Bappa\Downloads\zenit_retro_camera_photos_map_107245_1600x1200.jpg');


        $mail->AddAddress($_POST['email']);

        if(!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            //echo "Message has been sent";
        }
        //
//echo "<br><font color='green'>Account Create Success</font>"."<br>";
//echo "<img src='image/wait5.gif' height='10%'>";
echo "<script>alert('Account Create Success.Please Verify Your account in your Email!')</script>";
echo "<script>location.href='index'</script>";
//header("Refresh:5;url='index.php'");
}
else
{
echo "<br><br><script>alert('Username Already Present')</script>";
//echo "<img src='image/wait2.gif' height='50%'>";
echo "<script>location.href='sign'</script>";
}
}
}
else
{
echo "<script>alert('Please Accept the instruction')</script>";
echo "<script>location.href='tc'</script>";
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