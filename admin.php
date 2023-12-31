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
    header('Location:admin-login.php');
}
$sql = "select * from admin where email='$data'";
if ($result = $con->query($sql)) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $ad_id = $row['ad_id'];
        $email = $row['email'];
        $password = $row['password'];
    }
}
?>

<body class="background">
    <nav class="nav flex items-center items-justify">
        <img src="scale.png" alt="" class="logo-img">
    </nav>

    <section class="flex ">
        <div>
            <?php
            include 'admin-menu.php';
            ?>
        </div>
        <div class="table-container">
            <?php
            $sql = "SELECT * FROM lawyer WHERE status='none'";
            $result = $con->query($sql);
            if (mysqli_num_rows($result) > 0) {
                echo "
            <table cellspacing='30px' align='center'>
            <caption style='font-size: 30px; margin-bottom: 15px; text-align: center; font-weight:bold;'>Lawyer Details</caption>
                <tr style='font-size:22px;'>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            ";
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['lid'];
                    $name = $row['lname'];
                    $email = $row['lemail'];
                    $phone = $row['lphone'];
                    echo "
                <tr>
                    <td style='font-size:20px;'>$name</td>
                    <td style='font-size:20px;'>$email</td>
                    <td>
                        <a href='admin-view-profile.php?id=$id'><button type='submit' class='btn btn-sm btn-dark' name='view'>View&nbsp more&nbsp details</button></a>
                    </td>
                </tr>
                        ";
                }

                echo "</table>";
            }
            else{
                echo "
                   <div style='font-size: 30px;color: #4e4e4e;margin-top:20px;'>
                   <strong><em>No lawyers to show.</em></strong>
                   <div>
                   ";
            }
            ?>
        </div>
    </section>
</body>

</html>