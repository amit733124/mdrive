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
<title>Share Image</title>
<link rel="icon" href="images/cpanel.png" sizes="26x26">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0"></head>
<body oncontextmenu="return false;" style="background-image: url(image/back.png); ">
<center>
<form action="" method="POST">
<fieldset style="
background-color:#e5e5e5;height:auto;width:400px;border-radius: 10px">
<h2>Your Share Link Here</h2>
<h4>Copy This Link & Share</h4>
<hr>
<img src="image/test.svg" height="6%"> <input type="text" onclick="myFunction()" id="myInput" name="mail" value="<?php echo 'http://localhost/mDrive/user/'.$_GET['link']; ?>"  style="width: auto;margin-bottom: 5px;margin-top: 5px;width: 100%;height: 5%">
<a href="http://www.facebook.com/share.php?u=<?php echo "http://epanel.epizy.com/mDrive/user/".$_GET['link']; ?>" target="_blank">
        <img src="image/facebook.png" alt="Facebook" />
    </a>
     <a href="https://plus.google.com/share?url=<?php echo "http://localhost/mDrive/user/".$_GET['link']; ?>" target="_blank">
        <img src="image/google.png" alt="Google" />
    </a>
    <a href="https://twitter.com/share?url=<?php echo "http://localhost/mDrive/user/".$_GET['link']; ?>" target="_blank">
        <img src="image/twitter.png" alt="Twitter" />
    </a>
    <a href="https://api.whatsapp.com/send?text=<?php echo "http://localhost/mDrive/user/".$_GET['link']; ?>" target="_blank">
        <img src="image/whatsapp2.png" alt="whatsapp" height="12%" />
    </a>
    <a href="https://mail.google.com/mail/u/0/?ui=2&view=cm&fs=1&tf=1&su=Share+Image&body=<?php echo "http://localhost/mDrive/user/".$_GET['link']; ?>" target="_blank">
        <img src="image/gmail3.png" alt="whatsapp" height="12%" />
    </a>
</fieldset>
</form>
</center>
<?php
}
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
<script>
function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  document.execCommand("copy");

}
</script>
</body>
</html>