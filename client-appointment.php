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
        <p class="profile-name"><?php echo $name; ?></p>
    </nav>
    <section class="">
        <div class="flex items-justify">
            <div>
                <?php
                include 'client-menu.php';
                ?>
            </div>
            <!-- <div class="">
                client Appointments
            </div> -->
            <div>
                <h2 class="apmt-request">Your Appointment Requests</h2>
                <?php
                $sql = "SELECT * FROM appointment WHERE cid='$id'";
                $result = $con->query($sql);
                if ($result) {
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $ap_id = $row['ap_id'];
                            $lid = $row['lid'];
                            $cid = $row['cid'];
                            $messege = $row['messege'];
                            $date = $row['booking_date'];
                            $status=$row['ap_status'];

                            $sql2 = "SELECT * FROM lawyer WHERE lid='$lid'";
                            $result2 = $con->query($sql2);
                            $l_row = mysqli_fetch_assoc($result2);
                            $lname = $l_row['lname'];
                            $lemail = $l_row['lemail'];
                            $lphone = $l_row['lphone'];
                            
                            if($status=='none'){
                            echo "
                        <div class='request-box'>
                            <div class='request-detail'>
                                You have requested an appointment with <strong>$lname</strong>
                            </div>
                            <div class='request-detail'>
                               Email: $lemail
                            </div>
                            <div class='request-detail'>
                                Contact:$lphone
                            </div>
                            <div class='request-detail'>
                               For: $date
                            </div>
                            <div class='request-detail'>
                                Message: $messege
                            </div>
                            <div class='request-detail'>
                            Status:<strong><span style='color:rgb(190, 190, 5);'>Pending</span></strong>
                            </div>
                            <div style='margin-left:400px;'>
                            <form action='' method='post'>
                            <input type='hidden' name='hidden_id' value='$ap_id' >
                            <button type='submit' name='cancel' class='btn btn-sm btn-red'>Cancel</button>
                            </form>
                            </div>
                        </div>
                        ";
                        }
                        else if($status=='true'){
                            echo "
                        <div class='request-box'>
                            <div class='request-detail'>
                                You request for an appointment with <strong>$lname</strong> has been accepted
                            </div>
                            <div class='request-detail'>
                               Email: $lemail
                            </div>
                            <div class='request-detail'>
                                Contact:$lphone
                            </div>
                            <div class='request-detail'>
                               For: $date
                            </div>
                            <div class='request-detail'>
                                Message: $messege
                            </div>
                            <div class='request-detail'>
                            Status:<strong><span style='color:green;'>Accepted</span></strong>
                            </div>
                            <div>
                            <form action='' method='post'>
                            <input type='hidden' name='hidden_id' value='$ap_id' >
                            
                            </form>
                            </div>
                        </div>
                        ";
                        }
                        else if($status=='false'){
                            echo "
                        <div class='request-box'>
                            <div class='request-detail'>
                                Your appointment request with <strong>$lname</strong> has been rejected.
                            </div>
                            <div class='request-detail'>
                               Email: $lemail
                            </div>
                            <div class='request-detail'>
                                Contact:$lphone
                            </div>
                            <div class='request-detail'>
                               For: $date
                            </div>
                            <div class='request-detail'>
                                Message: $messege
                            </div>
                            <div class='request-detail'>
                                Status:<strong><span style='color:red;'>Rejected</span></strong>
                            </div>
                            <div style='margin-left:400px;'>
                            <form action='' method='post'>
                            <input type='hidden' name='hidden_id' value='$ap_id' >
                            <button type='submit' name='remove' class='btn btn-sm btn-red' >Remove &nbsp;from &nbsp;list</button>
                            </form>
                            </div>
                        </div>
                        ";
                        }
                    
                    }
                    } else {
                        echo "
                   <div style='font-size: 20px;color: grey;'>
                   <em>You haven't requested for any appointments now.</em>
                   <div>
                   ";
                    }
                }

                ?>

            </div>
        </div>
    </section>
</body>

</html>
<?php
if (isset($_POST['cancel'])) {
    $hidden_id = $_POST['hidden_id'];
    // echo $hidden_id;
    $sql = "DELETE FROM appointment WHERE ap_status='none' AND ap_id=$hidden_id";
    $result = $con->query($sql);
    if ($result) {
        echo "
        <div id='successMessage' class='success-message'>
        Request Canceled.
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var successMessage = document.getElementById('successMessage');
        if (successMessage) {
            successMessage.style.display = 'block';
            setTimeout(function() {
                successMessage.style.display = 'none';
                window.location.href='client-appointment.php'
            }, 2500);
        }
    });
 </script>
            ";
    } else {
        echo "
       Error
        ";
    }
} else {
}

if (isset($_POST['remove'])) {
    $hidden_id = $_POST['hidden_id'];
    // echo $hidden_id;
    $sql = "DELETE FROM appointment WHERE ap_status='false' AND ap_id=$hidden_id";
    $result = $con->query($sql);
    if ($result) {
        echo "
        <div id='successMessage' class='success-message'>
        Removed from list.
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var successMessage = document.getElementById('successMessage');
        if (successMessage) {
            successMessage.style.display = 'block';
            setTimeout(function() {
                successMessage.style.display = 'none';
                window.location.href='client-appointment.php'
            }, 2500);
        }
    });
 </script>
            ";
    } else {
        echo "
       Error
        ";
    }
} else {
}
?>