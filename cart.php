<?php include "dbconfig.php";?>

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
                        <strong>Cart</strong>
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
                <div class="col-md-9">

                    <div class="ibox">
                        <div class="ibox-title">
                            <?php
                                $sqlCountCart = "SELECT COUNT(id) as totalItem FROM `cartDetails` WHERE userID='$uid'";
                                $runCountCart = $conn->prepare($sqlCountCart);
                                $runCountCart->execute();

                                $row = $runCountCart->fetch(PDO::FETCH_ASSOC);

                                $totalItem = $row["totalItem"];

                                echo '
                                    <span class="float-right">(<strong>'.$totalItem.'</strong>) items</span>
                                    <h5>Items in your cart</h5>
                                ';

                            ?>

                        </div>
                        <div class="ibox-content">
                            <div class="table-responsive">
                                <table class="table shoping-cart-table" id="shopping-cart-table">
                                    <tbody>
                                    <?php

                                        $sql = "SELECT * FROM `cartDetails` INNER JOIN products on (cartDetails.productID = products.id) WHERE userID = '$uid'";
                                        $run = $conn->prepare($sql);
                                        $run->execute();

                                        $totalcheckOut = 0;

                                        $ids = array();



                                        if($run->rowCount() > 0) {
                                            while ($row = $run->fetch(PDO::FETCH_ASSOC)) {
                                                $title = $row["productName"];
                                                $price = $row["price"];
                                                $description = $row["description"];
                                                $stockquantity = $row["inStockQuantity"];
                                                $totalSoldQuantity = $row["totalSoldQuantity"];
                                                //$image1 = $row["path1"];
                                                //$category = $row["categoryName"];
                                                //$authorName = $row["phoneNumber"];
                                                $createdDate = $row["createdDate"];
                                                $pid = $row["productID"];
                                                $totalcheckOut += $price;
                                                array_push($ids,$pid);
                                                echo '
                                                         
                                                    <tr>
                                                        
                                                        <td class="desc">
                                                            <h3>
                                                                <a href="#" class="text-navy">
                                                                    '.$title.'
                                                                </a>
                                                            </h3>
                                                            <p class="small">
                                                                '.$description.'
                                                            </p>
                                                            
                                                            <div class="m-t-sm">
                                                                
                                                                <a href="#" class="text-muted" id="removeFromCart" pid = '.$pid.'><i class="fa fa-trash" style="color: red"></i> Remove item</a href="#">
                                                            </div>
                                                        </td>
                                                        
                                                        <td width="80">
                                                            <input type="number" min="1" max="'.($stockquantity - $totalSoldQuantity).'" class="form-control qty" value="1" onchange="cart()" placeholder="1"/>
                                                        </td>
                                                        
                                                        <td style="width: 150px">
                                                            <input type="text" class="form-control" value="'.$price.'" readonly="readonly">&#2547;/Unit
                                                        </td>
                                                        
                                                    </tr>
                                                                
                                                ';

                                            }
                                        }

                                    ?>

                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <div class="ibox-content">

                            <a href="product.php" class="btn btn-white"><i class="fa fa-arrow-left"></i> Continue shopping</a>

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
                            <h2 class="font-bold" >
                                &#2547; <span id="total-checkout"><?php echo $totalcheckOut;?></span>
                            </h2>

                            <hr>
                            <span class="text-muted small">
                                *Conditions apply
                            </span>
                            <div class="m-t-sm">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-primary btn-sm" id="btn-checkout" idArray = '<?php echo json_encode($ids);?>'><i class="fa fa-shopping-cart"></i> Checkout</a>
                                    <a data-toggle="modal" class="btn btn-danger btn-sm" href="#modal-form">Apply Promo</a>
                                </div>
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