<div class="menu-items">
    <a href="lawyer.php">
        <div class="menu-item">
            <p>
                Profile
            </p>
        </div>
    </a>
    <a href="lawyer-appointment.php">
        <div class="menu-item">
            <p>
                Appointments
            </p>
        </div>
    </a>
    <a href="lawyer-profile-update.php">
        <div class="menu-item">
            <p>
                Update Profile
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