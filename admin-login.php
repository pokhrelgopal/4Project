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
    <h2 class="form-heading">Admin Login</h2>
    <form class="form" action="admin-login.php" method="post">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" placeholder="Enter your email">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" placeholder="Enter your password">
        </div>
        <div class="form-group">
            <input class="btn btn-dark btn-bg" type="submit" name="login" value="Login" style="width: 100%;">
        </div>
    </form>
</body>
</html>
<?php
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];    
        $sql = "select * from admin where email='$email' and password='$password'";
        // echo $sql;
        $result = $con->query($sql);
        $num=mysqli_num_rows($result);
        if ($num==1) {
            session_start();
            $_SESSION['email'] = $email;
            header("Location:admin.php");
            echo "
            <script>
            alert('successful');
            </script>
            ";
        } else {
            echo "
            <div id='failedMessage' class='failed-message'>
                Login Failed !
            </div>
            <script>
            document.addEventListener('DOMContentLoaded', function() {
                var failedMessage = document.getElementById('failedMessage');
                if (failedMessage) {
                    failedMessage.style.display = 'block';
                    setTimeout(function() {
                        failedMessage.style.display = 'none';
                        window.location.href='login.php'
                    }, 1500);
                }
            });
        </script>
        ";
        }
    } 
?>