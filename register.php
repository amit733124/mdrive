<html>
<head>
    </head>
    <link rel="icon" href="images/cpanel.png" sizes="26x26">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            
        
<link href="style1.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body oncontextmenu="return false;" style="background-image: url(image/back3.jpg); ">
            <fieldset style="background-color: #0a4554;border:none;height: 10%;">
            <div class="main">
                <div class="logo">
                <img src="images/cpanel.png" style="height: auto;width:90px">
            </div>
            <ul>
                <li class="" class="open-button"  onclick="openForm()"><a href="index.php" onclick="openForm()"><i class="fa fa-sign-in"></i>SignIn</a>
                    <li class="active" class="open-button"  onclick="openForm()"><a href="sign.php" onclick="openForm()"><i class="fa fa-sign-in"></i>Register Now</a>
                
                </li>
        </div>

    </fieldset>
 <center>
  <?php 
  require("sign.php");
  ?>
 </div></center>
</div>
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
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5c9c5c0b1de11b6e3b0593ef/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>

<!--End of Tawk.to Script-->
</body>
</html>