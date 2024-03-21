<?php
    session_start();
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        if(isset($_POST['courseID'])) {
            $courseID2 = $_POST['courseID'];
            
            $_SESSION['courseID2'] = $courseID2;
            
            header("Location: editCourse.php");
            exit(); 
        } else {
            echo "CourseID is not set!";
        }
    }
?>