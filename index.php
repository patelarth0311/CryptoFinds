<?php   include_once 'header.php'?>


<div id = "loadPage" >

<h1>Crypto Finds</h1>
<div id = "AOT">

<img src = "images/crypto.jpg"></img>


</div>
</div>

</body>
</html>

<!DOCTYPE html>
<?php
$cookie_name = "crypto";
$cookie_value = "crytpofinds";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
?>
<html>
<body>

<?php
if(isset($_COOKIE[$cookie_name])) {
    // echo "Cookie '" . $cookie_name . "' is set!";
} else {
     echo "Cookie '" . $cookie_name . "' is not set!<br>";
     echo "Value is: " . $_COOKIE[$cookie_name];
}
?>

</body>
</html>