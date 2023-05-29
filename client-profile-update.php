<?php
include 'connection.php';
?>
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
        $row = mysqli_fetch_assoc($result);
        $id = $row['cid'];
        $name = $row['cname'];
        $email = $row['email'];
        $phone = $row['phone'];
        $password = $row['password'];
    }
}
?>
<body class="background">
    <nav class="nav flex items-center items-justify">
        <img src="scale.png" alt="" class="logo-img">
        <p class="profile-name"><?php echo $name; ?></p>
    </nav>
    <section class="flex" >
        <div >
            <?php
            include 'client-menu.php';
            ?>
        </div>
        <div class="" style="margin-left:150px;" >
            <form class="form" id="myForm" action="client-profile-update.php" method="post" style="width: 600px;">
                <div class="form-group">
                    <label for="fullname">Full Name:</label>
                    <input type="text" name="name" id="fullname" value="<?php echo $name; ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" value="<?php echo $email; ?>">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" value="<?php echo $password; ?>">
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="text" name="phone" id="phone" value="<?php echo $phone; ?>">
                </div>
                <div class="form-group">
                    <button class="btn btn-dark btn-bg" type="submit" name="updateClient" style="width: 100%;">Update</button>
                </div>

            </form>
        </div>

    </section>
</body>

</html>
<?php
if (isset($_POST['updateClient'])) {
    $cname = $_POST['name'];
    $cemail = $_POST['email'];
    $cpassword = $_POST['password'];    
    $cphone = $_POST['phone'];
    

    $sql = "UPDATE client SET cname = '$cname', email = '$cemail', phone = '$cphone', password = '$cpassword' WHERE cid = '$id'";
    echo $sql;
    if ($con->query($sql)) {
        echo "
        <script>
        location.href='client.php'
        </script>";
    } else {
        echo "<script>alert('Profile Update Failed!')</script>";
    }
}
?>