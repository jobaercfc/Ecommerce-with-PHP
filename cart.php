<!DOCTYPE html>
<html>

<head>

    <title>E-Commerce</title>
    <?php include 'assets/common/inc/headinc.php'; ?>

</head>

<body class="">

<div id="wrapper">

    <?php include 'assets/common/navbar.php'; ?>

    <div id="page-wrapper" class="gray-bg">
        <?php include 'assets/common/loginconfig.php';?>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>E-commerce grid</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="dashboard.php">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a>E-commerce</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <strong>Wishlist</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div>

        <div class="wrapper wrapper-content animated fadeInRight ecommerce">


            <div class="row">
                <div class="col-md-9">

                    <div class="ibox">
                        <div class="ibox-title">
                            <span class="float-right">(<strong>5</strong>) items</span>
                            <h5>Items in your cart</h5>
                        </div>
                        <?php
                            for($i = 0; $i < 2; $i++){
                                echo '
                                    <div class="ibox-content">
                                        <div class="table-responsive">
                                            <table class="table shoping-cart-table">
            
                                                <tbody>
                                                <tr>
                                                    <td width="90">
                                                        <div class="cart-product-imitation">
                                                        </div>
                                                    </td>
                                                    <td class="desc">
                                                        <h3>
                                                            <a href="#" class="text-navy">
                                                                Desktop publishing software
                                                            </a>
                                                        </h3>
                                                        <p class="small">
                                                            It is a long established fact that a reader will be distracted by the readable
                                                            content of a page when looking at its layout. The point of using Lorem Ipsum is
                                                        </p>
                                                        <dl class="small m-b-none">
                                                            <dt>Description lists</dt>
                                                            <dd>A description list is perfect for defining terms.</dd>
                                                        </dl>
            
                                                        <div class="m-t-sm">
                                                            <a href="#" class="text-muted"><i class="fa fa-gift"></i> Add gift package</a>
                                                            |
                                                            <a href="#" class="text-muted"><i class="fa fa-trash"></i> Remove item</a>
                                                        </div>
                                                    </td>
            
                                                    <td>
                                                        $180,00
                                                        <s class="small text-muted">$230,00</s>
                                                    </td>
                                                    <td width="65">
                                                        <input type="text" class="form-control" placeholder="1">
                                                    </td>
                                                    <td>
                                                        <h4>
                                                            $180,00
                                                        </h4>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
            
                                    </div>
                                ';
                            }
                        ?>
                        <div class="ibox-content">

                            <button class="btn btn-primary float-right"><i class="fa fa fa-shopping-cart"></i> Checkout</button>
                            <button class="btn btn-white"><i class="fa fa-arrow-left"></i> Continue shopping</button>

                        </div>
                    </div>

                </div>
                <div class="col-md-3">

                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Cart Summary</h5>
                        </div>
                        <div class="ibox-content">
                            <span>
                                Total
                            </span>
                            <h2 class="font-bold">
                                $390,00
                            </h2>

                            <hr>
                            <span class="text-muted small">
                                *Conditions apply
                            </span>
                            <div class="m-t-sm">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-shopping-cart"></i> Checkout</a>
                                    <a href="#" class="btn btn-white btn-sm"> Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Support</h5>
                        </div>
                        <div class="ibox-content text-center">



                            <h3><i class="fa fa-phone"></i> +43 100 783 001</h3>
                            <span class="small">
                                Please contact with us if you have any questions. We are avalible 24h.
                            </span>


                        </div>
                    </div>

                    <div class="ibox">
                        <div class="ibox-content">

                            <p class="font-bold">
                                Other products you may be interested
                            </p>

                            <hr>
                            <div>
                                <a href="#" class="product-name"> Product 1</a>
                                <div class="small m-t-xs">
                                    Many desktop publishing packages and web page editors now.
                                </div>
                                <div class="m-t text-righ">

                                    <a href="#" class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a>
                                </div>
                            </div>
                            <hr>
                            <div>
                                <a href="#" class="product-name"> Product 2</a>
                                <div class="small m-t-xs">
                                    Many desktop publishing packages and web page editors now.
                                </div>
                                <div class="m-t text-righ">

                                    <a href="#" class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>


        </div>
        <?php include 'assets/common/footer.php'; ?>

    </div>
</div>



<?php include 'assets/common/inc/addscripts.php';?>





</body>
</html>