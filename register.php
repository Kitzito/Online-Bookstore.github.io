<?php

include 'config.php';

if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
    $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
    $user_type = $_POST['user_type'];

    $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

    if(mysqli_num_rows($select_users) > 0){
        $message[] = 'user already exist!';
    }else{
        if($pass != $cpass){
            $message[] = 'confirm password not matched!';
        }else {
            mysqli_query($conn, "INSERT INTO `users`(name, email, password, user_type) VALUES('$name','$email','$cpass','$user_type')") or die('query failed');
            $message[] = 'registration sucessfull!';
            header('location:login.php');
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
    <title>BookStore/Register</title>
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
        <h3>register now</h3>
        <input type="text" name = "name" placeholder="Enter your name" required class="box">
        <input type="email" name = "email" placeholder="Enter your email" required class="box">
        <input type="password" name = "password" placeholder="Enter your password" required class="box">
        <input type="password" name = "cpassword" placeholder="Confirm your password" required class="box">
        <select name="user_type" class="box">
            <option value="user">USER</option>
           <!-- <option value="admin">ADMIN</option> --> <!--can be removed to enable only a single already registred admin-->
        </select>
        <input type="submit" name="submit" value="register now" class="btn">
        <p>already have an account? <a href="login.php">Login Now</a> </p>
    </form>

</div>

    </body>
</html>