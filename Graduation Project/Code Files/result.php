<!DOCTYPE html>
<html>
<head>
    <title>Result Dashboard</title>
    <style>
        body {
            background-image: url('B12.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
        .container {
        width: 80%;
        margin: 0 auto;
        text-align: center;
        background-color: rgba(255, 255, 255, 0.8);
        padding: 20px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .score {
        font-size: 24px;
        margin-bottom: 20px;
    }

    .percentage {
        margin-bottom: 10px;
    }

    .chart-container {
        width: 300px;
        height: 300px;
        margin-bottom: 20px;
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
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }
    .back-button {
            position: absolute;
            top: 15px;
            right: 3px;
            background-color: #008000;
            color: #ffffff;
            font-size: 13px;
            padding: 3px 3px;
            border-radius: 10px;
            text-decoration: none;
            z-index: 9999; /* Updated z-index value */
        }

    .study-material {
        margin-top: 20px;
        font-size: 14px;
    }

    .charts-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
    }

    .chart-item {
        width: calc(33% - 20px);
    }
</style>
</head>
<body>
<div class="logo"></div>
<a href="sdashboard.php" class="back-button">Back to dashboard</a>
<?php
// PHP code for data retrieval and calculation
// Retrieve the submitted answers
$answers = [];
$questionNumbers = [];
foreach ($_POST as $key => $value) {
if (substr($key, 0, 3) === "ans") {
$questionNumber = substr($key, 3);
$answers[$questionNumber] = $value;
$questionNumbers[] = $questionNumber;
}
}

// Process the answers and calculate the score
$score = 0;
$easyCorrect = 0;
$mediumCorrect = 0;
$hardCorrect = 0;

// Connect to the database
include_once "connection.php";

// Create a placeholder for the correct options
$correctOptions = [];
$topics = [];

// Retrieve the correct answers and questions from the database
$query = "SELECT question_number, right_ans, question, question_type,question_topic FROM questions WHERE question_number IN (" . implode(',', $questionNumbers) . ")";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
$questionNumber = $row['question_number'];
$correctOption = $row['right_ans'];
$question = $row['question'];
$questionType = $row['question_type'];
$topic = $row['question_topic'];
// Store the correct option in the array
$correctOptions[$questionNumber] = $correctOption;
$topics[$questionNumber] = $topic;

// Check if the selected option matches the correct option
if ($answers[$questionNumber] == $correctOption) {
    $score++;

    // Increment the correct count for the respective question type
    if ($questionType === 'easy') {
        $easyCorrect++;
    } elseif ($questionType === 'medium') {
        $mediumCorrect++;
    } elseif ($questionType === 'hard') {
        $hardCorrect++;
    }
}

// Update the 'given_ans' column in the result with the user's answer
$updateQuery = "UPDATE rtable SET given_ans = ? WHERE question_number = ?";
$stmt = mysqli_prepare($conn, $updateQuery);
mysqli_stmt_bind_param($stmt, 'si', $answers[$questionNumber], $questionNumber);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
}

// Calculate percentages
$totalQuestions = count($answers);
$totalScore = $score;
$totalPercentage = ($totalScore / $totalQuestions) * 100;

// Calculate counts for each difficulty level
$query = "SELECT COUNT(*) AS count FROM questions WHERE question_type = 'easy'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$totalEasy = $row['count'];

$query = "SELECT COUNT(*) AS count FROM questions WHERE question_type = 'medium'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$totalMedium = $row['count'];

$query = "SELECT COUNT(*) AS count FROM questions WHERE question_type = 'hard'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$totalHard = $row['count'];

// Calculate percentages for each difficulty level
$simplePercentage = ($easyCorrect / $totalEasy) * 100;
$mediumPercentage = ($mediumCorrect / $totalMedium) * 100;
$hardPercentage = ($hardCorrect / $totalHard) * 100;

// Store the result values in the 'result'
$studentName = ""; // Initialize the student name variable

// Retrieve the student name from the users table
session_start();
$username = isset($_SESSION['uname']) ? $_SESSION['uname'] : '';

// Fetch the student name from the users table based on the username
if (!empty($username)) {
$selectQuery = "SELECT username FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $selectQuery);
$row = mysqli_fetch_assoc($result);
$studentName = $row['username'];
} else {
$studentName = '';
}

// Prepare the insert query for inserting result values into the 'result'
$insertQuery = "INSERT INTO rtable (student_name, question_number, right_ans, given_ans, correct, topic, total_score, total_percentage, simple_percentage, medium_percentage, hard_percentage) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $insertQuery);

foreach ($answers as $questionNumber => $selectedOption) {
$correct = 0;
$correctOption = $correctOptions[$questionNumber];
$topic = $topics[$questionNumber];
if ($correctOption == $selectedOption) {
$correct = 1;
}
mysqli_stmt_bind_param($stmt, 'sissisidddd', $studentName, $questionNumber, $correctOption, $selectedOption, $correct, $topic, $totalScore, $totalPercentage, $simplePercentage, $mediumPercentage, $hardPercentage);
mysqli_stmt_execute($stmt);
}

// Close the statement
mysqli_stmt_close($stmt);

// Close the database connection
mysqli_close($conn);
?>

<div class="container">
    <div>
        <h1>Result Dashboard</h1>
        <div class="score">
            Your score is: <?php echo $score; ?> out of <?php echo $totalQuestions; ?>
        </div>
        <div class="percentage">
            Total Percentage: <?php echo number_format($totalPercentage, 2); ?>%
        </div>
    </div>
    <div class="charts-container">
    <div class="chart-item">
        <div class="chart-container">
            <canvas id="simple-chart"></canvas>
            <div class="percentage">Simple: <?php echo number_format($simplePercentage, 2); ?>%</div>
        </div>
    </div>
    <div class="chart-item">
        <div class="chart-container">
            <canvas id="medium-chart"></canvas>
            <div class="percentage">Medium: <?php echo number_format($mediumPercentage, 2); ?>%</div>
        </div>
    </div>
    <div class="chart-item">
        <div class="chart-container">
            <canvas id="hard-chart"></canvas>
            <div class="percentage">Hard: <?php echo number_format($hardPercentage, 2); ?>%</div>
        </div>
    </div>
</div>

<div class="study-material">
    <?php if ($totalPercentage < 100): ?>
        According to your performance & score, you can check out the personalized & customized study material generated only for you with the topics in which you have difficulties we analyzed, so that you can gather knowledge better & perform better next time:<br>
        <a href="Customize.php">Customized Study Material</a>
    <?php else: ?>
        Congrats, you have successfully outshined the test with full marks. For gathering more knowledge & upskill your capabilities, you can check out our Study Material page. Wish you happy learning!
        <br>
        <a href="S.Material.html">Study Material</a>
    <?php endif; ?>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // JavaScript code for rendering the charts
    var simplePercentage = <?php echo $simplePercentage; ?>;
    var mediumPercentage = <?php echo $mediumPercentage; ?>;
    var hardPercentage = <?php echo $hardPercentage; ?>;

    var simpleChart = new Chart(document.getElementById("simple-chart"), {
        type: 'doughnut',
        data: {
            labels: ['Correct', 'Incorrect'],
            datasets: [{
                data: [simplePercentage, 100 - simplePercentage],
                backgroundColor: ['Orange', '#FF6384'],
                hoverBackgroundColor: ['#36A2EB', '#FF6384']
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Simple Questions'
            }
        }
    });

    var mediumChart = new Chart(document.getElementById("medium-chart"), {
        type: 'doughnut',
        data: {
            labels: ['Correct', 'Incorrect'],
            datasets: [{
                data: [mediumPercentage, 100 - mediumPercentage],
                backgroundColor: ['Blue', '#FF6384'],
                hoverBackgroundColor: ['#36A2EB', '#FF6384']
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Medium Questions'
            }
        }
    });

    var hardChart = new Chart(document.getElementById("hard-chart"), {
        type: 'doughnut',
        data: {
            labels: ['Correct', 'Incorrect'],
            datasets: [{
                data: [hardPercentage, 100 - hardPercentage],
                backgroundColor: ['Green', '#FF6384'],
                hoverBackgroundColor: ['#36A2EB', '#FF6384']
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Hard Questions'
            }
        }
    });
</script>
</div>
</body>
</html>