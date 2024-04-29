<?php
session_start(); // Start session

// Check if user is logged in, if not redirect to login page
if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    header("Location: admin2.php");
    exit;
}

// Retrieve username from session
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="welcome-container">
        <h2>Welcome, <?php echo $_SESSION['user_id']; ?>!</h2>
        <p>This is the welcome page. You are logged in as <?php echo $username; ?>.</p>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
