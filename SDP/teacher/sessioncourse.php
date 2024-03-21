<?php
    session_start();
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        if(isset($_POST['courseID'])) {
            $courseID = $_POST['courseID'];
            
            $_SESSION['courseID'] = $courseID;
            
            header("Location: viewChapters.php");
            exit(); 
        } else {
            echo "CourseID is not set!";
        }
    }
?>