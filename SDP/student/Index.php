<?php
require '../modules/config.php'; // Validate user role
if ($role != 'student') {
    header('Location: ../index.php');
    die;
}
    include '../includes/student_header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>

    <style>
    #box {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 400px;
        height: 250px;
        background-color: whitesmoke;
        border-radius: 10px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
        margin: 10px;
        padding: 10px;
        text-align: center;
        transition: background-color 0.3s ease; 
    }

    #box:hover {
        background-color: lightblue;
    }

    .clickbox {
        font-size: 20px;
        font-family: Arial, Helvetica, sans-serif;
        text-decoration: none;
        color: inherit;
    }
    .maincontainer {
            display: flex;
            flex-wrap: wrap;
            width: 100%;
            justify-content: space-around; 
            margin-bottom: 100px;
        }
        .left-section,
        .right-section {
            width: 20%; 
        }
    </style>
</head>

<body>
    <div class="maincontainer">
        <div class="left-section">
            <a href="viewcourse.php" class="clickbox">
                <div id="box" name="course">
                    <h1 id="title">Course</h1>
                </div>
            </a>
            <a href="feedback.php" class="clickbox">
                <div id="box">
                    <h1 id="title">Feedback</h1>
                </div>
            </a>
        </div>
        <div class="right-section">
            <a href="quizcategory.php" class="clickbox">
                <div id="box">
                    <h1 id="title">Quiz</h1>
                </div>
            </a>
            <a href="Badge.php" class="clickbox">
                <div id="box">
                    <h1 id="title">View Badge</h1>
                </div>
            </a>
        </div>
    </div>
</body>

</html>
<?php
    include '../includes/footer.php';
?>