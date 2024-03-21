<?php
    include '../includes/header.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Course</title>
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
                background-color: #8BD0FE; 
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
            align-items: center;
            text-align: center;
            }

            div.blue1{
            flex-grow: 1;
            border: 1px ;
            margin: 20px;
            padding: 10px;
            background-color: #BBE3FE; 
            box-sizing: border-box;
            text-align: left;
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

            .sizing{
                font-size: 20px;
                margin: 10px;
                font-family: Arial, Helvetica, sans-serif;
            }

    </style>
</head>
<body>
<div class="container pad">
    <h1 class="title centered">Add Course</h1>
            <button><a href="../teacher/viewCourses.php" style="vertical-align: middle;">Back</a></button>
        </div>
<div class="blue">
<form action="addCoursedb.php" method="POST" enctype="multipart/form-data">
    <div class= "blue1">
        <label class= "sizing" for="example1">Course name: </label>
        <input class= "sizing" type= "text" name="course_name"><br>
        <label class= "sizing" for="example1">Category: </label>
        <input class= "sizing" type= "text" name="course_cate"><br>
        <label class= "sizing" for="example1">Course Icon: </label>
        <input class= "sizing" type="file" name="file"><br>
        <label class= "sizing" for="example1">Badge Img: </label>
        <input class= "sizing" type="file" name="file2"><br>
        <label class= "sizing" for="example1">Second Badge Img: </label>
        <input class= "sizing" type="file" name="file3"><br>
        <label class= "sizing" for="example1">Third Badge Img: </label>
        <input class= "sizing" type="file" name="file4"><br>
        <label class= "sizing" for="example1">premium or not premium: </label>
        <select class= "sizing" name="premium" required><br>
            <option value="0">No</option>
            <option value="1">Yes</option>
        </select><br><br>
        </div>
        <button type="submit" name="submit">submit</button>
</form>
</div>
    
</body>
</html>
<?php
    include '../includes/footer.php';
?>

 