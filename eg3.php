<?php
//choping the link

$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
//echo $actual_link;
$pos = stripos($actual_link, "?");
//echo "? is at position ".$pos;

$pos++;
//echo "? is at position ".$pos;

$eid= substr ($actual_link, $pos);
//echo "eng id is ".$eid;
$len=strlen($eid);
//echo "length of id is :".$len;
$len=$len-6;
//echo "length of id is :".$len;
//Limiting the length of the engid
if($len>9)
{
	include 'moveto2.php';
	exit;
}
//getting the date from the real time
$Ymd;
$today=date("Ymd");
//echo "date is ".$today;
$time=date("h:i:sa");
//echo $time;

//check whether all the fields are filled
if($fg2==1 and ($fg3==1 and ($fg4==1 and ($fg5==1 and ($fg6==1 and ($fg7==1 and ($fg8==1)))))))
{
$conn = new mysqli("localhost", "root", "", "shradb");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$eid=$_POST["id"];
//echo "Value of num is ".$_GET['engid']."";
#$sq="SELECT engid FROM enginfo WHERE engid=".$eid."";
#$chk =mysqli_query($conn, $sq);
#if (mysqli_num_rows($chk) > 0) {
    // output data of each row
   
#	include 'moveto.php';
# 	exit;
#} 


//after form has been filled then showing users that he has successfully filled the form
include 'nextp.php'; 
//29/2/2016
$a9 = mysql_real_escape_string($_POST['a9']);
$sql99="INSERT INTO feedt (engid, commt, date, time) VALUES ('".$eid."', '$a9', '$today', '$time')";
if (mysqli_query($conn, $sql99)) {

} else {
    echo "Error: " . $sql99 . "<br>" . mysqli_error($conn);
}
//fetching the value of the increamented engid
$sql_id="SELECT max(id) from feedt";
$result_id=mysqli_query($conn, $sql_id);
$row_id=mysqli_fetch_assoc($result_id);
$temp_id=$row_id['max(id)'];
//echo $temp_id;
//puting the values of the fields in the database
$sql2="SELECT aid,ansv FROM answer WHERE ansd='".$a2."'";
$result2 =mysqli_query($conn, $sql2);
$row2=mysqli_fetch_assoc($result2);
$temp2=$row2['aid'];
$ansv2=$row2['ansv'];


$sql22 = "INSERT INTO enginfo (engid, qid, aid, ansdesc, rating, id ) VALUES ('".$eid."', 2, $temp2, '$a2', $ansv2, '$temp_id')";
if (mysqli_query($conn, $sql22)) {

} else {
    echo "Error: " . $sql22 . "<br>" . mysqli_error($conn);
}



$sql3="SELECT aid,ansv FROM answer WHERE ansd='".$a3."'";
$result3 =mysqli_query($conn, $sql3);
$row3=mysqli_fetch_assoc($result3);
$temp3=$row3['aid'];
$ansv3=$row3['ansv'];

$sql33 = "INSERT INTO enginfo (engid, qid, aid, ansdesc, rating, id ) VALUES ('".$eid."', 3, $temp3, '$a3', $ansv3, '$temp_id')";
if (mysqli_query($conn, $sql33)) {
	
} else {
    echo "Error: " . $sql33 . "<br>" . mysqli_error($conn);
}

$sql4="SELECT aid, ansv FROM answer WHERE ansd='".$a4."'";
$result4 =mysqli_query($conn, $sql4);
$row4=mysqli_fetch_assoc($result4);
$temp4=$row4['aid'];
$ansv4=$row4['ansv'];


$sql44 = "INSERT INTO enginfo (engid, qid, aid, ansdesc, rating, id ) VALUES ('".$eid."', 4, $temp4, '$a4', $ansv4, '$temp_id')";
if (mysqli_query($conn, $sql44)) {

} else {
    echo "Error: " . $sql44 . "<br>" . mysqli_error($conn);
}

$sql5="SELECT aid, ansv FROM answer WHERE ansd='".$a5."'";
$result5 =mysqli_query($conn, $sql5);
$row5=mysqli_fetch_assoc($result5);
$temp5=$row5['aid'];
$ansv5=$row5['ansv'];
//echo "value is".$temp5;

$sql55 = "INSERT INTO enginfo (engid, qid, aid, ansdesc, rating , id) VALUES ('".$eid."', 5, $temp5, '$a5', $ansv5, '$temp_id')";
if (mysqli_query($conn, $sql55)) {

} else {
    echo "Error: " . $sql55 . "<br>" . mysqli_error($conn);
}

$sql6="SELECT aid, ansv FROM answer WHERE ansd='".$a6."'";
$result6 =mysqli_query($conn, $sql6);
$row6=mysqli_fetch_assoc($result6);
$temp6=$row6['aid'];
$ansv6=$row6['ansv'];
//echo "value is".$temp6;

$sql66 = "INSERT INTO enginfo (engid, qid, aid, ansdesc, rating, id ) VALUES ('".$eid."', 6, $temp6, '$a6', $ansv6, '$temp_id')";
if (mysqli_query($conn, $sql66)) {
	
} else {
    echo "Error: " . $sql66 . "<br>" . mysqli_error($conn);
}

$sql7="SELECT aid, ansv FROM answer WHERE ansd='".$a7."'";
$result7 =mysqli_query($conn, $sql7);
$row7=mysqli_fetch_assoc($result7);
$temp7=$row7['aid'];
$ansv7=$row7['ansv'];
//echo "value is".$temp7;

$sql77 = "INSERT INTO enginfo (engid, qid, aid, ansdesc, rating , id) VALUES ('".$eid."', 7, $temp7, '$a7', $ansv7, '$temp_id')";
if (mysqli_query($conn, $sql77)) {
	
} else {
    echo "Error: " . $sql77 . "<br>" . mysqli_error($conn);
}

$sql8="SELECT aid, ansv FROM answer WHERE ansd='".$a8."'";
$result8 =mysqli_query($conn, $sql8);
$row8=mysqli_fetch_assoc($result8);
$temp8=$row8['aid'];
$ansv8=$row8['ansv'];
//echo "value is".$temp8;

$sql88 = "INSERT INTO enginfo (engid, qid, aid, ansdesc, rating, id ) VALUES ('".$eid."', 8, $temp8, '$a8', $ansv8, '$temp_id')";
if (mysqli_query($conn, $sql88)) {
	
} else {
    echo "Error: " . $sql88 . "<br>" . mysqli_error($conn);
}
/*
//echo $a9;
//$a9 = mysql_real_escape_string($_POST['a9']);
$sql99="INSERT INTO feedt (engid, commt, date, time) VALUES ('".$eid."', '$a9', '$today', '$time')";
if (mysqli_query($conn, $sql99)) {

} else {
    echo "Error: " . $sql99 . "<br>" . mysqli_error($conn);
}
*/
echo "form completed";
//header("Location:res.php");
	//include 'res.php';


}
else{
	//echo "complete the form before submitting";
	$count=0;
	
}
