<?php DEFINE('Template_Call', TRUE); 

    include_once "./component/header.php";
    include_once "./model/common.php";
    include_once "./model/check.pickup.php";
    
    //Check if the user is login
    if (!isset($_COOKIE['islogin'])) {
        echo "<script type=\"text/javascript\">alert('您需要登录才能查看！');window.location.replace(\"./\");</script>";
    }

    $checked_pickups = new Check_Pickup;
    $checked_pickups -> check_pickup();
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
        <h2><b>出行接送申请
        <?php
            include_once "./model/common.php";
            include_once "./model/check.pickup.php";

            $checked_pickup = new Check_Pickup;
            $checked_pickup -> remainNum(); 
        ?>
        </b></h2>
        <br/>
        <div class="row" style="padding-left:20px;padding-right:20px;">
            <form action="./service_function.php" method="post">
                <fieldset>
                    <div class="form-group" style="width:300px;">
                        <label>选择出行日期：</label>
                        <div class="col-xs-5 date">
                            <div class="form-group" >
                                <label>日期: </label>
                                <input type="date" name="date">
                                <div style="color:red;">*预约时间请提前一天</div>
                                <div style="color:red;">*目前仅周一和周三提供一次出行接送服务</div>
                            </div>
                        </div>

                    </div>
                    <div class="form-group"  style="width:250px;">
                        <label>出发时间：</label>
                        <select class="form-control" name="time">
                            <option value="10:00AM - 11:30AM">10:00AM - 11:30AM</option>
                            <option value="1:00PM - 1:30PM">1:00PM - 2:30PM</option>
                        </select>
                    </div>
                    <div class="form-group"  style="width:250px;">
                        <label>出发地：</label>
                        <select class="form-control" name="departure">
                            <option value="家">家</option>
                        </select>
                    </div>
                    <div class="form-group"  style="width:250px;">
                        <label>目的地：</label>
                        <select class="form-control" name="destination">
                            <option value="沃尔玛">沃尔玛</option>
                            <option value="Super Store">Super Store</option>
                            <option value="大统华">大统华</option>
                            <option value="奥特莱斯">奥特莱斯</option>
                            <option value="母婴店">母婴店</option>
                            <option value="八佰伴">八佰伴</option>
                            <option value="Landsdown">Landsdown</option>
                            <option value="Richmond Centre">Richmond Centre</option>
                            <option value="Aberdeen Centre">Aberdeen Centre</option>
                        </select>
                    </div>
                    <div class="form-group"  style="width:250px;">
                        <label>人数:</label>
                        <select class="form-control" name="num_ppl">
                            <option value=1>1</option>
                            <option value=2>2</option>
                            <option value=3>3</option>
                            <option value=4>4</option>
                            <option value=5>5</option>
                            <option value=6>6</option>
                            <option value=7>7</option>
                            <option value=8>8</option>
                            <option value=9>9</option>
                            <option value=10>10</option>
                        </select>
                    </div>

                    </fieldset>
                    <div class="form-group">
                        <label for="notes">备注信息：</label>
                        <textarea class="form-control" name="additional" rows="3" placeholder="几个大人，几个小孩等。"></textarea>
                    </div>
                <button type="submit" class="btn btn-primary" style="margin-bottom:20px;" name="pickup_service">提交申请</button>
                <br/>
                </fieldset>
            </form>
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
        <script>

            var today = new Date().toISOString().split('T')[0];
            document.getElementsByName("date")[0].setAttribute('min', today);
            document.getElementsByName("date")[0].value=today;

            var tomorrow = new Date();
            tomorrow.setHours(tomorrow.getHours() + 5);
            $(function() {
                $( "#datepicker" ).datepicker({
                    showButtonPanel: true,
                    minDate: tomorrow
                });
            });
        </script>   
    </div>
</body>
</html>
