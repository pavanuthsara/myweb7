<?php
session_start();
require_once 'inc/connection.php';

// Retrieve username and password from POST request
$username = $_POST['adminId'];
$password = $_POST['password'];

// Query to check if username and password match
$sql = "SELECT * FROM admin WHERE adminId='$username' AND password='$password'";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    // Fetch user details
    $user = $result->fetch_assoc();

    // Store user information in session
    $_SESSION['user_id'] = $user['adminId'];
    $_SESSION['first_name'] = $user['firstName'];
    $_SESSION['last_name'] = $user['lastName'];

    // Redirect to welcome page on success
    header("Location: admin.php");
} else {
    // Redirect back to login page with error message
    header("Location: admin-login.php?message=Invalid username or password");
}

$conn->close();
?>
