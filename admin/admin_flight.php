<?php DEFINE('Template_Call', TRUE); 

    include_once "../component/adminHeader.php";
    include_once "./model/common.php";
    include_once "./model/admin_paginator.php";
    include_once "./model/admin.flight.php";
    
    if(!defined('In_System')) exit("Access Denied");

    $flightPage = new Flight();
    
    //Check if the admin is login
    if (!isset($_COOKIE['isAdminLogin'])) { 
        echo "<script type=\"text/javascript\">alert('您需要登录才能查看！');window.location.replace(\"./\");</script>";
    }
    $date = new DateTime('today');

?>
<body>
    <div class="container-fluid">
        <h3>--接机送机后台--</h3>
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
            $flightPage->todayListing(); 
        } elseif ($_GET['pageType'] == "tomorrow") {
            $flightPage->tomorrowListing();  
        } elseif ($_GET['pageType'] == "twoDaysLater") {
            $flightPage->twoDaysLater();  
        }elseif ($_GET['pageType'] == "threeDaysLater") {
            $flightPage->threeDaysLater();  
        }elseif ($_GET['pageType'] == "fourDaysLater") {
            $flightPage->fourDaysLater();  
        } elseif ($_GET['pageType'] == "fiveDaysLater") {
            $flightPage->fiveDaysLater();  
        } elseif ($_GET['pageType'] == "summary") {
            $flightPage->summary();  
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