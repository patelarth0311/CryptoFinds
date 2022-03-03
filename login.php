<?php   include_once 'header.php'?>

<section class = "signup-form">

<div id = "signUpFormCont">
    
<form   action = "includes/login.inc.php"  method = "post" >
<h2>Log in </h2>
    <input type = "text" name = "uid" placeholder = "Username/Email" ></input>
    <input type = "password" name = "pwd" placeholder = "Password" ></input>
    <button id = "forgotPasButton"    type = "button" name = "forgot"  ><a href = "forgotPass.php">Forgot Password?</a></button>
    <button type = "submit"  name = "submit"> Log in </button>

</form>




<?php


if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
        echo "<p>Fill in all fields.</p>";
    } else  if ($_GET["error"] == "wronglogin" ){
     echo "<p>Enter the correct username/password</p>";
    } else  if ($_GET["error"] == "none2" ){
        echo "<p>You have changed the password.</p>";
       } 
    else {
     echo "<p>You have logged in.</p>";
 }
 }

?>


<div>



</section>
