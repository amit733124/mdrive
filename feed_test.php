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
?>
<html>
<head>
	<title>Feedback</title>
</head>
<center>
<body oncontextmenu="return false;" onload='document.form1.mail.focus()' style="background-color: #F5F5F5">
	<form method="post" action="success">
<fieldset style="height: auto;width: 50%;background-color: #dcdee2;margin-top: 10px">
	<h2>Rate my Software!</h2>
	<h4>Please let us know your experience with My Software</h4>
	<hr>
		<table><tr><th>Full Name</th>
	<td><input type="text" placeholder="First Name" name="fname" pattern="[A-Za-z].{3,}" onkeypress="return blockSpecialChar3(event)" required>
	<td><input type="text" placeholder="Last Name" name="lname" pattern="[A-Za-z].{4,}" onkeypress="return blockSpecialChar3(event)" required style="margin-left: 20px"></tr>
		<tr><th>E-mail</th>
	<td><input type="email" placeholder="xyz@gmail.com" name="mail" onkeypress="return blockSpecialChar4(event)" required style="width: 200%;margin-top: 5px"></tr>
		<tr><th>Rate:</th>
			<td><input type="radio" name="rate" value="bad" style="margin-top:5px ">Bad
            <input type="radio" name="rate" value="Good" style="margin-top:5px ">Good
            <input type="radio" name="rate" value="Excellent" style="margin-top:5px ">Excellent
        </tr>
     <tr><th>How would you<br> suggest I improve it?</th>
     	<td><textarea name="msg" pattern="[A-Za-z].{4,}" onkeypress="return blockSpecialChar4(event)" style="height: 203px; width: 181px; margin: 0px; margin-top: 5px"></textarea>
        </tr>
        <tr><th>&nbsp</th>
     	<td><input type="submit" name="submit" value="Submit" onclick="ValidateEmail(document.form1.mail)">
     		<input type="reset" name="reset" value="Reset">
        <a href="homepage.welcome"  style="text-decoration: none;">Back</a>
        </tr>
       </table>
</fieldset>
</form>
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
            return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8);

        }
         function blockSpecialChar4(e) {
            var k = e.keyCode;
            return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 64 || (k >= 48 && k <= 57));

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