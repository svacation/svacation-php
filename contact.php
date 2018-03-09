<?php DEFINE('Template_Call', TRUE); 

    include_once "./component/header.php";


    //Check if the user is logins
    if (!isset($_COOKIE['islogin'])) {
        echo "<script type=\"text/javascript\">alert('您需要登录才能查看！');window.location.replace(\"./\");</script>";
    }

?>

<body class="bg-dark">

<div class="container" style="margin-top:20px;color:white;">
    <!-- Contact form title -->
    <h2 class="color-white" style="display:inline;">联系方式：</h2>
    <div style="float:right;">
        <a href="./" style="padding-right:10px;font-size:180%;padding-bottom:10px;">返回-></a>
    </div> 
    <br/><br/>
    <p style="padding-left:20px;"><span style="color:red;">*注意事项：</span>着急的事儿打电话...千万不要发微信，微信很容易看不到信息...耽误大家的事情。</p>
    <br/>
    <br/>
    <!-- Start Contact form -->
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-md-4">餐食服务(红老师负责):</div>
            <div class="col-xs-12 col-sm-6 col-md-8"><a href="tel:204922-2345">204-922-2345</a></div>

            <div class="col-xs-6 col-md-4">证照办理(Valerie负责):</div>
            <div class="col-xs-12 col-sm-6 col-md-8"><a href="tel:6042859225">604-285-9225</a></div>

            <div class="col-xs-6 col-md-4">财务工作(Todd负责):</div>
            <div class="col-xs-12 col-sm-6 col-md-8"><a href="tel:6043684959">604-368-4959</a></div>

            <div class="col-xs-6 col-md-4">出行接送(Chuck负责):</div>
            <div class="col-xs-12 col-sm-6 col-md-8"><a href="tel:7788953579">778-895-3579</a></div>
        </div>

        <br/><br/>

        <div>
            <h4>公司信息：</h4>
            <p>地址：201-6151 Westminster Hwy, Richmond, BC. V7C4V4</p>
        </div>  

        <div class="row">
            <div class="col-xs-6 col-md-4">公司电话:</div>
            <div class="col-xs-12 col-sm-6 col-md-8"><a href="tel:604-285-9225">604-285-9225</a>或<a href="tel:604-256-2166">604-256-2166</a></div>

            <div class="col-xs-6 col-md-4">紧急电话:</div>
            <div class="col-xs-12 col-sm-6 col-md-8"><a href="tel:7788953579">778-895-3579</a></div>
        </div>

        <br/>

        <div class="row">
            <div class="col-xs-6 col-md-4">rick:</div>
            <div class="col-xs-12 col-sm-6 col-md-8"><a href="tel:6047839907">604-783-9907</a></div>

            <div class="col-xs-6 col-md-4">赵老师:</div>
            <div class="col-xs-12 col-sm-6 col-md-8"><a href="tel:7788920822">778-892-0822</a></div>

            <div class="col-xs-6 col-md-4">刘老师:</div>
            <div class="col-xs-12 col-sm-6 col-md-8"><a href="tel:7788853579">778-885-3579</a></div>
        </div>

    </div>
    <!-- End Contact form -->

    <br/><br/>
</div>
</body>

</html>