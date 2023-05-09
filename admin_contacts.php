<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:login.php');
};

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `message` WHERE id = '$delete_id'") or die('query failed');
    header('location:admin_contacts.php');
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
    <title>BookStore/messages</title>
</head>
    <body>

        <?php include 'admin_header.php'; ?>
            <!-------Admin Dashboard Section Start------->
            <section class="messages">

            <h1 class = "title">messages</h1>

                <div class="box-container">
                <?php
                    $select_message = mysqli_query($conn, "SELECT * FROM  `message`") or die('query failed');
                    if(mysqli_num_rows($select_message) > 0){
                        while ($fetch_message = mysqli_fetch_assoc($select_message)) {
                    
                    ?>
                        <div class="box">
                            <p>name: <span> <?php echo $fetch_message['name'] ?> </span> </p>
                            <p>number: <span> <?php echo $fetch_message['number'] ?> </span> </p>
                            <p>email: <span> <?php echo $fetch_message['email'] ?> </span> </p>
                            <p>message: <span> <?php echo $fetch_message['message'] ?> </span> </p>
                            <a href="admin_contacts.php?delete=<?php echo $fetch_message['id']; ?>"
                         onclick="return confirm('delete this message?')" class="delete-btn">delete message</a>
                        </div>
                     <?php
                        };
                    }else {
                    echo '<p class = "empty">you have no messages yet</p>';
                    }
                    ?>
                </div>

            </section>
          

            <!-------Admin Dashboard Section Ends------->

        <script src="admin_script.js"></script>

    </body>
</html>