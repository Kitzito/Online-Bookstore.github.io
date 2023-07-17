<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:login.php');
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
    <link rel="stylesheet" href="admin_style.css">
    <!------ For Custom CSS File------>
    <link rel="stylesheet" href="fontawesome-free-6.2.1-web/css/all.css">
    <title>BookStore/Admin-Panel</title>
</head>
    <body>

        <?php include 'admin_header.php'; ?>
            <!-------Admin Dashboard Section Start------->
                <section class = "dashboard">
                    
                    <h1 class="title">dashboard</h1>

                    <div class="box-container">
                            <!---------total pendings------------>
                        <div class="box">
                             <?php
                                $total_pendings = 0;
                                 $select_pending = mysqli_query($conn, "SELECT total_price FROM `orders` WHERE payment_status = 'pending'") or die('query failed');
                                 if (mysqli_num_rows($select_pending) > 0 ) {
                                     while ($fetch_pendings = mysqli_fetch_assoc($select_pending)) {
                                     $total_price = $fetch_pendings['total_price'];
                                    $total_pendings += $total_price;
                                        };
                                     };
                                ?>
                             <h3><?php echo $total_pendings; ?></h3>
                         <p>total pendings</p>
                        </div>
                            <!-------total completed--------->
                        <div class="box">
                             <?php
                                $total_completed = 0;
                                 $select_completed = mysqli_query($conn, "SELECT total_price FROM `orders` WHERE payment_status = 'completed'") or die('query failed');
                                 if (mysqli_num_rows($select_completed) > 0 ) {
                                     while ($fetch_completed = mysqli_fetch_assoc($select_completed)) {
                                     $total_price = $fetch_completed['total_price'];
                                    $total_completed += $total_price;
                                        };
                                     };
                                ?>
                             <h3><?php echo $total_completed; ?></h3>
                         <p>completed Payments</p>
                        </div>
                            <!--------order placed------>
                            <div class = "box">
                                <?php
                                $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
                                $number_of_orders = mysqli_num_rows($select_orders);
                                ?>
                                <h3><?php echo $number_of_orders; ?></h3>
                                <p>orders placed</p>
                            </div>
                            <!----------products added---->
                            <div class = "box">
                                <?php
                                $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
                                $number_of_products = mysqli_num_rows($select_products);
                                ?>
                                <h3><?php echo $number_of_products; ?></h3>
                                <p>products added</p>
                            </div>

                            <!--------number of users------>
                            <div class = "box">
                                <?php
                                $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE user_type = 'user'") or die('query failed');
                                $number_of_users = mysqli_num_rows($select_users);
                                ?>
                                <h3><?php echo $number_of_users; ?></h3>
                                <p>normal users</p>
                            </div>

                            <!---------number of admins---->
                            <div class = "box">
                                <?php
                                $select_admins = mysqli_query($conn, "SELECT * FROM `users` WHERE user_type = 'admin'") or die('query failed');
                                $number_of_admins = mysqli_num_rows($select_admins);
                                ?>
                                <h3><?php echo $number_of_admins; ?></h3>
                                <p>admin users</p>
                            </div>

                            <!---------number of accounts---->
                            <div class = "box">
                                <?php
                                $select_account = mysqli_query($conn, "SELECT * FROM `users`") or die('query failed');
                                $number_of_account = mysqli_num_rows($select_account);
                                ?>
                                <h3><?php echo $number_of_account; ?></h3>
                                <p>total users</p>
                            </div>

                             <!---------number of messages---->
                             <div class = "box">
                                <?php
                                $select_messages = mysqli_query($conn, "SELECT * FROM `message`") or die('query failed');
                                $number_of_messages = mysqli_num_rows($select_messages);
                                ?>
                                <h3><?php echo $number_of_messages; ?></h3>
                                <p>new messages</p>
                            </div>

                    </div>
                </section>

            <!-------Admin Dashboard Section Ends------->

        <script src="admin_script.js"></script>

    </body>
</html>