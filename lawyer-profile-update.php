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
        $lid = $row['lid'];
        $name = $row['lname'];
        $email = $row['lemail'];
        $dob = $row['dob'];
        $password = $row['lpassword'];
        $phone = $row['lphone'];
        $location = $row['location'];
        $expertise = $row['expertise'];
        $cphoto = $row['c_pic'];
        $lphoto = $row['l_pic'];
        $pphoto = $row['pro_pic'];
        $status = $row['status'];
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
        <div class="" style="margin-right:400px;margin-left:10px;">
            <form class="form" id="myForm" action="lawyer-profile-update.php" method="post" enctype="multipart/form-data" style="margin-top: 0;width: 600px;">
                <div class="form-group">
                    <label for="fullname">Full Name:</label>
                    <input type="text" name="lname" id="fullname" value="<?php echo $name; ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="lemail" id="email" value="<?php echo $email; ?>">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="lpassword" id="password" value="<?php echo $password; ?>">
                </div>
                <div class="form-group">
                    <label for="dob">Date of Birth:</label>
                    <input type="date" name="dob" id="dob" value="<?php echo $dob; ?>">
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="text" name="lphone" id="phone" value="<?php echo $phone; ?>">
                </div>
                <div class="form-group">
                    <label for="location">Location:</label>
                    <input type="text" name="location" id="location" value="<?php echo $location; ?>">
                </div>
                <div class="form-group">
                    <label for="expertise">Expertise:</label>
                    <input type="text" name="expertise" id="expertise" value="<?php echo $expertise; ?>">
                </div>
                <div class="form-group">
                    <label for="citizenship">Citizenship Photo:</label>
                    <input type="file" name="cphoto" id="citizenship">
                </div>
                <div class="form-group">
                    <label for="license">License Photo:</label>
                    <input type="file" name="lphoto" id="license">
                </div>
                <div class="form-group">
                    <label for="profile">Profile Photo:</label>
                    <input type="file" name="pphoto" id="profile">
                </div>
                <div class="form-group">
                    <button class="btn btn-dark btn-bg" type="submit" name="updateLawyer" style="width: 100%;">Update</button>
                </div>

            </form>
        </div>

    </section>
</body>

</html>
<?php
if (isset($_POST['updateLawyer'])) {
    $lname = $_POST['lname'];
    $lemail = $_POST['lemail'];
    $lpassword = $_POST['lpassword'];
    $dob = $_POST['dob'];
    $lphone = $_POST['lphone'];
    $expertise = $_POST['expertise'];
    $location = $_POST['location'];



    $newProfilePhoto = $_FILES['pphoto']['name'];
    $tempPphoto = $_FILES['pphoto']['tmp_name'];
    $folder1 = "profiles/" . $newProfilePhoto;
    if (empty($newProfilePhoto)) {
        $folder1 = $pphoto;
    }
    move_uploaded_file($tempPphoto, $folder1);




    $newLicensePhoto = $_FILES['lphoto']['name'];
    $tempLphoto = $_FILES['lphoto']['tmp_name'];
    $folder2 = "l_photo/" . $newLicensePhoto;
    if (empty($newLicensePhoto)) {
        $folder2 = $lphoto;
    }
    move_uploaded_file($tempLphoto, $folder2);



    $newCitizenship = $_FILES['cphoto']['name'];
    $tempCphoto = $_FILES['cphoto']['tmp_name'];
    $folder3 = "ctz_photo/" . $newCitizenship;
    if (empty($newCitizenship)) {
        $folder3 = $cphoto;
    }
    move_uploaded_file($tempCphoto, $folder3);

    $sql = "UPDATE lawyer SET lname = '$lname', lemail = '$lemail', lpassword = '$lpassword', lphone = '$lphone', location = '$location', expertise = '$expertise', dob = '$dob', c_pic = '$folder3', l_pic = '$folder2', pro_pic = '$folder1' WHERE lid = '$lid'";
    // echo $sql;
    if (mysqli_query($con, $sql)) {
        echo "
        <div id='successMessage' class='success-message'>
            Your profile was updated.
        </div>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            var successMessage = document.getElementById('successMessage');
            if (successMessage) {
                successMessage.style.display = 'block';
                setTimeout(function() {
                    successMessage.style.display = 'none';
                    location.href='lawyer.php'
                }, 2500);
            }
        });
        </script>
        
        ";
    } else {
        echo "<script>alert('Profile Update Failed!')</script>";
    }
}
?>