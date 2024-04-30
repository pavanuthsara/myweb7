<?php
require_once 'inc/connection.php';

$sql = "SELECT * FROM user";
$result = $connection->query($sql);

echo "<link rel='stylesheet' href='css/admin3.css'>";

if(!$result){
    die("Invalid query or no results ". $connection->error);
} else{
    echo "<table>";
    echo "<tr><td>User Id</td> <td>First Name</td> <td>Last Name</td> <td>Plan Id</td></tr>";
    while($row = $result->fetch_assoc()){
        echo "<tr>";
        echo "<td>".$row['userId']."</td>";
        echo "<td>".$row['firstName']."</td>";
        echo "<td>".$row['lastName']."</td>";
        echo "<td>".$row['planId']."</td>";
        echo "<td><a href='' class='edit-button'>Edit</a></td>";
        echo "<td><a href='' class='delete-button'>Delete</a></td>";
        echo "</tr>";
    }
    echo "</table>";
}


?>