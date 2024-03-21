<?php
if(isset($_POST['submit'])){
    include ('../modules/config.php');
    include ('../teacher/sessioncourse.php');

    $example3 = $_POST['example3'];
    $explanation3 = $_POST['explanation3'];
    $question3 = $_POST['question3'];
    $answer3 = $_POST['answer3'];

    $courseID = $_SESSION['courseID'];
            
    $sql = "UPDATE course SET example3 = '$example3',  explanation3 = '$explanation3', 
    question3 = '$question3', answer3 = '$answer3' 
    WHERE courseID = '$courseID'";
    mysqli_query($conn, $sql);
    header("Location: viewChapters.php");
}
?>
