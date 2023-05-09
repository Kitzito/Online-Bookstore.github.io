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
    <title>BookStore/about</title>
</head>
    <body>

        <?php include 'header.php'; ?>

            <div class="heading">
                <h3>about us</h3>
                <p> <a href="home.php">home</a>/about </p>
            </div>

        <section class="about">

            <div class="flex">

                 <div class="image">
                     <img src="AI book.jpg" alt="">
                 </div>

             <div class="content">
                 <h3>Why Choose Us?</h3>
                 <p>we are an award winning team of young developers, commited to
                    entertaining society via providing the best books , witten by 
                    top rated authors. our services, offers and bonuses has made 
                    us a top rated bookstore.
                 </p>
                 <p>In association with Solve Tech Academy, We are proudly Sponsored
                    by Bill'sUpdate, Landmark Technologies and K2soft.
                  </p>
                  <a href="contact.php" class="btn">Contact Us</a>
              </div>

            </div>

        </section>

        <section class="reviews">

            <h1 class="title">client's reviews</h1>

            <div class="box-container">

                <div class="box">
                    <img src="teacher robot.jpg" alt="">
                    <p>gdyd ywyd wydyw wyfdw wydw wyfdy wgdy wydyg wyd wdg 
                        wdydy wyfd wgdw ywdgyw wydfyw ywfdyw wydfyw dyyw wdfwt
                        fdtw
                    </p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <h3>Eyong Benjamin</h3>
                </div>

                <div class="box">
                    <img src="teacher robot.jpg" alt="">
                    <p>gdyd ywyd wydyw wyfdw wydw wyfdy wgdy wydyg wyd wdg 
                        wdydy wyfd wgdw ywdgyw wydfyw ywfdyw wydfyw dyyw wdfwt
                        fdtw
                    </p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <h3>Bato John</h3>
                </div>

                <div class="box">
                    <img src="teacher robot.jpg" alt="">
                    <p>gdyd ywyd wydyw wyfdw wydw wyfdy wgdy wydyg wyd wdg 
                        wdydy wyfd wgdw ywdgyw wydfyw ywfdyw wydfyw dyyw wdfwt
                        fdtw
                    </p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <h3>Paola Kole</h3>
                </div>

                <div class="box">
                    <img src="teacher robot.jpg" alt="">
                    <p>gdyd ywyd wydyw wyfdw wydw wyfdy wgdy wydyg wyd wdg 
                        wdydy wyfd wgdw ywdgyw wydfyw ywfdyw wydfyw dyyw wdfwt
                        fdtw
                    </p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <h3>Charles Lition</h3>
                </div>

                <div class="box">
                    <img src="teacher robot.jpg" alt="">
                    <p>gdyd ywyd wydyw wyfdw wydw wyfdy wgdy wydyg wyd wdg 
                        wdydy wyfd wgdw ywdgyw wydfyw ywfdyw wydfyw dyyw wdfwt
                        fdtw
                    </p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <h3>Hanish Chung</h3>
                </div>

                <div class="box">
                    <img src="teacher robot.jpg" alt="">
                    <p>gdyd ywyd wydyw wyfdw wydw wyfdy wgdy wydyg wyd wdg 
                        wdydy wyfd wgdw ywdgyw wydfyw ywfdyw wydfyw dyyw wdfwt
                        fdtw
                    </p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <h3>Lydia Tabe</h3>
                </div>

            </div>

        </section>

        <section class="authors">

            <h1 class="title">Greate Authors</h1>

            <div class="box-container">

                <div class="box">
                    <img src="AI book.jpg" alt="">
                    <div class="share">
                        <a href="#" class="fab fa-facebook"></a>
                        <a href="#" class="fab fa-twitter"></a>
                        <a href="#" class="fab fa-instagram"></a>
                        <a href="#" class="fab fa-linkedin"></a>
                    </div>
                    <h3>Princess Mbi</h3>
                </div>

                <div class="box">
                    <img src="AI book.jpg" alt="">
                    <div class="share">
                        <a href="#" class="fab fa-facebook"></a>
                        <a href="#" class="fab fa-twitter"></a>
                        <a href="#" class="fab fa-instagram"></a>
                        <a href="#" class="fab fa-linkedin"></a>
                    </div>
                    <h3>Emy Pride</h3>
                </div>

                <div class="box">
                    <img src="AI book.jpg" alt="">
                    <div class="share">
                        <a href="#" class="fab fa-facebook"></a>
                        <a href="#" class="fab fa-twitter"></a>
                        <a href="#" class="fab fa-instagram"></a>
                        <a href="#" class="fab fa-linkedin"></a>
                    </div>
                    <h3>Patrick Ness</h3>
                </div>

                <div class="box">
                    <img src="AI book.jpg" alt="">
                    <div class="share">
                        <a href="#" class="fab fa-facebook"></a>
                        <a href="#" class="fab fa-twitter"></a>
                        <a href="#" class="fab fa-instagram"></a>
                        <a href="#" class="fab fa-linkedin"></a>
                    </div>
                    <h3>Frank Miller</h3>
                </div>

                <div class="box">
                    <img src="AI book.jpg" alt="">
                    <div class="share">
                        <a href="#" class="fab fa-facebook"></a>
                        <a href="#" class="fab fa-twitter"></a>
                        <a href="#" class="fab fa-instagram"></a>
                        <a href="#" class="fab fa-linkedin"></a>
                    </div>
                    <h3>Geoff Johns</h3>
                </div>

                <div class="box">
                    <img src="AI book.jpg" alt="">
                    <div class="share">
                        <a href="#" class="fab fa-facebook"></a>
                        <a href="#" class="fab fa-twitter"></a>
                        <a href="#" class="fab fa-instagram"></a>
                        <a href="#" class="fab fa-linkedin"></a>
                    </div>
                    <h3>Alex Ross</h3>
                </div>

            </div>

        </section>



        <?php include 'footer.php'; ?>

        <!-----------custome js file-------------->
        <script src="script.js"></script>
    </body>
</html>