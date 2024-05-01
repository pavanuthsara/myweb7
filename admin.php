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
				<p>Admin ID : <b> <?php echo $_SESSION['admin_id'];?></b></p>
				<p>Name : <b> <?php echo $_SESSION['admin_first_name']." ".$_SESSION['admin_last_name'];?></b></p> 
				<!--<button class="button-green">Edit your details</button>-->
			</div>
			
		</div>
		
		<div class="manage-employee details">
            <h4 class="title">Manage employees</h4>
			<hr>

            <a href="employee/add-emp.php" target="_blank">Add new employee</a>
            <a href="employee/update-emp.php" target="_blank">Update employee details</a>
            <a href="employee/delete-emp.php" target="_blank">Delete employee</a>
            <a href="employee/read-emp.php" target="_blank">Read employees</a>

            
			
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

