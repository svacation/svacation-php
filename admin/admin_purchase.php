<?php DEFINE('Template_Call', TRUE); 

    include_once "../component/adminHeader.php";
    include_once "./model/common.php";
    include_once "./model/admin_paginator.php";
    include_once "./model/admin.purchase.php";
    
    if(!defined('In_System')) exit("Access Denied");

    $purchasePage = new Purchase();
    
    //Check if the admin is login
    if (!isset($_COOKIE['isAdminLogin'])) { 
        echo "<script type=\"text/javascript\">alert('您需要登录才能查看！');window.location.replace(\"./\");</script>";
    }

?>
<body>
    <div class="container-fluid">
        <h3>--采购服务后台--</h3>

        <div class="row">
            <div class="col-xs-6 col-md-6" style="padding-top:10px;">
                <button type="button" class="btn btn-info" onclick="location.href='?pageType=thisWeek'" >本周</button>
            </div>
            <div class="col-xs-6 col-md-6" style="padding-top:10px;">
                <button type="button" class="btn btn-info" onclick="location.href='?pageType=nextWeek'">下周</button>
            </div>
            <!-- <div class="col-xs-6 col-md-4" style="padding-top:10px;">
                <button type="button" class="btn btn-info" onclick="location.href='?pageType=twoWeekLater'">下下周</button>
            </div> -->
        </div>
        <br/>
        <?php 
        $purchasePage->generateState();
        if ($_GET['pageType'] == "thisWeek") {
            $purchasePage->thisWeekListing(); 
        } elseif ($_GET['pageType'] == "nextWeek") {
            $purchasePage->nextWeekListing();  
        } elseif ($_GET['pageType'] == "twoWeekLater") { //下下周的服务暂时取消，留着code万一加回去可以用
            $purchasePage->twoWeekLater();  
        } elseif ($_GET['pageType'] == "summary") {
            $purchasePage->summary();  
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