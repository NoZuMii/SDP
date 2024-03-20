<?php
require '../modules/config.php';
include '../includes/header.php';

// Check if the user is not a teacher
if ($role != 'teacher') {
    include '../modules/access_denied.php';
    exit; // Stop further execution
}

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['userID'])) {
        $userID = $_SESSION['userID'];

        $quiz_category = mysqli_real_escape_string($conn, $_POST['Category']);
        $level = mysqli_real_escape_string($conn, $_POST['level']);    
        $question = mysqli_real_escape_string($conn, $_POST['question']);
        $option1 = mysqli_real_escape_string($conn, $_POST['option1']);
        $option2 = mysqli_real_escape_string($conn, $_POST['option2']);
        $option3 = mysqli_real_escape_string($conn, $_POST['option3']);
        $option4 = mysqli_real_escape_string($conn, $_POST['option4']);
        $correct_option_value = mysqli_real_escape_string($conn, $_POST['correct_option']); // Get the value of the correct option from dropdown

        switch ($correct_option_value) {
            case 'option1':
                $correct_option_text = $option1;
                break;
            case 'option2':
                $correct_option_text = $option2;
                break;
            case 'option3':
                $correct_option_text = $option3;
                break;
            case 'option4':
                $correct_option_text = $option4;
                break;
            default:
                // Handle error if no correct option is selected
                $error[] = "No correct option selected.";
                break;
        }

        // Generate a unique identifier for the question
        $questionID = uniqid("Q" . date('Ymd'));

        // Insert the question into the database
        $insert_sql = "INSERT INTO questions (QuestionID, quiz_category, userID, question, option1, option2, option3, option4, answer)
        VALUES ('$questionID', '$quiz_category', '$userID', '$question', '$option1', '$option2', '$option3', '$option4', '$correct_option_text')";

        if (mysqli_query($conn, $insert_sql))  {
            echo "<script>alert('Feedback submitted successfully!'); location.href='../teacher/index.php';</script>";
        } else {
            $error[] = "Failed to submit feedback: " . mysqli_error($conn);
        }   
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Question</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        /* Custom styles */
        .form-box {
            max-width: 1000px;
            margin: 0 auto;
            padding: 40px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: lightblue;
            margin-bottom: 40px;
        }
        .title1 {
            font-size: 30px;
            margin-bottom: 20px;
            text-align: center;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-control {
            height: 40px; 
            width: 100%; /* Set width to 100% */
        }
        textarea.form-control {
            height: 150px; 
            width: 100%; /* Set width to 100% */
        }
        .btn-submit {
            padding: 10px 20px;                                                         
            font-size: 25px; 
            background-color: #2980b9; 
            color: #ffffff; 
            border: none; 
            border-radius: 5px; 
            cursor: pointer; 
            text-decoration: none; 
            width: 100%; 
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center" style="margin-top: 50px;">
            <h1 class="title1">Add Question</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="form-box">
                <form class="form-horizontal title1" method="POST">
                    <div class="form-group">
                        <select class="form-control" id="Category" name="Category" required>
                            <option selected disabled>Select category</option>
                            <option value="Python">Python</option>
                            <option value="Java">Java</option>
                            <option value="CSS">CSS</option>
                            <option value="HTML">HTML</option>
                            <option value="JavaScript">JavaScript</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="level" id="level" class="form-control" required placeholder="Enter a level (ONLY NUMBERS)">
                    </div>
                    <div class="form-group">
                        <textarea id="question" name="question" class="form-control" rows="4" placeholder="Enter Question Text" required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" id="option1" name="option1" class="form-control" placeholder="Option 1" required>
                    </div>
                    <div class="form-group">
                        <input type="text" id="option2" name="option2" class="form-control" placeholder="Option 2" required>
                    </div>
                    <div class="form-group">
                        <input type="text" id="option3" name="option3" class="form-control" placeholder="Option 3" required>
                    </div>
                    <div class="form-group">
                        <input type="text" id="option4" name="option4" class="form-control" placeholder="Option 4" required>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="correct_option" name="correct_option" required>
                            <option selected disabled>Select correct option</option>
                            <option value="option1">Option 1</option>
                            <option value="option2">Option 2</option>
                            <option value="option3">Option 3</option>
                            <option value="option4">Option 4</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-submit" value="Submit" style="width: 100%;">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>

<?php
    include '../includes/footer.php';
?>