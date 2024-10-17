<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Footer Example</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f4;
        }

        .footer {
            display: flex;
            justify-content: space-around;
            align-items: flex-start;
            padding: 40px;
            background-color: #2c3e50;
            color: #fff;
            border-top: 5px solid #f39c12;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .footer-section {
            width: 22%;
            text-align: left;
        }

        .footer-section h3 {
            font-size: 20px;
            margin-bottom: 15px;
            font-weight: 600;
            color: #f39c12;
        }

        .footer-section p, .footer-section a {
            font-size: 16px;
            line-height: 1.8;
            color: #ddd;
            transition: color 0.3s ease;
        }

        .footer-section a:hover {
            color: #f39c12;
        }

        .footer-bottom {
            text-align: center;
            background-color: #1a252f;
            padding: 15px 0;
            color: #bbb;
            font-size: 15px;
            margin-top: 10px;
        }

        .social-icons {
            margin-top: 15px;
        }

        .social-icons a {
            color: #fff;
            margin: 0 8px;
            font-size: 25px;
            text-decoration: none;
            display: inline-block;
        }

        .social-icons a:hover {
            color: #f39c12;
        }

        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background-color: #f39c12;
            color: white;
            padding: 15px;
            border-radius: 50%;
            font-size: 22px;
            text-align: center;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            z-index: 100;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .back-to-top:hover {
            background-color: #e67e22;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.4);
        }

        .footer-section p {
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>

    <?php
    // Dynamic content for the footer using PHP
    $phone = "+1 5589 55488 55";
    $email = "info@example.com";
    $address = "A108 Adam Street, New York, NY 535022";
    ?>

    <div class="footer">
        <div class="footer-section">
            <h3>Address</h3>
            <p><?php echo $address; ?></p>
        </div>
        <div class="footer-section">
            <h3>Contact</h3>
            <p>Phone: <?php echo $phone; ?></p>
            <p>Email: <?php echo $email; ?></p>
        </div>
        <div class="footer-section">
            <h3>Opening Hours</h3>
            <p>Mon-Sat: 11AM - 23PM</p>
            <p>Sunday: Closed</p>
        </div>
        <div class="footer-section">
            <h3>Follow Us</h3>
            <div class="social-icons">
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <p>© 2024 Yummy. All Rights Reserved. Designed by BootstrapMade</p>
    </div>

    <a href="#" class="back-to-top" onclick="scrollToTop()">&#8679;</a>

    <script>
        function scrollToTop() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    </script>

    <!-- Include Font Awesome for social icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
