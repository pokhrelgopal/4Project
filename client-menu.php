<div class="menu-items">
    <a href="client.php">
        <div class="menu-item">
            <p>
                Home
            </p>
        </div>
    </a>
    <a href="client-appointment.php">
        <div class="menu-item">
            <p>
                Appointments
            </p>
        </div>
    </a>
    <a href="client-profile-update.php">
        <div class="menu-item">
            <p>
                Update Profile
            </p>
        </div>
    </a>
    <form action="" method="post">
        <button type="submit" name="logout">Logout</button>
    </form>
    <?php
    if(isset($_POST['logout'])){
        session_destroy();
        header("Location:index.php");
    }
    ?>
</div>