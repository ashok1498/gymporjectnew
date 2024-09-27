<?php
// Ensure the session is started at the top of your script
session_start();
?>

<header class="header-section">
    <div class="header-top">
        <div class="row m-0">
            <div class="col-md-6 d-none d-md-block p-0">
                <!-- Placeholder for header information like map and phone -->
            </div>
            <div class="col-md-6 text-left text-md-right p-0">
                <?php if(isset($_SESSION['uid']) && strlen($_SESSION['uid']) > 0): ?>
                <!-- User is logged in -->
                <div class="header-info d-none d-md-inline-flex">
                    <i class="material-icons">account_circle</i>
                    <a href="profile.php"><p>My Profile</p></a>
                </div>
                <div class="header-info d-none d-md-inline-flex">
                    <i class="material-icons">brightness_7</i>
                    <a href="changepassword.php"><p>Change Password</p></a>
                </div>
                <div class="header-info d-none d-md-inline-flex">
                    <i class="material-icons">logout</i>
                    <a href="logout.php"><p>Logout</p></a>
                </div>
                <?php else: ?>
                <!-- User is not logged in -->
                <div class="header-info d-none d-md-inline-flex">
                    <i class="material-icons">account_circle</i>
                    <a href="login.php"><p>Login</p></a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <a href="index.php" class="site-logo" style="color:#fff; font-weight:bold; font-size:26px;">
            GYM MS<br />
            <small style="margin-top:-4%;">Gym Management System</small>
        </a>

        <div class="container">
            <ul class="main-menu">
                <li><a href="index.php" class="active">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="trainers.php">Trainers</a></li>
                
                <?php if(isset($_SESSION['uid']) && strlen($_SESSION['uid']) > 0): ?>
                <!-- User is logged in -->
                <li><a href="booking-history.php">Booking History</a></li>
                <?php else: ?>
                <!-- Admin and Trainee login links for guests -->
                <li><a href="admin/">Admin</a></li>
                <li style="float:right;"><a href="trainee-login.php">Trainee Login</a></li> <!-- Trainee Login Button -->
                <?php endif; ?>
            </ul>
        </div>
    </div>
</header>
