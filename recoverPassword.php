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
        <p>Login in. To see it in action.</p>
        <form class="m-t" role="form" method="post" action="">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Mobile Number or Email" id="identifier" name="identifier"
                       required="">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" id="user_password"
                       name="user_password" required="">
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b" id="login_button" name="login_button">
                Login
            </button>
        </form>
        <p class="m-t">
            New Here, <a href="#">Register Now !!!</a>
        </p>
        <p>
            Forgot Password? <a href="#">Recover From Here.</a>
        </p>
        <p class="m-t">
            <small><strong>Copyright</strong> Reserved by <b><a href="pentarox.com" target="_blank">PentaRox</a></b> &copy; <?php echo date("Y"); ?></small>
        </p>
    </div>
</div>

<?php include 'assets/common/inc/addscripts.php';?>

</body>

</html>
