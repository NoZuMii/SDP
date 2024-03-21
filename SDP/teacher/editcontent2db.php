<?php
if(isset($_POST['submit'])){
    include ('../modules/config.php');
    include ('../teacher/sessioncourse.php');

    $example2 = $_POST['example2'];
    $explanation2 = $_POST['explanation2'];
    $question2 = $_POST['question2'];
    $answer2 = $_POST['answer2'];

    $courseID = $_SESSION['courseID'];
            
    $sql = "UPDATE course SET example2 = '$example2',  explanation2 = '$explanation2', 
    question2 = '$question2', answer2 = '$answer2' 
    WHERE courseID = '$courseID'";
    mysqli_query($conn, $sql);
    header("Location: viewChapters.php");
}
?>
