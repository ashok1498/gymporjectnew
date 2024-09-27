<?php
session_start();
if(!isset($_SESSION['uid'])) {
    header('location: trainee-login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
  <title>Trainee Dashboard</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/bootstrap.min.css"/>
  <link rel="stylesheet" href="css/style.css"/>
</head>
<body>
  <!-- Header Section -->
  <?php include 'include/header.php'; ?>

  <!-- Dashboard Content -->
  <section class="dashboard-section spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="dashboard-content">
            <h2>Welcome, <?php echo $_SESSION['name']; ?>!</h2>
            <p>This is your trainee dashboard where you can manage your workout schedules, view packages, and interact with your trainers.</p>

            <!-- Trainee-specific options -->
            <div class="dashboard-options">
              <a href="view-schedule.php" class="site-btn">View Schedule</a>
              <a href="view-packages.php" class="site-btn">View Packages</a>
              <a href="logout.php" class="site-btn">Logout</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <?php include 'include/footer.php'; ?>
</body>
</html>
