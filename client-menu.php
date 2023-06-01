<style>
    .active-menu{
        border-bottom: 5px solid  #303030;
    }
</style>
<div class="menu-items" style="margin-top: 30px;margin-left: 50px;">
    <a href="/4project/client.php">
        <div class="menu-item <?php if (basename($_SERVER['PHP_SELF']) == 'client.php' ||basename($_SERVER['PHP_SELF']) == 'lawyer-single-profile.php') echo "active-menu" ?>" >
            <p>
                Lawyers
            </p>
        </div>
    </a>
    <a href=" /4project/client-appointment.php">
            <div class="menu-item  <?php if (basename($_SERVER['PHP_SELF']) == 'client-appointment.php') echo "active-menu" ?>" >
                <p>
                    Appointment Status
                </p>
            </div>
    </a>
    <a href="/4project/client-profile-update.php">
        <div class="menu-item  <?php if (basename($_SERVER['PHP_SELF']) == 'client-profile-update.php') echo "active-menu" ?>" >
            <p>
                Edit Profile
            </p>
        </div>
    </a>
    <form action="client-menu.php" method="post">
        <button type="submit" name="logout" class="btn btn-dark" style="padding:10px;">Logout</button>
    </form>
    <?php
    if (isset($_POST['logout'])) {
        session_destroy();
        header("Location:index.php");
    }
    ?>
</div>
<span>

</span>