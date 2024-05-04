<?php 
session_start(); 

require_once '../inc/connection.php';

//checking if a user is logged in 

if(!isset($_SESSION['user_id'])){
    header("Location: sign-in.php");
} 

if($_SERVER["REQUEST_METHOD"] == "POST"){

    
    $feeId = $_POST['feeId'];
    $userId = $_SESSION['user_id'];
    $amount = $_POST['amount'];
    $paymentDate = $_POST['paymentDate'];
    $status = "Pending";

    $add_sql = "INSERT INTO annualFee VALUES ('$feeId', '$userId', '$amount', '$paymentDate', '$status')";

    if($connection->query($add_sql)){
        header("Location: add-af.php?add-employee-message=Payment details entered successfully!");
    } else{
        header("Location: add-af.php?add-employee-message=Error");
    }
}

$connection->close();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User</title>
	<link rel="stylesheet" type="text/css" href="style-af.css">
</head>

<body>
	<div class="main-container">
            <div class="head"><br>
                <h1>Shield Plus Insurance</h1>
                <h5>Best health insurance partner</h5> <br>
            </div>

            <ul class="nav1">
                <li class="nav1"><a href="../user.php">User dashboard</a></li>
                <li class="nav2"><a href="../logout.php">Log Out</a></li>
            </ul>
            
            
            <div class="form-container">
                <form action="add-af.php" method="post" id="emp-form">
                    <h3><u>Update details of annual fee payment</u></h3>
                    <p><small>[Add payment details according to your payment slip]</small></p>
                <div class="emp-details">
                    <label for="">Payment ID</label>
                    <input type="text" name="feeId" >
                </div>

                <div class="emp-details">
                    <label for="">Amount</label>
                    <input type="text" name="amount">
                </div>

                <div class="emp-details">
                    <label for="">Payment Date</label>
                    <input type="date" name="paymentDate">
                </div>

                <div class="emp_details">
                    <p>This data is submitted according to;</p> 
                    User ID : <b><?php echo $_SESSION['user_id']."  "; ?></b> <br>
                    User Name : <b><?php echo "  ".$_SESSION['first_name']; ?></b>
                </div> <br>

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