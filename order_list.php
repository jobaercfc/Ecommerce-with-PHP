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
                        <strong>Orders</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div>

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

                            <table class="footable table table-stripped toggle-arrow-tiny tablet breakpoint footable-loaded" data-page-size="15">
                                <thead>
                                <tr>

                                    <th class="footable-visible footable-first-column footable-sortable">Order ID<span class="footable-sort-indicator"></span></th>
                                    <th data-hide="phone" class="footable-visible footable-sortable">Customer<span class="footable-sort-indicator"></span></th>
                                    <th data-hide="phone" class="footable-visible footable-sortable">Amount<span class="footable-sort-indicator"></span></th>
                                    <th data-hide="phone" class="footable-visible footable-sortable">Date added<span class="footable-sort-indicator"></span></th>
                                    <th data-hide="phone,tablet" class="footable-sortable" style="display: none;">Date modified<span class="footable-sort-indicator"></span></th>
                                    <th data-hide="phone" class="footable-visible footable-sortable">Status<span class="footable-sort-indicator"></span></th>
                                    <th class="text-right footable-visible footable-last-column footable-sortable">Action<span class="footable-sort-indicator"></span></th>

                                </tr>
                                </thead>
                                <tbody>

                                <tr class="footable-even" style="">
                                    <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>
                                        3214
                                    </td>
                                    <td class="footable-visible">
                                        Customer example
                                    </td>
                                    <td class="footable-visible">
                                        $500.00
                                    </td>
                                    <td class="footable-visible">
                                        03/04/2015
                                    </td>
                                    <td style="display: none;">
                                        03/05/2015
                                    </td>
                                    <td class="footable-visible">
                                        <span class="label label-primary">Pending</span>
                                    </td>
                                    <td class="text-right footable-visible footable-last-column">
                                        <div class="btn-group">
                                            <button class="btn-white btn btn-xs">View</button>
                                            <button class="btn-white btn btn-xs">Edit</button>
                                            <button class="btn-white btn btn-xs">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="footable-even" style="">
                                    <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>
                                        3214
                                    </td>
                                    <td class="footable-visible">
                                        Customer example
                                    </td>
                                    <td class="footable-visible">
                                        $500.00
                                    </td>
                                    <td class="footable-visible">
                                        03/04/2015
                                    </td>
                                    <td style="display: none;">
                                        03/05/2015
                                    </td>
                                    <td class="footable-visible">
                                        <span class="label label-success">Shipped</span>
                                    </td>
                                    <td class="text-right footable-visible footable-last-column">
                                        <div class="btn-group">
                                            <button class="btn-white btn btn-xs">View</button>
                                            <button class="btn-white btn btn-xs">Edit</button>
                                            <button class="btn-white btn btn-xs">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="footable-even" style="">
                                    <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>
                                        3214
                                    </td>
                                    <td class="footable-visible">
                                        Customer example
                                    </td>
                                    <td class="footable-visible">
                                        $500.00
                                    </td>
                                    <td class="footable-visible">
                                        03/04/2015
                                    </td>
                                    <td style="display: none;">
                                        03/05/2015
                                    </td>
                                    <td class="footable-visible">
                                        <span class="label label-danger">Cancelled</span>
                                    </td>
                                    <td class="text-right footable-visible footable-last-column">
                                        <div class="btn-group">
                                            <button class="btn-white btn btn-xs">View</button>
                                            <button class="btn-white btn btn-xs">Edit</button>
                                            <button class="btn-white btn btn-xs">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="footable-even" style="">
                                    <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>
                                        3214
                                    </td>
                                    <td class="footable-visible">
                                        Customer example
                                    </td>
                                    <td class="footable-visible">
                                        $500.00
                                    </td>
                                    <td class="footable-visible">
                                        03/04/2015
                                    </td>
                                    <td style="display: none;">
                                        03/05/2015
                                    </td>
                                    <td class="footable-visible">
                                        <span class="label label-warning">Expired</span>
                                    </td>
                                    <td class="text-right footable-visible footable-last-column">
                                        <div class="btn-group">
                                            <button class="btn-white btn btn-xs">View</button>
                                            <button class="btn-white btn btn-xs">Edit</button>
                                            <button class="btn-white btn btn-xs">Delete</button>
                                        </div>
                                    </td>
                                </tr>



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