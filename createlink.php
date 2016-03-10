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
table, th, td {
    border: 3px solid black;

    border-collapse: collapse;
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
<b id="portal2"><a href="profile.php"> &nbsp;Approve/Disapprove Users &nbsp;</a></b>

			<b id="portal2"><a href="portal.php"> &nbsp;Report Generation&nbsp; </a></b>
			<!-- <b id="portal2"><a href="portal.php">Portal</a></b> -->
			
			<br><br>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

<div id="main">
<input type="text" id="engid" placeholder="Enter engagement id to create link" onfocus="this.placeholder=''" onblur="this.placeholder='Enter engagement id to create link'"><br>
<br><input type="button" value="Create Link" name="create" onclick="getvalue();"/><br>
<input type="text" id="para"><br><br>
<input type="button" value="Send Mail" name="openemail" onclick="openEmail();"/><br>
<script type="text/javascript">

function getvalue()
{
	var textbox = document.getElementById('engid').value;
	var link="https://10.216.50.89/feedback/feedback.php?engid=";
	var res=link.concat(textbox);
	document.getElementById("para").value=res;

}

function openEmail()
{
	var text=document.getElementById('para').value;
	var hedef  = 'mailto:?subject=Link to open GSDC Feedback Survey Page&body=Following is the link to open GSDC Feedback Survey Page.For any query related to feedback please email us.';
	var res=hedef.concat(text);
	var temptext="  Thanks and Regards"+"\r\n"+"  GSDC"; 
	var sign=res.concat(temptext);
   	location.href = sign;
}

</script>

</div>


</form>
</body>
</html>