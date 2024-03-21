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
            .default-button {
                padding: 8px 10px;
                font-size: 16px;
                background-color: #82E2FA;
                color: #FEFEFE;
                border: 0px solid #000000; 
                border-radius: 5px;
                cursor: pointer;
                text-decoration: none;
                margin-left: 10px;
                margin-bottom: 5px;
            }

            .default-button:hover {
                background-color: #B0DFFE;
            }
            .title {
                font-weight: bold;
                text-decoration: underline;
                margin-left: 20px;
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
                background-color: 7AF7FF; 
                color: #00565C; 
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

            div.container1{
                container-type: size;
                background-color: #DEFDFF;
                width: 220px;
                height: 360px;
                float: left;
                margin: 10px;
            }
            .coursesname{
                font-size: 20px;
                text-align: center;
                align-items: center;
                margin-left: 10px;
            }
            .icon{
                margin-left: 10px;
                margin-top: 10px;
            }
            .bluebox{
            height:80%;
            border: 1px ;
            margin: 20px;
            padding: 10px;
            background-color: #DEFDFF; 
            text-align: left;
            box-sizing: border-box;
                
            }
        </style>
</head>
<body>
<div class="container pad">
<h1 class="title centered">Edit content</h1>
        <button><a href="../teacher/viewChapters.php" style="vertical-align: middle;">Back</a></button>
    </div>
    <div class="blue">
        <?php
            include('../modules/config.php');
            $courseID = $_SESSION['courseID'];
            $sql = "SELECT * FROM course WHERE CourseID = '$courseID'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
        ?>

        <div class="bluebox">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['code'])) {
                $code = $_POST['code'];
                if ($code === '1') {
                    echo '<form action="editcontent1db.php" method="POST">
                    <label for="example1">Example 1:</label><br>
                    <textarea id="example1" name="example1" rows="4" cols="50" placeholder="Enter your example here..."></textarea><br><br>
                
                    <label for="explanation1">Explanation 1:</label><br>
                    <textarea id="explanation1" name="explanation1" rows="4" cols="50" placeholder="Enter your explanation here..."></textarea><br><br>
                
                    <label for="question1">Question 1:</label><br>
                    <textarea id="question1" name="question1" rows="4" cols="50" placeholder="Enter your question here..."></textarea><br><br>
                
                    <label for="answer1">Answer 1:</label><br>
                    <textarea id="answer1" name="answer1" rows="4" cols="50" placeholder="Enter your answer here..."></textarea><br><br>
                
                    <button type="submit" name="submit">submit</button>
                    </form>';
                } 
                else if ($code === '2') {
                    echo '<form action="editcontent2db.php" method="POST">
                    <label for="example2">Example 2:</label><br>
                    <textarea id="example2" name="example2" rows="4" cols="50" placeholder="Enter your example here..."></textarea><br><br>
                
                    <label for="explanation2">Explanation 2:</label><br>
                    <textarea id="explanation2" name="explanation2" rows="4" cols="50" placeholder="Enter your explanation here..."></textarea><br><br>
                
                    <label for="question2">Question 2:</label><br>
                    <textarea id="question2" name="question2" rows="4" cols="50" placeholder="Enter your question here..."></textarea><br><br>
                
                    <label for="answer2">Answer 2:</label><br>
                    <textarea id="answer2" name="answer2" rows="4" cols="50" placeholder="Enter your answer here..."></textarea><br><br>
                
                    <button type="submit" name="submit">submit</button>
                    </form>';
                } 
                else if ($code === '3') {
                    echo '<form action="editcontent3db.php" method="POST">
                    <label for="example3">Example 3:</label><br>
                    <textarea id="example3" name="example3" rows="4" cols="50" placeholder="Enter your example here..."></textarea><br><br>
                
                    <label for="explanation3">Explanation 3:</label><br>
                    <textarea id="explanation3" name="explanation3" rows="4" cols="50" placeholder="Enter your explanation here..."></textarea><br><br>
                
                    <label for="question3">Question 3:</label><br>
                    <textarea id="question3" name="question3" rows="4" cols="50" placeholder="Enter your question here..."></textarea><br><br>
                
                    <label for="answer3">Answer 3:</label><br>
                    <textarea id="answer3" name="answer3" rows="4" cols="50" placeholder="Enter your answer here..."></textarea><br><br>
                
                    <button type="submit" name="submit">submit</button>
                    </form>';
                } 
                else if ($code === '4') {
                    echo '<form action="editcontent4db.php" method="POST">
                    <label for="example4">Example 4:</label><br>
                    <textarea id="example4" name="example4" rows="4" cols="50" placeholder="Enter your example here..."></textarea><br><br>
                
                    <label for="explanation4">Explanation 4:</label><br>
                    <textarea id="explanation4" name="explanation4" rows="4" cols="50" placeholder="Enter your explanation here..."></textarea><br><br>
                
                    <label for="question4">Question 4:</label><br>
                    <textarea id="question4" name="question4" rows="4" cols="50" placeholder="Enter your question here..."></textarea><br><br>
                
                    <label for="answer4">Answer 4:</label><br>
                    <textarea id="answer4" name="answer4" rows="4" cols="50" placeholder="Enter your answer here..."></textarea><br><br>
                
                    <button type="submit" name="submit">submit</button>
                    </form>';
                } 
                else if ($code === '5') {
                    echo '<form action="editcontent5db.php" method="POST">
                    <label for="example5">Example 5:</label><br>
                    <textarea id="example5" name="example5" rows="4" cols="50" placeholder="Enter your example here..."></textarea><br><br>
                
                    <label for="explanation5">Explanation 5:</label><br>
                    <textarea id="explanation5" name="explanation5" rows="4" cols="50" placeholder="Enter your explanation here..."></textarea><br><br>
                
                    <label for="question5">Question 5:</label><br>
                    <textarea id="question5" name="question5" rows="4" cols="50" placeholder="Enter your question here..."></textarea><br><br>
                
                    <label for="answer5">Answer 5:</label><br>
                    <textarea id="answer5" name="answer5" rows="4" cols="50" placeholder="Enter your answer here..."></textarea><br><br>
                
                    <button type="submit" name="submit">submit</button>
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


    </div>
</body>
</html>
<?php
    include '../includes/footer.php';
?>