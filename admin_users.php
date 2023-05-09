<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:login.php');
}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `users` WHERE id = '$delete_id'") or die('query failed');
    header('location:admin_users.php');
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
    <title>BookStore/users</title>
</head>
    <body>

        <?php include 'admin_header.php'; ?>
            <!-------Admin Dashboard Section Start------->
            <section class="users">

                <h1 class = "title">user accounts</h1>

                <div class = "box-container">
                    <?php
                    $select_users = mysqli_query($conn, "SELECT * FROM  `users`") or die('query failed');
                    while ($fetch_users = mysqli_fetch_assoc($select_users)) {
                    ?>
                    <div class="box">

                        <p>username: <span><?php echo $fetch_users['name']; ?></span></p>
                        <p>email: <span><?php echo $fetch_users['email']; ?></span></p>
                        <p>user type: <span style = "color: <?php if($fetch_users['users_type'] == 'admin'){ echo "var(--orange)";} ?>" >
                        <?php echo $fetch_users['user_type']; ?></span></p>
                        <a href="admin_users.php?delete=<?php echo $fetch_users['id']; ?>"
                         onclick="return confirm('delete this user?')" class="delete-btn">delete user</a>

                    </div>
                    <?php
                        };
                    ?>
                </div>

            </section>
          

            <!-------Admin Dashboard Section Ends------->

        <script src="admin_script.js"></script>

    </body>
</html>