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
    <title>Document</title>
    <style>
        
    #box {
        width: 200px;
        height: 250px;
        background-color: whitesmoke;
        border-radius: 10px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
        margin: 10px;
        padding: 10px;
        text-align: center;
        transition: background-color 0.3s ease;
    }

    #box:hover {
        background-color: lightblue;
    }


    .main-container {
        display: flex;
        flex-wrap: wrap;
        width: 100%;
        justify-content: space-around;
        margin-bottom: 300px;
    }

    .box {
        font-size: 20px;
        font-family: Arial, Helvetica, sans-serif;
        text-decoration: none;
        color: inherit;
    }
</style>
</head>
<body>
    <div class="main-container">
<?php
        include("conn.php");
        $sql = "SELECT * FROM badge WHERE userID = '$userID'";
        $result = mysqli_query($con,$sql);
        while($row = mysqli_fetch_array($result))
        {
            echo '<div class=box>';
            echo '<div id="box">';
            echo '<br>';
            echo '<br>';
            echo '<div> <img src="' . $row["badge_pic"] . '" alt="badgepic"></div>';
            echo '</div>';
            echo '</div>';
        } 
    ?>
    </div>

</body>
</html>
<?php
    include '../includes/footer.php';
?>