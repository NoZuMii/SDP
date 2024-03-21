<?php
    session_start();
    include '../includes/header.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>View Courses</title>
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
            flex-grow: 1;
            height:750px;
            border: 1px ;
            margin: 20px;
            padding: 10px;
            background-color: lightblue; 
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
                font-family: Arial, Helvetica, sans-serif;
            }
            .icon{
                margin-left: 10px;
                margin-top: 10px;
            }
        </style>
    </head>
    <body>
    <?php
            include('../modules/config.php');
            $sql = "SELECT * FROM course";
            $result = mysqli_query($conn,$sql);
        ?>
    <div class="container pad">
    <h1 class="title centered">Courses</h1>
            <button><a href="../teacher/addCourse.php" style="vertical-align: middle;">Add Course</a></button>
        </div>
    <div class="blue">
    <?php
        while ($row=mysqli_fetch_array($result))
        {
            echo '<div class="container1">';

            echo '<img class ="icon" src="../icons/';
            echo $row['Course_Pic'];
            echo '" alt="Python" width="200" height="200">';

            echo '<coursesname class = "coursesname">Course: ';
            echo $row['Course_name'];
            echo '</coursesname><br>';

            echo '<coursesname class = "coursesname"> Category: ';
            echo $row['course_category'];
            echo '</coursesname><br>';

            echo '<form action="sessioncourse2.php" method="POST" enctype="multipart/form-data" style = "display:inline;">
                <a><button class="default-button" name = "courseID" value = "'.$row['CourseID'].'">update</button></a>
                </form>';

            echo '<form action="sessioncourse.php" method="POST" enctype="multipart/form-data" style = "display:inline;">
                <a><button class="default-button" name = "courseID" value = "'.$row['CourseID'].'">view</button></a>
                </form>';

            echo '<form action="sessioncourse3.php" method="POST" enctype="multipart/form-data" style = "display:inline;">
                <a><button class="default-button" name = "courseID" value = "'.$row['CourseID'].'">delete</button></a>
                </form>';

            echo '</div>';
        }
        ?>

    </div>
    </body>
</html>
<?php
    include '../includes/footer.php';
?>