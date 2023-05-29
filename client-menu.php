<div class="menu-items" style="margin-top: 30px;margin-left: 50px;">
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
                Edit Profile
            </p>
        </div>
    </a>
    <form action="client-menu.php" method="post">
        <button type="submit" name="logout" class="btn btn-dark" style="padding:10px;">Logout</button>
    </form>
    <?php
    if(isset($_POST['logout'])){
        session_destroy();
        header("Location:index.php");
    }
    ?>
</div>