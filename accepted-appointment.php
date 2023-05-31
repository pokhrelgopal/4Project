<?php
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'head.php'; ?>
    <style>
        .apmt-request {
            /* text-align: left; */
            margin-right: 200px;
            margin-bottom: 30px;
            font-size: 30px;
        }

        .request-detail {
            margin-bottom: 10px;
        }
    </style>
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
        $lid = $row['lid'];
        $lname = $row['lname'];
    }
}
?>

<body class="background">
    <nav class="nav flex items-center items-justify">
        <img src="scale.png" alt="" class="logo-img">
        <p class="profile-name"><?php echo $lname; ?></p>
    </nav>
    <section class="lawyer-section" style="justify-content: space-between;">
        <div style="margin-left:80px;">
            <?php
            include 'lawyer-menu.php';
            ?>
        </div>
        <div>
            <h2 class="apmt-request">Accepted Appointments</h2>
            <?php
            $sql = "SELECT * FROM appointment WHERE lid='$lid' and ap_status='true'";
            $result = $con->query($sql);
            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $ap_id = $row['ap_id'];
                        $lid = $row['lid'];
                        $cid = $row['cid'];
                        $messege = $row['messege'];
                        $date = $row['booking_date'];


                        $sql2 = "SELECT * FROM client WHERE cid='$cid'";
                        $result2 = $con->query($sql2);
                        $c_row = mysqli_fetch_assoc($result2);
                        $cname = $c_row['cname'];
                        $cemail = $c_row['email'];
                        $cphone = $c_row['phone'];

                        echo "
                        <div class='request-box'>
                            <div class='request-detail'>
                                You have accepted an appointment request from <strong>$cname</strong>
                            </div>
                            <div class='request-detail'>
                               Email: $cemail
                            </div>
                            <div class='request-detail'>
                                Contact:$cphone
                            </div>
                            <div class='request-detail'>
                               For: $date
                            </div>
                            <div class='request-detail'>
                                Message: $messege
                            </div>
                            <div>
                            <form action='' method='post'>
                            <input type='hidden' name='hidden_id' value='$ap_id' >
                            <button type='submit' name='remove' class='btn btn-sm btn-green'>Remove</button>
                            </form>
                            </div>
                        </div>
                        ";
                    }
                } else {
                    echo "
                   <div style='font-size: 20px;color: grey;'>
                   <em>You dont have any accepted appointment requests now.</em>
                   <div>
                   ";
                }
            }

            ?>

        </div>
    </section>
</body>

</html>
<?php
if (isset($_POST['remove'])) {
    $hidden_id=$_POST['hidden_id'];
    // echo $hidden_id;
    $sql="DELETE FROM appointment WHERE ap_id='$hidden_id'";
    $result=$con->query($sql);
    if($result){
        // header("Location:accepted-appointment.php");
        echo "
        <script>
        window.location.href='accepted-appointment.php'
        </script> 
        ";
    }else{
        echo"Error removing";

    }
    
} else {
}

?>