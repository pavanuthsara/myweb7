<?php
require_once '../inc/connection.php';

    $employeeId = $_POST['employeeId'];
    $employeeName = $_POST['employeeName'];
    $dob = $_POST['dob'];
    $contact = $_POST['contact'];
    $jobTitle = $_POST['job-title'];

    $sql = "INSERT INTO employee Values ('$employeeId', '$employeeName', '$dob', '$contact', '$jobTitle');";

    if($connection->query($sql)){
        echo "Inserted successfully";
    } else {
        echo "Error: ".$connection->error;
    }
    
    $connection->close();
?>