<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:login.php');
}

if (isset($_POST['update_order'])) {

    $order_update_id = $_POST['order_id'];
    $update_payment = $_POST['update_payment'];
    mysqli_query($conn, "UPDATE `orders` SET payment_status = '$update_payment' WHERE id = '$order_update_id'")
     or die('query failed');
    $message[] = 'order payment status has been updated';
}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `orders` WHERE id = '$delete_id'") or die('query failed');
    header('location:admin_orders.php');
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
    <title>BookStore/orders</title>
</head>
    <body>

        <?php include 'admin_header.php'; ?>
            <!-------Admin Dashboard orders start------->
          
            <section class="orders">

                <h1 class="title">Placed orders</h1>

                <div class="box-container">
                    <?php
                    $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
                    if (mysqli_num_rows($select_orders) > 0) {
                        while ($fetch_orders = mysqli_fetch_assoc($select_orders)) {
                            # code...
                     ?>
                            <div class="box">
                                <p> user id: <span> <?php echo $fetch_orders['user_id']; ?> </span> </p>
                                <p> placed on: <span> <?php echo $fetch_orders['placed_on']; ?> </span> </p>
                                <p> name: <span> <?php echo $fetch_orders['name']; ?> </span> </p>
                                <p> number: <span> <?php echo $fetch_orders['number']; ?> </span> </p>
                                <p> email: <span> <?php echo $fetch_orders['email']; ?> </span> </p>
                                <p> address: <span> <?php echo $fetch_orders['address']; ?> </span> </p>
                                <p> total products: <span> <?php echo $fetch_orders['total_products']; ?> </span> </p>
                                <p> total price: <span>$<?php echo $fetch_orders['total_price']; ?> </span>/-</p>
                                <p> payment Method:<span> <?php echo $fetch_orders['method']; ?> </span> </p>

                                <form action="" method="post">
                                    <input type="hidden" name="order_id" value="<?php echo $fetch_orders['id']; ?>">
                                    <select name="update_payment">
                                        <option value="" selected disabled> <?php echo $fetch_orders['payment_status']; ?> </option>
                                        <option value="pending">pending</option>
                                        <option value="completed">completed</option>
                                    </select>
                                    <input type="submit" value="update" name="update_order" class="option-btn">
                                    <a href="admin_orders.php?delete=<?php echo $fetch_orders['id']; ?>"
                                     onclick="return confirm('delete this order?')" class="delete-btn">delete</a>
                                </form>

                             </div>
                        <?php
                                  }
                             }else {
                             echo '<p class="empty">no orders placed yet</p>';
                             }
                         ?>
                </div>

            </section>

            <!-------Admin Dashboard orders end------->

        <script src="admin_script.js"></script>

    </body>
</html>