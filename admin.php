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
            $sql = "select * from lawyer";
            $result = $con->query($sql);
            echo "
            <table cellspacing='30px' align='center'>
            <caption style='font-size: 30px; margin-bottom: 10px; text-align: center; font-weight:bold;'>Lawyer Details</caption>
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
                        <form action='' method='post'>
                            <button type='submit' class='btn btn-sm btn-dark'>View</button>
                            
                        </form>
                    </td>
                </tr>
                        ";
            }
            echo "</table>";
            ?>
        </div>
    </section>
</body>

</html>

<!-- 

<button type='submit' class='btn btn-sm btn-red'>Approve</button>
<button type='submit' class='btn btn-sm btn-green'>Reject</button>
 -->