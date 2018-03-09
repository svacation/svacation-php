<?php DEFINE('Template_Call', TRUE); 

    include_once "./component/header.php";
    include_once "./model/common.php";
    include_once "./model/member.func.php";
    include_once "./model/check.flight.php";
    
    //Check if the user is login
    if (!isset($_COOKIE['islogin'])) {
        echo "<script type=\"text/javascript\">alert('您需要登录才能查看！');window.location.replace(\"./\");</script>";
    }

    $checked_activate = new Check_Flight;
    $checked_activate -> check_flight();
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
        <h2><b>接机送机服务申请
        <?php
            include_once "./model/common.php";
            include_once "./model/check.flight.php";

            $checked_flight = new Check_Flight;
            $checked_flight -> remainNum();     
        ?>
        </b></h2>
        <br/>
        <div class="row" style="padding-left:20px;padding-right:20px;">
            <!-- Form Start -->
            <form action="./service_function.php" method="post">
                <input type="hidden" name="serviceType" value="接机送机">
                <fieldset>
                    <div class="form-group" style="width:250px;">
                        <label>选择时间：<span style="color:red;">*预约请提前一天</span></label>
                        <div class="col-xs-5 date">
                            <div class="form-group" >
                                <label>日期: </label>
                                <input type="date" name="time">
                            </div>
                        </div>
                        <div class="col-xs-5 date">
                            <div class="form-group" >
                                <label>时间: </label>
                                <input type="text" name="timepicker" class="timepicker"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group"  style="width:250px;">
                        <label>人数: </label>
                        <select class="form-control" name="num_ppl">
                            <option value=1>1</option>
                            <option value=2>2</option>
                            <option value=3>3</option>
                            <option value=4>4</option>
                            <option value=5>5</option>
                            <option value=6>6</option>
                            <option value=7>7</option>
                            <option value=8>8</option>
                        </select>
                    </div>
                    <div class="form-group"  style="width:250px;">
                        <label>行李数量: </label>
                        <select class="form-control" name="packages">
                            <option value=1>1</option>
                            <option value=2>2</option>
                            <option value=3>3</option>
                            <option value=4>4</option>
                            <option value=5>5</option>
                            <option value=6>6</option>
                            <option value=7>7</option>
                            <option value=8>8</option>
                        </select>
                    </div>
                    <div class="form-group"  style="width:250px;">
                        <label>预定出车数量: </label>
                        <select class="form-control" name="numCars">
                            <option value=1>1</option>
                            <option value=2>2</option>
                            <option value=3>3</option>
                            <option value=4>4</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea">备注信息：</label>
                        <textarea class="form-control" name="additionalNote" rows="3"></textarea>
                    </div>
                    <br/>
                    <button type="submit" class="btn btn-primary" style="margin-bottom:20px;" name="flight_service" >提交申请</button>
                    <br/>
                </fieldset>
            </form>
            <!-- Form Ends-->
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
