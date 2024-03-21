<?php
if(isset($_POST['submit'])){
    include ('../modules/config.php');
    include ('../teacher/sessioncourse.php');

    $example4 = $_POST['example4'];
    $explanation4 = $_POST['explanation4'];
    $question4 = $_POST['question4'];
    $answer4 = $_POST['answer4'];

    $courseID = $_SESSION['courseID'];
            
    $sql = "UPDATE course SET example4 = '$example4',  explanation4 = '$explanation4', 
    question4 = '$question4', answer4 = '$answer4' 
    WHERE courseID = '$courseID'";
    mysqli_query($conn, $sql);
    header("Location: viewChapters.php");
}
?>
