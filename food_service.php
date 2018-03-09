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
<style>
/* Style the tab */
.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
}
</style>

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
            <div style="padding-left:20px;padding-right:20px;">
                <h2><b>孕妈订餐申请</b></h2>
                <br/>
                <!-- Start form -->
                <form action="./service_function.php" method="post">
                    <div class="container">
                        <input type="hidden" name="serviceType" value="孕妈月子餐">
                        <div class="jumbotron">
                            <?php 
                                include_once "./model/common.php";
                                include_once "./model/check.foods.php";

                                $check_foods = new Check_Foods();
                                if($check_foods->check_food_special()){
                            ?>
                            <h5><span style="color:orange">孕妈月子餐</span></h5>
                            <br/>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group" style="width:250px;">
                                        <label>开始日期: <span style="color:red;">*预约请提前5小时<span></label>
                                        <div class="col-xs-5 date">
                                            <div class="form-group" >
                                                <label>日期: </label>
                                                <input type="date" id="startDate1" name="startDate">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group"  style="width:250px;">
                                        <label>开始时间: </label>
                                        <select class="form-control" name="startTime">
                                            <option value="早">早</option>
                                            <option value="中">中</option>
                                            <option value="晚">晚</option>
                                        </select>
                                    </div>
                                    <br/>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" style="width:250px;">
                                        <label>结束日期: </label>
                                        <div class="col-xs-5 date">
                                            <div class="form-group" >
                                                <label>日期: </label>
                                                <input type="date" id="endDate1" name="endDate">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group"  style="width:250px;">
                                        <label>结束时间: </label>
                                        <select class="form-control" name="endTime">
                                            <option value="早">早</option>
                                            <option value="中">中</option>
                                            <option value="晚">晚</option>
                                        </select>
                                    </div>
                                    <br/>
                                </div>
                            </div> <!-- /.row -->
                            <button type="submit" class="btn btn-primary" style="margin-bottom:20px;" name="food_service">提交申请</button>
                        </div><!-- End first part -->
                        <?php }else{?> <!-- else condition start -->
                            </div>
                            <br/>
                        
                        <?php }?>
                        <!-- <div class="form-group">
                            <label>选择服务类型：</label>
                            <select name="serviceType">
                                <option value="宝妈月子餐">月子餐</option>
                                <option value="宝妈待产餐">待产餐</option>
                            </select>
                        </div> -->
                </form>

                <!-- Second form start -->
                <form action="./service_function.php" method="post">
                        <div class="jumbotron">
                            <?php 
                                include_once "./model/common.php";
                                include_once "./model/check.foods.php";

                                $check_foods = new Check_Foods();
                                if($check_foods->check_food()){
                            ?>
                            <input type="hidden" name="serviceType" value="孕妈待产餐">
                            <h5><span style="color:orange">孕妈待产餐</span></h5>
                            <br/>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group" style="width:250px;">
                                        <label>开始日期: <span style="color:red;">*预约请提前5小时<span></label>
                                        <div class="col-xs-5 date">
                                            <div class="form-group" >
                                                <label>日期: </label>
                                                <input type="date" id="startDate2" name="startDate">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group"  style="width:250px;">
                                        <label>开始时间: </label>
                                        <select class="form-control" name="startTime">
                                            <option value="早">早</option>
                                            <option value="中">中</option>
                                            <option value="晚">晚</option>
                                        </select>
                                    </div>
                                    <br/>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" style="width:250px;">
                                        <label>结束日期: </label>
                                        <div class="col-xs-5 date">
                                            <div class="form-group" >
                                                <label>日期: </label>
                                                <input type="date" id="endDate2" name="endDate">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group"  style="width:250px;">
                                        <label>结束时间: </label>
                                        <select class="form-control" name="endTime">
                                            <option value="早">早</option>
                                            <option value="中">中</option>
                                            <option value="晚">晚</option>
                                        </select>
                                    </div>
                                    <br/>
                                </div>
                            </div> <!-- /.row -->
                            <button type="submit" class="btn btn-primary" style="margin-bottom:20px;" name="food_service">提交申请</button>
                        </div><!-- End of second part -->
                    </div><!-- /.container -->
                </form>
                
                <?php }else{?> <!-- else condition start -->
                    </div>
                    <br/>
                
                <?php }?>

            </div><!-- /.container -->
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
            document.getElementById("startDate1").setAttribute('min', today);
            document.getElementById("endDate1").setAttribute('min', today);
            
            document.getElementById("startDate1").value=today;
            document.getElementById("endDate1").value=today;

        </script> 
        <script>
            var today = new Date().toISOString().split('T')[0];
            document.getElementById("startDate2").setAttribute('min', today);
            document.getElementById("endDate2").setAttribute('min', today);
            
            document.getElementById("startDate2").value=today;
            document.getElementById("endDate2").value=today;
        </script>
    </div>
</body>
</html>
