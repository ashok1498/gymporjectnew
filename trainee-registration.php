<?php
error_reporting(0);
require_once('include/config.php');

if(isset($_POST['submit'])) {
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $mobile = $_POST['mobile'];
  $email = $_POST['email'];
  $password =$_POST['password'];
  $repeatPassword = $_POST['RepeatPassword'];

  // Check if email or mobile already exists in tbltrainee
  $usermatch = $dbh->prepare("SELECT mobile, email FROM tbltrainee WHERE (email=:email OR mobile=:mobile)");
  $usermatch->execute(array(':email'=>$email, ':mobile'=>$mobile)); 
  $row = $usermatch->fetch(PDO::FETCH_ASSOC);

  if(empty($fname)) {
    $error = "Please Enter First Name";
  } elseif(empty($mobile)) {
    $error = "Please Enter Mobile Number";
  } elseif(empty($email)) {
    $error = "Please Enter Email";
  } elseif($row) {
    $error = "Email or Mobile Number Already Exists!";
  } elseif($password != $repeatPassword) {
    $error = "Password And Confirm Password Do Not Match";
  } else {
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    // Insert trainee into tbltrainee
    $sql = "INSERT INTO tbltrainee (fname, lname, email, mobile, password, is_verified) 
            VALUES (:fname, :lname, :email, :mobile, :password, 0)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':fname', $fname, PDO::PARAM_STR);
    $query->bindParam(':lname', $lname, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
    $query->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();

    if($lastInsertId > 0) {
      echo "<script>alert('Registration successful. Please wait for admin verification.');</script>";
      echo "<script> window.location.href='trainee-login.php';</script>";
    } else {
      $error = "Registration not successful.";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
  <title>Gym Management System</title>
  <meta charset="UTF-8">
  <!-- Stylesheets -->
  <link rel="stylesheet" href="css/bootstrap.min.css"/>
  <link rel="stylesheet" href="css/font-awesome.min.css"/>
  <link rel="stylesheet" href="css/owl.carousel.min.css"/>
  <link rel="stylesheet" href="css/nice-select.css"/>
  <link rel="stylesheet" href="css/magnific-popup.css"/>
  <link rel="stylesheet" href="css/slicknav.min.css"/>
  <link rel="stylesheet" href="css/animate.css"/>
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
          <h2>Trainee-Registration</h2>
        </div>
      </div>
    </div>
  </section>

  <!-- Registration Form Section -->
  <section class="pricing-section spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-sm-6"></div>
        <div class="col-lg-6 col-sm-6">
          <div class="pricing-item entermediate">
            <div class="pi-top">
              <h3>Trainee</h3>
              <p>Trainee-Registration</p>
            </div>
            <?php if(isset($error)) { ?>
              <div class="errorWrap" style="color:red;">
                <strong>Error</strong>: <?php echo htmlentities($error); ?>
              </div>
            <?php } ?>
            <form class="singup-form contact-form" method="post">
              <div class="row">
                <div class="col-md-12">
                  <input type="text" name="fname" id="fname" placeholder="First Name" required>
                </div>
                <div class="col-md-12">
                  <input type="text" name="lname" id="lname" placeholder="Last Name" required>
                </div>
                <div class="col-md-12">
                  <input type="email" name="email" id="email" placeholder="Your Email" required>
                </div>
                <div class="col-md-12">
                  <input type="text" name="mobile" id="mobile" placeholder="Mobile Number" required>
                </div>
                <div class="col-md-12">
                  <input type="password" name="password" id="password" placeholder="Password" required>
                </div>
                <div class="col-md-12">
                  <input type="password" name="RepeatPassword" id="RepeatPassword" placeholder="Confirm Password" required>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <input type="submit" id="submit" name="submit" value="Register" class="site-btn sb-gradient">
                </div>
                <div class="col-md-6">
                  <a href="trainee-login.php" class="site-btn sb-gradient">Login</a>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6"></div>
      </div>
    </div>
  </section>

 
