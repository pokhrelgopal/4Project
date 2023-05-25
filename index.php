<?php
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">

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
            <button class="learn btn btn-dark btn-bg">learn more</button>
        </div>
        <img src="images\hero.webp" alt="" class="hero-img">
    </section>
    <h2 class="normal-text" style="font-size: 35px;">Featured Lawyers</h2>
    <div class="featured-box flex items-center items-justify">
        <form action="index.php">
            <div>
                <img src="images\dummy-profile.png" alt="" class="ft-img">
                <div>
                    <p>Name</p>
                    <p><em><strong>Criminal Lawyer</strong></em></p>
                    <p style="margin-bottom: 10px;">Location</p>
                    <button class="btn btn-sm btn-dark" name="view">View</button>
                </div>
            </div>
        </form>
    </div>
    <?php
    if (isset($_POST['view'])) {
        header("Location:login.php");
    }
    ?>
    <div class="buttons">
        <button class="btn btn-dark btn-bg" style="margin-right: 20px;">view more lawyers</button>
        <button class="btn btn-dark btn-bg" style="margin-left: 20px;">book a consultation
            <button>
    </div>
</body>

</html>