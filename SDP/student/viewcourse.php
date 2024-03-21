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
    <title>View Courses</title>
    <style>
        
    #box {
        width: 200px;
        height: 250px;
        background-color: whitesmoke;
        border-radius: 10px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
        margin: 10px;
        padding: 30px;
        text-align: center;
        transition: background-color 0.3s ease;
    }

    #box:hover {
        background-color: lightblue;
    }

    .course_details {
        text-align: center;
    }

    .course-container {
        display: flex;
        flex-wrap: wrap;
        width: 100%;
        justify-content: space-around;
        margin-bottom: 300px;
    }

    .clickbox {
        font-size: 20px;
        font-family: Arial, Helvetica, sans-serif;
        text-decoration: none;
        color: inherit;
    }
</style>
</head>
<body>
    <div class="course-container">
    <?php
    include("conn.php");
    $sql = "SELECT * FROM course";
    $result = mysqli_query($con,$sql);
    while($row = mysqli_fetch_array($result)) {
        echo '<a href="Course.php?CourseID=' . $row["courseID"] . '" class="clickbox">';
        echo '<div id="box">';
        echo '<div class="course_details"> <img src="' . $row["Course_Pic"] . '" alt="coursepic"></div>';
        echo '<br>';
        echo '<div class="course_details"> Course Name: ' . $row["Course_name"] . '</div>';
        echo '</div>';
        echo '</a>';
    } 
?>
    </div>



    
</body>
</html>
<?php
    include '../includes/footer.php';
?>