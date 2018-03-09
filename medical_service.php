<?php DEFINE('Template_Call', TRUE); 

    include_once "./component/header.php";
    include_once "./model/common.php";
    include_once "./model/check.medical.php";
    
    //Check if the user is login
    if (!isset($_COOKIE['islogin'])) {
        echo "<script type=\"text/javascript\">alert('您需要登录才能查看！');window.location.replace(\"./\");</script>";
    }

    $checked_medical = new Check_Medical;
    $checked_medical -> check_medical();
?>
<head>
    <link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/ui-lightness/jquery-ui.css" />
    <link type="text/css" rel="stylesheet" href="css/wickedpicker.min.css" />
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
        <h2><b>医疗接送申请
        <?php
            include_once "./model/common.php";
            include_once "./model/check.medical.php";

            $checked_medical = new Check_Medical;
            $checked_medical -> remainNum();     
        ?>
        </b></h2>
        <br/>
        <!-- Form start -->
        <div class="row" style="padding-left:20px;padding-right:20px;">
            <form action="./service_function.php" method="post">
                <fieldset>
                <p>(<span style="color:red;">*除婴儿以外最多可以接3个人</span>)</p>
                    <div class="form-group" style="width:250px;">
                        <label>选择时间：<span style="color:red;">*预约时间请提前一天</span></label>
                        <div class="col-xs-5 date">
                            <div class="form-group" >
                                <label>日期: </label>
                                <input type="date" name="time" >
                            </div>
                        </div>
                        <div class="col-xs-5 date">
                            <div class="form-group" >
                                <label>时间: </label>
                                <input type="text" name="timepicker" class="timepicker"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group"  style="">
                            <label>选择医疗服务：</label>
                            <select class="form-control" name="medicalServiceType">
                                <option value="王医生">王医生</option>
                                <option value="谭医生">谭医生</option>
                                <option value="专科医生">专科医生</option>
                                <option value="化验">化验</option>
                                <option value="B超">B超</option>
                                <option value="入院缴费">入院缴费</option>
                                <option value="顺产预约">顺产预约</option>
                                <option value="剖腹产预约">剖腹产预约</option>
                                <option value="其他">其他</option>
                            </select>
                        </div>
                    <div class="form-group">
                        <label for="exampleTextarea">备注信息：</label>
                        <textarea class="form-control" name="additional" rows="3"></textarea>
                    </div>
                    <br/>  
                <button type="submit" class="btn btn-primary" style="margin-bottom:20px;" name="medical_service">提交申请</button>
                <br/>
            </fieldset>
            </form>
            <!-- Form Ends -->
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
        <script type="text/javascript" src="js/wickedpicker.min.js"></script>
        <script>
            var today = new Date().toISOString().split('T')[0];
            document.getElementsByName("time")[0].setAttribute('min', today);
            document.getElementsByName("time")[0].value=today;

            var tomorrow = new Date();
            tomorrow.setHours(tomorrow.getHours() + 5);
            $(function() {
                $( "#datepicker" ).datepicker({
                    showButtonPanel: true,
                    minDate: tomorrow
                });
            });

            var current = new Date();
            var time = current.getHours() + ":00";
            var options = {
                now: time,
                twentyFour:true,
                title: '选择时间',
                timeSeparator: ':',
            }
            $('.timepicker').wickedpicker(options);
        </script>   
    </div>
</body>
</html>
