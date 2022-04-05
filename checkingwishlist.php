<?php
session_start();

if(isset($_SESSION['userid'])) {
    header('location:wishlist.php');
}

else {
header('location:newspage.php');
}
?>