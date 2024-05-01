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

    $add_sql = "INSERT INTO employee VALUES ('$employeeId', '$employeeName', '$dob', '$contact', '$jobTitle')";

    if($connection->query($add_sql)){
        header("Location: add-emp.php?add-employee-message=Employee entered successfully!");
    } else{
        header("Location: add-emp.php?add-employee-message=Error");
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
                <form action="add-emp.php" method="post" id="emp-form">
                    <h3><u>Add new employee</u></h3>
                <div class="emp-details">
                    <label for="">Employee ID</label>
                    <input type="text" name="empId">
                </div>

                <div class="emp-details">
                    <label for="">Employee Name</label>
                    <input type="text" name="empName">
                </div>

                <div class="emp-details">
                    <label for="">Date of birth</label>
                    <input type="date" name="dob">
                </div>
                
                <div class="emp-details">
                    <label for="">Contact</label>
                    <input type="text" name="contact">
                </div>

                <div class="emp-details">
                <label for="job-title">Job title : </label>
                <select name="job-title" id="job-title" id="">
                    <option value="Insurance Coordinator">Insurance Coordinator</option>
                    <option value="Human Resources Manager">Human Resources Manager</option>
                    <option value="Claim Processor">Claim Processor</option>
                    <option value="Finance Manager">Finance Manager</option>
                    <option value="Healthcare Navigator">Healthcare Navigator</option>
                    <option value="Data Analyst">Data Analyst</option>
                    <option value="IT Specialist">IT specialist</option>
                </select>
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