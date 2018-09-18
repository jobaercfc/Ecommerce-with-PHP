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
                        <a href="index.html">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a>E-commerce</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <strong>Add products</strong>
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

        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>Add products <small> Give required informations to reach your customer</small></h5>
                            </div>
                            <?php
                                if(isset($_POST["upload_product"])){
                                    $title = $_POST["product_title"];
                                    $description = $_POST["product_description"];
                                    $quantity = $_POST["product_quantity"];
                                    $price = $_POST["product_price"];
                                    $category = $_POST["product_category"];

                                    $target_dir = "assets/img/products/";
                                    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                                    $uploadOk = 1;
                                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                                    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                                    if($check !== false) {
                                        //echo "File is an image - " . $check["mime"] . ".";
                                        $uploadOk = 1;
                                    } else {
                                        //echo "File is not an image.";
                                        $uploadOk = 0;
                                    }


                                    // Check file size
                                    if ($_FILES["fileToUpload"]["size"] > 500000) {
                                        echo "Sorry, your file is too large.";
                                        $uploadOk = 0;
                                    }
                                    // Allow certain file formats
                                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                                        && $imageFileType != "gif" ) {
                                        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                                        $uploadOk = 0;
                                    }
                                    // Check if $uploadOk is set to 0 by an error
                                    if ($uploadOk == 0) {
                                        echo "Sorry, your file was not uploaded.";
                                    // if everything is ok, try to upload file
                                    } else {
                                        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                                            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                                            $filename = basename( $_FILES["fileToUpload"]["name"]);

                                            $sqlimage = "insert into imagePaths(path1) values ('$filename')";
                                            $runimage = $conn->prepare($sqlimage);
                                            $runimage->execute();

                                            $imageId = $conn->lastInsertId();

                                            date_default_timezone_set("Asia/Dhaka");
                                            $uploadDate = date("Y-m-d h:i:sa");



                                            $sqlupload = "insert into products(productName, categoryID, price, imagePathsID, description, createdBy, inStockQuantity, totalSoldQuantity, createdDate, isDiscountAvailable, status) values ('$title', '$category','$price','$imageId','$description','$uid','$quantity',0,'$uploadDate',0,1)";
                                            //echo $sqlupload;
                                            $runupload = $conn->prepare($sqlupload);
                                            $runupload->execute();
                                           // echo '<script>alert("Product uploaded Successfully");</script>';
                                            $_SESSION["msg"] = "Product uploaded Successfully";
                                            echo '<script>window.location.href="inventory.php";</script>';

                                        } else {
                                            echo "Sorry, there was an error uploading your file.";
                                        }
                                    }


                                }

                            ?>
                            <div class="ibox-content">
                                <form method="post" action="" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Product Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="product_title" required>
                                            <span class="form-text m-b-none">Write a suitable title for your product</span>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Product Description</label>
                                        <div class="col-sm-10">
                                            <input type="textarea" class="form-control" name="product_description" required>
                                            <span class="form-text m-b-none">Write a suitable description for your product</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Product Quantity</label>
                                        <div class="col-sm-10">
                                            <input type="number" min="1" class="form-control" name="product_quantity" required>
                                            <span class="form-text m-b-none">Give quantity for your product</span>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Price</label>
                                        <div class="col-sm-10">
                                            <input type="number" min="1" class="form-control" name="product_price" required/>
                                            <span class="form-text m-b-none">Write a suitable price for your product</span>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Select Category</label>
                                        <div class="col-sm-10">
                                            <select class="form-control m-b" name="product_category" required>
                                                <option value="-1">Select Category</option>
                                                <?php

                                                    $sql = "SELECT * from productCategory";
                                                    $run = $conn->prepare($sql);
                                                    $run->execute();

                                                    if($run->rowCount() > 0){
                                                        while ($row = $run->fetch(PDO::FETCH_ASSOC)){
                                                            echo '<option value="'.$row["id"].'">'.$row["categoryName"].'</option>';
                                                        }
                                                    }

                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Upload Photo</label>
                                        <div class="col-sm-10 ">

                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" name="fileToUpload" required/>
                                                <span class="form-text m-b-none">Write a suitable image for your product</span>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>

                                    <div class="form-group row">
                                        <div class="col-sm-4 col-sm-offset-2">
                                            <button class="btn btn-white btn-sm" type="submit">Cancel</button>
                                            <input class="btn btn-primary btn-sm" type="submit" value="Upload" name="upload_product">
                                        </div>
                                    </div>
                                </form>
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