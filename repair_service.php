<?php DEFINE('Template_Call', TRUE); 

    include_once "./component/header.php";
    include_once "./model/common.php";
    include_once "./model/member.func.php";
    include_once "./model/check.activate.php";

    //Check if the user is login
    if (!isset($_COOKIE['islogin'])) {
        echo "<script type=\"text/javascript\">alert('您需要登录才能查看！');window.location.replace(\"./\");</script>";
    }

    $checked_activate = new Check_Activate;
    $checked_activate -> check_activate();
?>
<head>
    <link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/ui-lightness/jquery-ui.css" />
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    
    <?php include_once "./component/sideNav.php"; ?>

    <div class="content-wrapper">
        <div class="container">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
            <a href="panel.php">申请其他服务</a>
            </li>
            <li class="breadcrumb-item active">服务页面</li>
        </ol>
        <br/>
        <h2><b>物业管理申请</b></h2>
        <br/>
        <p><span style="color:red;">如果有紧急情况, 请第一时间拨打911, 其他特殊情况, 请联系Todd。</span></p>
        <div class="row" style="padding-left:20px;padding-right:20px;">
            <div style="width:50%;">
                <form action="./service_function.php" method="post">
                    <div class="form-group">
                        <h5><b>维修内容: </b></h5>
                        <textarea class="form-control" name="repairNote" rows="4"></textarea>
                    </div>
                    <br/>
                    <button type="submit" class="btn btn-primary" style="margin-bottom:20px;" name="repair_service">提交申请</button> 
                </form>
            </div>
            <br/>
        </div>
        </div>
        <!-- /.container-fluid-->
        <!-- /.content-wrapper-->
        <footer class="sticky-footer">
        <div class="container">
            <div class="text-center">
            <small>Copyright © 领世海外孕产 2018</small>
            </div>
        </div>
        </footer>
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fa fa-angle-up"></i>
        </a>
        
        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin.min.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/i18n/jquery-ui-i18n.min.js"></script>
    </div>
</body>
</html>
