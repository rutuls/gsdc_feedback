
<!DOCTYPE html>

<html>
<body>
<h1><strong><b> <img src="img2.png" style="width:98px;height:82px;"><font color="black" size="15" <b> NetApp</b></font></strong> </h1>
<div style="width:1500px;height:60px; background-color:#000066; color:white;"><font  size=15 >GSDC Engagement Feedback</font></div>
<div style="width:1500px;height:30px; background-color:#99C9FF; "></div><br><br><br>
<form action="approval.php" method="post">


<?php
echo $id1;
$conn = new mysqli("localhost", "root", "", "shradb");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//viewing the status
$sql="SELECT status FROM login WHERE id='$id1'";
$result =mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);
$temp=$row['status'];
echo "Status is".$temp;



?>
<br><br> <br>
<input type="submit" name="sub" value="Back">
</form>
</body>
</html>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
if (isset($_POST['sub'])) {

	include 'appform.php';
	exit;
}}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

?>