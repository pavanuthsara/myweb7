<?php 
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin - Plan details</title>
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

        <div class="view-employee"> 
            <div><b>Plan Details</b></div> <br>
                <?php 
                require_once '../inc/connection.php';
                $sql = "SELECT * FROM plan ORDER BY planId ASC";
                $result = $connection->query($sql);
                
                if(!$result){
                    die("Invalid query or no results found!");
                }else{ 
                    echo "<style>
                    .view-employee{
                        height: 60vh;
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
                    echo "<tr><td>Plan Id</td> <td>Plan Name</td> <td>Plan Fee</td> <td>Plan Description</td> <td>Duration</td></tr>";
                    while($row=$result->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>".$row['planId']."</td>";
                        echo "<td>".$row['planName']."</td>";
                        echo "<td>".$row['planFee']."</td>";
                        echo "<td>".$row['planDescription']."</td>";
                        echo "<td>".$row['duration']."</td>";
                        echo "</tr>";
                    }
                    echo "</table>"; 
                    echo '</div>';
                } 
                $connection->close();
                ?>
                
            </div>

        <footer>
            <hr>
            &copy; 2024 Copyright Reserved - Shield Plus Insurance <br>
            <small>email@shieldplus.com</small>
        </footer>
	</div>


</body>
</html>