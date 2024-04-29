<?php session_start();?>
<?php require_once('inc/connection.php')?>


<?php 
	// check for form submission
	if (isset($_POST['submit'])){

		$errors = array();

		//check if the username and password has been entered
		if(!isset($_POST['userId']) || strlen(trim($_POST['userId'])) < 1){
			$errors[] = 'User is Missing or Invalid';
		}

		if(!isset($_POST['password']) || strlen(trim($_POST['password'])) < 1){
			$errors[] = 'Password is Missing or Invalid';
		}

		//check if there any errors in the form
		if(empty($errors)){

			// save userid and password into variables
			$userId = mysqli_real_escape_string($connection,$_POST['userId']);
			$password = mysqli_real_escape_string($connection,$_POST['password']);

			//prepare database query
			$query = "SELECT * FROM user
						WHERE userId = '{$userId}'
						AND password = '{$password}'
						LIMIT 1;";
			
			$result_set = mysqli_query($connection, $query);

			if($result_set){
				//query successful then check if the user is valid
				if(mysqli_num_rows($result_set) == 1){
					//valid user found
					$user = mysqli_fetch_assoc($result_set);
					$_SESSION['user_id'] = $user['userId'];
					$_SESSION['first_name'] = $user['firstName'];

					//redirect to user.php file
					header('Location: user.php');

				} else{
					//userid and password invalid then display error
					$errors[] = 'Invalid User / Password';
				} 
			} else{
				$errors[] = 'Database query failed';
			}
		}
	}
?>

<?php //require_once('inc/header1.php')?>
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
			
			<form id="form" action="sign-in.php" method="post">
				<h3><u>Log in form</u></h3>

				<?php 
					if(isset($errors) && !empty($errors)){
						echo '<p>Invalid Username / Password</p>';
					}
				?>
				
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

<?php mysqli_close($connection); ?>