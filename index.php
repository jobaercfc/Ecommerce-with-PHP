<?php
include "dbconfig.php";
?>
<!DOCTYPE html>
<html>
<head>
    <?php
    include "assets/mcom/assets/inc/stylesheetadd.php";
    ?>

    <title>Soft Domain Host</title>
</head>
<body class="home">
    <!-- TOP BANNER
    <div id="top-banner" class="top-banner">
        <div class="bg-overlay"></div>
        <div class="container">
            <h1>Special Offer!</h1>
            <h2>Additional 40% OFF For Men & Women Clothings</h2>
            <span>This offer is for online only 7PM to middnight ends in 30th July 2018</span>
            <span class="btn-close"></span>
        </div>
    </div>-->
    <?php
    include "assets/mcom/assets/inc/header.php";
    ?>
    <!-- Home slideder-->
    <div id="home-slider">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 slider-left"></div>
                <div class="col-sm-9 header-top-right">
                    <div class="homeslider">
                        <div class="content-slide">
                            <ul id="contenhomeslider">
                                <li><img alt="Funky roots" src="assets/mcom/assets/data/slide.jpg" title="Funky roots" /></li>
                                <li><img alt="Funky roots" src="assets/mcom/assets/data/slide.jpg" title="Funky roots" /></li>
                                <li><img  alt="Funky roots" src="assets/mcom/assets/data/slide.jpg" title="Funky roots" /></li>
                            </ul>
                        </div>
                    </div>
                    <div class="header-banner banner-opacity">
                        <a href="#"><img alt="Funky roots" src="assets/mcom/assets/data/ads1.jpg" /></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Home slideder-->
    <!-- servives -->
    <div class="container">
        <div class="service ">
            <div class="col-xs-6 col-sm-3 service-item">
                <div class="icon">
                    <img alt="services" src="assets/mcom/assets/data/s1.png" />
                </div>
                <div class="info">
                    <a href="#"><h3>Free Shipping</h3></a>
                    <span>On order over $200</span>
                </div>
            </div>
            <div class="col-xs-6 col-sm-3 service-item">
                <div class="icon">
                    <img alt="services" src="assets/mcom/assets/data/s2.png" />
                </div>
                <div class="info">
                    <a href="#"><h3>30-day return</h3></a>
                    <span>Moneyback guarantee</span>
                </div>
            </div>
            <div class="col-xs-6 col-sm-3 service-item">
                <div class="icon">
                    <img alt="services" src="assets/mcom/assets/data/s3.png" />
                </div>

                <div class="info" >
                    <a href="#"><h3>24/7 support</h3></a>
                    <span>Online consultations</span>
                </div>
            </div>
            <div class="col-xs-6 col-sm-3 service-item">
                <div class="icon">
                    <img alt="services" src="assets/mcom/assets/data/s4.png" />
                </div>
                <div class="info">
                    <a href="#"><h3>SAFE SHOPPING</h3></a>
                    <span>Safe Shopping Guarantee</span>
                </div>
            </div>
        </div>
    </div>
    <!-- end services -->

    <!--Page Top-->
    <div class="page-top">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-9 page-top-left">
                    <div class="popular-tabs">
                        <ul class="nav-tab">
                            <li class=""><a data-toggle="tab" href="#tab-1" aria-expanded="false">All Product</a></li>
                        </ul>
                        <div class="tab-container">
                            <div id="tab-1" class="tab-panel active">
                                <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":3}}'>
                                    <?php
                                    $sql = "SELECT p.id as pid, p.*, imagePaths.*,productCategory.* FROM ((products as p INNER JOIN imagePaths on (p.imagePathsID = imagePaths.id)) INNER JOIN productCategory on (p.categoryID = productCategory.id))";
                                    $run = $conn->prepare($sql);
                                    $run->execute();

                                    if($run->rowCount() > 0){
                                        while ($row = $run->fetch(PDO::FETCH_ASSOC)) {
                                            $title = $row["productName"];
                                            $price = $row["price"];
                                            $description = $row["description"];
                                            $quantity = $row["inStockQuantity"];
                                            $image1 = $row["path1"];
                                            $category = $row["categoryName"];
                                            $pid = $row["pid"];

                                            echo '
                                                    <li>
                                                        <a href="details.php?p='.$pid.'">
                                                            <div class="left-block">
                                                                <img class="img-responsive" alt="product" src="assets/img/products/'.$image1.'" />
                                                                
                                                                <div class="quick-view">
                                                                </div>
                                                                <div class="group-price">
                                                                    <span class="product-sale">Sale</span>
                                                                </div>
                                                            </div>
                                                            <div class="right-block">
                                                                <h5 class="product-name">'.$title.'</h5>
                                                                <div class="content_price">
                                                                    <span class="price product-price">&#2547; '.$price.'</span>
                                                                </div>
                                                                <div class="product-star">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-half-o"></i>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                ';
                                        }
                                    }
                                    ?>




                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-3 page-top-right">
                    <div class="latest-deals">
                        <h2 class="latest-deal-title">latest deals</h2>
                        <div class="latest-deal-content">
                            <ul class="product-list owl-carousel owl-theme owl-loaded" data-dots="false" data-loop="true" data-nav="true" data-autoplaytimeout="1000" data-autoplayhoverpause="true" data-responsive="{&quot;0&quot;:{&quot;items&quot;:1},&quot;600&quot;:{&quot;items&quot;:3},&quot;1000&quot;:{&quot;items&quot;:1}}">
                                <?php
                                $sql = "SELECT p.id as pid, p.*, imagePaths.*,productCategory.* FROM ((products as p INNER JOIN imagePaths on (p.imagePathsID = imagePaths.id)) INNER JOIN productCategory on (p.categoryID = productCategory.id)) order by pid desc limit 3";
                                $run = $conn->prepare($sql);
                                $run->execute();

                                if($run->rowCount() > 0){
                                    while ($row = $run->fetch(PDO::FETCH_ASSOC)) {
                                        $title = $row["productName"];
                                        $price = $row["price"];
                                        $description = $row["description"];
                                        $quantity = $row["inStockQuantity"];
                                        $image1 = $row["path1"];
                                        $category = $row["categoryName"];
                                        $pid = $row["pid"];

                                        echo '
                                                    <li>
                                                        <a href="details.php?p='.$pid.'">
                                                            <div class="left-block">
                                                                <img class="img-responsive" alt="product" src="assets/img/products/'.$image1.'" />
                                                                
                                                                <div class="quick-view">
                                                                </div>
                                                                <div class="group-price">
                                                                    <span class="product-sale">Latest</span>
                                                                </div>
                                                            </div>
                                                            <div class="right-block">
                                                                <h5 class="product-name">'.$title.'</h5>
                                                                <div class="content_price">
                                                                    <span class="price product-price">&#2547; '.$price.'</span>
                                                                </div>
                                                                <div class="product-star">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-half-o"></i>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                ';
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Category Based Product-->
            <?php

                $sql = "SELECT * from productCategory";
                $run = $conn->prepare($sql);
                $run->execute();

                if($run->rowCount() > 0){
                    while ($row = $run->fetch(PDO::FETCH_ASSOC)){
                        $cat = $row["categoryName"];
                        $catId = $row["id"];

                        echo '
                             <div class="row">
                                <div class="col-md-12">
                                    <div class="popular-tabs">
                                        <ul class="nav-tab">
                                            <li class=""><a data-toggle="tab" href="#tab-1" aria-expanded="false">'.$cat.'</a></li>
                                        </ul>
                                        <div class="tab-container">
                                            <div id="tab-1" class="tab-panel active">
                                                <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive=\'{"0":{"items":1},"600":{"items":3},"1000":{"items":3}}\'>
                        
                        ';

                        $sql1 = "SELECT p.id as pid, p.*, imagePaths.*,productCategory.* FROM ((products as p INNER JOIN imagePaths on (p.imagePathsID = imagePaths.id)) INNER JOIN productCategory on (p.categoryID = productCategory.id)) where productCategory.id='$catId'";
                        $run1 = $conn->prepare($sql1);
                        $run1->execute();

                        if($run1->rowCount() > 0) {
                            while ($row1 = $run1->fetch(PDO::FETCH_ASSOC)) {
                                $title = $row1["productName"];
                                $price = $row1["price"];
                                $description = $row1["description"];
                                $quantity = $row1["inStockQuantity"];
                                $image1 = $row1["path1"];
                                $category = $row1["categoryName"];
                                $pid = $row1["pid"];

                                echo '
                                    <li>
                                        <a href="details.php?p=' . $pid . '">
                                            <div class="left-block">
                                                <img class="img-responsive" alt="product" src="assets/img/products/' . $image1 . '" />
                                                
                                                <div class="quick-view">
                                                </div>
                                                <div class="group-price">
                                                    <span class="product-sale">Sale</span>
                                                </div>
                                            </div>
                                            <div class="right-block">
                                                <h5 class="product-name">' . $title . '</h5>
                                                <div class="content_price">
                                                    <span class="price product-price">&#2547; ' . $price . '</span>
                                                </div>
                                                <div class="product-star">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                ';
                            }
                        }else{
                            echo '<h3>No product is available in this category</h3>';
                        }

                        echo '
                                </ul>
                                </div>
    
                            </div>
                        </div>
                    </div>
                </div>
                        
                        ';

                    }
                }


            ?>
            <!--Category Based Product End-->

            <!--ROW banner bottom-->
            <div class="row banner-bottom">
                <div class="col-sm-6">
                    <div class="banner-boder-zoom">
                        <a href="#"><img alt="ads" class="img-responsive" src="assets/mcom/assets/data/ads17.jpg"></a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="banner-boder-zoom">
                        <a href="#"><img alt="ads" class="img-responsive" src="assets/mcom/assets/data/ads18.jpg"></a>
                    </div>
                </div>
            </div>
            <!--Row banner bottom end-->
        </div>
    </div>
    <!--Page Top End-->
    <!-- Footer -->
    <footer id="footer">
        <div class="container">
            <!-- introduce-box -->
            <div id="introduce-box" class="row">
                <div class="col-md-3">
                    <div id="address-box">
                        <a href="#"><img src="assets/data/introduce-logo.png" alt="" /></a>
                        <div id="address-list">
                            <div class="tit-name">Address:</div>
                            <div class="tit-contain">Example Street 68, Mahattan, New York, USA.</div>
                            <div class="tit-name">Phone:</div>
                            <div class="tit-contain">+00 123 456 789</div>
                            <div class="tit-name">Email:</div>
                            <div class="tit-contain">support@business.com</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="introduce-title">Company</div>
                            <ul id="introduce-company"  class="introduce-list">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Testimonials</a></li>
                                <li><a href="#">Affiliate Program</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-4">
                            <div class="introduce-title">Support</div>
                            <ul id = "introduce-support"  class="introduce-list">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Testimonials</a></li>
                                <li><a href="#">Affiliate Program</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div id="contact-box">
                        <div class="introduce-title">Newsletter</div>
                        <div class="input-group" id="mail-box">
                            <input type="text" placeholder="Your Email Address"/>
                            <span class="input-group-btn">
                            <button class="btn btn-default" type="button">OK</button>
                          </span>
                        </div><!-- /input-group -->
                        <div class="introduce-title">Let's Socialize</div>
                        <div class="social-link">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            <a href="#"><i class="fa fa-vk"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                        </div>
                    </div>

                </div>
            </div><!-- /#introduce-box -->

            <!-- #trademark-box -->
            <div id="trademark-box" class="row">
                <div class="col-sm-12">
                    <ul id="trademark-list">
                        <li id="payment-methods">Accepted Payment Methods</li>
                        <li>
                            <a href="#"><img src="assets/mcom/assets/data/trademark-ups.jpg"  alt="ups"/></a>
                        </li>
                        <li>
                            <a href="#"><img src="assets/mcom/assets/data/trademark-qiwi.jpg"  alt="ups"/></a>
                        </li>
                        <li>
                            <a href="#"><img src="assets/mcom/assets/data/trademark-wu.jpg"  alt="ups"/></a>
                        </li>
                        <li>
                            <a href="#"><img src="assets/mcom/assets/data/trademark-cn.jpg"  alt="ups"/></a>
                        </li>
                        <li>
                            <a href="#"><img src="assets/mcom/assets/data/trademark-visa.jpg"  alt="ups"/></a>
                        </li>
                        <li>
                            <a href="#"><img src="assets/mcom/assets/data/trademark-mc.jpg"  alt="ups"/></a>
                        </li>
                        <li>
                            <a href="#"><img src="assets/mcom/assets/data/trademark-ems.jpg"  alt="ups"/></a>
                        </li>
                        <li>
                            <a href="#"><img src="assets/mcom/assets/data/trademark-dhl.jpg"  alt="ups"/></a>
                        </li>
                        <li>
                            <a href="#"><img src="assets/mcom/assets/data/trademark-fe.jpg"  alt="ups"/></a>
                        </li>
                        <li>
                            <a href="#"><img src="assets/mcom/assets/data/trademark-wm.jpg"  alt="ups"/></a>
                        </li>
                    </ul>
                </div>
            </div> <!-- /#trademark-box -->

            <!-- #trademark-text-box -->
            <div id="footer-menu-box">
                <div class="col-sm-12">
                    <ul class="footer-menu-list">
                        <li><a href="#" >Company Info - Partnerships</a></li>
                    </ul>
                </div>
                <div class="col-sm-12">
                    <ul class="footer-menu-list">
                        <li><a href="#" >Online Shopping</a></li>
                        <li><a href="#" >Promotions</a></li>
                        <li><a href="#" >My Orders</a></li>
                        <li><a href="#" >Help</a></li>
                        <li><a href="#" >Site Map</a></li>
                        <li><a href="#" >Customer Service</a></li>
                        <li><a href="#" >Support</a></li>
                    </ul>
                </div>

                <div class="col-sm-12">
                    <ul class="footer-menu-list">
                        <li><a href="#" >Terms & Conditions</a></li>
                        <li><a href="#" >Policy</a></li>
                        <li><a href="#" >Shipping</a></li>
                        <li><a href="#" >Payments</a></li>
                        <li><a href="#" >Returns</a></li>
                        <li><a href="#" >Refunds</a></li>
                        <li><a href="#" >Warrantee</a></li>
                        <li><a href="#" >FAQ</a></li>
                        <li><a href="#" >Contact</a></li>
                    </ul>
                </div>
                <p class="text-center">Copyrights &#169; 2018 softdomainhost.com. All Rights Reserved. Designed by softdomainhost.com</p>
            </div><!-- /#footer-menu-box -->
        </div>
    </footer>

    <a href="#" class="scroll_top" title="Scroll to Top" style="display: inline;">Scroll</a>
    <?php
    include "assets/mcom/assets/inc/addscript.php";
    ?>
</body>
</html>
