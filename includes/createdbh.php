<?php


$servername = "127.0.0.1";
$username = "root";
$password = "";


// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

// Create database
$sql = "CREATE DATABASE userLogIn";
$stmt = mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_execute($stmt);


$sql2 = "CREATE TABLE users (
    usersId INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    usersName VARCHAR(128) NOT NULL,
    usersEmail VARCHAR(128) NOT NULL,
    usersUid VARCHAR(128),
    usersPwd   VARCHAR(128)
    )";


mysqli_stmt_prepare($stmt, $sql2);
mysqli_stmt_execute($stmt);


 






?>


