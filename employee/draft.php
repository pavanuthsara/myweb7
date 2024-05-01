<?php 
session_start(); 

require_once '../inc/connection.php';

//checking if a user is logged in
if(!isset($_SESSION['admin_id'])){
    header('Location: ../admin-login.php');
} 

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin - Add employee</title>
	<link rel="stylesheet" type="text/css" href="add-emp.css">
</head>

<body>
	<div class="main-container">
        <div class="head"><br>
	    <h1>Shield Plus Insurance</h1>
	    <h5>Best health insurance partner</h5> <br>
        </div>

        <ul class="nav1">
            <li class="nav1"><a href="../admin.php">Admin dashboard</a></li>
            <li class="nav2"><a href="../logout.php">Log Out</a></li>
        </ul>
        
		<p>add new employee</p>

        <footer>
            <hr>
            &copy; 2024 Copyright Reserved - Shield Plus Insurance <br>
            <small>email@shieldplus.com</small>
        </footer>
	</div>


</body>
</html>