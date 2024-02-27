<?php
require "../modules/config.php";
if ($role != 'admin'){
    header("Location: ../index.php");
    die;

if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $feedback = $_POST["feedback"];

    // Validation
    if($name != "" && $feedback != ""){
        // Prepare and bind SQL statement
        $stmt = $conn->prepare("INSERT INTO feedback (, Feedback) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $feedback);

        // Execute the statement
        if ($stmt->execute()) {
            echo "<script>alert('Your feedback uploaded successfully')</script>";
        } else {
            echo "<script>alert('Error: " . $conn->error . "')</script>";
        }

        // Close statement
        $stmt->close();
    } else {
        echo '<script>alert("Please fill in all the fields")</script>';
    }
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <style>
        /* Your CSS styles here */
    </style>
</head>
<body>
    <section id="container">
        <h1>Feedback</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
            <input type="text" name="name" id="name" placeholder="Name" required>
            <input type="text" name="feedback" id="feedback" placeholder="Feedback" required>
            <input type="submit" value="Upload" name="submit">
        </form>
        <a href="Dashboard.php">Back</a> 
    </section>

</body>
</html>