<?php
session_start();
include('database.inc.php');
include('function.inc.php');
include('constant.inc.php');
$cartPrice = 0;
$deliveryCharge = 30;
$cartArr = getUserFullCart();
$totalCartDish = count($cartArr);
foreach ($cartArr as $list) {
    $cartPrice = $cartPrice + ($list['qty'] * $list['price']);
}
$totalPrice = $cartPrice + $deliveryCharge;
// prx($cartArr);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- google fonts -->
    <link rel="stylesheet" href="assets/fonts/font.css">
    <!-- Fontawesome js -->
    <link rel="stylesheet" href="assets/font-awesome/all.css">
    <!-- custom style css -->
    <link rel="stylesheet" href="css/style.css">


</head>

<body>
    <header>

        <nav class="navbar" id="navbar">
            <div class="container">
                <div class="brand-and-toggler">
                    <a href="index.html" class="navbar-brand">
                        <img src="assets/images/logo.jpeg" alt="logo">

                    </a>
                    <button type="button" id="navbar-toggler">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
                <div class="navbar-collapse">
                    <ul class="navbar-nav1">
                        <li>
                            <a href="index.php">home</a>
                        </li>

                        <li>
                            <a href="index.php#contact">Contact Us</a>
                        </li>
                        <li>
                            <a href="menu.php">menu</a>
                        </li>



                        <?php
                        if (!isset($_SESSION['FOOD_USER_NAME'])) {
                        ?>

                            <li>
                                <a href="cart.php">cart(<span class="mycart"><?php echo $totalCartDish ?></span>)</a>
                            </li>
                            <li>
                                <a href="login.php">Login/Register</a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        <?php
        if (isset($_SESSION['FOOD_USER_NAME'])) {
        ?>
            <nav class="navbar navbar-user fxd-navbar" id="navbar-user">
                <div class="container">

                    <div class="navbar-expanded">
                        <ul class="navbar-nav usernav">
                            <div class="welcomeuser">
                                <li class="welcomeuser"><?php echo "Welcome " . $_SESSION['FOOD_USER_NAME'] . "!"; ?>
                            </div>
                            <li>
                                <a href="index.php">home</a>
                            </li>
                            <li>
                                <a href="menu.php">menu</a>
                            </li>

                            <li><a href="order_history.php">Order History</a></li>
                            <li><a href="logout.php">Logout</a></li>
                            <li>
                                <a href="cart.php">My cart (<span class="mycart"><?php echo $totalCartDish ?></span>)</a> <br>

                                <div class="price-display">Total: <span class="totalPrice"><?php echo $cartPrice . "/-" ?> </span></div>
                            </li>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>
        <?php } ?>
        <!-- end of navbar -->
    </header>

    <!-- end of header -->