<?php include 'connection.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'head.php'; ?>
    <style>
        .images {
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            margin-left: 430px;
        }
    </style>
</head>
<?php
session_start();
if (isset($_SESSION['email']) && !empty($_SESSION['email'])) {
    $data = $_SESSION['email'];
} else {
    $data = '';
    header("Location:admin-login.php");
}
?>

<body class="background">
    <?php
    if(!$_GET['id']){
    }
    else{
        $id=$_GET['id'];
    }
    // $id = $_GET['id'];
    // echo $id;
    $sql = "SELECT * FROM lawyer WHERE lid='$id'";
    $result = $con->query($sql);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $lid = $row['lid'];
                $name = $row['lname'];
                $email = $row['lemail'];
                $phone = $row['lphone'];
                $dob = $row['dob'];
                $password = $row['lpassword'];
                $location = $row['location'];
                $expertise = $row['expertise'];
                $pro_pic = $row['pro_pic'];
                $l_pic = $row['l_pic'];
                $c_pic = $row['c_pic'];
            }
        }
    }
    ?>
    <nav class="nav flex items-center items-justify">
        <img src="scale.png" alt="" class="logo-img">
    </nav>
    <section class="flex">
        <div>
            <?php
            include 'admin-menu.php';
            ?>
        </div>
        <div class="flex" style="margin-top:30px;margin-left:100px;">
            <div style="margin-right:60px;">
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
            <img src="<?php echo $pro_pic; ?>" alt="" height="320px" style="border-radius: 3px;">
        </div>
    </section>
    <div class="images">
        <div class="lawyer-info">
            <p style="margin-bottom: 10px;">Citizenship Photo:</p>
            <img src="<?php echo $c_pic; ?>" alt="" height="400px" width="550" style="border-radius: 3px;object-fit: cover;">
        </div>
        <div class="lawyer-info">
            <p style="margin-bottom: 10px;">License Photo:</p>
            <img src="<?php echo $l_pic; ?>" alt="" height="400px" width="550" style="border-radius: 3px;object-fit: cover;">
        </div>
    </div>
    <div>
        <form action="admin-view-profile.php" method="post" align="center" style="margin-bottom: 40px;">
            <input type="hidden" name="lawyer_id" value="<?php echo $lid; ?>">
            <button type="submit" name="approve" class="btn btn-bg btn-green">Approve</button>
            <button type="submit" name="reject" class="btn btn-bg btn-red">Reject</button>
        </form>
    </div>
</body>

</html>
<?php
if (isset($_POST['approve'])) {
    $lawyer_id=$_POST['lawyer_id'];
    $sql = "UPDATE lawyer SET status='true' WHERE lid=$lawyer_id";
    $result = $con->query($sql);
    if ($result) {
        echo "
            <div id='successMessage' class='success-message'>
            Lawyer Approved.
        </div>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            var successMessage = document.getElementById('successMessage');
            if (successMessage) {
                successMessage.style.display = 'block';
                setTimeout(function() {
                    successMessage.style.display = 'none';
                    window.location.href='admin.php'
                }, 1500);
            }
        });
    </script>
            ";
    } else {
        echo $con->error;
    }
}
if (isset($_POST['reject'])) {
    $lawyer_id=$_POST['lawyer_id'];
    $sql = "UPDATE lawyer SET status='false' WHERE lid=$lawyer_id";
    $result = $con->query($sql);
    if ($result) {
        echo "
            <div id='successMessage' class='success-message'>
            Lawyer Rejected.
        </div>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            var successMessage = document.getElementById('successMessage');
            if (successMessage) {
                successMessage.style.display = 'block';
                setTimeout(function() {
                    successMessage.style.display = 'none';
                    window.location.href='admin.php'
                }, 1500);
            }
        });
    </script>
            ";
    } else {
        echo $con->error;
    }
}
?>