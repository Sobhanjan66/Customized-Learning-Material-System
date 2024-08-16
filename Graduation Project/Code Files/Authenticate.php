<?php
include_once "connection.php";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$uname=$_POST['name'];
$upass=$_POST['pass'];
session_start();
$_SESSION['login']=false;
// Retrieve login credentials from the database
$sql = "SELECT * FROM users WHERE username ='$uname'";
$sql_result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($sql_result);
if($row['password']=$upass)
{
    $_SESSION['login']=true;
    $_SESSION['uname']=$row['username'];
    header('location:tdashboard.php');
}
else{
    echo"error";
}

?>