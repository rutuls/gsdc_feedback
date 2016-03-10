<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = new mysqli("localhost", "root", "", "shradb");
// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
} else {echo "";}
// Selecting Database
$db = mysqli_select_db($connection,"shradb");
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$sql="select username from login where username='".$user_check."'";
$ses_sql=mysqli_query($connection,$sql);
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['username'];
if(!isset($login_session)){
mysqli_close($connection); // Closing Connection
header('Location: index.php'); // Redirecting To Home Page
}
?>