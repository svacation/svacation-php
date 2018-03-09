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
    <br/>
    <div class="container" style="color:white;">
        <h2 style="display:inline;">详细信息：</h2>
        <div style="float:right">
            <a href="./" style="padding-right:10px;font-size:180%;padding-bottom:10px;">返回-></a>
        </div> 
        <br/>
        <?php 
            include_once "./model/common.php";
            include_once "./model/history.detail.php";

            $type = $_GET['type']; 
            $token = $_GET['token']; 
            $history = new DetailHistory(); ?>
        <br/>
        <div class="container" style="color:black;">
            <?php $history->historyDetail($type, $token);?>
        </div>
    </div>

    <br/><br/>
    <!-- /.content-wrapper-->
    <footer class="footer" style="color:white;">
        <div class="container">
            <div class="text-center">
                <small>Copyright © 领婴海外孕产 2018</small>
            </div>
        </div>
    </footer>




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