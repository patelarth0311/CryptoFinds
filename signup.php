<?php   include_once 'header.php'?>

<section class = "signup-form">

<div id = "signUpFormCont">
<h2>Sign up </h2>


<form   action = "includes/signup.inc.php"  method = "post" >
    <input type = "text" name = "name" placeholder = "Full Name" ></input>
    <input type = "text" name = "email" placeholder = "Email" ></input>
    <input type = "text" name = "uid" placeholder = "Username" ></input>
    <input type = "password" name = "pwd" placeholder = "Password" ></input>
    <input type = "password" name = "pwdr" placeholder = "Repeat Password" ></input>
    <button type = "submit" name = "submit"> Sign Up </button>
</form>
<div>

<?php

if (isset($_GET["error"])) {
   if ($_GET["error"] == "emptyinput") {
       echo "<p>Fill in all fields.</p>";
   } else  if ($_GET["error"] == "invalidusername" ){
    echo "<p>Choose a valid username.</p>";
   } else if ($_GET["echo"] == "invalidemail") {
    echo "<p>Choose a valid email.</p>";
   } else if ($_GET["echo"] == "passwordsdontmatch") {
    echo "<p>Passwords do not match.</p>";
   } else if ($_GET["echo"] == "usernametaken") {
    echo "<p>Username has been taken.</p>";
   } else if ($_GET["echo"] == "stmtfailed") {
    echo "<p>Internal error.</p>";
} else {
    echo "<p>You have signed up.</p>";
}
}
   

?>

</section>


