<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="admin2.css">
</head>
<body>
    <div class="login-container">
        <h2>Admin Login</h2>
        <form action="admin2-process.php" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
        <p>
            <?php
            if (isset($_GET['message'])) {
                echo $_GET['message'];
            }
            ?>
        </p>
    </div>
</body>
</html>
