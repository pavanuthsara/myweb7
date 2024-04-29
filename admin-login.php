<?php session_start(); ?>
<?php require_once 'inc/connection.php'; ?>
<?php 
    //check if form submitted
    if(isset($_POST['submit'])){

        $errors = array();

        //check if form filled correctly
        if(isset($_POST['adminId']) && isset($_POST['password'])){
            $ID = mysqli_real_escape_string($connection, $_POST["adminId"]);
            $password = mysqli_real_escape_string($connection, $_POST["password"]);
    
            $sql = "SELECT * FROM admin
                        WHERE adminId = '{$ID}'
                        AND password = '{$password}'
                        LIMIT 1;";
    
            //$result = $connection->query($sql);
            $result = mysqli_query($connection, $sql);

            //check if there are any results
            if($result){
                //admin validation
                $admin = mysqli_fetch_assoc($result);
                $_SESSION['admin_id'] = $admin['adminId'];
                $_SESSION['admin_name'] = $admin['firstName'];

                //header('Location: admin.php');
            }else{
                $errors[] = 'Invalid admin log in';
            }
        } else{
            $errors[] = "Fill all the fields.";
        }


    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Log In </title>
</head>
<body>

    <form action="admin-login.php" method="post">

        <p>
            <label for="">Admin Id </label>
            <input type="text" name="adminId">
        </p>

        <p>
            <label for="">Password</label>
            <input type="password" name="password">
        </p>

        <p>
            <button type="submit" name="submit">Log in</button>
        </p>

        <?php  
            if(isset($errors) && !empty($errors)){
                echo '<p class="error">Invalid Username / Password</p>';
            }
        ?>

    </form>
    
</body>
</html>

<?php mysqli_close($connection); ?>