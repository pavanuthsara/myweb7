<?php
session_start();
require_once 'inc/connection.php';

// Retrieve username and password from POST request
$username = $_POST['username'];
$password = $_POST['password'];

// Query to check if username and password match
$sql = "SELECT * FROM admin WHERE adminId='$username' AND password='$password'";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    // Fetch user details
    $user = $result->fetch_assoc();

    // Store user information in session
    $_SESSION['user_id'] = $user['adminId'];
    $_SESSION['username'] = $user['firstName'];

    // Redirect to welcome page on success
    header("Location: admin2-home.php");
} else {
    // Redirect back to login page with error message
    header("Location: admin2.php?message=Invalid username or password");
}

$conn->close();
?>
