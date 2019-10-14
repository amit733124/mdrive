<!DOCTYPE html>
<html>
<head>
	<title>Instruction</title>
	<link rel="icon" href="images/cpanel.png" sizes="26x26">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
<link href="style1.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
</head>

<body oncontextmenu="return false;">
	<fieldset style="background-color: #0a4554;border:none;height: 10%;">
            <div class="main">
                <div class="logo">
                <img src="images/cpanel.png" style="height: auto;width:90px">
            </div>
            <ul>
                <li class="" class="open-button"  onclick="openForm()"><a href="index" onclick="openForm()"><i class="fa fa-home"></i> Home</a>
                    <li class="active" class="open-button"  onclick="openForm()"><a href="tc" onclick="openForm()"><i class="fa fa-sign-in"></i>Instruction</a>
          
                </li>
        </div>

    </fieldset>
    <br><br>
	<center>
<fieldset style="height: auto;width: 80%;border-radius: 10px;border-color: blue">
	<form method="post" action="">
		
		<img src="images/new.png" height="20%" width="10%"><br><br>
		<h1><font color="green">
Use Internet Explorer (8.0 or above), Mozilla firefox, Google Chrome.</font></h1><hr>
		<table border="0">
<tr><th>1.<td><h2>Enter Valid Name.</h2><td><font color='red'>[More then five charecters & Upper Case]<tr>
<tr><th>2.<td><h2>Enter Valid username.</h2><td><font color='red'>[More then five charecters]<tr>
<tr><th>3.<td><h2>Enter Valid Email.</h2><td><font color='red'>[Must be contain @ and .][All Information sent in Register Email]<tr>
<tr><th>4.<td><h2>Enter Valid Password.</h2><td><font color='red'>[Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters]<tr>
	<tr><th>5.<td><h2>Enter Mobile Number.</h2><td><font color='red'>[Valid 10 digit number]<tr>
<tr><th>6.<td><h2>Enter Valid Answer.</h2><td><font color='red'>[More then two charecters]<tr>
    <tr><th>7.<td><h2>Profile Password.</h2><td><font color='red'>[Login Password & Profile Password are Different]<tr>
</table><br>
Yes<input type="radio" name="check" value="yes" onchange="showDiv()">No<input type="radio" name="check" value="No" onchange="showDiv1()">
I read and understood all the instructions.<br><br><br>
<div id="hidden_div" style="display: none;">
<a href="sign?YXhDIQY=<?php echo base64_encode(rand(1,10));?>" id="click" name='click' style="background-color: #01497D;color: white;border-radius: 4px;padding:10px 10px;text-decoration: none;">Click here to Proceed</a><br><br></div>
	</form>
</fieldset>
<script>
function showDiv(){
   document.getElementById('hidden_div').style.display = "block";
}
function showDiv1(){
   document.getElementById('hidden_div').style.display = "none";
}

</script>
<?php
if(isset($_POST['click']))
{
	echo "<script>location.href='sign'</script>";
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
</body>
</html>