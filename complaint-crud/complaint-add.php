<?php 
session_start(); 

require_once '../inc/connection.php';

//checking if a user is logged in 

if(!isset($_SESSION['user_id'])){
    header("Location: sign-in.php");
} 

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $userId = $_SESSION['user_id'];
    $complaintDate = $_POST['complaintDate'];
    $complaintType=$_POST['complaintType'];
    $description = $_POST['description'];
    $status = "Delivered";

    $add_sql = "INSERT INTO complaint VALUES (NULL, '$userId', '$complaintDate', '$complaintType', '$description', '$status')";

    if($connection->query($add_sql)){
        echo "complaint added successfully";
    } else {
        exit ("error!");
    }

}

$connection->close();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User - Add complaint</title>
	<link rel="stylesheet" type="text/css" href="complaint-add.css">
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
                <form action="complaint-add.php" method="post" id="emp-form">
                        <h3><u>Request a claim - form</u></h3>
                        <!--<p><small>[Add payment details according to your payment slip]</small></p>-->
                    <div class="emp-details">
                        <label for="">Complaint Type</label>
                        <select name="complaintType" id="">
                            <option value="Service">Service</option>
                            <option value="Claim Related">Claim Related</option>
                            <option value="Technical">Technical</option>
                        </select>
                    </div>

                    <input type="hidden" name="complaintDate" value="<?php echo date('Y-m-d'); ?>">

                    <div class="emp-details">
                        <label for="">Add a note</label> 
                        <input type="text" name="description">
                    </div>

                    <div class="emp_details">
                        <p>This data is submitted according to;</p> 
                        User ID : <b><?php echo $_SESSION['user_id']."  "; ?></b> <br>
                        User Name : <b><?php echo "  ".$_SESSION['first_name']; ?></b>
                    </div> <br>

                    <input type="hidden" name="date" value="<?php echo date('Y-m-d'); ?>">

                    <button type="submit" name="submit">Submit complaint</button>
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