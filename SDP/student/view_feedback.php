<?php
require '../modules/config.php';

// Redirect if the user is not a student
if ($role != 'student') {
    header('Location: ../index.php');
    die;
}

// Include header
include '../includes/student_header.php';

$currentUserID = $_SESSION['userID'];

// Retrieve feedback data from the database with a JOIN statement
$selectFeedbackQuery = "SELECT feedback.*, user.username, user.role FROM feedback
                        INNER JOIN user ON feedback.userID = user.userID
                        WHERE feedback.userID = '$currentUserID'";
$feedbackResult = mysqli_query($conn, $selectFeedbackQuery);

// Handle reply form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $feedbackID = $_POST['feedbackID']; // Assuming you have a hidden input in your form for feedbackID
    $replyText = $_POST['replyText'];

    // Update the feedback table with the reply
    $updateFeedbackQuery = "UPDATE feedback SET reply = '$replyText' WHERE FeedbackID = '$feedbackID'";
    if (!mysqli_query($conn, $updateFeedbackQuery)) {
        trigger_error("failed to send reply", E_USER_NOTICE);
        die;
    }
    echo "success";
    echo "<script> alert('reply has been submitted!'); window.location.href='./view_feedback.php';</script>";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Page</title>
    <style>
        /* Add your CSS styles here */
        .feedback-container {
            padding: 10px;
            margin-bottom: 10px;
            background-color: whitesmoke;
            margin-left: 20%;
            margin-right: 20%;
            border-radius: 10px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
            margin-bottom: 40px;

        }

        .feedback-content {
            flex-direction: column; /* Change to column layout */
            justify-content: left;
            align-items: center;
            font-size: 20px;
            font-family: Arial, Helvetica, sans-serif;
        }

        .popup-textarea {
            padding: 10px;
            border: none;
            border-radius: 5px;
            margin-top: 10px;
            height: 160px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
            width: 100%; /* Make the textarea full width */
        }

        .reply-button {
            background-color: lightblue;
            border: none;
            color: white;
            padding: 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
        }

        h1 {
            text-align: center;
            font-size: 50px;
            font-family: Arial, Helvetica, sans-serif

        }

        h2 {
            text-align: center;

        }

       .form-btn{
            display: inline-block;
            padding:  30px;
            font-size: 20px;
            color: lightblue ;
            margin: 0 5px;
            text-transform: capitalize;
            background-color: whitesmoke;
            margin-top: 10px;
            margin-left: 42.5%;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
            cursor: pointer;
            text-decoration: none;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 30px;

        }
        
        .form-btn:hover {
            background: lightblue;
            color: #ffffff;
        }
        
        h2 {
            text-align: center;
            display: block;
            margin-top: 10px;
            font-size: 20px;
            text-decoration: none;
            font-family: Arial, Helvetica, sans-serif;
        }
        
    </style>
</head>

<body>
    <h1> View Your Feedbacks</h1>

    <?php
    // Check if there is feedback data
    if (mysqli_num_rows($feedbackResult) > 0) {
        // Display feedback data
        while ($row = mysqli_fetch_assoc($feedbackResult)) {
            // Adjust column names based on your database structure
            echo "<div class='feedback-container'>";
            echo "<div class='feedback-content'>";
            echo "<p>Username: {$row['username']}</p>"; // Username from the user table
            echo "<p>Role: {$row['role']}</p>"; // Role from the user table
            echo "<p>Subject: {$row['subject']}</p>";
            echo "<p>Feedback Text: {$row['Feedback_Text']}</p>";
            echo "<p>Date Submitted: {$row['date_created']}</p>";
            echo "<p>reply: {$row['reply']}</p>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<h2>Currently you don't have any feedbacks.</h2>";
    }
    ?>
    <div class='send-feedback'>
    <a type="button" value="Send Feedback" class="form-btn" href='./feedback.php'>Send Feedback</a>
    </div>

  
    </body>

    </html>

    <?php
    // Include footer
    include '../includes/footer.php';
?>




     

    