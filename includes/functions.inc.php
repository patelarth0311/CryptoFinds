<?php


function emptyInputSignUp($name, $email, $username, $password, $passrepeat) {
    $result;

        if (empty($name) || empty($email) || empty($username) || empty($password) || empty($passrepeat)) {
         
            $result = true;
        
        }  else {
            $result = false;
        }
    

 return $result;
}

function invalidUid($username) {
$result;


if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    $result = true;
} else {
    $result = false;
}
return $result;
}

function invalidEmail($email) {
    $result;
    
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    
    return $result;
    
    }

    function pwdMatch($password, $passrepeat)  {
        $result;

        if ($password !== $passrepeat) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }


    function uidExists($conn, $username, $email) {


        $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";


        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
          
            header("location: ../signup.php?error=stmtfailed");
        exit();
        }

        mysqli_stmt_bind_param($stmt, "ss",$username, $email);
        mysqli_stmt_execute($stmt);
        
        $resultData = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($resultData))  {
            return $row;
        } else {
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmt);
    }


    function   createUser($conn, $name, $email, $username, $password) {


        $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (? , ? ,? ,? );";


        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../signup.php?error=stmtfailed");
        exit();
        }


        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "ssss",$username, $email, $username,  $hashedPwd);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);
        
        header("location: ../signup.php?error=none");
        exit();
    }


    function emptyInputLogin( $username, $password) {
        $result;
    
            if ( empty($username) || empty($password)) {
             
                $result = true;
            
            }  else {
                $result = false;
            }
        
    
     return $result;
    }


    



    function loginUser($conn, $username, $password) {
        $uidExists = uidExists($conn, $username, $username);


        if ($uidExists === false) {
            header("location: ../login.php?error=wronglogin");
            exit();
        }


        $hashedPwd = $uidExists["usersPwd"];


        $checkedPwd = password_verify($password, $hashedPwd);


        if ($checkedPwd === false) {
            header("location: ../login.php?error=wronglogin");
            exit();
        } else {
            session_start();
            $_SESSION["userid"] =  $uidExists["usersId"];
            $_SESSION["useruid"] =  $uidExists["usersUid"];
            header("location: ../checking.php");
            exit();
        }


    }


    function forgotPassInputEmpty($userEnter, $newPass, $newPassR) {
        $result;
    
            if (empty($userEnter) || empty($newPass) || empty($newPassR)) {
             
                $result = true;
            
            }  else {
                $result = false;
            }
        
    
     return $result;
    }


    function passwordExists($conn, $newPass, $userEnter) {

        $result;

        $sql = "SELECT * FROM users WHERE usersPwd = ? ;";


        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
          
            header("location: ../forgotPass.php?error=stmtfailed");
        exit();
        }

       
        $uidExists = uidExists($conn,  $userEnter,  $userEnter);




        $hashedPwd = $uidExists["usersPwd"];


        $checkedPwd =  password_verify($newPass,  $hashedPwd);
    
        if ($checkedPwd === true) {
            $result = true;
        } else {
            $result = false;

            $sql = "UPDATE users SET usersPwd = ? WHERE usersUid = ? OR usersEmail = ?;";


            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("location: ../forgotPass.php?error=stmtfailed");
            exit();
            }

            $hashedPwd = password_hash($newPass, PASSWORD_DEFAULT);

            mysqli_stmt_bind_param($stmt, "sss", $hashedPwd , $userEnter, $userEnter );
            mysqli_stmt_execute($stmt);
            header("location: ../login.php?error=none2");
            exit();

            
        }

        mysqli_stmt_close($stmt);


        return $result;
    }



    function userExists($conn, $userEnter) {


        $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";


        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
          
            header("location: ../forgotPass.php?error=stmtfailed");
        exit();
        }

        mysqli_stmt_bind_param($stmt, "ss", $userEnter, $userEnter);
        mysqli_stmt_execute($stmt);
        
        $resultData = mysqli_stmt_get_result($stmt);

        if (mysqli_fetch_assoc($resultData))  {
            $result = true;
          
        } else {
            $result = false;

        }
        return $result;
        mysqli_stmt_close($stmt);
    }
