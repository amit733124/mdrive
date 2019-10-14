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
if(isset($_POST['submit']))
  {
 require("conn.php");
 require("db.php");
$fname=$_POST['fname'];
$user_id=$_POST['user_id'];
$pass=$_POST['pass'];
//$rs=mysqli_query($con,"insert into feedback(first,last,email)values('".$fname."','".$lname."','".$email."')");
$rs=mysqli_query($con,"insert into admin_table(name,username,password)values('".$fname."','".$user_id."','".$pass."')");
 if($rs)
 {
  header("refresh:2; url=add_admin");
  ?>
  <body class="thankyou">
    <div id="stage" class="form-all">
      <p style="text-align:center;"><img src="image/s.png" alt="" width="128" height="128" /></p><div style="text-align:center;"><h1 style="text-align:center;">Thank You!</h1><p style="text-align:center;">New Admin create successful</p></div>
    </div>
   
</div>
    </div>
  </body>
  <?php
 }
 else
 {
  echo " not Sucess";
 }
}
}
?>
