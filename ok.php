<?php
$host_name = 'www.google.com';
$port_no = '443';

$st = (bool)@fsockopen($host_name, $port_no, $err_no, $err_str, 10);
if ($st) {
  ?>
    <html>
<title>RGU ASSISTANT</title>
<center>
<body style="background-color:">
    <meta name=”viewport” content=”width=device-width, initial-scale=1″>
    <style>
@media only screen and (max-width:1000px) {
  
  .main {
    width: 50%;
    padding: 0;
  }
  .right {
    width: 50%;
  }
  img[src="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"]{
      display:none;
  }
  
}
@media only screen and (max-width:500px) {
  
  .menu, .main, .right {
    width: 50%;
  }
 img[src="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"]{
      display:none;
  }
  
}
</style>
<form action="" method="POST">
    <marquee behavior="alternate"><font size=5 style="font-family: verdana;"><font color="#af26ff">R</font><font color="BLUE">A</font><font color="GREEN">I</font><font color="#d4ff00">G</font><font color="orange">A</font><font color="red">N</font><font color="red">J</font> <font color="#05af0d">  U</font><font color="orange">N</font><font color="#26ffec">I</font><font color="GREEN">V</font><font color="RED">E</font><font color="GREEN">R</font><font color="#26ffec">S</font><font color="orange">I</font><font color="RED">T</font><font color="GREEN">Y</font></font></marquee><br>
<img src="image\google.png"><br>
<input type="hidden" name="searching" value="yes" />
<input type="text" name="search" autocomplete="off" placeholder="Search..." value="<?php echo $emp[1]; ?>" title="plese fill in this field." id="nm" required style=" width: 70%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box;box-shadow:3px 3px 4px 4px #ccc;border-radius:5px;outline:none">
<b><input type="submit" name="submit" value="RGU Search" style="margin:8px; background-color: #f9f7f7;border: none;color: #4c4c4c;padding: 14px 15px;text-align: center;text-decoration: none;display: inline-block;font-size: 12px;margin: 4px 2px;cursor: pointer;"></b><br>
</form>
<script>
function abc()
{
    document.getElementById("nm").attributes["required"] = "Hi"; 
}
</script>
<?php
if(isset($_POST['submit']))
{
 error_reporting(0);
require("conn.php");
$a=$_POST['search'];
$sql="select * from tbl where ques LIKE '%{$a}%' or ques2 LIKE '%{$a}%' ";
$rs=mysqli_query($con,$sql);
if(mysqli_num_rows($rs)>0){
while($emp=mysqli_fetch_array($rs))
{
echo "<h3 style='color:$emp[2];font-family:$emp[3]'>".$emp[4]."</h3><h4 style='color:$emp[6];font-family:$emp[7]'>".$emp[8]."</h4><br>";
}
}
else
{
echo '<font size=5 color=red>No Data Found in Server</font><br><img src=image/ops.jpg height=45% width=50%>';
}
}
?>
</center>
</body>
</html>
<?php
} else {
    echo 'Sorry! You are offline.';
}
?>

