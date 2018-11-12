<!-- HEADER -->
<div id="header" class="header">
    <div class="top-header">
        <div class="container">
            <div class="nav-top-links">
                <a class="first-item" href="#"><img alt="phone" src="assets/mcom/assets/images/phone.png" />+88 01717 821571</a>
                <a href="#"><img alt="email" src="assets/mcom/assets/images/email.png" />Contact us today!</a>
            </div>

            <div class="support-link">
                <a href="#">Services</a>
                <a href="#">Support</a>
            </div>

            <div id="user-info-top" class="user-info pull-right">
                <div class="dropdown">
                    <a class="current-open" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><span>My Account</span></a>
                    <ul class="dropdown-menu mega_dropdown" role="menu">
                        <li><a href="login.php">Login</a></li>
                        <li><a href="registration.php">Registration</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--/.top-header -->
    <!-- MAIN HEADER -->
    <div class="container main-header">
        <div class="row">
            <div class="col-xs-12 col-sm-3 logo">
                <a href="index.php"><img alt="Soft Domain Host" src="assets/mcom/assets/images/logo.png" /></a>
            </div>
            <div class="col-xs-7 col-sm-7 header-search-box">
                <form class="form-inline" action="search.php" method="get">
                    <div class="form-group form-category">
                        <select class="select-category" name="c">
                            <option value="-1">All Categories</option>
                            <?php

                                $sql = "SELECT * from productCategory";
                                $run = $conn->prepare($sql);
                                $run->execute();

                                if($run->rowCount() > 0){
                                    while ($row = $run->fetch(PDO::FETCH_ASSOC)){
                                        echo '<option value="'.$row["id"].'">'.$row["categoryName"].'</option>';
                                    }
                                }

                            ?>
                        </select>
                    </div>
                    <div class="form-group input-serach">
                        <input type="text"  placeholder="Keyword here..." name="key">
                    </div>
                    <button type="submit" class="pull-right btn-search" name="search"></button>
                </form>
            </div>
            <div id="cart-block" class="col-xs-5 col-sm-2 shopping-cart-box">
                <a class="cart-link" href="login.php">
                    <span class="title">Shopping cart</span>
                </a>

            </div>
        </div>

    </div>
    <!-- END MANIN HEADER -->
    <div id="nav-top-menu" class="nav-top-menu">
        <div class="container">
            <div class="row">
                <div class="col-sm-3" id="box-vertical-megamenus">
                    <div class="box-vertical-megamenus">
                        <h4 class="title">
                            <span class="title-menu">Categories</span>
                            <span class="btn-open-mobile pull-right home-page"><i class="fa fa-bars"></i></span>
                        </h4>
                        <div class="vertical-menu-content is-home">
                            <ul class="vertical-menu-list">
                                <?php

                                $sql = "SELECT * from productCategory";
                                $run = $conn->prepare($sql);
                                $run->execute();

                                if($run->rowCount() > 0){
                                    while ($row = $run->fetch(PDO::FETCH_ASSOC)){
                                        echo '<li><a href="show.php?c='.$row["id"].'">'.$row["categoryName"].'</a></li>';
                                    }
                                }

                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="main-menu" class="col-sm-9 main-menu">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <a class="navbar-brand" href="#">MENU</a>
                            </div>
                            <div id="navbar" class="navbar-collapse collapse">
                                <ul class="nav navbar-nav">
                                    <li class="active"><a href="index.php">Home</a></li>
                                    <?php

                                    $sql = "SELECT * from productCategory";
                                    $run = $conn->prepare($sql);
                                    $run->execute();

                                    if($run->rowCount() > 0){
                                        while ($row = $run->fetch(PDO::FETCH_ASSOC)){
                                            echo '<li><a href="show.php?c='.$row["id"].'">'.$row["categoryName"].'</a></li>';
                                        }
                                    }

                                    ?>
                                </ul>
                            </div><!--/.nav-collapse -->
                        </div>
                    </nav>
                </div>
            </div>
            <!-- userinfo on top-->
            <div id="form-search-opntop">
            </div>
            <!-- userinfo on top-->
            <div id="user-info-opntop">
            </div>
            <!-- CART ICON ON MMENU -->
            <div id="shopping-cart-box-ontop">
                <i class="fa fa-shopping-cart"></i>
                <div class="shopping-cart-box-ontop-content"></div>
            </div>
        </div>
    </div>
</div>
<!-- end header -->