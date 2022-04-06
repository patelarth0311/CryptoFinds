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




