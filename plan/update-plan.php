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
    
    $adminId = $_SESSION['admin_id'];
    $date = $_POST['updateDate'];

    $update_sql = "UPDATE plan SET planName='$planName', planFee='$planFee', planDescription='$planDescription', duration='$planDuration' WHERE planId='$planId'";
    $add_sql = "INSERT INTO planUpdate VALUES ('$planId', '$adminId', '$date')";

    $connection->query($update_sql);
    $connection->query($add_sql);

    header("Location: add-plan.php?add-employee-message=executed!");

}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin - Update plan</title>
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
                <form action="update-plan.php" method="post" id="emp-form">
                    <h3><u>Update a plan</u></h3>
                    <small>Plan will update according to admin ID : <?php echo $_SESSION['admin_id']; ?></small>
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

                <input type="hidden" name="updateDate" value="<?php echo date('Y-m-d'); ?>">

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
            </div> <!-- end form-container -->

            <hr>

            <div class="view-employee"> 
                <div class="plan-update-text"><b><u>Plan Update Details</u></b></div> <!-- end Plan Details -->
                        <br>
                        <?php 
                        require_once '../inc/connection.php';
                        $sql = "SELECT * FROM planUpdate";
                        $result = $connection->query($sql);
                        
                        if(!$result){
                            die("Invalid query or no results found!");
                        }else{ 
                            echo "<style>
                            .view-employee{
                                height: 40vh;
                            }
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
                            echo "<tr><td>Plan Id</td> <td>Admin Id</td> <td>Updated Date</td>";
                            while($row=$result->fetch_assoc()){
                                echo "<tr>";
                                echo "<td>".$row['planId']."</td>";
                                echo "<td>".$row['adminId']."</td>";
                                echo "<td>".$row['updateDate']."</td>";
                                echo "</tr>";
                            }
                            echo "</table>"; 
                            echo '</div>';
                        } 
                        $connection->close();
                        ?> <!-- end PHP -->
                        
            </div> <!-- end view employee -->


        <footer>
            <hr>
            &copy; 2024 Copyright Reserved - Shield Plus Insurance <br>
            <small>email@shieldplus.com</small>
        </footer>

	</div> <!-- end main-container  -->


</body>
</html>