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
    }
}
?>

<body class="background">
    <nav class="nav flex items-center items-justify">
        <img src="scale.png" alt="" class="logo-img">
        <p><?php echo $name; ?></p>
    </nav>
    <section class="main-section">
        <div class="grid grid-cols-4 gap-4">
            <div>
                <?php
                include 'client-menu.php';
                ?>
            </div>
            <div class="col-span-3">
                client Appointments
            </div>
        </div>
    </section>
</body>

</html>