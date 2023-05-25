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
            <input type="password" name="lpassword" id="cpassword" placeholder="Re-enter your password">
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
    <!-- <script>
        const myForm = document.getElementById('myForm')
        myForm.addEventListener('submit', function(event) {
            const fullname = document.getElementById('fullname').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const cpassword = document.getElementById('cpassword').value;
            const fnameError = document.getElementById('fnameError');
            const emailError = document.getElementById('emailError');
            const password1Error = document.getElementById('password1Error');
            const password2Error = document.getElementById('password2Error');

            // fullname validation
            if (fullname === "") {
                event.preventDefault();
                fnameError.textContent = "*required";
            } else if (fullname.length < 3) {
                event.preventDefault();
                fnameError.textContent = "Fullname must be more than 5 characters";
            } else if (/\d/.test(fullname)) {
                event.preventDefault();
                fnameError.textContent = "Fullname should not contain numbers";
            } else {
                fnameError.textContent = "";
            }

            // email validation
            if (email === "") {
                event.preventDefault();
                emailError.textContent = "*required";
            } else if (email.length < 5) {
                event.preventDefault();
                emailError.textContent = "Email must be more than 5 characters";
            } else {
                emailError.textContent = "";
            }

            // password validtion
            if (password === "") {
                event.preventDefault();
                password1Error.textContent = "*required";
            } else if (password.length < 8) {
                event.preventDefault();
                password1Error.textContent = "Password must be at least 8 characters";
            } else if (!/\d/.test(password) || !/[a-zA-Z]/.test(password)) {
                event.preventDefault();
                password1Error.textContent = "Password must contain a combination of letters and numbers";
            } else {
                password1Error.textContent = "";
            }

            // confirm password validation
            if (cpassword === "") {
                event.preventDefault();
                password2Error.textContent = "*required";
            } else if (cpassword !== password) {
                event.preventDefault();
                password2Error.textContent = "Password does not match";
                password1Error.textContent = "Password does not match";
            } else {
                password2Error.textContent = "";
            }

        });
    </script> -->
</body>

</html>
<?php
    // Check if form was submitted
    if (isset($_POST['signup'])) {
        // 
        $lname = $_POST['lname'];
        $lemail = $_POST['lemail'];
        $lpassword = $_POST['lpassword'];
        $dob = $_POST['dob'];
        $lphone = $_POST['lphone'];
        $expertise = $_POST['expertise'];
        $location = $_POST['location'];
        // $pro_pic = $_POST["pro_pic"];
        // $l_pic = $_POST["l_pic"];
        // $c_pic = $_POST["c_pic"];

        $profile=$_FILES['pphoto']['name'];
        $profilePhoto=$_FILES['pphoto']['tmp_name'];
        $folder1="profiles/".$profile;
        move_uploaded_file($profilePhoto,$folder1);
    
        $license=$_FILES['lphoto']['name'];
        $licensePhoto = $_FILES['lphoto']['tmp_name'];
        $folder2="l_photo/".$profile;
        move_uploaded_file($licensePhoto,$folder2);

        $citizenship=$_FILES['cphoto']['name'];
        $citizenshipPhoto = $_FILES['cphoto']['tmp_name'];
        $folder3="ctz_photo/".$profile;
        move_uploaded_file($citizenshipPhoto,$folder3);
    }
    $ins = "INSERT INTO lawyer (lname,lemail,lpassword,dob,lphone,expertise,location,pro_pic,l_pic,c_pic) VALUES ('$lname','$lemail','$lpassword','$dob','$lphone','$expertise','$location','$folder1','$folder2','$folder3') ";
    $result = $con->query($ins);
    if ($result) {
        header("Location:login.php");
    } else {
    }

?>