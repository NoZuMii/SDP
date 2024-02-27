<?php
 require '../modules/config.php'; 
 if ($role !='admin'){
     header('Location: ../index.php');
     die;
 }

 $User_list_length =0;
 $feedback_list = 0;
 
 $user_list = mysqli_query($conn, "SELECT * FROM user WHERE role != 'admin'; ");
 if ($user_list){
     $User_list_length = mysqli_num_rows($user_list);
 }

 $feedback_list = mysqli_query($conn, "SELECT * From feedback;");
 if ($feedback_list){
     $feedback_list_length = mysqli_num_rows($feedback_list);
 }


    include '../includes/header.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hi</title>
    <style>

        #title{
           text-align: center;
           font-family:Arial, Helvetica, sans-serif;
           font-size: 80px;

        }
         #up_card, #mid_card{
            align-self: center;
            float: left;
            background-color: whitesmoke;
            width: 42vw;
            height: 30vw;
            text-align: center;
            border-radius: 25px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
            margin-bottom: 50px;
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
        }
        button.index-button:hover{
            cursor: pointer;
            background-color: lightblue;
            color: white;
        }
    </style>
</head>
<body>
    <div id = "wrapper">
    <p style="clear:both;"></p>
    <h1 id="title">Admin Page</h1>
    <br>
    <div class="manage_user" id="up_card">
        <h3 class="card_title" style="text-align: center;"> Manage Users</h3>
        <p class="card_desc">Manage <b>users</b> in this website</p>
        <span class="card_desc" >&nbsp;Total users: <b><?php echo $User_list_length; ?></b> </span><br><br>
        <button class="index-button" onclick="window.location.href='../admin/user_management.php';" title="Go to User Management page">click!</button>

        <br>&nbsp;
    </div>
    <div class="feedback" id ="up_card">
        <h3 class="card_title" style="text-align: center;"> Feedbacks</h3>
        <p class="card_desc">check feedbacks from <b>Teachers</b> and <b>users</b></p>
        <span class="card_desc" >&nbsp;Total feedbacks: <b><?php echo $feedback_list_length; ?></b> </span><br><br>
        <button class="index-button" onclick="window.location.href='../admin/feedback.php';" title="Go to Feedback page">click!</button>

        <br>&nbsp;
    </div>
</body>
</html>
<?php
    include '../includes/footer.php';
?>