<?php DEFINE('Template_Call', TRUE); 

    include_once "../component/adminHeader.php";
    include_once "./model/common.php";
    include_once "./model/admin_paginator.php";
    include_once "./model/admin.repair.php";
    
    if(!defined('In_System')) exit("Access Denied");

    $repairPage = new Repair();
    
    //Check if the admin is login
    if (!isset($_COOKIE['isAdminLogin'])) { 
        echo "<script type=\"text/javascript\">alert('您需要登录才能查看！');window.location.replace(\"./\");</script>";
    }
    $date = new DateTime('today');

?>
<body>
    <div class="container-fluid">
        <h3>--维修服务后台--</h3>
        <div class="row">
            
            <div class="col-xs-6 col-sm-4" style="padding-top:10px;">
                <div style="width:50%;display:inline-block;">
                    <button type="button" class="btn btn-info" onclick="location.href='?pageType=today'" >今天</button>
                </div>
                <div style="width:50%;display:inline;">
                    <button type="button" class="btn btn-info" onclick="location.href='?pageType=tomorrow'">明天</button>
                </div>
            </div>
            <div class="col-xs-6 col-sm-4" style="padding-top:10px;">
                <div style="width:50%;display:inline-block;">
                    <button type="button" class="btn btn-info" onclick="location.href='?pageType=twoDaysLater'"><?php $date->modify('+2 day'); echo $date->format('m月d日')?></button>
                </div>
                <div style="width:50%;display:inline;">
                <button type="button" class="btn btn-info" onclick="location.href='?pageType=threeDaysLater'"><?php $date->modify('+1 day'); echo $date->format('m月d日')?></button>
                </div>
            </div>
            <!-- Optional: clear the XS cols if their content doesn't match in height -->
            <div class="clearfix visible-xs-block"></div>
            <div class="col-xs-6 col-sm-4" style="padding-top:10px;">
                <div style="width:50%;display:inline-block;">  
                    <button type="button" class="btn btn-info" onclick="location.href='?pageType=fourDaysLater'"><?php $date->modify('+1 day'); echo $date->format('m月d日')?></button>
                </div>
                <div style="width:50%;display:inline;">
                    <button type="button" class="btn btn-info" onclick="location.href='?pageType=fiveDaysLater'"><?php $date->modify('+1 day'); echo $date->format('m月d日')?></button>
                </div>
            </div>
        </div>
        <br/>
        <?php 
        if (!isset($_GET['pageType'])) {
            printf("undefined pageType");
            exit();
        }
        if ($_GET['pageType'] == "today") {
            $repairPage->todayListing();  
        } elseif ($_GET['pageType'] == "tomorrow") {
            $repairPage->tomorrowListing();
        } elseif ($_GET['pageType'] == "twoDaysLater") {
            $repairPage->twoDaysLater();
        }elseif ($_GET['pageType'] == "threeDaysLater") {
            $repairPage->threeDaysLater();
        }elseif ($_GET['pageType'] == "fourDaysLater") {
            $repairPage->fourDaysLater(); 
        } elseif ($_GET['pageType'] == "fiveDaysLater") {
            $repairPage->fiveDaysLater(); 
        } elseif ($_GET['pageType'] == "summary") {
            $repairPage->summary();  
        }?>
            
    </div>
       
</body>
<style>
button:active {
    border: 2px solid green;
}
</style>
</html>

<?php 
    include_once "../component/adminFooter.php";
?>