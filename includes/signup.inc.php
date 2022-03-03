<?php

if (isset($_POST["submit"])) {

    $name = $_POST["name"];
    $email= $_POST["email"];
    $username = $_POST["uid"];
    $password= $_POST["pwd"];
    $passwordrepeat = $_POST["pwdr"];


    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';


    if (emptyInputSignUp($name, $email, $username, $password, $passwordrepeat) != false) {
        header("location: ../signup.php?error=emptyinput");
        exit();
    }


    if (invalidUid($username) != false) {
        header("location: ../signup.php?error=invalidusername");
        exit();
    }
    if (invalidEmail($email) != false) {
        header("location: ../signup.php?error=invalidemail");
        exit();
    }

    if (pwdMatch($password, $passwordrepeat) != false) {
        header("location: ../signup.php?error=passwordsdontmatch");
        exit();
    }

    if (uidExists($conn, $username, $email) != false) {
        header("location: ../signup.php?error=usernametaken");
        exit();
    }


    createUser($conn, $name, $email, $username, $password);


} else {
    header("location: ../signup.php");
    exit();
}