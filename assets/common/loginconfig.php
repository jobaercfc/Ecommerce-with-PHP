<div class="row border-bottom">
    <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        </div>
        <form method="post" action="">
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <div style="padding: 10px;">
                        <a class="btn btn-sm btn-danger" href="logout.php">
                            <i class="fa fa-sign-out"></i> Logout
                        </a>
                    </div>


                </li>
            </ul>
        </form>
    </nav>
</div>
<script>
    function logout() {
        window.location.href = "logout.php";
    }
</script>