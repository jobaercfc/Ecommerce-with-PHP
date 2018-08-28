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
                        <strong>Inventory</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div>

        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-content">

                            <table class="footable table table-stripped toggle-arrow-tiny tablet breakpoint footable-loaded" data-page-size="15">
                                <thead>
                                <tr>

                                    <th data-toggle="true" class="footable-visible footable-first-column footable-sortable">Product Name<span class="footable-sort-indicator"></span></th>
                                    <th data-hide="phone" class="footable-visible footable-sortable">Model<span class="footable-sort-indicator"></span></th>
                                    <th data-hide="all" class="footable-sortable" style="display: none;">Description<span class="footable-sort-indicator"></span></th>
                                    <th data-hide="phone" class="footable-visible footable-sortable">Price<span class="footable-sort-indicator"></span></th>
                                    <th data-hide="phone,tablet" class="footable-sortable" style="display: none;">Quantity<span class="footable-sort-indicator"></span></th>
                                    <th data-hide="phone" class="footable-visible footable-sortable">Status<span class="footable-sort-indicator"></span></th>
                                    <th class="text-right footable-visible footable-last-column" data-sort-ignore="true">Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr class="footable-even" style="">
                                    <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>
                                        Example product 1
                                    </td>
                                    <td class="footable-visible">
                                        Model 1
                                    </td>
                                    <td style="display: none;">
                                        It is a long established fact that a reader will be distracted by the readable
                                        content of a page when looking at its layout. The point of using Lorem Ipsum is
                                        that it has a more-or-less normal distribution of letters, as opposed to using
                                        'Content here, content here', making it look like readable English.
                                    </td>
                                    <td class="footable-visible">
                                        $50.00
                                    </td>
                                    <td style="display: none;">
                                        1000
                                    </td>
                                    <td class="footable-visible">
                                        <span class="label label-primary">Active</span>
                                    </td>
                                    <td class="text-right footable-visible footable-last-column">
                                        <div class="btn-group">
                                            <button class="btn-white btn btn-xs">View</button>
                                            <button class="btn-white btn btn-xs">Edit</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="footable-odd" style="">
                                    <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>
                                        Example product 2
                                    </td>
                                    <td class="footable-visible">
                                        Model 2
                                    </td>
                                    <td style="display: none;">
                                        It is a long established fact that a reader will be distracted by the readable
                                        content of a page when looking at its layout. The point of using Lorem Ipsum is
                                        that it has a more-or-less normal distribution of letters, as opposed to using
                                        'Content here, content here', making it look like readable English.
                                    </td>
                                    <td class="footable-visible">
                                        $40.00
                                    </td>
                                    <td style="display: none;">
                                        4300
                                    </td>
                                    <td class="footable-visible">
                                        <span class="label label-danger">Out of stock</span>
                                    </td>
                                    <td class="text-right footable-visible footable-last-column">
                                        <div class="btn-group">
                                            <button class="btn-white btn btn-xs">View</button>
                                            <button class="btn-white btn btn-xs">Edit</button>
                                        </div>
                                    </td>
                                </tr>



                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="6" class="footable-visible">
                                        <ul class="pagination float-right"><li class="footable-page-arrow disabled"><a data-page="first" href="#first">«</a></li><li class="footable-page-arrow disabled"><a data-page="prev" href="#prev">‹</a></li><li class="footable-page active"><a data-page="0" href="#">1</a></li><li class="footable-page"><a data-page="1" href="#">2</a></li><li class="footable-page-arrow"><a data-page="next" href="#next">›</a></li><li class="footable-page-arrow"><a data-page="last" href="#last">»</a></li></ul>
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