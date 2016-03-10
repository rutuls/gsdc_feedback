<!DOCTYPE html>
<html>
<head>
<title>Register as an Admin</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<style>
html
{
	background: url(C:/xampp/htdocs/project1/bg.jpg) no-repeat center center fixed; 
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
<br>
<br>
<?php $emailid=$username=$password=$retype=$error=$err="";?>
<?php

$connection = new mysqli("localhost", "root", "", "shradb");
// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
} else {echo "";}


if (isset($_POST['submit'])) 
{
	if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])|| empty($_POST['retype'])) 
	{
	$error = "All fields are mandatory";
	}


	else
	{

		$emailid=$_POST['email'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$retype=$_POST['retype'];

		$emailid=stripslashes($emailid);
		$username=stripslashes($username);
		$password=stripslashes($password);
		$retype=stripslashes($retype);

		$emailid=mysql_real_escape_string($emailid);
		$username=mysql_real_escape_string($username);
		$password=mysql_real_escape_string($password);
		$retype=mysql_real_escape_string($retype);

		if($password!=$retype)
		{
		$err="Enter the same password in Retype Password ";	
		}
		else
		{
			$db=mysqli_select_db($connection,"shradb");
			$query="INSERT INTO login(username,password,email) values('".$username."','".$password."','".$emailid."')";
			if (mysqli_query($connection, $query)) 
			{
				header("Location: regdone.php");
			} 
			else 
			{
	    		echo "Error: " . $query . "<br>" . mysqli_error($connection);
			}

		}

	}
}
?>
<form action="" method="post">

<div class="left1">
<label>Email ID :</label>
</div>
<div class="right1">
<input id="email" name="email" placeholder="email id" onfocus="this.placeholder=''" onblur="this.placeholder='email id'" type="text" ><br>
</div>

<div class="left1">
<label>UserName :</label>
</div>
<div class="right1">
<input id="username" name="username" placeholder="username" onfocus="this.placeholder=''" onblur="this.placeholder='username'" type="text"><br>
</div>

<div class="left1">
<label>Password :</label>
</div>
<div class="right1">
<input id="password" name="password" placeholder="**********" onfocus="this.placeholder=''" onblur="this.placeholder='*********'" type="password"><br>
</div>

<div class="left1">
<label>Retype Password :</label>
</div>
<div class="right1">
<input id="retype" name="retype" placeholder="**********" onfocus="this.placeholder=''" onblur="this.placeholder='**********'" type="password"><br><br>
<input name="submit" type="submit" value=" Register " >
<b><a href="index.php">Back</a></b>
<span><?php echo $error;?></span>
<span><?php echo $err;?></span>
</div>

</form>
<br>


</body>
</html>
