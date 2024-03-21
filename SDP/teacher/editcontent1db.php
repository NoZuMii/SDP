<?php
if(isset($_POST['submit'])){
    include ('../modules/config.php');
    include ('../teacher/sessioncourse.php');

    $example1 = $_POST['example1'];
    $explanation1 = $_POST['explanation1'];
    $question1 = $_POST['question1'];
    $answer1 = $_POST['answer1'];

    $courseID = $_SESSION['courseID'];
            
    $sql = "UPDATE course SET example1 = '$example1',  explanation1 = '$explanation1', 
    question1 = '$question1', answer1 = '$answer1' 
    WHERE courseID = '$courseID'";
    mysqli_query($conn, $sql);
    header("Location: viewChapters.php");
                        
}
