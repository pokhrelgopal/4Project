<style>
    .active-menu{
        border-bottom: 4px solid  #303030;
    }
</style>
<div class="menu-items">
    <a href="lawyer.php">
        <div class="menu-item <?php if (basename($_SERVER['PHP_SELF']) == 'lawyer.php') echo "active-menu" ?>">
            <p>
                Profile
            </p>
        </div>
    </a>
    <a href="lawyer-appointment.php">
        <div class="menu-item <?php if (basename($_SERVER['PHP_SELF']) == 'lawyer-appointment.php') echo "active-menu" ?>">
            <p>
                Appointment Requests
            </p>
        </div>
    </a>
    <a href="accepted-appointment.php">
        <div class="menu-item <?php if (basename($_SERVER['PHP_SELF']) == 'accepted-appointment.php') echo "active-menu" ?>">
            <p>
                Accepted Appointments
            </p>
        </div>
    </a>
    <a href="lawyer-profile-update.php">
        <div class="menu-item <?php if (basename($_SERVER['PHP_SELF']) == 'lawyer-profile-update.php') echo "active-menu" ?>">
            <p>
                Edit Profile
            </p>
        </div>
    </a>
    <form action="" method="post">
        <button type="submit" name="logout" class="btn btn-dark" style="padding:10px;">Logout</button>
    </form>
    <?php
    if(isset($_POST['logout'])){
        session_destroy();
        header("Location:index.php");
    }
    ?>
</div>