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
                        <strong>Edit comission rate</strong>
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
                                <h5>Edit comission rate</h5>
                            </div>
                            <?php
                            if(isset($_GET["mid"])){
                                $mid = $_GET["mid"];
                            }

                            $sql = "select * from merchant_comission where merchant_id = '$mid'";
                            $runquery = $conn->prepare($sql);
                            $runquery->execute();

                            if($runquery->rowCount() == 1){
                                $row = $runquery->fetch(PDO::FETCH_ASSOC);
                                $rate = $row["percentage"];
                            }


                            //UPDATE PART
                            if(isset($_POST["edit_comission"])){
                                $updatedrate = $_POST["product_rate"];

                                $sqlupdate = "update merchant_comission set percentage = '$updatedrate' where merchant_id = '$mid'";
                                //echo $sqlupload;
                                $runupdate = $conn->prepare($sqlupdate);
                                $runupdate->execute();
                                $_SESSION["msg"] = "Comission Rate Updated Successfully";
                                echo '<script>window.location.href = "account.php";</script>';



                            }
                            ?>
                            <div class="ibox-content">
                                <form method="post" action="">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Merchant Rate</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="product_rate" value="<?php echo $rate;?>" required>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>


                                    <div class="form-group row">
                                        <div class="col-sm-4 col-sm-offset-2">
                                            <button class="btn btn-white btn-sm" type="submit">Cancel</button>
                                            <input class="btn btn-primary btn-sm" type="submit" value="Save changes" name="edit_comission">
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