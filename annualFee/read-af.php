<?php 
session_start(); 
$userId = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User - Fee Payments Details</title>
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

        <div class="view-employee"> 
            <div><b>Your Fee Payments</b></div> <br>
                <?php 
                require_once '../inc/connection.php';
                $sql = "SELECT * FROM annualFee WHERE userId = '$userId' ORDER BY feeId ASC";
                $result = $connection->query($sql);
                
                if(!$result){
                    die("Invalid query or no results found!");
                }else{ 
                    echo "<style>
                    table, th,td{
                        padding: 5px 15px;
                        border: 1px solid black;
                        border-collapse: collapse;
                    }
                    
                    .edit-button{
                        text-decoration: none;
                        display: inline-block;
                        background-color: #0ed58f;
                        color:black;
                        padding: 10px;
                        cursor: pointer;
                        border-radius: 5px;
                    }
                    
                    .delete-button{
                        text-decoration: none;
                        display: inline-block;
                        background-color: #ca0939;
                        color:white;
                        padding: 10px;
                        cursor: pointer;
                        border-radius: 5px;
                    }
                    .center-table{
                        display: flex;
                        box-sizing: border-box;
                        justify-content: center;
                        align-items: center;
                        padding:10px;
                    }
                    </style>";
                    echo '<div class="center-table">';
                    echo "<table>";
                    echo "<tr><td>Fee Id</td> <td>Amount</td> <td>Payment Date</td> <td>Status</td></tr>";
                    while($row=$result->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>".$row['feeId']."</td>";
                        echo "<td>".$row['amount']."</td>";
                        echo "<td>".$row['paymentDate']."</td>";
                        echo "<td>".$row['status']."</td>";
                        echo "</tr>";
                    }
                    echo "</table>"; 
                    echo '</div>';
                } 
                ?>
                <hr>
            </div>

            <?php

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

                    $update_sql = "UPDATE annualFee SET amount='$amount', paymentDate='$paymentDate', status='$status'
                    WHERE feeId='$feeId'";
   

                    if($connection->query($update_sql)){
                        echo "<script src='read-af-update.js'></script>";
                    } else{
                        echo "error!";
                    }
                }

                $connection->close();

            ?>

            <div class="form-container">
                <form action="read-af.php" method="post" id="emp-form">
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

                <button type="submit" name="submit">Update</button>
                
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