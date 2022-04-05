<?php
session_start();
include('includes/dbh.inc.php');
$show='';
$title='Your Wishlist';
$usersId=$_SESSION['userid'];
$sql="SELECT* FROM wishlist JOIN cryptos ON cryptos.cryptoName=wishlist.cryptoName WHERE usersId=$usersId";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
if (!empty($row)) {
    do {
        $show .= '
        <tr>
            <td>'.$row['wishlistId'].'</td>
            <td>'.$row['cryptoName'].'</td>
            <td>'.$row['price'].'</td>
        </tr>';
     } while ($row = mysqli_fetch_assoc($result));
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
        </tr>
        <?php echo $show; ?>
    </table>
    <div id="home">
        <h2> <a href="index.php">Return to homepage</a> </h2>
    </div>
</body>
</html>