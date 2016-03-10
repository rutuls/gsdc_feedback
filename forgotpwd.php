
<?php 
$err1=$err2=$err3=$err4=$err5="";
$connection = new mysqli("localhost", "root", "", "shradb");
// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
} else {echo "";}

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(empty($_POST['email']))
	{
		$err1="Please Provide Email Address";
	}	
	else 
	{
		$query="select password from login where email='".$_POST['email']."' ";
		$subresult=mysqli_query($connection,$query);
		$result=mysqli_num_rows($subresult);
		$row=mysqli_fetch_assoc($subresult);
		$pass=$row['password'];
		if($result==1)
		{
			$from="rutulshah2007@gmail.com";
			$to=$_POST['email'];
			$subject="Forget Password";
			$body="GSDC Portal Password recovery
			------------------------------------------
			Email Detail is : $to;
			Your Password detail : $pass;
			Regards,
			GSDC";
			$subject = "CodingCyber Password recovered";
			$headers1 = "From: $from\n";
			$headers1 .= "Content-type: text/html;charset=iso-8859-1\r\n";
			$headers1 .= "X-Priority: 1\r\n";
			$headers1 .= "X-MSMail-Priority: High\r\n";
			$headers1 .= "X-Mailer: Just My Server\r\n";
			$sentmail = mail ( $to, $subject, $body, $headers1 );
			$err5="Hi";
		}
		else
		{
			$err2="Not found your Email Address in our database";
		}

	}

	#if($sentmail==1)
	#{
	#$err4="Email Sent Successfully";
	#}
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

<br><br>

<form action="" method="post">

<div class="left">
<label>Email :</label>
</div>

<div class="right">
<input id="email" name="email" placeholder="Email ID" onfocus="this.placeholder=''" onblur="this.placeholder='Email ID'" type="text"><br><br>
<input type="submit" name="submit" value="Send">
</div>
<span><?php echo $err1;?></span>
<span><?php echo $err2;?></span>
<span><?php echo $err3;?></span>
<span><?php echo $err5;?></span>
</form>
</body>
</html>

