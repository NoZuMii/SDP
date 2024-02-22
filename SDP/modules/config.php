<?php
    echo '<link rel="shortcut icon" type="image/jpg href="../images/monika.jpg">'; // Put tab icon
    $role = '';

    // Initiate Error handler
    include_once('../modules/err_handler.php');
    
    // Connection to Database
    $host="localhost";
    $user="root";
    $password="";
    $database="sdp";
    $conn=mysqli_connect($host, $user, $password,$database);
    if(mysqli_connect_errno()){
        die; //Terminate the website if no database
    }
    $web_name="W3000school";

    if (session_status() === PHP_SESSION_NONE){
        session_start();
    }
    if (isset($_SESSION['role'])){
        // If user has login, use the data from DB
        $role=$_SESSION['role']; 
        $username = $_SESSION['username'];
        $userID=$_SESSION['userID'];
    }else{
        $role=''; // Otherwise, the user is guest
    }
?>