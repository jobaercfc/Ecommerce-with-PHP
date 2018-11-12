<?php
    include "dbconfig.php";
    if(isset($_GET["p"])){
        $pid = $_GET["p"];
    }else{
        echo "<script>window.location.href='index.php';</script>";
    }
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
<!-- TOP BANNER -->
<!--<div id="top-banner" class="top-banner">
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
<div class="row">
    <div class="container">

        <div class="row">

            <!-- ./left colunm -->
            <!-- Center colunm-->
            <div class="container" id="center_column">
                <!-- Product -->
                <?php
                    $sql = "SELECT p.*, imagePaths.*,productCategory.* FROM ((products as p INNER JOIN imagePaths on (p.imagePathsID = imagePaths.id)) INNER JOIN productCategory on (p.categoryID = productCategory.id)) where p.id='$pid'";
                    $run = $conn->prepare($sql);
                    $run->execute();

                    if($run->rowCount() > 0) {
                        while ($row = $run->fetch(PDO::FETCH_ASSOC)) {
                            $title = $row["productName"];
                            $price = $row["price"];
                            $description = $row["description"];
                            $quantity = $row["inStockQuantity"];
                            $image1 = $row["path1"];
                            $category = $row["categoryName"];
                        }
                    }
                ?>
                <div id="product">
                    <div class="primary-box row">
                        <div class="pb-left-column col-xs-12 col-sm-3"></div>
                        <div class="pb-left-column col-xs-12 col-sm-6">
                            <!-- product-imge-->
                            <div class="product-image">
                                <div class="product-full">
                                    <img id="product-zoom" src="assets/img/products/<?php echo $image1;?>">
                                </div>

                            </div>
                            <!-- product-imge-->
                        </div>
                        <div class="pb-right-column col-xs-12 col-sm-3">
                            <h1 class="product-name"><?php echo $title;?></h1>

                            <div class="product-price-group">
                                <span class="price">&#2547; <?php echo $price;?></span>
                            </div>
                            <div class="info-orther">
                                <p>Item id: <?php echo $pid;?></p>
                                <p>Availability: <span class="in-stock">In stock</span></p>
                            </div>
                            <div class="product-desc">
                                <?php echo $description;?>
                            </div>

                            <div class="form-action">
                                <div class="button-group" >
                                    <button class="btn-add-cart" id="addtocarthome" pid = "<?php echo $pid;?>">Add to cart</button>
                                </div>
                                <div class="button-group">
                                    <a class="wishlist" href="#"><i class="fa fa-heart-o"></i>
                                        <br>Wishlist</a>
                                </div>
                            </div>
                            <div class="form-share">
                                <div class="sendtofriend-print">
                                    <a href="javascript:print();"><i class="fa fa-print"></i> Print</a>
                                    <a href="#"><i class="fa fa-envelope-o fa-fw"></i>Send to a friend</a>
                                </div>
                                <div class="network-share">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- tab product -->
                    <div class="product-tab">
                        <ul class="nav-tab">
                            <li class="active">
                                <a aria-expanded="false" data-toggle="tab" href="#product-detail">Product Details</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#reviews">reviews</a>
                            </li>
                        </ul>
                        <div class="tab-container">
                            <div id="product-detail" class="tab-panel active">
                                <?php echo $description;?>
                            </div>
                            <div id="reviews" class="tab-panel">
                                <div class="product-comments-block-tab">
                                    <div class="comment row">
                                        <div class="col-sm-3 author">
                                            <div class="grade">
                                                <span>Grade</span>
                                                <span class="reviewRating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </span>
                                            </div>
                                            <div class="info-author">
                                                <span><strong>Jame</strong></span>
                                                <em>04/08/2018</em>
                                            </div>
                                        </div>
                                        <div class="col-sm-9 commnet-dettail">
                                            Phasellus accumsan cursus velit. Pellentesque egestas, neque sit amet convallis pulvinar
                                        </div>
                                    </div>
                                    <div class="comment row">
                                        <div class="col-sm-3 author">
                                            <div class="grade">
                                                <span>Grade</span>
                                                <span class="reviewRating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </span>
                                            </div>
                                            <div class="info-author">
                                                <span><strong>Author</strong></span>
                                                <em>04/08/2018</em>
                                            </div>
                                        </div>
                                        <div class="col-sm-9 commnet-dettail">
                                            Phasellus accumsan cursus velit. Pellentesque egestas, neque sit amet convallis pulvinar
                                        </div>
                                    </div>
                                    <p>
                                        <a class="btn-comment" href="#">Write your review !</a>
                                    </p>
                                </div>

                            </div>

                        </div>
                    </div>
                    <!-- ./tab product -->

                    <!-- ./box product -->
                </div>
                <!-- Product -->
            </div>
            <!-- ./ Center colunm -->
        </div>
        <!-- ./row-->
    </div>
</div>



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
