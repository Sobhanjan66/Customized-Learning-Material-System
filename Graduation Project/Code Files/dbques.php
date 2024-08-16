<?php
include_once "connection.php";
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//Retrieve the last question number value
$query = "SELECT question_number FROM questions ORDER BY question_number DESC LIMIT 1";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $lastQuestionNumber = $row['question_number'];
    $newQuestionNumber = $lastQuestionNumber + 1;
} else {
    // If no previous questions exist, start with question number 1
    $newQuestionNumber = 1;
}
// Get the form data
$ques = $_POST['ques'];
$op1= $_POST['op1'];
$op2= $_POST['op2'];
$op3= $_POST['op3'];
$op4= $_POST['op4'];
echo $_POST['correctAnswer'];
if($_POST['correctAnswer']=="Option1")
{
    $op5= $_POST['op1'];
    echo ('op1');
}
elseif($_POST['correctAnswer']=="Option2")
{
    $op5= $_POST['op2'];
    echo ('op2');
}
elseif($_POST['correctAnswer']=="Option3")
{
    $op5= $_POST['op3'];
    echo ('op3');
}
else
{
    $op5= $_POST['op4'];
    echo ('op4');
}
$qtype= $_POST['qtype'];
$topic=$_POST['topic'];
static $question=1;
// Insert the data into the database
$sql = "insert into questions(question_number,question, option1, option2, option3, option4,right_ans,question_type,question_topic)values('$newQuestionNumber','$ques','$op1','$op2','$op3','$op4','$op5','$qtype','$topic')";

$sql_status=mysqli_query($conn,$sql);
if($sql_status)
{
 
   header('location:addmore.html');

}
else
{
    echo "login failed";
    echo mysqli_error($conn);
}
?>