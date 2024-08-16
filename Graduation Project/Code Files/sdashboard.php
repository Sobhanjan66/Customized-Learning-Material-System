<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
         .container {
            width: 38%;
            margin: 0 auto;
            padding: 10px;
            background-color: rgba(256, 256, 256, 0.5);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        h1 {
            margin-top: 0;
            text-align: center;
            color:Black;
        }

    </style>
</head>
<body>
    
</body>
</html>
<?php
session_start();
if(!isset($_SESSION['login']))
{
    echo"invalid access";
    die;

}
if($_SESSION['login']=false)
{
    echo"invalid access";
    die;
}
$username=$_SESSION['uname'];
echo"<div class='container'>
<h1>Welcome  $username</h1>
</div>";

?>
<html>
<head>
    <title>Student Dashboard</title>
    <style>
       body {
			background-image: url('B7.jpg');
			background-size: cover;
			background-repeat: no-repeat;
			background-position: center top;
			font-family: Arial, sans-serif;
			color: #000000;
		}

       
        .options {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin-top: 220px;
        }

        .option {
            width: 18%;
            padding: 37px;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 10px;
            box-shadow: 2 2 7px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .option:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
        }

        .option img {
            display: block;
            margin: 0 auto 10px;
            width: 37%;
            height: auto;
        }

        .option h3 {
            margin: 0;
            text-align: center;
            color:yellow;
        }
        .butt
        {
            position: absolute;
            top: 7px;
            right: 10px;
            font-size: 16px;
            border: #000000 solid ;
            border-radius: 11px;
            background-color: #c86224;
	        color: white;
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
<a href="login.html"> <input type="button" class="butt" value="Back to Login"></a>
<div class="options">
			<a href="login.html" class="option">
				<img src="home.png" alt="Home">
				<h3>Home</h3>
			</a>
			<a href="S.Material.html" class="option">
				<img src="book.png" alt="Study Material">
				<h3>Study Material</h3>
			</a>
			<a href="gtest.php" class="option">
				<img src="test.png" alt="Test">
				<h3>test</h3>
			</a>
			<a href="result4.php" class="option">
				<img src="result.png" alt="Result">
				<h3>Result</h3>
			</a>
           <!-- <a href="customize.php" class="option">
				<img src="result.png" alt="Result">
				<h3>Customized Material</h3>
			</a>-->
		</div>
	</div>
</form>
</body>
</html>

