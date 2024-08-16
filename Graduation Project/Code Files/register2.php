<?php
include_once "connection.php";
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the form data
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$usertype = $_POST['usertype'];
$mobile = $_POST['mobile'];

// Insert the data into the database
$sql = "insert into users(username, email, password, usertype, mobile)values('$username','$email','$password','$usertype','$mobile')";
$sql_status=mysqli_query($conn,$sql);
if($sql_status)
{
 
    header('location:login.html');

}
else
{
    echo "login failed";
    echo mysqli_error($conn);
}
?>