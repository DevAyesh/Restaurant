<html>
<head>
    <!-- CSS Links -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- Internal CSS to highlight active tab -->
    <style>
        .navbar {
            background-color: #343a40; /* Dark background */
        }
        .navbar-brand img {
            width: 150px; /* Logo size is fixed hee */
        }
        .navbar-nav .nav-link {
            color: #f8f9fa !important;
            padding: 10px 15px;
            transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
        }
        /* Active Tab Highlighting */
        .active-tab {
            background-color: #007bff; /* Blue active tab */
            color: #fff !important;
            border-radius: 5px;
        }
        /* Hover Effect */
        .navbar-nav .nav-link:hover {
            background-color: #495057; /* Grey hover */
            border-radius: 5px;
            color: #fff !important;
        }
    </style>
</head>

<header id="header" class="header-scroll top-header headrom">
    <nav class="navbar navbar-dark">
        <div class="container">
            <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
            <a class="navbar-brand" href="index.php">
                <img width="60%" height="60%"  class="img-rounded" src="images/YummyPicksLogo.png" alt="">
            </a>
            <div class="collapse navbar-toggleable-md float-lg-right" id="mainNavbarCollapse">
                <ul class="nav navbar-nav">
                    <!-- Home Tab -->
                    <li class="nav-item">
                        <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == 'index.php') echo 'active-tab'; ?>" href="index.php">Home</a>
                    </li>
                    
                    <!-- Restaurants Tab -->
                    <li class="nav-item">
                        <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == 'restaurants.php') echo 'active-tab'; ?>" href="restaurants.php">Restaurants</a>
                    </li>

                    <!-- Contact Us Tab -->
                    <li class="nav-item">
                        <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == 'contact.php') echo 'active-tab'; ?>" href="contact.php">Contact Us</a>
                    </li>

                    <!-- About Us Tab -->
                    <li class="nav-item">
                        <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == 'about.php') echo 'active-tab'; ?>" href="about.php">About Us</a>
                    </li>

                    <!-- Conditional Login/Signup or Orders/Logout -->
                    <?php
                        if(empty($_SESSION["user_id"])) {
                            echo '<li class="nav-item"><a href="login.php" class="nav-link '; if(basename($_SERVER['PHP_SELF']) == 'login.php') echo 'active-tab'; echo '">Login</a></li>';
                            echo '<li class="nav-item"><a href="registration.php" class="nav-link '; if(basename($_SERVER['PHP_SELF']) == 'registration.php') echo 'active-tab'; echo '">Signup</a></li>';
                        } else {
                            echo '<li class="nav-item"><a href="your_orders.php" class="nav-link '; if(basename($_SERVER['PHP_SELF']) == 'your_orders.php') echo 'active-tab'; echo '">Your Orders</a></li>';
                            echo '<li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>';
                        }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
</header>

<body>
    <!-- JS Links -->
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
