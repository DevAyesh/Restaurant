<?php
include("connection/connect.php");

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // Basic validation
    if ($name == "" || $email == "" || $phone == "" || $message == "") {
        echo "<script>alert('All fields are required.');</script>";
    } else {
        // Save contact message in the database
        $mql = "INSERT INTO contact_messages(name, email, phone, message) VALUES('$name', '$email', '$phone', '$message')";
        if (mysqli_query($db, $mql)) {
            echo "<script>alert('Your message has been sent!');</script>";
            
            // Redirect after form submission to avoid resubmission on page refresh
            echo "<script>window.location = 'contact.php';</script>";
        } else {
            echo "<script>alert('Error: Unable to send your message. Please try again later.');</script>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Contact Us</title>

    <!-- Original CSS for the main design -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- CSS for the contact box and new layout -->
    <link href="css/contact.css" rel="stylesheet">

    <style>
      .background-image {
            background-image: url('images/img/background_login.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 150vh;
            width: 100%;
        }
        body {
            background-color: #f8f9fa; /* Light background color */
        }

        .contact-info {
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
            flex-wrap: wrap; /* Allow items to wrap in smaller screens */
        }

        .contact-info .info-box {
            text-align: center;
            background-color: #fff;
            border-radius: 10px; /* Slightly increased border-radius for softer edges */
            padding: 20px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2); /* Enhanced shadow for more depth */
            transition: transform 0.2s, box-shadow 0.2s;
            margin: 10px; /* Added margin for spacing */
            flex: 1 1 200px; /* Flex property to allow responsive sizing */
        }

        .contact-info .info-box:hover {
            transform: translateY(-5px); /* Slight lift on hover */
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.3); /* Darker shadow on hover */
        }

        .contact-info .info-box i {
            font-size: 40px;
            color: #d9534f;
            margin-bottom: 10px;
        }

        .contact-form-wrapper {
            margin-top: 20px;
            background-color: #fff; /* Background for the form wrapper */
            border-radius: 10px; /* Softer edges */
            padding: 20px; /* Padding around the form */
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2); /* Shadow for depth */
        }

        .contact-form-wrapper h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #343a40; /* Darker color for better contrast */
        }

        .form-group label {
            font-weight: bold;
        }

        .submit-btn-wrapper {
            text-align: center;
        }

        .btn-primary {
            background-color: #d9534f; /* Custom primary button color */
            border: none;
            transition: background-color 0.3s; /* Transition for hover effect */
        }

        .btn-primary:hover {
            background-color: #c9302c; /* Darker shade on hover */
        }
    </style>
</head>

<body>
<div class="background-image">
    <header>
        <?php include('header.php'); ?>
    </header>

    <div class="page-wrapper">
        <section class="contact-page inner-page">
            <div class="container">
                <div class="contact-info">
                    <div class="info-box">
                        <i class="fa fa-map-marker"></i>
                        <h4>Address</h4>
                        <p>A108 Adam Street, New York, NY 535022</p>
                    </div>
                    <div class="info-box">
                        <i class="fa fa-phone"></i>
                        <h4>Call Us</h4>
                        <p>+1 5589 55488 55</p>
                    </div>
                    <div class="info-box">
                        <i class="fa fa-envelope"></i>
                        <h4>Email Us</h4>
                        <p>info@example.com</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="contact-form-wrapper">
                            <!-- Contact Form -->
                            <form id="contactForm" method="post" onsubmit="return validateForm()">
                                <h2 class="form-title">Contact Us</h2>
                                <div class="form-group">
                                    <label for="name">Your Name</label>
                                    <input class="form-control" type="text" name="name" id="name" placeholder="Enter your name" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Your Email</label>
                                    <input class="form-control" type="email" name="email" id="email" placeholder="Enter your email" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Your Phone</label>
                                    <input class="form-control" type="tel" name="phone" id="phone" placeholder="Enter your phone number" required>
                                </div>
                                <div class="form-group">
                                    <label for="message">Your Message</label>
                                    <textarea class="form-control" name="message" id="message" rows="5" placeholder="Type your message here..." required></textarea>
                                </div>

                                <div class="submit-btn-wrapper">
                                    <input type="submit" value="Send Message" name="submit" class="btn btn-primary">
                                </div>
                            </form>
                            <!-- End Contact Form -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <footer>
        <?php include 'footer.php'; ?>
    </footer>

    <!-- JavaScript Validation -->
    <script>
        function validateForm() {
            var name = document.getElementById('name').value;
            var email = document.getElementById('email').value;
            var phone = document.getElementById('phone').value;
            var message = document.getElementById('message').value;

            // Check for empty fields
            if (name === "" || email === "" || phone === "" || message === "") {
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
            var phonePattern = /^\d{10}$/;
            if (!phonePattern.test(phone)) {
                alert("Please enter a valid 10-digit phone number.");
                return false;
            }

            return true;
        }
    </script>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
