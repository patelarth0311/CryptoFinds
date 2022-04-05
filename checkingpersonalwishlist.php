<?php
session_start();

if(isset($_SESSION['userid'])) {
    header('location:personalwishlist.php');
}

else {
header('location:wishlist.php');
}
?>