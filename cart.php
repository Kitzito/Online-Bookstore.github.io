<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:login.php');
}

if (isset($_POST['update_cart'])) {
    $cart_id = $_POST['cart_id'];
    $cart_quantity = $_POST['cart_quantity'];

    mysqli_query($conn, "UPDATE `cart` SET quantity = '$cart_quantity' WHERE id = '$cart_id'") or die("query failed");

    $message[] = 'cart quantity updated!';
}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$delete_id'") or die("query falied");
    header('location:cart.php');
}

if (isset($_GET['delete_all'])) {
    mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die("query falied");
    header('location:cart.php');
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
    <title>BookStore/cart</title>
</head>
    <body>

        <?php include 'header.php'; ?>

            <div class="heading">
                <h3>shopping cart</h3>
                <p> <a href="home.php">home</a>/cart </p>
            </div>

                <section class="shopping-cart">

                    <h1 class="title">products added</h1>

                    <div class="box-container">

                        <?php
                        $grand_total = 0;
                            $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die("query failed");

                            if (mysqli_num_rows($select_cart) > 0) {
                                while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {     
                        ?>
                            <div class="box">
                                <a href="cart.php?delete=<?php echo $fetch_cart['id'] ?>" class="fas fa-times" onclick="return confirm('delete this form cart?')"></a>
                                <img src="books/<?php echo $fetch_cart['image'] ?>" alt="">
                                <div class="name"><?php echo $fetch_cart['name'] ?></div>
                                <div class="price">$<?php echo $fetch_cart['price'] ?>/-</div>
                                <form action="" method="post">
                                    <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id'] ?>">
                                    <input type="number" min="1" name="cart_quantity" id="" value="<?php echo $fetch_cart['quantity']; ?>">
                                    <input type="submit" name="update_cart" value="update" class="option-btn">
                                </form>
                                <div class="sub-total"> sub total: <span> $<?php echo $sub_total = ($fetch_cart['quantity'] * $fetch_cart['price']); ?> /-</span> </div>
                            </div>
                        <?php
                        $grand_total += $sub_total;
                          }
                        }else{
                            echo '<p class="empty">your cart is empty</p>';
                        }  
                        ?>

                    </div>

                    <div style="margin-top: 2rem; text-align: center;">
                        <a href="cart.php?delete_all" class="delete-btn <?php echo($grand_total > 1)?'':'disabled'; ?> " onclick="return confirm('delete all form cart?')">delete all</a>
                    </div>

                    <div class="cart-total">
                        <p>grand total: <span>$<?php echo $grand_total; ?>/-</span> </p>
                        <div class="flex">
                            <a href="shop.php" class="option-btn">continue shopping</a>
                            <a href="checkout.php" class="btn <?php echo($grand_total > 1)?'':'disabled'; ?> ">proceed to checkout</a>
                        </div>
                    </div>

                </section>





        <?php include 'footer.php'; ?>

        <!-----------custome js file-------------->
        <script src="script.js"></script>
    </body>
</html>