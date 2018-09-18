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

                    <?php
                    $sql = "SELECT p.id as pid, p.*, imagePaths.*,productCategory.*, users.*,contactDetails.* FROM (((products as p INNER JOIN imagePaths on (p.imagePathsID = imagePaths.id)) INNER JOIN productCategory on (p.categoryID = productCategory.id) inner join users on (p.createdBy = users.id)) inner join contactDetails on (users.contactdetailsid = contactDetails.id)) where p.id = '$pid'";
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
                            $authorName = $row["name"];
                            $createdDate = $row["createdDate"];
                            $authorNumber = $row["phoneNumber"];

                            echo '
                                <div class="ibox product-detail">
                                    <div class="ibox-content">
            
                                        <div class="row">
                                            <div class="col-md-5">
            
            
                                                <div class="product-images slick-initialized slick-slider" role="toolbar">
                                                    <img src="assets/img/products/' . $image1 . '" width="328" height="267" align="center" alt="'.$title.'">
                                                </div>
            
                                            </div>
                                            <div class="col-md-7">
            
                                                <h2 class="font-bold m-b-xs">
                                                    ' . $title . '
                                                </h2>
                                                <hr>
                                                <div>
                                                    <button class="btn btn-primary btn-sm float-right" id="addtocart" pid='.$pid.'><i class="fa fa-cart-plus"></i> Add to cart</button>
                                                    <h1 class="product-main-price"> &#2547; ' . $price . ' <small class="text-muted">Including VAT</small> </h1>
                                                </div>
                                                <hr>
                                                <div>
                                                    <p class="stock-available float-right">Available stock : <span class="stock-details">'.($stockquantity - $totalSoldQuantity).' in stock</span></p>
                                                    <h4>No rating for this product</h4>
                                                </div>
                                                <hr>
                                                <h4>Product description</h4>
            
                                                <div class="small text-muted">
                                                    ' . $description . '
                                                </div>
                                                <dl class="row m-t-md small description-products">
                                                    <dt class="col-md-4 text-right">Shipping : </dt>
                                                    <dd class="col-md-8"><b>Free</b></dd>
                                                    <dt class="col-md-4 text-right">Delivery : </dt>
                                                    <dd class="col-md-8">Varies for items</dd>
                                                    <dt class="col-md-4 text-right">Author Name : </dt>
                                                    <dd class="col-md-8">'.$authorName.'</dd>
                                                    <dt class="col-md-4 text-right">Author rating : </dt>
                                                    <dd class="col-md-8"><span class="pie">4/5</span></dd>
                                                    <dt class="col-md-4 text-right">Product Uploaded: </dt>
                                                    <dd class="col-md-8"><i class="fa fa-clock-o"></i> '.$createdDate.'</dd>
                                                </dl>
                                                <div class="text-right">
                                                    <div class="btn-group">
                                                        <button class="btn btn-white btn-sm" id="addtowishlist" pid='.$pid.'><i class="fa fa-star"></i> Add to wishlist </button>
                                                        <a href="call: +88'.$authorNumber.'" class="btn btn-white btn-sm"><i class="fa fa-envelope"></i> Contact with author </a>
                                                    </div>
                                                </div>
            
            
                                            </div>
                                        </div>
            
                                    </div>
                                    <div class="ibox-footer">
                                        <span class="float-right">
                                            <i class="fa fa-clock-o"></i> 14.04.2016 10:04 pm
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