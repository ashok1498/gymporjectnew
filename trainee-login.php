<?php
    session_start();
    require_once('include/config.php');

    if (isset($_POST['submit'])) {
        // Use PDO's filtering/sanitization instead of mysqli_real_escape_string
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = $_POST['password']; // We don't hash the password here; we'll verify it against the stored hash

        // PDO query to fetch trainee by email
        $query = "SELECT `id`, `fname`, `lname`, `email`, `mobile`, `password`, `is_verified`, `created_at` 
                  FROM `tbltrainee` WHERE `email` = :email";
        
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR); 
        $stmt->execute();
        
        // Fetch trainee details
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($row) {
            $hashedPassword = $row['password'];

            // Verifying the password with the stored hashed password
            if (password_verify($password, $hashedPassword)) {
                if ($row['is_verified'] == 1) { // Check if account is verified
                    // Set session variables
                    $_SESSION['uid'] = $row['id'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['name'] = $row['fname'];

                    session_regenerate_id(true); // Regenerate session ID for security
                    
                    // Redirect to the trainer dashboard
                    header('Location: trainee-dashboard.php');
                    exit();
                } else {
                    // Account is not verified
                    ?>
                    <script>
                        alert("Your account is not verified. Please verify your account.");
                    </script>
                    <?php
                }
            } else {
                // Invalid password
                ?>
                <script>
                    alert("Incorrect password. Please try again.");
                </script>
                <?php
            }
        } else {
            // Invalid email or trainee not found
            ?>
            <script>
                alert("User not found. Please check your email.");
            </script>
            <?php
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Gym Management System - Trainee Login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>
    <!-- Header Section -->
    <?php include 'include/header.php'; ?>

    <!-- Page Top Section -->
    <section class="page-top-section set-bg" data-setbg="img/page-top-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 m-auto text-white">
                    <h2>Trainee Login</h2>
                </div>
            </div>
        </div>
    </section>

    <!-- Login Form -->
    <section class="pricing-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6"></div>
                <div class="col-lg-6 col-sm-6">
                    <div class="pricing-item entermediate">
                        <div class="pi-top">
                            <h3>Trainee</h3>
                            <p>Login</p>
                        </div>
                        <form class="singup-form contact-form" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="email" name="email" id="email" placeholder="Your Email" autocomplete="off" required>
                                </div>
                                <div class="col-md-12">
                                    <input type="password" name="password" id="password" placeholder="Password" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="submit" id="submit" name="submit" value="Login" class="site-btn sb-gradient">
                                </div>
                                <div class="col-md-6">
                                    <a href="trainee-registration.php" class="site-btn sb-gradient">Registration</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6"></div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include 'include/footer.php'; ?>
</body>
</html>
