<?php
session_start();
//include "API/query.php";
include "dbconfig.php";
$errorss = array();
    if(isset($_POST["signup"])){
        $name = $_POST["name"];
        $phone = $_POST["phone"];
        $pass = $_POST["password"];
        $userRoleID = 1;

        $namecheck =  "/^[a-zA-Z ]+$/";
        $emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
        $number = "/^[0-9]+$/";

        if (!preg_match($namecheck, $name)) {
            array_push($errorss, "Only letters and white space allowed in name");
        }
        if(!preg_match($number, $phone)){
            array_push($errorss, "Only numbers are allowed in Phone number.");
        }
        if(!(strlen($phone) == 11)){
            array_push($errorss, "Phone Number must contain 11 digits. Example : 01700000000");
        }else{
            $sql = "SELECT id FROM users WHERE phoneNumber = '$phone'";
            $check_query = $conn->prepare($sql);
            $check_query->execute();
            $num = $check_query->rowCount();

            if($num > 0){
                array_push($errorss, "Phone number aready exists. Please try with different number.");
            }

        }

        if(!(strlen($pass) >= 6)){
            array_push($errorss, "Password must contain at least 6 characters.");
        }


        date_default_timezone_set("Asia/Dhaka");
        $joinDate = date("Y-m-d h:i:sa");




    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">



</head>

<body class="gray-bg">
<div class="middle-box text-center loginscreen animated fadeInDown">

    <div>
        <div>
            <h2>Ecommerce</h2>
        </div>

        <p>Create account to see it in action.</p>
        <?php
            if(empty($errorss) && isset($_POST["signup"])){
                $sql = "INSERT into contactDetails(name) values ('$name')";
                $run = $conn->prepare($sql);
                $run->execute();

                $contactDetailsId = $conn->lastInsertId();

                $sql = "INSERT into users(phoneNumber, userRoleID, password, joiningdate, contactDetailsID) values ('$phone', '$userRoleID', '$pass', '$joinDate', '$contactDetailsId')";
                $run = $conn->prepare($sql);
                $run->execute();

                if($run){
                    $_SESSION["signupconfirm"] = "You are successfully signed up. Now login to enjoy our services";
                    header("location: index.php");
                }
            }else{
                include 'errors.php';
            }

        ?>
        <form class="m-t" role="form" action="" method="post">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Name" name="name" required="required">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Phone Number(Example : 01700000000)" name="phone" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" name="password" required="required">
            </div>


            <input type="submit" value="Sign up for free" name="signup" class="btn btn-primary block full-width m-b" />

            <p class="text-muted text-center"><small>Already have an account?</small></p>
            <a class="btn btn-sm btn-white btn-block" href="index.php">Login</a>
        </form>
    </div>
</div>


<?php include 'assets/common/inc/addscripts.php';?>

</body>

</html>
