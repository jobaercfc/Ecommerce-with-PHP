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
                        <strong>Apply Promo</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div>

        <div class="wrapper wrapper-content animated fadeInRight ecommerce">

            <div class="row">
                <div class="col-lg-4">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Apply Promo codes <small> Enter any promo code to get discounts.</small></h5>

                        </div>
                        <div class="ibox-content">
                            <div class="text-center">
                                <a data-toggle="modal" class="btn btn-primary" href="#modal-form">Apply Promo</a>
                            </div>
                            <div id="modal-form" class="modal fade" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-6 b-r"><h3 class="m-t-none m-b">Enter promo</h3>



                                                    <form role="form">
                                                        <div class="form-group"><label>Promo</label> <input type="text" placeholder="Enter promo" class="form-control"></div>
                                                        <div>
                                                            <button class="btn btn-sm btn-primary float-right m-t-n-xs" type="submit"><strong>Go</strong></button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="col-sm-6">
                                                    <h4>Referral</h4>
                                                    <p>You can refer your friend</p>
                                                    <p class="text-center">
                                                        Your referral code : ecom123
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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