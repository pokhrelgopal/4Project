<?php
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'head.php'; ?>
</head>

<body class="background">
    <div class="f-logo">
        <img src="scale.png" alt="">
    </div>
    <h2 class="form-heading">Create new Account</h2>
    <p class="normal-text">Register yourself as a lawyer</p>
    <form class="form" id="myForm" action="lawyer-signup.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="fullname">Full Name:</label>
            <input type="text" name="lname" id="fullname" placeholder="Enter your full name">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="lemail" id="email" placeholder="Enter your email">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="lpassword" id="password" placeholder="Enter your password">
        </div>
        <div class="form-group">
            <label for="password">Confirm Password:</label>
            <input type="password" name="cpassword" id="cpassword" placeholder="Re-enter your password">
        </div>
        <div class="form-group">
            <label for="dob">Date of Birth:</label>
            <input type="date" name="dob" id="dob">
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" name="lphone" id="phone" placeholder="Enter your phone number">
        </div>
        <div class="form-group">
            <label for="location">Location:</label>
            <input type="text" name="location" id="location" placeholder="Enter your location">
        </div>
        <div class="form-group">
            <label for="expertise">Expertise:</label>
            <input type="text" name="expertise" id="expertise" placeholder="Enter your area of expertise">
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
            <button class="btn btn-dark btn-bg" type="submit" name="signup" style="width: 100%;">SignUp</button>
        </div>
        <div class="normal-text">
            <p>Already have an account?<a href="login.php">Login</a></p>
        </div>
    </form>
</body>
</html>
<?php
    // Check if form was submitted
    if (isset($_POST['signup'])) {
    
        $lname = $_POST['lname'];
        $lemail = $_POST['lemail'];
        $lpassword = $_POST['lpassword'];
        $dob = $_POST['dob'];
        $lphone = $_POST['lphone'];
        $expertise = $_POST['expertise'];
        $location = $_POST['location'];

        $profile=$_FILES['pphoto']['name'];
        $profilePhoto=$_FILES['pphoto']['tmp_name'];
        $folder1="profiles/".$profile;
        move_uploaded_file($profilePhoto,$folder1);
    
        $license=$_FILES['lphoto']['name'];
        $licensePhoto = $_FILES['lphoto']['tmp_name'];
        $folder2="l_photo/".$license;
        move_uploaded_file($licensePhoto,$folder2);

        $citizenship=$_FILES['cphoto']['name'];
        $citizenshipPhoto = $_FILES['cphoto']['tmp_name'];
        $folder3="ctz_photo/".$citizenship;
        move_uploaded_file($citizenshipPhoto,$folder3);

        $ins = "INSERT INTO lawyer (lname,lemail,lpassword,dob,lphone,expertise,location,pro_pic,l_pic,c_pic) VALUES ('$lname','$lemail','$lpassword','$dob','$lphone','$expertise','$location','$folder1','$folder2','$folder3') ";
        $result = $con->query($ins);
        if ($result) {
            echo "
        <div id='successMessage' class='success-message'>
             Account Created Successfully.
        </div>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            var successMessage = document.getElementById('successMessage');
            if (successMessage) {
                successMessage.style.display = 'block';
                setTimeout(function() {
                    successMessage.style.display = 'none';
                    window.location.href='login.php'
                }, 1500);
            }
        });
     </script>
        ";
        } else {
            echo "Error: " . mysqli_error($con);

        }
    }
?>