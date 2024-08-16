<?php
include_once "connection.php";
$topic=$_POST['tname'];
$notes=$_POST['ttext'];
 $sql="insert into smaterial(topic,explaination) values('$topic','$notes')";
 $sql_result=mysqli_query($conn,$sql);
 if($sql_result)
 {
 header('location:materialmore.html');
 }
 else{
    echo mysqli_error($conn);
 }
?>