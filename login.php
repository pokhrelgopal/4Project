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
    <form class="form" action="login.php" method="post">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" placeholder="Enter your email">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" placeholder="Enter your password">
        </div>
        <div class="form-group">
            <label for="">Logging in as:</label>
            <select name="role" id="role" class="" style="width:100%; padding:10px; font-size:16px;border-radius:5px">
                <option value="client">Client</option>
                <option value="lawyer">Lawyer</option>
            </select>
        </div>
        <div class="form-group">
            <input class="btn btn-dark btn-bg" type="submit" name="login" value="Login" style="width: 100%;">
        </div>
        <div class="normal-text">
            <p>Don't have an account?<a href="signup.php">Sign up</a></p>
        </div>
    </form>
</body>

</html>
<?php
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    
    if ($role == 'client') {
        $sql = "select * from client where email='$email' and password='$password'";
        // echo $sql;
        $result = $con->query($sql);
        $num=mysqli_num_rows($result);
        if ($num==1) {
            session_start();
            $_SESSION['email'] = $email;
            header("Location:client.php");
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
    } else {
        $sql = "select * from lawyer where lemail='$email' and lpassword='$password'";
        $result = $con->query($sql);
        $num=mysqli_num_rows($result);
        if ($num==1) {
            session_start();
            $_SESSION['email'] = $email;
            header("Location:lawyer.php");
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
} else {
}
?>