<?php
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php

session_start();
if (isset($_SESSION['email']) && !empty($_SESSION['email'])) {
    $data = $_SESSION['email'];
    // echo $data;
}
?>

<head>
    <?php include 'head.php'; ?>
</head>

<body class="background">
    <nav class="nav flex items-center items-justify">
        <img src="scale.png" alt="" class="logo-img">
        <form action="index.php" method="post">
            <button class="btn btn-dark btn-bg" name="login">Login</button>
            <!-- <button class="btn btn-dark btn-bg">Sign up</button> -->
            <div class="signup-container">
                <button class="signup-btn btn btn-dark btn-bg" name="signup">Sign up</button>
                <div class="dropdown-content">
                    <select class="signup-select" name="select-type" id="signup-select">
                        <option value="client" name="client">Client</option>
                        <option value="lawyer" name="lawyer">Lawyer</option>
                    </select>
                </div>
            </div>
        </form>
    </nav>
    <script>
        document.getElementById("signup-select").addEventListener("change", function() {
            var selectedOption = this.value;
            if (selectedOption === "client") {
                window.location.href = "client-signup.php";
            } else if (selectedOption === "lawyer") {
                window.location.href = "lawyer-signup.php";
            }
        });
    </script>
    <?php
    if (isset($_POST['login'])) {
        header("Location:login.php");
    }
    if (isset($_POST['signup'])) {
        $role = $_POST['select-type'];
        if ($role == "client") {
            header("Location:client-signup.php");
        } elseif ($role == "lawyer") {
            header("Location:lawyer-signup.php");
        }
    }
    ?>
    <section class="main-section flex">
        <div class="hero-section">
            <h1 class="hero-text">DONT JUST FIND A LAWYER, FIND A RIGHT LAWYER</h1>
            <p class="normal-text">Your trusted destination for comprehensive legal assistance, covering a wide range of
                areas.
            </p>
            <a href="login.php"><button class="learn btn btn-dark btn-bg">learn more</button></a>
        </div>
        <img src="images\hero.webp" alt="" class="hero-img">
    </section>
    <h2 class="normal-text" style="font-size: 35px;">Featured Lawyers</h2>
    <div class="featured-box flex items-center items-justify">
        <?php
        $sql = "SELECT * FROM lawyer LIMIT 5";
        $result = $con->query($sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $name = $row['lname'];
            $exp = $row['expertise'];
            $loc = $row['location'];
            $img = $row['pro_pic'];
            echo "
            <div >
                <img src='$img' alt='' class='ft-img'>
                <div>
                    <p>$name</p>
                    <p><em><strong>$exp</strong></em></p>
                    <p style='margin-bottom: 10px;'>$loc</p>
                    <a href='login.php'><button class='btn btn-sm btn-dark' name='view'>View</button></a>
                </div>
            </div>
            ";
        }
        ?>
    </div>
    <div class="buttons">
        <a href="login.php"><button class="btn btn-dark btn-bg" style="margin-right: 20px;">view more lawyers</button></a>
        <a href="login.php"><button class="btn btn-dark btn-bg" style="margin-left: 20px;">book a consultation <button></a>
    </div>
</body>

</html>