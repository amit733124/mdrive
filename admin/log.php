<html>
    <title>Login</title>
   <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <script src="https://www.google.com/reCAPTCHA/api.js" async defer></script>
</head>
<body>
  <style type="text/css">
    input[type="submit"]:hover{
  cursor: pointer;
  background: green;
  color: #000;
}
</style>
           <center>
      <br><img scr="image/logo.png">
      <h1 style="color:#42f4df;font-family: Cooper Black;font-size: 60px;">Admin Login</h1><br>
<fieldset style="height:50%;width:20%;
        border:0;margin-top: 1%;border-radius: 20px;background-color: #e5e5e5;background: rgba(0,0,0,0.5); ">
<legend><img src="image/user.png" height="auto" width="28%"></legend>
<form action="" method="POST">

<i class="fa fa-user" style="font-size: 15px;color: white"></i>
<input type="text" placeholder="Enter username" name="user" autocomplete="off" required style="outline: none;border-radius: 5px;height: 30px;margin-top: 20px" ><br>
&nbsp<i class="fa fa-lock" style="font-size: 15px;color: white"></i>
<input type="password" placeholder="Enter Password" name="pass" id="pass" autocomplete="off" required style="margin-top: 10px;outline: none;border-radius: 5px;height: 30px;">
<br>
<input type="checkbox" onclick="myFunction()" style="cursor: pointer;"><font color="white">Show Password&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<br>

<?php
session_start();
$num1=rand(1,10);
$num2=rand(1,10);
echo $num1."+".$num2."=?";
?>
<input type="hidden" name="num1" value="<?php echo $num1?>"><br>
<input type="hidden" name="num2" value="<?php echo $num2?>">
<i class="fa fa-question"></i> <input type="number" name="ans" placeholder="Result" required style="margin-top:0px;border-radius: 5px;height: 30px;"><br></font>
<input type="submit" name="submit" value="Login" style="background-color:#F26C32;color: white;border-radius: 5px;margin-top: 10px;font-size: 15px;width:175px;height: 25px;margin-left: 12px">
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
</script>
<?php
if(isset($_POST['submit']))
{

  error_reporting(E_ALL);
  //session_start();
 $user_ans=$_POST['ans'];
  $num1=$_POST['num1'];
  $num2=$_POST['num2'];
  $total=$num1+$num2;
  if($total==$user_ans)
  {
require("conn.php");
$user=$_POST['user'];
$pass=$_POST['pass'];

//and captcha LIKE '%{$cap}%'
$sql="select * from admin_table where username='$user' and password='$pass' ";
$record=mysqli_query($con,$sql);
$row=mysqli_fetch_array($record);
if($row['username']==$user && $row['password']==$pass)
  {
    $_SESSION['username']=$user;
    //echo "<br><font color=red>Welcome ".$user."</font>";
    echo "<br><img src='image/wait7.gif' height='15%'>";
    header("Refresh:2.5; url=homepage");
  }
  }
  else
  {
      
      echo "<br><font color='red'>Worng Userid / Password</font><br>";
     // header('Location:log.php');
  }
}
?>
</center>

</body>
</html>