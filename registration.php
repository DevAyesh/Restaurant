<!DOCTYPE html>
<html lang="en">

<?php
include("connection/connect.php"); 
//session_start(); 
error_reporting(0); 

if(isset($_POST['submit'])) {
    // Only proceed if the form is submitted after passing the JavaScript validation.
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $address = $_POST['address'];

    // Check if the username or email already exists in the database
    $check_username = mysqli_query($db, "SELECT username FROM users WHERE username = '$username'");
    $check_email = mysqli_query($db, "SELECT email FROM users WHERE email = '$email'");

    if(mysqli_num_rows($check_username) > 0) {
        echo "<script>alert('Username already exists!');</script>";
    } elseif(mysqli_num_rows($check_email) > 0) {
        echo "<script>alert('Email already exists!');</script>";
    } else {
        // Insert data into the database
        $mql = "INSERT INTO users(username, f_name, l_name, email, phone, password, address) 
                VALUES('$username', '$firstname', '$lastname', '$email', '$phone', '".md5($password)."', '$address')";
        mysqli_query($db, $mql);
        
        // Redirect to login page after successful registration
        echo "<script>alert('Registration successful!');</script>";
        header("refresh:0.1;url=login.php");
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registration</title>

    <!-- CSS links -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

   
</head>

<body>
    <div style="background-image: url('images/img/background_login.jpg');">
    <header>

<?php 

    include('header.php'); 

 ?>
 
</header>

        <div class="page-wrapper">
            <section class="contact-page inner-page">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="widget">
                                <div class="widget-body">
                                    <!-- Registration Form -->
                                    <form id="registrationForm" onsubmit="return validateForm()" method="post">
                                        <div class="row">
                                            <div class="form-group col-sm-12">
                                                <label for="username">Username</label>
                                                <input class="form-control" type="text" name="username" id="username">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="firstname">First Name</label>
                                                <input class="form-control" type="text" name="firstname" id="firstname">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="lastname">Last Name</label>
                                                <input class="form-control" type="text" name="lastname" id="lastname">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="email">Email Address</label>
                                                <input class="form-control" type="email" name="email" id="email">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="phone">Phone Number</label>
                                                <input class="form-control" type="text" name="phone" id="phone">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control" name="password" id="password">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="cpassword">Confirm Password</label>
                                                <input type="password" class="form-control" name="cpassword" id="cpassword">
                                            </div>
                                            <div class="form-group col-sm-12">
                                                <label for="address">Delivery Address</label>
                                                <textarea class="form-control" id="address" name="address" rows="3"></textarea>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-4">
                                                <input type="submit" value="Register" name="submit" class="btn theme-btn">
                                            </div>
                                        </div>
                                    </form>
                                    <!-- End Registration Form -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- JavaScript Validation -->
        <script>
            function validateForm() {
                var username = document.getElementById('username').value;
                var firstname = document.getElementById('firstname').value;
                var lastname = document.getElementById('lastname').value;
                var email = document.getElementById('email').value;
                var phone = document.getElementById('phone').value;
                var password = document.getElementById('password').value;
                var cpassword = document.getElementById('cpassword').value;
                var address = document.getElementById('address').value;

                // Check for empty fields
                if (username === "" || firstname === "" || lastname === "" || email === "" || phone === "" || password === "" || cpassword === "" || address === "") {
                    alert("All fields must be filled out!");
                    return false;
                }

                // Check if email is valid
                var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailPattern.test(email)) {
                    alert("Please enter a valid email address.");
                    return false;
                }

                // Check if phone number is valid (10 digits)
                if (phone.length !== 10 || isNaN(phone)) {
                    alert("Please enter a valid 10-digit phone number.");
                    return false;
                }

                // Check if passwords match
                if (password !== cpassword) {
                    alert("Passwords do not match.");
                    return false;
                }

                // Check if password is at least 6 characters
                if (password.length < 6) {
                    alert("Password must be at least 6 characters long.");
                    return false;
                }

                return true;
            }
        </script>
    </div>

    <footer>
        <?php

            include 'footer.php';

            ?>

        </footer>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>
</body>

</html>
