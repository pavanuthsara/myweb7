<?php 
	if($_SERVER['REQUEST_METHOD']=='POST'){
		require_once('inc/connection.php');

		$firstName = $_POST['firstName'];
		$lastName = $_POST['lastName'];
		$gender = $_POST['gender'];
		$mobileNumber = $_POST['mobileNumber'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$dob = $_POST['dob'];
		$plan = $_POST['plan'];
		$password = $_POST['password'];

		$sql = "INSERT INTO user VALUES (NULL, '$firstName', '$lastName', '$gender', '$mobileNumber', '$email', '$address', '$dob', '$plan', '$password')";

		if($connection->query($sql)){
			echo "user registered succesfully!";
		} else {
			exit ("user registration unsucessfull!");
		}
	}
?>

<?php require_once('inc/header1.php')?>

<link rel="stylesheet" type="text/css" href="css/sign-up.css">

<body>
	<div class="main-container">
		<?php require_once('inc/header1-1.php') ?>
		<div class="form-container">
			
			<form id="form" action="sign-up.php" method="post">
				<h3>Register Form - New user</h3>
				<div class="ele">
				<label>First Name</label> <br>
				<input type="text" name="firstName" required class="a"> <br>
				</div>

		        <div class="ele">
		        <label>Last Name</label> <br>
		        <input type="text" name="lastName" required class="a"> <br>
		        </div>

		        <div class="ele">
		        <label>Gender</label> <br>
		        <input type="radio" name="gender" value="male" required>
		        <label>Male</label>
		        <input type="radio" name="gender" value="female">
		        <label>Female</label> <br>
		        </div>

		        <div class="ele">
		        <label>Mobile Number</label> <br>
		        <small>Format : 07xxxxxxxx</small> <br>
		        <input type="tel" name="mobileNumber" maxlength="10" required  class="a"> <br>
		        </div>

		        <div class="ele">
		        <label>Email Address</label> <br>
		        <input type="text" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required class="a"> <br>
		        </div>

		        <div class="ele">
		        <label>Address</label> <br>
		        <small>[Type address in same line]</small> <br>
		        <!--<input type="text" name="address"> <br>-->
		        <textarea name="address" rows="4" cols="65"></textarea>
		        </div>

		        <div class="ele">
		        <label>Choose your date of birth</label> <br>
		        <input type="date" name="dob"> <br>
		        </div>

		        <!--select plan-->
		         <div class="ele">
		        <label>Choose a plan</label> 
		        <small><a href="plans.php" target="_blank">[Details about plans]</a></small><br>
		        <select name="plan" id="plans" required>
		        	<option value="p1">Emergency Coverage</option>
		        	<option value="p2">Complete Coverage</option>
		        	<option value="p3">Family All In One</option>
		        	<option value="p4">Elder Citizens</option>
		        </select>
		        </div>
		        <!--end select plan-->

		        <div class="ele">
		        <label>Password</label> <br>
		        <input type="password" name="password" required class="b" id="pwd1"> <br>
		        </div>

				<!--
		        <div class="ele">
		        <label>Re-enter password</label> <br>
		        <input type="password" name="rePassword" class="b" id="pwd2"> <br>
		        </div> 

		        <div class="ele">
		        	<p id="message"></p>
		        </div>

				-->

				<!--<button class="button-green center" type="submit" name="submit">Sign In</button> <br> -->
		        <input type="submit" name="submit" value="Submit">

	        </form>

	        <script type="text/javascript" src="javascript/sign-up.js"></script>

        </div>

        <?php require_once('inc/footer.php') ?>
	</div>

</body>
</html>