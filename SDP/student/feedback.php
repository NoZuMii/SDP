<?php
require "../modules/config.php";
if ($role != 'student'){
    header("Location: ../index.php");
    die;
}
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		// Assuming the user ID is already set in the session during login
		if (isset($_SESSION['userID'])) {
			$userID = $_SESSION['userID'];
			$subject = mysqli_real_escape_string($conn, $_POST['subject']); 
			$description = mysqli_real_escape_string($conn, $_POST['description']);// Sanitize user input
	
			// Assuming you have a way to determine the current date
			$dateCreated = date('Y-m-d H:i:s');
	
			$feedbackID = uniqid("F" . date('Ymd'));
	
			// Insert the feedback into the feedback table
			$insertFeedbackQuery = "INSERT INTO feedback (FeedbackID, userID, Feedback_Text, subject, date_created)
									VALUES ('$feedbackID', '$userID', '$description','$subject','$dateCreated')";
	
			if (mysqli_query($conn, $insertFeedbackQuery)) {
				echo "<script>alert('Feedback submitted successfully!'); location.href='./view_feedback.php';</script>";
			} else {
				$error[] = "Failed to submit feedback: " . mysqli_error($conn);
			}
		}
	}
    

	include '../includes/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<style>
		div.feedback{
			background-color: whitesmoke;
			margin-left: 25%;
			width: 50vw;
            height: 40vw;
			border-radius: 25px;
			box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
            margin-bottom: 50px;
		}
		h1{
			text-align: center;
			padding-left: 20px;
			padding-top: 50px;
			font-family: Arial, Helvetica, sans-serif;
			font-size: 50px;

		}

		h2{
			margin-left: 15%;
			font-family: Arial, Helvetica, sans-serif;
			font-size: 30px;
		}

		input.form-btn{
			display: inline-block;
            padding: 10px 30px;
            font-size: 20px;
            background: blue;
            color: black;
            margin: 0 5px;
            text-transform: capitalize;
			background-color: whitesmoke;
			margin-top: 20px;
			margin-left: 37.5%;
			border-radius: 10px;
			box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
			cursor: pointer;

		}
		
		input.form-btn:hover {
			background: lightblue;
            color: #ffffff;
		}

		textarea{
			margin-left: 15%;

		}
		textarea.subject{
			width: 50%;
			height: 7%;
            padding: 10px 15px;
			border-radius: 10px;
			box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
			font-size: 25px;
		}

		textarea.description{
			width: 70%;
			height: 40%;
            padding: 10px 15px;
			border-radius: 10px;
			box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
			font-size: 20px;
		}
		
	</style>
</head>
<body class="brehhh">
	<div class="feedback">
		<h1 class="agile_head text-center">Feedback Form</h1>
		<h3></h3>
		<form action="feedback.php" method="post" class="form">
			<h2>Subject</h2>
			<textarea class="subject" name="subject" required placeholder="Example:Admin:subject title"></textarea>
			<h2>Description</h2>
			<textarea class="description" name="description" required=""></textarea>
			<input type="submit" value="Submit Feedback" class="form-btn">
		</form>
	</div>
</body>
</html>

<?php
	include '../includes/footer.php';
?>