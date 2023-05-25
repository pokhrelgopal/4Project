<?php
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'head.php'; ?>
</head>

<body class="background">
    <div class="f-logo">
        <img src="scale.png" alt="">
    </div>
    <h2 class="form-heading">Login</h2>
    <p class="normal-text">Login to continue</p>
    <form class="form">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" placeholder="Enter your email">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" placeholder="Enter your password">
        </div>
        <div class="form-group">
            <input class="btn btn-dark btn-bg" type="submit" value="Login" style="width: 100%;">
        </div>
        <div class="normal-text">
            <p>Don't have an account?<a href="login.php">Sign up</a></p>
        </div>
    </form>

</body>

</html>