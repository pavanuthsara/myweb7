<?php 
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin - Read employees</title>
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

        <div class="view-employee"> 
            <div><b>Currently working employees</b></div> <br>
                <?php 
                require_once '../inc/connection.php';
                $sql = "SELECT * FROM employee ORDER BY employeeId ASC";
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
                    </style>";
                    echo '<div class="center-table">';
                    echo "<table>";
                    echo "<tr><td>Employee Id</td> <td>Name</td> <td>Date Of Birth</td> <td>Contact</td> <td>Job Title</td></tr>";
                    while($row=$result->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>".$row['employeeId']."</td>";
                        echo "<td>".$row['employeeName']."</td>";
                        echo "<td>".$row['dob']."</td>";
                        echo "<td>".$row['contact']."</td>";
                        echo "<td>".$row['jobTitle']."</td>";
                        echo "</tr>";
                    }
                    echo "</table>"; 
                    echo '</div>';
                } 
                $connection->close();
                ?>
                <hr>
            </div>

        <footer>
            <hr>
            &copy; 2024 Copyright Reserved - Shield Plus Insurance <br>
            <small>email@shieldplus.com</small>
        </footer>
	</div>


</body>
</html>