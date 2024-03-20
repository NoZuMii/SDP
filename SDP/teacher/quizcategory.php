<?php
    require "../modules/config.php";
    if ($role != 'teacher'){
        header("Location: ../index.php");
        die;
    }

    include '../includes/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Category</title>
    <style>
        /* Your existing CSS styles */
        /* Add or modify styles as needed */
        #title{
           text-align: center;
           font-family:Arial, Helvetica, sans-serif;
           font-size: 80px;

        }
         #up_card{
            align-self: center;
            float: left;
            background-color: whitesmoke;
            width: 32vw;
            height: 20vw;
            text-align: center;
            border-radius: 25px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
            margin-bottom: 50px;
            margin:10px;
            position: relative; /* Set position to relative */
            
         }
         
        #up_card img {
            position: absolute; 
            top: 30%; 
            left: 50%; 
            transform: translate(-50%, -50%);
            width:200px; 
            height: 200px; 
        }
         div.manage_user{
            margin-left: 5vw;
            margin-right: 3vw;
        }
    
        .card_title{
            font-size:  max(14px, max(2vw, 12px));
            line-height: 5px;
            font-family: Arial, Helvetica, sans-serif;
            margin-left: auto;
            margin-right: auto;
            white-space: nowrap; 
            text-overflow: ellipsis;
            padding-top: 180px;


        }
        .card_desc{
            font-size:  max(12px, 1vw);
            font-family:Verdana, Geneva, Tahoma, sans-serif;
            position: absolute;
            top: 60%; 
            left: 39    %; 
        }
        span.card_desc{
            font-family: 'Courier New', Courier, monospace;
        }
        button.index-button{
            background-color: white;
            font-size: 1em;
            font-weight: bolder;
            color: lightblue;
            border: none;
            width: 20%;
            height: 30px;
            border-radius: 25px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
            margin: 20px;
            position: absolute;
            top: 70%; 
            left: 38%; 
        }
        button.index-button:hover{
            cursor: pointer;
            background-color: lightblue;
            color: white;
        }

        h1{
            text-align: center;
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
            margin:40px;
        }
        button:hover {
            background-color: #2980b9; 
        }
        
        button a {
            color: inherit; 
            text-decoration: none; 
        }
        
        
    </style>
</head>
<body>
<div class="container pad">
        <button><a href="../teacher/addquestion.php" style="vertical-align: middle;">Add Question</a></button>
        <h1 class="title centered">Quiz</h1>
    </div>
    <div >  
        <div class="CSS" id ="up_card">
        <h3 class="card_title" style="text-align: center;"> </h3>
        <img src="../images/css.png"" alt="Image Description">
        <p class="card_desc">Quiz for CSS</b></p>
        <button class="index-button" onclick="window.location.href='../teacher/CSS.php';" title="Go to CSS Quiz">GO!</button>
        </div>
        <div class="HTML" id ="up_card">
        <h3 class="card_title" style="text-align: center;"> </h3>
        <img src="../images/html.png"" alt="Image Description">
        <p class="card_desc">Quiz for HTML</b></p>
        <button class="index-button" onclick="window.location.href='../teacher/HTML.php';" title="Go to HTML Quiz">GO!</button>
        </div>
        <div class="Java" id ="up_card">
        <h3 class="card_title" style="text-align: center;"> </h3>
        <img src="../images/java.png"" alt="Image Description">
        <p class="card_desc">Quiz for Java</b></p>
        <button class="index-button" onclick="window.location.href='../teacher/Java.php';" title="Go to Java Quiz">GO!</button>
        </div>
        <div class="Python" id ="up_card">
        <h3 class="card_title" style="text-align: center;"> </h3>
        <img src="../images/python.png"" alt="Image Description">
        <p class="card_desc">Quiz for Python</p>
        <button class="index-button" onclick="window.location.href='../teacher/python';" title="Go to Python Quiz">GO!</button>
        </div>

        <div class="Javascript" id ="up_card">
        <h3 class="card_title" style="text-align: center;"> </h3>
        <img src="../images/javascript.png"" alt="Image Description">
        <p class="card_desc">Quiz for Javascript</b></p>
        <button class="index-button" onclick="window.location.href='../teacher/Javascript';" title="Go to CSS Quiz">GO!</button>
        </div>
    </div>
</body>
</html>
<?php
    include '../includes/footer.php';
?>