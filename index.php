<?php
include('login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: portal.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login Form in PHP with Session</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<style>
html
{background: url(C:/xampp/htdocs/project1/bg.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
</style>
<body background="bg.jpg" class="background">
<div align="center">
<img src="horizontal-logo.png" align="middle">
</div>

<div>
<br><br>
<h2>Admin Login</h2>
<br><br>
</div>
<form action="" method="post">

<div class="left1">
<label>UserName :</label>
</div>

<div class="right1">
<input id="name" name="username" placeholder="username" onfocus="this.placeholder=''" onblur="this.placeholder='username'" type="text"><br>
</div>

<div class="left1">
<label>Password :</label>
</div>

<div class="right1">
<input id="password" name="password" placeholder="**********" onfocus="this.placeholder=''" onblur="this.placeholder='password'" type="password"><br><br>
<input name="submit" type="submit" value=" Login " >
<b><a href="register.php">Register</a></b>
<!-- <b> | </b>
<b><a href="forgotpwd.php"> Forgot Password? </a></b> -->
<span><?php echo $error; ?></span>
</div>

</form>

</body>
</html>