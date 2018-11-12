<?php
    session_start();
    if(isset($_SESSION["u_id"])){
        $uid = $_SESSION["u_id"];
        if(isset($_SESSION["cartproductwithoutlogin"])){
            $productIdWithoutLogin = $_SESSION["cartproductwithoutlogin"];
            $sql = "INSERT INTO cartdetails(userID, productID) VALUES ('$uid', '$productIdWithoutLogin')";
            $run = $conn->prepare($sql);
            $run->execute();
            unset($_SESSION["cartproductwithoutlogin"]);
        }
    }else{
        echo '<script>window.location.href="login.php";</script>';
    }
?>
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> <span class="block m-t-xs"> <h1 class="font-bold"><?php echo $_SESSION["name"]; ?></h1>
                    </a>
                </div>
                <div class="logo-element">
                    <?php echo $_SESSION["name"]; ?>
                </div>
            </li>
            <li class="active">
                <a href="dashboard.php"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
            </li>
            <?php
                if($_SESSION["userRoleId"] == 3){
                    echo '
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Category Management</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li><a href="add_new_category.php">Add New Category</a></li>
                                <li><a href="category_list.php">Category List</a></li>
                            </ul>
                        </li>
                    ';
                }
                ?>

            <?php
            if($_SESSION["userRoleId"] == 1){
                echo '
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Sell</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li><a href="addproduct.php">Add New Product</a></li>
                                <li><a href="inventory.php">Inventory</a></li>
                                <li><a href="pending_orders.php">Pending Orders</a></li>
                                <!--<li><a href="order_list.php">Order List</a></li>
                                <li><a href="sell_reports.php">Report</a></li>-->
                            </ul>
                        </li>
                    
                    ';
            }
            ?>

            <li>
                <a href="#"><i class="fa fa-envelope"></i> <span class="nav-label">Buy</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="product.php">All Product</a></li>
                    <li><a href="wishlist.php">Wishlist</a></li>
                    <li><a href="cart.php">Cart</a></li>
                    <li><a href="buyer_pending_orders.php">Pending Orders</a></li>
                </ul>
            </li>
            <!--<li>
                <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">History</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="history.php">Purchase</a></li>
                    <li><a href="history.php">Sells</a></li>
                </ul>
            </li>
            <li>
                <a href="grid_options.html"><i class="fa fa-laptop"></i> <span class="nav-label">Offer</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="applypromo.php">Buy</a></li>
                    <li><a href="applypromo.php">Sell</a></li>
                </ul>
            </li>-->
            <li>
                <a href="#track-delivery" data-toggle="modal"><i class="fa fa-location-arrow"></i> <span class="nav-label">Track Delivery</span></a>
            </li>
            <li>
                <a href="userprofile.php"><i class="fa fa-laptop"></i> <span class="nav-label">My Profile</span></a>
            </li>
            <?php
                if($_SESSION["userRoleId"] == 3){
                    echo '
                            <li class="">
                                <a href="account.php"><i class="fa fa-database"></i><span class="nav-label">Accounts</span></a>
                            </li>
                        
                        ';
                }

                if($_SESSION["userRoleId"] == 2){
                    echo '
                        <li class="special_link">
                            <a data-toggle="modal" href="#modal-form"><i class="fa fa-database"></i><span class="nav-label">Become a Seller</span></a>
                        </li>
                    
                    ';
                }
            ?>
        </ul>

    </div>
</nav>
<div id="modal-form" class="modal fade" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 b-r"><h3 class="m-t-none m-b">Sign In</h3>

                        <p>Enter your password for activating Seller options.</p>

                        <form role="form" method="post">
                            <div class="form-group"><label>Password</label> <input id="becomeSellerPassword" type="password" placeholder="Your Password" class="form-control" required/></div>
                            <div>
                                <button id="becomeSeller" class="btn btn-sm btn-primary float-right m-t-n-xs" type="submit"><strong>Become a Seller</strong></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="track-delivery" class="modal fade" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row" id="trackDeliveryReport">
                    <div class="col-md-12 b-r"><h3 class="m-t-none m-b">Track your delivery</h3>

                        <p>Enter your Order code for Tracking your delivery.</p>

                        <form role="form" method="post">
                            <div class="form-group"><label>Order Code</label> <input id="trackDeliveryCode" type="text" placeholder="Your Order Code" class="form-control" required/></div>
                            <div>
                                <button id="trackDeliveryButton" class="btn btn-sm btn-primary float-right m-t-n-xs"><strong>Track</strong></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>