<?php DEFINE('Template_Call', TRUE); 

    include_once "../component/adminHeader.php";
    include_once "./model/common.php";
    include_once "./model/admin_paginator.php";
    include_once "./model/admin.housekeeping.php";
    
    if(!defined('In_System')) exit("Access Denied");

    $housekeepingPage = new Housekeeping();
    
    //Check if the admin is login
    if (!isset($_COOKIE['isAdminLogin'])) { 
        echo "<script type=\"text/javascript\">alert('您需要登录才能查看！');window.location.replace(\"./\");</script>";
    }
    $date = new DateTime('today');

?>
<body>
    <div class="container-fluid">
        <h3>--孕产服务后台--</h3>

        <div class="row">
            <div class="col-xs-6 col-md-4" style="padding-top:10px;">
                <button type="button" class="btn btn-info" onclick="location.href='?pageType=thisMonth'" >本月</button>
            </div>
            <div class="col-xs-6 col-md-4" style="padding-top:10px;">
                <button type="button" class="btn btn-info" onclick="location.href='?pageType=nextMonth'">下月</button>
            </div>
            <div class="col-xs-6 col-md-4" style="padding-top:10px;">
                <button type="button" class="btn btn-info" onclick="location.href='?pageType=twoMonthLater'"><?php $date->modify('+2 month'); echo $date->format('Y年m月')?></button>
            </div>
        </div>
        <br/>
        <?php if ($_GET['pageType'] == "thisMonth") {
            $housekeepingPage->thisMonthListing(); 
        } elseif ($_GET['pageType'] == "nextMonth") {
            $housekeepingPage->nextMonthListing();  
        } elseif ($_GET['pageType'] == "twoMonthLater") {
            $housekeepingPage->twoMonthLater();  
        }elseif ($_GET['pageType'] == "summary") {
            $housekeepingPage->summary();  
        }?>
        <br/><br/>
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