<?php
$nav_flag = 4.1;
?>
<!DOCTYPE html>
<html>

<head>
    <?php
    include_once 'phpSlices/headTag.php';
    ?>

    <link href="assets/css/library/plugins/dualListbox/bootstrap-duallistbox.min.css" rel="stylesheet">

</head>

<body class="">

<div id="wrapper">

    <!-- navbar -->
    <?php
    include_once 'phpSlices/navbar.php';
    ?>
    <!-- /navbar -->

    <div id="page-wrapper" class="gray-bg">
        <?php
        //Including Logout Button
        include_once 'phpRequires/logout.php';
        ?>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-sm-4">
                <h2>Add New Diagnosis Center</h2>
            </div>
        </div>
        <div class="wrapper wrapper-content">
            <?php
            if (isset($_SESSION['dc_insertion']) && $_SESSION['dc_insertion'] == 1) {
                ?>
                <div class="feedback">
                    <div class="alert alert-success">Test Added Successfully</div>
                </div>
                <?php
            } else if (isset($_SESSION['dc_insertion']) && $_SESSION['dc_insertion'] == 0) {
                ?>
                <div class="feedback">
                    <div class="alert alert-danger">Operation Failed</div>
                </div>
                <?php
            }
            unset($_SESSION['test_insertion']);
            ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Input Diagnosis Center Information</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <form method="post" action="phpRequires/addActions/add_dc.php"
                                  enctype="multipart/form-data">
                                <div class="form-group  row">
                                    <label class="col-sm-1 col-form-label">Name</label>
                                    <div class="col-sm-11">
                                        <input type="text" class="form-control" id="dc_name" name="dc_name"
                                               placeholder="ex. XYZ Diagnosis Center" required>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">Division</label>
                                    <div class="col-sm-3">
                                        <select class="form-control" id="div_id" name="div_id">
                                            <option value="">Select Division</option>
                                        </select>
                                    </div>
                                    <label class="col-sm-1 col-form-label">District</label>
                                    <div class="col-sm-3">
                                        <select class="form-control" id="dis_id" name="dis_id">
                                            <option value="">Select Division</option>
                                        </select>
                                    </div>
                                    <label class="col-sm-1 col-form-label">Area</label>
                                    <div class="col-sm-3">
                                        <select class="form-control" id="area_id" name="area_id">
                                            <option value="">Select Division</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">Contact No.</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="dc_name" name="dc_name"
                                               placeholder="ex. XYZ Diagnosis Center" required>
                                    </div>
                                    <label class="col-sm-1 col-form-label">Website</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="website" name="website"
                                               placeholder="ex. XYZ Diagnosis Center" required>
                                    </div>
                                    <label class="col-sm-1 col-form-label">FB Page</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="fb" name="fb"
                                               placeholder="ex. XYZ Diagnosis Center" required>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">Details</label>
                                    <div class="col-sm-11">
                                        <textarea type="password" class="form-control" id="details"
                                                  name="details"
                                                  placeholder="To Determine A B C" required></textarea>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group row">
                                    <h3 class="col-sm-12 col-form-label text-center">Test List</h3>
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label>Test Name</label>
                                                <select class="form-control" id="test_id" name="test_id">
                                                    <option value="">Select Test</option>
                                                    value="<?php echo $test['test_id']; ?>"><?php echo $test['test_name']; ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-2">
                                                <label>Regular Test Cost</label>
                                                <input type="text" class="form-control" id="reg_cost" name="reg_cost"
                                                       placeholder="ex. 360" required>
                                            </div>
                                            <div class="col-sm-2">
                                                <label>Discounted Test Cost</label>
                                                <input type="text" class="form-control" id="dis_cost" name="dis_cost"
                                                       placeholder="ex. 360" required>
                                            </div>
                                            <div class="col-sm-2">
                                                <label>MUFID Test Cost</label>
                                                <input type="text" class="form-control" id="muf_cost" name="muf_cost"
                                                       placeholder="ex. 360" required>
                                            </div>
                                            <div class="col-sm-2 text-center">
                                                <label style="color: transparent;">Add</label></br>
                                                <button class="btn btn-sm btn-success">Add Test</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-1"></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th class="text-center">Sl. No.</th>
                                                <th class="text-center">Name (Initial)</th>
                                                <th class="text-center">Cost</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center">1</td>
                                                    <td>CBC</td>
                                                    <td>100</td>
                                                    <td class="text-center">
                                                        <a href="#"
                                                           class="btn btn-xs btn-danger">Remove</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group row">
                                    <div class="col-sm-12 text-center">
                                        <button class="btn btn-white btn-sm" type="reset">Reset</button>
                                        <button class="btn btn-primary btn-sm" type="submit" id="dc_add_btn"
                                                name="dc_add_btn">Add Diagnosis Center
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer -->
        <?php
        include_once 'phpSlices/footer.php';
        ?>
        <!-- /footer -->

    </div>
</div>

<!-- Common Scripts -->
<?php
include_once 'phpSlices/common_scripts.php';
?>
<!-- /Common Scripts -->


</body>

</html>
