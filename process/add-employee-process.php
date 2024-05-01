<?php
session_start();
require_once '../inc/connection.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){

    
    $employeeId = $_POST['employeeId'];
    $employeeName = $_POST['employeeName'];
    $dob = $_POST['dob'];
    $contact = $_POST['contact'];
    $jobTitle = $_POST['job-title'];

    $add_sql = "INSERT INTO employee VALUES ('$employeeId', '$employeeName', '$dob', '$contact', '$jobTitle')";

    if($connection->query($add_sql)){
        header("Location: ../admin.php?add-employee-message=Employee entered successfully!");
    } else{
        header("Location: ../admin.php?add-employee-message=Error");
    }
}

$connection->close();
?>