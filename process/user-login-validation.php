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


if($result->num_rows > 0){
    //fetch the user details to associative array
    $user = $result->fetch_assoc();
    $_SESSION['user_id'] = $user['userId'];
    $_SESSION['first_name'] = $user['firstName'];

    //$_SESSION['plan_id'] = $user['planId'];
    $plan_id = $user['planId'];

    //CHECK THE FOLLOWING SQL QUERY
    $sql_plan = "SELECT * FROM plan where planId='$plan_id'";
    $result_plan = $connection->query($sql_plan);
    $plan = $result_plan->fetch_assoc();
    $_SESSION['plan_name'] = $plan['planName'];

    //redirect to the user.php page
    header("Location: ../user.php");

} else {
    //redirect back to the user log in page with error message
    header("Location: ../user.php?message=Invalid user id or password");
}

//close the database connection
$connection->close();
?>