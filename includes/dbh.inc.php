<?php

$dbServerName = "127.0.0.1";
$dbUserName = "root";
$dbPassWord = "";
$dbName = "userLogIn";

$conn = mysqli_connect($dbServerName , $dbUserName, $dbPassWord,$dbName );


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}