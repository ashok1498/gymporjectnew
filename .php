<?php
error_reporting(0);
require_once('include/config.php');

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $Password = $_POST['password'];
    $pass = md5($Password);
    $RepeatPassword = $_POST['RepeatPassword'];

    // Check if the email or mobile is already registered
    $usermatch = $dbh->prepare("SELECT mobile, email FROM tbluser WHERE email=:email OR mobile=:mobile");
    $usermatch->bindParam(':email', $email, PDO::PARAM_STR);
    $usermatch->bindParam(':mobile', $mobile, PDO::PARAM_STR);
    $usermatch->execute();
    $row = $usermatch->fetch(PDO::FETCH_ASSOC);

    if ($fname == "") {
        $error = "Please Enter First Name";
    } else if ($mobile == "") {
        $error = "Please Enter Mobile No";
    } else if ($email == "") {
        $error = "Please Enter Email";
    } else if ($row) {
        $error = "Email or Mobile Number Already Exists!";
    } else if ($Password == "" || $RepeatPassword == "") {
        $error = "Password and Confirm Password Cannot Be Empty!";
    } else if ($Password != $RepeatPassword) {
        $error = "Password and Confirm Password Do Not Match!";
    } else {
        // Register the user
        $sql = "INSERT INTO tbluser (fname, lname, email, mobile, state, city, password) 
                VALUES (:fname, :lname, :email, :mobile, :state, :city, :password)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':fname', $fname, PDO::PARAM_STR);
        $query->bindParam(':lname', $lname, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
        $query->bindParam(':state', $state, PDO::PARAM_STR);
        $query->bindParam(':city', $city, PDO::PARAM_STR);
        $query->bindParam(':password', $pass, PDO::PARAM_STR);
        $query->execute();

        if ($dbh->lastInsertId()) {
            echo "<script>alert('Registration successful. Please login.');</script>";
            echo "<script>window.location.href='login.php';</script>";
        } else {
            $error = "Registration failed.";
        }
    }
}
?>
