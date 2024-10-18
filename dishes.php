<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php"); 
error_reporting(0);
session_start();
include_once 'product-action.php'; 
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Dishes</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="node_modules/animate.css/animate.min.css">
    <link rel="stylesheet" href="node_modules/animate.css/animate.css">
    <link rel="stylesheet" href="node_modules/animate.css/animate.compat.css">
    <style>
        /* Custom styles */
        body {
            background-color: #f8f9fa; /* Light background for better contrast */
        }
        .menu-widget {
            border-radius: 10px;
            overflow: hidden; /* Rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
            margin-bottom: 20px; /* Space between widgets */
        }
        .food-item {
            background-color: white; /* White background for food items */
            border-radius: 8px; /* Rounded corners for food items */
            padding: 15px; /* Padding inside food items */
            margin-bottom: 15px; /* Space between food items */
            transition: transform 0.2s; /* Smooth scaling effect */
            display: flex; /* Flexbox for layout */
            align-items: center; /* Center content vertically */
            justify-content: space-between; /* Space out content */
        }
        .food-item:hover {
            transform: scale(1.02); /* Scale up on hover */
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2); /* Increased shadow on hover */
        }
        .rest-descr h6 a {
            color: #007bff; /* Link color */
            text-decoration: none; /* Remove underline */
        }
        .rest-descr h6 a:hover {
            text-decoration: underline; /* Underline on hover */
        }
        .btn.theme-btn {
            background-color: orange; /* Orange button */
            color: white; /* White text */
        }
        .btn.theme-btn:hover {
            background-color: darkorange; /* Darker orange on hover */
        }
        .widget-heading h3 {
            border-bottom: 2px solid #007bff; /* Blue underline */
            padding-bottom: 10px; /* Space below the title */
            color: #343a40; /* Darker text color */
        }
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); /* Responsive grid */
            gap: 20px; /* Space between grid items */
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
                    <li class="col-xs-12 col-sm-4 link-item"><span>1</span><a href="restaurants.php">Choose Restaurant</a></li>
                    <li class="col-xs-12 col-sm-4 link-item active"><span>2</span><a href="dishes.php?res_id=<?php echo $_GET['res_id']; ?>">Pick Your favorite food</a></li>
                    <li class="col-xs-12 col-sm-4 link-item"><span>3</span><a href="#">Order and Pay</a></li>
                </ul>
            </div>
        </div>
        
        <?php 
        $ress = mysqli_query($db,"SELECT * FROM restaurant WHERE rs_id='$_GET[res_id]'");
        $rows = mysqli_fetch_array($ress);
        ?>
        
        
        <section class="inner-page-hero bg-image" data-image-src="images/img/dish.jpeg">
            <div class="profile">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 profile-img">
                            <div class="image-wrap">
                                <figure><?php echo '<img src="admin/Res_img/'.$rows['image'].'" alt="Restaurant logo">'; ?></figure>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 profile-desc">
                            <div class="pull-left right-text white-txt">
                                <h6><a href="#"><?php echo $rows['title']; ?></a></h6>
                                <p><?php echo $rows['address']; ?></p>   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <div class="breadcrumb">
            <div class="container"></div>
        </div>
        
        <div class="container m-t-30">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                    <div class="widget widget-cart">
                        <div class="widget-heading">
                            <h3 class="widget-title text-dark">Your Cart</h3>
                            <div class="clearfix"></div>
                        </div>
                        <div class="order-row bg-white">
                            <div class="widget-body">
                                <?php
                                $item_total = 0;
                                foreach ($_SESSION["cart_item"] as $item) {
                                ?>
                                <div class="title-row">
                                    <?php echo $item["title"]; ?><a href="dishes.php?res_id=<?php echo $_GET['res_id']; ?>&action=remove&id=<?php echo $item["d_id"]; ?>"><i class="fa fa-trash pull-right"></i></a>
                                </div>
                                <div class="form-group row no-gutter">
                                    <div class="col-xs-8">
                                        <input type="text" class="form-control b-r-0" value=<?php echo "Rs:".$item["price"]; ?> readonly id="exampleSelect1">
                                    </div>
                                    <div class="col-xs-4">
                                        <input class="form-control" type="text" readonly value='<?php echo $item["quantity"]; ?>' id="example-number-input"> 
                                    </div>
                                </div>
                                <?php
                                $item_total += ($item["price"]*$item["quantity"]); 
                                }
                                ?>                                  
                            </div>
                        </div>
                        <div class="widget-body">
                            <div class="price-wrap text-xs-center">
                                <p>TOTAL</p>
                                <h3 class="value"><strong><?php echo "Rs:".$item_total; ?></strong></h3>
                                <p>Free Delivery!!!</p>
                                <?php
                                if($item_total==0){
                                ?>
                                <a href="checkout.php?res_id=<?php echo $_GET['res_id'];?>&action=check" class="btn theme-btn btn-lg disabled">Checkout</a>
                                <?php
                                } else {   
                                ?>
                                <a href="checkout.php?res_id=<?php echo $_GET['res_id'];?>&action=check" class="btn theme-btn btn-lg active">Checkout</a>
                                <?php   
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">
                    <div class="menu-widget" id="2">
                        <div class="widget-heading">
                            <h3 class="widget-title text-dark">MENU <a class="btn btn-link pull-right" data-toggle="collapse" href="#popular2" aria-expanded="true">
                                <i class="fa fa-angle-right pull-right"></i>
                                <i class="fa fa-angle-down pull-right"></i>
                                </a>
                            </h3>
                            <div class="clearfix"></div>
                        </div>
                        <div class="collapse in" id="popular2">
                            <div class="grid-container">
                                <?php  
                                    $stmt = $db->prepare("SELECT * FROM dishes WHERE rs_id='$_GET[res_id]'");
                                    $stmt->execute();
                                    $products = $stmt->get_result();
                                    if (!empty($products)) {
                                        foreach($products as $product) {
                                ?>
                                    <div class="food-item">
                                        <form method="post" action='dishes.php?res_id=<?php echo $_GET['res_id'];?>&action=add&id=<?php echo $product['d_id']; ?>'>
                                            <div class="rest-logo pull-left">
                                                <a class="restaurant-logo pull-left" href="#"><?php echo '<img src="admin/Res_img/dishes/'.$product['img'].'" alt="Food logo">'; ?></a>
                                            </div>
                                            <div class="rest-descr">
                                                <h6><a href="#"><?php echo $product['title']; ?></a></h6>
                                                <p><?php echo $product['description']; ?></p>
                                                <p><strong>Price: </strong>Rs:<?php echo $product['price']; ?></p>
                                                <input type="hidden" name="quantity" value="1" />
                                                <button type="submit" class="btn theme-btn">Add to Cart</button>
                                            </div>
                                        </form>
                                    </div>
                                <?php 
                                        } // End of foreach
                                    } else {
                                        echo "<p>No dishes available.</p>";
                                    }
                                ?>
                            </div> <!-- End of grid-container -->
                        </div> <!-- End of collapse -->
                    </div> <!-- End of menu-widget -->
                </div> <!-- End of main content area -->
            </div> <!-- End of row -->
        </div> <!-- End of container -->

        <footer>
            <?php include('footer.php'); ?>
        </footer>
    </div> <!-- End of page-wrapper -->
    
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
