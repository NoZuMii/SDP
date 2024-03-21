<?php
require '../modules/config.php'; // Validate user role
if ($role != 'student') {
    header('Location: ../index.php');
    die;
}
    include '../includes/student_header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium</title>

    <style>
        .premium-box {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 45%;
            height: 300px; 
            background-color: lightgray;
            border-radius: 10px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
            margin: 10px;
            padding: 20px;
            text-align: center;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif
        }
        p{
            font-size: 20px;
        }

        .premium-box h2 {
            font-size: 25px;
            margin-bottom: 10px;
        }

        .premium-container {
            display: flex;
            justify-content: space-between;
            margin: 50px auto; 
            max-width: 1200px; 

            .upgrade-button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .upgrade-button:hover {
            background-color: #0056b3;
        }

        .upgrade-button:hover::after {
            content: '\00a0 \2794'; 
            font-size: 0.8em;
            vertical-align: middle;
        }
        }
    </style>
</head>

<body>
    <div class="premium-container">
        <div class="premium-box">
            <h2>Basic Subscription (Your Current Status)</h2>
            <p>Access to Python and Java only </p>
        </div>
        <div class="premium-box">
            <h2>Premium Subscription</h2>
            <p>Access to all available courses.</p>
            <button class="upgrade-button" onclick="window.location.href='payment.php';">Upgrade Now</button>
        </div>
    </div>
</body>

</html>
<?php
    include '../includes/footer.php';
?>