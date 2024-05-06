<?php 
session_start(); 

require_once '../inc/connection.php';

//checking if a user is logged in
if(!isset($_SESSION['admin_id'])){
    header('Location: ../admin-login.php');
} 

if($_SERVER["REQUEST_METHOD"] == "POST"){

    
    $employeeId = $_POST['empId'];
    $employeeName = $_POST['empName'];
    $dob = $_POST['dob'];
    $contact = $_POST['contact'];
    $jobTitle = $_POST['job-title'];

    $delete_sql = "DELETE FROM employee WHERE employeeId='$employeeId'";

    
    if($connection->query($delete_sql)){
        header("Location: delete-emp.php?add-employee-message=Employee deleted successfully!");
    } else{
        header("Location: delete-emp.php?add-employee-message=Error in query execution!");
    }   
} 

$connection->close();

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
            
            
            <div class="form-container">
                <form action="delete-emp.php" method="post" id="emp-form">
                    <h3><u>Delete an employee</u></h3>
                <div class="emp-details">
                    <label for="">Employee ID</label>
                    <input type="text" name="empId">
                </div>
            
                <button type="submit" name="submit">Submit</button>
                <br>
                <p>
                    <?php
                    if(isset($_GET['add-employee-message'])){
                        echo $_GET['add-employee-message'];
                    }
                    ?>
                </p>
                </form>

            </div>
        <footer>
            <hr>
            &copy; 2024 Copyright Reserved - Shield Plus Insurance <br>
            <small>email@shieldplus.com</small>
        </footer>
	</div>


</body>
</html>