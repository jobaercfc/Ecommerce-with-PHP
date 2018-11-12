<?php
/**
 * Created by PhpStorm.
 * User: surid
 * Date: 9/1/18
 * Time: 2:43 AM
 */
session_start();
if(isset($_SESSION["u_id"])){
    $uid = $_SESSION["u_id"];
}else{
    echo '<script>window.location.href="index.php";</script>';
}
include "dbconfig.php";

if (isset($_GET["addtowishlist"])){
    if($_GET["addtowishlist"] == 1){
        $productId = $_GET["pid"];
        $userId = $_SESSION["u_id"];

        $checkwishlist = "select * from wishlists where productID = '$productId' and userID = '$userId'";
        $run = $conn->prepare($checkwishlist);
        $run->execute();

        if($run->rowCount() == 0){
            $sqladdtowishlist = "insert into wishlists(productID, userID) values('$productId', '$userId')";
            $runwishlist = $conn->prepare($sqladdtowishlist);
            $runwishlist->execute();

            $_SESSION["msg"] = "Product added to your wishlist";
        }else{
            $_SESSION["msg"] = "Product already exists in your wishlist";
        }


    }
}

if (isset($_GET["addtocart"])){
    if($_GET["addtocart"] == 1){
        $productId = $_GET["pid"];
        $userId = $_SESSION["u_id"];

        $checkcart = "select * from cartDetails where productID = '$productId' and userID = '$userId'";
        $run = $conn->prepare($checkcart);
        $run->execute();

        if($run->rowCount() == 0){
            $sqladdtocart = "insert into cartDetails(productID, userID) values('$productId', '$userId')";
            $runcart = $conn->prepare($sqladdtocart);
            $runcart->execute();

            $_SESSION["msg"] = "Product added to your cart";
        }else{
            $_SESSION["msg"] = "Product already exists in your cart";
        }


    }
}

//OrderSendToDelivery
if (isset($_GET["orderDelivery"])){
    if($_GET["orderDelivery"] == 1){
        $orderId = $_GET["oid"];
        $userId = $_SESSION["u_id"];

        $checkOrder = "update orders inner join products on (orders.productId = products.id) set orders.status = 1 where orders.id = '$orderId' and products.createdBy = '$userId'";
        $run = $conn->prepare($checkOrder);
        $run->execute();


        $_SESSION["msg"] = "Order is now on Delivery";

    }
}

//DeleteOrder
if (isset($_GET["orderDelete"])){
    if($_GET["orderDelete"] == 1){
        $orderId = $_GET["oid"];
        $userId = $_SESSION["u_id"];

        $checkOrder = "delete from orders where id = '$orderId'";
        $run = $conn->prepare($checkOrder);
        $run->execute();


        $_SESSION["msg"] = "Order cancelled";

    }
}

//removefromwishlist
if (isset($_GET["removefromwishlist"])){
    if($_GET["removefromwishlist"] == 1){
        $productId = $_GET["pid"];
        $userId = $_SESSION["u_id"];

        $checkwishlist = "select * from wishlists where productID = '$productId' and userID = '$userId'";
        $run = $conn->prepare($checkwishlist);
        $run->execute();

        if($run->rowCount() != 0){
            $sqlremovefromwishlist = "delete from wishlists where productID = '$productId' and userID = '$userId'";
            $runwishlist = $conn->prepare($sqlremovefromwishlist);
            $runwishlist->execute();

            $_SESSION["msg"] = "Product removed from your wishlist";
        }else{
            $_SESSION["msg"] = "Product doesn't exist in your wishlist";
        }


    }
}

//removefromcart
if (isset($_GET["removefromcart"])){
    if($_GET["removefromcart"] == 1){
        $productId = $_GET["pid"];
        $userId = $_SESSION["u_id"];

        $checkcart = "select * from cartDetails where productID = '$productId' and userID = '$userId'";
        $run = $conn->prepare($checkcart);
        $run->execute();

        if($run->rowCount() != 0){
            $sqlremovefromcart = "delete from cartDetails where productID = '$productId' and userID = '$userId'";
            $runcart = $conn->prepare($sqlremovefromcart);
            $runcart->execute();

            $_SESSION["msg"] = "Product removed from your cart";
        }else{
            $_SESSION["msg"] = "Product doesn't exist in your cart";
        }


    }
}

//removefromCategory
if (isset($_GET["removefromcategory"])){
    if($_GET["removefromcategory"] == 1){
        $categoryId = $_GET["cid"];

        $checkcategory = "select * from productCategory where id = '$categoryId'";
        $run = $conn->prepare($checkcategory);
        $run->execute();

        if($run->rowCount() != 0){
            $sqlremovefromcategory = "delete from productCategory where id = '$categoryId'";
            $runcategory = $conn->prepare($sqlremovefromcategory);
            $runcategory->execute();

            echo "Category removed";
        }else{
            echo "Category doesn't exist.";
        }


    }
}

