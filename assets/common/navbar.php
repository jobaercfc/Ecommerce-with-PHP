<?php
    session_start();
    if(isset($_SESSION["u_id"])){
        $uid = $_SESSION["u_id"];
    }else{
        echo '<script>window.location.href="index.php";</script>';
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
            <li>
                <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Category Management</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="add_new_category.php">Add New Category</a></li>
                    <li><a href="category_list.php">Category List</a></li>
                </ul>
            </li>

            <?php
            if($_SESSION["userRoleId"] == 2){
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
                <a href="#"><i class="fa fa-laptop"></i> <span class="nav-label">Track Delivery</span></a>
            </li>
            <li>
                <a href="profile.php"><i class="fa fa-laptop"></i> <span class="nav-label">My Profile</span></a>
            </li>
            <?php
                if($_SESSION["userRoleId"] == 1){
                    echo '
                        <li class="special_link">
                            <a href="#" id="becomeSeller"><i class="fa fa-database"></i> <span class="nav-label">Become Seller</span></a href="#">
                        </li>
                    
                    ';
                }
            ?>
        </ul>

    </div>
</nav>
