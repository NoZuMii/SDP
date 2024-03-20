            <?php
require "../modules/config.php";
if ($role != 'teacher'){
    header("Location: ../index.php");
    die;
}

include '../includes/header.php';

$currentUserID = $_SESSION['userID'];

// Assuming you have established a database connection, you can query your database
$query = "SELECT QuestionID, lvl, question, option1, option2, option3, option4, answer FROM questions WHERE quiz_category = 'Java' ORDER BY lvl ASC";
$JavaResult = mysqli_query($conn, $query);
if (!$JavaResult) {
    die("Query failed: " . mysqli_error($conn));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['delete'])) {
        // Handle form submission to delete the question
        $questionID = $_POST['questionID'];
        
        // Delete the question from the database
        $deleteQuery = "DELETE FROM questions WHERE QuestionID = '$questionID'";
        $deleteResult = mysqli_query($conn, $deleteQuery);
        if ($deleteResult) {
            echo "<script>alert('Question has been deleted!'); window.location.href='./Java.php';</script>";
        } else {
            trigger_error("Failed to delete question", E_USER_NOTICE);
        }
    } elseif(isset($_POST['edit'])) {
        // Handle form submission to update the database
        $lvl = $_POST['level'];
        $questionID = $_POST['questionID'];
        $question = $_POST['question'];
        $newAnswer = $_POST['answer'];
        $newOption1 = $_POST['option1'];
        $newOption2 = $_POST['option2'];
        $newOption3 = $_POST['option3'];
        $newOption4 = $_POST['option4'];

        // Update the question in the database
        $updateQuery = "UPDATE questions SET answer = '$newAnswer', 
                         question = '$question',
                         lvl = '$lvl',
                         option1 = '$newOption1', 
                         option2 = '$newOption2', 
                         option3 = '$newOption3', 
                         option4 = '$newOption4' 
                         WHERE QuestionID = '$questionID'";
        $updateResult = mysqli_query($conn, $updateQuery);
        if ($updateResult) {     
            echo "<script>alert('Question has been updated!'); window.location.href='./Java.php';</script>";
        } else {
            trigger_error("Failed to update question and answer", E_USER_NOTICE);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Java questions</title>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Java questions</title>
    <style>
    .question-container {
        padding: 10px;
        background-color: whitesmoke;
        margin-left: 20%;
        margin-right: 20%;
        border-radius: 10px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
        margin-bottom: 40px;
        padding-bottom: 30px;
    }

    .question-content {
        text-align: center; /* Center content horizontally */
        font-size: 20px;
        font-family: Arial, Helvetica, sans-serif;
    }

    .options-container {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-gap: 10px;
        justify-items: center; /* Center items horizontally in the grid */
        text-align: center; /* Center text within options */
    }

    .options-container input[type="text"] {
        border: 1px solid #ccc;
        padding: 10px;
        border-radius: 10px;
        width: 90%; /* Set fixed width for the options */
        height: 60px; /* Set fixed height for the options */
    }

    h1 {
        text-align: center;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 50px;
    }

    button.submit {
        background-color:lightblue; /* Blue color */
        color: white; /* White text color */
        border: none;
        padding: 15px 30px; /* Larger padding */
        border-radius: 10px;
        font-size: 20px; /* Larger font size */
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button.submit:hover {
        background-color: #0056b3; /* Darker blue on hover */
    }

    select {
        width: 40%;
        padding: 10px;
        border-radius: 10px;
        border: 1px solid #ccc;
        font-size: 16px;
        margin-top: 10px;
    }

    .level {
        text-align: left; /* Align to the left */
        font-size: 18px; /* Adjust font size */
        font-weight: bold; /* Make it bold */
        font-family: Arial, Helvetica, sans-serif;
    }

    textarea {
        width: 90%;
        height: 150px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 10px;
        font-size: 18px;
        margin-top: 10px;
    }
</style>
</head>
<body>
<h1>View Java questions</h1>
<?php
    // Check if there are questions
    if (mysqli_num_rows($JavaResult) > 0) {
        // Display questions
        while ($row = mysqli_fetch_assoc($JavaResult)) {
            
            echo "
            <div class='question-container'>
                <form method=\"post\">
                    <input type=\"hidden\" name=\"questionID\" value=\"" . $row['QuestionID'] . "\">
                    <div class='level'>
                        <p>level: <input type='text' name='level' value='" . $row['lvl'] . "'></p>
                    </div>
                    <div class='question-content'>
                        <textarea name='question' rows='4'>" . $row['question'] . "</textarea>
                        <br>
                        <br>
                        <div class='options-container'>    
                            <input type='text' name='option1' value='" . $row['option1'] . "'>
                            <input type='text' name='option2' value='" . $row['option2'] . "'>
                            <input type='text' name='option3' value='" . $row['option3'] . "'>
                            <input type='text' name='option4' value='" . $row['option4'] . "'>
                        </div>
                        <p>Answer: " . $row['answer'] . "</p>
                        <select name='answer'>
                            <option value='" . $row['option1'] . "'>" . $row['option1'] . "</option>
                            <option value='" . $row['option2'] . "'>" . $row['option2'] . "</option>
                            <option value='" . $row['option3'] . "'>" . $row['option3'] . "</option>
                            <option value='" . $row['option4'] . "'>" . $row['option4'] . "</option>
                        </select>
                        <button class='submit' type='submit' name='edit'>Edit</button>
                        <button class='submit' type='submit' name='delete'>Delete</button>
                    </div>
                </form>
            </div>
            ";
            
        }
    } else {
        echo "<h2>Currently there are no questions.</h2>";
    }
    ?>
</body>
</html>

<?php
    include '../includes/footer.php';
?>