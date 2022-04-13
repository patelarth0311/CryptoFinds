<?php
session_start();

if(isset($_SESSION['userid'])) {
    header('location:cryptos.php');
}

else {
header('location:newspage.php');
}
?>