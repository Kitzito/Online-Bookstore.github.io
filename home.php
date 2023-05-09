<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:login.php');
}

if (isset($_POST['add_to_cart'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];
    
    $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND  user_id = '$user_id'") or die("query failed");

    if (mysqli_num_rows($check_cart_numbers) > 0) {
        $message[] = 'already added to cart';
    }else {
        mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES
        ('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
        $message[] = 'product added to cart';
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
    <title>BookStore/home</title>
</head>
    <body>

        <?php include 'header.php'; ?>

            <section class="home">

                <div class="content">
                    <h3>World's Top Rated BookStore</h3>
                    <p>Get all your favourite books, from comics to adventure,
                        short stories to horror and more.
                    </p>
                    <a href="about.php" class="white-btn">discover more</a>
                </div>

            </section>

            <section class="products">

                <h1 class="title">Latest Products</h1>

                <div class="box-container">

                    <?php
                    
                        $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 30") or die("query failed");
                        if(mysqli_num_rows($select_products) > 0){
                            while($fetch_products = mysqli_fetch_assoc($select_products)){
                    ?>
                    <form action="" method="post" class="box">
                        <img class="image" src="books/<?php echo $fetch_products['image']; ?>" alt="">
                        <div class="name"><?php echo $fetch_products['name']; ?></div>
                        <div class="price">$<?php echo $fetch_products['price']; ?>/-</div>
                        <input type="number" min="1" name="product_quantity" value="1" class="qty">
                        <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
                        <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
                        <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
                        <input type="submit" value="add to cart" name="add_to_cart" class="btn">
                    </form>
                    <?php
                         }
                        }else {
                            echo '<p class="empty">no products added yet!</p>';
                        }
                    ?>
                </div>

                <div class="load-more" style="margin-top: 2rem; text-align: center;">
            
                    <a href="shop.php" class="option-btn">load more</a>

                </div>

            </section>

            <section class="about">

                <div class="flex">

                    <div class="image">
                        <img src="workspace 1.jpg" alt="">
                    </div>

                    <div class="content">
                        <h3>about us</h3>
                        <p>we are an emerging team of young and committed developers,
                            with aim to provide society with top rated books for both 
                            academic purposes and entertainment purposes.
                        </p>
                        <a href="about.php" class="btn">read more</a>
                    </div>

                </div>

            </section>

            <section class="home-contact">

               <div class="content">
                     <h3>have any questions?</h3>
                     <p>To get first hand information about our products and to
                        know more about our offers and bonuses, contact us.
                     </p>
                     <a href="contact.php" class="white-btn">contact us</a>
               </div>

            </section>



        <?php include 'footer.php'; ?>

        <!-----------custome js file-------------->
        <script src="script.js"></script>
    </body>
</html>