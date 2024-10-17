<?php
include("connection/connect.php");
error_reporting(0);
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Discover the best restaurants and dishes">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Restaurants</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f7fa;
            font-family: 'Arial', sans-serif;
        }

        .top-links {
            margin: 20px 0;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 15px;
        }

        .links {
            justify-content: center;
        }

        .link-item {
            transition: transform 0.3s;
        }

        .link-item:hover {
            transform: scale(1.05);
        }

        .inner-page-hero {
            position: relative;
            height: 200px;
            background-size: cover;
            background-position: center;
        }

        .restaurant-entry {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        /*
        .restaurant-entry:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
        }
            */

        .entry-logo img {
            border-radius: 15px;
            width: 100%;
            height: auto;
        }

        .entry-dscr h5 {
            font-size: 1.5rem;
            font-weight: bold;
            margin: 15px 0 5px;
            color: #333;
        }

        .entry-dscr span {
            color: #777;
            font-size: 0.9rem;
        }

        .right-content {
            padding: 10px;
            background: #f8f8f8;
            border-radius: 8px;
            text-align: center;
        }

        .theme-btn-dash {
            background-color: #007bff;
            color: white;
            border-radius: 25px;
            padding: 12px 25px;
            font-size: 1rem;
            transition: background-color 0.3s, transform 0.3s;
        }

        .theme-btn-dash:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        footer {
            background: #007bff;
            color: white;
            padding: 30px 0;
        }

        footer h5 {
            font-size: 1.25rem;
            margin-bottom: 10px;
        }

        footer p {
            margin: 5px 0;
        }

        .payment-options img {
            width: 40px;
            margin: 0 10px;
        }
    </style>
</head>

<body>
    <header>
        <?php include('header.php'); ?>
    </header>

    <div class="page-wrapper">
        <div class="top-links">
            <div class="container">
                <ul class="row links">
                    <li class="col-xs-12 col-sm-4 link-item active"><span>1</span><a href="#">Choose Restaurant</a></li>
                    <li class="col-xs-12 col-sm-4 link-item"><span>2</span><a href="#">Pick Your Favorite Food</a></li>
                    <li class="col-xs-12 col-sm-4 link-item"><span>3</span><a href="#">Order and Pay</a></li>
                </ul>
            </div>
        </div>

        <div class="inner-page-hero bg-image" data-image-src='images/img/res.jpeg';>
      
            <div class="container"></div>
        </div>

        <section class="restaurants-page">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="row">
                            <?php 
                                $ress = mysqli_query($db, "SELECT * FROM restaurant");
                                while ($rows = mysqli_fetch_array($ress)) {
                                    echo '
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                        <div class="restaurant-entry">
                                            <div class="entry-logo">
                                                <a href="dishes.php?res_id='.$rows['rs_id'].'">
                                                    <img src="admin/Res_img/'.$rows['image'].'" alt="'.$rows['title'].' logo">
                                                </a>
                                            </div>
                                            <div class="entry-dscr">
                                                <h5><a href="dishes.php?res_id='.$rows['rs_id'].'">'.$rows['title'].'</a></h5>
                                                <span>'.$rows['address'].'</span>
                                            </div>
                                            <div class="right-content">
                                                <a href="dishes.php?res_id='.$rows['rs_id'].'" class="btn theme-btn-dash">View Menu</a>
                                            </div>
                                        </div>
                                    </div>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <footer class="footer">
            <div class="container">
                <div class="bottom-footer">
                    <div class="row">
                        <div class="col-xs-12 col-sm-3 payment-options">
                            <h5>Payment Options</h5>
                            <ul class="list-inline">
                                <li class="list-inline-item"><a href="#"><img src="images/paypal.png" alt="Paypal"></a></li>
                                <li class="list-inline-item"><a href="#"><img src="images/mastercard.png" alt="Mastercard"></a></li>
                                <li class="list-inline-item"><a href="#"><img src="images/maestro.png" alt="Maestro"></a></li>
                                <li class="list-inline-item"><a href="#"><img src="images/stripe.png" alt="Stripe"></a></li>
                                <li class="list-inline-item"><a href="#"><img src="images/bitcoin.png" alt="Bitcoin"></a></li>
                            </ul>
                        </div>
                        <div class="col-xs-12 col-sm-4 address">
                            <h5>Address</h5>
                            <p>213, Raheja Chambers, Free Press Journal Road, Nariman Point, Mumbai, Maharashtra 400021, India</p>
                            <h5>Phone: <a href="tel:+918093424562">+91 80934 24562</a></h5>
                        </div>
                        <div class="col-xs-12 col-sm-5 additional-info">
                            <h5>Additional Information</h5>
                            <p>Join thousands of other restaurants who benefit from partnering with us.</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

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
