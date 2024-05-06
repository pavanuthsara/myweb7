<?php 
session_start(); 
require_once '../inc/connection.php';

$feeId = $_POST['feeId'];
$approve_sql = "UPDATE annualFee SET status='Approved' WHERE feeId='$feeId'";

if($connection->query($approve_sql) === TRUE){
    header("Location: admin-read-af.php");
} else{
    echo "Error in query!";
}
?>