<?php 
session_start(); 
$userId = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User - claim requests details</title>
	<link rel="stylesheet" type="text/css" href="style-claim.css">
</head>

<body>
	<div class="main-container">
        <div class="head"><br>
	    <h1>Shield Plus Insurance</h1>
	    <h5>Best health insurance partner</h5> <br>
        </div>

        <ul class="nav1">
            <li class="nav1"><a href="../user.php">User dashboard</a></li>
            <li class="nav2"><a href="../logout.php">Log Out</a></li>
        </ul>

        <div class="view-employee"> 
            <div><b>Your claim requests</b></div> <br>
                <?php 
                require_once '../inc/connection.php';
                $sql = "SELECT * FROM claimRequest WHERE userId = '$userId'";
                $result = $connection->query($sql);

                $dir1 = '<img height=70px width=70px src="uploads/';
                $dir2 = '">';
                
                if(!$result){
                    die("Invalid query or no results found!");
                }else{ 
                    echo "<style>
                    table, th,td{
                        padding: 5px 15px;
                        border: 1px solid black;
                        border-collapse: collapse;
                    }
                    
                    .edit-button{
                        text-decoration: none;
                        display: inline-block;
                        background-color: #0ed58f;
                        color:black;
                        padding: 10px;
                        cursor: pointer;
                        border-radius: 5px;
                    }
                    
                    .delete-button{
                        text-decoration: none;
                        display: inline-block;
                        background-color: #ca0939;
                        color:white;
                        padding: 10px;
                        cursor: pointer;
                        border-radius: 5px;
                    }
                    .center-table{
                        display: flex;
                        box-sizing: border-box;
                        justify-content: center;
                        align-items: center;
                        padding:10px;
                    }
                    </style>";
                    echo '<div class="center-table">';
                    echo "<table>";
                    echo "<tr><td>Claim Id</td> <td>File</td> <td>Note</td> <td>Date</td><td>Status</td></tr>";
                    while($row=$result->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>".$row['claimId']."</td>";
                        echo "<td>".$dir1.$row['fileName'].$dir2."</td>";
                        echo "<td>".$row['note']."</td>";
                        echo "<td>".$row['date']."</td>";
                        echo "<td>".$row['status']."</td>";
                        echo "</tr>";
                    }
                    echo "</table>"; 
                    echo '</div>';
                } 
                //$connection->close();
                ?>
                <hr>
            </div>

            <?php 
            require_once '../inc/connection.php';

            //checking if a user is logged in 

            if(!isset($_SESSION['user_id'])){
            header("Location: sign-in.php");
            } 

            if($_SERVER["REQUEST_METHOD"] == "POST"){

            $file = $_FILES['file'];
            $fileName = $_FILES['file']['name'];
            $fileType = $_FILES['file']['type'];
            $fileTmpName = $_FILES['file']['tmp_name'];
            $fileError = $_FILES['file']['error'];
            $fileSize = $_FILES['file']['size'];

            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));

            $allowed = array('jpg', 'jpeg', 'png', 'pdf');

            if(in_array($fileActualExt, $allowed)){
                if($fileError === 0){
                    if($fileSize < 5242880 ){
                        $fileNameNew = uniqid('', true).".".$fileActualExt;
                        $fileDestination = 'uploads/'.$fileNameNew;
                        move_uploaded_file($fileTmpName, $fileDestination);
                        
                        $claimId = $_POST['claimId'];
                        $userId = $_SESSION['user_id'];
                        $note = $_POST['note'];
                        $date = $_POST['date'];
                        $status = "Pending";

                        $update_sql = "UPDATE claimRequest SET fileName='$fileNameNew', note='$note', date='$date', status='$status' 
                                        WHERE claimId='$claimId'";        

                        if($connection->query($update_sql)){
                            header("Location: create-claim.php");
                        } else{
                            exit("query execution unsuccessful");
                            //query execution unsuccessful
                        }
                    } else {
                        exit("file size is too large");
                        //file size is too large
                    }
                }else{
                    exit("file error code");
                    // file error code
                }
            } else {
                exit("wrong file type");
                // wrong file type
            }

            }

            $connection->close();

            ?>

            <div class="form-container">
                <form action="read-claim.php" method="post" id="emp-form" enctype="multipart/form-data">
                    <h3><u>Update claim request - form</u></h3>
                    <!--<p><small>[Add payment details according to your payment slip]</small></p>-->

                <div class="emp-details">
                    <label for="">Claim ID</label> <br>
                    <input type="text" name="claimId">
                </div>

                <div class="emp-details">
                    <label for="">Add document or picture (File should below 5MB and .jpg / .jpeg / .png / .pdf) <br> <small>[This document or picture should be related to your claim request]</small></label>
                    <input type="file" name="file" >
                </div>

                <div class="emp-details">
                    <label for="">Add a note below</label> <br>
                    <input type="text" name="note">
                </div>

                <div class="emp_details">
                    <p>This data is submitted according to;</p> 
                    User ID : <b><?php echo $_SESSION['user_id']."  "; ?></b> 
                    User Name : <b><?php echo "  ".$_SESSION['first_name']; ?></b>
                </div> <br>

                <input type="hidden" name="date" value="<?php echo date('Y-m-d'); ?>">

                <button type="submit" name="submit">Submit claim request</button>
                <br>
                <p>
                    <?php
                    if(isset($_GET['add-employee-message'])){
                        echo $_GET['add-employee-message'];
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
</body>
</html>