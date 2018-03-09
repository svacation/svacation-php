<?php DEFINE('Template_Call', TRUE); 

    include_once "../component/adminHeader.php";
    include_once "./model/common.php";
    include_once "./model/admin_paginator.php";
    include_once "./model/admin.food.php";
    
    if(!defined('In_System')) exit("Access Denied");

    $foodPage = new Food();
    
    //Check if the admin is login
    if (!isset($_COOKIE['isAdminLogin'])) { 
        echo "<script type=\"text/javascript\">alert('您需要登录才能查看！');window.location.replace(\"./\");</script>";
    }

?>
<body>
    <div class="container-fluid">
        <h3>--订餐服务后台--</h3>
       
        <div class="row">
            
            <div class="col-xs-6 col-sm-4" style="padding-top:10px;">
                <div style="width:50%;display:inline-block;">
                    <button type="button" class="btn btn-info"  onclick="location.href='?pageType=thisBreakfast'" style="margin:auto">今天早餐</button>
                </div>
                <div style="width:50%;display:inline;">
                    <button type="button" class="btn btn-info"  onclick="location.href='?pageType=thisLunch'">今天午餐</button>
                </div>
            </div>
            <div class="col-xs-6 col-sm-4" style="padding-top:10px;">
                <div style="width:50%;display:inline-block;">
                    <button type="button" class="btn btn-info"  onclick="location.href='?pageType=thisDinner'">今天晚餐</button>
                </div>
                <div style="width:50%;display:inline;">
                    <button type="button" class="btn btn-info"  onclick="location.href='?pageType=nextBreakfast'">明天早餐</button>
                </div>
            </div>
            <!-- Optional: clear the XS cols if their content doesn't match in height -->
            <div class="clearfix visible-xs-block"></div>
            <div class="col-xs-6 col-sm-4" style="padding-top:10px;">
                <div style="width:50%;display:inline-block;">
                    <button type="button" class="btn btn-info"  onclick="location.href='?pageType=nextLunch'">明天午餐</button>
                </div>
                <div style="width:50%;display:inline;">
                    <button type="button" class="btn btn-info"  onclick="location.href='?pageType=nextDinner'">明天晚餐</button>
                </div>
            </div>
        </div>
        <br/>
        <?php if ($_GET['pageType'] == "summary") {
            $foodPage->foodSummaryListing(); 
        } elseif ($_GET['pageType'] == "thisBreakfast") {
            $foodPage->thisBreakfastListing();  
        } elseif ($_GET['pageType'] == "thisLunch") {
            $foodPage->thisLunchListing();  
        }elseif ($_GET['pageType'] == "thisDinner") {
            $foodPage->thisDinnerListing();  
        }elseif ($_GET['pageType'] == "nextBreakfast") {
            $foodPage->nextBreakfastListing();  
        } elseif ($_GET['pageType'] == "nextLunch") {
            $foodPage->nextLunchListing();  
        }elseif ($_GET['pageType'] == "nextDinner") {
            $foodPage->nextDinnerListing();  
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




