<?php include "dbconfig.php"; ?>

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
                        <strong>Category</strong>
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
                    <div class="ibox">
                        <div class="ibox-content">

                            <table class="footable table table-striped table-bordered table-hover toggle-arrow-tiny tablet breakpoint footable-loaded" data-page-size="15">
                                <thead>
                                <tr>

                                    <th data-toggle="true" class="footable-visible footable-first-column footable-sortable">Category ID<span class="footable-sort-indicator"></span></th>
                                    <th data-hide="phone" class="footable-visible footable-sortable">Category Name<span class="footable-sort-indicator"></span></th>
                                    <th data-hide="phone" class="footable-visible footable-sortable">Parent Category<span class="footable-sort-indicator"></span></th>
                                    <th class="text-right footable-visible footable-last-column footable-sortable">Action<span class="footable-sort-indicator"></span></th>

                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "Select * from productCategory";
                                    $run = $conn->prepare($sql);
                                    $run->execute();



                                    if($run->rowCount() > 0){
                                        while ($row = $run->fetch(PDO::FETCH_ASSOC)){
                                            $parentCategory = array();
                                            $cateforyID  = $row["id"];
                                            $cateforyName = $row["categoryName"];
                                            $parentCategoryID = $row["parentCategoryID"];


                                            if($parentCategoryID != ""){

                                                $sqlParentCheck = "Select * from productCategory where id = $parentCategoryID";
                                                $runParentCheck = $conn->prepare($sqlParentCheck);
                                                $runParentCheck->execute();

                                                if($runParentCheck->rowCount() > 0){
                                                    $rowParentCheck = $runParentCheck->fetch(PDO::FETCH_ASSOC);
                                                    $findParent = $rowParentCheck["parentCategoryID"];
                                                    $findParentName = $rowParentCheck["categoryName"];
                                                    array_push($parentCategory,$findParentName);
                                                    //echo $findParent;
                                                    //array_push($parentCategory,$findParent);
                                                    while ($findParent != ""){
                                                        $sqlParentFind = "Select * from productCategory where id = $findParent";
                                                        $runParentFind = $conn->prepare($sqlParentFind);
                                                        $runParentFind->execute();

                                                        $rowParentFind = $runParentFind->fetch(PDO::FETCH_ASSOC);
                                                        //array_push($parentCategory, $runParentFind["parentCategoryID"]);
                                                        $findParent = $rowParentFind["parentCategoryID"];
                                                        $findParentName = $rowParentFind["categoryName"];
                                                        array_push($parentCategory,$findParentName);
                                                        //echo $findParent;
                                                    }
                                                }
                                            }else{
                                                array_push($parentCategory,"N/A");
                                            }

                                            echo '
                                                <tr class="footable-even" style="">
                                                    <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>
                                                        '.$cateforyID.'
                                                    </td>
                                                    <td class="footable-visible">
                                                        '.$cateforyName.'
                                                    </td>
            
                                                    <td class="footable-visible">
                                                        ';
                                                    for ($i = sizeof($parentCategory) - 1; $i >= 0; $i--){
                                                        if($i == 0){
                                                            echo $parentCategory[$i];
                                                        }else{
                                                            echo $parentCategory[$i]."/";
                                                        }
                                                    }
                                            echo '
                                                    </td>
            
                                                    <td class="text-right footable-visible footable-last-column">
                                                        <div class="btn-group">
                                                            <a href="edit_category.php?c='.$cateforyID.'" class="btn-white btn btn-xs">Edit</a>
                                                            <button class="btn-reddit btn btn-xs" id="category_delete" cid = '.$cateforyID.'>Delete</button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            ';

                                        }
                                    }
                                    ?>



                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="6" class="footable-visible">
                                        <ul class="pagination float-right"><li class="footable-page-arrow disabled"><a data-page="first" href="#first">«</a></li><li class="footable-page-arrow disabled"><a data-page="prev" href="#prev">‹</a></li><li class="footable-page active"><a data-page="0" href="#">1</a></li><li class="footable-page"><a data-page="1" href="#">2</a></li><li class="footable-page-arrow"><a data-page="next" href="#next">›</a></li><li class="footable-page-arrow"><a data-page="last" href="#last">»</a></li></ul>
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