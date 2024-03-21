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
            font-size: 25px; 
            background-color: lightskyblue;
            color: black; 
            border-radius: 5px; 
            cursor: pointer; 
            border: none;
            margin-left: 5px;
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
            height:500px;
            border: 1px ;
            margin: 20px;
            padding: 10px;
            background-color: lightblue; 
            align-items: center;
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
            font-family: Arial, Helvetica, sans-serif;
        }
        .right{
            float: right;
        }

        .default{
            padding: 10px 20px; 
                font-size: 25px; 
                background-color: #8BD0FE; 
                color: #ffffff; 
                border: none; 
                border-radius: 5px; 
                cursor: pointer; 
                text-decoration: none; 
        }

        .default:hover {
            background-color: #2980b9; 
            }
    </style>
</head>
<body>
        <?php
            include('../modules/config.php');
            $courseID = $_SESSION['courseID'];
            $sql = "SELECT * FROM course WHERE CourseID = '$courseID'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
        ?>
    <div class="container pad">
        <?php echo '<h1 class="title centered"> Chapter Name: '.$row["Course_name"].'</h1>'; ?>
        <button class="default"><a href="../teacher/viewCourses.php" style="vertical-align: middle;">Back</a></button>
    </div>
    <div class="blue">

            <div class="container1">
            <div class = "L1">
            <div class = "L2">
            <Quizname class = "left">Chapter 1</Quizname>
            </div>
            <form action="viewContent.php" method="POST" enctype="multipart/form-data" style = "display:inline;">
            <button name="code" value = "1"><a>view</a></button>
            </form>

            <form action="editcontent.php" method="POST" enctype="multipart/form-data" style = "display:inline;">
            <button name="code" value = "1"><a>update</a></button>
            </form>
            </div>
            </div>

            
            <div class="container1">
            <div class = "L1">
            <div class = "L2">
            <Quizname class = "left">Chapter 2</Quizname>
            </div>
            <form action="viewContent.php" method="POST" enctype="multipart/form-data" style = "display:inline;">
            <button name="code" value = "2"><a>view</a></button>
            </form>

            <form action="editcontent.php" method="POST" enctype="multipart/form-data" style = "display:inline;">
            <button name="code" value = "2"><a>update</a></button>
            </form>
            </div>
            </div>


            <div class="container1">
            <div class = "L1">
            <div class = "L2">
            <Quizname class = "left">Chapter 3</Quizname>
            </div>
            <form action="viewContent.php" method="POST" enctype="multipart/form-data" style = "display:inline;">
            <button name="code" value = "3"><a>view</a></button>
            </form>

            <form action="editcontent.php" method="POST" enctype="multipart/form-data" style = "display:inline;">
            <button name="code" value = "3"><a>update</a></button>
            </form>
            </div>
            </div>


            <div class="container1">
            <div class = "L1">
            <div class = "L2">
            <Quizname class = "left">Chapter 4</Quizname>
            </div>
            <form action="viewContent.php" method="POST" enctype="multipart/form-data" style = "display:inline;">
            <button name="code" value = "4"><a>view</a></button>
            </form>

            <form action="editcontent.php" method="POST" enctype="multipart/form-data" style = "display:inline;">
            <button name="code" value = "4"><a>update</a></button>
            </form>
            </div>
            </div>


            <div class="container1">
            <div class = "L1">
            <div class = "L2">
            <Quizname class = "left">Chapter 5</Quizname>
            </div>
            <form action="viewContent.php" method="POST" enctype="multipart/form-data" style = "display:inline;">
            <button name="code" value = "5"><a>view</a></button>
            </form>

            <form action="editcontent.php" method="POST" enctype="multipart/form-data" style = "display:inline;">
            <button name="code" value = "5"><a>update</a></button>
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