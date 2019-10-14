
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
<!DOCTYPE html>
<html>
<head>
	<title>Limit</title>
</head>
<body>
<?php
      //error_reporting(0);
    //session_start();
 require("db.php");
 $limit=$_GET['id'];
$email=$_SESSION['username'];
$result=mysqli_query($db,"select * from user_table where email='".$limit."' ");
while($row=mysqli_fetch_array($result))
{
 $limit=$row['limitt'];
 $email2=$row['email2'];
}
?>
<center>
<fieldset>
	<h1 style="color: green">Update Limit</h1>
	<form method="post" action="">
		<input type="text" name="limit" placeholder="Enter Limit" value="<?php echo $limit;?>" style="margin-bottom: 10px"><br>
		<input type="email" name="email" placeholder="Enter Email" value="<?php echo $email2;?>" disabled style="margin-bottom: 10px"><br>
		<input type="submit" name="submit" value="Change">
	</form>
</fieldset>
<?php
require '../mailer/PHPMailerAutoload.php';
if(isset($_POST['submit']))
{
error_reporting(0);
require("conn.php");
$email2=$_POST['email'];
$username=$_SESSION['username'];
$limit=strip_tags($_POST['limit']);
$rs=mysqli_query($con,"UPDATE user_table SET limitt='$limit' WHERE email='$username' ");
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
        $mail->Subject = "Limit Update";
        $url="http://localhost/mDrive/user";
        $mail->Body = "<fieldset height='auto' width='auto' style='border-color:#cb42f4;border-radius:10px;border:3px solid #cb42f4;'><b><table border=0 style='background-color:black;width:100%'><font color='orange' size='10px'><center>mDrive</b></font></table></center><br><b>Thanks </b> ".$username." for Update Your Account.<br>Your Account is Upgrated<b></fieldset>";
        //$mail->addAttachment('C:\Users\Bappa\Downloads\zenit_retro_camera_photos_map_107245_1600x1200.jpg');

        $mail->AddAddress('email2');

        if(!$mail->Send()) {
           // echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
          //  echo "Message has been sent";
        }

echo "<script>alert('Update Success')</script>";
echo "<script>location.href='homepage'</script>";

}
else
{
	echo mysqli_error($con);
}
}
}//header("location:homepage.php");
?>
</center>
</body>
</html>