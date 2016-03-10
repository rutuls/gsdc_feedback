
<?php

session_start();
// define variables and set to empty values

$a2Err =$a3Err=$a4Err=$a5Err=$a6Err=$a7Err=$a8Err=$a9Err="";
$a2 =$a3=$a4=$a5=$a6=$a7=$a8=$a9="";
$fg2=$fg3=$fg4=$fg5=$fg6=$fg7=$fg8=$fg9=0;
//if fields are empty then show the error message in the form and allow user to complete the submition
if ($_SERVER["REQUEST_METHOD"] == "POST")    
{
   if (empty($_POST["a2"])) {
     $a2Err = "Answer is required"; 
   } 
   else {
     $a2 = test_input($_POST["a2"]);
	 $fg2=1;
   }
   if (empty($_POST["a3"])) {
     $a3Err = "Answer is required";
   } 
   else {
     $a3 = test_input($_POST["a3"]); $fg3=1;
   } 
	 if (empty($_POST["a4"])) {
     $a4Err = "Answer is required";
   } 
   else {
     $a4 = test_input($_POST["a4"]); $fg4=1;
   }
   if (empty($_POST["a5"])) {
     $a5Err = "Answer is required";
   } 
   else {
     $a5 = test_input($_POST["a5"]); $fg5=1;
   }
   if (empty($_POST["a6"])) {
     $a6Err = "Answer is required";
   } 
   else {
     $a6 = test_input($_POST["a6"]); $fg6=1;
   }
    if (empty($_POST["a7"])) {
     $a7Err = "Answer is required";
   } 
   else {
     $a7 = test_input($_POST["a7"]); $fg7=1;
   }
   if (empty($_POST["a8"])) {
     $a8Err = "Answer is required";
   } 
   else {
     $a8 = test_input($_POST["a8"]); $fg8=1;
   }
   if (empty($_POST["a9"])) {
     $a9 = "";
   } 
   else {
     $a9 = test_input($_POST["a9"]); $fg9=1;
   }
   
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>