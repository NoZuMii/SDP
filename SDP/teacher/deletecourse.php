<?php
if(isset($_POST['submit'])){
    include ('../modules/config.php');
    include ('../teacher/sessioncourse3.php');

    
    $courseID = $_SESSION['courseID3'];
            
    $sql = "DELETE FROM course WHERE CourseID=" .$courseID;

    mysqli_query($conn, $sql);
    header("Location: viewCourses.php");
    }