//checkout
if (isset($_GET["checkout"])){
    if($_GET["checkout"] == 1){
        $ids = $_GET["ids"];
        $quantityArrays = $_GET["quantityArray"];
        $prices = $_GET["priceArray"];
        $sqlGetOrderCode = "select orderCode from orders order by orderCode desc limit 1";
        $getOrderCode = $conn->prepare($sqlGetOrderCode);
        $getOrderCode->execute();
        if($getOrderCode->rowCount() == 1){
            $row = $getOrderCode->fetch(PDO::FETCH_ASSOC);

            $orderCode = $row["orderCode"] + 1;
        }else{
            $orderCode = "1200";
        }
        for($i = 0; $i < sizeof($ids); $i++){
            $price = $quantityArrays[$i] * $prices[$i];

            $sql = "insert into orders (userId, productId, quantity, status, orderCode,price) values('$uid', '$ids[$i]', '$quantityArrays[$i]', 0, '$orderCode', '$price')";
            $runCheckout = $conn->prepare($sql);
            $runCheckout->execute();

            $sqlremovefromcart = "delete from cartDetails where productID = '$ids[$i]' and userID = '$uid'";
            $runcart = $conn->prepare($sqlremovefromcart);
            $runcart->execute();

            $sqlGetSoldQuantity = "select * from products where id = '$ids[$i]'";
            $runGetSoldQuantity = $conn->prepare($sqlGetSoldQuantity);
            $runGetSoldQuantity->execute();
            if($runGetSoldQuantity->rowCount() == 1){
                $row = $runGetSoldQuantity->fetch(PDO::FETCH_ASSOC);
                $currentSoldQuantity = $row["totalSoldQuantity"];
                $newSoldQuantity = $currentSoldQuantity+$quantityArrays[$i];

                $updateSoldQuantity = "Update products set totalSoldQuantity = '$newSoldQuantity' where id='$ids[$i]'";
                $runUpdateSoldQuantity = $conn->prepare($updateSoldQuantity);
                $runUpdateSoldQuantity->execute();
            }

        }
        $_SESSION["msg"] = "Order Placed";
    }
}

//Convert to Seller
if(isset($_GET["becomeSeller"])){
    if($_GET["becomeSeller"] == 1){
        $sql = "SELECT * FROM users where id = '$uid'";
        $run = $conn->prepare($sql);
        $run->execute();

        if($run->rowCount() == 1) {
            $row = $run->fetch(PDO::FETCH_ASSOC);
            $matchPass = $row["password"];

            $givenPass = $_GET["password"];

            if($matchPass == $givenPass){
                $sql = "SELECT default_rate FROM `merchant_comission` GROUP BY default_rate";
                $run = $conn->prepare($sql);
                $run->execute();

                if($run->rowCount() == 1){
                    $row = $run->fetch(PDO::FETCH_ASSOC);
                    $default = $row["default_rate"];
                }

                $sql = "update merchant_comission set default_rate = '$default'";
                $run = $conn->prepare($sql);
                $run->execute();


                $sql = "update users set userRoleID = '1' where id = '$uid'";
                $run = $conn->prepare($sql);
                $run->execute();

                $_SESSION["userRoleId"] = 1;

                $_SESSION["msg"] = "You are successfully registered as a Seller";
            }else{
                $_SESSION["msg"] = "Wrong credentials. Please try again.";
            }
        }


    }
}

//Track Delivery
if(isset($_GET["trackDelivery"])){
    if($_GET["trackDelivery"] == 1){
        $code = $_GET["code"];
        $sql = "SELECT * FROM orders where orderCode = '$code' group by orderCode";
        $run = $conn->prepare($sql);
        $run->execute();

        if($run->rowCount() == 1) {
            $row = $run->fetch(PDO::FETCH_ASSOC);
            $status = $row["status"];

            if($status == 0){
                echo '<h3 style="color: red">Your order is not <strong>shipped yet</strong>.</h3>';
            }else{
                echo '<h3 style="color: green">Your order is sent for <strong>delivery</strong>. You will get it soon.</h3>';
            }
        }


    }
}
if(isset($_GET["cartWithoutLogin"])){
    if($_GET["cartWithoutLogin"] == 1){
        $_SESSION["cartproductwithoutlogin"] = $_GET["productId"];
    }
}

//Update Merchant default Commission
if(isset($_POST["update_rate"])){
    if($_POST["update_rate"] == 1){
        $rate = $_POST["rate"];

        if($rate != ""){
            $sql = "update merchant_comission set default_rate = '$rate'";
            $run = $conn->prepare($sql);
            $run->execute();
        }else{
            echo "Rate can't be null";
        }
    }
}

