<?php
	session_start();
	unset($_SESSION['email']);
	unset($_SESSION['username']);
	unset($_SESSION['user_id']);
	unset($_SESSION['role']);
	session_destroy();
	header("Location: ../index.php");
?>