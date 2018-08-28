<?php
include "dbconfig.php";
$pid = $_GET["p"];
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
                        <strong>Product Details</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div>

        <div class="wrapper wrapper-content animated fadeInRight ecommerce">


            <div class="row">
                <div class="col-lg-12">

                    <?php
                    $sql = "SELECT p.id as pid, p.*, imagePaths.*,productCategory.* FROM ((products as p INNER JOIN imagePaths on (p.imagePathsID = imagePaths.id)) INNER JOIN productCategory on (p.categoryID = productCategory.id)) where p.id = '$pid'";
                    $run = $conn->prepare($sql);
                    $run->execute();

                    if($run->rowCount() > 0) {
                        while ($row = $run->fetch(PDO::FETCH_ASSOC)) {
                            $title = $row["productName"];
                            $price = $row["price"];
                            $description = $row["description"];
                            $quantity = $row["inStockQuantity"];
                            $image1 = $row["path1"];
                            $category = $row["categoryName"];

                            echo ' <div class="ibox product-detail">
                                    <div class="ibox-content">
                    
                                        <div class="row">
                                            <div class="col-md-5">
                                                <img src="assets/img/products/' . $image1 . '" width="400" height="267" >
                    
                    
                    
                                            </div>
                                            <div class="col-md-7">
                    
                                                <h2 class="font-bold m-b-xs">
                                                    ' . $title . '
                                                </h2>
                                                
                                                <div class="m-t-md">
                                                    <h2 class="product-main-price"> BDT ' . $price . ' <small class="text-muted">Including VAT</small> </h2>
                                                </div>
                                                <hr>
                    
                                                <h4>Product description</h4>
                    
                                                <div class="small text-muted">
                                                    ' . $description . '
                                                </div>
                                                
                                                <hr>
                    
                                                <div>
                                                    <div class="btn-group">
                                                        <button class="btn btn-primary btn-sm"><i class="fa fa-cart-plus"></i> Add to cart</button>
                                                        <button class="btn btn-white btn-sm" id="addtowishlist"><i class="fa fa-star"></i> Add to wishlist </button>
                                                        <button class="btn btn-white btn-sm"><i class="fa fa-envelope"></i> Contact with author </button>
                                                    </div>
                                                </div>
                    
                    
                    
                                            </div>
                                        </div>
                    
                                    </div>
                                    <div class="ibox-footer">
                                                <span class="float-right">
                                                    Full stock - ' . $quantity . '<i class="fa fa-clock-o"></i> 14.04.2016 10:04 pm
                                                </span>
                                    </div>
                                </div>
                            
                            ';
                        }
                    }
                    ?>

                </div>
            </div>


        </div>
        <?php include 'assets/common/footer.php'; ?>

    </div>
</div>



<?php include 'assets/common/inc/addscripts.php';?>





</body>
</html>