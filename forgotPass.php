
<?php   include_once 'header.php'?>

<div id = "window" >


<form   action = "includes/forgotPassword.inc.php"  method = "post" >
<h2>Forgot Password? </h2>
    <input type = "text" name = "userID" placeholder = "Username/Email" ></input>
    <input type = "password" name = "newpwd" placeholder = "Enter the new password" ></input>
    <input type = "password" name = "newpwdRepeat" placeholder = "Re-enter the new password" ></input>
    <button type = "submit"  name = "submitPass"> Change </button>

</form>


<?php

if (isset($_GET["error"])) {
    if ($_GET["error"] == "userdoesntexist") {
        echo "<p>Username doesn't exist.</p>";
    } else if ($_GET["error"] == "emptyinput") {
        echo "<p>Fill in all fields.</p>";
    } else  if ($_GET["error"] == "passwordsdontmatch") {
        echo "<p>Passwords do not match .</p>";
    } else  if ($_GET["error"] == "passwordsalreadyexists") {
        echo "<p>Password has been used already.</p>";
    } else {
        echo "<p>You have updated your password.</p>";
    }
}



?>
</div>
