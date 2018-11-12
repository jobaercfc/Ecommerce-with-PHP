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
<body class="category-page">

<?php
    include "assets/mcom/assets/inc/header.php";
?>
<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="#" title="Return to Home">Home</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">Contact</span>
        </div>
        <!-- ./breadcrumb -->
        <!-- page heading-->
        <h2 class="page-heading">
            <span class="page-heading-title2">Contact Us</span>
        </h2>
        <!-- ../page heading-->
        <div id="contact" class="page-content page-contact">
            <div id="message-box-conact"></div>
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="page-subheading">CONTACT FORM</h3>
                    <div class="contact-form-box">
                        <div class="form-selector">
                            <label>Subject Heading</label>
                            <select class="form-control input-sm" id="subject">
                                <option value="Customer service">Customer service</option>
                                <option value="Webmaster">Webmaster</option>
                            </select>
                        </div>
                        <div class="form-selector">
                            <label>Email address</label>
                            <input type="text" class="form-control input-sm" id="email">
                        </div>
                        <div class="form-selector">
                            <label>Order reference</label>
                            <input type="text" class="form-control input-sm" id="order_reference">
                        </div>
                        <div class="form-selector">
                            <label>Message</label>
                            <textarea class="form-control input-sm" rows="10" id="message"></textarea>
                        </div>
                        <div class="form-selector">
                            <button id="btn-send-contact" class="btn">Send</button>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6" id="contact_form_map">
                    <h3 class="page-subheading">Information</h3>
                    <p>Lorem ipsum dolor sit amet onsectetuer adipiscing elit. Mauris fermentum dictum magna. Sed laoreet aliquam leo. Ut tellus dolor dapibus eget. Mauris tincidunt aliquam lectus sed vestibulum. Vestibulum bibendum suscipit mattis.</p>
                    <br>
                    <ul>
                        <li>Praesent nec tincidunt turpis.</li>
                        <li>Aliquam et nisi risus.&nbsp;Cras ut varius ante.</li>
                        <li>Ut congue gravida dolor, vitae viverra dolor.</li>
                    </ul>
                    <br>
                    <ul class="store_info">
                        <li><i class="fa fa-home"></i>Our business address is 1063 Freelon Street San Francisco, CA 95108</li>
                        <li><i class="fa fa-phone"></i><span>+ 021.343.7575</span></li>
                        <li><i class="fa fa-phone"></i><span>+ 020.566.6666</span></li>
                        <li><i class="fa fa-envelope"></i>Email: <span><a href="mailto:%73%75%70%70%6f%72%74@%6b%75%74%65%74%68%65%6d%65.%63%6f%6d">support@softdomainhost.com</a></span></li>
                    </ul>
                </div>
            </div>
        </div>
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
                        <div class="introduce-title">My Account</div>
                        <ul id = "introduce-Account" class="introduce-list">
                            <li><a href="#">My Order</a></li>
                            <li><a href="#">My Wishlist</a></li>
                            <li><a href="#">My Credit Slip</a></li>
                            <li><a href="#">My Addresses</a></li>
                            <li><a href="#">My Personal In</a></li>
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
                    <li><a href="#" >Most Populars</a></li>
                    <li><a href="#" >Best Sellers</a></li>
                    <li><a href="#" >New Arrivals</a></li>
                    <li><a href="#" >Special Products</a></li>
                    <li><a href="#" >Manufacturers</a></li>
                    <li><a href="#" >Our Stores</a></li>
                    <li><a href="#" >Shipping</a></li>
                    <li><a href="#" >Payments</a></li>
                    <li><a href="#" >Warantee</a></li>
                    <li><a href="#" >Refunds</a></li>
                    <li><a href="#" >Checkout</a></li>
                    <li><a href="#" >Discount</a></li>
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
