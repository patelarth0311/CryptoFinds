<?php
session_start();
include('includes/dbh.inc.php');
    $show=$info='';
    $sql = "SELECT * FROM `cryptos`";
    $title = "Cryptocurrencies Available";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
if (!empty($row)) {
    do {
        $show .= '
        <tr>
            <td>'.$row['cryptoId'].'</td>
            <td>'.$row['cryptoName'].'</td>
            <td>'.$row['price'].'</td>
            <td><button style="background-color: green;" onclick="location.href=\'wishlist.php?add_id='.$row['cryptoName'].'\';">Add</button></td>
        </tr>';
     } while ($row = mysqli_fetch_assoc($result));
}

if(isset($_REQUEST['add_id'])) {
    $add_id=$_REQUEST['add_id'];
    $usersId=$_SESSION['userid'];
    $sql="SELECT* FROM wishlist WHERE usersId='$usersId' AND cryptoName='$add_id'";
    $result=mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)==1) {
        $info='Already in wishlist';
        header('location:wishlist.php');
    }
    else {
    $insert="INSERT INTO wishlist (cryptoName, usersId) VALUES ('$add_id', '$usersId')";
    if(mysqli_query($conn, $insert)) {
        $info='Successfully added to wishlist';
        header('location:wishlist.php');
    }
}
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link  rel = "stylesheet" href = "styles/style.css" ></link>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Wishlist Page</title>
</head>
<body>
    <h1 class="title"><?php echo $title; ?></h1>
    <table class="list">
        <tr>
            <th>ID</th>
            <th>Cryptocurrency</th>
            <th>Price</th>
            <th></th>
        </tr>
        <?php echo $show; ?>
    </table>
    <div id="addwishlist">
        <a href="checkingpersonalwishlist.php">View your Wishlist</a>
    </div>
    <p class="info"> <?php echo $info;?> </p>
    <div id="home">
        <h2> <a href="index.php">Return to homepage</a> </h2>
    </div>
</body>
</html>