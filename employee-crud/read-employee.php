<?php
include '../inc/connection.php';
$sql = "SELECT * FROM employee";
$result = $connection->query($sql);

if(!$result){
    die("Invalid query or no results found!");
}else{
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