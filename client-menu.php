<div class="menu-items">
    <a href="/4project/client.php">
        <div class="menu-item">
            <p>
                Home
            </p>
        </div>
    </a>
    <a href="/4project/client-appointment.php">
        <div class="menu-item">
            <p>
                Appointments
            </p>
        </div>
    </a>
    <a href="/4project/client-profile-update.php">
        <div class="menu-item">
            <p>
                Update Profile
            </p>
        </div>
    </a>
    <form action="client-menu.php" method="post">
        <button type="submit" name="logout">Logout</button>
    </form>
    <?php
    if(isset($_POST['logout'])){
        session_destroy();
        header("Location:index.php");
    }
    ?>
</div>