<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/admin-login.css">
</head>
<body>

    <div class="main-container">
		<?php require_once('inc/header1-1.php') ?>
		
		<div class="form-container">
            <form id="form" action="process/admin-login-process.php" method="post">
                <h3><u>Admin - Log in</u></h3>
				
		        <div class="ele">
		        <label>Admin Id</label> 
		        <input type="text" name="adminId"  required class="b"> <br>
		        </div>

		        <div class="ele">
		        <label>Password</label> 
		        <input type="password" name="password" required class="b" id="pwd1"> <br>
		        </div>

		        <button class="button-green center" type="submit" name="submit">Log In</button> <br><br>

		        <div class="text-center">
		        <label class="login-as-user"><a href="sign-in.php">Log in as User</a></label>
		        </div>

                <p class="error-message">
                    <?php
                    //if there is any error
                    if (isset($_GET['message'])) {
                        echo $_GET['message'];
                    }
                    ?>
                </p>
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
