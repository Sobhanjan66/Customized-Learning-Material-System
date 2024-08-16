<!DOCTYPE html>
<html>
<head>
    <title>Result History</title>
    <style>
        body {
            background-image: url('B12.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        .container {
            margin-bottom: 30px;
            padding: 20px;
            display: inline-block;
            background-color: rgba(255, 255, 255, 0.8);
            margin: 0 auto;
            text-align: center;
        }
        .back-button {
            position: absolute;
            top: 15px;
            right: 13px;
            background-color: #008000;
            color: #ffffff;
            font-size: 13px;
            padding: 3px 3px;
            border-radius: 10px;
            text-decoration: none;
            z-index: 9999; /* Updated z-index value */
        }
        .result-section {
            margin-bottom: 20px;
        }

        .chart-container {
            position: relative;
            width: 300px;
            height: 300px;
            margin: 10px;
            display: inline-block;
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

        .bottom-line {
            margin-top: 20px;
            border-bottom: 1px solid #000;
            padding-bottom: 10px;
        }
    </style>
</head>
<body>
<div class="logo"></div>
<a href="sdashboard.php" class="back-button">Back to dashboard</a>
<?php
// PHP code for retrieving and displaying result history

// Connect to the database
include_once "connection.php";

// Retrieve the student name
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

// Retrieve the result data for the student from the rtable
$query = "SELECT * FROM rtable WHERE student_name = '$studentName' ORDER BY id DESC LIMIT 1";
$result = mysqli_query($conn, $query);

// Retrieve the total number of questions from the last row in rtable
$totalQuestionsQuery = "SELECT question_number FROM rtable ORDER BY id DESC LIMIT 1";
$totalQuestionsResult = mysqli_query($conn, $totalQuestionsQuery);
$totalQuestionsRow = mysqli_fetch_assoc($totalQuestionsResult);
$totalQuestions = $totalQuestionsRow['question_number'];

// Display the result history
if ($row = mysqli_fetch_assoc($result)) {
    $attemptNumber = ceil($row['id'] / $totalQuestions); // Calculate attempt number based on user id and total questions
    $totalScore = $row['total_score'];
    $totalPercentage = $row['total_percentage'];
    $simplePercentage = $row['simple_percentage'];
    $mediumPercentage = $row['medium_percentage'];
    $hardPercentage = $row['hard_percentage'];

    echo "<div class='container'>
            <div class='result-section'>
                <h2>Your Last Attempt Result:</h2>
                <div class='score'>
                    Score: $totalScore out of $totalQuestions
                </div>
                <div class='percentage'>
                    Total Percentage: " . number_format($totalPercentage, 2) . "%
                </div>
            </div>

            <div class='chart-container'>
                <canvas id='simple-chart-$attemptNumber'></canvas>
                <div class='percentage'>Simple: " . number_format($simplePercentage, 2) . "%</div>
            </div>
            <div class='chart-container'>
                <canvas id='medium-chart-$attemptNumber'></canvas>
                <div class='percentage'>Medium: " . number_format($mediumPercentage, 2) . "%</div>
            </div>
            <div class='chart-container'>
                <canvas id='hard-chart-$attemptNumber'></canvas>
                <div class='percentage'>Hard: " . number_format($hardPercentage, 2) . "%</div>
            </div>
            
            <div class='bottom-line'>
                " . ($totalPercentage < 100 ? "According to your performance & score, you can check out the personalized & customized study material generated only for you with the topics in which you have difficulties we analyzed, so that you can gather knowledge better & perform better next time:
                <a href='customize.php'>Customized Study Material</a>" : "Congrats, you have successfully outshined the test with full marks. For gathering more knowledge & upskill your capabilities, you can check out our Study Material page. Wish you happy learning!
                <a href='S.Material.html'>Study Material</a>") . "
            </div>

        </div>";
}
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // JavaScript code for rendering the charts
    <?php
    if ($row) {
        echo "var simpleChart$attemptNumber = new Chart(document.getElementById('simple-chart-$attemptNumber'), {
            type: 'doughnut',
            data: {
                labels: ['Correct', 'Incorrect'],
                datasets: [{
                    data: [$simplePercentage, " . (100 - $simplePercentage) . "],
                    backgroundColor: ['orange', '#ff6384']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                title: {
                    display: true,
                    text: 'Simple'
                }
            }
        });

        var mediumChart$attemptNumber = new Chart(document.getElementById('medium-chart-$attemptNumber'), {
            type: 'doughnut',
            data: {
                labels: ['Correct', 'Incorrect'],
                datasets: [{
                    data: [$mediumPercentage, " . (100 - $mediumPercentage) . "],
                    backgroundColor: ['blue', '#ff6384']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                title: {
                    display: true,
                    text: 'Medium'
                }
            }
        });

        var hardChart$attemptNumber = new Chart(document.getElementById('hard-chart-$attemptNumber'), {
            type: 'doughnut',
            data: {
                labels: ['Correct', 'Incorrect'],
                datasets: [{
                    data: [$hardPercentage, " . (100 - $hardPercentage) . "],
                    backgroundColor: ['green', '#ff6384']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                title: {
                    display: true,
                    text: 'Hard'
                }
            }
        });";
    }
    ?>
</script>
</body>
</html>
