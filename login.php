<?php
    session_start();
    include "dbconfig.php";

    if(isset($_POST["login_button"])){
        $phone = $_POST["phone"];
        $pass = $_POST["user_password"];

        $sql = "SELECT * FROM users where phoneNumber = '$phone'";
        $run = $conn->prepare($sql);
        $run->execute();

        if($run->rowCount() == 1){
            $row = $run->fetch(PDO::FETCH_ASSOC);
            $matchPhone = $row["phoneNumber"];

            $sql2 = "SELECT users.id as uid,users.*,contactDetails.* FROM (users inner join contactDetails on (users.contactDetailsID = contactDetails.id)) where phoneNumber = '$matchPhone'";
            $run2 = $conn->prepare($sql2);
            $run2->execute();
            if($run2->rowCount() == 1) {
                $row2 = $run2->fetch(PDO::FETCH_ASSOC);


                if ($pass == $row2["password"]) {
                    $_SESSION["u_id"] = $row2["uid"];
                    $_SESSION["name"] = $row2["name"];
                    $_SESSION["userRoleId"] = $row2["userRoleID"];

                    if(isset($_SESSION["cartproductwithoutlogin"])){
                        echo "<script>window.location.href='cart.php';</script>";
                    }else{
                        echo "<script>window.location.href='dashboard.php';</script>";
                    }


                } else {
                    echo '<script>alert("Wrong Credentials..");</script>';
                }
            }
        }else{
            echo '<script>alert("Wrong Credentials..")</script>';
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>E-Commerce</title>
    <?php include 'assets/common/inc/headinc.php'; ?>



</head>

<body class="gray-bg">
<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>
            <h2>Ecommerce</h2>
        </div>
        <div><h3 class="login-success-msg"></h3></div>
        <p>Login in. To see it in action.</p>

        <form id="login" class="m-t" role="form" method="post" action="">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Phone Number" id="identifier" name="phone"
                       required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" id="user_password"
                       name="user_password" required="required">
            </div>

            <input type="submit" value="Login" class="btn btn-primary block full-width m-b" id="login_button" name="login_button" />
        </form>


        <!--<button onclick="myFunction()" class="btn btn-primary block full-width m-b" id="login_button" name="login_button">
            Login
        </button>-->

        <p id="demo"></p>
        <p class="m-t">
            New Here, <a href="registration.php">Register Now !!!</a>
        </p>
        <p>
            Forgot Password? <a href="recoverPassword.php">Recover From Here.</a>
        </p>

    </div>
</div>


<?php include 'assets/common/inc/addscripts.php';?>

</body>

</html>
