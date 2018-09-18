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
                        <strong>Edit products</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div>

        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>Edit product information</h5>
                            </div>
                            <?php
                                if(isset($_GET["p"])){
                                    $pid = $_GET["p"];
                                }

                                $sql = "SELECT p.id as pid, p.*, imagePaths.*,productCategory.* FROM ((products as p INNER JOIN imagePaths on (p.imagePathsID = imagePaths.id)) INNER JOIN productCategory on (p.categoryID = productCategory.id)) where p.id = '$pid'";

                                $runquery = $conn->prepare($sql);
                                $runquery->execute();

                                if($runquery->rowCount() == 1){
                                    $row = $runquery->fetch(PDO::FETCH_ASSOC);
                                    $title = $row["productName"];
                                    $price = $row["price"];
                                    $description = $row["description"];
                                    $quantity = $row["inStockQuantity"];
                                    $image1 = $row["path1"];
                                    $category = $row["categoryName"];
                                    $pid = $row["pid"];
                                    $dateCreated = $row["createdDate"];
                                    $discount = $row["isDiscountAvailable"];
                                    $parentCategoryID = $row["parentCategoryID"];
                                    $productStatus = $row["status"];
                                    $categoryId = $row["categoryID"];
                                    $imageId = $row["imagePathsID"];
                                }


                                //UPDATE PART
                                if(isset($_POST["edit_product"])){
                                    $updatedtitle = $_POST["product_title"];
                                    $updateddescription = $_POST["product_description"];
                                    $updatedquantity = $_POST["product_quantity"];
                                    $updatedprice = $_POST["product_price"];
                                    $updatedcategory = $_POST["product_category"];
                                    $updatedstatus = $_POST["product_status"];

                                    if($_FILES["fileToUpload"]["name"] != ""){
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

                                        // Check if file already exists
                                        if (file_exists($target_file)) {
                                            echo "Sorry, file already exists.";
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

                                                $sqlimage = "update imagePaths set path1 = '$filename' where id = $imageId";
                                                $runimage = $conn->prepare($sqlimage);
                                                $runimage->execute();

                                            } else {
                                                echo "Sorry, there was an error uploading your file.";
                                            }
                                        }
                                    }

                                    $sqlupdate = "update products set productName = '$updatedtitle', categoryID = '$updatedcategory', price = '$updatedprice', description = '$updateddescription', inStockQuantity = '$updatedquantity', status = '$updatedstatus' where id = $pid";
                                    //echo $sqlupload;
                                    $runupdate = $conn->prepare($sqlupdate);
                                    $runupdate->execute();
                                    $_SESSION["msg"] = "Product Edited Successfully";
                                    echo '<script>window.location.href = "inventory.php";</script>';



                                }
                            ?>
                            <div class="ibox-content">
                                <form method="post" action="" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Product Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="product_title" value="<?php echo $title;?>" required>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Product Description</label>
                                        <div class="col-sm-10">
                                            <input type="textarea" class="form-control" name="product_description" value="<?php echo $description;?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Product Quantity(in Stock)</label>
                                        <div class="col-sm-10">
                                            <input type="number" min="1" class="form-control" name="product_quantity" value="<?php echo $quantity;?>" required>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Price</label>
                                        <div class="col-sm-10">
                                            <input type="number" min="1" class="form-control" name="product_price" value="<?php echo $price;?>" required/>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Select Category</label>
                                        <div class="col-sm-10">
                                            <select class="form-control m-b" name="product_category" required>
                                                <option value="<?php echo $categoryId;?>"><?php echo $category;?></option>
                                                <?php

                                                $sql = "SELECT * from productCategory where id != $categoryId";
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
                                        <label class="col-sm-2 col-form-label">Product Status</label>
                                        <div class="col-sm-10">
                                            <select class="form-control m-b" name="product_status" required>
                                                <?php
                                                    if($productStatus == 1){
                                                        echo '<option value="1">Active</option>';
                                                        echo '<option value="0">Out of Stock</option>';
                                                    }else{
                                                        echo '<option value="0">Out of Stock</option>';
                                                        echo '<option value="1">Active</option>';
                                                    }
                                                ?>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Current Photo</label>
                                        <div class="col-sm-5">

                                            <img src="assets/img/products/<?php echo $image1;?>" height="200px" width="200px">

                                        </div>
                                        <label class="col-sm-2 col-form-label">Change Photo</label>
                                        <div class="col-sm-5">

                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" name="fileToUpload"/>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group row">

                                    </div>
                                    <div class="hr-line-dashed"></div>

                                    <div class="form-group row">
                                        <div class="col-sm-4 col-sm-offset-2">
                                            <button class="btn btn-white btn-sm" type="submit">Cancel</button>
                                            <input class="btn btn-primary btn-sm" type="submit" value="Save changes" name="edit_product">
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