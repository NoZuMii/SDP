<?php
    include '../includes/header.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Homepage</title>
    <style>
            .title {
            font-weight: bold;
            text-decoration: underline;
            }
            .container {
            display: flex;
            flex-direction: row; 
            height: 1100px;
            }
            .box {
            flex-grow: 1;
            border: 1px solid black;
            margin: 100px;
            padding: 20px;
            background-color: whitesmoke; /* Set background color for the entire box */
            display: flex;
            justify-content: center; 
            align-items: center; 
            border-radius: 25px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
            border: none;
            }

            .box:hover{
                background-color: lightblue;
                color:white;    
            }

            .centered {
            text-align: center;
            }
            .box-content {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
            text-decoration: none;
            color: inherit;
            }

            h2{
                text-align: center;
                font-family: Arial, Helvetica, sans-serif;

            }
    </style>
</head>
<body>
    <h1 class="title centered">Teacher Homepage</h1>
        <div class="container">
            <div class="box">
                <a href="../teacher/quizcategory.php" class="box-content">
                    <h2>Quiz</h2>
                </a>
            </div>
            <div class="box">
                <a href="../teacher/viewCourses.php" class="box-content">
                    <h2>Courses</h2>
                </a>
            </div>
            <div class="box">
                <a href="../teacher/teacher_feedback.php" class="box-content">
                    <h2> My Feedbacks</h2>
                </a>
            </div>

            <div class="box">
                <a href="../teacher/student_feedback.php" class="box-content">
                    <h2>Student Feedbacks</h2>
                </a>
            </div>
        </div>
</body>
</html>
<?php
    include '../includes/footer.php';
?>