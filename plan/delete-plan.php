<?php 
session_start(); 

require_once '../inc/connection.php';

//checking if a user is logged in
if(!isset($_SESSION['admin_id'])){
    header('Location: ../admin-login.php');
} 

if($_SERVER["REQUEST_METHOD"] == "POST"){

    
    $planId = $_POST['planId'];

    $delete_sql = "DELETE FROM plan WHERE planId='$planId'";

    $sql1 = "SELECT * FROM planUpdate WHERE planId = '$planId'";
    $result1 = $connection->query($sql1);
    if($result1->num_rows>0){
        $delete_sql1 = "DELETE FROM planUpdate WHERE planId='$planId'";
        $connection->query($delete_sql1);
    }


    if($connection->query($delete_sql)){
        header("Location: delete-plan.php?add-employee-message=Plan deleted successfully!");
    } else{
        header("Location: delete-plan.php?add-employee-message=Error in query execution!");
    }   
    
}

$connection->close();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin - Delete plan </title>
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
                <form action="delete-plan.php" method="post" id="emp-form">
                    <h3><u>Delete a plan</u></h3>
                <div class="emp-details">
                    <label for="">Enter plan ID</label>
                    <input type="text" name="planId">
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