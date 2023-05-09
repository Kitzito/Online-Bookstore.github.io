<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:login.php');
}

if (isset($_POST['order_btn'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $number = $_POST['number'];
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $method = mysqli_real_escape_string($conn, $_POST['method']);
    $address = mysqli_real_escape_string($conn,  $_POST['flat'].',
    '. $_POST['street'].', '. $_POST['city'].', '. $_POST['region'].',
    '.$_POST['country'].', '.$_POST['zip_code']);
    $placed_on = date('d-m-y');

    $cart_total = 0;
    $cart_products[] = '';

    $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die("query failed");
    if (mysqli_num_rows($cart_query) > 0) {
        while ($cart_item = mysqli_fetch_assoc($cart_query)) {
            $cart_products[] = $cart_item['name'].' ('.$cart_item['quantity'].')';
            $sub_total = ($cart_item['price'] * $cart_item['quantity']);
            $cart_total += $sub_total;
        }
    }

    $total_products = implode(', ',$cart_products);

    $order_query = mysqli_query($conn, "SELECT * FROM `orders`
            WHERE name = '$name' AND number = '$number' AND email = '$email' AND method = '$method'
            AND address = '$address' AND total_products = '$total_products' AND total_price = '$cart_total' ")
             or die("query failed");

             if ($cart_total == 0) {
                $message[] = 'your cart is empty';
             }else{
                if(mysqli_num_rows($order_query) > 0){
                    $message[] = 'order already placed';
                }else {
                    mysqli_query($conn, "INSERT INTO `orders`(user_id, name, number, email, method, address, total_products, total_price, placed_on)
                    VALUES('$user_id', '$name', '$number', '$email', '$method', '$address', '$total_products', '$cart_total', '$placed_on') ") or die("query failed");
                    $message[] = 'order placed successfully';
                    mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die("query failed");
                }
             }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="refresh" content="">
    <meta http-equiv="cache-control" content="no-cache">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Author" content="Godfada">
    <meta name="keyword" content="BookStore">
    <meta name="Robot" content="Index,Follow">
    <meta name="description" content="This is a BookStore">
    <meta name="googlebot" content="translate">
    <meta name="revised" content="chatbox, 16/04/23">
    <meta name="coverage" content="worldwide">
    <meta name="target" content="all">
    <meta name="distribution" content="global">
    <meta name="classification" content="Business">
    <meta name="reply-to" content="mnkitzito@gmail.com">
    <!---- For Browser Icon------->
    <link rel="icon" href="mk.png">
    <!---- For CSS File----->
    <link rel="stylesheet" href="style.css">
    <!------ For Custom CSS File------>
    <link rel="stylesheet" href="fontawesome-free-6.2.1-web/css/all.css">
    <title>BookStore/checkout</title>
</head>
    <body>

        <?php include 'header.php'; ?>

            <div class="heading">
                <h3>checkout</h3>
                <p> <a href="home.php">home</a>/checkout </p>
            </div>

            <section class="display-order">

                <?php
                    $grand_total = 0;
                    $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die("query failed");
                    if (mysqli_num_rows($select_cart) > 0) {
                        while ($fetch_cart = mysqli_fetch_assoc($select_cart)){
                            $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
                            $grand_total += $total_price;
                ?>
                <p> <?php echo $fetch_cart['name']; ?> <span>(<?php echo '$'.$fetch_cart['price'].'/-'.'x'.$fetch_cart['quantity']; ?>)</span> </p>
            <?php
                 }
                }else{
                    echo '<p class="empty">your cart is empty</p>';
                }
            ?>
            <div class="grand-total"> grand-total: <span> $<?php echo $grand_total; ?>/-</span> </div>

            </section>

            <section class="checkout">

                <form action="" method="post">
                    <h3>place your order</h3>
                    <div class="flex">
                        <div class="inputBox">
                            <span>your name:</span>
                            <input type="text" name="name" required placeholder="enter your name">
                        </div>
                        <div class="inputBox">
                            <span>your number:</span>
                            <input type="number" name="number" required placeholder="enter your number">
                        </div>
                        <div class="inputBox">
                            <span>your email:</span>
                            <input type="email" name="email" required placeholder="enter your email">
                        </div>
                        <div class="inputBox">
                            <span>payment method:</span>
                            <select name="method">
                                <option value="cash on delivery">cash on delivery</option>
                                <option value="mobile money">mobile money</option>
                                <option value="orange money">orange money</option>
                                <option value="crypto currency">crypto currency</option>
                                <option value="credit card">credit card</option>
                                <option value="paypal">paypal</option>
                            </select>
                        </div>
                        <div class="inputBox">
                            <span>address line 01:</span>
                            <input type="text" name="flat" required placeholder="e.g house/hostel name">
                        </div>
                        <div class="inputBox">
                            <span>address line 01:</span>
                            <input type="number" min="0" name="street" required placeholder="e.g room number">
                        </div>
                        <div class="inputBox">
                            <span>city:</span>
                            <input type="text" name="city" required placeholder="e.g Buea">
                        </div>
                        <div class="inputBox">
                            <span>region:</span>
                            <input type="text" name="region" required placeholder="e.g southwest">
                        </div>
                        <div class="inputBox">
                            <span>country:</span>
                            <input type="text" name="country" required placeholder="e.g cameroon">
                        </div>
                        <div class="inputBox">
                            <span>zip code:</span>
                            <input type="text" min="0" name="zip_code" required placeholder="e.g +237">
                        </div>
                    </div>
                    <input type="submit" value="order now" class="btn" name="order_btn">
                </form>

            </section>




        <?php include 'footer.php'; ?>

        <!-----------custome js file-------------->
        <script src="script.js"></script>
    </body>
</html>