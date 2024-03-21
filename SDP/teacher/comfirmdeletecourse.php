<?php
    include '../includes/header.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>delete Course</title>
    <style>
        .default-button {
                padding: 8px 10px;
                font-size: 16px;
                background-color: #82E2FA;
                color: #FEFEFE;
                border: 0px solid #000000; 
                border-radius: 5px;
                cursor: pointer;
                display: inline-block;
                margin: 0 10px;
            }

            .default-button:hover {
                background-color: #B0DFFE;
            }
        
        h2 {
            text-align: center;
            display: block;
            margin-top: 10px;
            font-size: 20px;
            text-decoration: none;
            font-family: Arial, Helvetica, sans-serif;
        }
        .center{
            vertical-align: middle;
            text-align: center;
        }
        div.blue{
            flex-grow: 1;
            border: 1px ;
            margin: 20px;
            padding: 10px;
            background-color: #BBE3FE; 
            box-sizing: border-box;
            text-align: left;
            }
    </style>
</head>
<body>
    <div class="blue">
<h2>Are you sure you want to delete this course?</h2>
    
    <div class="center">
<form  action="deletecourse.php" method="POST" enctype="multipart/form-data">
        <button type="submit" name="submit" class="default-button">confirm</button>
</form>
<form action="viewCourses.php">
        <button type="submit" name="submit" class="default-button">back</button>
</form>
        </div>
        </div>
</body>
</html>
<?php
    include '../includes/footer.php';
?>