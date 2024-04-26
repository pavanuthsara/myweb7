//sign up form validation was added to sign-up.php file

<?php 

//database connection
require_once('../inc/connection.php');

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$gender = $_POST['gender'];
$mobileNumber = $_POST['mobileNumber'];
$email = $_POST['email'];
$address = $_POST['address'];
$dob = $_POST['dob'];
$plan = $_POST['plans'];
$password = $$_POST['password'];

print_r($_POST);
?>