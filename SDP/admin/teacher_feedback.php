<?php
require '../modules/config.php';

// Redirect if the user is not an admin
if ($role != 'admin') {
    header('Location: ../index.php');
    die;
}

// Include header
include '../includes/header.php';

// Retrieve feedback data from the database with a JOIN statement
$selectFeedbackQuery = "SELECT feedback.*, user.username, user.role FROM feedback
                        INNER JOIN user ON feedback.userID = user.userID
                        WHERE user.role = 'teacher'";
                        
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
    echo "<script> alert('reply has been submitted!'); window.location.href='./teacher_feedback.php';</script>";
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
            background-color: whitesmoke;
            border: none;
            color: black;
            padding: 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
        }

        .reply-button:hover{
            background-color: lightblue;
            color:white
        }

        h1 {
            text-align: center;
            font-size: 50px;
            font-family: Arial, Helvetica, sans-serif
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
    <h1> View Teacher Feedbacks</h1>

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

            // Check if a reply has been submitted and conditionally display the textarea
            if (isset($row['reply']) && !empty($row['reply'])) {
                echo "<p>Reply: {$row['reply']}</p>";
            } else {
                // Add a "Reply" button with onclick attribute for redirection
                echo "<form method='post'>";
                echo "<input type='hidden' name='feedbackID' value='{$row['feedbackID']}'>";
                echo "<textarea class='popup-textarea' name='replyText' placeholder='Type your reply here'></textarea>";
                echo "<button type='submit' class='reply-button'>Reply</button>";
                echo "</form>";
            }

            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<h2>Currently you did not receive any feedbacks.</h2>";
    }
    ?>
</body>

</html>

<?php
// Include footer
include '../includes/footer.php';
?>