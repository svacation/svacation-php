<?php DEFINE('Template_Call', TRUE); 

    include_once "./component/header.php";
    include_once "./model/common.php";
    include_once "./model/member.func.php";
    
    //Check if the user is login
    if (!isset($_COOKIE['islogin'])) {
        echo "<script type=\"text/javascript\">alert('您需要登录才能查看！');window.location.replace(\"./\");</script>";
    }
?>

<body class="bg-dark">
    <div class="container">
        <!-- Logo and Navigation to login-->
        <div style="margin-top:50px;">
            <h2 class="color-white" style="display:inline;">领婴海外孕产</h2>
            <div style="float:right;">
                <a href="./" style="padding-right:10px;font-size:180%;padding-bottom:10px;">返回-></a>
            </div> 
        </div>    
        <br/><br/>
        <div class="container" style="color:white;">
            <div class="row" style="padding-right:5%;padding-left:5%;">
                <?php 
                    include_once "./model/common.php";
                    include_once "./model/user.info.php";

                    $profiles = new Profile(); 
                    $profiles->generateInfo();
                ?>

            </div>
        </div>

    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
  </div>
</body>

</html>