<?php

$conn = new mysqli("localhost", "root", "", "shradb");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "id and name of the users whose status is not approved <br>";
//4.average response of all the all the questions by all the users
$sql7="SELECT id, username FROM login WHERE status=''";
$result7 =mysqli_query($conn, $sql7);
if (mysqli_num_rows($result7) > 0) {
    // output data of each row
    while($row=mysqli_fetch_assoc($result7)) {
        echo $row["id"]."=> ".$row["username"];
		echo "<br>";
	}
} else {
    echo "no results";
}


$error=''; // Variable To Store Error Message

if ($_SERVER["REQUEST_METHOD"] == "POST"){
/*if (isset($_POST['sub1'])) {
if (empty($_POST['id1'])) {
$error = "enter the proper id";
}
else{
	$id1=test_input($_POST["id1"]);
	//echo $id1; echo "<br>";
	include 'show.php';
}}
//html code
<fieldset> 
<legend>Check the status of the id:</legend>
 <br>Enter the id to see the status<br>
  <input type="text" name="id1" value="">

  <input type="submit" name="sub1" value="Show">
</fieldset>

*/
if (isset($_POST['sub2'])) {
if (empty($_POST['id2'])) {
$error = "enter the proper id";
}
else{
	$id2=test_input($_POST["id2"]);
	//echo $id2; echo "<br>";
	include 'app.php';
}}

if (isset($_POST['sub3'])) {
if (empty($_POST['id3'])) {
$error = "enter the proper id";
}
else{
	$id3=test_input($_POST["id3"]);
	//echo $id3;
	include 'disa.php';
}}
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}








/*

echo "you r at master admion page";
$conn = new mysqli("localhost", "root", "", "shradb");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$id=234565432;
//viewing the status
$sql="SELECT status FROM login WHERE id='$id'";
$result =mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);
$temp=$row['status'];
echo "Status is".$temp;
//if($temp==approve)
//{
//	include 'portal.php';
//}

//approving the status of admins as approved
$id1=123456;
$sql1="UPDATE login SET status='approve' WHERE id='$id1'";
if (mysqli_query($conn, $sql1)) {

} else {
    echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
}
$id2=123456;
//disapproving the status of the id
$sql1="UPDATE login SET status='disapprove' WHERE id='$id2'";
if (mysqli_query($conn, $sql1)) {

} else {
    echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
}
*/




?>