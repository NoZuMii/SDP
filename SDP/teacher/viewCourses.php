<?php
    include '../includes/header.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>View Courses</title>
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
                background-color: aquamarine;
                width: 200px;
                height: 300px;
                float: left;
                margin: 10px;
            }
            .coursesname{
                font-size: 40px;
                text-align: center;
            }
            .icon{
                margin: 0px;
            }
        </style>
    </head>
    <body>
    <div class="container pad">
            <button><a href="../teacher/addCourse.php" style="vertical-align: middle;">Add Course</a></button>
            <h1 class="title centered">Courses</h1>
            <div class="search-container">
                <input type="text" name="search-input" class="product-search-input" id="product-search-input" placeholder="Search Courses" required>
                <button class="search-button" type="submit">🔍</button>
            </div>
        </div>
    <div class="blue">
        <div class="container1">
            <img class ="icon" src="python.png" alt="Python" width="200" height="200">
            <coursesname class = "coursesname">Python</coursesname>
            <a href = "viewChapters.php">view</a>
        </div>
    </div>
    </body>
</html>
<?php
    include '../includes/footer.php';
?>