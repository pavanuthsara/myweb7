<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>

<?php 
	//check if a user is logged in
	if(!isset($_SESSION['user_id'])){
		header("Location: sign-in.php");
	} 
?> 


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User - Shield Plus</title>
	<link rel="stylesheet" type="text/css" href="./css/user.css">
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

		<h4>Hello name, Welcome to shield plus!</h4>

		<div class="user-details details">

			<div class="profile-pic">
				<p>add profile pic here</p>
			</div>

			<div class="user-details-content">
				<p>User ID : <?php echo $_SESSION['user_id'];?></p>
				<p>Username : <?php echo $_SESSION['first_name'];?></p> 
				<p>Plan : <?php echo $_SESSION['plan_name']; ?></p>
				<button class="button-green">Edit your details</button>
			</div>
			
		</div>
		
		<div class="claim-request details">
			<h4>Request a claim</h4>
			<hr>
			<button class="button-green">Request</button>
		</div>	

		<div class="claim-request details">
			<h4>Pending claim requests</h4>
			<hr>
			Not available right now
		</div>	

	
		<div class="manage-employee details">
            <h4 class="title">Annual Payment Details</h4>
			<hr>
            <div class="employee-buttons">
			<a href="annualFee/add-af.php" target="_blank" class="button-one">Add Payment details</a>
            <a href="annualFee/read-af.php" target="_blank" class="button-one">Read & Update Previous payments</a>
            <!--<a href="annualFee/update-af.php" target="_blank" class="button-one">Update payment details</a>-->
            <a href="annualFee/delete-af.php" target="_blank" class="button-one">Delete payment details</a>
        	</div>
		</div>

		<div class="manage-employee details">
            <h4 class="title">Claim Requests</h4>
			<hr>
            <div class="employee-buttons">
			<a href="claim-request/create-claim.php" target="_blank" class="button-one">Create claim details</a>
            <a href="claim-request/read-claim.php" target="_blank" class="button-one">Read & Update Previous claim requests</a>
            <!--<a href="annualFee/update-af.php" target="_blank" class="button-one">Update payment details</a>-->
            <a href="claim-request/delete-claim.php" target="_blank" class="button-one">Delete claim request</a>
        	</div>
		</div>

		<div class="complaint details">
			<h4>Add a complaint</h4>
			<hr>
			Not available right now
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