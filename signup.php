<?php
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'head.php'; ?>
    <style>
        body {
            display: flex;
            justify-content: center;
            /* align-items: center; */
            
        }

        .signup {
            margin-top: 200px;
        }
    </style>
</head>

<body class="background">
    <div class="signup">
        <img src="scale.png" alt="" class="" style="margin-left: 120px; margin-bottom:40px;">
        <p class="normal-text" style="margin-bottom: 20px;">
            Register yourself and continue with your own account
        </p>
        <a href="client-signup.php"><button type="submit" class="btn btn-bg btn-dark">Register as client</button></a>
        <a href="lawyer-signup.php"><button type="submit" class="btn btn-bg btn-dark">Register as lawyer</button></a>
    </div>
</body>

</html>