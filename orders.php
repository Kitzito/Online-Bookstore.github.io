<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
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
    <link rel="stylesheet" href="style.css">
    <!------ For Custom CSS File------>
    <link rel="stylesheet" href="fontawesome-free-6.2.1-web/css/all.css">
    <title>BookStore/orders</title>
</head>
    <body>

        <?php include 'header.php'; ?>
 
            <div class="heading">
                <h3>placed orders</h3>
                <p> <a href="home.php">home</a>/orders </p>
            </div>

            <section class="placed-orders">

                <h1 class="title">placed orders</h1>

                <div class="box-container">

                    <?php
                        $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE user_id = '$user_id'") or die("query failed");
                        if(mysqli_num_rows($order_query) > 0){
                            while ($fetch_orders = mysqli_fetch_assoc($order_query)) {   
                    ?>
                   <div class="box">
                         <p>placed on: <span> <?php echo $fetch_orders['placed_on']; ?> </span> </p>
                         <p>name: <span> <?php echo $fetch_orders['name']; ?> </span> </p>
                         <p>number: <span> <?php echo $fetch_orders['number']; ?> </span> </p>
                         <p>email: <span> <?php echo $fetch_orders['email']; ?> </span> </p>
                         <p>address: <span> <?php echo $fetch_orders['address']; ?> </span> </p>
                         <p>payment method: <span> <?php echo $fetch_orders['method']; ?> </span> </p>
                         <p>your orders: <span> <?php echo $fetch_orders['total_products']; ?> </span> </p>
                         <p>total price: <span>$ <?php echo $fetch_orders['total_price']; ?> </span> </p>
                         <p>payment status: <span style="color: <?php if($fetch_orders['payment_status'] == 'pending'){ echo 'red'; }else{ echo 'green'; } ?>"> <?php echo $fetch_orders['payment_status']; ?> </span> </p>
                   </div>
                     <?php
                         }
                     }else{
                          echo '<p class="empty">no orders placed yet</p>';
                     }
                    ?>
                </div>

            </section>





        <?php include 'footer.php'; ?>

        <!-----------custome js file-------------->
        <script src="script.js"></script>
    </body>
</html>