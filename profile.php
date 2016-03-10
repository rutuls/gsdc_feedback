<?php
include('session.php');
ini_set('display_errors','off');
?>
<!DOCTYPE html>
<html>
<head>
<title>Profile</title>
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
input[type=button] {
width:10%;
float:center-left;
background-color:#0000ff;
color:#fff;
border:2px solid #0000ff;
padding:0px;
font-size:15px;
cursor:pointer;
border-radius:5px;
margin-bottom:15px;
}
</style>



<style>
	table { 
		width: 100%; 
		border-collapse: collapse; 
	}
	/* Zebra striping */
	tr:nth-of-type(odd) { 
		background: #eee; 
	}
	th { 
		background: #556BAC; 
		color: white; 
		font-weight: bold; 
	}
	td, th { 
		padding: 6px; 
		border: 1px solid #ccc; 
		text-align: left; 
	}
	</style>


<body background="bg.jpg" class="background">
		<b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>
<div align="center">
<img src="horizontal-logo.png" align="middle">
</div>
<div align="center">

<h2>GSDC ENGAGEMENT FEEDBACK PORTAL</h2><br>

</div>

<b id="logout"><a href="logout.php">&nbsp;Log Out&nbsp;</a></b>
<br><br>
<b id="portal2"><a href="createlink.php"> &nbsp;Link creation for new Eng Id&nbsp; </a></b>

			<b id="portal2"><a href="portal.php"> &nbsp;Report Generation&nbsp; </a></b>
			<!-- <b id="portal2"><a href="portal.php">Portal</a></b> -->
			
			<br><br>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div align="center">
<br><br><b>Pending Approvals:</b><br>
<?php
	$opt=array();
	$sql=array();
	$e1=array();
	$sql=array();
	$status="";
	$count=0;
	$j="";
	$allow=$err="";
?>
		<table style="width:50%">
		<th>Email</th>
		<th>SSO Username</th>	
		<th>Select Option</th>	
<?php		
			$newuser_fetch="select email,username from login where status='".$status."' ";
			$newuser_fetch_exec=mysqli_query($connection,$newuser_fetch);

			while($result=mysqli_fetch_assoc($newuser_fetch_exec))
			{
				$count_to_string=(string)$count;
				$emailid=$result['email'];
				$username=$result['username'];?>
				<tr>
					<td align="center"><?php echo $emailid; ?></td>
					<td align="center"><?php echo $username;?></td></h2>
				<td align="center">
				<input type="radio" name=<?php echo $count_to_string;?> <?php if (isset($opt[$count]) && $opt[$count]=="Approve") echo "checked";?>  value="Approve"> Approve
				<input type="radio" name=<?php echo $count_to_string;?> <?php if (isset($opt[$count]) && $opt[$count]=="Disapprove") echo "checked";?> value="Disapprove"> Disapprove
				</td>
				</tr>
				
				<span><?php echo $err;?></span>

			<?php
			$count++;
			}?>	
</table>
<?php
if($count==0)
{?>
<b> There are no requests </b><br>

<?php
}


?>

<br><input type="submit" value="Submit" name="submitstatus">

<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{

	for($i=0;$i<$count;$i++)
	{
		$j=(string)$i;
		if(empty($_POST[$j]))
		{
			$err="Mandatory";
		}
		else
		{
			$opt[$i]=$_POST[$j];
		}

	}

$a1="select email,username from login where status='".$allow."'";
$b1=mysqli_query($connection,$a1);

while($result=mysqli_fetch_assoc($b1))
{
	array_push($e1,$result['email']);
	$u1=$result['username'];
	
}

for($i=0;$i<$count;$i++)
	{
		
		$sql[$i]="UPDATE login SET status='".$opt[$i]."' where email='".$e1[$i]."' ";

		if (mysqli_query($connection, $sql[$i])) {

		} 
		else {
    	echo "Error: " . $sql[$i] . "<br>" . mysqli_error($conn);
		}
	}

header("Location: profile.php");//this redirects
}

?>
</div>


</form>
</body>
</html>