<?php
    session_start();
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        if(isset($_POST['courseID'])) {
            $courseID3 = $_POST['courseID'];
            
            $_SESSION['courseID3'] = $courseID3;
            
            header("Location: comfirmdeletecourse.php");
            exit(); 
        } else {
            echo "CourseID is not set!";
        }
    }
?>