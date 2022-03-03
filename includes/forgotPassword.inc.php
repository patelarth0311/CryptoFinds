<?php


if (isset($_POST["submitPass"])) {



require_once 'dbh.inc.php';
require_once 'functions.inc.php';




    $userEnter = $_POST["userID"];
$newPass = $_POST["newpwd"];
$newPassR = $_POST["newpwdRepeat"];
   
if (userExists($conn, $userEnter) == false) {
    header("location: ../forgotPass.php?error=userdoesntexist");
    exit();

}
if (forgotPassInputEmpty($userEnter, $newPass, $newPassR) != false) {
        header("location: ../forgotPass.php?error=emptyinput");
    exit();
}

if (pwdMatch($newPass,$newPassR) != false) {
    header("location: ../forgotPass.php?error=passwordsdontmatch");
    exit();
} else if  (passwordExists($conn, $newPass, $userEnter) != false) {
        header("location: ../forgotPass.php?error=passwordsalreadyexists");
        exit();
    
    }



}










