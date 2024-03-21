<?php
if(isset($_POST['submit'])){
    include ('../modules/config.php');
    include ('../teacher/sessioncourse.php');

    $example5 = $_POST['example5'];
    $explanation5 = $_POST['explanation5'];
    $question5 = $_POST['question5'];
    $answer5 = $_POST['answer5'];

    $courseID = $_SESSION['courseID'];
            
    $sql = "UPDATE course SET example5 = '$example5',  explanation5 = '$explanation5', 
    question5 = '$question5', answer5 = '$answer5' 
    WHERE courseID = '$courseID'";
    mysqli_query($conn, $sql);
    header("Location: viewChapters.php");
}
?>
