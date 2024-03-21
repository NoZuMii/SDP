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
    <title>Payment Page</title>

    <style>
        .payment-form {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .form-group button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="payment-form">
        <h2>Enter Your Payment Information</h2>
        <form action="#" method="post">
            <div class="form-group">
                <label for="cardholder_name">Cardholder Name:</label>
                <input type="text" id="cardholder_name" name="cardholder_name" placeholder="Enter cardholder name" required>
            </div>
            <div class="form-group">
                <label for="card_number">Card Number:</label>
                <input type="text" id="card_number" name="card_number" placeholder="Enter card number" pattern="[0-9]{16}" title="Please enter a valid card number" required>
            </div>
            <div class="form-group">
                <label for="card_type">Card Type:</label>
                <select id="card_type" name="card_type" required>
                    <option value="">Select card type</option>
                    <option value="visa">Visa</option>
                    <option value="mastercard">Mastercard</option>
                </select>
            </div>
            <div class="form-group">
                <label for="expiry_date">Expiry Date:</label>
                <input type="text" id="expiry_date" name="expiry_date" placeholder="MM/YY" required>
            </div>
            <div class="form-group">
                <label for="cvv">CVV:</label>
                <input type="text" id="cvv" name="cvv" placeholder="Enter CVV" pattern="[0-9]{3,4}" title="Please enter a 3 or 4-digit CVV code" required>
            </div>
            <div class="form-group">
                <button type="submit">Continue</button>
            </div>
        </form>
    </div>
<?php
    include("conn.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $sql = "UPDATE user SET role = 'premium' WHERE userID = '$userID'";
        mysqli_query($con,$sql);
    }

?>
</body>

</html>
<?php
    include '../includes/footer.php';
?>