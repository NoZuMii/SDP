<?php
require '../modules/config.php'; // Validate user role
if ($role != 'student') {
    header('Location: ../index.php');
    die;
}
    include '../includes/student_header.php';

    if(isset($_GET['CourseID'])) {
        $CourseID = $_GET['CourseID'];
    } else {
        echo "Course ID is not set";  
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course</title>
    <style>
        
    #box {
        width: 90%;
        height: 250px;
        background-color: whitesmoke;
        border-radius: 10px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
        margin: 40px 5% 40px 5%;
        padding: 10px;
        text-align: center;
        transition: background-color 0.3s ease;
    }

    #box:hover {
        background-color: lightblue;
    }

    .course_details {
        text-align: center;
    }

    .clickbox {
        font-size: 20px;
        font-family: Arial, Helvetica, sans-serif;
        text-decoration: none;
        color: inherit;
    }
    .title {
        font-weight: bold; 
        text-decoration: underline;
        text-align: center;
        font-size: 50px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .chapter {
        text-align: center;
        font-size: 30px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 40px 5% 40px 5%;
    }

    p {
        font-size: 25px;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }
    .input {
        margin-top: 20px;
        text-align: center;
    }

    .input input[type="text"] 
    {
        width: 80%;
        padding: 10px;
        font-size: 18px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .input input[type="text"]:focus 
    {
        outline: none;
        border-color: lightblue;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }
    .submit-btn-container 
    {
            text-align: center;
    }


    .submit-btn 
    {
        padding: 15px 25px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 18px;
        margin-bottom: 20px;
    }


    .submit-btn:hover 
    {
        background-color: #0056b3;
    }
 
</style>
</head>
<body>
    
<?php
        include("conn.php");
        $sql = "SELECT * FROM course WHERE CourseID = $CourseID";
        $result = mysqli_query($con,$sql);
        $correctAnswersCount =0;
        $badgeID = uniqid("B" . date('Ymd'));
        while($row = mysqli_fetch_array($result))
        {
            echo '<h1 class=title>'.$row["Course_name"].'</h1>';
            echo '<form method="POST" action="#">';
            for($i = 1; $i <= 5; $i++) {
            echo '<h1 class=chapter>Chapter '.$i.'</h1>';
            echo '<div id="box">';
            echo '<h2>Example</h2>';
            echo '<p>'.$row["example".$i].'</p>';
            echo '</div>'; 
            echo '<div id="box">';
            echo '<h2>Explanation</h2>';
            echo '<p>'.$row["explanation".$i].'</p>';
            echo '</div>';
            echo '<div id="box">';
            echo '<h2>Question</h2>';
            echo '<p>'.$row["question".$i].'</p>';
            echo '<br>';
            echo '<div class="input">';
            echo '<input type="text" name="answer'.$i.'" required placeholder="answer">';
            echo '</div>';
            echo '</div>';
        }   
            echo'<div class = "submit-btn-container">';
            echo'<button type="submit" class="submit-btn">Complete Course</button>';
            echo'</div>';
            echo '</form>';

            if($_SERVER["REQUEST_METHOD"] == "POST") {
                for($i = 1; $i <= 5; $i++) {
                    if(isset($_POST["answer$i"])) {
                        $answer = $_POST["answer$i"];
                        if($answer == $row["answer$i"]) {
                            $correctAnswersCount++;
                        }
                    }
                }


                $badgeID = uniqid("B" . date('Ymd'));
                if($correctAnswersCount == 5) {
                    // All answers are correct
                    $sql = "INSERT INTO badge (badgeID, courseID, userID, badge_pic) VALUES ('$badgeID','$CourseID','$userID','$row[Badge]')";
                    mysqli_query($con,$sql);
                    echo "<script>alert('Congratulations! You have earned the GOLD badge for this course!');window.location.href='index.php';</script>";
                } elseif($correctAnswersCount ==4) {
                    $sql = "INSERT INTO badge (badgeID, courseID, userID, badge_pic) VALUES ('$badgeID','$CourseID','$userID','$row[Badge1]')";
                    mysqli_query($con,$sql);
                    echo "<script>alert('Congratulations! You have earned the SILVER badge for this course!');window.location.href='index.php';</script>";
                } elseif ($correctAnswersCount == 3){
                    $sql = "INSERT INTO badge (badgeID, courseID, userID, badge_pic) VALUES ('$badgeID','$CourseID','$userID','$row[Badge2]')";
                    mysqli_query($con,$sql);
                    echo "<script>alert('Congratulations! You have earned the BRONZE badge for this course!');window.location.href='index.php';</script>";
                }else{
                    echo "<script>alert('Congratulations! You have completed the course!');window.location.href='index.php';</script>";
                }
            
        } 
        }
    ?>
</body>


</html>
<?php
    include '../includes/footer.php';
?>

