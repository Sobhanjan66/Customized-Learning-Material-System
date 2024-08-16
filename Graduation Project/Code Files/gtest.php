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
            margin-left: 505px;
        }
        .question {
            margin-top: 20px;
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
            z-index: 9999; /* Updated z-index value */
        }
        input[type=submit]
        {
            color: white;
            background-color:orange;
            padding: 10px;
            border-radius: 17px;
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
    <h1>Give test</h1>
    
    <form method="POST" action="result.php">
        <?php
        include_once "connection.php";
        $cmd = "SELECT * FROM questions";
        $sql_result = mysqli_query($conn, $cmd);
        $i = 1;
        while ($row = mysqli_fetch_assoc($sql_result)) {
            $questionNumber = $row['question_number']; // Retrieve the question number
            $ques = $row['question'];
            $op1 = $row['option1'];
            $op2 = $row['option2'];
            $op3 = $row['option3'];
            $op4 = $row['option4'];
        
            echo "<div class='question'>
                    $i. $ques<br>
                    <input type='radio' name='ans$questionNumber' value='$op1'> $op1<br>
                    <input type='radio' name='ans$questionNumber' value='$op2'> $op2<br>
                    <input type='radio' name='ans$questionNumber' value='$op3'> $op3<br>
                    <input type='radio' name='ans$questionNumber' value='$op4'> $op4<br>
                    <input type='hidden' name='ques$questionNumber' value='$ques'> <!-- Add hidden field for the question -->
                    <input type='hidden' name='correct_ans$questionNumber' value='{$row['right_ans']}'> <!-- Add hidden field for the correct ans -->
                  </div>";
            $i++;
        }
        ?>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
