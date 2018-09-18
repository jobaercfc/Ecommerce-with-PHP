<?php
include "dbconfig.php";
?>
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
                        <strong>Pending orders</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div>

        <?php
        if(isset($_SESSION["msg"])){
            echo '
                    <script>
                         setTimeout(function () {
                            $(\'#feedback\').fadeOut(4000);
                         }, 5000);
                    </script>
                ';
            echo '
                <div id="feedback">
                    <div class="alert alert-success">';
            echo $_SESSION["msg"];
            unset($_SESSION["msg"]);
            echo '
                    </div>
                </div>
                ';
        }

        ?>

        <div class="wrapper wrapper-content animated fadeInRight ecommerce">


            <div class="ibox-content m-b-sm border-bottom">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="col-form-label" for="order_id">Order ID</label>
                            <input type="text" id="order_id" name="order_id" value="" placeholder="Order ID" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="col-form-label" for="status">Order status</label>
                            <input type="text" id="status" name="status" value="" placeholder="Status" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="col-form-label" for="customer">Customer</label>
                            <input type="text" id="customer" name="customer" value="" placeholder="Customer" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="col-form-label" for="date_added">Date added</label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="date_added" type="text" class="form-control" value="03/04/2014">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="col-form-label" for="date_modified">Date modified</label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="date_modified" type="text" class="form-control" value="03/06/2014">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="col-form-label" for="amount">Amount</label>
                            <input type="text" id="amount" name="amount" value="" placeholder="Amount" class="form-control">
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-content">

                            <table class="footable table table-striped table-bordered table-hover toggle-arrow-tiny tablet breakpoint footable-loaded" data-page-size="15">
                                <thead>
                                <tr>

                                    <th class="footable-visible footable-first-column footable-sortable">Order ID<span class="footable-sort-indicator"></span></th>
                                    <th class="footable-visible footable-first-column footable-sortable">Order Code<span class="footable-sort-indicator"></span></th>
                                    <th data-hide="phone" class="footable-visible footable-sortable">Product title<span class="footable-sort-indicator"></span></th>
                                    <th data-hide="phone" class="footable-visible footable-sortable">Price per unit<span class="footable-sort-indicator"></span></th>
                                    <th data-hide="phone" class="footable-visible footable-sortable">Order Quantity<span class="footable-sort-indicator"></span></th>
                                    <th data-hide="phone" class="footable-visible footable-sortable">Order Status<span class="footable-sort-indicator"></span></th>
                                    <th data-hide="phone" class="footable-visible footable-sortable">Redeemed Code<span class="footable-sort-indicator"></span></th>

                                </tr>
                                </thead>
                                <tbody>

                                <?php

                                $sql = "SELECT o.id as oid, o.status as orderstatus, o.*,p.* FROM (orders as o INNER JOIN products as p ON (o.productId = p.id)) where o.userId = '$uid'";
                                $run = $conn->prepare($sql);
                                $run->execute();

                                if($run->rowCount() > 0) {
                                    while ($row = $run->fetch(PDO::FETCH_ASSOC)) {
                                        $title = $row["productName"];
                                        $price = $row["price"];
                                        //$description = $row["description"];
                                        $orderquantity = $row["quantity"];
                                        //$totalSoldQuantity = $row["totalSoldQuantity"];
                                        //$image1 = $row["path1"];
                                        //$category = $row["categoryName"];
                                        $orderID = $row["oid"];
                                        //$dateCreated = $row["createdDate"];
                                        $discount = $row["isDiscountAvailable"];
                                        //$parentCategoryID = $row["parentCategoryID"];
                                        $orderStatus = $row["orderstatus"];
                                        $orderCode = $row["orderCode"];

                                        if($discount == 1){
                                            $discount = "Available";
                                        }else{
                                            $discount = "N/A";
                                        }

                                        if($orderStatus == 1){
                                            $orderStatus = '<label class="label label-primary">On Delivery</label>';
                                        }else{
                                            $orderStatus = '<label class="label label-danger">Pending</label>';
                                        }


                                        echo '
                                            <tr class="footable-even" style="">
                                                <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>
                                                    '.$orderID.'
                                                </td>
                                                
                                                <td class="footable-visible">
                                                    '.$orderCode.'
                                                </td>
                                                
                                                <td class="footable-visible">
                                                    '.$title.'
                                                </td>
                                                
                                                
                                                <td class="footable-visible">
                                                    '.$price.'
                                                </td>
                                                <td class="footable-visible">
                                                    '.$orderquantity.'
                                                </td>
                                                <td class="footable-visible">
                                                    '.$orderStatus.'
                                                </td>
                                                
                                                <td class="footable-visible">
                                                    '.$discount.'
                                                </td>
                                                
                                                
                                            </tr>
                                        ';
                                    }
                                }else{
                                    echo '<tr> <h1>You don\'t have any orders to show</h1></tr>';
                                }



                                ?>



                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="7" class="footable-visible">
                                        <ul class="pagination float-right"><li class="footable-page-arrow disabled"><a data-page="first" href="#first">«</a></li><li class="footable-page-arrow disabled"><a data-page="prev" href="#prev">‹</a></li><li class="footable-page active"><a data-page="0" href="#">1</a></li><li class="footable-page"><a data-page="1" href="#">2</a></li><li class="footable-page"><a data-page="2" href="#">3</a></li><li class="footable-page-arrow"><a data-page="next" href="#next">›</a></li><li class="footable-page-arrow"><a data-page="last" href="#last">»</a></li></ul>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>

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