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
                <h2>Your products</h2>
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-content">

                            <table class="footable table table-striped table-bordered table-hover toggle-arrow-tiny tablet breakpoint footable-loaded" data-page-size="15">
                                <thead>
                                <tr>

                                    <th class="footable-visible footable-first-column footable-sortable">Product ID<span class="footable-sort-indicator"></span></th>
                                    <th data-hide="phone" class="footable-visible footable-sortable">Product title<span class="footable-sort-indicator"></span></th>
                                    <th data-hide="phone" class="footable-visible footable-sortable">Brand Name<span class="footable-sort-indicator"></span></th>
                                    <th data-hide="phone" class="footable-visible footable-sortable">Category<span class="footable-sort-indicator"></span></th>
                                    <th data-hide="phone" class="footable-visible footable-sortable">Price per unit<span class="footable-sort-indicator"></span></th>
                                    <th data-hide="phone" class="footable-visible footable-sortable">Quantity(in Stock)<span class="footable-sort-indicator"></span></th>
                                    <th data-hide="phone" class="footable-visible footable-sortable">Quantity(sold)<span class="footable-sort-indicator"></span></th>
                                    <th data-hide="phone" class="footable-visible footable-sortable">Discount<span class="footable-sort-indicator"></span></th>
                                    <th data-hide="phone" class="footable-visible footable-sortable">Product Status<span class="footable-sort-indicator"></span></th>
                                    <th data-hide="phone,tablet" class="footable-visible footable-sortable">Date created<span class="footable-sort-indicator"></span></th>
                                    <th class="text-right footable-visible footable-last-column footable-sortable">Action<span class="footable-sort-indicator"></span></th>

                                </tr>
                                </thead>
                                <tbody>

                                <?php

                                $sql = "SELECT p.id as pid, p.*, imagePaths.*,productCategory.*,users.id as uid FROM ((products as p INNER JOIN imagePaths on (p.imagePathsID = imagePaths.id)) INNER JOIN productCategory on (p.categoryID = productCategory.id)) inner join users on (p.createdBy = users.id) where users.id = '$uid'";
                                $run = $conn->prepare($sql);
                                $run->execute();

                                if($run->rowCount() > 0) {
                                    while ($row = $run->fetch(PDO::FETCH_ASSOC)) {
                                        $title = $row["productName"];
                                        $price = $row["price"];
                                        $description = $row["description"];
                                        $stockquantity = $row["inStockQuantity"];
                                        $totalSoldQuantity = $row["totalSoldQuantity"];
                                        $image1 = $row["path1"];
                                        $category = $row["categoryName"];
                                        $pid = $row["pid"];
                                        $dateCreated = $row["createdDate"];
                                        $discount = $row["isDiscountAvailable"];
                                        $parentCategoryID = $row["parentCategoryID"];
                                        $productStatus = $row["status"];

                                        if($discount == 1){
                                            $discount = "Available";
                                        }else{
                                            $discount = "N/A";
                                        }

                                        if($productStatus == 1){
                                            $productStatus = '<label class="label label-primary">Active</label>';
                                        }else{
                                            $productStatus = '<label class="label label-danger">Out of stock</label>';
                                        }


                                        echo '
                                            <tr class="footable-even" style="">
                                                <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>
                                                    '.$pid.'
                                                </td>
                                                <td class="footable-visible">
                                                    '.$title.'
                                                </td>
                                                <td class="footable-visible">
                                                    Brand
                                                </td>
                                                <td class="footable-visible">
                                                    '.$category.'
                                                </td>
                                                
                                                <td class="footable-visible">
                                                    '.$price.'
                                                </td>
                                                <td class="footable-visible">
                                                    '.$stockquantity.'
                                                </td>
                                                <td class="footable-visible">
                                                    '.$totalSoldQuantity.'
                                                </td>
                                                <td class="footable-visible">
                                                    '.$discount.'
                                                </td>
                                                <td class="footable-visible">
                                                    '.$productStatus.'
                                                </td>
                                                <td class="footable-visible">
                                                    '.$dateCreated.'
                                                </td>
                                                <td class="text-right footable-visible footable-last-column">
                                                    <div class="btn-group">
                                                        <a href="product_details.php?p='.$pid.'" class="btn-white btn btn-xs">View</a>
                                                        <a href="editproduct.php?p='.$pid.'" class="btn-white btn btn-xs">Edit</a>
                                                        <button class="btn-reddit btn btn-xs">Delete</button>
                                                    </div>
                                                </td>
                                            </tr>
                                        ';
                                    }
                                }else{
                                    echo '<tr> <h1>You don\'t have any products to show</h1></tr>';
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