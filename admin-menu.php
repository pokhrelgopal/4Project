<style>
    .active-menu{
        border-bottom: 5px solid  #303030;
    }
</style>
<div class="menu-items" style="margin-top: 30px;margin-left: 50px;">
    <a href="/4project/adminphp">
        <div class="menu-item <?php if (basename($_SERVER['PHP_SELF']) == 'admin.php') echo "active-menu" ?>" >
            <p>
                Approve Lawyers
            </p>
        </div>
    </a>
    
    <a href="/4project/admin-profile-update.php">
        <div class="menu-item  <?php if (basename($_SERVER['PHP_SELF']) == 'admin-profile-update.php') echo "active-menu" ?>" >
            <p>
                Edit Profile
            </p>
        </div>
    </a>
    <form action="admin-menu.php" method="post">
        <button type="submit" name="logout" class="btn btn-dark" style="padding:10px;">Logout</button>
    </form>
    <?php
    if (isset($_POST['logout'])) {
        session_start();
        session_destroy();
        header("Location:index.php");
    }
    ?>
</div>
