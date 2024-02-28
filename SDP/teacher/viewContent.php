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
            height:30%;
            border: 1px ;
            margin: 20px;
            padding: 10px;
            background-color: lightblue; 
            text-align: center;
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
    </style>
</head>
<body>
<div class="container pad">
        <button><a href="../teacher/viewChapters.php" style="vertical-align: middle;">Back</a></button>
        <h1 class="title centered">Chapter name</h1>
        <button><a href="../teacher/editChapter.php" style="vertical-align: middle;">edit</a></button>
    </div>
    <div class="blue">
        <div class= "blue1">
            <a>example</a>
        </div>
        <div class= "blue1">
            <a>explanation</a>
        </div>
        <div class= "blue1">
            <a>Short question</a>
        </div>
    </div>
</body>
</html>
<?php
    include '../includes/footer.php';
?>