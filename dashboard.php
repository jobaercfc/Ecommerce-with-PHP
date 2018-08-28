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
                <div class="col-sm-4">
                    <h2>Welcome</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">E-commerce</a>
                        </li>
                        <li class="active">
                            <strong>Dashboard</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-sm-8">
                    <div class="title-action">
                        <a href="" class="btn btn-primary">This is action area</a>
                    </div>
                </div>
            </div>

            <div class="wrapper wrapper-content">
                <div class="middle-box text-center animated fadeInRightBig">
                    <h3 class="font-bold">This is page content</h3>
                    <div class="error-desc">
                        Here you will see the dashboard for you.
                        <br/><a href="dashboard.php" class="btn btn-primary m-t">Dashboard</a>
                    </div>
                </div>
            </div>
            <?php include 'assets/common/footer.php'; ?>

        </div>

        <?php include 'assets/common/inc/addscripts.php';?>


</body>

</html>
