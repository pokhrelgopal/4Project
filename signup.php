<?php
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'head.php'; ?>
    <style>
        body{
            /* height: 100%; */
            display: flex;
            justify-content: center;
            /* align-items: center; */
        }

    </style>
</head>
<body class="background">
    <div class="signup">
        <a href="client-signup.php"><button type="submit" class="btn btn-bg btn-dark">Register as client</button></a>
        <a href="lawyer-signup.php"><button type="submit" class="btn btn-bg btn-dark">Register as lawyer</button></a>
    </div>
</body>
</html>