<?php
    include '../includes/header.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Chapters</title>
    <style>
        .title {
            font-weight: bold;
            text-decoration: underline;
            margin-left: 20px; /* Add margin between the button and the heading */
        }
        .centered {
            text-align: center;
        }
        .container {
            display: flex; 
            align-items: center; 
            justify-content: space-between; 
            margin-bottom: 20px; 
        }
        button {
            padding: 10px 20px; 
            font-size: 25px; 
            background-color: lightblue; 
            color: #ffffff; 
            border: none; 
            border-radius: 5px; 
            cursor: pointer; 
            text-decoration: none; 
        }
        button:hover {
            background-color: #2980b9; 
        }
        
        button a {
            color: inherit; 
            text-decoration: none; 
        }
        input.product-search-input{
            width: 13vw;
            font-size: 1vw;
            height: 2vw;
            min-height: 2vw;
            margin-left: 20px; 
        }
     
        div.search-container{
            display: flex;
            align-items: center;
        }
        div.pad{
            padding:10px;
        }
        div.blue{
            height:750px;
            border: 1px ;
            margin: 20px;
            padding: 10px;
            background-color: lightblue; 
            align-items: center;
            box-sizing: border-box;
        }
        div.blue1{
            height:20%;
            border: 1px ;
            margin: 20px;
            padding: 10px;
            background-color: #DEFDFF; 
            text-align: left;
            box-sizing: border-box;
        }
        div.L1{
            text-align: center;
            width: 100%;
            margin-bottom: 10px;
        }
        .L2{
            background-color: lightskyblue;
            font-size: 24px;
            border-radius: 5px;
            width: 80%;
            float: left;
        }
        .left{
            float: left;
        }
        .right{
            float: right;
        }
        button1 {
            font-size: 25px; 
            background-color: lightskyblue;
            color: black; 
            border-radius: 5px; 
            cursor: pointer; 
            border: none;
            margin-left: 10px;
        }
        button1:hover {
            background-color: #2980b9; 
        }
        .example{
            font-size: 20px;
        }
    </style>
</head>
<body>
<div class="container pad">
        <button><a href="../teacher/viewChapters.php" style="vertical-align: middle;">Back</a></button>
        <h1 class="title centered">Chapter name</h1>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['code'])) {
                $code = $_POST['code'];
                
                if ($code === '1') {
                    echo '<form action="editcontent.php" method="POST" enctype="multipart/form-data" style = "display:inline;">
                        <button name="code" value = "1" style="vertical-align: middle;"><a>update</a></button>
                        </form>';
                } 
                else if ($code === '2') {
                    echo '<form action="editcontent.php" method="POST" enctype="multipart/form-data" style = "display:inline;">
                        <button name="code" value = "2" style="vertical-align: middle;"><a>update</a></button>
                        </form>';
                } 
                else if ($code === '3') {
                    echo '<form action="editcontent.php" method="POST" enctype="multipart/form-data" style = "display:inline;">
                        <button name="code" value = "3" style="vertical-align: middle;"><a>update</a></button>
                        </form>';
                } 
                else if ($code === '4') {
                    echo '<form action="editcontent.php" method="POST" enctype="multipart/form-data" style = "display:inline;">
                        <button name="code" value = "4" style="vertical-align: middle;"><a>update</a></button>
                        </form>';
                } 
                else if ($code === '5') {
                    echo '<form action="editcontent.php" method="POST" enctype="multipart/form-data" style = "display:inline;">
                        <button name="code" value = "5" style="vertical-align: middle;"><a>update</a></button>
                        </form>';
                } 
                else {
                    echo "Invalid code value!";
                }
            } 
            else {
                echo "Code parameter is missing!";
            }
        }
        ?>
    </div>
    <div class="blue">
        <?php
            include('../modules/config.php');
            $courseID = $_SESSION['courseID'];
            $sql = "SELECT * FROM course WHERE CourseID = '$courseID'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
        ?>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['code'])) {
                $code = $_POST['code'];
                
                if ($code === '1') {
                    echo '<div class= "blue1">
                        <label class="example">Example:</label><br>
                            <a>'.$row["example1"].'</a>
                        </div>
                        <div class= "blue1">
                        <label class="example">Explanation:</label><br>
                            <a>'.$row["explanation1"].'</a>
                        </div>
                        <div class= "blue1">
                        <label class="example">Question:</label><br>
                            <a>'.$row["question1"].'</a>
                        </div>
                        <div class= "blue1">
                        <label class="example">Answer:</label><br>
                            <a>'.$row["answer1"].'</a>
                        </div>';
                } 
                else if ($code === '2') {
                    echo '<div class= "blue1">
                    <label class="example">Example:</label><br>
                            <a>'.$row["example2"].'</a>
                        </div>
                        <div class= "blue1">
                        <label class="example">Explanation:</label><br>
                            <a>'.$row["explanation2"].'</a>
                        </div>
                        <div class= "blue1">
                        <label class="example">Question:</label><br>
                            <a>'.$row["question2"].'</a>
                        </div>
                        <div class= "blue1">
                        <label class="example">Answer:</label><br>
                            <a>'.$row["answer2"].'</a>
                        </div>';
                } 
                else if ($code === '3') {
                    echo '<div class= "blue1">
                    <label class="example">Example:</label><br>
                        <a>'.$row["example3"].'</a>
                    </div>
                    <div class= "blue1">
                    <label class="example">Explanation:</label><br>
                        <a>'.$row["explanation3"].'</a>
                    </div>
                    <div class= "blue1">
                    <label class="example">Question:</label><br>
                        <a>'.$row["question3"].'</a>
                    </div>
                    <div class= "blue1">
                    <label class="example">Answer:</label><br>
                        <a>'.$row["answer3"].'</a>
                    </div>';
                } 
                else if ($code === '4') {
                    echo '<div class= "blue1">
                    <label class="example">Example:</label><br>
                        <a>'.$row["example4"].'</a>
                    </div>
                    <div class= "blue1">
                    <label class="example">Explanation:</label><br>
                        <a>'.$row["explanation4"].'</a>
                    </div>
                    <div class= "blue1">
                    <label class="example">Question:</label><br>
                        <a>'.$row["question4"].'</a>
                    </div>
                    <div class= "blue1">
                    <label class="example">Answer:</label><br>
                        <a>'.$row["answer4"].'</a>
                    </div>';
                } 
                else if ($code === '5') {
                    echo '<div class= "blue1">
                    <label class="example">Example:</label><br>
                        <a>'.$row["example5"].'</a>
                    </div>
                    <div class= "blue1">
                    <label class="example">Explanation:</label><br>
                        <a>'.$row["explanation5"].'</a>
                    </div>
                    <div class= "blue1">
                    <label class="example">Question:</label><br>
                        <a>'.$row["question5"].'</a>
                    </div>
                    <div class= "blue1">
                    <label class="example">Answer:</label><br>
                        <a>'.$row["answer5"].'</a>
                    </div>';
                } 
                else {
                    echo "Invalid code value!";
                }
            } 
            else {
                echo "Code parameter is missing!";
            }
        }
        ?>
    </div>
</body>
</html>
<?php
    include '../includes/footer.php';
?>