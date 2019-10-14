<?php
    session_start();

    if (!isset($_SESSION['email'])) {
        echo "<script>alert('Please Login again')</script>";
        echo "<a href='index.php'>Click Here to Login</a>";
    }
        else { 
?>
<html>
<head>
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body {
  margin: 0;
  font-family: "Lato", sans-serif;
}

.sidebar {
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #2A3F54;
  position: fixed;
  height: 100%;
  overflow: auto;
  top: 0;
  color: white;
}

.sidebar a {
  display: block;
  color: white;
  padding: 16px;
  text-decoration: none;
}
 
.sidebar a.active {
  background-color: #2A3F54;
  color: white;
}

.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}

div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
}

@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}
.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 55px 62px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  margin-top: 60px;
  position: fixed;
}

</style>
</head>
<body>
	<fieldset style="background-color: #EDEDED;height: 5%;border:none;"></fieldset>
  <div class="sidebar">
  <a class="active" href="#home">
  <img src="image/user.png" height="10%" width="23%">Welcome <?php echo $_SESSION['email']?></a>
  <hr>
  <a href="homepage.php"><i class="fa fa-home"></i> Home</a>
  <a href="upload_image.php"><i class="fa fa-image"></i> Upload Images</a>
  <a href="upload_file.php"><i class="fas fa-file"></i> Upload Files</a>
  <a href="chatbox.php"><i class="fas fa-comment"></i> Chat Box</a>
  <a href="logout.php"><i class="fa fa-power-off"></i> Logout</a>
</div>

</body>
<?php
}
?>
</html>
