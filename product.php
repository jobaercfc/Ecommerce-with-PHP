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
                        <strong>All products</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div>

        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">

                <?php
                    $sql = "SELECT p.id as pid, p.*, imagePaths.*,productCategory.* FROM ((products as p INNER JOIN imagePaths on (p.imagePathsID = imagePaths.id)) INNER JOIN productCategory on (p.categoryID = productCategory.id))";
                    $run = $conn->prepare($sql);
                    $run->execute();

                    if($run->rowCount() > 0){
                        while ($row = $run->fetch(PDO::FETCH_ASSOC)){
                            $title = $row["productName"];
                            $price = $row["price"];
                            $description = $row["description"];
                            $quantity = $row["inStockQuantity"];
                            $image1 = $row["path1"];
                            $category = $row["categoryName"];
                            $pid = $row["pid"];


                            echo '
                                <div class="col-md-3">
                                    <div class="ibox">
                                        <div class="ibox-content product-box">
                
                                            <div class="product-imitation">
                                                <img width="222" height="200" align="center" src="assets/img/products/'.$image1.'" alt="image" />
                                            </div>
                                            <div class="product-desc">
                                                            <span class="product-price">
                                                                &#2547; '.$price.'
                                                            </span>
                                                <small class="text-muted">'.$category.'</small>
                                                <a href="#" class="product-name"> '.$title.'</a>
                
                
                
                                                
                                                <div class="m-t text-right">
                
                                                    <a href="product_details.php?p='.$pid.'" class="btn btn-xs btn-outline btn-primary">Info<i class="fa fa-long-arrow-right"></i> </a>
                                                </div>
                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            ';
                        }
                    }

                ?>




            </div>




        </div>
        <?php include 'assets/common/footer.php'; ?>

    </div>
</div>



<?php include 'assets/common/inc/addscripts.php';?>





</body>
</html>