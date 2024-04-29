<?php 
session_start();

//add database connection
require_once '../inc/connection.php';

//retrieve userid and password from post method
$userId = $_POST['userid'];
$password = $_POST['password'];

//query to check if userid and password match
$sql = "SELECT * FROM user WHERE userId='$userId' AND password='$password'";

$result = $connection->query($sql);

$sql_plan = "SELECT p.planName
            FROM user u, plan p
            WHERE u.planId = p.planId";

if($result->num_rows > 0){
    //fetch the user details to associative array
    $user = $result->fetch_assoc();
    $_SESSION['user_id'] = $user['userId'];
    $_SESSION['first_name'] = $user['firstName'];

    //redirect to the user.php page
    header("Location: ../user.php");

} else {
    //redirect back to the user log in page with error message
    header("Location: ../user.php?message=Invalid user id or password");
}

//close the database connection
$connection->close();
?>