<?php include 'connection.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'head.php'; ?>
</head>
<?php
session_start();
if (isset($_SESSION['email']) && !empty($_SESSION['email'])) {
    $data = $_SESSION['email'];
} else {
    $data = '';
}
$sql = "select * from client where email='$data'";
if ($result = $con->query($sql)) {
    if (mysqli_num_rows($result) > 0) {
        // client data
        $row = mysqli_fetch_assoc($result);
        $cid = $row['cid'];
        $cname = $row['cname'];
        $cemail = $row['email'];
        $password = $row['password'];
        $cphone = $row['phone'];
    }
}
?>

<body class="background">
    <?php
    $id = $_GET['id'];
    $sql = "SELECT * FROM lawyer WHERE lid='$id'";
    $result = $con->query($sql);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $name = $row['lname'];
                $email = $row['lemail'];
                $phone = $row['lphone'];
                $dob = $row['dob'];
                $password = $row['lpassword'];
                $location = $row['location'];
                $expertise = $row['expertise'];
                $pro_pic = $row['pro_pic'];
            }
        }
    }
    ?>

    <body class="background">
        <nav class="nav flex items-center items-justify">
            <img src="scale.png" alt="" class="logo-img">
            <div>
                <p class="profile-name"><?php echo $cname; ?></p>
            </div>
        </nav>
        <section class="flex">
            <div>
                <?php
                include 'client-menu.php';
                ?>
            </div>
            <div class="flex" style="margin-top:30px;margin-left:100px;">
                <div style="margin-right:60px;">
                    <div class="lawyer-info">
                        <span>Name: </span><?php echo $name; ?>
                    </div>
                    <div class="lawyer-info">
                        <span>Email:</span><?php echo $email; ?>
                    </div>
                    <div class="lawyer-info">
                        <span>Contact: </span><?php echo $phone; ?>
                    </div>
                    <div class="lawyer-info">
                        <span>Age: </span><?php echo $dob; ?>
                    </div>
                    <div class="lawyer-info">
                        <span>Expertise: </span><?php echo $expertise; ?>
                    </div>
                    <div class="lawyer-info">
                        <span>Location: </span><?php echo $location; ?>
                    </div>

                    <button id="showBtn" class="btn btn-dark btn-bg">book a consultation <button>

                </div>
                <img src="<?php echo $pro_pic; ?>" alt="" height="400px" style="border-radius: 3px;">
            </div>
        </section>
        <div id="overlay" class="overlay hidden">
            <form class="msg-form" action="lawyer-single-profile.php?id=<?php echo $id; ?>" method="post">
                <p id="hideBtn" class="form-close-btn">X</p>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" value="<?php echo $cname; ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" value="<?php echo $cemail; ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="text" name="phone" id="phone" value="<?php echo $cphone; ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="Date">Date:</label>
                    <input type="date" name="date" id="date">
                </div>
                <div class="form-group">
                    <label for="Mesege">Messege:</label>
                    <textarea name="messege" id="" cols="60" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <input class="btn btn-dark btn-bg" type="submit" value="Send" name="send" style="width: 100%;">
                </div>
            </form>
        </div>
        <script>
            const overlay = document.getElementById('overlay');
            const showBtn = document.getElementById('showBtn');
            const hideBtn = document.getElementById('hideBtn');
            showBtn.addEventListener('click', () => {
                overlay.classList.remove('hidden');
            })
            hideBtn.addEventListener('click', () => {
                overlay.classList.add('hidden');
            })
        </script>
    </body>

</html>
<?php
if (isset($_POST['send'])) {
    $date = $_POST['date'];
    $messege = $_POST['messege'];
    // echo $cname,$cemail, $cphone, $date, $messege;
    $sql = "INSERT INTO appointment (cid,lid,messege,booking_date) VALUES ('$cid','$id','$messege','$date')";
    $result = $con->query($sql);
    if ($result) {
        echo "
        <script>
        alert('Message Sent');
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Message Failed');
        </script>
        ";
    }
}
?>