<?php include "dbconfig.php"; ?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add New Category</title>

    <?php include "assets/common/inc/headinc.php"; ?>

</head>

<body class="">

<div id="wrapper">

    <?php include 'assets/common/navbar.php'; ?>

    <div id="page-wrapper" class="gray-bg">
        <?php include 'assets/common/loginconfig.php';?>

        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-sm-12">
                <h2>Add New Product Category</h2>
            </div>
        </div>

        <div class="wrapper wrapper-content animated fadeInRightBig">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Enter New Category Details </h5>
                        </div>
                        <?php
                        if(isset($_GET["c"])) {
                            $categoryId = $_GET["c"];
                            $sqlcat = "select * from productCategory where id='$categoryId'";
                            $runcat = $conn->prepare($sqlcat);
                            $runcat->execute();

                            if ($runcat->rowCount() == 1){
                                $row = $runcat->fetch(PDO::FETCH_ASSOC);
                                $categoryName = $row["categoryName"];
                                $parentCategoryId = $row["parentCategoryID"];
                            }
                        }else{
                            echo '<script>window.location.href="category_list.php"</script>';
                        }
                        ?>
                        <?php
                        $errorss = array();
                        if(isset($_POST["edit_category"])){
                            $category = $_POST["category_title"];

                            $namecheck =  "/^[a-zA-Z ]+$/";

                            if(!preg_match($namecheck, $category)){
                                array_push($errorss, "Only letters and white space are allowed in category title");
                            }
                            $parent_category = $_POST["parent_category"];

                            if(empty($errorss)){
                                if($parent_category != -1){
                                    $sqlCategory = "update productCategory set categoryName='$category', parentCategoryID = '$parent_category' where id='$categoryId'";
                                    $runCategory = $conn->prepare($sqlCategory);
                                    $runCategory->execute();
                                    $_SESSION["msg"] = "Category Updated.";
                                    echo '<script>window.location.href="category_list.php"</script>';
                                }else{
                                    $sqlCategory = "update productCategory set categoryName='$category' where id='$categoryId'";
                                    $runCategory = $conn->prepare($sqlCategory);
                                    $runCategory->execute();
                                    $_SESSION["msg"] = "Category Updated.";
                                    echo '<script>window.location.href="category_list.php"</script>';
                                }

                            }else{
                                include "errors.php";
                            }


                        }

                        ?>
                        <div class="ibox-content">
                            <form method="post" class="form-horizontal" action="">
                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <label class="col-sm-2 control-label">Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="category_title" name="category_title" value="<?php echo $categoryName;?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="col-sm-2 control-label">Parent Category</label>
                                        <div class="col-sm-10">
                                            <select class="form-control m-b" id="parent_category" name="parent_category">
                                                <?php

                                                if($parentCategoryId != ""){
                                                    $sql = "SELECT * from productCategory where id='$parentCategoryId' and id != '$categoryId'";
                                                    $run = $conn->prepare($sql);
                                                    $run->execute();

                                                    if($run->rowCount() == 1){
                                                        $row = $run->fetch(PDO::FETCH_ASSOC);
                                                        echo '<option value="'.$row["id"].'">'.$row["categoryName"].'</option>';

                                                    }
                                                }else{
                                                    echo '<option value="-1">Select Category</option>';
                                                }



                                                ?>
                                                <?php

                                                $sql = "SELECT * from productCategory where id != '$parentCategoryId' and id != '$categoryId'";
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
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-12 text-center">
                                        <input class="btn btn-primary" type="submit" id="edit_category" name="edit_category" value="Update Category">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'assets/common/footer.php'; ?>

    </div>
</div>

<!-- Mainly scripts -->
<script src="assets/js/jquery-3.1.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="assets/js/inspinia.js"></script>
<script src="assets/js/plugins/pace/pace.min.js"></script>


</body>

</html>
