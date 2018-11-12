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
                        <strong>Accounts</strong>
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


            <div class="ibox-content m-b-sm border-bottom">
                <?php
                    $sql = "SELECT default_rate FROM `merchant_comission` GROUP BY default_rate";
                    $run = $conn->prepare($sql);
                    $run->execute();

                    if($run->rowCount() == 1){
                        $row = $run->fetch(PDO::FETCH_ASSOC);
                        $default = $row["default_rate"];
                    }
                ?>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="col-form-label">Default Commission Rate</label>
                            <h4 id="commission_rate_text">Your current default Commission rate is <b style="background-color: orange;font-size: 22px"><?php echo $default; ?>%</b></h4>
                            <input type="text" id="default_percentage" name="default_percentage" value="" placeholder="Default Commission Rate(%)" class="form-control ">
                            <button class="btn btn-primary" id="update_default_percentage">Update</button>
                        </div>
                    </div>

                </div>


            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-content">

                            <table class="footable table table-striped table-bordered table-hover toggle-arrow-tiny tablet breakpoint footable-loaded" data-page-size="15">
                                <thead>
                                <tr>

                                    <th class="footable-visible footable-first-column footable-sortable">Merchant ID<span class="footable-sort-indicator"></span></th>
                                    <th data-hide="phone" class="footable-visible footable-sortable">Merchant name<span class="footable-sort-indicator"></span></th>
                                    <th data-hide="phone" class="footable-visible footable-sortable">Sold Products(unit)<span class="footable-sort-indicator"></span></th>
                                    <th data-hide="phone" class="footable-visible footable-sortable">Percentage(%)<span class="footable-sort-indicator"></span></th>
                                    <th data-hide="phone" class="footable-visible footable-sortable">Income(BDT)<span class="footable-sort-indicator"></span></th>
                                    <th data-hide="phone" class="footable-visible footable-sortable">Due payment(BDT)<span class="footable-sort-indicator"></span></th>
                                    <th class="text-right footable-visible footable-last-column footable-sortable">Action<span class="footable-sort-indicator"></span></th>

                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                $sql = "SELECT users.id, contactdetails.name, merchant_comission.percentage,sum(orders.quantity) as \"totalSold\", sum(orders.price) as \"income\" FROM ( ( ( orders INNER JOIN products ON (orders.productId = products.id) ) INNER JOIN users ON (products.createdBy = users.id) ) INNER JOIN contactdetails ON( users.contactDetailsID = contactdetails.id ) INNER JOIN merchant_comission ON ( users.id = merchant_comission.merchant_id ) ) GROUP BY users.id";
                                $run = $conn->prepare($sql);
                                $run->execute();

                                if($run->rowCount() > 0) {
                                    while ($row = $run->fetch(PDO::FETCH_ASSOC)) {
                                        $mid = $row["id"];
                                        $merchantName = $row["name"];
                                        $totalSold = $row["totalSold"];
                                        $percentage = $row["percentage"];
                                        $income = $row["income"];
                                        $due = ($income * $percentage) / 100;

                                        echo '
                                            <tr class="footable-even" style="">
                                                <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>
                                                    '.$mid.'
                                                </td>
                                                <td class="footable-visible">
                                                    '.$merchantName.'
                                                </td>
                                                <td class="footable-visible">
                                                    '.$totalSold.'
                                                </td>
                                                <td class="footable-visible">
                                                    '.$percentage.'
                                                </td>
                                                
                                                <td class="footable-visible">
                                                    '.$income.'
                                                </td>
                                                <td class="footable-visible">
                                                    '.$due.'
                                                </td>
                                                <td class="text-right footable-visible footable-last-column">
                                                    <div class="btn-group">
                                                        <a href="editcomission.php?mid='.$mid.'" class="btn-white btn btn-xs">Edit Comission percentage</a>
                                                        
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