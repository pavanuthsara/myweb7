<?php 
session_start(); 

require_once '../inc/connection.php';

//checking if a user is logged in
if(!isset($_SESSION['admin_id'])){
    header('Location: ../admin-login.php');
} 

if($_SERVER["REQUEST_METHOD"] == "POST"){ 
    $planId = $_POST['planId'];
    $planName = $_POST['planName'];
    $planFee = $_POST['planFee'];
    $planDescription = $_POST['planDescription'];
    $planDuration = $_POST['planDuration'];

    $add_sql = "INSERT INTO plan VALUES ('$planId', '$planName', '$planFee', '$planDescription', '$planDuration')";

    if($connection->query($add_sql)){
        header("Location: add-plan.php");
    } else{
        exit('error!');
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
	<link rel="stylesheet" type="text/css" href="read-plan.css">
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
                <form action="add-plan.php" method="post" id="emp-form">
                    <h3><u>Add new plan</u></h3>
                <div class="emp-details">
                    <label for="">Plan ID</label>
                    <input type="text" name="planId">
                </div>

                <div class="emp-details">
                    <label for="">Plan Name</label>
                    <input type="text" name="planName">
                </div>

                <div class="emp-details">
                    <label for="">Plan Fee</label>
                    <input type="number" name="planFee">
                </div>
                
                <div class="emp-details">
                    <label for="">Plan Description</label>
                    <input type="text" name="planDescription">
                </div>

                <div class="emp-details">
                <label for="job-title">Plan Duration</label>
                <select name="planDuration" id="job-title" id="">
                    <option value="1 Year">1 Year</option>
                    <option value="2 Year">2 Year</option>
                    <option value="3 Year">3 Year</option>
                </select>
                </div>

                <button type="submit" name="submit">Submit</button>
                <br>
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