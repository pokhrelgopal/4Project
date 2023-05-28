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
        $cid = $row['cid'];
        $name = $row['cname'];
        $email = $row['email'];
        $password = $row['password'];
        $phone = $row['phone'];
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
                <div class="featured-box flex items-center items-justify">
                    <?php
                    $sql = "select * from lawyer";
                    $result = $con->query($sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['lid'];
                        $name = $row['lname'];
                        $exp = $row['expertise'];
                        $loc = $row['location'];
                        $img = $row['pro_pic'];
                        echo "
                            <div>
                                <img src='$img' alt='' class='ft-img'>
                                <div>
                                    <p>$name</p>
                                    <p><em><strong>$exp</strong></em></p>
                                    <p style='margin-bottom: 10px;'>$loc</p>
                                    <a href='lawyer-single-profile.php?id=$id'><button class='btn btn-sm btn-dark' name='view'>View</button></a>
                                </div>
                            </div>
                            ";
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
</body>

</html>