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
$sql = "select * from lawyer where lemail='$data'";
if ($result = $con->query($sql)) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $id = $row['lid'];
        $name = $row['lname'];
    }
}
?>

<body class="background">
    <nav class="nav flex items-center items-justify">
        <img src="scale.png" alt="" class="logo-img">
        <p class="profile-name"><?php echo $name; ?></p>
    </nav>
    <section class="lawyer-section" style="justify-content: space-between;">
        <div style="margin-left:80px;">
            <?php
            include 'lawyer-menu.php';
            ?>
        </div>
        <div style="margin-right:100px;">
            Appointments
        </div>
    </section>
</body>

</html>