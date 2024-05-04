<?php 
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin - Read employees</title>
	<link rel="stylesheet" type="text/css" href="admin-read-af.css">
</head>

<body>
	<div class="main-container">
        <div class="head"><br>
	    <h1>Shield Plus Insurance</h1>
	    <h5>Best health insurance partner</h5> <br>
        </div>

        <ul class="nav1">
            <li class="nav1"><a href="../admin.php">admin dashboard</a></li>
            <li class="nav2"><a href="../logout.php">Log Out</a></li>
        </ul>

        <div class="view-employee"> 
            <div><b>Your Fee Payments</b></div> <br>
                <?php 
                require_once '../inc/connection.php';
                $sql = "SELECT * FROM annualFee ORDER BY feeId ASC";
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
                        width:100%;
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
                    echo "<tr><td>Fee Id</td><td>User ID</td> <td>Amount</td> <td>Payment Date</td> <td>Status</td></tr>";
                    while($row=$result->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>".$row['feeId']."</td>";
                        echo "<td>".$row['userId']."</td>";
                        echo "<td>".$row['amount']."</td>";
                        echo "<td>".$row['paymentDate']."</td>";
                        echo "<td>".$row['status']."</td>";
                        echo "</tr>";
                    }
                    echo "</table>"; 
                    echo '</div>';
                } 

                
                $connection->close();
                ?>
                <hr>
                <div class="form-container">
                    <form action="admin-approve.php" method="post">
                        <label for="">Approve Payment</label>
                        <input type="text" name="feeId">
                        <input type="submit" value="Approve Record" class="green-button">
                    </form>
                </div>

                <div class="form-container">
                    <form action="admin-decline.php" method="post">
                        <label for="">Decline Payment</label>
                        <input type="text" name="feeId">
                        <input type="submit" value="Decline Record" class="red-button">
                    </form> 
                </div>
            </div>



        <footer>
            <hr>
            &copy; 2024 Copyright Reserved - Shield Plus Insurance <br>
            <small>email@shieldplus.com</small>
        </footer>
	</div>


</body>
</html>