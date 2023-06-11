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
    header("Location:login.php");
}
$sql = "select * from lawyer where lemail='$data'";
if ($result = $con->query($sql)) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $id = $row['lid'];
        $name = $row['lname'];
        $email = $row['lemail'];
        $phone = $row['lphone'];
        $dob = $row['dob'];
        $password = $row['lpassword'];
        $location = $row['location'];
        $expertise = $row['expertise'];
        $pro_pic = $row['pro_pic'];
        $status=$row['status'];
    }
}
?>

<body class="background">
    <nav class="nav flex items-center items-justify">
        <img src="scale.png" alt="" class="logo-img">
        <div class="profile-name">
                <?php 
                echo "<p style='color:#F8F6F1;font-size:20px;'>$name</p>";
                if($status=='true'){
                    echo "<p style='color:#F8F6F1;text-align:center'>Verified</p>";
                }elseif($status=='false'){
                    echo "Rejected";
            }
            

            ?>
        </div>
    </nav>
    <section class="lawyer-section">
        <div>
            <?php
            include 'lawyer-menu.php';
            ?>
        </div>
        <div>
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
        </div>
        <img src="<?php echo $pro_pic; ?>" alt="" height="400px" style="border-radius: 3px;">
    </section>
</body>

</html>