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
                        <strong>User Profile</strong>
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
                                <h5>Your information</h5>
                            </div>
                            <?php

                            $sql = "SELECT users.id as uid, users.*, userRole.*, contactDetails.* FROM ((users INNER JOIN userRole on (users.userRoleID = userRole.id)) INNER JOIN contactDetails on (users.contactDetailsID = contactDetails.id)) where users.id = '$uid'";

                            $runquery = $conn->prepare($sql);
                            $runquery->execute();

                            if($runquery->rowCount() == 1){
                                $row = $runquery->fetch(PDO::FETCH_ASSOC);
                                $name = $row["name"];
                                $number = $row["phoneNumber"];
                                $userRole = $row["userRole"];
                                $email = $row["email"];
                                $dob = $row["DOB"];
                                $religion = $row["religion"];

                                $dob = date('Y-m-d', strtotime($dob));
                            }

                            if(isset($_POST["update_profile"])){
                                $updatedName = $_POST["name"];
                                $updatedEmail = $_POST["email"];
                                $updatedDOB = $_POST["dob"];
                                $updatedDOB = date('Y-m-d', strtotime($updatedDOB));
                                $updatedReligion = $_POST["religion"];

                                $sql = "update ((users INNER JOIN userRole on (users.userRoleID = userRole.id)) INNER JOIN contactDetails on (users.contactDetailsID = contactDetails.id)) set name = '$updatedName', email = '$updatedEmail', DOB = '$updatedDOB', religion = '$updatedReligion' where users.id = '$uid'";

                                $runquery = $conn->prepare($sql);
                                $runquery->execute();

                                $_SESSION["msg"] = "Profile Updated. Please refresh the page.";
                            }
                           ?>
                            <div class="ibox-content">
                                <form method="post" action="">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="name" value="<?php echo $name;?>" required>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Phone Number</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="number" value="<?php echo $number;?>" readonly>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Registered as : </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="userRole" value="<?php echo $userRole;?>" readonly>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="email" value="<?php echo $email;?>">
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Date of birth</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" name="dob" value="<?php echo $dob;?>">
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Religion</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="religion" value="<?php echo $religion;?>">
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>

                                    <div class="form-group row">
                                        <div class="col-sm-4 col-sm-offset-2">
                                            <button class="btn btn-white btn-sm" type="submit">Cancel</button>
                                            <input class="btn btn-primary btn-sm" type="submit" value="Save changes" name="update_profile">
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