<?php session_start(); ?>

<!--add database connection-->
<?php require_once 'inc/connection.php'; ?>

<?php 
    //checking if a user is logged in
    if(!isset($_SESSION['admin_id'])){
        header('Location: admin-login.php');
    } 
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User - Shield Plus</title>
	<link rel="stylesheet" type="text/css" href="./css/admin.css">
</head>

<body>
	<div class="main-container">
		<div class="head">
			<br>
			<h1>Shield Plus Insurance</h1>
			<h5>Best health insurance partner</h5> <br>
		</div>

		<ul class="nav1">
			<li class="nav1"><a href="home.php">Home</a></li>
			<li class="nav1"><a href="about-us.php">About Us</a></li>
			<li class="nav1"><a href="plans.php">Plans</a></li>
			<li class="nav1"><a href="contact-us.php">Contact Us</a></li>
			<li class="nav1"><a href="">FAQ</a></li>
			<li class="nav2"><a href="logout.php">Log out</a></li> <!-- redirect to home page after log out -->

		</ul>


		<div class="admin-details details">
            <h4 class="title">Admin details</h4>
			<div class="user-details-content">
				<p>Admin ID : <?php echo $_SESSION['admin_id'];?></p>
				<p>Name : <?php echo $_SESSION['admin_first_name']." ".$_SESSION['admin_last_name'];?></p> 
				<button class="button-green">Edit your details</button>
			</div>
			
		</div>
		
		<div class="manage-employee details">
            <h4 class="title">Manage employees</h4>
			<hr>
            
            <!-- Add employee -->
            <div class="add-employee">
                <div><b>Add new employee</b></div>
                <form action="process/add-employee-process.php" method="post">
                    <div>
                    <label for="employeeId">Employee ID : </label>
                    <input type="text" name="employeeId">
                    </div>
    
                    <div>
                    <label for="employeeName">Employee Name : </label>
                    <input type="text" name="employeeName">
                    </div>
    
                    <div>
                    <label for="dob">Date of birth : </label>
                    <input type="date" name="dob">
                    </div>
    
                    <div>
                    <label for="contact">Contact : </label>
                    <input type="text" name="contact">
                    </div>
    
                    <div>
                    <label for="job-title">Job title : </label>
                    <select name="job-title" id="job-title">
                        <option value="Insurance Coordinator">Insurance Coordinator</option>
                        <option value="Human Resources Manager">Human Resources Manager</option>
                        <option value="Claim Processor">Claim Processor</option>
                        <option value="Finance Manager">Finance Manager</option>
                        <option value="Healthcare Navigator">Healthcare Navigator</option>
                        <option value="Data Analyst">Data Analyst</option>
                        <option value="IT Specialist">IT specialist</option>
                    </select>
                    </div>
    
                    <button type="submit" name="submit">Add employee</button>
                </form>
    
                <p>
                    <?php
                    if(isset($_GET['add-employee-message'])){
                        echo $_GET['add-employee-message'];
                    }
                    ?>
                </p>
                <hr>
            </div>
            <!-- End add employee -->

            <div class="view-employee"> 
            <div><b>Employees</b></div> <br>
                <?php 
                require_once 'inc/connection.php';
                $sql = "SELECT * FROM employee";
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
                    echo "<table>";
                    echo "<tr><td>Employee Id</td> <td>Name</td> <td>Date Of Birth</td> <td>Contact</td> <td>Job Title</td></tr>";
                    while($row=$result->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>".$row['employeeId']."</td>";
                        echo "<td>".$row['employeeName']."</td>";
                        echo "<td>".$row['dob']."</td>";
                        echo "<td>".$row['contact']."</td>";
                        echo "<td>".$row['jobTitle']."</td>";
                        echo "<td><a href='' class='edit-button'>Edit</a></td>";
                        echo "<td><a href='' class='delete-button'>Delete</a></td>";
                        echo "</tr>";
                    }
                    echo "</table>"; 
                } 
                ?>
                <hr>
            </div>
             


            <div class="update-employee">
                <div><b>Update employee details</b></div>
                form for update details of employee
                <form action="" method="">
                    <div>
                    <label for="employeeId">Employee ID : </label>
                    <input type="text" name="employeeId">
                    </div>

                    <div>
                    <label for="employeeName">Employee Name : </label>
                    <input type="text" name="employeeName">
                    </div>

                    <div>
                    <label for="dob">Date of birth : </label>
                    <input type="date" for="dob">
                    </div>

                    <div>
                    <label for="contact">Contact : </label>
                    <input type="text" for="contact">
                    </div>

                    <div>
                    <label for="job-title">Job title : </label>
                    <select name="job-title" id="job-title">
                        <option value="insurance-coordinator">Insurance Coordinator</option>
                        <option value="human-resources-manager">Human Resources Manager</option>
                        <option value="claim-processor">Claim Processor</option>
                        <option value="finance-manager">Finance Manager</option>
                        <option value="healthcare-navigator">Healthcare Navigator</option>
                        <option value="data-analyst">Data Analyst</option>
                        <option value="it-specialist">IT specialist</option>
                    </select>
                    </div>

                </form>
                <button class="button-green">Update details</button>
                <hr>
            </div>

            <div class="delete-employee">
                <div><b>Delete employee </b></div>
                <div>
                <label for="employeeId">Employee ID : </label>
                <input type="text" name="employeeId">
                </div>
                <button class="button-green">Delete details</button>
                <hr>
            </div>
			
		</div>	

		<div class="manage-claim-request details">
			<h4 class="title">Manage claim requests</h4>
			<hr>
			Not available right now
		</div>	

		<div class="manage-complaints details">
			<h4 class="title">Manage complaints</h4>
			<hr>
		</div>
		
		<!--
        <footer>
	        <hr>
	        &copy; 2024 Copyright Reserved - Shield Plus Insurance <br>
	        <small>email@shieldplus.com</small>
        </footer> 
    	-->

        <?php require_once('inc/footer.php') ?>
	</div>

</body>
</html>

