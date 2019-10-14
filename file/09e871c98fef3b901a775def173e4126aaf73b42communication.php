<!DOCTYPE html>
<html>
<head>
	<title>Communication</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style type="text/css">
.container{
  position:absolute; 
}
.card{
  display:inline-block;
  padding:8px 16px;
  background:white;
  border-radius:10px;
  box-shadow:2px 2px 10px rgba(0,0,0,.5);
  position:absolute;
  transition:2s ease;
  margin-left: 400px;
}
.wi20
{
	width: 250px;
	height: 40px;
	border-radius: 25px;
	border: 2px solid powderblue;

}
.bttn
{
	width: 100%;
	background-color: powderblue;
	border-radius: 4px;
	height: 30px;
}
.bttn:hover {
  background-color: #008CBA;
  color: white!important;
}
@media only screen and (max-width: 500px) {

    .card
    {
    	 display:inline-block;
  padding:8px 16px;
  background:white;
  border-radius:10px;
  box-shadow:2px 2px 10px rgba(0,0,0,.5);
  position:absolute;
  transition:2s ease;
  margin-left: 0px;
  width: 90%;
    }
  }

	</style>
</head>
<body>
<?php
error_reporting(0);
require("nav.php");
?>
<div class="content">
	<div class="containr">
		<div class="card">
			<form action="" method="post">
				<legend>Topic:</legend>
				<select name="txt_topic1" class="wi20" onClick="show()" id="35">
					<option>C++</option>
					<option>JAVA</option>
					<option value="others">Other</option>
				</select>
				<div style="display: none;" id="other_topic">
					<br><legend>Enter Your Topic:</legend>
					<input type="text" name="txt_topic2" class="wi20">
				</div>
				<br><legend>Enter Your Question:</legend>
				<input type="text" name="txt_question" class="wi20">
				<br><br><button type="submit" name="sub" class="bttn">Submit</button>
			</form>
		</div>
	</div>
</div>
<div style="display: none;" id="other_topic">
					<legend>Enter Your Topic:</legend>
					<input type="text" name="txt_topic2" class="wi20">
				</div>
<script type="text/javascript">
	function show()
	{
 var a=document.getElementById("35").value;
if(a=="others")
{
document.getElementById("other_topic").style.display="block";
}
else
{
	document.getElementById("other_topic").style.display="none";
}

}
</script>
</body>
</html>