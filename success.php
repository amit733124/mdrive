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
 
        session_destroy();
 
    }
require 'mailer/PHPMailerAutoload.php';
if(isset($_POST['submit']) && !empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['mail']) && !empty($_POST['rate']) || !empty($_POST['msg']))
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
        $mail->Subject = "Feedback";
        $mail->Body = "<fieldset height='auto' width='auto' style='border-color:#cb42f4;border-radius:10px;border:3px solid #cb42f4;'><b><table border=0 style='background-color:black;width:100%'><font color='orange' size='10px'><center>mDrive</b></font></table><br><h1>Thanks ".$_POST['fname']." ".$_POST['lname']." For Feedback</h1></center></fieldset>";
        //$mail->addAttachment('C:\Users\Bappa\Downloads\zenit_retro_camera_photos_map_107245_1600x1200.jpg');



        $mail->AddAddress($_POST['mail']);

        if(!$mail->Send()) {
            //echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            //echo "Message has been sent";
        }
 require("conn.php");
 require("db.php");
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['mail'];
$feed=$_POST['rate'];
$msg=$_POST['msg'];
$user=$_SESSION['email'];
$user_ip=$_SERVER['REMOTE_ADDR'];
//$rs=mysqli_query($con,"insert into feedback(first,last,email)values('".$fname."','".$lname."','".$email."')");
$rs=mysqli_query($con,"insert into feedback(first,last,email,rate,msg,user,user_ip)values('".$fname."','".$lname."','".$email."','".$feed."','".$msg."','".$user."','".$user_ip."')");
 if($rs)
 {
  header("refresh:2.5; url=homepage");
  ?>
  <body class="thankyou">
    <div id="stage" class="form-all">
      <p style="text-align:center;"><img src="image/s.png" alt="" width="128" height="128" /></p><div style="text-align:center;"><h1 style="text-align:center;">Thank You!</h1><p style="text-align:center;">Your submission has been received.</p></div>
    </div>
   
</div>
    </div>
  </body>
  <?php
 }
 else
 {
  echo "<script>Please Enter Value</script>";
  header("Location:homepage");
 }
}
}
?>
