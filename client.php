<?php
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'head.php'; ?>
    <style>
        .search-btn {
            text-transform: uppercase;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 15px;
            cursor: pointer;
            padding: 2px 25px;
            background-color: #4e4e4e;
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
        <p class="profile-name"><?php echo $name; ?></p>
    </nav>

    <section class="flex items-justify">
        <div>
            <?php
            include 'client-menu.php';
            ?>
        </div>
        <div class="" style="margin-right: 200px;margin-top:60px;margin-left:30px;">
            <form action="client.php" method="post" class="flex">

                <input type="text" id="" name="" placeholder="Search by location" style="margin-bottom: 10px;margin-right:20px;width:300px;">

                <input type="text" id="" name="" placeholder="Search by Expertise" style="margin-bottom: 10px;margin-right:20px;width:300px;">
                <button type="submit" name="" class="search-btn">Search</button>

            </form>
        </div>
    </section>
    <div class="display-section flex" style="justify-content: space-around;margin-left:250px">
        <div class="lawyers-display">
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
</body>

</html>