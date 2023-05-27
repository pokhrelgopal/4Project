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
    <h2 class="form-heading">Create new Account</h2>
    <p class="normal-text">Register yourself as a client</p>
    <form class="form" method="post" action="client-signup.php">
        <div class="form-group">
            <label for="fullname">Full Name:</label>
            <input type="text" id="fullname" name="cname" placeholder="Enter your full name">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email">
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" id="phone"name="phone" placeholder="Enter your phone number">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password">
        </div>
        <!-- <div class="form-group">
            <label for="password">Confirm Password:</label>
            <input type="password" id="password" name="" placeholder="Re-enter your password">
        </div> -->
        <div class="form-group">
            <input class="btn btn-dark btn-bg" type="submit" value="Signup" name="signup" style="width: 100%;">
        </div>
        <div class="normal-text">
            <p>Already have an account?<a href="login.php">Login</a></p>
        </div>
    </form>
</body>
</html>
<?php
    // Check if form was submitted
    if (isset($_POST['signup'])) {
        // 
        $cname = $_POST['cname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];
        $ins = "INSERT INTO client (cname,email,password,phone) VALUES ('$cname','$email','$password','$phone') ";
        $result = $con->query($ins);
        if ($result) {
            header("Location:login.php");
        } else {
        }
    }

?>