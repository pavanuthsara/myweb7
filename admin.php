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

		<!-- Employee crud -->
		<div class="manage-employee details">
            <h4 class="title">Manage employees</h4>
			<hr>
            <div class="employee-buttons">
            <a href="employee/read-emp.php" target="_blank" class="button-one">Read employees</a>
            <a href="employee/add-emp.php" target="_blank" class="button-one">Add new employee</a>
            <a href="employee/update-emp.php" target="_blank" class="button-one">Update employee details</a>
            <a href="employee/delete-emp.php" target="_blank" class="button-one">Delete employee</a>
            </div>
		</div>	

        <div class="manage-employee details">
            <h4 class="title">Manage plans</h4>
			<hr>
            <div class="employee-buttons">
            <a href="plan/read-plan.php" target="_blank" class="button-one">Read plan details</a>
            <a href="plan/add-plan.php" target="_blank" class="button-one">Add new plan</a>
            <a href="plan/update-plan.php" target="_blank" class="button-one">Update plan detail</a>
            <a href="plan/delete-plan.php" target="_blank" class="button-one">Delete plan</a>
            </div>
		</div>	

        <div class="manage-complaints details">
			<h4 class="title">Manage Annual Fee Payments</h4>
            <div class="employee-buttons">
            <a href="annualFee/admin-read-af.php" target="_blank" class="button-one">User Annual Fee Payments</a>
            </div>
			<hr>
		</div>


        <?php require_once('inc/footer.php') ?>
	</div>

</body>
</html>

