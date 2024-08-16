<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body {
            background-image: url('B8.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center top;
            font-family: Arial, sans-serif;
            color: #040303;
            font-size: 30px;
        }
        h1 {
            font-size: 49px;
            text-align: center;
        }
        .explanation-container {
            margin-top: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            width: 80%;
            margin: 0 auto;
            border-radius: 10px;
        }
        .explanation-heading {
            font-size: 28px;
            font-weight: bold;
            margin-top: 15px;
            text-align: left;
        }
        .explanation-content {
            font-size: 18px;
            margin-bottom: 10px;
            text-align: left;
        }
        .back-button {
            position: absolute;
            top: 15px;
            right: 10px;
            background-color:purple;
            color: #ffffff;
            font-size: 13px;
            padding: 3px 3px;
            border-radius: 10px;
            text-decoration: none;
            z-index: 9999;
        }
        .logo {
            position: absolute;
            top: 15px;
            left: 5px;
            width: 90px;
            height: 65px;
            background-image: url(logo-image2.png);
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>
<div class="logo"></div>
<a href="sdashboard.php" class="back-button">Back to dashboard</a>
<h1>Customized Study Material</h1>

<?php
include_once "connection.php";

session_start();
$username = isset($_SESSION['uname']) ? $_SESSION['uname'] : '';

// Calculate the total number of questions
$cmd = "SELECT COUNT(*) AS total_questions FROM questions";
$sql_result = mysqli_query($conn, $cmd);
$row = mysqli_fetch_assoc($sql_result);
$totquestion = $row['total_questions'];

// Calculate the number of incorrect answers
$wrongQuery = "SELECT COUNT(*) AS total_wrong FROM (SELECT correct FROM rtable WHERE student_name = '$username' ORDER BY id DESC LIMIT $totquestion) AS subquery WHERE correct = 0";
$wrongResult = mysqli_query($conn, $wrongQuery);
$row = mysqli_fetch_assoc($wrongResult);
$wrong = $row['total_wrong'];

// Fetch the student's wrong answered questions' topics' explanations from rtable
$query = "SELECT DISTINCT topic FROM rtable WHERE student_name = '$username' AND correct = 0 ORDER BY id DESC LIMIT $wrong";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $topic = $row['topic'];
        $explanationQuery = "SELECT explanation FROM smaterial WHERE topic = '$topic'";
        $explanationResult = mysqli_query($conn, $explanationQuery);
        
        echo "<div class='explanation-container'>";
        echo "<h3 class='explanation-heading'>$topic</h3>";
        
        while ($explanationRow = mysqli_fetch_assoc($explanationResult)) {
            $explanation = $explanationRow['explanation'];
            echo "<div class='explanation-content'>$explanation</div>";
        }
        
        echo "</div>";
    }
} else {
    echo "<div class='explanation-container'>No explanations available.</div>";
}

// Close the database connection
mysqli_close($conn);
?>

</body>
</html>
