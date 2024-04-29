<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sign in - Shield Plus</title>
	<link rel="stylesheet" type="text/css" href="./css/sign-in.css">
</head>

<body>
	<div class="main-container">
		<?php require_once('inc/header1-1.php') ?>
		<div class="form-container">
			
			<form id="form" action="process/user-login-validation.php" method="post">
				<h3><u>Log in form</u></h3>
				
		        <div class="ele">
		        <label>User Id</label> <br>
		        <input type="userId" name="userid"  required class="b"> <br>
		        </div>

		        <div class="ele">
		        <label>Password</label> <br>
		        <input type="password" name="password" required class="b" id="pwd1"> <br>
		        </div>

		        <button class="button-green center" type="submit" name="submit">Sign In</button> <br>

		        <div class="text-center">
		        <label>Don't have an account? <a href="sign-up.php">Sign up here!</a></label>
		        </div>

		        <div class="text-center">
		        <label><a href="admin-login.php">Log in as Admin</a></label>
		        </div>

				<!--add error message here -->


	        </form>
        </div>
        <footer>
	        <hr>
	        &copy; 2024 Copyright Reserved - Shield Plus Insurance <br>
	        <small>email@shieldplus.com</small>
        </footer>

        <?php //require_once('inc/footer.php') ?>
	</div>

</body>
</html>