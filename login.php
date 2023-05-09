<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

    $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

    if(mysqli_num_rows($select_users) > 0){

        $row = mysqli_fetch_assoc($select_users);

        if($row['user_type'] == 'admin'){

            $_SESSION['admin_name'] = $row['name'];
            $_SESSION['admin_email'] = $row['email'];
            $_SESSION['admin_id'] = $row['id'];
            header('location:admin_page.php');

        }else if($row['user_type'] == 'user'){

            $_SESSION['user_name'] = $row['name'];
            $_SESSION['user_email'] = $row['email'];
            $_SESSION['user_id'] = $row['id'];
            header('location:home.php');
        }

    }else{
        $message[] = 'incorrect email or password!';
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
    <title>BookStore/Login</title>
</head>
    <body>

    

    <?php
    
    if(isset($message)){
        foreach ($message as $message) {
            echo ' <div class = "message">
            <span>'.$message.'</span>
            <i class="fa fa-times" onclick = "this.parentElement.remove();"></i>
         </div> ';
        }
    }
    
    ?>

<div class="form-container">

    <form action="" method="post">
        <h3>login now</h3>
        <input type="email" name = "email" placeholder="Enter your email" required class="box">
        <input type="password" name = "password" placeholder="Enter your password" required class="box">
        <input type="submit" name="submit" value="login now" class="btn">
        <p>don't have an account? <a href="register.php">Register Now</a> </p>
    </form>

</div>

    </body>
</html>