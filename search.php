<?php
include "dbconfig.php";
if(isset($_GET["c"]) && isset($_GET["key"])){
    $catId = $_GET["c"];
    $key = $_GET["key"];
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
            <div class="col-md-3"></div>
            <!-- ./left colunm -->
            <!-- Center colunm-->
            <div class="container">
                <!-- Product -->
                <?php
                if($catId != -1){
                    $sql = "SELECT p.id as pid, p.*, imagePaths.*,productCategory.* FROM ((products as p INNER JOIN imagePaths on (p.imagePathsID = imagePaths.id)) INNER JOIN productCategory on (p.categoryID = productCategory.id)) where productCategory.id='$catId' and p.productName like '%$key%'";
                    $run = $conn->prepare($sql);
                    $run->execute();
                }else{
                    $sql = "SELECT p.id as pid, p.*, imagePaths.*,productCategory.* FROM ((products as p INNER JOIN imagePaths on (p.imagePathsID = imagePaths.id)) INNER JOIN productCategory on (p.categoryID = productCategory.id)) where p.productName like '%$key%'";
                    $run = $conn->prepare($sql);
                    $run->execute();
                }




                if($run->rowCount() > 0) {
                    while ($row = $run->fetch(PDO::FETCH_ASSOC)) {
                        $title = $row["productName"];
                        $price = $row["price"];
                        $description = $row["description"];
                        $quantity = $row["inStockQuantity"];
                        $image1 = $row["path1"];
                        $category = $row["categoryName"];
                        $pid = $row["pid"];


                        echo '
                        <div class="col-md-3">
                            <a href="details.php?p=' . $pid . '">
                                <div class="left-block">
                                    <img class="img-responsive" alt="product" src="assets/img/products/' . $image1 . '" />
                                     
                                </div>
                                <div class="right-block">
                                    <h5 class="product-name">' . $title . '</h5>
                                    <div class="content_price">
                                        <span class="price product-price">&#2547; ' . $price . '</span>
                                    </div> 
                                </div>
                            </a>
                        </div>
                        ';
                    }
                }
                ?>

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
